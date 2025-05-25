# 🌿 LangkahHijau – Gaya Hidup Sehat dan Ramah Lingkungan

**Slogan:**  
*Mulai dari diri. Ubah dunia. Satu langkah hijau setiap hari.*

---

## 📱 Deskripsi Aplikasi

**LangkahHijau** adalah aplikasi web interaktif berbasis Laravel yang mengedukasi dan mengajak masyarakat untuk menjalani gaya hidup sehat dan ramah lingkungan melalui pendekatan gamifikasi. Pengguna dapat mengikuti tantangan harian, menjawab kuis, melacak kebiasaan, dan mendapatkan poin serta badge sebagai bentuk apresiasi atas kontribusinya terhadap lingkungan.

---

## 🚀 Fitur Utama

- 🎯 **Green Challenge Harian dan Mingguan**  
  Lakukan aksi hijau setiap hari dan kumpulkan poin dari tantangan yang kamu selesaikan.

- 🧠 **Quiz Harian**  
  Uji pengetahuan dan kesadaranmu soal lingkungan dan gaya hidup sehat melalui kuis singkat.

- 🏅 **Sistem Green Points & Badge**  
  Kumpulkan poin dari kuis dan challenge untuk membuka badge/gelar eksklusif.

- 📚 **Artikel Edukasi & Tips**  
  Baca artikel ringkas yang inspiratif seputar hidup sehat dan peduli lingkungan.

- 📊 **Jejak Karbon Harian** *(opsional)*  
  Lacak dampak lingkungan dari gaya hidupmu sehari-hari (transportasi, konsumsi, dll).

- 🗺️ **Peta Hijau Lokal** *(opsional)*  
  Temukan tempat daur ulang, refill station, taman, dan komunitas hijau di sekitarmu.
---

## ✅ Persyaratan

Sebelum memulai, pastikan perangkat Anda memiliki:

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
DB_DATABASE=langkah_hijau
DB_USERNAME=root
DB_PASSWORD=your_password
```

File database juga telah disediakan di folder /database.

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Migrasi dan Seed Database

```bash
php artisan migrate:fresh --seed
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

|Peran              |	Nama / Deskripsi            |
|Project Leader	    |   Naufal Harits Prasetia      |
|Backend Developer  |   (Diisi sesuai tim proyek)   |
|Frontend Developer |	(Diisi sesuai tim proyek)   |
|UI/UX Designer     |	(Diisi sesuai tim proyek)   |
|Content Creator    |	(Diisi sesuai tim proyek)   |

### 🧪 Tech Stack
-Framework: Laravel

-Frontend: Blade, TailwindCSS

-Database: MySQL / PostgreSQL / SQLite

-Deployment: Laravel Cloud

### 📜 Lisensi & Kontribusi

Proyek ini dibuat sebagai bagian dari partisipasi lomb  a dan penelitian edukatif.

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
