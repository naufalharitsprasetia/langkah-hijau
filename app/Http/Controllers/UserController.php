<?php

namespace App\Http\Controllers;

use App\Models\Tier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $title = 'Dashboard';
        $active = 'dashboard';
        return view('users.dashboard', compact('active', 'title'));
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

        // Misal kamu punya model Tier yang punya max_points
        $tier = Tier::where('id', $currentUser->tier_id)->first(); // ambil info tier user
        // dd($currentUser->tier_id);
        // if (!$tier) {
        //     abort(404, "Tier tidak ditemukan");
        // }

        $maxPoints = $tier->max_points;

        // Ambil user non-admin dengan tier sama
        $allUsers = User::where('is_admin', false)
            ->where('tier_id', $currentUser->tier_id)
            ->orderBy('green_points', 'desc')
            ->get();

        // Tambahkan rank
        foreach ($allUsers as $index => $user) {
            $user->rank = $index + 1;
        }

        // Bagi dua kategori berdasarkan max_points
        $topUsers = $allUsers->filter(fn($user) => $user->green_points > $maxPoints);
        $users = $allUsers->filter(fn($user) => $user->green_points <= $maxPoints);

        return view('users.leaderboard', compact('active', 'title', 'users', 'topUsers'));
    }
}