<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GaleryProduk extends Model
{
    use HasFactory;
    protected $table = 'galery_produks';
    protected $fillable = [
        'produk_id',
        'galery',
    ];

    /**
     * Get the Produk that owns the galery_produk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'foreign_key', 'other_key');
    }
}
