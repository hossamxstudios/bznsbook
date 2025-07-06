    <div class="modal fade" id="deleteModal{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$client->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{$client->id}}">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <span class="avatar avatar-icon avatar-soft-danger mb-3">
                            <span class="initial-wrap">
                                <i class="ri-delete-bin-line fs-3"></i>
                            </span>
                        </span>
                        <h5 class="mb-0">Delete Client</h5>
                        <p class="mt-2">Are you sure you want to delete client <strong>{{$client->name}}</strong>?</p>
                        <p class="text-danger mb-0"><small>This action cannot be undone.</small></p>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-soft-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Client</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
