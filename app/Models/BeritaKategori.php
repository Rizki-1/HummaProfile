<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BeritaKategori extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_berita_id');
    }

    public function berita()
    {
        return $this->belongsTo(Berita::class, 'berita_id');
    }
}
