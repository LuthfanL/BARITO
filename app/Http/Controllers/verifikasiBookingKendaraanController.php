<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminKendaraan;
use App\Models\pemKendaraan;
use Carbon\Carbon;

class verifikasiBookingKendaraanController extends Controller
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

        $now = Carbon::create(2025,02,04)->startOfDay();
        // Ambil data pemKendaraan berdasarkan idAdmin
        $bookings = pemKendaraan::where('idAdmin', $idAdmin)
            ->whereIn('status', ['Disetujui', 'Ditolak', 'Menunggu persetujuan']) // Filter status
            ->where('pemKendaraan.tglMulai', '>', $now)
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan tanggal dibuat (terbaru di atas)
            ->get();

        // Kirimkan data ke view
        return view('verifikasiBookingKendaraan', [
            'bookings' => $bookings,
        ]);
    }

    public function updateStatus(Request $request)
    {
        // Validasi input
        $request->validate([
            'id' => 'required|exists:pemKendaraan,id', // Pastikan ID booking valid
            'status' => 'required|in:Disetujui,Ditolak', // Status harus valid
            'alasanPenolakan',
        ]);
    
        // Cari data berdasarkan ID
        $booking = pemKendaraan::find($request->id);
    
        if (!$booking) {
            return redirect()->back()->with('error', 'Data booking tidak ditemukan.');
        }

        $idKendaraan = $booking->idKendaraan;
        
        $used = pemKendaraan::where('idKendaraan', $idKendaraan)
        ->where('status', '!=', 'Ditolak')
        ->where('id', '!=', $request->id) // Mengecualikan booking yang sedang diupdate
        ->get();
        
        if ($used){
            foreach ($used as $use) {
                if ($booking->tglMulai == $use->tglMulai || $booking->tglMulai == $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($booking->tglSelesai == $use->tglMulai || $booking->tglSelesai == $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($booking->tglMulai < $use->tglMulai && $booking->tglSelesai > $use->tglSelesai) {
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($booking->tglMulai > $use->tglMulai && $booking->tglSelesai < $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($booking->tglMulai > $use->tglMulai && $booking->tglMulai < $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($booking->tglSelesai > $use->tglMulai && $booking->tglSelesai < $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($booking->tglSelesai < $booking->tglMulai){
                    return redirect()->back()->withErrors('Tanggal Selesai harus lebih dari atau sama dengan tanggal mulai!');
                }
            };
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
