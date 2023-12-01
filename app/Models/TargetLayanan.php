<?php

namespace App\Models;

use App\Models\LayananPerusahaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TargetLayanan extends Model
{
    use HasFactory;
    protected $table = 'target_layanans';
    protected $fillable = [
        'target',
    ];

    /**
     * Get all of the layanan for the TargetLayanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function layanan(): HasMany
    {
        return $this->hasMany(LayananPerusahaan::class);
    }
}
