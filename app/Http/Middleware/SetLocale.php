<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = null;

        // Check admin guard first, then client guard
        if ($request->user()) {
            $locale = $request->user()->locale ?? null;
        } elseif ($request->user('client')) {
            $locale = $request->user('client')->locale ?? null;
        }

        if (empty($locale)) {
            $locale = session('locale', config('app.locale', 'en'));
        }

        // Validate against available locales
        $supported = array_merge(
            array_keys(config('translation.available_locales', [])),
            array_keys(config('translation.locales', ['en' => 'English']))
        );
        $supported[] = 'en';

        if (!in_array($locale, $supported)) {
            $locale = config('app.locale', 'en');
        }

        app()->setLocale($locale);
        session(['locale' => $locale]);

        return $next($request);
    }
}
