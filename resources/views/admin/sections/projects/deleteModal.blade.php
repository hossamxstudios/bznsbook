@foreach($active_projects as $project)
<div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModal{{ $project->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal{{ $project->id }}Label">Delete Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle"></i>
                        <strong>Warning:</strong> This action cannot be undone. All project data will be permanently deleted.
                    </div>
                    <p>Are you sure you want to delete the project "<strong>{{ $project->name }}</strong>"?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete Project</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach($completed_projects as $project)
<div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModal{{ $project->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal{{ $project->id }}Label">Delete Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle"></i>
                        <strong>Warning:</strong> This action cannot be undone. All project data will be permanently deleted.
                    </div>
                    <p>Are you sure you want to delete the project "<strong>{{ $project->name }}</strong>"?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete Project</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
