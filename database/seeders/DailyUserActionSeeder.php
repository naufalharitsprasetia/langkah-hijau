<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\DailyUserAction;
use Illuminate\Database\Seeder;
use App\Models\UserChallengeParticipation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DailyUserActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //ambil partisipasi andi di tantangan plastik (yang masih aktif)    
        $andiPartisipasiPlastik = UserChallengeParticipation::whereHas('user', function ($query) {
            $query->where('email', 'andi@example.com');
        })->whereHas('challenge', function ($query) {
            $query->where('title', 'LIKE', '%Plastik%');
        })->where('status', 'active')->first();

        if ($andiPartisipasiPlastik) {
            // Aksi untuk 3 hari terakhir
            for ($i = 0; $i < 3; $i++) {
                DailyUserAction::create([
                    'participation_id' => $andiPartisipasiPlastik->id,
                    'action_date' => Carbon::parse($andiPartisipasiPlastik->start_date)->addDays($i),
                    'daily_points' => 10,
                    'checklist_status' => json_encode([
                        'gunakan_tas_kain' => true,
                        'bawa_botol_minum' => $i % 2 == 0, // Selang-seling
                        'hindari_kemasan_plastik' => true,
                        'gunakan_sedotan_reuse' => true,
                    ]),
                    'notes' => 'Hari ke-' . ($i + 1) . ' tantangan tanpa plastik berjalan lancar!',
                ]);
            }
        }

        // Ambil partisipasi Citra di tantangan nabati (yang masih aktif)
        $citraPartisipasiNabati = UserChallengeParticipation::whereHas('user', function ($query) {
            $query->where('email', 'citra@example.com');
        })->whereHas('challenge', function ($query) {
            $query->where('title', 'LIKE', '%Nabati%');
        })->where('status', 'active')->first();

        if ($citraPartisipasiNabati) {
            // Aksi untuk 1 hari terakhir
            DailyUserAction::create([
                'participation_id' => $citraPartisipasiNabati->id,
                'action_date' => Carbon::parse($citraPartisipasiNabati->start_date),
                'daily_points' => 15,
                'checklist_status' => json_encode([
                    'sarapan_nabati' => true,
                    'makan_siang_nabati' => true,
                    'konsumsi_buah' => true,
                ]),
                'notes' => 'Makan nabati ternyata enak juga!',
                'photo_submission_path' => 'dummy/nabati_day1.jpg', // Contoh path foto
            ]);
        }
    }
}
