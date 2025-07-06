<div class="modal fade" id="convertModal{{ $job_request->id }}" tabindex="-1" aria-labelledby="convertModal" aria-modal="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="convertModal">Post Request As Job </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{  route('job.requests.convert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <input type="hidden" name="job_request_id" value="{{ $job_request->id }}">
                        <div class="col-12">
                            <label for="title" class="form-label">Job Title *</label>
                            <input type="text" class="form-control" name="title" value="{{ $job_request->title }}" required>
                        </div>
                        <div class="col-12">
                            <label for="pipeline_id" class="form-label">Select Job Pipe Line  *</label>
                            <select class="form-select" name="pipeline_id" required>
                                <option value=""> Please Select A Pipeline</option>
                                @foreach ($pipelines as $pipeline)
                                    <option value="{{ $pipeline->id }}">{{ $pipeline->name }}</option>
                                @endforeach
                            </select>
                        </div>

                            <div class="col-12">
                                <div class="form-check form-switch form-switch-lg">
                                    <input class="form-check-input" type="checkbox" name="is_published" checked>
                                    <label class="form-check-label" for="is_published">Publish Job To Career Page</label>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Post Job</button>
                </div>
            </form>
        </div>
    </div>
</div>
