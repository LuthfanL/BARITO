<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kendaraan;
use Illuminate\Support\Facades\Storage;

class buatKendaraanController extends Controller
{
    public function index()
    {
        return view('buatKendaraan');
    }

    public function store(Request $request)
    {

        // Bersihkan dan normalisasi plat nomor (hapus spasi dan ubah jadi huruf besar)
        $normalizedPlatNomor = strtoupper(str_replace(' ', '', $request->input('platNomor')));

        // Cek apakah plat nomor sudah ada (tanpa spasi dan case insensitive)
        $existingKendaraan = kendaraan::all()->filter(function ($item) use ($normalizedPlatNomor) {
            return strtoupper(str_replace(' ', '', $item->platNomor)) === $normalizedPlatNomor;
        })->first();

        if ($existingKendaraan) {
            return back()->withErrors(['platNomor' => 'Plat nomor sudah digunakan.']);
        }

        // Validasi input
        $request->validate([
            'platNomor' => 'required|string|max:11|unique:kendaraan,platNomor',
            'nama' => 'required|string|max:30',
            'jumlahKursi' => 'required|integer',
            'tv' => 'required|string|max:5',
            'sound' => 'required|string|max:5',
            'ac' => 'required|string|max:5',
            'deskripsi' => 'required|string|max:50',
            'cc' => 'required|integer',
            'tahunKeluar' => 'required|integer',
            'foto' => 'required|array',
            'foto.*' => 'required|image|mimes:jpeg,png|max:2048', // Maksimal 2MB
            'biayaSewa' => 'required|integer'
        ]);

        $fotoPaths = [];
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $foto) {
                $path = $foto->store('foto_kendaraan', 'public'); // Simpan di folder foto_ruangan
                $fotoPaths[] = Storage::url($path); // Simpan path ke array
            }
        }  
        
        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil idAdmin dari model adminKendaraan
        $idAdmin = \App\Models\adminKendaraan::getIdAdminByEmail($user->email);

        if (!$idAdmin) {
            // Tangani error jika idAdmin tidak ditemukan
            return back()->with('error', 'Admin tidak ditemukan');
        }

        // Simpan data ke database
        kendaraan::create([
            'platNomor' => $request->input('platNomor'),
            'idAdmin' => $idAdmin,
            'nama' => $request->input('nama'),
            'jumlahKursi' => $request->input('jumlahKursi'),
            'tv' => $request->input('tv'),
            'sound' => $request->input('sound'),
            'ac' => $request->input('ac'),
            'deskripsi' => $request->input('deskripsi'),
            'cc' => $request->input('cc'),
            'tahunKeluar' => $request->input('tahunKeluar'),
            'foto' => json_encode($fotoPaths), // Simpan path foto sebagai JSON
            'biayaSewa' => $request->input('biayaSewa')
        ]);

        return redirect()->back()->with('success', 'Kendaraan berhasil ditambahkan!');
    }
}

