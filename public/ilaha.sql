-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for the_end_db
CREATE DATABASE IF NOT EXISTS `the_end_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `the_end_db`;

-- Dumping structure for table the_end_db.blood_inventory
CREATE TABLE IF NOT EXISTS `blood_inventory` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `blood_type` enum('A+','A-','B+','B-','AB+','AB-','0+','0-') COLLATE utf8mb4_unicode_ci NOT NULL,
  `units_available` int NOT NULL DEFAULT '0',
  `status` enum('normal','low','critical') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `hospital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table the_end_db.blood_inventory: ~6 rows (approximately)
INSERT INTO `blood_inventory` (`id`, `blood_type`, `units_available`, `status`, `hospital`, `city`, `created_at`, `updated_at`) VALUES
	(1, 'AB-', 4, 'low', 'Ege Hospital', 'Bakı', '2026-06-17 06:11:25', '2026-06-17 06:11:25'),
	(2, 'B-', 1, 'normal', 'Medican Xəstəxanası', 'Lənkəran', '2026-06-30 02:24:39', '2026-06-30 02:24:39'),
	(4, 'A+', 7, 'normal', 'Mərkəzi Klinik Xəstəxanası', 'Bakı', '2026-07-05 09:50:10', '2026-07-05 09:50:10'),
	(6, '0+', 3, 'low', 'Mərkəzi Klinik Xəstəxanası', 'Bakı', '2026-07-05 09:50:11', '2026-07-05 10:00:06'),
	(8, 'B+', 1, 'critical', 'Gəncə Dövlət Xəstəxanası', 'Gəncə', '2026-07-05 09:50:12', '2026-07-05 09:57:22'),
	(10, 'AB+', 4, 'normal', 'New Med', 'Bakı', '2026-07-05 09:50:13', '2026-07-05 09:59:53');

