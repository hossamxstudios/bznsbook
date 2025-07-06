{{-- @foreach($active_projects as $project)
<div class="modal fade" id="toggleActiveModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="toggleActiveModal{{ $project->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="toggleActiveModal{{ $project->id }}Label">
                    {{ $project->is_active ? 'Deactivate' : 'Activate' }} Project
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.projects.toggle-active-status') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <p>Are you sure you want to {{ $project->is_active ? 'deactivate' : 'activate' }} the project "<strong>{{ $project->name }}</strong>"?</p>
                    @if($project->is_active)
                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle"></i>
                            Deactivating this project will hide it from public view and make it unavailable for applications.
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle"></i>
                            Activating this project will make it visible to the public and available for applications.
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn {{ $project->is_active ? 'btn-warning' : 'btn-success' }}">
                        {{ $project->is_active ? 'Deactivate' : 'Activate' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach($completed_projects as $project)
<div class="modal fade" id="toggleActiveModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="toggleActiveModal{{ $project->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="toggleActiveModal{{ $project->id }}Label">
                    {{ $project->is_active ? 'Deactivate' : 'Activate' }} Project
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.projects.toggle-active-status') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <p>Are you sure you want to {{ $project->is_active ? 'deactivate' : 'activate' }} the project "<strong>{{ $project->name }}</strong>"?</p>
                    @if($project->is_active)
                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle"></i>
                            Deactivating this project will hide it from public view and make it unavailable for applications.
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle"></i>
                            Activating this project will make it visible to the public and available for applications.
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn {{ $project->is_active ? 'btn-warning' : 'btn-success' }}">
                        {{ $project->is_active ? 'Deactivate' : 'Activate' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach --}}
