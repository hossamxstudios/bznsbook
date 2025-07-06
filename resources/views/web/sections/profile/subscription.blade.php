<!-- Subscription section -->

<div class="col-md-8 offset-lg-1 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
    <div class="ps-md-3 ps-lg-0 mt-md-2">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1 class="mb-0 h2 pt-xl-1">Subscription</h1>
            <a href="{{ route('web.select-plan') }}" class="btn btn-primary"><i class="bx bx-refresh fs-lg me-2"></i>Manage Plan</a>
        </div>

        @if($user->hasActiveSubscription())
        @php
            $subscription  = $user->subscriptions()->where('is_active', true)->where('is_paid', true)->where('ends_at', '>', now())->latest('starts_at')->first();
            $startDate     = \Carbon\Carbon::parse($subscription->starts_at);
            $endDate       = \Carbon\Carbon::parse($subscription->ends_at);
            $now           = \Carbon\Carbon::now();

            $totalDays     = $startDate->diffInDays($endDate);
            $daysUsed      = $startDate->diffInDays($now);
            $daysRemaining = $now->diffInDays($endDate);

            $percentUsed   = min(100, round(($daysUsed / $totalDays) * 100));

            // Get billing cycle name in title case
            $planName      = ucfirst(str_replace('-', ' ', $subscription->billing_cycle));
        @endphp

        <!-- Current Plan -->
        <div class="mb-4 border-0 shadow-sm card">
            <div class="p-4 card-body">
                <div class="mb-3 d-flex align-items-center">
                    <div class="p-3 text-white bg-dark rounded-circle me-4" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                        <i class="bx bx-crown fs-3"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">{{ $planName }} Plan</h5>
                        <p class="mb-0 text-muted">Your subscription expires on {{ $endDate->format('M d, Y') }}</p>
                    </div>
                    <span class="badge bg-success ms-auto fs-sm">Active</span>
                </div>

                <div class="mb-3 progress" style="height: 6px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percentUsed }}%;" aria-valuenow="{{ $percentUsed }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <div class="mb-4 d-flex justify-content-between">
                    <small class="text-muted">{{ round($daysRemaining,2) }} days remaining in your billing cycle</small>
                    <small class="fw-medium">{{ $percentUsed }}% used</small>
                </div>

                <div class="row g-3">
                    <div class="col-sm-6 col-md-4">
                        <div class="p-3 text-center rounded border">
                            <h3 class="mb-1 h1">{{ $user->portfolios()->count() }}/∞</h3>
                            <p class="mb-0 text-muted">Portfolio Items</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="p-3 text-center rounded border">
                            <h3 class="mb-1 h1">{{ $user->seats()->where('is_accepted',0)->where('is_rejected',0)->count() }}/∞</h3>
                            <p class="mb-0 text-muted">Active Requests</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="p-3 text-center rounded border">
                            <h3 class="mb-1 h1">{{ $user->services()->count() }}</h3>
                            <p class="mb-0 text-muted">Services</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- No Active Subscription -->
        <div class="mb-4 border-0 shadow-sm card">
            <div class="p-4 text-center card-body">
                <div class="mb-4">
                    <div class="p-3 mx-auto mb-3 bg-light rounded-circle text-muted" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                        <i class="bx bx-calendar-x fs-1"></i>
                    </div>
                    <h4>No Active Subscription</h4>
                    <p class="text-muted">You don't have an active subscription plan. Subscribe to unlock premium features.</p>
                </div>
                <a href="{{ route('web.select-plan') }}" class="btn btn-primary">Browse Subscription Plans</a>
            </div>
        </div>
        @endif

        <!-- Subscription Details -->
        @if($user->hasActiveSubscription())
        <div class="mb-4 border-0 shadow-sm card">
            <div class="bg-transparent card-header d-flex align-items-center">
                <h5 class="mb-0">Plan Details</h5>
                <span class="badge bg-dark ms-3">${{ number_format($subscription->price, 2) }} / Month | billed {{ $subscription->billing_cycle }}</span>
            </div>
            <div class="p-4 card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="mb-3">{{ $planName }} Plan Features</h6>
                        <ul class="mb-0 list-unstyled">
                            <li class="mb-2 d-flex align-items-center">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                Unlimited concurrent projects
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                Unlimited active project requests
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                Unlimited portfolio items
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                Priority matching
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                Featured in search results
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                Premium content access
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                Premium support
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-3">Subscription Information</h6>
                        <div class="mb-4">
                            <div class="mb-2 d-flex justify-content-between">
                                <span class="text-muted">Subscription ID:</span>
                                <span class="fw-medium">{{ $subscription->id }}</span>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <span class="text-muted">Start Date:</span>
                                <span class="fw-medium">{{ $startDate->format('M d, Y') }}</span>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <span class="text-muted">Expiry Date:</span>
                                <span class="fw-medium">{{ $endDate->format('M d, Y') }}</span>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <span class="text-muted">Status:</span>
                                <span class="badge bg-success">Active</span>
                            </div>
                        </div>

                        <div class="mb-2 d-flex justify-content-between">
                            <span>{{ $planName }} Plan</span>
                            <span>{{ number_format($subscription->price, 2) }} $</span>
                        </div>
                        @php
                            // Determine number of months based on billing cycle
                            $months = 1; // Default to 1 month
                            if ($subscription->billing_cycle == 'monthly') {
                                $months = 1;
                            } elseif ($subscription->billing_cycle == 'semi-annual') {
                                $months = 6;
                            } elseif ($subscription->billing_cycle == 'annual') {
                                $months = 12;
                            }

                            // Calculate subscription price for the entire period
                            $periodPrice = $subscription->price * $months;
                            $taxRate = 0.14; // 14% tax rate
                            $taxAmount = $periodPrice * $taxRate;
                            $totalAmount = $periodPrice + $taxAmount;
                        @endphp
                        <div class="mb-2 d-flex justify-content-between">
                            <span>{{ $planName }} Plan ({{ $months }} month{{ $months > 1 ? 's' : '' }})</span>
                            <span>{{ number_format($periodPrice, 2) }} $</span>
                        </div>
                        <div class="mb-2 d-flex justify-content-between text-muted">
                            <span>Tax (14%)</span>
                            <span>{{ number_format($taxAmount, 2) }} $</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold">
                            <span>Total ($)</span>
                            <span>{{ number_format($totalAmount, 2) }} $</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-transparent card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-0 text-muted">Expiry date: <span class="fw-medium">{{ $endDate->format('M d, Y') }}</span></p>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('web.select-plan') }}" class="btn btn-outline-primary">Manage Plan</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Billing History -->
        <div class="border-0 shadow-sm card">
            <div class="bg-transparent card-header">
                <h5 class="mb-0">Subscription History</h5>
            </div>
            <div class="p-0 card-body">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Plan</th>
                                <th>Amount</th>
                                <th>Period</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $subscriptions = $user->subscriptions()->orderBy('created_at', 'desc')->get();
                        @endphp
                        @if($subscriptions->count() > 0)
                            @foreach($subscriptions as $sub)
                            @php
                                $planName = ucfirst(str_replace('-', ' ', $sub->billing_cycle));
                                $startDate = \Carbon\Carbon::parse($sub->starts_at);
                                $endDate = \Carbon\Carbon::parse($sub->ends_at);

                                // Calculate number of months based on billing cycle
                                $months = 1;
                                if ($sub->billing_cycle == 'monthly') {
                                    $months = 1;
                                } elseif ($sub->billing_cycle == 'semi-annual') {
                                    $months = 6;
                                } elseif ($sub->billing_cycle == 'annual') {
                                    $months = 12;
                                }

                                // Calculate total price for the period
                                $periodPrice = $sub->price * $months;
                                $taxAmount = $periodPrice * 0.14;
                                $totalAmount = $periodPrice + $taxAmount;
                            @endphp
                            <tr>
                                <td>{{ $startDate->format('M d, Y') }}</td>
                                <td>{{ $planName }} Plan ({{ $months }} month{{ $months > 1 ? 's' : '' }})</td>
                                <td>{{ number_format($totalAmount, 2) }} $</td>
                                <td>{{ $startDate->format('M Y') }} - {{ $endDate->format('M Y') }}</td>
                                <td>
                                    @if($sub->is_active && $sub->is_paid && $endDate->gt(now()))
                                        <span class="badge bg-success">Active</span>
                                    @elseif($sub->is_paid)
                                        <span class="badge bg-secondary">Expired</span>
                                    @else
                                        <span class="badge bg-danger">Unpaid</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="py-4 text-center text-muted">No subscription history available</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
