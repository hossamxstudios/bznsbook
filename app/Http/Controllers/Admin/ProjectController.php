<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of all projects.
     */
    public function index()
    {
        // Get all projects with their relationships
        $active_projects = Project::with(['client', 'services', 'batches.seats', 'batches.seats.client'])
            ->where('status', '!=', Project::STATUS_COMPLETED)
            ->where('status', '!=', Project::STATUS_CANCELLED)
            ->orderBy('created_at', 'desc')
            ->get();

        $completed_projects = Project::with(['client', 'services', 'batches.seats', 'batches.seats.client'])
            ->where(function($query) {
                $query->where('status', Project::STATUS_COMPLETED)
                      ->orWhere('status', Project::STATUS_CANCELLED);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.projects', compact('active_projects', 'completed_projects'));
    }

    /**
     * Show form to create a new project.
     */
    public function create()
    {
        $clients = Client::all();
        $services = Service::all();
        return view('admin.projects.create', compact('clients', 'services'));
    }

    /**
     * Store a newly created project.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id',
            'details' => 'nullable|string',
            'skills' => 'nullable|array',
            'more_details' => 'nullable|string',
            'budget_min' => 'nullable|numeric',
            'budget_max' => 'nullable|numeric',
            'location' => 'nullable|string|max:255',
            'services' => 'nullable|array',
            'services.*' => 'exists:services,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create project
        $project = Project::create([
            'client_id' => $request->client_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'details' => $request->details,
            'skills' => $request->skills ?? [],
            'more_details' => $request->more_details,
            'budget_min' => $request->budget_min,
            'budget_max' => $request->budget_max,
            'location' => $request->location,
            'status' => Project::STATUS_PENDING,
            'is_active' => false,
        ]);

        // Attach services if any
        if ($request->has('services')) {
            $project->services()->attach($request->services);
        }

        // Handle project image upload
        if ($request->hasFile('image')) {
            $project->addMediaFromRequest('image')
                ->toMediaCollection('project');
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully');
    }

    /**
     * Show form to edit a project.
     */
    public function edit($id)
    {
        $project = Project::with(['client', 'services'])->findOrFail($id);
        $clients = Client::all();
        $services = Service::all();

        return view('admin.projects.edit', compact('project', 'clients', 'services'));
    }

    /**
     * Update the specified project.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id',
            'details' => 'nullable|string',
            'skills' => 'nullable|array',
            'more_details' => 'nullable|string',
            'budget_min' => 'nullable|numeric',
            'budget_max' => 'nullable|numeric',
            'location' => 'nullable|string|max:255',
            'services' => 'nullable|array',
            'services.*' => 'exists:services,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $project = Project::findOrFail($id);

        // Update project
        $project->update([
            'client_id' => $request->client_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'details' => $request->details,
            'skills' => $request->skills ?? $project->skills,
            'more_details' => $request->more_details,
            'budget_min' => $request->budget_min,
            'budget_max' => $request->budget_max,
            'location' => $request->location,
        ]);

        // Sync services
        if ($request->has('services')) {
            $project->services()->sync($request->services);
        } else {
            $project->services()->detach();
        }

        // Handle project image upload
        if ($request->hasFile('image')) {
            // Remove old image if exists
            $project->clearMediaCollection('project');
            // Add new image
            $project->addMediaFromRequest('image')
                ->toMediaCollection('project');
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully');
    }

    /**
     * Toggle the active status of a project.
     */
    public function toggleActiveStatus(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
        ]);

        $project = Project::findOrFail($request->project_id);
        $project->is_active = !$project->is_active;
        $project->save();

        $statusText = $project->is_active ? 'activated' : 'deactivated';

        return redirect()->route('admin.projects.index')
            ->with('success', "Project {$statusText} successfully");
    }

    /**
     * Toggle the status of a project.
     */
    public function toggleStatus(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'status' => 'required|in:pending,active,awarded,completed,cancelled',
        ]);

        $project = Project::findOrFail($request->project_id);
        $project->status = $request->status;
        $project->save();

        return redirect()->route('admin.projects.index')
            ->with('success', "Project status updated to {$request->status} successfully");
    }

    /**
     * Remove the specified project.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Delete associated media
        $project->clearMediaCollection('project');

        // Delete the project (soft delete)
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully');
    }
}
