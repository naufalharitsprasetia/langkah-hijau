<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option; // Pastikan ini di-import
use App\Models\UserAnswer;
use Illuminate\Support\Facades\Auth; // Pastikan ini di-import

class QuizController extends Controller
{

    public function index()
    {
        $quizzes = Quiz::all();
        return view('quizzes.index', compact('quizzes'));
    }

    public function show(Quiz $quiz)
    {
        return view('quizzes.show', compact('quiz'));
    }

    public function start(Quiz $quiz)
    {
        // Hapus semua jawaban sebelumnya untuk quiz ini oleh user ini (opsional, tergantung rule)
        UserAnswer::where('user_id', Auth::id())
            ->where('quiz_id', $quiz->id)
            ->delete();

        $firstQuestion = $quiz->questions()->orderBy('id')->first(); // Pastikan ambil soal pertama berdasarkan urutan ID
        if (!$firstQuestion) {
            return redirect()->route('quizzes.index')->with('error', 'Quiz ini belum memiliki soal.');
        }

        // Redirect ke rute showQuestion untuk menampilkan soal
        return redirect()->route('quizzes.question', [
            'quiz' => $quiz->id,
            'question' => $firstQuestion->id
        ]);
    }

    // Tambahkan metode baru untuk menampilkan soal secara individual
    public function showQuestion(Quiz $quiz, Question $question)
    {
        // Pastikan pertanyaan ini milik quiz yang benar
        if ($question->quiz_id !== $quiz->id) {
            abort(404);
        }

        // Tentukan nomor soal saat ini
        $questionNumber = $quiz->questions()->where('id', '<=', $question->id)->count();

        return view('quizzes.question', [
            'quiz' => $quiz,
            'question' => $question,
            'questionNumber' => $questionNumber
        ]);
    }

    /**
     * Tangani pengiriman jawaban dari soal quiz.
     */
    public function submitAnswer(Request $request, Quiz $quiz, Question $question)
    {
        // Pastikan pertanyaan ini milik quiz yang benar
        if ($question->quiz_id !== $quiz->id) {
            abort(404);
        }

        // Validasi input
        $request->validate([
            'answer_option_id' => 'required|exists:options,id', // Pastikan ID opsi ada di tabel options
        ]);

        $selectedOption = Option::find($request->input('answer_option_id'));

        // Pastikan opsi yang dipilih benar-benar milik pertanyaan ini
        if (!$selectedOption || $selectedOption->question_id !== $question->id) {
            return back()->withErrors(['answer_option_id' => 'Opsi jawaban tidak valid.']);
        }

        // Simpan jawaban pengguna ke database
        // Gunakan updateOrCreate agar jika user menjawab ulang soal yang sama, jawaban sebelumnya diupdate
        UserAnswer::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'quiz_id' => $quiz->id,
                'question_id' => $question->id,
            ],
            [
                'selected_option_id' => $selectedOption->id,
                'answer_text' => $selectedOption->option_text, // Simpan teks jawaban juga jika perlu
            ]
        );

        // Logika untuk ke soal berikutnya atau ke halaman hasil
        $nextQuestion = $quiz->questions()->where('id', '>', $question->id)->orderBy('id')->first();

        if ($nextQuestion) {
            return redirect()->route('quizzes.question', [
                'quiz' => $quiz->id,
                'question' => $nextQuestion->id
            ]);
        } else {
            // Jika tidak ada soal lagi, arahkan ke halaman hasil
            return redirect()->route('quizzes.results', $quiz->id);
        }
    }

    /**
     * Tampilkan hasil quiz pengguna.
     */
    public function results(Quiz $quiz)
    {
        // Dapatkan semua jawaban pengguna untuk quiz ini
        $userAnswers = UserAnswer::where('user_id', Auth::id())
            ->where('quiz_id', $quiz->id)
            ->with('selectedOption', 'question') // Eager load selectedOption dan question
            ->get();

        $totalScore = 0;
        foreach ($userAnswers as $userAnswer) {
            // Tambahkan poin dari opsi yang dipilih
            if ($userAnswer->selectedOption) {
                $totalScore += $userAnswer->selectedOption->points;
            }
        }

        // Dapatkan semua pertanyaan untuk quiz ini untuk mengetahui total pertanyaan
        $totalQuestions = $quiz->questions()->count();


        return view('quizzes.results', compact('quiz', 'totalScore', 'userAnswers', 'totalQuestions'));
    }
}