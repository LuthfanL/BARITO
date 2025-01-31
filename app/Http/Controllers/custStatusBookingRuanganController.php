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

        
        if ($request['tglMulai'] == Carbon::now()->format('Y-m-d')){
            return redirect()->back()->withErrors('Tidak bisa memesan untuk hari yang sama dengan hari yang dipesan, minimal 1 hari sebelum hari yang dipesan!');
        }

        $used = pemRuangan::where('idRuangan', $request['idRuangan'])->get();

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
            'keterangan'  => $request->keterangan,
        ]);        

        return redirect()->back()->with('success', 'Data booking berhasil diperbarui!');
    }
}
