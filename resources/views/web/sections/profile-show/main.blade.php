<div class="col-lg-9">
    <!-- Header with breadcrumb and back button -->
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-2 fw-bold">Portfolio Details</h4>
            <nav aria-label="breadcrumb">
                <ol class="mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="/profile"><i class="bx bx-home-alt me-1"></i>Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('client.portfolio') }}">Portfolio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{  \Illuminate\Support\Str::limit($portfolio->name, 30) }}</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('client.portfolio') }}" class="shadow-sm btn btn-primary portfolio-action-btn">
            <i class="bx bx-arrow-back me-2"></i> Back to Portfolio
        </a>
    </div>

    <!-- Portfolio Header Section -->
    <div class="p-4 mb-4 border bg-light rounded-3">
        <div class="row align-items-center">
            <div class="mb-3 col-lg-8 mb-lg-0">
                <h1 class="mb-3 portfolio-title h2">{{ $portfolio->name }}</h1>

                <!-- Project Metadata Tags -->
                <div class="flex-wrap gap-2 mb-3 d-flex">
                    @if($portfolio->type)
                        <span class="px-3 py-2 btn btn-primary rounded-pill">
                            <i class="bx bx-category me-1"></i> {{ $portfolio->type }}
                        </span>
                    @endif

                    @if($portfolio->location)
                        <span class="px-3 py-2 btn btn-primary rounded-pill">
                            <i class="bx bx-map-pin me-1"></i> {{ $portfolio->location }}
                        </span>
                    @endif

                    @if($portfolio->date)
                        <span class="px-3 py-2 btn btn-primary rounded-pill">
                            <i class="bx bx-calendar me-1"></i> {{ \Carbon\Carbon::parse($portfolio->date)->format('F Y') }}
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-lg-4">
                <div class="p-3 rounded border bg-light">
                    @if($portfolio->client_name)
                        <div class="mb-3 portfolio-meta d-flex align-items-center">
                            <div class="me-2 text-primary"><i class="bx bx-user fs-5"></i></div>
                            <div>
                                <div class="text-muted small">Client</div>
                                <div class="fw-medium">{{ $portfolio->client_name }}</div>
                            </div>
                        </div>
                    @endif

                    @if($portfolio->project_url)
                        <div class="portfolio-meta d-flex align-items-center">
                            <div class="me-2 text-primary"><i class="bx bx-link-external fs-5"></i></div>
                            <div>
                                <div class="text-muted small">Project URL</div>
                                <a href="{{ $portfolio->project_url }}" target="_blank" rel="noopener noreferrer" class="text-primary fw-medium">
                                    Visit Website
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <!-- Project Image Showcase -->
    <div class="overflow-hidden mb-4 border shadow-sm rounded-3">
        @if($portfolio->getFirstMedia('portfolio'))
            <div class="position-relative portfolio-image-container">
                <img src="{{ $portfolio->getFirstMedia('portfolio')->getUrl() }}" alt="{{ $portfolio->name }}" class="img-fluid w-100" style="max-height: 400px; object-fit: cover;">
                <div class="bottom-0 p-3 position-absolute start-0 w-100" style="background: linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0))">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="mb-0 text-white h5">Project Showcase</h2>
                        <a href="{{ $portfolio->getFirstMedia('portfolio')->getUrl() }}" target="_blank" class="btn btn-sm btn-light">
                            <i class="bx bx-fullscreen"></i> View Full Size
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="py-5 bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
                <div class="text-center">
                    <i class="mb-3 bx bx-image-alt display-1 text-muted"></i>
                    <p class="mb-0 text-muted">No project image available</p>
                    <button type="button" class="mt-3 btn btn-sm btn-primary edit-portfolio"
                        data-bs-toggle="modal"
                        data-bs-target="#editPortfolioModal"
                        data-id="{{ $portfolio->id }}"
                        data-name="{{ $portfolio->name }}"
                        data-type="{{ $portfolio->type }}"
                        data-date="{{ $portfolio->date }}"
                        data-details="{{ $portfolio->details }}"
                        data-client-name="{{ $portfolio->client_name }}"
                        data-challenge="{{ $portfolio->challenge }}"
                        data-solution="{{ $portfolio->solution }}"
                        data-project-url="{{ $portfolio->project_url }}"
                        data-location="{{ $portfolio->location }}"
                        data-expertise="{{ json_encode($portfolio->expertise) }}">
                        <i class="bx bx-plus-circle me-1"></i> Add Project Image
                    </button>
                </div>
            </div>
        @endif
    </div>

    <!-- Project Details and Description -->
    <div class="mb-4 border-0 shadow-sm card bg-light">
        <div class="py-3 bg-light d-flex justify-content-between align-items-center">
            <h3 class="mb-0 h5"><i class="bx bx-info-circle text-primary me-2"></i> Project Details</h3>
            <div class="gap-2 d-flex">
                <button type="button" class="btn btn-sm btn-primary edit-portfolio"
                    data-bs-toggle="modal"
                    data-bs-target="#editPortfolioModal"
                    data-id="{{ $portfolio->id }}"
                    data-name="{{ $portfolio->name }}"
                    data-type="{{ $portfolio->type }}"
                    data-date="{{ $portfolio->date }}"
                    data-details="{{ $portfolio->details }}"
                    data-client-name="{{ $portfolio->client_name }}"
                    data-challenge="{{ $portfolio->challenge }}"
                    data-solution="{{ $portfolio->solution }}"
                    data-project-url="{{ $portfolio->project_url }}"
                    data-location="{{ $portfolio->location }}"
                    data-expertise="{{ json_encode($portfolio->expertise) }}">
                    <i class="bx bx-edit me-1"></i> Edit
                </button>
                <form action="{{ route('client.portfolio.delete', $portfolio->id) }}" method="POST" class="d-inline delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="bx bx-trash me-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>
        <div class="p-4 card-body">
            @if($portfolio->details)
                <p class="mb-4 lead">{{ $portfolio->details }}</p>
            @else
                <div class="mb-4 border alert alert-light">
                    <i class="bx bx-info-circle me-2"></i> No detailed description provided for this project.
                </div>
            @endif

            <!-- Challenge & Solution Section -->
            <div class="mt-2 row g-4">
                <div class="col-md-6">
                    <div class="border card h-100">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <span class="avatar avatar-sm bg-warning-subtle text-warning rounded-circle">
                                        <i class="bx bx-bolt-circle"></i>
                                    </span>
                                </div>
                                <h4 class="mb-0 card-title h6">Challenge</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if($portfolio->challenge)
                                <p class="card-text">{{ $portfolio->challenge }}</p>
                            @else
                                <div class="text-muted fst-italic">
                                    <i class="bx bx-info-circle me-1"></i> No challenge information provided.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border card h-100">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <span class="avatar avatar-sm bg-success-subtle text-success rounded-circle">
                                        <i class="bx bx-bulb"></i>
                                    </span>
                                </div>
                                <h4 class="mb-0 card-title h6">Solution</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if($portfolio->solution)
                                <p class="card-text">{{ $portfolio->solution }}</p>
                            @else
                                <div class="text-muted fst-italic">
                                    <i class="bx bx-info-circle me-1"></i> No solution information provided.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expertise & Services Section -->
            <div class="mt-4 border-0 shadow-sm card">
                <div class="py-3 bg-light d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 h5"><i class="bx bx-badge-check text-primary me-2"></i> Expertise & Services</h3>
                </div>
                <div class="p-4 card-body">
                    <div class="row g-4">
                        <!-- Expertise Column -->
                        <div class="col-md-6">
                            <h4 class="mb-3 h6 fw-bold">Areas of Expertise</h4>
                            @if(is_array($portfolio->expertise) && count($portfolio->expertise) > 0)
                                <div class="flex-wrap gap-2 d-flex">
                                    @foreach($portfolio->expertise as $expertise)
                                        <span class="px-3 py-2 border badge bg-light text-dark rounded-pill">
                                            <i class="bx bx-check-circle text-primary me-1"></i> {{ $expertise }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-muted fst-italic">
                                    <i class="bx bx-info-circle me-1"></i> No expertise areas specified.
                                </div>
                            @endif
                        </div>

                        <!-- Services Column -->
                        <div class="col-md-6">
                            <h4 class="mb-3 h6 fw-bold">Services Used</h4>
                            @if($portfolio->services->count() > 0)
                                <div class="flex-wrap gap-2 d-flex">
                                    @foreach($portfolio->services as $service)
                                        <span class="px-3 py-2 border badge bg-light text-dark rounded-pill">
                                            <i class="bx bx-cube-alt text-primary me-1"></i> {{ $service->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-muted fst-italic">
                                    <i class="bx bx-info-circle me-1"></i> No services associated with this project.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
