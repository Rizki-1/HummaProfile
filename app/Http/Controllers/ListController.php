<?php

namespace App\Http\Controllers;

use App\Models\SiswaMagang;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function listMagang(){
        $list = SiswaMagang::latest();

    }
}
