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
                return response()->json(['response' => ['success' => false]]);
            }

            $pendaftar->delete();

            DB::commit();
            return response()->json(['response' => ['success' => true]]);
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json(['response' => ['success' => false, 'message' => "Ada kesalahan server"]]);
        }
    }
    public function kelasIndustri(){
        $siswa = SiswaMagang::latest()->where('status', 'diterima')->paginate(1);
        return view("admin.list.siswa-magang",compact("siswa"));
    }
    function kelasIndustriDel($id){
        try {
            DB::beginTransaction();
            $pendaftar = KelasIndustri::where("id",$id)->first();
            if(!$pendaftar){
                return response()->json(['response' => ['success' => false]]);
            }

            $pendaftar->delete();

            DB::commit();
            return response()->json(['response' => ['success' => true]]);
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json(['response' => ['success' => false, 'message' => "Ada kesalahan server"]]);
        }
    }
}
