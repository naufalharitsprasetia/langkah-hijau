-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2025 at 04:13 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `langkahhijau`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajuan_events`
--

CREATE TABLE `ajuan_events` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ajuan_events`
--

INSERT INTO `ajuan_events` (`id`, `title`, `category`, `image`, `description`, `location`, `penyelenggara`, `contact_person`, `contact_person_number`, `date_time`, `user_id`, `created_at`, `updated_at`) VALUES
('76d5c9f4-320c-4114-86cc-04d2f39385c4', 'Eco Bazaar & Tukar Barang Bekas', 'Pameran', 'eco-bazaar.png', 'Bazaar ramah lingkungan dengan area tukar-menukar barang bekas layak pakai.', 'Alun-alun Sidoarjo', 'LangkahHijau', 'Budi R.', '085755332211', '2025-06-04 10:00:00', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
('8b729670-dd80-40f2-8931-e3ce65f4e9e4', 'LangkahHijau Goes to School', 'Kolaborasi', 'schoolprogram.png', 'Belajar teknik bertani di lahan sempit untuk hidup lebih hijau di kota.', 'SD Negeri 1 Sidoarjo', 'LangkahHijau', 'Siti M.', '081334455667', '2025-06-04 10:00:00', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `badge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `icon`, `badge`, `created_at`, `updated_at`) VALUES
(1, '♻️', 'Pejuang Anti Plastik', '2025-05-31 16:12:24', '2025-05-31 16:12:24'),
(2, '🚴', 'Komuter Hijau', '2025-05-31 16:12:24', '2025-05-31 16:12:24'),
(3, '🌱', 'Eksplorer Nabati', '2025-05-31 16:12:24', '2025-05-31 16:12:24'),
(4, '💎', 'Sustainability Hero', '2025-05-31 16:12:24', '2025-05-31 16:12:24'),
(5, '🥦', 'Green Contributor', '2025-05-31 16:12:24', '2025-05-31 16:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration_days` int NOT NULL,
  `green_points` int NOT NULL,
  `badge_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `title`, `description`, `image`, `duration_days`, `green_points`, `badge_id`, `created_at`, `updated_at`) VALUES
('4969ae15-f6d5-4759-9a09-e0aafab4c02c', '7 Hari Tanpa Plastik Sekali Pakai', 'Selama seminggu, hindari penggunaan plastik sekali pakai seperti kantong kresek, sedotan, botol air, dan kemasan makanan/minuman.', 'haritanpaplastik.png', 7, 400, 1, '2025-05-31 16:12:27', '2025-05-31 16:12:27'),
('8bd157eb-5c6c-44b6-b19e-13e8ecdce057', '5 Hari Transportasi Ramah Lingkungan', 'Gunakan transportasi minim emisi: jalan kaki, sepeda, atau transportasi umum selama 5 hari berturut-turut.', 'haritransportasi.png', 5, 250, 2, '2025-05-31 16:12:27', '2025-05-31 16:12:27'),
('eec64bc4-a7e1-4435-bba7-ebecb991f4f0', '3 Hari Makan Nabati', 'Selama 3 hari penuh, konsumsi makanan nabati (vegetarian/plant-based), hindari daging dan produk hewani.', 'harimakannabati.png', 3, 150, 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `challenge_actions`
--

CREATE TABLE `challenge_actions` (
  `id` bigint UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `challenge_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenge_actions`
--

INSERT INTO `challenge_actions` (`id`, `action`, `challenge_id`, `created_at`, `updated_at`) VALUES
(1, 'Gunakan tas belanja kain setiap kali berbelanja.', '4969ae15-f6d5-4759-9a09-e0aafab4c02c', '2025-05-31 16:12:28', NULL),
(2, 'Bawa dan gunakan botol minum pribadi.', '4969ae15-f6d5-4759-9a09-e0aafab4c02c', '2025-05-31 16:12:28', NULL),
(3, 'Hindari membeli makanan atau minuman dalam kemasan plastik sekali pakai.', '4969ae15-f6d5-4759-9a09-e0aafab4c02c', '2025-05-31 16:12:28', NULL),
(4, 'Tolak sedotan plastik, atau gunakan alternatif reusable jika perlu.', '4969ae15-f6d5-4759-9a09-e0aafab4c02c', '2025-05-31 16:12:28', NULL),
(5, 'Pilih produk dengan kemasan minimal atau tanpa kemasan plastik.', '4969ae15-f6d5-4759-9a09-e0aafab4c02c', '2025-05-31 16:12:28', NULL),
(6, 'Gunakan tas belanja kain setiap kali berbelanja.', '8bd157eb-5c6c-44b6-b19e-13e8ecdce057', '2025-05-31 16:12:28', NULL),
(7, 'Bawa dan gunakan botol minum pribadi.', '8bd157eb-5c6c-44b6-b19e-13e8ecdce057', '2025-05-31 16:12:28', NULL),
(8, 'Hindari membeli makanan atau minuman dalam kemasan plastik sekali pakai.', '8bd157eb-5c6c-44b6-b19e-13e8ecdce057', '2025-05-31 16:12:28', NULL),
(9, 'Tolak sedotan plastik, atau gunakan alternatif reusable jika perlu.', '8bd157eb-5c6c-44b6-b19e-13e8ecdce057', '2025-05-31 16:12:28', NULL),
(10, 'Pilih produk dengan kemasan minimal atau tanpa kemasan plastik.', '8bd157eb-5c6c-44b6-b19e-13e8ecdce057', '2025-05-31 16:12:28', NULL),
(11, 'Gunakan tas belanja kain setiap kali berbelanja.', 'eec64bc4-a7e1-4435-bba7-ebecb991f4f0', '2025-05-31 16:12:28', NULL),
(12, 'Bawa dan gunakan botol minum pribadi.', 'eec64bc4-a7e1-4435-bba7-ebecb991f4f0', '2025-05-31 16:12:28', NULL),
(13, 'Hindari membeli makanan atau minuman dalam kemasan plastik sekali pakai.', 'eec64bc4-a7e1-4435-bba7-ebecb991f4f0', '2025-05-31 16:12:28', NULL),
(14, 'Tolak sedotan plastik, atau gunakan alternatif reusable jika perlu.', 'eec64bc4-a7e1-4435-bba7-ebecb991f4f0', '2025-05-31 16:12:28', NULL),
(15, 'Pilih produk dengan kemasan minimal atau tanpa kemasan plastik.', 'eec64bc4-a7e1-4435-bba7-ebecb991f4f0', '2025-05-31 16:12:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `challenge_daily_actions`
--

CREATE TABLE `challenge_daily_actions` (
  `id` bigint UNSIGNED NOT NULL,
  `challenge_participation_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checked_at` datetime NOT NULL,
  `is_checked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenge_daily_actions`
--

INSERT INTO `challenge_daily_actions` (`id`, `challenge_participation_id`, `day`, `checked_at`, `is_checked`, `created_at`, `updated_at`) VALUES
(1, 'b4a3d98f-2c3d-4890-bb47-0c6c483657bf', 'day1', '2025-05-25 00:00:00', 1, '2025-05-22 16:12:28', '2025-05-31 16:12:28'),
(2, 'b4a3d98f-2c3d-4890-bb47-0c6c483657bf', 'day2', '2025-05-26 00:00:00', 1, '2025-05-21 16:12:28', '2025-05-31 16:12:28'),
(3, 'b4a3d98f-2c3d-4890-bb47-0c6c483657bf', 'day3', '2025-05-27 00:00:00', 1, '2025-05-21 16:12:28', '2025-05-31 16:12:28'),
(4, 'b4a3d98f-2c3d-4890-bb47-0c6c483657bf', 'day4', '2025-05-28 00:00:00', 1, '2025-05-21 16:12:28', '2025-05-31 16:12:28'),
(5, 'b4a3d98f-2c3d-4890-bb47-0c6c483657bf', 'day5', '2025-05-29 00:00:00', 1, '2025-05-21 16:12:28', '2025-05-31 16:12:28'),
(6, 'b4a3d98f-2c3d-4890-bb47-0c6c483657bf', 'day6', '2025-05-30 00:00:00', 1, '2025-05-21 16:12:28', '2025-05-31 16:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `challenge_participations`
--

CREATE TABLE `challenge_participations` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `challenge_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `completion_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenge_participations`
--

INSERT INTO `challenge_participations` (`id`, `user_id`, `challenge_id`, `start_date`, `is_completed`, `completion_date`, `created_at`, `updated_at`) VALUES
('b4a3d98f-2c3d-4890-bb47-0c6c483657bf', 2, '4969ae15-f6d5-4759-9a09-e0aafab4c02c', '2025-05-21 23:12:28', 0, NULL, '2025-05-31 16:12:28', '2025-05-31 16:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `is_demo` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `category`, `image`, `description`, `location`, `penyelenggara`, `contact_person`, `contact_person_number`, `date_time`, `is_demo`, `user_id`, `created_at`, `updated_at`) VALUES
('0bc3a179-eb96-406c-9762-6c7095c3f64a', 'Green Talk: Energi Terbarukan di Rumah', 'Talk Show', 'greentalk.png', 'Diskusi bersama pakar tentang energi terbarukan dan panel surya.', 'Online (Zoom)', 'LangkahHijau', 'Nanda M.', '081234111222', '2025-06-01 19:00:00', 1, NULL, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
('96ab3714-031e-4d56-ba2e-628831d98b9b', 'Workshop Urban Farming untuk Pemula', 'Seminar', 'urbanfarming.png', 'Belajar teknik bertani di lahan sempit untuk hidup lebih hijau di kota.', 'Ruang Hijau, Surabaya', 'LangkahHijau', 'Rina W.', '081234567890', '2025-06-04 10:00:00', 1, NULL, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
('a5486b35-3bec-4d41-8684-d8f7cb424980', 'Sosialisasi Gaya Hidup Minim Sampah', 'Seminar', 'seminar.png', 'Cara-cara mudah memulai gaya hidup minim sampah dari rumah.', 'Balai RW 05, Sidoarjo', 'LangkahHijau', 'Lilis A.', '083888444555', '2025-06-02 16:00:00', 1, NULL, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
('c03e6adf-5b52-426a-9f1d-6314e30d7ecc', 'Aksi Bersih Sungai Brantas', 'Gotong Royong', 'aksisungai.png', 'Bersama menjaga sungai dengan kegiatan bersih-bersih komunitas.', 'Tepi Sungai Brantas, Sidoarjo', 'LangkahHijau', 'Ari P.', '082112345678', '2025-06-03 08:00:00', 1, NULL, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
('d49f6ad8-fd29-441b-adcb-9855bec5e828', 'Pameran Produk Daur Ulang Lokal', 'Pameran', 'pameran.png', 'Pameran kreatifitas masyarakat lokal dalam mendaur ulang barang bekas.', 'Gedung Kesenian Sidoarjo', 'LangkahHijau', 'Eka S.', '087777000123', '2025-06-02 09:00:00', 1, NULL, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
('e8d050f0-8543-492e-ad36-c68a60124311', 'Volunteering: Menanam 1000 Pohon', 'Volunteer', 'treeplanting.png', 'Bergabung menanam pohon bersama komunitas peduli lingkungan.', 'Hutan Kota Sidoarjo', 'LangkahHijau', 'Dimas T.', '085611119999', '2025-06-01 07:00:00', 1, NULL, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
('f593a215-89f8-4913-8775-ccc2396a1361', 'Eco Picnic & Edukasi Sampah Organik', 'Kolaborasi', 'picnic.png', 'Bersantai sambil belajar pemanfaatan sampah organik di alam terbuka.', 'Taman Hijau Kota', 'LangkahHijau', 'Rafi D.', '081999222111', '2025-06-01 14:00:00', 1, NULL, '2025-05-31 16:12:28', '2025-05-31 16:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0000_05_28_212705_create_tiers_table', 1),
(2, '0000_05_30_133543_create_badges_table', 1),
(3, '0001_01_01_000000_create_users_table', 1),
(4, '0001_01_01_000001_create_cache_table', 1),
(5, '0001_01_01_000002_create_jobs_table', 1),
(6, '2025_05_23_055246_create_posts_table', 1),
(7, '2025_05_26_073314_create_quizzes_table', 1),
(8, '2025_05_26_073336_create_questions_table', 1),
(9, '2025_05_26_073346_create_options_table', 1),
(10, '2025_05_26_073355_create_user_answers_table', 1),
(11, '2025_05_27_101042_create_events_table', 1),
(12, '2025_05_27_232254_ajuan_events', 1),
(13, '2025_05_30_111111_create_challenges_table', 1),
(14, '2025_05_30_133641_create_challenge_actions_table', 1),
(15, '2025_05_30_135619_create_challenge_participations_table', 1),
(16, '2025_05_30_135802_create_challenge_daily_actions_table', 1),
(17, '2025_05_30_153743_create_user_badge_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `option_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option_text`, `points`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jalan kaki, bersepeda, atau naik angkutan umum.', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(2, 1, 'Menggunakan sepeda motor pribadi.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(3, 1, 'Mengendarai mobil pribadi.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(4, 2, 'Selalu, sudah jadi kebiasaan.', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(5, 2, 'Kadang-kadang, jika ingat.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(6, 2, 'Tidak pernah, selalu pakai kantong dari toko.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(7, 3, 'Memilah sampah untuk didaur ulang (plastik, kertas, organik).', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(8, 3, 'Buang campur, tapi berusaha mengurangi volume sampah.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(9, 3, 'Membuang semua sampah jadi satu.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(10, 4, 'Selalu bawa botol minum isi ulang, jarang beli air kemasan.', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(11, 4, 'Kadang beli air minum botol plastik, kadang bawa botol isi ulang.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(12, 4, 'Hampir setiap hari membeli air minum dalam botol plastik.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(13, 5, 'Selalu, sudah jadi kebiasaan otomatis.', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(14, 5, 'Kadang-kadang, jika teringat.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(15, 5, 'Jarang terpikirkan untuk melakukannya.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(16, 6, 'Jarang (maksimal 1x seminggu atau kurang).', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(17, 6, 'Sedang (sekitar 2-3x seminggu).', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(18, 6, 'Sering (hampir setiap hari).', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(19, 7, 'Memprioritaskan produk lokal dan ramah lingkungan.', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(20, 7, 'Mengutamakan harga, lalu kualitas.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(21, 7, 'Tidak terlalu memikirkannya, yang penting cocok.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(22, 8, 'Donasi atau mencari cara untuk mendaur ulang.', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(23, 8, 'Menyimpan di lemari, siapa tahu nanti terpakai lagi.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(24, 8, 'Membuang ke tempat sampah.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(25, 9, 'Aktif mengikuti dan menerapkan dalam kehidupan sehari-hari.', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(26, 9, 'Pernah dengar atau tahu sedikit, tapi belum aktif menerapkan.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(27, 9, 'Tidak tahu sama sekali.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(28, 10, 'Jarang atau tidak pernah.', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(29, 10, 'Kadang-kadang.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(30, 10, 'Sering.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(31, 11, 'Daya tahan produk dan kemudahan perbaikan (agar tidak cepat ganti).', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(32, 11, 'Harga dan fitur terbaru yang ditawarkan.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(33, 11, 'Merek populer dan tren terkini.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(34, 12, 'Menjemur di bawah sinar matahari/angin (alami).', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(35, 12, 'Tergantung cuaca, kadang menjemur, kadang pakai pengering mesin.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(36, 12, 'Selalu menggunakan mesin pengering pakaian. (1 poin)', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(37, 13, 'Melaporkan kepada pihak berwenang atau mencoba memperbaikinya jika aman.', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(38, 13, 'Berpikir untuk melaporkan, tapi seringnya tidak jadi.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(39, 13, 'Tidak terlalu memperhatikannya.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(40, 14, 'Sangat jarang, lebih sering pakai lap kain atau handuk.', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(41, 14, 'Kadang-kadang, untuk kepraktisan.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(42, 14, 'Hampir selalu, untuk kebersihan dan kemudahan.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(43, 15, 'Mengumpulkan untuk didaur ulang atau diserahkan ke pengumpul khusus.', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(44, 15, 'Membuang ke tempat sampah setelah didinginkan dan dipadatkan.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(45, 15, 'Langsung membuangnya ke saluran air/wastafel.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(46, 16, 'Memilih penginapan yang memiliki sertifikasi ramah lingkungan atau praktik berkelanjutan.', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(47, 16, 'Mencari yang sesuai anggaran dan lokasi strategis.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(48, 16, 'Tidak ada preferensi khusus, yang penting nyaman.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(49, 17, 'Sering, selalu ingin tahu perkembangan terbaru dan cara berkontribusi.', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(50, 17, 'Kadang-kadang, jika ada berita menarik atau rekomendasi.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(51, 17, 'Jarang atau tidak pernah.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(52, 18, 'Ya, saya berusaha keras untuk mendukung mereka.', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(53, 18, 'Jika harganya terjangkau dan mudah diakses.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(54, 18, 'Tidak, saya fokus pada harga dan kualitas produk itu sendiri.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(55, 19, 'Berusaha keras menghindari dan mencari alternatif bebas kemasan.', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(56, 19, 'Mengurangi penggunaannya, tapi kadang masih membeli karena praktis.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(57, 19, 'Tidak terlalu memikirkannya, yang penting praktis dan mudah didapat.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(58, 20, 'Ya, saya sering berbagi tips dan mendorong mereka.', 3, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(59, 20, 'Kadang-kadang, jika ada kesempatan atau topik pembicaraan.', 2, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(60, 20, 'Tidak, itu pilihan pribadi masing-masing.', 1, '2025-05-31 16:12:28', '2025-05-31 16:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_demo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `category`, `image`, `body`, `is_demo`, `created_at`, `updated_at`) VALUES
('1edc1aa8-2f1e-4b0e-8bfe-db2298811a68', 'Transportasi Ramah Lingkungan, Pilihan Sehat dan Cerdas', '🚶 Transportasi Hijau', 'transportasi.png', '<h3>Kendaraan bermotor menyumbang emisi terbesar di kota-kota. Gunakan:</h3><p><br></p><p>- Sepeda untuk jarak dekat (juga olahraga!)</p><p>- Transportasi umum untuk efisiensi</p><p>- Jalan kaki = hemat + sehat</p><p><br></p><p><strong>Fun Fact:</strong></p><p>Berjalan 30 menit sehari bisa membakar ±150 kalori dan mengurangi jejak karbon harianmu.”</p>', 1, '2025-05-31 16:12:27', '2025-05-31 16:12:27'),
('59c01ad4-1a55-40ae-ae07-bbce7819639f', '5 Cara Mudah Memulai Gaya Hidup Zero Waste', '🌱 Zero Waste', 'zerowaste.png', '<p>Gaya hidup zero waste bukan berarti hidup tanpa sampah sama sekali, tapi mengurangi semaksimal mungkin. Mulailah dengan:</p><p><br></p><p>1. Membawa tas belanja sendiri.</p><p>2. Menggunakan botol minum dan tempat makan reusable.</p><p>3. Menghindari produk sekali pakai.</p><p>4. Membeli produk tanpa kemasan berlebih.</p><p>5. Daur ulang dan kompos sisa makanan.</p><p><br></p><p><strong>Tips Praktis:</strong></p><p>“Mulai dari satu kebiasaan, lalu tambah perlahan. Konsisten lebih penting daripada sempurna!”</p>', 1, '2025-05-31 16:12:27', '2025-05-31 16:12:27'),
('644ca04e-7bce-496a-917f-ef464f8ba330', 'Mengapa Konsumsi Daging Berlebihan Berdampak Buruk untuk Bumi?', '🛍️ Konsumsi Berkelanjutan', 'daging.png', '<p>Produksi daging (terutama sapi) menghasilkan gas rumah kaca seperti metana. Juga memerlukan banyak air dan lahan. Mengurangi konsumsi daging:</p><p><br></p><p>- Mengurangi emisi karbon.</p><p>- Menyehatkan tubuh.</p><p>- Mendukung keberlanjutan bumi.</p><p><br></p><p><strong>Aksi Kecil:</strong></p><p>Coba tantangan “Meatless Monday”! 1 hari tanpa daging = pengurangan emisi sekitar 2 kg CO₂.</p>', 1, '2025-05-31 16:12:27', '2025-05-31 16:12:27'),
('702e402a-b539-49ad-b087-3460630cca44', 'Apa Itu Fast Fashion dan Mengapa Kita Harus Peduli?', '🛍️ Konsumsi Berkelanjutan', 'fashion.png', '<p>Fast fashion = tren pakaian cepat, murah, tapi berumur pendek. </p><p><strong><em>Dampaknya</em></strong>:</p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Limbah tekstil menumpuk</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Banyak pakaian berakhir di TPA</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Eksploitasi tenaga kerja</li></ol><p><br></p><p><strong>Solusi Ringan:</strong></p><p>Pilih thrifting, tukar pakaian dengan teman, atau beli dari brand berkelanjutan.</p>', 1, '2025-05-31 16:12:27', '2025-05-31 16:12:27'),
('cbe0a4c6-5bb0-4801-94df-1be2f519e3f2', 'Kompos di Rumah, Cara Sederhana Kurangi Sampah Organik', '🌱 Zero Waste', 'kompos.png', '<p>Sampah dapur seperti kulit buah, sayur layu, atau ampas kopi bisa dikompos. Caranya mudah:</p><p><br></p><p>- Gunakan ember kompos tertutup</p><p>- Campur bahan basah dan kering (ranting/kertas)</p><p>- Aduk dan biarkan selama 2–4 minggu</p><p><br></p><p><strong>Manfaat:</strong></p><p>Mengurangi sampah ke TPA dan menghasilkan pupuk alami untuk tanaman.</p>', 1, '2025-05-31 16:12:27', '2025-05-31 16:12:27'),
('e83821a5-89e1-4601-85f8-a2a727d3eeca', 'Tips Belanja Ramah Lingkungan di Supermarket', '🛍️ Konsumsi Berkelanjutan', 'supermarket.png', '<p>1. Bawa tas kain sendiri</p><p>2. Hindari produk dengan banyak plastik</p><p>3. Pilih produk lokal &amp; musiman</p><p>4. Beli dalam jumlah seperlunya (hindari food waste)</p><p><br></p><p><strong>Bonus:</strong></p><p>Gunakan daftar belanja agar tidak impulsif — itu juga bagian dari konsumsi berkelanjutan.</p>', 1, '2025-05-31 16:12:27', '2025-05-31 16:12:27'),
('ea444c36-6ba9-4dc7-a339-9cc085e7a805', 'Air Lebih Berharga dari yang Kamu Kira – Hemat Air Mulai Hari Ini', '🔌 Energi dan Elektronik', 'water.png', '<h3>Air bersih makin langka di banyak daerah, dan penggunaannya sering kita anggap remeh. </h3><p><br></p><p><strong>Padahal:</strong></p><p>- Mandi 10 menit = 100 liter air.</p><p>- Sikat gigi dengan keran menyala = 6 liter air terbuang.</p><p>    - 1 kg daging = 15.000 liter air dalam produksinya.</p><p><br></p><p><strong>Langkah Hemat Air:</strong></p><p>    - Gunakan shower hemat air.</p><p>- Matikan keran saat tidak digunakan.</p><p>- Gunakan air bekas cucian sayur untuk siram tanaman.</p><p><br></p><p><strong>Ingat !</strong></p><p>Hemat air hari ini = air bersih untuk generasi berikutnya.</p>', 1, '2025-05-31 16:12:27', '2025-05-31 16:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint UNSIGNED NOT NULL,
  `quiz_id` bigint UNSIGNED NOT NULL,
  `question_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question_text`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bagaimana kamu paling sering bepergian ke tempat kerja, kampus, atau sekolah?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(2, 1, 'Saat berbelanja kebutuhan sehari-hari, seberapa sering kamu membawa tas belanja sendiri dari rumah?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(3, 1, 'Di rumah, bagaimana caramu mengelola sampah yang kamu hasilkan?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(4, 1, 'Untuk minum di luar rumah, apa pilihan utamamu?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(5, 1, 'Apakah kamu rutin mematikan lampu dan mencabut peralatan elektronik saat tidak digunakan?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(6, 1, 'Seberapa sering kamu mengonsumsi daging merah (sapi atau kambing) dalam seminggu?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(7, 1, 'Saat memilih produk di toko, apa yang jadi pertimbangan utamamu?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(8, 1, 'Apa yang kamu lakukan dengan pakaian lama atau tidak terpakai yang masih layak?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(9, 1, 'Seberapa paham atau terlibat kamu dengan gerakan zero waste atau gaya hidup hijau?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(10, 1, 'Seberapa sering kamu membeli makanan berlebih yang akhirnya tidak habis dan terbuang?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(11, 2, 'Saat membeli perangkat elektronik baru (misal: smartphone, laptop), apa yang menjadi pertimbangan utama bagimu?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(12, 2, 'Bagaimana kamu mengeringkan pakaian setelah dicuci?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(13, 2, 'Ketika kamu melihat keran air bocor atau listrik menyala tanpa guna di tempat umum, apa yang kamu lakukan?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(14, 2, 'Seberapa sering kamu menggunakan tisu dapur atau tisu toilet yang sekali pakai?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(15, 2, 'Bagaimana caramu membuang limbah minyak goreng bekas di rumah?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(16, 2, 'Saat liburan atau bepergian, apa yang menjadi prioritasmu terkait akomodasi?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(17, 2, 'Seberapa sering kamu membaca atau mencari informasi tentang isu lingkungan dan keberlanjutan?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(18, 2, 'Apakah kamu mendukung merek atau perusahaan yang berkomitmen pada praktik etis dan ramah lingkungan?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(19, 2, 'Bagaimana pendapatmu tentang penggunaan produk kemasan sekali pakai (misal: bungkus makanan, botol minuman kemasan, sachet)?', '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(20, 2, 'Apakah kamu aktif mengajak teman atau keluarga untuk menerapkan gaya hidup yang lebih ramah lingkungan?', '2025-05-31 16:12:28', '2025-05-31 16:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `duration_minutes` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `description`, `duration_minutes`, `created_at`, `updated_at`) VALUES
(1, 'Kuis: Seberapa Hijau Jiwamu? Mari Kenali Eco-Persona-mu!', 'Penasaran seberapa jauh gaya hidupmu selaras dengan alam? Ikuti kuis singkat ini dan temukan eco-persona unikmu!', 5, '2025-05-31 16:12:28', '2025-05-31 16:12:28'),
(2, 'Kuis: Jejak Lingkunganku - Sejauh Mana Kamu Berkontribusi?', 'Mari selami lebih dalam kebiasaanmu dan pahami dampak lingkungan dari setiap pilihan yang kamu ambil.', 6, '2025-05-31 16:12:28', '2025-05-31 16:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tiers`
--

CREATE TABLE `tiers` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_points` int NOT NULL,
  `max_points` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tiers`
--

INSERT INTO `tiers` (`id`, `icon`, `urutan`, `name`, `keterangan`, `color`, `min_points`, `max_points`, `created_at`, `updated_at`) VALUES
('1263ff5b-bc6b-4940-95a9-f62258a52a67', '🌿', 2, 'Aktivis Hijau Muda', 'Mulai konsisten', 'lime-300', 351, 500, '2025-05-31 16:12:24', '2025-05-31 16:12:24'),
('2f2851f5-2709-4e20-84e0-e6f3671ff89b', '🌎', 4, 'Duta Hijau Digital', 'Level tertinggi, dapat ditampilkan publik', 'blue-500', 751, 1000, '2025-05-31 16:12:24', '2025-05-31 16:12:24'),
('2fb6530b-6d03-4e3e-bc8c-8ecce4396884', '🌱', 1, 'Eco Beginner', 'Baru memulai perjalanan hijau', 'yellow-500', 0, 350, '2025-05-31 16:12:24', '2025-05-31 16:12:24'),
('d422e5a2-30ed-4f6b-8ec3-7450a617ecc8', '🍀', 3, 'Inspirator Hijau', 'Sudah bisa jadi panutan', 'green-500', 501, 750, '2025-05-31 16:12:24', '2025-05-31 16:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `green_points` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tier_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `is_admin`, `password`, `green_points`, `created_at`, `updated_at`, `tier_id`) VALUES
(1, 'Super Admin', 'admin123@gmail.com', 'superadmin', 1, '$2y$12$DU5ixqZRrq3rNa8F9830WOHVN.jDTPDQvjtSRKgHZIVobgFkeZL0a', 0, '2025-05-31 16:12:24', '2025-05-31 16:12:24', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(2, 'Naufal Harits', 'naufal@gmail.com', 'naufalharits', 0, '$2y$12$K/hyQxJkEnNCHMZjJ3eo..oNiYnuXNzhjyKpkzHD9YBRIgPPAfvP2', 400, '2025-05-31 16:12:25', '2025-05-31 16:12:25', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(3, 'Andi Budiman', 'andi@example.com', 'andibudiman', 0, '$2y$12$yMfqzAWo7XsTv0QbBJ8YeOTcBNDxwVbvBG/HLhy/uY3Yy1k/QPgzS', 305, '2025-05-31 16:12:26', '2025-05-31 16:12:26', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(4, 'Citra Lestari', 'citra@example.com', 'citralestari', 0, '$2y$12$7Crc0Zqd9b5D3nYHsoeJXueksZxUj1F51jSduMA0GjrwOcwEhrqI2', 250, '2025-05-31 16:12:26', '2025-05-31 16:12:26', 'd422e5a2-30ed-4f6b-8ec3-7450a617ecc8'),
(5, 'Bayu Perkasa', 'bayu@example.com', 'bayuperkasa', 0, '$2y$12$qXh6K2lPOOjHy/r06F6XpeKn8RpMb3Q4tEKuyELukcuBF7nYEOboi', 100, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(6, 'Sadina Yessi Wijayanti S.Pt', 'narji33@example.org', 'ismail92', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 289, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(7, 'Cahya Prasetyo', 'warsita.lestari@example.net', 'vanesa.yuliarti', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 695, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(8, 'Purwadi Maheswara M.Kom.', 'dsamosir@example.com', 'ratna.suryatmi', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 945, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(9, 'Kurnia Halim', 'hasna66@example.org', 'prastuti.umi', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 787, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(10, 'Titi Rahayu', 'pputra@example.org', 'andriani.bagus', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 747, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(11, 'Elisa Qori Mulyani', 'gfarida@example.com', 'ulya.yolanda', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 302, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(12, 'Kenzie Prasasta', 'winda.mangunsong@example.org', 'yuniar.cornelia', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 808, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(13, 'Padma Novitasari S.Farm', 'eli57@example.net', 'salahudin.zulaikha', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 166, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(14, 'Farah Astuti M.Ak', 'keisha.putra@example.com', 'joko.wasita', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 642, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(15, 'Cinta Hartati', 'citra.maryati@example.com', 'samsul62', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 941, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(16, 'Tiara Yuniar', 'puspita.ismail@example.net', 'utami.kala', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 643, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(17, 'Bakidin Samosir S.E.I', 'jindra70@example.org', 'trahimah', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 988, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(18, 'Yance Sudiati', 'harjo.wastuti@example.com', 'kania39', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 393, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(19, 'Aris Prasasta', 'adika.suwarno@example.net', 'bagus.hutapea', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 957, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(20, 'Luwes Wibisono', 'baktiadi.gunarto@example.com', 'vutama', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 989, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2fb6530b-6d03-4e3e-bc8c-8ecce4396884'),
(21, 'Vega Putra', 'hassanah.bala@example.org', 'rina02', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 180, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(22, 'Bakti Napitupulu', 'mwasita@example.com', 'firmansyah.galur', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 100, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(23, 'Julia Puspasari M.M.', 'sjanuar@example.org', 'hartaka66', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 670, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(24, 'Titi Mandasari', 'nrajasa@example.org', 'mustika.kuswandari', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 387, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(25, 'Icha Anggraini', 'wkusumo@example.net', 'umi.andriani', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 129, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(26, 'Rahmat Pradipta M.Kom.', 'nashiruddin.kamila@example.org', 'xhidayanto', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 560, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(27, 'Kanda Sitompul', 'jagapati.hassanah@example.com', 'narji.mandala', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 484, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(28, 'Sadina Kusmawati', 'tbudiyanto@example.net', 'hasanah.malika', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 536, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(29, 'Michelle Maryati', 'diana.hassanah@example.com', 'vbudiyanto', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 994, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(30, 'Lili Rahimah M.Ak', 'cakrabirawa03@example.org', 'kezia66', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 767, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(31, 'Zulfa Mala Oktaviani', 'prayoga04@example.org', 'hardana.namaga', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 420, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(32, 'Ratih Dian Widiastuti', 'eusamah@example.org', 'yance.susanti', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 461, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(33, 'Panji Daru Nashiruddin', 'wacana.capa@example.org', 'zamira32', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 228, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(34, 'Ellis Laksita', 'ophelia05@example.org', 'malika.natsir', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 151, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(35, 'Reza Pranowo', 'saputra.syahrini@example.net', 'raharja.suryatmi', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 160, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '1263ff5b-bc6b-4940-95a9-f62258a52a67'),
(36, 'Ana Utami S.H.', 'dian94@example.com', 'ajimin54', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 558, '2025-05-31 16:12:27', '2025-05-31 16:12:27', 'd422e5a2-30ed-4f6b-8ec3-7450a617ecc8'),
(37, 'Dinda Sudiati', 'kdabukke@example.com', 'sari36', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 357, '2025-05-31 16:12:27', '2025-05-31 16:12:27', 'd422e5a2-30ed-4f6b-8ec3-7450a617ecc8'),
(38, 'Cici Purnawati S.Sos', 'saka.pratiwi@example.net', 'nashiruddin.nilam', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 570, '2025-05-31 16:12:27', '2025-05-31 16:12:27', 'd422e5a2-30ed-4f6b-8ec3-7450a617ecc8'),
(39, 'Opung Ibrahim Latupono', 'nwinarsih@example.org', 'bhardiansyah', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 481, '2025-05-31 16:12:27', '2025-05-31 16:12:27', 'd422e5a2-30ed-4f6b-8ec3-7450a617ecc8'),
(40, 'Gawati Hafshah Purnawati', 'raisa.mandasari@example.net', 'utama.ellis', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 580, '2025-05-31 16:12:27', '2025-05-31 16:12:27', 'd422e5a2-30ed-4f6b-8ec3-7450a617ecc8'),
(41, 'Indah Fujiati', 'vgunawan@example.net', 'hidayanto.faizah', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 433, '2025-05-31 16:12:27', '2025-05-31 16:12:27', 'd422e5a2-30ed-4f6b-8ec3-7450a617ecc8'),
(42, 'Padma Wulandari S.Kom', 'amelani@example.com', 'malika77', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 751, '2025-05-31 16:12:27', '2025-05-31 16:12:27', 'd422e5a2-30ed-4f6b-8ec3-7450a617ecc8'),
(43, 'Gawati Mandasari S.Sos', 'jyulianti@example.com', 'umar.maheswara', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 337, '2025-05-31 16:12:27', '2025-05-31 16:12:27', 'd422e5a2-30ed-4f6b-8ec3-7450a617ecc8'),
(44, 'Azalea Wahyuni', 'puspita.diah@example.net', 'martani78', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 503, '2025-05-31 16:12:27', '2025-05-31 16:12:27', 'd422e5a2-30ed-4f6b-8ec3-7450a617ecc8'),
(45, 'Olivia Pratiwi', 'dadi.hassanah@example.org', 'harto.prayoga', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 172, '2025-05-31 16:12:27', '2025-05-31 16:12:27', 'd422e5a2-30ed-4f6b-8ec3-7450a617ecc8'),
(46, 'Almira Purnawati S.E.', 'hsiregar@example.net', 'ibun.sihotang', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 838, '2025-05-31 16:12:27', '2025-05-31 16:12:27', 'd422e5a2-30ed-4f6b-8ec3-7450a617ecc8'),
(47, 'Qori Sari Wahyuni S.Pt', 'xhabibi@example.net', 'jelita36', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 580, '2025-05-31 16:12:27', '2025-05-31 16:12:27', 'd422e5a2-30ed-4f6b-8ec3-7450a617ecc8'),
(48, 'Margana Permadi S.H.', 'zelaya.mandasari@example.org', 'respati.siregar', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 939, '2025-05-31 16:12:27', '2025-05-31 16:12:27', 'd422e5a2-30ed-4f6b-8ec3-7450a617ecc8'),
(49, 'Nova Suryatmi S.E.', 'kajen74@example.com', 'inuraini', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 670, '2025-05-31 16:12:27', '2025-05-31 16:12:27', 'd422e5a2-30ed-4f6b-8ec3-7450a617ecc8'),
(50, 'Yuliana Safitri', 'qsitumorang@example.com', 'fathonah24', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 116, '2025-05-31 16:12:27', '2025-05-31 16:12:27', 'd422e5a2-30ed-4f6b-8ec3-7450a617ecc8'),
(51, 'Ana Jasmin Hastuti', 'pratiwi.zelda@example.net', 'kusmawati.imam', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 625, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2f2851f5-2709-4e20-84e0-e6f3671ff89b'),
(52, 'Opan Tamba M.Farm', 'saiful07@example.net', 'labuh94', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 142, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2f2851f5-2709-4e20-84e0-e6f3671ff89b'),
(53, 'Rangga Kuswoyo', 'hasim.pertiwi@example.com', 'riyanti.salman', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 567, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2f2851f5-2709-4e20-84e0-e6f3671ff89b'),
(54, 'Kamila Hassanah M.Farm', 'jatmiko.prakasa@example.net', 'yzulaika', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 382, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2f2851f5-2709-4e20-84e0-e6f3671ff89b'),
(55, 'Nadine Umi Farida M.Kom.', 'haryanti.wadi@example.org', 'mulyanto.tampubolon', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 483, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2f2851f5-2709-4e20-84e0-e6f3671ff89b'),
(56, 'Tomi Anggriawan', 'nmahendra@example.net', 'yoga82', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 901, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2f2851f5-2709-4e20-84e0-e6f3671ff89b'),
(57, 'Cindy Ella Haryanti', 'dartono.habibi@example.org', 'gaman08', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 364, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2f2851f5-2709-4e20-84e0-e6f3671ff89b'),
(58, 'Raihan Opung Latupono M.Ak', 'fzulaika@example.org', 'thamrin.samiah', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 131, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2f2851f5-2709-4e20-84e0-e6f3671ff89b'),
(59, 'Ulya Nasyidah', 'bagya40@example.com', 'cahyo83', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 463, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2f2851f5-2709-4e20-84e0-e6f3671ff89b'),
(60, 'Nova Maryati', 'hmansur@example.net', 'atmaja26', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 366, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2f2851f5-2709-4e20-84e0-e6f3671ff89b'),
(61, 'Naradi Ikin Permadi S.Ked', 'wahyu74@example.com', 'eko91', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 281, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2f2851f5-2709-4e20-84e0-e6f3671ff89b'),
(62, 'Puji Aryani S.E.I', 'gandriani@example.org', 'jefri48', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 669, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2f2851f5-2709-4e20-84e0-e6f3671ff89b'),
(63, 'Ratna Nasyidah', 'hassanah.danu@example.com', 'mahesa83', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 212, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2f2851f5-2709-4e20-84e0-e6f3671ff89b'),
(64, 'Malika Fujiati S.Kom', 'vpratama@example.com', 'wsuartini', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 396, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2f2851f5-2709-4e20-84e0-e6f3671ff89b'),
(65, 'Lukita Opung Pangestu S.Psi', 'latupono.sabrina@example.org', 'suryatmi.farhunnisa', 0, '$2y$12$rVlUhpFOgosHdf5Tmvm4/eTpo/uCSPXhMUtYKBwsyJfFjc12L6Z4m', 232, '2025-05-31 16:12:27', '2025-05-31 16:12:27', '2f2851f5-2709-4e20-84e0-e6f3671ff89b');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `quiz_id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `selected_option_id` bigint UNSIGNED DEFAULT NULL,
  `answer_text` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_badge`
--

CREATE TABLE `user_badge` (
  `id` bigint UNSIGNED NOT NULL,
  `badge_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_badge`
--

INSERT INTO `user_badge` (`id`, `badge_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 4, 2, NULL, NULL),
(2, 5, 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajuan_events`
--
ALTER TABLE `ajuan_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ajuan_events_user_id_foreign` (`user_id`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenges_badge_id_foreign` (`badge_id`);

--
-- Indexes for table `challenge_actions`
--
ALTER TABLE `challenge_actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenge_actions_challenge_id_foreign` (`challenge_id`);

--
-- Indexes for table `challenge_daily_actions`
--
ALTER TABLE `challenge_daily_actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenge_daily_actions_challenge_participation_id_foreign` (`challenge_participation_id`);

--
-- Indexes for table `challenge_participations`
--
ALTER TABLE `challenge_participations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenge_participations_user_id_foreign` (`user_id`),
  ADD KEY `challenge_participations_challenge_id_foreign` (`challenge_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_question_id_foreign` (`question_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tiers`
--
ALTER TABLE `tiers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tiers_urutan_unique` (`urutan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_tier_id_foreign` (`tier_id`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_answers_user_id_foreign` (`user_id`),
  ADD KEY `user_answers_quiz_id_foreign` (`quiz_id`),
  ADD KEY `user_answers_question_id_foreign` (`question_id`),
  ADD KEY `user_answers_selected_option_id_foreign` (`selected_option_id`);

--
-- Indexes for table `user_badge`
--
ALTER TABLE `user_badge`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_badge_badge_id_user_id_unique` (`badge_id`,`user_id`),
  ADD KEY `user_badge_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `challenge_actions`
--
ALTER TABLE `challenge_actions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `challenge_daily_actions`
--
ALTER TABLE `challenge_daily_actions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_badge`
--
ALTER TABLE `user_badge`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ajuan_events`
--
ALTER TABLE `ajuan_events`
  ADD CONSTRAINT `ajuan_events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `challenges`
--
ALTER TABLE `challenges`
  ADD CONSTRAINT `challenges_badge_id_foreign` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `challenge_actions`
--
ALTER TABLE `challenge_actions`
  ADD CONSTRAINT `challenge_actions_challenge_id_foreign` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `challenge_daily_actions`
--
ALTER TABLE `challenge_daily_actions`
  ADD CONSTRAINT `challenge_daily_actions_challenge_participation_id_foreign` FOREIGN KEY (`challenge_participation_id`) REFERENCES `challenge_participations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `challenge_participations`
--
ALTER TABLE `challenge_participations`
  ADD CONSTRAINT `challenge_participations_challenge_id_foreign` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `challenge_participations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_tier_id_foreign` FOREIGN KEY (`tier_id`) REFERENCES `tiers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `user_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_answers_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_answers_selected_option_id_foreign` FOREIGN KEY (`selected_option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_badge`
--
ALTER TABLE `user_badge`
  ADD CONSTRAINT `user_badge_badge_id_foreign` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_badge_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
