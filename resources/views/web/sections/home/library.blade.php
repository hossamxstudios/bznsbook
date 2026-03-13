<section class="container pb-5">
    <div class="pt-5 mt-1 text-start">
        <div class="row">
            <div class="mb-4 col-md-12">
                <div class="border-4 border-start border-primary ps-4">
                    <h1 class="pt-2 display-5 fw-bold">{{ x_('Why Choose BznsBook?', 'home') }}</h1>
                    <h4 class="text-muted">{{ x_('Everything you need to grow your professional network in one platform.', 'home') }}</h4>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-4 border-0 shadow-sm card">
                    <div class="card-body">
                        <div class="mb-3 d-flex align-items-center">
                            <div class="p-2 bg-opacity-10 bg-primary rounded-circle me-3">
                                <i class="bx bx-search-alt text-primary fs-4"></i>
                            </div>
                            <h5 class="mb-0">{{ x_('Discovery &amp; Visibility', 'home') }}</h5>
                        </div>
                        <p class="mb-3"><i class="bx bx-check-circle text-primary me-2"></i> {{ x_('Get discovered by clients searching for your exact expertise and services.', 'home') }}</p>
                        <p class="mb-3"><i class="bx bx-check-circle text-primary me-2"></i> {{ x_('Browse professionals by category, skill, location, and ratings to find the perfect match.', 'home') }}</p>
                        <p class="mb-0"><i class="bx bx-check-circle text-primary me-2"></i> {{ x_('Stand out with a rich profile, verified reviews, and a curated portfolio.', 'home') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-4 border-0 shadow-sm card">
                    <div class="card-body">
                        <div class="mb-3 d-flex align-items-center">
                            <div class="p-2 bg-opacity-10 bg-primary rounded-circle me-3">
                                <i class="bx bx-git-merge text-primary fs-4"></i>
                            </div>
                            <h5 class="mb-0">{{ x_('Seamless Collaboration', 'home') }}</h5>
                        </div>
                        <p class="mb-3"><i class="bx bx-check-circle text-primary me-2"></i> {{ x_('Request services directly, submit proposals to projects, and manage everything from your dashboard.', 'home') }}</p>
                        <p class="mb-0"><i class="bx bx-check-circle text-primary me-2"></i> {{ x_('Every interaction is tracked with a clear workflow: request, accept, deliver, and review.', 'home') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="border-0 shadow-sm card bg-light">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="p-3 mt-1 bg-opacity-10 bg-primary rounded-circle me-3">
                                <i class="bx bx-star text-primary fs-3"></i>
                            </div>
                            <p class="mb-0"><i class="bx bx-check-circle text-primary me-2"></i> {{ x_('Build your reputation through verified ratings and written reviews. Clients can see your track record, completed projects, and what others say about working with you — helping you win more business over time.', 'home') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Platform highlights carousel -->
    <div class="pt-4 swiper" data-swiper-options='{"slidesPerView": 1,"spaceBetween": 24,"pagination": {"el": ".swiper-pagination","clickable": true},"breakpoints": {"560": {"slidesPerView": 2},"960": {"slidesPerView": 3}}}'>
        <div class="swiper-wrapper">
            <!-- Item -->
            <div class="swiper-slide">
                <a href="{{ route('pages.companies') }}" class="overflow-hidden card-portfolio position-relative d-block rounded-3">
                    <span class="top-0 position-absolute start-0 w-100 h-100 zindex-1"
                        style="background: linear-gradient(180deg, rgba(17, 24, 39, 0.00) 35.56%, #111827 95.3%);"></span>
                    <div class="bottom-0 p-4 position-absolute w-100 zindex-2">
                        <div class="px-md-3">
                            <h3 class="mb-0 text-white h4">{{ x_('Services Marketplace', 'home') }}</h3>
                            <div class="card-portfolio-meta d-flex align-items-center justify-content-between">
                                <span class="text-white opacity-70 fs-xs text-truncate pe-3">{{ x_('Publish and discover professional services', 'home') }}</span>
                                <i class="bx bx-right-arrow-circle fs-3 text-gradient-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-img">
                        <img src="{{ asset('business.jpg') }}" alt="{{ x_('Services Marketplace', 'home') }}">
                    </div>
                </a>
            </div>
            <!-- Item -->
            <div class="swiper-slide">
                <a href="{{ route('pages.companies') }}" class="overflow-hidden card-portfolio position-relative d-block rounded-3">
                    <span class="top-0 position-absolute start-0 w-100 h-100 zindex-1"
                        style="background: linear-gradient(180deg, rgba(17, 24, 39, 0.00) 35.56%, #111827 95.3%);"></span>
                    <div class="bottom-0 p-4 position-absolute w-100 zindex-2">
                        <div class="px-md-3">
                            <h3 class="mb-0 text-white h4">{{ x_('Portfolio Showcase', 'home') }}</h3>
                            <div class="card-portfolio-meta d-flex align-items-center justify-content-between">
                                <span class="text-white opacity-70 fs-xs text-truncate pe-3">{{ x_('Show your best work and attract new clients', 'home') }}</span>
                                <i class="bx bx-right-arrow-circle fs-3 text-gradient-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-img">
                        <img src="{{ asset('shipping.jpg') }}" alt="{{ x_('Portfolio Showcase', 'home') }}">
                    </div>
                </a>
            </div>
            <!-- Item -->
            <div class="swiper-slide">
                <a href="{{ route('pages.companies') }}" class="overflow-hidden card-portfolio position-relative d-block rounded-3">
                    <span class="top-0 position-absolute start-0 w-100 h-100 zindex-1"
                        style="background: linear-gradient(180deg, rgba(17, 24, 39, 0.00) 35.56%, #111827 95.3%);"></span>
                    <div class="bottom-0 p-4 position-absolute w-100 zindex-2">
                        <div class="px-md-3">
                            <h3 class="mb-0 text-white h4">{{ x_('Projects Marketplace', 'home') }}</h3>
                            <div class="card-portfolio-meta d-flex align-items-center justify-content-between">
                                <span class="text-white opacity-70 fs-xs text-truncate pe-3">{{ x_('Post projects and receive proposals from experts', 'home') }}</span>
                                <i class="bx bx-right-arrow-circle fs-3 text-gradient-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-img">
                        <img src="{{ asset('middle-east.jpg') }}" alt="{{ x_('Projects Marketplace', 'home') }}">
                    </div>
                </a>
            </div>
        </div>
        <!-- Pagination (bullets) -->
        <div class="bottom-0 pt-2 mt-4 swiper-pagination position-relative pt-md-3"></div>
    </div>
</section>
