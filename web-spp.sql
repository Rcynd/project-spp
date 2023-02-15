-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 03:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-spp`
--

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
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kompetensi_keahlian` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `kompetensi_keahlian`, `created_at`, `updated_at`) VALUES
(1, 'XII RPL', 'Rekayasa Perangkat Lunak', '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(2, 'XI RPL', 'Rekayasa Perangkat Lunak', '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(3, 'X RPL', 'Rekayasa Perangkat Lunak', '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(4, 'XII ANM', 'Animasi', '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(5, 'XI ANM', 'Animasi', '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(6, 'X ANM', 'Animasi', '2023-02-15 14:33:30', '2023-02-15 14:33:30');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_27_082832_create_siswas_table', 1),
(6, '2023_01_27_084641_create_spps_table', 1),
(7, '2023_01_27_084735_create_transaksis_table', 1),
(8, '2023_01_27_084933_create_kelas_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nisn` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` bigint(20) UNSIGNED DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_spp` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`, `created_at`, `updated_at`) VALUES
(1, '0010020002', '20230102', 'Muhammad Afri', NULL, 'cikarang timur', '08938944389', 3, '2023-02-15 14:37:27', '2023-02-15 14:37:27'),
(2, '0010020001', '20230101', 'Jujunia', NULL, 'jakarta pusat', '08938944389', 5, '2023-02-15 14:47:14', '2023-02-15 14:47:14'),
(3, '0010020003', '20230103', 'Huzain', NULL, 'purwakarta', '08938944389', 5, '2023-02-15 14:51:35', '2023-02-15 14:51:35'),
(4, '0010020004', '20230104', 'Liliana', NULL, 'Jakarta', '08938944389', 4, '2023-02-15 14:51:58', '2023-02-15 14:51:58'),
(5, '0010020005', '20230105', 'Kurniawan kalim', NULL, 'Bandung', '08938944389', 2, '2023-02-15 14:52:37', '2023-02-15 14:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `spps`
--

CREATE TABLE `spps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spps`
--

INSERT INTO `spps` (`id`, `id_kelas`, `tahun`, `nominal`, `created_at`, `updated_at`) VALUES
(1, 1, '2023', 600000, '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(2, 2, '2023', 670000, '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(3, 3, '2023', 680000, '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(4, 4, '2023', 660000, '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(5, 5, '2023', 640000, '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(6, 6, '2023', 630000, '2023-02-15 14:33:30', '2023-02-15 14:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_petugas` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` bigint(20) UNSIGNED DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `bulan_dibayar` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_dibayar` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_spp` bigint(20) UNSIGNED DEFAULT NULL,
  `jumlah_bayar` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `id_petugas`, `id_siswa`, `id_kelas`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2023-02-15', 'januari', NULL, 3, 400000, '2023-02-15 14:37:27', '2023-02-15 14:40:07'),
(2, 1, 1, NULL, '2023-02-15', 'februari', NULL, 3, 0, '2023-02-15 14:37:27', '2023-02-15 14:37:27'),
(3, 1, 1, NULL, '2023-02-15', 'maret', NULL, 3, 0, '2023-02-15 14:37:27', '2023-02-15 14:37:27'),
(4, 1, 1, NULL, '2023-02-15', 'april', NULL, 3, 0, '2023-02-15 14:37:27', '2023-02-15 14:37:27'),
(5, 1, 1, NULL, '2023-02-15', 'mei', NULL, 3, 0, '2023-02-15 14:37:27', '2023-02-15 14:37:27'),
(6, 1, 1, NULL, '2023-02-15', 'juni', NULL, 3, 0, '2023-02-15 14:37:27', '2023-02-15 14:37:27'),
(7, 1, 1, NULL, '2023-02-15', 'juli', NULL, 3, 0, '2023-02-15 14:37:27', '2023-02-15 14:37:27'),
(8, 1, 1, NULL, '2023-02-15', 'agustus', NULL, 3, 0, '2023-02-15 14:37:27', '2023-02-15 14:37:27'),
(9, 1, 1, NULL, '2023-02-15', 'september', NULL, 3, 0, '2023-02-15 14:37:27', '2023-02-15 14:37:27'),
(10, 1, 1, NULL, '2023-02-15', 'oktober', NULL, 3, 0, '2023-02-15 14:37:27', '2023-02-15 14:37:27'),
(11, 1, 1, NULL, '2023-02-15', 'november', NULL, 3, 680000, '2023-02-15 14:37:27', '2023-02-15 14:40:19'),
(12, 1, 1, NULL, '2023-02-15', 'desember', NULL, 3, 0, '2023-02-15 14:37:27', '2023-02-15 14:37:27'),
(13, 1, 2, NULL, '2023-02-15', 'januari', NULL, 5, 0, '2023-02-15 14:47:14', '2023-02-15 14:47:14'),
(14, 1, 2, NULL, '2023-02-15', 'februari', NULL, 5, 0, '2023-02-15 14:47:14', '2023-02-15 14:47:14'),
(15, 1, 2, NULL, '2023-02-15', 'maret', NULL, 5, 0, '2023-02-15 14:47:14', '2023-02-15 14:47:14'),
(16, 1, 2, NULL, '2023-02-15', 'april', NULL, 5, 0, '2023-02-15 14:47:14', '2023-02-15 14:47:14'),
(17, 1, 2, NULL, '2023-02-15', 'mei', NULL, 5, 0, '2023-02-15 14:47:14', '2023-02-15 14:47:14'),
(18, 1, 2, NULL, '2023-02-15', 'juni', NULL, 5, 0, '2023-02-15 14:47:14', '2023-02-15 14:47:14'),
(19, 1, 2, NULL, '2023-02-15', 'juli', NULL, 5, 0, '2023-02-15 14:47:14', '2023-02-15 14:47:14'),
(20, 1, 2, NULL, '2023-02-15', 'agustus', NULL, 5, 0, '2023-02-15 14:47:14', '2023-02-15 14:47:14'),
(21, 1, 2, NULL, '2023-02-15', 'september', NULL, 5, 0, '2023-02-15 14:47:14', '2023-02-15 14:47:14'),
(22, 1, 2, NULL, '2023-02-15', 'oktober', NULL, 5, 0, '2023-02-15 14:47:14', '2023-02-15 14:47:14'),
(23, 1, 2, NULL, '2023-02-15', 'november', NULL, 5, 0, '2023-02-15 14:47:14', '2023-02-15 14:47:14'),
(24, 1, 2, NULL, '2023-02-15', 'desember', NULL, 5, 0, '2023-02-15 14:47:14', '2023-02-15 14:47:14'),
(25, 1, 3, NULL, '2023-02-15', 'januari', NULL, 5, 0, '2023-02-15 14:51:35', '2023-02-15 14:51:35'),
(26, 1, 3, NULL, '2023-02-15', 'februari', NULL, 5, 0, '2023-02-15 14:51:35', '2023-02-15 14:51:35'),
(27, 1, 3, NULL, '2023-02-15', 'maret', NULL, 5, 0, '2023-02-15 14:51:35', '2023-02-15 14:51:35'),
(28, 1, 3, NULL, '2023-02-15', 'april', NULL, 5, 0, '2023-02-15 14:51:35', '2023-02-15 14:51:35'),
(29, 1, 3, NULL, '2023-02-15', 'mei', NULL, 5, 0, '2023-02-15 14:51:35', '2023-02-15 14:51:35'),
(30, 1, 3, NULL, '2023-02-15', 'juni', NULL, 5, 0, '2023-02-15 14:51:35', '2023-02-15 14:51:35'),
(31, 1, 3, NULL, '2023-02-15', 'juli', NULL, 5, 0, '2023-02-15 14:51:35', '2023-02-15 14:51:35'),
(32, 1, 3, NULL, '2023-02-15', 'agustus', NULL, 5, 0, '2023-02-15 14:51:35', '2023-02-15 14:51:35'),
(33, 1, 3, NULL, '2023-02-15', 'september', NULL, 5, 0, '2023-02-15 14:51:35', '2023-02-15 14:51:35'),
(34, 1, 3, NULL, '2023-02-15', 'oktober', NULL, 5, 0, '2023-02-15 14:51:35', '2023-02-15 14:51:35'),
(35, 1, 3, NULL, '2023-02-15', 'november', NULL, 5, 0, '2023-02-15 14:51:35', '2023-02-15 14:51:35'),
(36, 1, 3, NULL, '2023-02-15', 'desember', NULL, 5, 0, '2023-02-15 14:51:35', '2023-02-15 14:51:35'),
(37, 1, 4, NULL, '2023-02-15', 'januari', NULL, 4, 0, '2023-02-15 14:51:58', '2023-02-15 14:51:58'),
(38, 1, 4, NULL, '2023-02-15', 'februari', NULL, 4, 0, '2023-02-15 14:51:58', '2023-02-15 14:51:58'),
(39, 1, 4, NULL, '2023-02-15', 'maret', NULL, 4, 0, '2023-02-15 14:51:58', '2023-02-15 14:51:58'),
(40, 1, 4, NULL, '2023-02-15', 'april', NULL, 4, 0, '2023-02-15 14:51:58', '2023-02-15 14:51:58'),
(41, 1, 4, NULL, '2023-02-15', 'mei', NULL, 4, 0, '2023-02-15 14:51:58', '2023-02-15 14:51:58'),
(42, 1, 4, NULL, '2023-02-15', 'juni', NULL, 4, 0, '2023-02-15 14:51:58', '2023-02-15 14:51:58'),
(43, 1, 4, NULL, '2023-02-15', 'juli', NULL, 4, 0, '2023-02-15 14:51:58', '2023-02-15 14:51:58'),
(44, 1, 4, NULL, '2023-02-15', 'agustus', NULL, 4, 0, '2023-02-15 14:51:58', '2023-02-15 14:51:58'),
(45, 1, 4, NULL, '2023-02-15', 'september', NULL, 4, 0, '2023-02-15 14:51:58', '2023-02-15 14:51:58'),
(46, 1, 4, NULL, '2023-02-15', 'oktober', NULL, 4, 0, '2023-02-15 14:51:58', '2023-02-15 14:51:58'),
(47, 1, 4, NULL, '2023-02-15', 'november', NULL, 4, 0, '2023-02-15 14:51:58', '2023-02-15 14:51:58'),
(48, 1, 4, NULL, '2023-02-15', 'desember', NULL, 4, 0, '2023-02-15 14:51:58', '2023-02-15 14:51:58'),
(49, 1, 5, NULL, '2023-02-15', 'januari', NULL, 2, 0, '2023-02-15 14:52:37', '2023-02-15 14:52:37'),
(50, 1, 5, NULL, '2023-02-15', 'februari', NULL, 2, 0, '2023-02-15 14:52:37', '2023-02-15 14:52:37'),
(51, 1, 5, NULL, '2023-02-15', 'maret', NULL, 2, 0, '2023-02-15 14:52:37', '2023-02-15 14:52:37'),
(52, 1, 5, NULL, '2023-02-15', 'april', NULL, 2, 0, '2023-02-15 14:52:37', '2023-02-15 14:52:37'),
(53, 1, 5, NULL, '2023-02-15', 'mei', NULL, 2, 0, '2023-02-15 14:52:37', '2023-02-15 14:52:37'),
(54, 1, 5, NULL, '2023-02-15', 'juni', NULL, 2, 0, '2023-02-15 14:52:37', '2023-02-15 14:52:37'),
(55, 1, 5, NULL, '2023-02-15', 'juli', NULL, 2, 0, '2023-02-15 14:52:37', '2023-02-15 14:52:37'),
(56, 1, 5, NULL, '2023-02-15', 'agustus', NULL, 2, 0, '2023-02-15 14:52:37', '2023-02-15 14:52:37'),
(57, 1, 5, NULL, '2023-02-15', 'september', NULL, 2, 0, '2023-02-15 14:52:37', '2023-02-15 14:52:37'),
(58, 1, 5, NULL, '2023-02-15', 'oktober', NULL, 2, 0, '2023-02-15 14:52:37', '2023-02-15 14:52:37'),
(59, 1, 5, NULL, '2023-02-15', 'november', NULL, 2, 0, '2023-02-15 14:52:37', '2023-02-15 14:52:37'),
(60, 1, 5, NULL, '2023-02-15', 'desember', NULL, 2, 0, '2023-02-15 14:52:37', '2023-02-15 14:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','petugas','siswa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_petugas`, `email`, `username`, `password`, `level`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'Rian Muhammad Afriansyah', 'rianma1333@gmail.com', 'Admin', '$2y$10$EhEZ0o3Jp0VrAac0PZzB8.tAutliz8sfld1GeF7bDaXwPIFbC8tfC', 'admin', NULL, '2023-02-15 14:33:28', '2023-02-15 14:33:28', '2023-02-15 14:33:28'),
(2, 'Rian Muhammad Petugas', 'rianma@gmail.com', 'Petugas', '$2y$10$EygSSREs/U0T5Hm3YuP5COzcZh7zzghIO3nRFvP3kHKl7Ibi.EP4m', 'petugas', NULL, '2023-02-15 14:33:28', '2023-02-15 14:33:28', '2023-02-15 14:33:28'),
(3, 'Keisha Zahra Utami M.Kom.', 'utama.silvia@yahoo.co.id', 'Rahayu', '$2y$10$5h9ZyrUgKbkJsxlsRW06n.ZM6JvmpstHUX5Ue06SQU8i7bBxkroLG', 'petugas', NULL, '2023-02-15 14:33:28', '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(4, 'Faizah Lidya Pratiwi S.Farm', 'fharyanto@yolanda.net', 'Winda', '$2y$10$D32MzQ.K.ePaz8pLmdbG6.ymIidm9IpMUNOWXwvNYxk5XE6ZUCd6u', 'petugas', NULL, '2023-02-15 14:33:29', '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(5, 'Argono Samosir', 'zahra.pudjiastuti@wacana.asia', 'Makuta', '$2y$10$Y.TWOqzi/BZfOLxTFO9jbeu7Z9LZASq66APtEbEfmpuzJmTCqE0i6', 'petugas', NULL, '2023-02-15 14:33:29', '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(6, 'Cengkir Raden Sirait', 'melinda.uyainah@gmail.com', 'Karman', '$2y$10$T04ItN4/jvB/9/PaiOrMpeysrBPFlbmTu1VgOAv4NDI5c8ew7uqti', 'petugas', NULL, '2023-02-15 14:33:29', '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(7, 'Restu Usamah', 'kamila.mustofa@sihotang.tv', 'Tari', '$2y$10$B1oyVXVaPEnHj6jyUa.id.hUgThTlBCeoH6AcuyiW6EqNYBhsHZpu', 'petugas', NULL, '2023-02-15 14:33:29', '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(8, 'Mustika Cayadi Thamrin', 'orajata@yahoo.co.id', 'Hardi', '$2y$10$5oxG5c8CIWmoraqYDVKdceRpxlPustgf/YrFeXqgGID4IJHbGFHgi', 'petugas', NULL, '2023-02-15 14:33:29', '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(9, 'Umay Slamet Natsir S.Kom', 'melani.nabila@nurdiyanti.co.id', 'Cakrawangsa', '$2y$10$tXeye8GOq.hSEmSAQzlmPe39LJaNKhQCcbF3q2zFF/BvF8xOP3CUW', 'petugas', NULL, '2023-02-15 14:33:29', '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(10, 'Harsanto Hutasoit', 'puput65@gmail.co.id', 'Jelita', '$2y$10$ATnosuU2YO3Y9EQiiMwPHO0njYC4VHRlpjRVaq/ygsSmJj.RqJ.jm', 'petugas', NULL, '2023-02-15 14:33:29', '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(11, 'Latif Januar', 'patricia.kusmawati@gmail.com', 'Diana', '$2y$10$m74kuSzl0LER3zcKi5SJJOMcPtOg3x4Brmhxo8oz13kk1mR/DDbl6', 'petugas', NULL, '2023-02-15 14:33:29', '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(12, 'Ulva Tina Nasyidah M.Ak', 'eja30@dongoran.asia', 'Gambira', '$2y$10$TyNxUBjoKQgCu2sQFO2yG.pPH6WKLTva6tXa.b7d5zbFIjbMNRAT6', 'petugas', NULL, '2023-02-15 14:33:30', '2023-02-15 14:33:30', '2023-02-15 14:33:30'),
(13, 'Muhammad Afri', NULL, '20230102', '$2y$10$Tr7I8F0U7vZvNVOoO9g4jujpM3lfuUDYpDFAk3qO/NcRAs05/ERvS', 'siswa', NULL, NULL, '2023-02-15 14:37:27', '2023-02-15 14:37:27'),
(14, 'Jujunia', NULL, '20230101', '$2y$10$Q937eAZkmOGO8v5g1WXkcO1mzmAVVMXRNoaZ5aRUY1.yqrEEBk3oq', 'siswa', NULL, NULL, '2023-02-15 14:47:14', '2023-02-15 14:47:14'),
(15, 'Huzain', NULL, '20230103', '$2y$10$tMdi8oEE6YqSLuAI30HN9eTEED4w6kTQxL33C4tQO4.sqpYwo82bC', 'siswa', NULL, NULL, '2023-02-15 14:51:35', '2023-02-15 14:51:35'),
(16, 'Liliana', NULL, '20230104', '$2y$10$juA2ozJd4Q.Ivqp6CtHoCetWwXCCSRl/OHmnZtG1jTqkqvdHdus7S', 'siswa', NULL, NULL, '2023-02-15 14:51:59', '2023-02-15 14:51:59'),
(17, 'Kurniawan kalim', NULL, '20230105', '$2y$10$t8xikSu9Dhlw7nofhGsLhe.lD5rAQhCLGDfljodFgy7DNDwHHfNhO', 'siswa', NULL, NULL, '2023-02-15 14:52:37', '2023-02-15 14:52:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
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
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spps`
--
ALTER TABLE `spps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
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
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spps`
--
ALTER TABLE `spps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
