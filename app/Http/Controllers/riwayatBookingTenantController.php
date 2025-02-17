<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminTenant;
use App\Models\pemTenant;
use Carbon\Carbon;

class riwayatBookingTenantController extends Controller
{
    public function index(Request $request)
    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();
    
        // Ambil idAdmin dari model adminTenant berdasarkan email
        $idAdmin = adminTenant::getIdAdminByEmail($user->email);
    
        if (!$idAdmin) {
            // Tangani error jika idAdmin tidak ditemukan
            return back()->with('error', 'Admin tidak ditemukan');
        }

        $now = Carbon::now();

        // Ambil data pemTenant berdasarkan idAdmin dengan filter tambahan
        $bookings = pemTenant::where('pemTenant.idAdmin', $idAdmin)            
            ->join('event', 'event.namaEvent', '=', 'pemTenant.namaEvent')
            ->where(function ($query) use ($now) {
                $query->whereIn('pemTenant.status', ['Disetujui', 'Ditolak', 'Expired', 'Dibatalkan']); // Ambil status
                
                // $query->whereIn('pemTenant.status', ['Expired', 'Dibatalkan']) // Ambil langsung jika status Expired atau Dibatalkan
                //     ->orWhere(function ($q) use ($now) {
                //         $q->where('event.tglMulai', '<=', $now) // Hanya ambil jika event.tglMulai <= now
                //         ->whereIn('pemTenant.status', ['Disetujui', 'Ditolak']); // Dan statusnya Disetujui atau Ditolak
                //     });
            })
            ->orderBy('pemTenant.created_at', 'desc') // Urutkan berdasarkan tanggal dibuat (terbaru di atas)
            ->get();

        // Kirimkan data ke view
        return view('riwayatBookingTenant', [
            'bookings' => $bookings,
        ]);
    }
}

