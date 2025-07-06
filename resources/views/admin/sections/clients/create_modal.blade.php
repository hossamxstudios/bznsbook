<div class="modal fade" id="createClientModal" tabindex="-1" role="dialog" aria-labelledby="createClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createClientModalLabel">Add New Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addClientForm" action="{{ route('clients.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    
                    <!-- Basic Information -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3"><i class="ri-user-3-line me-2"></i>Basic Information</h6>
                        <div class="row gx-3">
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Client name" required>
                                <div class="invalid-tooltip">
                                    @error('name')
                                        {{ $message }}
                                    @else
                                        Please enter the client name
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="title">Title/Position</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Title or position">
                                <div class="invalid-tooltip">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="client@example.com" required>
                                <div class="invalid-tooltip">
                                    @error('email')
                                        {{ $message }}
                                    @else
                                        Please enter a valid email address
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="ri-eye-line" id="togglePasswordIcon"></i>
                                    </button>
                                    <div class="invalid-tooltip">
                                        @error('password')
                                            {{ $message }}
                                        @else
                                            Please enter a password
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="ri-eye-line" id="toggleConfirmPasswordIcon"></i>
                                    </button>
                                    <div class="invalid-tooltip">
                                        Passwords do not match
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone number">
                                <div class="invalid-tooltip">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="company_size">Company Size</label>
                                <select class="form-select @error('company_size') is-invalid @enderror" id="company_size" name="company_size">
                                    <option value="" selected>Select company size</option>
                                    <option value="1-10" {{ old('company_size') == '1-10' ? 'selected' : '' }}>1-10 employees</option>
                                    <option value="11-50" {{ old('company_size') == '11-50' ? 'selected' : '' }}>11-50 employees</option>
                                    <option value="51-200" {{ old('company_size') == '51-200' ? 'selected' : '' }}>51-200 employees</option>
                                    <option value="201-500" {{ old('company_size') == '201-500' ? 'selected' : '' }}>201-500 employees</option>
                                    <option value="501-1000" {{ old('company_size') == '501-1000' ? 'selected' : '' }}>501-1000 employees</option>
                                    <option value="1000+" {{ old('company_size') == '1000+' ? 'selected' : '' }}>1000+ employees</option>
                                </select>
                                <div class="invalid-tooltip">
                                    @error('company_size')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="is_active">Status</label>
                                <select class="form-select @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                                    <option value="1" selected>Active</option>
                                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                <div class="invalid-tooltip">
                                    @error('is_active')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Address Information -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3"><i class="ri-map-pin-2-line me-2"></i>Address Information</h6>
                        <div class="row gx-3">
                            <div class="col-12 form-group mb-3">
                                <label class="form-label" for="address">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="2" placeholder="Full address">{{ old('address') }}</textarea>
                                <div class="invalid-tooltip">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 form-group mb-3">
                                <label class="form-label" for="country">Country</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country') }}" placeholder="Country">
                                <div class="invalid-tooltip">
                                    @error('country')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 form-group mb-3">
                                <label class="form-label" for="city">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}" placeholder="City">
                                <div class="invalid-tooltip">
                                    @error('city')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 form-group mb-3">
                                <label class="form-label" for="zip">ZIP Code</label>
                                <input type="text" class="form-control @error('zip') is-invalid @enderror" id="zip" name="zip" value="{{ old('zip') }}" placeholder="ZIP code">
                                <div class="invalid-tooltip">
                                    @error('zip')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3"><i class="ri-global-line me-2"></i>Online Presence</h6>
                        <div class="row gx-3">
                            <div class="col-12 form-group mb-3">
                                <label class="form-label" for="website">Website</label>
                                <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website') }}" placeholder="https://example.com">
                                <div class="invalid-tooltip">
                                    @error('website')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="facebook">Facebook</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ri-facebook-fill"></i></span>
                                    <input type="url" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ old('facebook') }}" placeholder="https://facebook.com/profile">
                                    <div class="invalid-tooltip">
                                        @error('facebook')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="linkedin">LinkedIn</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ri-linkedin-fill"></i></span>
                                    <input type="url" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" name="linkedin" value="{{ old('linkedin') }}" placeholder="https://linkedin.com/in/profile">
                                    <div class="invalid-tooltip">
                                        @error('linkedin')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="instagram">Instagram</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ri-instagram-fill"></i></span>
                                    <input type="url" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ old('instagram') }}" placeholder="https://instagram.com/profile">
                                    <div class="invalid-tooltip">
                                        @error('instagram')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="youtube">YouTube</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ri-youtube-fill"></i></span>
                                    <input type="url" class="form-control @error('youtube') is-invalid @enderror" id="youtube" name="youtube" value="{{ old('youtube') }}" placeholder="https://youtube.com/channel">
                                    <div class="invalid-tooltip">
                                        @error('youtube')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-5">
                        <button type="button" class="btn btn-soft-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create Client</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Enable Bootstrap form validation
(function () {
    'use strict'
    
    // Fetch all forms we want to apply validation styles to
    const forms = document.querySelectorAll('.needs-validation')
    
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            
            form.classList.add('was-validated')
        }, false)
    })
    
    // Password visibility toggles
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password')
        const icon = document.getElementById('togglePasswordIcon')
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text'
            icon.classList.remove('ri-eye-line')
            icon.classList.add('ri-eye-off-line')
        } else {
            passwordInput.type = 'password'
            icon.classList.remove('ri-eye-off-line')
            icon.classList.add('ri-eye-line')
        }
    })
    
    document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
        const confirmPasswordInput = document.getElementById('password_confirmation')
        const icon = document.getElementById('toggleConfirmPasswordIcon')
        
        if (confirmPasswordInput.type === 'password') {
            confirmPasswordInput.type = 'text'
            icon.classList.remove('ri-eye-line')
            icon.classList.add('ri-eye-off-line')
        } else {
            confirmPasswordInput.type = 'password'
            icon.classList.remove('ri-eye-off-line')
            icon.classList.add('ri-eye-line')
        }
    })
    
    // Password matching validation
    const password = document.getElementById('password')
    const confirmPassword = document.getElementById('password_confirmation')
    
    confirmPassword.addEventListener('input', function() {
        if (password.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity('Passwords do not match')
        } else {
            confirmPassword.setCustomValidity('')
        }
    })
    
    password.addEventListener('input', function() {
        if (confirmPassword.value && password.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity('Passwords do not match')
        } else {
            confirmPassword.setCustomValidity('')
        }
    })
})()
</script>
