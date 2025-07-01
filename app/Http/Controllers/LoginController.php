<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        $role = $request->query('role');
        return view('auth.login', compact('role'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $role = $request->input('role');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Decide redirect based on role
            if ($role === 'admin') {
                return redirect()->route('couriers.index');
            } elseif ($role === 'agent') {
                return redirect()->route('agent.index');
            }

            // Default fallback
            return redirect()->route('track.form');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
