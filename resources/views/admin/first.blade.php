
<!doctype html>
@include('owner.main.html')
<head>
    <meta charset="utf-8" />
    <title> BZNSBOOKHR </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('owner.main.meta')
</head>
<body>
    <div id="layout-wrapper">
        {{-- @include('owner.main.topbar') --}}
        {{-- @include('owner.main.sidebar') --}}
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                     @include('owner.sections.home.first')
                     {{-- @include('backend.sections.home.tables') --}}
                </div>
            </div>
            {{-- @include('owner.main.footer') --}}
        </div>
    </div>
    @include('owner.main.scripts1')

</body>
</html>
