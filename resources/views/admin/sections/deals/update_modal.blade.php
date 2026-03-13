<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdate{{ $deal->id }}" aria-labelledby="offcanvasUpdateLabel{{ $deal->id }}" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasUpdateLabel{{ $deal->id }}" style="color: aliceblue;">{{ x_('Update Deal', 'deals') }}</h5>
        <button type="button" class="btn-close text-white"  data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form id="updateDealForm{{ $deal->id }}" action="{{ route('deals.update', $deal->id) }}" method="POST">
            @csrf
            <!-- Pipeline Selection -->
            <div class="mb-3">
                <label for="update_pipeline_id_{{ $deal->id }}" class="form-label">{{ x_('Pipeline *', 'deals') }}</label>
                <select class="form-control" id="update_pipeline_id_{{ $deal->id }}" name="pipeline_id" required onchange="updateStagesForUpdate({{ $deal->id }})">
                    @foreach ($pipelines as $pipeline)
                        <option value="{{ $pipeline->id }}" {{ $deal->pipeline_id == $pipeline->id ? 'selected' : '' }}>
                            {{ $pipeline->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Stage Selection -->
            <div class="mb-3">
                <label for="update_stage_id_{{ $deal->id }}" class="form-label">{{ x_('Stage *', 'deals') }}</label>
                <select class="form-control" id="update_stage_id_{{ $deal->id }}" name="stage_id" required>
                    @foreach ($deal->pipeline->stages as $stage)
                        <option value="{{ $stage->id }}" {{ $deal->stage_id == $stage->id ? 'selected' : '' }}>
                            {{ $stage->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Deal Name -->
            <div class="mb-3">
                <label for="update_name_{{ $deal->id }}" class="form-label">{{ x_('Deal Name *', 'deals') }}</label>
                <input type="text" class="form-control" id="update_name_{{ $deal->id }}" name="name" value="{{ $deal->name }}" required>
            </div>
            <!-- Deal Amount -->
            <div class="mb-3">
                <label for="update_amount_{{ $deal->id }}" class="form-label">{{ x_('Amount*', 'deals') }}</label>
                <input type="number" class="form-control" id="update_amount_{{ $deal->id }}" name="amount" value="{{ $deal->amount }}" required>
            </div>
            <!-- Closed At -->
            <div class="mb-3">
                <label for="update_closed_at_{{ $deal->id }}" class="form-label">{{ x_('Closed At', 'deals') }}</label>
                <input type="date" class="form-control" id="update_closed_at_{{ $deal->id }}" name="closed_at" value="{{ date('Y-m-d', strtotime($deal->closed_at??now()))}}" >
            </div>
            <button type="submit" class="btn btn-primary">{{ x_('Update Deal', 'deals') }}</button>
        </form>
    </div>
</div>


