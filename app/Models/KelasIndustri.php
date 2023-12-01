<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasIndustri extends Model
{
    use HasFactory;
    protected $table = 'kelas_industris';
    protected $fillable = [
        'nama_industri',
        'jenis_industri',
        'email',
        'alamat',
        'document',
        'status'
    ];
}
