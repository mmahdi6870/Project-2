<?php

use App\Models\Merek;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PembelianController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomesController::class, 'index']);
//login
Route::get('/login', [LoginController::class, 'index']);
Route::Post('/login/check', [LoginController::class, 'check']);
Route::Post('/logout', [LoginController::class, 'logout']);

//register
Route::get('/register', [RegisterController::class, 'index']);
Route::POST('/register/store', [RegisterController::class, 'store']);

//dashboard
Route::get('/dashboard', [DashController::class, 'index'])->middleware('auth');
Route::get('/edit', [DashController::class, 'edit'])->middleware('auth');
Route::PUT('/dashboard/ubahdata', [DashController::class, 'ubah'])->middleware('auth');
Route::PUT('/dashboard/ubahpass/{user:iduser}', [DashController::class, 'ubahpass'])->middleware('auth');
Route::get('/editpass', [DashController::class, 'editpass'])->middleware('auth');
Route::get('/dashboard/alamat', [DashController::class, 'alamat'])->middleware('auth');
Route::get('/dashboard/alamat/store', [DashController::class, 'store'])->middleware('auth');


//product
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{category:slug}', [ProductController::class, 'sendiri'])->middleware('auth');
Route::resource('/dashboard/produk', ProdukController::class);
Route::get('/dashboard/checkSlug', [ProdukController::class, 'checkSlug']);

//keranjang
Route::get('/dashboard/keranjang', [PembelianController::class, 'index']);
Route::post('/dashboard/keranjang/pembayaran/{user:id}', [PembelianController::class, 'pembayaran']);
Route::delete('/dashboard/keranjang/hapus/{pembelian:id}', [PembelianController::class, 'hapus']);
Route::Post('/dashboard/keranjangs/{produk:id}', [PembelianController::class, 'addstore']);

//category
Route::resource('/dashboard/category', CategoryController::class)->middleware('auth')->middleware('admin');
Route::resource('/dashboard/merek', MerekController::class)->middleware('auth')->middleware('admin');

//pesanan
Route::get('/dashboard/pesanan', [PesananController::class, 'index'])->middleware('auth')->middleware('admin');
Route::POST('/dashboard/bukti/{user:id}', [PembelianController::class, 'bukti'])->middleware('auth');
Route::get('/dashboard/keranjang/daftarPesanan', [PesananController::class, 'pelanggan'])->middleware('auth');
Route::get('/bukti/{pesanan:id}', [PesananController::class, 'bukti'])->middleware('auth');
Route::delete('/dashboard/bukti/delete/{pesanan:id}', [PesananController::class, 'delbk'])->middleware('auth');
Route::post('/dashboard/addbukti/{pesanan:id}', [PesananController::class, 'storebukti'])->middleware('auth');
Route::put('/dashboard/dibayar/{pesanan:id}', [PesananController::class, 'dibayar'])->middleware('auth')->middleware('admin');
Route::put('/dashboard/dikirim/{pesanan:id}', [PesananController::class, 'dikirim'])->middleware('auth')->middleware('admin');


//download
Route::POST('/download/{bukti:pesanan_id}', [PesananController::class, 'download'])->middleware('auth');

//barang
Route::POST('/download/{bukti:pesanan_id}', [PesananController::class, 'download'])->middleware('auth');

//rating
Route::Post('/rating/save/{produk:id}', [RatingController::class, 'save']);
