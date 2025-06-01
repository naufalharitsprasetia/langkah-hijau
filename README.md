# 🌿 LangkahHijau – Gaya Hidup Sehat dan Ramah Lingkungan

**Slogan:**  
*Mulai dari diri. Ubah dunia. Satu langkah hijau setiap hari.*

---

## 📱 Deskripsi Aplikasi

**LangkahHijau** adalah aplikasi gamifikasi edukatif untuk meningkatkan kesadaran lingkungan dan kesehatan generasi muda. Aplikasi ini mendorong aksi nyata seperti hemat energi dan zero waste melalui tantangan, kuis, dan penghargaan digital (Green Points, badge). Dengan konten ringan dan chatbot HijauAI, LangkahHijau bertujuan menciptakan perubahan kebiasaan positif secara menyenangkan untuk gaya hidup sehat dan bumi lestari.

- Dokumentasi Sourcecode : https://github.com/naufalharitsprasetia/langkah-hijau

- Website (Demo) : https://langkahhijau.site

---

## 🚀 Fitur Utama

- 🎯 **Tantangan Hijau (Tantangan Harian/Mingguan)**  
  Lakukan aksi hijau setiap hari dan kumpulkan poin dari tantangan yang kamu selesaikan. Dapatkan badge menarik dari tantangan.

- 🌎 **Eco-Quiz (Kuis Edukatif):**  
  Uji pengetahuan dan kesadaranmu soal lingkungan dan gaya hidup sehat melalui kuis singkat.

- 🏅 **Green Points & Badge System**  
  Sistem poin dan badge eksklusif sebagai bentuk apresiasi untuk setiap aksi hijau pengguna.

- 📚 **Edu-Zone (Artikel Edukasi & Tips Hijau)**  
  Konten informatif seputar gaya hidup sehat, ramah lingkungan, dan aksi hijau yang mudah diterapkan.

- 📆 **Green Events**  
  Fitur yang menampilkan berbagai acara atau kegiatan bertema lingkungan dan gaya hidup sehat, seperti seminar, talk show, gotong royong, dan lain-lain. Pengguna bisa melihat daftar event, menambahkan jadwal ke Google Calendar, serta mengajukan acara sendiri melalui aplikasi kemudian menunggu admin untuk menyetujuinya.

- 🏆 **Leaderboard & Tier**  
  Sistem peringkat yang menampilkan pencapaian pengguna berdasarkan akumulasi Green Points. Tier (level) pengguna diperbarui setiap minggu untuk mendorong semangat kompetitif yang sehat dan berkelanjutan.

- ✨ **HijauAI**  
  HijauAI adalah asisten virtual di aplikasi LangkahHijau yang membantu menjawab pertanyaan seputar gaya hidup sehat dan ramah lingkungan. Mulai dari zero waste, pengurangan emisi, hingga penjelasan tantangan dan sistem Green Points. Jawabannya selalu singkat, jelas, dan sesuai tema.

---

## ✅ Persyaratan

Sebelum memulai, pastikan perangkat Anda memiliki:

- Web Server : Nginx / Apache
- PHP >= 8.2  
- Composer  
- MySQL, PostgreSQL, SQLite, atau database lain yang didukung Laravel

---

## ⚙️ Cara Menginstal Aplikasi

Berikut adalah langkah-langkah untuk menginstal dan menjalankan **LangkahHijau** di perangkat Anda:

### 1. Clone Repository

```bash
git clone https://github.com/naufalharitsprasetia/langkah-hijau.git
```

### 2. Masuk ke Direktori Proyek

```bash
cd langkah-hijau
```

### 3. Install Dependency Composer

```bash
composer install
```
```bash
npm install
```

### 4. Konfigurasi File .env

Salin dan edit file .env:

```bash
cp .env.example .env
```
Edit konfigurasi berikut sesuai database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=langkahhijau
DB_USERNAME=root
DB_PASSWORD=your_password
```

File database juga telah disediakan di folder /database.

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Migrasi dan Seed Database dan buat storage link

```bash
php artisan migrate:fresh --seed
```

```bash
php artisan  php artisan storage:link
```

### 7. Jalankan Aplikasi
```bash
composer run dev
```
Aplikasi akan berjalan di: http://127.0.0.1:8000

### ❗ Troubleshooting
- Pastikan versi PHP & Composer Anda sesuai.
  
- Jalankan composer install tanpa error.
  
- Cek kembali konfigurasi .env, terutama bagian database.

Jika mengalami kendala, hubungi saya:
```yaml
📞 WhatsApp: 081220594202  
📧 Email: naufalaharisprasetia@gmail.com
```

### 👨‍💻 Tim Pengembang

|          Nama          |      NIM     |       Peran            |                                                          Contact Link                                                            |
| :--------------------: | :----------: | :----------------:     | :----------------------------------------------------------------------------------------------------------------------------:   |
| Naufal Harits Prasetia | 432022611051 |  Fullstack Developer  | [LinkedIn](https://www.linkedin.com/in/naufal-harits-prasetia-35b443283/) or [GitHub](https://github.com/naufalharitsprasetia)   |
|      Rizky Cahyono     | 442023611012 |  Backend Developer  |      [LinkedIn](https://www.linkedin.com/in/rizky-cahyono-putra-67367a2a0/) or [GitHub](https://github.com/rizkycahyono97)       |
|      Iqbal Maulana     | 442023611094 |  Frontend Developer  |        [LinkedIn](https://www.linkedin.com/in/iqbal-maulana-dev/) or [GitHub](https://github.com/cardinaldeacre)                 |

### 🧪 Tech Stack
-Framework: Laravel

-Frontend: Blade, TailwindCSS

-Database: MySQL / PostgreSQL / SQLite

-Deployment: Niagahoster (https://langkahhijau.site)

### 📜 Lisensi & Kontribusi

Proyek ini dibuat sebagai bagian dari partisipasi lomba.

Saya tidak mengizinkan penggunaan aplikasi ini secara langsung untuk kepentingan pribadi/komersial tanpa izin.
Anda diperbolehkan meniru ide atau desain, namun mohon cantumkan referensi berikut:

```csharp
Terinspirasi dari:
LangkahHijau by Naufal Harits Prasetia
https://github.com/naufalharitsprasetia/langkah-hijau
```

---- 
Semoga bermanfaat 🌱
Mari mulai Langkah Hijau kita hari ini!


----
update tiers seminggu sekali tiap hari ahad, jika ingin update tier manual untuk seluruh users, jalankan perintah berikut di terminal :
```bash
 php artisan app:update-user-tiers
```
