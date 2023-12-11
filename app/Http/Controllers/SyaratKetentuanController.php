<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TargetLayanan;
use App\Models\SyaratKetentuan;
use App\Models\LayananPerusahaan;
use App\Http\Requests\SyaratRequest;
use App\Http\Requests\SyaratUpdateRequest;

class SyaratKetentuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $syarat = SyaratKetentuan::query();

        if ($request->has('ct')) {
            if ($request->ct === 'all') {

            } else {
                $syarat->where('target_layanan_id', $request->ct);
            }
        }

        if ($request->has('query')) {
            $syarat->where('syarat_ketentuan', 'LIKE', '%' . $request->input('query') . '%');
        }


        $syarat = $syarat->paginate(10);

        return view('admin.syaratKetentuan.index', compact('syarat'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layanan = TargetLayanan::all();
        return view('admin.syaratKetentuan.create', compact('layanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SyaratRequest $request)
    {
        foreach($request->input('syarat-group') as $group)
        {
            $groupData = [
                'target_layanan_id' => $request->target_layanan_id,
                'syarat_ketentuan' => $group['syarat'],
            ];
            SyaratKetentuan::create($groupData);
        }
        return redirect()->route('syarat-dan-ketentuan.index')->with('message', [
            'icon' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Berhasil menambahkan cabang baru!'
        ]);
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
        $syarat = SyaratKetentuan::findOrFail($id);
        $layanan = TargetLayanan::all();
        return view('admin.syaratKetentuan.edit', compact('syarat', 'layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SyaratUpdateRequest $request, string $id)
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
