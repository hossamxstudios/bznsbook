<div class="modal fade" id="uploadExcelModal" tabindex="-1" aria-labelledby="uploadExcelModalLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadExcelModalLabel">{{ x_('Upload Clients', 'clients') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('clients.bulkImport') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="file" class="form-label">{{ x_('Choose Excel File', 'clients') }}</label>
                        <input type="file" name="file" class="form-control" id="file" accept=".xlsx,.xls,.csv" required>
                    </div>
                    <div class="alert alert-info mb-0">
                        <p class="mb-1"><strong>{{ x_('Note:', 'clients') }}</strong> {{ x_('Your Excel file should include the following columns:', 'clients') }}</p>
                        <ul class="mb-0 ps-3">
                            <li>{{ x_('name (required)', 'clients') }}</li>
                            <li>{{ x_('title', 'clients') }}</li>
                            <li>{{ x_('email (required)', 'clients') }}</li>
                            <li>{{ x_('phone', 'clients') }}</li>
                            <li>{{ x_('address', 'clients') }}</li>
                            <li>{{ x_('country', 'clients') }}</li>
                            <li>{{ x_('city', 'clients') }}</li>
                            <li>{{ x_('company_size', 'clients') }}</li>
                            <li>{{ x_('website', 'clients') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-secondary" data-bs-dismiss="modal">{{ x_('Cancel', 'clients') }}</button>
                    <button type="submit" class="btn btn-primary">{{ x_('Upload', 'clients') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
