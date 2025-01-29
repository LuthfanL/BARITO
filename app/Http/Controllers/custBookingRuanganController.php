<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;
use App\Models\adminRuangan; 
use App\Models\pemRuangan; 
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

        $colors = ['#3788d8', '#f39c12', '#27ae60', '#8e44ad', '#e74c3c', '#16a085', '#d35400', '#2ecc71', '#3498db', '#9b59b6'];

        $calendarRuangan = DB::table('ruangan')
        ->join('pemRuangan', 'ruangan.id', '=', 'pemRuangan.idRuangan')
        ->join('customer', 'pemRuangan.idCustomer', '=', 'customer.NIK')
        ->select(
            DB::raw('CONCAT(pemRuangan.namaPemohon, " - ", pemRuangan.keperluan) as title'), 
            'pemRuangan.tglMulai as start', 
            'pemRuangan.tglSelesai as end'
        )->where('ruangan.nama', $nama)->where('ruangan.lokasi', $lokasi)
        ->get()
        ->map(function ($event, $index) use ($colors) {
            $event->color = $colors[$index % count($colors)];
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

    /*public function index(Request $request)
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

                            
        // $calendarRuangan = ruangan::select('nama as title', 'tglMulai as start', 'tglSelesai as end')->get()->map(function ($ruangan) {
        //     $ruangan->color = '#3788d8';
        //     $ruangan->end = Carbon::parse($ruangan->end)->addDay()->toDateString();
        //     return $ruangan;
        // });
        
        // Haruse jupuk seko tabel pemRuangan tapi aku gak sempet

        // $calendarRuanganJson = json_encode($calendarRuangan);

        // Mengambil URL gambar utama dan URL thumbnail
        if (!empty($ruangan->foto)) {
            $ruangan->foto_url = Storage::url(json_decode($ruangan->foto)[0]);  
            $ruangan->foto_urls = json_decode($ruangan->foto); 
        } else {
            $ruangan->foto_url = asset('default-image.jpg');
            $ruangan->foto_urls = []; // Tidak ada thumbnail jika tidak ada foto
        }

        // Kirim data ruangan ke view
        return view('custBookingRuangan', compact('ruangan'));
    }*/

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'idRuangan'  => 'required|exists:ruangan,id', // Validasi id di tabel ruangan
            'idAdmin'      => 'required|exists:adminRuangan,idAdmin', // Validasi idAdmin di tabel adminRuangan
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

        if ($validated['tglMulai'] == Carbon::now()->format('Y-m-d')){
            return redirect()->back()->withErrors('Tidak bisa memesan untuk hari yang sama dengan hari yang dipesan, minimal 1 hari sebelum hari yang dipesan!');
        }

        $used = pemRuangan::where('idRuangan', $validated['idRuangan'])->get();

        if ($used){
            foreach ($used as $use) {
                if ($validated['tglMulai'] == $use->tglMulai || $validated['tglMulai'] == $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($validated['tglSelesai'] == $use->tglMulai || $validated['tglSelesai'] == $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($validated['tglMulai'] < $use->tglMulai && $validated['tglSelesai'] > $use->tglSelesai) {
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($validated['tglMulai'] > $use->tglMulai && $validated['tglSelesai'] < $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($validated['tglMulai'] > $use->tglMulai && $validated['tglMulai'] < $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($validated['tglSelesai'] > $use->tglMulai && $validated['tglSelesai'] < $use->tglSelesai){
                    return redirect()->back()->withErrors('Tanggal tersebut sudah di booking oleh orang lain, silahkan pilih tanggal lain!');
                }
                if ($validated['tglSelesai'] < $validated['tglMulai']){
                    return redirect()->back()->withErrors('Tanggal Selesai harus lebih dari atau sama dengan tanggal mulai!');
                }
            };
        }

        // Siapkan data untuk disimpan
        $dataToStore = [
            'idCustomer'    => $nik,
            'idRuangan'     => $request->input('idRuangan'),
            'idAdmin'       => $request->input('idAdmin'),
            'namaPemohon'   => $request->input('namaPemohon'),
            'noWa'          => $request->input('noWa'),
            'namaRuangan'   => $request->input('namaRuangan'),
            'keperluan'     => $request->input('keperluan'),
            'keterangan'    => $request->input('keterangan'),
            'tglMulai'      => $request->input('tglMulai'),
            'tglSelesai'    => $request->input('tglSelesai'),
            'status'        => 'Belum disetujui',
             // 'buktiBayar'    => json_encode($fotoPaths),
            ];

        // Simpan data ke database
        pemRuangan::create($dataToStore);

        return redirect()->back()->with('success', 'Booking ruangan berhasil!');
    }
}