<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    public function index()
    {
        $active_subscriptions = Subscription::with('client')
            ->where('is_active', true)
            ->where('ends_at', '>=', now())
            ->get();

        $expired_subscriptions = Subscription::with('client')
            ->where(function($query) {
                $query->where('is_active', false)
                      ->orWhere('ends_at', '<', now());
            })
            ->get();

        $subscriptions = Subscription::all(); // For modals loop in the view

        return view('admin.subscriptions', compact('active_subscriptions', 'expired_subscriptions', 'subscriptions'));
    }

    public function getActiveSubscriptions()
    {
        $subscriptions = Subscription::with('client')
            ->where('is_active', true)
            ->where('ends_at', '>=', now())
            ->get();

        return response()->json(['data' => $subscriptions]);
    }

    public function getHistorySubscriptions()
    {
        $subscriptions = Subscription::with('client')
            ->where(function($query) {
                $query->where('is_active', false)
                      ->orWhere('ends_at', '<', now());
            })
            ->get();

        return response()->json(['data' => $subscriptions]);
    }

    public function togglePaidStatus(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
        ]);

        $subscription = Subscription::findOrFail($request->subscription_id);
        $subscription->is_paid = !$subscription->is_paid;
        $subscription->save();

        $statusText = $subscription->is_paid ? 'paid' : 'unpaid';

        return redirect()->route('admin.subscriptions.index')
                         ->with('success', x_('Subscription marked as', 'controller') . ' ' . x_($statusText, 'controller') . ' ' . x_('successfully', 'controller'));
    }

    public function toggleActiveStatus(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
        ]);

        $subscription = Subscription::findOrFail($request->subscription_id);
        $subscription->is_active = !$subscription->is_active;
        $subscription->save();

        $statusText = $subscription->is_active ? 'activated' : 'deactivated';

        return redirect()->route('admin.subscriptions.index')
                         ->with('success', x_('Subscription', 'controller') . ' ' . x_($statusText, 'controller') . ' ' . x_('successfully', 'controller'));
    }
}
