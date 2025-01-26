<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminRuangan;
use App\Models\pemRuangan;

class riwayatBookingRuanganController extends Controller
{
    public function index(Request $request)
    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();
    
        // Ambil idAdmin dari model adminRuangan berdasarkan email
        $idAdmin = adminRuangan::getIdAdminByEmail($user->email);
    
        if (!$idAdmin) {
            // Tangani error jika idAdmin tidak ditemukan
            return back()->with('error', 'Admin tidak ditemukan');
        }
    
        // Ambil data pemRuangan berdasarkan idAdmin
        $bookings = pemRuangan::where('idAdmin', $idAdmin)->get();
    
        // Kirimkan data ke view
        return view('riwayatBookingRuangan', [
            'bookings' => $bookings,
        ]);
    }
}
