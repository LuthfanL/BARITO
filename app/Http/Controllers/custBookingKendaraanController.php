<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kendaraan;
use App\Models\adminKendaraan; 
use App\Models\pemKendaraan; 
use Illuminate\Support\Facades\Storage;

class custBookingKendaraanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter 'nama', 'lokasi', dan 'deskripsi' dari URL
        $nama = $request->input('nama');
        $platNomor = $request->input('platNomor');

        // Ambil data ruangan berdasarkan 'nama', 'lokasi', dan 'deskripsi'
        $kendaraan = kendaraan::where('nama', $nama)
                            ->where('platNomor', $platNomor)
                            ->first();

        // Mengambil URL gambar utama dan URL thumbnail
        if (!empty($kendaraan->foto)) {
            $kendaraan->foto_url = Storage::url(json_decode($kendaraan->foto)[0]);  
            $kendaraan->foto_urls = json_decode($kendaraan->foto); 
        } else {
            $kendaraan->foto_url = asset('default-image.jpg');
            $kendaraan->foto_urls = []; // Tidak ada thumbnail jika tidak ada foto
        }

        // Kirim data ruangan ke view
        return view('custBookingKendaraan', compact('kendaraan'));
    }
    
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'idKendaraan'  => 'required|exists:kendaraan,platNomor', // Validasi platNomor di tabel kendaraan
            'idAdmin'      => 'required|exists:adminKendaraan,idAdmin', // Validasi idAdmin di tabel adminKendaraan
            'tglMulai' => 'required|date',
            'tglSelesai' => 'required|date',
        ]);

        
        // $fotoPaths = [];
        // if ($request->hasFile('buktiBayar')) {
        //     foreach ($request->file('buktiBayar') as $buktiBayar) {
        //         $path = $buktiBayar->store('foto_buktiBayar', 'public'); // Simpan di folder foto_ruangan
        //         $fotoPaths[] = Storage::url($path); // Simpan path ke array
        //     }
        // }

        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil nik dari model customer
        $nik = \App\Models\customer::getNikByEmail($user->email);

        if (!$nik) {
            // Tangani error jika nik tidak ditemukan
            return back()->with('error', 'Customer tidak ditemukan');
        }

        // Siapkan data untuk disimpan
        $dataToStore = [
            'idCustomer'    => $nik,
            'idKendaraan'   => $request->input('idKendaraan'),
            'idAdmin'       => $request->input('idAdmin'),
            'tglMulai'      => $request->input('tglMulai'),
            'tglSelesai'    => $request->input('tglSelesai'),
            'status'        => 'Belum disetujui',
             // 'buktiBayar'    => json_encode($fotoPaths),
            ];

        // Simpan data ke database
        pemKendaraan::create($dataToStore);

        return redirect()->back()->with('success', 'Booking kendaraan berhasil!');
    }
}
