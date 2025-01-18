<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeBookingRuanganController extends Controller
{
    public function index()
    {
        return view('homeBookingRuangan');
    }
}
