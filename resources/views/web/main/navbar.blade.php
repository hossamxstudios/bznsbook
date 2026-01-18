<header class="header navbar navbar-expand-lg navbar-sticky">
    <div class="container px-3">
        <a href="{{ route('pages.home') }}" class="navbar-brand pe-3">
            <img src="{{ URL::asset('crmlogo.png') }}" width="200" alt="{{ config('app.name') }}">
        </a>
        <div id="navbarNav" class="offcanvas offcanvas-end">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="mb-2 navbar-nav me-auto mb-lg-0">
                    <li class="nav-item dropdown">
                        <a href="/" class="nav-link" >Homes</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('pages.about') }}" class="nav-link" >About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('pages.companies') }}" class="nav-link" >Our Companies</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('pages.pricing') }}" class="nav-link" >Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('pages.contact') }}" class="nav-link" >Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="offcanvas-header border-top">
                <a href="{{ route('admin.login') }}" class="btn btn-primary w-100" >
                    <i class="bx bx-log-in-circle fs-4 lh-1 me-1"></i>
                    &nbsp; Login
                </a>
            </div>
        </div>
        <div class="form-check form-switch mode-switch pe-lg-1 ms-auto me-4" data-bs-toggle="mode">
            <input type="checkbox" class="form-check-input" id="theme-mode">
            <label class="form-check-label d-none d-sm-block" for="theme-mode">Light</label>
            <label class="form-check-label d-none d-sm-block" for="theme-mode">Dark</label>
        </div>
        <button type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="{{ route('admin.login') }}" class="rounded btn btn-primary btn-sm fs-sm d-none d-lg-inline-flex"  rel="noopener">
            <i class="bx bx-log-in-circle fs-5 lh-1 me-1"></i>
            &nbsp;Login
        </a>
    </div>
</header>
