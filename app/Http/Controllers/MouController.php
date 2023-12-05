<?php

namespace App\Http\Controllers;

use App\Models\Mou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MouController extends Controller
{
    public function index()
    {
        $mous = Mou::all();
        return view('admin.list.mou.index', compact('mous'));
    }

    public function edit($id)
    {
        try {
            $mou = Mou::FindOrFail($id);
            return view('admin.list.mou.edit', compact('mou'));
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('admin.list.mou.create');
    }


    public function store(Request $request)
    {
        try {
            $foto_name = $request->file('foto_mou')->hashName();
            $path = $request->file('foto_mou')->storeAs('Mou', $foto_name);
            Mou::create([
                'foto_mou' => $path,
                'nama_mou' => $request->nama_mou,
            ]);
            return to_route('mou.index')->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil mendaftarkan MoU'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => "Ada kesalahan saat mendaftarkan MoU"
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $Mou = Mou::where('id', $id)->first();

            if(!$Mou){
                return back()->with('message', [
                    'icon' => 'error',
                    'title' => 'Gagal!',
                    'text' => "ID MoU tidak ditemukan"
                ]);
            }

            $path = $Mou->foto_name;
            if ($request->hasFile('foto_mou')) {
                Storage::delete($Mou->foto_mou);
                $foto_name = $request->file('foto_mou')->hashName();
                $path = $request->file('foto_mou')->storeAs('Mou', $foto_name);
            } else {
                $foto_name = $Mou->foto_mou;
            }
            $Mou->foto_mou = $path;
            $Mou->nama_mou = $request->nama_mou;
            $Mou->save();
            return to_route('mou.index')->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil mendaftarkan MoU'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => "Ada kesalahan saat meupdate MoU"
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $Mou = Mou::where('id', $id)->first();

            if (!$Mou) {
                return back()->with('message', [
                    'icon' => 'error',
                    'title' => 'Gagal!',
                    'text' => "ID MoU tidak ditemukan"
                ]);
            }
            Storage::delete($Mou->foto_mou);
            $Mou->delete();
            return to_route('mou.index')->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil mendaftarkan MoU'
            ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => "Ada kesalahan saat menghapus MoU"
            ]);
        }
    }
}
