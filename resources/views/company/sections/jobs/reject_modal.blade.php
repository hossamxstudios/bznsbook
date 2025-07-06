<div class="modal fade" id="rejectModal{{$job->id}}" tabindex="-1" aria-labelledby="rejectModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModal">Reject the job : {{$job->title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('jobs.reject') }} " method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <input type="hidden" name="id" value="{{ $job->id }}">
                                <label for="id" class="form-label"> Are you sure you want to reject the job?</label>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </div><!--end row-->
                </div>
            </form>
        </div>
    </div>
</div>
