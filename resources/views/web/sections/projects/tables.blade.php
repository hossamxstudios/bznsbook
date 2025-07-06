<div class="ps-md-3 ps-lg-0 mt-md-2">
    <h1 class="mb-4 h2">My Projects</h1>

    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <span class="me-2">{{ $projects->total() }} Projects</span>
        </div>
        <div>
            <a href="{{ route('client.projects.create') }}" class="btn btn-primary">
                <i class="bx bx-plus fs-lg me-2"></i>Post New Project
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Project Tabs -->
    <ul class="mb-4 nav nav-tabs" id="projectTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-projects" type="button" role="tab" aria-controls="all-projects" aria-selected="true">
                All Projects
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="active-tab" data-bs-toggle="tab" data-bs-target="#active-projects" type="button" role="tab" aria-controls="active-projects" aria-selected="false">
                Active
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="awarded-tab" data-bs-toggle="tab" data-bs-target="#awarded-projects" type="button" role="tab" aria-controls="awarded-projects" aria-selected="false">
                Awarded
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed-projects" type="button" role="tab" aria-controls="completed-projects" aria-selected="false">
                Completed
            </button>
        </li>
    </ul>

    <div class="tab-content" id="projectTabsContent">
        <!-- All Projects Tab -->
        <div class="tab-pane fade show active" id="all-projects" role="tabpanel" aria-labelledby="all-tab">
            @if($projects->count() > 0)
                <div class="table-responsive">
                    <table class="table align-middle table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">Project</th>
                                <th scope="col">Status</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Applications</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($project->hasMedia('projects'))
                                                <img src="{{ $project->getFirstMediaUrl('projects') }}" alt="{{ $project->name }}" class="rounded me-3" width="50" height="50">
                                            @else
                                                <div class="rounded bg-light d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                                    <i class="bx bx-briefcase fs-4 text-muted"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <h6 class="mb-1">
                                                    <a href="{{ route('projects.show', $project->slug) }}" class="text-decoration-none text-dark">
                                                        {{ $project->name }}
                                                    </a>
                                                </h6>
                                                <p class="mb-0 small text-truncate" style="max-width: 200px;">
                                                    {{ \Illuminate\Support\Str::limit($project->details, 40) }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{!! $project->status_badge !!}</td>
                                    <td>{{ number_format($project->budget_min, 2) }} - {{ number_format($project->budget_max, 2) }}</td>
                                    <td>
                                        @php
                                            $totalApplications = $project->batches->sum(function($batch) {
                                                return $batch->seats->count();
                                            });
                                            $pendingApplications = $project->batches->sum(function($batch) {
                                                return $batch->seats->where('status', 'pending')->count();
                                            });
                                        @endphp
                                        <span class="btn btn-primary btn-sm">{{ $totalApplications }}</span>
                                        @if($pendingApplications > 0)
                                            <span class="btn btn-primary btn-sm ms-1">{{ $pendingApplications }} new</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-sm btn-primary">
                                                <i class="bx bx-show"></i>
                                            </a>
                                            <a href="{{ route('client.projects.edit', $project) }}" class="btn btn-sm btn-secondary">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $project->id }}">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </div>
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $project->id }}">Confirm Deletion</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete the project "{{ $project->name }}"?
                                                        This action cannot be undone.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('client.projects.delete', $project) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete Project</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $projects->links() }}
                </div>
            @else
                <div class="p-4 text-center rounded border">
                    <i class="mb-2 display-6 bx bx-server text-muted"></i>
                    <p class="mb-3">You haven't posted any projects yet.</p>
                    <a href="{{ route('client.projects.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus me-2"></i>Post Your First Project
                    </a>
                </div>
            @endif
        </div>
        <!-- Pagination -->


         <!-- Active Projects Tab -->
        <div class="tab-pane fade" id="active-projects" role="tabpanel" aria-labelledby="active-tab">
            @if($activeProjects->count() > 0)
                <div class="table-responsive">
                    <table class="table align-middle table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">Project</th>
                                <th scope="col">Status</th>
                                <th scope="col">Budget (EGP)</th>
                                <th scope="col">Applications</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activeProjects as $project)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($project->hasMedia('projects'))
                                                <img src="{{ $project->getFirstMediaUrl('projects') }}" alt="{{ $project->name }}" class="rounded me-3" width="50" height="50">
                                            @else
                                                <div class="rounded bg-light d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                                    <i class="bx bx-briefcase fs-4 text-muted"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <h6 class="mb-1">
                                                    <a href="{{ route('projects.show', $project->slug) }}" class="text-decoration-none text-dark">
                                                        {{ $project->name }}
                                                    </a>
                                                </h6>
                                                <p class="mb-0 small text-truncate" style="max-width: 200px;">
                                                    {{ \Illuminate\Support\Str::limit($project->details, 40) }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>{{ number_format($project->budget_min, 2) }} - {{ number_format($project->budget_max, 2) }}</td>
                                    <td>
                                        @php
                                            $totalApplications = $project->batches->sum(function($batch) {
                                                return $batch->seats->count();
                                            });
                                        @endphp
                                        {{ $totalApplications }}
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-sm btn-outline-primary me-2">
                                                <i class="bx bx-show"></i>
                                            </a>
                                            <a href="{{ route('client.projects.edit', $project) }}" class="btn btn-sm btn-outline-secondary me-2">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $project->id }}">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </div>
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $project->id }}">Confirm Delete</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete <strong>{{ $project->name }}</strong>? This action cannot be undone.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('client.projects.delete', $project) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-4 text-center rounded border">
                    <i class="mb-2 display-6 bx bx-info-circle text-muted"></i>
                    <p class="mb-0">You don't have any active projects at the moment.</p>
                </div>
            @endif
        </div>
        <!-- Awarded Projects Tab -->
        <div class="tab-pane fade" id="awarded-projects" role="tabpanel" aria-labelledby="awarded-tab">
            @if($awardedProjects->count() > 0)
                <div class="mt-4 row g-4">
                    @foreach($awardedProjects as $project)
                        <div class="col-md-6">
                            <div class="pt-5 border-0 shadow-sm card card-hover h-100 px-sm-3 px-md-0 px-lg-3 pb-sm-3 pb-md-0 pb-lg-3">
                                <div class="pt-3 card-body">
                                    <div class="top-0 p-3 d-inline-block bg-dark shadow-primary rounded-3 position-absolute translate-middle-y">
                                        <i class="m-1 text-white bx bx-trophy d-block" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <h2 class="mb-0 h4 d-inline-flex align-items-center">
                                            <a href="{{ route('projects.show', $project->slug) }}" class="text-decoration-none text-dark">
                                                {{ $project->name }}
                                                <i class="bx bx-right-arrow-circle text-dark fs-3 ms-2"></i>
                                            </a>
                                        </h2>
                                        <span class="btn btn-primary btn-sm">Awarded</span>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-3 fs-sm text-body"> {{ \Illuminate\Support\Str::limit($project->details, 120) }}</p>
                                        <div class="mb-2 d-flex align-items-center">
                                            <span class="badge bg-faded-primary text-primary me-2">
                                                <i class="bx bx-money me-1"></i>
                                                {{ number_format($project->budget_min, 2) }} - {{ number_format($project->budget_max, 2) }} EGP
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3 alert alert-success">
                                        <div class="d-flex align-items-center">
                                            <i class="bx bx-user-check fs-lg me-2"></i>
                                            <span>Awarded to: <strong>{{ $project->winner?->name }}</strong></span>
                                        </div>
                                    </div>
                                    <div class="pt-3 d-flex justify-content-between text-muted border-top">
                                        <div class="d-flex align-items-center">
                                            <i class="bx bx-calendar fs-xl me-1"></i>
                                            {{ $project->created_at->diffForHumans() }}
                                        </div>
                                        <div>
                                            <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bx bx-show me-1"></i> View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-4 text-center rounded border">
                    <i class="mb-2 display-6 bx bx-info-circle text-muted"></i>
                    <p class="mb-0">You don't have any awarded projects at the moment.</p>
                </div>
            @endif
        </div>

        <!-- Completed Projects Tab -->
        <div class="tab-pane fade" id="completed-projects" role="tabpanel" aria-labelledby="completed-tab">
            @if($completedProjects->count() > 0)
                <div class="row g-4">
                    @foreach($completedProjects as $project)
                        <div class="col-md-6">
                            <div class="pt-5 border-0 shadow-sm card card-hover h-100 px-sm-3 px-md-0 px-lg-3 pb-sm-3 pb-md-0 pb-lg-3">
                                <div class="pt-3 card-body">
                                    <div class="top-0 p-3 d-inline-block bg-info shadow-info rounded-3 position-absolute translate-middle-y">
                                        <i class="m-1 text-white bx bx-check-circle d-block" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <h2 class="mb-0 h4 d-inline-flex align-items-center">
                                            <a href="{{ route('projects.show', $project->slug) }}" class="text-decoration-none text-dark">
                                                {{ $project->name }}
                                                <i class="bx bx-right-arrow-circle text-dark fs-3 ms-2"></i>
                                            </a>
                                        </h2>
                                        <span class="badge bg-info">Completed</span>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-3 fs-sm text-body"> {{ \Illuminate\Support\Str::limit($project->details, 120) }}</p>
                                        <div class="mb-2 d-flex align-items-center">
                                            <span class="badge bg-faded-primary text-primary me-2">
                                                <i class="bx bx-money me-1"></i>
                                                {{ number_format($project->budget_min, 2) }} - {{ number_format($project->budget_max, 2) }} EGP
                                            </span>
                                        </div>
                                    </div>
                                    <div class="pt-3 d-flex justify-content-between text-muted border-top">
                                        <div class="d-flex align-items-center">
                                            <i class="bx bx-calendar fs-xl me-1"></i>
                                            Completed: {{ $project->updated_at->format('M d, Y') }}
                                        </div>
                                        <div>
                                            <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bx bx-show me-1"></i> View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-4 text-center rounded border">
                    <i class="mb-2 display-6 bx bx-info-circle text-muted"></i>
                    <p class="mb-0">You don't have any completed projects at the moment.</p>
                </div>
            @endif
        </div>
        </div>
    </div>
</div>
