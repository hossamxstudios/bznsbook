@foreach($active_projects as $project)
<!-- Project Details Offcanvas for Active Projects -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="projectDetails{{ $project->id }}" aria-labelledby="projectDetails{{ $project->id }}Label" style="width: 1220px;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="projectDetails{{ $project->id }}Label">
            Project Details
            <span class="ms-2 badge {{ $project->is_active ? 'badge-soft-success' : 'badge-soft-warning' }}">
                {{ $project->is_active ? 'Active' : 'Inactive' }}
            </span>
        </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="d-flex flex-column h-100">
            <!-- Project Image -->
            @if ($project->getFirstMediaUrl('project'))
                <div class="mb-3">
                    <img src="{{ $project->getFirstMediaUrl('project') }}" alt="{{ $project->name }}" class="rounded img-fluid" style="width: 100%; max-height: 200px; object-fit: cover;">
                </div>
            @endif

            <!-- Basic Info Card -->
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">Basic Information</h6>
                </div>
                <div class="card-body">
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Project ID:</div>
                        <div class="col-7 fw-medium">{{ $project->id }}</div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Name:</div>
                        <div class="col-7 fw-medium">{{ $project->name }}</div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Client:</div>
                        <div class="col-7 fw-medium">
                            @if ($project->client)
                                {{ $project->client->name }}
                            @else
                                <span class="text-muted">No client assigned</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Status:</div>
                        <div class="col-7">
                            @if ($project->status == 'pending')
                                <span class="badge badge-soft-warning">Pending</span>
                            @elseif ($project->status == 'active')
                                <span class="badge badge-soft-success">Active</span>
                            @elseif ($project->status == 'awarded')
                                <span class="badge badge-soft-info">Awarded</span>
                            @elseif ($project->status == 'completed')
                                <span class="badge badge-soft-primary">Completed</span>
                            @elseif ($project->status == 'cancelled')
                                <span class="badge badge-soft-danger">Cancelled</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Budget:</div>
                        <div class="col-7 fw-medium">
                            @if ($project->budget_min && $project->budget_max)
                                ${{ number_format($project->budget_min, 2) }} - ${{ number_format($project->budget_max, 2) }}
                            @elseif ($project->budget_min)
                                ${{ number_format($project->budget_min, 2) }}
                            @else
                                <span class="text-muted">Not specified</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Location:</div>
                        <div class="col-7 fw-medium">{{ $project->location ?? 'Not specified' }}</div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Created:</div>
                        <div class="col-7 fw-medium">{{ $project->created_at->format('M d, Y') }}</div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Updated:</div>
                        <div class="col-7 fw-medium">{{ $project->updated_at->format('M d, Y') }}</div>
                    </div>
                    @if ($project->winner)
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Winner:</div>
                        <div class="col-7 fw-medium">{{ $project->winner->name }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Skills Card -->
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">Required Skills</h6>
                </div>
                <div class="card-body">
                    @if(is_array($project->skills) && count($project->skills) > 0)
                        <div class="flex-wrap gap-2 d-flex">
                            @foreach($project->skills as $skill)
                                <div class="badge badge-soft-primary">{{ $skill }}</div>
                            @endforeach
                        </div>
                    @else
                        <p class="mb-0 text-muted">No skills specified</p>
                    @endif
                </div>
            </div>

            <!-- Services Card -->
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">Services</h6>
                </div>
                <div class="card-body">
                    @if($project->services && $project->services->count() > 0)
                        <div class="flex-wrap gap-2 d-flex">
                            @foreach($project->services as $service)
                                <div class="badge badge-soft-info">{{ $service->name }}</div>
                            @endforeach
                        </div>
                    @else
                        <p class="mb-0 text-muted">No services attached</p>
                    @endif
                </div>
            </div>

            <!-- Project Details Card -->
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">Project Details</h6>
                </div>
                <div class="card-body">
                    @if($project->details)
                        <p class="mb-0">{{ $project->details }}</p>
                    @else
                        <p class="mb-0 text-muted">No details provided</p>
                    @endif
                </div>
            </div>

            <!-- Batches Card -->
            @if($project->batches && $project->batches->count() > 0)
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">Batches</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Seats</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($project->batches as $batch)
                                <tr>
                                    <td>{{ $batch->id }}</td>
                                    <td>{{ $batch->name }}</td>
                                    <td>{{ $batch->seats->count() }}</td>
                                    <td>
                                        <span class="badge badge-soft-{{ $batch->is_active ? 'success' : 'danger' }}">
                                            {{ $batch->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
            @include('admin.sections.projects.components.seats-full-info')


            <!-- Actions -->
            <div class="mt-auto">
                <div class="gap-2 d-grid">
                    {{-- <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary">
                        <i class="ri-edit-2-line me-1"></i> Edit Project
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($completed_projects as $project)
<!-- Project Details Offcanvas for Completed Projects -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="projectDetails{{ $project->id }}" aria-labelledby="projectDetails{{ $project->id }}Label" style="width: 1220px;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="projectDetails{{ $project->id }}Label">
            Project Details
            <span class="ms-2 badge {{ $project->is_active ? 'badge-soft-success' : 'badge-soft-warning' }}">
                {{ $project->is_active ? 'Active' : 'Inactive' }}
            </span>
        </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="d-flex flex-column h-100">
            <!-- Project Image -->
            @if ($project->getFirstMediaUrl('project'))
                <div class="mb-3">
                    <img src="{{ $project->getFirstMediaUrl('project') }}" alt="{{ $project->name }}" class="rounded img-fluid" style="width: 100%; max-height: 200px; object-fit: cover;">
                </div>
            @endif

            <!-- Basic Info Card -->
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">Basic Information</h6>
                </div>
                <div class="card-body">
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Project ID:</div>
                        <div class="col-7 fw-medium">{{ $project->id }}</div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Name:</div>
                        <div class="col-7 fw-medium">{{ $project->name }}</div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Client:</div>
                        <div class="col-7 fw-medium">
                            @if ($project->client)
                                {{ $project->client->name }}
                            @else
                                <span class="text-muted">No client assigned</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Status:</div>
                        <div class="col-7">
                            @if ($project->status == 'pending')
                                <span class="badge badge-soft-warning">Pending</span>
                            @elseif ($project->status == 'active')
                                <span class="badge badge-soft-success">Active</span>
                            @elseif ($project->status == 'awarded')
                                <span class="badge badge-soft-info">Awarded</span>
                            @elseif ($project->status == 'completed')
                                <span class="badge badge-soft-primary">Completed</span>
                            @elseif ($project->status == 'cancelled')
                                <span class="badge badge-soft-danger">Cancelled</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Budget:</div>
                        <div class="col-7 fw-medium">
                            @if ($project->budget_min && $project->budget_max)
                                ${{ number_format($project->budget_min, 2) }} - ${{ number_format($project->budget_max, 2) }}
                            @elseif ($project->budget_min)
                                ${{ number_format($project->budget_min, 2) }}
                            @else
                                <span class="text-muted">Not specified</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Location:</div>
                        <div class="col-7 fw-medium">{{ $project->location ?? 'Not specified' }}</div>
                    </div>
                    @include('admin.sections.projects.components.seats-info')
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Created:</div>
                        <div class="col-7 fw-medium">{{ $project->created_at->format('M d, Y') }}</div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Updated:</div>
                        <div class="col-7 fw-medium">{{ $project->updated_at->format('M d, Y') }}</div>
                    </div>
                    @if ($project->winner)
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">Winner:</div>
                        <div class="col-7 fw-medium">{{ $project->winner->name }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Skills Card -->
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">Required Skills</h6>
                </div>
                <div class="card-body">
                    @if(is_array($project->skills) && count($project->skills) > 0)
                        <div class="flex-wrap gap-2 d-flex">
                            @foreach($project->skills as $skill)
                                <div class="badge badge-soft-primary">{{ $skill }}</div>
                            @endforeach
                        </div>
                    @else
                        <p class="mb-0 text-muted">No skills specified</p>
                    @endif
                </div>
            </div>

            <!-- Services Card -->
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">Services</h6>
                </div>
                <div class="card-body">
                    @if($project->services && $project->services->count() > 0)
                        <div class="flex-wrap gap-2 d-flex">
                            @foreach($project->services as $service)
                                <div class="badge badge-soft-info">{{ $service->name }}</div>
                            @endforeach
                        </div>
                    @else
                        <p class="mb-0 text-muted">No services attached</p>
                    @endif
                </div>
            </div>

            <!-- Project Details Card -->
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">Project Details</h6>
                </div>
                <div class="card-body">
                    @if($project->details)
                        <p class="mb-0">{{ $project->details }}</p>
                    @else
                        <p class="mb-0 text-muted">No details provided</p>
                    @endif
                </div>
            </div>

            <!-- Batches Card -->
            @if($project->batches && $project->batches->count() > 0)
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">Batches</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Seats</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($project->batches as $batch)
                                <tr>
                                    <td>{{ $batch->id }}</td>
                                    <td>{{ $batch->name }}</td>
                                    <td>{{ $batch->seats->count() }}</td>
                                    <td>
                                        <span class="badge badge-soft-{{ $batch->is_active ? 'success' : 'danger' }}">
                                            {{ $batch->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
            @include('admin.sections.projects.components.seats-full-info')

            <!-- Actions -->
            <div class="mt-auto">
                <div class="gap-2 d-grid">
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary">
                        <i class="ri-edit-2-line me-1"></i> Edit Project
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
