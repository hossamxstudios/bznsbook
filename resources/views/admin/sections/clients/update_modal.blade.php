<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdate{{$client->id}}" aria-labelledby="offcanvasUpdateLabel" style="width:800px;">
    <div class="offcanvas-header">
        <h5 id="offcanvasUpdateLabel" class="mb-0">{{ x_('Edit Client', 'clients') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('clients.update', $client->id) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div class="pt-0 card-body">
                <!-- Basic Information -->
                <div class="mb-4">
                    <h6 class="mb-3 text-primary"><i class="ri-user-3-line me-2"></i>{{ x_('Basic Information', 'clients') }}</h6>
                    <div class="row gx-3">
                        <div class="mb-3 col-sm-6 form-group">
                            <label class="form-label" for="name">{{ x_('Name', 'clients') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $client->name) }}" placeholder="{{ x_('Client name', 'clients') }}" required>
                            <div class="invalid-tooltip">
                                @error('name')
                                    {{ $message }}
                                @else
                                    {{ x_('Please enter the client name', 'clients') }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-sm-6 form-group">
                            <label class="form-label" for="title">{{ x_('Title/Position', 'clients') }}</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $client->title) }}" placeholder="{{ x_('Title or position', 'clients') }}">
                            <div class="invalid-tooltip">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-sm-6 form-group">
                            <label class="form-label" for="email">{{ x_('Email', 'clients') }} <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $client->email) }}" placeholder="client@example.com" required>
                            <div class="invalid-tooltip">
                                @error('email')
                                    {{ $message }}
                                @else
                                    {{ x_('Please enter a valid email address', 'clients') }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-sm-6 form-group">
                            <label class="form-label" for="phone">{{ x_('Phone Number', 'clients') }}</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $client->phone) }}" placeholder="{{ x_('Phone number', 'clients') }}">
                            <div class="invalid-tooltip">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-sm-6 form-group">
                            <label class="form-label" for="company_size">{{ x_('Company Size', 'clients') }}</label>
                            <select class="form-select @error('company_size') is-invalid @enderror" id="company_size" name="company_size">
                                <option value="" {{ old('company_size', $client->company_size) == '' ? 'selected' : '' }}>{{ x_('Select company size', 'clients') }}</option>
                                <option value="1-10" {{ old('company_size', $client->company_size) == '1-10' ? 'selected' : '' }}>{{ x_('1-10 employees', 'clients') }}</option>
                                <option value="11-50" {{ old('company_size', $client->company_size) == '11-50' ? 'selected' : '' }}>{{ x_('11-50 employees', 'clients') }}</option>
                                <option value="51-200" {{ old('company_size', $client->company_size) == '51-200' ? 'selected' : '' }}>{{ x_('51-200 employees', 'clients') }}</option>
                                <option value="201-500" {{ old('company_size', $client->company_size) == '201-500' ? 'selected' : '' }}>{{ x_('201-500 employees', 'clients') }}</option>
                                <option value="501-1000" {{ old('company_size', $client->company_size) == '501-1000' ? 'selected' : '' }}>{{ x_('501-1000 employees', 'clients') }}</option>
                                <option value="1000+" {{ old('company_size', $client->company_size) == '1000+' ? 'selected' : '' }}>{{ x_('1000+ employees', 'clients') }}</option>
                            </select>
                            <div class="invalid-tooltip">
                                @error('company_size')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-sm-6 form-group">
                            <label class="form-label" for="is_active">{{ x_('Status', 'clients') }}</label>
                            <select class="form-select @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                                <option value="1" {{ old('is_active', $client->is_active) == 1 ? 'selected' : '' }}>{{ x_('Active', 'clients') }}</option>
                                <option value="0" {{ old('is_active', $client->is_active) == 0 ? 'selected' : '' }}>{{ x_('Inactive', 'clients') }}</option>
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
                    <h6 class="mb-3 text-primary"><i class="ri-map-pin-2-line me-2"></i>{{ x_('Address Information', 'clients') }}</h6>
                    <div class="row gx-3">
                        <div class="mb-3 col-12 form-group">
                            <label class="form-label" for="address">{{ x_('Address', 'clients') }}</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="2" placeholder="{{ x_('Full address', 'clients') }}">{{ old('address', $client->address) }}</textarea>
                            <div class="invalid-tooltip">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-sm-4 form-group">
                            <label class="form-label" for="country">{{ x_('Country', 'clients') }}</label>
                            <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country', $client->country) }}" placeholder="{{ x_('Country', 'clients') }}">
                            <div class="invalid-tooltip">
                                @error('country')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-sm-4 form-group">
                            <label class="form-label" for="city">{{ x_('City', 'clients') }}</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city', $client->city) }}" placeholder="{{ x_('City', 'clients') }}">
                            <div class="invalid-tooltip">
                                @error('city')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-sm-4 form-group">
                            <label class="form-label" for="zip">{{ x_('ZIP Code', 'clients') }}</label>
                            <input type="text" class="form-control @error('zip') is-invalid @enderror" id="zip" name="zip" value="{{ old('zip', $client->zip) }}" placeholder="{{ x_('ZIP code', 'clients') }}">
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
                    <h6 class="mb-3 text-primary"><i class="ri-global-line me-2"></i>{{ x_('Online Presence', 'clients') }}</h6>
                    <div class="row gx-3">
                        <div class="mb-3 col-12 form-group">
                            <label class="form-label" for="website">{{ x_('Website', 'clients') }}</label>
                            <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website', $client->website) }}" placeholder="https://example.com">
                            <div class="invalid-tooltip">
                                @error('website')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-sm-6 form-group">
                            <label class="form-label" for="facebook">{{ x_('Facebook', 'clients') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ri-facebook-fill"></i></span>
                                <input type="url" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ old('facebook', $client->facebook) }}" placeholder="https://facebook.com/profile">
                                <div class="invalid-tooltip">
                                    @error('facebook')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-sm-6 form-group">
                            <label class="form-label" for="linkedin">{{ x_('LinkedIn', 'clients') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ri-linkedin-fill"></i></span>
                                <input type="url" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" name="linkedin" value="{{ old('linkedin', $client->linkedin) }}" placeholder="https://linkedin.com/in/profile">
                                <div class="invalid-tooltip">
                                    @error('linkedin')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-sm-6 form-group">
                            <label class="form-label" for="instagram">{{ x_('Instagram', 'clients') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ri-instagram-fill"></i></span>
                                <input type="url" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ old('instagram', $client->instagram) }}" placeholder="https://instagram.com/profile">
                                <div class="invalid-tooltip">
                                    @error('instagram')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-sm-6 form-group">
                            <label class="form-label" for="youtube">{{ x_('YouTube', 'clients') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ri-youtube-fill"></i></span>
                                <input type="url" class="form-control @error('youtube') is-invalid @enderror" id="youtube" name="youtube" value="{{ old('youtube', $client->youtube) }}" placeholder="https://youtube.com/channel">
                                <div class="invalid-tooltip">
                                    @error('youtube')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5 d-flex justify-content-end">
                    <button type="button" class="btn btn-soft-secondary me-2" data-bs-dismiss="offcanvas">{{ x_('Cancel', 'clients') }}</button>
                    <button type="submit" class="btn btn-primary">{{ x_('Update Client', 'clients') }}</button>
                </div>
            </div>
        </form>
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
})()
</script>
