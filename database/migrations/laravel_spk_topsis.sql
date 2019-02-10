-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Feb 2019 pada 14.11
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_spk_topsis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatives`
--

CREATE TABLE `alternatives` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alternatives`
--

INSERT INTO `alternatives` (`id`, `name`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Galaxy', '0', '-', '2019-02-10 04:57:20', '2019-02-10 04:57:20'),
(2, 'Iphone', '0', '-', '2019-02-10 04:57:32', '2019-02-10 04:57:32'),
(3, 'BB', '0', '-', '2019-02-10 04:57:41', '2019-02-10 04:57:41'),
(4, 'Lumia', '0', '-', '2019-02-10 04:57:52', '2019-02-10 04:57:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `criterias`
--

CREATE TABLE `criterias` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `criterias`
--

INSERT INTO `criterias` (`id`, `name`, `weight`, `created_at`, `updated_at`) VALUES
(1, 'Harga', 4, '2019-02-10 04:56:05', '2019-02-10 04:56:05'),
(2, 'Kualitas', 5, '2019-02-10 04:56:14', '2019-02-10 04:56:14'),
(3, 'Fitur', 4, '2019-02-10 04:56:24', '2019-02-10 04:56:24'),
(4, 'Populer', 3, '2019-02-10 04:56:34', '2019-02-10 04:56:34'),
(5, 'Purna Jual', 3, '2019-02-10 04:56:48', '2019-02-10 04:56:48'),
(6, 'Keawetan', 2, '2019-02-10 04:57:07', '2019-02-10 04:57:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_28_084038_create_alternatives_table', 1),
(4, '2018_11_28_084253_create_criterias_table', 1),
(5, '2018_11_28_084414_create_scores_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `scores`
--

CREATE TABLE `scores` (
  `id` int(10) UNSIGNED NOT NULL,
  `alternative_id` int(10) UNSIGNED NOT NULL,
  `criteria_id` int(10) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `scores`
--

INSERT INTO `scores` (`id`, `alternative_id`, `criteria_id`, `score`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3500, '2019-02-10 05:20:24', '2019-02-10 05:20:24'),
(2, 1, 2, 70, '2019-02-10 05:20:24', '2019-02-10 05:20:24'),
(3, 1, 3, 10, '2019-02-10 05:20:24', '2019-02-10 05:20:24'),
(4, 1, 4, 80, '2019-02-10 05:20:25', '2019-02-10 05:20:25'),
(5, 1, 5, 3000, '2019-02-10 05:20:25', '2019-02-10 05:20:25'),
(6, 1, 6, 36, '2019-02-10 05:20:25', '2019-02-10 05:20:25'),
(7, 2, 1, 4500, '2019-02-10 05:24:53', '2019-02-10 05:24:53'),
(8, 2, 2, 90, '2019-02-10 05:24:53', '2019-02-10 05:24:53'),
(9, 2, 3, 10, '2019-02-10 05:24:53', '2019-02-10 05:24:53'),
(10, 2, 4, 60, '2019-02-10 05:24:53', '2019-02-10 05:24:53'),
(11, 2, 5, 2500, '2019-02-10 05:24:53', '2019-02-10 05:24:53'),
(12, 2, 6, 48, '2019-02-10 05:24:53', '2019-02-10 05:24:53'),
(13, 3, 1, 4000, '2019-02-10 05:25:18', '2019-02-10 05:25:18'),
(14, 3, 2, 80, '2019-02-10 05:25:18', '2019-02-10 05:25:18'),
(15, 3, 3, 9, '2019-02-10 05:25:18', '2019-02-10 05:25:18'),
(16, 3, 4, 90, '2019-02-10 05:25:18', '2019-02-10 05:25:18'),
(17, 3, 5, 2000, '2019-02-10 05:25:18', '2019-02-10 05:25:18'),
(18, 3, 6, 48, '2019-02-10 05:25:18', '2019-02-10 05:25:18'),
(19, 4, 1, 4000, '2019-02-10 05:25:41', '2019-02-10 05:25:41'),
(20, 4, 2, 70, '2019-02-10 05:25:41', '2019-02-10 05:25:41'),
(21, 4, 3, 8, '2019-02-10 05:25:41', '2019-02-10 05:25:41'),
(22, 4, 4, 50, '2019-02-10 05:25:41', '2019-02-10 05:25:41'),
(23, 4, 5, 1500, '2019-02-10 05:25:41', '2019-02-10 05:25:41'),
(24, 4, 6, 60, '2019-02-10 05:25:41', '2019-02-10 05:25:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$q69Xvsgzns4Za2JtcoYz/e3MWDFumwBjmkbBjKRl22iWUoHDR6Q5G', NULL, '2019-02-10 04:55:30', '2019-02-10 04:55:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_alternative_id_foreign` (`alternative_id`),
  ADD KEY `scores_criteria_id_foreign` (`criteria_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_alternative_id_foreign` FOREIGN KEY (`alternative_id`) REFERENCES `alternatives` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scores_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
