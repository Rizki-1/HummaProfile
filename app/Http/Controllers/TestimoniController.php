<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

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
        Testimoni::create([
            'nama' => $request->nama,
            'testimoni' => $request->testimoni,
        ]);
        return redirect()->back();
    }

    public function TestimoniUpdate(Request $request, $id)
    {
        try {
            $testimoni = Testimoni::FindOrFail($id);
            $testimoni->nama = $request->nama;
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
            $testimoni->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
