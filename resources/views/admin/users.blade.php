<!doctype html>
@include('admin.main.html')

<head>
    <meta charset="utf-8" />
    <title> BZNSBOOK </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.main.meta')
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
        @include('admin.main.sidebar')
        <div class="hk-pg-wrapper py-0">
            <div class="hk-pg-body py-0">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            @include('admin.sections.users.topbar')
                            @include('admin.sections.users.table')
                        </div>
                        @include('admin.sections.users.add_modal')
                        @foreach ($users as $user)
                            @include('admin.sections.users.update_modal')
                            @include('admin.sections.users.delete_modal')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.main.scripts')
</body>

</html>
