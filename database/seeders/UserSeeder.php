<?php

namespace Database\Seeders;

use App\Models\Tier;
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
        $tier1 = Tier::where('urutan', 1)->first();
        $tier2 = Tier::where('urutan', 2)->first();
        $tier3 = Tier::where('urutan', 3)->first();
        $tier4 = Tier::where('urutan', 4)->first();

        User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('bismillah'),
            'is_admin' => true,
            'green_points' => 0,
            'created_at' => now(),
            'tier_id' => $tier1->id
        ]);
        User::create([
            'name' => 'Naufal Harits',
            'username' => 'naufalharits',
            'email' => 'naufal@gmail.com',
            'password' => Hash::make('bismillah'),
            'green_points' => 400,
            'created_at' => now(),
            'tier_id' => $tier2->id
        ]);

        User::create([
            'name' => 'Andi Budiman',
            'username' => 'andibudiman',
            'email' => 'andi@example.com',
            'password' => Hash::make('password123'),
            'green_points' => 305,
            'created_at' => now(),
            'tier_id' => $tier2->id
        ]);

        User::create([
            'name' => 'Citra Lestari',
            'username' => 'citralestari',
            'email' => 'citra@example.com',
            'password' => Hash::make('password123'),
            'green_points' => 250,
            'created_at' => now(),
            'tier_id' => $tier3->id
        ]);

        User::create([
            'name' => 'Bayu Perkasa',
            'username' => 'bayuperkasa',
            'email' => 'bayu@example.com',
            'password' => Hash::make('password123'),
            'green_points' => 100,
            'created_at' => now(),
            'tier_id' => $tier1->id
        ]);
        User::factory(15)->create([
            'created_at' => now(),
            'tier_id' => $tier1->id
        ]);
        User::factory(15)->create([
            'created_at' => now(),
            'tier_id' => $tier2->id
        ]);
        User::factory(15)->create([
            'created_at' => now(),
            'tier_id' => $tier3->id
        ]);
        User::factory(15)->create([
            'created_at' => now(),
            'tier_id' => $tier4->id
        ]);
    }
}