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
    .dataTables_info{
        display: none !important;
    }
    .dataTables_paginate{
        display: none!important;
    }
    .dataTables_length{
        display: none !important;
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
                            @include('admin.sections.contacts.topbar')
                            @include('admin.sections.contacts.table')
                        </div>
                        @include('admin.sections.contacts.add_modal')
                        @include('admin.sections.contacts.upload_modal')
                        @foreach ($contacts as $contact)
                            @include('admin.sections.contacts.show_modal')
                            @include('admin.sections.contacts.update_modal')
                            @include('admin.sections.contacts.delete_modal')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
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
                        url: "{{ route('contacts.deleteAll') }}",
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
    </script>
</body>

</html>
