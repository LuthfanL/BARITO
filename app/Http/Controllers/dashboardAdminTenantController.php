<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\adminTenant;

class dashboardAdminTenantController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $AT = adminTenant::where('email', $user->email)->first();

        return view('dashboardAdminTenant', compact('AT'));
    }
}
