<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;

class daftarRuanganController extends Controller
{
    public function index(Request $request)
    {

        // Mengambil data ruangan
        $ruangan = ruangan::get()->toArray();
        
        foreach ($ruangan as &$data) { // Gunakan reference "&" agar array berubah
            if (!empty($data['foto'])) {
                // Deteksi tipe MIME dari data gambar
                $mimeType = '';
                try {
                    $imageInfo = getimagesizefromstring($data['foto']);
                    $mimeType = $imageInfo['mime']; // Ambil tipe MIME (e.g., image/jpeg, image/png)
                } catch (\Exception $e) {
                    // Jika terjadi kesalahan, gunakan default MIME
                    $mimeType = 'image/jpeg';
                }
    
                // Buat format base64 sesuai tipe MIME
                $data['foto_base64'] = 'data:' . $mimeType . ';base64,' . base64_encode($data['foto']);
            } else {
                // Gunakan gambar default jika foto tidak tersedia
                $data['foto_base64'] = asset('default-image.jpg');
            }
        }
        
        // Mengirim data ke view
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