-- Dumping structure for table the_end_db.blood_requests
CREATE TABLE IF NOT EXISTS `blood_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int DEFAULT NULL,
  `hospital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_type` enum('A+','A-','B+','B-','AB+','AB-','0+','0-') COLLATE utf8mb4_unicode_ci NOT NULL,
  `units_needed` int NOT NULL,
  `urgency` enum('normal','urgent','critical') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `status` enum('open','fulfilled','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table the_end_db.blood_requests: ~3 rows (approximately)
INSERT INTO `blood_requests` (`id`, `patient_name`, `age`, `hospital`, `city`, `blood_type`, `units_needed`, `urgency`, `status`, `contact_phone`, `notes`, `created_at`, `updated_at`) VALUES
	(4, 'Sevinc', 24, 'Şirvan Şəhər Mərkəzi Xəstəxanası', 'Şirvan', 'B+', 1, 'urgent', 'open', '0102324524', NULL, '2026-07-05 08:46:57', '2026-07-06 02:56:06'),
	(5, 'Nicat', 22, 'Hərbi Hospital', 'Bakı', 'A-', 1, 'critical', 'open', '0702301405', NULL, '2026-07-05 09:18:56', '2026-07-06 02:57:58'),
	(6, 'Nərmin', 26, 'Naxçıvan Muxtar Respublika Xəstəxanası', 'Naxçıvan', '0-', 1, 'critical', 'open', '0553456776', NULL, '2026-07-06 02:54:09', '2026-07-06 02:55:03');

-- Dumping structure for table the_end_db.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table the_end_db.cache: ~0 rows (approximately)

-- Dumping structure for table the_end_db.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table the_end_db.cache_locks: ~0 rows (approximately)

-- Dumping structure for table the_end_db.donations
CREATE TABLE IF NOT EXISTS `donations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `donor_id` bigint unsigned NOT NULL,
  `hospital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_type` enum('A+','A-','B+','B-','AB+','AB-','0+','0-') COLLATE utf8mb4_unicode_ci NOT NULL,
  `units_donated` int NOT NULL DEFAULT '1',
  `donation_date` date NOT NULL,
  `status` enum('pending','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `donations_donor_id_foreign` (`donor_id`),
  CONSTRAINT `donations_donor_id_foreign` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table the_end_db.donations: ~3 rows (approximately)
INSERT INTO `donations` (`id`, `donor_id`, `hospital`, `city`, `blood_type`, `units_donated`, `donation_date`, `status`, `notes`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Salyan dövlət xəstəxanası', 'Salyan', '0-', 1, '2026-06-17', 'completed', NULL, '2026-06-17 06:12:58', '2026-06-17 06:12:58'),
	(2, 2, 'Medican Xəstəxanası', 'Lənkəran', 'A+', 2, '2026-06-30', 'pending', NULL, '2026-06-30 02:31:24', '2026-07-05 11:13:11'),
	(3, 3, 'Medican Xəstəxanası', 'Bakı', 'B+', 1, '2026-07-05', 'completed', NULL, '2026-07-05 11:25:31', '2026-07-05 11:26:04');

-- Dumping structure for table the_end_db.donors
CREATE TABLE IF NOT EXISTS `donors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_type` enum('A+','A-','B+','B-','AB+','AB-','0+','0-') COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_donation_date` date DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `donors_user_id_foreign` (`user_id`),
  CONSTRAINT `donors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table the_end_db.donors: ~5 rows (approximately)
INSERT INTO `donors` (`id`, `user_id`, `name`, `phone`, `email`, `blood_type`, `city`, `last_donation_date`, `is_available`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'İlahə Əsgərova', '0708855110', 'ilahasgerova@gmail.com', '0-', 'Salyan', '2026-06-17', 1, '2026-06-17 06:06:17', '2026-06-17 06:06:44'),
	(2, NULL, 'Aydan Ağazade', '0102334523', 'aydan@gmail.com', '0+', 'Mingəçevir', NULL, 1, '2026-06-17 06:30:33', '2026-06-17 06:30:33'),
	(3, NULL, 'Vəfa Əsgərova', '0102334333', 'vafasgarova@gmail.com', 'B+', 'Şirvan', NULL, 1, '2026-06-30 02:44:56', '2026-06-30 02:45:43'),
	(4, NULL, 'Zahid Əliyev', '0517074557', 'zahidaliyev@gamil.com', 'B-', 'Gəncə', NULL, 1, '2026-07-05 09:45:49', '2026-07-05 09:45:49'),
	(5, NULL, 'Ayxan Abbasov', '0554322112', 'ayxabbasov@gmail.com', 'A-', 'Sumqayıt', NULL, 1, '2026-07-05 10:05:26', '2026-07-05 10:06:02');

-- Dumping structure for table the_end_db.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table the_end_db.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table the_end_db.hospitals
CREATE TABLE IF NOT EXISTS `hospitals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table the_end_db.hospitals: ~3 rows (approximately)
INSERT INTO `hospitals` (`id`, `name`, `city`, `address`, `phone`, `email`, `is_active`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'Mərkəzi Kliniki Xəstəxana', 'Bakı', 'Parlament pr., 76, 370073', '(99412) 492-10-92', 'mrkzklinka@gmail.com', 1, 'uploads/hospitals/1782372047.jpg', '2026-06-17 06:23:23', '2026-06-25 03:20:47'),
	(2, 'Mərkəzi Neftçilər Xəstəxanası', 'Bakı', 'Y.Səfərov küç., 21', '(+994 12) 404 28 00', 'mrkneftciler@gmail.com', 1, 'uploads/hospitals/1782371835.jpg', '2026-06-17 06:28:51', '2026-06-25 03:17:15'),
	(3, 'Musa Nağıyev adına Təcili Yardım Xəstəxanası', 'Bakı', 'Mərdanov qardaşları küç. 19', 'Tel: (+994 12) 4952886, 4953073', 'MusaNagiyev@gamail.com', 1, 'uploads/hospitals/1782372845.jpg', '2026-06-25 03:34:05', '2026-06-25 03:34:05');

-- Dumping structure for table the_end_db.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table the_end_db.jobs: ~0 rows (approximately)

-- Dumping structure for table the_end_db.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table the_end_db.job_batches: ~0 rows (approximately)

-- Dumping structure for table the_end_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table the_end_db.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_01_01_000001_create_donors_table', 1),
	(5, '2024_01_01_000002_create_blood_requests_table', 1),
	(6, '2024_01_01_000003_create_blood_inventory_table', 1),
	(7, '2024_01_01_000004_create_donations_table', 1),
	(8, '2024_01_01_000005_create_hospitals_table', 1),
	(9, '2024_01_01_000006_add_role_to_users_table', 1),
	(10, '2026_06_18_084608_add_age_to_blood_requests_table', 2),
	(11, '2026_06_25_063320_add_image_to_hospitals_table', 3),
	(12, '2026_06_30_070012_remove_last_donation_date_from_donors_table', 4);

-- Dumping structure for table the_end_db.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table the_end_db.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table the_end_db.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table the_end_db.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('l5yfpPHOcUiHt1JDe1uMg4LOU6H4UnTQHQ7Sb5N5', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJxT0lQRkloRGszdDJtUFFVSlZjcmV4QjA4eGg3N1VoOEpleURoUFphIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9', 1783324596),
	('SVQfhSUiHeqckeirxbDnt7dhgZmuDC2djWMcmUEw', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJvSXliUFdxeTMyRVdzbGlRcnBFUXZpRDk3QmQ0MFNnV2RIZzZ4bzFGIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2VsYXFlIiwicm91dGUiOiJlbGFxZSJ9LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=', 1783265345);

-- Dumping structure for table the_end_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table the_end_db.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@qanbagisi.az', NULL, '$2y$12$0FGtK2nDrvU3PBz/3xQnvOIBJ37pEB/SFoHE0dh4Eiv2exyg9g4dW', 'admin', NULL, '2026-06-20 12:05:49', '2026-06-20 12:05:49');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
