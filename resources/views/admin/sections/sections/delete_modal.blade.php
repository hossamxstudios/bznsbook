    <div class="modal fade" id="deleteModalgrid{{$section->id}}" tabindex="-1" aria-labelledby="deleteModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalgridLabel">Delete the section : {{$section->name}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('sections.destroy', ['id' => $section->id]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <input type="hidden" name="id" value="{{ $section->id }}">
                                    <label for="firstName" class="form-label"> Are you sure?</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger">submit</button>
                        </div><!--end row-->
                    </div>
                </form>
            </div>
        </div>
    </div>
