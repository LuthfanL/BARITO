<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use Illuminate\Support\Facades\Storage;

class buatEventController extends Controller
{
    public function index(Request $request)
    {
        return view('buatEvent');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'namaEvent' => 'required|string|max:50|unique:event,namaEvent',
            'tglMulai' => 'required|date',
            'tglSelesai' => 'required|date',
            'nMakanan' => 'required|integer',
            'nBarang' => 'required|integer',
            'nJasa' => 'required|integer',
            'deskripsi' => 'required|string|max:255',
            'foto' => 'required|array',
            'foto.*' => 'required|image|mimes:jpeg,png|max:2048', // Maksimal 2MB
            'hargaTenant' => 'required|integer'
        ]);

        $fotoPaths = [];
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $foto) {
                $path = $foto->store('foto_event', 'public'); // Simpan di folder foto_ruangan
                $fotoPaths[] = Storage::url($path); // Simpan path ke array
            }
        }  

        // Simpan data ke database
        event::create([
            'namaEvent' => $request->input('namaEvent'),
            'tglMulai' => $request->input('tglMulai'),
            'tglSelesai' => $request->input('tglSelesai'),
            'nMakanan' => $request->input('nMakanan'),
            'nBarang' => $request->input('nBarang'),
            'nJasa' => $request->input('nJasa'),
            'deskripsi' => $request->input('deskripsi'),
            'foto' => json_encode($fotoPaths), // Simpan path foto sebagai JSON
            'hargaTenant' => $request->input('hargaTenant')
        ]);

        return redirect()->back()->with('success', 'Event berhasil dibuat!');
    }
}