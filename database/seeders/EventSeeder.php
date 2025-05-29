<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $events = [
            [
                'title' => 'Workshop Urban Farming untuk Pemula',
                'category' => 'Seminar',
                'image' => 'urbanfarming.png',
                'description' => 'Belajar teknik bertani di lahan sempit untuk hidup lebih hijau di kota.',
                'location' => 'Ruang Hijau, Surabaya',
                'penyelenggara' => 'LangkahHijau',
                'contact_person' => 'Rina W.',
                'contact_person_number' => '081234567890',
                'date_time' => $now->copy()->addDays(4)->setTime(10, 0),
            ],
            [
                'title' => 'Aksi Bersih Sungai Brantas',
                'category' => 'Gotong Royong',
                'image' => 'aksisungai.png',
                'description' => 'Bersama menjaga sungai dengan kegiatan bersih-bersih komunitas.',
                'location' => 'Tepi Sungai Brantas, Sidoarjo',
                'penyelenggara' => 'LangkahHijau',
                'contact_person' => 'Ari P.',
                'contact_person_number' => '082112345678',
                'date_time' => $now->copy()->addDays(3)->setTime(8, 0),
            ],
            [
                'title' => 'Green Talk: Energi Terbarukan di Rumah',
                'category' => 'Talk Show',
                'image' => 'greentalk.png',
                'description' => 'Diskusi bersama pakar tentang energi terbarukan dan panel surya.',
                'location' => 'Online (Zoom)',
                'penyelenggara' => 'LangkahHijau',
                'contact_person' => 'Nanda M.',
                'contact_person_number' => '081234111222',
                'date_time' => $now->copy()->addDays(1)->setTime(19, 0),
            ],
            [
                'title' => 'Pameran Produk Daur Ulang Lokal',
                'category' => 'Pameran',
                'image' => 'pameran.png',
                'description' => 'Pameran kreatifitas masyarakat lokal dalam mendaur ulang barang bekas.',
                'location' => 'Gedung Kesenian Sidoarjo',
                'penyelenggara' => 'LangkahHijau',
                'contact_person' => 'Eka S.',
                'contact_person_number' => '087777000123',
                'date_time' => $now->copy()->addDays(2)->setTime(9, 0),
            ],
            [
                'title' => 'Eco Picnic & Edukasi Sampah Organik',
                'category' => 'Kolaborasi',
                'image' => 'picnic.png',
                'description' => 'Bersantai sambil belajar pemanfaatan sampah organik di alam terbuka.',
                'location' => 'Taman Hijau Kota',
                'penyelenggara' => 'LangkahHijau',
                'contact_person' => 'Rafi D.',
                'contact_person_number' => '081999222111',
                'date_time' => $now->copy()->addDays(1)->setTime(14, 0),
            ],
            [
                'title' => 'Volunteering: Menanam 1000 Pohon',
                'category' => 'Volunteer',
                'image' => 'treeplanting.png',
                'description' => 'Bergabung menanam pohon bersama komunitas peduli lingkungan.',
                'location' => 'Hutan Kota Sidoarjo',
                'penyelenggara' => 'LangkahHijau',
                'contact_person' => 'Dimas T.',
                'contact_person_number' => '085611119999',
                'date_time' => $now->copy()->addDays(1)->setTime(7, 0),
            ],
            [
                'title' => 'Sosialisasi Gaya Hidup Minim Sampah',
                'category' => 'Seminar',
                'image' => 'seminar.png',
                'description' => 'Cara-cara mudah memulai gaya hidup minim sampah dari rumah.',
                'location' => 'Balai RW 05, Sidoarjo',
                'penyelenggara' => 'LangkahHijau',
                'contact_person' => 'Lilis A.',
                'contact_person_number' => '083888444555',
                'date_time' => $now->copy()->addDays(2)->setTime(16, 0),
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
                'is_demo' => true
            ]);
        }
        $user1 =  User::where('email', 'naufal@gmail.com')->first();
        $ajuan_events = [
            [
                'title' => 'LangkahHijau Goes to School',
                'category' => 'Kolaborasi',
                'image' => 'schoolprogram.png',
                'description' => 'Belajar teknik bertani di lahan sempit untuk hidup lebih hijau di kota.',
                'location' => 'SD Negeri 1 Sidoarjo',
                'penyelenggara' => 'LangkahHijau',
                'contact_person' => 'Siti M.',
                'contact_person_number' => '081334455667',
                'date_time' => $now->copy()->addDays(4)->setTime(10, 0),
            ],
            [
                'title' => 'Eco Bazaar & Tukar Barang Bekas',
                'category' => 'Pameran',
                'image' => 'eco-bazaar.png',
                'description' => 'Bazaar ramah lingkungan dengan area tukar-menukar barang bekas layak pakai.',
                'location' => 'Alun-alun Sidoarjo',
                'penyelenggara' => 'LangkahHijau',
                'contact_person' => 'Budi R.',
                'contact_person_number' => '085755332211',
                'date_time' => $now->copy()->addDays(4)->setTime(10, 0),
            ],
        ];

        foreach ($ajuan_events as $event) {
            DB::table('ajuan_events')->insert([
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
                'user_id' => $user1->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}