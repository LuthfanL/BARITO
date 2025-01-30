<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\pemTenant;
use App\Models\event;
use Illuminate\Support\Facades\Storage;

class custStatusBookingTenantController extends Controller
{
    public function index(Request $request)
    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil nik dari model customer
        $nik = customer::getNikByEmail($user->email);
        
        if (!$nik) {
            // Tangani error jika nik tidak ditemukan
            return back()->with('error', 'Customer tidak ditemukan');
        }

        // Ambil data pemTenant berdasarkan idAdmin
        $bookings = pemTenant::where('idCustomer', $nik)
            ->join('event', 'event.namaEvent', '=', 'pemTenant.namaEvent')
            ->orderBy('pemTenant.created_at', 'desc') // Urutkan berdasarkan tanggal dibuat (terbaru di atas)
            ->get();

        // Kirimkan data ke view
        return view('custStatusBookingTenant', [
            'bookings' => $bookings,

        ]);
    }

    public function destroy($id)
    {
        // Cari peminjaman tenant berdasarkan id
        $pemTenant = pemTenant::where('id', $id)->first();

        // Periksa apakah pemTenant ditemukan
        if (!$pemTenant) {
            return redirect()->back()->with('error', 'Ruangan tidak ditemukan.');
        }

        // Hapus pemTenant
        $pemTenant->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Booking berhasil dibatalkan!');
    }

    public function uploadBukti(Request $request)
    {
        // Validasi input
        $request->validate([
            'booking_id' => 'required|exists:pemTenant,id', // Pastikan ID booking valid
            'buktiBayar' => 'required|image|mimes:jpeg,png|max:2048', // Hanya menerima gambar max 2MB
        ]);
    
        // Ambil data booking berdasarkan ID
        $booking = pemTenant::findOrFail($request->booking_id);
    
        // Simpan gambar ke storage dengan nama yang dimodifikasi
        if ($request->hasFile('buktiBayar')) {
            $file = $request->file('buktiBayar');

            // Ambil ekstensi file
            $extension = $file->getClientOriginalExtension();

            // Buat nama file sesuai format: bookingID_buktiBayar_TGLUPLOAD.ext
            $filename = $request->booking_id . 'buktiBayarTenant' . date('dmY') . '.' . $extension;

            // Simpan file ke storage/public/buktibayar_pemTenant
            $path = $file->storeAs('buktibayar_pemTenant', $filename, 'public');

            // Simpan path file ke database
            $booking->buktiBayar = Storage::url($path);
            $booking->save();

            // Perbarui status menjadi "Menunggu persetujuan"
            $booking->status = "Menunggu persetujuan";
            $booking->save();
        }

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload!');
    }
}
