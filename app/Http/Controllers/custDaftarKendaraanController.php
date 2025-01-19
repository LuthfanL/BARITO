<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class custDaftarKendaraanController extends Controller
{
    public function index(Request $request)
    {
        return view('custDaftarKendaraan');
    }
}
