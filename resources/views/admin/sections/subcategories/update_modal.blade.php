<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEdit{{ $subcategory->id }}" data-bs-scroll="true" data-bs-backdrop="false" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Edit Subcategory: {{ $subcategory->name }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="row gx-3">
                <div class="col-sm-12 form-group position-relative mb-3">
                    <label class="form-label">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $subcategory->name }}" required/>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="invalid-feedback">Please enter a subcategory name</div>
                    @enderror
                </div>
                
                <div class="col-sm-12 form-group position-relative mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" required>
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="invalid-feedback">Please select a category</div>
                    @enderror
                </div>
                
                <div class="col-sm-12 form-group position-relative mb-3">
                    <label class="form-label">Details</label>
                    <textarea class="form-control @error('details') is-invalid @enderror" name="details" rows="3">{{ $subcategory->details }}</textarea>
                    @error('details')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Update</button>
        </form>
    </div>
</div>
