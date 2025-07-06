<!doctype html>
@include('admin.main.html')

<head>
    <meta charset="utf-8" />
    <title> BZNSBOOK - Subcategories </title>
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
        .nav-tabs .nav-link.active {
            font-weight: 500;
        }
        .invalid-feedback {
            display: block;
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
                            @include('admin.sections.subcategories.topbar')

                            <!-- Tabs content -->
                            <div class="tab-content" style="overflow: scroll;">
                                <div class="tab-pane fade show active" id="tab_subcategories" >
                                    @include('admin.sections.subcategories.table')
                                </div>
                            </div>
                        </div>
                        @include('admin.sections.subcategories.add_modal')
                        @foreach ($subcategories as $subcategory)
                            @include('admin.sections.subcategories.update_modal')
                            @include('admin.sections.subcategories.delete_modal')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.main.scripts')
</body>
</html>
