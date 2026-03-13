<!doctype html>
@include('admin.main.html')

<head>
    <meta charset="utf-8" />
    <title> {{ x_('BZNSBOOK - Client Management', 'admin') }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.main.meta')

</head>

<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active">
        @include('admin.main.sidebar')
        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            @include('admin.sections.clients.topbar')
                            @include('admin.sections.clients.table')
                        </div>
                        @include('admin.sections.clients.create_modal')
                        @include('admin.sections.clients.upload_modal')
                        @foreach ($clients as $client)
                            @include('admin.sections.clients.show_modal')
                            @include('admin.sections.clients.update_modal')
                            @include('admin.sections.clients.delete_modal')
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
        // DataTable initialization
        $(document).ready(function() {
            $('#client_table').DataTable({
                order: [[0, 'desc']],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "{{ x_('Search clients...', 'clients') }}"
                }
            });
        });

        // Handle bulk delete operations
        $(document).ready(function () {
            $(document).on('click', '.cked', function () {
                if ($('.cked:checked').length > 0) {
                    if ($('#deleteAllChecked').length === 0) {
                        $('.dataTables_wrapper .btn-group').append(
                            '<button class="btn btn-danger" id="deleteAllChecked" onclick="deleteAllChecked()">{{ x_('Delete Selected', 'admin') }}</button>'
                        );
                    }
                } else {
                    $('#deleteAllChecked').remove();
                }
            });
        });

        function deleteAllChecked() {
            var ids = [];
            if (confirm("{{ x_('Are you sure you want to delete the selected clients?', 'clients') }}")) {
                $(".cked:checked").each(function(){
                    if($(this).attr('name') == 'checkeds[]'){
                        ids.push($(this).val());
                    }
                });
                if (ids.length > 0) {
                    $.ajax({
                        method: "POST",
                        url: "{{ route('clients.deleteAll') }}",
                        data: {
                            id: ids,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (data) {
                            location.reload();
                        }
                    });
                } else {
                    alert("{{ x_('Please select at least one client', 'clients') }}");
                }
            }
        }
    </script>
</body>
</html>
