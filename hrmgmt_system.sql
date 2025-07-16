-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 06:50 PM
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
-- Database: `hrmgmt_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-07-15', 'Absent', '2025-07-15 09:58:56', '2025-07-15 09:58:56'),
(2, 3, '2025-07-15', 'Present', '2025-07-15 09:58:56', '2025-07-15 09:58:56'),
(3, 4, '2025-07-15', 'Absent', '2025-07-15 09:58:56', '2025-07-15 09:58:56'),
(4, 1, '2025-07-14', 'Present', '2025-07-15 10:05:09', '2025-07-15 10:05:09'),
(5, 3, '2025-07-14', 'Absent', '2025-07-15 10:05:09', '2025-07-15 10:05:09'),
(6, 4, '2025-07-14', 'Present', '2025-07-15 10:05:09', '2025-07-15 10:05:09'),
(7, 1, '2025-07-16', 'Present', '2025-07-16 04:06:28', '2025-07-16 04:06:28'),
(8, 3, '2025-07-16', 'Present', '2025-07-16 04:06:28', '2025-07-16 04:06:28'),
(9, 4, '2025-07-16', 'Present', '2025-07-16 04:06:28', '2025-07-16 04:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Finance', '2025-07-09 09:49:23', '2025-07-09 09:49:45'),
(2, 'IT', '2025-07-09 10:01:43', '2025-07-09 10:01:43'),
(3, 'Sales', '2025-07-16 04:43:08', '2025-07-16 04:43:08'),
(4, 'Technical Support', '2025-07-16 04:43:22', '2025-07-16 05:27:53'),
(5, 'Marketing', '2025-07-16 05:27:17', '2025-07-16 05:27:17');

-- --------------------------------------------------------

--
-- Table structure for table `employeeleaves`
--

CREATE TABLE `employeeleaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employeeleaves`
--

INSERT INTO `employeeleaves` (`id`, `employee_id`, `leave_type`, `start_date`, `end_date`, `reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Casual Leave', '2025-07-10', '2025-07-13', 'ki', 'rejected', '2025-07-10 11:38:00', '2025-07-15 11:20:15'),
(2, 1, 'Casual Leave', '2025-07-10', '2025-07-10', 'ch', 'approved', '2025-07-10 12:19:38', '2025-07-15 11:38:43'),
(3, 3, 'Casual Leave', '2025-07-15', '2025-07-16', '3rd', 'pending', '2025-07-15 11:50:47', '2025-07-15 11:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `date_of_joining` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unblocked',
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `attendance` varchar(255) NOT NULL DEFAULT 'Absent'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`, `department`, `date_of_joining`, `phone`, `address`, `status`, `rating`, `created_at`, `updated_at`, `attendance`) VALUES
(1, 'arya', 'employee@gmail.com', 'employee', 'Sales', '2025-07-08', '9995407899', 'address1', 'unblocked', 4, '2025-07-09 12:25:17', '2025-07-15 09:51:27', 'Present'),
(2, 'employee2', 'employee2@gmail.com', '2222', 'Finance', '2025-07-09', '0987654321', 'address', 'unblocked', 4, '2025-07-09 12:26:45', '2025-07-15 03:59:56', 'Absent'),
(3, 'employee3', 'employee3@gmail.com', '321', 'Sales', '2025-07-09', '1234567890', 'addres', 'blocked', 4, '2025-07-09 12:30:32', '2025-07-16 04:28:44', 'Present'),
(4, 'Krish', 'krish@gmail.com', 'krish', 'Sales', '2025-07-14', '1234567890', 'ffffffff', 'unblocked', 2, '2025-07-15 09:33:19', '2025-07-15 12:02:37', 'Present'),
(5, 'Suhara', 'suhara@gmail.com', 'suhara123', 'IT', '2025-07-16', '9995407899', 'test', 'unblocked', NULL, '2025-07-16 05:34:28', '2025-07-16 05:34:28', 'Absent');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hrs`
--

CREATE TABLE `hrs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `joining_date` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hrs`
--

INSERT INTO `hrs` (`id`, `name`, `email`, `department`, `joining_date`, `phone`, `address`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Jasna', 'jasna@gamil.com', 'IT', '2025-07-08', '1234567890', 'erfghj', '2025-07-09 08:21:13', '2025-07-16 04:07:10', 1),
(2, 'Ammu', 'ammu@gmail.com', 'Sales', '2025-07-09', '0987654321', 'erfghj', '2025-07-09 08:27:09', '2025-07-09 09:12:52', 1),
(3, 'achu', 'achu@gmail.com', 'Finance', '2025-07-10', '1234567890', 'ggghgh', '2025-07-10 05:21:03', '2025-07-10 05:21:03', 1),
(4, 'hr1', 'hr@gmail.com', 'HR', '2025-07-15', '1234567890', 'dfdf', '2025-07-15 11:56:44', '2025-07-16 05:29:22', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leave_name` varchar(255) NOT NULL,
  `leave_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `leave_name`, `leave_number`, `created_at`, `updated_at`) VALUES
(1, 'Casual Leave', 5, '2025-07-09 09:34:19', '2025-07-09 09:40:18'),
(2, 'Sick Leave', 12, '2025-07-16 04:45:14', '2025-07-16 04:45:14'),
(3, 'Earned Leave', 5, '2025-07-16 05:31:41', '2025-07-16 05:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_09_114941_create_employees_table', 2),
(5, '2025_07_09_122120_add_status_to_employees_table', 3),
(6, '2025_07_09_134514_create_hrs_table', 4),
(7, '2025_07_09_143509_add_status_to_hrs_table', 5),
(8, '2025_07_09_145736_create_leaves_table', 6),
(9, '2025_07_09_151250_create_departments_table', 7),
(10, '2025_07_09_174459_create_employees_table', 8),
(11, '2025_07_10_004344_add_rating_to_employees_table', 9),
(12, '2025_07_10_132245_create_employeeleaves_table', 10),
(13, '2025_07_10_173337_create_performance_ratings_table', 11),
(14, '2025_07_15_150548_add_attendance_to_employees_table', 12),
(15, '2025_07_15_151852_create_attendances_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performance_ratings`
--

CREATE TABLE `performance_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1F7LubTw8Mb4VswxMCU9PplwZWFO505xk0Y2Q83q', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibmEzdXBkQkVESjI5TVRnRU1NT281WnUzZnVNbUsxdWxPdHZsaVk4OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjQ6Imh0dHA6Ly9sb2NhbGhvc3QvTGFyYXZlbEFwcHMvaHJtZ210X3N5c3RlbS9wdWJsaWMvZW1wbG95ZWUvYWJvdXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ5OiJsb2dpbl9ocl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxODoiZW1wbG95ZWVfbG9nZ2VkX2luIjtiOjE7czoxMToiZW1wbG95ZWVfaWQiO2k6NTt9', 1752663930),
('iV2ReyoeqdGezc9AI4LpDoqWekcB0qksgA20qMCk', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidW1ReG5JeTloSGFUUFdFSTA2SXJyMkFPU0lmNmNob0FSSVJYM1RZdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9sb2NhbGhvc3QvTGFyYXZlbEFwcHMvaHJtZ210X3N5c3RlbS9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1752657170),
('LhgjaLJERYPLpLvIrpisad2Alz1W7NEbOsJo3a8a', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTHBTdXVGQXJYUzVHdklvWGFBRWxSU3FBczg1RXFlR1JObk5oOEh1ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly9sb2NhbGhvc3QvTGFyYXZlbEFwcHMvaHJtZ210X3N5c3RlbS9wdWJsaWMvaHIvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ5OiJsb2dpbl9ocl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNToiYWRtaW5fbG9nZ2VkX2luIjtiOjE7fQ==', 1752658134),
('QQNttFQctHxYOmehNVpshlu7SmPQWNUYvfmkHQEv', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSXpqeXQ5OWlCWVljcVlFcHlpcFVOZ3Q1TnZHWGJURlB2akZ1cE5uUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzE6Imh0dHA6Ly9sb2NhbGhvc3QvTGFyYXZlbEFwcHMvaHJtZ210X3N5c3RlbS9wdWJsaWMvYWRtaW4vZGVwYXJ0bWVudC92aWV3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxNToiYWRtaW5fbG9nZ2VkX2luIjtiOjE7fQ==', 1752682742),
('SzmdURKK1954IVJAJ4hSm9z3E7b8WdsWqFxJLUUC', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicjBGdmk4Q1F5QTlQdVVXMmdyakNBYkxSRG1RZG80UjBVYXBDSmd1VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzA6Imh0dHA6Ly9sb2NhbGhvc3QvTGFyYXZlbEFwcHMvaHJtZ210X3N5c3RlbS9wdWJsaWMvZW1wbG95ZWUvcGVyZm9ybWFuY2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE1OiJhZG1pbl9sb2dnZWRfaW4iO2I6MTtzOjE4OiJlbXBsb3llZV9sb2dnZWRfaW4iO2I6MTtzOjExOiJlbXBsb3llZV9pZCI7aToxO30=', 1752669873);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_employee_id_foreign` (`employee_id`);

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
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- Indexes for table `employeeleaves`
--
ALTER TABLE `employeeleaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeleaves_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hrs`
--
ALTER TABLE `hrs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hrs_email_unique` (`email`);

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
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `performance_ratings`
--
ALTER TABLE `performance_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `performance_ratings_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employeeleaves`
--
ALTER TABLE `employeeleaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hrs`
--
ALTER TABLE `hrs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `performance_ratings`
--
ALTER TABLE `performance_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employeeleaves`
--
ALTER TABLE `employeeleaves`
  ADD CONSTRAINT `employeeleaves_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `performance_ratings`
--
ALTER TABLE `performance_ratings`
  ADD CONSTRAINT `performance_ratings_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
