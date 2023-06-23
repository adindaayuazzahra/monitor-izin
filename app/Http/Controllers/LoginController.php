<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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
            if ($user->akses_level == 0) {
                $request->session()->flash('message', 'Anda Berhasil Login!');
                $request->session()->flash('title', 'Selamat');
                $request->session()->flash('icon', 'success');
                return redirect()->route('admin.perijinan');
            }elseif ($user->akses_level == 1) {
                return redirect()->route('home');
            } 
        }
        $request->session()->flash('message', 'Username atau password yang anda masukkan salah');
        $request->session()->flash('title', 'Maaf');
        $request->session()->flash('icon', 'error');
        return redirect()->route('home.login');
    }

    public function logoutDo(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flash('message', 'Anda Berhasil Logout!');
        $request->session()->flash('title', 'Selamat');
        $request->session()->flash('icon', 'success');
        return redirect()->route('home.login')->with('error', "Berhasil Logout");
    }

}
