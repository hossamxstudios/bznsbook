<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Project;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeatController extends Controller
{
    /**
     * Apply for a project seat
     */
    public function apply(Request $request, Project $project) {
        // Validate the request
        $request->validate([
            'motivation' => 'required|string|min:10|max:1000',
            'experience' => 'required|string|min:10|max:1000',
            'budget_min' => 'required|numeric|min:0',
            'budget_max' => 'required|numeric|gte:budget_min',
            'timeline' => 'required|integer|min:1',
            'notes' => 'nullable|string|max:500',
            'proposal' => 'required|file|mimes:pdf,doc,docx|max:10240', // 10MB max
        ]);

        // Check if the client already applied
        if ($project->clientHasApplied(Auth::guard('client')->user()->id)) {
            return redirect()->back()->with('error', 'You have already applied for this project.');
        }
        
        // Check if the client has an active subscription
        if (!Auth::guard('client')->user()->hasActiveSubscription()) {
            return redirect()->back()->with('error', 'You need an active subscription to apply for project seats.');
        }

        // Check if the project is accepting applications
        if ($project->status !== Project::STATUS_ACTIVE) {
            return redirect()->back()->with('error', 'This project is not accepting applications at this time.');
        }

        // Find an active batch with available seats
        $batch = Batch::where('project_id', $project->id)->where('is_active', 1)->get()->first(function($batch) {
            return $batch->hasAvailableSeats();
        });
        if (!$batch) {
            return redirect()->back()->with('error', 'No available seats in current batches for this project.');
        }

        // Create a seat for this client
        $seat = new Seat();
        $seat->batch_id = $batch->id;
        $seat->client_id = Auth::guard('client')->user()->id;
        $seat->status = 'pending';
        $seat->is_applied = 1;
        $seat->motivation = $request->input('motivation');
        $seat->experience = $request->input('experience');
        $seat->budget_min = $request->input('budget_min');
        $seat->budget_max = $request->input('budget_max');
        $seat->timeline = $request->input('timeline');
        $seat->notes = $request->input('notes');
        $seat->save();

        // Handle proposal upload
        if ($request->hasFile('proposal')) {
            $seat->addMediaFromRequest('proposal')
                ->usingName('Initial Proposal - ' . now()->format('Y-m-d'))
                ->usingFileName(time() . '-' . $request->file('proposal')->getClientOriginalName())
                ->toMediaCollection('proposals');
        }

        return redirect()->back()->with('success', 'You have successfully applied for this project.');
    }

    /**
     * Update the status of a seat application
     */
    public function updateStatus(Request $request, Seat $seat)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:pending,contacted,proposal,accepted,rejected',
        ]);

        $seat->status = $validatedData['status'];

        // Update the corresponding flags based on status
        if ($validatedData['status'] === 'contacted') {
            $seat->is_contacted = 1;
        } elseif ($validatedData['status'] === 'proposal') {
            $seat->is_proposal = 1;
        } elseif ($validatedData['status'] === 'accepted') {
            $seat->is_accepted = 1;
            // When a seat is accepted, update the project winner
            $project = $seat->batch->project;
            $project->winner_id = $seat->client_id;
            $project->status = Project::STATUS_AWARDED;
            $project->save();

            // Reject all other applications
            Seat::whereHas('batch', function($query) use ($project) {
                $query->where('project_id', $project->id);
            })
            ->where('id', '!=', $seat->id)
            ->update([
                'status' => 'rejected',
                'is_rejected' => 1
            ]);
        } elseif ($validatedData['status'] === 'rejected') {
            $seat->is_rejected = 1;
        }

        $seat->save();

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }

    /**
     * Cancel an application
     */
    public function cancel(Seat $seat)
    {
        // Check if the authenticated user owns this application
        if (Auth::guard('client')->user()->id !== $seat->client_id) {
            return redirect()->back()->with('error', 'You are not authorized to cancel this application.');
        }
        
        // Check if the client has an active subscription
        if (!Auth::guard('client')->user()->hasActiveSubscription()) {
            return redirect()->back()->with('error', 'You need an active subscription to cancel this application.');
        }

        // Check if the application can be cancelled
        if ($seat->is_accepted || $seat->is_rejected) {
            return redirect()->back()->with('error', 'This application cannot be cancelled.');
        }

        $seat->delete();

        return redirect()->back()->with('success', 'Your application has been cancelled.');
    }

    /**
     * Upload proposal for a seat
     */
    public function uploadProposal(Request $request, Seat $seat)
    {
        // Check if the seat belongs to the authenticated client
        if (Auth::guard('client')->user()->id !== $seat->client_id) {
            return redirect()->back()->with('error', 'You are not authorized to upload a proposal for this seat.');
        }
        
        // Check if the client has an active subscription
        if (!Auth::guard('client')->user()->hasActiveSubscription()) {
            return redirect()->back()->with('error', 'You need an active subscription to upload a proposal.');
        }

        // Validate the request
        $validated = $request->validate([
            'proposal' => 'required|file|mimes:pdf,doc,docx|max:10240', // 10MB max
            'notes' => 'nullable|string|max:500',
        ]);

        // Upload the file using Spatie Media Library
        if ($request->hasFile('proposal')) {
            // Remove any existing proposal documents
            $seat->clearMediaCollection('proposals');

            // Add the new proposal
            $seat->addMediaFromRequest('proposal')
                ->usingName('Proposal - ' . now()->format('Y-m-d'))
                ->usingFileName(time() . '-' . $request->file('proposal')->getClientOriginalName())
                ->toMediaCollection('proposals');
        }

        // Update seat status
        $seat->status = 'proposal';
        $seat->is_proposal = 1;

        // Save proposal notes if provided
        if ($request->filled('notes')) {
            $seat->proposal_notes = $validated['notes'];
        }

        $seat->save();

        return redirect()->back()->with('success', 'Proposal uploaded successfully.');
    }

    /**
     * Mark seat as contacted
     */
    public function markContacted(Request $request, Seat $seat)
    {
        // Check if the seat belongs to the authenticated client
        if (Auth::guard('client')->user()->id !== $seat->client_id) {
            return redirect()->back()->with('error', 'You are not authorized to mark this seat as contacted.');
        }
        
        // Check if the client has an active subscription
        if (!Auth::guard('client')->user()->hasActiveSubscription()) {
            return redirect()->back()->with('error', 'You need an active subscription to mark this seat as contacted.');
        }

        // Update seat status
        $seat->status = 'contacted';
        $seat->is_contacted = 1;
        $seat->contacted_at = now();
        $seat->save();

        return redirect()->back()->with('success', 'Seat marked as contacted successfully.');
    }
}
