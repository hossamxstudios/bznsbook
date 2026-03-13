<div class="border-0 shadow-sm card">
    <div class="p-4 card-body p-md-5">
        <form action="{{ route('client.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Basic Information -->
            <h3 class="mb-4 h4">{{ x_('Basic Information', 'web') }}</h3>

            <div class="mb-4">
                <label for="name" class="form-label">{{ x_('Project Title', 'web') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">{{ x_('Choose a clear, specific title for your project', 'web') }}</small>
            </div>

            <div class="mb-4">
                <label for="details" class="form-label">{{ x_('Brief Description', 'web') }}</label>
                <textarea class="form-control @error('details') is-invalid @enderror" id="details" name="details" rows="3">{{ old('details') }}</textarea>
                @error('details')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">{{ x_('Provide a short summary of your project (200-300 characters)', 'web') }}</small>
            </div>

            <div class="mb-4">
                <label for="more_details" class="form-label">{{ x_('Detailed Description', 'web') }}</label>
                <textarea class="form-control @error('more_details') is-invalid @enderror" id="more_details" name="more_details" rows="6">{{ old('more_details') }}</textarea>
                @error('more_details')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">{{ x_('Provide comprehensive details about the project requirements, goals, and expectations', 'web') }}</small>
            </div>

            <div class="mb-4 row">
                <div class="col-md-6">
                    <label for="budget_min" class="form-label">{{ x_('Minimum Budget (EGP)', 'web') }}</label>
                    <input type="number" step="0.01" class="form-control @error('budget_min') is-invalid @enderror" id="budget_min" name="budget_min" value="{{ old('budget_min') }}">
                    @error('budget_min')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="budget_max" class="form-label">{{ x_('Maximum Budget (EGP)', 'web') }}</label>
                    <input type="number" step="0.01" class="form-control @error('budget_max') is-invalid @enderror" id="budget_max" name="budget_max" value="{{ old('budget_max') }}">
                    @error('budget_max')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="location" class="form-label">{{ x_('Location', 'web') }}</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}">
                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">{{ x_('Specify if the project requires a specific location', 'web') }}</small>
            </div>

            <!-- Skills Section -->
            <div class="mb-4">
                <label for="skills" class="form-label">{{ x_('Required Skills (press Enter after each skill)', 'web') }}</label>
                <div class="skills-input-container">
                    <input type="text" class="form-control skills-input" id="skills-input" placeholder="{{ x_('Add skills...', 'web') }}">
                    <div class="mt-2 skills-tags" id="skills-tags"></div>
                    <input type="hidden" name="skills" id="skills-hidden">
                </div>
                <small class="text-muted">{{ x_('Enter skills required for this project (e.g. WordPress, JavaScript, Marketing)', 'web') }}</small>
            </div>

            <!-- Services Section -->
            <div class="mb-4">
                <label class="form-label">{{ x_('Related Services', 'web') }}</label>
                <div class="row g-3">
                    @foreach($services as $service)
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="services[]" id="service-{{ $service->id }}" value="{{ $service->id }}"
                                    {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
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
                <label for="image" class="form-label">{{ x_('Project Image', 'web') }}</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">{{ x_('Optional: Upload an image related to your project', 'web') }}</small>
            </div>
            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('client.projects.index') }}" class="btn btn-outline-secondary me-2">{{ x_('Cancel', 'web') }}</a>
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-plus me-2"></i>{{ x_('Create Project', 'web') }}
                </button>
            </div>
        </form>
    </div>
</div>
