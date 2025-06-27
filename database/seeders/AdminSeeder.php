<?php

// database/seeders/AdminSeeder.php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com', // Kita pakai email untuk login
            'password' => Hash::make('admin123'),
            'jabatan' => 'Super Admin',
            'role' => 'admin',
        ]);
    }
}