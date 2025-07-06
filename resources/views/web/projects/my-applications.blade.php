<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title>My Applications | Bzns Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
</head>
<style>

</style>
<body>
    <main class="page-wrapper">
        @include('web.main.navbar')
        <section class="container pt-5">
            <div class="row">
                @include('web.sections.profile.side')
                <div class="col-md-9 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
                    <div class="ps-md-3 ps-lg-0 mt-md-2">
                        <div class="mb-4 d-flex align-items-center justify-content-between">
                            <h1 class="mb-0 h2 pt-xl-1">My Sent Applications</h1>
                            {{-- <a href="#" class="btn btn-primary"><i class="bx bx-plus fs-lg me-2"></i>New Request</a> --}}
                        </div>
                        <!-- Nav tabs -->
                        <ul class="mb-4 nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all-seats" role="tab"
                                    aria-controls="all" aria-selected="true">
                                    <i class="bx bx-download me-2"></i>All Requests
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pending-tab" data-bs-toggle="tab" href="#pending-seats" role="tab"
                                    aria-controls="pending-seats" aria-selected="false">
                                    <i class="bx bx-upload me-2"></i>Pending Requests
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="wins-tab" data-bs-toggle="tab" href="#wins-seats" role="tab"
                                    aria-controls="wins-seats" aria-selected="false">
                                    <i class="bx bx-archive me-2"></i>Wins
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="loss-tab" data-bs-toggle="tab" href="#loss-seats" role="tab"
                                    aria-controls="loss-seats" aria-selected="false">
                                    <i class="bx bx-archive me-2"></i>Loss
                                </a>
                            </li>
                        </ul>

                        <!-- Tab content -->
                        <div class="tab-content">
                            <!-- Received Requests -->
                            <div class="tab-pane fade show active" id="all-seats" role="tabpanel" aria-labelledby="all-tab">
                                <div class="table-responsive" style="height: 66vh; overflow-y: auto;">
                                    <table class="table table-hover table-striped border-bottom">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col">Project</th>
                                                <th scope="col">Budget</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Is Contacted or Proposal</th>
                                                <th scope="col">Accepted</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all_seats as $seat)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="p-2 text-white bg-dark rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                                            <i class="bx bx-user"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0">{{ $seat->batch?->project?->name }}</h6>
                                                            <span class="fs-sm text-muted">{{ $seat->batch?->project?->client?->name }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $seat->budget_min }} EGP  <br> {{ $seat->budget_max }} EGP</td>
                                                <td>{{ $seat->status }}</td>
                                                <td>
                                                    @if ($seat->is_contacted)
                                                        <span class="badge bg-light">Contacted</span>
                                                    @elseif ($seat->is_proposal)
                                                        <span class="badge bg-light">Proposal</span>
                                                    @else
                                                        <span class="badge bg-light">Not Action</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($seat->is_accepted)
                                                        <span class="badge bg-success">Accepted</span>
                                                    @elseif ($seat->is_rejected)
                                                        <span class="badge bg-danger">Rejected</span>
                                                    @else
                                                        <span class="badge bg-secondary">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="background: #3e3e3e; color: white; border-radius: 50px; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#555'" onmouseout="this.style.backgroundColor='#3e3e3e'">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                        <div class="shadow-sm dropdown-menu dropdown-menu-end" style="border-radius: 8px; border: none; overflow: hidden;">
                                                            <li><a class="py-2 dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#showProjectModal{{ $seat->id }}" style="transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor=''">
                                                        <i class="bx bx-show me-2" style="font-size: 1.1rem; color: #3e3e3e;"></i> View Details
                                                    </a>
                                                            <li><a class="py-2 dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#uploadProposalModal{{ $seat->id }}" style="transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor=''">
                                                        <i class="bx bx-upload me-2" style="font-size: 1.1rem; color: #3e3e3e;"></i> Upload Proposal
                                                    </a>
                                                            <li><a class="py-2 dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#markContactedModal{{ $seat->id }}" style="transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor=''">
                                                        <i class="bx bx-check-double me-2" style="font-size: 1.1rem; color: #3e3e3e;"></i> Mark as Contacted
                                                    </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


                                </div>
                            </div>

                            <!-- Sent Requests -->
                            <div class="tab-pane fade" id="pending-seats" role="tabpanel" aria-labelledby="pending-tab">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped border-bottom">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col">Project</th>
                                                <th scope="col">Budget</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Is Contacted or Proposal</th>
                                                <th scope="col">Accepted</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all_seats as $seat)
                                                @if (!$seat->is_accepted && !$seat->is_rejected) <!-- Only pending items -->
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="p-2 text-white bg-warning rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                                                <i class="bx bx-user"></i>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-0">{{ $seat->batch?->project?->name }}</h6>
                                                                <span class="fs-sm text-muted">{{ $seat->batch?->project?->client?->name }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $seat->budget_min }} EGP  <br> {{ $seat->budget_max }} EGP</td>
                                                    <td>{{ $seat->status }}</td>
                                                    <td>
                                                        @if ($seat->is_contacted)
                                                            <span class="badge bg-light">Contacted</span>
                                                        @elseif ($seat->is_proposal)
                                                            <span class="badge bg-light">Proposal</span>
                                                        @else
                                                            <span class="badge bg-light">Not Action</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-secondary">Pending</span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="background: #3e3e3e; color: white; border-radius: 50px; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#555'" onmouseout="this.style.backgroundColor='#3e3e3e'">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="shadow-sm dropdown-menu dropdown-menu-end" style="border-radius: 8px; border: none; overflow: hidden;">
                                                                <li><a class="py-2 dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#showProjectModal{{ $seat->id }}" style="transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor=''">
                                                                    <i class="bx bx-show me-2" style="font-size: 1.1rem; color: #3e3e3e;"></i> View Details
                                                                </a>
                                                                <li><a class="py-2 dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#uploadProposalModal{{ $seat->id }}" style="transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor=''">
                                                                    <i class="bx bx-upload me-2" style="font-size: 1.1rem; color: #3e3e3e;"></i> Upload Proposal
                                                                </a>
                                                                <li><a class="py-2 dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#markContactedModal{{ $seat->id }}" style="transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor=''">
                                                                    <i class="bx bx-check-double me-2" style="font-size: 1.1rem; color: #3e3e3e;"></i> Mark as Contacted
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Wins Requests -->
                            <div class="tab-pane fade" id="wins-seats" role="tabpanel" aria-labelledby="wins-tab">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped border-bottom">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col">Project</th>
                                                <th scope="col">Budget</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Is Contacted or Proposal</th>
                                                <th scope="col">Accepted</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all_seats as $seat)
                                                @if ($seat->is_accepted) <!-- Only accepted/won items -->
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="p-2 text-white bg-success rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                                                <i class="bx bx-user"></i>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-0">{{ $seat->batch?->project?->name }}</h6>
                                                                <span class="fs-sm text-muted">{{ $seat->batch?->project?->client?->name }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $seat->budget_min }} EGP  <br> {{ $seat->budget_max }} EGP</td>
                                                    <td>{{ $seat->status }}</td>
                                                    <td>
                                                        @if ($seat->is_contacted)
                                                            <span class="badge bg-light">Contacted</span>
                                                        @elseif ($seat->is_proposal)
                                                            <span class="badge bg-light">Proposal</span>
                                                        @else
                                                            <span class="badge bg-light">Not Action</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-success">Accepted</span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="background: #3e3e3e; color: white; border-radius: 50px; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#555'" onmouseout="this.style.backgroundColor='#3e3e3e'">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="shadow-sm dropdown-menu dropdown-menu-end" style="border-radius: 8px; border: none; overflow: hidden;">
                                                                <li><a class="py-2 dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#showProjectModal{{ $seat->id }}" style="transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor=''">
                                                                    <i class="bx bx-show me-2" style="font-size: 1.1rem; color: #3e3e3e;"></i> View Details
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Loss/Rejected Requests -->
                            <div class="tab-pane fade" id="loss-seats" role="tabpanel" aria-labelledby="loss-tab">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped border-bottom">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col">Project</th>
                                                <th scope="col">Budget</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Is Contacted or Proposal</th>
                                                <th scope="col">Accepted</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all_seats as $seat)
                                                @if ($seat->is_rejected) <!-- Only rejected items -->
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="p-2 text-white bg-danger rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                                                <i class="bx bx-user"></i>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-0">{{ $seat->batch?->project?->name }}</h6>
                                                                <span class="fs-sm text-muted">{{ $seat->batch?->project?->client?->name }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $seat->budget_min }} EGP  <br> {{ $seat->budget_max }} EGP</td>
                                                    <td>{{ $seat->status }}</td>
                                                    <td>
                                                        @if ($seat->is_contacted)
                                                            <span class="badge bg-light">Contacted</span>
                                                        @elseif ($seat->is_proposal)
                                                            <span class="badge bg-light">Proposal</span>
                                                        @else
                                                            <span class="badge bg-light">Not Action</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-danger">Rejected</span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="background: #3e3e3e; color: white; border-radius: 50px; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#555'" onmouseout="this.style.backgroundColor='#3e3e3e'">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="shadow-sm dropdown-menu dropdown-menu-end" style="border-radius: 8px; border: none; overflow: hidden;">
                                                                <li><a class="py-2 dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#showProjectModal{{ $seat->id }}" style="transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor=''">
                                                                    <i class="bx bx-show me-2" style="font-size: 1.1rem; color: #3e3e3e;"></i> View Details
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- Modals for each seat -->
                @foreach ($all_seats as $seat)
                    <!-- View Details Modal -->
                    <div class="modal fade" id="showProjectModal{{ $seat->id }}" tabindex="-1" aria-labelledby="showProjectModalLabel{{ $seat->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content" style="border-radius: 10px; overflow: hidden; border: none; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);">
                                <div class="modal-header bg-light" style=" border-bottom: 3px solid #3e3e3e; padding: 1.5rem;">
                                    <h5 class="modal-title" id="showProjectModalLabel{{ $seat->id }}" style="font-size: 1.25rem; font-weight: 600;">
                                        <i class="bx bx-briefcase me-2" style=" background-color: #f0f0f0; padding: 8px; border-radius: 50%; font-size: 1rem;"></i>Project Details
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Project header section -->
                                    <div class="mb-4 d-flex justify-content-between align-items-center">
                                        <h4 class="mb-0">{{ $seat->batch?->project?->name }}</h4>
                                        @php
                                            $statusColors = [
                                                'pending' => 'bg-warning',
                                                'active' => 'bg-info',
                                                'awarded' => 'bg-primary',
                                                'completed' => 'bg-success',
                                                'cancelled' => 'bg-danger'
                                            ];
                                            $statusColor = $statusColors[$seat->batch?->project?->status] ?? 'bg-secondary';
                                        @endphp
                                        <span class="badge {{ $statusColor }} px-3 py-2" style="border-radius: 50px; font-weight: 500; letter-spacing: 0.5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                            <i class="bx {{ $seat->batch?->project?->status == 'pending' ? 'bx-time' : ($seat->batch?->project?->status == 'active' ? 'bx-pulse' : ($seat->batch?->project?->status == 'awarded' ? 'bx-trophy' : ($seat->batch?->project?->status == 'cancelled' ? 'bx-x-circle' : 'bx-check-circle'))) }} me-1"></i>
                                            {{ ucfirst($seat->batch?->project?->status) }}
                                        </span>
                                    </div>

                                    <div class="row">
                                        @if($seat->batch?->project?->hasMedia('projects'))
                                        <div class="mb-4 col-12">
                                            <div class="overflow-hidden text-center position-relative" style="border-radius: 10px; max-height: 250px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                                                <img src="{{ $seat->batch?->project?->getFirstMediaUrl('projects') }}" alt="Project Image" class="img-fluid w-100 object-fit-cover" style="border-radius: 10px;">
                                            </div>
                                        </div>
                                        @endif
                                        <div class="mb-4 col-md-6">
                                            <div class="shadow-sm card h-100" style="border-radius: 10px; border: none; transition: all 0.3s ease;" onmouseover="this.style.boxShadow='0 8px 16px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.boxShadow='0 0.125rem 0.25rem rgba(0, 0, 0, 0.075)'">
                                                <div class="card-header">
                                                    <h5 class="mb-0 d-flex align-items-center">
                                                        <i class="bx bx-info-circle me-2"></i> Project Information
                                                    </h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="pb-3 mb-3 border-bottom">
                                                        <div class="mb-2 d-flex justify-content-between align-items-center">
                                                            <span class="text-muted small">Client</span>
                                                            <span class="badge bg-light text-dark">ID: {{ $seat->batch?->project?->id }}</span>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <i class="bx bx-user-circle me-2 fs-5"></i>
                                                            <span class="fw-medium">{{ $seat->batch?->project?->client?->name }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="mb-2 d-flex align-items-center">
                                                            <i class="bx bx-map me-2"></i>
                                                            <span class="fw-medium">{{ $seat->batch?->project?->location ?? 'Location not specified' }}</span>
                                                        </div>

                                                        <div class="mb-2 d-flex align-items-center">
                                                            <i class="bx bx-calendar me-2"></i>
                                                            <span>Created: {{ $seat->batch?->project?->created_at ? $seat->batch?->project?->created_at->format('M d, Y') : 'N/A' }}</span>
                                                        </div>

                                                        <div class="d-flex align-items-center">
                                                            <i class="bx bx-money me-2"></i>
                                                            <span class="fw-medium">Budget: {{ number_format($seat->batch?->project?->budget_min ?? 0) }} - {{ number_format($seat->batch?->project?->budget_max ?? 0) }} EGP</span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <h6 class="mb-2 fw-bold">Required Skills</h6>
                                                        <div>
                                                            @foreach($seat->batch?->project?->skills ?? [] as $skill)
                                                                <span class="mb-1 badge bg-dark text-light me-1" style="  font-weight: 400; padding: 6px 10px; border-radius: 4px; transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='#555'" onmouseout="this.style.backgroundColor='#3e3e3e'">{{ $skill }}</span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 col-md-6">
                                            <div class="shadow-sm card h-100" style="border-radius: 10px; border: none; transition: all 0.3s ease;" onmouseover="this.style.boxShadow='0 8px 16px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.boxShadow='0 0.125rem 0.25rem rgba(0, 0, 0, 0.075)'">
                                                <div class="card-header">
                                                    <h5 class="mb-0 d-flex align-items-center">
                                                        <i class="bx bx-chair me-2"></i> Your Application
                                                    </h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="pb-3 mb-3 border-bottom">
                                                        @php
                                                            $statusColors = [
                                                                'pending' => '#f0ad4e',
                                                                'contacted' => '#5bc0de',
                                                                'proposal' => '#0275d8',
                                                                'accepted' => '#5cb85c',
                                                                'rejected' => '#d9534f'
                                                            ];
                                                            $statusColor = $statusColors[$seat->status] ?? '#6c757d';
                                                            $statusIcon = $seat->status == 'pending' ? 'bx-time' :
                                                                        ($seat->status == 'contacted' ? 'bx-chat' :
                                                                        ($seat->status == 'proposal' ? 'bx-file' :
                                                                        ($seat->status == 'accepted' ? 'bx-check-circle' : 'bx-x-circle')));
                                                        @endphp
                                                        <div class="mb-2 d-flex justify-content-between align-items-center">
                                                            <h6 class="mb-0 fw-bold">Application Status</h6>
                                                            <span class="px-3 py-2 badge rounded-pill" style="background-color: {{ $statusColor }}">
                                                                <i class="bx {{ $statusIcon }} me-1"></i>
                                                                {{ ucfirst($seat->status) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="pb-3 mb-3 border-bottom">
                                                        <div class="mb-2 d-flex align-items-center">
                                                            <i class="bx bx-money me-2"></i>
                                                            <span class="fw-medium">Your Budget: {{ number_format($seat->budget_min) }} - {{ number_format($seat->budget_max) }} EGP</span>
                                                        </div>
                                                    </div>
                                                    <div class="pb-3 mb-3 border-bottom">
                                                        <h6 class="mb-2 fw-bold">Progress</h6>
                                                        <div class="flex-wrap gap-3 d-flex" style="padding: 10px;  border-radius: 8px;">
                                                            <div class="d-flex align-items-center">
                                                                <span class="me-2 badge {{ $seat->is_applied ? 'bg-success' : 'bg-secondary' }}">
                                                                    <i class="bx {{ $seat->is_applied ? 'bx-check' : 'bx-x' }}"></i>
                                                                </span>
                                                                <span>Applied</span>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <span class="me-2 badge {{ $seat->is_contacted ? 'bg-success' : 'bg-secondary' }}">
                                                                    <i class="bx {{ $seat->is_contacted ? 'bx-check' : 'bx-x' }}"></i>
                                                                </span>
                                                                <span>Contacted</span>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <span class="me-2 badge {{ $seat->is_proposal ? 'bg-success' : 'bg-secondary' }}">
                                                                    <i class="bx {{ $seat->is_proposal ? 'bx-check' : 'bx-x' }}"></i>
                                                                </span>
                                                                <span>Proposal</span>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <span class="me-2 badge {{ $seat->is_accepted ? 'bg-success' : ($seat->is_rejected ? 'bg-danger' : 'bg-secondary') }}">
                                                                    <i class="bx {{ $seat->is_accepted ? 'bx-check' : ($seat->is_rejected ? 'bx-x' : 'bx-minus') }}"></i>
                                                                </span>
                                                                <span>{{ $seat->is_accepted ? 'Accepted' : ($seat->is_rejected ? 'Rejected' : 'Pending Decision') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between small text-muted">
                                                        <span>ID: {{ $seat->id }}</span>
                                                        <span>Batch: {{ $seat->batch_id }}</span>
                                                    </div>
                                                    <div class="pt-3 mt-3 border-top">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <h6 class="mb-0 fw-bold">Your Proposal Document</h6>
                                                            @if ($seat->getMedia('proposals')->count() > 0)
                                                                <a href="{{ $seat->getFirstMediaUrl('proposals') }}" target="_blank" class="btn btn-sm btn-primary" style=" ">
                                                                    <i class="bx bx-download me-1"></i> Download
                                                                </a>
                                                            @else
                                                                <span class="text-muted">No proposal document available</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 col-12">
                                            <div class="shadow-sm card">
                                                <div class="card-header" style=" ">
                                                    <h5 class="mb-0 d-flex align-items-center">
                                                        <i class="bx bx-notepad me-2"></i> Details and Information
                                                    </h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <h6 class="mb-2 fw-bold">Project Details</h6>
                                                        <p class="mb-0">{{ $seat->batch?->project?->details }}</p>
                                                    </div>
                                                    @if($seat->batch?->project?->more_details)
                                                    <div class="pb-3 mb-3 border-bottom">
                                                        <h6 class="mb-2 fw-bold">Extended Details</h6>
                                                        <p class="mb-0">{{ $seat->batch?->project?->more_details }}</p>
                                                    </div>
                                                    @endif

                                                    @if($seat->batch?->project?->additional_notes)
                                                    <div>
                                                        <h6 class="mb-2 fw-bold">Additional Notes</h6>
                                                        <div class="p-3 rounded bg-light" style="border-left: 4px solid #3e3e3e;">
                                                            <p class="mb-0"><i class="bx bx-comment-detail me-2 text-muted"></i>{{ $seat->batch?->project?->additional_notes }}</p>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Project Timeline Section -->
                                        <div class="mb-4 col-12">
                                            <div class="shadow-sm card">
                                                <div class="card-header" style=" ">
                                                    <h5 class="mb-0 d-flex align-items-center">
                                                        <i class="bx bx-time-five me-2"></i> Project Timeline
                                                    </h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="px-3 timeline-wrapper position-relative" style="margin-top: 1.5rem;">
                                                        <!-- Timeline Line -->
                                                        <div class="timeline-line position-absolute" style="top: 0; bottom: 0; left: 0px; width: 2px; background-color: #e9ecef; background-image: linear-gradient(#e9ecef, #3e3e3e, #e9ecef);"></div>

                                                        <!-- Timeline Items -->
                                                        <div class="mb-3 timeline-item d-flex">
                                                            <div class="timeline-point rounded-circle bg-success" style="width: 16px; height: 16px; margin-right: 15px; z-index: 1; box-shadow: 0 0 0 4px rgba(92, 184, 92, 0.2);"></div>
                                                            <div>
                                                                <h6 class="mb-0 fw-bold">Project Created</h6>
                                                                <p class="mb-0 text-muted small">{{ $seat->batch?->project?->created_at ? $seat->batch?->project?->created_at->format('M d, Y') : 'N/A' }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 timeline-item d-flex">
                                                            <div class="timeline-point rounded-circle {{ $seat->batch?->project?->status == 'active' || $seat->batch?->project?->status == 'awarded' || $seat->batch?->project?->status == 'completed' ? 'bg-success' : 'bg-light' }}" style="width: 16px; height: 16px; margin-right: 15px; z-index: 1; box-shadow: 0 0 0 4px {{ $seat->batch?->project?->status == 'active' || $seat->batch?->project?->status == 'awarded' || $seat->batch?->project?->status == 'completed' ? 'rgba(92, 184, 92, 0.2)' : 'rgba(233, 236, 239, 0.5)' }};"></div>
                                                            <div>
                                                                <h6 class="mb-0 fw-bold">Project Active</h6>
                                                                <p class="mb-0 text-muted small">{{ $seat->batch?->project?->status == 'active' || $seat->batch?->project?->status == 'awarded' || $seat->batch?->project?->status == 'completed' ? 'Project is active' : 'Pending activation' }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 timeline-item d-flex">
                                                            <div class="timeline-point rounded-circle {{ $seat->is_applied ? 'bg-success' : 'bg-light' }}" style="width: 16px; height: 16px; margin-right: 15px; z-index: 1; box-shadow: 0 0 0 4px {{ $seat->is_applied ? 'rgba(92, 184, 92, 0.2)' : 'rgba(233, 236, 239, 0.5)' }};"></div>
                                                            <div>
                                                                <h6 class="mb-0 fw-bold">You Applied</h6>
                                                                <p class="mb-0 text-muted small">{{ $seat->created_at ? $seat->created_at->format('M d, Y') : 'N/A' }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 timeline-item d-flex">
                                                            <div class="timeline-point rounded-circle {{ $seat->is_contacted ? 'bg-success' : 'bg-light' }}" style="width: 16px; height: 16px; margin-right: 15px; z-index: 1; box-shadow: 0 0 0 4px {{ $seat->is_contacted ? 'rgba(92, 184, 92, 0.2)' : 'rgba(233, 236, 239, 0.5)' }};"></div>
                                                            <div>
                                                                <h6 class="mb-0 fw-bold">Contacted</h6>
                                                                <p class="mb-0 text-muted small">{{ $seat->contacted_at ? $seat->contacted_at->format('M d, Y') : 'Not contacted yet' }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 timeline-item d-flex">
                                                            <div class="timeline-point rounded-circle {{ $seat->is_proposal ? 'bg-success' : 'bg-light' }}" style="width: 16px; height: 16px; margin-right: 15px; z-index: 1; box-shadow: 0 0 0 4px {{ $seat->is_proposal ? 'rgba(92, 184, 92, 0.2)' : 'rgba(233, 236, 239, 0.5)' }};"></div>
                                                            <div>
                                                                <h6 class="mb-0 fw-bold">Proposal Submitted</h6>
                                                                <p class="mb-0 text-muted small">{{ $seat->proposal_at ? $seat->proposal_at->format('M d, Y') : 'No proposal submitted yet' }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="timeline-item d-flex">
                                                            <div class="timeline-point rounded-circle {{ $seat->is_accepted ? 'bg-success' : ($seat->is_rejected ? 'bg-danger' : 'bg-light') }}" style="width: 16px; height: 16px; margin-right: 15px; z-index: 1; box-shadow: 0 0 0 4px {{ $seat->is_accepted ? 'rgba(92, 184, 92, 0.2)' : ($seat->is_rejected ? 'rgba(217, 83, 79, 0.2)' : 'rgba(233, 236, 239, 0.5)') }};"></div>
                                                            <div>
                                                                <h6 class="mb-0 fw-bold">Final Decision</h6>
                                                                <p class="mb-0 text-muted small">{{ $seat->is_accepted ? 'Accepted' : ($seat->is_rejected ? 'Rejected' : 'Pending decision') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer" style="border-top: 2px solid #eaeaea;">
                                    <button type="button" class="btn" style="  border-radius: 50px; padding: 8px 24px; transition: all 0.3s ease;" data-bs-dismiss="modal" onmouseover="this.style.backgroundColor='#555'" onmouseout="this.style.backgroundColor='#3e3e3e'">
                                        <i class="bx bx-x me-1"></i> Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Proposal Modal -->
                    <div class="modal fade" id="uploadProposalModal{{ $seat->id }}" tabindex="-1" aria-labelledby="uploadProposalModalLabel{{ $seat->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="border-radius: 10px; overflow: hidden; border: none; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);">
                                <div class="modal-header" style=" border-bottom: 3px solid #3e3e3e; padding: 1.5rem;">
                                    <h5 class="modal-title" id="uploadProposalModalLabel{{ $seat->id }}" style="font-size: 1.25rem; font-weight: 600;">
                                        <i class="bx bx-upload me-2" style="color: white; background-color: #3e3e3e; padding: 8px; border-radius: 50%; font-size: 1rem;"></i>
                                        Upload Proposal
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('client.seats.upload_proposal', $seat->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="p-4 modal-body">
                                        <!-- Introduction text -->
                                        <div class="mb-4 text-center">
                                            <div class="mb-3">
                                                <i class="bx bx-file-blank" style="font-size: 3rem; color: #3e3e3e;"></i>
                                            </div>
                                            <p class="text-muted">Upload your project proposal document in PDF, DOC, or DOCX format (Max: 10MB)</p>
                                        </div>

                                        <!-- Upload Area -->
                                        <div class="mb-4">
                                            <div class="p-4 rounded" style="border: 2px dashed #ccc;  transition: all 0.3s ease;" id="upload-area{{ $seat->id }}" onclick="document.getElementById('proposal{{ $seat->id }}').click();">
                                                <div class="text-center">
                                                    <i class="bx bx-cloud-upload" style="font-size: 2rem; color: #3e3e3e;"></i>
                                                    <p class="mb-0 fw-medium">Click to select a file or drag and drop</p>
                                                    <p class="mb-0 small text-muted" id="file-name{{ $seat->id }}">No file selected</p>
                                                </div>
                                                <input class="d-none" type="file" id="proposal{{ $seat->id }}" name="proposal" required onchange="updateFileName({{ $seat->id }})">
                                            </div>
                                        </div>

                                        <!-- Additional Notes -->
                                        <div class="mb-3">
                                            <label for="notes{{ $seat->id }}" class="form-label fw-medium">
                                                <i class="bx bx-comment-detail me-2 text-muted"></i>Additional Notes
                                            </label>
                                            <textarea class="form-control" id="notes{{ $seat->id }}" name="notes" rows="3" style="border-radius: 8px; border-color: #dee2e6; resize: none;" placeholder="Add any additional information or context about your proposal..."></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" style="border-radius: 50px; padding: 8px 24px; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#f0f0f0'" onmouseout="this.style.backgroundColor='transparent'">Cancel</button>
                                        <button type="submit" class="btn" style=" border-radius: 50px; padding: 8px 24px; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#555'" onmouseout="this.style.backgroundColor='#3e3e3e'"><i class="bx bx-upload me-1"></i> Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Mark as Contacted Modal -->
                    <div class="modal fade" id="markContactedModal{{ $seat->id }}" tabindex="-1" aria-labelledby="markContactedModalLabel{{ $seat->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="border-radius: 10px; overflow: hidden; border: none; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);">
                                <div class="modal-header" style="border-bottom: 3px solid #3e3e3e; padding: 1.5rem;">
                                    <h5 class="modal-title" id="markContactedModalLabel{{ $seat->id }}" style="font-size: 1.25rem; font-weight: 600;">
                                        <i class="bx bx-check-double me-2" style=" padding: 8px; border-radius: 50%; font-size: 1rem;"></i>
                                        Mark as Contacted
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('client.seats.mark_contacted', $seat->id) }}" method="POST">
                                    @csrf
                                    <div class="p-4 modal-body">
                                        <div class="mb-4 text-center">
                                            <div class="mb-3">
                                                <i class="bx bx-chat" style="font-size: 3rem; color: #3e3e3e;"></i>
                                            </div>
                                            <h5>Update Communication Status</h5>
                                            <p class="text-muted">This action will mark this project request as contacted, indicating that you've been in communication with the project owner.</p>
                                        </div>

                                        <div class="p-3 mb-3 rounded bg-light" style="border-left: 4px solid #3e3e3e;">
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-info-circle me-2" style="font-size: 1.5rem; color: #3e3e3e;"></i>
                                                <div>
                                                    <p class="mb-0 fw-medium">This will update the timeline of your application process and change your request status to "Contacted".</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" style="border-radius: 50px; padding: 8px 24px; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#f0f0f0'" onmouseout="this.style.backgroundColor='transparent'">Cancel</button>
                                        <button type="submit" class="btn" style=" border-radius: 50px; padding: 8px 24px; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#555'" onmouseout="this.style.backgroundColor='#3e3e3e'"><i class="bx bx-check me-1"></i> Confirm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
     <!-- JavaScript for file upload handling -->
     <script>
        function updateFileName(seatId) {
            const fileInput = document.getElementById('proposal' + seatId);
            const fileNameElement = document.getElementById('file-name' + seatId);
            const uploadArea = document.getElementById('upload-area' + seatId);

            if (fileInput.files && fileInput.files[0]) {
                const fileName = fileInput.files[0].name;
                fileNameElement.textContent = fileName;
                fileNameElement.classList.add('fw-medium', 'text-success');
                uploadArea.style.borderColor = '#3e3e3e';
                uploadArea.style.backgroundColor = 'green';

                // Add file icon based on extension
                const fileExtension = fileName.split('.').pop().toLowerCase();
                let iconClass = 'bx-file';

                if (fileExtension === 'pdf') {
                    iconClass = 'bx-file-pdf';
                } else if (fileExtension === 'doc' || fileExtension === 'docx') {
                    iconClass = 'bx-file-doc';
                }

                const iconElement = uploadArea.querySelector('.bx');
                iconElement.className = 'bx ' + iconClass;
                iconElement.style.color = '#3e3e3e';
            } else {
                fileNameElement.textContent = 'No file selected';
                fileNameElement.classList.remove('fw-medium', 'text-success');
                uploadArea.style.borderColor = '#ccc';
                uploadArea.style.backgroundColor = '#f8f9fa';
            }
        }

        // Add drag and drop functionality
        document.addEventListener('DOMContentLoaded', function() {
            const uploadAreas = document.querySelectorAll('[id^="upload-area"]');

            uploadAreas.forEach(area => {
                const seatId = area.id.replace('upload-area', '');
                const fileInput = document.getElementById('proposal' + seatId);

                // Prevent default drag behaviors
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    area.addEventListener(eventName, preventDefaults, false);
                });

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                // Highlight drop area when item is dragged over it
                ['dragenter', 'dragover'].forEach(eventName => {
                    area.addEventListener(eventName, highlight, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    area.addEventListener(eventName, unhighlight, false);
                });

                function highlight() {
                    area.style.borderColor = '#3e3e3e';
                    area.style.backgroundColor = '#f8fff8';
                }

                function unhighlight() {
                    area.style.borderColor = '#ccc';
                    area.style.backgroundColor = '#f8f9fa';
                }

                // Handle dropped files
                area.addEventListener('drop', handleDrop, false);

                function handleDrop(e) {
                    const dt = e.dataTransfer;
                    const files = dt.files;

                    fileInput.files = files;
                    updateFileName(seatId);
                }
            });
        });
    </script>
</body>
</html>
