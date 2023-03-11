<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.category.index', [
            'active' => 'merek',
            'title' => 'Merek Produk || Forever19',
            'category' => Merek::all(),
            'judul' => 'Merek',
            'api' => 'merek'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create', [
            'active' => 'merek',
            'title' => 'Merek Produk || Forever19',
            'judul' => 'Merek',
            'api' => 'merek'
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
            'name' => 'required|max:255',
            'slug' => 'required|unique:mereks',

        ];
        $message = [
            'name.required' => 'Nama Kategori tidak boleh kosong!',
            'slug.required' => 'Field ini tidak boleh kosong!'
        ];
        $validateData = $request->validate($rules, $message);
        Merek::create($validateData);
        return redirect('/dashboard/merek')->with('success', 'Merek Baru sudah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function show(Merek $merek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function edit(Merek $merek)
    {
        return view('dashboard.category.edit', [
            'active' => 'merek',
            'title' => 'Merek Produk || Forever19',
            'category' => $merek,
            'judul' => 'Merek',
            'api' => 'merek'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merek $merek)
    {
        $rules = [
            'name' => 'required|max:255',
            'image' => 'image|file|max:1024',
        ];
        $message = [
            'name.required' => 'Nama Kategori tidak boleh kosong!',
            'slug.required' => 'Field ini tidak boleh kosong!',


        ];
        if ($request->slug != $merek->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validateData = $request->validate($rules, $message);
        Merek::where('id', $merek->id)
            ->update($validateData);
        return redirect('/dashboard/merek')->with('success', ' Merek Produk Sudah Berhasil Dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merek $merek)
    {

        Merek::destroy($merek->id);
        return redirect('/dashboard/merek')->with('success', ' Merek Produk Berhasil Di Hapus!');
    }
}
