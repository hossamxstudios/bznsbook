<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdd" aria-labelledby="offcanvasAddLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasAddLabel" style="color: aliceblue;">Add New Deal</h5>
        <button type="button" class="btn-close text-white"  data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('deals.store') }}" method="POST">
            @csrf

            <!-- Pipeline Selection -->
            <div class="mb-3">
                <label for="pipeline_id" class="form-label">Pipeline * </label>
                <select class="form-control" id="pipeline_id" name="pipeline_id" required onchange="updateStages()">
                    <option value="" selected disabled>Select a pipeline</option>
                    @foreach ($pipelines as $pipeline)
                        <option value="{{ $pipeline->id }}">{{ $pipeline->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Stage Selection -->
            <div class="mb-3">
                <label for="stage_id" class="form-label">Stage *</label>
                <select class="form-control" id="stage_id" name="stage_id" required>
                    <option value="" selected disabled>Select a stage</option>
                </select>
            </div>

            <!-- Company Selection -->
            <div class="mb-3">
                <label for="company_id" class="form-label">Company * </label>
                <select name="company_id" class="form-control select2" id="company_id" required>
                    <option value="">Select</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" data-email="{{ $company->email }}">
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Contact Selection -->
            <div class="mb-3">
                <label for="contact_id" class="form-label">Contact</label>
                <select name="contact_id" class="form-control select2" >
                    <option value="">Select</option>
                    @foreach($contacts as $contact)
                        <option value="{{ $contact->id }}" data-email="{{ $contact->email }}">
                            {{ $contact->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Deal Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Deal Name *</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter deal name" required>
            </div>

            <!-- Deal Amount -->
            <div class="mb-3">
                <label for="amount" class="form-label">Amount *</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter deal amount" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Deal</button>
        </form>
    </div>
</div>

