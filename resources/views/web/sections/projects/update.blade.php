
            <div class="col-lg-8">
                <h1 class="mb-4 h2">Edit Project</h1>

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

                <div class="border-0 shadow-sm card">
                    <div class="p-4 card-body p-md-5">
                        <form action="{{ route('client.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Basic Information -->
                            <h3 class="mb-4 h4">Basic Information</h3>

                            <div class="mb-4">
                                <label for="name" class="form-label">Project Title</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $project->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="details" class="form-label">Brief Description</label>
                                <textarea class="form-control @error('details') is-invalid @enderror" id="details" name="details" rows="3">{{ old('details', $project->details) }}</textarea>
                                @error('details')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Provide a short summary of your project (200-300 characters)</small>
                            </div>

                            <div class="mb-4">
                                <label for="more_details" class="form-label">Detailed Description</label>
                                <textarea class="form-control @error('more_details') is-invalid @enderror" id="more_details" name="more_details" rows="6">{{ old('more_details', $project->more_details) }}</textarea>
                                @error('more_details')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4 row">
                                <div class="col-md-6">
                                    <label for="budget_min" class="form-label">Minimum Budget (EGP)</label>
                                    <input type="number" step="0.01" class="form-control @error('budget_min') is-invalid @enderror" id="budget_min" name="budget_min" value="{{ old('budget_min', $project->budget_min) }}">
                                    @error('budget_min')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="budget_max" class="form-label">Maximum Budget (EGP)</label>
                                    <input type="number" step="0.01" class="form-control @error('budget_max') is-invalid @enderror" id="budget_max" name="budget_max" value="{{ old('budget_max', $project->budget_max) }}">
                                    @error('budget_max')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $project->location) }}">
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Specify if the project requires a specific location</small>
                            </div>

                            <!-- Skills Section -->
                            <div class="mb-4">
                                <label for="skills" class="form-label">Required Skills (press Enter after each skill)</label>
                                <div class="skills-input-container">
                                    <input type="text" class="form-control skills-input" id="skills-input" placeholder="Add skills...">
                                    <div class="mt-2 skills-tags" id="skills-tags"></div>
                                    <input type="hidden" name="skills" id="skills-hidden">
                                </div>
                                <small class="text-muted">Enter skills required for this project (e.g. WordPress, JavaScript, Marketing)</small>
                            </div>

                            <!-- Services Section -->
                            <div class="mb-4">
                                <label class="form-label">Related Services</label>
                                <div class="row g-3">
                                    @foreach($services as $service)
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="services[]" id="service-{{ $service->id }}" value="{{ $service->id }}"
                                                    {{ in_array($service->id, old('services', $selectedServices)) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="service-{{ $service->id }}">
                                                    {{ $service->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Project Image -->
                            <div class="mb-4">
                                <label for="image" class="form-label">Project Image</label>
                                @if($project->hasMedia('projects'))
                                    <div class="mb-2">
                                        <img src="{{ $project->getFirstMediaUrl('projects') }}" alt="{{ $project->name }}" class="img-thumbnail" style="max-height: 200px;">
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Optional: Upload a new image to replace the current one</small>
                            </div>

                            <div class="mt-4 d-flex justify-content-end">
                                <a href="{{ route('client.projects.show', $project) }}" class="btn btn-outline-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-2"></i>Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
