<div class="modal fade" id="addTag{{$job->id}}" tabindex="-1" aria-labelledby="addTag" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTag">Add Tag To Job : {{$job->title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('jobs.tag.attach') }}" method="POST">
                @csrf
                <input type="hidden" name="job_id" value="{{ $job->id }}">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="role" class="form-label">Select Tag</label>
                            <select name="tag_id"  class="form-control" required>
                                <option value="" selected >Select a Tag</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ $job->tags->contains('id',$tag->id) ? 'disabled' : '' }}>{{ $tag->name }}</option>
                                @endforeach
                            </select>
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
