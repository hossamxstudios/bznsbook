    <div class="modal fade" id="deleteModalgrid{{$contact->id}}" tabindex="-1" aria-labelledby="deleteModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalgridLabel">{{ x_('Delete the Contact:', 'contacts') }} {{$contact->name}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('contacts.destroy', ['id' => $contact->id]) }} " method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <input type="hidden" name="id" value="{{ $contact->id }}">
                                    <label for="firstName" class="form-label"> {{ x_('Are you sure?', 'contacts') }}</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger">{{ x_('Submit', 'contacts') }}</button>
                        </div><!--end row-->
                    </div>
                </form>
            </div>
        </div>
    </div>
