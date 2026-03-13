<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdd" aria-labelledby="offcanvasAddLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasAddLabel" style="color: aliceblue;">{{ x_('Add New Deal', 'deals') }}</h5>
        <button type="button" class="btn-close text-white"  data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('deals.store') }}" method="POST">
            @csrf

            <!-- Pipeline Selection -->
            <div class="mb-3">
                <label for="pipeline_id" class="form-label">{{ x_('Pipeline *', 'deals') }} </label>
                <select class="form-control" id="pipeline_id" name="pipeline_id" required onchange="updateStages()">
                    <option value="" selected disabled>{{ x_('Select a pipeline', 'deals') }}</option>
                    @foreach ($pipelines as $pipeline)
                        <option value="{{ $pipeline->id }}">{{ $pipeline->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Stage Selection -->
            <div class="mb-3">
                <label for="stage_id" class="form-label">{{ x_('Stage *', 'deals') }}</label>
                <select class="form-control" id="stage_id" name="stage_id" required>
                    <option value="" selected disabled>{{ x_('Select a stage', 'deals') }}</option>
                </select>
            </div>

            <!-- Company Selection -->
            <div class="mb-3">
                <label for="company_id" class="form-label">{{ x_('Company *', 'deals') }} </label>
                <select name="company_id" class="form-control select2" id="company_id" required>
                    <option value="">{{ x_('Select', 'deals') }}</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" data-email="{{ $company->email }}">
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Contact Selection -->
            <div class="mb-3">
                <label for="contact_id" class="form-label">{{ x_('Contact', 'deals') }}</label>
                <select name="contact_id" class="form-control select2" >
                    <option value="">{{ x_('Select', 'deals') }}</option>
                    @foreach($contacts as $contact)
                        <option value="{{ $contact->id }}" data-email="{{ $contact->email }}">
                            {{ $contact->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Deal Name -->
            <div class="mb-3">
                <label for="name" class="form-label">{{ x_('Deal Name *', 'deals') }}</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="{{ x_('Enter deal name', 'deals') }}" required>
            </div>

            <!-- Deal Amount -->
            <div class="mb-3">
                <label for="amount" class="form-label">{{ x_('Amount *', 'deals') }}</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="{{ x_('Enter deal amount', 'deals') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">{{ x_('Add Deal', 'deals') }}</button>
        </form>
    </div>
</div>

