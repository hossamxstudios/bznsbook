<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demand;
use App\Models\Service;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DemandController extends Controller
{

    /**
     * Display services requested by the authenticated client
     */
    public function requestedServices()
    {
        $user = Auth::guard('client')->user();
        $demands = Demand::where('from_client_id', $user->id)
            ->with(['to_client', 'service'])
            ->latest()
            ->paginate(10);

        return view('web.profile-services-requested', compact('user', 'demands'));
    }

    /**
     * Display service requests received by the authenticated client
     */
    public function serviceRequests()
    {
        $user = Auth::guard('client')->user();
        $demands = Demand::where('to_client_id', $user->id)
            ->with(['from_client', 'service'])
            ->latest()
            ->paginate(10);

        return view('web.profile-services-requests', compact('user', 'demands'));
    }

    /**
     * Display details of a specific demand/request
     */
    public function show($id)
    {
        $user = Auth::guard('client')->user();
        $demand = Demand::with(['from_client', 'to_client', 'service', 'reviews'])->findOrFail($id);

        if ($demand->from_client_id != $user->id && $demand->to_client_id != $user->id) {
            abort(403, 'Unauthorized action.');
        }

        // Check if there's an existing review by this user
        $existingReview = null;
        if ($demand->is_completed) {
            $existingReview = $demand->reviews()->where('client_id', $user->id)->first();
        }

        if ($demand->from_client_id == $user->id) {
            return view('web.profile-service-requested-details', compact('user', 'demand', 'existingReview'));
        } else {
            return view('web.profile-service-demand-details', compact('user', 'demand', 'existingReview'));
        }
    }

    /**
     * Upload a proposal for a service request
     */
    public function uploadProposal(Request $request, $id)
    {
        $user = Auth::guard('client')->user();
        $demand = Demand::findOrFail($id);

        // Check if the user is the sender of the request
        if ($demand->from_client_id != $user->id) {
            abort(403, 'Unauthorized action.');
        }

        // Validate the uploaded file
        $request->validate([
            'proposal' => 'required|file|mimes:pdf,doc,docx|max:10240', // 10MB max
        ]);

        // Delete any existing proposal
        $demand->clearMediaCollection('proposal');

        // Store the new proposal
        if ($request->hasFile('proposal')) {
            $demand->addMediaFromRequest('proposal')->toMediaCollection('proposal');
        }

        return redirect()->back()->with('success', 'Proposal uploaded successfully.');
    }

    /**
     * Cancel a service request
     */
    public function cancel($id)
    {
        $user = Auth::guard('client')->user();
        $demand = Demand::findOrFail($id);

        // Check if the user is the sender of the request
        if ($demand->from_client_id != $user->id) {
            abort(403, 'Unauthorized action.');
        }

        // Cannot cancel if already accepted and completed
        if ($demand->is_completed) {
            return redirect()->back()->with('error', 'Cannot cancel a completed service request.');
        }

        $demand->delete();

        return redirect()->route('client.services.requested')->with('success', 'Service request canceled successfully.');
    }

    /**
     * Accept a service request
     */
    public function accept($id)
    {
        $user = Auth::guard('client')->user();
        $demand = Demand::findOrFail($id);

        // Check if the user is the recipient
        if ($demand->to_client_id != $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $demand->update([
            'is_accepted' => true,
            'is_rejected' => false
        ]);

        return redirect()->back()->with('success', 'Service request accepted successfully.');
    }

    /**
     * Reject a service request
     */
    public function reject($id)
    {
        $user = Auth::guard('client')->user();
        $demand = Demand::findOrFail($id);

        // Check if the user is the recipient
        if ($demand->to_client_id != $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $demand->update([
            'is_accepted' => false,
            'is_rejected' => true
        ]);

        return redirect()->back()->with('success', 'Service request rejected successfully.');
    }

    /**
     * Mark a service request as completed
     */
    public function complete($id)
    {
        $user = Auth::guard('client')->user();
        $demand = Demand::findOrFail($id);

        // Check if the user is either the sender or the recipient
        if ($demand->from_client_id != $user->id && $demand->to_client_id != $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $demand->update([
            'is_completed' => true
        ]);

        return redirect()->back()->with('success', 'Service request marked as completed.');
    }

    /**
     * Apply for a service offered by another client
     */
    public function apply(Request $request, $serviceId)
    {
        try {
            // Get the authenticated client
            $user = Auth::guard('client')->user();
            if (!$user) {
                return redirect()->back()->with('error', 'You must be logged in to apply for services.');
            }

            // Find the service
            $service = \App\Models\Service::findOrFail($serviceId);
            $toClient = \App\Models\Client::findOrFail($request->to_client_id);

            // Prevent applying to your own service
            if ($service->client_id == $user->id) {
                return redirect()->back()->with('error', 'You cannot apply to your own service.');
            }

            // Validate the request data
            $validated = $request->validate([
                'description' => 'required|string|min:10|max:2000',
                'budget_min' => 'required|numeric|min:' . $service->price,
                'budget_max' => 'required|numeric|gte:budget_min',
                'weeks' => 'required|integer|min:1',
                'start_date' => 'nullable|date|after_or_equal:today',
                'proposal' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // 10MB max
            ]);

            // Create a new demand (service request)
            $demand = Demand::create([
                'from_client_id' => $user->id,
                'to_client_id' => $toClient->id,
                'service_id' => $service->id,
                'description' => $validated['description'],
                'budget_min' => $validated['budget_min'],
                'budget_max' => $validated['budget_max'],
                'deadline_weeks' => $validated['weeks'],
                'start_date' => $validated['start_date'] ?? now()->format('Y-m-d'),
                'is_accepted' => false,
                'is_rejected' => false,
                'is_completed' => false,
            ]);

            // Handle proposal upload if provided
            if ($request->hasFile('proposal')) {
                $demand->addMediaFromRequest('proposal')->toMediaCollection('proposal');
            }

            // Log the action
            \Illuminate\Support\Facades\Log::info('Service application submitted', [
                'client_id' => $user->id,
                'service_id' => $service->id,
                'to_client_id' => $toClient->id,
                'demand_id' => $demand->id
            ]);

            return redirect()->route('client.services.requested')->with('success', 'Your application has been submitted successfully.');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error submitting service application: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was a problem submitting your application. Please try again.');
        }
    }

    /**
     * Store a review for a completed service
     */
    public function storeReview(Request $request, $id)
    {
        try {
            $user = Auth::guard('client')->user();
            $demand = Demand::findOrFail($id);

            // Check if the user is the sender of the request
            if ($demand->from_client_id != $user->id) {
                abort(403, 'Unauthorized action.');
            }

            // Ensure the service request is completed
            if (!$demand->is_completed) {
                return redirect()->back()->with('error', 'You can only review completed services.');
            }

            // Validate the review data
            $validated = $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'content' => 'required|string|min:10|max:1000',
            ]);

            // Check if review already exists
            $existingReview = \App\Models\Review::where([
                'client_id' => $user->id,
                'reviewable_type' => 'App\\Models\\Demand',
                'reviewable_id' => $demand->id,
            ])->first();

            if ($existingReview) {
                // Update existing review
                $existingReview->update([
                    'rating' => $validated['rating'],
                    'content' => $validated['content'],
                ]);
                $message = 'Your review has been updated successfully.';
            } else {
                // Create new review
                $review = new \App\Models\Review([
                    'client_id' => $user->id,
                    'reviewable_type' => 'App\\Models\\Demand',
                    'reviewable_id' => $demand->id,
                    'rating' => $validated['rating'],
                    'content' => $validated['content'],
                    'is_approved' => 1 // Set to false initially, admin can approve later
                ]);
                $review->save();
                $message = 'Your review has been submitted successfully.';
            }

            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error submitting review: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was a problem submitting your review. Please try again.');
        }
    }
}
