<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdate{{$section->id}}" aria-labelledby="offcanvasUpdateLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasUpdateLabel" style="color:aliceblue">Update Section</h5>
        <button type="button" class="text-white btn-close"  data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('sections.update', ['id' => $section->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3 position-relative">
                <label for="name" class="form-label">Section Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $section->name }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="invalid-feedback">Please enter a section name</div>
                @enderror
            </div>
            
            <div class="mb-3 position-relative">
                <label for="icon" class="form-label">Section Icon</label>
                @if($section->getFirstMedia('icons'))
                    <div class="mb-2">
                        <img src="{{ $section->getFirstMediaUrl('icons') }}" alt="Current Icon" style="max-width: 100px; max-height: 100px;" class="img-thumbnail">
                    </div>
                @endif
                <input type="file" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" accept="image/*">
                <small class="form-text text-muted">Upload a new icon image to replace the current one (max 2MB)</small>
                @error('icon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="invalid-feedback">Please select a valid image</div>
                @enderror
            </div>
            
            <div class="mb-3 position-relative">
                <label for="details" class="form-label">Section Details</label>
                <textarea class="form-control @error('details') is-invalid @enderror" id="details" name="details" rows="3" placeholder="Enter your section details here...">{{ $section->details }}</textarea>
                @error('details')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Section</button>
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
