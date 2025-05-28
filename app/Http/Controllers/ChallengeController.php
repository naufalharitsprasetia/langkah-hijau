<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Challenge;
use Illuminate\Http\Request;
use App\Models\DailyUserAction;
use Illuminate\Support\Facades\Auth;
use App\Models\UserChallengeParticipation;

class ChallengeController extends Controller
{
    public function index() {
        $challenges = Challenge::orderBy('title')->get();
        // dd($challenges);
        $title = 'Challenges';
        $active = 'challenges';
        return view('challenges.index', compact('challenges', 'title', 'active'));
    }

    // untuk menampilkan detail challenge
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

    // untuk menampilkan progess challenge
    public function progress($participationId) {
        // dump('ID Partisipasi dari URL:', $participationId);

        $participation = UserChallengeParticipation::with([
            'challenge', // Info umum tentang tantangan ini
            'dailyActions' => function ($query) { // Aksi harian yang sudah dilakukan user
                $query->orderBy('action_date', 'asc');
            }
        ])->findOrFail($participationId);

        // Pastikan partisipasi ini milik user yang sedang login
        if ($participation->user_id !== Auth::id()) {
            abort(403, 'Akses tidak diizinkan.');
        }

        foreach ($participation->dailyActions as $action) {
            if (is_string($action->checklist_status)) {
                $action->checklist_status = json_decode($action->checklist_status, true);
            }
        }

        $title = "Progress: " . $participation->challenge->title;
        $active = 'my-challenges'; // Mungkin lebih cocok 'my-challenges' atau nama menu progres

        // dd($participation, $action); // Untuk debugging jika perlu

        return view('challenges.progress', compact('participation', 'title', 'active'));
    }


    public function checklist(Request $request, $id)
{
    $dailyAction = DailyUserAction::with('challenge')->findOrFail($id);

    $status = $request->input('checklist_status', []);
    $dailyAction->checklist_status = $status;

    $checklistItems = $dailyAction->participation->challenge->checklist ?? [];

    $isCompleted = count($checklistItems) > 0 &&
        !array_diff_key($checklistItems, $status);

    $dailyAction->is_completed = $isCompleted;

    // Hapus dd() atau pindahkan sebelum save
    // dd($checklistItems, $status, $isCompleted);
    logger()->info('Saving dailyAction', $dailyAction->toArray());

    $dailyAction->save();

    return redirect()->route('challenges.progress', $dailyAction->participation_id)
        ->with('success', 'Checklist berhasil disimpan.');
}


    // public function checklist(Request $request, $id) {
    //     $dailyAction = DailyUserAction::with('challenge')->findOrFail($id);
    
    //     $status = $request->input('checklist_status', []);
    //     $dailyAction->checklist_status = $status;
    
    //     $checklistItems = $dailyAction->challenge->checklist ?? [];
    
    //     $checklistKeys = array_keys($checklistItems);
    //     $statusKeys = array_keys($status);
    
    //     sort($checklistKeys);
    //     sort($statusKeys);
    
    //     $isCompleted = $checklistKeys === $statusKeys;
    
    //     logger('Checklist Keys:', $checklistKeys);
    //     logger('Status Keys:', $statusKeys);
    //     logger('is_completed =', [$isCompleted]);
    
    //     $dailyAction->is_completed = $isCompleted;
    //     $dailyAction->save();
    
    //     return back()->with('success', 'Checklist berhasil disimpan.');
    // }
    
    
    
    
}
