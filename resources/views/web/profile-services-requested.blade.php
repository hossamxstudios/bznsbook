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
        <section class="container pt-5">
            <div class="row">
                @include('web.sections.profile.side')
                @include('web.sections.profile.services-requested')
            </div>
        </section>
        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
    @yield('scripts')
</body>
</html>
