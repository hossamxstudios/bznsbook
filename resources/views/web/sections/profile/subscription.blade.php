<!-- Subscription section -->

<div class="col-md-8 offset-lg-1 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
    <div class="ps-md-3 ps-lg-0 mt-md-2">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1 class="mb-0 h2 pt-xl-1">{{ x_('Subscription', 'web') }}</h1>
            <a href="{{ route('web.select-plan') }}" class="btn btn-primary"><i class="bx bx-refresh fs-lg me-2"></i>{{ x_('Manage Plan', 'web') }}</a>
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
                        <h5 class="mb-1">{{ $planName }} {{ x_('Plan', 'web') }}</h5>
                        <p class="mb-0 text-muted">{{ x_('Your subscription expires on', 'web') }} {{ $endDate->format('M d, Y') }}</p>
                    </div>
                    <span class="badge bg-success ms-auto fs-sm">{{ x_('Active', 'web') }}</span>
                </div>

                <div class="mb-3 progress" style="height: 6px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percentUsed }}%;" aria-valuenow="{{ $percentUsed }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <div class="mb-4 d-flex justify-content-between">
                    <small class="text-muted">{{ round($daysRemaining,2) }} {{ x_('days remaining in your billing cycle', 'web') }}</small>
                    <small class="fw-medium">{{ $percentUsed }}% {{ x_('used', 'web') }}</small>
                </div>

                <div class="row g-3">
                    <div class="col-sm-6 col-md-4">
                        <div class="p-3 text-center rounded border">
                            <h3 class="mb-1 h1">{{ $user->portfolios()->count() }}/∞</h3>
                            <p class="mb-0 text-muted">{{ x_('Portfolio Items', 'web') }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="p-3 text-center rounded border">
                            <h3 class="mb-1 h1">{{ $user->seats()->where('is_accepted',0)->where('is_rejected',0)->count() }}/∞</h3>
                            <p class="mb-0 text-muted">{{ x_('Active Requests', 'web') }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="p-3 text-center rounded border">
                            <h3 class="mb-1 h1">{{ $user->services()->count() }}</h3>
                            <p class="mb-0 text-muted">{{ x_('Services', 'web') }}</p>
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
                    <h4>{{ x_('No Active Subscription', 'web') }}</h4>
                    <p class="text-muted">{{ x_('You don\'t have an active subscription plan. Subscribe to unlock premium features.', 'web') }}</p>
                </div>
                <a href="{{ route('web.select-plan') }}" class="btn btn-primary">{{ x_('Browse Subscription Plans', 'web') }}</a>
            </div>
        </div>
        @endif

        <!-- Subscription Details -->
        @if($user->hasActiveSubscription())
        <div class="mb-4 border-0 shadow-sm card">
            <div class="bg-transparent card-header d-flex align-items-center">
                <h5 class="mb-0">{{ x_('Plan Details', 'web') }}</h5>
                <span class="badge bg-dark ms-3">${{ number_format($subscription->price, 2) }} / {{ x_('Month', 'web') }} | {{ x_('billed', 'web') }} {{ $subscription->billing_cycle }}</span>
            </div>
            <div class="p-4 card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="mb-3">{{ $planName }} {{ x_('Plan Features', 'web') }}</h6>
                        <ul class="mb-0 list-unstyled">
                            <li class="mb-2 d-flex align-items-center">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                {{ x_('Unlimited concurrent projects', 'web') }}
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                {{ x_('Unlimited active project requests', 'web') }}
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                {{ x_('Unlimited portfolio items', 'web') }}
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                {{ x_('Priority matching', 'web') }}
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                {{ x_('Featured in search results', 'web') }}
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                {{ x_('Premium content access', 'web') }}
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bx bx-check-circle text-success me-2"></i>
                                {{ x_('Premium support', 'web') }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-3">{{ x_('Subscription Information', 'web') }}</h6>
                        <div class="mb-4">
                            <div class="mb-2 d-flex justify-content-between">
                                <span class="text-muted">{{ x_('Subscription ID:', 'web') }}</span>
                                <span class="fw-medium">{{ $subscription->id }}</span>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <span class="text-muted">{{ x_('Start Date:', 'web') }}</span>
                                <span class="fw-medium">{{ $startDate->format('M d, Y') }}</span>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <span class="text-muted">{{ x_('Expiry Date:', 'web') }}</span>
                                <span class="fw-medium">{{ $endDate->format('M d, Y') }}</span>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <span class="text-muted">{{ x_('Status:', 'web') }}</span>
                                <span class="badge bg-success">{{ x_('Active', 'web') }}</span>
                            </div>
                        </div>

                        <div class="mb-2 d-flex justify-content-between">
                            <span>{{ $planName }} {{ x_('Plan', 'web') }}</span>
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
                            <span>{{ $planName }} {{ x_('Plan', 'web') }} ({{ $months }} {{ $months > 1 ? x_('months', 'web') : x_('month', 'web') }})</span>
                            <span>{{ number_format($periodPrice, 2) }} $</span>
                        </div>
                        <div class="mb-2 d-flex justify-content-between text-muted">
                            <span>{{ x_('Tax (14%)', 'web') }}</span>
                            <span>{{ number_format($taxAmount, 2) }} $</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold">
                            <span>{{ x_('Total ($)', 'web') }}</span>
                            <span>{{ number_format($totalAmount, 2) }} $</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-transparent card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-0 text-muted">{{ x_('Expiry date:', 'web') }} <span class="fw-medium">{{ $endDate->format('M d, Y') }}</span></p>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('web.select-plan') }}" class="btn btn-outline-primary">{{ x_('Manage Plan', 'web') }}</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Billing History -->
        <div class="border-0 shadow-sm card">
            <div class="bg-transparent card-header">
                <h5 class="mb-0">{{ x_('Subscription History', 'web') }}</h5>
            </div>
            <div class="p-0 card-body">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>{{ x_('Date', 'web') }}</th>
                                <th>{{ x_('Plan', 'web') }}</th>
                                <th>{{ x_('Amount', 'web') }}</th>
                                <th>{{ x_('Period', 'web') }}</th>
                                <th>{{ x_('Status', 'web') }}</th>
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
                                <td>{{ $planName }} {{ x_('Plan', 'web') }} ({{ $months }} {{ $months > 1 ? x_('months', 'web') : x_('month', 'web') }})</td>
                                <td>{{ number_format($totalAmount, 2) }} $</td>
                                <td>{{ $startDate->format('M Y') }} - {{ $endDate->format('M Y') }}</td>
                                <td>
                                    @if($sub->is_active && $sub->is_paid && $endDate->gt(now()))
                                        <span class="badge bg-success">{{ x_('Active', 'web') }}</span>
                                    @elseif($sub->is_paid)
                                        <span class="badge bg-secondary">{{ x_('Expired', 'web') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ x_('Unpaid', 'web') }}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="py-4 text-center text-muted">{{ x_('No subscription history available', 'web') }}</td>
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
