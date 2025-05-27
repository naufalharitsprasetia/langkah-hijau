<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Quiz Gaya Hidup Berkelanjutan
        $quiz1 = Quiz::create([
            'title' => 'Tes Gaya Hidup Berkelanjutan',
            'description' => 'Ukur sejauh mana gaya hidup Anda berkontribusi pada keberlanjutan lingkungan.',
            'duration_minutes' => 5, // Durasi lebih singkat karena ini tes poin
        ]);

        $question1 = $quiz1->questions()->create([
            'question_text' => 'Bagaimana kamu biasanya pergi ke tempat kerja/kampus/sekolah?',
        ]);
        $question1->options()->create(['option_text' => 'Jalan kaki/Sepeda/Naik kendaraan umum', 'points' => 3]);
        $question1->options()->create(['option_text' => 'Naik motor', 'points' => 2]);
        $question1->options()->create(['option_text' => 'Naik mobil pribadi', 'points' => 1]);

        $question2 = $quiz1->questions()->create([
            'question_text' => 'Seberapa sering kamu membawa tas belanja sendiri?',
        ]);
        $question2->options()->create(['option_text' => 'Selalu', 'points' => 3]);
        $question2->options()->create(['option_text' => 'Kadang-kadang', 'points' => 2]);
        $question2->options()->create(['option_text' => 'Tidak pernah', 'points' => 1]);

        $question3 = $quiz1->questions()->create([
            'question_text' => 'Bagaimana kamu mengelola sampah di rumah?',
        ]);
        $question3->options()->create(['option_text' => 'Memilah dan mendaur ulang', 'points' => 3]);
        $question3->options()->create(['option_text' => 'Buang campur, tapi tidak banyak sampah', 'points' => 2]);
        $question3->options()->create(['option_text' => 'Buang semuanya jadi satu', 'points' => 1]);

        $question4 = $quiz1->questions()->create([
            'question_text' => 'Seberapa sering kamu membeli air minum dalam kemasan botol plastik?',
        ]);
        $question4->options()->create(['option_text' => 'Sangat jarang, pakai botol isi ulang', 'points' => 3]);
        $question4->options()->create(['option_text' => 'Kadang-kadang', 'points' => 2]);
        $question4->options()->create(['option_text' => 'Hampir setiap hari', 'points' => 1]);

        $question5 = $quiz1->questions()->create([
            'question_text' => 'Apakah kamu mematikan lampu dan elektronik saat tidak digunakan?',
        ]);
        $question5->options()->create(['option_text' => 'Selalu', 'points' => 3]);
        $question5->options()->create(['option_text' => 'Kadang-kadang', 'points' => 2]);
        $question5->options()->create(['option_text' => 'Jarang', 'points' => 1]);

        // Anda bisa menambahkan quiz lain di sini jika perlu
    }
}