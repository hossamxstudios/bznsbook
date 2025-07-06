<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateLastSeen
{
    /**
     * Handle an incoming request.
     * Updates the last_seen timestamp for authenticated clients.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated as a client
        if (Auth::guard('client')->check()) {
            // Update the last_seen timestamp with current time
            Auth::guard('client')->user()->update([
                'last_seen' => now()
            ]);
        }

        return $next($request);
    }
}
