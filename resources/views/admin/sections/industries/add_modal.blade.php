<!--Offcanvas Wrapper-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdd" aria-labelledby="offcanvasTopLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasAddtLabel" style="color:aliceblue">Add New Industry</h5>
        <button type="button" class="btn-close text-white"  data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('industries.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Industry Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Industry Name" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active">
                <label for="is_active" class="form-check-label">Is Active</label>
            </div>

            <button type="submit" class="btn btn-primary">Add Industry</button>
        </form>
        <!-- End Form -->
    </div>
</div>
<!--/ Offcanvas Wrapper-->

