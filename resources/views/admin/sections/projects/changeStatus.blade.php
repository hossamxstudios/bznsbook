@foreach($active_projects as $project)
<div class="modal fade" id="changeStatusModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="changeStatusModal{{ $project->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeStatusModal{{ $project->id }}Label">Change Project Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.projects.toggle-status') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class="form-group">
                        <label for="status">Select Status:</label>
                        <select class="form-select" id="status" name="status">
                            <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="active" {{ $project->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="awarded" {{ $project->status == 'awarded' ? 'selected' : '' }}>Awarded</option>
                            <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $project->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach($completed_projects as $project)
<div class="modal fade" id="changeStatusModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="changeStatusModal{{ $project->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeStatusModal{{ $project->id }}Label">Change Project Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.projects.toggle-status') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class="form-group">
                        <label for="status">Select Status:</label>
                        <select class="form-select" id="status" name="status">
                            <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="active" {{ $project->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="awarded" {{ $project->status == 'awarded' ? 'selected' : '' }}>Awarded</option>
                            <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $project->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
