<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class custBookingRuanganController extends Controller
{
    public function index(Request $request)
    {
        return view('custBookingRuangan');
    }
}
