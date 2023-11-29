<?php

namespace App\Http\Controllers;

use App\Models\SiswaMagang;
use Illuminate\Http\Request;
use App\Models\KelasIndustri;

class FormController extends Controller
{
    public function SiswaMagangStore(Request $request)
    {

        SiswaMagang::create([
            'nama' => $request->nama,
            'asal_sekolah' => $request->asal_sekolah,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);

        return redirect()->back();
    }

    public function IndustriStore(Request $request)
    {

        KelasIndustri::create([
            'nama_industri' => $request->nama_industri,
            'jenis_industri' => $request->jenis_industri,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);
        return redirect()->back();
    }
}
