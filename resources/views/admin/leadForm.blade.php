<!doctype html>
@include('admin.main.html')
<head>
    <meta charset="utf-8"/>
    <title> BZNSBOOK </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.main.meta')
</head>
<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active">
        <div class="hk-pg-wrapper py-0 mx-0" style="margin-left: 0px !important;">
            <div class="hk-pg-body py-0">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            @include('admin.sections.leadForm.topbar')
                            @include('admin.sections.leadForm.table')
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.sections.leadForm.footer')

        </div>
    </div>
    @include('admin.main.scripts')
</body>
</html>
