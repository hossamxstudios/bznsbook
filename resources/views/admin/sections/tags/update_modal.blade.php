<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdate{{$tag->id}}" aria-labelledby="offcanvasUpdateLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasUpdateLabel" style="color:aliceblue">Update Tag</h5>
        <button type="button" class="btn-close text-white"  data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('tags.update', ['id' => $tag->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">tag Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $tag->name }}" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select" id="type" name="type" required>
                    <option value="">Please Select Type</option>
                    <option value="candidate" {{ $tag->type == 'candidate' ? 'selected' : '' }}>candidate</option>
                    <option value="job" {{ $tag->type == 'job' ? 'selected' : '' }}>job</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update tag</button>
        </form>
    </div>
</div>
