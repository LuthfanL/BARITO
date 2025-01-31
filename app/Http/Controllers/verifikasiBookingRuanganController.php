<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminRuangan;
use App\Models\ruangan;
use App\Models\pemRuangan;

class verifikasiBookingRuanganController extends Controller
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
        $bookings = pemRuangan::where('idAdmin', $idAdmin)
            ->with('ruangan')
            ->whereIn('status', ['Disetujui', 'Ditolak', 'Menunggu persetujuan']) // Filter status
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan tanggal dibuat (terbaru di atas)
            ->get();

        // Kirimkan data ke view
        return view('verifikasiBookingRuangan', [
            'bookings' => $bookings,
        ]);
    }

    public function updateStat(Request $request)
    {
        // Validasi input
        $request->validate([
            'id' => 'required|exists:pemRuangan,id', // Pastikan ID booking valid
            'status' => 'required|in:Disetujui,Ditolak', // Status harus valid
        ]);
    
        // Cari data berdasarkan ID
        $booking = pemRuangan::find($request->id);
    
        if (!$booking) {
            return redirect()->back()->with('error', 'Data booking tidak ditemukan.');
        }
    
        // Perbarui status booking
        $booking->status = $request->status;
        $booking->save();
    
        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Status booking berhasil diperbarui.');
    }    
}
