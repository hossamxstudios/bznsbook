<div class="modal fade" id="activateModal{{ $subscription->id }}" tabindex="-1" role="dialog" aria-labelledby="activateModalLabel{{ $subscription->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="activateModalLabel{{ $subscription->id }}">{{ x_('Activate Subscription', 'admin') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ route('admin.subscriptions.toggle.active') }}" method="POST">
                @csrf
                <input type="hidden" name="subscription_id" value="{{ $subscription->id }}">
                <div class="modal-body">
                    <p>{{ x_('Are you sure you want to activate this subscription?', 'admin') }}</p>
                    @if($subscription->client)
                    <p><strong>{{ x_('Client:', 'admin') }}</strong> {{ $subscription->client->name }}</p>
                    @endif
                    <p><strong>{{ x_('Price:', 'admin') }}</strong> EGP {{ number_format($subscription->price, 2) }}</p>
                    <p><strong>{{ x_('Billing Cycle:', 'admin') }}</strong> {{ ucfirst($subscription->billing_cycle) }}</p>
                    <p><strong>{{ x_('End Date:', 'admin') }}</strong> {{ \Carbon\Carbon::parse($subscription->ends_at)->format('M d, Y') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ x_('Cancel', 'admin') }}</button>
                    <button type="submit" class="btn btn-success">
                        {{ x_('Activate Subscription', 'admin') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
