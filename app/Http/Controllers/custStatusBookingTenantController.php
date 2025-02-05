<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\pemTenant;
use App\Models\event;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class custStatusBookingTenantController extends Controller
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

        // Ambil data pemTenant berdasarkan idAdmin
        $bookings = pemTenant::where('idCustomer', $nik)
            ->join('event', 'event.namaEvent', '=', 'pemTenant.namaEvent')
            ->orderBy('pemTenant.created_at', 'desc') // Urutkan berdasarkan tanggal dibuat (terbaru di atas)
            ->get();

        $waktuBuat = pemTenant::where('idCustomer', $nik)
        ->where('idCustomer', $nik)
        ->orderBy('created_at', 'desc')
        ->get();

        // Kirimkan data ke view
        return view('custStatusBookingTenant', [
            'bookings' => $bookings,
            'user' => $user,
            'waktuBuat' =>$waktuBuat,
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

    public function updateBookingTenant(Request $request)
    {
        // Validasi data
        $request->validate([
            'id'          => 'required',
            'namaPemohon' => 'required|string',
            'noWa'        => 'required|string',
            'namaTenant'  => 'required|string',
            'tipeTenant'  => 'required|string',
        ]);

        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil nik dari model customer berdasarkan email
        $nik = \App\Models\customer::getNikByEmail($user->email);

        if (!$nik) {
            return back()->with('error', 'Customer tidak ditemukan');
        }

        // Cari data pemTenant berdasarkan NIK user dan ID yang diberikan
        $booking = pemTenant::where('id', $request->id)
            ->where('idCustomer', $nik)
            ->first();

        if (!$booking) {
            return redirect()->back()->with('error', 'Data booking tidak ditemukan atau Anda tidak memiliki izin untuk mengeditnya.');
        }

        // Ambil namaEvent dari booking yang ditemukan
        $namaEvent = $booking->namaEvent;

        if (!$namaEvent) {
            return redirect()->back()->withErrors('Event tidak valid.');
        }

        // Ambil data kuota event terkait
        $event = event::where('namaEvent', $namaEvent)->first();

        if (!$event) {
            return redirect()->back()->withErrors('Event tidak ditemukan.');
        }

        // Periksa kuota berdasarkan tipe tenant
        $makanan = event::where('namaEvent', $namaEvent)->first()->nMakanan;
        $jasa = event::where('namaEvent', $namaEvent)->first()->nJasa;
        $barang = event::where('namaEvent', $namaEvent)->first()->nBarang;
        $nMakanan = pemTenant::where('namaEvent', $namaEvent)->where('tipeTenant', 'Tenant Makanan')->where('status', '!=', 'Ditolak')->count();
        $nJasa = pemTenant::where('namaEvent', $namaEvent)->where('tipeTenant', 'Tenant Jasa')->where('status', '!=', 'Ditolak')->count();
        $nBarang = pemTenant::where('namaEvent', $namaEvent)->where('tipeTenant', 'Tenant Barang')->where('status', '!=', 'Ditolak')->count();

        if ($request->input('tipeTenant') == 'Tenant Makanan' && $makanan == $nMakanan) {
            return redirect()->back()->withErrors('Maaf, kuota untuk tenant makanan sudah habis, silahkan berkunjung dilain waktu!');
        }
        if ($request->input('tipeTenant') == 'Tenant Jasa' && $jasa == $nJasa) {
            return redirect()->back()->withErrors('Maaf, kuota untuk tenant jasa sudah habis, silahkan berkunjung dilain waktu!');
        }
        if ($request->input('tipeTenant') == 'Tenant Barang' && $barang == $nBarang) {
            return redirect()->back()->withErrors('Maaf, kuota untuk tenant barang sudah habis, silahkan berkunjung dilain waktu!');
        }

        // Perbarui data booking
        $booking->update([
            'namaPemohon' => $request->namaPemohon,
            'noWa'        => $request->noWa,
            'namaTenant'  => $request->namaTenant,
            'tipeTenant'  => $request->tipeTenant,
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
        $bookings = pemTenant::where('idCustomer', $nik)
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
