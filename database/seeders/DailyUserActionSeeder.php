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
                    'checklist_status' => [
                        'gunakan_tas_kain' => true,
                        'bawa_botol_minum' => $i % 2 == 0, // Selang-seling
                        'hindari_kemasan_plastik' => true,
                        'gunakan_sedotan_reuse' => true,
                    ],
                    'notes' => 'Hari ke-' . ($i + 1) . ' tantangan tanpa plastik berjalan lancar!',
                    'is_completed' => false,
                ]);
            }
        }

        if ($andiPartisipasiPlastik) {
            $startDate = \Carbon\Carbon::parse($andiPartisipasiPlastik->start_date);

            // Membuat data untuk hari pertama (day = 1)
            \App\Models\DailyUserAction::create([
                'participation_id' => $andiPartisipasiPlastik->id,
                'action_date' => $startDate->toDateString(), // Ini akan menjadi tanggal start_date
                'daily_points' => 10, // Contoh poin
                'checklist_status' => [ // Contoh checklist
                    'item_pagi_1' => true,
                    'item_pagi_2' => false,
                ],
                'notes' => 'Aksi hari pertama.',
                'is_completed' => false,
            ]);

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
                'checklist_status' => [
                    'sarapan_nabati' => true,
                    'makan_siang_nabati' => true,
                    'konsumsi_buah' => true,
                ],
                'notes' => 'Makan nabati ternyata enak juga!',
                'photo_submission_path' => 'dummy/nabati_day1.jpg',
                'is_completed' => true,
            ]);
        }

        if ($citraPartisipasiNabati) {
            $startDate = \Carbon\Carbon::parse($citraPartisipasiNabati->start_date);

            // Membuat data untuk hari pertama (day = 1)
            \App\Models\DailyUserAction::create([
                'participation_id' => $citraPartisipasiNabati->id,
                'action_date' => $startDate->toDateString(), // Ini akan menjadi tanggal start_date
                'daily_points' => 10, // Contoh poin
                'checklist_status' => [ // Contoh checklist
                    'item_pagi_1' => true,
                    'item_pagi_2' => false,
                ],
                'notes' => 'Aksi hari pertama.',
                'is_completed' => true,
            ]);

        }

        // data hari pertama

    }
}