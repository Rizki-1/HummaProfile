<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use App\Models\SiswaMagang;
use Illuminate\Http\Request;
use App\Models\KelasIndustri;
use App\Models\TargetLayanan;
use App\Models\LayananPerusahaan;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function home()
    {
        return view('home');
    }

    public function indexSiswa()
    {
        return view('user.pendidikan.siswa');
    }

    public function indexIndustri()
    {
        return view('user.pendidikan.industri');
    }

    public function indexProduk()
    {
        return view('user.produk.index');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

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

    public function test()
    {
        $sosmeds = Sosmed::all();
        return view('admin.createsosmed', compact('sosmeds'));
    }

    public function update()
    {
        $sosmed = Sosmed::all();
        // dd($sosmed);
        return view('admin.editsosmed', compact('sosmed'));
    }
}
