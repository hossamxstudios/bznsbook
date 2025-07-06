<div class="d-flex flex-1 overflow-hidden">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="container-fluid px-5 pt-5">
            <div class="row">
                <div class="col-md-12 mb-md-4 mb-3">
                    <div class="card rounded-8 mb-0">
                        <div class="card-header card-header-action">
                            <h6>Users And Roles <span class="badge badge-sm badge-light ms-1">{{$users->count()}}</span></h6>
                        </div>
                        <div class="card-body">
                            <div class="role-list-view">
                                <table id="datable_2" class="table nowrap w-100">
                                    <thead >
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr class="hover-row">
                                                <td style="background: white">
                                                    <button type="button" class="btn btn-link p-0 view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$user->id}}" title="View Details">
                                                            {{ $user->name }}
                                                    </button>
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown" style="margin-left: 30px">
                                                        <span class="icon">
                                                            <span class="feather-icon"><i data-feather="more-horizontal"></i></span>
                                                        </span>
                                                    </a>
                                                    <div role="menu" class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item delete-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#roleModal{{$user->id}}" >Edit User & Role</a>
                                                        <a class="dropdown-item delete-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{$user->id}}" >Delete User</a>
                                                    </div>
                                                </td>
                                                <td style="background: white">
                                                    {{ $user->email }}
                                                </td>
                                                <td style="background: white">
                                                    <span class="badge badge-soft-dark me-1" style="font-size: smaller;">
                                                        {{ $user->getRoleNames()->first() ?? 'N/A' }}
                                                    </span>
                                                </td>
                                                {{-- <td style="background: white">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#roleModal{{$user->id}}">
                                                        Set Role
                                                    </button> --}}
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
