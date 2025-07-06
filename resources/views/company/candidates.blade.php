<!doctype html>
@include('company.main.html')
<head>
    <meta charset="utf-8" />
    <title> BZNSBOOK </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('company.main.meta')
    <style>
        .btn-link{
            color: #33475b;
        }
        .btn-link:hover{
            color: #3e3e3e;
        }
        #datable_2_filter{
            float: right;
        }
        .avatar.avatar-info > .initial-wrap {
            background-color: #3e3e3e !important;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active" >
        @include('company.main.sidebar')
        <div class="hk-pg-wrapper py-0">
            <div class="hk-pg-body py-0">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            @include('company.sections.candidates.topbar')
                            @include('company.sections.candidates.table')
                        </div>
                        @foreach ($candidates as $candidate)
                            @include('company.sections.candidates.show_modal')
                            @include('company.sections.candidates.add_tag')
                            @include('company.sections.candidates.add_note')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('company.main.scripts')
    <style>
        .dataTables_scrollHeadInner,.dataTables_scrollHead{
            width: 100% !important;
        }
        .dataTables_filter{
            margin-top: 10px!important;
            float: right!important;
        }
    </style>
</body>
</html>
