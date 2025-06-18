-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 10:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katalogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'admin'),
(2, 'umkm', 'umkm'),
(3, 'guest', 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 5),
(2, 25),
(2, 26),
(2, 27),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'iniadmintc@gmail.com', NULL, '2024-05-31 12:35:52', 0),
(2, '::1', 'iniadmintc@gmail.com', NULL, '2024-05-31 12:36:13', 0),
(3, '::1', 'iniadmintc@gmail.com', NULL, '2024-05-31 12:37:07', 0),
(4, '::1', 'iniumkm@gmail.com', 4, '2024-05-31 12:37:24', 1),
(5, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 13:14:42', 1),
(6, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 13:38:35', 1),
(7, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 13:39:29', 1),
(8, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 13:40:57', 1),
(9, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 13:43:37', 1),
(10, '::1', 'iniadmintc@gmail.com', NULL, '2024-05-31 13:43:54', 0),
(11, '::1', 'iniadmintc', NULL, '2024-05-31 13:44:07', 0),
(12, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 13:44:51', 1),
(13, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 14:47:01', 1),
(14, '::1', 'iniadmintc', 1, '2024-05-31 14:47:25', 0),
(15, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 14:47:41', 1),
(16, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 14:48:22', 1),
(17, '::1', 'iniadmintc@gmail.com', 1, '2024-05-31 14:49:33', 0),
(18, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 14:50:15', 1),
(19, '::1', 'iniadmintc@gmail.com', 1, '2024-05-31 14:51:03', 1),
(20, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 14:52:08', 1),
(21, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 14:53:12', 1),
(22, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 15:01:01', 1),
(23, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 15:01:11', 1),
(24, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 15:02:49', 1),
(25, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 15:09:09', 1),
(26, '::1', 'iniadmintc@gmail.com', 1, '2024-05-31 21:48:46', 1),
(27, '::1', 'iniadmintc@gmail.com', 1, '2024-05-31 22:33:26', 1),
(28, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 22:35:31', 1),
(29, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 22:35:52', 1),
(30, '::1', 'iniumkm@gmail.com', 5, '2024-05-31 22:36:36', 1),
(31, '::1', 'iniadmintc@gmail.com', 1, '2024-05-31 22:37:05', 1),
(32, '::1', 'iniadmintc@gmail.com', 1, '2024-05-31 22:38:26', 1),
(33, '::1', 'iniadmintc@gmail.com', 1, '2024-05-31 22:38:54', 1),
(34, '::1', 'iniadmintc@gmail.com', 1, '2024-05-31 22:39:01', 1),
(35, '::1', 'iniadmintc@gmail.com', 1, '2024-05-31 22:39:14', 1),
(36, '::1', 'iniadmintc@gmail.com', 1, '2024-05-31 22:45:36', 1),
(37, '::1', 'iniadmintc@gmail.com', 1, '2024-05-31 22:48:02', 1),
(38, '::1', 'iniadmintc@gmail.com', 1, '2024-05-31 22:50:55', 1),
(40, '::1', 'iniadmintc@gmail.com', 1, '2024-06-01 04:26:17', 1),
(41, '::1', 'huzaifah704@gmail.com', NULL, '2024-06-01 14:08:48', 0),
(42, '::1', 'Khanif1123', NULL, '2024-06-01 14:09:22', 0),
(43, '::1', 'iniadmintc@gmail.com', 1, '2024-06-01 14:10:25', 1),
(44, '::1', 'huzaifah704@gmail.com', NULL, '2024-06-01 14:15:16', 0),
(45, '::1', 'iniadmintc@gmail.com', 1, '2024-06-01 14:22:07', 1),
(46, '::1', 'iniadmintc@gmail.com', 1, '2024-06-01 14:24:38', 1),
(47, '::1', 'huzaifah704@gmail.com', NULL, '2024-06-01 14:25:16', 0),
(48, '::1', 'huzaifah704@gmail.com', 11, '2024-06-01 14:27:17', 1),
(49, '::1', 'huzaifah704@gmail.com', 11, '2024-06-01 14:49:46', 1),
(50, '::1', 'iniadmintc@gmail.com', 1, '2024-06-01 14:51:58', 1),
(51, '::1', 'huzaifah704@gmail.com', 11, '2024-06-01 14:53:59', 1),
(52, '::1', 'huzaifah704@gmail.com', 11, '2024-06-01 18:58:57', 1),
(53, '::1', 'huzaifah704@gmail.com', 11, '2024-06-01 19:04:11', 1),
(54, '::1', 'huzaifah704@gmail.com', 11, '2024-06-03 15:09:27', 1),
(55, '::1', 'huzaifah704@gmail.com', 11, '2024-06-03 16:07:30', 1),
(56, '::1', 'huzaifah704@gmail.com', 11, '2024-06-03 16:09:27', 1),
(57, '::1', 'FitriaMar', NULL, '2024-06-04 16:57:55', 0),
(58, '::1', 'Febriyanti', NULL, '2024-06-04 16:58:17', 0),
(59, '::1', '0895333049990@gmail.com', 25, '2024-06-04 16:59:45', 1),
(60, '::1', '081807515521@gmail.com', 26, '2024-06-04 17:00:38', 1),
(61, '::1', '081806352469@gmail.com', 27, '2024-06-04 17:01:24', 1),
(62, '::1', '085719000366@gmail.com', 28, '2024-06-04 17:02:29', 1),
(63, '::1', '08111633300@gmail.com', 29, '2024-06-04 17:03:06', 1),
(64, '::1', '087889880481@gmail.com', 30, '2024-06-04 17:03:49', 1),
(65, '::1', '08119844941@gmail.com', 31, '2024-06-04 17:04:28', 1),
(66, '::1', '081314175133@gmail.com', 32, '2024-06-04 17:05:08', 1),
(67, '::1', '081291081912@gmail.com', 33, '2024-06-04 17:05:42', 1),
(68, '::1', 'Fe', NULL, '2024-06-04 17:06:39', 0),
(69, '::1', '085211161375@gmail.com', 34, '2024-06-04 17:06:51', 1),
(70, '::1', '082211969286@gmail.com', 35, '2024-06-04 17:07:29', 1),
(71, '::1', '082124250388@gmail.com', 36, '2024-06-04 17:07:56', 1),
(72, '::1', 'iniadmintc@gmail.com', 1, '2024-06-04 17:09:12', 1),
(73, '::1', 'iniadmintc@gmail.com', 1, '2024-06-05 01:48:59', 1),
(74, '::1', 'iniadmintc@gmail.com', 1, '2024-06-05 08:55:44', 1),
(75, '::1', 'FitriaMar', NULL, '2024-06-05 10:31:06', 0),
(76, '::1', '0895333049990@gmail.com', 25, '2024-06-05 10:31:24', 1),
(77, '::1', '0895333049990@gmail.com', 25, '2024-06-06 00:32:00', 1),
(78, '::1', '0895333049990@gmail.com', 25, '2024-06-06 02:16:06', 1),
(79, '::1', '081807515521@gmail.com', 26, '2024-06-06 02:21:20', 1),
(80, '::1', '081807515521@gmail.com', 26, '2024-06-06 02:21:55', 1),
(81, '::1', '081807515521@gmail.com', 26, '2024-06-06 02:28:55', 1),
(82, '::1', '081807515521@gmail.com', 26, '2024-06-06 03:20:34', 1),
(83, '::1', 'iniadmintc@gmail.com', 1, '2024-06-06 03:47:15', 1),
(84, '::1', '081807515521@gmail.com', 26, '2024-06-06 03:48:00', 1),
(85, '::1', '081807515521@gmail.com', 26, '2024-06-06 03:52:38', 1),
(86, '::1', '081807515521@gmail.com', 26, '2024-06-06 04:00:32', 1),
(87, '::1', '081314175133@gmail.com', 32, '2024-06-06 04:47:23', 1),
(88, '::1', '081314175133@gmail.com', 32, '2024-06-06 07:26:16', 1),
(89, '::1', '0895333049990@gmail.com', 25, '2024-06-06 08:39:20', 1),
(90, '::1', '08122@gmail.com', 26, '2024-06-06 09:55:09', 1),
(91, '::1', 'iniadmintc@gmail.com', 1, '2024-06-06 10:54:11', 1),
(92, '::1', 'zidan', NULL, '2024-06-06 10:55:30', 0),
(93, '::1', '08122@gmail.com', 26, '2024-06-06 10:55:59', 1),
(94, '::1', 'iniadmintc@gmail.com', 1, '2024-06-07 06:12:58', 1),
(95, '::1', 'iniadmintc@gmail.com', 1, '2024-06-07 06:42:19', 1),
(96, '::1', 'algiban92@gmail.com', 37, '2024-06-07 07:19:50', 1),
(97, '::1', '08122@gmail.com', 26, '2024-06-07 07:33:39', 1),
(98, '::1', 'iniadmintc@gmail.com', 1, '2024-06-07 07:38:52', 1),
(99, '::1', '08122@gmail.com', 26, '2024-06-07 07:39:12', 1),
(100, '::1', 'iniadmintc@gmail.com', 1, '2024-06-07 07:43:48', 1),
(101, '::1', '08122@gmail.com', 26, '2024-06-07 08:01:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-umkm', 'manage umkm'),
(2, 'manage profile', 'manage profile');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kat` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kat`, `kategori`) VALUES
(1, 'Kuliner'),
(2, 'Jasa'),
(3, 'Pakaian'),
(4, 'Kerajinan'),
(8, 'Mentega');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1717154057, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_subkat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `img_produk` varchar(255) NOT NULL,
  `harga_produk` varchar(128) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `ket_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_subkat`, `id_user`, `nama_produk`, `img_produk`, `harga_produk`, `stok_produk`, `ket_produk`) VALUES
(4, 1, 5, 'Soto Dagings', 'img/produk/default.jpg', '12000', 10, 'Soto daging dari daging ayam'),
(5, 2, 5, 'Jamu ', 'img/produk/default.jpg', '10000', 10, 'Jamu '),
(7, 5, 27, 'Kursus Motor', 'img/produk/default.jpg', '12000', 1, 'Kursus motor motoran'),
(13, 5, 27, 'Kursus Mobil', 'img/produk/default.jpg', '95000', 10, 'mobil metik'),
(14, 1, 5, 'Soto Daging', 'img/produk/default.jpg', '9500', 10, 'sotoo pake daging '),
(15, 1, 5, 'bakso urat', 'img/produk/default.jpg', '20000', 10, 'bakso bakso'),
(16, 1, 5, 'bakso telor', 'img/produk/default.jpg', '20000', 10, 'bakso bakso'),
(17, 1, 5, 'bakso sapi', 'img/produk/default.jpg', '20000', 10, 'bakso bakso'),
(18, 1, 5, 'baksoayammm', 'img/produk/default.jpg', '20000', 10, 'bakso bakso'),
(19, 1, 26, 'Sambel Teri Medan', 'img/produk/DiniWinduSambel Teri Medan.jpeg', '35000', 10, 'Perpaduan Ciamik dari Bawang Merah Brebes'),
(20, 1, 25, 'Butter cake ', 'img/produk/FitriaMarButter cake .jpeg', '150000', 10, 'Kue mentega , 22 cm , bahan : tepung terigu telur gula Dan mentega '),
(21, 1, 26, 'Minyak Bawang Merah ', 'img/produk/DiniWinduMinyak Bawang Merah .jpeg', '13000', 10, 'Minyak berkualitas grade A(minyak sunco)'),
(24, 1, 26, 'Bawang Goreng Original', 'img/produk/DiniWinduBawang Goreng Original.jpeg', '23000', 10, 'Bawang Brebes Asli tanpa campuran MSG&tepung'),
(25, 2, 32, 'Kripik Bawang', 'img/produk/EndenNellKripik Bawang.jpeg', '15000', 102, 'KriBaw/Kripik bawang camilan kering yg terbuat dari tepung terigu dan tpg tapioka yg diberi aneka bumbu bawang.kribaw tersedia uk 160gr ,225 gr dan uk 475gr');

-- --------------------------------------------------------

--
-- Table structure for table `subkat`
--

CREATE TABLE `subkat` (
  `id_subkat` int(11) NOT NULL,
  `id_kat` int(11) NOT NULL,
  `subkat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subkat`
--

INSERT INTO `subkat` (`id_subkat`, `id_kat`, `subkat`) VALUES
(1, 1, 'Makanan'),
(2, 1, 'Minuman'),
(5, 2, 'Kursus'),
(6, 2, 'Laundry'),
(7, 2, 'Jahit & Sablon'),
(8, 3, 'Dress'),
(9, 3, 'Perlengkapan Bayi'),
(10, 3, 'Hijab'),
(11, 4, 'Lukisan'),
(12, 4, 'Bucket');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `nama_umkm` varchar(255) NOT NULL,
  `notlp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `user_img` varchar(255) NOT NULL DEFAULT 'img/profile/default.jpg',
  `tipeakun` int(11) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `nama_umkm`, `notlp`, `alamat`, `user_img`, `tipeakun`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'iniadmintc@gmail.com', 'iniadmintc', 'ini admin', '', '', '', 'img/profile/default.svg', NULL, '$2y$10$xPBRuH2HRDgOfUfefxDoe.qJXjjwItUM2fXQCs4KVAHZ2JJohYiIO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-05-31 12:23:49', '2024-05-31 12:23:49', NULL),
(5, 'iniumkm@gmail.com', 'iniumkm', 'UMKM SUKSES', '', '0858888888', 'ini adalah alamat umkm', 'img/profile/default.svg', 1, '$2y$10$vvyvRgqhNe4at0wEr2gcReUNdtvx8xkiDOBJCncuOvBKIJhAu5/My', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-05-31 13:14:36', '2024-05-31 13:14:36', NULL),
(25, '0895333049990@gmail.com', 'FitriaMar', 'Fitria', '', '0895333049990', 'Jl  Tipar Raya no 54 , kitchen jl pedurenan 88a, Mekarsari', 'img/profile/FitriaMar.jpeg', 1, '$2y$10$rPYKHDlmCPl9U3P009NLVupSzEjJb0YR43NXV3Z8HjYNzQJ7Pe04C', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-04 16:59:37', '2024-06-04 16:59:37', NULL),
(26, '08122@gmail.com', 'DiniWindu', 'Dini', 'Dininiiaisdja', '081807515521', 'Komplek departemen koperasi blok A.19 jl.radar auri mekarsari, cimanggis -', 'img/profile/DiniWindu.png', 1, '$2y$10$u4T.i5LWjkB7XK4yqnilueyqzN9WKZ8htBUW6TT.5bSszpudl2ERe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-04 17:00:26', '2024-06-04 17:00:26', NULL),
(27, '081806352469@gmail.com', 'JundaHerl', 'Junda', '', NULL, NULL, 'img/profile/default.jpg', 1, '$2y$10$UurRiSceMHgP/tXiJ2z6ku4E/Ofd0TxLaFZ8P7kOp/fRvZffh3qcC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-04 17:01:18', '2024-06-04 17:01:18', NULL),
(30, '087889880481@gmail.com', 'Zentikama', 'Zenti', '', NULL, NULL, 'img/profile/default.jpg', 1, '$2y$10$AZQmYfknJ0sMJYwkXXXguuU../F0X52UC17qL..5HRlzyQtLWhoCK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-04 17:03:46', '2024-06-04 17:03:46', NULL),
(31, '08119844941@gmail.com', 'Idazubaed', 'Ida', '', NULL, NULL, 'img/profile/default.jpg', 1, '$2y$10$3F9cOqDvIiYQ/YZ02fk3ku/wJM2GwwPtbbUYD1T/2T9nc4cYLFiLu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-04 17:04:25', '2024-06-04 17:04:25', NULL),
(32, '081314175133@gmail.com', 'EndenNell', 'Enden', '', '081314175133', 'Lembah nirmala 2 Blok F12 Rt 14/Rw 13 Kelurahan Mekarsari ', 'img/profile/EndenNell.jpg', 1, '$2y$10$fnlV9boUclS/n45kKjKVBuLkLIxRhIu3A4qgNjnJsEnRKjc45iUZ6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-04 17:05:06', '2024-06-04 17:05:06', NULL),
(33, '081291081912@gmail.com', 'Rianitahi', 'Riani', '', NULL, NULL, 'img/profile/default.jpg', 1, '$2y$10$ty1EiW8/rUlgjL7oBM7uLO5/jkoYg6RlO4.CdS8WKE4K2w7ZqkzIu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-04 17:05:40', '2024-06-04 17:05:40', NULL),
(34, '085211161375@gmail.com', 'Febriyanti', 'Febriyanti', '', NULL, NULL, 'img/profile/default.jpg', 1, '$2y$10$7.luzzyo2AKrGbvkjH5CgexUuauH8zoyMFEaSqRg5751o1SjmsCYK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-04 17:06:26', '2024-06-04 17:06:26', NULL),
(35, '082211969286@gmail.com', 'IlmaPagia', 'Ilma', '', NULL, NULL, 'img/profile/default.jpg', NULL, '$2y$10$/C/3UF6UvXmlaYeEen3r1OyP/SMoNO6oC2sq2617WL5XSmgLld/LS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-04 17:07:26', '2024-06-04 17:07:26', NULL),
(36, '082124250388@gmail.com', 'RRTitiI', 'Titil', '', NULL, NULL, 'img/profile/default.jpg', NULL, '$2y$10$y.enzW.RsPFriK6eUjJUNeeYqxLGKD.EPmH70roWm1sjjKuBZ.lRO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-04 17:07:52', '2024-06-04 17:07:52', NULL),
(37, 'algiban92@gmail.com', 'khanif', NULL, '', NULL, NULL, 'img/profile/default.jpg', NULL, '$2y$10$4DdwSGbwEKlZA25Z9rtqKOYA2mwMmdrstFR/Mj2qMkwTBzP/7m5YO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-07 07:19:45', '2024-06-07 07:19:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `subkat`
--
ALTER TABLE `subkat`
  ADD PRIMARY KEY (`id_subkat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subkat`
--
ALTER TABLE `subkat`
  MODIFY `id_subkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
