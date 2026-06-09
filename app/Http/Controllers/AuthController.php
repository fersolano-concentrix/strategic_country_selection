<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validate the incoming form data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Attempt to authenticate the user
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            
            // 3. Prevent session fixation attacks by regenerating the session ID
            $request->session()->regenerate();

            // 4. Redirect to the dashboard (or where they originally tried to go)
            return redirect()->intended(route('dashboard'));
        }

        // 5. If authentication fails, send them back with a secure error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Destroy an authenticated session (Logout).
     */
    public function destroy(Request $request): RedirectResponse
    {
        // 1. Log the user out of the web guard
        Auth::guard('web')->logout();

        // 2. Invalidate the current session
        $request->session()->invalidate();

        // 3. Regenerate the CSRF token for security
        $request->session()->regenerateToken();

        // 4. Redirect back to the login page
        return redirect()->route('login');
    }
}