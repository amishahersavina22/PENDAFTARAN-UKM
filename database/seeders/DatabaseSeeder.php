<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Ini membuat user dengan data spesifik agar temanmu bisa login
        User::factory()->create([
            'name' => 'Admin Tugas',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'), // Jangan lupa tambahkan password
        ]);

        // Jika ingin membuat 10 user tambahan secara acak
        // User::factory(10)->create();
    }
}