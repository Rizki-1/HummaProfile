<?php

namespace App\Http\Controllers;

use App\Models\SiswaMagang;
use Illuminate\Http\Request;
use App\Models\KelasIndustri;
use App\Http\Requests\PersetujuanRequest;

class PersetujuanController extends Controller
{
    public function setujuSiswaMagang($id)
    {
        try {
            $siswa = SiswaMagang::findOrFail($id);
            $siswa->status = 'diterima';
            $siswa->save();
            //kirim email
            return back()->with('message', [
                'icon' => 'success',
                'title' => 'Berhasi!!',
                'text' => "Berhasil menerima Siswa"
            ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => "Ada kesalahan server, gagal menerima siswa"
            ]);
        }
    }

    public function tolakSiswaMagang($id)
    {
        try {
            $siswa = SiswaMagang::findOrfail($id);
            $siswa->status = 'ditolak';
            $siswa->save();
            //kirim email
            return back()->with('message', [
                'icon' => 'succedd',
                'title' => 'Berhasil!!',
                'text' => "Berhasil menolak Siswa"
            ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => "Ada kesalahan server, gagal menolak Siswa"
            ]);
        }
    }

    public function terimaIndustri($id)
    {
        try {
            $industri = KelasIndustri::findOrFail($id);
            $industri->status = 'diterima';
            $industri->save();
            //kirim email
            return back()->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!!',
                'text' => "Berhasil menerima Industri"
            ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => "Ada kesalahan server, gagal menerima industri"
            ]);
        }
    }

    public function tolakIndustri($id)
    {
        try {
            $industri = KelasIndustri::findOrFail($id);
            $industri->status = 'ditolak';
            $industri->save();
            //kirim email
            return back()->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => "Berhasil menolak Industri"
            ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => "Ada kesalahan server, gagal menolak industri"
            ]);
        }
    }
}
