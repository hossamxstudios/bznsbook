<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdd" data-bs-scroll="true" data-bs-backdrop="false" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">{{ x_('Add New Subcategory', 'admin') }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('subcategories.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="row gx-3">
                <div class="col-sm-12 form-group position-relative mb-3">
                    <label class="form-label">{{ x_('Name', 'admin') }}</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required/>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="invalid-feedback">{{ x_('Please enter a subcategory name', 'admin') }}</div>
                    @enderror
                </div>
                
                <div class="col-sm-12 form-group position-relative mb-3">
                    <label class="form-label">{{ x_('Category', 'admin') }}</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" required>
                        <option value="">{{ x_('Select a category', 'admin') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="invalid-feedback">{{ x_('Please select a category', 'admin') }}</div>
                    @enderror
                </div>
                
                <div class="col-sm-12 form-group position-relative mb-3">
                    <label class="form-label">{{ x_('Details', 'admin') }}</label>
                    <textarea class="form-control @error('details') is-invalid @enderror" name="details" rows="3">{{ old('details') }}</textarea>
                    @error('details')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">{{ x_('Save', 'admin') }}</button>
        </form>
    </div>
</div>

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
