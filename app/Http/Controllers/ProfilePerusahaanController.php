<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\ProfileCompany;
use App\Models\Sosmed;
use Illuminate\Http\Request;

class ProfilePerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = ProfileCompany::with('sosmed')->first();
        return view("admin.pengaturan.profile", compact("profile"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, string $id)
    {
        try {
            $dataRequest = $request->all();
            $profile = ProfileCompany::where('id', $id)->first();
            if (!$profile) {
                return back()->with('message', [
                    'icon' => 'error',
                    'title' => "Gagal",
                    'text' => "ID profile tidak di temukan!"
                ]);
            }

            if($request->hasFile('poto_profile')){
                unlink('ImageGlobal/HummaTech-Logo.png');
                $request->file('poto_profile')->move('ImageGlobal', 'HummaTech-Logo.png');
            }

            $profile->email = $request->email;
            $profile->no_telp = $request->no_telp;
            $profile->alamat = $request->alamat;
            $profile->tentang = $request->tentang;
            $profile->save();


            Sosmed::truncate();
            foreach($dataRequest['sosmed-group'] as $row){
                $newSosmed = new Sosmed;
                $newSosmed->profile_company_id = $profile->id;
                $newSosmed->name = $row['name'];
                $newSosmed->link = $row['link'];
                $newSosmed->save();
            }

            return back()->with("message", [
                'icon' => 'success',
                'title' => "Berhasil!",
                'text' => "Berhasil mengubah data!"
            ]);
        } catch (\Exception $e) {
            return back()->with("message", [
                'icon' => 'error',
                'title' => "Gagal!",
                'text' => "Ada kesalahan saat meupdate data!"
            ]);
        }
    }
}
