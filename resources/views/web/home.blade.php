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
        @include('web.sections.home.revslider')
        @include('web.sections.home.trusted')
        @include('web.sections.home.services')
        @include('web.sections.home.how-it-works')
        @include('web.sections.home.library')
        @include('web.sections.home.plan')
        @include('web.sections.home.use-cases')
        @include('web.sections.home.map')
        @include('web.sections.home.reviews')
        @include('web.sections.home.contact')
        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
</body>
</html>
