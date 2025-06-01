<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Option;
use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // Untuk bekerja dengan tanggal
use App\Models\QuizAttempt; // Pastikan ini diimpor

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        $user = Auth::user();
        $takenQuizzesToday = '';
        if ($user) {
            // Ambil ID quiz yang sudah dikerjakan user hari ini
            // Menggunakan Carbon untuk membandingkan tanggal saja
            $takenQuizzesToday = QuizAttempt::where('user_id', $user->id)
                ->whereDate('created_at', Carbon::today()) // Cek hanya tanggalnya
                ->pluck('quiz_id')
                ->toArray();
        }

        return view('quizzes.index', [
            'quizzes' => $quizzes,
            'title' => 'Daftar Quiz',
            'active' => 'quiz',
            'takenQuizzesToday' => $takenQuizzesToday, // Teruskan data ini ke view
        ]);
    }

    // public function show(Quiz $quiz) { ... } // Metode ini mungkin tidak lagi digunakan

    public function start(Quiz $quiz)
    {
        $user = Auth::user();

        // Cek apakah user sudah mengerjakan quiz ini hari ini
        $hasTakenQuizToday = QuizAttempt::where('user_id', $user->id)
            ->where('quiz_id', $quiz->id)
            ->whereDate('created_at', Carbon::today())
            ->exists();

        if ($hasTakenQuizToday) {
            // Redirect atau tampilkan pesan error jika sudah dikerjakan hari ini
            return redirect()->route('quizzes.index')->with('error', 'Anda sudah mengerjakan quiz ini hari ini. Silakan coba lagi besok!');
        }

        // Hapus jawaban sebelumnya (UserAnswer) untuk quiz ini dari user ini
        // Ini untuk memastikan quiz dimulai dari nol jika user memulai kembali pada hari yang berbeda
        UserAnswer::where('user_id', Auth::id())
            ->where('quiz_id', $quiz->id)
            ->delete();

        $quizData = $quiz->load('questions.options');

        $questionsForAlpine = $quizData->questions->map(function ($question) {
            return [
                'id' => $question->id,
                'text' => $question->question_text,
                'options' => $question->options->map(function ($option) {
                    return [
                        'id' => $option->id,
                        'text' => $option->option_text,
                        'points' => $option->points,
                    ];
                })->toArray(),
            ];
        })->toArray();

        return view('quizzes.start', [
            'quiz' => $quiz,
            'questions' => json_encode($questionsForAlpine),
            'user' => $user,
        ]);
    }

    public function submitAnswer(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|integer|exists:questions,id',
            'answers.*.option_id' => 'required|integer|exists:options,id',
        ]);

        // Type hint $user untuk membantu IDE mengenali metode save()
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Pengecekan defensif jika user tidak terautentikasi (walaupun middleware 'auth' seharusnya menangani ini)
        if (!$user) {
            Log::error('Unauthorized attempt to submit quiz: User not authenticated.', ['quiz_id' => $quiz->id]);
            return response()->json(['errors' => ['auth' => 'Anda harus login untuk menyelesaikan quiz ini.']], 401);
        }

        $submittedAnswers = $validated['answers'];

        DB::beginTransaction();
        try {
            $totalScore = 0;

            // Hapus jawaban sebelumnya (UserAnswer) untuk quiz ini dari user ini
            UserAnswer::where('user_id', $user->id)
                ->where('quiz_id', $quiz->id)
                ->delete();

            // Simpan jawaban detail ke UserAnswer
            foreach ($submittedAnswers as $answer) {
                $question = Question::find($answer['question_id']);
                $selectedOption = Option::find($answer['option_id']);

                if (!$question || !$selectedOption || $selectedOption->question_id !== $question->id || $question->quiz_id !== $quiz->id) {
                    DB::rollBack();
                    return response()->json(['errors' => ['invalid_answers' => 'Beberapa jawaban tidak valid atau tidak sesuai dengan quiz ini.']], 422);
                }

                UserAnswer::create([
                    'user_id' => $user->id,
                    'quiz_id' => $quiz->id,
                    'question_id' => $question->id,
                    'selected_option_id' => $selectedOption->id,
                    'answer_text' => $selectedOption->option_text,
                ]);

                if ($selectedOption) {
                    $totalScore += $selectedOption->points;
                }
            }

            // Simpan ringkasan upaya quiz ke QuizAttempt
            QuizAttempt::create([
                'user_id' => $user->id,
                'quiz_id' => $quiz->id,
                'score' => $totalScore,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Green Points
            $user->green_points += 20;
            $user->save(); // Method save() seharusnya tersedia di model User

            DB::commit();

            return response()->json(['redirect' => route('quizzes.results', $quiz->id)]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error submitting quiz answers or updating points: ' . $e->getMessage(), [
                'user_id' => $user->id ?? 'guest',
                'quiz_id' => $quiz->id,
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['errors' => ['server' => 'Terjadi kesalahan internal server. Silakan coba lagi.'], 'message' => $e->getMessage()], 500);
        }
    }

// Metode results() tetap sama
public function results(Quiz $quiz)
{
    $userAnswers = UserAnswer::where('user_id', Auth::id())
        ->where('quiz_id', $quiz->id)
        ->with('selectedOption', 'question.options')
        ->get();

    $totalScore = 0;
    foreach ($userAnswers as $userAnswer) {
        if ($userAnswer->selectedOption) {
            $totalScore += $userAnswer->selectedOption->points;
        }
    }

    $totalQuestions = $quiz->questions()->count();

    $category = 'Tidak Diketahui';
    $recommendation = 'Maaf, kami tidak dapat mengkategorikan skor Anda.';

    $maxPossibleScore = $quiz->questions->sum(function ($question) {
        return $question->options->max('points');
    });

    if ($maxPossibleScore > 0) { // Mencegah pembagian dengan nol
        $scorePercentage = ($totalScore / $maxPossibleScore) * 100;

        if ($scorePercentage >= 80) {
            $category = 'Gaya Hidup Sangat Berkelanjutan';
            $recommendation = 'Selamat! Anda memiliki gaya hidup yang sangat ramah lingkungan. Terus pertahankan dan inspirasi orang lain!';
        } elseif ($scorePercentage >= 60) {
            $category = 'Gaya Hidup Cukup Berkelanjutan';
            $recommendation = 'Anda sudah berada di jalur yang benar! Ada beberapa area yang bisa Anda tingkatkan untuk menjadi lebih hijau.';
        } elseif ($scorePercentage >= 40) {
            $category = 'Perlu Peningkatan Gaya Hidup Berkelanjutan';
            $recommendation = 'Ada banyak potensi untuk meningkatkan gaya hidup Anda menjadi lebih berkelanjutan. Mulailah dengan langkah-langkah kecil.';
        } else {
            $category = 'Sangat Perlu Perhatian Lingkungan';
            $recommendation = 'Skor Anda menunjukkan bahwa ada banyak ruang untuk perbaikan. Setiap langkah kecil membantu, mari kita mulai bersama!';
        }
    } else {
        $scorePercentage = 0; // Jika tidak ada pertanyaan atau poin, persentase 0
        $recommendation = 'Quiz ini tidak memiliki pertanyaan dengan poin.';
    }


    return view('quizzes.results', compact('quiz', 'totalScore', 'userAnswers', 'totalQuestions', 'category', 'recommendation', 'scorePercentage'));
}
}