<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasShow{{$client->id}}" aria-labelledby="offcanvasShowLabel" style="width:1500px;">
    <div class="text-white offcanvas-header bg-dark">
        <h5 id="offcanvasShowLabel text-white" class="mb-0" style="color:white!important">
            <i class="ri-user-3-line me-2"></i> {{ x_('Client Details', 'clients') }}
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="mb-4 d-flex align-items-center">
            <div class="me-4">
                @if($client->hasMedia('profile'))
                    <div class="avatar avatar-xxl avatar-rounded">
                        <img src="{{ $client->getFirstMediaUrl('profile') }}" alt="{{ $client->name }}" class="avatar-img">
                    </div>
                @else
                    <div class="avatar avatar-xxl avatar-soft-primary avatar-rounded">
                        <span class="initial-wrap">
                            {{ strtoupper(substr($client->name, 0, 1)) }}
                        </span>
                    </div>
                @endif
            </div>
            <div>
                <div class="mb-1 d-flex align-items-center">
                    <h3 class="mb-0 fw-bold">{{ $client->name }}</h3>
                    <div class="ms-3">
                        @if($client->is_active)
                            <span class="badge bg-success">{{ x_('Active', 'clients') }}</span>
                        @else
                            <span class="badge bg-danger">{{ x_('Inactive', 'clients') }}</span>
                        @endif

                        @if($client->is_company)
                            <span class="badge bg-primary ms-1">{{ x_('Company', 'clients') }}</span>
                        @else
                            <span class="badge bg-info ms-1">{{ x_('Individual', 'clients') }}</span>
                        @endif

                        @if($client->hasActiveSubscription())
                            <span class="badge bg-warning ms-1">{{ x_('Active Subscription', 'clients') }}</span>
                        @endif
                    </div>
                </div>
                <p class="mb-0 text-muted fs-6">{{ $client->title ?? x_('No title provided', 'clients') }}</p>
                <div class="mt-2">
                    @if($client->industry)
                        <span class="badge badge-soft-primary me-1">{{ $client->industry->name }}</span>
                    @endif
                    @foreach($client->subcategories as $subcategory)
                        <span class="badge badge-soft-secondary me-1">{{ $subcategory->name }}</span>
                    @endforeach
                </div>
                <div class="mt-2 d-flex">
                    @if($client->email)
                        <a href="mailto:{{ $client->email }}" class="btn btn-xs btn-icon btn-soft-primary me-2">
                            <span class="btn-icon-wrap"><i class="ri-mail-line"></i></span>
                        </a>
                    @endif
                    @if($client->phone)
                        <a href="tel:{{ $client->phone }}" class="btn btn-xs btn-icon btn-soft-success me-2">
                            <span class="btn-icon-wrap"><i class="ri-phone-line"></i></span>
                        </a>
                    @endif
                    @if($client->website)
                        <a href="{{ $client->website }}" target="_blank" class="btn btn-xs btn-icon btn-soft-info me-2">
                            <span class="btn-icon-wrap"><i class="ri-global-line"></i></span>
                        </a>
                    @endif
                    @if($client->linkedin)
                        <a href="{{ $client->linkedin }}" target="_blank" class="btn btn-xs btn-icon btn-soft-info me-2">
                            <span class="btn-icon-wrap"><i class="ri-linkedin-box-line"></i></span>
                        </a>
                    @endif
                    @if($client->facebook)
                        <a href="{{ $client->facebook }}" target="_blank" class="btn btn-xs btn-icon btn-soft-primary me-2">
                            <span class="btn-icon-wrap"><i class="ri-facebook-box-line"></i></span>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="mb-3">
            <ul class="nav nav-tabs nav-line-tabs nav-filled nav-light">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#info{{$client->id}}">
                        <i class="ri-information-line me-2"></i>{{ x_('Basic Info', 'clients') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#projects{{$client->id}}">
                        <i class="ri-folder-chart-line me-2"></i>{{ x_('Projects', 'clients') }}
                        <span class="badge rounded-pill bg-light text-dark ms-1">{{ $client->batches->count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#applications{{$client->id}}">
                        <i class="ri-user-add-line me-2"></i>{{ x_('Applications', 'clients') }}
                        <span class="badge rounded-pill bg-light text-dark ms-1">{{ $client->seats->count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#services{{$client->id}}">
                        <i class="ri-service-line me-2"></i>{{ x_('Services', 'clients') }}
                        <span class="badge rounded-pill bg-light text-dark ms-1">{{ $client->services->count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#portfolio{{$client->id}}">
                        <i class="ri-gallery-line me-2"></i>{{ x_('Portfolio', 'clients') }}
                        <span class="badge rounded-pill bg-light text-dark ms-1">{{ $client->portfolios->count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#demands{{$client->id}}">
                        <i class="ri-exchange-dollar-line me-2"></i>{{ x_('Demands', 'clients') }}
                        <span class="badge rounded-pill bg-light text-dark ms-1">{{ $client->from_demands->count() + $client->to_demands->count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#subscriptions{{$client->id}}">
                        <i class="ri-vip-crown-line me-2"></i>{{ x_('Subscriptions', 'clients') }}
                        <span class="badge rounded-pill bg-light text-dark ms-1">{{ $client->subscriptions->count() }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <!-- Basic Info Tab -->
            <div class="tab-pane fade show active" id="info{{$client->id}}">
                <div class="mb-3 card card-border">
                    <div class="card-header card-header-action">
                        <h6 class="mb-0"><i class="ri-user-3-line me-2"></i>{{ x_('Basic Information', 'clients') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label class="form-label text-muted small">{{ x_('Name', 'clients') }}</label>
                                <p class="mb-0">{{ $client->name }}</p>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label text-muted small">{{ x_('Title', 'clients') }}</label>
                                <p class="mb-0">{{ $client->title ?? x_('N/A', 'admin') }}</p>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label text-muted small">{{ x_('Email', 'clients') }}</label>
                                <p class="mb-0">{{ $client->email }}</p>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label text-muted small">{{ x_('Phone', 'clients') }}</label>
                                <p class="mb-0">{{ $client->phone ?? x_('N/A', 'admin') }}</p>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label text-muted small">{{ x_('Company Size', 'clients') }}</label>
                                <p class="mb-0">{{ $client->company_size ?? x_('N/A', 'admin') }}</p>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label text-muted small">{{ x_('Account Created', 'clients') }}</label>
                                <p class="mb-0">{{ $client->created_at ? $client->created_at->format('M d, Y') : x_('N/A', 'admin') }}</p>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label text-muted small">{{ x_('Last Seen', 'clients') }}</label>
                                <p class="mb-0">{{ $client->last_seen ? $client->last_seen->diffForHumans() : x_('Never', 'clients') }}</p>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label text-muted small">{{ x_('Status', 'clients') }}</label>
                                <p class="mb-0">
                                    @if($client->is_active)
                                        <span class="badge bg-success">{{ x_('Active', 'clients') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ x_('Inactive', 'clients') }}</span>
                                    @endif

                                    @if($client->is_verified)
                                        <span class="badge bg-info ms-1">{{ x_('Verified', 'clients') }}</span>
                                    @else
                                        <span class="badge bg-warning ms-1">{{ x_('Unverified', 'clients') }}</span>
                                    @endif

                                    @if($client->is_decision_maker)
                                        <span class="badge bg-primary ms-1">{{ x_('Decision Maker', 'clients') }}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 card card-border">
                    <div class="card-header card-header-action">
                        <h6 class="mb-0"><i class="ri-map-pin-2-line me-2"></i>{{ x_('Address Information', 'clients') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-sm-12">
                                <label class="form-label text-muted small">{{ x_('Address', 'clients') }}</label>
                                <p class="mb-0">{{ $client->address ?? x_('N/A', 'admin') }}</p>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label text-muted small">{{ x_('City', 'clients') }}</label>
                                <p class="mb-0">{{ $client->city ?? x_('N/A', 'admin') }}</p>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label text-muted small">{{ x_('Country', 'clients') }}</label>
                                <p class="mb-0">{{ $client->country ?? x_('N/A', 'admin') }}</p>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label text-muted small">{{ x_('Zip/Postal Code', 'clients') }}</label>
                                <p class="mb-0">{{ $client->zip ?? x_('N/A', 'admin') }}</p>
                            </div>
                            @if($client->map)
                            <div class="mb-3 col-sm-12">
                                <label class="form-label text-muted small">{{ x_('Map Location', 'clients') }}</label>
                                <div class="mt-2 ratio ratio-21x9">
                                    <iframe src="{{ $client->map }}" allowfullscreen></iframe>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mb-3 card card-border">
                    <div class="card-header card-header-action">
                        <h6 class="mb-0"><i class="ri-links-line me-2"></i>{{ x_('Social Media & External Links', 'clients') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label class="form-label text-muted small">{{ x_('Website', 'clients') }}</label>
                                <p class="mb-0">
                                    @if($client->website)
                                        <a href="{{ $client->website }}" target="_blank" class="text-primary">
                                            {{ $client->website }}
                                            <i class="ri-external-link-line ms-1"></i>
                                        </a>
                                    @else
                                        {{ x_('N/A', 'admin') }}
                                    @endif
                                </p>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label text-muted small">{{ x_('Facebook', 'clients') }}</label>
                                <p class="mb-0">
                                    @if($client->facebook)
                                        <a href="{{ $client->facebook }}" target="_blank" class="text-primary">
                                            {{ $client->facebook }}
                                            <i class="ri-external-link-line ms-1"></i>
                                        </a>
                                    @else
                                        {{ x_('N/A', 'admin') }}
                                    @endif
                                </p>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label text-muted small">{{ x_('LinkedIn', 'clients') }}</label>
                                <p class="mb-0">
                                    @if($client->linkedin)
                                        <a href="{{ $client->linkedin }}" target="_blank" class="text-primary">
                                            {{ $client->linkedin }}
                                            <i class="ri-external-link-line ms-1"></i>
                                        </a>
                                    @else
                                        {{ x_('N/A', 'admin') }}
                                    @endif
                                </p>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label text-muted small">{{ x_('Instagram', 'clients') }}</label>
                                <p class="mb-0">
                                    @if($client->instagram)
                                        <a href="{{ $client->instagram }}" target="_blank" class="text-primary">
                                            {{ $client->instagram }}
                                            <i class="ri-external-link-line ms-1"></i>
                                        </a>
                                    @else
                                        {{ x_('N/A', 'admin') }}
                                    @endif
                                </p>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label text-muted small">{{ x_('YouTube', 'clients') }}</label>
                                <p class="mb-0">
                                    @if($client->youtube)
                                        <a href="{{ $client->youtube }}" target="_blank" class="text-primary">
                                            {{ $client->youtube }}
                                            <i class="ri-external-link-line ms-1"></i>
                                        </a>
                                    @else
                                        {{ x_('N/A', 'admin') }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Projects Tab -->
            <div class="tab-pane fade" id="projects{{$client->id}}">
                @if($client->batches->count() > 0)
                    <div class="mb-3 card card-border">
                        <div class="card-header card-header-action">
                            <h6 class="mb-0">
                                <i class="ri-folder-chart-line me-2"></i>{{ x_('Client Projects', 'clients') }}
                                <span class="badge bg-primary ms-2">{{ $client->batches->count() }}</span>
                            </h6>
                        </div>
                        <div class="p-0 card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ x_('Project', 'clients') }}</th>
                                            <th>{{ x_('Status', 'clients') }}</th>
                                            <th>{{ x_('Budget', 'clients') }}</th>
                                            <th>{{ x_('Seats', 'clients') }}</th>
                                            <th>{{ x_('Created', 'clients') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($client->batches as $batch)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if($batch->project->hasMedia('project_image'))
                                                            <div class="avatar avatar-xs avatar-rounded me-2">
                                                                <img src="{{ $batch->project->getFirstMediaUrl('project_image') }}" alt="{{ $batch->project->name }}" class="avatar-img">
                                                            </div>
                                                        @else
                                                            <div class="avatar avatar-xs avatar-soft-primary avatar-rounded me-2">
                                                                <span class="initial-wrap">{{ strtoupper(substr($batch->project->name, 0, 1)) }}</span>
                                                            </div>
                                                        @endif
                                                        <div>
                                                            <span class="d-block fw-medium">{{ $batch->project->name }}</span>
                                                            <span class="text-muted small">{{ $batch->project->subcategories?->pluck('name')->implode(', ') }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($batch->project->status == 'draft')
                                                        <span class="badge badge-soft-secondary">{{ x_('Draft', 'clients') }}</span>
                                                    @elseif($batch->project->status == 'published')
                                                        <span class="badge badge-soft-success">{{ x_('Published', 'clients') }}</span>
                                                    @elseif($batch->project->status == 'closed')
                                                        <span class="badge badge-soft-danger">{{ x_('Closed', 'clients') }}</span>
                                                    @else
                                                        <span class="badge badge-soft-warning">{{ ucfirst($batch->project->status) }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="fw-medium">
                                                        {{ $batch->project->budget_min }} - {{ $batch->project->budget_max }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-1 progress me-2" style="height: 6px;">
                                                            <div class="progress-bar bg-primary" style="width: {{ $batch->progress }}%"></div>
                                                        </div>
                                                        <span class="small fw-medium">{{ $batch->getAvailableSeatsCount() }}/{{ $batch->total_seats }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-muted">{{ $batch->created_at->format('M d, Y') }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card card-border">
                        <div class="card-body">
                            <div class="p-4 text-center">
                                <div class="mb-3 avatar avatar-icon avatar-lg avatar-soft-secondary">
                                    <span class="initial-wrap">
                                        <i class="ri-folder-chart-line"></i>
                                    </span>
                                </div>
                                <h5>{{ x_('No Projects Found', 'clients') }}</h5>
                                <p class="mb-0">{{ x_('This client hasn\'t created any projects yet.', 'clients') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Applications Tab -->
            <div class="tab-pane fade" id="applications{{$client->id}}">
                @if($client->seats->count() > 0)
                    <div class="mb-3 card card-border">
                        <div class="card-header card-header-action">
                            <h6 class="mb-0">
                                <i class="ri-user-add-line me-2"></i>{{ x_('Project Applications', 'clients') }}
                                <span class="badge bg-primary ms-2">{{ $client->seats->count() }}</span>
                            </h6>
                        </div>
                        <div class="p-0 card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ x_('Project', 'clients') }}</th>
                                            <th>{{ x_('Status', 'clients') }}</th>
                                            <th>{{ x_('Budget Offered', 'clients') }}</th>
                                            <th>{{ x_('Timeline', 'clients') }}</th>
                                            <th>{{ x_('Applied', 'clients') }}</th>
                                            <th>{{ x_('Actions', 'clients') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($client->seats as $seat)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if($seat->batch->project->hasMedia('project_image'))
                                                            <div class="avatar avatar-xs avatar-rounded me-2">
                                                                <img src="{{ $seat->batch->project->getFirstMediaUrl('project_image') }}" alt="{{ $seat->batch->project->name }}" class="avatar-img">
                                                            </div>
                                                        @else
                                                            <div class="avatar avatar-xs avatar-soft-primary avatar-rounded me-2">
                                                                <span class="initial-wrap">{{ strtoupper(substr($seat->batch->project->name, 0, 1)) }}</span>
                                                            </div>
                                                        @endif
                                                        <div>
                                                            <span class="d-block fw-medium">{{ $seat->batch->project->name }}</span>
                                                            <span class="text-muted small">{{ $seat->batch->project->subcategories?->pluck('name')->implode(', ') }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($seat->status == 'pending')
                                                        <span class="badge badge-soft-warning">{{ x_('Pending', 'clients') }}</span>
                                                    @elseif($seat->status == 'approved')
                                                        <span class="badge badge-soft-success">{{ x_('Approved', 'clients') }}</span>
                                                    @elseif($seat->status == 'rejected')
                                                        <span class="badge badge-soft-danger">{{ x_('Rejected', 'clients') }}</span>
                                                    @elseif($seat->status == 'cancelled')
                                                        <span class="badge badge-soft-secondary">{{ x_('Cancelled', 'clients') }}</span>
                                                    @else
                                                        <span class="badge badge-soft-info">{{ ucfirst($seat->status) }}</span>
                                                    @endif
                                                    @if($seat->has_proposal)
                                                        <span class="badge badge-soft-primary ms-1">{{ x_('Has Proposal', 'clients') }}</span>
                                                    @endif
                                                    @if($seat->is_contacted)
                                                        <span class="badge badge-soft-info ms-1">{{ x_('Contacted', 'clients') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="fw-medium">
                                                        {{ $seat->budget_min }} - {{ $seat->budget_max }}
                                                    </span>
                                                </td>
                                                <td>{{ $seat->timeline }} {{ x_('days', 'clients') }}</td>
                                                <td>
                                                    <span class="text-muted">{{ $seat->created_at->format('M d, Y') }}</span>
                                                </td>
                                                <td>
                                                    @if($seat->hasMedia('proposal'))
                                                        <a href="{{ $seat->getFirstMediaUrl('proposal') }}" class="btn btn-xs btn-icon btn-soft-success me-1" target="_blank" data-bs-toggle="tooltip" title="{{ x_('Download Proposal', 'clients') }}">
                                                            <span class="btn-icon-wrap"><i class="ri-file-download-line"></i></span>
                                                        </a>
                                                    @endif
                                                    <button type="button" class="btn btn-xs btn-icon btn-soft-primary me-1" data-bs-toggle="tooltip" title="{{ x_('View Project', 'clients') }}">
                                                        <span class="btn-icon-wrap"><i class="ri-eye-line"></i></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card card-border">
                        <div class="card-body">
                            <div class="p-4 text-center">
                                <div class="mb-3 avatar avatar-icon avatar-lg avatar-soft-secondary">
                                    <span class="initial-wrap">
                                        <i class="ri-user-add-line"></i>
                                    </span>
                                </div>
                                <h5>{{ x_('No Applications Found', 'clients') }}</h5>
                                <p class="mb-0">{{ x_('This client hasn\'t applied to any project seats yet.', 'clients') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- Services Tab -->
            <div class="tab-pane fade" id="services{{$client->id}}">
                @if($client->services->count() > 0)
                    <div class="mb-3 card card-border">
                        <div class="card-header card-header-action">
                            <h6 class="mb-0">
                                <i class="ri-service-line me-2"></i>{{ x_('Client Services', 'clients') }}
                                <span class="badge bg-primary ms-2">{{ $client->services->count() }}</span>
                            </h6>
                        </div>
                        <div class="p-0 card-body">
                            <div class="p-3 row g-3">
                                @foreach($client->services as $service)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card card-border h-100">
                                            <div class="position-relative">
                                                @if(!empty($service->image))
                                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="card-img-top" style="height: 160px; object-fit: cover;">
                                                @else
                                                    <div class="d-flex justify-content-center align-items-center bg-light" style="height: 160px;">
                                                        <i class="ri-service-line ri-3x text-muted"></i>
                                                    </div>
                                                @endif
                                                <div class="bottom-0 p-2 position-absolute end-0">
                                                    @if($service->is_active)
                                                        <span class="badge bg-success">{{ x_('Active', 'clients') }}</span>
                                                    @else
                                                        <span class="badge bg-danger">{{ x_('Inactive', 'clients') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h6 class="mb-1 card-title">{{ $service->title }}</h6>
                                                <p class="mb-2 text-muted small">
                                                    @if($service->subcategory)
                                                        {{ $service->subcategory->name }}
                                                    @endif
                                                </p>
                                                <div class="mb-2">
                                                    <span class="badge badge-soft-primary me-1">${{ $service->price }}</span>
                                                    <span class="badge badge-soft-secondary">{{ $service->delivery_time }} {{ x_('days', 'clients') }}</span>
                                                </div>
                                                <p class="mb-0 card-text small text-truncate">{{ $service->description }}</p>
                                            </div>
                                            <div class="pt-0 bg-transparent border-0 card-footer">
                                                <button type="button" class="btn btn-xs btn-soft-primary">
                                                    <i class="ri-eye-line me-1"></i> {{ x_('View Details', 'clients') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card card-border">
                        <div class="card-body">
                            <div class="p-4 text-center">
                                <div class="mb-3 avatar avatar-icon avatar-lg avatar-soft-secondary">
                                    <span class="initial-wrap">
                                        <i class="ri-service-line"></i>
                                    </span>
                                </div>
                                <h5>{{ x_('No Services Found', 'clients') }}</h5>
                                <p class="mb-0">{{ x_('This client hasn\'t created any services yet.', 'clients') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Portfolio Tab -->
            <div class="tab-pane fade" id="portfolio{{$client->id}}">
                @if($client->portfolios->count() > 0)
                    <div class="mb-3 card card-border">
                        <div class="card-header card-header-action">
                            <h6 class="mb-0">
                                <i class="ri-gallery-line me-2"></i>{{ x_('Client Portfolio', 'clients') }}
                                <span class="badge bg-primary ms-2">{{ $client->portfolios->count() }}</span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                @foreach($client->portfolios as $portfolio)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card card-border h-100">
                                            @if($portfolio->hasMedia('portfolio'))
                                                <div id="portfolio-carousel-{{ $portfolio->id }}" class="carousel slide" data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        @foreach($portfolio->getMedia('portfolio') as $key => $media)
                                                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                                                <img src="{{ $media->getUrl() }}" class="d-block w-100" alt="{{ x_('Portfolio Image', 'clients') }}" style="height: 180px; object-fit: cover;">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    @if($portfolio->getMedia('portfolio')->count() > 1)
                                                        <button class="carousel-control-prev" type="button" data-bs-target="#portfolio-carousel-{{ $portfolio->id }}" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">{{ x_('Previous', 'clients') }}</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button" data-bs-target="#portfolio-carousel-{{ $portfolio->id }}" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">{{ x_('Next', 'clients') }}</span>
                                                        </button>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="p-3 text-center bg-light" style="height: 180px;">
                                                    <div class="d-flex align-items-center justify-content-center h-100">
                                                        <i class="ri-image-line display-4 text-muted"></i>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="card-body">
                                                <h6 class="mb-1 card-title">{{ $portfolio->name }}</h6>
                                                @if($portfolio->url)
                                                    <p class="mb-2 small">
                                                        <a href="{{ $portfolio->url }}" target="_blank" class="text-primary">
                                                            <i class="ri-external-link-line me-1"></i>{{ x_('View Project', 'clients') }}
                                                        </a>
                                                    </p>
                                                @endif
                                                <p class="mb-0 card-text small">{{ Illuminate\Support\Str::limit($portfolio->details, 100) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card card-border">
                        <div class="card-body">
                            <div class="p-4 text-center">
                                <div class="mb-3 avatar avatar-icon avatar-lg avatar-soft-secondary">
                                    <span class="initial-wrap">
                                        <i class="ri-gallery-line"></i>
                                    </span>
                                </div>
                                <h5>{{ x_('No Portfolio Items Found', 'clients') }}</h5>
                                <p class="mb-0">{{ x_('This client hasn\'t added any portfolio items yet.', 'clients') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Demands Tab -->
            <div class="tab-pane fade" id="demands{{$client->id}}">
                @if($client->from_demands->count() > 0 || $client->to_demands->count() > 0)
                    @if($client->from_demands->count() > 0)
                        <div class="mb-3 card card-border">
                            <div class="card-header card-header-action">
                                <h6 class="mb-0">
                                    <i class="ri-upload-2-line me-2"></i>{{ x_('Sent Demands', 'clients') }}
                                    <span class="badge bg-primary ms-2">{{ $client->from_demands->count() }}</span>
                                </h6>
                            </div>
                            <div class="p-0 card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{ x_('To', 'clients') }}</th>
                                                <th>{{ x_('Title', 'clients') }}</th>
                                                <th>{{ x_('Status', 'clients') }}</th>
                                                <th>{{ x_('Date', 'clients') }}</th>
                                                <th>{{ x_('Actions', 'clients') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($client->from_demands as $demand)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar avatar-xs avatar-soft-primary avatar-rounded me-2">
                                                                <span class="initial-wrap">{{ strtoupper(substr($demand?->to_client?->name, 0, 1)) }}</span>
                                                            </div>
                                                            <span>{{ $demand->to_client->name }}</span>
                                                        </div>
                                                    </td>
                                                    <td>{{ $demand->title }}</td>
                                                    <td>
                                                        @if($demand->status == 'pending')
                                                            <span class="badge badge-soft-warning">{{ x_('Pending', 'clients') }}</span>
                                                        @elseif($demand->status == 'accepted')
                                                            <span class="badge badge-soft-success">{{ x_('Accepted', 'clients') }}</span>
                                                        @elseif($demand->status == 'rejected')
                                                            <span class="badge badge-soft-danger">{{ x_('Rejected', 'clients') }}</span>
                                                        @else
                                                            <span class="badge badge-soft-secondary">{{ ucfirst($demand->status) }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $demand->created_at->format('M d, Y') }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-xs btn-icon btn-soft-primary">
                                                            <span class="btn-icon-wrap"><i class="ri-eye-line"></i></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($client->to_demands->count() > 0)
                        <div class="mb-3 card card-border">
                            <div class="card-header card-header-action">
                                <h6 class="mb-0">
                                    <i class="ri-download-2-line me-2"></i>{{ x_('Received Demands', 'clients') }}
                                    <span class="badge bg-primary ms-2">{{ $client->to_demands->count() }}</span>
                                </h6>
                            </div>
                            <div class="p-0 card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{ x_('From', 'clients') }}</th>
                                                <th>{{ x_('Title', 'clients') }}</th>
                                                <th>{{ x_('Status', 'clients') }}</th>
                                                <th>{{ x_('Date', 'clients') }}</th>
                                                <th>{{ x_('Actions', 'clients') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($client->to_demands as $demand)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar avatar-xs avatar-soft-primary avatar-rounded me-2">
                                                                <span class="initial-wrap">{{ strtoupper(substr($demand->from_client->name, 0, 1)) }}</span>
                                                            </div>
                                                            <span>{{ $demand->from_client->name }}</span>
                                                        </div>
                                                    </td>
                                                    <td>{{ $demand->title }}</td>
                                                    <td>
                                                        @if($demand->status == 'pending')
                                                            <span class="badge badge-soft-warning">{{ x_('Pending', 'clients') }}</span>
                                                        @elseif($demand->status == 'accepted')
                                                            <span class="badge badge-soft-success">{{ x_('Accepted', 'clients') }}</span>
                                                        @elseif($demand->status == 'rejected')
                                                            <span class="badge badge-soft-danger">{{ x_('Rejected', 'clients') }}</span>
                                                        @else
                                                            <span class="badge badge-soft-secondary">{{ ucfirst($demand->status) }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $demand->created_at->format('M d, Y') }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-xs btn-icon btn-soft-primary">
                                                            <span class="btn-icon-wrap"><i class="ri-eye-line"></i></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="card card-border">
                        <div class="card-body">
                            <div class="p-4 text-center">
                                <div class="mb-3 avatar avatar-icon avatar-lg avatar-soft-secondary">
                                    <span class="initial-wrap">
                                        <i class="ri-exchange-dollar-line"></i>
                                    </span>
                                </div>
                                <h5>{{ x_('No Demands Found', 'clients') }}</h5>
                                <p class="mb-0">{{ x_('This client has no demand activity yet.', 'clients') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Subscriptions Tab -->
            <div class="tab-pane fade" id="subscriptions{{$client->id}}">
                @if($client->subscriptions->count() > 0)
                    <div class="mb-3 card card-border">
                        <div class="card-header card-header-action">
                            <h6 class="mb-0">
                                <i class="ri-vip-crown-line me-2"></i>{{ x_('Client Subscriptions', 'clients') }}
                                <span class="badge bg-primary ms-2">{{ $client->subscriptions->count() }}</span>
                            </h6>
                        </div>
                        <div class="p-0 card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ x_('Plan', 'clients') }}</th>
                                            <th>{{ x_('Status', 'clients') }}</th>
                                            <th>{{ x_('Payment Status', 'clients') }}</th>
                                            <th>{{ x_('Start Date', 'clients') }}</th>
                                            <th>{{ x_('End Date', 'clients') }}</th>
                                            <th>{{ x_('Amount', 'clients') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($client->subscriptions as $subscription)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-xs avatar-rounded me-2 {{ $subscription->is_active ? 'avatar-soft-warning' : 'avatar-soft-secondary' }}">
                                                            <span class="initial-wrap">
                                                                <i class="ri-vip-crown-line"></i>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            {{-- <span class="d-block fw-medium">{{ $subscription->plan->name }}</span> --}}
                                                            <span class="text-muted small"> {{ x_('days', 'clients') }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($subscription->is_active && strtotime($subscription->ends_at) > time())
                                                        <span class="badge badge-soft-success">{{ x_('Active', 'clients') }}</span>
                                                    @else
                                                        <span class="badge badge-soft-danger">{{ x_('Inactive', 'clients') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($subscription->is_paid)
                                                        <span class="badge badge-soft-success">{{ x_('Paid', 'clients') }}</span>
                                                    @else
                                                        <span class="badge badge-soft-warning">{{ x_('Unpaid', 'clients') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="text-muted">{{ $subscription->starts_at ? date('M d, Y', strtotime($subscription->starts_at)) : x_('N/A', 'admin') }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-muted">{{ $subscription->ends_at ? date('M d, Y', strtotime($subscription->ends_at)) : x_('N/A', 'admin') }}</span>
                                                </td>
                                                <td>
                                                    <span class="fw-medium">${{ $subscription->amount }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card card-border">
                        <div class="card-body">
                            <div class="p-4 text-center">
                                <div class="mb-3 avatar avatar-icon avatar-lg avatar-soft-secondary">
                                    <span class="initial-wrap">
                                        <i class="ri-vip-crown-line"></i>
                                    </span>
                                </div>
                                <h5>{{ x_('No Subscriptions Found', 'clients') }}</h5>
                                <p class="mb-0">{{ x_('This client hasn\'t subscribed to any plan yet.', 'clients') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
