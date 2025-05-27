<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\UserChallengeParticipation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{
    public function index() {
        $challenges = Challenge::orderBy('title')->get();
        // dd($challenges);
        $title = 'Challenges';
        $active = 'challenges';
        return view('challenges.index', compact('challenges', 'title', 'active'));
    }

    public function show(Challenge $challenge) {
        $title = 'Challenges';
        $active = 'challenges';
        $userActiveParticipation = null;
        $userCompletedParticipation = null;
        $canParticipate = false;

        if (Auth::check()) {
            $user = Auth::user();

            // Ambil partisipasi terakhir (baik aktif maupun nonaktif)
            $userActiveParticipation = UserChallengeParticipation::where('user_id', $user->id)
                ->where('challenge_id', $challenge->id)
                ->where('status', ['active', 'nonactive'])
                ->first();

            if ($userActiveParticipation && $userActiveParticipation->status === 'active') {
                $userActiveParticipation->load(['dailyActions' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }]);
            }

            // Jika statusnya nonactive, berarti bisa ikut lagi
            if ($userActiveParticipation && $userActiveParticipation) {
                $canParticipate = true;
            }

            // Jika belum pernah ikut, bisa partisipasi
            if (!$userActiveParticipation) {
                $userCompletedParticipation = UserChallengeParticipation::where('user_id', $user->id)
                    ->where('challenge_id', $challenge->id)
                    ->where('status', 'completed')
                    ->first();

                if (!$userCompletedParticipation) {
                    $canParticipate = true;
                }
            }

        }

        return view('challenges.show', compact(
            'title',
            'active',
            'challenge',
            'userActiveParticipation',
            'userCompletedParticipation',
            'canParticipate',
        ));
    }

    public function progress($participationId)
    {
        // Ambil participation dengan relasi dailyActions terurut
        $participation = UserChallengeParticipation::with([
            'challenge',
            'dailyActions' => function ($query) {
                $query->orderBy('action_date');
            }
        ])->findOrFail($participationId);

        // Ambil dailyActions sebagai collection
        $dailyActions = $participation->dailyActions;

        $title = "Progress Tantangan: " . $participation->challenge->title;
        $active = 'challenges';

        return view('challenges.progress', compact('participation', 'dailyActions', 'title', 'active'));
    }

}
