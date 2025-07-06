<div class="overflow-hidden flex-1 d-flex">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="px-5 pt-5 container-fluid">
            <div class="row">
                <div class="mb-3 col-md-12 mb-md-4">
                    <div class="mb-0 card rounded-8">
                        <div class="card-header card-header-action">
                            <h6>Sections
                                <span class="badge badge-sm badge-light ms-1">{{$sections->count()}}</span>
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
                            <div class="contact-list-view">
                                <table id="datable_2" class="table nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Icon</th>
                                            <th>Name</th>
                                            <th>Details</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sections as $section)
                                        <tr class="hover-row">
                                            <td style="width: 80px;">
                                                @if($section->getFirstMedia('icons'))
                                                    <img src="{{ $section->getFirstMediaUrl('icons') }}" alt="{{ $section->name }} Icon" class="img-fluid" style="max-width: 50px; max-height: 50px;">
                                                @else
                                                    <div class="text-center rounded bg-light" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                        <i class="ri-image-line text-muted"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td style="background: white">
                                                {{ $section->name }}
                                                {{-- <button type="button" class="p-0 btn btn-link view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$industry->id}}" title="View Details">
                                                    <span class="feather-icon">
                                                        <i data-feather="eye"></i>
                                                    </span>
                                                </button> --}}
                                            </td>
                                            <td>{{ $section->details }}</td>
                                            <td>
                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown">
                                                    <span class="icon">
                                                        <span class="feather-icon"><i data-feather="more-horizontal"></i></span>
                                                    </span>
                                                </a>
                                                <div role="menu" class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item edit-tasklist" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdate{{$section->id}}">Edit</a>
                                                    <a class="dropdown-item delete-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#deleteModalgrid{{$section->id}}">Delete</a>
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
