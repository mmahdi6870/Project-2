<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Produk;
use App\Models\Category;
use Illuminate\Http\Request;

class HomesController extends Controller
{


    public function index()
    {

        $p = Produk::latest()->get();
        $hitung = $p[0]->rating->count();
        $hitung2 = $p[1]->rating->count();
        $hitung3 = $p[2]->rating->count();
        $hes = $p[0]->rating->sum('star');
        $hes2 = $p[1]->rating->sum('star');
        $hes3 = $p[2]->rating->sum('star');
        if ($hitung > 0) {
            $rating_value = $hes / $hitung;
        } else {
            $rating_value = 0;
        }
        if ($hitung2 > 0) {
            $rating_value2 = $hes2 / $hitung2;
        } else {
            $rating_value2 = 0;
        }
        if ($hitung3 > 0) {
            $rating_value3 = $hes3 / $hitung3;
        } else {
            $rating_value3 = 0;
        }

        return view('Home', [
            'title' => 'Home || Forever19',
            'category' => Category::all(),
            'produk' => Produk::latest()->get(),
            'merek' => Merek::all(),
            'h' => $hitung,
            'h2' => $hitung2,
            'h3' => $hitung3,
            'hes' => $rating_value,
            'hes2' => $rating_value2,
            'hes3' => $rating_value3,
        ]);
    }
}
