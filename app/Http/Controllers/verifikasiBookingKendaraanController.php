<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class verifikasiBookingKendaraanController extends Controller
{
    public function index(Request $request)
    {
        return view('verifikasiBookingKendaraan');
    }
}
