<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard || Forever19',
            'active' => 'dashboard',

        ]);
    }

    public function edit()
    {
        return view('dashboard.edit', [
            'title' => 'EditProfil || Forever19',
            'active' => 'dashboard'
        ]);
    }
    public function ubah(Request $request)
    {
        $rules = [
            'nama' =>   'required',
            'nohp' => 'required|digits_between:6,15',
            'email' => 'required|email:dns'
        ];
        $message = [
            'nama.required' => 'Username tidak boleh kosong!',
            'email.required' => 'email tidak boleh kosong!',
            'email.email' => 'format email salah',
            'nohp.digits_between' => 'No HP harus diisi antara 6 dan 15 digit',
            'nohp.required' => ' No Hp Tidak boleh kosong!'

        ];
        if ($request->nama != auth()->user()->nama) {
            $rules['nama'] = 'required|unique:users';
        }
        if ($request->email != auth()->user()->email) {
            $rules['email'] = 'required|unique:users|email:dns';
        }
        $validateData = $request->validate($rules, $message);
        $validateData['iduser'] = auth()->user()->iduser;
        $validateData['is_admin'] = auth()->user()->is_admin;
        $validateData['password'] = auth()->user()->password;
        User::where('id', auth()->user()->id)
            ->update($validateData);

        return redirect('/dashboard')->with('success', ' Profil sudah berhasil di update');
    }

    public function editpass()
    {
        return view('dashboard.editpass', [
            'title' => 'EditPassword || Forever19',
            'active' => 'dashboard'
        ]);
    }
    public function ubahpass(Request $request, User $user)
    {

        $message = [
            'password.required' => 'Password Baru Anda Tidak Boleh Kosong!',
            'password.max' => 'Password Baru Anda Harus Diantara 5 sampai 20 Kata!',
            'password.min' => 'Password Baru Anda Harus Diantara 5 sampai 20 Kata!',
        ];
        if (Hash::check($request->passwordlama, $user->password) == false) {
            return redirect('/editpass')->with('nosuccess', ' Password lama Anda tidak Cocok!');
        } else if ($request->password2 != $request->password) {
            return redirect('/editpass')->with('nosuccess', 'Konfirmasi Password Anda tidak cocok dengan password baru!');
        } else {
            $rules['password'] = 'required|min:5|max:20';
            $validateData = $request->validate($rules, $message);
            $validateData['password'] = hash::make($validateData['password']);
            $validateData['nama'] = $user->nama;
            $validateData['nohp'] = $user->nohp;
            $validateData['iduser'] = $user->iduser;
            $validateData['email'] = $user->email;
            User::where('id', $user->id)
                ->update($validateData);
            return redirect('/dashboard')->with('success', ' Password Anda Berhasil Di Ubah');
        }
    }

    public function alamat()
    {
        return view('dashboard.alamat', [
            'title' => 'Alamat Pengguna || Forever19',
            'active' => 'dashboard'
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'alamat' =>   'required',
        ];
        $message = [
            'alamat.required' => 'Alamat Baru Anda Tidak Boleh Kosong!',
        ];
        $validateData['nama'] = auth()->user()->nama;
        $validateData['nohp'] = auth()->user()->nohp;
        $validateData['email'] = auth()->user()->email;
        $validateData['iduser'] = auth()->user()->iduser;
        $validateData['is_admin'] = auth()->user()->is_admin;
        $validateData['password'] = auth()->user()->password;
        $validateData = $request->validate($rules, $message);
        User::where('id', auth()->user()->id)
            ->update($validateData);
        return redirect('/dashboard')->with('success', ' Alamat Anda Berhasil Di Perbarui');
    }
}
