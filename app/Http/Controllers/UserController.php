<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $title = 'Dashboard';
        $active = 'dashboard';
        return view('users.dashboard', compact('active', 'title'));
    }
    public function leaderboard()
    {
        $title = 'LeaderBoard';
        $active = 'leaderboard';
        // Ambil semua user non-admin dan urutkan berdasarkan green_points menurun
        $allUsers = User::where('is_admin', false)
            ->orderBy('green_points', 'desc')
            ->get();

        // Tambahkan kolom 'rank' secara manual
        foreach ($allUsers as $index => $user) {
            $user->rank = $index + 1;
        }

        // Bagi menjadi dua kategori jika masih ingin pisah
        $topUsers = $allUsers->filter(fn($user) => $user->green_points > 500);
        $users = $allUsers->filter(fn($user) => $user->green_points <= 500);
        // Update Tier 1 Minggu Sekali
        return view('users.leaderboard', compact('active', 'title', 'users', 'topUsers'));
    }
}