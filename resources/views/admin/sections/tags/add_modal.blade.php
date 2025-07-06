<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdd" aria-labelledby="offcanvasTopLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasAddtLabel" style="color:aliceblue">Add New Tag</h5>
        <button type="button" class="btn-close text-white"  data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('tags.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tag Name *</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Tag Name" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type *</label>
                <select class="form-select" id="type" name="type" required>
                    <option value="">Please Select Type</option>
                    <option value="candidate">candidate</option>
                    <option value="job">job</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Tag</button>
        </form>
    </div>
</div>

