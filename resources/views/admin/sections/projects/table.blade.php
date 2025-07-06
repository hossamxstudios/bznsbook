<div class="tab-content">
    <div class="tab-pane fade show active" id="tab_active">
        <div class="px-5 pt-5 container-fluid">
            <div class="row">
                <div class="mb-3 col-md-12 mb-md-4">
                    <div class="mb-0 card rounded-8">
                        <div class="card-header card-header-action">
                            <h6>Active Projects
                                <span class="badge badge-sm badge-light ms-1">{{ $active_projects->count() }}</span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="contact-list-view">
                                <table id="datable_1" class="table nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Client</th>
                                            <th>Status</th>
                                            <th>Budget</th>
                                            <th>Location</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($active_projects as $project)
                                            <tr class="hover-row">
                                                <td>{{ $project->id }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if ($project->getFirstMediaUrl('project'))
                                                            <div class="avatar avatar-xs me-2">
                                                                <img src="{{ $project->getFirstMediaUrl('project') }}"
                                                                    alt="project image"
                                                                    class="avatar-img rounded-circle">
                                                            </div>
                                                        @else
                                                            <div class="avatar avatar-xs avatar-soft-primary me-2">
                                                                <span class="avatar-text rounded-circle">{{ substr($project->name, 0, 1) }}</span>
                                                            </div>
                                                        @endif
                                                        <div><a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#projectDetails{{ $project->id }}" class="text-primary">{{ $project->name }}</a></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($project->client)
                                                        {{ $project->client->name }}
                                                    @else
                                                        <span class="text-muted">No client assigned</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($project->status == 'pending')
                                                        <span class="badge badge-soft-warning">Pending</span>
                                                    @elseif ($project->status == 'active')
                                                        <span class="badge badge-soft-success">Active</span>
                                                    @elseif ($project->status == 'awarded')
                                                        <span class="badge badge-soft-info">Awarded</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($project->budget_min && $project->budget_max)
                                                        <span class="badge badge-soft-primary"> ${{ number_format($project->budget_min, 2) }} - ${{ number_format($project->budget_max, 2) }}</span>
                                                    @elseif ($project->budget_min)
                                                        <span class="badge badge-soft-primary"> ${{ number_format($project->budget_min, 2) }}</span>
                                                    @else
                                                        <span class="badge badge-soft-secondary"> Not specified</span>
                                                    @endif
                                                </td>
                                                <td>{{ $project->location ?? 'Not specified' }}</td>
                                                <td>{{ $project->created_at->format('M d, Y') }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="dropdown">
                                                            <button class="btn btn-icon btn-sm btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret ms-1" type="button"data-bs-toggle="dropdown"aria-expanded="false">
                                                                <span class="icon"> <span class="feather-icon">
                                                                    <i data-feather="more-vertical"></i>
                                                                </span> </span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                {{-- <a class="dropdown-item" href="{{ route('admin.projects.edit', $project->id) }}">Edit</a> --}}
                                                                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $project->id }}">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="tab_completed">
        <div class="px-5 pt-5 container-fluid">
            <div class="row">
                <div class="mb-3 col-md-12 mb-md-4">
                    <div class="mb-0 card rounded-8">
                        <div class="card-header card-header-action">
                            <h6>Completed Projects
                                <span class="badge badge-sm badge-light ms-1">{{ $completed_projects->count() }}</span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="contact-list-view">
                                <table id="datable_2" class="table nowrap w-100" style="min-width:90vw!important;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Client</th>
                                            <th>Status</th>
                                            <th>Budget</th>
                                            <th>Location</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($completed_projects as $project)
                                            <tr class="hover-row">
                                                <td>{{ $project->id }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if ($project->getFirstMediaUrl('project'))
                                                            <div class="avatar avatar-xs me-2">
                                                                <img src="{{ $project->getFirstMediaUrl('project') }}"
                                                                    alt="project image"
                                                                    class="avatar-img rounded-circle">
                                                            </div>
                                                        @else
                                                            <div class="avatar avatar-xs avatar-soft-primary me-2">
                                                                <span class="avatar-text rounded-circle">{{ substr($project->name, 0, 1) }}</span>
                                                            </div>
                                                        @endif
                                                        <div><a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#projectDetails{{ $project->id }}" class="text-primary">{{ $project->name }}</a></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($project->client)
                                                        {{ $project->client->name }}
                                                    @else
                                                        <span class="text-muted">No client assigned</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($project->status == 'completed')
                                                        <span class="badge badge-soft-success">Completed</span>
                                                    @elseif ($project->status == 'cancelled')
                                                        <span class="badge badge-soft-danger">Cancelled</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($project->budget_min && $project->budget_max)
                                                        <span class="badge badge-soft-primary">
                                                            ${{ number_format($project->budget_min, 2) }} - ${{ number_format($project->budget_max, 2) }}
                                                        </span>
                                                    @elseif ($project->budget_min)
                                                        <span class="badge badge-soft-primary">
                                                            ${{ number_format($project->budget_min, 2) }}
                                                        </span>
                                                    @else
                                                        <span class="badge badge-soft-secondary">
                                                            Not specified
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $project->location ?? 'Not specified' }}
                                                </td>
                                                <td>
                                                    {{ $project->created_at->format('M d, Y') }}
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <!-- Change Status Button -->
                                                        {{-- <button type="button" class="btn btn-icon btn-sm btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="modal" data-bs-target="#changeStatusModal{{ $project->id }}" title="Change Status"><span class="icon"> <span class="feather-icon"><i data-feather="refresh-cw" class="text-primary"></i></span> </span>
                                                        </button> --}}

                                                        <!-- More Actions Dropdown -->
                                                        <div class="dropdown">
                                                            <button class="btn btn-icon btn-sm btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret ms-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <span class="icon"> <span class="feather-icon"><i data-feather="more-vertical"></i></span> </span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                {{-- <a class="dropdown-item" href="{{ route('admin.projects.edit', $project->id) }}">Edit</a> --}}
                                                                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $project->id }}">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
