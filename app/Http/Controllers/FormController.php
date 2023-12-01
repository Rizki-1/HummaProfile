<?php

namespace App\Http\Controllers;

use App\Models\SiswaMagang;
use Illuminate\Http\Request;
use App\Models\KelasIndustri;
use App\Http\Requests\IndustriStore;
use App\Http\Requests\SiswaMagangStore;

class FormController extends Controller
{
    public function SiswaMagangStore(SiswaMagangStore $request)
    {
        $document_name = $request->file('document')->hashName();
        $document = $request->file('document')->storeAs('siswa', $document_name);
        SiswaMagang::create([
            'nama' => $request->nama,
            'asal_sekolah' => $request->asal_sekolah,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'document' => $document_name,
            'email' => $request->email,
        ]);

        return redirect()->back();
    }

    public function IndustriStore(IndustriStore $request)
    {
        $document_name = $request->file('document')->hashName();
        $document = $request->file('document')->storeAs('industri', $document_name);
        KelasIndustri::create([
            'nama_industri' => $request->nama_industri,
            'jenis_industri' => $request->jenis_industri,
            'email' => $request->email,
            'document' => $document,
            'alamat' => $request->alamat,
        ]);
        return redirect()->back();
    }
}
