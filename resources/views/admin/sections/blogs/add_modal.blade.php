<!--Offcanvas Wrapper-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdd" aria-labelledby="offcanvasTopLabel" style="width:620px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasAddtLabel" style="color:aliceblue">Add New Blog</h5>
        <button type="button" class="text-white btn-close" data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3 position-relative">
                <label for="topic_id" class="form-label">Topic <span class="text-danger">*</span></label>
                <select class="form-select @error('topic_id') is-invalid @enderror" id="topic_id" name="topic_id" required>
                    <option value="" selected disabled>Select Topic</option>
                    @foreach($topics as $topic)
                        <option value="{{ $topic->id }}" {{ old('topic_id') == $topic->id ? 'selected' : '' }}>{{ $topic->name }}</option>
                    @endforeach
                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
                @error('topic_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="invalid-feedback">Please select a topic</div>
                @enderror
            </div>
            
            <div class="mb-3 position-relative">
                <label for="title" class="form-label">Blog Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter Blog Title" value="{{ old('title') }}" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="invalid-feedback">Please enter a blog title</div>
                @enderror
            </div>
            
            <div class="mb-3 position-relative">
                <label for="sub_title" class="form-label">Blog Sub Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('sub_title') is-invalid @enderror" id="sub_title" name="sub_title" placeholder="Enter Blog Sub Title" value="{{ old('sub_title') }}" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                @error('sub_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="invalid-feedback">Please enter a blog sub title</div>
                @enderror
            </div>
            
            <div class="mb-3 position-relative">
                <label for="image" class="form-label">Blog Image</label>
                <div class="input-group">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                    <label class="input-group-text" for="image"><i class="ri-image-add-line"></i></label>
                </div>
                <small class="form-text text-muted">Upload a blog image (max 2MB). Recommended size: 1200x630px.</small>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="invalid-feedback">Please select a valid image (JPG, PNG, or GIF under 2MB)</div>
                @enderror
            </div>
            
            <div class="mb-4 position-relative">
                <label for="details" class="form-label">Blog Content <span class="text-danger">*</span></label>
                <textarea class="form-control @error('details') is-invalid @enderror" id="details" name="details" rows="8" placeholder="Enter blog content here..." required>{{ old('details') }}</textarea>
                <div class="valid-feedback">
                    Looks good!
                </div>
                @error('details')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="invalid-feedback">Please enter blog content</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary me-2" data-bs-dismiss="offcanvas">Cancel</button>
                <button type="submit" class="btn btn-primary">
                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true" id="add-spinner"></span>
                    <span>Add Blog</span>
                </button>
            </div>
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
    const forms = document.querySelectorAll('.needs-validation');
    
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    // Show loading spinner
                    const spinner = document.getElementById('add-spinner');
                    if (spinner) {
                        spinner.classList.remove('d-none');
                    }
                    
                    // Disable submit button to prevent multiple submissions
                    const submitBtn = this.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.disabled = true;
                    }
                }
                
                form.classList.add('was-validated');
            }, false);
        });
    
    // Preview image before upload
    const imageInput = document.getElementById('image');
    if (imageInput) {
        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const fileType = file.type;
                const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
                
                if (!validImageTypes.includes(fileType)) {
                    this.value = '';
                    alert('Please select a valid image file (JPEG, PNG, or GIF)');
                    return;
                }
                
                if (file.size > 2 * 1024 * 1024) {
                    this.value = '';
                    alert('Image size should be less than 2MB');
                    return;
                }
            }
        });
    }
});
</script>
