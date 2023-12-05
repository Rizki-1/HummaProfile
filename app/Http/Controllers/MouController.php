<?php

namespace App\Http\Controllers;

use App\Models\Mou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MouController extends Controller
{
    public function get()
    {
        $mous = Mou::all();
        return view('admin.list.Mou', compact('mous'));
    }

    public function edit($id)
    {
        try {
            $mou = Mou::FindOrFail($id);
            return view('admin.list.Mou_edit', compact('mou'));
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('admin.list.Mou_create');
    }


    public function MouStore(Request $request)
    {
        $foto_name = $request->file('foto_mou')->hashName();
        $path = $request->file('foto_mou')->storeAs('Mou', $foto_name);
        Mou::create([
            'foto_mou' => $foto_name,
            'nama_mou' => $request->nama_mou,
        ]);
        return redirect()->route('mou.index');
    }

    public function MouUpdate(Request $request, $id)
    {
        try {
            $Mou = Mou::FindOrFail($id);
            if ($request->hasFile('foto_mou')) {
                Storage::delete('Mou/'.$Mou->foto_mou);
                $foto_name = $request->file('foto_mou')->hashName();
                $path = $request->file('foto_mou')->storeAs('Mou', $foto_name);
            }else {
                $foto_name = $Mou->foto_mou;
            }
            $Mou->foto_mou = $foto_name;
            $Mou->nama_mou = $request->nama_mou;
            $Mou->save();
            return redirect()->route('mou.index');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function deleteMou($id)
    {
        try {
            $Mou = Mou::FindOrFail($id);
            Storage::delete('Mou/'.$Mou->foto_mou);
            $Mou->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
           return redirect()->back();
        }
    }
}
