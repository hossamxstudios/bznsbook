<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title> Bzns Book | {{ $client->name }} Profile </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
</head>
<body>
    <main class="page-wrapper">
        @include('web.main.navbar')
        <section class="pt-lg-4 mt-lg-3">
            <div class="overflow-hidden position-relative">
                <!-- Image -->
                <div class="top-0 container-fluid position-relative position-lg-absolute start-0 h-100">
                    <div class="row h-100 me-n4 me-n2">
                        <div class="col-lg-7 position-relative">
                            <div class="d-none d-sm-block d-lg-none" style="height: 400px;"></div>
                            <div class="d-sm-none" style="height: 300px;"></div>
                            <div class="overflow-hidden top-0 position-absolute start-0 w-100 h-100 rounded-3 rounded-start-0"
                                data-jarallax data-speed="0.3">
                                @if ($client->hasMedia('cover'))
                                    @if (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                        <div class="jarallax-img"
                                            style="background-image: url({{ $client->getFirstMediaUrl('cover') }});background-size: cover; background-repeat: no-repeat;">
                                        </div>
                                    @else
                                        <div class="jarallax-img position-relative"
                                            style="background-image: url({{ $client->getFirstMediaUrl('cover') }});background-size: cover; background-repeat: no-repeat; filter: blur(10px);">
                                        </div>
                                        <div class="position-absolute top-50 start-50 translate-middle"
                                            style="z-index: 2;">
                                            <i class="bx bx-lock-alt fs-1 text-light"></i>
                                        </div>
                                    @endif
                                @else
                                    <div class="jarallax-img"
                                        style="background-image: url({{ asset('assets/img/landing/financial/hero-img.jpg') }}); background-size: contain; background-repeat: no-repeat;">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container px-0 position-relative zindex-5 pt-lg-5 px-lg-3">
                    <div class="row pt-lg-5 mx-n4 mx-lg-n3">
                        <div class="pb-5 col-xl-8 col-lg-7 offset-lg-5 offset-xl-6">
                            <!-- Card -->
                            <div class="overflow-hidden px-2 py-4 card bg-dark border-light p-sm-4">
                                <span class="top-0 position-absolute start-0 w-100 h-50"
                                    style="background-color: rgba(255,255,255,.05);"></span>
                                <div class="card-body position-relative zindex-5">
                                    <div class="mb-4 d-flex align-items-center">
                                        <div class="square-image-container rounded-3 position-relative"
                                            style="width: 350px; height: 250px; background-color: #fff; overflow: hidden;">
                                            @if (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                <img src="{{ $client->getFirstMediaUrl('profile') ?? asset('assets/img/logo-square.png') }}"
                                                    alt="Company Logo" class="w-100 h-100" style="object-fit: cover;"
                                                    onerror="this.src='https://placehold.co/150x150/4733ff/ffffff?text=LOGO'">
                                            @else
                                                <img src="{{ $client->getFirstMediaUrl('profile') ?? asset('assets/img/logo-square.png') }}"
                                                    alt="Blurred Company Logo" class="w-100 h-100"
                                                    style="object-fit: cover; filter: blur(8px);"
                                                    onerror="this.src='https://placehold.co/150x150/4733ff/ffffff?text=LOGO'">
                                                <div class="position-absolute top-50 start-50 translate-middle"
                                                    style="z-index: 2;">
                                                    <i class="bx bx-lock-alt fs-1 text-light"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ms-4">
                                            <span
                                                class="mb-1 d-block text-light text-uppercase small">{{ $client->type ?? 'Business' }}</span>
                                            <h2 class="mb-0 text-light fw-bold">
                                                @if (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                    {{ $client->name }}
                                                @else
                                                    {{ Illuminate\Support\Str::mask($client->name, '*', 3, strlen($client->name) - 4) }}
                                                @endif
                                            </h2>
                                            <div class="mb-2 text-white d-flex align-items-center">
                                                <i class="bx bxs-time me-2"></i>
                                                <div class="d-flex align-items-center">
                                                    <i class="bx bxs-circle me-1 {{ $client->last_seen->diffInMinutes() < 5 ? 'text-success' : 'text-white' }}"
                                                        style="font-size: 0.5rem;"></i>
                                                    @if ($client->last_seen->diffInMinutes() < 5)
                                                        <span class="text-success">Online now</span>
                                                    @elseif ($client->last_seen->isToday())
                                                        <span>Last seen today at
                                                            {{ $client->last_seen->format('h:i A') }}</span>
                                                    @elseif ($client->last_seen->isYesterday())
                                                        <span>Last seen yesterday at
                                                            {{ $client->last_seen->format('h:i A') }}</span>
                                                    @elseif ($client->last_seen->diffInDays() < 7)
                                                        <span>Last seen
                                                            {{ $client->last_seen->diffForHumans() }}</span>
                                                    @else
                                                        <span>Last seen on
                                                            {{ $client->last_seen->format('M d, Y') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-4 opacity-70 fs-lg text-light">
                                        {{ Illuminate\Support\Str::limit($client->bio, 150) ?? 'Helping businesses reach their full potential with our expertise and tailored solutions.' }}
                                    </p>

                                    <!-- Client Info & Social Links -->
                                    <div class="mb-2 row text-light">
                                        <div class="mb-3 col-sm-6">
                                            <!-- Last Seen (Activity Status) -->
                                            {{-- @if ($client->last_seen && (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())) --}}

                                            {{-- @endif --}}

                                            <!-- Website -->
                                            @if ($client->website)
                                                <div class="mb-2 d-flex align-items-center">
                                                    <i class="bx bx-globe me-2"></i>
                                                    @if (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                        <a href="{{ $client->website }}"
                                                            class="text-light text-decoration-none"
                                                            target="_blank">{{ Illuminate\Support\Str::limit($client->website, 25) }}</a>
                                                    @else
                                                        <div class="d-flex align-items-center">
                                                            <span
                                                                class="text-light text-decoration-none me-2">{{ Illuminate\Support\Str::mask($client->website, '*', 5) }}</span>
                                                            <i class="bx bx-lock-alt text-light"
                                                                data-bs-toggle="tooltip" title="Subscribe to view"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif

                                            <!-- Social Media -->
                                            <div class="mb-2 d-flex align-items-center">
                                                @if ($client->facebook)
                                                    @if (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                        <a href="{{ $client->facebook }}" class="text-light me-3"
                                                            target="_blank"><i
                                                                class="bx bxl-facebook-square fs-4"></i></a>
                                                    @else
                                                        <span class="text-light me-3 position-relative"
                                                            style="cursor: not-allowed;">
                                                            <i class="opacity-50 bx bxl-facebook-square fs-4"></i>
                                                            <span
                                                                class="top-0 position-absolute start-100 translate-middle badge rounded-pill bg-dark"
                                                                style="font-size: 8px;"><i
                                                                    class="bx bx-lock-alt"></i></span>
                                                        </span>
                                                    @endif
                                                @endif

                                                @if ($client->linkedin)
                                                    @if (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                        <a href="{{ $client->linkedin }}" class="text-light me-3"
                                                            target="_blank"><i
                                                                class="bx bxl-linkedin-square fs-4"></i></a>
                                                    @else
                                                        <span class="text-light me-3 position-relative"
                                                            style="cursor: not-allowed;">
                                                            <i class="opacity-50 bx bxl-linkedin-square fs-4"></i>
                                                            <span
                                                                class="top-0 position-absolute start-100 translate-middle badge rounded-pill bg-dark"
                                                                style="font-size: 8px;"><i
                                                                    class="bx bx-lock-alt"></i></span>
                                                        </span>
                                                    @endif
                                                @endif

                                                @if ($client->instagram)
                                                    @if (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                        <a href="{{ $client->instagram }}" class="text-light me-3"
                                                            target="_blank"><i class="bx bxl-instagram fs-4"></i></a>
                                                    @else
                                                        <span class="text-light me-3 position-relative"
                                                            style="cursor: not-allowed;">
                                                            <i class="opacity-50 bx bxl-instagram fs-4"></i>
                                                            <span
                                                                class="top-0 position-absolute start-100 translate-middle badge rounded-pill bg-dark"
                                                                style="font-size: 8px;"><i
                                                                    class="bx bx-lock-alt"></i></span>
                                                        </span>
                                                    @endif
                                                @endif

                                                @if ($client->youtube)
                                                    @if (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                        <a href="{{ $client->youtube }}" class="text-light"
                                                            target="_blank"><i class="bx bxl-youtube fs-4"></i></a>
                                                    @else
                                                        <span class="text-light position-relative"
                                                            style="cursor: not-allowed;">
                                                            <i class="opacity-50 bx bxl-youtube fs-4"></i>
                                                            <span
                                                                class="top-0 position-absolute start-100 translate-middle badge rounded-pill bg-dark"
                                                                style="font-size: 8px;"><i
                                                                    class="bx bx-lock-alt"></i></span>
                                                        </span>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>

                                        <div class="mb-3 col-sm-6">
                                            <!-- Company Size -->
                                            @if ($client->company_size)
                                                <div class="mb-2 d-flex align-items-center">
                                                    <i class="bx bx-group me-2"></i>
                                                    <span>{{ $client->company_size }}
                                                        {{ $client->is_company ? 'employees' : 'team members' }}</span>
                                                </div>
                                            @endif

                                            <!-- Founding Year -->
                                            @if ($client->founding_year)
                                                <div class="mb-2 d-flex align-items-center">
                                                    <i class="bx bx-calendar me-2"></i>
                                                    <span>Est. {{ $client->founding_year }}</span>
                                                </div>
                                            @endif

                                            <!-- Company Type -->
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-building me-2"></i>
                                                <span>{{ $client->is_company ? 'Company' : 'Individual' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Section -->
        <section id="about" class="py-5 border-bottom">
            <div class="container">
                <div class="mb-4 d-flex align-items-center">
                    <i class="bx bx-info-circle fs-2 text-primary me-3"></i>
                    <h2 class="mb-0 fw-bold">About {{ $client->name }}</h2>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-5">
                            <p class="mb-4">{{ $client->bio ?? 'No description available yet.' }}</p>
                            <!-- Company Metrics -->
                            <div class="mb-5 row g-4">
                                <!-- Team Size -->
                                <div class="col-sm-4">
                                    <div class="p-4 text-center rounded border">
                                        <div class="p-3 mb-3 d-inline-block bg-light rounded-circle">
                                            <i class="bx bx-group fs-3 text-primary"></i>
                                        </div>
                                        <h4 class="fs-5 fw-bold">{{ $client->company_size ?? '0' }}</h4>
                                        <p class="mb-0 text-muted">Team Members</p>
                                    </div>
                                </div>

                                <!-- Founding Year -->
                                <div class="col-sm-4">
                                    <div class="p-4 text-center rounded border">
                                        <div class="p-3 mb-3 d-inline-block bg-light rounded-circle">
                                            <i class="bx bx-calendar fs-3 text-primary"></i>
                                        </div>
                                        <h4 class="fs-5 fw-bold">{{ $client->founding_year ?? 'N/A' }}</h4>
                                        <p class="mb-0 text-muted">Established</p>
                                    </div>
                                </div>

                                <!-- Experience -->
                                <div class="col-sm-4">
                                    <div class="p-4 text-center rounded border">
                                        <div class="p-3 mb-3 d-inline-block bg-light rounded-circle">
                                            <i class="bx bx-time fs-3 text-primary"></i>
                                        </div>
                                        @php
                                            $yearsExperience = $client->founding_year
                                                ? date('Y') - $client->founding_year
                                                : 'N/A';
                                        @endphp
                                        <h4 class="fs-5 fw-bold">
                                            {{ is_numeric($yearsExperience) ? $yearsExperience : 'N/A' }}</h4>
                                        <p class="mb-0 text-muted">Years Experience</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Languages -->
                            <div class="mb-5">
                                <h4 class="mb-3 fw-bold">Languages</h4>
                                <div class="flex-wrap d-flex">
                                    @if (isset($client->languages) && is_array(json_decode($client->languages)))
                                        @foreach (json_decode($client->languages) as $language)
                                            <span
                                                class="px-3 py-2 mb-2 badge bg-light me-2">{{ $language }}</span>
                                        @endforeach
                                    @else
                                        <span class="px-3 py-2 mb-2 badge bg-light me-2">English</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Sidebar -->
                    <div class="col-lg-4">
                        <div class="border-0 shadow-sm card">
                            <div class="card-body">
                                <h4 class="mb-4 fw-bold">Contact Information</h4>
                                <ul class="mb-4 list-unstyled">
                                    @if ($client->email)
                                        <li class="mb-3 d-flex">
                                            <i class="mt-1 bx bx-envelope text-primary me-2"></i>
                                            <div>
                                                <p class="mb-0 fw-medium">Email</p>
                                                @if (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                    <a href="mailto:{{ $client->email }}"
                                                        class="text-muted text-decoration-none">{{ $client->email }}</a>
                                                @else
                                                    <div class="position-relative">
                                                        <span
                                                            class="text-muted">{{ Illuminate\Support\Str::mask($client->email, '*', 3, 5) }}</span>
                                                        <i class="ms-2 bx bx-lock-alt" data-bs-toggle="tooltip"
                                                            title="Subscribe to view"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </li>
                                    @endif

                                    @if ($client->phone)
                                        <li class="mb-3 d-flex">
                                            <i class="mt-1 bx bx-phone text-primary me-2"></i>
                                            <div>
                                                <p class="mb-0 fw-medium">Phone</p>
                                                @if (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                    <a href="tel:{{ $client->phone }}"
                                                        class="text-muted text-decoration-none">{{ $client->phone }}</a>
                                                @else
                                                    <div class="position-relative">
                                                        <span
                                                            class="text-muted">{{ Illuminate\Support\Str::mask($client->phone, '*', 4, 4) }}</span>
                                                        <i class="ms-2 bx bx-lock-alt" data-bs-toggle="tooltip"
                                                            title="Subscribe to view"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </li>
                                    @endif

                                    @if ($client->address)
                                        <li class="mb-3 d-flex">
                                            <i class="mt-1 bx bx-map text-primary me-2"></i>
                                            <div>
                                                <p class="mb-0 fw-medium">Address</p>
                                                @if (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                    <p class="mb-0 text-muted">{{ $client->address }}</p>
                                                @else
                                                    <div class="position-relative">
                                                        <span
                                                            class="text-muted">{{ Illuminate\Support\Str::mask($client->address, '*', 5) }}</span>
                                                        <i class="ms-2 bx bx-lock-alt" data-bs-toggle="tooltip"
                                                            title="Subscribe to view"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </li>
                                    @endif

                                    @if ($client->website)
                                        <li class="d-flex">
                                            <i class="mt-1 bx bx-globe text-primary me-2"></i>
                                            <div>
                                                <p class="mb-0 fw-medium">Website</p>
                                                @if (Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                    <a href="{{ $client->website }}" target="_blank"
                                                        class="text-muted text-decoration-none">{{ $client->website }}</a>
                                                @else
                                                    <div class="position-relative">
                                                        <span
                                                            class="text-muted">{{ Illuminate\Support\Str::mask($client->website, '*', 7) }}</span>
                                                        <i class="ms-2 bx bx-lock-alt" data-bs-toggle="tooltip"
                                                            title="Subscribe to view"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </li>
                                    @endif
                                </ul>

                                <!-- Social Media Links -->
                                <div class="d-flex">
                                    @if ($client->facebook)
                                        <a href="{{ $client->facebook }}"
                                            class="btn btn-sm btn-icon btn-secondary me-2" target="_blank">
                                            <i class="bx bxl-facebook"></i>
                                        </a>
                                    @endif

                                    @if ($client->linkedin)
                                        <a href="{{ $client->linkedin }}"
                                            class="btn btn-sm btn-icon btn-secondary me-2" target="_blank">
                                            <i class="bx bxl-linkedin"></i>
                                        </a>
                                    @endif

                                    @if ($client->instagram)
                                        <a href="{{ $client->instagram }}"
                                            class="btn btn-sm btn-icon btn-secondary me-2" target="_blank">
                                            <i class="bx bxl-instagram"></i>
                                        </a>
                                    @endif

                                    @if ($client->youtube)
                                        <a href="{{ $client->youtube }}" class="btn btn-sm btn-icon btn-secondary"
                                            target="_blank">
                                            <i class="bx bxl-youtube"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services Section -->
        <section id="services" class="py-5 border-bottom bg-light">
            <div class="container">
                <div class="mb-4 d-flex align-items-center">
                    <i class="bx bx-server fs-2 text-primary me-3"></i>
                    <h2 class="mb-0 fw-bold">Services</h2>
                </div>

                <p class="mb-4">{{ count($client->services) }} services offered by {{ $client->name }}</p>

                <div class="mb-4 rounded shadow bg-light">
                    <!-- Services Table Header -->
                    <div class="py-3 mx-0 row border-bottom bg-light fw-medium">
                        <div class="col-md-4 ps-4">
                            <strong>Service name</strong>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex align-items-center">
                                <strong>Experience level</strong>
                                <i class="bx bx-info-circle text-muted ms-2" data-bs-toggle="tooltip"
                                    title="Experience level based on completed projects"></i>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <strong>Related reviews</strong>
                        </div>
                        <div class="col-md-3">
                            <strong>Starting from</strong>
                        </div>
                    </div>

                    <style>
                        .service-row:hover {
                            background-color: rgba(0, 0, 0, 0.01);
                        }

                        .experience-dots i {
                            font-size: 0.5rem;
                        }

                        .service-icon {
                            width: 45px;
                            height: 45px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            border-radius: 8px;
                            flex-shrink: 0;
                        }

                        .service-details {
                            transition: all 0.3s ease;
                        }

                        .price-badge {
                            white-space: nowrap;
                            font-weight: 600;
                        }

                        .detail-toggle {
                            transition: transform 0.2s ease;
                        }

                        .detail-toggle[aria-expanded="true"] {
                            transform: rotate(180deg);
                        }
                    </style>

                    @if (count($client->services) > 0)
                        @foreach ($client->services as $service)
                            <!-- Service Item -->
                            <div class="py-3 mx-0 row border-bottom align-items-center service-row">
                                <!-- Service Name -->
                                <div class="col-md-4 ps-4">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="service-icon bg-light-{{ $service->category ? strtolower(str_replace(' ', '-', $service->category->name)) : 'primary' }} me-3">
                                            <i
                                                class="bx bx-{{ $service->category ? strtolower(str_replace(' ', '-', $service->category->name)) : 'server' }} fs-4 text-{{ $service->category ? strtolower(str_replace(' ', '-', $service->category->name)) : 'primary' }}"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold">{{ $service->name }}</h6>
                                            @if (isset($service->subcategories) && $service->subcategories->isNotEmpty())
                                                <small
                                                    class="text-muted">{{ $service->subcategories->first()->name }}</small>
                                            @elseif($service->category)
                                                <small class="text-muted">{{ $service->category->name }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Experience Level -->
                                <div class="col-md-3">
                                    <div class="mb-1 experience-dots">
                                        @for ($i = 1; $i <= 10; $i++)
                                            @if ($i <= $service->rating * 2)
                                                <i class="bx bxs-circle me-1"></i>
                                            @else
                                                <i class="bx bxs-circle me-1" style="color: #e0e0e0;"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <small
                                        class="text-muted d-block">{{ $service->projects_count ?? rand(3, 16) }}
                                        works</small>
                                </div>

                                <!-- Related Reviews -->
                                <div class="col-md-2">
                                    <div class="star-rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="bx bxs-star"></i>
                                        @endfor
                                        <span class="ms-1">({{ $service->reviews_count ?? rand(0, 6) }})</span>
                                    </div>
                                </div>

                                <!-- Starting Price -->
                                <div class="col-md-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span
                                            class="price-badge text-primary">{{ number_format($service->price) }}
                                            EGP<span class="text-muted">/project</span></span>
                                        <div>
                                            <!-- Apply button - show to everyone but customize based on login status -->
                                            @if (Auth::guard('client')->check())
                                                @if (Auth::guard('client')->user()->id != $client->id)
                                                    <!-- Logged in and not own profile - normal apply button -->
                                                    <button class="btn btn-sm btn-primary me-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#applyServiceModal{{ $service->id }}">
                                                        <i class="bx bx-send me-1"></i> Apply
                                                    </button>
                                                @endif
                                            @else
                                                <!-- Not logged in - locked apply button with tooltip -->
                                                <button class="btn btn-sm btn-primary me-2"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="You must login first to apply for services">
                                                    <i class="bx bx-lock-alt me-1"></i> Apply
                                                </button>
                                            @endif
                                            <button class="btn btn-sm btn-outline-secondary ms-1 detail-toggle"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#serviceDetails{{ $service->id }}"
                                                aria-expanded="false">
                                                <i class="bx bx-chevron-down"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Collapsed Service Details -->
                            <div class="collapse service-details" id="serviceDetails{{ $service->id }}">
                                <div class="p-4 bg-light">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h6 class="mb-3 fw-bold">Description</h6>
                                            <p class="mb-4 text-muted">
                                                {{ $service->description ?? 'This service helps businesses improve their performance and reach their goals through professional consultation and implementation.' }}
                                            </p>

                                            @if (isset($service->skills) && count($service->skills) > 0)
                                                <div class="mb-4">
                                                    <h6 class="mb-2 fw-bold">Skills & Expertise</h6>
                                                    <div class="flex-wrap d-flex">
                                                        @foreach ($service->skills as $skill)
                                                            <span
                                                                class="px-3 py-2 mb-2 badge rounded-pill bg-light me-2">{{ $skill }}</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="mb-3">
                                                <h6 class="mb-2 fw-bold">Skill Level</h6>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $service->rating)
                                                                <i class="bx bxs-star"></i>
                                                            @else
                                                                <i class="bx bx-star"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <span class="small">{{ $service->rating }}/5 -
                                                        {{ $service->projects_count ?? rand(3, 16) }} successful
                                                        projects</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="p-4 rounded shadow-sm bg-light">
                                                <h6 class="mb-3 fw-bold">Service Details</h6>
                                                <div
                                                    class="pb-3 mb-3 border-bottom d-flex justify-content-between">
                                                    <span class="text-muted">Delivery time:</span>
                                                    <strong>{{ $service->delivery_time }} days</strong>
                                                </div>
                                                <div
                                                    class="pb-3 mb-4 border-bottom d-flex justify-content-between">
                                                    <span class="text-muted">Price:</span>
                                                    <strong
                                                        class="text-primary">{{ number_format($service->price) }}
                                                        EGP</strong>
                                                </div>
                                                @if (Auth::guard('client')->check())
                                                    @if (Auth::guard('client')->user()->id != $client->id)
                                                        <!-- Logged in and not own profile - normal apply button -->
                                                        <button class="btn btn-primary me-2"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#applyServiceModal{{ $service->id }}">
                                                            <i class="bx bx-send me-1"></i> Apply for this service
                                                        </button>
                                                    @endif
                                                @else
                                                    <!-- Not logged in - locked apply button with tooltip -->
                                                    <button class="btn btn-secondary me-2"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="You must login first to apply for services">
                                                        <i class="bx bx-lock-alt me-1"></i> Apply for this service
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="py-5 text-center">
                            <div class="mb-3">
                                <i class="opacity-50 bx bx-server fs-1 text-secondary"></i>
                            </div>
                            <h5>No services available yet</h5>
                            <p class="mb-4 text-muted">This client hasn't added any services to their profile.</p>
                            <a href="#contact" class="btn btn-outline-primary">Contact for custom requests</a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Services JavaScript -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Initialize tooltips
                    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                        return new bootstrap.Tooltip(tooltipTriggerEl)
                    })

                    // Add hover effects to service rows
                    var serviceRows = document.querySelectorAll('.service-row')
                    serviceRows.forEach(function(row) {
                        row.addEventListener('mouseenter', function() {
                            this.style.transition = 'background-color 0.2s ease'
                        })
                    })
                })
            </script>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="py-5 border-bottom">
            <div class="container">
                <div class="mb-4 d-flex align-items-center">
                    <i class="ri-folder-chart-line fs-2 text-primary me-3"></i>
                    <h2 class="mb-0 fw-bold">Projects</h2>
                </div>

                <p class="mb-4">{{ count($projects) }} projects posted by {{ $client->name }}</p>

                @if(count($projects) > 0)
                    <div class="row g-4">
                        @foreach($projects as $project)
                            @php
                                $activeBatch = $project->batches->first(function($batch) {
                                    return $batch->is_active == 1;
                                });
                                $hasAvailableSeats = $activeBatch && $activeBatch->hasAvailableSeats();
                                $availableSeats = $activeBatch ? $activeBatch->getAvailableSeatsCount() : 0;
                                $totalSeats = $activeBatch ? $activeBatch::MAX_SEATS : 0;
                                $seatPercentage = $totalSeats > 0 ? (($totalSeats - $availableSeats) / $totalSeats) * 100 : 0;
                            @endphp
                            <div class="mb-4 col-lg-6">
                                <div class="border-0 shadow-sm card h-100">
                                    <div class="card-body">
                                        <div class="mb-3 d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0 card-title fw-bold">{{ $project->name }}</h5>
                                            <span class="badge {{ $project->status === 'active' ? 'bg-success' : 'bg-secondary' }} rounded-pill">
                                                {{ ucfirst($project->status) }}
                                            </span>
                                        </div>

                                        @if($project->hasMedia('project'))
                                            <div class="overflow-hidden mb-3 rounded" style="height: 180px;">
                                                <img src="{{ $project->getFirstMediaUrl('project') }}" alt="{{ $project->name }}"
                                                    class="w-100 h-100 object-fit-cover">
                                            </div>
                                        @endif

                                        <p class="mb-3 text-muted">{{ \Illuminate\Support\Str::limit($project->description, 150) }}</p>

                                        <div class="flex-wrap gap-2 mb-3 d-flex">
                                            @if($project->skills)
                                                @foreach(is_array($project->skills) ? $project->skills : json_decode($project->skills, true) as $skill)
                                                    <span class="badge bg-light text-dark">{{ $skill }}</span>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="ri-money-dollar-circle-line text-primary me-2"></i>
                                                    <div>
                                                        <small class="text-muted d-block">Budget</small>
                                                        <span>{{ number_format($project->budget_min) }} - {{ number_format($project->budget_max) }} EGP</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="ri-map-pin-line text-primary me-2"></i>
                                                    <div>
                                                        <small class="text-muted d-block">Location</small>
                                                        <span>{{ $project->location ?? 'Remote' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="mb-1 d-flex justify-content-between align-items-center">
                                                <small>Seat Availability</small>
                                                <small>{{ $availableSeats }} / {{ $totalSeats }} seats available</small>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: {{ $seatPercentage }}%"
                                                    aria-valuenow="{{ $seatPercentage }}"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <small class="text-muted">
                                                    <i class="ri-calendar-line me-1"></i>
                                                    Posted {{ $project->created_at->diffForHumans() }}
                                                </small>
                                            </div>
                                            <div class="gap-2 d-flex">
                                                <!-- View Details Button - available for everyone -->
                                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#projectDetailsModal{{ $project->id }}">
                                                    <i class="ri-information-line me-1"></i> View Details
                                                </button>

                                                <!-- Apply button - show to everyone but customize based on login status -->
                                                @if(Auth::guard('client')->check())
                                                    @if(Auth::guard('client')->user()->id != $client->id)
                                                        @if($hasAvailableSeats && $project->status === 'active')
                                                            @if(Auth::guard('client')->user()->hasActiveSubscription())
                                                                <!-- Logged in with active subscription - normal apply button -->
                                                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                                    data-bs-target="#applySeatModal{{ $project->id }}">
                                                                    <i class="ri-user-add-line me-1"></i> Apply for Seat
                                                                </button>
                                                            @else
                                                                <!-- Logged in but no subscription - subscription required button -->
                                                                <button class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="You need an active subscription to apply">
                                                                    <i class="ri-vip-crown-line me-1"></i> Subscription Required
                                                                </button>
                                                            @endif
                                                        @elseif(!$hasAvailableSeats && $project->status === 'active')
                                                            <!-- No available seats - disabled button -->
                                                            <button class="btn btn-sm btn-secondary" disabled>
                                                                <i class="ri-user-forbid-line me-1"></i> No Seats Available
                                                            </button>
                                                        @else
                                                            <!-- Project not active - disabled button -->
                                                            <button class="btn btn-sm btn-secondary" disabled>
                                                                <i class="ri-close-circle-line me-1"></i> Not Accepting Applications
                                                            </button>
                                                        @endif
                                                    @endif
                                                @else
                                                    <!-- Not logged in - locked apply button with tooltip -->
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="You must login first to apply for project seats">
                                                        <i class="ri-lock-line me-1"></i> Apply for Seat
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="border alert alert-light">
                        <div class="d-flex align-items-center">
                            <i class="ri-information-line fs-3 me-3"></i>
                            <p class="mb-0">{{ $client->name }} hasn't posted any projects yet.</p>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <!-- Portfolio Section -->
        <section id="portfolio" class="py-5 bg-light border-bottom">
            <div class="container">
                <div class="mb-4 d-flex align-items-center">
                    <i class="bx bx-images fs-2 text-primary me-3"></i>
                    <h2 class="mb-0 fw-bold">Our Portfolio</h2>
                </div>
                <p class="mb-4">{{ count($client->portfolios) }} projects in {{ $client->name }}'s portfolio
                </p>
                <div class="mb-4 row row-cols-1 row-cols-md-2 g-4">
                    @forelse($client->portfolios as $portfolio)
                        <!-- Portfolio item -->
                        <div class="mb-4 col pb-lg-2">
                            <article class="border-0 shadow-sm card h-100 portfolio-card">
                                <div class="position-relative">
                                    <!-- Portfolio image -->
                                    @if ($portfolio->getFirstMedia('portfolio'))
                                        <img src="{{ $portfolio->getFirstMedia('portfolio')->getUrl() }}"
                                            class="card-img-top" alt="{{ $portfolio->name }}"
                                            style="height: 220px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                            style="height: 220px;">
                                            <i class="bx bx-image-alt fs-1 text-muted"></i>
                                        </div>
                                    @endif

                                    @if ($portfolio->type)
                                        <span class="top-0 m-3 position-absolute start-0 badge bg-light">
                                            {{ $portfolio->type }}
                                        </span>
                                    @endif
                                </div>

                                <!-- Card body with title and client -->
                                <div class="pb-3 card-body">
                                    <h3 class="mb-2 h5">
                                        {{ $portfolio->name }}
                                    </h3>
                                    @if ($portfolio->client_name)
                                        <p class="mb-2 fs-sm">Client: {{ $portfolio->client_name }}</p>
                                    @endif

                                    @if ($portfolio->details)
                                        <p class="mb-3 text-muted small">
                                            {{ \Illuminate\Support\Str::limit($portfolio->details, 120) }}</p>
                                    @endif

                                    @if (isset($portfolio->expertise) && is_array($portfolio->expertise))
                                        <div class="flex-wrap mb-2 d-flex">
                                            @foreach ($portfolio->expertise as $skill)
                                                <span
                                                    class="mb-1 badge bg-light text-dark me-1">{{ $skill }}</span>
                                            @endforeach
                                        </div>
                                    @endif

                                    @if ($portfolio->project_url)
                                        <a href="{{ $portfolio->project_url }}" target="_blank"
                                            class="mt-2 btn btn-sm btn-primary">
                                            View Project <i class="bx bx-link-external ms-1"></i>
                                        </a>
                                    @endif
                                </div>

                                <!-- Card footer with metadata -->
                                <div class="py-3 card-footer d-flex align-items-center fs-sm text-muted">
                                    <div class="d-flex align-items-center me-4">
                                        <i class="bx bx-calendar fs-xl me-1"></i>
                                        {{ $portfolio->date ? \Carbon\Carbon::parse($portfolio->date)->format('M Y') : 'No date' }}
                                    </div>
                                    @if ($portfolio->location)
                                        <div class="d-flex align-items-center">
                                            <i class="bx bx-map fs-xl me-1"></i>
                                            {{ $portfolio->location }}
                                        </div>
                                    @endif
                                </div>
                            </article>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="py-5 text-center rounded bg-light">
                                <div class="mb-3">
                                    <i class="opacity-50 bx bx-images fs-1 text-secondary"></i>
                                </div>
                                <h5>No portfolio items available yet</h5>
                                <p class="mb-4 text-muted">This client hasn't added any projects to their
                                    portfolio.</p>
                                <a href="#contact" class="btn btn-outline-primary">Request portfolio
                                    information</a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        {{-- project Section --}}
        @include('web.main.footer')
    </main>
    <!-- Service Application Modals -->
    @if (Auth::guard('client')->check() && isset($client) && $client->services->count() > 0)
        @foreach ($client->services as $service)
            <div class="modal fade" id="applyServiceModal{{ $service->id }}" tabindex="-1"
                aria-labelledby="applyServiceModalLabel{{ $service->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="applyServiceModalLabel{{ $service->id }}">Apply for:
                                {{ $service->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('client.services.apply', $service->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="to_client_id" value="{{ $client->id }}">
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <div class="modal-body">
                                <div class="mb-4">
                                    <div class="mb-3 d-flex align-items-center">
                                        <div
                                            class="service-icon bg-light-{{ $service->category ? strtolower(str_replace(' ', '-', $service->category->name)) : 'primary' }} me-3">
                                            <i
                                                class="bx bx-{{ $service->category ? strtolower(str_replace(' ', '-', $service->category->name)) : 'server' }} fs-4 text-{{ $service->category ? strtolower(str_replace(' ', '-', $service->category->name)) : 'primary' }}"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold">{{ $service->name }}</h6>
                                            <span class="text-primary">{{ number_format($service->price) }}
                                                EGP</span>
                                        </div>
                                    </div>
                                    <p class="text-muted">You are applying to {{ $client->name }}'s service. Please
                                        provide details about your project needs.</p>
                                </div>

                                <div class="mb-3">
                                    <label for="description{{ $service->id }}" class="form-label">Project
                                        Description</label>
                                    <textarea class="form-control" id="description{{ $service->id }}" name="description" rows="4"
                                        placeholder="Describe your project requirements" required></textarea>
                                    <div class="form-text">Be specific about what you need to help the service provider
                                        understand your requirements.</div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="budget_min{{ $service->id }}" class="form-label">Minimum Budget
                                            (EGP)</label>
                                        <input type="number" class="form-control"
                                            id="budget_min{{ $service->id }}" name="budget_min"
                                            placeholder="Minimum budget" value="{{ $service->price }}"
                                            min="{{ $service->price }}" required>
                                        <div class="form-text">Starting price is {{ number_format($service->price) }}
                                            EGP</div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="budget_max{{ $service->id }}" class="form-label">Maximum Budget
                                            (EGP)</label>
                                        <input type="number" class="form-control"
                                            id="budget_max{{ $service->id }}" name="budget_max"
                                            placeholder="Maximum budget" value="{{ $service->price * 1.5 }}"
                                            min="{{ $service->price }}" required>
                                        <div class="form-text">Your upper limit for this service</div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="deadline{{ $service->id }}" class="form-label">Deadline (in
                                        weeks)</label>
                                    <input type="number" class="form-control" id="deadline{{ $service->id }}"
                                        name="weeks" placeholder="Number of weeks" value="1" min="1"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="start_date{{ $service->id }}" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="start_date{{ $service->id }}"
                                        name="start_date" min="{{ date('Y-m-d') }}">
                                    <div class="form-text">When would you like the service provider to start?</div>
                                </div>

                                <div class="mb-3">
                                    <label for="proposal{{ $service->id }}" class="form-label">Attach Proposal
                                        (Optional)</label>
                                    <input type="file" class="form-control" id="proposal{{ $service->id }}"
                                        name="proposal" accept=".pdf,.doc,.docx">
                                    <div class="form-text">Accepted formats: PDF, DOC, DOCX (Max: 10MB)</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-send me-2"></i>Submit Application
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    @include('web.main.scripts')

    <!-- Initialize tooltips and modals for project seats -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Initialize any dynamic content in modals
            var projectModals = document.querySelectorAll('.modal');
            projectModals.forEach(function(modal) {
                modal.addEventListener('shown.bs.modal', function() {
                    // Any dynamic initialization when modal is shown can go here
                });
            });
        });
    </script>

    <!-- Project Seat Application Modals -->
    @if(isset($projects) && count($projects) > 0)
        @foreach($projects as $project)
            @php
                $activeBatch = $project->batches->first(function($batch) {
                    return $batch->is_active == 1;
                });
                $hasAvailableSeats = $activeBatch && $activeBatch->hasAvailableSeats();
                $availableSeats = $activeBatch ? $activeBatch->getAvailableSeatsCount() : 0;
            @endphp
            @if($hasAvailableSeats && $project->status === 'active')
                <div class="modal fade" id="applySeatModal{{ $project->id }}" tabindex="-1" aria-labelledby="applySeatModalLabel{{ $project->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="applySeatModalLabel{{ $project->id }}">Apply for Project Seat: {{ $project->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('projects.apply', $project->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-4">
                                        <div class="mb-3 d-flex align-items-center">
                                            <div class="project-icon bg-light-primary me-3">
                                                <i class="ri-folder-chart-line fs-4 text-primary"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold">{{ $project->name }}</h6>
                                                <span class="text-primary">{{ number_format($project->budget_min) }} - {{ number_format($project->budget_max) }} EGP</span>
                                            </div>
                                        </div>
                                        <p class="text-muted">You are applying for a seat in {{ $client->name }}'s project. Please provide details about your qualifications and proposal.</p>

                                        @if(!Auth::guard('client')->check() || !Auth::guard('client')->user()->hasActiveSubscription())
                                            <div class="mt-3 alert alert-warning d-flex align-items-center" role="alert">
                                                <i class="ri-vip-crown-line me-2 fs-5"></i>
                                                <div>
                                                    <strong>Subscription Required:</strong> You need an active subscription to apply for project seats.
                                                    <a href="{{ route('web.select-plan') }}" class="alert-link">Upgrade now</a> to unlock this feature.
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="motivation{{ $project->id }}" class="form-label">Motivation</label>
                                        <textarea class="form-control" id="motivation{{ $project->id }}" name="motivation" rows="3"
                                            placeholder="Explain why you're interested in this project and what makes you a good fit" required></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="budget_min{{ $project->id }}" class="form-label">Minimum Budget (EGP)</label>
                                            <input type="number" class="form-control" id="budget_min{{ $project->id }}" name="budget_min"
                                                placeholder="Minimum budget" value="{{ $project->budget_min }}" required>
                                            <div class="form-text">Your minimum budget requirement for this project</div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="budget_max{{ $project->id }}" class="form-label">Maximum Budget (EGP)</label>
                                            <input type="number" class="form-control" id="budget_max{{ $project->id }}" name="budget_max"
                                                placeholder="Maximum budget" value="{{ $project->budget_max }}" required>
                                            <div class="form-text">Your maximum budget expectation for this project</div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="experience{{ $project->id }}" class="form-label">Relevant Experience</label>
                                        <textarea class="form-control" id="experience{{ $project->id }}" name="experience" rows="3"
                                            placeholder="Describe your relevant experience for this project" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="timeline{{ $project->id }}" class="form-label">Estimated Timeline (in weeks)</label>
                                        <input type="number" class="form-control" id="timeline{{ $project->id }}"
                                            name="timeline" placeholder="Number of weeks" value="4" min="1" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="proposal{{ $project->id }}" class="form-label">Upload Proposal</label>
                                        <input type="file" class="form-control" id="proposal{{ $project->id }}"
                                            name="proposal" accept=".pdf,.doc,.docx" required>
                                        <div class="form-text">Accepted formats: PDF, DOC, DOCX (Max: 10MB)</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="notes{{ $project->id }}" class="form-label">Additional Notes</label>
                                        <textarea class="form-control" id="notes{{ $project->id }}" name="notes" rows="2"
                                            placeholder="Any additional information you'd like to provide"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ri-user-add-line me-2"></i>Submit Application
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif

    <!-- Project Details Modals -->
    @if(isset($projects) && count($projects) > 0)
        @foreach($projects as $project)
            <div class="modal fade" id="projectDetailsModal{{ $project->id }}" tabindex="-1" aria-labelledby="projectDetailsModalLabel{{ $project->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Hero header with image background if available -->
                        @if($project->hasMedia('project'))
                            <div class="position-relative">
                                <div class="overflow-hidden position-relative" style="height: 200px;">
                                    <img src="{{ $project->getFirstMediaUrl('project') }}" alt="{{ $project->name }}"
                                        class="w-100 h-100 object-fit-cover" style="filter: brightness(0.7);">
                                    <div class="top-0 p-4 position-absolute start-0 w-100 h-100 d-flex flex-column justify-content-end text-dark">
                                        <div class="mb-2 d-flex justify-content-between align-items-center">
                                            <h4 class="mb-0 modal-title fw-bold">{{ $project->name }}</h4>
                                            <span class="badge {{ $project->status === 'active' ? 'bg-success' : 'bg-secondary' }} rounded-pill fs-6">
                                                {{ ucfirst($project->status) }}
                                            </span>
                                        </div>
                                        <p class="mb-0 text-white-50">
                                            <i class="ri-calendar-line me-1"></i> Posted {{ $project->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="top-0 m-3 shadow-sm bg-light btn-close position-absolute end-0" data-bs-dismiss="modal" aria-label="Close"></button>
                        @else
                            <div class="text-dark modal-header bg-light">
                                <h5 class="modal-title" id="projectDetailsModalLabel{{ $project->id }}">{{ $project->name }}</h5>
                                <div>
                                    <span class="badge bg-dark text-light rounded-pill me-2">{{ ucfirst($project->status) }}</span>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif

                        <div class="p-4 modal-body">
                            <!-- Summary Card -->
                            <div class="mb-4 border-0 shadow-sm card">
                                <div class="card-body">
                                    <h5 class="pb-2 mb-3 fw-bold border-bottom">Project Overview</h5>
                                    <p class="text-muted">{{ $project->description }}</p>

                                    <!-- Quick Stats -->
                                    <div class="mt-2 row g-3">
                                        <div class="col-md-4">
                                            <div class="p-3 text-center rounded bg-light-primary h-100">
                                                <i class="mb-2 ri-money-dollar-circle-line fs-3 text-primary"></i>
                                                <h6 class="mb-1">Budget</h6>
                                                <p class="mb-0 fw-bold">{{ number_format($project->budget_min) }} - {{ number_format($project->budget_max) }} EGP</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="p-3 text-center rounded bg-light-primary h-100">
                                                <i class="mb-2 ri-map-pin-line fs-3 text-primary"></i>
                                                <h6 class="mb-1">Location</h6>
                                                <p class="mb-0 fw-bold">{{ $project->location ?? 'Remote' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="p-3 text-center rounded bg-light-primary h-100">
                                                <i class="mb-2 ri-user-line fs-3 text-primary"></i>
                                                <h6 class="mb-1">Client</h6>
                                                <p class="mb-0 fw-bold">{{ $client->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Seat Availability Card -->
                            <div class="mb-4 border-0 shadow-sm card">
                                <div class="pb-0 bg-transparent border-0 card-header">
                                    <h5 class="fw-bold">Seat Availability</h5>
                                </div>
                                <div class="pt-2 card-body">
                                    @php
                                        $activeBatch = $project->batches->first(function($batch) {
                                            return $batch->is_active == 1;
                                        });
                                        $availableSeats = $activeBatch ? $activeBatch->getAvailableSeatsCount() : 0;
                                        $totalSeats = $activeBatch ? $activeBatch::MAX_SEATS : 0;
                                        $filledSeats = $totalSeats - $availableSeats;
                                        $seatPercentage = $totalSeats > 0 ? (($totalSeats - $availableSeats) / $totalSeats) * 100 : 0;
                                    @endphp

                                    <div class="mb-3 text-center row">
                                        <div class="mb-2 col-md-4">
                                            <div class="p-3 rounded border">
                                                <h1 class="mb-0 display-5 fw-bold text-primary">{{ $totalSeats }}</h1>
                                                <p class="mb-0 text-muted">Total Seats</p>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="p-3 rounded border">
                                                <h1 class="mb-0 display-5 fw-bold text-success">{{ $availableSeats }}</h1>
                                                <p class="mb-0 text-muted">Available</p>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="p-3 rounded border">
                                                <h1 class="mb-0 display-5 fw-bold text-secondary">{{ $filledSeats }}</h1>
                                                <p class="mb-0 text-muted">Filled</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2 d-flex justify-content-between align-items-center">
                                        <span>Capacity</span>
                                        <span class="fw-bold">{{ $filledSeats }}/{{ $totalSeats }}</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                            style="width: {{ $seatPercentage }}%"
                                            aria-valuenow="{{ $seatPercentage }}"
                                            aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Skills Section -->
                            <div class="mb-4 border-0 shadow-sm card">
                                <div class="pb-0 bg-transparent border-0 card-header">
                                    <h5 class="fw-bold">Required Skills</h5>
                                </div>
                                <div class="pt-2 card-body">
                                    <div class="flex-wrap gap-2 d-flex">
                                        @if($project->skills)
                                            @foreach(is_array($project->skills) ? $project->skills : json_decode($project->skills, true) as $skill)
                                                <span class="p-2 badge bg-primary text-light fs-6">{{ $skill }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-muted">No specific skills mentioned</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Information -->
                            <div class="mb-4 border-0 shadow-sm card">
                                <div class="pb-0 bg-transparent border-0 card-header">
                                    <h5 class="fw-bold">Additional Information</h5>
                                </div>
                                <div class="pt-2 card-body">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-calendar-check-line text-primary me-2 fs-5"></i>
                                                <div>
                                                    <small class="text-muted d-block">Created</small>
                                                    <span class="fw-bold">{{ $project->created_at->format('M d, Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-time-line text-primary me-2 fs-5"></i>
                                                <div>
                                                    <small class="text-muted d-block">Last Updated</small>
                                                    <span class="fw-bold">{{ $project->updated_at->format('M d, Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            @if(Auth::guard('client')->check() && Auth::guard('client')->user()->id != $client->id && $hasAvailableSeats && $project->status === 'active')
                                @if(Auth::guard('client')->user()->hasActiveSubscription())
                                    <!-- User has active subscription -->
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal"
                                        data-bs-target="#applySeatModal{{ $project->id }}">
                                        <i class="ri-user-add-line me-1"></i> Apply for Seat
                                    </button>
                                @else
                                    <!-- User needs subscription -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="You need an active subscription to apply">
                                        <i class="ri-vip-crown-line me-1"></i> Subscription Required
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                @endif
                            @else
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</body>
</html>
