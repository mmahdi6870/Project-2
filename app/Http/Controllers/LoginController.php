<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => "Halaman Login"
        ]);
    }
    public function check(Request $request)
    {
        $masuk = $request->validate(
            [
                'nama' => 'required',
                'password' => 'required'
            ],
            [
                'nama.required' => 'Email/Nama Pengguna tidak boleh kosong!',
                'password.required' => 'Password tidak boleh kosong!',
            ]
        );

        if (Auth::attempt($masuk)) {
            $request->session()->regenerate();
            if (auth()->user()->is_admin == 1) {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/product');
            }
        }
        return back()->with('loginError', 'Login Anda Gagal!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
