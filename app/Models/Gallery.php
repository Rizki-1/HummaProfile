<?php

namespace App\Models;

use App\Models\LayananPerusahaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'galleries';
    protected $fillable = [
        'picture',
        'target_layanan_id',
    ];

    public function layanan(): HasMany
    {
        return $this->hasMany(LayananPerusahaan::class);
    }


}
