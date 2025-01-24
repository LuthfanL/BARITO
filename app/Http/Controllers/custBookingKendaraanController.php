<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kendaraan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class custBookingKendaraanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter 'nama', 'lokasi', dan 'deskripsi' dari URL
        $nama = $request->input('nama');
        $platNomor = $request->input('platNomor');

        // Ambil data ruangan berdasarkan 'nama', 'lokasi', dan 'deskripsi'
        $kendaraan = kendaraan::where('nama', $nama)->where('platNomor', $platNomor)->first();

        $calendarKendaraan = DB::table('kendaraan')
        ->join('pemKendaraan', 'kendaraan.platNomor', '=', 'pemKendaraan.idKendaraan')
        ->select(
            DB::raw('CONCAT(kendaraan.nama, " - ", kendaraan.platNomor) as title'), 
            'pemKendaraan.tglPeminjaman as start', 
            'pemKendaraan.tglSelesai as end'
        )
        ->get()
        ->map(function ($event) {
            $event->color = '#3788d8'; // Menambahkan warna untuk event
            return $event;
        });

        $calendarKendaraanJson = json_encode($calendarKendaraan);

        // Mengambil URL gambar utama dan URL thumbnail
        if (!empty($kendaraan->foto)) {
            $kendaraan->foto_url = Storage::url(json_decode($kendaraan->foto)[0]);  
            $kendaraan->foto_urls = json_decode($kendaraan->foto); 
        } else {
            $kendaraan->foto_url = asset('default-image.jpg');
            $kendaraan->foto_urls = []; // Tidak ada thumbnail jika tidak ada foto
        }

        // Kirim data ruangan ke view
        return view('custBookingKendaraan', compact('kendaraan', 'calendarKendaraanJson'));
    }
}
