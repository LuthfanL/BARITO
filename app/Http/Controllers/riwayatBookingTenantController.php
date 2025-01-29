<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminTenant;
use App\Models\pemTenant;

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
    
        // Ambil data pemTenant berdasarkan idAdmin
        $bookings = pemTenant::where('idAdmin', $idAdmin)            
            ->whereIn('status', ['Disetujui', 'Ditolak']) // Filter status
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan tanggal dibuat (terbaru di atas)
            ->get();
    
        // Kirimkan data ke view
        return view('riwayatBookingTenant', [
            'bookings' => $bookings,
        ]);
    }
}

