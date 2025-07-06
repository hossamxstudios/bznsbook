{{-- Seats Full Information Card Component --}}
@if($project->batches && $project->batches->count() > 0 && $project->batches->flatMap(function($batch) { return $batch->seats; })->count() > 0)
<div class="mb-3 card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="mb-0">Seats Information</h6>
        <span class="badge badge-soft-primary">{{ $project->batches->flatMap(function($batch) { return $batch->seats; })->count() }} {{ $project->batches->flatMap(function($batch) { return $batch->seats; })->count() == 1 ? 'seat' : 'seats' }} total</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Batch</th>
                        <th>Client</th>
                        <th>Status</th>
                        <th>Contact/Proposal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($project->batches as $batch)
                        @foreach($batch->seats as $seat)
                        <tr>
                            <td>{{ $seat->id }}</td>
                            <td>{{ $batch->name }}</td>
                            <td>
                                @if($seat->client)
                                    <span class="badge badge-soft-info">{{ $seat->client->name }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if($seat->status == 'pending')
                                    <span class="badge badge-soft-warning">Pending</span>
                                @elseif($seat->status == 'contacted')
                                    <span class="badge badge-soft-info">Contacted</span>
                                @elseif($seat->status == 'proposal')
                                    <span class="badge badge-soft-primary">Proposal</span>
                                @elseif($seat->status == 'awarded')
                                    <span class="badge badge-soft-success">Awarded</span>
                                @elseif($seat->status == 'rejected')
                                    <span class="badge badge-soft-danger">Rejected</span>
                                @else
                                    <span class="badge badge-soft-secondary">{{ ucfirst($seat->status) }}</span>
                                @endif
                            </td>
                            <td>
                                @if($seat->getFirstMediaUrl('proposal'))
                                    <a href="{{ $seat->getFirstMediaUrl('proposal') }}" target="_blank" class="badge badge-soft-success">
                                        <i class="ri-download-2-line"></i> Proposal
                                    </a>
                                @elseif($seat->contacted_at)
                                    <span class="badge badge-soft-info">Contacted {{ $seat->contacted_at->format('M d') }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
