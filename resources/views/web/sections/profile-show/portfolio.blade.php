<!-- Portfolio section -->

<style>
    /* Portfolio Card Styles */
    .portfolio-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
    }

    .portfolio-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }

    .portfolio-card .card-img-top {
        transition: transform 0.6s ease;
    }

    .portfolio-card:hover .card-img-top {
        transform: scale(1.05);
    }

    .portfolio-card .card-body a {
        color: var(--bs-primary);
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .portfolio-card .card-body a:hover {
        color: var(--bs-primary-dark, #0056b3);
    }

    .portfolio-card .card-footer {
        background-color: transparent;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
    }
</style>

<div class="col-md-8 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
    <div class="ps-md-3 ps-lg-0 mt-md-2">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1 class="mb-0 h2 pt-xl-1">My Portfolio</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPortfolioModal">
                <i class="bx bx-plus fs-lg me-2"></i>Add Portfolio Item
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

        <!-- Portfolio grid -->
        <div class="mb-4 row row-cols-1 row-cols-md-2 g-4">
            @forelse($portfolios as $portfolio)
                <!-- Portfolio item -->
                <div class="mb-4 col pb-lg-2">
                    <article class="border-0 shadow-sm card h-100 portfolio-card">
                        <div class="position-relative">
                            <!-- Link to portfolio detail -->
                            <a href="{{ route('client.portfolio.show', $portfolio->id) }}" class="top-0 d-block position-absolute w-100 h-100 start-0"
                                aria-label="View portfolio"></a>

                            <!-- Action buttons -->
                            <div class="top-0 gap-2 mt-3 position-absolute end-0 zindex-2 me-3 d-flex">
                                <!-- Edit button -->
                                <button type="button" class="bg-white border-white btn btn-icon btn-light btn-sm rounded-circle edit-portfolio"
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
                                        data-expertise="{{ json_encode($portfolio->expertise) }}"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="left"
                                        title="Edit">
                                    <i class="bx bx-edit"></i>
                                </button>

                                <!-- Delete button -->
                                <form action="{{ route('client.portfolio.delete', $portfolio->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-white border-white btn btn-icon btn-light btn-sm rounded-circle"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="left"
                                            title="Delete">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </div>

                            <!-- Portfolio image -->
                            @if($portfolio->getFirstMedia('portfolio'))
                                <img src="{{ $portfolio->getFirstMedia('portfolio')->getUrl() }}" class="card-img-top" alt="{{ $portfolio->name }}" style="height: 220px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 220px;">
                                    <i class="bx bx-image-alt fs-1 text-muted"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Card body with title and client -->
                        <div class="pb-3 card-body">
                            <h3 class="mb-2 h5">
                                <a href="{{ route('client.portfolio.show', $portfolio->id) }}">{{ $portfolio->name }}</a>
                            </h3>
                            @if($portfolio->client_name)
                                <p class="mb-2 fs-sm">Client: {{ $portfolio->client_name }}</p>
                            @endif
                            @if($portfolio->type)
                                <p class="mb-0 fw-semibold text-primary">type :{{ $portfolio->type }}</p>
                            @endif
                        </div>

                        <!-- Card footer with metadata -->
                        <div class="py-4 card-footer d-flex align-items-center fs-sm text-muted">
                            <div class="d-flex align-items-center me-4">
                                <i class="bx bx-calendar fs-xl me-1"></i>
                                {{ $portfolio->date ? \Carbon\Carbon::parse($portfolio->date)->format('M Y') : 'No date' }}
                            </div>
                            @if($portfolio->location)
                            <div class="d-flex align-items-center">
                                <i class="bx bx-map fs-xl me-1"></i>
                                {{ $portfolio->location }}
                            </div>
                            @endif
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        You don't have any portfolio items yet. Add your first project to showcase your work!
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Add Portfolio Modal -->
<div class="modal fade" id="addPortfolioModal" tabindex="-1" aria-labelledby="addPortfolioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('client.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addPortfolioModalLabel">Add Portfolio Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Basic Info Section -->
                    <h6 class="mb-3 fw-bold">Basic Information</h6>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Project Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="client_name" class="form-label">Client Name</label>
                            <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name" placeholder="Client or company name">
                            @error('client_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-4">
                            <label for="type" class="form-label">Project Type</label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" placeholder="e.g., Web, Mobile, Design">
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="date" class="form-label">Project Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date">
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" placeholder="Project location">
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="project_url" class="form-label">Project URL</label>
                        <input type="url" class="form-control @error('project_url') is-invalid @enderror" id="project_url" name="project_url" placeholder="https://">
                        @error('project_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Project Details Section -->
                    <h6 class="mt-4 mb-3 fw-bold">Project Details</h6>
                    <div class="mb-3">
                        <label for="details" class="form-label">Project Details</label>
                        <textarea class="form-control @error('details') is-invalid @enderror" id="details" name="details" rows="3" placeholder="Describe your project"></textarea>
                        @error('details')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="challenge" class="form-label">Project Challenge</label>
                        <textarea class="form-control @error('challenge') is-invalid @enderror" id="challenge" name="challenge" rows="2" placeholder="Describe the challenges faced during this project"></textarea>
                        @error('challenge')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="solution" class="form-label">Project Solution</label>
                        <textarea class="form-control @error('solution') is-invalid @enderror" id="solution" name="solution" rows="2" placeholder="Describe the solutions you implemented"></textarea>
                        @error('solution')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Areas of Expertise</label>
                        <div id="expertise-container">
                            <div class="mb-2 input-group">
                                <input type="text" class="form-control" name="expertise[]" placeholder="E.g., Web Design">
                                <button type="button" class="btn btn-success add-expertise"><i class="bx bx-plus"></i></button>
                            </div>
                        </div>
                        @error('expertise')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Add multiple areas of expertise by clicking the plus button.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Services Used</label>
                        <div class="row row-cols-1 row-cols-md-3 g-3">
                            @forelse($services as $service)
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="services[]" value="{{ $service->id }}" id="service{{ $service->id }}">
                                        <label class="form-check-label" for="service{{ $service->id }}">
                                            {{ $service->name }}
                                        </label>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="mb-0 alert alert-info">
                                        <i class="bx bx-info-circle me-1"></i>
                                        You don't have any services defined yet. To associate services with your portfolio, please create services first.
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        @error('services')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Project Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        <div class="form-text">Upload a featured image for your project (max 5MB).</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Portfolio Item</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Portfolio Modal -->
<div class="modal fade" id="editPortfolioModal" tabindex="-1" aria-labelledby="editPortfolioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="editPortfolioForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editPortfolioModalLabel">Edit Portfolio Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Basic Info Section -->
                    <h6 class="mb-3 fw-bold">Basic Information</h6>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="edit_name" class="form-label">Project Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_client_name" class="form-label">Client Name</label>
                            <input type="text" class="form-control" id="edit_client_name" name="client_name" placeholder="Client or company name">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-4">
                            <label for="edit_type" class="form-label">Project Type</label>
                            <input type="text" class="form-control" id="edit_type" name="type" placeholder="e.g., Web, Mobile, Design">
                        </div>
                        <div class="col-md-4">
                            <label for="edit_date" class="form-label">Project Date</label>
                            <input type="date" class="form-control" id="edit_date" name="date">
                        </div>
                        <div class="col-md-4">
                            <label for="edit_location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="edit_location" name="location" placeholder="Project location">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_project_url" class="form-label">Project URL</label>
                        <input type="url" class="form-control" id="edit_project_url" name="project_url" placeholder="https://">
                    </div>

                    <!-- Project Details Section -->
                    <h6 class="mt-4 mb-3 fw-bold">Project Details</h6>
                    <div class="mb-3">
                        <label for="edit_details" class="form-label">Project Details</label>
                        <textarea class="form-control" id="edit_details" name="details" rows="3" placeholder="Describe your project"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_challenge" class="form-label">Project Challenge</label>
                        <textarea class="form-control" id="edit_challenge" name="challenge" rows="2" placeholder="Describe the challenges faced during this project"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_solution" class="form-label">Project Solution</label>
                        <textarea class="form-control" id="edit_solution" name="solution" rows="2" placeholder="Describe the solutions you implemented"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Areas of Expertise</label>
                        <div id="edit-expertise-container">
                            <!-- Expertise fields will be dynamically added here via JavaScript -->
                        </div>
                        <button type="button" class="mt-2 btn btn-sm btn-success" id="edit-add-expertise-btn"><i class="bx bx-plus"></i> Add Another Expertise</button>
                        <div class="mt-1 form-text">Add multiple areas of expertise by clicking the plus button.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Services Used</label>
                        <div class="row row-cols-1 row-cols-md-3 g-3">
                            @forelse($services as $service)
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input edit-service-checkbox" type="checkbox" name="services[]" value="{{ $service->id }}" id="edit_service{{ $service->id }}">
                                        <label class="form-check-label" for="edit_service{{ $service->id }}">
                                            {{ $service->name }}
                                        </label>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="mb-0 alert alert-info">
                                        <i class="bx bx-info-circle me-1"></i>
                                        You don't have any services defined yet. To associate services with your portfolio, please create services first.
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_image" class="form-label">Project Image</label>
                        <input type="file" class="form-control" id="edit_image" name="image" accept="image/*">
                        <div class="form-text">Upload a new image to replace the current one (max 5MB). Leave empty to keep the current image.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Portfolio Item</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for portfolio functionality -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Delete confirmation
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to delete this portfolio item? This action cannot be undone.')) {
                    this.submit();
                }
            });
        });

        // Add Expertise Field functionality
        document.querySelector('.add-expertise').addEventListener('click', function() {
            const container = document.getElementById('expertise-container');
            const newRow = document.createElement('div');
            newRow.className = 'input-group mb-2';
            newRow.innerHTML = `
                <input type="text" class="form-control" name="expertise[]" placeholder="E.g., Web Design">
                <button type="button" class="btn btn-danger remove-expertise"><i class="bx bx-minus"></i></button>
            `;
            container.appendChild(newRow);

            // Add event listener to the new remove button
            newRow.querySelector('.remove-expertise').addEventListener('click', function() {
                container.removeChild(newRow);
            });
        });

        // Handle edit expertise button
        document.getElementById('edit-add-expertise-btn').addEventListener('click', function() {
            const expertiseContainer = document.getElementById('edit-expertise-container');
            const newRow = document.createElement('div');
            newRow.className = 'input-group mb-2';
            newRow.innerHTML = `
                <input type="text" class="form-control" name="expertise[]" placeholder="E.g., Web Design">
                <button type="button" class="btn btn-danger remove-edit-expertise"><i class="bx bx-minus"></i></button>
            `;
            expertiseContainer.appendChild(newRow);

            // Add event listener to the new remove button
            newRow.querySelector('.remove-edit-expertise').addEventListener('click', function() {
                expertiseContainer.removeChild(newRow);
            });
        });

        // Edit portfolio modal data population
        const editButtons = document.querySelectorAll('.edit-portfolio');
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const type = this.getAttribute('data-type');
                const date = this.getAttribute('data-date');
                const details = this.getAttribute('data-details');
                const clientName = this.getAttribute('data-client-name');
                const challenge = this.getAttribute('data-challenge');
                const solution = this.getAttribute('data-solution');
                const projectUrl = this.getAttribute('data-project-url');
                const location = this.getAttribute('data-location');
                const expertiseJson = this.getAttribute('data-expertise');
                const portfolioId = this.getAttribute('data-id');

                // Set form action URL
                document.getElementById('editPortfolioForm').action = `/profile/portfolio/${id}`;

                // Populate form fields
                document.getElementById('edit_name').value = name || '';
                document.getElementById('edit_type').value = type || '';
                document.getElementById('edit_date').value = date || '';
                document.getElementById('edit_details').value = details || '';
                document.getElementById('edit_client_name').value = clientName || '';
                document.getElementById('edit_challenge').value = challenge || '';
                document.getElementById('edit_solution').value = solution || '';
                document.getElementById('edit_project_url').value = projectUrl || '';
                document.getElementById('edit_location').value = location || '';

                // Clear existing expertise fields
                const expertiseContainer = document.getElementById('edit-expertise-container');
                expertiseContainer.innerHTML = '';

                // Parse expertise JSON
                let expertiseArray = [];
                try {
                    if (expertiseJson) {
                        expertiseArray = JSON.parse(expertiseJson);
                    }
                } catch (e) {
                    console.error('Error parsing expertise JSON:', e);
                }

                // If there are expertise items, add them to the form
                if (expertiseArray && expertiseArray.length > 0) {
                    expertiseArray.forEach((item, index) => {
                        const newRow = document.createElement('div');
                        newRow.className = 'input-group mb-2';
                        newRow.innerHTML = `
                            <input type="text" class="form-control" name="expertise[]" value="${item}" placeholder="E.g., Web Design">
                            ${index === 0 ?
                            `<button type="button" class="btn btn-success add-edit-expertise"><i class="bx bx-plus"></i></button>` :
                            `<button type="button" class="btn btn-danger remove-edit-expertise"><i class="bx bx-minus"></i></button>`}
                        `;
                        expertiseContainer.appendChild(newRow);
                    });
                } else {
                    // Add at least one empty field if none exist
                    const newRow = document.createElement('div');
                    newRow.className = 'input-group mb-2';
                    newRow.innerHTML = `
                        <input type="text" class="form-control" name="expertise[]" placeholder="E.g., Web Design">
                        <button type="button" class="btn btn-success add-edit-expertise"><i class="bx bx-plus"></i></button>
                    `;
                    expertiseContainer.appendChild(newRow);
                }

                // Add event listeners to expertise buttons in edit form
                document.querySelectorAll('.add-edit-expertise').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const newRow = document.createElement('div');
                        newRow.className = 'input-group mb-2';
                        newRow.innerHTML = `
                            <input type="text" class="form-control" name="expertise[]" placeholder="E.g., Web Design">
                            <button type="button" class="btn btn-danger remove-edit-expertise"><i class="bx bx-minus"></i></button>
                        `;
                        expertiseContainer.appendChild(newRow);

                        // Add event listener to the new remove button
                        newRow.querySelector('.remove-edit-expertise').addEventListener('click', function() {
                            expertiseContainer.removeChild(newRow);
                        });
                    });
                });

                document.querySelectorAll('.remove-edit-expertise').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const row = this.closest('.input-group');
                        expertiseContainer.removeChild(row);
                    });
                });

                // Check service checkboxes based on the portfolio's services
                document.querySelectorAll('.edit-service-checkbox').forEach(checkbox => {
                    checkbox.checked = false;
                });

                // Use the API endpoint to get portfolio services
                fetch(`/profile/portfolio/${portfolioId}/services`)
                    .then(response => response.json())
                    .then(data => {
                        // Check the services associated with this portfolio
                        if (data.services && data.services.length) {
                            data.services.forEach(serviceId => {
                                const checkbox = document.getElementById(`edit_service${serviceId}`);
                                if (checkbox) {
                                    checkbox.checked = true;
                                }
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching portfolio services:', error);
                    });
            });
        });
    });
</script>
</div>
