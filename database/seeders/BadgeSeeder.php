<?php

namespace Database\Seeders;

use App\Models\Badge;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        Badge::create([
            'badge' => 'Pejuang Anti Plastik',
            'icon' => '♻️',
        ]);
        // 2
        Badge::create([
            'badge' => 'Komuter Hijau',
            'icon' => '🚴',
        ]);
        // 3
        Badge::create([
            'badge' => 'Eksplorer Nabati',
            'icon' => '🌱',
        ]);
        // 4
        Badge::create([
            'badge' => 'Sustainability Hero',
            'icon' => '💎',
        ]);
        // 5
        Badge::create([
            'badge' => 'Green Contributor',
            'icon' => '🥦',
        ]);
    }
}
