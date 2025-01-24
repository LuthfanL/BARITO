<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;
use Illuminate\Support\Facades\Storage;

class daftarRuanganController extends Controller
{
    public function index(Request $request)
    {
        $ruangan = ruangan::all(); // Mengambil data ruangan
        $ruangan = Ruangan::orderBy('created_at', 'desc')->get();
        
        foreach ($ruangan as &$data) {
            if (!empty($data->foto)) {
                // Ambil URL gambar utama dan URL thumbnail
                $data->foto_url = Storage::url(json_decode($data->foto)[0]);
                $data->foto_urls = json_decode($data->foto); // Array foto untuk thumbnails
            } else {
                $data->foto_url = asset('default-image.jpg');
                $data->foto_urls = []; // Tidak ada thumbnail jika tidak ada foto
            }
        }
    
        return view('daftarRuangan', compact('ruangan'));
    }

    // public function search(Request $request)
    // {
    //     // Tangkap input pencarian
    //     $keyword = $request->input('keyword');
        
    //     // Jika ada pencarian, cari berdasarkan nama atau id
    //     if ($keyword) {
    //         $ruangan = ruangan::where('nama', 'like', "%{$keyword}%")
    //             ->orWhere('id', 'like', "%{$keyword}%")
    //             ->get();
    //     } else {
    //         // Jika tidak ada pencarian, ambil semua data ruangan
    //         $ruangan = ruangan::all();
    //     }
    
    //     // Kirim data ke view
    //     return view('daftarRuangan', compact('ruangan', 'keyword'));
    // }

    public function destroy($id)
    {
        // Cari ruangan berdasarkan id
        $ruangan = ruangan::where('id', $id)->first();

        // Periksa apakah ruangan ditemukan
        if (!$ruangan) {
            return redirect()->back()->with('error', 'Ruangan tidak ditemukan.');
        }

        // Hapus ruangan
        $ruangan->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('daftarRuangan')->with('success', 'Ruangan berhasil dihapus.');
    }

    public function update(Request $request)
    {
        // Validasi data
        $request->validate([
            'id' => 'required',
            'nama' => 'required|string',
            'lokasi' => 'required|string',
            'luas' => 'required|string',
            'lantai' => 'required|integer',
            'biayaSewa' => 'required|integer',
        ]);

        // Cari ruangan berdasarkan id
        $ruangan = Ruangan::where('id', $request->id)->firstOrFail();

        // Update data ruangan
        $ruangan->update([
            'id' => $request->id,
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'podium' => $request->podium,
            'meja' => $request->meja,
            'kursi' => $request->kursi,
            'sound' => $request->sound,
            'ac' => $request->ac,
            'proyektor' => $request->proyektor,
            'luas' => $request->luas,
            'deskripsi' => $request->deskripsi,
            'lantai' => $request->lantai,
            'biayaSewa' => $request->biayaSewa,
        ]);

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data ruangan berhasil diperbarui!');
    }
}
