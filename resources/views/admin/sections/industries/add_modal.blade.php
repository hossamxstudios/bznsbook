<!--Offcanvas Wrapper-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdd" aria-labelledby="offcanvasTopLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasAddtLabel" style="color:aliceblue">{{ x_('Add New Industry', 'admin') }}</h5>
        <button type="button" class="btn-close text-white"  data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('industries.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{ x_('Industry Name', 'admin') }}</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="{{ x_('Enter Industry Name', 'admin') }}" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active">
                <label for="is_active" class="form-check-label">{{ x_('Is Active', 'admin') }}</label>
            </div>

            <button type="submit" class="btn btn-primary">{{ x_('Add Industry', 'admin') }}</button>
        </form>
        <!-- End Form -->
    </div>
</div>
<!--/ Offcanvas Wrapper-->

