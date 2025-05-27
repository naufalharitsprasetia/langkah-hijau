<?php

namespace Database\Seeders;

use App\Models\Post;
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
            'title' => '5 Cara Mudah Memulai Gaya Hidup Zero Waste',
            'category' => '🌱 Zero Waste',
            'body' => 'Gaya hidup zero waste bukan berarti hidup tanpa sampah sama sekali, tapi mengurangi semaksimal mungkin. Mulailah dengan:

            1. Membawa tas belanja sendiri.
            2. Menggunakan botol minum dan tempat makan reusable.
            3. Menghindari produk sekali pakai.
            4. Membeli produk tanpa kemasan berlebih.
            5. Daur ulang dan kompos sisa makanan.

            **Tips Praktis:**

            “Mulai dari satu kebiasaan, lalu tambah perlahan. Konsisten lebih penting daripada sempurna!”',
            'image' => 'zerowaste.png',
            'created_at' => now()
        ]);
        // 2
        Post::create([
            'title' => 'Mengapa Konsumsi Daging Berlebihan Berdampak Buruk untuk Bumi?',
            'category' => '🛍️ Konsumsi Berkelanjutan',
            'body' => 'Produksi daging (terutama sapi) menghasilkan gas rumah kaca seperti metana. Juga memerlukan banyak air dan lahan. Mengurangi konsumsi daging:

            - Mengurangi emisi karbon.
            - Menyehatkan tubuh.
            - Mendukung keberlanjutan bumi.

            **Aksi Kecil:**

            Coba tantangan “Meatless Monday”! 1 hari tanpa daging = pengurangan emisi sekitar 2 kg CO₂.',
            'image' => 'daging.png',
            'created_at' => now()
        ]);
        // 3
        Post::create([
            'title' => 'Transportasi Ramah Lingkungan, Pilihan Sehat dan Cerdas',
            'category' => '🚶 Transportasi Hijau',
            'body' => 'Kendaraan bermotor menyumbang emisi terbesar di kota-kota. Gunakan:

            - Sepeda untuk jarak dekat (juga olahraga!)
            - Transportasi umum untuk efisiensi
            - Jalan kaki = hemat + sehat

            **Fun Fact:**

            Berjalan 30 menit sehari bisa membakar ±150 kalori dan mengurangi jejak karbon harianmu.”',
            'image' => 'transportasi.png',
            'created_at' => now()
        ]);
        // 4
        Post::create([
            'title' => 'Apa Itu Fast Fashion dan Mengapa Kita Harus Peduli?',
            'category' => '🛍️ Konsumsi Berkelanjutan',
            'body' => 'Fast fashion = tren pakaian cepat, murah, tapi berumur pendek. Dampaknya:

            - Limbah tekstil menumpuk
            - Banyak pakaian berakhir di TPA
            - Eksploitasi tenaga kerja

            **Solusi Ringan:**

            Pilih thrifting, tukar pakaian dengan teman, atau beli dari brand berkelanjutan.',
            'image' => 'fashion.png',
            'created_at' => now()
        ]);
        // 5. Supermarket
        Post::create([
            'title' => 'Tips Belanja Ramah Lingkungan di Supermarket',
            'category' => '🛍️ Konsumsi Berkelanjutan',
            'body' => '1. Bawa tas kain sendiri
            2. Hindari produk dengan banyak plastik
            3. Pilih produk lokal & musiman
            4. Beli dalam jumlah seperlunya (hindari food waste)

            **Bonus:**

            Gunakan daftar belanja agar tidak impulsif — itu juga bagian dari konsumsi berkelanjutan.',
            'image' => 'supermarket.png',
            'created_at' => now()
        ]);
        // 6 kompos
        Post::create([
            'title' => 'Kompos di Rumah, Cara Sederhana Kurangi Sampah Organik',
            'category' => '🌱 Zero Waste',
            'body' => 'Sampah dapur seperti kulit buah, sayur layu, atau ampas kopi bisa dikompos. Caranya mudah:

            - Gunakan ember kompos tertutup
            - Campur bahan basah dan kering (ranting/kertas)
            - Aduk dan biarkan selama 2–4 minggu

            **Manfaat:**

            Mengurangi sampah ke TPA dan menghasilkan pupuk alami untuk tanaman.',
            'image' => 'kompos.png',
            'created_at' => now()
        ]);
        // 7 air
        Post::create([
            'title' => 'Air Lebih Berharga dari yang Kamu Kira – Hemat Air Mulai Hari Ini',
            'category' => '🔌 Energi dan Elektronik',
            'body' => 'Air bersih makin langka di banyak daerah, dan penggunaannya sering kita anggap remeh. Padahal:

            - Mandi 10 menit = 100 liter air.
            - Sikat gigi dengan keran menyala = 6 liter air terbuang.
            - 1 kg daging = 15.000 liter air dalam produksinya.

            **Langkah Hemat Air:**

            - Gunakan shower hemat air.
            - Matikan keran saat tidak digunakan.
            - Gunakan air bekas cucian sayur untuk siram tanaman.

            **Ingat:**

            Hemat air hari ini = air bersih untuk generasi berikutnya.',
            'image' => 'water.png',
            'created_at' => now()
        ]);
    }
}