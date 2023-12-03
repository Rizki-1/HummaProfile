<?php

namespace App\Http\Controllers;

use App\Models\KelasIndustri;
use App\Models\SiswaMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function siswaMagang(){
        $siswa = SiswaMagang::latest()->where('status', 'diterima')->paginate(1);
        return view("admin.list.siswa-magang",compact("siswa"));
    }
    function siswaMagangDel($id){
        try {
            DB::beginTransaction();
            $pendaftar = SiswaMagang::where("id",$id)->first();
            if(!$pendaftar){
                return back()->with('message', [
                    'icon' => 'error',
                    'title' => 'Gagal!',
                    'text' => 'ID list siswa magang tidak ditemukan!'
                ]);
            }

            $pendaftar->delete();

            DB::commit();

            return back()->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'berhasil menghapus list siswa magang!'
            ]);
        } catch (\Exception $th) {
            DB::rollBack();
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'Ada kesalahan saat menghapus list siswa magang!'
            ]);
        }
    }
    public function kelasIndustri(){
        $industri = KelasIndustri::latest()->where('status', 'diterima')->paginate(1);
        return view("admin.list.kelas-industri",compact("industri"));
    }
    function kelasIndustriDel($id){
        try {
            DB::beginTransaction();
            $pendaftar = KelasIndustri::where("id",$id)->first();
            if(!$pendaftar){
                return back()->with('message', [
                    'icon' => 'error',
                    'title' => 'Gagal!',
                    'text' => 'ID list kelas industri siswa magang!'
                ]);
            }

            $pendaftar->delete();

            DB::commit();
            return back()->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil mengapus list kelas industri!'
            ]);
        } catch (\Exception $th) {
            DB::rollBack();
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'Ada kesalahan saat menghapus siswa magang!'
            ]);
        }
    }
}
