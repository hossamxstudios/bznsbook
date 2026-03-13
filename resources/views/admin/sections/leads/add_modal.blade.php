<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdd" aria-labelledby="offcanvasAddLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasAddLabel" style="color: aliceblue;">{{ x_('Add New Lead', 'leads') }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('leads.store') }}" method="POST">
            @csrf
            <!-- Pipeline Dropdown -->
            <div class="mb-3">
                <label for="pipeline_id" class="form-label">{{ x_('Pipeline *', 'leads') }}</label>
                <select class="form-control" id="pipeline_id" name="pipeline_id" required onchange="updateStages()">
                    <option value="" selected disabled>{{ x_('Select a pipeline', 'leads') }}</option>
                    @foreach ($pipelines as $pipeline)
                        <option value="{{ $pipeline->id }}">{{ $pipeline->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Stage Dropdown -->
            <div class="mb-3">
                <label for="stage_id" class="form-label">{{ x_('Stage *', 'leads') }}</label>
                <select class="form-control" id="stage_id" name="stage_id" required>
                    <option value="" selected disabled>{{ x_('Select a stage', 'leads') }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">{{ x_('Lead Name *', 'leads') }}</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="{{ x_('Enter Lead Name', 'leads') }}" required>
            </div>
            <div class="mb-3">
                <label for="company_id" class="form-label">{{ x_('Company *', 'leads') }}</label>
                <select name="company_id" class="form-control select2" id="company_id" >
                    <option value="">{{ x_('Select', 'leads') }}</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" data-email="{{ $company->email }}">
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="contact_id" class="form-label">{{ x_('Contact *', 'leads') }}</label>
                <select name="contact_id" class="form-control select2" >
                    <option value="">{{ x_('Select', 'leads') }}</option>
                    @foreach($contacts as $contact)
                        <option value="{{ $contact->id }}" data-email="{{ $contact->email }}">
                            {{ $contact->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Other Fields -->
            <div class="mb-3">
                <label for="type" class="form-label">{{ x_('Type', 'leads') }} </label>
                <select class="form-control" id="type" name="type" required>
                    <option value="" selected disabled>{{ x_('Select a type', 'leads') }}</option>
                    <option value="New business">{{ x_('New business', 'leads') }}</option>
                    <option value="Upsell">{{ x_('Upsell', 'leads') }}</option>
                    <option value="Re-attempting">{{ x_('Re-attempting', 'leads') }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="label" class="form-label">{{ x_('Label', 'leads') }} </label>
                <select class="form-control" id="label" name="label" required>
                    <option value="" selected disabled>{{ x_('Select a type', 'leads') }}</option>
                    <option value="Hot">{{ x_('Hot', 'leads') }}</option>
                    <option value="Worm">{{ x_('Worm', 'leads') }}</option>
                    <option value="Cold">{{ x_('Cold', 'leads') }}</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">{{ x_('Add Lead', 'leads') }}</button>
        </form>
    </div>
</div>

<script>
    function updateStages() {
        const pipelineId = document.getElementById('pipeline_id').value;
        const stageSelect = document.getElementById('stage_id');

        // Clear existing options
        stageSelect.innerHTML = '<option value="" selected disabled>{{ x_('Select a stage', 'leads') }}</option>';

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
        contactSelect.innerHTML = '<option value="" selected disabled>{{ x_('Select a contact', 'leads') }}</option>';

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
