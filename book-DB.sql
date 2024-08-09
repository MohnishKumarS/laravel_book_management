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


-- Dumping database structure for book_management
CREATE DATABASE IF NOT EXISTS `book_management` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `book_management`;

-- Dumping structure for table book_management.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_year` year NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `books_user_id_foreign` (`user_id`),
  CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_management.books: ~7 rows (approximately)
INSERT INTO `books` (`id`, `user_id`, `title`, `image`, `author`, `genre`, `publication_year`, `isbn`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Dont Believe Everything You Think', '1723112844.jpg', 'Joseph Nguyen', 'psychological', '2022', '978-3455234123', '2024-08-08 04:57:24', '2024-08-08 06:04:35'),
	(2, 1, 'The Power of Your Subconscious Mind', '1723113181.jpg', 'Joseph Murphy', 'Fiction', '2014', '979-2334534534', '2024-08-08 05:03:01', '2024-08-08 06:02:23'),
	(3, 2, 'The Girl Who Drank the Moon', '1723113679.jpg', 'Kelly Barnhill', 'science fiction', '2017', '978-4564563452345', '2024-08-08 05:11:19', '2024-08-08 05:11:19'),
	(4, 2, 'Ghosts of The Silent Hills: Stories based on true hauntings', '1723119980.jpg', 'Anita Krishan', 'Adventure', '1999', '867-2342342342', '2024-08-08 06:56:20', '2024-08-08 06:56:20'),
	(5, 3, 'Perspective! For Comic Book Artists', '1723179164.jpg', 'D Chelsea', 'Comics,fiction', '1998', '978-3456354345', '2024-08-08 23:22:44', '2024-08-08 23:22:44'),
	(6, 3, 'Misbelief: What Makes Rational People Believe Irrational Things', '1723179262.jpg', 'Dan Ariely', 'Neroscience', '2010', '987-5674564564', '2024-08-08 23:24:22', '2024-08-08 23:24:22'),
	(7, 4, 'You Are Born To Blossom', '1723179463.jpg', 'Dr. APJ Abdul Kalam', 'Biography', '2009', '978-456456546', '2024-08-08 23:27:43', '2024-08-08 23:27:43');

-- Dumping structure for table book_management.failed_jobs
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

-- Dumping data for table book_management.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table book_management.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_management.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(13, '2014_10_12_000000_create_users_table', 1),
	(14, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(15, '2014_10_12_100000_create_password_resets_table', 1),
	(16, '2019_08_19_000000_create_failed_jobs_table', 1),
	(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(19, '2024_08_08_082051_create_books_table', 2);

-- Dumping structure for table book_management.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_management.password_resets: ~0 rows (approximately)

-- Dumping structure for table book_management.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_management.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table book_management.personal_access_tokens
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

-- Dumping data for table book_management.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table book_management.users
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_management.users: ~5 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'moni', 'admin@gmail.com', NULL, '$2y$12$oUS0Dm3EU/uyPXic1uRtfeNFhtmym1NXz4XdxypaaBhmIWZ0uZCzS', 'admin', NULL, '2024-08-08 04:35:10', '2024-08-08 04:35:10'),
	(2, 'sam', 'sam@gmail.com', NULL, '$2y$12$S0TObxMFZ39RMyRldCCWXO4H8kTBFuFHSNP94thi.7uo1RmZG1DKm', 'user', NULL, '2024-08-08 06:43:57', '2024-08-08 06:43:57'),
	(3, 'lee', 'lee@gmail.com', NULL, '$2y$12$xqWetBQ5gjObFtv7UdshfuMWn2fQwxns9erfycuXML/JRZT8V246m', 'user', NULL, '2024-08-08 23:20:27', '2024-08-08 23:20:27'),
	(4, 'yasu', 'yasu@gmail.com', NULL, '$2y$12$Y3fk.FvwSo.MISr/g2LoMeWFNU8XDBtA9QArrhOhzcSK.n7aFkVWC', 'user', NULL, '2024-08-08 23:24:58', '2024-08-08 23:24:58'),
	(5, 'priya', 'priya@gmail.com', NULL, '$2y$12$ZHRKuofTgEHoq2q4dB/S.u7UiftHXr08xKniE2GwCY1GNVBa9u1F2', 'user', NULL, '2024-08-09 01:56:47', '2024-08-09 01:56:47');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
