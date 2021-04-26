-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 10:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `santi`
--

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `created_at`, `updated_at`, `user_id`, `currency_id`, `amount`) VALUES
(1, '2021-04-22 19:41:07', '2021-04-26 08:55:24', 1, 8, '3337');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cvc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `created_at`, `updated_at`, `name`, `user_id`, `card_number`, `exp_month`, `exp_year`, `cvc`) VALUES
(1, '2021-04-26 11:33:09', '2021-04-26 11:33:09', 'fdsaf', 1, '4242424242424242', '12', '2021', '343'),
(2, '2021-04-26 11:40:46', '2021-04-26 11:40:46', 'fdsaf', 1, '32431521534', '12', '2021', '145');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(8, 'EUR', 'eur', NULL, NULL),
(9, 'USD', 'usd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction` tinyint(1) NOT NULL DEFAULT 0,
  `card_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `created_at`, `updated_at`, `user_id`, `amount`, `description`, `transaction`, `card_id`) VALUES
(1, '2021-04-24 08:13:38', '2021-04-24 08:13:38', 1, '220', 'jiojioj', 0, 'ch_1Ijo6uKn7gJR4yrn5L4ad6y2'),
(2, '2021-04-24 09:20:26', '2021-04-24 09:20:26', 1, '250', 'fdsafdsafda', 1, NULL),
(3, '2021-04-26 08:41:32', '2021-04-26 08:41:32', 1, '100', '543254', 1, NULL),
(4, '2021-04-26 08:42:51', '2021-04-26 08:42:51', 1, '500', 'fdsafdsa', 1, NULL),
(5, '2021-04-26 08:44:45', '2021-04-26 08:44:45', 1, '1000', 'fdsada', 1, NULL),
(6, '2021-04-26 08:48:55', '2021-04-26 08:48:55', 1, '100', 'safdf', 0, 'ch_1IkXcCKn7gJR4yrn7iiQ3cMs'),
(7, '2021-04-26 08:52:00', '2021-04-26 08:52:00', 1, '1000', 'rewqreq', 0, 'ch_1IkXfAKn7gJR4yrnzIpkLKhK'),
(8, '2021-04-26 08:55:26', '2021-04-26 08:55:26', 1, '1', 'dsafd', 0, 'ch_1IkXiUKn7gJR4yrnJX5pfiJK');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2021_03_20_032525_create_sessions_table', 1),
(10, '2021_03_31_160812_create_invoices', 1),
(11, '2021_03_31_161354_create_transaction_table', 1),
(12, '2019_05_03_000001_create_customer_columns', 2),
(13, '2019_05_03_000002_create_subscriptions_table', 2),
(14, '2019_05_03_000003_create_subscription_items_table', 2),
(15, '2021_04_23_023110_create_currencies_table', 3),
(16, '2021_04_23_023451_create_balances_table', 3),
(17, '2021_04_26_184613_create_table_cards', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FnUD6AuWZevEonJcDFN3wXqN3XpJkNVpceOm4k0K', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRmVSbnRLeVBESGx3YklpRW5yZUxPZ1diN3ZBVXBaRExkRTZLTXh6cSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9jdXN0b21lcnMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkMExaZGFWUi9MLmxzNy92MUEuVFlQdUNGNmZwNVRPZGxtMC5Bdy9RMnE0YVg3TWtSd0guL08iO30=', 1619288637),
('HiH2B1S7Vjc8S4SIb8KYPqo8k2PW7OTunWAGiUeW', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicHlmSktBd2pzT3d0OVBUTW5jR1c4RTBZcGdOWFhrR1ZYUFhhMHYwQiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDBMWmRhVlIvTC5sczcvdjFBLlRZUHVDRjZmcDVUT2RsbTAuQXcvUTJxNGFYN01rUndILi9PIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluL21hbmFnZW1lbnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjc6InN1Y2Nlc3MiO3M6MTM6IlN1Y2Nlc3NmdWxseSEiO30=', 1619285981),
('HizYoGr453mlEHd6sE5ZlW0ayUmbAf8JgmCaf5sF', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZWZldFllSVBLNGNCaUNmV2lra2xoc1FVZ2szZXZmUTVORXNEUFNCZyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJE15eDFOaWVQd0pHY2JKRi9aRTVKUnVUQmliVWpoRk5YcWxZclNJRmtuL1A2cDNGd0tqSy5XIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2JpbGxpbmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1619290005),
('HUkoi1K5c9dpucIEtOpEl2GrYHOCvEiwCP9UaT4e', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVVppNVRVMkk2WWk1eVNqb1dqWjVuWTNBcTVFVFBXRnF1UUppYnRCWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9jdXN0b21lcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkMExaZGFWUi9MLmxzNy92MUEuVFlQdUNGNmZwNVRPZGxtMC5Bdy9RMnE0YVg3TWtSd0guL08iO30=', 1619468968),
('mV4OeMWQVMOWErFdiezUE2POgU8JvBC3HPZglPSD', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiV3NZZFN2bnZLNTZQNWU0Q1NpU2pUYURsbTVkS1FRU2lpYmhJWHhlUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkTXl4MU5pZVB3SkdjYkpGL1pFNUpSdVRCaWJVamhGTlhxbFlyU0lGa24vUDZwM0Z3S2pLLlciO30=', 1619468622),
('ORjLidsmIxFOtRKAaRWkAklv4vaZt09orSzOwPom', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia0xYVWpMWVNUVGM2a0pOeHd5NlV4enZHRWYzS1ZSWW9oMElLSUdnWSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJE15eDFOaWVQd0pHY2JKRi9aRTVKUnVUQmliVWpoRk5YcWxZclNJRmtuL1A2cDNGd0tqSy5XIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1619284543),
('ZS2cnvhSK15sITIB2YfcfcUEp8QpWIskOuE0t0cW', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSWRUSnVDcFdjWnMzV0E2d0QxVEN5Y29KaFZIOWRYYXlEUm53dzk4YyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9jdXN0b21lcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkMExaZGFWUi9MLmxzNy92MUEuVFlQdUNGNmZwNVRPZGxtMC5Bdy9RMnE0YVg3TWtSd0guL08iO3M6Nzoic3VjY2VzcyI7czoxMzoiU3VjY2Vzc2Z1bGx5ISI7fQ==', 1619457482);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'pand\'s Team', 1, '2021-04-22 10:59:30', '2021-04-22 10:59:30'),
(2, 2, 'admin\'s Team', 1, '2021-04-22 20:56:34', '2021-04-22 20:56:34'),
(3, 8, 'customer\'s Team', 1, '2021-04-23 19:30:23', '2021-04-23 19:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `created_at`, `updated_at`, `sender_id`, `amount`, `receiver_id`, `description`, `type`, `balance`) VALUES
(2, '2021-04-23 10:03:53', '2021-04-23 10:03:53', NULL, '100', 1, NULL, 'add_fund', '0'),
(3, '2021-04-23 10:20:44', '2021-04-23 10:20:44', NULL, '150', 1, NULL, 'add_fund', '0'),
(4, '2021-04-23 10:20:57', '2021-04-23 10:20:57', NULL, '100', 1, NULL, 'add_fund', '0'),
(5, '2021-04-23 12:06:17', '2021-04-23 12:06:17', NULL, '100', 1, NULL, 'add_fund', '0'),
(6, '2021-04-23 12:06:53', '2021-04-23 12:06:53', NULL, '100', 1, NULL, 'add_fund', '0'),
(7, '2021-04-23 12:10:27', '2021-04-23 12:10:27', NULL, '100', 1, NULL, 'add_fund', '0'),
(8, '2021-04-23 12:10:43', '2021-04-23 12:10:43', NULL, '200', 1, NULL, 'add_fund', '0'),
(9, '2021-04-23 12:12:35', '2021-04-23 12:12:35', NULL, '100', 1, NULL, 'add_fund', '0'),
(10, '2021-04-23 12:14:14', '2021-04-23 12:14:14', NULL, '123', 1, NULL, 'add_fund', '0'),
(11, '2021-04-23 12:15:30', '2021-04-23 12:15:30', NULL, '232', 1, NULL, 'add_fund', '0'),
(12, '2021-04-23 12:16:32', '2021-04-23 12:16:32', NULL, '123', 1, NULL, 'add_fund', '4227'),
(13, '2021-04-23 17:17:57', '2021-04-23 17:17:57', 2, '500', 1, NULL, 'payment', '2627'),
(14, '2021-04-23 19:27:19', '2021-04-23 19:27:19', 2, '8', 1, '1254325', 'payment', '2619'),
(15, '2021-04-23 19:27:48', '2021-04-23 19:27:48', 2, '500', 1, 'fasgsagdsag', 'payment', '2119'),
(16, '2021-04-24 07:03:16', '2021-04-24 07:03:16', NULL, '100', 1, NULL, 'add_fund', '2219'),
(17, '2021-04-24 07:12:48', '2021-04-24 07:12:48', NULL, '100', 1, NULL, 'add_fund', '2319'),
(18, '2021-04-24 07:40:21', '2021-04-24 07:40:21', NULL, '100', 1, NULL, 'add_fund', '2419'),
(19, '2021-04-24 07:45:24', '2021-04-24 07:45:24', NULL, '152', 1, NULL, 'add_fund', '2571'),
(20, '2021-04-24 08:00:32', '2021-04-24 08:00:32', NULL, '220', 1, NULL, 'add_fund', '2791'),
(21, '2021-04-24 08:05:31', '2021-04-24 08:05:31', NULL, '220', 1, NULL, 'add_fund', '3011'),
(22, '2021-04-24 08:06:01', '2021-04-24 08:06:01', NULL, '220', 1, NULL, 'add_fund', '3231'),
(23, '2021-04-24 08:12:38', '2021-04-24 08:12:38', NULL, '220', 1, NULL, 'add_fund', '3451'),
(24, '2021-04-24 08:13:36', '2021-04-24 08:13:36', NULL, '220', 1, NULL, 'add_fund', '3671'),
(25, '2021-04-24 09:20:26', '2021-04-24 09:20:26', 2, '250', 1, 'fdsafdsafda', 'payment', '3421'),
(26, '2021-04-24 10:45:38', '2021-04-24 10:45:38', NULL, '5', 1, NULL, 'add_fund', '3426'),
(27, '2021-04-24 10:46:41', '2021-04-24 10:46:41', NULL, '5', 1, NULL, 'add_fund', '3431'),
(28, '2021-04-24 10:49:29', '2021-04-24 10:49:29', NULL, '5', 1, NULL, 'add_fund', '3436'),
(29, '2021-04-26 08:41:32', '2021-04-26 08:41:32', 2, '100', 1, '543254', 'payment', '3336'),
(30, '2021-04-26 08:42:51', '2021-04-26 08:42:51', 2, '500', 1, 'fdsafdsa', 'payment', '2836'),
(31, '2021-04-26 08:44:45', '2021-04-26 08:44:45', 2, '1000', 1, 'fdsada', 'payment', '1836'),
(32, '2021-04-26 08:48:06', '2021-04-26 08:48:06', NULL, '100', 1, NULL, 'add_fund', '1936'),
(33, '2021-04-26 08:48:28', '2021-04-26 08:48:28', NULL, '100', 1, NULL, 'add_fund', '2036'),
(34, '2021-04-26 08:48:52', '2021-04-26 08:48:52', NULL, '100', 1, NULL, 'add_fund', '2136'),
(35, '2021-04-26 08:50:44', '2021-04-26 08:50:44', NULL, '200', 1, NULL, 'add_fund', '2336'),
(36, '2021-04-26 08:51:58', '2021-04-26 08:51:58', NULL, '1000', 1, NULL, 'add_fund', '3336'),
(37, '2021-04-26 08:55:24', '2021-04-26 08:55:24', NULL, '1', 1, NULL, 'add_fund', '3337');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nick_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `nick_name`, `phone`, `address`, `bio`, `email`, `is_admin`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `is_active`) VALUES
(1, 'pand', NULL, NULL, NULL, NULL, NULL, NULL, 'pandakjm@outlook.com', 0, NULL, '$2y$10$Myx1NiePwJGcbJF/ZE5JRuTBibUjhFNXqlYrSIFkn/P6p3FwKjK.W', NULL, NULL, 'PeWISe55Enkms4THeZgjjaUgE0uPntuezbeG0kTsG4NPXS23fk5ddc1aumvD', NULL, NULL, '2021-04-22 10:59:30', '2021-04-23 07:33:46', NULL, NULL, NULL, NULL, 1),
(2, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, 'admin@gmail.com', 1, NULL, '$2y$10$0LZdaVR/L.ls7/v1A.TYPuCF6fp5TOdlm0.Aw/Q2q4aX7MkRwH./O', NULL, NULL, '8g96i2bAiO7GWEzv33Zfc6GtCMr9eTdGEbhsZbS3cvqBmGcV1UJ4QnASYvrg', NULL, NULL, '2021-04-22 20:56:34', '2021-04-22 20:56:34', NULL, NULL, NULL, NULL, 1),
(8, 'customer 2', NULL, NULL, NULL, NULL, NULL, NULL, 'customer2@gmail.com', 0, NULL, '$2y$10$BzcnGplnZegS71Dx1zha3edKpVIaQhsVODiSKc7TOGe1nFDXuSXCe', NULL, NULL, NULL, NULL, NULL, '2021-04-23 19:30:23', '2021-04-23 19:30:23', NULL, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_plan_unique` (`subscription_id`,`stripe_plan`),
  ADD KEY `subscription_items_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
