@foreach($companies as $company)
    <!-- Services Offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="servicesModal{{ $company->id }}" aria-labelledby="servicesOffcanvasLabel{{ $company->id }}" style="width:870px;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="servicesOffcanvasLabel{{ $company->id }}">Manage Sections for {{ $company->name }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="{{ route('company.services.update', $company->id) }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $company->id }}">
                <div class="mb-3 form-group">
                    <label class="form-label">Select Services</label>
                    <select class="form-control select2" name="services[]" multiple="multiple" required>
                        @foreach(\App\Models\Section::all() as $section)
                            <option value="{{ $section->id }}" {{ $company->sections->contains($section->id) ? 'selected' : '' }}>
                                {{ $section->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="offcanvas">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
@endforeach
