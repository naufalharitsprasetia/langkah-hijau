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
            'email' => 'admin@example.com',
            'password' => Hash::make('bismillah123'),
            'is_admin' => true,
            'total_points' => 0,
            'created_at' => now(),
        ]);
        User::create([
            'name' => 'Naufal Harits',
            'username' => 'naufalharits',
            'email' => 'naufal@example.com',
            'password' => Hash::make('bismillah'),
            'total_points' => 0,
            'created_at' => now(),
        ]);

        User::create([
            'name' => 'Andi Budiman',
            'username' => 'andibudiman',
            'email' => 'andi@example.com',
            'password' => Hash::make('password123'),
            'total_points' => 0,
            'created_at' => now(),
        ]);

        User::create([
            'name' => 'Citra Lestari',
            'username' => 'citralestari',
            'email' => 'citra@example.com',
            'password' => Hash::make('password123'),
            'total_points' => 0,
            'created_at' => now(),
        ]);

        User::create([
            'name' => 'Bayu Perkasa',
            'username' => 'bayuperkasa',
            'email' => 'bayu@example.com',
            'password' => Hash::make('password123'),
            'total_points' => 0,
            'created_at' => now(),
        ]);
    }
}
