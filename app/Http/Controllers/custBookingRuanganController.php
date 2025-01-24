<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class custBookingRuanganController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter 'nama', 'lokasi', dan 'deskripsi' dari URL
        $nama = $request->input('nama');
        $lokasi = $request->input('lokasi');
        $deskripsi = $request->input('deskripsi');

        // Ambil data ruangan berdasarkan 'nama', 'lokasi', dan 'deskripsi'
        $ruangan = Ruangan::where('nama', $nama)
                            ->where('lokasi', $lokasi)
                            ->where('deskripsi', $deskripsi)
                            ->first();

        $calendarRuangan = DB::table('ruangan')
        ->join('pemRuangan', 'ruangan.id', '=', 'pemRuangan.idRuangan')
        ->select(
            DB::raw('CONCAT(ruangan.nama, " - ", ruangan.lokasi) as title'), 
            'pemRuangan.tglPeminjaman as start', 
            'pemRuangan.tglSelesai as end'
        )->where('ruangan.nama', $nama)->where('ruangan.lokasi', $lokasi)
        ->get()
        ->map(function ($event) {
            $event->color = '#3788d8'; // Menambahkan warna untuk event
            $event->end = Carbon::parse($event->end)->addDay()->toDateString();
            return $event;
        });

        $calendarRuanganJson = json_encode($calendarRuangan);

        // Mengambil URL gambar utama dan URL thumbnail
        if (!empty($ruangan->foto)) {
            $ruangan->foto_url = Storage::url(json_decode($ruangan->foto)[0]);  
            $ruangan->foto_urls = json_decode($ruangan->foto); 
        } else {
            $ruangan->foto_url = asset('default-image.jpg');
            $ruangan->foto_urls = []; // Tidak ada thumbnail jika tidak ada foto
        }

        // Kirim data ruangan ke view
        return view('custBookingRuangan', compact('ruangan', 'calendarRuanganJson'));
    }
}
