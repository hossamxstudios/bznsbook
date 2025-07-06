<div class="modal fade" id="addAttachment{{$job->id}}" tabindex="-1" aria-labelledby="addAttachment" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAttachment">Add Attachment To job : {{$job->title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <form action="{{ route('jobs.attachment.attach') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="job_id" value="{{ $job->id }}">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="role" class="form-label">Attachment Name * </label>
                            <input type="text" name="collection" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="role" class="form-label">Add Attachment *</label>
                            <input type="file" name="attachment" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
