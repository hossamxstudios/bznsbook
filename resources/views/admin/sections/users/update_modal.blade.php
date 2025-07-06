<div class="modal fade" id="roleModal{{$user->id}}" tabindex="-1" aria-labelledby="roleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleModalgridLabel">Edit User : {{$user->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.changeRole',['id',$user->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" class="form-control" id="name" name="name" required value="{{ $user->name }}">
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" required value="{{ $user->email }}">
                        </div>
                        <div class="col-12">
                            <div>
                                <label for="role" class="form-label">Select Role</label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="" >Select a role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}" {{ $user->roles->first()?->name == $role->name ? 'selected' : ''}}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
