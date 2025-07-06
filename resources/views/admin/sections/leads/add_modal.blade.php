<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdd" aria-labelledby="offcanvasAddLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasAddLabel" style="color: aliceblue;">Add New Lead</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('leads.store') }}" method="POST">
            @csrf
            <!-- Pipeline Dropdown -->
            <div class="mb-3">
                <label for="pipeline_id" class="form-label">Pipeline *</label>
                <select class="form-control" id="pipeline_id" name="pipeline_id" required onchange="updateStages()">
                    <option value="" selected disabled>Select a pipeline</option>
                    @foreach ($pipelines as $pipeline)
                        <option value="{{ $pipeline->id }}">{{ $pipeline->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Stage Dropdown -->
            <div class="mb-3">
                <label for="stage_id" class="form-label">Stage *</label>
                <select class="form-control" id="stage_id" name="stage_id" required>
                    <option value="" selected disabled>Select a stage</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Lead Name *</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Lead Name" required>
            </div>
            <div class="mb-3">
                <label for="company_id" class="form-label">Company *</label>
                <select name="company_id" class="form-control select2" id="company_id" >
                    <option value="">Select</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" data-email="{{ $company->email }}">
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="contact_id" class="form-label">Contact *</label>
                <select name="contact_id" class="form-control select2" >
                    <option value="">Select</option>
                    @foreach($contacts as $contact)
                        <option value="{{ $contact->id }}" data-email="{{ $contact->email }}">
                            {{ $contact->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Other Fields -->
            <div class="mb-3">
                <label for="type" class="form-label">Type </label>
                <select class="form-control" id="type" name="type" required>
                    <option value="" selected disabled>Select a type</option>
                    <option value="New business">New business</option>
                    <option value="Upsell">Upsell</option>
                    <option value="Re-attempting">Re-attempting</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="label" class="form-label">Label </label>
                <select class="form-control" id="label" name="label" required>
                    <option value="" selected disabled>Select a type</option>
                    <option value="Hot">Hot</option>
                    <option value="Worm">Worm</option>
                    <option value="Cold">Cold</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Add Lead</button>
        </form>
    </div>
</div>

<script>
    function updateStages() {
        const pipelineId = document.getElementById('pipeline_id').value;
        const stageSelect = document.getElementById('stage_id');

        // Clear existing options
        stageSelect.innerHTML = '<option value="" selected disabled>Select a stage</option>';

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

    function updateContacts() {
        const companyId = document.getElementById('company_id').value;
        const contactSelect = document.getElementById('contact_id');

        // Clear existing options
        contactSelect.innerHTML = '<option value="" selected disabled>Select a contact</option>';

        // Fetch contacts for the selected pipeline via AJAX
        fetch(`/api/compaiens/${companyId}/contacts`)
            .then(response => response.json())
            .then(data => {
                data.forEach(stage => {
                    const option = document.createElement('option');
                    option.value = stage.id;
                    option.textContent = stage.name;
                    contactSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching contacts:', error));
    }
</script>
