<header class="header navbar navbar-expand-lg navbar-sticky">
    <div class="container px-3">
        <a href="{{ route('pages.home') }}" class="navbar-brand pe-3">
            <img src="{{ URL::asset('crmlogo.png') }}" width="200" alt="{{ config('app.name') }}">
        </a>
        <div id="navbarNav" class="offcanvas offcanvas-end">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title">{{ x_('Menu', 'web-layout') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="mb-2 navbar-nav me-auto mb-lg-0">
                    <li class="nav-item">
                        <a href="/" class="nav-link">{{ x_('Home', 'web-layout') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pages.companies') }}" class="nav-link">{{ x_('Explore Professionals', 'web-layout') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pages.pricing') }}" class="nav-link">{{ x_('Pricing', 'web-layout') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pages.about') }}" class="nav-link">{{ x_('About', 'web-layout') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pages.contact') }}" class="nav-link">{{ x_('Contact', 'web-layout') }}</a>
                    </li>
                </ul>
            </div>
            <div class="offcanvas-header border-top">
                <a href="{{ route('admin.login') }}" class="btn btn-primary w-100" >
                    <i class="bx bx-log-in-circle fs-4 lh-1 me-1"></i>
                    &nbsp; {{ x_('Login', 'web-layout') }}
                </a>
            </div>
        </div>
        {{-- Language Switcher --}}
        @php
            $currentLocale = app()->getLocale();
            $allLocales = array_merge(['en' => 'English'], function_exists('active_locales') ? active_locales() : []);
        @endphp
        @if(count($allLocales) > 1)
        <div class="dropdown ms-auto me-3">
            <a href="#" class="btn btn-secondary btn-sm btn-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false" style="width:36px;height:36px;">
                <i class="bx bx-globe fs-5"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" style="min-width:160px;">
                <li><h6 class="dropdown-header">{{ x_('Language', 'web-layout') }}</h6></li>
                @foreach($allLocales as $code => $name)
                <li>
                    <form action="{{ route('language.switch') }}" method="POST">
                        @csrf
                        <input type="hidden" name="locale" value="{{ $code }}">
                        <button type="submit" class="dropdown-item {{ $currentLocale === $code ? 'active' : '' }}">
                            {{ $name }} <small class="text-muted">({{ strtoupper($code) }})</small>
                        </button>
                    </form>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="form-check form-switch mode-switch pe-lg-1 me-4" data-bs-toggle="mode">
            <input type="checkbox" class="form-check-input" id="theme-mode">
            <label class="form-check-label d-none d-sm-block" for="theme-mode">{{ x_('Light', 'web-layout') }}</label>
            <label class="form-check-label d-none d-sm-block" for="theme-mode">{{ x_('Dark', 'web-layout') }}</label>
        </div>
        <button type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="{{ route('admin.login') }}" class="rounded btn btn-primary btn-sm fs-sm d-none d-lg-inline-flex"  rel="noopener">
            <i class="bx bx-log-in-circle fs-5 lh-1 me-1"></i>
            &nbsp;{{ x_('Login', 'web-layout') }}
        </a>
    </div>
</header>
