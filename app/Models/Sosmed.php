<?php

namespace App\Models;

use App\Models\Logo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sosmed extends Model
{
    use HasFactory;
    protected $table = 'sosmeds';
    protected $fillable = [
        'nama_sosmed',
        'link',
    ];

    /**
     * Get the logo associated with the Sosmed
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function logo(): HasOne
    {
        return $this->hasOne(Logo::class);
    }
}
