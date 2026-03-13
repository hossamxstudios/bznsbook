<div class="d-flex flex-1 overflow-hidden">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="container-fluid px-5 pt-5">
            <div class="row">
                <div class="col-md-12 mb-md-4 mb-3">
                    <div class="card rounded-8 mb-0" style="height: 90vh;">
                        <div class="card-header card-header-action">
                            <h6>{{ x_('Roles And Permissions', 'roles') }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="role-list-view">
                                <form action="{{ route('roles.store') }}" method="POST">
                                    @csrf
                
                                    <label for="name">{{ x_('Role Name', 'roles') }}</label>
                                    <input type="text" name="name" id="name" class="form-control mb-5" placeholder="{{ x_('Enter Role Name', 'roles') }}">
                                    <div class="row">
                                        <div class="col-md-12 mb-md-4 mb-3" style="height: 62vh">
                                            <div class="mt-4 mt-lg-0" style="height: 100%;">
                                                <select required multiple="multiple" name="selected_permissions[]" id="multiselect-header">
                                                    @foreach ($permissions as $permission)
                                                        <option value="{{ $permission->name }}"id="permission">{{ $permission->title }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ x_('Add Role', 'roles') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
