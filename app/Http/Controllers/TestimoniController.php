<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function index(Request $request)
    {
        $testimoni = Testimoni::orderBy('created_at', 'desc');
        if ($request->has('query') && !empty($request->input('query'))) {
            $testimoni->where('nama', 'LIKE', '%' . $request->input('query') . '%')
                ->orWhere('asal_sekolah', 'LIKE', '%' . $request->input('query') . '%');
        }

        $testimoni = $testimoni->paginate(10);
        return view('admin.list.testimoni.index', compact('testimoni'));
    }

    public function edit($id)
    {
        try {
            $test = Testimoni::FindOrFail($id);
            return view('admin.list.testimoni.edit', compact('test'));
        } catch (\Throwable $th) {
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => "Ada kesalahan saat mau me edit MoU"
            ]);
        }
    }

    public function create()
    {
        return view('admin.list.testimoni.create');
    }


    public function store(Request $request)
    {
        $namaFoto = $request->file('foto_siswa')->hashName();
        $path = $request->file('foto_siswa')->storeAs('testimoni', $namaFoto);
        Testimoni::create([
            'nama' => $request->nama,
            'foto_siswa' => $path,
            'asal_sekolah' => $request->asal_sekolah,
            'testimoni' => $request->testimoni,
        ]);
        return to_route('testimoni.index')->with('message', [
            'icon' => 'success',
            'title' => "Berhasil!",
            'text' => "Berhasil membuat testimoni"
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $testimoni = Testimoni::where('id', $id)->first();

            if (!$testimoni) {
                return back()->with('message', [
                    'icon' => 'error',
                    'title' => 'Gagal!',
                    'text' => "ID testimoni tidak di temukan!"
                ]);
            }

            if ($request->hasFile('foto_siswa')) {
                Storage::delete($testimoni->foto_siswa);
                $fotoname = $request->file('foto_siswa')->hashName();
                $path = $request->file('foto_siswa')->storeAs('testimoni', $fotoname);
            } else {
                $path = $testimoni->foto_siswa;
            }
            $testimoni->nama = $request->nama;
            $testimoni->foto_siswa = $path;
            $testimoni->asal_sekolah = $request->asal_sekolah;
            $testimoni->testimoni = $request->testimoni;
            $testimoni->save();

            DB::commit();
            return to_route('testimoni.index')->with('message', [
                'icon' => 'success',
                'title' => "Berhasil!",
                'text' => "Berhasil meupdate testimoni"
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => "ID testimoni tidak di temukan!"
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $testimoni = Testimoni::where('id',$id)->first();

            if (!$testimoni) {
                return back()->with('message', [
                    'icon' => 'error',
                    'title' => 'Gagal!',
                    'text' => "ID testimoni tidak di temukan!"
                ]);
            }

            Storage::delete($testimoni->foto_siswa);
            $testimoni->delete();

            DB::commit();
            return to_route('testimoni.index')->with('message', [
                'icon' => 'success',
                'title' => "Berhasil!",
                'text' => "Berhasil meupdate testimoni"
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => "ID testimoni tidak di temukan!"
            ]);
        }
    }
}
