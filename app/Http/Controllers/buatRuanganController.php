<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;
use Illuminate\Support\Facades\Storage;

class buatRuanganController extends Controller
{
    public function index(Request $request)
    {
        return view('buatRuangan');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:30',
            'lokasi' => 'required|string|max:50',
            'podium' => 'required|integer',
            'meja' => 'required|integer',
            'kursi' => 'required|integer',
            'sound' => 'required|integer',
            'ac' => 'required|integer',
            'proyektor' => 'required|integer',
            'luas' => 'required|string|max:10',
            'deskripsi' => 'required|string|max:50',
            'lantai' => 'required|integer',
            'foto' => 'required|array',
            'foto.*' => 'required|image|mimes:jpeg,png|max:2048', // Maksimal 2MB
            'biayaSewa' => 'required|integer'
        ]);

        $fotoPaths = [];
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $foto) {
                $path = $foto->store('foto_ruangan', 'public'); // Simpan di folder `foto_ruangan`
                $fotoPaths[] = Storage::url($path); // Simpan path ke array
            }
        }  

        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil idAdmin dari model adminRuangan
        $idAdmin = \App\Models\adminRuangan::getIdAdminByEmail($user->email);

        if (!$idAdmin) {
            // Tangani error jika idAdmin tidak ditemukan
            return back()->with('error', 'Admin tidak ditemukan');
        }

        // Simpan data ke database
        ruangan::create([
            'idAdmin' => $idAdmin,
            'nama' => $request->input('nama'),
            'lokasi' => $request->input('lokasi'),
            'podium' => $request->input('podium'),
            'meja' => $request->input('meja'),
            'kursi' => $request->input('kursi'),
            'sound' => $request->input('sound'),
            'ac' => $request->input('ac'),
            'proyektor' => $request->input('proyektor'),
            'luas' => $request->input('luas'),
            'deskripsi' => $request->input('deskripsi'),
            'lantai' => $request->input('lantai'),
            'foto' => json_encode($fotoPaths), // Simpan path foto sebagai JSON
            'biayaSewa' => $request->input('biayaSewa')
        ]);

        return redirect()->back()->with('success', 'Ruangan berhasil dibuat!');
    }
}
