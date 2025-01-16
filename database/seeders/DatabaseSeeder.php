<?php

namespace Database\Seeders;

use App\Models\customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $customer = customer::create([
            'NIK' => '3374123456780000',
            'name' => 'Test User',
            'alamat' => 'Jl. abscsjdfn',
            'email' => 'test@example.com',
            'password' => '5b9e4811',
        ]);

        
    }
}
