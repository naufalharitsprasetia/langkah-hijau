<?php

namespace Database\Seeders;

use App\Models\ChallengeDailyAction;
use App\Models\Tier;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            TierSeeder::class,
            BadgeSeeder::class,
            UserSeeder::class,
            PostSeeder::class,
            ChallengeSeeder::class,
            ChallengeActionSeeder::class,
            ChallengeParticipationSeeder::class,
            ChallengeDailyActionSeeder::class,
            QuizSeeder::class,
            EventSeeder::class,
            UserBadgeSeeder::class,
        ]);
        // $users = User::all();
        // foreach ($users as $user) {
        //     User::updateTier($user);
        // }
    }
}