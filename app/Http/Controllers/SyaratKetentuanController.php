<?php

namespace App\Http\Controllers;

use App\Models\SyaratKetentuan;
use Illuminate\Http\Request;

class SyaratKetentuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.syaratKetentuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach($request->input('categori-group') as $group)
        {
            $groupData = [
                'target_layanan_id' => $request->target_layanan_id,
                'syarat_ketentuan' => $group['syarat'],
            ];
            SyaratKetentuan::create($groupData);
            return redirect()->back()->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil menambahkan cabang baru!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $syarat = SyaratKetentuan::findOrFail($id);
            $syarat->target_layanan_id = $request->target_layanan_id;
            $syarat->syarat_kententuan = $request->syarat;
            $syarat->save();
            return redirect()->back()->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil menambahkan cabang baru!'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', [
                'icon' => 'error',
                'title' => 'gagal!',
                'text' => 'gagal mengupdate data'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $syarat = SyaratKetentuan::findOrFail($id);
            $syarat->delete();
            return redirect()->back()->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil menambahkan cabang baru!'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'gagal menghapus data!'
            ]);
        }
    }
}
