<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminKendaraan;
use App\Models\pemKendaraan;

class riwayatBookingKendaraanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil idAdmin dari model adminKendaraan berdasarkan email
        $idAdmin = adminKendaraan::getIdAdminByEmail($user->email);

        if (!$idAdmin) {
            // Tangani error jika idAdmin tidak ditemukan
            return back()->with('error', 'Admin tidak ditemukan');
        }

        // Ambil data pemKendaraan berdasarkan idAdmin
        $bookings = pemKendaraan::where('idAdmin', $idAdmin) 
            ->whereIn('status', ['Disetujui', 'Ditolak']) // Filter status
            ->get();

        // Kirimkan data ke view
        return view('riwayatBookingKendaraan', [
            'bookings' => $bookings,
        ]);
    }
}
