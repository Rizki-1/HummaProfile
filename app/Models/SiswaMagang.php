<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaMagang extends Model
{
    use HasFactory;
    protected $table = 'siswa_magangs';
    protected $fillable = [
        'nama',
        'asal_sekolah',
        'jurusan',
        'kelas',
        'alamat',
        'document',
        'email',
    ];
}
