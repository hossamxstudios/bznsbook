<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">{{ x_('Add User', 'admin') }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name" class="form-label">{{ x_('Name *', 'admin') }}</label>
                            <input type="text" class="form-control" id="name" name="name" required >
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">{{ x_('Email *', 'admin') }}</label>
                            <input type="email" class="form-control" id="email" name="email" required >
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">{{ x_('Password *', 'admin') }}</label>
                            <input type="password" class="form-control"  name="password" required placeholder="{{ x_('Password', 'admin') }}">
                        </div>
                        <div class="col-12">
                            <label for="role" class="form-label">{{ x_('Role *', 'admin') }}</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="" >{{ x_('Select a role', 'admin') }}</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">{{ x_('Add User', 'admin') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
