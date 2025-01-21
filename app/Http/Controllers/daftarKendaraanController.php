<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kendaraan;

class daftarKendaraanController extends Controller
{
    public function index(Request $request)
    {

        // Mengambil data kendaraan
        $kendaraan = kendaraan::get()->toArray();
        
        foreach ($kendaraan as &$data) { // Gunakan reference "&" agar array berubah
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
        return view('daftarKendaraan', compact('kendaraan'));
    }

    public function search(Request $request)
    {
        // Tangkap input pencarian
        $keyword = $request->input('keyword');
        
        // Jika ada pencarian, cari berdasarkan nama atau platNomor
        if ($keyword) {
            $kendaraan = kendaraan::where('nama', 'like', "%{$keyword}%")
                ->orWhere('platNomor', 'like', "%{$keyword}%")
                ->get()
                ->toArray();
        } else {
            // Jika tidak ada pencarian, ambil semua data kendaraan
            $kendaraan = kendaraan::get()->toArray();
        }

        // Mengirim data ke view
        return view('daftarKendaraan', compact('kendaraan', 'keyword'));
    }

    public function destroy($platNomor)
    {
        // Cari kendaraan berdasarkan platNomor
        $kendaraan = kendaraan::where('platNomor', $platNomor)->first();

        // Periksa apakah kendaraan ditemukan
        if (!$kendaraan) {
            return redirect()->back()->with('error', 'Kendaraan tidak ditemukan.');
        }

        // Hapus kendaraan
        $kendaraan->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('daftarKendaraan')->with('success', 'Kendaraan berhasil dihapus.');
    }

}
