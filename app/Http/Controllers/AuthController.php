<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{

        public function login()
    {
        return view('auth.login');
    }

    public function editPassword()
    {
        return view('auth.password');
    }

    public function updatePassword(Request $request)
    {
        // Validate structural inbound request fields
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed', Password::min(8)],
        ]);

        // Verify current security credentials records match active administrative identity token
        if (! Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors([
                'current_password' => 'The current password supplied does not match our records.',
            ]);
        }

        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Security token updated successfully in primary records data node.');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'The credentials supplied do not match our records.',
        ])->onlyInput('email');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('countries.index')
            ->with('success', 'Administrative session securely disconnected.');
    }
}
