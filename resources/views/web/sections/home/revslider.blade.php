

<section class="overflow-hidden pt-5 position-relative zindex-2">
    <div class="container pt-5">
        <div class="pt-5 row justify-content-center align-items-center">
            <div class="col-xl-6 col-lg-7 col-md-6 col-sm-8 col-10 offset-xl-1 order-md-2">
                <div class="mx-auto parallax" style="max-width: 556px;">
                    <div class="parallax-layer" data-depth="0.1">
                        <img src="{{ asset('assets/img/landing/app-showcase-3/hero/layer01.png') }}" alt="{{ x_('Bubble', 'home') }}">
                    </div>
                   <div class="parallax-layer" data-depth="-0.2">
                        <img src="{{ asset('assets/img/landing/app-showcase-3/hero/layer02.png') }}" alt="{{ x_('Bubble', 'home') }}">
                    </div>
                    <div class="parallax-layer" data-depth="-0.3">
                        <img src="{{ asset('assets/img/landing/app-showcase-3/hero/layer03.png') }}" alt="{{ x_('Bubble', 'home') }}">
                    </div>
                    <div class="parallax-layer" data-depth="0.4">
                        <img src="{{ asset('assets/img/landing/app-showcase-3/hero/layer04.png') }}" alt="{{ x_('Bubble', 'home') }}">
                    </div>
                    <div class="parallax-layer" data-depth="-0.1">
                        {{-- <img src="{{ asset('rev1.jpg') }}" alt="{{ x_('Screen', 'home') }}" style="width: 200px;height: auto;"> --}}
                        <img src="{{ asset('assets/img/landing/app-showcase-3/hero/layer05.png') }}" alt="{{ x_('Screen', 'home') }}">

                    </div>
                    <div class="parallax-layer" data-depth="0.2">
                        {{-- <img src="{{ asset('rev2.jpg') }}" alt="{{ x_('Screen', 'home') }}" style="width: 200px;height: auto;"> --}}
                        <img src="{{ asset('assets/img/landing/app-showcase-3/hero/layer06.png') }}" alt="{{ x_('Screen', 'home') }}">
                    </div>
                </div>
            </div>
            <div class="text-center col-lg-5 col-md-6 text-md-start order-md-1">
                <h1 class="display-5 mb-lg-4">{{ x_('Where Professionals Connect, Collaborate & Grow', 'home') }}</h1>
                <p class="pb-3 mb-4 fs-xl pb-lg-0 mb-lg-5">{{ x_('Showcase your services, build your portfolio, post projects, and find the right partners. BznsBook is the professional marketplace for agencies, freelancers, and businesses.', 'home') }}</p>
                <div class="gap-3 d-flex flex-column flex-sm-row">
                    <a href="{{ route('client.register') }}" class="btn btn-primary btn-lg">{{ x_('Get Started Free', 'home') }}</a>
                    <a href="{{ route('pages.companies') }}" class="btn btn-outline-dark btn-lg">{{ x_('Browse Professionals', 'home') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
