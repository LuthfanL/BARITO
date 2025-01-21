<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\event;
use App\Models\kendaraan;
use App\Models\ruangan;

class homeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $events = event::all();
        $kendaraan =  kendaraan::all();
        $ruangan = ruangan::all();

        return view('home', compact('user', 'events', 'kendaraan', 'ruangan'));
    }
}
