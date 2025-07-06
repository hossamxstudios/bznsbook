<!doctype html>
@include('web.main.html')

<head>
    <meta charset="utf-8" />
    <title> Bzns Book </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
</head>

<body>
    <main class="page-wrapper">
        @include('web.main.navbar')
        <section class="container pt-5 pb-5 d-flex flex-column align-items-center position-relative zindex-5">
            <div class="py-5 text-center">

                <!-- Parallax gfx (Light version) -->
                <div class="mx-auto parallax d-dark-mode-none" style="max-width: 574px;">
                    <div class="parallax-layer" data-depth="-0.15">
                        <img src="{{ asset('assets/img/404/light/layer01.png') }}" alt="Layer">
                    </div>
                    <div class="parallax-layer" data-depth="0.12">
                        <img src="{{ asset('assets/img/404/light/layer02.png') }}" alt="Layer">
                    </div>
                    <div class="parallax-layer zindex-5" data-depth="-0.12">
                        <img src="{{ asset('assets/img/404/light/layer03.png') }}" alt="Layer">
                    </div>
                </div>

                <!-- Parallax gfx (Dark version) -->
                <div class="mx-auto parallax d-none d-dark-mode-block" style="max-width: 574px;">
                    <div class="parallax-layer" data-depth="-0.15">
                        <img src="{{ asset('assets/img/404/dark/layer01.png') }}" alt="Layer">
                    </div>
                    <div class="parallax-layer" data-depth="0.12">
                        <img src="{{ asset('assets/img/404/dark/layer02.png') }}" alt="Layer">
                    </div>
                    <div class="parallax-layer zindex-5" data-depth="-0.12">
                        <img src="{{ asset('assets/img/404/dark/layer03.png') }}" alt="Layer">
                    </div>
                </div>

                <h1 class="visually-hidden">404</h1>
                <h2 class="display-5">Ooops!</h2>
                <p class="pb-3 fs-xl pb-md-0 mb-md-5">The page you are looking for is not available.</p>
                <a href="{{ route('pages.home') }}" class="btn btn-lg btn-primary shadow-primary w-sm-auto w-100">
                    <i class="bx bx-home-alt me-2 ms-n1 lead"></i>
                    Go to homepage
                </a>
            </div>
        </section>
        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
</body>

</html>
