-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_laravelcrud
CREATE DATABASE IF NOT EXISTS `db_laravelcrud` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_laravelcrud`;

-- Dumping structure for table db_laravelcrud.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravelcrud.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table db_laravelcrud.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravelcrud.kelas: ~0 rows (approximately)
INSERT INTO `kelas` (`id`, `kelas`, `ruangan`, `lantai`, `created_at`, `updated_at`) VALUES
	(1, '12.1A.09', '3B', '3', '2024-10-25 03:46:45', '2024-10-25 03:46:45'),
	(2, '12.1B.09', '1C', '2', '2024-10-26 03:01:06', '2024-10-26 03:01:06');

-- Dumping structure for table db_laravelcrud.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_studi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_requesting_edit` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dosen_wali` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mahasiswa_nim_unique` (`nim`),
  KEY `mahasiswa_dosen_wali_foreign` (`dosen_wali`),
  CONSTRAINT `mahasiswa_dosen_wali_foreign` FOREIGN KEY (`dosen_wali`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravelcrud.mahasiswa: ~17 rows (approximately)
INSERT INTO `mahasiswa` (`id`, `nama_mahasiswa`, `nim`, `fakultas`, `program_studi`, `no_telp`, `peran`, `is_requesting_edit`, `created_at`, `updated_at`, `dosen_wali`) VALUES
	(3, 'Andi Saputra', '21010001', 'Teknik & Informatika', 'Sistem Informasi', '081234567890', 'Mahasiswa 1', 0, '2024-10-25 02:50:23', '2024-10-25 02:52:24', 5),
	(4, 'Kevin Prasetyo', '21010011', 'Teknik & Informatika', 'Sistem Informasi', '081234567800', 'Mahasiswa 11', 0, '2024-10-25 02:51:19', '2024-10-25 02:51:19', 6),
	(5, 'Budi Setiawan', '21010002', 'Teknik & Informatika', 'Sistem Informasi', '081234567891', 'Mahasiswa 2', 0, '2024-10-25 06:23:24', '2024-10-25 06:23:24', 5),
	(6, 'Citra Dewi', '21010003', 'Teknik & Informatika', 'Sistem Informasi', '081234567892', 'Mahasiswa 3', 0, '2024-10-25 06:23:48', '2024-10-25 06:23:48', 5),
	(7, 'Dian Puspita', '21010004', 'Teknik & Informatika', 'Sistem Informasi', '081234567893', 'Mahasiswa 4', 0, '2024-10-25 06:24:55', '2024-10-25 06:24:55', 5),
	(8, 'Eko Wijaya', '21010005', 'Teknik & Informatika', 'Sistem Informasi', '081234567894', 'Mahasiswa 5', 0, '2024-10-25 06:25:18', '2024-10-25 06:25:18', 5),
	(9, 'Fajar Maulana', '21010006', 'Teknik & Informatika', 'Sistem Informasi', '081234567895', 'Mahasiswa 6', 0, '2024-10-25 06:25:49', '2024-10-25 06:26:00', 5),
	(10, 'Galih Pratama', '21010007', 'Teknik & Informatika', 'Sistem Informasi', '081234567896', 'Mahasiswa 7', 0, '2024-10-25 06:26:29', '2024-10-25 06:26:29', 5),
	(11, 'Hadi Sucipto', '21010008', 'Teknik & Informatika', 'Sistem Informasi', '081234567897', 'Mahasiswa 8', 0, '2024-10-25 06:26:51', '2024-10-25 06:26:51', 5),
	(12, 'Ika Safitri', '21010009', 'Teknik & Informatika', 'Sistem Informasi', '081234567898', 'Mahasiswa 9', 0, '2024-10-25 06:27:14', '2024-10-25 06:27:14', 5),
	(13, 'Joko Santoso', '21010010', 'Teknik & Informatika', 'Sistem Informasi', '081234567899', 'Mahasiswa 10', 0, '2024-10-25 06:27:35', '2024-10-25 06:27:35', 5),
	(14, 'Lina Rahmawati', '21010012', 'Teknik & Informatika', 'Sistem Informasi', '081234567801', 'Mahasiswa 12', 0, '2024-10-25 06:35:01', '2024-10-25 06:35:01', 6),
	(15, 'Mita Anggraini', '21010013', 'Teknik & Informatika', 'Sistem Informasi', '081234567802', 'Mahasiswa 13', 0, '2024-10-25 06:35:25', '2024-10-25 06:35:25', 6),
	(16, 'Nia Pratiwi', '21010014', 'Teknik & Informatika', 'Sistem Informasi', '081234567803', 'Mahasiswa 14', 0, '2024-10-25 06:35:49', '2024-10-25 06:35:49', 6),
	(17, 'Oka Ramadhan', '21010015', 'Teknik & Informatika', 'Sistem Informasi', '081234567804', 'Mahasiswa 15', 0, '2024-10-25 06:36:15', '2024-10-25 06:36:15', 6),
	(18, 'Putri Amelia', '21010016', 'Teknik & Informatika', 'Sistem Informasi', '081234567805', 'Mahasiswa 16', 0, '2024-10-25 06:36:51', '2024-10-25 06:36:51', 6),
	(19, 'Rudi Hartono', '21010017', 'Teknik & Informatika', 'Sistem Informasi', '081234567806', 'Mahasiswa 17', 0, '2024-10-25 06:37:13', '2024-10-25 06:37:13', 6),
	(20, 'Siti Nurhaliza', '21010018', 'Teknik & Informatika', 'Sistem Informasi', '081234567807', 'Mahasiswa 18', 0, '2024-10-25 06:37:32', '2024-10-25 06:37:32', 6),
	(21, 'Toni Wijaya', '21010019', 'Teknik & Informatika', 'Sistem Informasi', '081234567808', 'Mahasiswa 19', 0, '2024-10-25 06:37:51', '2024-10-25 06:37:51', 6),
	(22, 'Vina Sari', '21010020', 'Teknik & Informatika', 'Sistem Informasi', '081234567809', 'Mahasiswa 20', 0, '2024-10-25 06:38:11', '2024-10-25 06:38:11', 6);

-- Dumping structure for table db_laravelcrud.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravelcrud.migrations: ~12 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2024_09_28_090047_create_post_table', 1),
	(3, '2024_09_28_122722_create_kelas_table', 3),
	(4, '2024_10_18_093103_create_request_edits_table', 4),
	(5, '2014_10_12_000000_create_users_table', 5),
	(6, '2014_10_12_100000_create_password_reset_tokens_table', 6),
	(7, '2019_08_19_000000_create_failed_jobs_table', 7),
	(8, '2019_12_14_000001_create_personal_access_tokens_table', 8),
	(9, '2024_10_14_095904_add_dosen_wali_id_to_request_edits_table', 9),
	(10, '2024_10_23_133014_add_kelas_id_to_mahasiswa_table', 10),
	(11, '2024_10_07_123640_add_can_edit_to_users_table', 11),
	(13, '2024_09_28_092137_create_mahasiswa_table', 13),
	(14, '2024_10_02_082641_add_wali_dosen_to_mahasiswa_table', 14),
	(15, '2024_10_26_094538_add_tanggal_to_plottings_table', 15);

-- Dumping structure for table db_laravelcrud.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravelcrud.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table db_laravelcrud.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravelcrud.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table db_laravelcrud.plottings
CREATE TABLE IF NOT EXISTS `plottings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `mahasiswa_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `kelas_id` bigint unsigned NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravelcrud.plottings: ~50 rows (approximately)
INSERT INTO `plottings` (`id`, `mahasiswa_id`, `post_id`, `kelas_id`, `hari`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `created_at`, `updated_at`) VALUES
	(4, 5, 1, 2, 'Senin', '2024-10-28', '07:30:00', '10:00:00', '2024-10-28 00:54:20', '2024-10-28 00:54:20'),
	(5, 6, 1, 2, 'Senin', '2024-10-28', '07:30:00', '10:00:00', '2024-10-28 00:54:48', '2024-10-28 00:54:48'),
	(6, 3, 1, 2, 'Senin', '2024-10-28', '07:30:00', '10:00:00', '2024-10-28 00:55:35', '2024-10-28 00:55:35'),
	(7, 7, 1, 2, 'Senin', '2024-10-28', '07:30:00', '10:00:00', '2024-10-28 00:56:09', '2024-10-28 00:56:09'),
	(8, 8, 1, 2, 'Senin', '2024-10-28', '07:30:00', '10:00:00', '2024-10-28 00:56:28', '2024-10-28 00:56:28'),
	(9, 9, 1, 2, 'Senin', '2024-10-28', '07:30:00', '10:00:00', '2024-10-28 00:56:47', '2024-10-28 00:56:47'),
	(10, 10, 1, 2, 'Senin', '2024-10-28', '07:30:00', '10:00:00', '2024-10-28 00:57:08', '2024-10-28 00:57:08'),
	(11, 11, 1, 2, 'Senin', '2024-10-28', '07:30:00', '10:00:00', '2024-10-28 00:57:29', '2024-10-28 00:57:29'),
	(12, 12, 1, 2, 'Senin', '2024-10-28', '07:30:00', '10:00:00', '2024-10-28 00:58:04', '2024-10-28 00:58:04'),
	(13, 13, 1, 2, 'Senin', '2024-10-28', '07:30:00', '10:00:00', '2024-10-28 00:58:31', '2024-10-28 00:58:31'),
	(24, 3, 3, 1, 'Selasa', '2024-10-29', '10:00:00', '13:30:00', '2024-10-28 01:15:45', '2024-10-28 01:15:45'),
	(25, 5, 3, 1, 'Selasa', '2024-10-29', '10:00:00', '13:30:00', '2024-10-28 01:16:03', '2024-10-28 01:16:03'),
	(26, 6, 3, 1, 'Selasa', '2024-10-29', '10:00:00', '13:30:00', '2024-10-28 01:16:22', '2024-10-28 01:16:22'),
	(27, 7, 3, 1, 'Selasa', '2024-10-29', '10:00:00', '13:30:00', '2024-10-28 01:16:45', '2024-10-28 01:16:45'),
	(28, 8, 3, 1, 'Selasa', '2024-10-29', '10:00:00', '13:30:00', '2024-10-28 01:17:31', '2024-10-28 01:17:31'),
	(29, 9, 3, 1, 'Selasa', '2024-10-29', '10:00:00', '13:30:00', '2024-10-28 01:17:49', '2024-10-28 01:17:49'),
	(30, 10, 3, 1, 'Selasa', '2024-10-29', '10:00:00', '13:30:00', '2024-10-28 01:18:10', '2024-10-28 01:18:10'),
	(31, 11, 3, 1, 'Selasa', '2024-10-29', '10:00:00', '13:30:00', '2024-10-28 01:18:29', '2024-10-28 01:18:29'),
	(32, 12, 3, 1, 'Selasa', '2024-10-29', '10:00:00', '13:30:00', '2024-10-28 01:18:54', '2024-10-28 01:18:54'),
	(33, 13, 3, 1, 'Selasa', '2024-10-29', '10:00:00', '13:30:00', '2024-10-28 01:19:53', '2024-10-28 01:19:53'),
	(34, 14, 4, 1, 'Selasa', '2024-10-29', '14:00:00', '17:00:00', '2024-10-28 01:21:24', '2024-10-28 01:21:24'),
	(35, 15, 4, 1, 'Selasa', '2024-10-29', '14:00:00', '17:00:00', '2024-10-28 01:21:44', '2024-10-28 01:21:44'),
	(36, 16, 4, 1, 'Selasa', '2024-10-29', '14:00:00', '17:00:00', '2024-10-28 01:22:18', '2024-10-28 01:22:18'),
	(37, 17, 4, 1, 'Selasa', '2024-10-29', '14:00:00', '17:00:00', '2024-10-28 01:22:52', '2024-10-28 01:22:52'),
	(38, 18, 4, 1, 'Selasa', '2024-10-29', '14:00:00', '17:00:00', '2024-10-28 01:23:18', '2024-10-28 01:23:18'),
	(40, 19, 4, 1, 'Selasa', '2024-10-29', '14:00:00', '17:00:00', '2024-10-28 01:24:13', '2024-10-28 01:24:13'),
	(41, 20, 4, 1, 'Selasa', '2024-10-29', '14:00:00', '17:00:00', '2024-10-28 01:24:31', '2024-10-28 01:24:31'),
	(42, 21, 4, 1, 'Selasa', '2024-10-29', '14:00:00', '17:00:00', '2024-10-28 01:24:49', '2024-10-28 01:24:49'),
	(43, 22, 4, 1, 'Selasa', '2024-10-29', '14:00:00', '17:00:00', '2024-10-28 01:25:39', '2024-10-28 01:25:39'),
	(44, 3, 5, 2, 'Rabu', '2024-10-30', '09:00:00', '12:30:00', '2024-10-28 01:26:30', '2024-10-28 01:26:30'),
	(45, 5, 5, 2, 'Rabu', '2024-10-30', '09:00:00', '12:30:00', '2024-10-28 01:26:48', '2024-10-28 01:26:48'),
	(46, 6, 5, 2, 'Rabu', '2024-10-30', '09:00:00', '12:30:00', '2024-10-28 01:27:13', '2024-10-28 01:27:13'),
	(47, 7, 5, 2, 'Rabu', '2024-10-30', '09:00:00', '12:30:00', '2024-10-28 01:27:44', '2024-10-28 01:27:44'),
	(48, 8, 5, 2, 'Rabu', '2024-10-30', '09:00:00', '12:30:00', '2024-10-28 01:28:09', '2024-10-28 01:28:09'),
	(49, 9, 5, 2, 'Rabu', '2024-10-30', '09:00:00', '12:30:00', '2024-10-28 01:28:33', '2024-10-28 01:28:33'),
	(50, 10, 5, 2, 'Rabu', '2024-10-30', '09:00:00', '12:30:00', '2024-10-28 01:28:51', '2024-10-28 01:28:51'),
	(51, 11, 5, 2, 'Rabu', '2024-10-30', '09:00:00', '12:30:00', '2024-10-28 01:29:13', '2024-10-28 01:29:13'),
	(52, 12, 5, 2, 'Rabu', '2024-10-30', '09:00:00', '12:30:00', '2024-10-28 01:29:37', '2024-10-28 01:29:37'),
	(53, 13, 5, 2, 'Rabu', '2024-10-30', '09:00:00', '12:30:00', '2024-10-28 01:30:00', '2024-10-28 01:30:00'),
	(54, 4, 4, 1, 'Selasa', '2024-10-29', '14:00:00', '17:00:00', '2024-10-28 01:32:03', '2024-10-28 01:32:03'),
	(55, 4, 2, 2, 'Kamis', '2024-10-31', '12:30:00', '16:00:00', '2024-10-28 01:54:58', '2024-10-28 01:54:58'),
	(58, 14, 2, 2, 'Kamis', '2024-10-31', '12:30:00', '16:00:00', '2024-10-28 01:58:19', '2024-10-28 01:58:19'),
	(59, 15, 2, 2, 'Kamis', '2024-10-31', '12:30:00', '16:00:00', '2024-10-28 01:58:43', '2024-10-28 01:58:43'),
	(60, 16, 2, 2, 'Kamis', '2024-10-31', '12:30:00', '16:00:00', '2024-10-28 01:59:42', '2024-10-28 01:59:42'),
	(61, 17, 2, 2, 'Kamis', '2024-10-31', '12:30:00', '16:00:00', '2024-10-28 02:00:02', '2024-10-28 02:00:02'),
	(62, 18, 2, 2, 'Kamis', '2024-10-31', '12:30:00', '16:00:00', '2024-10-28 02:00:21', '2024-10-28 02:00:21'),
	(63, 19, 2, 2, 'Kamis', '2024-10-31', '12:30:00', '16:00:00', '2024-10-28 02:00:42', '2024-10-28 02:00:42'),
	(64, 20, 2, 2, 'Kamis', '2024-10-31', '12:30:00', '16:00:00', '2024-10-28 02:01:02', '2024-10-28 02:01:02'),
	(65, 21, 2, 2, 'Kamis', '2024-10-31', '12:30:00', '16:00:00', '2024-10-28 02:01:24', '2024-10-28 02:01:24'),
	(66, 22, 2, 2, 'Kamis', '2024-10-31', '12:30:00', '16:00:00', '2024-10-28 02:01:42', '2024-10-28 02:01:42');

-- Dumping structure for table db_laravelcrud.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matakuliah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravelcrud.post: ~5 rows (approximately)
INSERT INTO `post` (`id`, `nama_dosen`, `nip`, `fakultas`, `matakuliah`, `no_telp`, `peran`, `created_at`, `updated_at`) VALUES
	(1, 'Dr. Andi Prasetyo, M.Kom', '123456789', 'Teknik & Informatika', 'Web programming', '081234567890', 'Dosen Biasa 1', NULL, NULL),
	(2, 'Siti Aminah, S.Kom', '987654321', 'Teknik & Informatika', 'Perancangan Sistem Informasi Berorientasi Objek', '082345678901', 'Dosen Biasa 2', NULL, NULL),
	(3, 'Joko Susanto, S.T., M.Kom', '112233445', 'Teknik & Informatika', 'Sistem Basis Data', '083456789012', 'Dosen Biasa 3', NULL, NULL),
	(4, 'Dr. Fatimah Rahmawati, M.Kom', '223344556', 'Teknik & Informatika', 'Mobile Programming', '084567890123', 'Dosen Wali 1', NULL, NULL),
	(5, 'Rina Kartika, S.Kom', '334455667', 'Teknik & Informatika', 'Dasar Pemrograman', '085678901234', 'Dosen Wali 2', NULL, NULL);

-- Dumping structure for table db_laravelcrud.request_edits
CREATE TABLE IF NOT EXISTS `request_edits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `mahasiswa_id` bigint unsigned NOT NULL,
  `field_to_edit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `request_edits_mahasiswa_id_foreign` (`mahasiswa_id`),
  CONSTRAINT `request_edits_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravelcrud.request_edits: ~0 rows (approximately)
INSERT INTO `request_edits` (`id`, `mahasiswa_id`, `field_to_edit`, `new_value`, `status`, `created_at`, `updated_at`) VALUES
	(1, 3, 'no_telp', '081234567890', 'approved', '2024-10-25 02:52:02', '2024-10-25 02:52:24');

-- Dumping structure for table db_laravelcrud.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` enum('kaprodi','dosen_biasa','dosen_wali','mahasiswa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `can_edit` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravelcrud.users: ~26 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`, `can_edit`) VALUES
	(1, 'Kaprodi', 'kaprodi@gmail.com', NULL, 'kaprodi', '$2y$12$kMEQmoQhaY1oVOgyWQ32b.NuaPDF9MIQaDxye7XgQ2S400KIMwBm2', NULL, '2024-10-25 01:59:54', '2024-10-25 01:59:54', 1),
	(2, 'Dosen Biasa 1', 'dosenbiasa1@gmail.com', NULL, 'dosen_biasa', '$2y$12$DJNFh0P.llsAWTsd1sw6ye0gPLKMp54FYryJ/LcSyKbwH6W4.MqFq', NULL, '2024-10-25 01:59:55', '2024-10-25 01:59:55', 1),
	(3, 'Dosen Biasa 2', 'dosenbiasa2@gmail.com', NULL, 'dosen_biasa', '$2y$12$BgcZWZ4Zg0iuMbVWuJjvR.BPxzTU2ySt5ekCCDuDO2qxa8I5KRWSa', NULL, '2024-10-25 01:59:55', '2024-10-25 01:59:55', 1),
	(4, 'Dosen Biasa 3', 'dosenbiasa3@gmail.com', NULL, 'dosen_biasa', '$2y$12$Vh2DWtdGLtRQAHK5w2Qn3.nl1yfZHCBBsN2m4kpknpdsnuFHArug.', NULL, '2024-10-25 01:59:55', '2024-10-25 01:59:55', 1),
	(5, 'Dosen Wali 1', 'dosenwali1@gmail.com', NULL, 'dosen_wali', '$2y$12$A30l3NnzWC1QRMeNo4.CpuNSOJpr1PVPYnohkyv4xTKq2.o2J0hdu', NULL, '2024-10-25 01:59:56', '2024-10-25 01:59:56', 1),
	(6, 'Dosen Wali 2', 'dosenwali2@gmail.com', NULL, 'dosen_wali', '$2y$12$N7urfbUwoh/hCCFMJzom9uoiAkXeP2VU9TDaPxPtpueVQEi1U5ICa', NULL, '2024-10-25 01:59:56', '2024-10-25 01:59:56', 1),
	(7, 'Mahasiswa 1', 'mahasiswa1@gmail.com', NULL, 'mahasiswa', '$2y$12$sEdd.tHRYFUteVC0nwtVwe9Wk2R/MbFb62gY7ex7OQQH36KhlP0dq', NULL, NULL, NULL, 1),
	(8, 'Mahasiswa 2', 'mahasiswa2@gmail.com', NULL, 'mahasiswa', '$2y$12$fNCsRgkx8W6kq/ebx0lQTOo0Fsb8Tz2KUa7lOwS9ZqdiAfZZAcN3O', NULL, NULL, NULL, 1),
	(9, 'Mahasiswa 3', 'mahasiswa3@gmail.com', NULL, 'mahasiswa', '$2y$12$6LHY8/roLCqIup.W8qgkD.xnJuKaAkufyHHlnub6UNA3EwjBkjxda', NULL, NULL, NULL, 1),
	(10, 'Mahasiswa 4', 'mahasiswa4@gmail.com', NULL, 'mahasiswa', '$2y$12$JbBl5idAQAkTgnCERYOWPei/vLsT7qln1GTsqIUB7R4SqiJebfRmi', NULL, NULL, NULL, 1),
	(11, 'Mahasiswa 5', 'mahasiswa5@gmail.com', NULL, 'mahasiswa', '$2y$12$RkYmM98yBrJdjq0NBY.bJ.21Nt31rLha4MBHo4SlaPxzU4TX.aIDi', NULL, NULL, NULL, 1),
	(12, 'Mahasiswa 6', 'mahasiswa6@gmail.com', NULL, 'mahasiswa', '$2y$12$C0M7yQyaIkeBRQ9O0fx/3usqw9k1DSn/L4vzlNmu2khMwd99l2xta', NULL, NULL, NULL, 1),
	(13, 'Mahasiswa 7', 'mahasiswa7@gmail.com', NULL, 'mahasiswa', '$2y$12$yixaMPcfLUaveeSYBluChe0AOErL0fSiYNugRoRpmRg9eBHkiaID2', NULL, NULL, NULL, 1),
	(14, 'Mahasiswa 8', 'mahasiswa8@gmail.com', NULL, 'mahasiswa', '$2y$12$nzldidXbNCo2C.Kb7Tl5Q.mdbZV32oIxK7TY5w7xY0WTGgu2duCgu', NULL, NULL, NULL, 1),
	(15, 'Mahasiswa 9', 'mahasiswa9@gmail.com', NULL, 'mahasiswa', '$2y$12$gz8Lm8NNlCNPs/34GgjB5.rcUNHg1kpPF9.mp2aughs1sT6Kidzpq', NULL, NULL, NULL, 1),
	(16, 'Mahasiswa 10', 'mahasiswa10@gmail.com', NULL, 'mahasiswa', '$2y$12$7oYkYxWzvf4aiKj5a/Zt7OqGV1Pt9FjESAXoKE.UYC51ZaQ3E9k96', NULL, NULL, NULL, 1),
	(17, 'Mahasiswa 11', 'mahasiswa11@gmail.com', NULL, 'mahasiswa', '$2y$12$wz57T/iSIaFVbD9uUi6druz71YIF72z8vr41IPf/1.vT5GLu0UKVW', NULL, NULL, NULL, 1),
	(18, 'Mahasiswa 12', 'mahasiswa12@gmail.com', NULL, 'mahasiswa', '$2y$12$vmoeLldMK.vv1H6C8ZLxruH6M87BZr2a/519.rzJ5wQGjNW9VB.Qm', NULL, NULL, NULL, 1),
	(19, 'Mahasiswa 13', 'mahasiswa13@gmail.com', NULL, 'mahasiswa', '$2y$12$YOjQAIwZeF.JqNfXtmefFOcK4vWZIS0Dc4QzVoEb.U4CX38e61w3W', NULL, NULL, NULL, 1),
	(20, 'Mahasiswa 14', 'mahasiswa14@gmail.com', NULL, 'mahasiswa', '$2y$12$F/4Z2xNrYiJd8cll1bYq1u/j0UPaiIEDXmZiWEssnWgN5zbm8xlUC', NULL, NULL, NULL, 1),
	(21, 'Mahasiswa 15', 'mahasiswa15@gmail.com', NULL, 'mahasiswa', '$2y$12$DTmnsker8SyEGMbZ9x4.FePlOOe0M2GE1MjV7H762bUHZhWwBK4S6', NULL, NULL, NULL, 1),
	(22, 'Mahasiswa 16', 'mahasiswa16@gmail.com', NULL, 'mahasiswa', '$2y$12$RFYzLEx6rEJP9DD0jii1/u0p/sCQN7YEkq91gpi8GEG/FBqxx5DIO', NULL, NULL, NULL, 1),
	(23, 'Mahasiswa 17', 'mahasiswa17@gmail.com', NULL, 'mahasiswa', '$2y$12$.lnK2Dxewxc/cazqYGjRKutayqNQJ6Qc1AdVLvGgJ5glLtz7mOESO', NULL, NULL, NULL, 1),
	(24, 'Mahasiswa 18', 'mahasiswa18@gmail.com', NULL, 'mahasiswa', '$2y$12$iNixla7Zg3T198aarD4D7.jwwF.10Jiz7roozwOuik2/9w.DCwgDy', NULL, NULL, NULL, 1),
	(25, 'Mahasiswa 19', 'mahasiswa19@gmail.com', NULL, 'mahasiswa', '$2y$12$NSZfA8JidyqodSGfpNkXheOoq8T5dEC8u8qMZhpTULiy0m0cw83Qy', NULL, NULL, NULL, 1),
	(26, 'Mahasiswa 20', 'mahasiswa20@gmail.com', NULL, 'mahasiswa', '$2y$12$6BUbVfjPncXMYxqhhEnEte8JpWaZkDf911IpSxLpWxqy4wimKGNKC', NULL, NULL, NULL, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
