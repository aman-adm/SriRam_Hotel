-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2025 at 08:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aman`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `content`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.\r\nReference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.\r\nReference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', '2025-04-27 10:00:52', '2025-04-27 10:12:34', 'about/qg5L3z67Pcti9ApA99tIHsMZYmNRa8BlA5H2B0mk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bed Room', '<p>\r\n\r\n<span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255)\">Reference site about<span>&nbsp;</span></span><em style=\"font-weight: bold; color: rgb(118, 118, 118); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255)\">Lorem</em><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255)\"><span>&nbsp;</span>Ipsum, giving information on its origins, as well as a random Lipsum generator.</span>\r\n<br /></p>\r\n<p><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255)\">\r\n\r\n<span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255)\">Reference site about<span>&nbsp;</span></span><em style=\"font-weight: bold; color: rgb(118, 118, 118); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255)\">Lorem</em><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255)\"><span>&nbsp;</span>Ipsum, giving information on its origins, as well as a random Lipsum generator.</span>\r\n<br /></span></p>', 'images/blog/ol0VmlZl0SVQdlalcWq1zw6LtHGjBaFmoGvB2IJ4.jpg', '2025-04-27 09:44:21', '2025-04-27 09:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `adults` int(11) DEFAULT NULL,
  `children` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'waiting',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL DEFAULT 'bank_transfer',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `name`, `email`, `phone`, `check_in`, `check_out`, `adults`, `children`, `status`, `created_at`, `updated_at`, `payment_method`, `user_id`, `start_date`, `end_date`) VALUES
(1, 3, 'rajkumar', 'pradeep380@gmail.com', '9026966436', NULL, NULL, NULL, NULL, 'pending', '2025-04-27 22:21:10', '2025-04-27 22:21:10', 'cash', 1, '2025-04-28', '2025-04-29'),
(2, 2, 'Aman pandey', 'mohan20@gmail.com', '9026966436', NULL, NULL, NULL, NULL, 'pending', '2025-04-27 23:08:27', '2025-04-27 23:08:27', 'cash', NULL, '2025-04-28', '2025-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `color_models`
--

CREATE TABLE `color_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_color` varchar(255) NOT NULL,
  `base_color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color_models`
--

INSERT INTO `color_models` (`id`, `text_color`, `base_color`, `created_at`, `updated_at`) VALUES
(1, '#ffffff', '#e70808', NULL, '2025-04-27 09:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Aman pandey', 'pandeyaman0024@gmail.com', '9026966436', 'This new msg for me', '2025-04-27 09:45:29', '2025-04-27 09:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallaries`
--

CREATE TABLE `gallaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallaries`
--

