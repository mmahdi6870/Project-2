<?php

namespace App\Http\Controllers;

use App\Models\Bukti;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class PesananController extends Controller
{

    public function index()
    {
        return view('dashboard.pesanan.admin', [
            'active' => 'pesanan',
            'title' => 'Pesanan || Forever19',
            'pesanan' => Pesanan::latest()->get()
        ]);
    }
    public function pelanggan()
    {

        $pesan = Pesanan::where('user_id', auth()->user()->id)->get();
        return view('dashboard.pesanan.index', [
            'active' => 'pesananP',
            'title' => 'Pesanan || Forever19',
            'pesanan' => $pesan,

        ]);
    }

    public function bukti(Pesanan $pesanan)
    {
        dd($pesanan->bukti);
        if ($pesanan->bukti == Null) {
            $validateData['image'] = 0;
            $validateData['pesanan_id'] = $pesanan->id;
            Bukti::create($validateData);
            return redirect('/bukti/' . $pesanan->id)->with('success', ' Bukti Berhasil Ditambahkan!');
        }
        $bukti = Bukti::Where('pesanan_id', $pesanan->id)->get();
        return view('dashboard.pesanan.bukti', [
            'active' => 'pesanan',
            'title' => 'Pesanan || Forever19',
            'pesanan' => $pesanan,
            'bukti' => $bukti
        ]);
    }


    /**
     * download file
     * 
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Auth\Access\Response
     */
    public function download(Bukti $bukti)
    {

        $file = public_path() . "/assets/img/bukti/" . $bukti->image;
        if (file_exists($file)) {
            return Response::download($file);
        } else {
            echo ('File not found.');
        }
    }

    public function storebukti(Request $request, Pesanan $pesanan)
    {

        $rules = [
            'image' => 'image|file|max:3072',
        ];
        $message = [
            'image.max' => 'Gambar Produk Tidak Boleh Melebihi 3MB',
            'image.file' => ' File Yang anda masukan bukan gambar!',
            'image.image' => ' File Yang anda masukan bukan gambar!'

        ];
        $validateData = $request->validate($rules, $message);
        if ($request->file('image')) {
            $image_path = public_path("assets\img\bukti\\") . $pesanan->bukti->image;
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/assets/img/bukti'), $filename);
            $validateData['image'] = $filename;
        }
        $validateData['pesanan_id'] = $pesanan->id;


        bukti::where('id', $pesanan->bukti->id)
            ->update($validateData);
        return redirect('/bukti/' . $pesanan->id)->with('success', ' Bukti Berhasil Ditambahkan!');
    }
    public function delbk(Pesanan $pesanan)
    {

        if ($pesanan->bukti == null) {
            Pesanan::destroy($pesanan->id);
        } else {
            $image_path = public_path("\assets\img\bukti\\") . $pesanan->bukti->image;
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
            bukti::destroy($pesanan->bukti->id);
            Pesanan::destroy($pesanan->id);
        }
        if (auth()->user()->is_admin === 1) {
            return redirect('/dashboard/pesanan')->with('success', ' Pesanan Berhasil Di Batalkan!');
        } else {
            return redirect('/dashboard/keranjang/daftarPesanan')->with('success', ' Pesanan Berhasil Di Batalkan!');
        }
    }

    public function dibayar(Pesanan $pesanan)
    {

        if ($pesanan->bayar === 0) {
            $validateData['user_id'] = $pesanan->user_id;
            $validateData['bayar'] = 1;
            $validateData['dikirim'] = $pesanan->dikirim;
            $validateData['total'] = $pesanan->total;
            $validateData['redem'] = $pesanan->redem;
            Pesanan::where('id', $pesanan->id)
                ->update($validateData);
            return redirect('/dashboard/pesanan')->with('success', 'Berhasil Mengkonfirmasi Pembayaran!');
        } else {
            $validateData['user_id'] = $pesanan->user_id;
            $validateData['bayar'] = 0;
            $validateData['dikirim'] = $pesanan->dikirim;
            $validateData['total'] = $pesanan->total;
            $validateData['redem'] = $pesanan->redem;
            Pesanan::where('id', $pesanan->id)
                ->update($validateData);
            return redirect('/dashboard/pesanan')->with('success', 'Berhasil Mengkonfirmasi Pembayaran!');
        }
    }
    public function dikirim(Pesanan $pesanan)
    {

        if ($pesanan->dikirim === 0) {
            $validateData['user_id'] = $pesanan->user_id;
            $validateData['bayar'] = $pesanan->bayar;
            $validateData['dikirim'] = 1;
            $validateData['total'] = $pesanan->total;
            $validateData['redem'] = $pesanan->redem;
            Pesanan::where('id', $pesanan->id)
                ->update($validateData);
            return redirect('/dashboard/pesanan')->with('success', 'Berhasil Mengkonfirmasi Pengiriman!');
        } else {
            $validateData['user_id'] = $pesanan->user_id;
            $validateData['bayar'] = $pesanan->bayar;
            $validateData['dikirim'] = 0;
            $validateData['total'] = $pesanan->total;
            $validateData['redem'] = $pesanan->redem;
            Pesanan::where('id', $pesanan->id)
                ->update($validateData);
            return redirect('/dashboard/pesanan')->with('success', 'Berhasil Mengkonfirmasi Pengiriman!');
        }
    }
}
