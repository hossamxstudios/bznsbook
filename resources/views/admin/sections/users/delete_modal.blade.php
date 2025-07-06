<div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" aria-labelledby="deleteModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Delete the User : {{$user->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.destroy', ['id' => $user->id]) }} " method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <label for="id" class="form-label"> Are you sure?</label>
                            </div>
                        </div>
                        <div class="col-xxl-12">
                            <div>
                                <label for="id" class="form-label"> Enter Your Password</label>
                                <input type="password"  name="password" class="form-control" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-danger">submit</button>
                    </div><!--end row-->
                </div>
            </form>
        </div>
    </div>
</div>
