<div class="col-md-9 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
    <div class="ps-md-3 ps-lg-0 mt-md-2">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <div>
                <div class="mb-2 d-flex align-items-center">
                    <a href="{{ $demand->from_client_id == $user->id ? route('client.services.requested') : route('client.services.requests') }}"
                        class="btn btn-outline-secondary btn-sm me-3">
                        <i class="ri-arrow-left-line fs-6"></i>
                    </a>
                    <h1 class="mb-0 h2 pt-xl-1">{{ x_('Service Request Details', 'web') }}</h1>
                </div>
                <p class="mb-0 text-muted">{{ x_('Created on', 'web') }} {{ $demand->created_at->format('M d, Y') }}</p>
            </div>
            <div>
                @if ($demand->is_completed)
                    <span class="p-2 badge bg-success fs-sm">{{ x_('Completed', 'web') }}</span>
                @elseif($demand->is_accepted)
                    <span class="p-2 badge bg-primary fs-sm">{{ x_('Accepted', 'web') }}</span>
                @elseif($demand->is_rejected)
                    <span class="p-2 badge bg-danger fs-sm">{{ x_('Rejected', 'web') }}</span>
                @else
                    <span class="p-2 badge bg-warning text-dark fs-sm">{{ x_('Pending', 'web') }}</span>
                @endif
            </div>
        </div>

        <div class="row g-4">
            <!-- Service Details -->
            <div class="col-md-6">
                <div class="mb-4 border-0 shadow-sm card h-100">
                    <div class="bg-transparent card-header d-flex align-items-center">
                        <h5 class="mb-0">{{ x_('Service Details', 'web') }}</h5>
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
                            <h6>{{ x_('Description', 'web') }}</h6>
                            <p>{{ $demand->service->description }}</p>
                        </div>

                        @if ($demand->service->skills)
                            <div class="mb-3">
                                <h6>{{ x_('Skills', 'web') }}</h6>
                                <div class="flex-wrap gap-2 d-flex">
                                    @foreach ($demand->service->skills as $skill)
                                        <span class="badge bg-light text-dark">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($demand->service->skill_level)
                            <div class="mb-3">
                                <h6>{{ x_('Skill Level', 'web') }}</h6>
                                <div class="star-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i
                                            class="ri {{ $i <= $demand->service->skill_level ? 'ri-star-fill text-warning' : 'ri-star-line' }}"></i>
                                    @endfor
                                </div>
                            </div>
                        @endif

                        <div class="mb-3">
                            <h6>{{ x_('Price Range', 'web') }}</h6>
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
                        <h5 class="mb-0">{{ x_('Request Details', 'web') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6>{{ x_('Client Information', 'web') }}</h6>
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
                                        <small class="text-muted">{{ x_('Service Provider', 'web') }}</small>
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
                                        <small class="text-muted">{{ x_('Client', 'web') }}</small>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6>{{ x_('Project Details', 'web') }}</h6>
                            <p>{{ $demand->details }}</p>
                        </div>

                        <div class="mb-3 row">
                            <div class="mb-3 col-md-6">
                                <h6>{{ x_('Budget', 'web') }}</h6>
                                <p class="mb-0">
                                    @if ($demand->budget_min && $demand->budget_max)
                                        ${{ number_format($demand->budget_min, 0) }} -
                                        ${{ number_format($demand->budget_max, 0) }}
                                    @elseif($demand->budget_min)
                                        ${{ number_format($demand->budget_min, 0) }}+
                                    @elseif($demand->budget_max)
                                        {{ x_('Up to', 'web') }} ${{ number_format($demand->budget_max, 0) }}
                                    @else
                                        {{ x_('Not specified', 'web') }}
                                    @endif
                                </p>
                            </div>
                            <div class="mb-3 col-md-6">
                                <h6>{{ x_('Timeframe', 'web') }}</h6>
                                <p class="mb-0">{{ $demand->weeks ?? x_('Not specified', 'web') }} {{ $demand->weeks > 1 ? x_('weeks', 'web') : x_('week', 'web') }}</p>
                            </div>
                            @if ($demand->start_date)
                                <div class="col-md-6">
                                    <h6>{{ x_('Start Date', 'web') }}</h6>
                                    <p class="mb-0">
                                        {{ \Carbon\Carbon::parse($demand->start_date)->format('M d, Y') }}</p>
                                </div>
                            @endif
                        </div>

                        {{-- @if ($demand->getFirstMedia('proposal')) --}}
                        <div class="mb-3">
                            <h6>{{ x_('Attached Proposal', 'web') }}</h6>
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
                                                KB • {{ x_('Uploaded', 'web') }}
                                                {{ $demand->getFirstMedia('proposal')?->created_at->format('M d, Y') }}</small>
                                        </div>
                                    </div>
                                    <a href="{{ $demand->getFirstMediaUrl('proposal') }}" class="btn btn-primary"
                                        target="_blank">
                                        <i class="bx bx-download me-2"></i>{{ x_('Download', 'web') }}
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
                        onclick="return confirm('{{ x_('Are you sure you want to reject this request?', 'web') }}')">
                        <i class="bx bx-x me-2"></i>{{ x_('Reject Request', 'web') }}
                    </button>
                </form>
                <form action="{{ route('client.services.demand.accept', $demand->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary"
                        onclick="return confirm('{{ x_('Are you sure you want to accept this request?', 'web') }}')">
                        <i class="bx bx-check me-2"></i>{{ x_('Accept Request', 'web') }}
                    </button>
                </form>
            @elseif($demand->is_accepted && !$demand->is_completed)
                <form action="{{ route('client.services.demand.complete', $demand->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success"
                        onclick="return confirm('{{ x_('Are you sure you want to mark this as completed?', 'web') }}')">
                        <i class="bx bx-check-circle me-2"></i>{{ x_('Mark as Completed', 'web') }}
                    </button>
                </form>
            @endif
        </div>

        <!-- Review Section - Show if the demand is completed and has reviews -->
        @if($demand->is_completed && $demand->reviews()->count() > 0)
        <div class="mt-4">
            <div class="border-0 shadow-sm card">
                <div class="bg-transparent card-header">
                    <h5 class="mb-0">{{ x_('Client Reviews', 'web') }}</h5>
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
                                <span class="ms-auto badge bg-success">{{ x_('Approved', 'web') }}</span>
                            @else
                                <span class="ms-auto badge bg-warning text-dark">{{ x_('Pending approval', 'web') }}</span>
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
