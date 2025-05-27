<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('bismillah'),
            'is_admin' => true,
            'green_points' => 0,
            'created_at' => now(),
        ]);
        User::create([
            'name' => 'Naufal Harits',
            'username' => 'naufalharits',
            'email' => 'naufal@gmail.com',
            'password' => Hash::make('bismillah'),
            'green_points' => 0,
            'created_at' => now(),
        ]);

        User::create([
            'name' => 'Andi Budiman',
            'username' => 'andibudiman',
            'email' => 'andi@example.com',
            'password' => Hash::make('password123'),
            'green_points' => 0,
            'created_at' => now(),
        ]);

        User::create([
            'name' => 'Citra Lestari',
            'username' => 'citralestari',
            'email' => 'citra@example.com',
            'password' => Hash::make('password123'),
            'green_points' => 0,
            'created_at' => now(),
        ]);

        User::create([
            'name' => 'Bayu Perkasa',
            'username' => 'bayuperkasa',
            'email' => 'bayu@example.com',
            'password' => Hash::make('password123'),
            'green_points' => 0,
            'created_at' => now(),
        ]);
    }
}