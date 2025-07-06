<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdate{{$industry->id}}" aria-labelledby="offcanvasUpdateLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasUpdateLabel" style="color:aliceblue">Update Industry</h5>
        <button type="button" class="btn-close text-white"  data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('industries.update', ['id' => $industry->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">industry Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $industry->name }}" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active{{$industry->id}}" name="is_active"  {{ $industry->is_active ? 'checked' : '' }}>
                <label for="is_active" class="form-check-label">Is Active</label>
            </div>

            <button type="submit" class="btn btn-primary">Update Industry</button>
        </form>
    </div>
</div>
