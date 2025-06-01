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
use Illuminate\Support\Facades\Http;

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
        // dd($questionsForAlpine);

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
                // Kumpulkan detail untuk prompt
                $userAnswerDetailsForPrompt[] = [
                    'question_text' => $question->question_text,
                    'selected_option_text' => $selectedOption->option_text,
                    'selected_option_points' => $selectedOption->points,
                    'max_points_for_question' => $question->options->max('points'),
                ];
            }
            // Hitung kategori dan rekomendasi statis (diperlukan untuk prompt AI juga)
            $maxPossibleScore = $quiz->questions->sum(fn($q) => $q->options->max('points'));
            $scorePercentage = $maxPossibleScore > 0 ? ($totalScore / $maxPossibleScore) * 100 : 0;
            list($category, $staticRecommendation) = $this->determineCategoryAndStaticRecommendation($scorePercentage, $maxPossibleScore <= 0);

            // Hasilkan rekomendasi AI
            $aiRecommendationText = 'Rekomendasi personal dari AI sedang dimuat atau tidak tersedia saat ini.'; // Default
            try {
                // Perbaiki pemanggilan $this->generateAIPrompt dengan parameter yang benar
                $promptForAI = $this->generateAIPrompt(
                    $user,
                    $quiz,
                    $userAnswerDetailsForPrompt, // Kirim detail jawaban yang sudah diproses
                    $totalScore,
                    $category, // Kirim kategori yang sudah dihitung
                    $scorePercentage,
                    $maxPossibleScore
                );
                $aiRecommendationText = $this->fetchGeminiRecommendation($promptForAI, false); // false berarti tidak pakai nl2br
            } catch (\Exception $e) {
                Log::error('Error fetching AI recommendation during submission: ' . $e->getMessage());
            }

            // Simpan ringkasan upaya quiz ke QuizAttempt
            QuizAttempt::create([
                'user_id' => $user->id,
                'quiz_id' => $quiz->id,
                'score' => $totalScore,
                'rekomendasi_ai' => $aiRecommendationText, // Simpan rekomendasi AI
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

    // Metode results() tetap sama (OLD)
    public function resultsDetail(Quiz $quiz)
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

        $maxPossibleScore = 0;
        $maxPossibleScore = $quiz->questions->sum(function ($question) {
            return $question->options->max('points');
        });

        // if ($maxPossibleScore > 0) { // Mencegah pembagian dengan nol
        //     $scorePercentage = ($totalScore / $maxPossibleScore) * 100;

        //     if ($scorePercentage >= 80) {
        //         $category = 'Gaya Hidup Sangat Berkelanjutan';
        //         $recommendation = 'Selamat! Anda memiliki gaya hidup yang sangat ramah lingkungan. Terus pertahankan dan inspirasi orang lain!';
        //     } elseif ($scorePercentage >= 60) {
        //         $category = 'Gaya Hidup Cukup Berkelanjutan';
        //         $recommendation = 'Anda sudah berada di jalur yang benar! Ada beberapa area yang bisa Anda tingkatkan untuk menjadi lebih hijau.';
        //     } elseif ($scorePercentage >= 40) {
        //         $category = 'Perlu Peningkatan Gaya Hidup Berkelanjutan';
        //         $recommendation = 'Ada banyak potensi untuk meningkatkan gaya hidup Anda menjadi lebih berkelanjutan. Mulailah dengan langkah-langkah kecil.';
        //     } else {
        //         $category = 'Sangat Perlu Perhatian Lingkungan';
        //         $recommendation = 'Skor Anda menunjukkan bahwa ada banyak ruang untuk perbaikan. Setiap langkah kecil membantu, mari kita mulai bersama!';
        //     }
        // } else {
        //     $scorePercentage = 0; // Jika tidak ada pertanyaan atau poin, persentase 0
        //     $recommendation = 'Quiz ini tidak memiliki pertanyaan dengan poin.';
        // }
        $user = Auth::user();
        $attempt = QuizAttempt::where('user_id', $user->id)
            ->where('quiz_id', $quiz->id)->latest()->first();

        return view('quizzes.detail-results', compact('quiz', 'totalScore', 'userAnswers', 'totalQuestions', 'maxPossibleScore', 'category', 'recommendation', 'attempt'));
    }

    // Fungsi untuk menentukan kategori dan rekomendasi statis
    private function determineCategoryAndStaticRecommendation(float $scorePercentage, bool $noPointsQuiz)
    {
        if ($noPointsQuiz) {
            return ['❓ Tidak Diketahui', 'Quiz ini tidak memiliki pertanyaan dengan poin.'];
        }
        if ($scorePercentage >= 80) {
            return ['🌿 Gaya Hidup Sangat Berkelanjutan', 'Selamat! Anda memiliki gaya hidup yang sangat ramah lingkungan. Terus pertahankan dan inspirasi orang lain!'];
        } elseif ($scorePercentage >= 60) {
            return ['🌱 Gaya Hidup Cukup Berkelanjutan', 'Anda sudah berada di jalur yang benar! Ada beberapa area yang bisa Anda tingkatkan untuk menjadi lebih hijau.'];
        } elseif ($scorePercentage >= 40) {
            return ['⚠️ Perlu Peningkatan Gaya Hidup Berkelanjutan', 'Ada banyak potensi untuk meningkatkan gaya hidup Anda menjadi lebih berkelanjutan. Mulailah dengan langkah-langkah kecil.'];
        } else {
            return ['🚨 Sangat Perlu Perhatian Lingkungan', 'Skor Anda menunjukkan bahwa ada banyak ruang untuk perbaikan. Setiap langkah kecil membantu, mari kita mulai bersama!'];
        }
    }


    public function results(Quiz $quiz, Request $request) // Tambahkan Request $request
    {
        $user = Auth::user();
        $attemptId = $request->query('attempt_id'); // Ambil attempt_id dari query string
        $quizAttempt = null;

        if ($attemptId) {
            $quizAttempt = QuizAttempt::with('quiz.questions.options') // Eager load relasi yang dibutuhkan
                ->where('user_id', $user->id)
                ->where('quiz_id', $quiz->id)
                ->findOrFail($attemptId);
        } else {
            // Fallback jika attempt_id tidak ada, ambil attempt terakhir (meskipun idealnya selalu ada)
            $quizAttempt = QuizAttempt::with('quiz.questions.options')
                ->where('user_id', $user->id)
                ->where('quiz_id', $quiz->id)
                ->latest()
                ->firstOrFail();
        }

        $userAnswers = UserAnswer::where('user_id', $user->id)
            ->where('quiz_id', $quiz->id)
            // Filter berdasarkan attempt jika memungkinkan, atau ambil yang terbaru jika UserAnswer punya timestamp attempt
            // Untuk saat ini, kita asumsikan UserAnswer yang ada adalah untuk attempt terakhir yang dilihat
            ->with('selectedOption', 'question.options')
            ->get();

        if ($userAnswers->isEmpty() && $quizAttempt) {
            // Jika tidak ada UserAnswer, ini mungkin berarti user langsung ke halaman hasil
            // dari attempt lama. Kita tidak bisa menampilkan detail jawaban satu per satu.
            // Tapi kita masih bisa menampilkan skor dan rekomendasi AI dari $quizAttempt.
            Log::warning("UserAnswers not found for quiz_id {$quiz->id} and user_id {$user->id} for attempt_id {$quizAttempt->id}. Showing summary from QuizAttempt.");
        }

        $totalScore = $quizAttempt->score;
        $totalQuestions = $quizAttempt->quiz->questions()->count(); // Akses dari relasi

        $maxPossibleScore = $quizAttempt->quiz->questions->sum(function ($question) {
            return $question->options->max('points');
        });

        $scorePercentage = $maxPossibleScore > 0 ? ($totalScore / $maxPossibleScore) * 100 : 0;
        list($category, $staticRecommendation) = $this->determineCategoryAndStaticRecommendation($scorePercentage, $maxPossibleScore <= 0);
        // Ambil teks mentah dari database
        $rawAiRecommendation = $quizAttempt->rekomendasi_ai;
        // Proses teks mentah menjadi HTML yang siap ditampilkan
        $processedAiRecommendation = $this->formatAiTextForDisplay($rawAiRecommendation);

        return view('quizzes.results', compact(
            'quiz', // quiz dari route model binding
            'totalScore',
            'userAnswers', // Mungkin kosong jika attempt lama tanpa UserAnswer yang tersimpan dengan cara saat ini
            'totalQuestions',
            'category',
            'maxPossibleScore',
            'staticRecommendation',
            'processedAiRecommendation', // Kirim data yang sudah diproses
            'scorePercentage',
            'quizAttempt' // Kirim seluruh objek attempt jika perlu
        ));
    }

    // --- Fungsi AI yang sudah ada dari jawaban sebelumnya ---
    // (generateAIPrompt dan fetchGeminiRecommendation)
    // Modifikasi kecil pada generateAIPrompt dan fetchGeminiRecommendation

    private function generateAIPrompt($user, $quiz, $userAnswerDetails, $totalScore, $category, $scorePercentage, $maxPossibleScore)
    {
        $prompt = "Anda adalah Hijau AI, asisten virtual dari aplikasi LangkahHijau. Tugas Anda adalah memberikan rekomendasi tindakan yang personal, praktis, dan memberi semangat kepada pengguna berdasarkan hasil kuis gaya hidup ramah lingkungan yang baru saja mereka selesaikan.\n\n";
        $prompt .= "Berikut adalah detail hasil kuis pengguna bernama {$user->name}:\n";
        $prompt .= "- Judul Kuis: {$quiz->title}\n";
        $prompt .= "- Total Poin Diperoleh: {$totalScore} dari {$maxPossibleScore} poin maksimal.\n";
        $prompt .= "- Persentase Skor: " . round($scorePercentage, 2) . "%\n";
        $prompt .= "- Kategori Eco-Persona: {$category}\n\n";
        $prompt .= "Detail jawaban pengguna (pertanyaan, jawaban pengguna, poin diperoleh, poin maksimal pertanyaan):\n";

        $lowScoringAnswersInfo = [];
        foreach ($userAnswerDetails as $index => $detail) {
            $prompt .= ($index + 1) . ". Pertanyaan: {$detail['question_text']}\n";
            $prompt .= "   Jawaban Pengguna: {$detail['selected_option_text']} (Poin: {$detail['selected_option_points']})\n";
            $prompt .= "   Poin maksimal untuk pertanyaan ini: {$detail['max_points_for_question']}\n\n";

            if ($detail['selected_option_points'] < $detail['max_points_for_question'] && $detail['max_points_for_question'] > 0) {
                // Cari opsi dengan poin tertinggi (perlu akses ke semua opsi pertanyaan jika ingin menampilkan best option)
                // Untuk saat ini, kita hanya highlight bahwa ada ruang untuk perbaikan
                $lowScoringAnswersInfo[] = [
                    'question' => $detail['question_text'],
                    'user_answer' => $detail['selected_option_text'],
                    'user_points' => $detail['selected_option_points'],
                    'max_points' => $detail['max_points_for_question'],
                ];
            }
        }

        if (!empty($lowScoringAnswersInfo)) {
            $prompt .= "Beberapa area yang bisa ditingkatkan berdasarkan jawaban pengguna:\n";
            foreach ($lowScoringAnswersInfo as $item) {
                $prompt .= "- Pada pertanyaan '{$item['question']}', pengguna memilih '{$item['user_answer']}' ({$item['user_points']} poin dari {$item['max_points']} poin maksimal).\n";
            }
            $prompt .= "\n";
        } else {
            $prompt .= "Pengguna tampaknya sudah sangat baik dalam menjawab pertanyaan!\n\n";
        }

        $prompt .= "Berdasarkan semua informasi ini, berikan 3-5 rekomendasi tindakan konkret dan actionable yang dapat dilakukan pengguna untuk lebih meningkatkan gaya hidup ramah lingkungannya. Fokus pada area di mana pengguna masih bisa memperbaiki diri atau mendapatkan poin lebih tinggi. Jika skor sudah sangat tinggi, berikan tips untuk mempertahankan atau menginspirasi orang lain. Buat rekomendasi ini dalam format poin-poin (bullet points) yang jelas. Mulailah dengan sapaan yang positif dan mengacu pada kategori Eco-Persona mereka.";
        $prompt .= "Contoh format jawaban (gunakan bullet points atau nomor):\n";
        $prompt .= "- [Rekomendasi 1]\n";
        $prompt .= "- [Rekomendasi 2]\n";
        $prompt .= "- [Rekomendasi 3]\n";
        $prompt .= "Pastikan output hanya berisi rekomendasi dan sapaan tersebut, tanpa teks tambahan di awal atau akhir responsmu.";

        return $prompt;
    }

    // Modifikasi fetchGeminiRecommendation untuk opsi nl2br
    private function fetchGeminiRecommendation(string $promptText) // Selalu return teks mentah
    {
        $apiKey = env('GEMINI_API_KEY');
        if (!$apiKey) {
            Log::error('GEMINI_API_KEY not set in .env file.');
            return 'Konfigurasi API Key untuk AI belum diatur.'; // Pesan error
        }
        // Sesuaikan URL jika model atau versi API Anda berbeda
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key={$apiKey}";

        try {
            $response = Http::timeout(45)->post($url, [
                'contents' => [['parts' => [['text' => $promptText]]]],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'maxOutputTokens' => 800, // Sesuaikan jika perlu output lebih panjang
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                    // Mengembalikan teks mentah langsung dari AI
                    return $data['candidates'][0]['content']['parts'][0]['text'];
                } elseif (isset($data['promptFeedback']['blockReason'])) {
                    $reason = $data['promptFeedback']['blockReason']['reason'] ?? 'Unknown reason';
                    Log::warning('Gemini API blocked prompt: ' . $reason . ' Details: ' . json_encode($data['promptFeedback']));
                    return 'Maaf, permintaan untuk rekomendasi AI diblokir karena alasan kebijakan konten.';
                } elseif (isset($data['error'])) { // Penanganan error dari API Gemini
                    Log::error('Gemini API error: ' . json_encode($data['error']));
                    return 'Layanan AI mengembalikan error: ' . ($data['error']['message'] ?? 'Detail tidak tersedia');
                } else {
                    Log::warning('Gemini API response format unexpected: ' . json_encode($data));
                    return 'Gagal memproses respons dari AI. Format tidak dikenali.';
                }
            } else {
                Log::error('Gemini API request failed: ' . $response->status() . ' - ' . $response->body());
                return 'Gagal menghubungi layanan AI saat ini (Status: ' . $response->status() . '). Coba lagi nanti.';
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('Gemini API connection error: ' . $e->getMessage());
            return 'Tidak dapat terhubung ke layanan AI. Periksa koneksi internet Anda atau coba lagi nanti.';
        } catch (\Exception $e) {
            Log::error('Generic error fetching Gemini recommendation: ' . $e->getMessage());
            return 'Terjadi kesalahan saat mengambil rekomendasi AI.';
        }
    }
    // In QuizController.php

    private function formatAiTextForDisplay(?string $rawText): string
    {
        if (is_null($rawText) || trim($rawText) === '') {
            return ''; // Kembalikan string kosong jika input null atau hanya spasi
        }

        // 1. Decode HTML entities yang MUNGKIN ada di output mentah AI (misal jika AI sendiri menulis &quot;)
        $text = html_entity_decode($rawText, ENT_QUOTES, 'UTF-8');

        // 2. Konversi Markdown sederhana ke HTML
        // Mengubah **bold** menjadi <strong>bold</strong>
        // Regex: \*\* (dua bintang literal)
        //        (.*?) (menangkap grup karakter apa pun, non-greedy)
        //        \*\* (dua bintang literal lagi)
        //        's' modifier: membuat '.' cocok dengan newline, jika bold melintasi baris.
        $text = preg_replace('/\*\*(.*?)\*\*/s', '<strong>$1</strong>', $text);

        // Anda bisa menambahkan konversi Markdown lain di sini jika perlu, misalnya:
        // Mengubah *italic* menjadi <em>italic</em>
        $text = preg_replace('/\*([^*]+)\*/s', '<em>$1</em>', $text);
        // Mengubah _underline_ menjadi <u>underline</u> (meskipun <u> kurang disarankan untuk aksesibilitas)
        $text = preg_replace('/\_([^_]+)\_/s', '<u>$1</u>', $text);


        // 3. Konversi newline (\n) menjadi tag <br /> untuk tampilan HTML
        $text = nl2br($text);

        // 4. Sanitasi dasar jika diperlukan (opsional, tergantung seberapa Anda percaya output AI)
        // Jika Anda ingin lebih aman, Anda bisa menggunakan library HTML Purifier di sini
        // Namun, untuk kasus <strong> dan <br> yang kita buat sendiri, ini mungkin tidak perlu.
        // $config = \HTMLPurifier_Config::createDefault();
        // $purifier = new \HTMLPurifier($config);
        // $text = $purifier->purify($text);

        return $text; // String ini sekarang berisi HTML (misalnya, <strong> dan <br />)
    }
}