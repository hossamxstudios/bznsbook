<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasShow{{ $role->id }}"
    aria-labelledby="offcanvasShowLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasShowLabel" style="color:aliceblue">{{ $role->name }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" style="background: #f5f8fa;">
        <div class="mb-3 text-capitalize">
            <p style="font-weight: bold; font-size: 2em; display:inline-block"> {{ $role->name }}</p>

        </div>
        <div class="mb-3">
            <ul class="nav nav-tabs nav-icon nav-light">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#permission{{$role->id}}">
                        <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="check-circle"></i></span></span>
                        <span class="nav-link-text">Permissions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#user{{$role->id}}">
                        <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="file-text"></i></span></span>
                        <span class="nav-link-text">Users</span>
                    </a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="permission{{$role->id}}">
                    <div class="card">
                        @foreach ($role->permissions as $permission)
                            <div class="card-header">
                                <a role="button" data-bs-toggle="collapse" href="#permission_11{{$permission->id}}" aria-expanded="true">{{ $permission->title ?? 'Unknown permission' }}</a>
                            </div>
                            <div id="permission_11{{$permission->id}}" class="collapse show">
                                <div class="card-body">
                                    <ul class="permission-list list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="media align-items-center">
                                                <div class="media-head px-1">
                                                    <div class="avatar avatar-sm avatar-primary avatar-rounded">
                                                        <span class="initial-wrap">
                                                            {{ strtoupper(substr($permission->title ?? 'U', 0, 1)) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="media-body " style="padding-bottom: 0;">
                                                    <p> <span class="text-dark ">{{ $permission->details ?? 'Unknown permission' }}</span></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                   </div>
                </div>
                <div class="tab-pane fade" id="user{{$role->id}}">
                    @foreach ($role->users as $user)
                        <div class="card card-sm">
                            <div class="card-header">
                                <a role="button" data-bs-toggle="collapse" href="#use_11{{$user->id}}" aria-expanded="true">{{$user->email}}</a>
                            </div>
                            <div id="use_11{{$user->id}}" class="collapse show">
                                <div class="card-body">
                                    <ul class="use-list list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="media align-items-center">
                                                <div class="media-head px-1">
                                                    <div class="avatar avatar-sm avatar-primary avatar-rounded">
                                                        <span class="initial-wrap">
                                                            {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="media-body " style="padding-bottom: 0;">
                                                    <p> <span class="text-dark">{{ $user->name ?? 'Unknown User' }}</span></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
