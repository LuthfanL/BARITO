<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\adminRuangan;
use App\Models\adminKendaraan;
use App\Models\adminTenant;
use App\Models\event;
use App\Models\ruangan;
use App\Models\kendaraan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminR = adminRuangan::create([
            'idAdmin' => 'AdminR01',
            'name' => 'Muhammad Luthfan Lazuardi',
            'noHP' => '082195851700',
            'email' => 'upanpen@gmail.com',
            'password' => hash::make('Luthfan1!'),
        ]);
        
        $adminK = adminKendaraan::create([
            'idAdmin' => 'AdminK01',
            'name' => 'Muhammad Naufal Izzudin',
            'noHP' => '087737978567',
            'email' => 'udindin@gmail.com',
            'password' => hash::make('Udinz123!'),
        ]);
        
        $adminT = adminTenant::create([
            'idAdmin' => 'AdminT01',
            'name' => 'David Nugroho',
            'noHP' => '085870194309',
            'email' => 'piddapid@gmail.com',
            'password' => hash::make('Dapid123!'),
        ]);

        $event = event::create([
            'namaEvent' => 'HUT RI Ke-100',
            'tglMulai' => '2025-01-31',
            'tglSelesai' => '2025-02-01',
            'nMakanan' => 20,
            'nBarang' => 13,
            'nJasa' => 7,
            'deskripsi' => 'Event ini adalah event untuk memperingati Hari Ulang Tahun Republik Indonesia yang ke 100 tahun. Event ini akan dilaksanakan di GOR Tri Lomba Juang Semarang.',
            'foto' => 'test.jpeg',
            'hargaTenant' => 500000,
        ]);

        $event = event::create([
            'namaEvent' => 'Hari Pendidikan Tahun 2025',
            'tglMulai' => '2025-05-02',
            'tglSelesai' => '2025-05-02',
            'nMakanan' => 8,
            'nBarang' => 10,
            'nJasa' => 3,
            'deskripsi' => 'Event ini adalah event untuk memperingati Hari Pendidikan Nasional Tahun 2025. Event ini akan dilaksanakan di Lapangan Simpang Lima Semarang.',
            'foto' => 'test.jpeg',
            'hargaTenant' => 150000,
        ]);

        $kendaraan = kendaraan::create([
            'platNomor' => 'B 1234 ABC',
            'nama' => 'Toyota Alphard',
            'jumlahKursi' => 7,
            'tv' => '2',
            'sound' => 'Ya',
            'ac' => 'Ya',
            'deskripsi' => 'Mobil mewah untuk perjalanan VIP',
            'cc' => 2500,
            'tahunKeluar' => 2020,
            'foto' => 'test.jpeg',
            'biayaSewa' => 1500000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $kendaraan = kendaraan::create([
            'platNomor' => 'D5678XYZ',
            'nama' => 'Isuzu Elf',
            'jumlahKursi' => 15,
            'tv' => 'Tidak',
            'sound' => 'Ya',
            'ac' => 'Ya',
            'deskripsi' => 'Mobil besar untuk rombongan',
            'cc' => 3000,
            'tahunKeluar' => 2018,
            'foto' => 'test.jpeg',
            'biayaSewa' => 800000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $ruangan = ruangan::create([
            'nama' => 'Aula Utama',
            'lokasi' => 'Gedung A, Lantai 1',
            'podium' => 1,
            'meja' => 10,
            'kursi' => 100,
            'sound' => 2,
            'ac' => 8,
            'proyektor' => 4,
            'luas' => '20m x 20m',
            'deskripsi' => 'Aula besar untuk seminar dan acara resmi',
            'lantai' => 1,
            'foto' => 'test.jpeg',
            'biayaSewa' => 500000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $ruangan = ruangan::create([
            'nama' => 'Ruang Rapat VIP',
            'lokasi' => 'Gedung B, Lantai 3',
            'podium' => 0,
            'meja' => 1,
            'kursi' => 20,
            'sound' => 1,
            'ac' => 6,
            'proyektor' => 2,
            'luas' => '20m x 10m',
            'deskripsi' => 'Ruang rapat eksklusif dengan fasilitas lengkap',
            'lantai' => 3,
            'foto' => 'test.jpeg',
            'biayaSewa' => 300000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
