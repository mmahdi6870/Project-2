<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Produk;
use App\Models\Category;
use App\Models\Rating;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $produk = Produk::latest();
        $tampil = $request->input('tampil');
        return view('produk.index', [
            'title' => 'Produk || Forever19',
            'produk' => $produk->filter(request(['search', 'category', 'merek']))->paginate($tampil),
            'category' => Category::all(),
            'merek' => Merek::all(),

        ]);
    }

    public function sendiri(Category $category)
    {
        return view('produk.index', [
            'title' => $category->name,
            'produk' => $category->produk,
            'category' => Category::all(),
            'merek' => Merek::all()
        ]);
    }
}
