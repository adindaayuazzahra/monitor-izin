<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin');
        }
        return view('auth.login');
    }

    public function loginDo(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user) {
                return redirect()->route('admin');
            } 
        }
        return redirect()->route('home.login')->with('error', "Username atau password salah");
    }

    public function logoutDo(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home.login')->with('error', "Berhasil Logout");
    }
}
