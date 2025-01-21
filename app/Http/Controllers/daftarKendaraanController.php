<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kendaraan;

class daftarKendaraanController extends Controller
{
    public function index(Request $request)
    {

        // Mengambil semua data kendaraan
        $kendaraan = kendaraan::all();
        
        // Mengirim data ke view
        return view('daftarKendaraan', compact('kendaraan'));
    }
}
