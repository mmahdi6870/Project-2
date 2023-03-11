<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.category.index', [
            'active' => 'kategori',
            'title' => 'Kategori || Forever19',
            'category' => Category::all(),
            'judul' => 'Kategori',
            'api' => 'category'
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
            'active' => 'kategori',
            'title' => 'Kategori || Forever19',
            'judul' => 'Kategori',
            'api' => 'category'
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
            'slug' => 'required|unique:categories',
            'image' => 'image|file|max:3072',
        ];
        $message = [
            'name.required' => 'Nama Kategori tidak boleh kosong!',
            'slug.required' => 'Field ini tidak boleh kosong!',
            'image.max' => 'Gambar Produk Tidak Boleh Melebihi 3MB',
            'image.file' => ' File Yang anda masukan bukan gambar!',
            'image.image' => ' File Yang anda masukan bukan gambar!'

        ];
        $validateData = $request->validate($rules, $message);
        if ($request->file('image') === Null) {
            return redirect('/dashboard/category/create')->with('success', 'Image Kategori Harus diisi!');
        }
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/assets/img'), $filename);
            $validateData['image'] = $filename;
        }

        Category::create($validateData);
        return redirect('/dashboard/category')->with('success', 'Kategori Baru sudah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', [
            'active' => 'kategori',
            'title' => 'Kategori || Forever19',
            'category' => $category,
            'judul' => 'Kategori',
            'api' => 'category'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|max:255',
            'image' => 'image|file|max:1024',
        ];
        $message = [
            'name.required' => 'Nama Kategori tidak boleh kosong!',
            'image.max' => 'Gambar Kategori Tidak Boleh Melebihi 3MB',
            'slug.required' => 'Field ini tidak boleh kosong!',
            'image.file' => ' File Yang anda masukan bukan gambar!',
            'image.image' => ' File Yang anda masukan bukan gambar!'

        ];
        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validateData = $request->validate($rules, $message);
        if ($request->file('image')) {
            $image_path = public_path("\assets\img\\") . $category->image;
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/assets/img'), $filename);
            $validateData['image'] = $filename;
        }


        Category::where('id', $category->id)
            ->update($validateData);
        return redirect('/dashboard/category')->with('success', ' Kategori Sudah Berhasil Dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $image_path = public_path("\assets\img\\") . $category->image;

        if (file_exists($image_path)) {
            @unlink($image_path);
        }
        Category::destroy($category->id);
        return redirect('/dashboard/category')->with('success', ' Kategori Berhasil Di Hapus!');
    }
}