INSERT INTO `gallaries` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, '1745766795.jpg', '2025-04-27 09:43:15', '2025-04-27 09:43:15'),
(2, '1745814546-2044.jpg', '2025-04-27 22:59:07', '2025-04-27 22:59:07'),
(3, '1745814547-5613.png', '2025-04-27 22:59:07', '2025-04-27 22:59:07'),
(4, '1745814547-4375.png', '2025-04-27 22:59:07', '2025-04-27 22:59:07'),
(5, '1745814547-9059.jpg', '2025-04-27 22:59:07', '2025-04-27 22:59:07'),
(6, '1745814547-7730.jpg', '2025-04-27 22:59:07', '2025-04-27 22:59:07'),
(7, '1745814547-8780.jpg', '2025-04-27 22:59:07', '2025-04-27 22:59:07'),
(8, '1745814547-1751.jpg', '2025-04-27 22:59:07', '2025-04-27 22:59:07'),
(9, '1745814547-2818.jpg', '2025-04-27 22:59:07', '2025-04-27 22:59:07'),
(10, '1745814547-3273.jpg', '2025-04-27 22:59:07', '2025-04-27 22:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_icon` varchar(255) DEFAULT NULL,
  `favicon_icon` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo_icon`, `favicon_icon`, `status`, `action`, `created_at`, `updated_at`) VALUES
(1, 'XXEpWRLv7omNKB2LNGKtwpe2Tk7T6S.png', '1m6DeFk8wRIpmiI4LCNnt5QzAywVVm.png', 'active', 'show', '2025-04-27 09:48:58', '2025-04-27 09:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_09_094140_create_color_models_table', 1),
(5, '2025_04_12_093245_create_rooms_table', 1),
(6, '2025_04_13_075002_create_bookings_table', 1),
(7, '2025_04_13_094906_add_status_field_to_bookings', 1),
(8, '2025_04_13_141820_create_gallaries_table', 1),
(9, '2025_04_13_164427_create_contacts_table', 1),
(10, '2025_04_13_175416_create_logo_table', 1),
(11, '2025_04_16_041918_create_hotels_table', 1),
(12, '2025_04_17_111211_create_notifications_table', 1),
(13, '2025_04_18_111055_create_products_table', 1),
(14, '2025_04_20_143727_add_capacity_to_rooms_table', 1),
(15, '2025_04_23_061129_add_payment_method_to_bookings_table', 1),
(16, '2025_04_23_062147_add_default_to_payment_method_in_bookings', 1),
(17, '2025_04_23_142746_create_about_table', 1),
(18, '2025_04_24_041626_create_blogs_table', 1),
(19, '2025_04_24_104906_create_slides_table', 1),
(20, '2025_04_27_145508_create_about_us_table', 1),
(21, '2025_04_27_150056_add_user_id_to_bookings_table', 2),
(23, '2025_04_27_152639_add_room_id_to_bookings_table', 3),
(24, '2025_04_27_152919_add_image_to_about_us_table', 3),
(25, '2025_04_28_025401_add_start_end_date_to_bookings_table', 4),
(26, '2025_04_28_031241_make_checkin_nullable_in_bookings_table', 5),
(27, '2025_04_28_032029_make_check_in_nullable_in_bookings_table', 6),
(28, '2025_04_28_032507_make_check_out_nullable_in_bookings_table', 7),
(29, '2025_04_28_033116_make_adults_nullable_in_bookings_table', 8),
(30, '2025_04_28_033536_make_children_nullable_in_bookings_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `wifi` varchar(255) NOT NULL DEFAULT 'yes',
  `room_type` varchar(255) DEFAULT NULL,
  `adults` int(12) DEFAULT NULL,
  `children` int(12) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_title`, `image`, `description`, `price`, `wifi`, `room_type`, `adults`, `children`, `created_at`, `updated_at`) VALUES
