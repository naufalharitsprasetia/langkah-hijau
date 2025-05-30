<?php

namespace Database\Seeders;

use App\Models\Badge;
use App\Models\Challenge;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $badge1 = Badge::where('badge', 'Pejuang Anti Plastik')->first();
        $badge2 = Badge::where('badge', 'Komuter Hijau')->first();
        $badge3 = Badge::where('badge', 'Eksplorer Nabati')->first();
        // challenge 1
        Challenge::create([
            'id' => Str::uuid(),
            'title' => '7 Hari Tanpa Plastik Sekali Pakai',
            'description' => 'Selama seminggu, hindari penggunaan plastik sekali pakai seperti kantong kresek, sedotan, botol air, dan kemasan makanan/minuman.',
            'image' => 'haritanpaplastik.png',
            'duration_days' => 7,
            'badge_id' => $badge1->id,
            'green_points' => 400,
        ]);
        // challenge 2
        Challenge::create([
            'id' => Str::uuid(),
            'title' => '5 Hari Transportasi Ramah Lingkungan',
            'description' => 'Gunakan transportasi minim emisi: jalan kaki, sepeda, atau transportasi umum selama 5 hari berturut-turut.',
            'image' => 'haritransportasi.png',
            'duration_days' => 5,
            'badge_id' => $badge2->id,
            'green_points' => 250,
        ]);
        // challenge 3
        Challenge::create([
            'id' => Str::uuid(),
            'title' => '3 Hari Makan Nabati',
            'description' => 'Selama 3 hari penuh, konsumsi makanan nabati (vegetarian/plant-based), hindari daging dan produk hewani.',
            'image' => 'harimakannabati.png',
            'duration_days' => 3,
            'badge_id' => $badge3->id,
            'green_points' => 150,
        ]);
    }
}