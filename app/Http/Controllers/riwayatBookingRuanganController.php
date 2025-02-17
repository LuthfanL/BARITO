<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminRuangan;
use App\Models\pemRuangan;
use Carbon\Carbon;

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
    
        $now = Carbon::now();

        // Ambil data pemRuangan berdasarkan idAdmin dengan filter tambahan
        $bookings = pemRuangan::where('idAdmin', $idAdmin)
        ->where(function ($query) {
            $query->whereIn('status', ['Disetujui', 'Ditolak', 'Expired', 'Dibatalkan']); // Ambil langsung jika status Expired atau Dibatalkan
        })
        // ->where(function ($query) use ($now) {
        //     $query->whereIn('status', ['Expired', 'Dibatalkan']) // Ambil langsung jika status Expired atau Dibatalkan
        //         ->orWhere(function ($q) use ($now) {
        //             $q->where('tglMulai', '<=', $now) // Hanya ambil jika tglMulai < now
        //                 ->whereIn('status', ['Disetujui', 'Ditolak']); // Dan statusnya Disetujui atau Ditolak
        //         });
        // })
        ->orderBy('created_at', 'desc') // Urutkan berdasarkan tanggal dibuat (terbaru di atas)
        ->get();

        // Kirimkan data ke view
        return view('riwayatBookingRuangan', [
            'bookings' => $bookings,
        ]);
    }
}
