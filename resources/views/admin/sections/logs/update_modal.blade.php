<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdate{{ $deal->id }}"
    aria-labelledby="offcanvasUpdateLabel{{ $deal->id }}" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasUpdateLabel{{ $deal->id }}" style="color: aliceblue;">Update Deal</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form id="updateDealForm{{ $deal->id }}" action="{{ route('deals.update', $deal->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="update_pipeline_id_{{ $deal->id }}" class="form-label">Pipeline</label>
                <select class="form-control" id="update_pipeline_id_{{ $deal->id }}" name="pipeline_id" required onchange="updateStagesForUpdate({{ $deal->id }})">
                    @foreach ($pipelines as $pipeline)
                        <option value="{{ $pipeline->id }}" {{ $deal->pipeline_id == $pipeline->id ? 'selected' : '' }}>
                            {{ $pipeline->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="update_stage_id_{{ $deal->id }}" class="form-label">Stage</label>
                <select class="form-control" id="update_stage_id_{{ $deal->id }}" name="stage_id" required>
                    @foreach ($deal->pipeline->stages as $stage)
                        <option value="{{ $stage->id }}" {{ $deal->stage_id == $stage->id ? 'selected' : '' }}>
                            {{ $stage->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="update_company_id_{{ $deal->id }}" class="form-label">Company</label>
                <select class="form-control" id="update_company_id_{{ $deal->id }}" name="company_id" required onchange="updateContactsForUpdate({{ $deal->id }})">
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ $deal->company_id == $company->id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="update_contact_id_{{ $deal->id }}" class="form-label">Contact</label>
                <select class="form-control" id="update_contact_id_{{ $deal->id }}" name="contact_id" required>
                    @foreach ($deal->company->contacts as $contact)
                        <option value="{{ $contact->id }}" {{ $deal->contact_id == $contact->id ? 'selected' : '' }}>
                            {{ $contact->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="update_name_{{ $deal->id }}" class="form-label">Deal Name</label>
                <input type="text" class="form-control" id="update_name_{{ $deal->id }}" name="name" value="{{ $deal->name }}" required>
            </div>
            <div class="mb-3">
                <label for="update_amount_{{ $deal->id }}" class="form-label">Amount</label>
                <input type="number" class="form-control" id="update_amount_{{ $deal->id }}" name="amount" value="{{ $deal->amount }}" required>
            </div>
            <div class="mb-3">
                <label for="update_closed_at_{{ $deal->id }}" class="form-label">Closed At</label>
                <input type="date" class="form-control" id="update_closed_at_{{ $deal->id }}" name="closed_at" value="{{ $deal->closed_at }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Deal</button>
        </form>
    </div>
</div>

<script>
    function openUpdateDealModal(dealId) {
        // Fetch deal data dynamically (if required)
        fetch(`/api/deals/${dealId}`)
            .then((response) => response.json())
            .then((data) => {
                // Populate modal fields dynamically
                document.getElementById(`update_pipeline_id_${dealId}`).value = data.pipeline_id;
                document.getElementById(`update_stage_id_${dealId}`).value = data.stage_id;
                document.getElementById(`update_company_id_${dealId}`).value = data.company_id;
                document.getElementById(`update_contact_id_${dealId}`).value = data.contact_id;
                document.getElementById(`update_name_${dealId}`).value = data.name;
                document.getElementById(`update_amount_${dealId}`).value = data.amount;
                document.getElementById(`update_closed_at_${dealId}`).value = data.closed_at;
            })
            .catch((error) => console.error("Error fetching deal data:", error));
        // Show the modal
        const offcanvas = new bootstrap.Offcanvas(document.getElementById(`offcanvasUpdate${dealId}`));
        offcanvas.show();
    }
    // Fetch stages for the selected pipeline
    function updateStagesForUpdate() {
        const pipelineId = document.getElementById('update_pipeline_id').value;
        const stageSelect = document.getElementById('update_stage_id');
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
    function updateContactsForUpdate() {
        const companyId = document.getElementById('update_company_id').value;
        const contactSelect = document.getElementById('update_contact_id');
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
