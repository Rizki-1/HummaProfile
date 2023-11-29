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
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function tolakSiswaMagang($id)
    {
        try {
            $siswa = SiswaMagang::findOrfail($id);
            $siswa->status = 'ditolak';
            $siswa->save();
            //kirim email
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function terimaIndustri($id)
    {
        // try {
            $industri = KelasIndustri::findOrFail($id);
            $industri->status = 'di terima';
            $industri->save();
            //kirim email
            return redirect()->back();
        // } catch (\Throwable $th) {
        //     return redirect()->back();
        // }
    }

    public function tolakIndustri($id)
    {
        try {
            $industri = KelasIndustri::findOrFail($id);
            $industri->status = 'di tolak';
            $industri->save();
            //kirim email
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
