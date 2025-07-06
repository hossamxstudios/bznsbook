<div class="overflow-hidden flex-1 d-flex">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="px-5 pt-5 container-fluid">
            <div class="row">
                <div class="mb-3 col-md-12 mb-md-4">
                    <div class="mb-0 card rounded-8">
                        <div class="card-header card-header-action">
                            <h6>Topics
                                <span class="badge badge-sm badge-light ms-1">{{$topics->count()}}</span>
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
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Blogs Count</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($topics as $topic)
                                        <tr class="hover-row">
                                            <td style="background: white">
                                                {{ $topic->name }}
                                            </td>
                                            <td>{{ $topic->slug }}</td>
                                            <td>{{ $topic->blogs->count() }}</td>
                                            <td>
                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown">
                                                    <span class="icon">
                                                        <span class="feather-icon"><i data-feather="more-horizontal"></i></span>
                                                    </span>
                                                </a>
                                                <div role="menu" class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item edit-tasklist" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdate{{$topic->id}}">Edit</a>
                                                    <a class="dropdown-item delete-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#deleteModalgrid{{$topic->id}}">Delete</a>
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
