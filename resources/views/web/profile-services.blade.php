<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title>My Services - Bzns Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
</head>
<body>
    <main class="page-wrapper">
        @include('web.main.navbar')
        <section class="container pt-5">
            <div class="row">
                @include('web.sections.profile.side')

                <!-- Services list and management section -->
                <div class="col-md-8 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
                    <div class="ps-md-3 ps-lg-0 mt-md-2">
                        <div class="mb-4 d-flex align-items-center justify-content-between">
                            <h1 class="mb-0 h2 pt-xl-1">My Services</h1>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                                <i class="bx bx-plus fs-lg me-2"></i>Add Service
                            </button>
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
                        <!-- Services grid -->
                        <div class="mt-5 mb-4 row row-cols-1 row-cols-md-2 g-4">
                            @forelse($services as $service)
                                <!-- Service item -->
                                <div class="mb-4 col-md-6">
                                    <div class="pt-5 border-0 shadow-sm card card-hover h-100 text-decoration-none px-sm-3 px-md-0 px-lg-3 pb-sm-3 pb-md-0 pb-lg-3">
                                        <div class="pt-3 card-body">
                                            <!-- Service icon with primary background -->
                                            <div class="top-0 p-3 d-inline-block bg-dark shadow-dark rounded-3 position-absolute translate-middle-y">
                                                <i class="m-1 text-light bx bx-briefcase d-block" style="font-size: 24px;"></i>
                                            </div>
                                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                                <!-- Service title with arrow -->
                                                <h2 class="mb-0 h4 d-inline-flex align-items-center">
                                                    <a href="{{ route('client.services.show', $service->id) }}" class="text-decoration-none text-dark">
                                                        {{ $service->name }}
                                                        <i class="bx bx-right-arrow-circle text-dark fs-3 ms-2"></i>
                                                    </a>
                                                </h2>
                                                <!-- Actions dropdown -->
                                                <div class="dropdown">
                                                    <button class="text-muted btn btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded fs-4"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="{{ route('client.services.show', $service->id) }}" class="dropdown-item">
                                                                <i class="bx bx-show me-2"></i> View Details
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <button class="dropdown-item edit-service-btn" data-bs-toggle="modal" data-bs-target="#editServiceModal{{ $service->id }}">
                                                                <i class="bx bx-edit me-2"></i> Edit
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('client.services.delete') }}" method="POST" class="d-inline">
                                                                @csrf
                                                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                                                <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this service?')">
                                                                    <i class="bx bx-trash me-2"></i> Delete
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <!-- Service description -->
                                            <div class="mb-3">
                                                @if($service->details)
                                                    <p class="mb-3 fs-sm text-body">{{ \Illuminate\Support\Str::limit($service->details, 120) }}</p>
                                                @else
                                                    <p class="mb-3 fs-sm text-muted">No description available</p>
                                                @endif

                                                <!-- Price -->
                                                <div class="mb-3 d-flex align-items-center">
                                                    <span class="badge bg-dark text-light me-2"><i class="bx bx-money me-1"></i> {{ number_format($service->price, 2) }} EGP</span>
                                                    <div class="my-rating-1 d-flex rating rate-view" data-rating="{{ $service->level }}"></div>
                                                </div>


                                                <!-- Skills tags -->
                                                @if(is_array($service->skills) && count($service->skills) > 0)
                                                    <div class="flex-wrap gap-1 d-flex">
                                                        @foreach(array_slice($service->skills, 0, 3) as $skill)
                                                            <span class="badge bg-dark text-light">{{ $skill }}</span>
                                                        @endforeach
                                                        @if(count($service->skills) > 3)
                                                            <span class="badge bg-light text-dark">+{{ count($service->skills) - 3 }}</span>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Card footer with metadata -->
                                            <div class="pt-3 d-flex text-muted border-top">
                                                <div class="d-flex">
                                                    @if($service->years_experience)
                                                        <div class="d-flex align-items-center me-4">
                                                            <i class="bx bx-time fs-xl me-1"></i>
                                                            {{ $service->years_experience }} years exp.
                                                        </div>
                                                    @endif

                                                    @if($service->subcategories->count() > 0)
                                                        <div class="d-flex align-items-center">
                                                            <i class="bx bx-category fs-xl me-1"></i>
                                                            {{ $service->subcategories->count() }} categories
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="p-4 text-center rounded border">
                                        <i class="mb-2 display-6 bx bx-server text-muted"></i>
                                        <p class="mb-3">You haven't added any services yet.</p>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                                            <i class="bx bx-plus me-2"></i>Add Your First Service
                                        </button>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        <!-- Pagination -->
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </section>
        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
    <!-- Add Service Modal -->
    <div class="modal fade" id="addServiceModal" tabindex="-1" style="z-index: 1051;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('client.services.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addServiceModalLabel">Add Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Basic Info Section -->
                        <h6 class="mb-3 fw-bold">Basic Information</h6>
                        <div class="mb-3">
                            <label for="name" class="form-label">Service Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="details" class="form-label">Details</label>
                            <textarea class="form-control @error('details') is-invalid @enderror" id="details" name="details" rows="3">{{ old('details') }}</textarea>
                            @error('details')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">This will be stored in the 'details' field</small>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="price" class="form-label">Price (EGP)</label>
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="years_experience" class="form-label">Years of Experience</label>
                                <input type="number" class="form-control @error('years_experience') is-invalid @enderror" id="years_experience" name="years_experience" value="{{ old('years_experience') }}">
                                @error('years_experience')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Skill Level (1-10 stars)</label>
                            <div class="my-rating-1 d-flex rating rating-lg"></div>
                            <!-- Hidden input to store the star rating value -->
                            <input type="hidden" name="level" id="level">
                            <small class="text-muted">Click on the stars to set your expertise level</small>
                        </div>

                        <div class="mb-3">
                            <label for="skills" class="form-label">Skills (press Enter after each skill)</label>
                            <select class="select2 taging" name="skills[]" multiple style="width:100%;" >
                            </select>
                            <small class="text-muted">Enter skills related to this service  <strong style="color:red;">then click enter</strong> (e.g. WordPress, JavaScript, Marketing)</small>
                        </div>

                        <!-- Subcategories Section -->
                        <h6 class="mb-3 fw-bold">Subcategories</h6>
                        <div class="mb-3">
                            <label class="form-label">Select Subcategories</label>
                            <select class="select2" name="subcategories[]" multiple style="width: 100%;">
                                @foreach($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach($services as $service)
        <!-- Edit Service Modal -->
        <div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true" style="z-index: 1051;">
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
    @endforeach

    <script>
        // Initialize all star rating controls and link them to hidden inputs
        $(document).ready(function() {
            // Initialize all Select2 elements
            $('.select2').select2({
                width: '100%',
                theme: 'classic',
                tags: true,
                tokenSeparators: [',', ' '],
            });


            // Initialize view form star rating
            $(".rate-view").starRating({
                totalStars: 10,
                initialRating: $("#level").val() || 0,
                starSize: 15,
                useFullStars: true,
                disableAfterRate: true,
                readOnly: true,
                color: "#000",
                emptyColor: "#ddd",
            });
            // Initialize add form star rating
            $(".my-rating-1").starRating({
                totalStars: 10,
                initialRating: $("#level").val() || 0,
                starSize: 25,
                useFullStars: true,
                disableAfterRate: false,
                callback: function(currentRating, $el) {
                    // Update hidden input with selected rating
                    $("#level").val(currentRating);
                }
            });

            // Initialize edit form star rating
            $(".my-rating-edit").starRating({
                totalStars: 10,
                starSize: 25,
                useFullStars: true,
                disableAfterRate: false,
                callback: function(currentRating, $el) {
                    // Update hidden input with selected rating
                    $(".edit_level").val(currentRating);
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {

            // Handle delete confirmation
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (!confirm('Are you sure you want to delete this service? This action cannot be undone.')) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>

</body>
</html>
