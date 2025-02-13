<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\pemKendaraan;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class custRiwayatBookingKendaraanController extends Controller
{
    public function index()
    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil nik dari model customer
        $nik = customer::getNikByEmail($user->email);
        
        if (!$nik) {
            // Tangani error jika nik tidak ditemukan
            return back()->with('error', 'Customer tidak ditemukan');
        }

        $now = Carbon::now();

        // Ambil data pemKendaraan berdasarkan idCustomer dengan filter tambahan
        $bookings = pemKendaraan::where('idCustomer', $nik)
            ->where(function ($query) use ($now) {
                $query->whereIn('status', ['Expired', 'Dibatalkan']) // Ambil langsung jika status Expired atau Dibatalkan
                    ->orWhere(function ($q) use ($now) {
                        $q->where('tglMulai', '<=', $now) // Hanya ambil jika tglMulai < now
                            ->whereIn('status', ['Disetujui', 'Ditolak']); // Dan statusnya Disetujui atau Ditolak
                    });
            })
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan tanggal dibuat (terbaru di atas)
            ->get();

        // Kirimkan data ke view
        return view('custRiwayatBookingKendaraan', [
            'bookings' => $bookings,
        ]);
    }
}
