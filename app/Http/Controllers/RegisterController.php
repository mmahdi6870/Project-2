<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => "Halaman Login"
        ]);
    }
    public function store(Request $request)
    {

        $rules = [
            'nama' => 'required|max:255',
            'nohp' => 'required|between:4,14',
            'gender' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'password2' => 'required'
        ];
        $message = [
            'nama.required' => 'Nama tidak boleh kosong',
            'nohp.required' => 'No Hp tidak boleh kosong',
            'nohp.between' => 'No Hp harus diantara 4 sampai 14',
            'email.required' => 'Email tidak boleh kosong',
            'email.dns' => 'Format Email Anda salah!',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 5',
            'password2.required' => 'Konfirmasi Password tidak boleh kosong',
        ];
        if ($request->password2 != $request->password) {
            return redirect('/register')->with('nosuccess', 'Password tidak cocok dengan Konfirmasi Password');
        } else {
            $validateData = $request->validate($rules, $message);
            $validateData['password'] = hash::make($validateData['password']);
            $validateData['iduser'] = random_int(3213, 83503);
            $validateData['is_admin'] = 0;
            User::create($validateData);
            return redirect('/login')->with('success', 'Pendaftaran Anda Sudah Berhasil!');
        }
    }
}
