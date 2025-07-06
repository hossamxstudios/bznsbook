<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    @include('admin.main.meta')
    <style>
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
   	<!-- Wrapper -->
	<div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active" >
        @include('admin.main.sidebar')
		<div class="py-0 hk-pg-wrapper">
			<!-- Page Body -->
			<div class="py-0 hk-pg-body">
				<div class="taskboardapp-wrap">
					<div class="taskboardapp-content">
						<div class="taskboardapp-detail-wrap">
                            @include('admin.sections.deals.topbar')
							<div class="mt-5 taskboard-body tab-content">
                                @include('admin.sections.deals.kanban_view')
                                @include('admin.sections.deals.table_view')
							</div>
						</div>
                        @include('admin.sections.deals.add_modal')
                        @foreach ($deals as $deal)
                            @include('admin.sections.deals.show_modal')
                            @include('admin.sections.deals.delete_modal')
                            @include('admin.sections.deals.update_modal')
                        @endforeach
					</div>
				</div>
			</div>
			<!-- /Page Body -->
		</div>
		<!-- /Main Content -->
	</div>

  @include('admin.main.scripts')
<script src="{{ URL::asset('/dist/js/kanban-board-data.js') }}"></script>



  <script>
    function redirectToPipeline() {
        var pipelineId = document.getElementById('pipeline_select').value;
        if (pipelineId) {
            var baseUrl = "{{ route('deals.show', ['id' => '']) }}";
            window.location.href = baseUrl + "/" + pipelineId;
        }
    }

    function showCompaniesTab(dealId) {
        const companiesTabButton = document.querySelector(`a[href="#companies${dealId}"]`);
        if (companiesTabButton) {
            const bsTab = new bootstrap.Tab(companiesTabButton);
            bsTab.show();
        }
    }
    function showContactsTab(dealId) {
        const contactsTabButton = document.querySelector(`a[href="#contacts${dealId}"]`);
        if (contactsTabButton) {
            const bsTab = new bootstrap.Tab(contactsTabButton);
            bsTab.show();
        }
    }
    function updateStages() {
        const pipelineId = document.getElementById('pipeline_id').value;
        const stageSelect = document.getElementById('stage_id');
        stageSelect.innerHTML = '<option value="" selected disabled>Select a stage</option>';
        fetch(`/api/pipelines/${pipelineId}/stages`)
            .then(response => response.json())
            .then(data => {
                data.forEach(stage => {
                    const option = document.createElement('option');
                    option.value = stage.id;
                    option.textContent = stage.name;
                    stageSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching stages:', error));
    }

     function updateStagesForUpdate(dealId) {
        const pipelineId = document.getElementById(`update_pipeline_id_${dealId}`).value;
        const stageSelect = document.getElementById(`update_stage_id_${dealId}`);
        // Clear existing options
        stageSelect.innerHTML = '<option value="" selected disabled>Select a stage</option>';
        // Fetch stages for the selected pipeline via AJAX
        fetch(`/api/pipelines/${pipelineId}/stages`)
            .then(response => response.json())
            .then(data => {
                // Add stages to the dropdown
                data.forEach(stage => {
                    const option = document.createElement('option');
                    option.value = stage.id;
                    option.textContent = stage.name;
                    stageSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching stages:', error));
    }
</script>
<style>
    #datable_2_filter{
        float: right;
        margin-bottom:10px;
    }
    .dataTables_scrollHeadInner,.dataTables_scrollHead{
        width: 100% !important;
    }
    .dataTables_filter{
        margin-top: 10px!important;
        float: right!important;
    }
</style>
</body>
</html>
