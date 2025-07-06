<div class="mb-2 row">
    <div class="col-5 text-muted">Total Seats:</div>
    <div class="col-7 fw-medium">
        @php
            $totalSeats = 0;
            if($project->batches && $project->batches->count() > 0) {
                foreach($project->batches as $batch) {
                    if($batch->seats) {
                        $totalSeats += $batch->seats->count();
                    }
                }
            }
        @endphp
        {{ $totalSeats }} {{ $totalSeats == 1 ? 'seat' : 'seats' }}
    </div>
</div>
