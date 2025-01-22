<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\event;
use App\Models\kendaraan;
use App\Models\ruangan;
use App\Models\customer;

class homeController extends Controller
{
    public function index()
    {
        $events = event::all();
        $kendaraan = kendaraan::all();
        $ruangan = ruangan::all();

        return view('home', compact('events', 'kendaraan', 'ruangan'));
    }
}
