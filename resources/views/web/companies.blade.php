
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
        @include('web.sections.companies.slider')
        @include('web.sections.companies.main')
        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
</body>
</html>

