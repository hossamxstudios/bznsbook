<!-- Subscription section -->

<div class="col-md-8 offset-lg-1 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
    <div class="ps-md-3 ps-lg-0 mt-md-2">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h2 pt-xl-1 mb-0">{{ x_('Subscription', 'web') }}</h1>
            <a href="#" class="btn btn-primary"><i class="bx bx-refresh fs-lg me-2"></i>{{ x_('Manage Plan', 'web') }}</a>
        </div>

        <!-- Current Plan -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-dark rounded-circle text-white p-3 me-4" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                        <i class="bx bx-crown fs-3"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">{{ x_('Premium Plan', 'web') }}</h5>
                        <p class="mb-0 text-muted">{{ x_('Your subscription renews on May 25, 2025', 'web') }}</p>
                    </div>
                    <span class="badge bg-success ms-auto fs-sm">{{ x_('Active', 'web') }}</span>
                </div>

                <div class="progress mb-3" style="height: 6px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <small class="text-muted">{{ x_('24 days remaining in your billing cycle', 'web') }}</small>
                    <small class="fw-medium">75% used</small>
                </div>

                <div class="row g-3">
                    <div class="col-sm-6 col-md-4">
                        <div class="p-3 border rounded text-center">
                            <h3 class="h1 mb-1">15/20</h3>
                            <p class="mb-0 text-muted">{{ x_('Projects', 'web') }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="p-3 border rounded text-center">
                            <h3 class="h1 mb-1">8/10</h3>
                            <p class="mb-0 text-muted">{{ x_('Active Requests', 'web') }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="p-3 border rounded text-center">
                            <h3 class="h1 mb-1">∞</h3>
                            <p class="mb-0 text-muted">{{ x_('Portfolio Items', 'web') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscription Details -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-transparent d-flex align-items-center">
                <h5 class="mb-0">{{ x_('Plan Details', 'web') }}</h5>
                <span class="badge bg-dark ms-3">{{ x_('$49.99/month', 'web') }}</span>
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="mb-3">{{ x_('Premium Plan Features', 'web') }}</h6>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-center mb-2">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                {{ x_('Up to 20 concurrent projects', 'web') }}
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                {{ x_('Up to 10 active project requests', 'web') }}
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                {{ x_('Unlimited portfolio items', 'web') }}
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                {{ x_('Priority matching', 'web') }}
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                {{ x_('Featured in search results', 'web') }}
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                {{ x_('Premium support', 'web') }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-3">{{ x_('Payment Details', 'web') }}</h6>
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-light rounded p-2 me-3">
                                <i class="bx bxl-visa fs-3"></i>
                            </div>
                            <div>
                                <p class="mb-0 fw-medium">{{ x_('Visa ending in 4242', 'web') }}</p>
                                <p class="text-muted mb-0 fs-sm">{{ x_('Expires 09/2027', 'web') }}</p>
                            </div>
                            <div class="ms-auto">
                                <a href="#" class="btn btn-sm btn-outline-secondary">{{ x_('Change', 'web') }}</a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>{{ x_('Premium Plan (Monthly)', 'web') }}</span>
                            <span>$49.99</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2 text-muted">
                            <span>{{ x_('Tax', 'web') }}</span>
                            <span>$5.00</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold">
                            <span>{{ x_('Total (USD)', 'web') }}</span>
                            <span>$54.99</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-0">{{ x_('Next billing date:', 'web') }} <span class="fw-medium">{{ x_('May 25, 2025', 'web') }}</span></p>
                    </div>
                    <div class="btn-group">
                        <a href="#" class="btn btn-outline-primary">{{ x_('Upgrade Plan', 'web') }}</a>
                        <a href="#" class="btn btn-outline-danger">{{ x_('Cancel Subscription', 'web') }}</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Billing History -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent">
                <h5 class="mb-0">{{ x_('Billing History', 'web') }}</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>{{ x_('Date', 'web') }}</th>
                                <th>{{ x_('Description', 'web') }}</th>
                                <th>{{ x_('Amount', 'web') }}</th>
                                <th>{{ x_('Status', 'web') }}</th>
                                <th>{{ x_('Invoice', 'web') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ x_('Apr 25, 2025', 'web') }}</td>
                                <td>{{ x_('Premium Plan - Monthly', 'web') }}</td>
                                <td>$54.99</td>
                                <td><span class="badge bg-success">{{ x_('Paid', 'web') }}</span></td>
                                <td><a href="#" class="btn btn-sm btn-icon btn-outline-secondary"><i class="bx bx-download"></i></a></td>
                            </tr>
                            <tr>
                                <td>{{ x_('Mar 25, 2025', 'web') }}</td>
                                <td>{{ x_('Premium Plan - Monthly', 'web') }}</td>
                                <td>$54.99</td>
                                <td><span class="badge bg-success">{{ x_('Paid', 'web') }}</span></td>
                                <td><a href="#" class="btn btn-sm btn-icon btn-outline-secondary"><i class="bx bx-download"></i></a></td>
                            </tr>
                            <tr>
                                <td>{{ x_('Feb 25, 2025', 'web') }}</td>
                                <td>{{ x_('Premium Plan - Monthly', 'web') }}</td>
                                <td>$54.99</td>
                                <td><span class="badge bg-success">{{ x_('Paid', 'web') }}</span></td>
                                <td><a href="#" class="btn btn-sm btn-icon btn-outline-secondary"><i class="bx bx-download"></i></a></td>
                            </tr>
                            <tr>
                                <td>{{ x_('Jan 25, 2025', 'web') }}</td>
                                <td>{{ x_('Basic Plan - Monthly (Upgraded)', 'web') }}</td>
                                <td>$29.99</td>
                                <td><span class="badge bg-success">{{ x_('Paid', 'web') }}</span></td>
                                <td><a href="#" class="btn btn-sm btn-icon btn-outline-secondary"><i class="bx bx-download"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
