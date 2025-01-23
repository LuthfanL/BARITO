<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\adminRuangan;
use App\Models\adminKendaraan;
use App\Models\adminTenant;
use App\Models\customer;
use App\Models\event;
use App\Models\ruangan;
use App\Models\kendaraan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //ADMIN -----------------------------------------------------------------
        $users = User::create([
            'email' => 'upanpen@gmail.com',
            'password' => hash::make('Luthfan1!'),
            'role' => 'Admin Ruangan',
        ]);

        $users = User::create([
            'email' => 'udindin@gmail.com',
            'password' => hash::make('Udinz123!'),
            'role' => 'Admin Kendaraan',
        ]);

        $users = User::create([
            'email' => 'piddapid@gmail.com',
            'password' => hash::make('Dapid123!'),
            'role' => 'Admin Tenant',
        ]);

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

        //CUSTOMER -----------------------------------------------------------------
        $users = User::create([
            'email' => 'bluebub@gmail.com',
            'password' => hash::make('Bluebub1!'),
            'role' => 'Customer',
        ]);

        $users = User::create([
            'email' => 'garamdanmadu@gmail.com',
            'password' => hash::make('Tenxy123!'),
            'role' => 'Customer',
        ]);

        $users = User::create([
            'email' => 'bigshow@gmail.com',
            'password' => hash::make('BIGshow1!'),
            'role' => 'Customer',
        ]);

        $cus = customer::create([
            'NIK' => '0000000000000001',
            'name' => 'Blue',
            'noHP' => '083468221476',
            'alamat' => 'Jl. Gubugubu I No. 2',
            'email' => 'bluebub@gmail.com',
            'password' => hash::make('Bluebub1!'),
        ]);

        $cus = customer::create([
            'NIK' => '0000000000000002',
            'name' => 'Garm',
            'noHP' => '083468221226',
            'alamat' => 'Jl. Madu manis I No. 1',
            'email' => 'garamdanmadu@gmail.com',
            'password' => hash::make('Tenxi123!'),
        ]);

        $cus = customer::create([
            'NIK' => '0000000000000003',
            'name' => 'Big Show',
            'noHP' => '083468231277',
            'alamat' => 'Jl. Smackdown No. 89',
            'email' => 'bigshow@gmail.com',
            'password' => hash::make('BIGshow1!'),
        ]);

        // $event = event::create([
        //     'namaEvent' => 'HUT RI Ke-100',
        //     'tglMulai' => '2025-01-31',
        //     'tglSelesai' => '2025-02-01',
        //     'nMakanan' => 20,
        //     'nBarang' => 13,
        //     'nJasa' => 7,
        //     'deskripsi' => 'Event ini adalah event untuk memperingati Hari Ulang Tahun Republik Indonesia yang ke 100 tahun. Event ini akan dilaksanakan di GOR Tri Lomba Juang Semarang.',
        //     'foto' => 'test.jpeg',
        //     'hargaTenant' => 500000,
        // ]);

        // $event = event::create([
        //     'namaEvent' => 'Hari Pendidikan Tahun 2025',
        //     'tglMulai' => '2025-05-02',
        //     'tglSelesai' => '2025-05-02',
        //     'nMakanan' => 8,
        //     'nBarang' => 10,
        //     'nJasa' => 3,
        //     'deskripsi' => 'Event ini adalah event untuk memperingati Hari Pendidikan Nasional Tahun 2025. Event ini akan dilaksanakan di Lapangan Simpang Lima Semarang.',
        //     'foto' => 'test.jpeg',
        //     'hargaTenant' => 150000,
        // ]);

        // $event = event::create([
        //     'namaEvent' => 'Festival Kuliner Nusantara',
        //     'tglMulai' => '2025-03-15',
        //     'tglSelesai' => '2025-03-17',
        //     'nMakanan' => 50,
        //     'nBarang' => 20,
        //     'nJasa' => 10,
        //     'deskripsi' => 'Event ini menghadirkan beragam kuliner dari seluruh Indonesia. Dilaksanakan di Lapangan Simpang Lima Semarang.',
        //     'foto' => 'test.jpeg',
        //     'hargaTenant' => 300000,
        // ]);
        
        // $event = event::create([
        //     'namaEvent' => 'Semarang Book Fair',
        //     'tglMulai' => '2025-06-10',
        //     'tglSelesai' => '2025-06-14',
        //     'nMakanan' => 10,
        //     'nBarang' => 25,
        //     'nJasa' => 5,
        //     'deskripsi' => 'Pameran buku terbesar di Semarang dengan berbagai penawaran menarik dari penerbit terkenal.',
        //     'foto' => 'test.jpeg',
        //     'hargaTenant' => 200000,
        // ]);
        
        // $event = event::create([
        //     'namaEvent' => 'Tech Expo 2025',
        //     'tglMulai' => '2025-09-01',
        //     'tglSelesai' => '2025-09-03',
        //     'nMakanan' => 15,
        //     'nBarang' => 30,
        //     'nJasa' => 12,
        //     'deskripsi' => 'Event teknologi terbesar di Semarang, menampilkan inovasi dan gadget terbaru.',
        //     'foto' => 'test.jpeg',
        //     'hargaTenant' => 400000,
        // ]);        

        // $kendaraan = kendaraan::create([
        //     'platNomor' => 'B 1234 ABC',
        //     'nama' => 'Toyota Alphard',
        //     'jumlahKursi' => 7,
        //     'tv' => '2',
        //     'sound' => 'Ya',
        //     'ac' => 'Ya',
        //     'deskripsi' => 'Mobil mewah untuk perjalanan VIP',
        //     'cc' => 2500,
        //     'tahunKeluar' => 2020,
        //     'foto' => 'test.jpeg',
        //     'biayaSewa' => 1500000,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // $kendaraan = kendaraan::create([
        //     'platNomor' => 'D5678XYZ',
        //     'nama' => 'Isuzu Elf',
        //     'jumlahKursi' => 15,
        //     'tv' => 'Tidak',
        //     'sound' => 'Ya',
        //     'ac' => 'Ya',
        //     'deskripsi' => 'Mobil besar untuk rombongan',
        //     'cc' => 3000,
        //     'tahunKeluar' => 2018,
        //     'foto' => 'test.jpeg',
        //     'biayaSewa' => 800000,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // $kendaraan = kendaraan::create([
        //     'platNomor' => 'H1234ABC',
        //     'nama' => 'Honda CR-V',
        //     'jumlahKursi' => 5,
        //     'tv' => 'Tidak',
        //     'sound' => 'Ya',
        //     'ac' => 'Ya',
        //     'deskripsi' => 'Mobil SUV dengan kenyamanan untuk keluarga.',
        //     'cc' => 1500,
        //     'tahunKeluar' => 2021,
        //     'foto' => 'test.jpeg',
        //     'biayaSewa' => 700000,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        
        // $kendaraan = kendaraan::create([
        //     'platNomor' => 'L9876XYZ',
        //     'nama' => 'Mitsubishi Pajero',
        //     'jumlahKursi' => 7,
        //     'tv' => 'Ya',
        //     'sound' => 'Ya',
        //     'ac' => 'Ya',
        //     'deskripsi' => 'SUV premium dengan performa tangguh.',
        //     'cc' => 2400,
        //     'tahunKeluar' => 2019,
        //     'foto' => 'test.jpeg',
        //     'biayaSewa' => 1200000,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        
        // $kendaraan = kendaraan::create([
        //     'platNomor' => 'F4567GHI',
        //     'nama' => 'Suzuki APV',
        //     'jumlahKursi' => 8,
        //     'tv' => 'Tidak',
        //     'sound' => 'Ya',
        //     'ac' => 'Ya',
        //     'deskripsi' => 'Mobil MPV dengan kapasitas besar.',
        //     'cc' => 1600,
        //     'tahunKeluar' => 2017,
        //     'foto' => 'test.jpeg',
        //     'biayaSewa' => 500000,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);        

        // $ruangan = ruangan::create([
        //     'nama' => 'Aula Utama',
        //     'lokasi' => 'Gedung A, Lantai 1',
        //     'podium' => 1,
        //     'meja' => 10,
        //     'kursi' => 100,
        //     'sound' => 2,
        //     'ac' => 8,
        //     'proyektor' => 4,
        //     'luas' => '20m x 20m',
        //     'deskripsi' => 'Aula besar untuk seminar dan acara resmi',
        //     'lantai' => 1,
        //     'foto' => 'test.jpeg',
        //     'biayaSewa' => 500000,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // $ruangan = ruangan::create([
        //     'nama' => 'Ruang Rapat VIP',
        //     'lokasi' => 'Gedung B, Lantai 3',
        //     'podium' => 0,
        //     'meja' => 1,
        //     'kursi' => 20,
        //     'sound' => 1,
        //     'ac' => 6,
        //     'proyektor' => 2,
        //     'luas' => '20m x 10m',
        //     'deskripsi' => 'Ruang rapat eksklusif dengan fasilitas lengkap',
        //     'lantai' => 3,
        //     'foto' => 'test.jpeg',
        //     'biayaSewa' => 300000,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // $ruangan = ruangan::create([
        //     'nama' => 'Ruang Pelatihan',
        //     'lokasi' => 'Gedung C, Lantai 2',
        //     'podium' => 1,
        //     'meja' => 15,
        //     'kursi' => 50,
        //     'sound' => 2,
        //     'ac' => 4,
        //     'proyektor' => 2,
        //     'luas' => '15m x 20m',
        //     'deskripsi' => 'Ruang pelatihan dengan fasilitas lengkap.',
        //     'lantai' => 2,
        //     'foto' => 'test.jpeg',
        //     'biayaSewa' => 400000,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        
        // $ruangan = ruangan::create([
        //     'nama' => 'Aula Kecil',
        //     'lokasi' => 'Gedung D, Lantai 1',
        //     'podium' => 1,
        //     'meja' => 5,
        //     'kursi' => 30,
        //     'sound' => 1,
        //     'ac' => 2,
        //     'proyektor' => 1,
        //     'luas' => '10m x 15m',
        //     'deskripsi' => 'Aula kecil untuk acara internal.',
        //     'lantai' => 1,
        //     'foto' => 'test.jpeg',
        //     'biayaSewa' => 200000,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        
        // $ruangan = ruangan::create([
        //     'nama' => 'Ruang Diskusi',
        //     'lokasi' => 'Gedung E, Lantai 2',
        //     'podium' => 0,
        //     'meja' => 2,
        //     'kursi' => 10,
        //     'sound' => 1,
        //     'ac' => 1,
        //     'proyektor' => 1,
        //     'luas' => '8m x 10m',
        //     'deskripsi' => 'Ruang kecil untuk diskusi kelompok.',
        //     'lantai' => 2,
        //     'foto' => 'test.jpeg',
        //     'biayaSewa' => 100000,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);        
    }
}
