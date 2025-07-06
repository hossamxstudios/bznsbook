<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title>{{ $project->name }} | Bzns Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
</head>
<body>
    <main class="page-wrapper">
        @include('web.main.navbar')
        <section class="container pt-5">
            <div class="row">
                @include('web.sections.profile.side')
                <div class="col-md-8 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
                    @include('web.sections.projects.single')
                </div>
            </div>
        </section>
        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
</body>
</html>
