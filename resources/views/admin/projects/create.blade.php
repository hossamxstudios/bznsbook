<!doctype html>
@include('admin.main.html')

<head>
    <meta charset="utf-8" />
    <title> BZNSBOOK - Create New Project </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.main.meta')
</head>

<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active">
        @include('admin.main.sidebar')
        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            <header class="hk-pg-header pg-header-wth-tab">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle me-2 d-xl-none"><span class="icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span></button>
                                        <div class="avatar avatar-sm avatar-icon avatar-info me-3">
                                            <span class="initial-wrap rounded-8"><span class="svg-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-briefcase" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                                                    <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"></path>
                                                    <path d="M12 12l0 .01"></path>
                                                    <path d="M3 13a20 20 0 0 0 18 0"></path>
                                                </svg>
                                            </span></span>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">Create New Project</h4>
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb  mb-0">
                                                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                                                    <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Projects</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Create New</li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </header>

                            <div class="px-5 pt-5 container-fluid">
                                <div class="row">
                                    <div class="mb-3 col-md-12 mb-md-4">
                                        <div class="mb-0 card rounded-8">
                                            <div class="card-header card-header-action">
                                                <h6>Project Information</h6>
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="name" class="form-label">Project Name <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                                            @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="client_id" class="form-label">Client <span class="text-danger">*</span></label>
                                                            <select class="form-select @error('client_id') is-invalid @enderror" id="client_id" name="client_id" required>
                                                                <option value="">Select Client</option>
                                                                @foreach($clients as $client)
                                                                <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('client_id')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="details" class="form-label">Project Details</label>
                                                        <textarea class="form-control @error('details') is-invalid @enderror" id="details" name="details" rows="4">{{ old('details') }}</textarea>
                                                        @error('details')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="budget_min" class="form-label">Minimum Budget ($)</label>
                                                            <input type="number" class="form-control @error('budget_min') is-invalid @enderror" id="budget_min" name="budget_min" value="{{ old('budget_min') }}" step="0.01">
                                                            @error('budget_min')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="budget_max" class="form-label">Maximum Budget ($)</label>
                                                            <input type="number" class="form-control @error('budget_max') is-invalid @enderror" id="budget_max" name="budget_max" value="{{ old('budget_max') }}" step="0.01">
                                                            @error('budget_max')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="location" class="form-label">Location</label>
                                                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}">
                                                            @error('location')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                                                <option value="awarded" {{ old('status') == 'awarded' ? 'selected' : '' }}>Awarded</option>
                                                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                                                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                            </select>
                                                            @error('status')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Skills Required</label>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control @error('skills') is-invalid @enderror" id="skills" name="skills" value="{{ old('skills') }}" placeholder="Enter skills separated by commas (e.g., PHP, JavaScript, Design)">
                                                                @error('skills')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                                <small class="form-text text-muted">Enter skills separated by commas</small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="services" class="form-label">Services</label>
                                                        <select class="form-select @error('services') is-invalid @enderror" id="services" name="services[]" multiple>
                                                            @foreach($services as $service)
                                                            <option value="{{ $service->id }}" {{ (is_array(old('services')) && in_array($service->id, old('services'))) ? 'selected' : '' }}>{{ $service->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('services')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="is_active" class="form-label">Active Status</label>
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ old('is_active') ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="is_active">Make project active</label>
                                                        </div>
                                                        <small class="form-text text-muted">Active projects are visible to users</small>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="project_image" class="form-label">Project Image</label>
                                                        <input type="file" class="form-control @error('project_image') is-invalid @enderror" id="project_image" name="project_image">
                                                        @error('project_image')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <small class="form-text text-muted">Recommended size: 800x600px, Max size: 2MB</small>
                                                    </div>

                                                    <div class="d-flex justify-content-end mt-4">
                                                        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary me-2">Cancel</a>
                                                        <button type="submit" class="btn btn-primary">Create Project</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.main.scripts')

    <!-- Flash message handling -->
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
</body>
</html>
