<?php

namespace Database\Seeders;

use App\Models\Challenge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Challenge::create([
            'title' => '7 Hari Tanpa Plastik Sekali Pakai',
            'description' => 'Selama seminggu, hindari penggunaan plastik sekali pakai seperti kantong kresek, sedotan, botol air, dan kemasan makanan/minuman.',
            'checklist' => [
                'gunakan_tas_kain' => 'Gunakan tas belanja kain setiap kali berbelanja.',
                'bawa_botol_minum' => 'Bawa dan gunakan botol minum pribadi.',
                'hindari_kemasan_plastik' => 'Hindari membeli makanan atau minuman dalam kemasan plastik sekali pakai.',
                'gunakan_sedotan_reuse' => 'Tolak sedotan plastik, atau gunakan alternatif reusable jika perlu.',
                'pilih_kemasan_minimal' => 'Pilih produk dengan kemasan minimal atau tanpa kemasan plastik.',
            ],

            'image_path' => 'challenge_images/no_plastic_week.jpg',
            'duration_days' => 7,
            'badge_name' => 'Pejuang Anti Plastik',
            'badge_icon' => '♻️',
            'completion_bonus_points' => 150,
        ]);

        Challenge::create([
            'title' => '5 Hari Transportasi Ramah Lingkungan',
            'description' => 'Gunakan transportasi minim emisi: jalan kaki, sepeda, atau transportasi umum selama 5 hari berturut-turut.',
            'checklist' => [
                'gunakan_tas_kain' => 'Gunakan tas belanja kain setiap kali berbelanja.',
                'bawa_botol_minum' => 'Bawa dan gunakan botol minum pribadi.',
                'hindari_kemasan_plastik' => 'Hindari membeli makanan atau minuman dalam kemasan plastik sekali pakai.',
                'gunakan_sedotan_reuse' => 'Tolak sedotan plastik, atau gunakan alternatif reusable jika perlu.',
                'pilih_kemasan_minimal' => 'Pilih produk dengan kemasan minimal atau tanpa kemasan plastik.',
            ],

            'image_path' => 'challenge_images/eco_transport.jpg',
            'duration_days' => 5,
            'badge_name' => 'Komuter Hijau',
            'badge_icon' => '🚴',
            'completion_bonus_points' => 100,
        ]);

        Challenge::create([
            'title' => '3 Hari Makan Nabati',
            'description' => 'Selama 3 hari penuh, konsumsi makanan nabati (vegetarian/plant-based), hindari daging dan produk hewani.',
           'checklist' => [
                'gunakan_tas_kain' => 'Gunakan tas belanja kain setiap kali berbelanja.',
                'bawa_botol_minum' => 'Bawa dan gunakan botol minum pribadi.',
                'hindari_kemasan_plastik' => 'Hindari membeli makanan atau minuman dalam kemasan plastik sekali pakai.',
                'gunakan_sedotan_reuse' => 'Tolak sedotan plastik, atau gunakan alternatif reusable jika perlu.',
                'pilih_kemasan_minimal' => 'Pilih produk dengan kemasan minimal atau tanpa kemasan plastik.',
            ],

            'image_path' => 'challenge_images/plant_based_diet.jpg',
            'duration_days' => 3,
            'badge_name' => 'Eksplorer Nabati',
            'badge_icon' => '🌱',
            'completion_bonus_points' => 75,
        ]);
    }
}