<!-- Project section -->

<div class="col-md-8 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
    <div class="ps-md-3 ps-lg-0 mt-md-2 8">
        <div class="alert alert-info">
            <h5 class="alert-heading"><i class="bx bx-info-circle me-2"></i>Projects Have Moved!</h5>
            <p>Our project management system has been upgraded with new features. You are being redirected to the new project dashboard...</p>
            <hr>
            <p class="mb-0">If you are not redirected automatically, please <a href="{{ route('client.projects.applications') }}" class="alert-link">click here</a>.</p>
        </div>
        <script>
            // Redirect to the new project applications page after a short delay
            setTimeout(function() {
                window.location.href = '{{ route('client.projects.applications') }}';
            }, 2000);
        </script>
        <!-- Nav tabs -->
        <ul class="mb-4 nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="basic-tab" data-bs-toggle="tab" href="#basic" role="tab"
                    aria-controls="basic" aria-selected="true">
                    <i class="bx bx-user me-2"></i>All Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab"
                    aria-controls="address" aria-selected="false">
                    <i class="bx bx-map me-2"></i>Pending
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="social-tab" data-bs-toggle="tab" href="#social" role="tab"
                    aria-controls="social" aria-selected="false">
                    <i class="bx bx-globe me-2"></i>Active
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="security-tab" data-bs-toggle="tab" href="#security" role="tab"
                    aria-controls="security" aria-selected="false">
                    <i class="bx bx-lock-alt me-2"></i>Closed
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
                                <th scope="col">Project Name</th>
                                <th scope="col">Client</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Status</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Actions</th>
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
                                            <h6 class="mb-0">Website Redesign</h6>
                                            <span class="fs-sm text-muted">Web Development</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Tech Solutions Ltd</td>
                                <td>$4,500</td>
                                <td><span class="badge bg-info">In Progress</span></td>
                                <td>Jun 15, 2025</td>
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
                                            <h6 class="mb-0">E-commerce Platform</h6>
                                            <span class="fs-sm text-muted">Full Stack Development</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Fashion Retail Inc</td>
                                <td>$8,200</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>Apr 30, 2025</td>
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
                                            <h6 class="mb-0">Mobile App Development</h6>
                                            <span class="fs-sm text-muted">iOS/Android</span>
                                        </div>
                                    </div>
                                </td>
                                <td>HealthTech Startup</td>
                                <td>$12,000</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>Jul 22, 2025</td>
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
                                            <h6 class="mb-0">SEO Optimization</h6>
                                            <span class="fs-sm text-muted">Digital Marketing</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Local Business Group</td>
                                <td>$2,800</td>
                                <td><span class="badge bg-danger">Cancelled</span></td>
                                <td>Mar 10, 2025</td>
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
                                <th scope="col">Project Name</th>
                                <th scope="col">Client</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Status</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Actions</th>
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
                                            <h6 class="mb-0">Mobile App Development</h6>
                                            <span class="fs-sm text-muted">iOS/Android</span>
                                        </div>
                                    </div>
                                </td>
                                <td>HealthTech Startup</td>
                                <td>$12,000</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>Jul 22, 2025</td>
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
                                            <h6 class="mb-0">Content Strategy</h6>
                                            <span class="fs-sm text-muted">Content Marketing</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Education Portal</td>
                                <td>$3,800</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>Aug 05, 2025</td>
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
                                <th scope="col">Project Name</th>
                                <th scope="col">Client</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Status</th>
                                <th scope="col">Progress</th>
                                <th scope="col">Actions</th>
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
                                            <h6 class="mb-0">Website Redesign</h6>
                                            <span class="fs-sm text-muted">Web Development</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Tech Solutions Ltd</td>
                                <td>$4,500</td>
                                <td><span class="badge bg-info">In Progress</span></td>
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
                                            <h6 class="mb-0">Analytics Dashboard</h6>
                                            <span class="fs-sm text-muted">Data Visualization</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Metric Insights Co.</td>
                                <td>$5,200</td>
                                <td><span class="badge bg-info">In Progress</span></td>
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
                                <th scope="col">Project Name</th>
                                <th scope="col">Client</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Status</th>
                                <th scope="col">Completed On</th>
                                <th scope="col">Actions</th>
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
                                            <h6 class="mb-0">E-commerce Platform</h6>
                                            <span class="fs-sm text-muted">Full Stack Development</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Fashion Retail Inc</td>
                                <td>$8,200</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>Apr 30, 2025</td>
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
                                            <h6 class="mb-0">SEO Optimization</h6>
                                            <span class="fs-sm text-muted">Digital Marketing</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Local Business Group</td>
                                <td>$2,800</td>
                                <td><span class="badge bg-danger">Cancelled</span></td>
                                <td>Mar 10, 2025</td>
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
                                            <h6 class="mb-0">Email Marketing Campaign</h6>
                                            <span class="fs-sm text-muted">Marketing</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Real Estate Agency</td>
                                <td>$1,750</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>Feb 28, 2025</td>
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
