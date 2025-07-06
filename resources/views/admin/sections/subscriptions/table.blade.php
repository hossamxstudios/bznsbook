<div class="tab-content">
    <div class="tab-pane fade show active" id="tab_active">
        <div class="px-5 pt-5 container-fluid">
            <div class="row">
                <div class="mb-3 col-md-12 mb-md-4">
                    <div class="mb-0 card rounded-8">
                        <div class="card-header card-header-action">
                            <h6>Active Subscriptions
                                <span class="badge badge-sm badge-light ms-1">{{ $active_subscriptions->count() }}</span>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success alert-wth-icon fade show" role="alert">
                                    <span class="alert-icon-wrap"><i class="ri-check-line"></i></span>
                                    <span>{{ session('success') }}</span>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger alert-wth-icon fade show" role="alert">
                                    <span class="alert-icon-wrap"><i class="ri-close-line"></i></span>
                                    <span>{{ session('error') }}</span>
                                </div>
                            @endif
                            <div class="contact-list-view">
                                <table id="datable_1" class="table nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Client</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Price</th>
                                            <th>Billing Cycle</th>
                                            <th>Payment Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($active_subscriptions as $subscription)
                                            <tr class="hover-row">
                                                <td>{{ $subscription->id }}</td>
                                                <td>
                                                    @if ($subscription->client)
                                                        <div class="d-flex align-items-center">
                                                            @if ($subscription->client->getFirstMediaUrl('profile'))
                                                                <div class="avatar avatar-xs me-2">
                                                                    <img src="{{ $subscription->client->getFirstMediaUrl('profile') }}"
                                                                        alt="client avatar"
                                                                        class="avatar-img rounded-circle">
                                                                </div>
                                                            @else
                                                                <div class="avatar avatar-xs avatar-soft-primary me-2">
                                                                    <span
                                                                        class="avatar-text rounded-circle">{{ substr($subscription->client->name, 0, 1) }}</span>
                                                                </div>
                                                            @endif
                                                            <div>{{ $subscription->client->name }}</div>
                                                        </div>
                                                    @else
                                                        <span class="text-muted">No client assigned</span>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($subscription->starts_at)->format('M d, Y') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($subscription->ends_at)->format('M d, Y') }}
                                                </td>
                                                <td>
                                                    <span class="badge badge-soft-primary">$
                                                        {{ number_format($subscription->price, 2) }}</span>
                                                </td>
                                                <td>{{ ucfirst($subscription->billing_cycle) }}</td>
                                                <td>
                                                    @if ($subscription->is_paid)
                                                        <span class="badge badge-soft-success">Paid</span>
                                                    @else
                                                        <span class="badge badge-soft-danger">Unpaid</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        @if ($subscription->is_paid == 0)
                                                            <button type="button" class="btn btn-icon btn-sm btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="modal" data-bs-target="#togglePaidModal{{ $subscription->id }}" title="Mark as Paid">
                                                                <span class="icon">
                                                                    <span class="feather-icon">
                                                                        <i data-feather="check-circle" class="text-success"></i>
                                                                    </span>
                                                                </span>
                                                            </button>
                                                        @endif
                                                        <!-- Expire Subscription Button -->
                                                        <button type="button"
                                                            class="btn btn-icon btn-sm btn-flush-dark btn-rounded flush-soft-hover ms-1"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#expireModal{{ $subscription->id }}"
                                                            title="Expire Subscription">
                                                            <span class="icon">
                                                                <span class="feather-icon">
                                                                    <i data-feather="clock" class="text-warning"></i>
                                                                </span>
                                                            </span>
                                                        </button>

                                                        <!-- More Actions Dropdown -->
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn btn-icon btn-sm btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret ms-1"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <span class="icon">
                                                                    <span class="feather-icon">
                                                                        <i data-feather="more-vertical"></i>
                                                                    </span>
                                                                </span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editModal{{ $subscription->id }}">Edit</a>
                                                                <a class="dropdown-item" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal{{ $subscription->id }}">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="tab_expired">
        <div class="px-5 pt-5 container-fluid">
            <div class="row">
                <div class="mb-3 col-md-12 mb-md-4">
                    <div class="mb-0 card rounded-8">
                        <div class="card-header card-header-action">
                            <h6>Expired Subscriptions
                                <span
                                    class="badge badge-sm badge-light ms-1">{{ $expired_subscriptions->count() }}</span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="contact-list-view">
                                <table id="datable_2" class="table nowrap w-100" style="min-width:90vw!important;">
                                    <thead style="min-width: 100%!important;">
                                        <tr style="min-width: 100%!important;">
                                            <th>ID</th>
                                            <th>Client</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Price</th>
                                            <th>Billing Cycle</th>
                                            <th>Payment Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($expired_subscriptions as $subscription)
                                            <tr class="hover-row">
                                                <td>{{ $subscription->id }}</td>
                                                <td>
                                                    @if ($subscription->client)
                                                        <div class="d-flex align-items-center">
                                                            @if ($subscription->client->getFirstMediaUrl('profile'))
                                                                <div class="avatar avatar-xs me-2">
                                                                     <img src="{{ $subscription->client->getFirstMediaUrl('profile') }}"  alt="client avatar" class="avatar-img rounded-circle">
                                                                </div>
                                                            @else
                                                                <div
                                                                    class="avatar avatar-xs avatar-soft-primary me-2">
                                                                    <span
                                                                        class="avatar-text rounded-circle">{{ substr($subscription->client->name, 0, 1) }}</span>
                                                                </div>
                                                            @endif
                                                            <div>{{ $subscription->client->name }}</div>
                                                        </div>
                                                    @else
                                                        <span class="text-muted">No client assigned</span>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($subscription->starts_at)->format('M d, Y') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($subscription->ends_at)->format('M d, Y') }}
                                                </td>
                                                <td>
                                                    <span class="badge badge-soft-primary">$
                                                        {{ number_format($subscription->price, 2) }}</span>
                                                </td>
                                                <td>{{ ucfirst($subscription->billing_cycle) }}</td>
                                                <td>
                                                    @if ($subscription->is_paid)
                                                        <span class="badge badge-soft-success">Paid</span>
                                                    @else
                                                        <span class="badge badge-soft-danger">Unpaid</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        @if ($subscription->is_paid == 0)
                                                            <button type="button" class="btn btn-icon btn-sm btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="modal" data-bs-target="#togglePaidModal{{ $subscription->id }}" title="Mark as Paid">
                                                                <span class="icon">
                                                                    <span class="feather-icon">
                                                                        <i data-feather="check-circle"
                                                                            class="text-success"></i>
                                                                    </span>
                                                                </span>
                                                            </button>
                                                        @endif
                                                        <!-- Activate Subscription Button -->
                                                        <button type="button" class="btn btn-icon btn-sm btn-flush-dark btn-rounded flush-soft-hover ms-1" data-bs-toggle="modal" data-bs-target="#activateModal{{ $subscription->id }}" title="Activate Subscription">
                                                            <span class="icon">
                                                                <span class="feather-icon">
                                                                    <i data-feather="refresh-cw"
                                                                        class="text-success"></i>
                                                                </span>
                                                            </span>
                                                        </button>
                                                        <!-- More Actions Dropdown -->
                                                        <div class="dropdown">
                                                            <button class="btn btn-icon btn-sm btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret ms-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <span class="icon">
                                                                    <span class="feather-icon">
                                                                        <i data-feather="more-vertical"></i>
                                                                    </span>
                                                                </span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                 <a class="dropdown-item" href="#" data-bs-toggle="modal"data-bs-target="#editModal{{ $subscription->id }}">Edit</a>
                                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $subscription->id }}">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
