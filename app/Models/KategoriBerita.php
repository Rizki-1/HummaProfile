<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class KategoriBerita extends Model
{
    use HasFactory;
    public function beritas(): BelongsToMany
    {
        return $this->belongsToMany(Berita::class, 'berita_kategoris');
    }
}
