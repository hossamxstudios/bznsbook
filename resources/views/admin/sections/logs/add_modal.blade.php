<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdd" aria-labelledby="offcanvasAddLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasAddLabel" style="color: aliceblue;">{{ x_('Add New Deal', 'admin') }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('deals.store') }}" method="POST">
            @csrf

            <!-- Pipeline Selection -->
            <div class="mb-3">
                <label for="pipeline_id" class="form-label">{{ x_('Pipeline', 'admin') }}</label>
                <select class="form-control" id="pipeline_id" name="pipeline_id" required onchange="updateStages()">
                    <option value="" selected disabled>{{ x_('Select a pipeline', 'admin') }}</option>
                    @foreach ($pipelines as $pipeline)
                        <option value="{{ $pipeline->id }}">{{ $pipeline->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Stage Selection -->
            <div class="mb-3">
                <label for="stage_id" class="form-label">{{ x_('Stage', 'admin') }}</label>
                <select class="form-control" id="stage_id" name="stage_id" required>
                    <option value="" selected disabled>{{ x_('Select a stage', 'admin') }}</option>
                </select>
            </div>

            <!-- Company Selection -->
            <div class="mb-3">
                <label for="company_id" class="form-label">{{ x_('Company', 'admin') }}</label>
                <select class="form-control" id="company_id" name="company_id" required onchange="updateContacts()">
                    <option value="" selected disabled>{{ x_('Select a company', 'admin') }}</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Contact Selection -->
            <div class="mb-3">
                <label for="contact_id" class="form-label">{{ x_('Contact', 'admin') }}</label>
                <select class="form-control" id="contact_id" name="contact_id" required>
                    <option value="" selected disabled>{{ x_('Select a contact', 'admin') }}</option>
                </select>
            </div>

            <!-- Deal Name -->
            <div class="mb-3">
                <label for="name" class="form-label">{{ x_('Deal Name', 'admin') }}</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="{{ x_('Enter deal name', 'admin') }}" required>
            </div>

            <!-- Deal Amount -->
            <div class="mb-3">
                <label for="amount" class="form-label">{{ x_('Amount', 'admin') }}</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="{{ x_('Enter deal amount', 'admin') }}" required>
            </div>

            <!-- Closed At Date -->
            <div class="mb-3">
                <label for="closed_at" class="form-label">{{ x_('Closed At', 'admin') }}</label>
                <input type="date" class="form-control" id="closed_at" name="closed_at" required>
            </div>

            <button type="submit" class="btn btn-primary">{{ x_('Add Deal', 'admin') }}</button>
        </form>
    </div>
</div>

<script>
    // Fetch stages for the selected pipeline
    function updateStages() {
        const pipelineId = document.getElementById('pipeline_id').value;
        const stageSelect = document.getElementById('stage_id');

        // Clear existing options
        stageSelect.innerHTML = '<option value="" selected disabled>{{ x_('Select a stage', 'admin') }}</option>';

        // Fetch stages for the selected pipeline via AJAX
        fetch(`/api/deals/${pipelineId}/stages`)
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

    // Fetch contacts for the selected company
    function updateContacts() {
        const companyId = document.getElementById('company_id').value;
        const contactSelect = document.getElementById('contact_id');

        // Clear existing options
        contactSelect.innerHTML = '<option value="" selected disabled>{{ x_('Select a contact', 'admin') }}</option>';

        // Fetch contacts for the selected company via AJAX
        fetch(`/api/companies/${companyId}/contacts`)
            .then(response => response.json())
            .then(data => {
                // Add contacts to the dropdown
                data.forEach(contact => {
                    const option = document.createElement('option');
                    option.value = contact.id;
                    option.textContent = contact.name;
                    contactSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching contacts:', error));
    }
</script>
