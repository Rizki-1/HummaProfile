<?php

namespace App\Models;

use App\Models\Logo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sosmed extends Model
{
    use HasFactory;
    protected $table = 'sosmeds';
    protected $guarded = [];

    /**
     * Get the logo associated with the Sosmed
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function profile(): BelongsToMany{
        return $this->belongsToMany(ProfileCompany::class);
    }
}
