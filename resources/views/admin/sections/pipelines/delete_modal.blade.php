<div class="modal fade" id="deleteModalPipeline{{ $pipeline->id }}" tabindex="-1" aria-labelledby="deleteModalPipelineLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalPipelineLabel">{{ x_('Delete the pipeline:', 'pipelines') }} {{ $pipeline->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pipelines.destroy', ['id' => $pipeline->id]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p>{{ x_('Are you sure you want to delete this pipeline? This action cannot be undone.', 'pipelines') }}</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="{{ $pipeline->id }}">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ x_('Cancel', 'pipelines') }}</button>
                    <button type="submit" class="btn btn-danger">{{ x_('Delete', 'pipelines') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
