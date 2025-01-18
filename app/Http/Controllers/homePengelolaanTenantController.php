<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homePengelolaanTenantController extends Controller
{
    public function index()
    {
        return view('homePengelolaanTenant');
    }
}
