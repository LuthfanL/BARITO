<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\adminTenant; 
use App\Models\pemTenant; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class custBookingTenantController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter 'nama', 'lokasi', dan 'deskripsi' dari URL
        $namaEvent = $request->input('namaEvent');

        // Ambil data ruangan berdasarkan 'nama', 'lokasi', dan 'deskripsi'
        $event = event::where('namaEvent', $namaEvent)->first();

        $calendarEvents = Event::select('namaEvent as title', 'tglMulai as start', 'tglSelesai as end')->get()->map(function ($event) {
            $event->color = '#3788d8';
            $event->end = Carbon::parse($event->end)->addDay()->toDateString();
            return $event;
        });

        $calendarEventsJson = json_encode($calendarEvents);

        // Mengambil URL gambar utama dan URL thumbnail
        if (!empty($event->foto)) {
            $event->foto_url = Storage::url(json_decode($event->foto)[0]);  
            $event->foto_urls = json_decode($event->foto); 
        } else {
            $event->foto_url = asset('default-image.jpg');
            $event->foto_urls = []; // Tidak ada thumbnail jika tidak ada foto
        }

        // Kirim data ruangan ke view
        return view('custBookingTenant', compact('event', 'calendarEventsJson'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'namaEvent'  => 'required|exists:event,namaEvent', // Validasi namaEvent di tabel event
            'idAdmin'      => 'required|exists:adminTenant,idAdmin', // Validasi idAdmin di tabel adminRuangan
            'namaTenant' => 'required|string',
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
            'namaEvent'     => $request->input('namaEvent'),
            'idAdmin'       => $request->input('idAdmin'),
            'namaPemohon'   => $request->input('namaPemohon'),
            'noWa'          => $request->input('noWa'),
            'namaTenant'   => $request->input('namaTenant'),
            'tipeTenant'     => $request->input('tipeTenant'),
            'tglMulai'      => $request->input('tglMulai'),
            'tglSelesai'    => $request->input('tglSelesai'),
            'status'        => 'Belum disetujui',
             // 'buktiBayar'    => json_encode($fotoPaths),
            ];

        // Simpan data ke database
        pemTenant::create($dataToStore);

        return redirect()->back()->with('success', 'Booking kendaraan berhasil!');
    }
}
