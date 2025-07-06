<div class="modal fade" id="deleteModalPipeline{{ $pipeline->id }}" tabindex="-1" aria-labelledby="deleteModalPipelineLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalPipelineLabel">Delete the pipeline: {{ $pipeline->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pipelines.destroy', ['id' => $pipeline->id]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Are you sure you want to delete this pipeline? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="{{ $pipeline->id }}">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
