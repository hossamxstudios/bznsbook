<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdate{{$topic->id}}" aria-labelledby="offcanvasUpdateLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasUpdateLabel" style="color:aliceblue">Update Topic</h5>
        <button type="button" class="text-white btn-close" data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('topics.update', ['id' => $topic->id]) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3 position-relative">
                <label for="name" class="form-label">Topic Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $topic->name }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="invalid-feedback">Please enter a topic name</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Topic</button>
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
