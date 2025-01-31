<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

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

        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil idAdmin dari model adminTenant
        $idAdmin = \App\Models\adminTenant::getIdAdminByEmail($user->email);

        if (!$idAdmin) {
            // Tangani error jika idAdmin tidak ditemukan
            return back()->with('error', 'Admin tidak ditemukan');
        }

        $tglMulai = Carbon::parse($request->input('tglMulai'))->startOfDay();
        $sekarang = Carbon::now()->startOfDay();

        $selisih = $sekarang->diffInDays($tglMulai);

        if ($selisih < 3) {
            return redirect()->back()->withErrors('Event harus dibuat maksimal 3 hari sebelum hari h event!');
        }
        
        if ($request->input('tglSelesai') < $request->input('tglMulai')){
            return redirect()->back()->withErrors('Tanggal Selesai harus lebih dari atau sama dengan tanggal mulai!');
        }

        // Simpan data ke database
        event::create([
            'namaEvent' => $request->input('namaEvent'),
            'idAdmin' => $idAdmin,
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