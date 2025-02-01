<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\pemKendaraan;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

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

        $now = Carbon::create(2025, 2, 1); //bisa diganti now, nek didalem create ada 6 parameter berarti tahun, bulan, hari, jam, menit, detik

        foreach ($bookings as $book) {
            $hariPesan = $book->created_at->startOfDay();
            $selisih = $hariPesan->diffInDays($now);
            if ($book->status == 'Belum bayar' && $selisih == 1){
                $book->delete();
            }
        }

        // Kirimkan data ke view
        return view('custStatusBookingKendaraan', [
            'bookings' => $bookings,
        ]);
    }

    public function destroy($id)
    {
        // Cari peminjaman kendaraan berdasarkan id
        $pemKendaraan = pemKendaraan::where('id', $id)->first();

        // Periksa apakah pemKendaraan ditemukan
        if (!$pemKendaraan) {
            return redirect()->back()->with('error', 'Ruangan tidak ditemukan.');
        }

        // Hapus pemKendaraan
        $pemKendaraan->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Booking berhasil dibatalkan!');
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

            // Perbarui status menjadi "Menunggu persetujuan"
            $booking->status = "Menunggu persetujuan";
            $booking->save();
        }

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload!');
    }

    public function updateBookingKendaraan(Request $request)
    {
        // Validasi data
        $request->validate([
            'id' => 'required',
            'namaPemohon' => 'required|string',
            'noWa'        => 'required|string',
            'tglMulai'    => 'required|date',
            'tglSelesai'  => 'required|date',
            'keperluan'   => 'required|string',
            'lokasi'      => 'required|string',
            'titikJemput' => 'required|string',
        ]);

        // Cari booking berdasarkan ID
        $booking = pemKendaraan::where('id', $request->id)->firstOrFail();
        if (!$booking) {
            return redirect()->back()->with('error', 'Data booking tidak ditemukan!');
        }

        $now = Carbon::now()->startOfDay();

        if ($now->diffInDays($request->input('tglMulai')) < 2){
            return redirect()->back()->withErrors('Anda harus memesan minimal 2 hari sebelum hari yang dipesan!');
        }

        $idKendaraan = $booking->idKendaraan;

        $used = pemKendaraan::where('idKendaraan', $idKendaraan)->where('status', '!=', 'Ditolak')->get();

        if ($used){
            foreach ($used as $use) {
                if ($request['tglMulai'] == $use->tglMulai || $request['tglMulai'] == $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($request['tglSelesai'] == $use->tglMulai || $request['tglSelesai'] == $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($request['tglMulai'] < $use->tglMulai && $request['tglSelesai'] > $use->tglSelesai) {
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($request['tglMulai'] > $use->tglMulai && $request['tglSelesai'] < $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($request['tglMulai'] > $use->tglMulai && $request['tglMulai'] < $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($request['tglSelesai'] > $use->tglMulai && $request['tglSelesai'] < $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($request['tglSelesai'] < $request['tglMulai']){
                    return redirect()->back()->withErrors('Tanggal Selesai harus lebih dari atau sama dengan tanggal mulai!');
                }
            };
        }

        // Perbarui data
        $booking->update([
            'namaPemohon' => $request->namaPemohon,
            'noWa'        => $request->noWa,
            'tglMulai'    => $request->tglMulai,
            'tglSelesai'  => $request->tglSelesai,
            'keperluan'   => $request->keperluan,
            'lokasi'      => $request->lokasi,
            'titikJemput' => $request->titikJemput,
        ]);        

        return redirect()->back()->with('success', 'Data booking berhasil diperbarui!');
    }
}
