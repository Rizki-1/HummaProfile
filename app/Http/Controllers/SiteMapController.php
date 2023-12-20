<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteMapController extends Controller
{
    public function __invoke(){
        $xml = view('sitemap')->render();

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
