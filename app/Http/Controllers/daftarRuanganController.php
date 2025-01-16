<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class daftarRuanganController extends Controller
{
    public function index(Request $request)
    {
        return view('daftarRuangan');
    }
}
