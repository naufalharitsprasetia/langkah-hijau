<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Workshop Urban Farming untuk Pemula',
                'category' => 'Seminar',
                'image' => 'urban-farming.jpg',
                'description' => 'Belajar teknik bertani di lahan sempit untuk hidup lebih hijau di kota.',
                'location' => 'Ruang Hijau, Surabaya',
                'penyelenggara' => 'LangkahHijau',
                'contact_person' => 'Rina W.',
                'contact_person_number' => '081234567890',
                'date_time' => Carbon::parse('2025-06-15 10:00:00'),
            ],
            [
                'title' => 'Aksi Bersih Sungai Brantas',
                'category' => 'Gotong Royong',
                'image' => 'clean-river.jpg',
                'description' => 'Bersama menjaga sungai dengan kegiatan bersih-bersih komunitas.',
                'location' => 'Tepi Sungai Brantas, Sidoarjo',
                'penyelenggara' => 'LangkahHijau',
                'contact_person' => 'Ari P.',
                'contact_person_number' => '082112345678',
                'date_time' => Carbon::parse('2025-07-01 08:00:00'),
            ],
            [
                'title' => 'Green Talk: Energi Terbarukan di Rumah',
                'category' => 'Talk Show',
                'image' => 'talk-renewable.jpg',
                'description' => 'Diskusi bersama pakar tentang energi terbarukan dan panel surya.',
                'location' => 'Online (Zoom)',
                'penyelenggara' => 'LangkahHijau',
                'contact_person' => 'Nanda M.',
                'contact_person_number' => '081234111222',
                'date_time' => Carbon::parse('2025-06-20 19:00:00'),
            ],
            [
                'title' => 'Pameran Produk Daur Ulang Lokal',
                'category' => 'Pameran',
                'image' => 'recycled-expo.jpg',
                'description' => 'Pameran kreatifitas masyarakat lokal dalam mendaur ulang barang bekas.',
                'location' => 'Gedung Kesenian Sidoarjo',
                'penyelenggara' => 'LangkahHijau',
                'contact_person' => 'Eka S.',
                'contact_person_number' => '087777000123',
                'date_time' => Carbon::parse('2025-06-25 09:00:00'),
            ],
            [
                'title' => 'Eco Picnic & Edukasi Sampah Organik',
                'category' => 'Kolaborasi',
                'image' => 'eco-picnic.jpg',
                'description' => 'Bersantai sambil belajar pemanfaatan sampah organik di alam terbuka.',
                'location' => 'Taman Hijau Kota',
                'penyelenggara' => 'LangkahHijau',
                'contact_person' => 'Rafi D.',
                'contact_person_number' => '081999222111',
                'date_time' => Carbon::parse('2025-07-05 14:00:00'),
            ],
            [
                'title' => 'Volunteering: Menanam 1000 Pohon',
                'category' => 'Volunteer',
                'image' => 'tree-planting.jpg',
                'description' => 'Bergabung menanam pohon bersama komunitas peduli lingkungan.',
                'location' => 'Hutan Kota Sidoarjo',
                'penyelenggara' => 'LangkahHijau',
                'contact_person' => 'Dimas T.',
                'contact_person_number' => '085611119999',
                'date_time' => Carbon::parse('2025-06-30 07:00:00'),
            ],
            [
                'title' => 'Sosialisasi Gaya Hidup Minim Sampah',
                'category' => 'Seminar',
                'image' => 'zero-waste-talk.jpg',
                'description' => 'Cara-cara mudah memulai gaya hidup minim sampah dari rumah.',
                'location' => 'Balai RW 05, Sidoarjo',
                'penyelenggara' => 'LangkahHijau',
                'contact_person' => 'Lilis A.',
                'contact_person_number' => '083888444555',
                'date_time' => Carbon::parse('2025-06-28 16:00:00'),
            ],
        ];

        foreach ($events as $event) {
            DB::table('events')->insert([
                'id' => Str::uuid(),
                'title' => $event['title'],
                'category' => $event['category'],
                'image' => $event['image'],
                'description' => $event['description'],
                'location' => $event['location'],
                'penyelenggara' => $event['penyelenggara'],
                'contact_person' => $event['contact_person'],
                'contact_person_number' => $event['contact_person_number'],
                'date_time' => $event['date_time'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}