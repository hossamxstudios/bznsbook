<div class="modal fade" id="deleteModal{{$interview->id}}" tabindex="-1" aria-labelledby="deleteModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="deleteModal">Delete the Interview for Candidate : {{$interview->candidate?->first_name}}  {{$interview->candidate?->last_name}}</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('interviews.destroy') }} " method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <input type="hidden" name="id" value="{{ $interview->id }}">
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
