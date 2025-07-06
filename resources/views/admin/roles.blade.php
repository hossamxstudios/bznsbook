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
        <!-- Vertical Nav -->
        @include('admin.main.sidebar')
        <!-- /Vertical Nav -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper py-0">
            <!-- Page Body -->
            <div class="hk-pg-body py-0">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            @include('admin.main.topbar')
                            @include('admin.sections.roles.table')
                        </div>
                        @foreach ($roles as $role)
                            <!-- show Role -->
                            @include('admin.sections.roles.show_modal')
                            <!-- /show Role -->
                            <!-- Delete Role -->
                            @include('admin.sections.roles.delete_modal')
                            <!-- / Delete Role -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->
    </div>
    @include('admin.main.scripts')
</body>

</html>
