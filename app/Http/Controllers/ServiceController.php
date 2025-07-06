<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the client's services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = Auth::guard('client')->user();
        $services = $user->services()->paginate(10);
        $subcategories = Subcategory::all();

        return view('web.profile-services', compact('services', 'subcategories', 'user'));
    }

    /**
     * Store a newly created service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'price' => 'nullable|numeric',
            'duration' => 'nullable|string',
            'subcategories' => 'nullable|array',
            'subcategories.*' => 'exists:subcategories,id',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }
        $user = Auth::guard('client')->user();
        $service            = new Service();
        $service->name      = $request->name;
        $service->details   = $request->details;
        $service->price     = $request->price;
        $service->client_id = $user->id;
        $service->slug      = \Illuminate\Support\Str::slug($request->name);
        // Handle skills array from JSON string
        if ($request->has('skills')) {
            $service->skills = $request->skills;
        } else {
            $service->skills = [];
        }
        $service->level = $request->level ?? null;
        $service->years_experience = $request->years_experience ?? null;
        $service->is_active = 1; // Set active by default
        $service->save();
        // Attach subcategories if provided
        if ($request->has('subcategories')) {
            $service->subcategories()->attach($request->subcategories);
        }
        return redirect()->route('client.services')->with('success', 'Service created successfully!');
    }

    /**
     * Display the specified service.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $user = Auth::guard('client')->user();
        $service = $user->services()->with('subcategories')->findOrFail($id);
        // Regular view request
        $subcategories = Subcategory::all();
        return view('web.profile-service-show', compact('service', 'subcategories', 'user'));
    }

    /**
     * Update the specified service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'price' => 'nullable|numeric',
            'duration' => 'nullable|string',
            'subcategories' => 'nullable|array',
            'subcategories.*' => 'exists:subcategories,id',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }
        $user             = Auth::guard('client')->user();
        $service          = $user->services()->findOrFail($request->id);
        $service->name    = $request->name;
        $service->details = $request->details;
        $service->price   = $request->price;
        // Handle skills array from JSON string
        if ($request->has('skills')) {
            $service->skills = $request->skills;
        }
        $service->level              = $request->level ?? $service->level;
        $service->years_experience   = $request->years_experience ?? $service->years_experience;
        $service->save();
        // Sync subcategories
        if ($request->has('subcategories')) {
            $service->subcategories()->sync($request->subcategories);
        } else {
            $service->subcategories()->detach();
        }
        return redirect()->route('client.services')->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified service from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $user             = Auth::guard('client')->user();
        $service          = $user->services()->findOrFail($request->id);
        // Detach subcategories before deleting
        $service->subcategories()->detach();
        $service->delete();
        return redirect()->route('client.services')->with('success', 'Service deleted successfully!');
    }
}
