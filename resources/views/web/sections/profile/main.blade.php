<!-- Account details -->

        <div class="col-md-8 offset-lg-1 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
            <div class="ps-md-3 ps-lg-0 mt-md-2">
                <h1 class="pb-3 h2 pt-xl-1">{{ x_('Account Details', 'web') }}</h1>

                <!-- Display alerts at the top level -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Nav tabs -->
                <ul class="mb-4 nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="basic-tab" data-bs-toggle="tab" href="#basic" role="tab" aria-controls="basic" aria-selected="true">
                            <i class="bx bx-user me-2"></i>{{ x_('Basic Info', 'web') }}
                        </a>
                    </li>
                    @if(auth('client')->user()->is_company)
                    <li class="nav-item">
                        <a class="nav-link" id="company-tab" data-bs-toggle="tab" href="#company" role="tab" aria-controls="company" aria-selected="false">
                            <i class="bx bx-building me-2"></i>{{ x_('Company Info', 'web') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="company-documents-tab" data-bs-toggle="tab" href="#company-documents" role="tab" aria-controls="company-documents" aria-selected="false">
                            <i class="bx bx-file me-2"></i> {{ x_('Documents', 'web') }}
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="false">
                            <i class="bx bx-map me-2"></i>{{ x_('Address', 'web') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="social-tab" data-bs-toggle="tab" href="#social" role="tab" aria-controls="social" aria-selected="false">
                            <i class="bx bx-globe me-2"></i>{{ x_('Social Media', 'web') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="security-tab" data-bs-toggle="tab" href="#security" role="tab" aria-controls="security" aria-selected="false">
                            <i class="bx bx-lock-alt me-2"></i>{{ x_('Password', 'web') }}
                        </a>
                    </li>
                </ul>

                <!-- Tab content -->
                <div class="tab-content">
                    <!-- Basic info -->
                    <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab">
                        <form class="pb-3 needs-validation" action="{{ route('client.profile.update') }}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="row gy-3">
                                <!-- Cover Photo Upload -->
                                <div class="col-12 mb-4">
                                    <label for="cover_photo" class="form-label fs-base">{{ x_('Cover Photo', 'web') }}</label>
                                    <div class="cover-photo-container position-relative mb-3" style="height: 200px; background-color: #f8f9fa; border-radius: 0.5rem; overflow: hidden;">
                                        <div id="cover-preview" class="w-100 h-100 d-flex align-items-center justify-content-center">
                                            @if($user->hasMedia('cover'))
                                                <img src="{{ $user->getFirstMediaUrl('cover') }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ x_('Cover Photo', 'web') }}">
                                            @else
                                                <div class="text-center text-body-secondary">
                                                    <i class="bx bx-image fs-1"></i>
                                                    <p class="mb-0">{{ x_('No cover photo selected', 'web') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="position-absolute bottom-0 end-0 p-3">
                                            <button type="button" id="cover-upload-btn" class="btn btn-sm btn-light shadow-sm">
                                                <i class="bx bx-upload me-1"></i> {{ x_('Upload Cover', 'web') }}
                                            </button>
                                        </div>
                                    </div>
                                    <input type="file" id="cover_photo" name="cover_photo" class="form-control d-none" accept="image/*">
                                    @error('cover_photo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Profile Picture Upload -->
                                <div class="col-12 mb-4">
                                    <label for="profile_picture" class="form-label fs-base">{{ x_('Profile Picture', 'web') }}</label>
                                    <div class="d-flex align-items-center">
                                        <div class="profile-pic-container position-relative" style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; background-color: #f8f9fa;">
                                            <div id="profile-preview" class="w-100 h-100 d-flex align-items-center justify-content-center">
                                                @if($user->hasMedia('profile'))
                                                    <img src="{{ $user->getFirstMediaUrl('profile') }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ x_('Profile Picture', 'web') }}">
                                                @else
                                                    <i class="bx bx-user fs-1 text-body-secondary"></i>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="ms-4">
                                            <button type="button" id="profile-upload-btn" class="btn btn-sm btn-light shadow-sm mb-2">
                                                <i class="bx bx-upload me-1"></i> {{ x_('Upload Profile Picture', 'web') }}
                                            </button>
                                            <p class="small text-body-secondary mb-0">{{ x_('Recommended: Square image, at least 400x400 pixels', 'web') }}</p>
                                        </div>
                                    </div>
                                    <input type="file" id="profile_picture" name="profile_picture" class="form-control d-none" accept="image/*">
                                    @error('profile_picture')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 col-sm-12">
                                    <label for="name" class="form-label fs-base">{{ x_('Full Name', 'web') }}</label>
                                    <input type="text" id="name" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-sm-6">
                                    <label for="title" class="form-label fs-base">{{ x_('Title/Position', 'web') }} <small class="text-muted">{{ x_('(optional)', 'web') }}</small></label>
                                    <input type="text" id="title" name="title" class="form-control form-control-lg @error('title') is-invalid @enderror" value="{{ old('title', $user->title) }}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-sm-6">
                                    <label for="email" class="form-label fs-base">{{ x_('Email address', 'web') }}</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-sm-6">
                                    <label for="phone" class="form-label fs-base">{{ x_('Phone', 'web') }} <small class="text-muted">{{ x_('(optional)', 'web') }}</small></label>
                                    <input type="text" id="phone" name="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" value="{{ old('phone', $user->phone) }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-sm-6">
                                    <label for="is_company" class="form-label fs-base">{{ x_('Is Company', 'web') }}</label>
                                    <select id="is_company" name="is_company" class="form-select form-select-lg @error('is_company') is-invalid @enderror">
                                        <option value="0" {{ old('is_company', $user->is_company) == 0 ? 'selected' : '' }}>{{ x_('No', 'web') }}</option>
                                        <option value="1" {{ old('is_company', $user->is_company) == 1 ? 'selected' : '' }}>{{ x_('Yes', 'web') }}</option>
                                    </select>
                                    @error('is_company')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary">{{ x_('Save changes', 'web') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
                        <form class="pb-3 needs-validation" action="{{ route('client.profile.company.update') }}" method="POST" novalidate>
                            @csrf
                            <div class="row gy-3">
                                <div class="mb-4 col-sm-6">
                                    <label for="company_size" class="form-label fs-base">{{ x_('Company Size', 'web') }} <small class="text-muted">{{ x_('(optional)', 'web') }}</small></label>
                                    <select id="company_size" name="company_size" class="form-select form-select-lg @error('company_size') is-invalid @enderror">
                                        <option value="" {{ old('company_size', $user->company_size) == '' ? 'selected' : '' }}>{{ x_('Select company size', 'web') }}</option>
                                        <option value="1-10" {{ old('company_size', $user->company_size) == '1-10' ? 'selected' : '' }}>{{ x_('1-10 employees', 'web') }}</option>
                                        <option value="11-50" {{ old('company_size', $user->company_size) == '11-50' ? 'selected' : '' }}>{{ x_('11-50 employees', 'web') }}</option>
                                        <option value="51-200" {{ old('company_size', $user->company_size) == '51-200' ? 'selected' : '' }}>{{ x_('51-200 employees', 'web') }}</option>
                                        <option value="201-500" {{ old('company_size', $user->company_size) == '201-500' ? 'selected' : '' }}>{{ x_('201-500 employees', 'web') }}</option>
                                        <option value="501+" {{ old('company_size', $user->company_size) == '501+' ? 'selected' : '' }}>{{ x_('501+ employees', 'web') }}</option>
                                    </select>
                                    @error('company_size')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-sm-6">
                                    <label for="founding_year" class="form-label fs-base">{{ x_('Founding Year', 'web') }} <small class="text-muted">{{ x_('(optional)', 'web') }}</small></label>
                                    <input type="number" id="founding_year" name="founding_year" class="form-control form-control-lg @error('founding_year') is-invalid @enderror" value="{{ old('founding_year', $user->founding_year) }}">
                                    @error('founding_year')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 col-sm-6">
                                    <label for="is_decision_maker" class="form-label fs-base">{{ x_('Is Decision Maker', 'web') }} <small class="text-muted">{{ x_('(optional)', 'web') }}</small></label>
                                    <select id="is_decision_maker" name="is_decision_maker" class="form-select form-select-lg @error('is_decision_maker') is-invalid @enderror">
                                        <option value="0" {{ old('is_decision_maker', $user->is_decision_maker) == 0 ? 'selected' : '' }}>{{ x_('No', 'web') }}</option>
                                        <option value="1" {{ old('is_decision_maker', $user->is_decision_maker) == 1 ? 'selected' : '' }}>{{ x_('Yes', 'web') }}</option>
                                    </select>
                                    @error('is_decision_maker')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-sm-6">
                                    <label for="company_documents" class="form-label fs-base">{{ x_('Company Documents', 'web') }} <small class="text-muted">{{ x_('(optional)', 'web') }}</small></label>
                                    <input type="file" id="company_documents" name="company_documents[]" class="form-control form-control-lg @error('company_documents.0') is-invalid @enderror" multiple>
                                    @error('company_documents.0')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary">{{ x_('Save changes', 'web') }}</button>
                                </div>

                            </div>
                        </form>
                    </div>

                    <!-- Company Documents Tab -->
                    <div class="tab-pane fade" id="company-documents" role="tabpanel" aria-labelledby="company-documents-tab">
                        <div class="p-2">
                            <div class="mb-4 d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">{{ x_('Documents', 'web') }}</h5>
                                <form action="{{ route('client.profile.company.update') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                                    @csrf
                                    <div class="me-2">
                                        <input type="text" name="document_name" class="form-control me-2" placeholder="{{ x_('Document Name', 'web') }}" required style="min-width:150px;">
                                    </div>
                                    <div class="me-2">
                                        <input type="file" id="company_documents_upload" name="company_documents[]" class="form-control @error('company_documents.0') is-invalid @enderror" multiple required>
                                        @error('company_documents.0')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">{{ x_('Upload', 'web') }}</button>
                                </form>
                            </div>
                            @if($user->getMedia('company_documents')->count() > 0)
                                <div class="border-0 shadow-sm card">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>{{ x_('Document Name', 'web') }}</th>
                                                    <th>{{ x_('Size', 'web') }}</th>
                                                    <th>{{ x_('Date Uploaded', 'web') }}</th>
                                                    <th>{{ x_('Actions', 'web') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($user->getMedia('company_documents') as $document)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="p-2 text-white bg-dark rounded-circle me-3" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                                                    @if(\Illuminate\Support\Str::contains($document->mime_type, 'pdf'))
                                                                        <i class="bx bxs-file-pdf"></i>
                                                                    @elseif(\Illuminate\Support\Str::contains($document->mime_type, ['jpeg', 'jpg', 'png', 'gif']))
                                                                        <i class="bx bxs-file-image"></i>
                                                                    @elseif(\Illuminate\Support\Str::contains($document->mime_type, ['word', 'document']))
                                                                        <i class="bx bxs-file-doc"></i>
                                                                    @else
                                                                        <i class="bx bxs-file"></i>
                                                                    @endif
                                                                </div>
                                                                <div>{{ $document->getCustomProperty('display_name') ?: $document->file_name }}</div>
                                                            </div>
                                                        </td>
                                                        <td>{{ round($document->size / 1024, 2) }} KB</td>
                                                        <td>{{ $document->created_at->format('M d, Y') }}</td>
                                                        <td>
                                                            <div class="btn-group" role="group">
                                                                <a href="{{ $document->getUrl() }}" class="btn btn-sm btn-outline-primary" target="_blank"><i class="bx bx-show"></i> </a>
                                                                <a href="{{ $document->getUrl() }}" class="btn btn-sm btn-outline-secondary" download><i class="bx bx-download"></i> </a>
                                                                <form action="{{ route('client.profile.company.document.delete', $document->id) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ x_('Are you sure you want to delete this document?', 'web') }}')"><i class="bx bx-trash"></i> </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    <i class="bx bx-info-circle me-2"></i> {{ x_('No documents have been uploaded yet. Use the form above to upload company documents.', 'web') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                        <form class="needs-validation" action="{{ route('client.address.update') }}" method="POST" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="row gy-3">
                                <div class="mb-4 col-sm-6">
                                    <label for="country" class="form-label fs-base">{{ x_('Country', 'web') }} <small class="text-muted">{{ x_('(optional)', 'web') }}</small></label>
                                    <input type="text" id="country" name="country" class="form-control form-control-lg @error('country') is-invalid @enderror" value="{{ old('country', $user->country) }}">
                                    @error('country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-sm-6">
                                    <label for="city" class="form-label fs-base">{{ x_('City', 'web') }} <small class="text-muted">{{ x_('(optional)', 'web') }}</small></label>
                                    <input type="text" id="city" name="city" class="form-control form-control-lg @error('city') is-invalid @enderror" value="{{ old('city', $user->city) }}">
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-sm-6">
                                    <label for="zip" class="form-label fs-base">{{ x_('ZIP code', 'web') }} <small class="text-muted">{{ x_('(optional)', 'web') }}</small></label>
                                    <input type="text" id="zip" name="zip" class="form-control form-control-lg @error('zip') is-invalid @enderror" value="{{ old('zip', $user->zip) }}">
                                    @error('zip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-sm-6">
                                    <label for="map" class="form-label fs-base">{{ x_('Map URL', 'web') }} <small class="text-muted">{{ x_('(optional)', 'web') }}</small></label>
                                    <input type="text" id="map" name="map" class="form-control form-control-lg @error('map') is-invalid @enderror" value="{{ old('map', $user->map) }}">
                                    @error('map')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-12">
                                    <label for="address" class="form-label fs-base">{{ x_('Address', 'web') }} <small class="text-muted">{{ x_('(optional)', 'web') }}</small></label>
                                    <input type="text" id="address" name="address" class="form-control form-control-lg @error('address') is-invalid @enderror" value="{{ old('address', $user->address) }}">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary">{{ x_('Save changes', 'web') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Social Links -->
                    <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                        <form class="needs-validation" action="{{ route('client.social.update') }}" method="POST" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="row gy-3">
                                <div class="mb-4 col-sm-6">
                                    <label for="website" class="form-label fs-base">{{ x_('Website', 'web') }} <small class="text-muted">{{ x_('(optional)', 'web') }}</small></label>
                                    <input type="url" id="website" name="website" class="form-control form-control-lg @error('website') is-invalid @enderror" value="{{ old('website', $user->website) }}">
                                    @error('website')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-sm-6">
                                    <label for="facebook" class="form-label fs-base">{{ x_('Facebook', 'web') }} <small class="text-muted">{{ x_('(optional)', 'web') }}</small></label>
                                    <input type="url" id="facebook" name="facebook" class="form-control form-control-lg @error('facebook') is-invalid @enderror" value="{{ old('facebook', $user->facebook) }}">
                                    @error('facebook')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-sm-6">
                                    <label for="linkedin" class="form-label fs-base">{{ x_('LinkedIn', 'web') }} <small class="text-muted">{{ x_('(optional)', 'web') }}</small></label>
                                    <input type="url" id="linkedin" name="linkedin" class="form-control form-control-lg @error('linkedin') is-invalid @enderror" value="{{ old('linkedin', $user->linkedin) }}">
                                    @error('linkedin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-sm-6">
                                    <label for="instagram" class="form-label fs-base">{{ x_('Instagram', 'web') }} <small class="text-muted">{{ x_('(optional)', 'web') }}</small></label>
                                    <input type="url" id="instagram" name="instagram" class="form-control form-control-lg @error('instagram') is-invalid @enderror" value="{{ old('instagram', $user->instagram) }}">
                                    @error('instagram')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-sm-6">
                                    <label for="youtube" class="form-label fs-base">{{ x_('YouTube', 'web') }} <small class="text-muted">{{ x_('(optional)', 'web') }}</small></label>
                                    <input type="url" id="youtube" name="youtube" class="form-control form-control-lg @error('youtube') is-invalid @enderror" value="{{ old('youtube', $user->youtube) }}">
                                    @error('youtube')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary">{{ x_('Save changes', 'web') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Security -->
                    <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                        <div class="mb-4">
                            <h5>{{ x_('Change Password', 'web') }}</h5>
                            <form class="needs-validation" action="{{ route('client.password.update') }}" method="POST" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="row gy-3">
                                    <div class="mb-4 col-12">
                                        <label for="current_password" class="form-label fs-base">{{ x_('Current Password', 'web') }}</label>
                                        <div class="password-toggle">
                                            <input type="password" id="current_password" name="current_password" class="form-control form-control-lg @error('current_password') is-invalid @enderror" required>
                                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                                <input class="password-toggle-check" type="checkbox">
                                                <span class="password-toggle-indicator"></span>
                                            </label>
                                        </div>
                                        @error('current_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4 col-sm-6">
                                        <label for="password" class="form-label fs-base">{{ x_('New Password', 'web') }}</label>
                                        <div class="password-toggle">
                                            <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required>
                                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                                <input class="password-toggle-check" type="checkbox">
                                                <span class="password-toggle-indicator"></span>
                                            </label>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4 col-sm-6">
                                        <label for="password_confirmation" class="form-label fs-base">{{ x_('Confirm New Password', 'web') }}</label>
                                        <div class="password-toggle">
                                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" required>
                                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                                <input class="password-toggle-check" type="checkbox">
                                                <span class="password-toggle-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-primary">{{ x_('Update Password', 'web') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="mt-5">
                            <h5 class="text-danger">{{ x_('Delete account', 'web') }}</h5>
                            <p>{{ x_('When you delete your account, your public profile will be deactivated immediately. If you change your mind before the 14 days are up, sign in with your email and password, and we\'ll send you a link to reactivate your account.', 'web') }}</p>
                            <form action="{{ route('client.account.delete') }}" method="POST" onsubmit="return confirm('{{ x_("Are you sure you want to delete your account? This action cannot be undone.", "web") }}');">
                                @csrf
                                @method('DELETE')
                                <div class="mb-4 form-check">
                                    <input type="checkbox" id="delete-account" name="confirm_delete" class="form-check-input" required>
                                    <label for="delete-account" class="form-check-label fs-base">{{ x_('Yes, I want to delete my account', 'web') }}</label>
                                </div>
                                <button type="submit" class="btn btn-danger">{{ x_('Delete Account', 'web') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
