<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('dashboard.index'));
        } else {
            Session::flash('danger', 'Kredensial tidak valid.');
            return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}