<?php

namespace App\Models;

use App\Models\TargetLayanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LayananPerusahaan extends Model
{
    use HasFactory;
    protected $table = 'layanan_perusahaans';
    protected $fillable = [
        'target_layanan_id',
        'nama_layanan',
        'descripsi_layanan'
    ];

    /**
     * Get the targetlayanan that owns the LayananPerusahaan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function targetlayanan(): BelongsTo
    {
        return $this->belongsTo(TargetLayanan::class);
    }
}
