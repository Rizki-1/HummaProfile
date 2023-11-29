<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KategoriBerita extends Model
{
    use HasFactory;
    public function berita(): HasOne{
        return $this->hasOne(Berita::class,"id");
    }
}
