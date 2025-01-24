<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use Illuminate\Support\Facades\Storage;

class daftarEventController extends Controller
{
    public function index(Request $request)
    {

        $event = event::all();
        $event = event::orderBy('created_at', 'desc')->get();
        
        foreach ($event as &$data) {
            if (!empty($data->foto)) {
                // Ambil URL gambar utama dan URL thumbnail
                $data->foto_url = Storage::url(json_decode($data->foto)[0]);
                $data->foto_urls = json_decode($data->foto); // Array foto untuk thumbnails
            } else {
                $data->foto_url = asset('default-image.jpg');
                $data->foto_urls = []; // Tidak ada thumbnail jika tidak ada foto
            }
        }
        
        // Mengirim data ke view
        return view('daftarEvent', compact('event'));
    }

    // public function search(Request $request)
    // {
    //     // Tangkap input pencarian
    //     $keyword = $request->input('keyword');
        
    //     // Jika ada pencarian, cari berdasarkan nama event
    //     if ($keyword) {
    //         $event = event::where('namaEvent', 'like', "%{$keyword}%")
    //             ->get(); // Ambil data event yang sesuai dengan pencarian
    //     } else {
    //         // Jika tidak ada pencarian, ambil semua data event
    //         $event = event::all(); // Mengambil semua event
    //     }
    
    //     // Kirim data ke view
    //     return view('daftarEvent', compact('event', 'keyword'));
    // }

    public function destroy($namaEvent)
    {
        // Cari event berdasarkan namaEvent
        $event = event::where('namaEvent', $namaEvent)->first();

        // Periksa apakah event ditemukan
        if (!$event) {
            return redirect()->back()->with('error', 'Event tidak ditemukan.');
        }

        // Hapus event
        $event->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('daftarEvent')->with('success', 'Event berhasil dihapus.');
    }

    public function update(Request $request)
    {
        // Validasi data
        $request->validate([
            'namaEvent' => 'required|string',
            'deskripsi' => 'required|string',
            'tglMulai' => 'required|date',
            'tgSelesai' => 'required|date',
        ]);

        // Cari event berdasarkan namaEvent
        $event = Event::where('namaEvent', $request->namaEvent)->firstOrFail();

        // Update data event
        $event->update([
            'tglMulai' => $request->tglMulai,
            'tglSelesai' => $request->tglSelesai,
            'nMakanan' => $request->nMakanan,
            'nBarang' => $request->nBarang,
            'nJasa' => $request->nJasa,
            'deskripsi' => $request->deskripsi,
            'hargaTenant' => $request->hargaTenant,
        ]);

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data event berhasil diperbarui!');
    }

}
