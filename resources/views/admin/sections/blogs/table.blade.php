<div class="overflow-hidden flex-1 d-flex">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="px-5 pt-5 container-fluid">
            <div class="row">
                <div class="mb-3 col-md-12 mb-md-4">
                    <div class="mb-0 card rounded-8">
                        <div class="card-header card-header-action">
                            <h6>Blogs
                                <span class="badge badge-sm badge-light ms-1">{{$blogs->count()}}</span>
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
                                <table id="datable_2" class="table mb-0 w-100">
                                    <thead>
                                        <tr>
                                            <th><span class="mb-0 form-check">
                                                <input type="checkbox" class="form-check-input check-select-all" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1"></label>
                                            </span></th>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th>Topic</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                        <tr>
                                            <td>
                                                <span class="mb-0 form-check">
                                                    <input type="checkbox" class="form-check-input check-select" data-id="{{ $blog->id }}" id="customCheck_{{ $blog->id }}">
                                                    <label class="form-check-label" for="customCheck_{{ $blog->id }}"></label>
                                                </span>
                                            </td>
                                            <td>{{ $blog->id }}</td>
                                            <td>
                                                @if($blog->getFirstMedia('images'))
                                                    <img src="{{ $blog->getFirstMediaUrl('images', 'thumb') }}" alt="{{ $blog->title }}" class="blog-image-preview" style="max-width: 200px; max-height: 200px;">
                                                @else
                                                    <div class="text-center rounded bg-light" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                        <i class="ri-image-line text-muted"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="blog-title">{{ $blog->title }}</div>
                                                <div class="blog-subtitle">{{ $blog->slug }}</div>
                                            </td>
                                            <td>{{ $blog->sub_title }}</td>
                                            <td>
                                                <span class="badge-topic">{{ $blog->topic->name }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdate{{ $blog->id }}" class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit">
                                                        <span class="icon"><span class="feather-icon"><i data-feather="edit"></i></span></span>
                                                    </button>
                                                    <button class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="modal" data-bs-target="#deleteModalgrid{{ $blog->id }}">
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
    </div>
</div>
