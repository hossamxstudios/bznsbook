<!-- Delete Modal -->
<div class="modal fade" id="deleteModalgrid{{ $blog->id }}" tabindex="-1" aria-labelledby="deleteModalgridLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalgridLabel">Delete Blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="icon-box">
                        <i class="ri-delete-bin-line"></i>
                    </div>
                    <h5>Are you sure you want to delete this blog?</h5>
                    <p class="mb-0 text-danger">This action cannot be undone.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('blogs.destroy', ['id' => $blog->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal End-->
