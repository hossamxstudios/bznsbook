<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdate{{ $pipeline->id }}" aria-labelledby="offcanvasUpdateLabel{{ $pipeline->id }}" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasUpdateLabel{{ $pipeline->id }}" style="color:aliceblue">Update Pipeline</h5>
        <button type="button" class="btn-close text-white"  data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('pipelines.update', ['id' => $pipeline->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="pipeline_name_update_{{ $pipeline->id }}" class="form-label">Pipeline Name</label>
                <input type="text" class="form-control" id="pipeline_name_update_{{ $pipeline->id }}" name="pipeline_name"
                    value="{{ $pipeline->name }}" placeholder="Enter pipeline name" required>
            </div>
            <div class="mb-3">
                <label for="type_update_{{ $pipeline->id }}" class="form-label">Type</label>
                <select class="form-control" id="type_update_{{ $pipeline->id }}" name="type" required>
                    <option value="lead" {{ $pipeline->type == 'lead' ? 'selected' : '' }}>Lead</option>
                    <option value="deal" {{ $pipeline->type == 'deal' ? 'selected' : '' }}>Deal</option>
                </select>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <label class="form-label"> Name</label>
                </div>
                <div class="col-4">
                    <label class="form-label"> probability</label>
                </div>
                <div class="col-2">
                    <label class="form-label">  Place</label>
                </div>
            </div>
            <!-- Stages Section -->
            <div id="update-stages-container-{{ $pipeline->id }}">
                @foreach($pipeline->stages as $stage)
                    <div class="row align-items-center stage-row mb-3">
                        <div class="col-4">
                            <input type="hidden" name="stages[stage{{ $stage->id }}][id]" value="{{ $stage->id }}" required>
                            <input type="text"   name="stages[stage{{ $stage->id }}][name]" class="form-control" placeholder="Stage Name" value="{{ $stage->name }}" required>
                        </div>
                        <div class="col-4">
                            <input type="number"  name="stages[stage{{ $stage->id }}][percentage]" class="form-control" placeholder="%" min="0" max="100" value="{{ $stage->percentage }}" required>
                        </div>
                        <div class="col-2 text-end">
                            <input type="number"  name="stages[stage{{ $stage->id }}][place]" class="form-control" placeholder="arrange" value="{{ $stage->place }}" required>


                            {{-- <button type="button" class="btn btn-sm btn-danger remove-stage-btn" >
                                <i class="fas fa-trash"></i>
                            </button> --}}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-end mb-3">
                <button type="button" class="btn btn-sm btn-primary add-stage-btn_update" onclick="add_stage('{{ $pipeline->id }}')">+ Add Stage</button>
            </div>
            <div class="d-grid">
                <input type="submit" class="btn btn-primary" value="Update Pipeline">
            </div>
        </form>
    </div>
</div>



