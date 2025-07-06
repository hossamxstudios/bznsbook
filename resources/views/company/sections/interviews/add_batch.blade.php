<div class="modal fade" id="addBatch{{$job->id}}" tabindex="-1" aria-labelledby="addBatchLabel{{$job->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBatchLabel{{$job->id}}">Add Batch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('jobs.batch.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                    <div class="mb-3">
                        <label class="form-label">Batch Details (if exists)</label>
                        <textarea class="form-control" name="details" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Batch Size *</label>
                        <input type="number" class="form-control" name="size" required value="5">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Batch</button>
                </div>
            </form>
        </div>
    </div>
</div>
