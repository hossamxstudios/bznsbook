<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable" data-theme="default" data-bs-theme="light" data-topbar="light">
<title>Kenooz - Owners</title>
<meta content="Minimal Admin & Dashboard Template" name="description">
<head>
    @include('backend.main.meta')
</head>
<body>
    <div id="layout-wrapper">
        @include('backend.main.sidebar')
        @include('backend.main.topbar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @include('backend.sections.settings.table')
                </div>
            </div>
            @include('backend.main.footer')
        </div>
    </div>
    @include('backend.main.scripts')
</body>
</html>
