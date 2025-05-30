<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Challenge;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\ChallengeDailyAction;
use Illuminate\Support\Facades\Auth;
use App\Models\ChallengeParticipation;

class ChallengeController extends Controller
{
    public function index()
    {
        $challenges = Challenge::orderBy('title')->get();
        // dd($challenges);
        $title = 'Challenges';
        $active = 'challenges';
        return view('challenges.index', compact('challenges', 'title', 'active'));
    }

    public function show(Challenge $challenge)
    {
        $title = 'Challenges';
        $active = 'challenges';
        $completed = false;
        $canParticipate = false;
        $participation = null;

        $user = Auth::user();
        if ($user) {
            // partisipasi
            $participation = ChallengeParticipation::where('user_id', $user->id)->where('challenge_id', $challenge->id)->first();

            // Jika belum pernah ikut, bisa partisipasi
            if (!$participation) {
                $canParticipate = true;
            } else {
                // jika sudah selesai
                if ($participation->is_completed) {
                    $completed = true;
                }
            }
        }

        return view('challenges.show', compact(
            'title',
            'active',
            'challenge',
            'participation',
            'completed',
            'canParticipate',
        ));
    }

    public function participate(Request $request, Challenge $challenge)
    {
        $user = Auth::user();
        $data = [
            'id' => Str::uuid(),
            'user_id' => $user->id,
            'challenge_id' => $challenge->id,
            'start_date' => now(),
            'is_completed' => false,
            'created_at' => now(),
        ];

        DB::table('challenge_participations')->insert($data);
        return redirect()->route('challenges.show', $challenge->id)->with('success', 'Selamat, anda sudah terdaftar pada tantangan ini!');
    }

    //  ketika ingin berpartisipasi cek dulu, udh pernah berpartisipasi blm , nanti di fucntion participate
    public function progress(ChallengeParticipation $challenge_participation)
    {
        $participation = $challenge_participation;
        if ($participation == null) {
            abort(404, 'halaman tidak ditemukan.');
        }
        if ($participation->user_id !== Auth::id()) {
            abort(403, 'Akses tidak diizinkan.');
        }

        $challenge = Challenge::where('id', $participation->challenge->id)->first();
        $daily_actions = ChallengeDailyAction::where('challenge_participation_id', $participation->id)->get();

        // dd($daily_actions);
        return view('challenges.progress', [
            'participation' => $participation,
            'title' => 'Progress: ' . $participation->challenge->title,
            'active' => 'challenges',
            'challenge' => $challenge,
            'daily_actions' => $daily_actions,
        ]);
    }



    public function checklist(Request $request, ChallengeParticipation $challenge_participation)
    {
        $participation = $challenge_participation;
        $day = $request->input('day');
        // ChallengeDailyAction::create([
        //     'challenge_participation_id' => $userPartisipasiPlastik->id,
        //     'day' => 'day2',
        //     'is_checked' => true,
        //     'created_at' => Carbon::parse($userPartisipasiPlastik->start_date)
        // ]);
        ChallengeDailyAction::create([
            'challenge_participation_id' => $participation->id,
            'day' => $day,
            'is_checked' => true,
            'checked_at' => Carbon::today(),
            'created_at' => now()
        ]);

        //  Challenge , dll
        $challenge = Challenge::where('id', $participation->challenge->id)->first();
        $durasi =  $challenge->duration_days;
        $daily_actions = ChallengeDailyAction::where('challenge_participation_id', $participation->id)->get();
        $isCompleted = count($daily_actions) == $durasi;
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();

        if ($isCompleted) {
            $participation->is_completed = true;
            $participation->completion_date = now();
            $participation->save();
            // update user green point
            $bonusPoint = $challenge->green_points;
            $user->green_points += $bonusPoint;
            $user->save();
            // Redirect ke halaman tantangan dengan pesan sukses
            return redirect()->route('challenges.index')
                ->with('success', 'Selamat! Kamu telah menyelesaikan tantangan ini 🎉 dan Mendapatkan Bonus ' . $bonusPoint . ' Green Point 🎉!');
        }

        // Jika belum selesai semua, kembali ke halaman progress
        $user->green_points += 10;
        $user->save();
        return redirect()->route('challenges.progress', $participation->id)
            ->with('success', 'Checklist hari ini berhasil disimpan! Kamu mendapatkan 10 Green Point 🎉!');
    }
}