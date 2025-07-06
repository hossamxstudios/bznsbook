<div class="d-flex flex-1 overflow-hidden">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="container-fluid px-5 pt-5">
            <div class="row">
                <div class="col-md-12 mb-md-4 mb-3">
                    <div class="card rounded-8 mb-0">
                        <div class="card-header card-header-action">
                            <h6>Tags
                                <span class="badge badge-sm badge-light ms-1">{{$tags->count()}}</span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="contact-list-view">
                                <table id="datable_2" class="table nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Tag Name</th>
                                            <th>Tag Type</th>
                                            <th>Created Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tags as $tag)
                                        <tr class="hover-row">
                                            <td style="background: white">{{ $tag->name }}
                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown">
                                                    <span class="icon">
                                                        <span class="feather-icon"><i data-feather="more-horizontal"></i></span>
                                                    </span>
                                                </a>
                                                <div role="menu" class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item edit-tasklist" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdate{{$tag->id}}">Edit</a>
                                                    <a class="dropdown-item delete-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#deleteModalgrid{{$tag->id}}">Delete</a>
                                                </div>
                                            </td>
                                            <td>{{ $tag->type }}</td>
                                            <td>{{ $tag->created_at }} </td>
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
