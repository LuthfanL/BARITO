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
            return back()->with('error', 'Admin tidak ditemukan');
        }
    
        $now = Carbon::now()->startOfDay(); // Gunakan waktu sekarang
    
        $bookings = pemKendaraan::where('idAdmin', $idAdmin)
        ->where(function ($query) use ($now) {
            $query->where('tglMulai', '>', $now) // Jika tglMulai lebih besar dari sekarang
                ->whereIn('status', ['Disetujui', 'Ditolak', 'Belum bayar', 'Menunggu persetujuan']) // Ambil semua status yang diinginkan
                ->orWhere(function ($query) use ($now) {
                    $query->where('tglMulai', '=', $now) // Jika tglMulai sama dengan sekarang
                        ->where('status', 'Menunggu persetujuan'); // Hanya ambil yang "Menunggu persetujuan"
                });
        })
        ->orderBy('created_at', 'desc')
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
            ->whereIn('status', ['Disetujui', 'Belum bayar', 'Menunggu persetujuan'])
            ->where('id', '!=', $request->input('id'))
            ->get();
        
        if ($used){
            foreach ($used as $use) {
                if ($booking->tglMulai == $use->tglMulai || $booking->tglMulai == $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, tidak bisa melakukan persetujuan peminjaman.');
                }
                if ($booking->tglSelesai == $use->tglMulai || $booking->tglSelesai == $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, tidak bisa melakukan persetujuan peminjaman.');
                }
                if ($booking->tglMulai < $use->tglMulai && $booking->tglSelesai > $use->tglSelesai) {
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, tidak bisa melakukan persetujuan peminjaman.');
                }
                if ($booking->tglMulai > $use->tglMulai && $booking->tglSelesai < $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, tidak bisa melakukan persetujuan peminjaman.');
                }
                if ($booking->tglMulai > $use->tglMulai && $booking->tglMulai < $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, tidak bisa melakukan persetujuan peminjaman.');
                }
                if ($booking->tglSelesai > $use->tglMulai && $booking->tglSelesai < $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, tidak bisa melakukan persetujuan peminjaman.');
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
