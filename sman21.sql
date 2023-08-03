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


-- Dumping database structure for sman21
CREATE DATABASE IF NOT EXISTS `sman21` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sman21`;

-- Dumping structure for table sman21.berita
CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampul` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sman21.berita: ~3 rows (approximately)
REPLACE INTO `berita` (`id_berita`, `judul`, `isi`, `sampul`, `url_slug`, `created_at`, `updated_at`) VALUES
	('BR-002', 'Berita 2', '<p>Isi Berita 2</p>', '1670148064-BR-002.jpg', 'berita-2', '2022-11-27 22:16:27', '2022-12-04 03:01:04'),
	('BR-003', 'Berita 1', '<p>Isi Berita 1</p>', '1669623168-BR-003.png', 'berita-1', '2022-11-28 01:12:48', '2022-11-28 01:12:48'),
	('BR-004', 'Berita 3', '<p>Isi Berita 3</p>', '1670148138-BR-004.jpg', 'berita-3', '2022-12-04 03:02:18', '2022-12-04 03:02:18');

-- Dumping structure for table sman21.buku
CREATE TABLE IF NOT EXISTS `buku` (
  `buku_id` int unsigned NOT NULL AUTO_INCREMENT,
  `buku_judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buku_kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buku_penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buku_penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buku_tahunterbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buku_stok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buku_sinopsis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rak_id` int NOT NULL,
  `buku_qrcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`buku_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sman21.buku: ~1 rows (approximately)
REPLACE INTO `buku` (`buku_id`, `buku_judul`, `buku_kode`, `buku_penulis`, `buku_penerbit`, `buku_tahunterbit`, `buku_stok`, `buku_sinopsis`, `jenis_id`, `created_at`, `updated_at`, `rak_id`, `buku_qrcode`) VALUES
	(4, 'Lebih Senyap dari Bisikan', '2022121916883943', 'Tere Liye', 'Gramedia', '2019', '10', 'Contohh sinopsis', 1, '2022-12-19 04:32:19', '2022-12-19 04:32:19', 1, NULL);

-- Dumping structure for table sman21.counter
CREATE TABLE IF NOT EXISTS `counter` (
  `ip_addr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `count` int unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sman21.counter: ~11 rows (approximately)
REPLACE INTO `counter` (`ip_addr`, `date`, `count`) VALUES
	('127.0.0.1', '2022-12-04', 51),
	('125.164.22.36', '2022-12-04', 2),
	('125.164.17.241', '2022-12-04', 10),
	('125.164.18.101', '2022-12-04', 2),
	('125.164.23.169', '2022-12-04', 3),
	('125.164.16.230', '2022-12-04', 1),
	('127.0.0.1', '2022-12-05', 7),
	('127.0.0.1', '2022-12-10', 1),
	('127.0.0.1', '2022-12-10', 1),
	('127.0.0.1', '2022-12-12', 1),
	('127.0.0.1', '2022-12-18', 7);

-- Dumping structure for table sman21.detailtransaksi
CREATE TABLE IF NOT EXISTS `detailtransaksi` (
  `detailtransaksi_id` int unsigned NOT NULL AUTO_INCREMENT,
  `transaksi_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `buku_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `detailtransaksi_jumlah` int NOT NULL,
  `detailtransaksi_tglpinjam` date NOT NULL,
  `detailtransaksi_tglkembali` date NOT NULL,
  `detailtransaksi_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`detailtransaksi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sman21.detailtransaksi: ~1 rows (approximately)
REPLACE INTO `detailtransaksi` (`detailtransaksi_id`, `transaksi_id`, `buku_id`, `detailtransaksi_jumlah`, `detailtransaksi_tglpinjam`, `detailtransaksi_tglkembali`, `detailtransaksi_status`, `created_at`, `updated_at`) VALUES
	(1, '202212190001', '2022121916883943', 1, '2022-12-19', '2022-12-22', 'Dipinjam', NULL, NULL);

-- Dumping structure for table sman21.dirgu
CREATE TABLE IF NOT EXISTS `dirgu` (
  `id_guru` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` bigint unsigned NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `matpel` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sman21.dirgu: ~3 rows (approximately)
REPLACE INTO `dirgu` (`id_guru`, `nip`, `nama`, `matpel`, `foto`, `created_at`, `updated_at`) VALUES
	('GR-001', 12345678, 'Ahmad Aditya', '<p>Bengkel Motor</p>', '1669612743-GR-001.png', NULL, NULL),
	('GR-002', 123456781, 'Nicolaus Buha', '<p>Ilmu Pengetahuan Alam</p>', '1669612797-GR-002.png', NULL, NULL),
	('GR-003', 123456783, 'Galih Respati P', '<p>Kepala IT</p>', '1670148292-GR-003.jpg', NULL, NULL);

-- Dumping structure for table sman21.dirtu
CREATE TABLE IF NOT EXISTS `dirtu` (
  `id_tu` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` bigint unsigned NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sman21.dirtu: ~2 rows (approximately)
REPLACE INTO `dirtu` (`id_tu`, `nip`, `nama`, `bagian`, `foto`, `created_at`, `updated_at`) VALUES
	('TU-001', 123456780, 'Ridwan Alfalhan', '<p>Pengarsipan</p>', '1669613432-TU-001.png', NULL, NULL),
	('TU-002', 123456781, 'Rio Dwianto', '<p>Keuangan</p>', '1669623226-TU-002.png', NULL, NULL);

-- Dumping structure for table sman21.ekskul
CREATE TABLE IF NOT EXISTS `ekskul` (
  `id_ekskul` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ekskul`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sman21.ekskul: ~2 rows (approximately)
REPLACE INTO `ekskul` (`id_ekskul`, `judul`, `foto`, `created_at`, `updated_at`) VALUES
	('EKS-001', 'Kabaret', '1669617528-EKS-001.png', NULL, NULL),
	('EKS-002', 'Futsal', '1669623250-EKS-002.png', NULL, NULL);

-- Dumping structure for table sman21.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sman21.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table sman21.jenis
CREATE TABLE IF NOT EXISTS `jenis` (
  `id_jenis` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sman21.jenis: ~2 rows (approximately)
REPLACE INTO `jenis` (`id_jenis`, `nama_jenis`, `created_at`, `updated_at`) VALUES
	(1, 'Novel', '2022-12-06 07:55:12', '2022-12-06 08:12:42'),
	(4, 'Pendidikan', '2022-12-06 08:16:47', '2022-12-06 08:16:47');

-- Dumping structure for table sman21.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sman21.migrations: ~16 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(9, '2014_10_12_000000_create_users_table', 1),
	(10, '2014_10_12_100000_create_password_resets_table', 1),
	(11, '2019_08_19_000000_create_failed_jobs_table', 1),
	(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(13, '2022_11_20_212416_berita', 1),
	(14, '2022_11_20_212945_dirgu', 1),
	(15, '2022_11_20_213258_dirtu', 1),
	(16, '2022_11_20_213414_ekskul', 1),
	(17, '2022_11_25_143802_counter', 1),
	(18, '2022_12_06_133620_create_jenis_table', 2),
	(19, '2022_12_06_151730_create_bukus_table', 3),
	(20, '2022_12_10_115230_create_raks_table', 4),
	(21, '2022_12_10_124052_add_rak_id_to_buku_table', 5),
	(22, '2022_12_12_121502_create_transaksis_table', 6),
	(23, '2022_12_12_131151_create_siswas_table', 7),
	(24, '2022_12_12_141721_create_detail_transaksis_table', 8);

-- Dumping structure for table sman21.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sman21.password_resets: ~0 rows (approximately)

-- Dumping structure for table sman21.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sman21.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table sman21.rak
CREATE TABLE IF NOT EXISTS `rak` (
  `rak_id` int unsigned NOT NULL AUTO_INCREMENT,
  `rak_nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rak_lokasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rak_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sman21.rak: ~2 rows (approximately)
REPLACE INTO `rak` (`rak_id`, `rak_nama`, `rak_lokasi`, `created_at`, `updated_at`) VALUES
	(1, 'Rak 1', 'Ruang Perpustakaan Lt 1', '2022-12-10 05:19:15', '2022-12-10 05:25:35'),
	(2, 'Rak 2', 'Ruang Perpustakaan Lt 1', '2022-12-10 05:25:53', '2022-12-10 05:26:02');

-- Dumping structure for table sman21.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `siswa_id` int unsigned NOT NULL AUTO_INCREMENT,
  `nisn` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_ttl` date NOT NULL,
  `siswa_gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`siswa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sman21.siswa: ~1 rows (approximately)
REPLACE INTO `siswa` (`siswa_id`, `nisn`, `siswa_nama`, `siswa_ttl`, `siswa_gender`, `siswa_alamat`, `created_at`, `updated_at`) VALUES
	(1, '0003891200', 'Dicky Darmawan', '2000-09-29', 'Laki-laki', 'Cimahi', '2022-12-12 07:14:21', '2022-12-12 07:15:25');

-- Dumping structure for table sman21.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `transaksi_id` int unsigned NOT NULL AUTO_INCREMENT,
  `transaksi_tanggalpinjam` date NOT NULL,
  `transaksi_tanggalkembali` date NOT NULL,
  `transaksi_kode` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaksi_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaksi_denda` int NOT NULL,
  `siswa_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`transaksi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sman21.transaksi: ~1 rows (approximately)
REPLACE INTO `transaksi` (`transaksi_id`, `transaksi_tanggalpinjam`, `transaksi_tanggalkembali`, `transaksi_kode`, `transaksi_status`, `transaksi_denda`, `siswa_id`, `created_at`, `updated_at`) VALUES
	(1, '2022-12-19', '2022-12-22', '202212190001', 'Dipinjam', 0, 1, NULL, NULL);

-- Dumping structure for table sman21.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil_pict` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sman21.users: ~3 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profil_pict`, `remember_token`, `created_at`, `updated_at`) VALUES
	('ADM-001', 'Rio Dwianto', 'rio@gmail.com', '2022-11-28 04:50:16', '$2y$10$xrkLNA8wX8YufTWIVjuBtu7gjBU1qzqswN7Ap1ZoCqukWsTv7YDIW', NULL, NULL, '2022-11-28 04:54:07', '2022-11-29 05:08:47'),
	('ADM-002', 'Afghan Muhammad Bahri', 'afghan@gmail.com', '2022-12-04 15:42:18', '$2y$10$Xun/fmtb.1h9f9rCSDQJtOjYXu89ibxpavX630SbM6nESz4r8nqeu', NULL, NULL, '2022-11-29 05:30:39', '2022-11-29 05:30:39'),
	('ADM-003', 'M Ariel Fadhilah F', 'ariel@gmail.com', '2022-12-04 16:29:44', '$2y$10$5h98KRWtIfmwgfuXms1Iz.PolOQZnzS48PtqgPsiQmKOus67J/RMq', NULL, NULL, '2022-12-04 09:29:09', '2022-12-04 09:29:09');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
