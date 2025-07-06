<!doctype html>
@include('admin.main.html')

<head>
    <meta charset="utf-8" />
    <title> BZNSBOOK </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.main.meta')
    <style>
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
        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            @include('admin.sections.topics.topbar')
                            @include('admin.sections.topics.table')
                        </div>
                        @include('admin.sections.topics.add_modal')
                        @foreach ($topics as $topic)
                            @include('admin.sections.topics.update_modal')
                            @include('admin.sections.topics.delete_modal')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.main.scripts')
</body>
</html>
