<div class="modal fade" id="addTag{{$candidate->id}}" tabindex="-1" aria-labelledby="addTag" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTag">Add Tag To candidate : {{$candidate->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('company.tag.attach') }}" method="POST">
                @csrf
                <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="role" class="form-label">{{ x_('Select Tag', 'general') }}</label>
                            <select name="tag_id"  class="form-control" required>
                                <option value="" selected >{{ x_('Select a Tag', 'general') }}</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ $candidate->tags->contains('id',$tag->id) ? 'disabled' : '' }}>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">{{ x_('Submit', 'general') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
