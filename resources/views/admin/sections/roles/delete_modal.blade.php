<div class="modal fade" id="deleteModalgrid{{$role->id}}" tabindex="-1" aria-labelledby="deleteModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalgridLabel">{{ x_('Delete the Role:', 'roles') }} {{$role->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('roles.destroy', ['id' => $role->id]) }} " method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <input type="hidden" name="id" value="{{ $role->id }}">
                                <label for="id" class="form-label"> {{ x_('Are you sure?', 'roles') }}</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger">{{ x_('Submit', 'roles') }}</button>
                    </div><!--end row-->
                </div>
            </form>
        </div>
    </div>
</div>
