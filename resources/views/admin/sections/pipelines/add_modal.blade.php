
{{-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasExample">
	Toggle right offcanvas
</button> --}}

<!--Offcanvas Wrapper-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdd" aria-labelledby="offcanvasTopLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasAddLabel" style="color:aliceblue">{{ x_('Create New Pipeline', 'pipelines') }}</h5>
        <button type="button" class="btn-close text-white"  data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('pipelines.store') }}" method="POST">
            @csrf
            <!-- Pipeline Name -->
            <div class="mb-3">
                <label for="pipeline_name" class="form-label">{{ x_('Pipeline Name *', 'pipelines') }}</label>
                <input type="text" class="form-control" id="pipeline_name" name="pipeline_name" placeholder="{{ x_('Enter pipeline name', 'pipelines') }}" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">{{ x_('Type *', 'pipelines') }}</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="lead">{{ x_('Lead', 'pipelines') }}</option>
                    <option value="deal">{{ x_('Deal', 'pipelines') }}</option>
                </select>
            </div>
            <!-- Labels for Stages -->
            <div class="row mb-2">
                <div class="col-4">
                    <label class="form-label">{{ x_('Name *', 'pipelines') }}</label>
                </div>
                <div class="col-4">
                    <label class="form-label">{{ x_('probability *', 'pipelines') }}</label>
                </div>
                {{-- <div class="col-2"> --}}
                    {{-- <label class="form-label">{{ x_('Place *', 'pipelines') }}</label> --}}
                {{-- </div> --}}
            </div>

            <!-- Stages Section -->
            <div id="stages-container">
                <!-- Single Stage Row -->
                <div class="row align-items-center stage-row mb-3">
                    <div class="col-4">
                        <input type="text" name="stage_names[]" class="form-control" placeholder="{{ x_('Stage Name', 'pipelines') }}" required>
                    </div>
                    <div class="col-4">
                        <input type="number" name="stage_percentages[]" class="form-control" placeholder="%" min="0" max="100" required>
                    </div>
                    <div class="col-2 text-end">
                        <button type="button" class="btn btn-sm btn-danger remove-stage-btn">
                            <i class="fas fa-trash"></i> <!-- Trash Icon -->
                        </button>
                    </div>
                </div>
            </div>
            <div class="text-end mb-3">
                <button type="button" class="btn btn-sm btn-primary add-stage-btn">{{ x_('+ Add Stage', 'pipelines') }}</button>
            </div>

            <div class="d-grid">
                <input type="submit" class="btn btn-primary" value="{{ x_('Create Pipeline', 'pipelines') }}">
            </div>
        </form>
    </div>
</div>
<!--/ Offcanvas Wrapper-->


<script>
    // Function to dynamically add a new stage
    document.querySelector('.add-stage-btn').addEventListener('click', function () {
        const stagesContainer = document.getElementById('stages-container');
        const newStage = document.createElement('div');
        newStage.classList.add('row', 'align-items-center', 'stage-row', 'mb-3');
        newStage.innerHTML = `
            <div class="col-4">
                <input type="text" name="stage_names[]" class="form-control" placeholder="{{ x_('Stage Name', 'pipelines') }}" required>
            </div>
            <div class="col-4">
                <input type="number" name="stage_percentages[]" class="form-control" placeholder="%" min="0" max="100" required>
            </div>
            <div class="col-2 text-end">
                <button type="button" class="btn btn-sm btn-danger remove-stage-btn"><i class="fas fa-trash"></i></button>
            </div>
        `;
        stagesContainer.appendChild(newStage);
        attachRemoveEvent(newStage);
    });

    // Function to attach remove button functionality
    function attachRemoveEvent(stageElement) {
        const removeBtn = stageElement.querySelector('.remove-stage-btn');
        removeBtn.addEventListener('click', function () {
            stageElement.remove();
        });
    }

    // Attach remove event to existing rows
    document.querySelectorAll('.remove-stage-btn').forEach((btn) => {
        btn.addEventListener('click', function () {
            btn.closest('.stage-row').remove();
        });
    });
</script>
