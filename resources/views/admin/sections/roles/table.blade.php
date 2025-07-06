<div class="d-flex flex-1 overflow-hidden">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="container-fluid px-5 pt-5">
            <div class="row">
                <div class="col-md-12 mb-md-4 mb-3">
                    <div class="card rounded-8 mb-0">
                        <div class="card-header card-header-action">
                            <h6>Roles And Permissions <span class="badge badge-sm badge-light ms-1">{{$roles->count()}}</span></h6>
                        </div>
                        <div class="card-body">
                            <div class="role-list-view">
                                <table id="datable_2" class="table nowrap w-100">
                                    <thead >
                                        <tr>
                                            <th>Name</th>
                                            <th>Permissions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr class="hover-row">
                                                <td style="background: white">
                                                    <button type="button" class="btn btn-link p-0 view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$role->id}}" title="View Details">
                                                            {{ $role->name }}
                                                    </button>
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown" style="margin-left: 30px">
                                                        <span class="icon">
                                                            <span class="feather-icon"><i data-feather="more-horizontal"></i></span>
                                                        </span>
                                                    </a>
                                                    <div role="menu" class="dropdown-menu dropdown-menu-end">
                                                        <a href="{{ route('roles.update_view', ['id' => $role->id]) }}" class="dropdown-item">Edit</a>
                                                        <a class="dropdown-item delete-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#deleteModalgrid{{$role->id}}" >Delete</a>
                                                    </div>
                                                </td>
                                                @php
                                                    $count = 0;
                                                @endphp
                                                <td style="background: white">
                                                    @foreach ($role->permissions as $permission)
                                                        <span class="badge badge-soft-dark me-1 m-2" style="font-size: smaller;">{{ $permission->title }}</span>
                                                        {{-- create an if check if the counter in 3 add br and make the counter =0 --}}
                                                        @php
                                                            $count++;
                                                        @endphp
                                                        @if ($count == 8)
                                                            <br>
                                                            @php
                                                                $count = 0;
                                                            @endphp
                                                        @endif
                                                        
                                                        @endforeach
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
