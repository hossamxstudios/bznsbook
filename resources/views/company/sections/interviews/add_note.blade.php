<div class="modal fade" id="addNote{{$interview->id}}" tabindex="-1" aria-labelledby="addNote" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNote">Add Note To Interview : {{$interview->title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('interviews.note.attach') }}" method="POST">
                @csrf
                <input type="hidden" name="interview_id" value="{{ $interview->id }}">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="role" class="form-label">Write Note</label>
                            <textarea name="note" class="form-control" required></textarea>
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
