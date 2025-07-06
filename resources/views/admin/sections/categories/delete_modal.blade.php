<div class="modal fade" id="delete_{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the category <strong>{{ $category->name }}</strong>?</p>
                @if($category->subcategories->count() > 0)
                <div class="alert alert-warning">
                    <i class="ri-alert-line me-2"></i>
                    This category has {{ $category->subcategories->count() }} subcategories associated with it. You cannot delete it until all subcategories are removed or reassigned.
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger" @if($category->subcategories->count() > 0) disabled @endif>Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
