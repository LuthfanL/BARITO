<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profilController extends Controller
{
    public function index(Request $request)
    {
        return view('profil');
    }
}
