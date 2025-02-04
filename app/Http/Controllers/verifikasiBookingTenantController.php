<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminTenant;
use App\Models\pemTenant;
use App\Models\event;
use Carbon\Carbon;

class verifikasiBookingTenantController extends Controller
{
    // public function index(Request $request)
    // {
    //     // Ambil pengguna yang sedang login
    //     $user = auth()->user();

    //     // Ambil idAdmin dari model adminTenant berdasarkan email
    //     $idAdmin = adminTenant::getIdAdminByEmail($user->email);

    //     if (!$idAdmin) {
    //         // Tangani error jika idAdmin tidak ditemukan
    //         return back()->with('error', 'Admin tidak ditemukan');
    //     }

    //     $now = Carbon::create(2025,02,04)->startOfDay();
    //     // Ambil data pemTenant berdasarkan idAdmin
    //     $bookings = pemTenant::where('pemTenant.idAdmin', $idAdmin)
    //         ->whereIn('pemTenant.status', ['Disetujui', 'Ditolak', 'Menunggu persetujuan']) // Filter status
    //         ->join('event', 'event.namaEvent' , '=', 'pemTenant.namaEvent')
    //         ->where('event.tglMulai', '>', $now)
    //         ->orderBy('pemTenant.created_at', 'desc') // Urutkan berdasarkan tanggal dibuat (terbaru di atas)
    //         ->get();

    //     // Kirimkan data ke view
    //     return view('verifikasiBookingTenant', [
    //         'bookings' => $bookings,
    //     ]);
    // }

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

        $now = Carbon::now()->startOfDay(); // Waktu sekarang tanpa jam

        // Query data pemTenant berdasarkan idAdmin
        $bookings = pemTenant::join('event', 'event.namaEvent', '=', 'pemTenant.namaEvent')
            ->where('pemTenant.idAdmin', $idAdmin)
            ->where(function ($query) use ($now) {
                $query->where('event.tglSelesai', '>', $now) // Jika tglSelesai lebih besar dari now, ambil semua status
                    ->orWhere(function ($query) use ($now) {
                        $query->where('event.tglSelesai', '=', $now) // Jika tglSelesai sama dengan now
                            ->where('pemTenant.status', 'Menunggu persetujuan'); // Hanya ambil yang statusnya "Menunggu persetujuan"
                    });
            })
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

        // Periksa kuota berdasarkan tipe tenant
        $makanan = event::where('namaEvent', $booking->namaEvent)->first()->nMakanan;
        $jasa = event::where('namaEvent', $booking->namaEvent)->first()->nJasa;
        $barang = event::where('namaEvent', $booking->namaEvent)->first()->nBarang;
        $nMakanan = pemTenant::where('namaEvent', $booking->namaEvent)->where('tipeTenant', 'Tenant Makanan')->where('status', '!=', 'Ditolak')->where('id', '!=', $request->input('id'))->count();
        $nJasa = pemTenant::where('namaEvent', $booking->namaEvent)->where('tipeTenant', 'Tenant Jasa')->where('status', '!=', 'Ditolak')->where('id', '!=', $request->input('id'))->count();
        $nBarang = pemTenant::where('namaEvent', $booking->namaEvent)->where('tipeTenant', 'Tenant Barang')->where('status', '!=', 'Ditolak')->where('id', '!=', $request->input('id'))->count();

        if ($booking->tipeTenant == 'Tenant Makanan' && $makanan == $nMakanan) {
            return redirect()->back()->withErrors('Maaf, kuota untuk tenant makanan sudah habis, silahkan berkunjung dilain waktu!');
        }
        if ($booking->tipeTenant == 'Tenant Jasa' && $jasa == $nJasa) {
            return redirect()->back()->withErrors('Maaf, kuota untuk tenant jasa sudah habis, silahkan berkunjung dilain waktu!');
        }
        if ($booking->tipeTenant == 'Tenant Barang' && $barang == $nBarang) {
            return redirect()->back()->withErrors('Maaf, kuota untuk tenant barang sudah habis, silahkan berkunjung dilain waktu!');
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
