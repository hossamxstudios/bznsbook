<div class="modal fade" id="togglePaidModal{{ $subscription->id }}" tabindex="-1" role="dialog" aria-labelledby="togglePaidModalLabel{{ $subscription->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="togglePaidModalLabel{{ $subscription->id }}">
                    {{ $subscription->is_paid ? x_('Mark as Unpaid', 'admin') : x_('Mark as Paid', 'admin') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ route('admin.subscriptions.toggle.paid') }}" method="POST">
                @csrf
                <input type="hidden" name="subscription_id" value="{{ $subscription->id }}">
                <div class="modal-body">
                    <p>{{ x_('Are you sure you want to mark this subscription as', 'admin') }} {{ $subscription->is_paid ? x_('unpaid', 'admin') : x_('paid', 'admin') }}?</p>
                    @if($subscription->client)
                    <p><strong>{{ x_('Client:', 'admin') }}</strong> {{ $subscription->client->name }}</p>
                    @endif
                    <p><strong>{{ x_('Price:', 'admin') }}</strong> EGP {{ number_format($subscription->price, 2) }}</p>
                    <p><strong>{{ x_('Billing Cycle:', 'admin') }}</strong> {{ ucfirst($subscription->billing_cycle) }}</p>
                    <p><strong>{{ x_('End Date:', 'admin') }}</strong> {{ \Carbon\Carbon::parse($subscription->ends_at)->format('M d, Y') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ x_('Cancel', 'admin') }}</button>
                    <button type="submit" class="btn {{ $subscription->is_paid ? 'btn-danger' : 'btn-success' }}">
                        {{ $subscription->is_paid ? x_('Mark as Unpaid', 'admin') : x_('Mark as Paid', 'admin') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
