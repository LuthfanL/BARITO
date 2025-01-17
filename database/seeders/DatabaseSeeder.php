<?php

namespace Database\Seeders;

use App\Models\adminRuangan;
use App\Models\adminKendaraan;
use App\Models\adminTenant;
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
            'email' => 'upanpen@gmail.com',
            'password' => bcrypt('Luthfan1!'),
        ]);
        
        $adminK = adminKendaraan::create([
            'idAdmin' => 'AdminK01',
            'name' => 'Muhammad Naufal Izzudin',
            'email' => 'udindin@gmail.com',
            'password' => bcrypt('Udinz123!'),
        ]);
        
        $adminT = adminTenant::create([
            'idAdmin' => 'AdminT01',
            'name' => 'David Nugroho',
            'email' => 'piddapid@gmail.com',
            'password' => bcrypt('Dapid123!'),
        ]);
    }
}
