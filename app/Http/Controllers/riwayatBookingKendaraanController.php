<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminKendaraan;
use App\Models\pemKendaraan;
use Carbon\Carbon;

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

        $now = Carbon::now();

        // Ambil data pemKendaraan berdasarkan idAdmin dengan filter tambahan
        $bookings = pemKendaraan::where('idAdmin', $idAdmin)
        ->where(function ($query) {
            $query->whereIn('status', ['Disetujui', 'Ditolak', 'Expired', 'Dibatalkan']); // Ambil langsung jika status Expired atau Dibatalkan
        })
        ->orderBy('created_at', 'desc') // Urutkan berdasarkan tanggal dibuat (terbaru di atas)
        ->get();

        // Kirimkan data ke view
        return view('riwayatBookingKendaraan', [
            'bookings' => $bookings,
        ]);
    }
}
