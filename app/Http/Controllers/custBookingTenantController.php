<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class custBookingTenantController extends Controller
{
    public function index(Request $request)
    {
        return view('custBookingTenant');
    }
}