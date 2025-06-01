-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2025 at 03:13 PM
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
('5bc3367f-185b-4d7e-a80e-e67c6bb5796f', 'Eco Bazaar & Tukar Barang Bekas', 'Pameran', 'eco-bazaar.png', 'Bazaar ramah lingkungan dengan area tukar-menukar barang bekas layak pakai.', 'Alun-alun Sidoarjo', 'LangkahHijau', 'Budi R.', '085755332211', '2025-06-05 10:00:00', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
('d3665591-ff8f-4c61-8488-38cf0905eea2', 'LangkahHijau Goes to School', 'Kolaborasi', 'schoolprogram.png', 'Belajar teknik bertani di lahan sempit untuk hidup lebih hijau di kota.', 'SD Negeri 1 Sidoarjo', 'LangkahHijau', 'Siti M.', '081334455667', '2025-06-05 10:00:00', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29');

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
(1, '♻️', 'Pejuang Anti Plastik', '2025-06-01 15:03:24', '2025-06-01 15:03:24'),
(2, '🚴', 'Komuter Hijau', '2025-06-01 15:03:24', '2025-06-01 15:03:24'),
(3, '🌱', 'Eksplorer Nabati', '2025-06-01 15:03:24', '2025-06-01 15:03:24'),
(4, '💎', 'Sustainability Hero', '2025-06-01 15:03:24', '2025-06-01 15:03:24'),
(5, '🥦', 'Green Contributor', '2025-06-01 15:03:24', '2025-06-01 15:03:24');

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
('13a2333b-fbb6-475b-b17b-ea0a65eddc65', '7 Hari Tanpa Plastik Sekali Pakai', 'Selama seminggu, hindari penggunaan plastik sekali pakai seperti kantong kresek, sedotan, botol air, dan kemasan makanan/minuman.', 'haritanpaplastik.png', 7, 400, 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
('3f84d88a-a6b6-43a3-b1b0-ee2e28547e88', '3 Hari Makan Nabati', 'Selama 3 hari penuh, konsumsi makanan nabati (vegetarian/plant-based), hindari daging dan produk hewani.', 'harimakannabati.png', 3, 150, 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
('a902d177-1d6e-4518-b9d0-8c7597b65307', '5 Hari Transportasi Ramah Lingkungan', 'Gunakan transportasi minim emisi: jalan kaki, sepeda, atau transportasi umum selama 5 hari berturut-turut.', 'haritransportasi.png', 5, 250, 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29');

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
(1, 'Gunakan tas belanja kain setiap kali berbelanja.', '13a2333b-fbb6-475b-b17b-ea0a65eddc65', '2025-06-01 15:03:29', NULL),
(2, 'Bawa dan gunakan botol minum pribadi.', '13a2333b-fbb6-475b-b17b-ea0a65eddc65', '2025-06-01 15:03:29', NULL),
(3, 'Hindari membeli makanan atau minuman dalam kemasan plastik sekali pakai.', '13a2333b-fbb6-475b-b17b-ea0a65eddc65', '2025-06-01 15:03:29', NULL),
(4, 'Tolak sedotan plastik, atau gunakan alternatif reusable jika perlu.', '13a2333b-fbb6-475b-b17b-ea0a65eddc65', '2025-06-01 15:03:29', NULL),
(5, 'Pilih produk dengan kemasan minimal atau tanpa kemasan plastik.', '13a2333b-fbb6-475b-b17b-ea0a65eddc65', '2025-06-01 15:03:29', NULL),
(6, 'Jalan Kaki atau Bersepeda untuk Jarak Dekat.', 'a902d177-1d6e-4518-b9d0-8c7597b65307', '2025-06-01 15:03:29', NULL),
(7, 'Manfaatkan Transportasi Umum.', 'a902d177-1d6e-4518-b9d0-8c7597b65307', '2025-06-01 15:03:29', NULL),
(8, 'Coba Carpooling atau Berbagi Tumpangan.', 'a902d177-1d6e-4518-b9d0-8c7597b65307', '2025-06-01 15:03:29', NULL),
(9, 'Rencanakan Perjalanan Efisien Jika Harus Berkendara.', 'a902d177-1d6e-4518-b9d0-8c7597b65307', '2025-06-01 15:03:29', NULL),
(10, 'Satu Hari Bebas Emisi Kendaraan Pribadi.', 'a902d177-1d6e-4518-b9d0-8c7597b65307', '2025-06-01 15:03:29', NULL),
(11, 'Eksplorasi Sarapan dan Makan Siang Nabati.', '3f84d88a-a6b6-43a3-b1b0-ee2e28547e88', '2025-06-01 15:03:29', NULL),
(12, 'Fokus pada Variasi Protein Nabati untuk Makan Malam.', '3f84d88a-a6b6-43a3-b1b0-ee2e28547e88', '2025-06-01 15:03:29', NULL),
(13, 'Nikmati Camilan dan Makanan Penutup Nabati.', '3f84d88a-a6b6-43a3-b1b0-ee2e28547e88', '2025-06-01 15:03:29', NULL),
(14, 'Perhatikan Label & Hindari Produk Hewani Tersembunyi.', '3f84d88a-a6b6-43a3-b1b0-ee2e28547e88', '2025-06-01 15:03:29', NULL),
(15, 'Jaga Hidrasi dan Perbanyak Serat.', '3f84d88a-a6b6-43a3-b1b0-ee2e28547e88', '2025-06-01 15:03:29', NULL);

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
(1, '91e479bd-fe48-4225-a593-c6e2eaa38737', 'day1', '2025-05-26 00:00:00', 1, '2025-05-23 15:03:29', '2025-06-01 15:03:29'),
(2, '91e479bd-fe48-4225-a593-c6e2eaa38737', 'day2', '2025-05-27 00:00:00', 1, '2025-05-22 15:03:29', '2025-06-01 15:03:29'),
(3, '91e479bd-fe48-4225-a593-c6e2eaa38737', 'day3', '2025-05-28 00:00:00', 1, '2025-05-22 15:03:29', '2025-06-01 15:03:29'),
(4, '91e479bd-fe48-4225-a593-c6e2eaa38737', 'day4', '2025-05-29 00:00:00', 1, '2025-05-22 15:03:29', '2025-06-01 15:03:29'),
(5, '91e479bd-fe48-4225-a593-c6e2eaa38737', 'day5', '2025-05-30 00:00:00', 1, '2025-05-22 15:03:29', '2025-06-01 15:03:29'),
(6, '91e479bd-fe48-4225-a593-c6e2eaa38737', 'day6', '2025-05-31 00:00:00', 1, '2025-05-22 15:03:29', '2025-06-01 15:03:29');

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
('91e479bd-fe48-4225-a593-c6e2eaa38737', 2, '13a2333b-fbb6-475b-b17b-ea0a65eddc65', '2025-05-22 22:03:29', 0, NULL, '2025-06-01 15:03:29', '2025-06-01 15:03:29');

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
('2c80f580-d771-4793-961a-fa4542b3f6cc', 'Eco Picnic & Edukasi Sampah Organik', 'Kolaborasi', 'picnic.png', 'Bersantai sambil belajar pemanfaatan sampah organik di alam terbuka.', 'Taman Hijau Kota', 'LangkahHijau', 'Rafi D.', '081999222111', '2025-06-02 14:00:00', 1, NULL, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
('3828399b-b4f1-44af-83f1-5c30ce0f1562', 'Volunteering: Menanam 1000 Pohon', 'Volunteer', 'treeplanting.png', 'Bergabung menanam pohon bersama komunitas peduli lingkungan.', 'Hutan Kota Sidoarjo', 'LangkahHijau', 'Dimas T.', '085611119999', '2025-06-02 07:00:00', 1, NULL, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
('634befc9-1201-4376-8d45-575af85ba267', 'Pameran Produk Daur Ulang Lokal', 'Pameran', 'pameran.png', 'Pameran kreatifitas masyarakat lokal dalam mendaur ulang barang bekas.', 'Gedung Kesenian Sidoarjo', 'LangkahHijau', 'Eka S.', '087777000123', '2025-06-03 09:00:00', 1, NULL, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
('852744cf-5414-46f7-b23b-0abb68fe0cb6', 'Green Talk: Energi Terbarukan di Rumah', 'Talk Show', 'greentalk.png', 'Diskusi bersama pakar tentang energi terbarukan dan panel surya.', 'Online (Zoom)', 'LangkahHijau', 'Nanda M.', '081234111222', '2025-06-02 19:00:00', 1, NULL, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
('9c89f86c-8d40-4c75-8a3a-e7170926394e', 'Aksi Bersih Sungai Brantas', 'Gotong Royong', 'aksisungai.png', 'Bersama menjaga sungai dengan kegiatan bersih-bersih komunitas.', 'Tepi Sungai Brantas, Sidoarjo', 'LangkahHijau', 'Ari P.', '082112345678', '2025-06-04 08:00:00', 1, NULL, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
('bfea2882-c4c6-4cca-a6fb-de49f9764cc6', 'Workshop Urban Farming untuk Pemula', 'Seminar', 'urbanfarming.png', 'Belajar teknik bertani di lahan sempit untuk hidup lebih hijau di kota.', 'Ruang Hijau, Surabaya', 'LangkahHijau', 'Rina W.', '081234567890', '2025-06-05 10:00:00', 1, NULL, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
('d5b9a07d-ed8f-49e0-8353-475b4486faae', 'Sosialisasi Gaya Hidup Minim Sampah', 'Seminar', 'seminar.png', 'Cara-cara mudah memulai gaya hidup minim sampah dari rumah.', 'Balai RW 05, Sidoarjo', 'LangkahHijau', 'Lilis A.', '083888444555', '2025-06-03 16:00:00', 1, NULL, '2025-06-01 15:03:29', '2025-06-01 15:03:29');

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
(17, '2025_05_30_153743_create_user_badge_table', 1),
(18, '2025_06_01_034623_create_quiz_attempts_table', 1);

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
(1, 1, 'Jalan kaki, bersepeda, atau naik angkutan umum.', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(2, 1, 'Menggunakan sepeda motor pribadi.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(3, 1, 'Mengendarai mobil pribadi.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(4, 2, 'Selalu, sudah jadi kebiasaan.', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(5, 2, 'Kadang-kadang, jika ingat.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(6, 2, 'Tidak pernah, selalu pakai kantong dari toko.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(7, 3, 'Memilah sampah untuk didaur ulang (plastik, kertas, organik).', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(8, 3, 'Buang campur, tapi berusaha mengurangi volume sampah.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(9, 3, 'Membuang semua sampah jadi satu.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(10, 4, 'Selalu bawa botol minum isi ulang, jarang beli air kemasan.', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(11, 4, 'Kadang beli air minum botol plastik, kadang bawa botol isi ulang.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(12, 4, 'Hampir setiap hari membeli air minum dalam botol plastik.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(13, 5, 'Selalu, sudah jadi kebiasaan otomatis.', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(14, 5, 'Kadang-kadang, jika teringat.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(15, 5, 'Jarang terpikirkan untuk melakukannya.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(16, 6, 'Jarang (maksimal 1x seminggu atau kurang).', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(17, 6, 'Sedang (sekitar 2-3x seminggu).', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(18, 6, 'Sering (hampir setiap hari).', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(19, 7, 'Memprioritaskan produk lokal dan ramah lingkungan.', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(20, 7, 'Mengutamakan harga, lalu kualitas.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(21, 7, 'Tidak terlalu memikirkannya, yang penting cocok.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(22, 8, 'Donasi atau mencari cara untuk mendaur ulang.', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(23, 8, 'Menyimpan di lemari, siapa tahu nanti terpakai lagi.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(24, 8, 'Membuang ke tempat sampah.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(25, 9, 'Aktif mengikuti dan menerapkan dalam kehidupan sehari-hari.', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(26, 9, 'Pernah dengar atau tahu sedikit, tapi belum aktif menerapkan.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(27, 9, 'Tidak tahu sama sekali.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(28, 10, 'Jarang atau tidak pernah.', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(29, 10, 'Kadang-kadang.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(30, 10, 'Sering.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(31, 11, 'Daya tahan produk dan kemudahan perbaikan (agar tidak cepat ganti).', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(32, 11, 'Harga dan fitur terbaru yang ditawarkan.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(33, 11, 'Merek populer dan tren terkini.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(34, 12, 'Menjemur di bawah sinar matahari/angin (alami).', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(35, 12, 'Tergantung cuaca, kadang menjemur, kadang pakai pengering mesin.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(36, 12, 'Selalu menggunakan mesin pengering pakaian.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(37, 13, 'Melaporkan kepada pihak berwenang atau mencoba memperbaikinya jika aman.', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(38, 13, 'Berpikir untuk melaporkan, tapi seringnya tidak jadi.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(39, 13, 'Tidak terlalu memperhatikannya.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(40, 14, 'Sangat jarang, lebih sering pakai lap kain atau handuk.', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(41, 14, 'Kadang-kadang, untuk kepraktisan.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(42, 14, 'Hampir selalu, untuk kebersihan dan kemudahan.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(43, 15, 'Mengumpulkan untuk didaur ulang atau diserahkan ke pengumpul khusus.', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(44, 15, 'Membuang ke tempat sampah setelah didinginkan dan dipadatkan.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(45, 15, 'Langsung membuangnya ke saluran air/wastafel.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(46, 16, 'Memilih penginapan yang memiliki sertifikasi ramah lingkungan atau praktik berkelanjutan.', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(47, 16, 'Mencari yang sesuai anggaran dan lokasi strategis.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(48, 16, 'Tidak ada preferensi khusus, yang penting nyaman.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(49, 17, 'Sering, selalu ingin tahu perkembangan terbaru dan cara berkontribusi.', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(50, 17, 'Kadang-kadang, jika ada berita menarik atau rekomendasi.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(51, 17, 'Jarang atau tidak pernah.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(52, 18, 'Ya, saya berusaha keras untuk mendukung mereka.', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(53, 18, 'Jika harganya terjangkau dan mudah diakses.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(54, 18, 'Tidak, saya fokus pada harga dan kualitas produk itu sendiri.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(55, 19, 'Berusaha keras menghindari dan mencari alternatif bebas kemasan.', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(56, 19, 'Mengurangi penggunaannya, tapi kadang masih membeli karena praktis.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(57, 19, 'Tidak terlalu memikirkannya, yang penting praktis dan mudah didapat.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(58, 20, 'Ya, saya sering berbagi tips dan mendorong mereka.', 3, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(59, 20, 'Kadang-kadang, jika ada kesempatan atau topik pembicaraan.', 2, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(60, 20, 'Tidak, itu pilihan pribadi masing-masing.', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29');

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
('20e77419-d7d3-42a1-9d8b-bfcdb44de2e2', 'Kompos di Rumah, Cara Sederhana Kurangi Sampah Organik', '🌱 Zero Waste', 'kompos.png', '\n            <h2>Manfaat Kompos untuk Lingkungan dan Rumah Tangga</h2>\n            <p>Sampah organik seperti sisa makanan, kulit buah, dan daun kering bisa dijadikan kompos. Jika dibuang ke TPA, sampah ini menghasilkan gas metana — gas rumah kaca yang sangat kuat. Dengan kompos, kita mengubah limbah menjadi sumber daya.</p>\n\n            <h3>Cara Membuat Kompos di Rumah:</h3>\n            <ol>\n            <li><strong>Gunakan ember atau tong kompos:</strong> Sebaiknya tertutup agar tidak bau dan tahan hama.</li>\n            <li><strong>Campur bahan hijau dan coklat:</strong> Bahan hijau (kulit buah, sisa sayur) dan bahan coklat (daun kering, kertas robek) perlu seimbang.</li>\n            <li><strong>Aduk rutin:</strong> Setiap 3–5 hari agar oksigen menyebar dan proses berjalan cepat.</li>\n            <li><strong>Panen setelah 3–4 minggu:</strong> Kompos siap digunakan jika berwarna gelap, tidak bau, dan menggumpal seperti tanah subur.</li>\n            </ol>\n\n            <h3>Manfaat Langsung:</h3>\n            <ul>\n            <li>Mengurangi volume sampah rumah tangga hingga 40%</li>\n            <li>Menghasilkan pupuk gratis untuk tanaman</li>\n            <li>Mengurangi emisi gas rumah kaca dari TPA</li>\n            </ul>\n\n            <blockquote>\n            <em>\"Dengan kompos, kamu bukan membuang sampah, tapi memberi kembali ke bumi.\"</em>\n            </blockquote>\n            ', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
('2fc2d893-88d0-4d69-8de9-feb5a2db0729', 'Apa Itu Fast Fashion dan Mengapa Kita Harus Peduli?', '🛍️ Konsumsi Berkelanjutan', 'fashion.png', '\n            <h2>Memahami Fast Fashion</h2>\n            <p>Fast fashion merujuk pada industri pakaian yang memproduksi barang dengan cepat, murah, dan dalam jumlah besar untuk mengikuti tren. Meski terlihat menguntungkan konsumen, dampaknya sangat besar bagi lingkungan dan kemanusiaan.</p>\n\n            <h3>Dampak Lingkungan:</h3>\n            <ul>\n            <li>Limbah tekstil meningkat drastis – rata-rata seseorang membuang 30 kg pakaian per tahun.</li>\n            <li>Pakaian murah sering dibuat dari bahan sintetis yang sulit terurai dan melepaskan mikroplastik ke laut.</li>\n            <li>Produksi tekstil memerlukan air dan energi dalam jumlah besar.</li>\n            </ul>\n\n            <h3>Dampak Sosial:</h3>\n            <ul>\n            <li>Upah buruh rendah, kadang tidak manusiawi.</li>\n            <li>Jam kerja berlebihan dan kondisi kerja tidak layak.</li>\n            </ul>\n\n            <h3>Solusi Konsumen:</h3>\n            <ol>\n            <li><strong>Thrifting:</strong> Belanja di toko barang bekas adalah cara hemat dan ramah lingkungan.</li>\n            <li><strong>Tukar pakaian:</strong> Ajak teman atau komunitas untuk saling bertukar pakaian layak pakai.</li>\n            <li><strong>Beli dari brand berkelanjutan:</strong> Dukung merek lokal yang menggunakan bahan ramah lingkungan dan transparan soal produksi.</li>\n            </ol>\n\n            <blockquote>\n            <em>\"Pakaian terbaik bukan yang paling baru, tapi yang paling sering dipakai dan bertahan lama.\"</em>\n            </blockquote>\n            ', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
('4a9cff42-345c-496a-8cee-aa31a3306e0c', 'Mengapa Konsumsi Daging Berlebihan Berdampak Buruk untuk Bumi?', '🛍️ Konsumsi Berkelanjutan', 'daging.png', '\n            <h2>Dampak Konsumsi Daging terhadap Lingkungan</h2>\n            <p>Industri peternakan, khususnya sapi dan kambing, menyumbang emisi gas rumah kaca dalam jumlah besar, terutama metana (CH<sub>4</sub>) yang jauh lebih kuat dibanding CO<sub>2</sub>. Selain itu, dibutuhkan lahan luas dan air dalam jumlah besar untuk menghasilkan daging.</p>\n\n            <h3>Fakta Penting:</h3>\n            <ul>\n            <li>1 kg daging sapi = ±15.000 liter air</li>\n            <li>Industri peternakan menyumbang >14% emisi global</li>\n            <li>Hutan tropis banyak dibabat untuk padang penggembalaan</li>\n            </ul>\n\n            <h3>Kenapa Harus Mengurangi Konsumsi Daging?</h3>\n            <p>\n            Mengurangi konsumsi daging, terutama daging merah, adalah langkah efektif untuk menurunkan jejak karbon individu. Selain itu, pola makan berbasis nabati terbukti lebih sehat dan mendukung keberlanjutan pangan dunia.\n            </p>\n\n            <h3>Manfaat Langsung:</h3>\n            <ol>\n            <li><strong>Menurunkan emisi karbon pribadi</strong></li>\n            <li><strong>Menurunkan risiko penyakit jantung & kanker</strong></li>\n            <li><strong>Mendorong sistem pangan yang lebih adil dan efisien</strong></li>\n            </ol>\n\n            <h3>Aksi Kecil yang Berdampak Besar</h3>\n            <p>Coba mulai dengan <strong>“Meatless Monday”</strong>, yaitu tidak makan daging setiap hari Senin. Satu hari tanpa daging bisa mengurangi sekitar 2–3 kg emisi CO₂ per orang. Bayangkan jika dilakukan rutin oleh jutaan orang.</p>\n\n            <blockquote>\n            <em>\"Bumi tidak butuh 1000 orang sempurna, tapi jutaan orang yang melakukan perubahan kecil secara konsisten.\"</em>\n            </blockquote>\n            ', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
('95ef2e69-6d23-4804-8311-42b144672027', 'Transportasi Ramah Lingkungan, Pilihan Sehat dan Cerdas', '🚶 Transportasi Hijau', 'transportasi.png', '\n            <h2>Mengurangi Emisi dari Aktivitas Harian</h2>\n            <p>Transportasi menyumbang lebih dari 20% emisi karbon global, terutama di kota besar dengan banyak kendaraan pribadi. Padahal, banyak alternatif ramah lingkungan yang bisa kita pilih setiap hari.</p>\n\n            <h3>Pilihan Transportasi Ramah Lingkungan:</h3>\n            <ul>\n            <li><strong>Berjalan kaki:</strong> Efektif untuk jarak pendek, tidak menghasilkan emisi, sekaligus menyehatkan jantung.</li>\n            <li><strong>Bersepeda:</strong> Bebas polusi, hemat biaya, dan baik untuk kesehatan mental.</li>\n            <li><strong>Transportasi umum:</strong> Mengurangi kemacetan dan emisi, terutama jika sistemnya terintegrasi dengan baik.</li>\n            </ul>\n\n            <h3>Manfaat Lainnya:</h3>\n            <p>\n            Transportasi ramah lingkungan tidak hanya baik untuk bumi, tetapi juga dompet dan tubuh kita. Bersepeda 30 menit bisa membakar hingga 300 kalori. Sementara berjalan kaki 30 menit setara dengan 150 kalori terbakar.\n            </p>\n\n            <h3>Tips Memulai:</h3>\n            <ol>\n            <li>Rencanakan rute berjalan atau bersepeda ke tempat kerja/sekolah.</li>\n            <li>Gunakan transportasi publik di jam sibuk untuk menghindari stres berkendara.</li>\n            <li>Gabungkan moda transportasi, seperti naik angkutan umum lalu lanjut jalan kaki atau sepeda.</li>\n            </ol>\n\n            <blockquote>\n            <em>\"Jangan remehkan kekuatan langkah kecilmu — setiap langkah yang kamu pilih tanpa kendaraan, adalah langkah menuju udara yang lebih bersih.\"</em>\n            </blockquote>\n            ', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
('b12d4c95-f7b5-4c74-9d0d-1415dbb50c9c', 'Tips Belanja Ramah Lingkungan di Supermarket', '🛍️ Konsumsi Berkelanjutan', 'supermarket.png', '\n            <h2>Belanja Bijak = Bumi Sehat</h2>\n            <p>Supermarket seringkali penuh dengan produk berkemasan plastik, produk impor, dan makanan dalam jumlah berlebih. Tapi dengan strategi yang tepat, kamu bisa belanja lebih hijau dan hemat!</p>\n\n            <h3>Tips Praktis:</h3>\n            <ol>\n            <li><strong>Bawa tas belanja sendiri:</strong> Gunakan tas kain atau keranjang belanja untuk menghindari kantong plastik.</li>\n            <li><strong>Hindari produk dengan banyak plastik:</strong> Pilih produk dengan kemasan minimal atau bisa didaur ulang.</li>\n            <li><strong>Beli produk lokal dan musiman:</strong> Lebih segar, lebih murah, dan jejak karbonnya lebih kecil karena tidak perlu pengiriman jauh.</li>\n            <li><strong>Beli seperlunya:</strong> Hindari pemborosan makanan dengan hanya membeli sesuai kebutuhan dan kemampuan konsumsi.</li>\n            </ol>\n\n            <h3>Tips Tambahan:</h3>\n            <ul>\n            <li>Buat daftar belanja sebelum berangkat.</li>\n            <li>Periksa isi kulkas/pantry agar tidak membeli barang yang sudah ada.</li>\n            <li>Hindari belanja saat lapar agar tidak impulsif.</li>\n            </ul>\n\n            <blockquote>\n            <em>\"Belanja bukan hanya soal harga — tapi juga dampaknya terhadap lingkungan dan masa depan kita.\"</em>\n            </blockquote>\n            ', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
('cf16a718-b634-43ac-a0b4-6d0b4f781617', '5 Cara Mudah Memulai Gaya Hidup Zero Waste', '🌱 Zero Waste', 'zerowaste.png', '\n            <h2>Memulai Gaya Hidup Zero Waste</h2>\n            <p>Zero waste bukan tentang menjadi sempurna tanpa sampah, melainkan tentang kesadaran untuk mengurangi sampah sebanyak mungkin dalam kehidupan sehari-hari. Dengan meningkatnya krisis iklim dan tumpukan sampah di TPA, gaya hidup ini menjadi semakin relevan.</p>\n\n            <h3>Kenapa Zero Waste Penting?</h3>\n            <p>Sampah plastik membutuhkan ratusan tahun untuk terurai dan banyak yang akhirnya mencemari laut dan membahayakan ekosistem. Dengan mengubah kebiasaan kecil, kita bisa membuat perbedaan besar.</p>\n\n            <h3>5 Langkah Mudah Memulainya:</h3>\n            <ol>\n            <li><strong>Bawa Tas Belanja Sendiri</strong><br>Hindari kantong plastik dengan selalu membawa tas kain yang bisa digunakan berulang kali. Letakkan di tas harian atau kendaraan agar tidak lupa.</li>\n            <li><strong>Gunakan Botol & Tempat Makan Reusable</strong><br>Botol minum stainless dan kotak makan dari kaca atau logam tahan lama dan ramah lingkungan.</li>\n            <li><strong>Hindari Produk Sekali Pakai</strong><br>Ganti tissue dengan sapu tangan kain, sedotan plastik dengan sedotan bambu atau stainless, dan popok sekali pakai dengan versi kain.</li>\n            <li><strong>Pilih Produk Minim Kemasan</strong><br>Belanja di toko curah dengan wadah sendiri, hindari produk berlapis plastik, dan pilih barang dengan kemasan mudah didaur ulang.</li>\n            <li><strong>Kompos & Daur Ulang</strong><br>Komposkan sisa makanan dan gunakan sebagai pupuk tanaman. Pisahkan sampah organik dan anorganik untuk mempermudah proses daur ulang.</li>\n            </ol>\n\n            <h3>Tips Praktis untuk Pemula</h3>\n            <p>Jangan langsung ubah segalanya dalam sehari. Mulai dari satu kebiasaan kecil dan tambahkan perlahan. Zero waste adalah perjalanan, bukan tujuan akhir.</p>\n\n            <blockquote>\n            <em>\"Konsistensi lebih penting daripada kesempurnaan. Lebih baik satu orang melakukan zero waste dengan tidak sempurna, daripada tidak melakukannya sama sekali.\"</em>\n            </blockquote>\n            ', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
('f40cfc6a-804a-4517-9b48-9ac5f45eb3d5', 'Air Lebih Berharga dari yang Kamu Kira – Hemat Air Mulai Hari Ini', '🔌 Energi dan Elektronik', 'water.png', '\n            <h2>Krisis Air Bersih: Ancaman Nyata</h2>\n            <p>Banyak daerah di Indonesia dan dunia sudah mengalami krisis air bersih. Namun, kita sering tidak menyadarinya karena air masih mengalir dari keran. Setiap tetes air yang terbuang adalah sumber daya yang semakin langka.</p>\n\n            <h3>Fakta Penggunaan Air:</h3>\n            <ul>\n            <li>Mandi 10 menit = ±100 liter air</li>\n            <li>Sikat gigi dengan keran menyala = 6 liter air/hari</li>\n            <li>1 kg daging = hingga 15.000 liter air untuk produksinya</li>\n            </ul>\n\n            <h3>Langkah Menghemat Air:</h3>\n            <ol>\n            <li>Gunakan shower hemat air dan batasi waktu mandi</li>\n            <li>Matikan keran saat menyikat gigi atau mencuci tangan</li>\n            <li>Kumpulkan air cucian beras atau sayur untuk menyiram tanaman</li>\n            <li>Periksa kebocoran keran dan perbaiki secepatnya</li>\n            </ol>\n\n            <h3>Air untuk Masa Depan</h3>\n            <p>Dengan perubahan kecil dari kita semua, kita bisa menjamin ketersediaan air bersih untuk generasi mendatang.</p>\n\n            <blockquote>\n            <em>\"Jangan tunggu kekeringan datang baru menghargai air. Mulailah hemat dari sekarang.\"</em>\n            </blockquote>\n            ', 1, '2025-06-01 15:03:29', '2025-06-01 15:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint UNSIGNED NOT NULL,
  `quiz_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question_text`, `created_at`, `updated_at`) VALUES
(1, 'f3aa5807-6afe-44dc-9979-e48762ab88d9', 'Bagaimana kamu paling sering bepergian ke tempat kerja, kampus, atau sekolah?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(2, 'f3aa5807-6afe-44dc-9979-e48762ab88d9', 'Saat berbelanja kebutuhan sehari-hari, seberapa sering kamu membawa tas belanja sendiri dari rumah?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(3, 'f3aa5807-6afe-44dc-9979-e48762ab88d9', 'Di rumah, bagaimana caramu mengelola sampah yang kamu hasilkan?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(4, 'f3aa5807-6afe-44dc-9979-e48762ab88d9', 'Untuk minum di luar rumah, apa pilihan utamamu?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(5, 'f3aa5807-6afe-44dc-9979-e48762ab88d9', 'Apakah kamu rutin mematikan lampu dan mencabut peralatan elektronik saat tidak digunakan?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(6, 'f3aa5807-6afe-44dc-9979-e48762ab88d9', 'Seberapa sering kamu mengonsumsi daging merah (sapi atau kambing) dalam seminggu?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(7, 'f3aa5807-6afe-44dc-9979-e48762ab88d9', 'Saat memilih produk di toko, apa yang jadi pertimbangan utamamu?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(8, 'f3aa5807-6afe-44dc-9979-e48762ab88d9', 'Apa yang kamu lakukan dengan pakaian lama atau tidak terpakai yang masih layak?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(9, 'f3aa5807-6afe-44dc-9979-e48762ab88d9', 'Seberapa paham atau terlibat kamu dengan gerakan zero waste atau gaya hidup hijau?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(10, 'f3aa5807-6afe-44dc-9979-e48762ab88d9', 'Seberapa sering kamu membeli makanan berlebih yang akhirnya tidak habis dan terbuang?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(11, '957ef00c-781c-4182-a51b-7a21abc6262b', 'Saat membeli perangkat elektronik baru (misal: smartphone, laptop), apa yang menjadi pertimbangan utama bagimu?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(12, '957ef00c-781c-4182-a51b-7a21abc6262b', 'Bagaimana kamu mengeringkan pakaian setelah dicuci?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(13, '957ef00c-781c-4182-a51b-7a21abc6262b', 'Ketika kamu melihat keran air bocor atau listrik menyala tanpa guna di tempat umum, apa yang kamu lakukan?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(14, '957ef00c-781c-4182-a51b-7a21abc6262b', 'Seberapa sering kamu menggunakan tisu dapur atau tisu toilet yang sekali pakai?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(15, '957ef00c-781c-4182-a51b-7a21abc6262b', 'Bagaimana caramu membuang limbah minyak goreng bekas di rumah?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(16, '957ef00c-781c-4182-a51b-7a21abc6262b', 'Saat liburan atau bepergian, apa yang menjadi prioritasmu terkait akomodasi?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(17, '957ef00c-781c-4182-a51b-7a21abc6262b', 'Seberapa sering kamu membaca atau mencari informasi tentang isu lingkungan dan keberlanjutan?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(18, '957ef00c-781c-4182-a51b-7a21abc6262b', 'Apakah kamu mendukung merek atau perusahaan yang berkomitmen pada praktik etis dan ramah lingkungan?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(19, '957ef00c-781c-4182-a51b-7a21abc6262b', 'Bagaimana pendapatmu tentang penggunaan produk kemasan sekali pakai (misal: bungkus makanan, botol minuman kemasan, sachet)?', '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
(20, '957ef00c-781c-4182-a51b-7a21abc6262b', 'Apakah kamu aktif mengajak teman atau keluarga untuk menerapkan gaya hidup yang lebih ramah lingkungan?', '2025-06-01 15:03:29', '2025-06-01 15:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` bigint UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `duration_minutes` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `urutan`, `description`, `duration_minutes`, `created_at`, `updated_at`) VALUES
('957ef00c-781c-4182-a51b-7a21abc6262b', 'Jejak Lingkunganku - Sejauh Mana Kamu Berkontribusi?', 2, 'Mari selami lebih dalam kebiasaanmu dan pahami dampak lingkungan dari setiap pilihan yang kamu ambil.', 6, '2025-06-01 15:03:29', '2025-06-01 15:03:29'),
('f3aa5807-6afe-44dc-9979-e48762ab88d9', ' Seberapa Hijau Jiwamu? Mari Kenali Eco-Persona-mu!', 1, 'Penasaran seberapa jauh gaya hidupmu selaras dengan alam? Ikuti kuis singkat ini dan temukan eco-persona unikmu!', 5, '2025-06-01 15:03:29', '2025-06-01 15:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_attempts`
--

CREATE TABLE `quiz_attempts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `quiz_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rekomendasi_ai` text COLLATE utf8mb4_unicode_ci,
  `score` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('685fa443-601b-4e60-b94c-34e22d7842da', '🌱', 1, 'Eco Beginner', 'Langkah awal menuju gaya hidup ramah lingkungan', 'yellow-500', 0, 350, '2025-06-01 15:03:24', '2025-06-01 15:03:24'),
('a8aaa730-b6ba-4d60-a1c2-bcb7575260e1', '🍀', 3, 'Inspirator Hijau', 'Menjadi teladan dalam aksi nyata menjaga bumi', 'green-500', 501, 750, '2025-06-01 15:03:24', '2025-06-01 15:03:24'),
('b0b7c318-f265-4c83-b8c8-42c7372f7a20', '🌿', 2, 'Aktivis Hijau Muda', 'Semangat hijau mulai tumbuh dan terus berkembang', 'lime-300', 351, 500, '2025-06-01 15:03:24', '2025-06-01 15:03:24'),
('d09b771b-3864-42bc-95e0-63a273d81266', '🌎', 4, 'Duta Hijau Digital', 'Pemimpin perubahan, siap menginspirasi dunia digital', 'blue-500', 751, 1000, '2025-06-01 15:03:24', '2025-06-01 15:03:24');

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
(1, 'Super Admin', 'admin123@gmail.com', 'superadmin', 1, '$2y$12$YMk7TDteaOMmqKmvkZ.cV./jV7cB.7VnB2R/xCO4bIY4TtAKqbUnq', 0, '2025-06-01 15:03:24', '2025-06-01 15:03:24', '685fa443-601b-4e60-b94c-34e22d7842da'),
(2, 'Naufal Harits', 'naufal@gmail.com', 'naufalharits', 0, '$2y$12$bvPZv5aqPipR4iFqJFx0Qe6WcEmnHMS8bfkaVhiCxtZ.LxhejHy5a', 400, '2025-06-01 15:03:25', '2025-06-01 15:03:25', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(3, 'Andi Budiman', 'andi@example.com', 'andibudiman', 0, '$2y$12$hRY1n8tLhEUWM4ndipSTbuCDkYr5gteqV7FLmVXXLoLl.xhrTxv36', 305, '2025-06-01 15:03:25', '2025-06-01 15:03:25', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(4, 'Citra Lestari', 'citra@example.com', 'citralestari', 0, '$2y$12$eA5Eh7KpeSZRQRbckUv8jO4TELbj/4qhSqmgYSSKLgkK/l/JwDNly', 250, '2025-06-01 15:03:26', '2025-06-01 15:03:26', 'a8aaa730-b6ba-4d60-a1c2-bcb7575260e1'),
(5, 'Bayu Perkasa', 'bayu@example.com', 'bayuperkasa', 0, '$2y$12$TZBVHTsaRzHHS6sGyvNTsOLZEUtxJRftLjndDrOilq48pE7my.rhq', 100, '2025-06-01 15:03:26', '2025-06-01 15:03:26', '685fa443-601b-4e60-b94c-34e22d7842da'),
(6, 'Malika Suartini', 'waluyo.tedi@example.org', 'swastuti', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 578, '2025-06-01 15:03:28', '2025-06-01 15:03:29', '685fa443-601b-4e60-b94c-34e22d7842da'),
(7, 'Siti Padmasari', 'dimaz.setiawan@example.org', 'azalea87', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 736, '2025-06-01 15:03:28', '2025-06-01 15:03:29', '685fa443-601b-4e60-b94c-34e22d7842da'),
(8, 'Vanya Nasyidah S.Pt', 'safitri.almira@example.net', 'usimbolon', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 345, '2025-06-01 15:03:28', '2025-06-01 15:03:29', '685fa443-601b-4e60-b94c-34e22d7842da'),
(9, 'Natalia Talia Wijayanti', 'prasetya.purwadi@example.com', 'juli.winarsih', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 345, '2025-06-01 15:03:28', '2025-06-01 15:03:29', '685fa443-601b-4e60-b94c-34e22d7842da'),
(10, 'Jelita Mardhiyah', 'luhung.santoso@example.com', 'halima26', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 868, '2025-06-01 15:03:28', '2025-06-01 15:03:29', '685fa443-601b-4e60-b94c-34e22d7842da'),
(11, 'Kenari Hidayanto', 'padma80@example.net', 'pradana.okto', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 244, '2025-06-01 15:03:28', '2025-06-01 15:03:29', '685fa443-601b-4e60-b94c-34e22d7842da'),
(12, 'Bajragin Ardianto', 'makara96@example.net', 'permata.bakiono', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 359, '2025-06-01 15:03:28', '2025-06-01 15:03:29', '685fa443-601b-4e60-b94c-34e22d7842da'),
(13, 'Vega Kunthara Widodo', 'harjaya.habibi@example.org', 'puspita.aslijan', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 153, '2025-06-01 15:03:28', '2025-06-01 15:03:29', '685fa443-601b-4e60-b94c-34e22d7842da'),
(14, 'Nasrullah Budiman', 'sadina95@example.org', 'manullang.wani', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 163, '2025-06-01 15:03:28', '2025-06-01 15:03:29', '685fa443-601b-4e60-b94c-34e22d7842da'),
(15, 'Genta Sabrina Riyanti', 'kgunarto@example.net', 'kanda.sitompul', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 832, '2025-06-01 15:03:28', '2025-06-01 15:03:29', '685fa443-601b-4e60-b94c-34e22d7842da'),
(16, 'Rudi Jindra Santoso S.Pd', 'whutagalung@example.com', 'capa74', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 404, '2025-06-01 15:03:28', '2025-06-01 15:03:29', '685fa443-601b-4e60-b94c-34e22d7842da'),
(17, 'Panca Sirait', 'halimah.mila@example.net', 'nrima.usamah', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 113, '2025-06-01 15:03:28', '2025-06-01 15:03:29', '685fa443-601b-4e60-b94c-34e22d7842da'),
(18, 'Yunita Icha Maryati', 'epurnawati@example.net', 'jsuryatmi', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 628, '2025-06-01 15:03:28', '2025-06-01 15:03:29', '685fa443-601b-4e60-b94c-34e22d7842da'),
(19, 'Caturangga Tampubolon', 'kiandra.hidayanto@example.net', 'ami.pradana', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 545, '2025-06-01 15:03:28', '2025-06-01 15:03:29', '685fa443-601b-4e60-b94c-34e22d7842da'),
(20, 'Hartaka Damanik', 'gtamba@example.org', 'whandayani', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 408, '2025-06-01 15:03:28', '2025-06-01 15:03:29', '685fa443-601b-4e60-b94c-34e22d7842da'),
(21, 'Raditya Gaduh Utama', 'rahimah.jabal@example.com', 'rahmi05', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 582, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(22, 'Galiono Ganep Napitupulu', 'hani43@example.org', 'oagustina', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 938, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(23, 'Soleh Maheswara', 'cagak55@example.com', 'mayasari.sadina', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 750, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(24, 'Danu Lembah Marbun', 'yuniar.daliman@example.net', 'mandasari.margana', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 665, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(25, 'Mulyono Manullang', 'rsiregar@example.net', 'rahmi.astuti', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 913, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(26, 'Puti Safitri', 'hutapea.gawati@example.net', 'juli43', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 455, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(27, 'Tina Haryanti', 'mzulaika@example.com', 'hnatsir', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 950, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(28, 'Embuh Lasmono Pradana S.Ked', 'wani44@example.com', 'rafid97', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 315, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(29, 'Anita Farida', 'kardianto@example.org', 'jatmiko49', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 706, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(30, 'Maya Uyainah', 'tlatupono@example.org', 'adriansyah.alika', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 101, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(31, 'Cawisono Uwais S.Gz', 'lprabowo@example.com', 'samosir.martana', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 385, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(32, 'Perkasa Lega Pangestu', 'fpradana@example.net', 'winarsih.dartono', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 361, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(33, 'Puspa Vera Mulyani', 'rsiregar@example.com', 'murti.wulandari', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 971, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(34, 'Titin Zulaika', 'pudjiastuti.raina@example.org', 'satya.handayani', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 117, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(35, 'Putri Cici Kuswandari', 'wastuti.legawa@example.org', 'muwais', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 171, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'b0b7c318-f265-4c83-b8c8-42c7372f7a20'),
(36, 'Maryadi Hutasoit', 'maida.yolanda@example.com', 'calista.haryanti', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 378, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'a8aaa730-b6ba-4d60-a1c2-bcb7575260e1'),
(37, 'Emin Haryanto', 'cagak53@example.org', 'ladriansyah', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 576, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'a8aaa730-b6ba-4d60-a1c2-bcb7575260e1'),
(38, 'Bagus Napitupulu S.T.', 'tania.najmudin@example.net', 'znuraini', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 218, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'a8aaa730-b6ba-4d60-a1c2-bcb7575260e1'),
(39, 'Hendri Santoso', 'dodo06@example.net', 'tiara.kuswoyo', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 725, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'a8aaa730-b6ba-4d60-a1c2-bcb7575260e1'),
(40, 'Naradi Jayeng Santoso', 'mmustofa@example.net', 'ajeng.pertiwi', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 704, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'a8aaa730-b6ba-4d60-a1c2-bcb7575260e1'),
(41, 'Saka Widodo', 'dasa.saputra@example.org', 'mayasari.enteng', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 617, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'a8aaa730-b6ba-4d60-a1c2-bcb7575260e1'),
(42, 'Kuncara Irawan', 'fujiati.dalima@example.net', 'ejailani', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 121, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'a8aaa730-b6ba-4d60-a1c2-bcb7575260e1'),
(43, 'Ciaobella Handayani', 'fyuniar@example.com', 'wahyuni.tiara', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 479, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'a8aaa730-b6ba-4d60-a1c2-bcb7575260e1'),
(44, 'Nalar Januar', 'hariyah.lulut@example.com', 'permadi.kiandra', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 585, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'a8aaa730-b6ba-4d60-a1c2-bcb7575260e1'),
(45, 'Jumari Jono Saptono S.Pd', 'atma.palastri@example.net', 'mulyani.karimah', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 166, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'a8aaa730-b6ba-4d60-a1c2-bcb7575260e1'),
(46, 'Safina Laksmiwati', 'rachel92@example.com', 'rahayu.ratna', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 673, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'a8aaa730-b6ba-4d60-a1c2-bcb7575260e1'),
(47, 'Devi Vera Astuti', 'yessi.laksmiwati@example.org', 'hastuti.vanya', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 177, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'a8aaa730-b6ba-4d60-a1c2-bcb7575260e1'),
(48, 'Raharja Pangestu', 'salsabila12@example.org', 'salahudin.luwar', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 444, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'a8aaa730-b6ba-4d60-a1c2-bcb7575260e1'),
(49, 'Nugraha Lazuardi M.Ak', 'zmaryadi@example.org', 'laksana.suwarno', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 581, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'a8aaa730-b6ba-4d60-a1c2-bcb7575260e1'),
(50, 'Latika Padma Laksita', 'vino.kuswandari@example.net', 'vinsen.safitri', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 570, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'a8aaa730-b6ba-4d60-a1c2-bcb7575260e1'),
(51, 'Malik Wibisono', 'epudjiastuti@example.com', 'michelle.yuliarti', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 197, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'd09b771b-3864-42bc-95e0-63a273d81266'),
(52, 'Nurul Yuliarti S.E.I', 'hafshah.tamba@example.com', 'irma52', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 648, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'd09b771b-3864-42bc-95e0-63a273d81266'),
(53, 'Karimah Diana Rahayu', 'wijayanti.cakrabirawa@example.net', 'zelaya.pranowo', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 479, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'd09b771b-3864-42bc-95e0-63a273d81266'),
(54, 'Emin Pranowo', 'vivi44@example.org', 'sari.rahayu', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 338, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'd09b771b-3864-42bc-95e0-63a273d81266'),
(55, 'Yono Sihotang S.Farm', 'cindy.firgantoro@example.net', 'imanullang', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 782, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'd09b771b-3864-42bc-95e0-63a273d81266'),
(56, 'Bakiono Saefullah', 'anggraini.ulya@example.com', 'widiastuti.cawisono', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 881, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'd09b771b-3864-42bc-95e0-63a273d81266'),
(57, 'Hesti Vanya Yuniar', 'siregar.sarah@example.org', 'ahasanah', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 688, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'd09b771b-3864-42bc-95e0-63a273d81266'),
(58, 'Humaira Anggraini S.Pt', 'sabar41@example.org', 'lintang18', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 139, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'd09b771b-3864-42bc-95e0-63a273d81266'),
(59, 'Utama Capa Wacana', 'fharyanti@example.com', 'gunarto.daryani', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 412, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'd09b771b-3864-42bc-95e0-63a273d81266'),
(60, 'Agus Dariati Dongoran S.T.', 'kemal86@example.org', 'kani28', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 925, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'd09b771b-3864-42bc-95e0-63a273d81266'),
(61, 'Kamaria Purwanti S.T.', 'ira43@example.net', 'yuni64', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 462, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'd09b771b-3864-42bc-95e0-63a273d81266'),
(62, 'Olga Yoga Anggriawan S.I.Kom', 'permadi.cornelia@example.org', 'dewi.pudjiastuti', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 262, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'd09b771b-3864-42bc-95e0-63a273d81266'),
(63, 'Sadina Wulan Pertiwi', 'rajasa.edward@example.net', 'azalea.anggriawan', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 364, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'd09b771b-3864-42bc-95e0-63a273d81266'),
(64, 'Gasti Haryanti S.Ked', 'irwan.sudiati@example.net', 'hsuryatmi', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 286, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'd09b771b-3864-42bc-95e0-63a273d81266'),
(65, 'Ayu Lidya Suryatmi M.Farm', 'fujiati.halim@example.net', 'elvin.wahyuni', 0, '$2y$12$uDc2yxi.yPQjXRvZxWhHDuw8JeXiNoRDHI2ZRYzJVfQbhjtwthmCS', 815, '2025-06-01 15:03:29', '2025-06-01 15:03:29', 'd09b771b-3864-42bc-95e0-63a273d81266');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `quiz_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Indexes for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_attempts_user_id_foreign` (`user_id`),
  ADD KEY `quiz_attempts_quiz_id_foreign` (`quiz_id`);

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- AUTO_INCREMENT for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD CONSTRAINT `quiz_attempts_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_attempts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
