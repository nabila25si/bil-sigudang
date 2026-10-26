<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->input('username') === $request->input('password')) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')
            ->with('error', 'Username dan password salah!');
    }

    public function showRegister()
    {
        return view('auth.register');
    }
}
