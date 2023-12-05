<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mou extends Model
{
    use HasFactory;
    protected $table = 'mous';
    protected $fillable = [
        'foto_mou',
        'nama_mou'
    ];
}
