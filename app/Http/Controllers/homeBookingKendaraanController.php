<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeBookingKendaraanController extends Controller
{
    public function index()
    {
        return view('homeBookingKendaraan');
    }
}
