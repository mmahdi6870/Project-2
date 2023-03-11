<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Produk extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filtters)
    {

        $query->when($filtters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        });
        $query->when($filtters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
        $query->when($filtters['merek'] ?? false, function ($query, $merek) {
            return $query->whereHas('merek', function ($query) use ($merek) {
                $query->where('slug', $merek);
            });
        });
    }


    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'produk_id');
    }
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function merek()
    {
        return $this->belongsTo(Merek::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
