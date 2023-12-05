<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function get()
    {
        $testimoni = Testimoni::all();
        return view('admin.testimoni',compact('testimoni'));
    }

    public function edit($id)
    {
        try {
            $test = Testimoni::FindOrFail($id);
            return view('admin.testimonidelete',compact('test'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function create()
    {
        return view();
    }


    public function TestimoniStore(Request $request)
    {
        $namaFoto = $request->file('foto_siswa')->hashName();
        $path = $request->file('foto_siswa')->storeAs('testimoni', $namaFoto);
        Testimoni::create([
            'nama' => $request->nama,
            'foto_siswa' => $path,
            'asal_sekolah' => $request->asal_sekolah,
            'testimoni' => $request->testimoni,
        ]);
        return redirect()->back();
    }

    public function TestimoniUpdate(Request $request, $id)
    {
        try {
            $testimoni = Testimoni::FindOrFail($id);
            if ($request->hasFile('foto_siswa')) {
                Storage::delete('testimoni/'.$testimoni->foto_siswa);
                $fotoname = $request->file('foto_siswa')->hashName();
                $path = $request->file('foto_siswa')->storeAs('testimoni',$fotoname);
            }else{
                $path = $testimoni->foto_siswa;
            }
            $testimoni->nama = $request->nama;
            $testimoni->foto_siswa = $path;
            $testimoni->asal_sekolah = $request->asal_sekolah;
            $testimoni->testimoni = $request->testimoni;
            $testimoni->save();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function deleteTestimoni($id)
    {
        try {
            $testimoni = Testimoni::FindOrFail($id);
            Storage::delete('testimoni/'.$testimoni->foto_siswa);
            $testimoni->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
