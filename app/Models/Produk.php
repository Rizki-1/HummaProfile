<?php

namespace App\Models;

use App\Models\GaleryProduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $fillable = [
        'nama_produk',
        'foto_produk',
        'keterangan_produk',
        'link',
        'dibuat',
    ];

    public function galery(): HasMany
    {
        return $this->hasMany(GaleryProduk::class);
    }

}
