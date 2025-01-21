<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardAdminTenantController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        return view('dashboardAdminTenant', compact('user'));
    }
}
