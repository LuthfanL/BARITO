<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardAdminTenantController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboardAdminTenant');
    }
}
