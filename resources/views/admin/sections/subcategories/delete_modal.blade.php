<div class="modal fade" id="delete_{{ $subcategory->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Subcategory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the subcategory <strong>{{ $subcategory->name }}</strong>?</p>
                @if($subcategory->clients->count() > 0)
                <div class="alert alert-warning">
                    <i class="ri-alert-line me-2"></i>
                    This subcategory has {{ $subcategory->clients->count() }} clients associated with it. You cannot delete it until all clients are removed or reassigned.
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger" @if($subcategory->clients->count() > 0) disabled @endif>Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
