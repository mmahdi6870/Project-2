<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Bukti;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Pembelian;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class PembelianController extends Controller
{
    public function addstore(Request $request, Produk $produk)
    {

        $rules = [
            'jumlah' => 'required',
        ];
        $validateData = $request->validate($rules);
        $validateData['produk_id'] = $produk->id;
        $validateData['user_id'] = auth()->user()->id;
        $validateData['total'] = ($produk->harga) * ($request->input('jumlah'));

        Pembelian::create($validateData);

        return redirect('/dashboard/produk/' . $produk->slug)->with('success', 'Produk sudah ditambahkan Ke Keranjang!');
    }

    public function index()
    {
        $pembelian = Pembelian::where('user_id', auth()->user()->id)->get();
        $total = DB::table('pembelians')
            ->where('user_id', auth()->user()->id)
            ->sum('total');
        $t = [];
        $t = $total;
        return view('dashboard.keranjang.index', [
            'title' => 'Keranjang Saya | Forever19',
            'active' => 'keranjang',
            'pembelian' => $pembelian,
            'total' => $t
        ]);
    }

    public function hapus(Pembelian $pembelian)
    {
        Pembelian::destroy($pembelian->id);
        return redirect('/dashboard/keranjang')->with('success', ' Produk Berhasil Di Hapus!');
    }
    public function pembayaran(Request $request, User $user)
    {
        $total = $request->input('totals');
        if ($total == "0") {
            return redirect('/dashboard/keranjang')->with('danger', ' Silahkan Pilih Produk Dahulu!');
        }

        $mytime = Carbon::now();
        $haah = $mytime->toDateTimeString();
        return view('dashboard.pembayaran', [
            'title' => 'Pembayaran || Forever19',
            'active' => 'keranjang',
            'user' => $user,
            'waktu' => $haah,
            'total' => $total,

        ]);
    }
    public function bukti(Request $request, User $user)
    {
        $total = $request->input('totals');


        $validateData2['user_id'] = $user->id;
        $validateData2['bayar'] = 0;
        $validateData2['dikirim'] = 0;
        $validateData2['total'] = $total;
        $validateData2['redem'] = random_int(132423, 99931232);
        Pesanan::create($validateData2);



        return redirect('/dashboard/keranjang/daftarPesanan')->with('success', 'Terimakasih Telah Melakukan Pemesanan');
    }
}
