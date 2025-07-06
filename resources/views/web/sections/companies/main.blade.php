<nav class="container py-4 mb-lg-2 mt-lg-3" aria-label="breadcrumb">
    <ol class="mb-0 breadcrumb">
        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt fs-lg me-1"></i>Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Companies</li>
        <li class="breadcrumb-item active" aria-current="page"> Web Development</li>
    </ol>
</nav>
<!-- Page title + Filters -->
<section class="container pb-3 d-md-flex align-items-center justify-content-between">
    <h1 class="text-nowrap mb-md-4 pe-md-5">Our Partners</h1>
    <nav class="overflow-auto">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit expedita similique adipisci eius.</p>
    </nav>
</section>
<!-- Portfolio grid -->
<section class="container pb-5 mb-2 mb-md-4 mb-lg-5">
    <div class="row pb-lg-3">
        <!-- Item -->
        @foreach ($clients as $client)
            <div class="mb-2 col-md-4">
                <article class="border-0 shadow-sm card h-100">
                    <div class="p-4 position-relative">
                        <a href="{{ route('client.profile.show', $client->id) }}"
                            class="top-0 position-absolute start-0 w-100 h-100" aria-label="View profile"></a>
                        @if ($client->hasMedia('profile'))
                            @if (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                <img src="{{ $client->getFirstMediaUrl('profile') }}" class="mx-auto card-img-top"
                                    alt="{{ $client->name }} logo" style="max-height: 150px; object-fit: contain;">
                            @else
                                <div class="position-relative">
                                    <img src="{{ $client->getFirstMediaUrl('profile') }}" class="mx-auto card-img-top"
                                        alt="Blurred logo"
                                        style="max-height: 150px; object-fit: contain; filter: blur(6px);">
                                    <div class="position-absolute top-50 start-50 translate-middle" style="z-index: 1;">
                                        <i class="bx bx-lock-alt fs-3 text-dark"></i>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-light rounded-3"
                                style="height: 150px;">
                                <i class="bx bx-building text-body-secondary fs-1"></i>
                            </div>
                        @endif
                    </div>
                    <div class="pb-4 card-body">
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            @if ($client->industry)
                                <span class="badge fs-sm text-nav bg-secondary text-decoration-none">{{ $client->industry }}</span>
                            @else
                                <span class="badge fs-sm text-nav bg-secondary text-decoration-none">Business</span>
                            @endif
                            @if ($client->years_of_experience)
                                <span class="fs-sm text-body-secondary">{{ $client->years_of_experience }} years</span>
                            @endif
                        </div>
                        <h3 class="mb-0 h5">
                            <a href="{{ route('client.profile.show', $client->id) }}">
                                @if (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                    {{ $client->name }}
                                @else
                                    {{ Illuminate\Support\Str::mask($client->name, '*', 3, strlen($client->name) - 4) }}
                                @endif
                            </a>
                        </h3>
                        @if ($client->bio)
                            <p class="mt-2 mb-0 text-body-secondary small text-truncate">
                                {{ Illuminate\Support\Str::limit($client->bio, 80) }}</p>
                        @endif
                    </div>
                    <div class="py-3 card-footer">
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <div class="d-inline-flex align-items-center position-relative">
                                @if ($client->hasMedia('profile'))
                                    @if (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                        <img src="{{ $client->getFirstMediaUrl('profile') }}"
                                            class="rounded-circle me-3" width="48" alt="{{ $client->name }}">
                                    @else
                                        <div class="position-relative">
                                            <img src="{{ $client->getFirstMediaUrl('profile') }}"
                                                class="rounded-circle me-3" width="48" alt="Blurred Profile"
                                                style="filter: blur(4px);">
                                            <div class="position-absolute top-50 start-50 translate-middle"
                                                style="z-index: 1;">
                                                <i class="bx bx-lock-alt"></i>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 48px; height: 48px;">
                                        <i class="bx bx-user text-body-secondary"></i>
                                    </div>
                                @endif
                                <div>
                                    <span class="fw-medium text-body">
                                        @if (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                            {{ $client->name }}
                                        @else
                                            {{ Illuminate\Support\Str::mask($client->name, '*', 3, strlen($client->name) - 4) }}
                                        @endif
                                    </span>
                                    <div class="fs-sm text-body-secondary">{{ $client->title ?? 'Member' }}</div>
                                    {{-- @if ($client->last_seen && (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())) --}}
                                        <div class="fs-xs text-success d-flex align-items-center">
                                            <i class="bx bxs-circle me-1" style="font-size: 0.5rem;"></i>
                                            @if ($client->last_seen->diffInMinutes()  < 5)
                                                <span>Online now</span>
                                            @elseif ($client->last_seen->isToday())
                                                <span>Last seen today at {{ $client->last_seen->format('h:i A') }}</span>
                                            @elseif ($client->last_seen->isYesterday())
                                                <span>Last seen yesterday at {{ $client->last_seen->format('h:i A') }}</span>
                                            @elseif ($client->last_seen->diffInDays() < 7)
                                                <span>Last seen {{ $client->last_seen->diffForHumans() }}</span>
                                            @else
                                                <span>Last seen on {{ $client->last_seen->format('M d, Y') }}</span>
                                            @endif
                                        </div>
                                    {{-- @endif --}}
                                </div>
                            </div>
                            <a href="{{ route('client.profile.show', $client->id) }}" class="px-3 btn btn-sm"
                                style="background-color: #3e3e3e; color: white;">View Profile</a>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        {{ $clients->links() }}
    </nav>
</section>
