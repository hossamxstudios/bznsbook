<!-- Delete Modal -->
<div class="modal fade" id="deleteModalgrid{{$topic->id}}" tabindex="-1" aria-labelledby="deleteModalgridLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalgridLabel">Delete Topic</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="icon-box">
                        <i class="ri-delete-bin-line"></i>
                    </div>
                    <h5>Are you sure you want to delete this topic?</h5>
                    <p class="text-danger mb-0">This will also delete all associated blogs!</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('topics.destroy', ['id' => $topic->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal End-->
