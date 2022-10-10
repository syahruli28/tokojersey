-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2022 at 02:52 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jerseypedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ligas`
--

CREATE TABLE `ligas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ligas`
--

INSERT INTO `ligas` (`id`, `nama`, `negara`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Bundes Liga', 'Jerman', 'bundesliga.png', NULL, NULL),
(2, 'Premier League', 'Inggris', 'premierleague.png', NULL, NULL),
(3, 'La Liga', 'Spanyol', 'laliga.png', NULL, NULL),
(4, 'Serie A', 'Itali', 'seriea.png', NULL, NULL);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_10_02_121251_create_ligas_table', 1),
(5, '2022_10_02_121635_create_products_table', 1),
(6, '2022_10_02_121719_create_pesanans_table', 1),
(7, '2022_10_02_121753_create_pesanan_details_table', 1);

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
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pemesanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_harga` int(11) NOT NULL,
  `kode_unik` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `kode_pemesanan`, `status`, `total_harga`, `kode_unik`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 'JP-8', '1', 1125000, 226, 1, '2022-10-10 00:58:21', '2022-10-10 01:12:14'),
(9, 'JP-9', '2', 50000, 208, 1, '2022-10-10 01:13:13', '2022-10-10 01:14:03'),
(10, 'JP-10', '0', 250000, 129, 1, '2022-10-10 01:14:37', '2022-10-10 01:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_details`
--

CREATE TABLE `pesanan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `namaset` tinyint(1) NOT NULL DEFAULT 0,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan_details`
--

INSERT INTO `pesanan_details` (`id`, `jumlah_pesanan`, `total_harga`, `namaset`, `nama`, `nomor`, `product_id`, `pesanan_id`, `created_at`, `updated_at`) VALUES
(18, 1, 125000, 0, NULL, NULL, 2, 8, '2022-10-10 00:58:21', '2022-10-10 00:58:21'),
(19, 8, 1000000, 0, NULL, NULL, 8, 8, '2022-10-10 00:58:33', '2022-10-10 00:58:33'),
(20, 0, 50000, 1, 'Aqil Emeraldi', '20', 8, 9, '2022-10-10 01:13:13', '2022-10-10 01:13:13'),
(21, 2, 250000, 0, NULL, NULL, 10, 10, '2022-10-10 01:14:39', '2022-10-10 01:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL DEFAULT 125000,
  `harga_nameset` int(11) NOT NULL DEFAULT 50000,
  `liga_id` int(11) NOT NULL,
  `is_ready` tinyint(1) NOT NULL DEFAULT 1,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Replika Top Quality',
  `berat` double(8,2) NOT NULL DEFAULT 0.25,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `harga`, `harga_nameset`, `liga_id`, `is_ready`, `jenis`, `berat`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'CHELSEA 3RD 2018-2019', 125000, 50000, 2, 1, 'Replika Top Quality', 0.25, 'chelsea.png', NULL, NULL),
(2, 'LEICESTER CITY HOME 2018-2019', 125000, 50000, 2, 1, 'Replika Top Quality', 0.25, 'leicester.png', NULL, NULL),
(3, 'MAN. UNITED AWAY 2018-2019', 125000, 50000, 2, 1, 'Replika Top Quality', 0.25, 'mu.png', NULL, NULL),
(4, 'LIVERPOOL AWAY 2018-2019', 125000, 50000, 2, 1, 'Replika Top Quality', 0.25, 'liverpool.png', NULL, NULL),
(5, 'TOTTENHAM 3RD 2018-2019', 125000, 50000, 2, 1, 'Replika Top Quality', 0.25, 'tottenham.png', NULL, NULL),
(6, 'DORTMUND AWAY 2018-2019', 125000, 50000, 1, 1, 'Replika Top Quality', 0.25, 'dortmund.png', NULL, NULL),
(7, 'BAYERN MUNCHEN 3RD 2018 2019', 125000, 50000, 1, 1, 'Replika Top Quality', 0.25, 'munchen.png', NULL, NULL),
(8, 'JUVENTUS AWAY 2018-2019', 125000, 50000, 4, 1, 'Replika Top Quality', 0.25, 'juve.png', NULL, NULL),
(9, 'AS ROMA HOME 2018-2019', 125000, 50000, 4, 1, 'Replika Top Quality', 0.25, 'asroma.png', NULL, NULL),
(10, 'AC MILAN HOME 2018 2019', 125000, 50000, 4, 1, 'Replika Top Quality', 0.25, 'acmilan.png', NULL, NULL),
(11, 'LAZIO HOME 2018-2019', 125000, 50000, 4, 1, 'Replika Top Quality', 0.25, 'lazio.png', NULL, NULL),
(12, 'REAL MADRID 3RD 2018-2019', 125000, 50000, 3, 0, 'Replika Top Quality', 0.25, 'madrid.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `alamat`, `nohp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aqil', 'aqil@gmail.com', NULL, '$2y$10$FUuug32sFkSRYnCC8jYfsuq1RqB4.Phaxhs56LMj664OywXZnI236', 'Jl. Nin Aja Ea', '081321375688', NULL, '2022-10-03 05:30:32', '2022-10-10 01:14:00'),
(2, 'liqa', 'liqa@gmail.com', NULL, '$2y$10$kv8e6PPpjj6AQgc.9WtJVug4aP3CHDwWZfDd4n.iGG6u47elVeHFe', NULL, NULL, NULL, '2022-10-08 05:31:25', '2022-10-08 05:31:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ligas`
--
ALTER TABLE `ligas`
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
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ligas`
--
ALTER TABLE `ligas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
