    <div class="modal fade" id="deleteModal{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$client->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{$client->id}}">{{ x_('Confirm Delete', 'clients') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <span class="avatar avatar-icon avatar-soft-danger mb-3">
                            <span class="initial-wrap">
                                <i class="ri-delete-bin-line fs-3"></i>
                            </span>
                        </span>
                        <h5 class="mb-0">{{ x_('Delete Client', 'clients') }}</h5>
                        <p class="mt-2">{{ x_('Are you sure you want to delete client', 'clients') }} <strong>{{$client->name}}</strong>?</p>
                        <p class="text-danger mb-0"><small>{{ x_('This action cannot be undone.', 'clients') }}</small></p>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-soft-secondary me-2" data-bs-dismiss="modal">{{ x_('Cancel', 'clients') }}</button>
                        <button type="submit" class="btn btn-danger">{{ x_('Delete Client', 'clients') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
