<?php

namespace Database\Seeders;

use App\Models\Badge;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserBadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // badge
        $badge1 = Badge::where('badge', "Sustainability Hero")->first();
        $badge2 = Badge::where('badge', "Green Contributor")->first();
        // user
        $user1 = User::where('email', 'naufal@gmail.com')->first(); // tema 1 dan 6
        // Menghubungkan ayat dengan tema
        $user1->badge()->attach([$badge1->id, $badge2->id]);
    }
}