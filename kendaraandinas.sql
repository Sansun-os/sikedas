-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 03:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kendaraandinas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jeniskendaraans`
--

CREATE TABLE `jeniskendaraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jeniskendaraan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jeniskendaraans`
--

INSERT INTO `jeniskendaraans` (`id`, `jeniskendaraan`, `created_at`, `updated_at`) VALUES
(1, 'Roda Dua', NULL, NULL),
(2, 'Roda Empat', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraans`
--

CREATE TABLE `kendaraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_merk` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `id_nopolisi` int(11) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'tersedia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraans`
--

INSERT INTO `kendaraans` (`id`, `id_jenis`, `id_merk`, `id_tipe`, `id_nopolisi`, `kondisi`, `status`, `created_at`, `updated_at`) VALUES
(9, 1, 1, 1, 1, 'Ban Bocor', 'Tersedia', '2024-01-05 00:15:09', '2024-01-05 00:15:09'),
(10, 2, 2, 3, 3, 'Ban Bocor', 'Tersedia', '2024-01-05 00:15:35', '2024-01-05 00:15:35'),
(11, 1, 2, 1, 2, 'Ban Bocor', 'Sedang Digunakan', '2024-01-05 00:16:03', '2024-01-05 00:32:46'),
(12, 1, 2, 3, 4, 'Ban Bocor', 'Sedang Digunakan', '2024-01-05 00:30:49', '2024-01-05 00:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `merkkendaraans`
--

CREATE TABLE `merkkendaraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merk` varchar(255) NOT NULL,
  `jenis_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merkkendaraans`
--

INSERT INTO `merkkendaraans` (`id`, `merk`, `jenis_id`, `created_at`, `updated_at`) VALUES
(1, 'Honda', '1', NULL, NULL),
(2, 'Yamaha', '2', NULL, NULL);

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
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2019_08_19_000000_create_failed_jobs_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2023_11_08_065828_create_bbms_table', 2),
(7, '2023_11_08_070249_create_admins_table', 2),
(13, '2023_11_08_032854_create_pegawais_table', 3),
(14, '2014_10_12_000000_create_users_table', 4),
(16, '2023_11_27_031905_create_peminjamen_table', 5),
(33, '2023_12_17_035803_create_jeniskendaraans_table', 12),
(34, '2023_12_17_035912_create_nopolisis_table', 13),
(38, '2023_12_17_035853_create_merkkendaraans_table', 17),
(40, '2023_11_08_071154_create_kendaraans_table', 18),
(44, '2023_11_27_031905_create_peminjamans_table', 19),
(45, '2023_12_22_090956_create_riwayatpemakaians_table', 20),
(46, '2023_11_27_025640_create_pengembalians_table', 21),
(47, '2023_12_17_054252_create_tipekendaraans_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `nopolisis`
--

CREATE TABLE `nopolisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nopolisi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nopolisis`
--

INSERT INTO `nopolisis` (`id`, `nopolisi`, `created_at`, `updated_at`) VALUES
(1, 'VR 2121 SQ', NULL, NULL),
(2, 'SR 1213 SD', NULL, NULL),
(3, 'SK 2031 SK', NULL, NULL),
(4, 'RT 2021 TT\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namapegawai` varchar(255) NOT NULL,
  `nip` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jeniskelamin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` bigint(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `namapegawai`, `nip`, `password`, `alamat`, `jeniskelamin`, `email`, `nohp`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'prasetya', 1131212, 'sandi123', 'ciampea', 'Laki-Laki', 'prasetya@gmail.com', 896213121, 'selfie.jpg', '2023-11-20 22:09:37', '2023-11-20 22:09:37'),
(3, 'sandyp', 11312122, 'sandi123', 'ciampea', 'Laki-Laki', 'sandygmail.com', 896213125, 'Screenshot 2023-11-29 205207.png', '2023-11-29 20:22:16', '2023-11-29 20:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `peminjamans`
--

CREATE TABLE `peminjamans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_id` varchar(255) NOT NULL,
  `merk_id` varchar(255) NOT NULL,
  `tipe_id` varchar(255) NOT NULL,
  `nopolisi_id` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjamans`
--

INSERT INTO `peminjamans` (`id`, `user_id`, `jenis_id`, `merk_id`, `tipe_id`, `nopolisi_id`, `tujuan`, `keterangan`, `created_at`, `updated_at`) VALUES
(30, 2, '10', 'Yamaha', 'avanza', 'SK 2031 SK', 'dinas', 'dikembalikan', '2024-01-05 00:17:47', '2024-01-05 00:18:35'),
(31, 2, '10', 'Yamaha', 'avanza', 'SK 2031 SK', 'dinas', 'dipinjam', '2024-01-05 00:22:00', '2024-01-05 00:22:00'),
(32, 2, '10', 'Yamaha', 'avanza', 'SK 2031 SK', 'dinas', 'dipinjam', '2024-01-05 00:28:58', '2024-01-05 00:28:58'),
(33, 2, '11', 'Yamaha', 'mio', 'SR 1213 SD', 'dinas', 'dipinjam', '2024-01-05 00:31:34', '2024-01-05 00:31:34'),
(34, 2, '10', 'Yamaha', 'avanza', 'SK 2031 SK', 'dinas', 'dipinjam', '2024-01-05 00:32:01', '2024-01-05 00:32:01'),
(35, 2, '10', 'Yamaha', 'avanza', 'SK 2031 SK', 'dinas', 'dipinjam', '2024-01-05 00:32:46', '2024-01-05 00:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalians`
--

CREATE TABLE `pengembalians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peminjaman_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengembalians`
--

INSERT INTO `pengembalians` (`id`, `peminjaman_id`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, NULL),
(2, 7, NULL, NULL),
(3, 8, NULL, NULL),
(4, 10, NULL, NULL),
(5, 12, NULL, NULL),
(6, 13, NULL, NULL),
(7, 14, NULL, NULL),
(8, 15, NULL, NULL),
(9, 16, NULL, NULL),
(10, 20, NULL, NULL),
(11, 21, NULL, NULL),
(12, 22, NULL, NULL),
(13, 23, NULL, NULL),
(14, 24, NULL, NULL),
(15, 25, NULL, NULL),
(16, 26, NULL, NULL),
(17, 27, NULL, NULL),
(18, 28, NULL, NULL),
(19, 29, NULL, NULL),
(20, 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipekendaraans`
--

CREATE TABLE `tipekendaraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipekendaraans`
--

INSERT INTO `tipekendaraans` (`id`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 'mio', NULL, NULL),
(2, 'beat', NULL, NULL),
(3, 'avanza\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'prasetya', 'prasetya@gmail.com', 'user', NULL, '$2y$10$lfasKipB3ya.bRpUkku3duhg7n2pDBgjl5aMJkaXpOPelz0gXBvmy', NULL, '2023-11-20 23:15:40', '2023-11-20 23:15:40'),
(3, 'admin2', 'admin2@gmail.com', 'admin', NULL, '$2y$10$FdZZphTvQarcOTEazCTpme5IFd94YyNR1SEg.8nAoqlZr/viOKZP.', NULL, NULL, NULL),
(4, 'admin', 'admin@gmail.com', 'admin', NULL, '$2y$10$oxINoVtq81YJnOsybyprXeG7ITs6hwAy1qnaILYY/oo/52Kyj92Hu', NULL, NULL, NULL),
(5, 'sandy', 'sandy@gmail.com', 'user', NULL, '$2y$10$taT5dZ.kcp556ePV9zMHr.WbdF8DExnKqy6RAguHgYlcSgPxryHE.', NULL, '2023-12-11 21:11:22', '2023-12-11 21:11:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jeniskendaraans`
--
ALTER TABLE `jeniskendaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraans`
--
ALTER TABLE `kendaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merkkendaraans`
--
ALTER TABLE `merkkendaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nopolisis`
--
ALTER TABLE `nopolisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalians`
--
ALTER TABLE `pengembalians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tipekendaraans`
--
ALTER TABLE `tipekendaraans`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jeniskendaraans`
--
ALTER TABLE `jeniskendaraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kendaraans`
--
ALTER TABLE `kendaraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `merkkendaraans`
--
ALTER TABLE `merkkendaraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `nopolisis`
--
ALTER TABLE `nopolisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjamans`
--
ALTER TABLE `peminjamans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pengembalians`
--
ALTER TABLE `pengembalians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipekendaraans`
--
ALTER TABLE `tipekendaraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
