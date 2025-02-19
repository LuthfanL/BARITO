<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kendaraan;
use App\Models\adminKendaraan; 
use App\Models\pemKendaraan; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

        $colors = ['#3788d8', '#f39c12', '#27ae60', '#8e44ad', '#e74c3c', '#16a085', '#d35400', '#2ecc71', '#3498db', '#9b59b6'];

        $calendarKendaraan = kendaraan::select('nama as title', 'tglMulai as start', 'tglSelesai as end')
            ->join('pemKendaraan', 'kendaraan.platNomor', '=', 'pemKendaraan.idKendaraan')
            ->join('customer', 'pemKendaraan.idCustomer', '=', 'customer.NIK')
            ->select(
                DB::raw('CONCAT(pemKendaraan.namaPemohon, " - ", pemKendaraan.keperluan) as title'), 
                'pemKendaraan.tglMulai as start', 
                'pemKendaraan.tglSelesai as end'
            )->where('kendaraan.platNomor', $platNomor)
            ->whereIn('status', ['Disetujui', 'Belum bayar', 'Menunggu persetujuan'])
            ->get()
            ->map(function ($event, $index) use ($colors) {
                $event->color = $colors[$index % count($colors)];
                $event->end = Carbon::parse($event->end)->addDay()->toDateString();
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

    
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'idKendaraan'  => 'required|exists:kendaraan,platNomor', // Validasi platNomor di tabel kendaraan
            'idAdmin'      => 'required|exists:adminKendaraan,idAdmin', // Validasi idAdmin di tabel adminKendaraan
            'tglMulai' => 'required|date',
            'tglSelesai' => 'required|date',
        ]);

        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil nik dari model customer
        $nik = \App\Models\customer::getNikByEmail($user->email);

        if (!$nik) {
            // Tangani error jika nik tidak ditemukan
            return back()->with('error', 'Customer tidak ditemukan');
        }

        $now = Carbon::now()->startOfDay();

        if ($now->diffInDays($validated['tglMulai']) < 3){
            return redirect()->back()->withErrors('Mohon maaf, anda harus memesan minimal 3 hari sebelum hari yang dipesan.');
        }

        $used = pemKendaraan::where('idKendaraan', $validated['idKendaraan'])
            ->whereIn('status', ['Disetujui', 'Belum bayar', 'Menunggu persetujuan'])
            ->get();

        if ($used){
            foreach ($used as $use) {
                if ($validated['tglMulai'] == $use->tglMulai || $validated['tglMulai'] == $use->tglSelesai){
                    return redirect()->back()->withErrors('Mohon maaf, tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain.');
                }
                if ($validated['tglSelesai'] == $use->tglMulai || $validated['tglSelesai'] == $use->tglSelesai){
                    return redirect()->back()->withErrors('Mohon maaf, tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain.');
                }
                if ($validated['tglMulai'] < $use->tglMulai && $validated['tglSelesai'] > $use->tglSelesai) {
                    return redirect()->back()->withErrors('Mohon maaf, tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain.');
                }
                if ($validated['tglMulai'] > $use->tglMulai && $validated['tglSelesai'] < $use->tglSelesai){
                    return redirect()->back()->withErrors('Mohon maaf, tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain.');
                }
                if ($validated['tglMulai'] > $use->tglMulai && $validated['tglMulai'] < $use->tglSelesai){
                    return redirect()->back()->withErrors('Mohon maaf, tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain.');
                }
                if ($validated['tglSelesai'] > $use->tglMulai && $validated['tglSelesai'] < $use->tglSelesai){
                    return redirect()->back()->withErrors('Mohon maaf, tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain.');
                }
            };
        }

        // Siapkan data untuk disimpan
        $dataToStore = [
            'idCustomer'    => $nik,
            'idKendaraan'   => $request->input('idKendaraan'),
            'idAdmin'       => $request->input('idAdmin'),
            'namaPemohon'   => $request->input('namaPemohon'),
            'noWa'          => $request->input('noWa'),
            'namaKendaraan' => $request->input('namaKendaraan'),
            'keperluan'     => $request->input('keperluan'),
            'lokasi'        => $request->input('lokasi'),
            'titikJemput'   => $request->input('titikJemput'),
            'tglMulai'      => $request->input('tglMulai'),
            'tglSelesai'    => $request->input('tglSelesai'),
            'status'        => 'Belum bayar',
            ];

        // Simpan data ke database
        pemKendaraan::create($dataToStore);

        return redirect()->back()->with('success', 'Booking kendaraan berhasil!');
    }
}
