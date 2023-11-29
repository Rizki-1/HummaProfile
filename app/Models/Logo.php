<?php

namespace App\Models;

use App\Models\Sosmed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Logo extends Model
{
    use HasFactory;
    protected $table = 'logos';
    protected $fillable =
    [
        'sosmed_id',
        'foto_logo'
    ];

    /**
     * Get the sosmed that owns the Logo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sosmed(): BelongsTo
    {
        return $this->belongsTo(Sosmed::class);
    }
}
