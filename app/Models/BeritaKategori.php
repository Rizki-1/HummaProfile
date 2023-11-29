<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaKategori extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function kategori()
    {
        return $this->Many(KategoriBerita::class, 'berita_kategori', 'berita_id', 'kategori_id');
    }
}
