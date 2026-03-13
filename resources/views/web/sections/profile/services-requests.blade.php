<div class="col-md-8 offset-lg-1 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
    <div class="ps-md-3 ps-lg-0 mt-md-2">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1 class="mb-0 h2 pt-xl-1">{{ x_('Services Requested From You', 'web') }}</h1>
        </div>

        <!-- Service Requests List -->
        <div class="mb-4 border-0 shadow-sm card">
            <div class="bg-transparent card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">{{ x_('Incoming Service Requests', 'web') }}</h5>
            </div>
            <div class="p-0 card-body">
                @if($demands->count() > 0)
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>{{ x_('Date', 'web') }}</th>
                                <th>{{ x_('Service', 'web') }}</th>
                                <th>{{ x_('Client', 'web') }}</th>
                                <th>{{ x_('Budget', 'web') }}</th>
                                <th>{{ x_('Status', 'web') }}</th>
                                <th>{{ x_('Actions', 'web') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($demands as $demand)
                            <tr>
                                <td>{{ $demand->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        {{-- @if($demand->service->getFirstMediaUrl('image'))
                                            <img src="{{ $demand->service->getFirstMediaUrl('image') }}" class="rounded me-2" width="40" height="40" alt="{{ $demand->service->name }}">
                                        @else --}}
                                            <div class="rounded bg-secondary me-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="text-white bx bx-briefcase"></i>
                                            </div>
                                        {{-- @endif --}}
                                        <div>
                                            <h6 class="mb-0">{{ $demand->service->name }}
                                                @if($demand->getFirstMedia('proposal'))
                                                <i class="text-primary bx bx-file-blank" title="{{ x_('Proposal Attached', 'web') }}"></i>
                                                @endif
                                            </h6>
                                            <small class="text-muted">{{ Illuminate\Support\Str::limit($demand->service->short_description, 30) }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($demand->from_client->getFirstMediaUrl('profile_picture'))
                                            <img src="{{ $demand->from_client->getFirstMediaUrl('profile_picture') }}" class="rounded-circle me-2" width="32" height="32" alt="{{ $demand->from_client->name }}">
                                        @else
                                            <div class="bg-secondary rounded-circle me-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                                <i class="text-white bx bx-user"></i>
                                            </div>
                                        @endif
                                        {{ $demand->from_client->name }}
                                    </div>
                                </td>
                                <td>
                                    @if($demand->budget_min && $demand->budget_max)
                                        ${{ number_format($demand->budget_min, 0) }} - ${{ number_format($demand->budget_max, 0) }}
                                    @elseif($demand->budget_min)
                                        ${{ number_format($demand->budget_min, 0) }}+
                                    @elseif($demand->budget_max)
                                        {{ x_('Up to', 'web') }} ${{ number_format($demand->budget_max, 0) }}
                                    @else
                                        {{ x_('Not specified', 'web') }}
                                    @endif
                                </td>
                                <td>
                                    @if($demand->is_completed)
                                        <span class="badge bg-success">{{ x_('Completed', 'web') }}</span>
                                    @elseif($demand->is_accepted)
                                        <span class="badge bg-primary">{{ x_('Accepted', 'web') }}</span>
                                    @elseif($demand->is_rejected)
                                        <span class="badge bg-danger">{{ x_('Rejected', 'web') }}</span>
                                    @else
                                        <span class="badge bg-warning text-dark">{{ x_('Pending', 'web') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('client.services.demand.show', $demand->id) }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        @if(!$demand->is_accepted && !$demand->is_rejected)
                                        <form action="{{ route('client.services.demand.accept', $demand->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-success" onclick="return confirm('{{ x_('Accept this service request?', 'web') }}')">
                                                <i class="bx bx-check"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('client.services.demand.reject', $demand->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ x_('Reject this service request?', 'web') }}')">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </form>
                                        @elseif($demand->is_accepted && !$demand->is_completed)
                                        <form action="{{ route('client.services.demand.complete', $demand->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-success" onclick="return confirm('{{ x_('Mark this service as completed?', 'web') }}')">
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
                        <h4>{{ x_('No Incoming Service Requests', 'web') }}</h4>
                        <p class="text-muted">{{ x_('You haven\'t received any service requests yet.', 'web') }}</p>
                        <a href="{{ route('client.services') }}" class="btn btn-primary">
                            <i class="bx bx-plus-circle me-2"></i>{{ x_('Create a Service', 'web') }}
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
