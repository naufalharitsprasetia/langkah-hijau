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
        // Quiz 1: Kuis: Seberapa Hijau Jiwamu? Mari Kenali Eco-Persona-mu!
        $quiz1 = Quiz::create([
            'title' => 'Kuis: Seberapa Hijau Jiwamu? Mari Kenali Eco-Persona-mu!',
            'description' => 'Penasaran seberapa jauh gaya hidupmu selaras dengan alam? Ikuti kuis singkat ini dan temukan eco-persona unikmu!',
            'duration_minutes' => 5,
        ]);

        $question1 = $quiz1->questions()->create([
            'question_text' => 'Bagaimana kamu paling sering bepergian ke tempat kerja, kampus, atau sekolah?',
        ]);
        $question1->options()->create(['option_text' => 'Jalan kaki, bersepeda, atau naik angkutan umum.', 'points' => 3]);
        $question1->options()->create(['option_text' => 'Menggunakan sepeda motor pribadi.', 'points' => 2]);
        $question1->options()->create(['option_text' => 'Mengendarai mobil pribadi.', 'points' => 1]);

        $question2 = $quiz1->questions()->create([
            'question_text' => 'Saat berbelanja kebutuhan sehari-hari, seberapa sering kamu membawa tas belanja sendiri dari rumah?',
        ]);
        $question2->options()->create(['option_text' => 'Selalu, sudah jadi kebiasaan.', 'points' => 3]);
        $question2->options()->create(['option_text' => 'Kadang-kadang, jika ingat.', 'points' => 2]);
        $question2->options()->create(['option_text' => 'Tidak pernah, selalu pakai kantong dari toko.', 'points' => 1]);

        $question3 = $quiz1->questions()->create([
            'question_text' => 'Di rumah, bagaimana caramu mengelola sampah yang kamu hasilkan?',
        ]);
        $question3->options()->create(['option_text' => 'Memilah sampah untuk didaur ulang (plastik, kertas, organik).', 'points' => 3]);
        $question3->options()->create(['option_text' => 'Buang campur, tapi berusaha mengurangi volume sampah.', 'points' => 2]);
        $question3->options()->create(['option_text' => 'Membuang semua sampah jadi satu.', 'points' => 1]);

        $question4 = $quiz1->questions()->create([
            'question_text' => 'Untuk minum di luar rumah, apa pilihan utamamu?',
        ]);
        $question4->options()->create(['option_text' => 'Selalu bawa botol minum isi ulang, jarang beli air kemasan.', 'points' => 3]);
        $question4->options()->create(['option_text' => 'Kadang beli air minum botol plastik, kadang bawa botol isi ulang.', 'points' => 2]);
        $question4->options()->create(['option_text' => 'Hampir setiap hari membeli air minum dalam botol plastik.', 'points' => 1]);

        $question5 = $quiz1->questions()->create([
            'question_text' => 'Apakah kamu rutin mematikan lampu dan mencabut peralatan elektronik saat tidak digunakan?',
        ]);
        $question5->options()->create(['option_text' => 'Selalu, sudah jadi kebiasaan otomatis.', 'points' => 3]);
        $question5->options()->create(['option_text' => 'Kadang-kadang, jika teringat.', 'points' => 2]);
        $question5->options()->create(['option_text' => 'Jarang terpikirkan untuk melakukannya.', 'points' => 1]);

        $question6 = $quiz1->questions()->create([
            'question_text' => 'Seberapa sering kamu mengonsumsi daging merah (sapi atau kambing) dalam seminggu?',
        ]);
        $question6->options()->create(['option_text' => 'Jarang (maksimal 1x seminggu atau kurang).', 'points' => 3]);
        $question6->options()->create(['option_text' => 'Sedang (sekitar 2-3x seminggu).', 'points' => 2]);
        $question6->options()->create(['option_text' => 'Sering (hampir setiap hari).', 'points' => 1]);

        $question7 = $quiz1->questions()->create([
            'question_text' => 'Saat memilih produk di toko, apa yang jadi pertimbangan utamamu?',
        ]);
        $question7->options()->create(['option_text' => 'Memprioritaskan produk lokal dan ramah lingkungan.', 'points' => 3]);
        $question7->options()->create(['option_text' => 'Mengutamakan harga, lalu kualitas.', 'points' => 2]);
        $question7->options()->create(['option_text' => 'Tidak terlalu memikirkannya, yang penting cocok.', 'points' => 1]);

        $question8 = $quiz1->questions()->create([
            'question_text' => 'Apa yang kamu lakukan dengan pakaian lama atau tidak terpakai yang masih layak?',
        ]);
        $question8->options()->create(['option_text' => 'Donasi atau mencari cara untuk mendaur ulang.', 'points' => 3]);
        $question8->options()->create(['option_text' => 'Menyimpan di lemari, siapa tahu nanti terpakai lagi.', 'points' => 2]);
        $question8->options()->create(['option_text' => 'Membuang ke tempat sampah.', 'points' => 1]);

        $question9 = $quiz1->questions()->create([
            'question_text' => 'Seberapa paham atau terlibat kamu dengan gerakan zero waste atau gaya hidup hijau?',
        ]);
        $question9->options()->create(['option_text' => 'Aktif mengikuti dan menerapkan dalam kehidupan sehari-hari.', 'points' => 3]);
        $question9->options()->create(['option_text' => 'Pernah dengar atau tahu sedikit, tapi belum aktif menerapkan.', 'points' => 2]);
        $question9->options()->create(['option_text' => 'Tidak tahu sama sekali.', 'points' => 1]);

        $question10 = $quiz1->questions()->create([
            'question_text' => 'Seberapa sering kamu membeli makanan berlebih yang akhirnya tidak habis dan terbuang?',
        ]);
        $question10->options()->create(['option_text' => 'Jarang atau tidak pernah.', 'points' => 3]);
        $question10->options()->create(['option_text' => 'Kadang-kadang.', 'points' => 2]);
        $question10->options()->create(['option_text' => 'Sering.', 'points' => 1]);

        // --- QUIZ 2: JEJAK LINGKUNGANKU ---
        $quiz2 = Quiz::create([
            'title' => 'Kuis: Jejak Lingkunganku - Sejauh Mana Kamu Berkontribusi?',
            'description' => 'Mari selami lebih dalam kebiasaanmu dan pahami dampak lingkungan dari setiap pilihan yang kamu ambil.',
            'duration_minutes' => 6,
        ]);

        $question11 = $quiz2->questions()->create([
            'question_text' => 'Saat membeli perangkat elektronik baru (misal: smartphone, laptop), apa yang menjadi pertimbangan utama bagimu?',
        ]);
        $question11->options()->create(['option_text' => 'Daya tahan produk dan kemudahan perbaikan (agar tidak cepat ganti).', 'points' => 3]);
        $question11->options()->create(['option_text' => 'Harga dan fitur terbaru yang ditawarkan.', 'points' => 2]);
        $question11->options()->create(['option_text' => 'Merek populer dan tren terkini.', 'points' => 1]);

        $question12 = $quiz2->questions()->create([
            'question_text' => 'Bagaimana kamu mengeringkan pakaian setelah dicuci?',
        ]);
        $question12->options()->create(['option_text' => 'Menjemur di bawah sinar matahari/angin (alami).', 'points' => 3]);
        $question12->options()->create(['option_text' => 'Tergantung cuaca, kadang menjemur, kadang pakai pengering mesin.', 'points' => 2]);
        $question12->options()->create(['option_text' => 'Selalu menggunakan mesin pengering pakaian. (1 poin)', 'points' => 1]);

        $question13 = $quiz2->questions()->create([
            'question_text' => 'Ketika kamu melihat keran air bocor atau listrik menyala tanpa guna di tempat umum, apa yang kamu lakukan?',
        ]);
        $question13->options()->create(['option_text' => 'Melaporkan kepada pihak berwenang atau mencoba memperbaikinya jika aman.', 'points' => 3]);
        $question13->options()->create(['option_text' => 'Berpikir untuk melaporkan, tapi seringnya tidak jadi.', 'points' => 2]);
        $question13->options()->create(['option_text' => 'Tidak terlalu memperhatikannya.', 'points' => 1]);

        $question14 = $quiz2->questions()->create([
            'question_text' => 'Seberapa sering kamu menggunakan tisu dapur atau tisu toilet yang sekali pakai?',
        ]);
        $question14->options()->create(['option_text' => 'Sangat jarang, lebih sering pakai lap kain atau handuk.', 'points' => 3]);
        $question14->options()->create(['option_text' => 'Kadang-kadang, untuk kepraktisan.', 'points' => 2]);
        $question14->options()->create(['option_text' => 'Hampir selalu, untuk kebersihan dan kemudahan.', 'points' => 1]);

        $question15 = $quiz2->questions()->create([
            'question_text' => 'Bagaimana caramu membuang limbah minyak goreng bekas di rumah?',
        ]);
        $question15->options()->create(['option_text' => 'Mengumpulkan untuk didaur ulang atau diserahkan ke pengumpul khusus.', 'points' => 3]);
        $question15->options()->create(['option_text' => 'Membuang ke tempat sampah setelah didinginkan dan dipadatkan.', 'points' => 2]);
        $question15->options()->create(['option_text' => 'Langsung membuangnya ke saluran air/wastafel.', 'points' => 1]);

        $question16 = $quiz2->questions()->create([
            'question_text' => 'Saat liburan atau bepergian, apa yang menjadi prioritasmu terkait akomodasi?',
        ]);
        $question16->options()->create(['option_text' => 'Memilih penginapan yang memiliki sertifikasi ramah lingkungan atau praktik berkelanjutan.', 'points' => 3]);
        $question16->options()->create(['option_text' => 'Mencari yang sesuai anggaran dan lokasi strategis.', 'points' => 2]);
        $question16->options()->create(['option_text' => 'Tidak ada preferensi khusus, yang penting nyaman.', 'points' => 1]);

        $question17 = $quiz2->questions()->create([
            'question_text' => 'Seberapa sering kamu membaca atau mencari informasi tentang isu lingkungan dan keberlanjutan?',
        ]);
        $question17->options()->create(['option_text' => 'Sering, selalu ingin tahu perkembangan terbaru dan cara berkontribusi.', 'points' => 3]);
        $question17->options()->create(['option_text' => 'Kadang-kadang, jika ada berita menarik atau rekomendasi.', 'points' => 2]);
        $question17->options()->create(['option_text' => 'Jarang atau tidak pernah.', 'points' => 1]);

        $question18 = $quiz2->questions()->create([
            'question_text' => 'Apakah kamu mendukung merek atau perusahaan yang berkomitmen pada praktik etis dan ramah lingkungan?',
        ]);
        $question18->options()->create(['option_text' => 'Ya, saya berusaha keras untuk mendukung mereka.', 'points' => 3]);
        $question18->options()->create(['option_text' => 'Jika harganya terjangkau dan mudah diakses.', 'points' => 2]);
        $question18->options()->create(['option_text' => 'Tidak, saya fokus pada harga dan kualitas produk itu sendiri.', 'points' => 1]);

        $question19 = $quiz2->questions()->create([
            'question_text' => 'Bagaimana pendapatmu tentang penggunaan produk kemasan sekali pakai (misal: bungkus makanan, botol minuman kemasan, sachet)?',
        ]);
        $question19->options()->create(['option_text' => 'Berusaha keras menghindari dan mencari alternatif bebas kemasan.', 'points' => 3]);
        $question19->options()->create(['option_text' => 'Mengurangi penggunaannya, tapi kadang masih membeli karena praktis.', 'points' => 2]);
        $question19->options()->create(['option_text' => 'Tidak terlalu memikirkannya, yang penting praktis dan mudah didapat.', 'points' => 1]);

        $question20 = $quiz2->questions()->create([
            'question_text' => 'Apakah kamu aktif mengajak teman atau keluarga untuk menerapkan gaya hidup yang lebih ramah lingkungan?',
        ]);

        $question20->options()->create(['option_text' => 'Ya, saya sering berbagi tips dan mendorong mereka.', 'points' => 3]);
        $question20->options()->create(['option_text' => 'Kadang-kadang, jika ada kesempatan atau topik pembicaraan.', 'points' => 2]);
        $question20->options()->create(['option_text' => 'Tidak, itu pilihan pribadi masing-masing.', 'points' => 1]);

    }
}