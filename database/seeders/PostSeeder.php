<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        Post::create([
            'id' => Str::uuid(),
            'title' => '5 Cara Mudah Memulai Gaya Hidup Zero Waste',
            'category' => '🌱 Zero Waste',
            'body' => '
            <h2>Memulai Gaya Hidup Zero Waste</h2>
            <p>Zero waste bukan tentang menjadi sempurna tanpa sampah, melainkan tentang kesadaran untuk mengurangi sampah sebanyak mungkin dalam kehidupan sehari-hari. Dengan meningkatnya krisis iklim dan tumpukan sampah di TPA, gaya hidup ini menjadi semakin relevan.</p>

            <h3>Kenapa Zero Waste Penting?</h3>
            <p>Sampah plastik membutuhkan ratusan tahun untuk terurai dan banyak yang akhirnya mencemari laut dan membahayakan ekosistem. Dengan mengubah kebiasaan kecil, kita bisa membuat perbedaan besar.</p>

            <h3>5 Langkah Mudah Memulainya:</h3>
            <ol>
            <li><strong>Bawa Tas Belanja Sendiri</strong><br>Hindari kantong plastik dengan selalu membawa tas kain yang bisa digunakan berulang kali. Letakkan di tas harian atau kendaraan agar tidak lupa.</li>
            <li><strong>Gunakan Botol & Tempat Makan Reusable</strong><br>Botol minum stainless dan kotak makan dari kaca atau logam tahan lama dan ramah lingkungan.</li>
            <li><strong>Hindari Produk Sekali Pakai</strong><br>Ganti tissue dengan sapu tangan kain, sedotan plastik dengan sedotan bambu atau stainless, dan popok sekali pakai dengan versi kain.</li>
            <li><strong>Pilih Produk Minim Kemasan</strong><br>Belanja di toko curah dengan wadah sendiri, hindari produk berlapis plastik, dan pilih barang dengan kemasan mudah didaur ulang.</li>
            <li><strong>Kompos & Daur Ulang</strong><br>Komposkan sisa makanan dan gunakan sebagai pupuk tanaman. Pisahkan sampah organik dan anorganik untuk mempermudah proses daur ulang.</li>
            </ol>

            <h3>Tips Praktis untuk Pemula</h3>
            <p>Jangan langsung ubah segalanya dalam sehari. Mulai dari satu kebiasaan kecil dan tambahkan perlahan. Zero waste adalah perjalanan, bukan tujuan akhir.</p>

            <blockquote>
            <em>"Konsistensi lebih penting daripada kesempurnaan. Lebih baik satu orang melakukan zero waste dengan tidak sempurna, daripada tidak melakukannya sama sekali."</em>
            </blockquote>
            ',
            'image' => 'zerowaste.png',
            'created_at' => now(),
            'is_demo' => true
        ]);
        // 2
        Post::create([
            'id' => Str::uuid(),
            'title' => 'Mengapa Konsumsi Daging Berlebihan Berdampak Buruk untuk Bumi?',
            'category' => '🛍️ Konsumsi Berkelanjutan',
            'body' => '
            <h2>Dampak Konsumsi Daging terhadap Lingkungan</h2>
            <p>Industri peternakan, khususnya sapi dan kambing, menyumbang emisi gas rumah kaca dalam jumlah besar, terutama metana (CH<sub>4</sub>) yang jauh lebih kuat dibanding CO<sub>2</sub>. Selain itu, dibutuhkan lahan luas dan air dalam jumlah besar untuk menghasilkan daging.</p>

            <h3>Fakta Penting:</h3>
            <ul>
            <li>1 kg daging sapi = ±15.000 liter air</li>
            <li>Industri peternakan menyumbang >14% emisi global</li>
            <li>Hutan tropis banyak dibabat untuk padang penggembalaan</li>
            </ul>

            <h3>Kenapa Harus Mengurangi Konsumsi Daging?</h3>
            <p>
            Mengurangi konsumsi daging, terutama daging merah, adalah langkah efektif untuk menurunkan jejak karbon individu. Selain itu, pola makan berbasis nabati terbukti lebih sehat dan mendukung keberlanjutan pangan dunia.
            </p>

            <h3>Manfaat Langsung:</h3>
            <ol>
            <li><strong>Menurunkan emisi karbon pribadi</strong></li>
            <li><strong>Menurunkan risiko penyakit jantung & kanker</strong></li>
            <li><strong>Mendorong sistem pangan yang lebih adil dan efisien</strong></li>
            </ol>

            <h3>Aksi Kecil yang Berdampak Besar</h3>
            <p>Coba mulai dengan <strong>“Meatless Monday”</strong>, yaitu tidak makan daging setiap hari Senin. Satu hari tanpa daging bisa mengurangi sekitar 2–3 kg emisi CO₂ per orang. Bayangkan jika dilakukan rutin oleh jutaan orang.</p>

            <blockquote>
            <em>"Bumi tidak butuh 1000 orang sempurna, tapi jutaan orang yang melakukan perubahan kecil secara konsisten."</em>
            </blockquote>
            ',
            'image' => 'daging.png',
            'created_at' => now(),
            'is_demo' => true
        ]);
        // 3
        Post::create([
            'id' => Str::uuid(),
            'title' => 'Transportasi Ramah Lingkungan, Pilihan Sehat dan Cerdas',
            'category' => '🚶 Transportasi Hijau',
            'body' => '
            <h2>Mengurangi Emisi dari Aktivitas Harian</h2>
            <p>Transportasi menyumbang lebih dari 20% emisi karbon global, terutama di kota besar dengan banyak kendaraan pribadi. Padahal, banyak alternatif ramah lingkungan yang bisa kita pilih setiap hari.</p>

            <h3>Pilihan Transportasi Ramah Lingkungan:</h3>
            <ul>
            <li><strong>Berjalan kaki:</strong> Efektif untuk jarak pendek, tidak menghasilkan emisi, sekaligus menyehatkan jantung.</li>
            <li><strong>Bersepeda:</strong> Bebas polusi, hemat biaya, dan baik untuk kesehatan mental.</li>
            <li><strong>Transportasi umum:</strong> Mengurangi kemacetan dan emisi, terutama jika sistemnya terintegrasi dengan baik.</li>
            </ul>

            <h3>Manfaat Lainnya:</h3>
            <p>
            Transportasi ramah lingkungan tidak hanya baik untuk bumi, tetapi juga dompet dan tubuh kita. Bersepeda 30 menit bisa membakar hingga 300 kalori. Sementara berjalan kaki 30 menit setara dengan 150 kalori terbakar.
            </p>

            <h3>Tips Memulai:</h3>
            <ol>
            <li>Rencanakan rute berjalan atau bersepeda ke tempat kerja/sekolah.</li>
            <li>Gunakan transportasi publik di jam sibuk untuk menghindari stres berkendara.</li>
            <li>Gabungkan moda transportasi, seperti naik angkutan umum lalu lanjut jalan kaki atau sepeda.</li>
            </ol>

            <blockquote>
            <em>"Jangan remehkan kekuatan langkah kecilmu — setiap langkah yang kamu pilih tanpa kendaraan, adalah langkah menuju udara yang lebih bersih."</em>
            </blockquote>
            ',
            'image' => 'transportasi.png',
            'created_at' => now(),
            'is_demo' => true
        ]);
        // 4
        Post::create([
            'id' => Str::uuid(),
            'title' => 'Apa Itu Fast Fashion dan Mengapa Kita Harus Peduli?',
            'category' => '🛍️ Konsumsi Berkelanjutan',
            'body' => '
            <h2>Memahami Fast Fashion</h2>
            <p>Fast fashion merujuk pada industri pakaian yang memproduksi barang dengan cepat, murah, dan dalam jumlah besar untuk mengikuti tren. Meski terlihat menguntungkan konsumen, dampaknya sangat besar bagi lingkungan dan kemanusiaan.</p>

            <h3>Dampak Lingkungan:</h3>
            <ul>
            <li>Limbah tekstil meningkat drastis – rata-rata seseorang membuang 30 kg pakaian per tahun.</li>
            <li>Pakaian murah sering dibuat dari bahan sintetis yang sulit terurai dan melepaskan mikroplastik ke laut.</li>
            <li>Produksi tekstil memerlukan air dan energi dalam jumlah besar.</li>
            </ul>

            <h3>Dampak Sosial:</h3>
            <ul>
            <li>Upah buruh rendah, kadang tidak manusiawi.</li>
            <li>Jam kerja berlebihan dan kondisi kerja tidak layak.</li>
            </ul>

            <h3>Solusi Konsumen:</h3>
            <ol>
            <li><strong>Thrifting:</strong> Belanja di toko barang bekas adalah cara hemat dan ramah lingkungan.</li>
            <li><strong>Tukar pakaian:</strong> Ajak teman atau komunitas untuk saling bertukar pakaian layak pakai.</li>
            <li><strong>Beli dari brand berkelanjutan:</strong> Dukung merek lokal yang menggunakan bahan ramah lingkungan dan transparan soal produksi.</li>
            </ol>

            <blockquote>
            <em>"Pakaian terbaik bukan yang paling baru, tapi yang paling sering dipakai dan bertahan lama."</em>
            </blockquote>
            ',
            'image' => 'fashion.png',
            'created_at' => now(),
            'is_demo' => true
        ]);
        // 5. Supermarket
        Post::create([
            'id' => Str::uuid(),
            'title' => 'Tips Belanja Ramah Lingkungan di Supermarket',
            'category' => '🛍️ Konsumsi Berkelanjutan',
            'body' => '
            <h2>Belanja Bijak = Bumi Sehat</h2>
            <p>Supermarket seringkali penuh dengan produk berkemasan plastik, produk impor, dan makanan dalam jumlah berlebih. Tapi dengan strategi yang tepat, kamu bisa belanja lebih hijau dan hemat!</p>

            <h3>Tips Praktis:</h3>
            <ol>
            <li><strong>Bawa tas belanja sendiri:</strong> Gunakan tas kain atau keranjang belanja untuk menghindari kantong plastik.</li>
            <li><strong>Hindari produk dengan banyak plastik:</strong> Pilih produk dengan kemasan minimal atau bisa didaur ulang.</li>
            <li><strong>Beli produk lokal dan musiman:</strong> Lebih segar, lebih murah, dan jejak karbonnya lebih kecil karena tidak perlu pengiriman jauh.</li>
            <li><strong>Beli seperlunya:</strong> Hindari pemborosan makanan dengan hanya membeli sesuai kebutuhan dan kemampuan konsumsi.</li>
            </ol>

            <h3>Tips Tambahan:</h3>
            <ul>
            <li>Buat daftar belanja sebelum berangkat.</li>
            <li>Periksa isi kulkas/pantry agar tidak membeli barang yang sudah ada.</li>
            <li>Hindari belanja saat lapar agar tidak impulsif.</li>
            </ul>

            <blockquote>
            <em>"Belanja bukan hanya soal harga — tapi juga dampaknya terhadap lingkungan dan masa depan kita."</em>
            </blockquote>
            ',
            'image' => 'supermarket.png',
            'created_at' => now(),
            'is_demo' => true
        ]);
        // 6 kompos
        Post::create([
            'id' => Str::uuid(),
            'title' => 'Kompos di Rumah, Cara Sederhana Kurangi Sampah Organik',
            'category' => '🌱 Zero Waste',
            'body' => '
            <h2>Manfaat Kompos untuk Lingkungan dan Rumah Tangga</h2>
            <p>Sampah organik seperti sisa makanan, kulit buah, dan daun kering bisa dijadikan kompos. Jika dibuang ke TPA, sampah ini menghasilkan gas metana — gas rumah kaca yang sangat kuat. Dengan kompos, kita mengubah limbah menjadi sumber daya.</p>

            <h3>Cara Membuat Kompos di Rumah:</h3>
            <ol>
            <li><strong>Gunakan ember atau tong kompos:</strong> Sebaiknya tertutup agar tidak bau dan tahan hama.</li>
            <li><strong>Campur bahan hijau dan coklat:</strong> Bahan hijau (kulit buah, sisa sayur) dan bahan coklat (daun kering, kertas robek) perlu seimbang.</li>
            <li><strong>Aduk rutin:</strong> Setiap 3–5 hari agar oksigen menyebar dan proses berjalan cepat.</li>
            <li><strong>Panen setelah 3–4 minggu:</strong> Kompos siap digunakan jika berwarna gelap, tidak bau, dan menggumpal seperti tanah subur.</li>
            </ol>

            <h3>Manfaat Langsung:</h3>
            <ul>
            <li>Mengurangi volume sampah rumah tangga hingga 40%</li>
            <li>Menghasilkan pupuk gratis untuk tanaman</li>
            <li>Mengurangi emisi gas rumah kaca dari TPA</li>
            </ul>

            <blockquote>
            <em>"Dengan kompos, kamu bukan membuang sampah, tapi memberi kembali ke bumi."</em>
            </blockquote>
            ',
            'image' => 'kompos.png',
            'created_at' => now(),
            'is_demo' => true
        ]);
        // 7 air
        Post::create([
            'id' => Str::uuid(),
            'title' => 'Air Lebih Berharga dari yang Kamu Kira – Hemat Air Mulai Hari Ini',
            'category' => '🔌 Energi dan Elektronik',
            'body' => '
            <h2>Krisis Air Bersih: Ancaman Nyata</h2>
            <p>Banyak daerah di Indonesia dan dunia sudah mengalami krisis air bersih. Namun, kita sering tidak menyadarinya karena air masih mengalir dari keran. Setiap tetes air yang terbuang adalah sumber daya yang semakin langka.</p>

            <h3>Fakta Penggunaan Air:</h3>
            <ul>
            <li>Mandi 10 menit = ±100 liter air</li>
            <li>Sikat gigi dengan keran menyala = 6 liter air/hari</li>
            <li>1 kg daging = hingga 15.000 liter air untuk produksinya</li>
            </ul>

            <h3>Langkah Menghemat Air:</h3>
            <ol>
            <li>Gunakan shower hemat air dan batasi waktu mandi</li>
            <li>Matikan keran saat menyikat gigi atau mencuci tangan</li>
            <li>Kumpulkan air cucian beras atau sayur untuk menyiram tanaman</li>
            <li>Periksa kebocoran keran dan perbaiki secepatnya</li>
            </ol>

            <h3>Air untuk Masa Depan</h3>
            <p>Dengan perubahan kecil dari kita semua, kita bisa menjamin ketersediaan air bersih untuk generasi mendatang.</p>

            <blockquote>
            <em>"Jangan tunggu kekeringan datang baru menghargai air. Mulailah hemat dari sekarang."</em>
            </blockquote>
            ',
            'image' => 'water.png',
            'created_at' => now(),
            'is_demo' => true
        ]);
    }
}