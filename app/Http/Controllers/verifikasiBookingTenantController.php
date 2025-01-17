<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class verifikasiBookingTenantController extends Controller
{
    public function index(Request $request)
    {
        return view('verifikasiBookingTenant');
    }
}
