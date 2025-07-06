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
            margin-bottom: 8px
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
        <div class="hk-pg-wrapper py-0">
            <div class="hk-pg-body py-0">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            @include('admin.main.topbar')
                            @include('admin.sections.pipelines.table')
                        </div>
                        @include('admin.sections.pipelines.add_modal')
                        @foreach ($pipelines as $pipeline)
                            @include('admin.sections.pipelines.update_modal')
                            @include('admin.sections.pipelines.delete_modal')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    // <!-- jQuery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let childCounter = 10000;
        function add_stage(id) {
            // var stagesContainer = document.getElementById(`update-stages-container-${id}`);
            const newStage = `
                <div class="row align-items-center stage-row mb-3" id="stage-row-${childCounter}">
                    <div class="col-4">
                        <input type="hidden" name="stages[stage${childCounter}][id]" value="id${childCounter}" required>
                        <input type="text" name="stages[stage${childCounter}][name]" class="form-control" placeholder="Stage Name" required>
                    </div>
                    <div class="col-4">
                        <input type="number" name="stages[stage${childCounter}][percentage]" class="form-control" placeholder="%" min="0" max="100" required>
                    </div>
                    <div class="col-2 text  -end">
                        <input type="number" name="stages[stage${childCounter}][place]" class="form-control" placeholder="arrange" required>

                    </div>
                    <div class="col-2 text  -end">
                        <button type="button" class="btn btn-sm btn-danger remove-stage-btn" onclick="remove_stage(${childCounter})"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            `;
            $('#update-stages-container-'+id).append(newStage);
            childCounter++;
        }

        function remove_stage($id) {
            $('#stage-row-'+$id).remove();
        }



        // Function to attach remove button functionality for update
        // function attachRemoveEvent(stageElement) {
        //     const removeBtn = stageElement.querySelector('.remove-stage-btn');
        //     removeBtn.addEventListener('click', function () {
        //         stageElement.remove();
        //     });
        // }
        // Attach remove event to existing rows for update
        // document.querySelectorAll('.remove-stage-btn').forEach((btn) => {
        //     btn.addEventListener('click', function () {
        //         btn.closest('.stage-row').remove();
        //     });
        // });
     </script>
    @include('admin.main.scripts')

</body>
</html>
