<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'pesanan_id');
    }
    public function bukti()
    {
        return $this->belongsTo(bukti::class, 'id', 'pesanan_id');
    }
}
