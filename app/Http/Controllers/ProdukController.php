<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Merek;
use App\Models\Produk;
use App\Models\Rating;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.produk.index', [
            'active' => 'produk',
            'title' => 'Produk || Forever19',
            'produk' => Produk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.produk.create', [
            'active' => 'produk',
            'title' => 'Produk || Forever19',
            'category' => Category::all(),
            'mereks' => Merek::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'slug' => 'required|unique:produks',
            'harga' => 'required',
            'category_id' => 'required',
            'merek_id' => 'required',
            'image' => 'image|file|max:3072',
            'deskripsi' => 'required',
        ];
        $message = [
            'title.required' => 'Nama Produk tidak boleh kosong!',
            'harga.required' => 'Harga Produk tidak boleh kosong!',
            'deskripsi.required' => ' Deskirpsi Produk Tidak boleh kosong!',
            'image.max' => 'Gambar Produk Tidak Boleh Melebihi 3MB',
            'image.file' => ' File Yang anda masukan bukan gambar!',
            'image.image' => ' File Yang anda masukan bukan gambar!'

        ];
        $validateData = $request->validate($rules, $message);
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/assets/img'), $filename);
            $validateData['image'] = $filename;
        }

        $validateData['user_id'] = auth()->user()->id;


        Produk::create($validateData);
        return redirect('/dashboard/produk')->with('success', 'Produk Baru sudah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {

        $user_rating = Rating::where('produk_id', $produk->id)->where('user_id', Auth::id())->get();
        $cis = $user_rating->count();
        $rating = Rating::where('produk_id', $produk->id)->get();
        $rating_sum = Rating::where('produk_id', $produk->id)->sum('star');
        if ($rating->count() > 0) {
            $rating_value = $rating_sum / $rating->count();
        } else {
            $rating_value = 0;
        }
        return view('dashboard.produk.show', [
            'title' => "Produk" . ' ' . $produk->title . ' ' . '| Forever19',
            'produk' => $produk,
            'allproduk' => Produk::latest()->paginate(3),
            'rating' => $rating,
            'star' => $rating_value,
            'user_rating' => $user_rating,
            'cis' => $cis,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Produk $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {

        return view('dashboard.produk.edit', [
            'active' => 'produk',
            'produk' => $produk,
            'title' => 'Edit Produk || Forever19',
            'categories' => Category::all(),
            'mereks' => Merek::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Produk $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'merek_id' => 'required',
            'harga' => 'required',
            'image' => 'image|file|max:1024',
            'deskripsi' => 'required',
        ];
        $message = [
            'title.required' => 'Nama Produk tidak boleh kosong!',
            'harga.required' => 'Harga Produk tidak boleh kosong!',
            'deskripsi.required' => ' Deskirpsi Produk Tidak boleh kosong!',
            'image.max' => 'Gambar Produk Tidak Boleh Melebihi 3MB',
            'image.file' => ' File Yang anda masukan bukan gambar!',
            'image.image' => ' File Yang anda masukan bukan gambar!'

        ];
        if ($request->slug != $produk->slug) {
            $rules['slug'] = 'required|unique:produks';
        }

        $validateData = $request->validate($rules, $message);
        if ($request->file('image')) {
            $image_path = public_path("\assets\img\\") . $produk->image;
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/assets/img'), $filename);
            $validateData['image'] = $filename;
        }
        $validateData['user_id'] = auth()->user()->id;


        Produk::where('id', $produk->id)
            ->update($validateData);
        return redirect('/dashboard/produk')->with('success', ' Produk Sudah Berhasil Dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $image_path = public_path("\assets\img\\") . $produk->gambar;

        if (file_exists($image_path)) {

            @unlink($image_path);
        }
        Produk::destroy($produk->id);
        return redirect('/dashboard/produk')->with('success', ' Produk Berhasil Di Hapus!');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Produk::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
