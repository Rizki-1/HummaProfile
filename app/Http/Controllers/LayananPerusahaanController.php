<?php

namespace App\Http\Controllers;

use App\Models\LayananPerusahaan;
use App\Models\TargetLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayananPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $layanan = LayananPerusahaan::latest();

        if ($request->input('query')) {
            $layanan->where('layanan', 'LIKE', '%' . $request->input('query') . '%');
        }

        $targetLayananId = is_null($request->ct) ? 1 : 2;
        $layanan->where('target_layanan_id', $targetLayananId);

        $layanan = $layanan->paginate(1);

        return view('admin.pengaturan.layanan.index', compact('layanan'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengaturan.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();

            foreach ($request->input("layanan-group") as $row) {
                LayananPerusahaan::create([
                    'target_layanan_id' => $row['target_layanan_id'],
                    'layanan' => $row['layanan']
                ]);
            }

            DB::commit();
            return to_route('layanan-perusahaan.index')->with('message', [
                'icon' => 'success',
                'title' => "Berhasil!",
                'text' => "Berhasil membuat Layanan baru!"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => "Ada kesalahan server, gagal membuat Layanan baru"
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction();

            $layanan = LayananPerusahaan::where('id', $id)->first();
            if (!$layanan) {
                return response()->json(['response' => ['success' => false]]);
            }
            $layanan->layanan = $request->layanan;
            $layanan->target_layanan_id = $request->target_layanan_id;
            $layanan->save();

            DB::commit();
            return response()->json(['response' => ['success' => true]]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['response' => ['success' => false, 'message' => $th->getMessage()]]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            $layanan = LayananPerusahaan::where('id', $id)->first();
            if (!$layanan) {
                return response()->json(['response'=> ['success'=> false]]);
            }
            $layanan->delete();

            DB::commit();
            return response()->json(['response'=> ['success'=> true]]);
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json(['response'=> ['success'=> false,]]);
        }
    }
}
