<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCabangPerusahaanRequest;
use App\Http\Requests\UpdateCabangPerusahaanRequest;
use App\Models\CabangPerusahaan;
use Illuminate\Support\Facades\DB;

class CabangPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cabang = CabangPerusahaan::latest()->paginate(15);
        return view('admin.cabang_perusahaan.index', compact('cabang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cabang_perusahaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCabangPerusahaanRequest $request)
    {
        try {
            DB::beginTransaction();
                $cabangPerusahaan = new CabangPerusahaan;
                $cabangPerusahaan->name = $request->cabang_name;
                $cabangPerusahaan->latitude = $request->latitude;
                $cabangPerusahaan->longitude = $request->longitude;
                $cabangPerusahaan->save();

            DB::commit();
            return to_route('cabang-perusahaan.index')->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil menambahkan cabang baru!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'Ada kesalahan saat menambahkan cabang!'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $cabang = CabangPerusahaan::where('id', $id)->first();
        if(!$cabang){
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Error',
                'text' => "ID tidak ditemukan!"
            ]);
        }
        return view('admin.cabang_perusahaan.edit', compact('cabang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCabangPerusahaanRequest $request, int $id)
    {
        try {
            DB::beginTransaction();

            $cabangPerusahaan = CabangPerusahaan::where('id', $id)->first();
            if (!$cabangPerusahaan) {
                return back()->with('message', [
                    'icon' => 'error',
                    'title' => 'Gagal!',
                    'text' => 'ID cabang perusahaan tidak ditemukan!'
                ]);
            }

            $cabangPerusahaan->name = $request->cabang_name;
            $cabangPerusahaan->latitude = $request->latitude;
            $cabangPerusahaan->longitude = $request->longitude;
            $cabangPerusahaan->save();

            DB::commit();
            return to_route('cabang-perusahaan.index')->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil meupdate cabang perusahaan!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'Ada kesalahan saat meupdate cabang perusahaan!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            DB::beginTransaction();
            $cabangPerusahaan = CabangPerusahaan::where('id', $id)->first();
            $nameCabang = $cabangPerusahaan->name;
            if (!$cabangPerusahaan) {
                return back()->with('message', [
                    'icon' => 'error',
                    'title' => 'Gagal!',
                    'text' => 'ID cabang perusahaan tidak ditemukan!'
                ]);
            }

            $cabangPerusahaan->delete();

            DB::commit();
            return back()->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => "Berhasil mehapus cabang perusahaan $nameCabang"
            ]);
        } catch (\Exception $th) {
            DB::rollBack();
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'Ada kesalahan saat mehapus cabang perusahaan!!'
            ]);
        }
    }
}
