<?php

namespace Database\Seeders;

use App\Models\Challenge;
use Illuminate\Support\Str;
use App\Models\ChallengeAction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChallengeActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $challenge1 = Challenge::where('title', '7 Hari Tanpa Plastik Sekali Pakai')->first();
        // Challenge 1
        $actions1 = [
            [
                'action' => 'Gunakan tas belanja kain setiap kali berbelanja.',
            ],
            [
                'action' => 'Bawa dan gunakan botol minum pribadi.',
            ],
            [
                'action' => 'Hindari membeli makanan atau minuman dalam kemasan plastik sekali pakai.',
            ],
            [
                'action' => 'Tolak sedotan plastik, atau gunakan alternatif reusable jika perlu.',
            ],
            [
                'action' => 'Pilih produk dengan kemasan minimal atau tanpa kemasan plastik.',
            ],
        ];
        foreach ($actions1 as $action) {
            DB::table('challenge_actions')->insert([
                'action' => $action['action'],
                'created_at' => now(),
                'challenge_id' => $challenge1->id,
            ]);
        }

        // Challenge 2
        $challenge2 = Challenge::where('title', '5 Hari Transportasi Ramah Lingkungan')->first();
        $actions2 = [
            [
                'action' => 'Jalan Kaki atau Bersepeda untuk Jarak Dekat.',
            ],
            [
                'action' => 'Manfaatkan Transportasi Umum.',
            ],
            [
                'action' => 'Coba Carpooling atau Berbagi Tumpangan.',
            ],
            [
                'action' => 'Rencanakan Perjalanan Efisien Jika Harus Berkendara.',
            ],
            [
                'action' => 'Satu Hari Bebas Emisi Kendaraan Pribadi.',
            ],
        ];
        foreach ($actions2 as $action) {
            DB::table('challenge_actions')->insert([
                'action' => $action['action'],
                'created_at' => now(),
                'challenge_id' => $challenge2->id,
            ]);
        }
        // Challenge 3
        $challenge3 = Challenge::where('title', '3 Hari Makan Nabati')->first();
        $actions3 = [
            [
                'action' => 'Eksplorasi Sarapan dan Makan Siang Nabati.',
            ],
            [
                'action' => 'Fokus pada Variasi Protein Nabati untuk Makan Malam.',
            ],
            [
                'action' => 'Nikmati Camilan dan Makanan Penutup Nabati.',
            ],
            [
                'action' => 'Perhatikan Label & Hindari Produk Hewani Tersembunyi.',
            ],
            [
                'action' => 'Jaga Hidrasi dan Perbanyak Serat.',
            ],
        ];
        foreach ($actions3 as $action) {
            DB::table('challenge_actions')->insert([
                'action' => $action['action'],
                'created_at' => now(),
                'challenge_id' => $challenge3->id,
            ]);
        }
        // END
    }
}