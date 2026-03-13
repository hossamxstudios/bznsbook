<div class="modal fade" id="uploadExcelModal" tabindex="-1" aria-labelledby="uploadExcelModalLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadExcelModalLabel">{{ x_('Upload Excel Files', 'general') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('companies.bulkImport') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="file" class="form-label">{{ x_('Choose Excel File', 'general') }}</label>
                        <input type="file" name="file" class="form-control" id="file" accept=".xlsx,.xls,.csv" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ x_('Cancel', 'general') }}</button>
                    <button type="submit" class="btn btn-primary">{{ x_('Upload', 'general') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
 