<!-- Project Requests section -->

<div class="col-md-8 offset-lg-1 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
    <div class="ps-md-3 ps-lg-0 mt-md-2">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h2 pt-xl-1 mb-0">Project Requests</h1>
            <a href="#" class="btn btn-primary"><i class="bx bx-plus fs-lg me-2"></i>New Request</a>
        </div>
        <!-- Nav tabs -->
        <ul class="mb-4 nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="received-tab" data-bs-toggle="tab" href="#received" role="tab"
                    aria-controls="received" aria-selected="true">
                    <i class="bx bx-download me-2"></i>Received Requests
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sent-tab" data-bs-toggle="tab" href="#sent" role="tab"
                    aria-controls="sent" aria-selected="false">
                    <i class="bx bx-upload me-2"></i>Sent Requests
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="archived-tab" data-bs-toggle="tab" href="#archived" role="tab"
                    aria-controls="archived" aria-selected="false">
                    <i class="bx bx-archive me-2"></i>Archived
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
                                <th scope="col">Client</th>
                                <th scope="col">Project Type</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Received On</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
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
                                            <h6 class="mb-0">Michael Scott</h6>
                                            <span class="fs-sm text-muted">Dunder Mifflin Inc.</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Website Development</td>
                                <td>$5,000 - $8,000</td>
                                <td>May 18, 2025</td>
                                <td><span class="badge bg-warning">Pending Response</span></td>
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
                                            <h6 class="mb-0">Sarah Johnson</h6>
                                            <span class="fs-sm text-muted">Marketing Solutions LLC</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Logo & Brand Identity</td>
                                <td>$2,500 - $3,500</td>
                                <td>May 15, 2025</td>
                                <td><span class="badge bg-warning">Pending Response</span></td>
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
                                            <h6 class="mb-0">Robert Chen</h6>
                                            <span class="fs-sm text-muted">Horizon Retail Group</span>
                                        </div>
                                    </div>
                                </td>
                                <td>E-commerce Integration</td>
                                <td>$7,000 - $12,000</td>
                                <td>May 12, 2025</td>
                                <td><span class="badge bg-warning">Pending Response</span></td>
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
                                <th scope="col">Client</th>
                                <th scope="col">Project Type</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Sent On</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
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
                                            <h6 class="mb-0">TechStart Inc.</h6>
                                            <span class="fs-sm text-muted">Software Development</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Mobile App Development</td>
                                <td>$15,000 - $25,000</td>
                                <td>May 17, 2025</td>
                                <td><span class="badge bg-warning">Pending</span></td>
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
                                            <h6 class="mb-0">Fashion Forward</h6>
                                            <span class="fs-sm text-muted">Fashion Retail</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Online Store Design</td>
                                <td>$5,000 - $8,000</td>
                                <td>May 14, 2025</td>
                                <td><span class="badge bg-info">In Discussion</span></td>
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
                                            <h6 class="mb-0">Green Table Restaurant</h6>
                                            <span class="fs-sm text-muted">Food & Beverage</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Website & Menu Design</td>
                                <td>$3,000 - $5,000</td>
                                <td>May 10, 2025</td>
                                <td><span class="badge bg-success">Accepted</span></td>
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
                                <th scope="col">Client</th>
                                <th scope="col">Project Type</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
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
                                            <h6 class="mb-0">Global Consulting Ltd</h6>
                                            <span class="fs-sm text-muted">Business Services</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Corporate Website</td>
                                <td>$7,500 - $12,000</td>
                                <td>Mar 22, 2025</td>
                                <td><span class="badge bg-danger">Rejected</span></td>
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
                                            <h6 class="mb-0">Art Studio 27</h6>
                                            <span class="fs-sm text-muted">Art & Design</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Brand Identity</td>
                                <td>$2,000 - $3,500</td>
                                <td>Feb 15, 2025</td>
                                <td><span class="badge bg-success">Completed</span></td>
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
