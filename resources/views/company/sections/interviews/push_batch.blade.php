<div class="modal fade" id="pushToBatch{{$application->id}}" tabindex="-1" aria-labelledby="pushToBatch{{$application->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pushToBatch{{$application->id}}">Add  {{ $application->candidate?->first_name }} {{ $application->candidate?->last_name }} To Batch </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('jobs.batch.push') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="application_id" value="{{ $application->id }}">
                    <div class="mb-3">
                        <label class="form-label">Select Batch *</label>
                        <select class="form-select" name="batch_id" required>
                            <option value="">Please Select A Batch</option>
                            @foreach ($all_batches as $single_batch)
                                <option value="{{ $single_batch->id }}">{{ $single_batch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hiring Date </label>
                        <input type="date" class="form-control" name="hiring_date">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Starting Date </label>
                        <input type="date" class="form-control" name="starting_date">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Probation Period </label>
                        <input type="number" class="form-control" name="prop_period">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Probation End Date </label>
                        <input type="date" class="form-control" name="prop_end">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hiring Salary </label>
                        <input type="number" class="form-control" name="hiring_salary">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Batch Notes (if exists)</label>
                        <textarea class="form-control" name="notes" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add To Batch</button>
                </div>
            </form>
        </div>
    </div>
</div>
