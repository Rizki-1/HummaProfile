<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProfileCompany extends Model
{
    use HasFactory;
    protected $table = 'profile_companies';
    protected $guarded = [];

    public function sosmed(): HasMany
    {
        return $this->hasMany(Sosmed::class);
    }
}
