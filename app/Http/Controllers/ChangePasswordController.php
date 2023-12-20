<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function showForm()
    {
        return view('admin.change-pass');
    }

    public function changePass(UpdatePasswordRequest $request)
    {
        try {
            $old_pass = Auth::user()->password;
            $admin = User::where('id', Auth::user()->id)->first();

            if(!$admin){
                return back()->with("message", [
                    'icon' => "error",
                    'title' => "Error",
                    'text' => "ID Admin tidak ditemukan!"
                ]);
            }

            if (Hash::check($request->old_pass, $old_pass)) {
                $admin->password = Hash::make($request->new_pass);
                $admin->save();
                DB::commit();
                return back()->with("message", [
                    'icon' => "success",
                    'title' => "Berhasil!",
                    'text' => "Berhasil mengganti password!"
                ]);
            }

            return back()->with("message", [
                'icon' => "error",
                'title' => "Gagal!",
                'text' => "Password tidak sama dengan dulu!"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("message", [
                'icon' => "error",
                'title' => "Error",
                'text' => "Ada kesalahan server!"
            ]);
        }
    }
}
