<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Sosmed;
use App\Models\SiswaMagang;
use Illuminate\Http\Request;
use App\Models\KelasIndustri;
use App\Models\TargetLayanan;
use App\Models\LayananPerusahaan;
use App\Models\ProfileCompany;

class HomeController extends Controller
{

    // User Controller
    public function index()
    {
        $sosmed = Sosmed::all();
        $profile = ProfileCompany::all();
        $berita = Berita::latest()->get();
        $layanan = LayananPerusahaan::latest()->get();
        return view('user.index', compact('sosmed', 'profile', 'berita', 'layanan'));
    }

    public function home()
    {
        return view('home');
    }

    public function indexSiswa()
    {
        $sosmed = Sosmed::all();
        $profile = ProfileCompany::all();
        return view('user.pendidikan.siswa', compact('sosmed', 'profile'));
    }

    public function indexIndustri()
    {
        $sosmed = Sosmed::all();
        $profile = ProfileCompany::all();
        return view('user.pendidikan.industri', compact('sosmed', 'profile'));
    }

    public function indexProduk()
    {
        $sosmed = Sosmed::all();
        $profile = ProfileCompany::all();
        return view('user.produk.index', compact('sosmed', 'profile'));
    }

    public function indexContact()
    {
        $sosmed = Sosmed::all();
        $profile = ProfileCompany::all();
        return view('user.hubungi.index', compact('sosmed', 'profile'));
    }

    public function indexBerita()
    {
        $berita = Berita::latest()->get();
        $sosmed = Sosmed::all();
        $profile = ProfileCompany::all();
        return view('user.berita.index', compact('berita', 'sosmed', 'profile'));
    }

    public function indexLayanan()
    {
        $sosmed = Sosmed::all();
        $profile = ProfileCompany::all();
        $layanan = LayananPerusahaan::latest()->get();
        return view('user.layanan.index', compact('sosmed', 'profile', 'layanan'));
    }
    // End User Controller

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
