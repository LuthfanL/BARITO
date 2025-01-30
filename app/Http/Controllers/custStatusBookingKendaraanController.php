<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\pemKendaraan;
use Illuminate\Support\Facades\Storage;

class custStatusBookingKendaraanController extends Controller
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

        // Ambil data pemKendaraan berdasarkan idAdmin
        $bookings = pemKendaraan::where('idCustomer', $nik)
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan tanggal dibuat (terbaru di atas)
            ->get();

        // Kirimkan data ke view
        return view('custStatusBookingKendaraan', [
            'bookings' => $bookings,
        ]);
    }

    public function uploadBukti(Request $request)
    {
        // Validasi input
        $request->validate([
            'booking_id' => 'required|exists:pemKendaraan,id', // Pastikan ID booking valid
            'buktiBayar' => 'required|image|mimes:jpeg,png|max:2048', // Hanya menerima gambar max 2MB
        ]);
    
        // Ambil data booking berdasarkan ID
        $booking = pemKendaraan::findOrFail($request->booking_id);
    
        // Simpan gambar ke storage dengan nama yang dimodifikasi
        if ($request->hasFile('buktiBayar')) {
            $file = $request->file('buktiBayar');

            // Ambil ekstensi file
            $extension = $file->getClientOriginalExtension();

            // Buat nama file sesuai format: bookingID_buktiBayar_TGLUPLOAD.ext
            $filename = $request->booking_id . 'buktiBayarKendaraan' . date('dmY') . '.' . $extension;

            // Simpan file ke storage/public/buktibayar_pemKendaraan
            $path = $file->storeAs('buktibayar_pemKendaraan', $filename, 'public');

            // Simpan path file ke database
            $booking->buktiBayar = Storage::url($path);
            $booking->save();
        }

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload!');
    }
}
