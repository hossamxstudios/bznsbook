{{-- back to projects --}}
<a href="{{ route('client.projects.index') }}" class="mb-4 btn btn-primary">
    <i class="bx bx-arrow-back me-1"></i> Back to Projects
</a>

<div class="mb-4 border-0 shadow-sm card">
    <div class="p-4 card-body">
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
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="mb-0 h2">{{ $project->name }}</h1>
            <!-- Status badge -->
            {!! $project->status_badge !!}
        </div>
        <!-- Project Status Timeline - Enhanced UI with Brand Colors -->
        <div class="p-4 mb-4 border shadow-sm rounded-3 bg-light {{ $project->status == 'cancelled' ? 'opacity-50' : '' }}">
            <h5 class="mb-3 d-flex align-items-center">
                <i class="bx bx-stats me-2 fs-4" style="color: #3e3e3e;"></i> Project Timeline
                <span class="px-3 py-2 ms-auto badge {{ $project->status == 'cancelled' ? 'bg-danger' : 'bg-dark' }}">
                    <i class="bx {{ $project->status == 'pending' ? 'bx-time' : ($project->status == 'active' ? 'bx-pulse' : ($project->status == 'awarded' ? 'bx-trophy' : ($project->status == 'cancelled' ? 'bx-x-circle' : 'bx-check-circle'))) }} me-1"></i>
                    {{ ucfirst($project->status) }}
                </span>
            </h5>
            @php
                $statusOrder = ['active', 'awarded', 'completed'];
                $statusIcons = ['bx-pulse', 'bx-trophy', 'bx-check-circle'];
                // Use the main color for all statuses
                $mainColor = '#3e3e3e';
                $currentStatusIndex = array_search($project->status, $statusOrder);
                $currentColor = $mainColor; // Same color for all statuses

                // Calculate percentage for progress bar
                $progressPercentage = 0;
                if ($project->status != 'cancelled') {
                    $progressPercentage = $currentStatusIndex !== false ? $currentStatusIndex * 50 : 0;
                    if ($project->status == 'completed') $progressPercentage = 100;
                }

                // Get status dates
                $activeDate = $project->created_at;
                $awardedDate = $project->status == 'awarded' || ($currentStatusIndex !== false && $currentStatusIndex > 0) ? $project->updated_at : null;
                $completedDate = $project->status == 'completed' ? $project->updated_at : null;
                $cancelledDate = $project->status == 'cancelled' ? $project->updated_at : null;
            @endphp
            <!-- Progress Bar -->
            <div class="mb-4 progress" style="height: 8px;">
                <div class="progress-bar" role="progressbar" style="width: {{ $progressPercentage }}%; background-color: #3e3e3e;" aria-valuenow="{{ $progressPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- Timeline Steps -->
            <div class="d-flex justify-content-between position-relative">
                @foreach($statusOrder as $index => $status)
                    @php
                        $isCompleted = $index <= $currentStatusIndex;
                        $isCurrent = $index == $currentStatusIndex;
                        $date = null;
                        if ($status == 'active') $date = $activeDate;
                        if ($status == 'awarded') $date = $awardedDate;
                        if ($status == 'completed') $date = $completedDate;
                    @endphp
                    <div class="d-flex flex-column align-items-center position-relative" style="width: 24%;">
                        <!-- Step Icon -->
                        <div class="mb-2 shadow-sm d-flex align-items-center justify-content-center rounded-circle"
                            style="width: 50px; height: 50px; transition: all 0.3s ease; background-color: {{ $isCurrent ? '#3e3e3e' : ($isCompleted ? '#555555' : '#f5f5f5') }};">
                            <i class="bx {{ $isCompleted ? 'bx-check' : $statusIcons[$index] }}" style="color: {{ $isCompleted || $isCurrent ? 'white' : '#aaaaaa' }}; font-size: 1.5rem;"></i>
                        </div>
                        <!-- Step Label -->
                        <h6 class="mb-1 fw-semibold" style="color: {{ $isCurrent ? '#3e3e3e' : ($isCompleted ? '#555555' : '#6c757d') }};">
                            {{ ucfirst($status) }}
                        </h6>
                        <!-- Date if available -->
                        @if($date)
                            <span class="badge small" style="background-color: {{ $isCurrent ? '#f8f9fa' : '#f0f0f0' }}; color: {{ $isCurrent ? '#3e3e3e' : '#6c757d' }}">
                                {{ $date->format('M d, Y') }}
                            </span>
                        @else
                            <span class="badge small" style="background-color: #f0f0f0; color: #6c757d">
                                Upcoming
                            </span>
                        @endif
                    </div>
                @endforeach
            </div>
            <!-- Status Details Box -->
            <div class="p-3 mt-4 shadow-sm bg-light rounded-3" style="border-left: 5px solid {{ $currentColor }};">
                <div class="d-flex align-items-start">
                    <div class="d-flex align-items-center justify-content-center rounded-circle me-3"style="width: 40px; height: 40px; ">
                        <i class="bx {{ $statusIcons[$currentStatusIndex] }}" style="color: {{ $currentColor }}; font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">{{ ucfirst($project->status) }} Status</h6>
                        <p class="mb-0">
                            @if($project->status == 'active')
                                This project is open for applications. Freelancers can submit their proposals.
                                @if($project->batches->isNotEmpty())
                                    <br><span style="font-weight: 500;">{{ $project->getAllSeats()->count() }} applications received so far.</span>
                                @endif
                            @elseif($project->status == 'awarded')
                                <span style="font-weight: 500;">This project has been awarded to
                                    @if($project->winner)
                                        <a href="#winner-section" class="text-decoration-none" style="color: {{ $mainColor }};">{{ $project->winner->name }}</a>
                                    @else
                                        a freelancer
                                    @endif
                                </span> and is currently in progress.
                            @elseif($project->status == 'completed')
                                <span class="" style="font-weight: 500;">Congratulations!</span> This project has been successfully completed on {{ $project->updated_at->format('M d, Y') }}.
                            @elseif($project->status == 'cancelled')
                                <span style="font-weight: 500;" class="text-danger">This project has been cancelled</span> on {{ $project->updated_at->format('M d, Y') }} and is no longer accepting applications.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <!-- Action Buttons Based on Status -->
            @if(Auth::guard('client')->check() && Auth::guard('client')->user()->id === $project->client_id)
                <div class="mt-3 d-flex justify-content-end">
                    @if($project->status == 'active')
                        <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#viewApplicationsModal" style="border-color: {{ $mainColor }}; color: {{ $mainColor }};">
                            <i class="bx bx-user-check me-1"></i> View Applications ({{ $project->getAllSeats()->count() }})
                        </button>

                        <!-- View Applications Modal -->
                        <div class="modal fade" id="viewApplicationsModal" tabindex="-1" aria-labelledby="viewApplicationsModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewApplicationsModalLabel">Project Applications</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3 row">
                                            <div class="col-md-12">
                                                <div class="border alert alert-light">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-3">
                                                            <i class="bx bx-info-circle fs-1 text-body-secondary"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-1">Project: {{ $project->name }}</h6>
                                                            <p class="mb-0">All applications across all batches are shown below.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($project->getAllSeats()->isEmpty())
                                            <div class="py-5 text-center">
                                                <div class="mb-3">
                                                    <i class="bx bx-search fs-1 text-body-secondary"></i>
                                                </div>
                                                <h5>No Applications Yet</h5>
                                                <p class="text-body-secondary">This project hasn't received any applications yet.</p>
                                            </div>
                                        @else
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Applicant</th>
                                                            <th>Batch</th>
                                                            <th>Budget Range</th>
                                                            <th>Status</th>
                                                            <th>Applied On</th>
                                                            <th class="text-end">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($project->getAllSeats() as $seat)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        @if($seat->client->hasMedia('profile'))
                                                                            <img src="{{ $seat->client->getFirstMediaUrl('profile') }}" alt="{{ $seat->client->name }}" class="rounded-circle me-2" width="32" height="32">
                                                                        @else
                                                                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                                                                <i class="bx bx-user text-body-secondary"></i>
                                                                            </div>
                                                                        @endif
                                                                        <div>
                                                                            <h6 class="mb-0 fw-semibold">{{ $seat->client->name }}</h6>
                                                                            <small class="text-body-secondary">{{ $seat->client->email }}</small>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <span class="badge" style="background-color: {{ $seat->batch->is_active ? '#3e3e3e' : '#6c757d' }}; font-weight: 400;">
                                                                        {{ $seat->batch?->number }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span class="fw-medium">{{ number_format($seat->budget_min, 2) }} - {{ number_format($seat->budget_max, 2) }}</span>
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        $statusColors = [ 'pending' => '#f0ad4e', 'contacted' => '#5bc0de', 'proposal' => '#0275d8', 'accepted' => '#5cb85c', 'rejected' => '#d9534f' ];
                                                                        $statusColor = $statusColors[$seat->status] ?? '#6c757d';
                                                                    @endphp
                                                                    <span class="px-3 py-2 badge rounded-pill" style="background-color: {{ $statusColor }}; font-weight: 400;">
                                                                        {{ ucfirst($seat->status) }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-body-secondary">{{ $seat->created_at->format('M d, Y') }}</span>
                                                                </td>
                                                                <td class="text-end">
                                                                    <button type="button" class="btn btn-sm" style="border-color: #3e3e3e; color: #3e3e3e;" data-bs-toggle="modal" data-bs-target="#actionModal-{{ $seat->id }}" data-bs-dismiss="modal">
                                                                        <i class="bx bx-dots-horizontal-rounded me-1"></i> Actions
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($project->status == 'awarded')
                        <form action="{{ route('client.projects.update-status', $project) }}" method="POST" class="me-2">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="completed">
                            <button type="submit" class="btn btn-sm" style="border-color: #3e3e3e; color: #3e3e3e;" onclick="return confirm('Are you sure you want to mark this project as completed?')">
                                <i class="bx bx-check-circle me-1"></i> Mark as Completed
                            </button>
                        </form>
                    @endif
                </div>
            @endif
        </div>
        <div class="mb-4 d-flex">
            <div class="d-flex align-items-center me-4">
                <i class="bx bx-user fs-xl me-1"></i>
                Posted by: <strong class="ms-1">{{ $project->client->name }}</strong>
            </div>

            <div class="d-flex align-items-center">
                <i class="bx bx-calendar fs-xl me-1"></i>
                {{ $project->created_at->format('M d, Y') }}
            </div>
        </div>
        <!-- Project image if available -->
        @if($project->hasMedia('projects'))
            <div class="overflow-hidden mb-4 rounded">
                <img src="{{ $project->getFirstMediaUrl('projects') }}" alt="{{ $project->name }}" class="img-fluid w-100">
            </div>
        @endif
        <!-- Budget and Location -->
        <div class="flex-wrap gap-2 mb-4 d-flex">
            <span class="px-3 py-2 btn btn-primary">
                <i class="bx bx-money me-1"></i>
                {{ number_format($project->budget_min, 2) }} - {{ number_format($project->budget_max, 2) }} EGP
            </span>
            @if($project->location)
                <span class="px-3 py-2 btn btn-primary">
                    <i class="bx bx-map me-1"></i>
                    {{ $project->location }}
                </span>
            @endif
        </div>
        <!-- Skills tags -->
        @if(is_array($project->skills) && count($project->skills) > 0)
            <div class="mb-4">
                <h4 class="mb-3 h5">Required Skills</h4>
                <div class="flex-wrap gap-2 d-flex">
                    @foreach($project->skills as $skill)
                        <span class="px-3 py-2 badge btn btn-primary">
                            <i class="bx bx-check-circle me-1"></i> {{ $skill }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif
        @if(!$project->skills)
            <div class="alert alert-light">
                <i class="bx bx-info-circle me-2"></i> No skills required for this project.
            </div>
        @endif
        <!-- Project Description -->
        <div class="mb-4">
            <h4 class="mb-3 h5">Project Description</h4>
            @if($project->details)
                <p class="mb-4 lead">{{ $project->details }}</p>
            @endif
            @if($project->more_details)
                <div class="p-4 rounded bg-light">
                    {!! nl2br(e($project->more_details)) !!}
                </div>
            @else
                <div class="alert alert-light">
                    <i class="bx bx-info-circle me-2"></i> No detailed description provided for this project.
                </div>
            @endif
        </div>
        <!-- Services Section -->
        @if($project->services->count() > 0)
            <div class="mb-4">
                <h4 class="mb-3 h5">Related Services</h4>
                <div class="flex-wrap gap-2 d-flex">
                    @foreach($project->services as $service)
                        <span class="px-3 py-2 btn btn-primary">
                            <i class="bx bx-cube-alt me-1"></i> {{ $service->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif
        @if($project->services->count() == 0)
            <div class="alert alert-light">
                <i class="bx bx-info-circle me-2"></i> No services related to this project.
            </div>
        @endif
        <div class="pt-4 mt-4 d-flex border-top">
            <a href="{{ route('client.projects.edit', $project) }}" class="btn btn-outline-secondary me-2">
                <i class="bx bx-edit me-1"></i> Edit Project
            </a>
            <div class="dropdown me-2">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-transfer me-1"></i> Update Status
                </button>
                <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                    @foreach(['active', 'awarded', 'completed', 'cancelled'] as $status)
                        @if($project->status !== $status)
                            <li>
                                <form action="{{ route('client.projects.update-status', $project) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="{{ $status }}">
                                    <button type="submit" class="dropdown-item">
                                        Set as {{ ucfirst($status) }}
                                    </button>
                                </form>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <form action="{{ route('client.projects.delete', $project) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this project?')">
                    <i class="bx bx-trash me-1"></i> Delete
                </button>
            </form>
        </div>
        {{-- @auth
            @if(Auth::user('client') && Auth::user('client')->id !== $project->client_id && !$hasApplied && $project->status === 'active')
                <div class="pt-4 mt-4 border-top">
                    <h4 class="mb-3 h5">Apply for this Project</h4>
                    <form action="{{ route('client.apply', $project) }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="budget_min" class="form-label">Your Minimum Budget (EGP)</label>
                                <input type="number" step="0.01" class="form-control" id="budget_min" name="budget_min" required>
                            </div>
                            <div class="col-md-6">
                                <label for="budget_max" class="form-label">Your Maximum Budget (EGP)</label>
                                <input type="number" step="0.01" class="form-control" id="budget_max" name="budget_max" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-send me-1"></i> Submit Application
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            @elseif($hasApplied && $clientApplication)
                <div class="pt-4 mt-4 border-top">
                    <h4 class="mb-3 h5">Your Application</h4>
                    <div class="alert alert-info">
                        <p><strong>Status:</strong> {!! $clientApplication->status_badge !!}</p>
                        <p><strong>Budget Range:</strong> {{ number_format($clientApplication->budget_min, 2) }} - {{ number_format($clientApplication->budget_max, 2) }} EGP</p>
                        <p><strong>Applied:</strong> {{ $clientApplication->created_at->diffForHumans() }}</p>

                        @if(!$clientApplication->is_accepted && !$clientApplication->is_rejected)
                            <form action="{{ route('client.seats.cancel', $clientApplication) }}" method="POST" class="mt-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to cancel your application?')">
                                    <i class="bx bx-x me-1"></i> Cancel Application
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endif
        @endauth --}}
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <!-- Project Batches and Applications - Enhanced UI -->
        @if(Auth::guard('client')->user()->id === $project->client_id)
            <div class="overflow-hidden mb-5 border-0 shadow-sm rounded-3">
                <div class="p-4 border-bottom bg-light">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center justify-content-center rounded-circle me-3"
                                 style="width: 40px; height: 40px; background-color: #3e3e3e;">
                                <i class="text-light bx bx-layer-plus fs-5"></i>
                            </div>
                            <h4 class="mb-0 h5">Project Batches & Applications</h4>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="batches-accordion" id="batchesAccordion">
                        @foreach($project->batches ?? [] as $index => $batch)
                            <div class="overflow-hidden mb-3 border rounded-3">
                                <!-- Batch Header -->
                                <div class="p-0">
                                    <div class="p-0 d-flex align-items-center">
                                        <button class="p-3 bg-transparent border-0 d-flex align-items-center justify-content-between w-100 text-start collapsed"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#batch-collapse-{{ $batch->id }}"
                                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="batch-collapse-{{ $batch->id }}">
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center justify-content-center rounded-circle me-3"
                                                        style="width: 36px; height: 36px; background-color: {{ $batch->is_active ? '#3e3e3e' : '#6c757d' }}; flex-shrink: 0;">
                                                    <i class="text-light bx bx-layer"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-semibold">{{ $batch->name }}</h6>
                                                    <div class="mt-1 d-flex align-items-center">
                                                        <span class="badge" style="background-color: {{ $batch->is_active ? '#3e3e3e' : '#6c757d' }}; font-weight: 400;">
                                                            {{ $batch->is_active ? 'Active' : 'Inactive' }}
                                                        </span>
                                                        <span class="ms-2 small">
                                                            <i class="bx bx-user-check me-1"></i>{{ $batch->seats->count() }} / {{ \App\Models\Batch::MAX_SEATS }} applications
                                                        </span>
                                                        <span class="ms-2 small">
                                                            <i class="bx bx-calendar me-1"></i>{{ $batch->created_at->format('M d, Y') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <i class="bx fs-5" style="color: #3e3e3e;"></i>
                                        </button>
                                        <div class="dropdown me-3">
                                            <button class="btn btn-sm" style="border-color: #3e3e3e; color: #3e3e3e;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <form action="{{ route('client.batches.update', $batch) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="is_active" value="{{ $batch->is_active ? 0 : 1 }}">
                                                        <button type="submit" class="dropdown-item">
                                                            <i class="bx {{ $batch->is_active ? 'bx-pause' : 'bx-play' }} me-2"></i> {{ $batch->is_active ? 'Deactivate' : 'Activate' }}
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Applications List -->
                                <div id="batch-collapse-{{ $batch->id }}" class="collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#batchesAccordion">
                                    <div class="p-0 border-top">
                                        @if($batch->seats->isEmpty())
                                            <div class="p-4 text-center">
                                                <p class="mb-0 text-body-secondary"><i class="bx bx-info-circle me-1"></i> No applications have been received for this batch yet.</p>
                                            </div>
                                        @else
                                            <div class="applications-container">
                                                <div id="app-dropdown-container" style="position: absolute; top: 0; left: 0; width: 100%; pointer-events: none; z-index: 9999;"></div>
                                                <style>
                                                    .applications-table {
                                                        width: 100%;
                                                        border-collapse: collapse;
                                                    }
                                                    .applications-table th,
                                                    .applications-table td {
                                                        padding: 0.75rem;
                                                        vertical-align: middle;
                                                        border-top: 1px solid #dee2e6;
                                                    }
                                                    .applications-table thead th {
                                                        vertical-align: bottom;
                                                        border-bottom: 2px solid #dee2e6;
                                                        background-color: #f8f9fa;
                                                    }
                                                    .applications-table tbody tr:hover {
                                                        background-color: rgba(0,0,0,.05);
                                                    }
                                                    @media (max-width: 992px) {
                                                        .applications-container {
                                                            overflow-x: auto;
                                                        }
                                                        .applications-table {
                                                            min-width: 800px;
                                                        }
                                                    }
                                                    .custom-dropdown-menu {
                                                        display: none;
                                                        position: absolute;
                                                        min-width: 12rem;
                                                        padding: 0.5rem 0;
                                                        margin: 0;
                                                        background-color: #fff;
                                                        background-clip: padding-box;
                                                        border: 1px solid rgba(0,0,0,.15);
                                                        border-radius: 0.25rem;
                                                        box-shadow: 0 0.5rem 1rem rgba(0,0,0,.175);
                                                        pointer-events: auto;
                                                        z-index: 9999;
                                                    }
                                                    .custom-dropdown-menu.show {
                                                        display: block;
                                                    }
                                                    .custom-dropdown-menu li {
                                                        list-style: none;
                                                    }
                                                    .custom-dropdown-menu form {
                                                        padding: 0;
                                                        margin: 0;
                                                    }
                                                    .custom-dropdown-menu .dropdown-divider {
                                                        height: 0;
                                                        margin: 0.5rem 0;
                                                        overflow: hidden;
                                                        border-top: 1px solid #e9ecef;
                                                    }
                                                    .custom-dropdown-menu button.dropdown-item {
                                                        display: block;
                                                        width: 100%;
                                                        padding: 0.25rem 1rem;
                                                        clear: both;
                                                        font-weight: 400;
                                                        text-align: inherit;
                                                        white-space: nowrap;
                                                        background-color: transparent;
                                                        border: 0;
                                                        text-decoration: none;
                                                        cursor: pointer;
                                                    }
                                                    .custom-dropdown-menu button.dropdown-item:hover,
                                                    .custom-dropdown-menu button.dropdown-item:focus {
                                                        background-color: #f8f9fa;
                                                    }
                                                </style>
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        const dropdownContainer = document.getElementById('app-dropdown-container');
                                                        let activeDropdown = null;
                                                        let currentToggler = null;

                                                        // Function to close all dropdowns
                                                        function closeAllDropdowns() {
                                                            if (activeDropdown) {
                                                                dropdownContainer.removeChild(activeDropdown);
                                                                activeDropdown = null;

                                                                if (currentToggler) {
                                                                    currentToggler.setAttribute('aria-expanded', 'false');
                                                                    currentToggler = null;
                                                                }
                                                            }
                                                        }

                                                        // Close dropdown when clicking outside
                                                        document.addEventListener('click', function(e) {
                                                            if (!e.target.matches('.app-dropdown-toggle') &&
                                                                !e.target.closest('.custom-dropdown-menu') &&
                                                                !e.target.closest('.app-dropdown-toggle')) {
                                                                closeAllDropdowns();
                                                            }
                                                        });

                                                        // Find all toggle buttons and attach event listeners
                                                        document.querySelectorAll('.app-dropdown-toggle').forEach(function(toggler) {
                                                            toggler.addEventListener('click', function(e) {
                                                                e.preventDefault();
                                                                e.stopPropagation();

                                                                // Get the dropdown content from the data-content attribute
                                                                const content = this.getAttribute('data-content');
                                                                const targetId = this.getAttribute('data-target');
                                                                const targetContent = document.getElementById(targetId);

                                                                // If a dropdown is already active, close it
                                                                closeAllDropdowns();

                                                                // Get button position
                                                                const rect = this.getBoundingClientRect();

                                                                // Create new dropdown
                                                                const dropdown = document.createElement('div');
                                                                dropdown.className = 'custom-dropdown-menu show';
                                                                dropdown.innerHTML = targetContent.innerHTML;
                                                                dropdown.style.top = (rect.bottom + window.scrollY) + 'px';
                                                                dropdown.style.left = (rect.left + window.scrollX - 150) + 'px'; // Position to the left of the button

                                                                // Add dropdown to container
                                                                dropdownContainer.appendChild(dropdown);
                                                                activeDropdown = dropdown;
                                                                currentToggler = this;
                                                                this.setAttribute('aria-expanded', 'true');
                                                            });
                                                        });
                                                    });
                                                </script>
                                                <table class="applications-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Applicant</th>
                                                            <th>Budget (EGP)</th>
                                                            <th>Status</th>
                                                            <th>Applied On</th>
                                                            <th class="text-end">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($batch->seats as $seat)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        @if($seat->client->hasMedia('profile'))
                                                                            <img src="{{ $seat->client->getFirstMediaUrl('profile') }}" alt="{{ $seat->client->name }}" class="rounded-circle me-2" width="32" height="32">
                                                                        @else
                                                                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                                                                <i class="bx bx-user text-body-secondary"></i>
                                                                            </div>
                                                                        @endif
                                                                        <div>
                                                                            <h6 class="mb-0 fw-semibold">{{ $seat->client->name }}</h6>
                                                                            <small class="text-body-secondary">{{ $seat->client->email }}</small>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <span class="fw-medium">{{ number_format($seat->budget_min, 2) }} - {{ number_format($seat->budget_max, 2) }}</span>
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        $statusColors = [ 'pending' => '#f0ad4e', 'contacted' => '#5bc0de', 'proposal' => '#0275d8', 'accepted' => '#5cb85c', 'rejected' => '#d9534f' ];
                                                                        $statusColor = $statusColors[$seat->status] ?? '#6c757d';
                                                                    @endphp
                                                                    <span class="px-3 py-2 badge rounded-pill" style="background-color: {{ $statusColor }}; font-weight: 400;">
                                                                        {{ ucfirst($seat->status) }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-body-secondary">{{ $seat->created_at->format('M d, Y') }}</span>
                                                                </td>
                                                                <td class="text-end">
                                                                    <button type="button" class="btn btn-sm" style="border-color: #3e3e3e; color: #3e3e3e;" data-bs-toggle="modal" data-bs-target="#actionModal-{{ $seat->id }}">
                                                                        <i class="bx bx-dots-horizontal-rounded me-1"></i> Actions
                                                                    </button>

                                                                    <!-- Action Modal -->
                                                                    <div class="modal fade" id="actionModal-{{ $seat->id }}" tabindex="-1" aria-labelledby="actionModalLabel-{{ $seat->id }}" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="actionModalLabel-{{ $seat->id }}">Application Actions</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="pb-3 mb-3 d-flex align-items-center border-bottom">
                                                                                        @if($seat->client->hasMedia('profile'))
                                                                                            <img src="{{ $seat->client->getFirstMediaUrl('profile') }}" alt="{{ $seat->client->name }}" class="rounded-circle me-3" width="48" height="48">
                                                                                        @else
                                                                                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px;">
                                                                                                <i class="bx bx-user fs-4 text-body-secondary"></i>
                                                                                            </div>
                                                                                        @endif
                                                                                        <div>
                                                                                            <h5 class="mb-0 fw-semibold">{{ $seat->client->name }}</h5>
                                                                                            <span class="text-body-secondary">{{ $seat->client->email }}</span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="mb-3">
                                                                                        <h6 class="mb-2">Current Status</h6>
                                                                                        @php
                                                                                            $statusColors = [
                                                                                                'pending' => '#f0ad4e',
                                                                                                'contacted' => '#5bc0de',
                                                                                                'proposal' => '#0275d8',
                                                                                                'accepted' => '#5cb85c',
                                                                                                'rejected' => '#d9534f'
                                                                                            ];
                                                                                            $statusColor = $statusColors[$seat->status] ?? '#6c757d';
                                                                                        @endphp
                                                                                        <span class="px-3 py-2 badge rounded-pill" style="background-color: {{ $statusColor }}; font-weight: 400;">
                                                                                            {{ ucfirst($seat->status) }}
                                                                                        </span>
                                                                                    </div>

                                                                                    <div class="mb-3">
                                                                                        <h6 class="mb-2">Budget Range</h6>
                                                                                        <p class="mb-0 fw-medium">{{ number_format($seat->budget_min, 2) }} - {{ number_format($seat->budget_max, 2) }} EGP</p>
                                                                                    </div>

                                                                                    <div class="mb-3">
                                                                                        <h6 class="mb-2">Applied On</h6>
                                                                                        <p class="mb-0 text-body-secondary">{{ $seat->created_at->format('M d, Y') }}</p>
                                                                                    </div>

                                                                                    <h6 class="mt-4 mb-2">Available Actions</h6>
                                                                                    <div class="list-group">
                                                                                        @foreach(['pending', 'contacted', 'proposal', 'accepted', 'rejected'] as $status)
                                                                                            @if($seat->status !== $status)
                                                                                                <form action="{{ route('client.seats.update-status', $seat) }}" method="POST">
                                                                                                    @csrf
                                                                                                    @method('PATCH')
                                                                                                    <input type="hidden" name="status" value="{{ $status }}">
                                                                                                    <button type="submit" class="list-group-item list-group-item-action">
                                                                                                        <i class="bx bx-transfer-alt me-2"></i> Set as {{ ucfirst($status) }}
                                                                                                    </button>
                                                                                                </form>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </div>

                                                                                    @if(!$project->hasWinner())
                                                                                        <div class="mt-4">
                                                                                            <form action="{{ route('client.projects.select-winner', ['project' => $project->id, 'seat' => $seat->id]) }}" method="POST">
                                                                                                @csrf
                                                                                                <button type="submit" class="btn w-100" style="background-color: #3e3e3e; color: white;">
                                                                                                    <i class="bx bx-trophy me-2"></i> Select as Winner
                                                                                                </button>
                                                                                            </form>
                                                                                        </div>
                                                                                    @endif
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
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <!-- Winner Section (if selected) -->
        @if($project->hasWinner())
            <div id="winner-section" class="mb-4 border-0 shadow-sm card">
                <div class="pt-4 pb-0 bg-transparent border-0 card-header">
                    <h4 class="mb-0 h5 text-primary">Selected Freelancer</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3 d-flex align-items-center">
                        @if($project->winner?->hasMedia('profile'))
                            <img src="{{ $project->winner?->getFirstMediaUrl('profile') }}" alt="{{ $project->winner->name }}" class="rounded-circle me-3" width="60" height="60">
                        @else
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                                <i class="bx bx-user fs-3 text-body-secondary"></i>
                            </div>
                        @endif
                        <div>
                            <h5 class="mb-1">{{ $project->winner->name }}</h5>
                            <p class="mb-0 text-body-secondary small">Selected on {{ $project->updated_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    <div class="alert alert-success">
                        <i class="bx bx-check-circle me-1"></i> This project has been awarded to a freelancer.
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
