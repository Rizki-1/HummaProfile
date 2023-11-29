<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileCompany extends Model
{
    use HasFactory;
    protected $table = 'profile_companies';
    protected $fillable = [
        'nama_company',
        'alamat',
        'detail',
        'email',
    ];
}