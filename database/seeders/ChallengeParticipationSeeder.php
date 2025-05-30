<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Challenge;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\ChallengeParticipation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChallengeParticipationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ambil beberapa user dan challenge yang sudah ada
        $user1 = User::where('email', 'naufal@gmail.com')->first();

        $challengePlastik = Challenge::where('title', '7 Hari Tanpa Plastik Sekali Pakai')->first();

        ChallengeParticipation::create([
            'id' => Str::uuid(),
            'user_id' => $user1->id,
            'challenge_id' => $challengePlastik->id,
            'start_date' => Carbon::now()->subDays(10), // Dimulai 6 hari lalu
            'is_completed' => false,
        ]);
        //  $table->boolean('is_participated')->default(false);
        // $table->dateTime('start_date');
        // $table->boolean('is_completed')->default(false);
        // $table->dateTime('completion_date')->nullable();
    }
}