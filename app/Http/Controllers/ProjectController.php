<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Client;
use App\Models\Project;
use App\Models\Service;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index(){
        $projects = Project::with(['client', 'winner', 'services', 'batches'])->latest()->paginate(10);
        return view('web.projects.index', compact('projects'));
    }
    /**
     * Display the client's projects
     */
    public function myProjects(){
        $client = Auth::user('client');
        $projects = Project::where('client_id', $client->id)->orderBy('created_at', 'desc')->paginate(10);
        // Active projects (status = active)
        $activeProjects = Project::where('client_id', $client->id)->where('status', Project::STATUS_ACTIVE)->orderBy('created_at', 'desc')->get();
        // Pending projects (status = pending)
        $pendingProjects = Project::where('client_id', $client->id)->where('status', Project::STATUS_PENDING)->orderBy('created_at', 'desc')->get();
        // Completed projects (status = completed)
        $completedProjects = Project::where('client_id', $client->id)->where('status', Project::STATUS_COMPLETED)->orderBy('created_at', 'desc')->get();
        // Awarded projects (status = awarded)
        $awardedProjects = Project::where('client_id', $client->id)->where('winner_id', '!=', null)->orderBy('created_at', 'desc')->get();
        return view('web.projects.my-projects', compact('projects', 'activeProjects', 'pendingProjects', 'completedProjects', 'awardedProjects'));
    }
    /**
     * Show the client's applications.
     */
    public function myApplications(){
        $user          = auth('client')->user();
        $all_seats     = Seat::where('client_id', $user->id)->get();
        $pending_seats = Seat::where('client_id', $user->id)->where('is_accepted',0)->where('is_rejected',0)->get();
        $won_seats     = Seat::where('client_id', $user->id)->where('is_accepted',1)->get();
        $lost_seats    = Seat::where('client_id', $user->id)->where('is_rejected',1)->get();
        return view('web.projects.my-applications', compact('all_seats', 'pending_seats', 'won_seats', 'lost_seats'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create(){
        $services = Service::all();
        return view('web.projects.create', compact('services'));
    }
    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'more_details' => 'nullable|string',
            'skills' => 'nullable|array',
            'budget_min' => 'required|numeric|min:0',
            'budget_max' => 'required|numeric|gte:budget_min',
            'location' => 'nullable|string|max:255',
        ]);

        // Create slug from name
        $validatedData['slug'] = Str::slug($validatedData['name']);
        // Set project creator
        $validatedData['client_id'] = Auth::user('client')->id;
        // Set initial status
        $validatedData['status'] = Project::STATUS_PENDING;
        // Create the project
        $project = Project::create($validatedData);
        // Attach services to the project
        if (!empty($validatedData['services'])) {
            $project->services()->attach($validatedData['services']);
        }
        // Process skills
        if (!empty($validatedData['skills'])) {
            $project->skills = $validatedData['skills'];
            $project->save();
        }
        // Automatically create the first batch
        $batch = new Batch();
        $batch->client_id = $project->client_id;
        $batch->project_id = $project->id;
        $batch->name = 'Batch 1';
        $batch->number = 1;
        $batch->is_active = 1; // First batch is active by default
        $batch->save();
        // Activate the project since the first batch is created
        $project->status = Project::STATUS_ACTIVE;
        $project->is_active = 1;
        $project->save();
        // Handle media upload if needed
        if ($request->hasFile('image')) {
            $project->addMediaFromRequest('image')->toMediaCollection('projects');
        }
        return redirect()->route('client.projects.index')->with('success', 'Project created successfully! The first batch has been automatically created.');
    }
    /**
     * Show edit form for a project
     * @param Project $project
     * @return \Illuminate\View\View
     */
    public function edit(Project $project){
        // Check if user is authorized to edit this project
        if ($project->client_id !== Auth::user('client')->id ) {
            abort(403, 'Unauthorized action.');
        }
        $services = Service::all();
        $selectedServices = $project->services->pluck('id')->toArray();
        return view('web.projects.edit', compact('project', 'services', 'selectedServices'));
    }
    /**
     * Display the specified project.
     */
    public function show(Project $project){
        $project->load(['client', 'winner', 'services', 'batches.seats.client']);
        // Check if the authenticated user has applied to this project
        $hasApplied = false;
        $clientApplication = null;
        if (Auth::check() && Auth::user('client')) {
            $hasApplied = $project->clientHasApplied(Auth::user('client')->id);
            if ($hasApplied) {
                $clientApplication = Seat::whereHas('batch', function($query) use ($project) {
                    $query->where('project_id', $project->id);
                })->where('client_id', Auth::user('client')->id)->first();
            }
        }
        return view('web.projects.show', compact('project', 'hasApplied', 'clientApplication'));
    }
    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, Project $project){
        // Check if authenticated user is project owner
        if (Auth::user('client')->id !== $project->client_id) {
            return redirect()->back()->with('error', 'You are not authorized to update this project.');
        }
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'more_details' => 'nullable|string',
            'budget_min' => 'required|numeric|min:0',
            'budget_max' => 'required|numeric|gte:budget_min',
            'location' => 'nullable|string|max:255',

        ]);
        // Update slug if name changed
        if ($project->name !== $validatedData['name']) {
            $validatedData['slug'] = Str::slug($validatedData['name']);
        }
        // Update the project
        $project->update($validatedData);
        // Sync services
        if ($request->services) {
            $project->services()->sync($request->services);
        }
        // Process skills
        if ($request->has('skills')) {
            // Handle skills coming as JSON string
            $skills = $request->skills;
            if (is_string($skills) && $skills !== '') {
                $skills = json_decode($skills, true);
            }
            $project->skills = $skills;
            $project->save();
        }
        // Handle media upload if needed
        if ($request->hasFile('image')) {
            $project->clearMediaCollection('projects');
            $project->addMediaFromRequest('image')->toMediaCollection('projects');
        }
        return redirect()->route('client.projects.show', $project)->with('success', 'Project updated successfully.');
    }
    /**
     * Update the project status.
     */
    public function updateStatus(Request $request, Project $project){
        // Check if authenticated user is project owner or admin
        if (Auth::user('client')->id !== $project->client_id) {
            return redirect()->back()->with('error', 'You are not authorized to update this project status.');
        }

        $validatedData = $request->validate([
            'status' => 'required|in:' . implode(',', [
                Project::STATUS_PENDING,
                Project::STATUS_ACTIVE,
                Project::STATUS_AWARDED,
                Project::STATUS_COMPLETED,
                Project::STATUS_CANCELLED
            ]),
        ]);

        $project->status = $validatedData['status'];

        // Update is_active based on status
        if (in_array($validatedData['status'], [Project::STATUS_ACTIVE, Project::STATUS_AWARDED])) {
            $project->is_active = 1;
        } else {
            $project->is_active = 0;
        }

        $project->save();

        return redirect()->back()->with('success', 'Project status updated successfully.');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project){
        // Check if authenticated user is project owner or admin
        if (Auth::user('client')->id !== $project->client_id && !Auth::user()->is_admin) {
            return redirect()->back()->with('error', 'You are not authorized to delete this project.');
        }

        // Check if project can be deleted (e.g., no accepted applications)
        if ($project->status === Project::STATUS_AWARDED) {
            return redirect()->back()->with('error', 'Cannot delete a project that has been awarded.');
        }

        // Delete the project (this will cascade to batches and seats)
        $project->delete();

        return redirect()->route('client.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    /**
     * Select a winner for the project
     */
    public function selectWinner(Request $request, Project $project, Seat $seat){
        // Check if authenticated user is project owner or admin
        if (Auth::user('client')->id !== $project->client_id) {
            return redirect()->back()->with('error', 'You are not authorized to select a winner for this project.');
        }

        // Check if the seat belongs to this project
        if ($seat->batch->project_id !== $project->id) {
            return redirect()->back()->with('error', 'Invalid seat selection.');
        }

        // Update project winner
        $project->winner_id = $seat->client_id;
        $project->status = Project::STATUS_AWARDED;
        $project->save();

        // Update seat status
        $seat->status = 'accepted';
        $seat->is_accepted = 1;
        $seat->save();

        // Reject all other applications
        Seat::whereHas('batch', function($query) use ($project) {
            $query->where('project_id', $project->id);
        })->where('id', '!=', $seat->id)->update([
            'status' => 'rejected',
            'is_rejected' => 1
        ]);

        return redirect()->back()->with('success', 'Winner selected successfully.');
    }
}
