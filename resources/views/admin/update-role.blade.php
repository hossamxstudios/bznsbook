<!doctype html>
@include('admin.main.html')

<head>
    <meta charset="utf-8" />
    <title> BZNSBOOK </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- multi.js Css-->
    <link href="{{ URL::asset('dist/assets/libs/multi.js/multi.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('dist/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    {{-- <link href="{{ URL::asset('dist/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"> --}}
    @include('admin.main.meta')
    <!-- App Css-->
    <link href="{{ URL::asset('dist/assets/css/app.min.css')}}" rel="stylesheet" type="text/css">

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
    .non-selected-wrapper,.selected-wrapper {
       height: 60vh !important;
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
                            <!-- Update Role -->
                            @include('admin.sections.roles.update')
                            <!-- /Update Role -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->
    </div>
    @include('admin.main.scripts')

      <!-- multi.js -->
      <script src="{{ URL::asset('dist/assets/libs/multi.js/multi.min.js')}}"></script>
      <!-- init js -->
      <script src="{{ URL::asset('dist/assets/js/pages/form-advanced.init.js')}}"></script>


</body>

</html>
