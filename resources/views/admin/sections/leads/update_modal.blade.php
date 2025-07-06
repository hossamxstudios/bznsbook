<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdate{{$lead->id}}" aria-labelledby="offcanvasUpdateLabel{{$lead->id}}" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasUpdateLabel{{$lead->id}}" style="color: aliceblue;">Update Lead</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('leads.update', ['id' => $lead->id]) }}" method="POST">
            @csrf
            <!-- Pipeline Dropdown -->
            <div class="mb-3">
                <label for="pipeline_id{{$lead->id}}" class="form-label">Pipeline *</label>
                <select class="form-control" id="pipeline_id{{$lead->id}}" name="pipeline_id" required onchange="updateStages{{$lead->id}}()">
                    <option value="" disabled>Select a pipeline</option>
                    @foreach ($pipelines as $pipeline)
                        <option value="{{ $pipeline->id }}" {{ $pipeline->id == $lead->pipeline_id ? 'selected' : '' }}>
                            {{ $pipeline->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Stage Dropdown -->
            <div class="mb-3">
                <label for="stage_id{{$lead->id}}" class="form-label">Stage *</label>
                <select class="form-control" id="stage_id{{$lead->id}}" name="stage_id" required>
                    <option value="" disabled>Select a stage</option>
                    @foreach ($stages as $stage)
                        <option value="{{ $stage->id }}" {{ $stage->id == $lead->stage_id ? 'selected' : '' }}>
                            {{ $stage->name }}
                        </option>
                    @endforeach
                </select>
            </div>

              <!-- Company Dropdown -->
              <div class="mb-3">
                <label for="company_id" class="form-label">Company *</label>
                <select name="company_id" class="form-control select2"  id="company_id">
                    <option value="">Select</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" data-email="{{ $company->email }}" {{ $company->id == $lead->company_id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Contact Dropdown -->
            <div class="mb-3">
                <label for="contact_id" class="form-label">Contact *</label>
                <select name="contact_id" class="form-control select2" id="contact_id">
                    <option value="">Select</option>
                    @foreach($contacts as $contact)
                        <option value="{{ $contact->id }}" data-email="{{ $contact->email }}" {{ $contact->id == $lead->contact_id ? 'selected' : '' }}>
                            {{ $contact->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name{{$lead->id}}" class="form-label">Lead Name *</label>
                <input type="text" class="form-control" id="name{{$lead->id}}" name="name" value="{{ $lead->name }}" required>
            </div>

            <div class="mb-3">
                <label for="type{{$lead->id}}" class="form-label">Type</label>
                <select class="form-control" id="type" name="type" >
                    <option value="" selected disabled>Select a type</option>
                    <option value="New business">New business</option>
                    <option value="Upsell">Upsell</option>
                    <option value="Re-attempting">Re-attempting</option>
                </select>
            </div>


            <div class="mb-3">
                <label for="label{{$lead->id}}" class="form-label">Label</label>
                <select class="form-control" id="label" name="label">
                    <option value="" selected disabled>Select a type</option>
                    <option value="Hot">Hot</option>
                    <option value="Worm">Worm</option>
                    <option value="Cold">Cold</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Lead</button>
        </form>
    </div>
</div>

<script>
    function updateStages{{$lead->id}}() {
        const pipelineId = document.getElementById('pipeline_id{{$lead->id}}').value;
        const stageSelect = document.getElementById('stage_id{{$lead->id}}');

        // Clear existing options
        stageSelect.innerHTML = '<option value="" disabled>Select a stage</option>';

        // Fetch stages for the selected pipeline via AJAX
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


</script>
