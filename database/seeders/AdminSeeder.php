<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //super admin
        user::create([
        'name' => 'super admin',
        'email' => 'super@uppm.com',
        'role' => 'super_admin',
        'password' => Hash::make('superadmin123'),//ganti pwnya
    ]);

        //admin biasa
        user::create([
            'name' => 'admin',
            'email' => 'admin@uppm.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),//ganti pwnya
        ]);
    }
}
