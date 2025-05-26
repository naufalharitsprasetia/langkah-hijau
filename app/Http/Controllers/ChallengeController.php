<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function index() {
        $challenges = Challenge::orderBy('title')->get();
        // dd($challenges);
        $title = 'Challenges';
        $active = 'challenges';
        return view('challenges.index', compact('challenges', 'title', 'active'));
    }

    public function show(Challenge $challenge)
    {
        return view('challenges.show', compact('challenge'));
    }

}
