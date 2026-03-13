<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title> {{ x_('Bzns Book', 'web') }} | {{ $client->name }} {{ x_('Profile', 'web') }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .hero-section {
            background: linear-gradient(135deg, #4733ff 0%, #6944ff 100%);
            height: 300px;
            position: relative;
            overflow: hidden;
            padding-top: 60px;
        }
        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.2;
            color: white;
        }
        .highlight-text {
            color: #FFD700;
        }
        .trusted-by {
            background-color: rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 20px;
        }
        .client-logo {
            height: 30px;
            opacity: 0.9;
            filter: brightness(0) invert(1);
        }
        .profile-logo {
            width: 220px;
            height: 220px;
            margin-top: -110px;
            background-color: white;
            border-radius: 0;
            border: 8px solid white;
            box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            z-index: 10;
        }
        .nav-tabs .nav-link {
            color: #555;
            font-weight: 600;
            padding: 1rem 1.5rem;
            border: none;
            position: relative;
        }
        .nav-tabs .nav-link.active {
            color: #4733ff;
            background: transparent;
            border-bottom: 3px solid #4733ff;
        }
        .nav-tabs .nav-link i {
            margin-right: 0.5rem;
        }
        .star-rating {
            color: #FFD700;
        }
        .rating-box {
            background: white;
            border-radius: 8px;
            padding: 1rem;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.04);
            border: 1px solid #eee;
        }
        .rating-score {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1;
        }
        .company-card {
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.04);
            background: white;
            transition: all 0.3s ease;
            border: 1px solid #eee;
        }
        .company-card:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        .btn-primary {
            background-color: #4733ff;
            border-color: #4733ff;
        }
        .btn-primary:hover {
            background-color: #3a2ad0;
            border-color: #3a2ad0;
        }
        .btn-light-outline {
            background-color: #f5f7fa;
            color: #333;
            border: 1px solid #e5e7eb;
        }
        .btn-light-outline:hover {
            background-color: #e5e7eb;
        }
        .section-title {
            font-weight: 700;
            display: inline-block;
            border-bottom: 3px solid #4733ff;
            padding-bottom: 0.5rem;
            margin-bottom: 2rem;
        }
        .icon-circle {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(71, 51, 255, 0.1);
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <main class="page-wrapper">
        @include('web.main.navbar')

        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="text-white">
                            @if($client->industry)
                                <span class="badge bg-light text-dark rounded-pill px-3 py-2 mb-3">{{ $client->industry }}</span>
                            @endif
                            <h1 class="hero-title mb-3">{{ strtoupper($client->title ?? 'DESIGN & TECH AGENCY') }} {{ x_('HELPING', 'web') }}<br>{{ x_('BRANDS BECOME', 'web') }}<br><span class="highlight-text">{{ x_('TOP 1%', 'web') }}</span></h1>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="trusted-by text-white mt-4 mt-lg-0">
                            <p class="mb-3 small text-white-50">{{ x_('Trusted by global brands & SMEs', 'web') }}</p>
                            <div class="d-flex flex-wrap align-items-center">
                                <img src="https://placehold.co/100x30" alt="{{ x_('Client logo', 'web') }}" class="client-logo me-4 mb-2">
                                <img src="https://placehold.co/100x30" alt="{{ x_('Client logo', 'web') }}" class="client-logo me-4 mb-2">
                                <img src="https://placehold.co/100x30" alt="{{ x_('Client logo', 'web') }}" class="client-logo me-4 mb-2">
                                <img src="https://placehold.co/100x30" alt="{{ x_('Client logo', 'web') }}" class="client-logo me-4 mb-2">
                                <img src="https://placehold.co/100x30" alt="{{ x_('Client logo', 'web') }}" class="client-logo me-4 mb-2">
                            </div>
                            <!-- Rating Stars -->
                            <div class="mt-3 text-white">
                                <div class="star-rating">
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Profile Content -->
        <section class="py-0 bg-white border-bottom">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="col-md-3 col-lg-2">
                        <div class="profile-logo">
                            @if($client->hasMedia('profile'))
                                <img src="{{ $client->getFirstMediaUrl('profile') }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $client->name }}">
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-primary h-100">
                                    <i class="bx bx-building" style="font-size: 5rem; color: white;"></i>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Company Title -->
                    <div class="col-md-9 col-lg-7 pt-4">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center">
                                <h2 class="fs-3 fw-bold mb-0">{{ $client->name }}</h2>
                                @if($client->verified)
                                    <span class="badge bg-success ms-2 px-2 py-1"><i class="bx bx-check"></i> {{ x_('Verified', 'web') }}</span>
                                @endif
                            </div>
                            <p class="text-muted mb-0 mt-1">{{ $client->city ? $client->city . ', ' : '' }}{{ $client->country ?? x_('N/A', 'web') }}</p>
                        </div>
                    </div>

                    <!-- Rating Box -->
                    <div class="col-lg-3 d-none d-lg-flex align-items-center justify-content-end">
                        <div class="rating-box">
                            <div class="rating-score">5<span class="fs-6">/5</span></div>
                            <div class="star-rating my-1">
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                            </div>
                            <div class="small text-muted">{{ x_('(17 reviews)', 'web') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <ul class="nav nav-tabs border-0 mt-4">
                    <li class="nav-item">
                        <a class="nav-link active" href="#about"><i class="bx bx-info-circle"></i> {{ x_('About', 'web') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services"><i class="bx bx-server"></i> {{ x_('Services', 'web') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio"><i class="bx bx-images"></i> {{ x_('Portfolio', 'web') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team"><i class="bx bx-group"></i> {{ x_('Team', 'web') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact"><i class="bx bx-envelope"></i> {{ x_('Contact', 'web') }}</a>
                    </li>
                </ul>
            </div>
        </section>

        <!-- About Section -->
        <section class="py-5 bg-light" id="about">
            <div class="container">
                <h3 class="section-title">{{ x_('About', 'web') }}</h3>

                <div class="row">
                    <div class="col-lg-8">
                        <!-- About Content -->
                        <div class="company-card mb-4">
                            <div class="card-body p-4">
                                <h4 class="fw-bold mb-4">{{ x_('Transforming your product idea into reality through custom design-driven development.', 'web') }}</h4>

                                @if($client->bio)
                                    <p class="mb-4">{{ $client->bio }}</p>
                                @else
                                    <p class="mb-4">{{ $client->name }} {{ x_('is an award-winning custom web app design and development company. Our team offers reliable, customized, and user-friendly solutions for your business. We transform your product ideas into reality with our expert, design-driven development approach. Let us bring your vision to life with our innovative and tailored services.', 'web') }}</p>
                                @endif

                                <!-- Stats -->
                                <div class="row g-4 mb-4">
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-circle flex-shrink-0">
                                                <i class="bx bx-group text-primary"></i>
                                            </div>
                                            <div class="ms-3">
                                                <span class="d-block text-muted small">{{ x_('Team size', 'web') }}</span>
                                                <span class="fw-medium">{{ $client->company_size ?? x_('10-20 people', 'web') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-circle flex-shrink-0">
                                                <i class="bx bx-calendar text-primary"></i>
                                            </div>
                                            <div class="ms-3">
                                                <span class="d-block text-muted small">{{ x_('Founded', 'web') }}</span>
                                                <span class="fw-medium">{{ $client->founding_year ?? x_('2015', 'web') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-circle flex-shrink-0">
                                                <i class="bx bx-time text-primary"></i>
                                            </div>
                                            <div class="ms-3">
                                                <span class="d-block text-muted small">{{ x_('Experience', 'web') }}</span>
                                                <span class="fw-medium">{{ $client->years_of_experience ?? '7' }} {{ x_('years', 'web') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Languages -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="icon-circle flex-shrink-0">
                                            <i class="bx bx-globe text-primary"></i>
                                        </div>
                                        <div class="ms-3">
                                            <span class="fw-medium">{{ x_('Speaks Arabic, English, French, German, Ukrainian', 'web') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Social Links -->
                                <div class="border-top pt-4">
                                    <div class="d-flex flex-wrap">
                                        @if($client->website)
                                            <a href="{{ $client->website }}" class="btn btn-sm btn-light me-2 mb-2" target="_blank">
                                                <i class="bx bx-globe me-1"></i> {{ x_('Website', 'web') }}
                                            </a>
                                        @endif
                                        @if($client->linkedin)
                                            <a href="{{ $client->linkedin }}" class="btn btn-sm btn-light me-2 mb-2" target="_blank">
                                                <i class="bx bxl-linkedin me-1"></i> {{ x_('LinkedIn', 'web') }}
                                            </a>
                                        @endif
                                        @if($client->facebook)
                                            <a href="{{ $client->facebook }}" class="btn btn-sm btn-light me-2 mb-2" target="_blank">
                                                <i class="bx bxl-facebook me-1"></i> {{ x_('Facebook', 'web') }}
                                            </a>
                                        @endif
                                        @if($client->instagram)
                                            <a href="{{ $client->instagram }}" class="btn btn-sm btn-light me-2 mb-2" target="_blank">
                                                <i class="bx bxl-instagram me-1"></i> {{ x_('Instagram', 'web') }}
                                            </a>
                                        @endif
                                        @if($client->youtube)
                                            <a href="{{ $client->youtube }}" class="btn btn-sm btn-light me-2 mb-2" target="_blank">
                                                <i class="bx bxl-youtube me-1"></i> {{ x_('YouTube', 'web') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Column -->
                    <div class="col-lg-4">
                        <!-- Contact CTA -->
                        <div class="company-card mb-4">
                            <div class="card-body p-4">
                                <div class="d-grid gap-3">
                                    <a href="#contact" class="btn btn-primary">
                                        <i class="bx bx-envelope me-2"></i> {{ x_('Contact', 'web') }} {{ $client->name }}
                                    </a>
                                    @if($client->website)
                                        <a href="{{ $client->website }}" class="btn btn-light-outline" target="_blank">
                                            <i class="bx bx-globe me-2"></i> {{ x_('Open website', 'web') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Client Stats -->
                        <div class="company-card mb-4">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-3">{{ x_('Projects & Experience', 'web') }}</h5>

                                <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                                    <div class="icon-circle flex-shrink-0">
                                        <i class="bx bx-user-check text-primary"></i>
                                    </div>
                                    <div class="ms-3 d-flex justify-content-between w-100">
                                        <span class="text-muted">{{ x_('Member since', 'web') }}</span>
                                        <span class="fw-medium">{{ $client->created_at->format('Y') }}</span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                                    <div class="icon-circle flex-shrink-0">
                                        <i class="bx bx-briefcase text-primary"></i>
                                    </div>
                                    <div class="ms-3 d-flex justify-content-between w-100">
                                        <span class="text-muted">{{ x_('Completed projects', 'web') }}</span>
                                        <span class="fw-medium">41</span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                                    <div class="icon-circle flex-shrink-0">
                                        <i class="bx bx-map-pin text-primary"></i>
                                    </div>
                                    <div class="ms-3 d-flex justify-content-between w-100">
                                        <span class="text-muted">{{ x_('Location', 'web') }}</span>
                                        <span class="fw-medium">{{ $client->city ? $client->city . ', ' : '' }}{{ $client->country ?? x_('Dubai, United Arab Emirates', 'web') }}</span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="icon-circle flex-shrink-0">
                                        <i class="bx bx-devices text-primary"></i>
                                    </div>
                                    <div class="ms-3 d-flex justify-content-between w-100">
                                        <span class="text-muted">{{ x_('Works', 'web') }}</span>
                                        <span class="fw-medium">{{ x_('Remotely across the globe', 'web') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Awards -->
                        <div class="company-card mb-4">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-3">{{ x_('Awards', 'web') }}</h5>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-light text-dark p-2 me-2">
                                        <i class="bx bx-trophy text-warning"></i>
                                    </span>
                                    <span>{{ x_('5 awards received', 'web') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        @if($topServices->isNotEmpty())
        <section class="py-5 bg-white" id="services">
            <div class="container">
                <h3 class="section-title">{{ x_('Services', 'web') }}</h3>
                <p class="text-muted mb-4">{{ x_('We offer these professional services', 'web') }}</p>

                <div class="row g-4">
                    @foreach($topServices as $service)
                    <div class="col-md-6 col-lg-4">
                        <div class="company-card h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="icon-circle">
                                        <i class="bx bx-code-alt text-primary"></i>
                                    </div>

                                    <div class="star-rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="bx {{ $i <= $service->level ? 'bxs-star' : 'bx-star' }}"></i>
                                        @endfor
                                    </div>
                                </div>

                                <h5 class="fw-bold mb-3">{{ $service->title }}</h5>
                                <p class="text-muted mb-4">{{ Illuminate\Support\Str::limit($service->description, 120) }}</p>

                                @if($service->subcategories->isNotEmpty())
                                <div class="mb-4 d-flex flex-wrap">
                                    @foreach($service->subcategories as $subcategory)
                                        <span class="badge bg-light text-dark me-2 mb-2 px-3 py-2">
                                            {{ $subcategory->name }}
                                        </span>
                                    @endforeach
                                </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center border-top pt-3 mt-2">
                                    <div class="d-flex align-items-center text-muted">
                                        <i class="bx bx-time me-2"></i>
                                        <span>{{ $service->delivery_time }} {{ Illuminate\Support\Str::plural('day', $service->delivery_time) }}</span>
                                    </div>
                                    <div class="fw-bold">{{ number_format($service->price, 2) }} <span class="fw-normal">EGP</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Portfolio Section -->
        @if($portfolios->isNotEmpty())
        <section class="py-5 bg-light" id="portfolio">
            <div class="container">
                <h3 class="section-title">{{ x_('Featured Projects', 'web') }}</h3>
                <p class="text-muted mb-4">{{ x_('Explore', 'web') }} {{ $client->name }}{{ x_('\'s portfolio of successful work', 'web') }}</p>

                <div class="row g-4">
                    @foreach($portfolios as $portfolio)
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                                <div class="position-relative">
                                    @if($portfolio->hasMedia('images'))
                                        <div class="overflow-hidden" style="height: 220px;">
                                            <img src="{{ $portfolio->getFirstMediaUrl('images') }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.5s ease;" alt="{{ $portfolio->title }}" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                        </div>
                                    @else
                                        <div class="d-flex align-items-center justify-content-center" style="height: 220px; background: linear-gradient(45deg, #f8f9fa, #e9ecef);">
                                            <i class="bx bx-image fs-1 text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="position-absolute top-0 start-0 p-3">
                                        <span class="badge rounded-pill px-3 py-2" style="background: rgba(13, 110, 253, 0.8); color: white;">
                                            <i class="bx bx-briefcase me-1"></i> {{ x_('Project', 'web') }}
                                        </span>
                                    </div>
                                </div>

                                <div class="card-body p-4">
                                    <h5 class="card-title fw-bold mb-3">{{ $portfolio->title }}</h5>
                                    <p class="card-text text-muted">{{ Illuminate\Support\Str::limit($portfolio->description, 100) }}</p>

                                    @if($portfolio->services->isNotEmpty())
                                        <div class="mt-3 pt-3 border-top">
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach($portfolio->services as $service)
                                                    <span class="badge rounded-pill px-3 py-2" style="background: rgba(13, 110, 253, 0.1); color: #0d6efd;">
                                                        {{ $service->title }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Contact Section -->
        <section id="contact" class="py-5 bg-white">
            <div class="container">
                <h3 class="section-title">{{ x_('Get in Touch', 'web') }}</h3>
                <p class="text-muted mb-4">{{ x_('Have a project in mind? Contact', 'web') }} {{ $client->name }} {{ x_('to discuss your needs and how they can help.', 'web') }}</p>

                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4"><i class="bx bx-user-voice me-2 text-primary"></i>{{ x_('Contact Information', 'web') }}</h5>

                                <div class="d-flex flex-column gap-4">
                                    @if($client->phone)
                                        <div class="d-flex">
                                            <div class="icon-circle flex-shrink-0">
                                                <i class="bx bx-phone text-primary"></i>
                                            </div>
                                            <div class="ms-3">
                                                <span class="d-block text-muted fs-sm">{{ x_('Phone', 'web') }}</span>
                                                <a href="tel:{{ $client->phone }}" class="text-decoration-none fw-medium fs-5">{{ $client->phone }}</a>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="d-flex">
                                        <div class="icon-circle flex-shrink-0">
                                            <i class="bx bx-envelope text-primary"></i>
                                        </div>
                                        <div class="ms-3">
                                            <span class="d-block text-muted fs-sm">{{ x_('Email', 'web') }}</span>
                                            <a href="mailto:{{ $client->email }}" class="text-decoration-none fw-medium fs-5">{{ $client->email }}</a>
                                        </div>
                                    </div>

                                    @if($client->address)
                                        <div class="d-flex">
                                            <div class="icon-circle flex-shrink-0">
                                                <i class="bx bx-map text-primary"></i>
                                            </div>
                                            <div class="ms-3">
                                                <span class="d-block text-muted fs-sm">{{ x_('Address', 'web') }}</span>
                                                <span class="fw-medium">{{ $client->address }}</span>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="mt-2">
                                        <h6 class="fw-bold mb-3">{{ x_('Connect on Social Media', 'web') }}</h6>
                                        <div class="d-flex gap-3">
                                            @if($client->facebook)
                                                <a href="{{ $client->facebook }}" class="btn btn-light rounded-circle p-2" target="_blank">
                                                    <i class="bx bxl-facebook fs-5"></i>
                                                </a>
                                            @endif
                                            @if($client->linkedin)
                                                <a href="{{ $client->linkedin }}" class="btn btn-light rounded-circle p-2" target="_blank">
                                                    <i class="bx bxl-linkedin fs-5"></i>
                                                </a>
                                            @endif
                                            @if($client->instagram)
                                                <a href="{{ $client->instagram }}" class="btn btn-light rounded-circle p-2" target="_blank">
                                                    <i class="bx bxl-instagram fs-5"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <div class="card-header bg-primary text-white p-4 border-0">
                                <h4 class="mb-0 fw-bold"><i class="bx bx-envelope me-2"></i> {{ x_('Send a Message', 'web') }}</h4>
                            </div>
                            <div class="card-body p-4">
                                <form>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label fw-medium">{{ x_('Your Name', 'web') }}</label>
                                                <input type="text" class="form-control rounded-3" id="name" placeholder="{{ x_('Enter your name', 'web') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label fw-medium">{{ x_('Email Address', 'web') }}</label>
                                                <input type="email" class="form-control rounded-3" id="email" placeholder="{{ x_('Enter your email', 'web') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="subject" class="form-label fw-medium">{{ x_('Subject', 'web') }}</label>
                                        <input type="text" class="form-control rounded-3" id="subject" placeholder="{{ x_('Enter message subject', 'web') }}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="message" class="form-label fw-medium">{{ x_('Message', 'web') }}</label>
                                        <textarea class="form-control rounded-3" id="message" rows="5" placeholder="{{ x_('Enter your message', 'web') }}"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-medium">
                                        <i class="bx bx-send me-2"></i> {{ x_('Send Message', 'web') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
</body>
</html>
