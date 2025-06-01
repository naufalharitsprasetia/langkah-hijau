<?php

namespace Database\Seeders;

use App\Models\Tier;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tier::create([
            'id' => Str::uuid(),
            'urutan' => 1,
            'name' => 'Eco Beginner',
            'icon' => '🌱',
            'min_points' => 0,
            'max_points' => 350,
            'keterangan' => 'Langkah awal menuju gaya hidup ramah lingkungan',
            'color' => 'yellow-500',
        ]);
        Tier::create([
            'id' => Str::uuid(),
            'urutan' => 2,
            'name' => 'Aktivis Hijau Muda',
            'icon' => '🌿',
            'min_points' => 351,
            'max_points' => 500,
            'keterangan' => 'Semangat hijau mulai tumbuh dan terus berkembang',
            'color' => 'lime-300',
        ]);
        Tier::create([
            'id' => Str::uuid(),
            'urutan' => 3,
            'name' => 'Inspirator Hijau',
            'icon' => '🍀',
            'min_points' => 501,
            'max_points' => 750,
            'keterangan' => 'Menjadi teladan dalam aksi nyata menjaga bumi',
            'color' => 'green-500',
        ]);
        Tier::create([
            'id' => Str::uuid(),
            'urutan' => 4,
            'name' => 'Duta Hijau Digital',
            'icon' => '🌎',
            'min_points' => 751,
            'max_points' => 1000,
            'keterangan' => 'Pemimpin perubahan, siap menginspirasi dunia digital',
            'color' => 'blue-500',
        ]);
    }
}