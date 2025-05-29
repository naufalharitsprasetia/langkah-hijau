<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        // Pastikan Anda meneruskan 'title' dan 'active' ke layout jika menggunakan x-layout
        return view('quizzes.index', [
            'quizzes' => $quizzes,
            'title' => 'Daftar Quiz', // Contoh title
            'active' => 'quiz' // Contoh active menu
        ]);
    }

    public function show(Quiz $quiz)
    {
        // Ini mungkin tidak lagi digunakan jika start() langsung mengarah ke quiz
        return view('quizzes.show', compact('quiz'));
    }

    public function start(Quiz $quiz)
    {
        // Hapus jawaban sebelumnya hanya jika Anda ingin quiz selalu dimulai dari nol
        // Jika Anda ingin user bisa melanjutkan, Anda perlu menyesuaikan logika ini
        // UserAnswer::where('user_id', Auth::id())
        //     ->where('quiz_id', $quiz->id)
        //     ->delete();

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
            'questions' => json_encode($questionsForAlpine), // Encode sebagai JSON string
            'user' => Auth::user(), // Kirim data user untuk header
        ]);
    }

    /**
     * Tangani pengiriman jawaban dari semua soal quiz sekaligus.
     */
    public function submitAnswer(Request $request, Quiz $quiz)
    {
        // Validasi input
        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|integer|exists:questions,id',
            'answers.*.option_id' => 'required|integer|exists:options,id',
        ]);

        $userId = Auth::id();
        $submittedAnswers = $validated['answers']; // Gunakan data yang sudah divalidasi

        DB::beginTransaction();
        try {
            // Hapus jawaban sebelumnya untuk quiz ini dari user ini
            UserAnswer::where('user_id', $userId)
                ->where('quiz_id', $quiz->id)
                ->delete();

            foreach ($submittedAnswers as $answer) {
                $question = Question::find($answer['question_id']);
                $selectedOption = Option::find($answer['option_id']);

                // Periksa validitas secara lebih ketat
                if (!$question || !$selectedOption || $selectedOption->question_id !== $question->id || $question->quiz_id !== $quiz->id) {
                    DB::rollBack();
                    // Mengembalikan response JSON untuk AJAX
                    return response()->json(['errors' => ['invalid_answers' => 'Beberapa jawaban tidak valid atau tidak sesuai dengan quiz ini.']], 422);
                }

                UserAnswer::create([
                    'user_id' => $userId,
                    'quiz_id' => $quiz->id,
                    'question_id' => $question->id,
                    'selected_option_id' => $selectedOption->id,
                    'answer_text' => $selectedOption->option_text,
                ]);
            }

            DB::commit();

            // Mengembalikan response JSON dengan redirect URL
            return response()->json(['redirect' => route('quizzes.results', $quiz->id)]);

        } catch (\Exception $e) {
            DB::rollBack();
            // Logging error untuk debugging di server
            // \Log::error('Error submitting quiz answers: ' . $e->getMessage(), ['user_id' => $userId, 'quiz_id' => $quiz->id, 'trace' => $e->getTraceAsString()]);
            // Mengembalikan response JSON untuk AJAX
            return response()->json(['errors' => ['server' => 'Terjadi kesalahan internal server. Silakan coba lagi.'], 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Tampilkan hasil quiz beserta skor dan kategori.
     */
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

        // Logika kategori yang lebih dinamis berdasarkan skor dan jumlah soal
        // Asumsi nilai opsi adalah 1-5, dengan total soal 25, maka max score 125, min 25
        // (Ini adalah contoh, Anda harus menyesuaikan kategori berdasarkan rentang skor actual quiz Anda)
        $maxPossibleScore = $quiz->questions->sum(function ($question) {
            return $question->options->max('points'); // Ambil poin tertinggi dari setiap pertanyaan
        });
        $minPossibleScore = $quiz->questions->sum(function ($question) {
            return $question->options->min('points'); // Ambil poin terendah dari setiap pertanyaan
        });

        // Contoh pembagian kategori berdasarkan persentase skor
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


        return view('quizzes.results', compact('quiz', 'totalScore', 'userAnswers', 'totalQuestions', 'category', 'recommendation'));
    }
}