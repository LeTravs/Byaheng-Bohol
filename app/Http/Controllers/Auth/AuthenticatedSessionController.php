<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
 
        $user = Auth::user();

        if ($user->hasRole('superAdmin')) {
            return redirect()->route('superadmin.index');
        }
         elseif ($user->hasRole('tourAgencyAdmin')) {
            return redirect()->route('touragency.index');
        } elseif ($user->hasRole('transportOperatorAdmin')) { 
            return redirect()->route('transportoperator.index');
        } elseif ($user->hasRole('user')) {
            return redirect()->route('user.index');
        }
        return redirect()->intended('dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
