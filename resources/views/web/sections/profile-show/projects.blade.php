<!-- Project section -->

<div class="col-md-8 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
    <div class="ps-md-3 ps-lg-0 mt-md-2 8">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1 class="mb-0 h2 pt-xl-1">{{ x_('My Projects', 'web') }}</h1>
            <a href="#" class="btn btn-primary"><i class="bx bx-plus fs-lg me-2"></i>{{ x_('New Project', 'web') }}</a>
        </div>
        <!-- Nav tabs -->
        <ul class="mb-4 nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="basic-tab" data-bs-toggle="tab" href="#basic" role="tab"
                    aria-controls="basic" aria-selected="true">
                    <i class="bx bx-user me-2"></i>{{ x_('All Projects', 'web') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab"
                    aria-controls="address" aria-selected="false">
                    <i class="bx bx-map me-2"></i>{{ x_('Pending', 'web') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="social-tab" data-bs-toggle="tab" href="#social" role="tab"
                    aria-controls="social" aria-selected="false">
                    <i class="bx bx-globe me-2"></i>{{ x_('Active', 'web') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="security-tab" data-bs-toggle="tab" href="#security" role="tab"
                    aria-controls="security" aria-selected="false">
                    <i class="bx bx-lock-alt me-2"></i>{{ x_('Closed', 'web') }}
                </a>
            </li>
        </ul>

        <!-- Tab content -->
        <div class="tab-content">
            <!-- Basic info -->
            <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab">
                <div class="table-responsive">
                    <table class="table table-hover border-bottom">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">{{ x_('Project Name', 'web') }}</th>
                                <th scope="col">{{ x_('Client', 'web') }}</th>
                                <th scope="col">{{ x_('Budget', 'web') }}</th>
                                <th scope="col">{{ x_('Status', 'web') }}</th>
                                <th scope="col">{{ x_('Deadline', 'web') }}</th>
                                <th scope="col">{{ x_('Actions', 'web') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 text-white bg-dark rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-code-alt"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('Website Redesign', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Web Development', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('Tech Solutions Ltd', 'web') }}</td>
                                <td>$4,500</td>
                                <td><span class="badge bg-info">{{ x_('In Progress', 'web') }}</span></td>
                                <td>{{ x_('Jun 15, 2025', 'web') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-dark">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-dark">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 text-white bg-dark rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-shopping-bag"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('E-commerce Platform', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Full Stack Development', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('Fashion Retail Inc', 'web') }}</td>
                                <td>$8,200</td>
                                <td><span class="badge bg-success">{{ x_('Completed', 'web') }}</span></td>
                                <td>{{ x_('Apr 30, 2025', 'web') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 text-white bg-dark rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-mobile-alt"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('Mobile App Development', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('iOS/Android', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('HealthTech Startup', 'web') }}</td>
                                <td>$12,000</td>
                                <td><span class="badge bg-warning">{{ x_('Pending', 'web') }}</span></td>
                                <td>{{ x_('Jul 22, 2025', 'web') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 text-white bg-dark rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-search-alt"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('SEO Optimization', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Digital Marketing', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('Local Business Group', 'web') }}</td>
                                <td>$2,800</td>
                                <td><span class="badge bg-danger">{{ x_('Cancelled', 'web') }}</span></td>
                                <td>{{ x_('Mar 10, 2025', 'web') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pending Projects -->
            <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                <div class="table-responsive">
                    <table class="table table-hover border-bottom">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">{{ x_('Project Name', 'web') }}</th>
                                <th scope="col">{{ x_('Client', 'web') }}</th>
                                <th scope="col">{{ x_('Budget', 'web') }}</th>
                                <th scope="col">{{ x_('Status', 'web') }}</th>
                                <th scope="col">{{ x_('Deadline', 'web') }}</th>
                                <th scope="col">{{ x_('Actions', 'web') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 text-white bg-dark rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-mobile-alt"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('Mobile App Development', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('iOS/Android', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('HealthTech Startup', 'web') }}</td>
                                <td>$12,000</td>
                                <td><span class="badge bg-warning">{{ x_('Pending', 'web') }}</span></td>
                                <td>{{ x_('Jul 22, 2025', 'web') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 text-white bg-dark rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-file"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('Content Strategy', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Content Marketing', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('Education Portal', 'web') }}</td>
                                <td>$3,800</td>
                                <td><span class="badge bg-warning">{{ x_('Pending', 'web') }}</span></td>
                                <td>{{ x_('Aug 05, 2025', 'web') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Active Projects -->
            <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                <div class="table-responsive">
                    <table class="table table-hover border-bottom">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">{{ x_('Project Name', 'web') }}</th>
                                <th scope="col">{{ x_('Client', 'web') }}</th>
                                <th scope="col">{{ x_('Budget', 'web') }}</th>
                                <th scope="col">{{ x_('Status', 'web') }}</th>
                                <th scope="col">{{ x_('Progress', 'web') }}</th>
                                <th scope="col">{{ x_('Actions', 'web') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 text-white bg-dark rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-code-alt"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('Website Redesign', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Web Development', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('Tech Solutions Ltd', 'web') }}</td>
                                <td>$4,500</td>
                                <td><span class="badge bg-info">{{ x_('In Progress', 'web') }}</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="progress w-100" style="height: 6px;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="ms-2">65%</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 text-white bg-dark rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-bar-chart-alt"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('Analytics Dashboard', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Data Visualization', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('Metric Insights Co.', 'web') }}</td>
                                <td>$5,200</td>
                                <td><span class="badge bg-info">{{ x_('In Progress', 'web') }}</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="progress w-100" style="height: 6px;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="ms-2">35%</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Closed Projects -->
            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                <div class="table-responsive">
                    <table class="table table-hover border-bottom">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">{{ x_('Project Name', 'web') }}</th>
                                <th scope="col">{{ x_('Client', 'web') }}</th>
                                <th scope="col">{{ x_('Budget', 'web') }}</th>
                                <th scope="col">{{ x_('Status', 'web') }}</th>
                                <th scope="col">{{ x_('Completed On', 'web') }}</th>
                                <th scope="col">{{ x_('Actions', 'web') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 text-white bg-dark rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-shopping-bag"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('E-commerce Platform', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Full Stack Development', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('Fashion Retail Inc', 'web') }}</td>
                                <td>$8,200</td>
                                <td><span class="badge bg-success">{{ x_('Completed', 'web') }}</span></td>
                                <td>{{ x_('Apr 30, 2025', 'web') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-file"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 text-white bg-dark rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-search-alt"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('SEO Optimization', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Digital Marketing', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('Local Business Group', 'web') }}</td>
                                <td>$2,800</td>
                                <td><span class="badge bg-danger">{{ x_('Cancelled', 'web') }}</span></td>
                                <td>{{ x_('Mar 10, 2025', 'web') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-file"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 text-white bg-dark rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-mail-send"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('Email Marketing Campaign', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Marketing', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('Real Estate Agency', 'web') }}</td>
                                <td>$1,750</td>
                                <td><span class="badge bg-success">{{ x_('Completed', 'web') }}</span></td>
                                <td>{{ x_('Feb 28, 2025', 'web') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-file"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
