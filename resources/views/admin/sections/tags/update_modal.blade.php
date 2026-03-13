<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdate{{$tag->id}}" aria-labelledby="offcanvasUpdateLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasUpdateLabel" style="color:aliceblue">{{ x_('Update Tag', 'admin') }}</h5>
        <button type="button" class="btn-close text-white"  data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('tags.update', ['id' => $tag->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{ x_('tag Name', 'admin') }}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $tag->name }}" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">{{ x_('Type', 'admin') }}</label>
                <select class="form-select" id="type" name="type" required>
                    <option value="">{{ x_('Please Select Type', 'admin') }}</option>
                    <option value="candidate" {{ $tag->type == 'candidate' ? 'selected' : '' }}>{{ x_('candidate', 'admin') }}</option>
                    <option value="job" {{ $tag->type == 'job' ? 'selected' : '' }}>{{ x_('job', 'admin') }}</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">{{ x_('Update tag', 'admin') }}</button>
        </form>
    </div>
</div>
