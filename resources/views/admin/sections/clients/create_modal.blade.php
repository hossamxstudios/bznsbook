<div class="modal fade" id="createClientModal" tabindex="-1" role="dialog" aria-labelledby="createClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createClientModalLabel">{{ x_('Add New Client', 'clients') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addClientForm" action="{{ route('clients.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf

                    <!-- Basic Information -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3"><i class="ri-user-3-line me-2"></i>{{ x_('Basic Information', 'clients') }}</h6>
                        <div class="row gx-3">
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="name">{{ x_('Name', 'clients') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="{{ x_('Client name', 'clients') }}" required>
                                <div class="invalid-tooltip">
                                    @error('name')
                                        {{ $message }}
                                    @else
                                        {{ x_('Please enter the client name', 'clients') }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="title">{{ x_('Title/Position', 'clients') }}</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="{{ x_('Title or position', 'clients') }}">
                                <div class="invalid-tooltip">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="email">{{ x_('Email', 'clients') }} <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="client@example.com" required>
                                <div class="invalid-tooltip">
                                    @error('email')
                                        {{ $message }}
                                    @else
                                        {{ x_('Please enter a valid email address', 'clients') }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="password">{{ x_('Password', 'clients') }} <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ x_('Enter password', 'clients') }}" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="ri-eye-line" id="togglePasswordIcon"></i>
                                    </button>
                                    <div class="invalid-tooltip">
                                        @error('password')
                                            {{ $message }}
                                        @else
                                            {{ x_('Please enter a password', 'clients') }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="password_confirmation">{{ x_('Confirm Password', 'clients') }} <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{ x_('Confirm password', 'clients') }}" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="ri-eye-line" id="toggleConfirmPasswordIcon"></i>
                                    </button>
                                    <div class="invalid-tooltip">
                                        {{ x_('Passwords do not match', 'clients') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="phone">{{ x_('Phone Number', 'clients') }}</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="{{ x_('Phone number', 'clients') }}">
                                <div class="invalid-tooltip">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="company_size">{{ x_('Company Size', 'clients') }}</label>
                                <select class="form-select @error('company_size') is-invalid @enderror" id="company_size" name="company_size">
                                    <option value="" selected>{{ x_('Select company size', 'clients') }}</option>
                                    <option value="1-10" {{ old('company_size') == '1-10' ? 'selected' : '' }}>{{ x_('1-10 employees', 'clients') }}</option>
                                    <option value="11-50" {{ old('company_size') == '11-50' ? 'selected' : '' }}>{{ x_('11-50 employees', 'clients') }}</option>
                                    <option value="51-200" {{ old('company_size') == '51-200' ? 'selected' : '' }}>{{ x_('51-200 employees', 'clients') }}</option>
                                    <option value="201-500" {{ old('company_size') == '201-500' ? 'selected' : '' }}>{{ x_('201-500 employees', 'clients') }}</option>
                                    <option value="501-1000" {{ old('company_size') == '501-1000' ? 'selected' : '' }}>{{ x_('501-1000 employees', 'clients') }}</option>
                                    <option value="1000+" {{ old('company_size') == '1000+' ? 'selected' : '' }}>{{ x_('1000+ employees', 'clients') }}</option>
                                </select>
                                <div class="invalid-tooltip">
                                    @error('company_size')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="is_active">{{ x_('Status', 'clients') }}</label>
                                <select class="form-select @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                                    <option value="1" selected>{{ x_('Active', 'clients') }}</option>
                                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>{{ x_('Inactive', 'clients') }}</option>
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
                        <h6 class="text-primary mb-3"><i class="ri-map-pin-2-line me-2"></i>{{ x_('Address Information', 'clients') }}</h6>
                        <div class="row gx-3">
                            <div class="col-12 form-group mb-3">
                                <label class="form-label" for="address">{{ x_('Address', 'clients') }}</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="2" placeholder="{{ x_('Full address', 'clients') }}">{{ old('address') }}</textarea>
                                <div class="invalid-tooltip">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 form-group mb-3">
                                <label class="form-label" for="country">{{ x_('Country', 'clients') }}</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country') }}" placeholder="{{ x_('Country', 'clients') }}">
                                <div class="invalid-tooltip">
                                    @error('country')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 form-group mb-3">
                                <label class="form-label" for="city">{{ x_('City', 'clients') }}</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}" placeholder="{{ x_('City', 'clients') }}">
                                <div class="invalid-tooltip">
                                    @error('city')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 form-group mb-3">
                                <label class="form-label" for="zip">{{ x_('ZIP Code', 'clients') }}</label>
                                <input type="text" class="form-control @error('zip') is-invalid @enderror" id="zip" name="zip" value="{{ old('zip') }}" placeholder="{{ x_('ZIP code', 'clients') }}">
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
                        <h6 class="text-primary mb-3"><i class="ri-global-line me-2"></i>{{ x_('Online Presence', 'clients') }}</h6>
                        <div class="row gx-3">
                            <div class="col-12 form-group mb-3">
                                <label class="form-label" for="website">{{ x_('Website', 'clients') }}</label>
                                <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website') }}" placeholder="https://example.com">
                                <div class="invalid-tooltip">
                                    @error('website')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <label class="form-label" for="facebook">{{ x_('Facebook', 'clients') }}</label>
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
                                <label class="form-label" for="linkedin">{{ x_('LinkedIn', 'clients') }}</label>
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
                                <label class="form-label" for="instagram">{{ x_('Instagram', 'clients') }}</label>
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
                                <label class="form-label" for="youtube">{{ x_('YouTube', 'clients') }}</label>
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
                        <button type="button" class="btn btn-soft-secondary me-2" data-bs-dismiss="modal">{{ x_('Cancel', 'clients') }}</button>
                        <button type="submit" class="btn btn-primary">{{ x_('Create Client', 'clients') }}</button>
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
            confirmPassword.setCustomValidity('{{ x_('Passwords do not match', 'clients') }}')
        } else {
            confirmPassword.setCustomValidity('')
        }
    })

    password.addEventListener('input', function() {
        if (confirmPassword.value && password.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity('{{ x_('Passwords do not match', 'clients') }}')
        } else {
            confirmPassword.setCustomValidity('')
        }
    })
})()
</script>
