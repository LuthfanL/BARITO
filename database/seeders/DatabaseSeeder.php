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
            'noHP' => '082195851700',
            'email' => 'upanpen@gmail.com',
            'password' => bcrypt('Luthfan1!'),
        ]);
        
        $adminK = adminKendaraan::create([
            'idAdmin' => 'AdminK01',
            'name' => 'Muhammad Naufal Izzudin',
            'noHP' => '087737978567',
            'email' => 'udindin@gmail.com',
            'password' => bcrypt('Udinz123!'),
        ]);
        
        $adminT = adminTenant::create([
            'idAdmin' => 'AdminT01',
            'name' => 'David Nugroho',
            'noHP' => '085870194309',
            'email' => 'piddapid@gmail.com',
            'password' => bcrypt('Dapid123!'),
        ]);
    }
}
