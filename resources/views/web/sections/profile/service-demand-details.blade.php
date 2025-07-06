<div class="col-md-9 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
    <div class="ps-md-3 ps-lg-0 mt-md-2">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <div>
                <div class="mb-2 d-flex align-items-center">
                    <a href="{{ $demand->from_client_id == $user->id ? route('client.services.requested') : route('client.services.requests') }}"
                        class="btn btn-outline-secondary btn-sm me-3">
                        <i class="ri-arrow-left-line fs-6"></i>
                    </a>
                    <h1 class="mb-0 h2 pt-xl-1">Service Request Details</h1>
                </div>
                <p class="mb-0 text-muted">Created on {{ $demand->created_at->format('M d, Y') }}</p>
            </div>
            <div>
                @if ($demand->is_completed)
                    <span class="p-2 badge bg-success fs-sm">Completed</span>
                @elseif($demand->is_accepted)
                    <span class="p-2 badge bg-primary fs-sm">Accepted</span>
                @elseif($demand->is_rejected)
                    <span class="p-2 badge bg-danger fs-sm">Rejected</span>
                @else
                    <span class="p-2 badge bg-warning text-dark fs-sm">Pending</span>
                @endif
            </div>
        </div>

        <div class="row g-4">
            <!-- Service Details -->
            <div class="col-md-6">
                <div class="mb-4 border-0 shadow-sm card h-100">
                    <div class="bg-transparent card-header d-flex align-items-center">
                        <h5 class="mb-0">Service Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 d-flex align-items-center">
                            {{-- @if ($demand->service->getFirstMediaUrl('image'))
                                <img src="{{ $demand->service->getFirstMediaUrl('image') }}" class="rounded me-3" width="80" height="80" alt="{{ $demand->service->name }}">
                            @else --}}
                            <div class="rounded bg-secondary me-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="text-dark bx bx-briefcase fs-3"></i>
                            </div>
                            {{-- @endif --}}
                            <div>
                                <h4 class="mb-1">{{ $demand->service->name }}</h4>
                                <p class="mb-0 text-muted">{{ $demand->service->short_description }}</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6>Description</h6>
                            <p>{{ $demand->service->description }}</p>
                        </div>

                        @if ($demand->service->skills)
                            <div class="mb-3">
                                <h6>Skills</h6>
                                <div class="flex-wrap gap-2 d-flex">
                                    @foreach ($demand->service->skills as $skill)
                                        <span class="badge bg-light text-dark">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($demand->service->skill_level)
                            <div class="mb-3">
                                <h6>Skill Level</h6>
                                <div class="star-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i
                                            class="ri {{ $i <= $demand->service->skill_level ? 'ri-star-fill text-warning' : 'ri-star-line' }}"></i>
                                    @endfor
                                </div>
                            </div>
                        @endif

                        <div class="mb-3">
                            <h6>Price Range</h6>
                            <p class="mb-0">${{ number_format($demand->service->price_min) }} -
                                ${{ number_format($demand->service->price_max) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Request Details -->
            <div class="col-md-6">
                <div class="mb-4 border-0 shadow-sm card h-100">
                    <div class="bg-transparent card-header d-flex align-items-center">
                        <h5 class="mb-0">Request Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6>Client Information</h6>
                            <div class="mb-3 d-flex align-items-center">
                                @if ($demand->from_client_id == $user->id)
                                    @if ($demand->to_client->getFirstMediaUrl('profile_picture'))
                                        <img src="{{ $demand->to_client->getFirstMediaUrl('profile_picture') }}"
                                            class="rounded-circle me-3" width="48" height="48"
                                            alt="{{ $demand->to_client->name }}">
                                    @else
                                        <div class="bg-secondary rounded-circle me-3 d-flex align-items-center justify-content-center"
                                            style="width: 48px; height: 48px;">
                                            <i class="text-dark bx bx-user"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h6 class="mb-0">{{ $demand->to_client->name }}</h6>
                                        <small class="text-muted">Service Provider</small>
                                    </div>
                                @else
                                    @if ($demand->from_client->getFirstMediaUrl('profile_picture'))
                                        <img src="{{ $demand->from_client->getFirstMediaUrl('profile_picture') }}"
                                            class="rounded-circle me-3" width="48" height="48"
                                            alt="{{ $demand->from_client->name }}">
                                    @else
                                        <div class="bg-secondary rounded-circle me-3 d-flex align-items-center justify-content-center"
                                            style="width: 48px; height: 48px;">
                                            <i class="text-dark bx bx-user"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h6 class="mb-0">{{ $demand->from_client->name }}</h6>
                                        <small class="text-muted">Client</small>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6>Project Details</h6>
                            <p>{{ $demand->details }}</p>
                        </div>

                        <div class="mb-3 row">
                            <div class="mb-3 col-md-6">
                                <h6>Budget</h6>
                                <p class="mb-0">
                                    @if ($demand->budget_min && $demand->budget_max)
                                        ${{ number_format($demand->budget_min, 0) }} -
                                        ${{ number_format($demand->budget_max, 0) }}
                                    @elseif($demand->budget_min)
                                        ${{ number_format($demand->budget_min, 0) }}+
                                    @elseif($demand->budget_max)
                                        Up to ${{ number_format($demand->budget_max, 0) }}
                                    @else
                                        Not specified
                                    @endif
                                </p>
                            </div>
                            <div class="mb-3 col-md-6">
                                <h6>Timeframe</h6>
                                <p class="mb-0">{{ $demand->weeks ?? 'Not specified' }} {{ $demand->weeks > 1 ? 'weeks' : 'week' }}</p>
                            </div>
                            @if ($demand->start_date)
                                <div class="col-md-6">
                                    <h6>Start Date</h6>
                                    <p class="mb-0">
                                        {{ \Carbon\Carbon::parse($demand->start_date)->format('M d, Y') }}</p>
                                </div>
                            @endif
                        </div>

                        {{-- @if ($demand->getFirstMedia('proposal')) --}}
                        <div class="mb-3">
                            <h6>Attached Proposal</h6>
                            <div class="p-3 rounded border bg-light">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 rounded me-3 bg-primary">
                                            <i class="text-dark bx bxs-file-pdf fs-4"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ $demand->getFirstMedia('proposal')?->file_name }}
                                            </h6>
                                            <small
                                                class="text-muted">{{ number_format($demand->getFirstMedia('proposal')?->size / 1024, 2) }}
                                                KB • Uploaded
                                                {{ $demand->getFirstMedia('proposal')?->created_at->format('M d, Y') }}</small>
                                        </div>
                                    </div>
                                    <a href="{{ $demand->getFirstMediaUrl('proposal') }}" class="btn btn-primary"
                                        target="_blank">
                                        <i class="bx bx-download me-2"></i>Download
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex-wrap gap-3 mt-4 d-flex justify-content-end">
            @if ($demand->to_client_id == $user->id && !$demand->is_accepted && !$demand->is_rejected)
                <form action="{{ route('client.services.demand.reject', $demand->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger"
                        onclick="return confirm('Are you sure you want to reject this request?')">
                        <i class="bx bx-x me-2"></i>Reject Request
                    </button>
                </form>
                <form action="{{ route('client.services.demand.accept', $demand->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary"
                        onclick="return confirm('Are you sure you want to accept this request?')">
                        <i class="bx bx-check me-2"></i>Accept Request
                    </button>
                </form>
            @elseif($demand->is_accepted && !$demand->is_completed)
                <form action="{{ route('client.services.demand.complete', $demand->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success"
                        onclick="return confirm('Are you sure you want to mark this as completed?')">
                        <i class="bx bx-check-circle me-2"></i>Mark as Completed
                    </button>
                </form>
            @endif
        </div>

        <!-- Review Section - Show if the demand is completed and has reviews -->
        @if($demand->is_completed && $demand->reviews()->count() > 0)
        <div class="mt-4">
            <div class="border-0 shadow-sm card">
                <div class="bg-transparent card-header">
                    <h5 class="mb-0">Client Reviews</h5>
                </div>
                <div class="card-body">
                    @foreach($demand->reviews as $review)
                    <div class="mb-4 {{ !$loop->last ? 'border-bottom pb-4' : '' }}">
                        <div class="mb-2 d-flex align-items-center">
                            <div class="me-3">
                                @if($review->client->getFirstMediaUrl('profile_picture'))
                                    <img src="{{ $review->client->getFirstMediaUrl('profile_picture') }}" class="rounded-circle" width="50" height="50" alt="{{ $review->client->name }}">
                                @else
                                    <div class="p-2 rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                        <i class="ri-user-line text-dark"></i>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <h6 class="mb-0">{{ $review->client->name }}</h6>
                                <div class="mb-1 d-flex align-items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="ri {{ $i <= $review->rating ? 'ri-star-fill text-warning' : 'ri-star-line' }} me-1"></i>
                                    @endfor
                                    <span class="ms-1 text-muted small">({{ $review->rating }}/5)</span>
                                </div>
                                <div class="text-muted small">{{ $review->created_at->format('M d, Y') }}</div>
                            </div>
                            @if($review->is_approved)
                                <span class="ms-auto badge bg-success">Approved</span>
                            @else
                                <span class="ms-auto badge bg-warning text-dark">Pending approval</span>
                            @endif
                        </div>
                        <div class="mt-2 ps-5 ms-3">
                            <p class="mb-0">{{ $review->content }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
