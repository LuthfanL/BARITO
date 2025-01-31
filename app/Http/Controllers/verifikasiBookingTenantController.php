<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminTenant;
use App\Models\pemTenant;
use App\Models\customer;
use Carbon\Carbon;

class verifikasiBookingTenantController extends Controller
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

        $now = Carbon::now()->startOfDay();
        // Ambil data pemTenant berdasarkan idAdmin
        $bookings = pemTenant::where('pemTenant.idAdmin', $idAdmin)
            ->whereIn('pemTenant.status', ['Disetujui', 'Ditolak', 'Menunggu persetujuan']) // Filter status
            ->join('event', 'event.namaEvent' , '=', 'pemTenant.namaEvent')
            ->where('event.tglMulai', '>=', $now)
            ->orderBy('pemTenant.created_at', 'desc') // Urutkan berdasarkan tanggal dibuat (terbaru di atas)
            ->get();

        // Kirimkan data ke view
        return view('verifikasiBookingTenant', [
            'bookings' => $bookings,
        ]);
    }

    public function updateStatus(Request $request)
    {
        // Validasi input
        $request->validate([
            'id' => 'required|exists:pemTenant,id', // Pastikan ID booking valid
            'status' => 'required|in:Disetujui,Ditolak', // Status harus valid
            'alasanPenolakan',
        ]);
    
        // Cari data berdasarkan ID
        $booking = pemTenant::find($request->id);
    
        if (!$booking) {
            return redirect()->back()->with('error', 'Data booking tidak ditemukan.');
        }
    
        // Perbarui status booking
        $booking->status = $request->status;
        $booking->save();

        if ($booking->status == 'Ditolak'){
            $booking->alasanPenolakan = $request->input('alasanPenolakan');
            $booking->save();
        }
        if ($booking->status == 'Disetujui'){
            $booking->alasanPenolakan = null;
            $booking->save();
        }
    
        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Status booking berhasil diperbarui.');
    }    
}
