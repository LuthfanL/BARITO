<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class custStatusBookingTenantController extends Controller
{
    public function index(Request $request)
    {
        return view('custStatusBookingTenant');
    }
}
