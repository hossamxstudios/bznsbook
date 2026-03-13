<!--Offcanvas Wrapper-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdd" aria-labelledby="offcanvasTopLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasAddtLabel" style="color:aliceblue">{{ x_('Add New Section', 'admin') }}</h5>
        <button type="button" class="text-white btn-close"  data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('sections.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3 position-relative">
                <label for="name" class="form-label">{{ x_('Section Name', 'admin') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ x_('Enter Section Name', 'admin') }}" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="invalid-feedback">{{ x_('Please enter a section name', 'admin') }}</div>
                @enderror
            </div>

            <div class="mb-3 position-relative">
                <label for="icon" class="form-label">{{ x_('Section Icon', 'admin') }}</label>
                <input type="file" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon">
                <small class="form-text text-muted">{{ x_('Upload a small icon image (max 2MB)', 'admin') }}</small>
                @error('icon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="invalid-feedback">{{ x_('Please select a valid image', 'admin') }}</div>
                @enderror
            </div>

            <div class="mb-3 position-relative">
                <label for="details" class="form-label">{{ x_('Section Details', 'admin') }}</label>
                <textarea class="form-control @error('details') is-invalid @enderror" id="details" name="details" rows="3" placeholder="{{ x_('Enter your section details here...', 'admin') }}">{{ old('details') }}</textarea>
                @error('details')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ x_('Add Section', 'admin') }}</button>
        </form>
        <!-- End Form -->
    </div>
</div>
<!--/ Offcanvas Wrapper-->

<script>
// Client-side validation
document.addEventListener('DOMContentLoaded', function() {
    'use strict'

    // Fetch all forms that need validation
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
});
</script>
