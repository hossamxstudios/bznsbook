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
        .btn-link{
            color: #33475b;
        }
        .btn-link:hover{
            color: #3e3e3e;
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
                            @include('admin.sections.leads.table')
                        </div>
                          <!-- Add New lead -->
                          @include('admin.sections.leads.add_modal')
                          <!-- /Add New lead -->
                          @foreach ($leads as $lead)
                              <!-- show lead -->
                              @include('admin.sections.leads.show_modal')
                              <!-- /show lead -->

                              <!-- Update lead -->
                              @include('admin.sections.leads.update_modal')
                              <!-- / Update lead -->

                              <!-- Delete lead -->
                              @include('admin.sections.leads.delete_modal')
                              <!-- / Delete lead -->
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
        // Wait for the document to be fully loaded before executing the code
        $(document).ready(function() {
            // Initialize select2 for 'Assign Company' modal when it is shown
            $('#assginCompanyModal').on('shown.bs.modal', function () {
                $('.select2').select2({
                    // Set the dropdown parent to a modal with id 'assginCompanyModal'
                    dropdownParent: $('#assginCompanyModal'),
                    // Custom matcher function to filter results based on user input
                    matcher: function(params, data) {
                        // If the search term is empty, return all data
                        if ($.trim(params.term) === '') {
                            return data;
                        }
                        // Convert the search term and the text of the data to lowercase for case-insensitive comparison
                        let term = params.term.toLowerCase();
                        let text = data.text.toLowerCase();

                        // Check if the data's text contains the search term
                        if (text.indexOf(term) > -1) {
                            return data;
                        }
                        // Get the email from the data element (if exists) and check if it contains the search term
                        let email = $(data.element).data('email') ? $(data.element).data('email').toLowerCase() : '';
                        if (email.indexOf(term) > -1) {
                            return data;
                        }
                        // If no match is found, return null (exclude this item from the dropdown)
                        return null;
                    }
                });
            });
            // Initialize select2 for 'Assign Contact' modal when it is shown
            $('#assginContactModal').on('shown.bs.modal', function () {
                $('.select2').select2({
                    // Set the dropdown parent to a modal with id 'assginContactModal'
                    dropdownParent: $('#assginContactModal'),
                    // Custom matcher function to filter results based on user input
                    matcher: function(params, data) {
                        // If the search term is empty, return all data
                        if ($.trim(params.term) === '') {
                            return data;
                        }
                        // Convert the search term and the text of the data to lowercase for case-insensitive comparison
                        let term = params.term.toLowerCase();
                        let text = data.text.toLowerCase();
                        // Get the email from the data element (if exists) and convert it to lowercase
                        let email = $(data.element).data('email') ? $(data.element).data('email').toLowerCase() : '';

                        // Check if either the data's text or email contains the search term
                        if (text.indexOf(term) > -1 || email.indexOf(term) > -1) {
                            return data;
                        }
                        // If no match is found, return null (exclude this item from the dropdown)
                        return null;
                    }
                });
            });
        });
    </script>

    <style>
        #datable_14_filter{
            float: right;
            margin-bottom:10px;
        }
        .dataTables_scrollHeadInner,.dataTables_scrollHead{
            width: 100% !important;
        }
    </style>
</body>

</html>
