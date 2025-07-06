<div class="modal fade" id="removeBatch{{$application->batch_candidate?->id}}" tabindex="-1" aria-labelledby="removeBatch" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="removeBatch">Remove Candidate Form The Batch :  {{$application->batch_candidate?->batch?->name}}</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('jobs.batch.delete') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <input type="hidden" name="id" value="{{ $application->batch_candidate?->id }}">
                                <label for="id" class="form-label"> Are you sure?</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div><!--end row-->
                </div>
            </form>
        </div>
    </div>
</div>
