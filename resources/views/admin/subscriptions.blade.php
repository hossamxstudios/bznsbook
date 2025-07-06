<!doctype html>
@include('admin.main.html')

<head>
    <meta charset="utf-8" />
    <title> BZNSBOOK - Subscriptions </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.main.meta')
</head>
<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active" >
        @include('admin.main.sidebar')
        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            @include('admin.sections.subscriptions.topbar')
                            <!-- Tabs content -->
                            @include('admin.sections.subscriptions.table')
                        </div>
                        @foreach ($subscriptions as $subscription)
                            @include('admin.sections.subscriptions.markActive')
                            @include('admin.sections.subscriptions.markExpired')
                            @include('admin.sections.subscriptions.markAsPaid')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.main.scripts')

    <!-- Flash message handling -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</body>
</html>
