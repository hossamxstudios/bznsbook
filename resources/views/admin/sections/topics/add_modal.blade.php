<!--Offcanvas Wrapper-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdd" aria-labelledby="offcanvasTopLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasAddtLabel" style="color:aliceblue">{{ x_('Add New Topic', 'admin') }}</h5>
        <button type="button" class="text-white btn-close" data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('topics.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3 position-relative">
                <label for="name" class="form-label">{{ x_('Topic Name', 'admin') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ x_('Enter Topic Name', 'admin') }}" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="invalid-feedback">{{ x_('Please enter a topic name', 'admin') }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">{{ x_('Add Topic', 'admin') }}</button>
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
