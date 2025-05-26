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
        $users = User::where('is_admin', false)->get();
        return view('users.leaderboard', compact('active', 'title', 'users'));
    }
}