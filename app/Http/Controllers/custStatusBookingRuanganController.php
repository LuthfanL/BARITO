<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\pemRuangan;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class custStatusBookingRuanganController extends Controller
{
    public function index(Request $request)
    {   
        $this->hapusBookingTanpaBukti();

        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil nik dari model customer
        $nik = customer::getNikByEmail($user->email);
        
        if (!$nik) {
            // Tangani error jika nik tidak ditemukan
            return back()->with('error', 'Customer tidak ditemukan');
        }

        // Ambil data pemRuangan berdasarkan idAdmin
        $bookings = pemRuangan::where('idCustomer', $nik)
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
        return view('custStatusBookingRuangan', [
            'bookings' => $bookings,
        ]);
    }

    public function destroy($id)
    {
        // Cari peminjaman ruangan berdasarkan id
        $pemRuangan = pemRuangan::where('id', $id)->first();

        // Periksa apakah pemRuangan ditemukan
        if (!$pemRuangan) {
            return redirect()->back()->with('error', 'Ruangan tidak ditemukan.');
        }

        // Hapus pemRuangan
        $pemRuangan->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Booking berhasil dibatalkan!');
    }

    public function uploadBukti(Request $request)
    {
        // Validasi input
        $request->validate([
            'booking_id' => 'required|exists:pemRuangan,id', // Pastikan ID booking valid
            'buktiBayar' => 'required|image|mimes:jpeg,png|max:2048', // Hanya menerima gambar max 2MB
        ]);
    
        // Ambil data booking berdasarkan ID
        $booking = pemRuangan::findOrFail($request->booking_id);
    
        // Simpan gambar ke storage dengan nama yang dimodifikasi
        if ($request->hasFile('buktiBayar')) {
            $file = $request->file('buktiBayar');

            // Ambil ekstensi file
            $extension = $file->getClientOriginalExtension();

            // Buat nama file sesuai format: bookingID_buktiBayar_TGLUPLOAD.ext
            $filename = $request->booking_id . 'buktiBayarRuangan' . date('dmY') . '.' . $extension;

            // Simpan file ke storage/public/buktibayar_pemRuangan
            $path = $file->storeAs('buktibayar_pemRuangan', $filename, 'public');

            // Simpan path file ke database
            $booking->buktiBayar = Storage::url($path);
            $booking->save();

            // Perbarui status menjadi "Menunggu persetujuan"
            $booking->status = "Menunggu persetujuan";
            $booking->save();
        }
        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload!');
    }

    public function updateBookingRuangan(Request $request)
    {
        // Validasi data
        $request->validate([
            'id' => 'required',
            'namaPemohon' => 'required|string',
            'noWa'        => 'required|string',
            'tglMulai'    => 'required|date',
            'tglSelesai'  => 'required|date',
            'keperluan'   => 'required|string',
            'keterangan'      => 'required|string',
        ]);

        // Cari booking berdasarkan ID
        $booking = pemRuangan::where('id', $request->id)->firstOrFail();
        if (!$booking) {
            return redirect()->back()->with('error', 'Data booking tidak ditemukan!');
        }

        $now = Carbon::now()->startOfDay();

        if ($now->diffInDays($request->input('tglMulai')) < 3){
            return redirect()->back()->withErrors('Anda harus memesan minimal 3 hari sebelum hari yang dipesan!');
        }

        $idRuangan = $booking->idRuangan;

        // Hanya lakukan validasi bentrok jika tglMulai atau tglSelesai berubah
        if ($request->tglMulai != $booking->tglMulai || $request->tglSelesai != $booking->tglSelesai) {
            $idRuangan = $booking->idRuangan;

            // Ambil semua booking kendaraan yang aktif kecuali yang sedang diperbarui
            $used = pemRuangan::where('idRuangan', $idRuangan)
                ->where('status', '!=', 'Ditolak')
                ->where('id', '!=', $request->id) // Mengecualikan booking yang sedang diupdate
                ->get();

            foreach ($used as $use) {
                if (
                    ($request->tglMulai >= $use->tglMulai && $request->tglMulai <= $use->tglSelesai) ||
                    ($request->tglSelesai >= $use->tglMulai && $request->tglSelesai <= $use->tglSelesai) ||
                    ($request->tglMulai <= $use->tglMulai && $request->tglSelesai >= $use->tglSelesai)
                ) {
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
            }
        }

        // Perbarui data
        $booking->update([
            'namaPemohon' => $request->namaPemohon,
            'noWa'        => $request->noWa,
            'tglMulai'    => $request->tglMulai,
            'tglSelesai'  => $request->tglSelesai,
            'keperluan'   => $request->keperluan,
            'keterangan'  => $request->keterangan,
        ]);        

        return redirect()->back()->with('success', 'Data booking berhasil diperbarui!');
    }

    public function hapusBookingTanpaBukti()
    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil nik dari model customer
        $nik = customer::getNikByEmail($user->email);
        
        if (!$nik) {
            // Tangani error jika nik tidak ditemukan
            return back()->with('error', 'Customer tidak ditemukan');
        }

        // Set batas waktu 1 menit sejak dibuat
        $batasWaktu = Carbon::now()->subMinutes(15);

        // Ambil semua booking milik pengguna yang belum mengunggah bukti bayar dalam 1 menit
        $bookings = pemRuangan::where('idCustomer', $nik)
            ->whereNull('buktiBayar')
            ->where('created_at', '<', $batasWaktu)
            ->get();

        // Cek apakah ada booking yang perlu dihapus
        if ($bookings->isNotEmpty()) {
            // Hapus semua booking yang memenuhi kriteria
            foreach ($bookings as $booking) {
                $booking->delete();
            }

            // Set session flash message hanya jika ada data yang dihapus
            return redirect()->back()->with('success', 'Semua pemesanan tanpa bukti pembayaran yang melewati batas waktu telah dihapus');
        }

        // Jika tidak ada booking yang dihapus, langsung return tanpa pesan
        return;
    }
}
