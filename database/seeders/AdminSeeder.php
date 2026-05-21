<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'super@uppm.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('suparadmin123'),
                'role' => 'admin',
            ]
        );

        // Tambah admin kedua (opsional)
        // User::firstOrCreate(
        //     ['email' => 'admin2@researchgroup.com'],
        //     [
        //         'name' => 'Admin 2',
        //         'password' => Hash::make('password123'),
        //         'role' => 'admin',
        //     ]
        // );
    }
}
