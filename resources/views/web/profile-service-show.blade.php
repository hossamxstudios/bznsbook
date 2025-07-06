<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title>{{ $service->name }} - Bzns Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
</head>
<body>
    <main class="page-wrapper">
        @include('web.main.navbar')
        <section class="container pt-5">
            <div class="row">
                @include('web.sections.profile.side')

                <div class="col-lg-9">
                    <!-- Header with breadcrumb and back button -->
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-2 fw-bold">Service Details</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="mb-0 breadcrumb">
                                    <li class="breadcrumb-item"><a href="/profile"><i class="bx bx-home-alt me-1"></i>Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('client.services') }}">Services</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ \Illuminate\Support\Str::limit($service->name, 30) }}</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('client.services') }}" class="shadow-sm btn btn-primary portfolio-action-btn">
                            <i class="bx bx-arrow-back me-2"></i> Back to Services
                        </a>
                    </div>

                    <!-- Service Header Section -->
                    <div class="p-4 mb-4 border bg-light rounded-3">
                        <div class="row align-items-center">
                            <div class="mb-3 col-lg-8 mb-lg-0">

                                <h1 class="h2"><i class="align-middle bx bx-cog text-primary"></i> {{ $service->name }}</h1>

                                <!-- Service Metadata Tags -->
                                <div class="flex-wrap gap-2 mb-3 d-flex">
                                    @if($service->years_experience)
                                        <span class="px-3 py-2 btn btn-primary rounded-pill">
                                            <i class="bx bx-time me-1"></i> {{ $service->years_experience }} years experience
                                        </span>
                                    @endif

                                    @if($service->price)
                                        <span class="px-3 py-2 btn btn-primary rounded-pill">
                                            <i class="bx bx-money me-1"></i> {{ number_format($service->price, 2) }} EGP
                                        </span>
                                    @endif

                                    @if($service->level)
                                        <span class="px-3 py-2 btn btn-primary rounded-pill">
                                            <i class="bx bx-star me-1"></i>
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $service->level)
                                                    <i class="bx bxs-star text-dark"></i>
                                                @else
                                                    <i class="bx bx-star text-muted"></i>
                                                @endif
                                            @endfor
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="p-3 rounded border bg-light">
                                    <div class="mb-3 d-flex align-items-center">
                                        <div class="me-2 text-primary"><i class="bx bx-category fs-5"></i></div>
                                        <div>
                                            <div class="text-muted small">Subcategories</div>
                                            <div class="fw-medium">{{ $service->subcategories->count() }} associated</div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <div class="me-2 text-primary"><i class="bx bx-calendar fs-5"></i></div>
                                        <div>
                                            <div class="text-muted small">Added On</div>
                                            <div class="fw-medium">{{ $service->created_at->format('M d, Y') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Service Details and Description -->
                    <div class="mb-4 border-0 shadow-sm card rounded-3">
                        <div class="px-2 py-3 bg-light d-flex justify-content-between align-items-center rounded-3">
                            <h3 class="mb-0 h5"><i class="bx bx-info-circle text-primary me-2"></i> Service Details</h3>
                            <div>
                                <button type="button" class="btn btn-sm btn-primary edit-service" data-bs-toggle="modal" data-bs-target="#editServiceModal">
                                    <i class="bx bx-edit me-1"></i> Edit
                                </button>
                                <form class="d-inline delete-form" method="POST" action="{{ route('client.services.delete', $service->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bx bx-trash me-1"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="p-4 card-body">
                            @if($service->details)
                                <p class="mb-4 lead">{{ $service->details }}</p>
                            @else
                                <div class="mb-4 border alert alert-light">
                                    <i class="bx bx-info-circle me-2"></i> No detailed description provided for this service.
                                </div>
                            @endif

                            @if(is_array($service->skills) && count($service->skills) > 0)
                                <div class="mb-4">
                                    <h4 class="mb-3 h5">Skills & Expertise</h4>
                                    <div class="flex-wrap gap-2 d-flex">
                                        @foreach($service->skills as $skill)
                                            <span class="px-3 py-2 btn btn-primary rounded-pill">
                                                <i class="bx bx-check-circle me-1"></i> {{ $skill }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Subcategories Section -->
                            <div class="mt-4 border-0 shadow-sm card rounded-3">
                                <div class="px-2 py-3 bg-light d-flex justify-content-between align-items-center rounded-3">
                                    <h3 class="mb-0 h5"><i class="bx bx-category text-primary me-2"></i> Subcategories</h3>
                                </div>
                                <div class="p-4">
                                    @if($service->subcategories->count() > 0)
                                        <div class="flex-wrap gap-2 d-flex">
                                            @foreach($service->subcategories as $subcategory)
                                                <span class="px-3 py-2 border badge bg-light rounded-pill">
                                                    <i class="bx bx-check-circle text-primary me-1"></i> {{ $subcategory->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="text-muted fst-italic">
                                            <i class="bx bx-info-circle me-1"></i> No subcategories associated with this service.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('web.main.footer')
    </main>
    @include('web.main.scripts')

    <!-- Edit Service Modal -->
    <div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true" style="z-index: 1051;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="editServiceForm" action="{{ route('client.services.update') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Basic Info Section -->
                        <h6 class="mb-3 fw-bold">Basic Information</h6>
                        <input type="hidden" name="id" value="{{ $service->id }}">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Service Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="edit_name" name="name" required value="{{ $service->name }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Details</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="edit_description" name="details" rows="3">{{ $service->details }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">This will be stored in the 'details' field</small>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="edit_price" class="form-label">Price (EGP)</label>
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="edit_price" name="price" value="{{ $service->price }}">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="edit_years_experience" class="form-label">Years of Experience</label>
                                <input type="number" class="form-control @error('years_experience') is-invalid @enderror" id="edit_years_experience" name="years_experience" value="{{ $service->years_experience }}">
                                @error('years_experience')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="edit_level" class="form-label">Skill Level (1-10 stars)</label>
                            <div class="my-rating-edit d-flex rating rating-lg" data-rating="{{ $service->level }}"></div>
                            <!-- Hidden input to store the star rating value -->
                            <input type="hidden" name="level" class="edit_level" value="{{ $service->level }}">
                            <small class="text-muted">Click on the stars to set your expertise level</small>
                        </div>
                        <div class="mb-3">
                            <label for="skills" class="form-label">Skills (press Enter after each skill)</label>
                            <select class="select2 taging" name="skills[]" multiple style="width:100%;" >
                                @foreach($service->skills ?? [] as $skill)
                                    <option value="{{ $skill }}" selected>{{ $skill }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Enter skills related to this service  <strong style="color:red;">then click enter</strong> (e.g. WordPress, JavaScript, Marketing)</small>
                        </div>
                        <!-- Subcategories Section -->
                        <h6 class="mb-3 fw-bold">Subcategories</h6>
                        <div class="mb-3">
                            <label class="form-label">Select Subcategories</label>
                            <select class="select2 form-control bg-light" name="subcategories[]" multiple style="width:100%;">
                                @foreach($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{ in_array($subcategory->id, $service->subcategories->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle delete confirmation
            document.querySelector('.delete-form').addEventListener('submit', function(e) {
                if (!confirm('Are you sure you want to delete this service? This action cannot be undone.')) {
                    e.preventDefault();
                }
            });
        });

    </script>
</body>
</html>
