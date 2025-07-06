<!--Offcanvas Wrapper-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdate{{ $blog->id }}" aria-labelledby="offcanvasUpdateLabel" style="width:620px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasUpdateLabel" style="color:aliceblue">Update Blog</h5>
        <button type="button" class="text-white btn-close" data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('blogs.update', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3 position-relative">
                <label for="topic_id_{{ $blog->id }}" class="form-label">Topic <span class="text-danger">*</span></label>
                <select class="form-select @error('topic_id') is-invalid @enderror" id="topic_id_{{ $blog->id }}" name="topic_id" required>
                    <option value="" disabled>Select Topic</option>
                    @foreach($topics as $topic)
                        <option value="{{ $topic->id }}" {{ $blog->topic_id == $topic->id ? 'selected' : '' }}>{{ $topic->name }}</option>
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
                <label for="title_{{ $blog->id }}" class="form-label">Blog Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title_{{ $blog->id }}" name="title" value="{{ $blog->title }}" required>
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
                <label for="sub_title_{{ $blog->id }}" class="form-label">Blog Sub Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('sub_title') is-invalid @enderror" id="sub_title_{{ $blog->id }}" name="sub_title" value="{{ $blog->sub_title }}" required>
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
                <label for="image_{{ $blog->id }}" class="form-label">Blog Image</label>
                @if($blog->getFirstMedia('images'))
                    <div class="mb-2">
                        <img src="{{ $blog->getFirstMediaUrl('images') }}" alt="{{ $blog->title }}" class="img-fluid" style="max-width: 150px; border-radius: 4px;">
                        <p class="small">Current image</p>
                    </div>
                @endif
                <div class="input-group">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image_{{ $blog->id }}" name="image" accept="image/*">
                    <label class="input-group-text" for="image_{{ $blog->id }}"><i class="ri-image-add-line"></i></label>
                </div>
                <small class="form-text text-muted">Upload a new blog image (max 2MB) or leave empty to keep the current one. Recommended size: 1200x630px.</small>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="invalid-feedback">Please select a valid image (JPG, PNG, or GIF under 2MB)</div>
                @enderror
            </div>
            
            <div class="mb-4 position-relative">
                <label for="details_{{ $blog->id }}" class="form-label">Blog Content <span class="text-danger">*</span></label>
                <textarea class="form-control @error('details') is-invalid @enderror" id="details_{{ $blog->id }}" name="details" rows="8" required>{{ $blog->details }}</textarea>
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
                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true" id="update-spinner-{{ $blog->id }}"></span>
                    <span>Update Blog</span>
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
    
    // Fetch the current form
    const currentForm = document.querySelector('#offcanvasUpdate{{ $blog->id }} .needs-validation');
    
    if (currentForm) {
        currentForm.addEventListener('submit', function (event) {
            if (!this.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                // Show loading spinner
                const spinner = document.getElementById('update-spinner-{{ $blog->id }}');
                if (spinner) {
                    spinner.classList.remove('d-none');
                }
                
                // Disable submit button to prevent multiple submissions
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.disabled = true;
                }
            }
            
            this.classList.add('was-validated');
        }, false);
    }
    
    // Image validation
    const imageInput = document.getElementById('image_{{ $blog->id }}');
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
