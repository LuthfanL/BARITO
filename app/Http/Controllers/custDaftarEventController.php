<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class custDaftarEventController extends Controller
{
    public function index(Request $request)
    {
        return view('custDaftarEvent');
    }
}
