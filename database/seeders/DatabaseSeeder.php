<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'admin@example.com',
            'password' => Hash::make('bismillah123'),
            'is_admin' => true,
            'created_at' => now(),
        ]);
        User::create([
            'name' => 'Naufal Harits',
            'username' => 'naufalharits',
            'email' => 'naufal@example.com',
            'password' => Hash::make('bismillah'),
            'created_at' => now(),
        ]);
    }
}