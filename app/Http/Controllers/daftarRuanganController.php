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
    
        // Kirim data ke view
        return view('daftarRuangan', compact('ruangan'));
    }

    public function search(Request $request)
    {
        // Tangkap input pencarian
        $keyword = $request->input('keyword');
        
        // Jika ada pencarian, cari berdasarkan nama
        if ($keyword) {
            $ruangan = ruangan::where('nama', 'like', "%{$keyword}%")
                ->get()
                ->toArray();
        } else {
            // Jika tidak ada pencarian, ambil semua data ruangan
            $ruangan = ruangan::get()->toArray();
        }

        // Mengirim data ke view
        return view('daftarRuangan', compact('ruangan', 'keyword'));
    }

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

}
