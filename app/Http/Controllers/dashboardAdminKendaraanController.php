<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardAdminKendaraanController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboardAdminKendaraan');
    }
}