(14, 'Regular', '[\"uploads\\/rooms\\/17458193921697.jpg\",\"uploads\\/rooms\\/17458193928512.jpg\"]', '<p>\r\n\r\n<span style=\" font-size: 14px; text-align: center; color: rgb(71, 71, 71); font-family: Arial, sans-serif; background-color: rgb(255, 255, 255)\">Reference site about<span>&nbsp;</span></span><em style=\" font-size: 14px; text-align: center; font-weight: bold; color: rgb(118, 118, 118); font-family: Arial, sans-serif; background-color: rgb(255, 255, 255)\">Lorem</em><span style=\" font-size: 14px; text-align: center; color: rgb(71, 71, 71); font-family: Arial, sans-serif; background-color: rgb(255, 255, 255)\"><span>&nbsp;</span>Ipsum, giving information on its origins, as well as a random Lipsum generator.</span>\r\n<br /></p>', '234', '1', 'regular', 2, 2, '2025-04-28 00:19:52', '2025-04-28 00:19:52'),
(15, 'Deluxe', '[\"uploads\\/rooms\\/17458194852389.jpg\",\"uploads\\/rooms\\/17458194853880.jpg\"]', '<p>\r\n\r\n<span style=\" font-size: 14px; text-align: center; color: rgb(71, 71, 71); font-family: Arial, sans-serif; background-color: rgb(255, 255, 255)\">Reference site about<span>&nbsp;</span></span><em style=\" font-size: 14px; text-align: center; font-weight: bold; color: rgb(118, 118, 118); font-family: Arial, sans-serif; background-color: rgb(255, 255, 255)\">Lorem</em><span style=\" font-size: 14px; text-align: center; color: rgb(71, 71, 71); font-family: Arial, sans-serif; background-color: rgb(255, 255, 255)\"><span>&nbsp;</span>Ipsum, giving information on its origins, as well as a random Lipsum generator.</span>\r\n<br /></p>', '234', '1', 'deluxe', 4, 2, '2025-04-28 00:21:25', '2025-04-28 00:21:25'),
(17, 'Deluxe', '[\"uploads\\/rooms\\/17458197788297.jpg\",\"uploads\\/rooms\\/17458197787697.jpg\",\"uploads\\/rooms\\/17458197783347.jpg\"]', '<p>\r\n\r\n<div class=\"eKjLze\" style=\"color: rgb(31, 31, 31); font-family: Arial, sans-serif; background-color: rgb(255, 255, 255)\"><div class=\"Y6JuXb\"><div data-hveid=\"CBEQAA\" data-ved=\"2ahUKEwjWxoWzhfqMAxWUZvUHHXhPLQ4QFSgAegQIERAA\"><div class=\"tF2Cxc\" style=\"position: relative\"><div class=\"IsZvec\" style=\"max-width: 48em; color: rgb(77, 81, 86); line-height: 1.58\"><div class=\"VwiC3b yXK7lf p4wth r025kc hJNv6b Hdw6tb\" style=\"text-align: center; font-family: Arial, sans-serif; font-size: 14px; line-height: 22px; color: rgb(71, 71, 71); word-break: break-word; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden; -webkit-line-clamp: 2;\"><span>Reference site about<span>&nbsp;</span><em style=\"font-weight: bold; color: rgb(118, 118, 118)\">Lorem</em><span>&nbsp;</span>Ipsum, giving information on its origins, as well as a random Lipsum generator.</span></div></div></div></div></div></div><div style=\"text-align: center;\"><span style=\"color: rgb(31, 31, 31); font-family: Arial, sans-serif;\"><br /></span></div><div style=\"text-align: center;\"><br /></div></p>', '2340', '1', 'deluxe', 1, 1, '2025-04-28 00:26:18', '2025-04-28 00:26:18'),
(18, 'demo room', '[\"uploads\\/rooms\\/17458227003005.jpg\",\"uploads\\/rooms\\/17458227005324.jpg\",\"uploads\\/rooms\\/17458227001972.jpg\",\"uploads\\/rooms\\/17458227006867.jpg\",\"uploads\\/rooms\\/17458227017431.jpg\",\"uploads\\/rooms\\/17458227015812.jpg\"]', '<p>hello aman</p>', '234', '1', 'regular', 2, 2, '2025-04-28 01:15:00', '2025-04-28 01:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('RsW7aByTNiJbO7bx10ul1OC9Gp3mjtEPHkDNd2oh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMGZ2YldvaFJoYWw4dlpjOWJZMFRSMTdya28xVlNUeDhGSkowTTRIbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yb29tX2RldGFpbHMvMTgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1745822843);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(3, 'The Ram Krishna Palace hotel', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.\r\nReference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.\r\nReference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'slides/uXo4KhAShb6YqGfPGJOsGKiBDKtMB8NMTyHh54ws.webp', '2025-04-27 10:11:26', '2025-04-27 10:11:26'),
(4, 'Hotel Ram Krishna', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.\r\nReference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'slides/iD2xQ4rRKE9grefaFhvLITf2O4K7GYJBtOFnMXBm.webp', '2025-04-27 10:11:53', '2025-04-27 10:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('customer','admin') NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `profile_image`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'bholenath', 'bholenath23@gmail.com', NULL, '9026966436', 'profile_image/1745768275_gallery5.jpg', '$2y$12$k/tnANwQ.M6IeLj5dIrG4.BQSYjoc06f1m.2QOXgLqYkLunBavD36', 'admin', NULL, '2025-04-27 09:29:33', '2025-04-27 10:07:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
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
-- Indexes for table `color_models`
--
ALTER TABLE `color_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallaries`
--
ALTER TABLE `gallaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `color_models`
--
ALTER TABLE `color_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallaries`
--
ALTER TABLE `gallaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
