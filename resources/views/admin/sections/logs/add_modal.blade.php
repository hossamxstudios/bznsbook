<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdd" aria-labelledby="offcanvasAddLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasAddLabel" style="color: aliceblue;">Add New Deal</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('deals.store') }}" method="POST">
            @csrf

            <!-- Pipeline Selection -->
            <div class="mb-3">
                <label for="pipeline_id" class="form-label">Pipeline</label>
                <select class="form-control" id="pipeline_id" name="pipeline_id" required onchange="updateStages()">
                    <option value="" selected disabled>Select a pipeline</option>
                    @foreach ($pipelines as $pipeline)
                        <option value="{{ $pipeline->id }}">{{ $pipeline->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Stage Selection -->
            <div class="mb-3">
                <label for="stage_id" class="form-label">Stage</label>
                <select class="form-control" id="stage_id" name="stage_id" required>
                    <option value="" selected disabled>Select a stage</option>
                </select>
            </div>

            <!-- Company Selection -->
            <div class="mb-3">
                <label for="company_id" class="form-label">Company</label>
                <select class="form-control" id="company_id" name="company_id" required onchange="updateContacts()">
                    <option value="" selected disabled>Select a company</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Contact Selection -->
            <div class="mb-3">
                <label for="contact_id" class="form-label">Contact</label>
                <select class="form-control" id="contact_id" name="contact_id" required>
                    <option value="" selected disabled>Select a contact</option>
                </select>
            </div>

            <!-- Deal Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Deal Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter deal name" required>
            </div>

            <!-- Deal Amount -->
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter deal amount" required>
            </div>

            <!-- Closed At Date -->
            <div class="mb-3">
                <label for="closed_at" class="form-label">Closed At</label>
                <input type="date" class="form-control" id="closed_at" name="closed_at" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Deal</button>
        </form>
    </div>
</div>

<script>
    // Fetch stages for the selected pipeline
    function updateStages() {
        const pipelineId = document.getElementById('pipeline_id').value;
        const stageSelect = document.getElementById('stage_id');

        // Clear existing options
        stageSelect.innerHTML = '<option value="" selected disabled>Select a stage</option>';

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
        contactSelect.innerHTML = '<option value="" selected disabled>Select a contact</option>';

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
