<!-- Reference Materials section -->

<div class="col-md-8 offset-lg-1 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
    <div class="ps-md-3 ps-lg-0 mt-md-2">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h2 pt-xl-1 mb-0">{{ x_('Reference Materials', 'web') }}</h1>
            <a href="#" class="btn btn-primary"><i class="bx bx-plus fs-lg me-2"></i>{{ x_('Add Material', 'web') }}</a>
        </div>
        <!-- Nav tabs -->
        <ul class="mb-4 nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab"
                    aria-controls="all" aria-selected="true">
                    <i class="bx bx-library me-2"></i>{{ x_('All Materials', 'web') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="documents-tab" data-bs-toggle="tab" href="#documents" role="tab"
                    aria-controls="documents" aria-selected="false">
                    <i class="bx bx-file me-2"></i>{{ x_('Documents', 'web') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="images-tab" data-bs-toggle="tab" href="#images" role="tab"
                    aria-controls="images" aria-selected="false">
                    <i class="bx bx-image me-2"></i>{{ x_('Images', 'web') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="links-tab" data-bs-toggle="tab" href="#links" role="tab"
                    aria-controls="links" aria-selected="false">
                    <i class="bx bx-link me-2"></i>{{ x_('Links', 'web') }}
                </a>
            </li>
        </ul>

        <!-- Tab content -->
        <div class="tab-content">
            <!-- All Materials -->
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="row g-4">
                    <!-- Document Card -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-dark rounded-circle text-white p-3 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bx bxs-file-pdf fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="card-title mb-0">{{ x_('Project Requirements Doc', 'web') }}</h5>
                                        <p class="card-text text-muted mb-0">{{ x_('PDF Document • 2.4 MB', 'web') }}</p>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <button class="btn btn-icon btn-sm btn-outline-secondary rounded-circle" type="button" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>{{ x_('Download', 'web') }}</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>{{ x_('Edit', 'web') }}</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-trash me-2"></i>{{ x_('Delete', 'web') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text">{{ x_('Detailed requirements document for the e-commerce project including user stories and technical specifications.', 'web') }}</p>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <span class="badge bg-info">{{ x_('Web Development', 'web') }}</span>
                                    <small class="text-muted">{{ x_('Added: May 15, 2025', 'web') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Image Card -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-dark rounded-circle text-white p-3 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bx bxs-image fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="card-title mb-0">{{ x_('Logo Concepts', 'web') }}</h5>
                                        <p class="card-text text-muted mb-0">{{ x_('ZIP Archive • 8.7 MB', 'web') }}</p>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <button class="btn btn-icon btn-sm btn-outline-secondary rounded-circle" type="button" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>{{ x_('Download', 'web') }}</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>{{ x_('Edit', 'web') }}</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-trash me-2"></i>{{ x_('Delete', 'web') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text">{{ x_('Logo design concepts for the rebranding project, including various color options and formats.', 'web') }}</p>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <span class="badge bg-warning">{{ x_('Brand Design', 'web') }}</span>
                                    <small class="text-muted">{{ x_('Added: May 12, 2025', 'web') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Link Card -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-dark rounded-circle text-white p-3 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bx bx-link fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="card-title mb-0">{{ x_('UI Design Inspiration', 'web') }}</h5>
                                        <p class="card-text text-muted mb-0">{{ x_('Web Link', 'web') }}</p>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <button class="btn btn-icon btn-sm btn-outline-secondary rounded-circle" type="button" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-link-external me-2"></i>{{ x_('Open', 'web') }}</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>{{ x_('Edit', 'web') }}</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-trash me-2"></i>{{ x_('Delete', 'web') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text">{{ x_('Collection of UI design inspiration for modern dashboard interfaces from Dribbble.', 'web') }}</p>
                                <div class="d-flex align-items-center mt-2">
                                    <a href="#" class="btn btn-sm btn-outline-primary" target="_blank">https://dribbble.com/tags/dashboard</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <span class="badge bg-success">{{ x_('UI/UX Design', 'web') }}</span>
                                    <small class="text-muted">{{ x_('Added: May 10, 2025', 'web') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Document Card -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-dark rounded-circle text-white p-3 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bx bxs-file-doc fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="card-title mb-0">{{ x_('Contract Template', 'web') }}</h5>
                                        <p class="card-text text-muted mb-0">{{ x_('DOCX Document • 350 KB', 'web') }}</p>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <button class="btn btn-icon btn-sm btn-outline-secondary rounded-circle" type="button" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>{{ x_('Download', 'web') }}</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>{{ x_('Edit', 'web') }}</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-trash me-2"></i>{{ x_('Delete', 'web') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text">{{ x_('Standard client contract template with legal terms and conditions for web development projects.', 'web') }}</p>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <span class="badge bg-secondary">{{ x_('Legal', 'web') }}</span>
                                    <small class="text-muted">{{ x_('Added: May 5, 2025', 'web') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Documents Tab -->
            <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                <div class="row g-4">
                    <!-- Document Card -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-dark rounded-circle text-white p-3 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bx bxs-file-pdf fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="card-title mb-0">{{ x_('Project Requirements Doc', 'web') }}</h5>
                                        <p class="card-text text-muted mb-0">{{ x_('PDF Document • 2.4 MB', 'web') }}</p>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <button class="btn btn-icon btn-sm btn-outline-secondary rounded-circle" type="button" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>{{ x_('Download', 'web') }}</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>{{ x_('Edit', 'web') }}</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-trash me-2"></i>{{ x_('Delete', 'web') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text">{{ x_('Detailed requirements document for the e-commerce project including user stories and technical specifications.', 'web') }}</p>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <span class="badge bg-info">{{ x_('Web Development', 'web') }}</span>
                                    <small class="text-muted">{{ x_('Added: May 15, 2025', 'web') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Document Card -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-dark rounded-circle text-white p-3 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bx bxs-file-doc fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="card-title mb-0">{{ x_('Contract Template', 'web') }}</h5>
                                        <p class="card-text text-muted mb-0">{{ x_('DOCX Document • 350 KB', 'web') }}</p>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <button class="btn btn-icon btn-sm btn-outline-secondary rounded-circle" type="button" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>{{ x_('Download', 'web') }}</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>{{ x_('Edit', 'web') }}</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-trash me-2"></i>{{ x_('Delete', 'web') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text">{{ x_('Standard client contract template with legal terms and conditions for web development projects.', 'web') }}</p>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <span class="badge bg-secondary">{{ x_('Legal', 'web') }}</span>
                                    <small class="text-muted">{{ x_('Added: May 5, 2025', 'web') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Images Tab -->
            <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                <div class="row g-4">
                    <!-- Image Card -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-dark rounded-circle text-white p-3 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bx bxs-image fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="card-title mb-0">{{ x_('Logo Concepts', 'web') }}</h5>
                                        <p class="card-text text-muted mb-0">{{ x_('ZIP Archive • 8.7 MB', 'web') }}</p>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <button class="btn btn-icon btn-sm btn-outline-secondary rounded-circle" type="button" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>{{ x_('Download', 'web') }}</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>{{ x_('Edit', 'web') }}</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-trash me-2"></i>{{ x_('Delete', 'web') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text">{{ x_('Logo design concepts for the rebranding project, including various color options and formats.', 'web') }}</p>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <span class="badge bg-warning">{{ x_('Brand Design', 'web') }}</span>
                                    <small class="text-muted">{{ x_('Added: May 12, 2025', 'web') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Links Tab -->
            <div class="tab-pane fade" id="links" role="tabpanel" aria-labelledby="links-tab">
                <div class="row g-4">
                    <!-- Link Card -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-dark rounded-circle text-white p-3 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bx bx-link fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="card-title mb-0">{{ x_('UI Design Inspiration', 'web') }}</h5>
                                        <p class="card-text text-muted mb-0">{{ x_('Web Link', 'web') }}</p>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <button class="btn btn-icon btn-sm btn-outline-secondary rounded-circle" type="button" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-link-external me-2"></i>{{ x_('Open', 'web') }}</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>{{ x_('Edit', 'web') }}</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-trash me-2"></i>{{ x_('Delete', 'web') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text">{{ x_('Collection of UI design inspiration for modern dashboard interfaces from Dribbble.', 'web') }}</p>
                                <div class="d-flex align-items-center mt-2">
                                    <a href="#" class="btn btn-sm btn-outline-primary" target="_blank">https://dribbble.com/tags/dashboard</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <span class="badge bg-success">{{ x_('UI/UX Design', 'web') }}</span>
                                    <small class="text-muted">{{ x_('Added: May 10, 2025', 'web') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
