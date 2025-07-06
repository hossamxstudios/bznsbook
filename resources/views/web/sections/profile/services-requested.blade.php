<div class="col-md-8 offset-lg-1 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
    <div class="ps-md-3 ps-lg-0 mt-md-2">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1 class="mb-0 h2 pt-xl-1">Services You Requested</h1>
        </div>

        <!-- Services Requested List -->
        <div class="mb-4 border-0 shadow-sm card">
            <div class="bg-transparent card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Your Service Requests</h5>
                <a href="{{ route('pages.companies') }}" class="btn btn-sm btn-primary">
                    <i class="bx bx-plus-circle me-1"></i>
                    Find Services
                </a>
            </div>
            <div class="p-0 card-body">
                @if($demands->count() > 0)
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Service</th>
                                <th>Provider</th>
                                <th>Budget</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($demands as $demand)
                            <tr>
                                <td>{{ $demand->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="mb-0">{{ $demand->service->name }}
                                                <i class="text-primary bx bx-file-blank" title="Proposal Attached"></i>ff
                                                @if($demand->getFirstMedia('proposal'))
                                                <i class="text-primary bx bx-file-blank" title="Proposal Attached"></i>
                                                @endif
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($demand->to_client->getFirstMediaUrl('profile_picture'))
                                            <img src="{{ $demand->to_client->getFirstMediaUrl('profile_picture') }}" class="rounded-circle me-2" width="32" height="32" alt="{{ $demand->to_client->name }}">
                                        @else
                                            <div class="bg-secondary rounded-circle me-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                                <i class="text-white bx bx-user"></i>
                                            </div>
                                        @endif
                                        {{ $demand->to_client->name }}
                                    </div>
                                </td>
                                <td>
                                    @if($demand->budget_min && $demand->budget_max)
                                        ${{ number_format($demand->budget_min, 0) }} - ${{ number_format($demand->budget_max, 0) }}
                                    @elseif($demand->budget_min)
                                        ${{ number_format($demand->budget_min, 0) }}+
                                    @elseif($demand->budget_max)
                                        Up to ${{ number_format($demand->budget_max, 0) }}
                                    @else
                                        Not specified
                                    @endif
                                </td>
                                <td>
                                    @if($demand->is_completed)
                                        <span class="badge bg-success">Completed</span>
                                    @elseif($demand->is_accepted)
                                        <span class="badge bg-primary">Accepted</span>
                                    @elseif($demand->is_rejected)
                                        <span class="badge bg-danger">Rejected</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('client.services.demand.show', $demand->id) }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        @if($demand->is_accepted && !$demand->is_completed)
                                        <form action="{{ route('client.services.demand.complete', $demand->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-success" onclick="return confirm('Mark this service as completed?')">
                                                <i class="bx bx-check-circle"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="p-3">
                    {{ $demands->links() }}
                </div>
                @else
                <div class="p-5 text-center">
                    <div class="mb-4">
                        <div class="p-3 mx-auto mb-3 bg-light rounded-circle text-muted" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                            <i class="bx bx-briefcase fs-1"></i>
                        </div>
                        <h4>No Service Requests Found</h4>
                        <p class="text-muted">You haven't requested any services yet.</p>
                        <a href="{{ route('pages.companies') }}" class="btn btn-primary">
                            <i class="bx bx-search me-2"></i>Find Services
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
