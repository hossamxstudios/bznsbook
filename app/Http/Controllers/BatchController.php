<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BatchController extends Controller
{
    /**
     * Create a new batch for a project
     */
    public function store(Request $request, Project $project)
    {
        // Check if authenticated user is project owner or admin
        if (Auth::guard('client')->user()->id !== $project->client_id) {
            return redirect()->back()->with('error', x_('You are not authorized to create batches for this project.', 'controller'));
        }

        // Get the last batch number for this project
        $lastBatch = Batch::where('project_id', $project->id)
            ->orderBy('number', 'desc')
            ->first();

        $newBatchNumber = $lastBatch ? $lastBatch->number + 1 : 1;

        // Create a new batch
        $batch = new Batch();
        $batch->client_id = $project->client_id;
        $batch->project_id = $project->id;
        $batch->name = 'Batch ' . $newBatchNumber;
        $batch->number = $newBatchNumber;
        $batch->is_active = 1; // New batches are active by default
        $batch->save();

        // If this is the first batch, activate the project
        if ($newBatchNumber === 1) {
            $project->status = Project::STATUS_ACTIVE;
            $project->is_active = 1;
            $project->save();
        }

        return redirect()->back()->with('success', x_('New batch created successfully.', 'controller'));
    }

    /**
     * Update a batch's status
     */
    public function update(Request $request, Batch $batch)
    {
        // Check if authenticated user is project owner or admin
        if (Auth::guard('client')->user()->id !== $batch->client_id) {
            return redirect()->back()->with('error', x_('You are not authorized to update this batch.', 'controller'));
        }

        $validatedData = $request->validate([
            'is_active' => 'required|boolean',
        ]);

        $batch->is_active = $validatedData['is_active'];
        $batch->save();

        $message = $batch->is_active ? x_('Batch activated successfully.', 'controller') : x_('Batch deactivated successfully.', 'controller');

        return redirect()->back()->with('success', $message);
    }

    /**
     * Request a new batch (for admins to approve)
     */
    public function request(Request $request, Project $project)
    {
        // Check if authenticated user is project owner
        if (Auth::guard('client')->user()->id !== $project->client_id) {
            return redirect()->back()->with('error', x_('You are not authorized to request batches for this project.', 'controller'));
        }

        // Check if project has a pending batch request
        // This would typically involve a separate table for batch requests
        // For now, we'll assume a direct creation for simplicity

        // Get the last batch number for this project
        $lastBatch = Batch::where('project_id', $project->id)
            ->orderBy('number', 'desc')
            ->first();

        $newBatchNumber = $lastBatch ? $lastBatch->number + 1 : 1;

        // Create a new batch (inactive by default, admin will activate)
        $batch = new Batch();
        $batch->client_id = $project->client_id;
        $batch->project_id = $project->id;
        $batch->name = 'Batch ' . $newBatchNumber;
        $batch->number = $newBatchNumber;
        $batch->is_active = 0; // New requested batches are inactive until approved
        $batch->save();

        return redirect()->back()->with('success', x_('Batch request submitted successfully. An admin will review your request.', 'controller'));
    }

    /**
     * Approve a batch request (admin only)
     */
    public function approve(Request $request, Batch $batch)
    {
        // Check if authenticated user is an admin
        if (!Auth::guard('admin')->user()->is_admin) {
            return redirect()->back()->with('error', x_('Only administrators can approve batch requests.', 'controller'));
        }

        $batch->is_active = 1;
        $batch->save();

        return redirect()->back()->with('success', x_('Batch request approved successfully.', 'controller'));
    }
}
