@foreach($active_projects as $project)
<!-- Project Details Offcanvas for Active Projects -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="projectDetails{{ $project->id }}" aria-labelledby="projectDetails{{ $project->id }}Label" style="width: 1220px;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="projectDetails{{ $project->id }}Label">
            {{ x_('Project Details', 'admin') }}
            <span class="ms-2 badge {{ $project->is_active ? 'badge-soft-success' : 'badge-soft-warning' }}">
                {{ $project->is_active ? x_('Active', 'admin') : x_('Inactive', 'admin') }}
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
                    <h6 class="mb-0">{{ x_('Basic Information', 'admin') }}</h6>
                </div>
                <div class="card-body">
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Project ID:', 'admin') }}</div>
                        <div class="col-7 fw-medium">{{ $project->id }}</div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Name:', 'admin') }}</div>
                        <div class="col-7 fw-medium">{{ $project->name }}</div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Client:', 'admin') }}</div>
                        <div class="col-7 fw-medium">
                            @if ($project->client)
                                {{ $project->client->name }}
                            @else
                                <span class="text-muted">{{ x_('No client assigned', 'admin') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Status:', 'admin') }}</div>
                        <div class="col-7">
                            @if ($project->status == 'pending')
                                <span class="badge badge-soft-warning">{{ x_('Pending', 'admin') }}</span>
                            @elseif ($project->status == 'active')
                                <span class="badge badge-soft-success">{{ x_('Active', 'admin') }}</span>
                            @elseif ($project->status == 'awarded')
                                <span class="badge badge-soft-info">{{ x_('Awarded', 'admin') }}</span>
                            @elseif ($project->status == 'completed')
                                <span class="badge badge-soft-primary">{{ x_('Completed', 'admin') }}</span>
                            @elseif ($project->status == 'cancelled')
                                <span class="badge badge-soft-danger">{{ x_('Cancelled', 'admin') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Budget:', 'admin') }}</div>
                        <div class="col-7 fw-medium">
                            @if ($project->budget_min && $project->budget_max)
                                ${{ number_format($project->budget_min, 2) }} - ${{ number_format($project->budget_max, 2) }}
                            @elseif ($project->budget_min)
                                ${{ number_format($project->budget_min, 2) }}
                            @else
                                <span class="text-muted">{{ x_('Not specified', 'admin') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Location:', 'admin') }}</div>
                        <div class="col-7 fw-medium">{{ $project->location ?? x_('Not specified', 'admin') }}</div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Created:', 'admin') }}</div>
                        <div class="col-7 fw-medium">{{ $project->created_at->format('M d, Y') }}</div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Updated:', 'admin') }}</div>
                        <div class="col-7 fw-medium">{{ $project->updated_at->format('M d, Y') }}</div>
                    </div>
                    @if ($project->winner)
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Winner:', 'admin') }}</div>
                        <div class="col-7 fw-medium">{{ $project->winner->name }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Skills Card -->
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">{{ x_('Required Skills', 'admin') }}</h6>
                </div>
                <div class="card-body">
                    @if(is_array($project->skills) && count($project->skills) > 0)
                        <div class="flex-wrap gap-2 d-flex">
                            @foreach($project->skills as $skill)
                                <div class="badge badge-soft-primary">{{ $skill }}</div>
                            @endforeach
                        </div>
                    @else
                        <p class="mb-0 text-muted">{{ x_('No skills specified', 'admin') }}</p>
                    @endif
                </div>
            </div>

            <!-- Services Card -->
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">{{ x_('Services', 'admin') }}</h6>
                </div>
                <div class="card-body">
                    @if($project->services && $project->services->count() > 0)
                        <div class="flex-wrap gap-2 d-flex">
                            @foreach($project->services as $service)
                                <div class="badge badge-soft-info">{{ $service->name }}</div>
                            @endforeach
                        </div>
                    @else
                        <p class="mb-0 text-muted">{{ x_('No services attached', 'admin') }}</p>
                    @endif
                </div>
            </div>

            <!-- Project Details Card -->
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">{{ x_('Project Details', 'admin') }}</h6>
                </div>
                <div class="card-body">
                    @if($project->details)
                        <p class="mb-0">{{ $project->details }}</p>
                    @else
                        <p class="mb-0 text-muted">{{ x_('No details provided', 'admin') }}</p>
                    @endif
                </div>
            </div>

            <!-- Batches Card -->
            @if($project->batches && $project->batches->count() > 0)
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">{{ x_('Batches', 'admin') }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ x_('Name', 'admin') }}</th>
                                    <th>{{ x_('Seats', 'admin') }}</th>
                                    <th>{{ x_('Status', 'admin') }}</th>
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
                                            {{ $batch->is_active ? x_('Active', 'admin') : x_('Inactive', 'admin') }}
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
            {{ x_('Project Details', 'admin') }}
            <span class="ms-2 badge {{ $project->is_active ? 'badge-soft-success' : 'badge-soft-warning' }}">
                {{ $project->is_active ? x_('Active', 'admin') : x_('Inactive', 'admin') }}
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
                    <h6 class="mb-0">{{ x_('Basic Information', 'admin') }}</h6>
                </div>
                <div class="card-body">
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Project ID:', 'admin') }}</div>
                        <div class="col-7 fw-medium">{{ $project->id }}</div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Name:', 'admin') }}</div>
                        <div class="col-7 fw-medium">{{ $project->name }}</div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Client:', 'admin') }}</div>
                        <div class="col-7 fw-medium">
                            @if ($project->client)
                                {{ $project->client->name }}
                            @else
                                <span class="text-muted">{{ x_('No client assigned', 'admin') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Status:', 'admin') }}</div>
                        <div class="col-7">
                            @if ($project->status == 'pending')
                                <span class="badge badge-soft-warning">{{ x_('Pending', 'admin') }}</span>
                            @elseif ($project->status == 'active')
                                <span class="badge badge-soft-success">{{ x_('Active', 'admin') }}</span>
                            @elseif ($project->status == 'awarded')
                                <span class="badge badge-soft-info">{{ x_('Awarded', 'admin') }}</span>
                            @elseif ($project->status == 'completed')
                                <span class="badge badge-soft-primary">{{ x_('Completed', 'admin') }}</span>
                            @elseif ($project->status == 'cancelled')
                                <span class="badge badge-soft-danger">{{ x_('Cancelled', 'admin') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Budget:', 'admin') }}</div>
                        <div class="col-7 fw-medium">
                            @if ($project->budget_min && $project->budget_max)
                                ${{ number_format($project->budget_min, 2) }} - ${{ number_format($project->budget_max, 2) }}
                            @elseif ($project->budget_min)
                                ${{ number_format($project->budget_min, 2) }}
                            @else
                                <span class="text-muted">{{ x_('Not specified', 'admin') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Location:', 'admin') }}</div>
                        <div class="col-7 fw-medium">{{ $project->location ?? x_('Not specified', 'admin') }}</div>
                    </div>
                    @include('admin.sections.projects.components.seats-info')
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Created:', 'admin') }}</div>
                        <div class="col-7 fw-medium">{{ $project->created_at->format('M d, Y') }}</div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Updated:', 'admin') }}</div>
                        <div class="col-7 fw-medium">{{ $project->updated_at->format('M d, Y') }}</div>
                    </div>
                    @if ($project->winner)
                    <div class="mb-2 row">
                        <div class="col-5 text-muted">{{ x_('Winner:', 'admin') }}</div>
                        <div class="col-7 fw-medium">{{ $project->winner->name }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Skills Card -->
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">{{ x_('Required Skills', 'admin') }}</h6>
                </div>
                <div class="card-body">
                    @if(is_array($project->skills) && count($project->skills) > 0)
                        <div class="flex-wrap gap-2 d-flex">
                            @foreach($project->skills as $skill)
                                <div class="badge badge-soft-primary">{{ $skill }}</div>
                            @endforeach
                        </div>
                    @else
                        <p class="mb-0 text-muted">{{ x_('No skills specified', 'admin') }}</p>
                    @endif
                </div>
            </div>

            <!-- Services Card -->
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">{{ x_('Services', 'admin') }}</h6>
                </div>
                <div class="card-body">
                    @if($project->services && $project->services->count() > 0)
                        <div class="flex-wrap gap-2 d-flex">
                            @foreach($project->services as $service)
                                <div class="badge badge-soft-info">{{ $service->name }}</div>
                            @endforeach
                        </div>
                    @else
                        <p class="mb-0 text-muted">{{ x_('No services attached', 'admin') }}</p>
                    @endif
                </div>
            </div>

            <!-- Project Details Card -->
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">{{ x_('Project Details', 'admin') }}</h6>
                </div>
                <div class="card-body">
                    @if($project->details)
                        <p class="mb-0">{{ $project->details }}</p>
                    @else
                        <p class="mb-0 text-muted">{{ x_('No details provided', 'admin') }}</p>
                    @endif
                </div>
            </div>

            <!-- Batches Card -->
            @if($project->batches && $project->batches->count() > 0)
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="mb-0">{{ x_('Batches', 'admin') }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ x_('Name', 'admin') }}</th>
                                    <th>{{ x_('Seats', 'admin') }}</th>
                                    <th>{{ x_('Status', 'admin') }}</th>
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
                                            {{ $batch->is_active ? x_('Active', 'admin') : x_('Inactive', 'admin') }}
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
                        <i class="ri-edit-2-line me-1"></i> {{ x_('Edit Project', 'admin') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
