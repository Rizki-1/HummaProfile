<?php

namespace App\Http\Controllers;

use App\Models\KelasIndustri;
use App\Models\SiswaMagang;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function persetujuanSiswa()
    {
        $siswas = SiswaMagang::where('status', 'menunggu')->get();

        return view('admin.persetujuan.siswa', compact('siswas'));
    }

    public function persetujuanIndustri()
    {
        $industris = KelasIndustri::where('status', 'menunggu')->get();

        return view('admin.persetujuan.industri', compact('industris'));
    }
}
