<?php

namespace App\Http\Controllers;

use App\Models\KelasIndustri;
use App\Models\SiswaMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function siswaMagang(){
        return view("admin.list.siswa-magang",compact("siswa"));
    }

}
