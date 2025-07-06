{{-- <div class="overflow-hidden flex-1 d-flex"> --}}
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="px-5 pt-1 container-fluid">
            <div class="row">
                <div class="mb-3 col-md-12 mb-md-4">
                    <div class="mb-0 card rounded-8">
                        <div class="card-header card-header-action">
                            <h6>Sub Categories
                                <span class="badge badge-sm badge-light ms-1">{{$subcategories->count()}}</span>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success alert-wth-icon fade show" role="alert">
                                <span class="alert-icon-wrap"><i class="ri-check-line"></i></span>
                                <span>{{ session('success') }}</span>
                            </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger alert-wth-icon fade show" role="alert">
                                <span class="alert-icon-wrap"><i class="ri-close-line"></i></span>
                                <span>{{ session('error') }}</span>
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table id="datable_2" class="table mb-0 nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th><span class="mb-0 form-check">
                                            <input type="checkbox" class="form-check-input check-select-all" id="customCheck1">
                                            <label class="form-check-label" for="customCheck1"></label>
                                        </span></th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Category</th>
                                        <th>Details</th>
                                        <th>Clients</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategories as $subcategory)
                                    <tr>
                                        <td>
                                            <span class="mb-0 form-check">
                                                <input type="checkbox" class="form-check-input check-select" id="customCheck_{{ $subcategory->id }}">
                                                <label class="form-check-label" for="customCheck_{{ $subcategory->id }}"></label>
                                            </span>
                                        </td>
                                        <td>{{ $subcategory->id }}</td>
                                        <td>
                                            <div class="text-dark">{{ $subcategory->name }}</div>
                                        </td>
                                        <td>{{ $subcategory->slug }}</td>
                                        <td>{{ $subcategory->category->name ?? 'N/A' }}</td>
                                        <td>{{ $subcategory->details ?? 'N/A' }}</td>
                                        <td>{{ $subcategory->clients->count() }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasEdit{{ $subcategory->id }}" class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit">
                                                    <span class="icon"><span class="feather-icon"><i data-feather="edit"></i></span></span>
                                                </button>
                                                <button class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="modal" data-bs-target="#delete_{{ $subcategory->id }}">
                                                    <span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}
