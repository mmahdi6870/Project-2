<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id', 'pesanan_id');
    }
    public function produk()
    {
        return $this->hasMany(Produk::class, 'id', 'produk_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
