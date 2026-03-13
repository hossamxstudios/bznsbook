<!-- Project Requests section -->

<div class="col-md-8 offset-lg-1 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
    <div class="ps-md-3 ps-lg-0 mt-md-2">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h2 pt-xl-1 mb-0">{{ x_('Project Requests', 'web') }}</h1>
            <a href="#" class="btn btn-primary"><i class="bx bx-plus fs-lg me-2"></i>{{ x_('New Request', 'web') }}</a>
        </div>
        <!-- Nav tabs -->
        <ul class="mb-4 nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="received-tab" data-bs-toggle="tab" href="#received" role="tab"
                    aria-controls="received" aria-selected="true">
                    <i class="bx bx-download me-2"></i>{{ x_('Received Requests', 'web') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sent-tab" data-bs-toggle="tab" href="#sent" role="tab"
                    aria-controls="sent" aria-selected="false">
                    <i class="bx bx-upload me-2"></i>{{ x_('Sent Requests', 'web') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="archived-tab" data-bs-toggle="tab" href="#archived" role="tab"
                    aria-controls="archived" aria-selected="false">
                    <i class="bx bx-archive me-2"></i>{{ x_('Archived', 'web') }}
                </a>
            </li>
        </ul>

        <!-- Tab content -->
        <div class="tab-content">
            <!-- Received Requests -->
            <div class="tab-pane fade show active" id="received" role="tabpanel" aria-labelledby="received-tab">
                <div class="table-responsive">
                    <table class="table table-hover border-bottom">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">{{ x_('Client', 'web') }}</th>
                                <th scope="col">{{ x_('Project Type', 'web') }}</th>
                                <th scope="col">{{ x_('Budget', 'web') }}</th>
                                <th scope="col">{{ x_('Received On', 'web') }}</th>
                                <th scope="col">{{ x_('Status', 'web') }}</th>
                                <th scope="col">{{ x_('Actions', 'web') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-dark rounded-circle text-white p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-user"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('Michael Scott', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Dunder Mifflin Inc.', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('Website Development', 'web') }}</td>
                                <td>$5,000 - $8,000</td>
                                <td>{{ x_('May 18, 2025', 'web') }}</td>
                                <td><span class="badge bg-warning">{{ x_('Pending Response', 'web') }}</span></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-success">
                                            <i class="bx bx-check"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-danger">
                                            <i class="bx bx-x"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-dark rounded-circle text-white p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-building"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('Sarah Johnson', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Marketing Solutions LLC', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('Logo & Brand Identity', 'web') }}</td>
                                <td>$2,500 - $3,500</td>
                                <td>{{ x_('May 15, 2025', 'web') }}</td>
                                <td><span class="badge bg-warning">{{ x_('Pending Response', 'web') }}</span></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-success">
                                            <i class="bx bx-check"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-danger">
                                            <i class="bx bx-x"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-dark rounded-circle text-white p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-store"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('Robert Chen', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Horizon Retail Group', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('E-commerce Integration', 'web') }}</td>
                                <td>$7,000 - $12,000</td>
                                <td>{{ x_('May 12, 2025', 'web') }}</td>
                                <td><span class="badge bg-warning">{{ x_('Pending Response', 'web') }}</span></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-success">
                                            <i class="bx bx-check"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-danger">
                                            <i class="bx bx-x"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Sent Requests -->
            <div class="tab-pane fade" id="sent" role="tabpanel" aria-labelledby="sent-tab">
                <div class="table-responsive">
                    <table class="table table-hover border-bottom">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">{{ x_('Client', 'web') }}</th>
                                <th scope="col">{{ x_('Project Type', 'web') }}</th>
                                <th scope="col">{{ x_('Budget', 'web') }}</th>
                                <th scope="col">{{ x_('Sent On', 'web') }}</th>
                                <th scope="col">{{ x_('Status', 'web') }}</th>
                                <th scope="col">{{ x_('Actions', 'web') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-dark rounded-circle text-white p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-buildings"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('TechStart Inc.', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Software Development', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('Mobile App Development', 'web') }}</td>
                                <td>$15,000 - $25,000</td>
                                <td>{{ x_('May 17, 2025', 'web') }}</td>
                                <td><span class="badge bg-warning">{{ x_('Pending', 'web') }}</span></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-danger">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-dark rounded-circle text-white p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-shopping-bag"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('Fashion Forward', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Fashion Retail', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('Online Store Design', 'web') }}</td>
                                <td>$5,000 - $8,000</td>
                                <td>{{ x_('May 14, 2025', 'web') }}</td>
                                <td><span class="badge bg-info">{{ x_('In Discussion', 'web') }}</span></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-danger">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-dark rounded-circle text-white p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-food-menu"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('Green Table Restaurant', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Food & Beverage', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('Website & Menu Design', 'web') }}</td>
                                <td>$3,000 - $5,000</td>
                                <td>{{ x_('May 10, 2025', 'web') }}</td>
                                <td><span class="badge bg-success">{{ x_('Accepted', 'web') }}</span></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-message-square-detail"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Archived Requests -->
            <div class="tab-pane fade" id="archived" role="tabpanel" aria-labelledby="archived-tab">
                <div class="table-responsive">
                    <table class="table table-hover border-bottom">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">{{ x_('Client', 'web') }}</th>
                                <th scope="col">{{ x_('Project Type', 'web') }}</th>
                                <th scope="col">{{ x_('Budget', 'web') }}</th>
                                <th scope="col">{{ x_('Date', 'web') }}</th>
                                <th scope="col">{{ x_('Status', 'web') }}</th>
                                <th scope="col">{{ x_('Actions', 'web') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-dark rounded-circle text-white p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-briefcase"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('Global Consulting Ltd', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Business Services', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('Corporate Website', 'web') }}</td>
                                <td>$7,500 - $12,000</td>
                                <td>{{ x_('Mar 22, 2025', 'web') }}</td>
                                <td><span class="badge bg-danger">{{ x_('Rejected', 'web') }}</span></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-secondary">
                                            <i class="bx bx-refresh"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon btn-outline-danger">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-dark rounded-circle text-white p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-palette"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ x_('Art Studio 27', 'web') }}</h6>
                                            <span class="fs-sm text-muted">{{ x_('Art & Design', 'web') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ x_('Brand Identity', 'web') }}</td>
                                <td>$2,000 - $3,500</td>
                                <td>{{ x_('Feb 15, 2025', 'web') }}</td>
                                <td><span class="badge bg-success">{{ x_('Completed', 'web') }}</span></td>
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
