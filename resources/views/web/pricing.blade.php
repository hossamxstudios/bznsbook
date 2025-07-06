
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
        @include('web.sections.pricing.hero')
        @include('web.sections.pricing.cards')
        @include('web.sections.pricing.plans')
        @include('web.sections.pricing.faqs')
        @include('web.sections.pricing.clients')
    </main>
    @include('web.sections.pricing.cta')
    @include('web.main.footer')
    @include('web.main.scripts')
</body>
</html>

