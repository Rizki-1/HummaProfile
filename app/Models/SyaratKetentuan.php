<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SyaratKetentuan extends Model
{
    use HasFactory;
    protected $table = 'syarat_ketentuans';
    protected $fillable = [
        'target_layanan_id',
        'syarat_ketentuan'
    ];

    /**
     * Get the user that owns the SyaratKetentuan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function target(): BelongsTo
    {
        return $this->belongsTo(TargetLayanan::class,);
    }
}
