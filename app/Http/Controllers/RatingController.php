<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{


    public function save(Request $request, Produk $produk)
    {
        $rating = Rating::where('produk_id', $produk->id)->where('user_id', Auth::id())->get();
        $cis = $rating->count();
        if (auth()->user() == Null) {
            return redirect('/dashboard/produk/' . $produk->slug)->with('nosuccess', 'Silahkan Login Terlebih Dahulu!');
        }
        if ($cis == Null) {
            $rules = [
                'komentar' => 'required',
                'star' => 'required',
            ];
            $message = [
                'komentar.required' => 'Komentar Produk tidak boleh kosong!',
                'star.required' => 'Tinjauan Produk tidak boleh kosong!',
            ];
            $validateData = $request->validate($rules, $message);
            $validateData['produk_id'] = $produk->id;
            $validateData['user_id'] = auth()->user()->id;
            Rating::create($validateData);
            return redirect('/dashboard/produk/' . $produk->slug)->with('success', 'Tinjauan Produk Berhasil ditambahkan!');
        } else {
            $rules = [
                'komentar' => 'required',
                'star' => 'required',
            ];
            $message = [
                'komentar.required' => 'Komentar Produk tidak boleh kosong!',
                'star.required' => 'Tinjauan Produk tidak boleh kosong!',
            ];
            $validateData = $request->validate($rules, $message);
            $validateData['produk_id'] = $produk->id;
            $validateData['user_id'] = auth()->user()->id;
            Rating::where('id', $rating[0]->id)
                ->update($validateData);
            return redirect('/dashboard/produk/' . $produk->slug)->with('success', ' Tinjauan Sudah Berhasil Dirubah!');
        }
    }
}
