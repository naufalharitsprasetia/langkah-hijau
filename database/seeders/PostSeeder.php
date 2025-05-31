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
            'body' => '<p>Gaya hidup zero waste bukan berarti hidup tanpa sampah sama sekali, tapi mengurangi semaksimal mungkin. Mulailah dengan:</p><p><br></p><p>1. Membawa tas belanja sendiri.</p><p>2. Menggunakan botol minum dan tempat makan reusable.</p><p>3. Menghindari produk sekali pakai.</p><p>4. Membeli produk tanpa kemasan berlebih.</p><p>5. Daur ulang dan kompos sisa makanan.</p><p><br></p><p><strong>Tips Praktis:</strong></p><p>“Mulai dari satu kebiasaan, lalu tambah perlahan. Konsisten lebih penting daripada sempurna!”</p>',
            'image' => 'zerowaste.png',
            'created_at' => now(),
            'is_demo' => true
        ]);
        // 2
        Post::create([
            'id' => Str::uuid(),
            'title' => 'Mengapa Konsumsi Daging Berlebihan Berdampak Buruk untuk Bumi?',
            'category' => '🛍️ Konsumsi Berkelanjutan',
            'body' => '<p>Produksi daging (terutama sapi) menghasilkan gas rumah kaca seperti metana. Juga memerlukan banyak air dan lahan. Mengurangi konsumsi daging:</p><p><br></p><p>- Mengurangi emisi karbon.</p><p>- Menyehatkan tubuh.</p><p>- Mendukung keberlanjutan bumi.</p><p><br></p><p><strong>Aksi Kecil:</strong></p><p>Coba tantangan “Meatless Monday”! 1 hari tanpa daging = pengurangan emisi sekitar 2 kg CO₂.</p>',
            'image' => 'daging.png',
            'created_at' => now(),
            'is_demo' => true
        ]);
        // 3
        Post::create([
            'id' => Str::uuid(),
            'title' => 'Transportasi Ramah Lingkungan, Pilihan Sehat dan Cerdas',
            'category' => '🚶 Transportasi Hijau',
            'body' => '<h3>Kendaraan bermotor menyumbang emisi terbesar di kota-kota. Gunakan:</h3><p><br></p><p>- Sepeda untuk jarak dekat (juga olahraga!)</p><p>- Transportasi umum untuk efisiensi</p><p>- Jalan kaki = hemat + sehat</p><p><br></p><p><strong>Fun Fact:</strong></p><p>Berjalan 30 menit sehari bisa membakar ±150 kalori dan mengurangi jejak karbon harianmu.”</p>',
            'image' => 'transportasi.png',
            'created_at' => now(),
            'is_demo' => true
        ]);
        // 4
        Post::create([
            'id' => Str::uuid(),
            'title' => 'Apa Itu Fast Fashion dan Mengapa Kita Harus Peduli?',
            'category' => '🛍️ Konsumsi Berkelanjutan',
            'body' => '<p>Fast fashion = tren pakaian cepat, murah, tapi berumur pendek. </p><p><strong><em>Dampaknya</em></strong>:</p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Limbah tekstil menumpuk</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Banyak pakaian berakhir di TPA</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Eksploitasi tenaga kerja</li></ol><p><br></p><p><strong>Solusi Ringan:</strong></p><p>Pilih thrifting, tukar pakaian dengan teman, atau beli dari brand berkelanjutan.</p>',
            'image' => 'fashion.png',
            'created_at' => now(),
            'is_demo' => true
        ]);
        // 5. Supermarket
        Post::create([
            'id' => Str::uuid(),
            'title' => 'Tips Belanja Ramah Lingkungan di Supermarket',
            'category' => '🛍️ Konsumsi Berkelanjutan',
            'body' => '<p>1. Bawa tas kain sendiri</p><p>2. Hindari produk dengan banyak plastik</p><p>3. Pilih produk lokal &amp; musiman</p><p>4. Beli dalam jumlah seperlunya (hindari food waste)</p><p><br></p><p><strong>Bonus:</strong></p><p>Gunakan daftar belanja agar tidak impulsif — itu juga bagian dari konsumsi berkelanjutan.</p>',
            'image' => 'supermarket.png',
            'created_at' => now(),
            'is_demo' => true
        ]);
        // 6 kompos
        Post::create([
            'id' => Str::uuid(),
            'title' => 'Kompos di Rumah, Cara Sederhana Kurangi Sampah Organik',
            'category' => '🌱 Zero Waste',
            'body' => '<p>Sampah dapur seperti kulit buah, sayur layu, atau ampas kopi bisa dikompos. Caranya mudah:</p><p><br></p><p>- Gunakan ember kompos tertutup</p><p>- Campur bahan basah dan kering (ranting/kertas)</p><p>- Aduk dan biarkan selama 2–4 minggu</p><p><br></p><p><strong>Manfaat:</strong></p><p>Mengurangi sampah ke TPA dan menghasilkan pupuk alami untuk tanaman.</p>',
            'image' => 'kompos.png',
            'created_at' => now(),
            'is_demo' => true
        ]);
        // 7 air
        Post::create([
            'id' => Str::uuid(),
            'title' => 'Air Lebih Berharga dari yang Kamu Kira – Hemat Air Mulai Hari Ini',
            'category' => '🔌 Energi dan Elektronik',
            'body' => '<h3>Air bersih makin langka di banyak daerah, dan penggunaannya sering kita anggap remeh. </h3><p><br></p><p><strong>Padahal:</strong></p><p>- Mandi 10 menit = 100 liter air.</p><p>- Sikat gigi dengan keran menyala = 6 liter air terbuang.</p><p>    - 1 kg daging = 15.000 liter air dalam produksinya.</p><p><br></p><p><strong>Langkah Hemat Air:</strong></p><p>    - Gunakan shower hemat air.</p><p>- Matikan keran saat tidak digunakan.</p><p>- Gunakan air bekas cucian sayur untuk siram tanaman.</p><p><br></p><p><strong>Ingat !</strong></p><p>Hemat air hari ini = air bersih untuk generasi berikutnya.</p>',
            'image' => 'water.png',
            'created_at' => now(),
            'is_demo' => true
        ]);
    }
}
