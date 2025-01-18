<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kontakTenantController extends Controller
{
    public function index()
    {
        return view('kontakTenant');
    }
}
