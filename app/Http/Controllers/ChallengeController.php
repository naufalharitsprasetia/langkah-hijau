<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use App\Models\DailyUserAction;
use Illuminate\Support\Facades\Log;
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


    public function progress($participationId)
    {
        $participation = UserChallengeParticipation::with(['challenge', 'dailyActions'])->findOrFail($participationId);

        if ($participation->user_id !== Auth::id()) {
            abort(403, 'Akses tidak diizinkan.');
        }

        $startDate = $participation->start_date->copy(); // Carbon instance
        $duration = $participation->challenge->duration_days;
        $existingDates = $participation->dailyActions->pluck('action_date')->map(fn($d) => $d->toDateString())->toArray();

        // Generate record untuk setiap hari jika belum ada
        for ($i = 0; $i < $duration; $i++) {
            $date = $startDate->copy()->addDays($i)->toDateString();
            if (!in_array($date, $existingDates)) {
                DailyUserAction::create([
                    'participation_id' => $participation->id,
                    'action_date' => $date,
                    'checklist_status' => [],
                    'is_completed' => false,
                ]);
            }
        }

        // Reload dengan data baru
        $participation->load(['challenge', 'dailyActions' => fn($q) => $q->orderBy('action_date', 'asc')]);

        // Pastikan checklist_status ter-decode
        foreach ($participation->dailyActions as $action) {
            if (is_string($action->checklist_status)) {
                $action->checklist_status = json_decode($action->checklist_status, true);
            }
        }

        return view('challenges.progress', [
            'participation' => $participation,
            'title' => 'Progress: ' . $participation->challenge->title,
            'active' => 'my-challenges',
        ]);
    }



    public function checklist(Request $request, $id)
{
    $dailyAction = DailyUserAction::with('participation.challenge')->findOrFail($id);

    // Ambil data checklist yang disubmit
    $status = $request->input('checklist_status', []);
    $dailyAction->checklist_status = $status;

    $checklistItems = $dailyAction->participation->challenge->checklist ?? [];

    $isCompleted = count($checklistItems) > 0 &&
        !array_diff_key(array_flip(array_keys($checklistItems)), $status);

    $dailyAction->is_completed = $isCompleted;
    $dailyAction->save();

    // Cek apakah semua checklist harian sudah selesai
    $participation = UserChallengeParticipation::with('dailyActions')->find($dailyAction->participation_id);

    $allCompleted = $participation->dailyActions->every(function ($action) {
        return $action->is_completed;
    });

    if ($allCompleted) {
        $participation->status = 'completed';
        $participation->completion_date = now();
        $participation->save();

        // Redirect ke halaman tantangan dengan pesan sukses
        return redirect()->route('challenges.index')
            ->with('success', 'Selamat! Kamu telah menyelesaikan tantangan ini 🎉');
    }

    // Jika belum selesai semua, kembali ke halaman progress
    return redirect()->route('challenges.progress', $participation->id)
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
