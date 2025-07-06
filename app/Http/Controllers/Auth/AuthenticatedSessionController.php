<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller {

    public function create(){
        if (Auth::guard('web')->check()) {
            return redirect()->route('admin.home');
        }
        if (Auth::guard('client')->check()) {
            return redirect()->route('client');
        }
        return view('auth.login');
    }


    public function store(LoginRequest $request): RedirectResponse{
        $request->authenticate();
        $request->session()->regenerate();
        if (Auth::guard('web')->check()) {
            return redirect()->intended(route('admin.home', absolute: false));
        }
        if (Auth::guard('client')->check()) {
            return redirect()->intended(route('client', absolute: false));
        }
        return redirect()->intended(route('admin.home', absolute: false));
    }


    public function destroy(Request $request): RedirectResponse{
        Auth::guard('web')->logout();
        Auth::guard('client')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
