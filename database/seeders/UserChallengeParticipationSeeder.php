<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Challenge;
use Illuminate\Database\Seeder;
use App\Models\UserChallengeParticipation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserChallengeParticipationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ambil beberapa user dan challenge yang sudah ada
        $user1 = User::where('email', 'andi@example.com')->first();
        $user2 = User::where('email', 'citra@example.com')->first();
        $user3 = User::where('email', 'bayu@example.com')->first();

        $challengePlastik = Challenge::where('title', 'LIKE', '%Plastik%')->first();
        $challengeTransport = Challenge::where('title', 'LIKE', '%Transportasi%')->first();
        $challengeNabati = Challenge::where('title', 'LIKE', '%Nabati%')->first();

        if ($user1 && $challengePlastik) {
            UserChallengeParticipation::create([
                'user_id' => $user1->id,
                'challenge_id' => $challengePlastik->id,
                'start_date' => Carbon::now()->subDays(3), // Dimulai 3 hari lalu
                'status' => 'active',
                'earned_challenge_points' => 30,
            ]);
        }

        if ($user1 && $challengeTransport) {
            UserChallengeParticipation::create([
                'user_id' => $user1->id,
                'challenge_id' => $challengeTransport->id,
                'start_date' => Carbon::now()->subDays(6), // Dimulai 6 hari lalu, seharusnya sudah selesai
                'status' => 'completed',
                'completion_date' => Carbon::now()->subDay(), // Selesai kemarin
                'earned_challenge_points' => $challengeTransport->completion_bonus_points + (20 * $challengeTransport->duration_days), // Poin harian + bonus
            ]);
        }

        if ($user2 && $challengeNabati) {
            UserChallengeParticipation::create([
                'user_id' => $user2->id,
                'challenge_id' => $challengeNabati->id,
                'start_date' => Carbon::now()->subDay(), // Dimulai kemarin
                'status' => 'active',
                'earned_challenge_points' => 15, // Anggap sudah dapat poin untuk 1 hari
            ]);
        }

        if ($user2 && $challengePlastik) {
            UserChallengeParticipation::create([
                'user_id' => $user2->id,
                'challenge_id' => $challengePlastik->id,
                'start_date' => Carbon::now(), // Baru mulai hari ini
                'status' => 'active',
                'earned_challenge_points' => 0,
            ]);
        }
    }
}