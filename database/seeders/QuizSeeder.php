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
        // Pastikan quiz1 (Tes Gaya Hidup Berkelanjutan) ada jika Anda ingin menambahkan soal ke dalamnya
        // Jika quiz1 sudah ada di database, Anda bisa ambil dari DB:
        // $quiz1 = Quiz::firstOrCreate(
        //     ['title' => 'Tes Gaya Hidup Berkelanjutan'],
        //     ['description' => 'Ukur sejauh mana gaya hidup Anda berkontribusi pada keberlanjutan lingkungan.', 'duration_minutes' => 5]
        // );
        // Atau biarkan seperti ini jika Anda selalu melakukan migrate:fresh --seed
        $quiz1 = Quiz::create([
            'title' => 'Tes Gaya Hidup Berkelanjutan',
            'description' => 'Ukur sejauh mana gaya hidup Anda berkontribusi pada keberlanjutan lingkungan.',
            'duration_minutes' => 5,
        ]);

        // Soal-soal sebelumnya (5 soal)
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


        // --- SOAL-SOAL BARU DENGAN OPSI STANDAR (Sangat Setuju, Setuju, Tidak Setuju) ---
        // Anda bisa menyesuaikan teks opsi dan poin jika perlu

        $question6 = $quiz1->questions()->create([
            'question_text' => 'Saya mematikan lampu dan peralatan elektronik saat tidak digunakan.',
        ]);
        $question6->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question6->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question6->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question7 = $quiz1->questions()->create([
            'question_text' => 'Saya membawa tas belanja sendiri untuk menghindari penggunaan kantong plastik.',
        ]);
        $question7->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question7->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question7->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question8 = $quiz1->questions()->create([
            'question_text' => 'Saya menggunakan air secukupnya dan tidak boros saat mandi atau mencuci.',
        ]);
        $question8->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question8->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question8->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question9 = $quiz1->questions()->create([
            'question_text' => 'Saya memisahkan sampah berdasarkan jenisnya di rumah atau tempat kerja.',
        ]);
        $question9->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question9->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question9->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question10 = $quiz1->questions()->create([
            'question_text' => 'Saya memilih produk yang memiliki label ramah lingkungan.',
        ]);
        $question10->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question10->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question10->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question11 = $quiz1->questions()->create([
            'question_text' => 'Saya mengikuti akun media sosial atau komunitas yang peduli lingkungan.',
        ]);
        $question11->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question11->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question11->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question12 = $quiz1->questions()->create([
            'question_text' => 'Saya mendukung kebijakan atau program pemerintah terkait pelestarian lingkungan.',
        ]);
        $question12->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question12->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question12->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question13 = $quiz1->questions()->create([
            'question_text' => 'Saya menghindari membeli produk yang menghasilkan banyak sampah.',
        ]);
        $question13->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question13->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question13->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question14 = $quiz1->questions()->create([
            'question_text' => 'Saya menggunakan transportasi umum atau berbagi kendaraan jika memungkinkan.',
        ]);
        $question14->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question14->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question14->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question15 = $quiz1->questions()->create([
            'question_text' => 'Saya menanam pohon atau tanaman di rumah atau sekitar tempat tinggal.',
        ]);
        $question15->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question15->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question15->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question16 = $quiz1->questions()->create([
            'question_text' => 'Saya menyadari bahwa tindakan saya berdampak pada lingkungan global.',
        ]);
        $question16->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question16->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question16->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question17 = $quiz1->questions()->create([
            'question_text' => 'Saya membawa botol minum dan kotak makan sendiri saat bepergian.',
        ]);
        $question17->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question17->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question17->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question18 = $quiz1->questions()->create([
            'question_text' => 'Saya menyukai kegiatan daur ulang atau reuse barang bekas.',
        ]);
        $question18->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question18->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question18->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question19 = $quiz1->questions()->create([
            'question_text' => 'Saya memilih produk lokal untuk mengurangi jejak karbon dari transportasi.',
        ]);
        $question19->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question19->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question19->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question20 = $quiz1->questions()->create([
            'question_text' => 'Saya merasa tidak nyaman jika membuang sampah sembarangan.',
        ]);
        $question20->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question20->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question20->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question21 = $quiz1->questions()->create([
            'question_text' => 'Saya menyebarkan informasi tentang pentingnya menjaga lingkungan ke orang lain.',
        ]);
        $question21->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question21->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question21->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question22 = $quiz1->questions()->create([
            'question_text' => 'Saya mengikuti kegiatan bersih-bersih lingkungan, seperti kerja bakti atau aksi komunitas.',
        ]);
        $question22->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question22->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question22->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question23 = $quiz1->questions()->create([
            'question_text' => 'Saya berpikir panjang sebelum membeli sesuatu, mempertimbangkan dampaknya bagi lingkungan.',
        ]);
        $question23->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question23->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question23->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question24 = $quiz1->questions()->create([
            'question_text' => 'Saya bersedia membayar lebih untuk produk yang eco-friendly.',
        ]);
        $question24->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question24->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question24->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

        $question25 = $quiz1->questions()->create([
            'question_text' => 'Saya merasa menjadi bagian dari solusi atas masalah perubahan iklim.',
        ]);
        $question25->options()->create(['option_text' => 'Sangat Setuju', 'points' => 3]);
        $question25->options()->create(['option_text' => 'Setuju', 'points' => 2]);
        $question25->options()->create(['option_text' => 'Tidak Setuju', 'points' => 1]);

    }
}