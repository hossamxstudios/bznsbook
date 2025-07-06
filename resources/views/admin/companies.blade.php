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
        #datable_2_filter {
            float: right;
        }
        .form-label{
            color: #33475b;
            font-weight: 500;
        }
        .form-control{
            border-radius: 3px;
            transition: all 0.15s ease-out;
        }
        .offcanvas h5{
            color:white;
            font-weight: 700;
            font-size:20px;
            margin-bottom: 0;
        }
        .offcanvas-header{
            background: #474e5d;
        }
        .offcanvas .btn-close{
            font-weight: 400;
            font-size: 16px;
            padding: 20px;
        }
        .avatar.avatar-info > .initial-wrap {
            background-color: #3e3e3e !important;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active">
        @include('admin.main.sidebar')
        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            @include('admin.sections.companies.topbar')
                            @include('admin.sections.companies.table')
                        </div>
                        @include('admin.sections.companies.add_modal')
                        @include('admin.sections.companies.upload_modal')
                        @foreach ($companies as $company)
                            @include('admin.sections.companies.services_offcanvas')
                            @include('admin.sections.companies.show_modal')
                            @include('admin.sections.companies.update_modal')
                            @include('admin.sections.companies.delete_modal')
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->
    </div>
    @include('admin.main.scripts')
    <style>
        .dataTables_scrollHeadInner,.dataTables_scrollHead{
            width: 100% !important;
        }
        .dataTables_filter{
            margin-top: 10px!important;
            float: right!important;
        }
    </style>
    <script>
        // check if there is any checkbox seleted jquery then inject the delete button
        $(document).ready(function () {
            $(document).on('click', '.cked', function () {
                if ($('.cked:checked').length > 0) {
                    if ($('#deleteAllChecked').length === 0) {
                        $('.dataTables_wrapper .btn-group').append(
                            '<button class="btn btn-primary" id="deleteAllChecked" onclick="deleteAllChecked()">Delete</button>'
                        );
                    }
                } else {
                    $('#deleteAllChecked').remove();
                }
            });
        });
        function deleteAllChecked() {
            var ids = [];
            if (confirm("Are you sure you want to delete this records?")) {
                $(".cked:checked").each(function(){
                    // check if the input name is checkeds[]
                    if($(this).attr('name') == 'checkeds[]'){
                        ids.push($(this).val());
                        // console.log(ids);
                    }
                });
                if (ids.length > 0) {
                    $.ajax({
                        method: "POST",
                        url: "{{ route('companies.deleteAll') }}",
                        data: {
                            id: ids,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (data) {
                            location.reload();
                        }
                    });
                } else {
                    alert("Please select atleast one checkbox");
                }
            }
        }

        // $(document).ready(function() {
        //     $('.select2').select2({
        //         dropdownParent: $('#assginCompanyModal'),
        //         matcher: function(params, data) {
        //             if ($.trim(params.term) === '') {
        //                 return data;
        //             }
        //             let term = params.term.toLowerCase();
        //             let text = data.text.toLowerCase();
        //             if (text.indexOf(term) > -1) {
        //                 return data;
        //             }
        //             let email = $(data.element).data('email') ? $(data.element).data('email').toLowerCase() : '';
        //             if (email.indexOf(term) > -1) {
        //                 return data;
        //             }
        //             return null;
        //         }
        //     });
        // });
    </script>

</body>

</html>
