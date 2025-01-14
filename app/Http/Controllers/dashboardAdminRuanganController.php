<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardAdminRuanganController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboardAdminRuangan');
    }
}
