
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
        @include('web.sections.contact.1')
        @include('web.sections.contact.2')
        {{-- @include('web.sections.contact.3') --}}
        {{-- @include('web.sections.contact.4') --}}
        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
</body>
</html>
