<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Challenge;
use Illuminate\Database\Seeder;
use App\Models\ChallengeDailyAction;
use App\Models\ChallengeParticipation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChallengeDailyActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ambil partisipasi andi di tantangan plastik (yang masih aktif)
        $userNaufal = User::where('email', 'naufal@gmail.com')->first();
        $challengePlastik = Challenge::where('title', '7 Hari Tanpa Plastik Sekali Pakai')->first();
        $userPartisipasiPlastik = ChallengeParticipation::where('user_id', $userNaufal->id)->where('challenge_id', $challengePlastik->id)->first();

        ChallengeDailyAction::create([
            'checked_at' => Carbon::today()->subDays(6),
            'challenge_participation_id' => $userPartisipasiPlastik->id,
            'day' => 'day1',
            'is_checked' => true,
            'created_at' => Carbon::parse($userPartisipasiPlastik->start_date)->addDays(1)
        ]);
        ChallengeDailyAction::create([
            'checked_at' => Carbon::today()->subDays(5),
            'challenge_participation_id' => $userPartisipasiPlastik->id,
            'day' => 'day2',
            'is_checked' => true,
            'created_at' => Carbon::parse($userPartisipasiPlastik->start_date)
        ]);
        ChallengeDailyAction::create([
            'checked_at' => Carbon::today()->subDays(4),
            'challenge_participation_id' => $userPartisipasiPlastik->id,
            'day' => 'day3',
            'is_checked' => true,
            'created_at' => Carbon::parse($userPartisipasiPlastik->start_date)
        ]);
        ChallengeDailyAction::create([
            'checked_at' => Carbon::today()->subDays(3),
            'challenge_participation_id' => $userPartisipasiPlastik->id,
            'day' => 'day4',
            'is_checked' => true,
            'created_at' => Carbon::parse($userPartisipasiPlastik->start_date)
        ]);
        ChallengeDailyAction::create([
            'checked_at' => Carbon::today()->subDays(2),
            'challenge_participation_id' => $userPartisipasiPlastik->id,
            'day' => 'day5',
            'is_checked' => true,
            'created_at' => Carbon::parse($userPartisipasiPlastik->start_date)
        ]);
        ChallengeDailyAction::create([
            'checked_at' => Carbon::today()->subDays(1),
            'challenge_participation_id' => $userPartisipasiPlastik->id,
            'day' => 'day6',
            'is_checked' => true,
            'created_at' => Carbon::parse($userPartisipasiPlastik->start_date)
        ]);
    }
}