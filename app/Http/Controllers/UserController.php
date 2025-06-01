<?php

namespace App\Http\Controllers;

use App\Models\Tier;
use App\Models\User;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $user1 = Auth::user();
        $user =  User::where('id', $user1->id)->first();
        $quizAttempts = $user->quizAttempts()->with('quiz')->latest()->get();

        $title = 'Dashboard';
        $active = 'dashboard';

        // Logika penghitungan persentase tier (sudah ada)
        $nextTier = $user->tier->max_points;
        $now = $user->green_points;
        $kurang = max(0, $nextTier - $now);

        // Menghitung persentase
        if ($nextTier > 0) { // Pastikan $nextTier tidak nol untuk menghindari pembagian dengan nol
            $persen = ($now / $nextTier) * 100;
            $persen = min(100, $persen); // Pastikan persentase tidak melebihi 100%
        } else {
            $persen = 100; // Jika sudah di tier tertinggi atau nextTier tidak terdefinisi
        }


        // Teruskan data quizAttempts ke view
        return view('users.dashboard', compact('active', 'title', 'quizAttempts', 'persen', 'kurang', 'nextTier', 'now'));
    }

    public function profile(User $user)
    {
        $title = 'Profile';
        $active = 'profile';
        return view('users.profile', compact('active', 'title', 'user'));
    }

    public function tierInfo()
    {
        $title = 'Informasi Tentang Tier';
        $active = 'info-tier';
        $tiers = Tier::orderBy('urutan', 'asc')->get();
        return view('users.info-tier', compact('active', 'title', 'tiers'));
    }

    public function leaderboard()
    {
        $title = 'LeaderBoard';
        $active = 'leaderboard';

        $currentUser = Auth::user();

        $tier = Tier::where('id', $currentUser->tier_id)->first();

        // Cek jika tier tidak ditemukan
        if (!$tier) {
            $maxPoints = 0; // Atau nilai default lainnya
        } else {
            $maxPoints = $tier->max_points;
        }


        $allUsers = User::where('is_admin', false)
            ->where('tier_id', $currentUser->tier_id)
            ->orderBy('green_points', 'desc')
            ->get();

        foreach ($allUsers as $index => $user) {
            $user->rank = $index + 1;
        }

        // Filter berdasarkan maxPoints yang sudah dipastikan ada
        $topUsers = $allUsers->filter(fn($user) => $maxPoints > 0 && $user->green_points > $maxPoints);
        $users = $allUsers->filter(fn($user) => $maxPoints > 0 && $user->green_points <= $maxPoints);


        $tiers = Tier::orderBy('urutan', 'asc')->get();
        return view('users.leaderboard', compact('active', 'title', 'users', 'topUsers', 'tiers'));
    }
}