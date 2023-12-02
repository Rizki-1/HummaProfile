<?php

namespace App\Http\Controllers;

use App\Mail\InboxMail;
use App\Models\SiswaMagang;
use Illuminate\Http\Request;
use App\Mail\SiswaSetujuMail;
use App\Models\KelasIndustri;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PersetujuanRequest;
use App\Mail\TerimaIndustriMail;
use App\Mail\TolakIndustriMail;
use App\Mail\TolakSiswaMail;

class PersetujuanController extends Controller
{
    public function setujuSiswaMagang($id)
    {
        try {
            $siswa = SiswaMagang::findOrFail($id);
            $email = $siswa->email;
            $siswa->status = 'diterima';
            $siswa->save();
            $nama = $siswa->nama;
            $type = 'Siswa Magang';
            Mail::to($email)->send(new SiswaSetujuMail($nama, $type));
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
            $email = $siswa->email;
            $siswa->status = 'ditolak';
            $siswa->save();
            $nama = $siswa->nama;
            $type = "Siswa Magang";
            //kirim email
            Mail::to($email)->send(new TolakSiswaMail($nama, $type));
            return back()->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!!',
                'text' => "Penolakan siswa magang berhasil"
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
            $nama = $industri->nama_industri;
            $type = "Industri";
            //kirim email
            Mail::to($industri->email)->send(new TerimaIndustriMail($nama, $type));
            return back()->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!!',
                'text' => "Penerimaan kelas industri berhasil"
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
            $nama = $industri->nama_industri;
            $type = "Industri";
            //kirim email
            Mail::to($industri->email)->send(new TolakIndustriMail($nama, $type));
            return back()->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => "Penolakan kelas industri berhasil"
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
