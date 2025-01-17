<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class buatEventController extends Controller
{
    public function index(Request $request)
    {
        return view('buatEvent');
    }
}
