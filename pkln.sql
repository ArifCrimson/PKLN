-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2024 at 04:05 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkln`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_03_30_091536_create_yb_categories_table', 1),
(2, '2024_03_30_092337_create_panggilan_table', 2),
(3, '2024_03_30_140740_create_status_permohonan_table', 3),
(4, '2024_03_30_140819_create_negara_table', 4),
(5, '2024_03_24_002158_create_profiles_table', 5),
(6, '2014_10_12_000000_create_users_table', 6),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 7),
(8, '2019_08_19_000000_create_failed_jobs_table', 7),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 7),
(10, '2024_03_30_140854_create_permohonan_table', 7),
(11, '2024_05_20_073913_add_tarikh_jumlah_column', 8),
(12, '2024_05_21_005024_add_status_column', 9),
(13, '2024_05_27_004137_create_permission_tables', 10),
(14, '2024_06_05_025303_create_tambah_catatan', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 17),
(4, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 20),
(2, 'App\\Models\\User', 21),
(2, 'App\\Models\\User', 22),
(2, 'App\\Models\\User', 23),
(2, 'App\\Models\\User', 24),
(2, 'App\\Models\\User', 25),
(2, 'App\\Models\\User', 26),
(2, 'App\\Models\\User', 27),
(2, 'App\\Models\\User', 28),
(2, 'App\\Models\\User', 29),
(2, 'App\\Models\\User', 30),
(2, 'App\\Models\\User', 31),
(2, 'App\\Models\\User', 32),
(2, 'App\\Models\\User', 33),
(2, 'App\\Models\\User', 34),
(2, 'App\\Models\\User', 35),
(2, 'App\\Models\\User', 36);

-- --------------------------------------------------------

--
-- Table structure for table `negara`
--

CREATE TABLE `negara` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `negara`
--

INSERT INTO `negara` (`id`, `name`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'AFGHANISTAN', 'active', NULL, '2024-06-11 19:59:39'),
(2, 'ALBANIA', 'active', NULL, NULL),
(3, 'ALGERIA', 'active', NULL, NULL),
(4, 'ANGOLA', 'active', NULL, NULL),
(5, 'ANGUILLA', 'active', NULL, NULL),
(6, 'ANTIGUA', 'active', NULL, NULL),
(7, 'ARGENTINA', 'active', NULL, NULL),
(8, 'AUSTRALIA', 'active', NULL, NULL),
(9, 'AUSTRIA', 'active', NULL, NULL),
(10, 'ARMENIA', 'active', NULL, NULL),
(11, 'AZERBAIJAN', 'active', NULL, NULL),
(12, 'AMERICAN SAMOA', 'active', NULL, NULL),
(13, 'ANDORRA', 'active', NULL, NULL),
(14, 'BAHAMAS', 'active', NULL, NULL),
(15, 'BAHRAIN', 'active', NULL, NULL),
(16, 'BANGLADESH', 'active', NULL, NULL),
(17, 'BARBADOS', 'active', NULL, NULL),
(18, 'BELGIUM', 'active', NULL, NULL),
(19, 'BERMUDA', 'active', NULL, NULL),
(20, 'BHUTAN', 'active', NULL, NULL),
(21, 'BOLIVIA', 'active', NULL, NULL),
(22, 'BOTSWANA', 'active', NULL, NULL),
(23, 'BRAZIL', 'active', NULL, NULL),
(24, 'BRUNEI', 'active', NULL, NULL),
(25, 'BULGARIA', 'active', NULL, NULL),
(26, 'BURUNDI', 'active', NULL, NULL),
(27, 'BENIN', 'active', NULL, NULL),
(28, 'BELARUS', 'active', NULL, NULL),
(29, 'BELIZE', 'active', NULL, NULL),
(31, 'BULKINA FASO', 'active', NULL, NULL),
(32, 'CAMEROON', 'active', NULL, NULL),
(33, 'CANADA', 'active', NULL, NULL),
(34, 'CHILE', 'active', NULL, NULL),
(35, 'CHINA', 'active', NULL, NULL),
(36, 'COLOMBIA', 'active', NULL, NULL),
(37, 'COSTA RICA', 'active', NULL, NULL),
(38, 'CZECH', 'active', NULL, NULL),
(39, 'CROATIA', 'active', NULL, NULL),
(40, 'CAMBODIA', 'active', NULL, NULL),
(41, 'CENTRAL AFRICAN REPUBLIC', 'active', NULL, NULL),
(42, 'CYPRUS', 'active', NULL, NULL),
(43, 'CASTRIES', 'active', NULL, NULL),
(44, 'DENMARK', 'active', NULL, NULL),
(45, 'DOMINICA', 'active', NULL, NULL),
(46, 'EGYPT', 'active', NULL, NULL),
(47, 'EL SALVADOR', 'active', NULL, NULL),
(48, 'ETHIOPIA', 'active', NULL, NULL),
(49, 'ERITREA', 'active', NULL, NULL),
(50, 'ESTONIA', 'active', NULL, NULL),
(51, 'FIJI', 'active', NULL, NULL),
(52, 'FINLAND', 'active', NULL, NULL),
(53, 'FRANCE', 'active', NULL, NULL),
(54, 'FRENCH POLYNESIA', 'active', NULL, NULL),
(55, 'GABON', 'active', NULL, NULL),
(56, 'GUAM', 'active', NULL, NULL),
(57, 'GERMANY', 'active', NULL, NULL),
(58, 'GHANA', 'active', NULL, NULL),
(59, 'GIBRALTAR', 'active', NULL, NULL),
(60, 'GREECE', 'active', NULL, NULL),
(61, 'GRENADA', 'active', NULL, NULL),
(62, 'GUATEMALA', 'active', NULL, NULL),
(63, 'GUINEA', 'active', NULL, NULL),
(64, 'GUYANA', 'active', NULL, NULL),
(65, 'GAMBIA', 'active', NULL, NULL),
(66, 'GEORGIA', 'active', NULL, NULL),
(67, 'HONG KONG', 'active', NULL, NULL),
(68, 'HUNGARY', 'active', NULL, NULL),
(69, 'ICELAND', 'active', NULL, NULL),
(70, 'INDIA', 'active', NULL, NULL),
(71, 'INDONESIA', 'active', NULL, NULL),
(72, 'IRAN', 'active', NULL, NULL),
(73, 'IRAQ', 'active', NULL, NULL),
(74, 'IRELAND REP.', 'active', NULL, NULL),
(75, 'ITALY', 'active', NULL, NULL),
(76, 'COTE D IVOIRE', 'active', NULL, NULL),
(77, 'JAMAICA', 'active', NULL, NULL),
(78, 'JAPAN', 'active', NULL, NULL),
(79, 'JORDAN', 'active', NULL, NULL),
(80, 'KENYA', 'active', NULL, NULL),
(81, 'NORTH KOREA', 'active', NULL, NULL),
(82, 'SOUTH KOREA', 'active', NULL, NULL),
(83, 'KUWAIT', 'active', NULL, NULL),
(84, 'KAZAKHSTAN', 'active', NULL, NULL),
(85, 'LAOS', 'active', NULL, NULL),
(86, 'LEBANON', 'active', NULL, NULL),
(87, 'LESOTHO', 'active', NULL, NULL),
(88, 'LIBERIA', 'active', NULL, NULL),
(89, 'LIBYA', 'active', NULL, NULL),
(90, 'LIECHTENSTEIN', 'active', NULL, NULL),
(91, 'LUXEMBOURG', 'active', NULL, NULL),
(92, 'LATVIA', 'active', NULL, NULL),
(93, 'LITHUANIA', 'active', NULL, NULL),
(94, 'MALAWI', 'active', NULL, NULL),
(95, 'MALAYSIA', 'active', NULL, NULL),
(96, 'MALI', 'active', NULL, NULL),
(97, 'MALTA', 'active', NULL, NULL),
(98, 'MAURITANIA', 'active', NULL, NULL),
(99, 'MAURITIUS', 'active', NULL, NULL),
(100, 'MEXICO', 'active', NULL, NULL),
(101, 'MONACO', 'active', NULL, NULL),
(102, 'MONGOLIA', 'active', NULL, NULL),
(103, 'MONTSERRAT', 'active', NULL, NULL),
(104, 'MOROCCO', 'active', NULL, NULL),
(105, 'MOZAMBIQUE', 'active', NULL, NULL),
(106, 'MADAGASCAR', 'active', NULL, NULL),
(107, 'MOLDOVA', 'active', NULL, NULL),
(108, 'MYANMAR', 'active', NULL, NULL),
(109, 'MUSCAT', 'active', NULL, NULL),
(110, 'MACAU', 'active', NULL, NULL),
(111, 'MACEDONIA', 'active', NULL, NULL),
(112, 'MAYOTTE', 'active', NULL, NULL),
(113, 'MARSHALL ISLAND', 'active', NULL, NULL),
(114, 'MICRONESIA FEDERATION', 'active', NULL, NULL),
(115, 'MONTENEGRO', 'active', NULL, NULL),
(116, 'NAURU', 'active', NULL, NULL),
(117, 'NEPAL', 'active', NULL, NULL),
(118, 'NETHERLANDS', 'active', NULL, NULL),
(119, 'NEW ZEALAND', 'active', NULL, NULL),
(120, 'NICARAGUA', 'active', NULL, NULL),
(121, 'NIGER', 'active', NULL, NULL),
(122, 'NIGERIA', 'active', NULL, NULL),
(123, 'NORWAY', 'active', NULL, NULL),
(124, 'NAMIBIA', 'active', NULL, NULL),
(125, 'NEW CALEDONIA', 'active', NULL, NULL),
(126, 'NETHERLANDS ANTILLES', 'active', NULL, NULL),
(127, 'NORTHERN MARIANA ISLANDS', 'active', NULL, NULL),
(128, 'OMAN', 'active', NULL, NULL),
(129, 'PAKISTAN', 'active', NULL, NULL),
(130, 'PANAMA', 'active', NULL, NULL),
(131, 'PAPUA N GUINEA', 'active', NULL, NULL),
(132, 'PARAGUAY', 'active', NULL, NULL),
(133, 'PERU', 'active', NULL, NULL),
(134, 'PHILIPPINES', 'active', NULL, NULL),
(135, 'POLAND', 'active', NULL, NULL),
(136, 'PORTUGAL', 'active', NULL, NULL),
(137, 'PACIFIC ISLAND', 'active', NULL, NULL),
(138, 'PUERTO RICO', 'active', NULL, NULL),
(139, 'PALESTINE', 'active', NULL, NULL),
(140, 'PALAU', 'active', NULL, NULL),
(141, 'QATAR', 'active', NULL, NULL),
(142, 'ROMANIA', 'active', NULL, NULL),
(143, 'RWANDA', 'active', NULL, NULL),
(144, 'RUSSIA', 'active', NULL, NULL),
(145, 'SAMOA', 'active', NULL, NULL),
(146, 'SAN MARINO', 'active', NULL, NULL),
(147, 'SAUDI ARABIA', 'active', NULL, NULL),
(148, 'SENEGAL', 'active', NULL, NULL),
(149, 'SIERRA LEONE', 'active', NULL, NULL),
(150, 'SINGAPORE', 'active', NULL, NULL),
(151, 'SOUTH AFRICA', 'active', NULL, NULL),
(152, 'SOMALIA', 'active', NULL, NULL),
(153, 'SPAIN', 'active', NULL, NULL),
(154, 'SRI LANKA', 'active', NULL, NULL),
(155, 'SUDAN', 'active', NULL, NULL),
(156, 'SWEDEN', 'active', NULL, NULL),
(157, 'SWITZERLAND', 'active', NULL, NULL),
(158, 'SYRIA', 'active', NULL, NULL),
(159, 'SOLOMON ISLAND', 'active', NULL, NULL),
(160, 'SLOVENIA', 'active', NULL, NULL),
(161, 'SLOVAKIA, REP', 'active', NULL, NULL),
(162, 'SURINAME', 'active', NULL, NULL),
(163, 'SWAZILAND', 'active', NULL, NULL),
(164, 'SAO TOME & PRINCIPE', 'active', NULL, NULL),
(165, 'SERBIA AND MONTENEGRO', 'active', NULL, NULL),
(166, 'ST. LUCIA', 'active', NULL, NULL),
(167, 'SOUTH GEORGIA & SOUTH SANDWICH ISLAND', 'active', NULL, NULL),
(168, 'SERBIA', 'active', NULL, NULL),
(169, 'ST. VINCENT AND THE GRENADINES', 'active', NULL, NULL),
(170, 'SOUTH SUDAN', 'active', NULL, NULL),
(171, 'SAINT KITTS AND NEVIS', 'active', NULL, NULL),
(172, 'TAHITI', 'active', NULL, NULL),
(173, 'TAIWAN', 'active', NULL, NULL),
(174, 'TANZANIA', 'active', NULL, NULL),
(175, 'TURKMENISTAN', 'active', NULL, NULL),
(176, 'THAILAND', 'active', NULL, NULL),
(177, 'TOBAGO', 'active', NULL, NULL),
(178, 'TOGO', 'active', NULL, NULL),
(179, 'TONGA', 'active', NULL, NULL),
(180, 'TRINIDAD', 'active', NULL, NULL),
(181, 'TUNISIA', 'active', NULL, NULL),
(182, 'TURKEY', 'active', NULL, NULL),
(183, 'TAJIKISTAN', 'active', NULL, NULL),
(184, 'TUVALU', 'active', NULL, NULL),
(185, 'UGANDA', 'active', NULL, NULL),
(186, 'UNITED KINGDOM', 'active', NULL, NULL),
(187, 'U.S.A', 'active', NULL, NULL),
(188, 'URUGUAY', 'active', NULL, NULL),
(189, 'U.A.E', 'active', NULL, NULL),
(190, 'UKRAINE', 'active', NULL, NULL),
(191, 'UZBEKISTAN', 'active', NULL, NULL),
(192, 'VENEZUELA', 'active', NULL, NULL),
(193, 'VIETNAM', 'active', NULL, NULL),
(194, 'VANUATU', 'active', NULL, NULL),
(195, 'YEMEN ARAB REP', 'active', NULL, NULL),
(196, 'YUGOSLAVIA', 'active', NULL, NULL),
(197, 'ZAIRE', 'active', NULL, NULL),
(198, 'ZAMBIA', 'active', NULL, NULL),
(199, 'ZIMBABWE', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `panggilan`
--

CREATE TABLE `panggilan` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `panggilan`
--

INSERT INTO `panggilan` (`id`, `name`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'CIK', 'active', NULL, NULL),
(2, 'TUAN', 'active', NULL, NULL),
(3, 'PUAN', 'active', NULL, NULL),
(4, 'DATUK', 'active', NULL, NULL),
(5, 'DATO\'', 'active', NULL, NULL),
(6, 'TAN SRI', 'active', NULL, NULL),
(7, 'TUAN HAJI', 'active', NULL, NULL),
(8, 'YAB', 'active', NULL, NULL),
(9, 'YAB DR.', 'active', NULL, NULL),
(10, 'YM', 'active', NULL, NULL),
(11, 'YB', 'active', NULL, NULL),
(12, 'YBRS.', 'active', NULL, NULL),
(13, 'YB DATO', 'active', NULL, NULL),
(14, 'YBHG. DATO\' DR. HAJI', 'active', NULL, NULL),
(15, 'TOH PUAN', 'active', NULL, NULL),
(16, 'DATIN SRI', 'active', NULL, NULL),
(17, 'ENCIK', 'active', NULL, NULL),
(18, 'YB SENATOR', 'active', NULL, NULL),
(19, 'YB SENATOR DATO', 'active', NULL, NULL),
(20, 'YAB DATO\' SERI', 'active', NULL, NULL),
(21, 'YB DATO\' SERI', 'active', NULL, NULL),
(22, 'TPR. GS.', 'active', NULL, NULL),
(23, 'TPR.', 'active', NULL, NULL),
(24, 'USTAZ', 'active', NULL, NULL),
(25, 'IR.', 'active', NULL, NULL),
(26, 'DR.', 'active', NULL, NULL),
(27, 'PUAN HAJAH', 'active', NULL, NULL),
(28, 'YBHG. DR.', 'active', NULL, NULL),
(29, 'YBHG. DATO', 'active', NULL, NULL),
(30, 'DULI YANG TERAMAT MULIA', 'active', NULL, NULL),
(31, 'YBM', 'active', NULL, NULL),
(32, 'PPJB', 'active', NULL, NULL),
(33, 'LT. KOL. BERSEKUTU (PA)', 'active', NULL, NULL),
(34, 'YBHG. PROF.', 'active', NULL, NULL),
(35, 'PROF.', 'active', NULL, NULL),
(36, 'YDH. DCP', 'active', NULL, NULL),
(37, 'LT.KOL.', 'active', NULL, NULL),
(38, 'LEFTENAN KOLONEL', 'active', NULL, NULL),
(39, 'PPJKR', 'active', NULL, NULL),
(40, 'KAPTEN MARITIM', 'active', NULL, NULL),
(41, 'ACP', 'active', NULL, NULL),
(42, 'SUPT.', 'active', NULL, NULL),
(43, 'DSP', 'active', NULL, NULL),
(44, 'SUPT.', 'active', NULL, NULL),
(45, 'TKP', 'active', NULL, NULL),
(46, 'Y.A.', 'active', NULL, NULL),
(47, 'P/SUPT', 'active', NULL, NULL),
(48, 'ASP', 'active', NULL, NULL),
(49, 'YBRA. PROF MADYA DR.', 'active', NULL, NULL),
(50, 'YBHG. PROFESOR MADYA DR.', 'active', NULL, NULL),
(51, 'YAA TUAN HAJI', 'active', NULL, NULL),
(52, 'KPKPJ', 'active', NULL, NULL),
(53, 'YBHG.', 'active', NULL, NULL),
(55, 'TS.', 'active', NULL, NULL),
(56, 'YH', 'active', NULL, NULL),
(57, 'SAC', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'view permohonan', 'web', '2024-05-27 22:49:09', '2024-05-27 22:49:09'),
(4, 'create permohonan', 'web', '2024-05-27 22:49:09', '2024-05-27 22:49:09'),
(5, 'edit permohonan', 'web', '2024-05-27 22:49:09', '2024-05-27 22:49:09'),
(6, 'delete permohonan', 'web', '2024-05-27 22:49:09', '2024-05-27 22:49:09'),
(7, 'urusetia approve permohonan', 'web', '2024-05-27 22:49:09', '2024-05-27 22:49:09'),
(8, 'urusetia rejected permohonan', 'web', '2024-05-27 22:49:09', '2024-05-27 22:49:09'),
(9, 'pelulus approve permohonan', 'web', '2024-05-27 22:49:09', '2024-05-27 22:49:09'),
(10, 'pelulus rejected permohonan', 'web', '2024-05-27 22:49:09', '2024-05-27 22:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id` bigint UNSIGNED NOT NULL,
  `tempoh_lawatan_start` date NOT NULL,
  `tempoh_lawatan_end` date NOT NULL,
  `jumlah_hari` int DEFAULT NULL,
  `tarikh_kembali` date DEFAULT NULL,
  `negara_id` bigint UNSIGNED NOT NULL,
  `tujuan_lawatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_permohonan_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profiles_id` bigint UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accepted_by_urusetia_at` timestamp NULL DEFAULT NULL,
  `approved_by_pelulus_at` timestamp NULL DEFAULT NULL,
  `notice_to_pemohon_at` timestamp NULL DEFAULT NULL,
  `catatan_urusetia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan_pelulus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`id`, `tempoh_lawatan_start`, `tempoh_lawatan_end`, `jumlah_hari`, `tarikh_kembali`, `negara_id`, `tujuan_lawatan`, `address_1`, `address_2`, `address_3`, `status_permohonan_id`, `created_at`, `updated_at`, `profiles_id`, `status`, `accepted_by_urusetia_at`, `approved_by_pelulus_at`, `notice_to_pemohon_at`, `catatan_urusetia`, `catatan_pelulus`) VALUES
(3, '2024-05-17', '2024-05-22', 5, '2024-05-22', 95, 'saje nk cuti', 'Lot 6391, Taman Permint Permata, 21700 Kuala Berang, Hulu Terengganu, Terengganu.', '-', NULL, 1, '2024-05-15 21:50:00', '2024-06-04 16:18:48', 7, 'Emel Dihantar', '2024-05-21 00:16:07', '2024-05-25 20:28:33', NULL, NULL, NULL),
(4, '2024-05-19', '2024-05-23', 4, '2024-05-22', 18, 'bior aku ah nk gi', 'lot 21, taman permint, usa', NULL, NULL, 4, '2024-05-18 20:17:52', '2024-06-04 18:47:31', 12, 'Emel Dihantar', '2024-05-21 01:17:23', '2024-05-25 20:28:52', '2024-06-04 18:47:26', NULL, NULL),
(6, '2024-05-21', '2024-05-23', 3, '2024-05-25', 82, 'kene gi situ', 'seoul', NULL, NULL, 1, '2024-05-20 16:38:19', '2024-06-09 12:24:04', 14, 'Emel Dihantar', '2024-05-20 20:09:33', '2024-05-25 20:29:04', '2024-06-09 12:23:59', NULL, NULL),
(7, '2024-05-28', '2024-05-31', 3, '2024-05-31', 95, 'saje nk cuti xleh ke...', 'Lot 6391, Taman Permint Permata, 21700 Kuala Berang, Hulu Terengganu, Terengganu.', '-', NULL, 4, '2024-05-25 22:28:24', '2024-05-25 22:40:56', 7, 'Permohonan Ditolak', '2024-05-25 22:30:13', '2024-05-25 22:40:56', NULL, NULL, NULL),
(8, '2024-05-27', '2024-05-28', 1, '2024-05-29', 95, 'saje nk cuti xleh ke...', 'Lot 6391, Taman Permint Permata, 21700 Kuala Berang, Hulu Terengganu, Terengganu.', '-', NULL, 1, '2024-05-25 22:39:23', '2024-05-25 22:40:34', 7, 'Pelulus Terima', '2024-05-25 22:40:14', '2024-05-25 22:40:34', NULL, NULL, NULL),
(9, '2024-05-30', '2024-05-31', 1, '2024-06-01', 95, 'kene gi situ', 'Lot 6391, Taman Permint Permata, 21700 Kuala Berang, Hulu Terengganu, Terengganu.', '-', NULL, 1, '2024-05-29 15:59:13', '2024-06-03 18:07:34', 7, 'Pelulus Terima', '2024-06-03 18:07:23', '2024-06-03 18:07:34', NULL, NULL, NULL),
(10, '2024-06-05', '2024-06-08', 3, '2024-06-09', 95, 'kene gi situ', 'Lot KL', NULL, NULL, 4, '2024-06-03 18:38:17', '2024-06-04 19:53:02', 12, 'Emel Dihantar', '2024-06-03 18:38:24', '2024-06-04 19:52:16', '2024-06-04 19:52:57', NULL, 'asd'),
(11, '2024-06-05', '2024-06-06', 1, '2024-06-06', 95, 'saje nk cuti', 'Lot 6391, Taman Permint Permata, 21700 Kuala Berang, Hulu Terengganu, Terengganu.', '-', NULL, 4, '2024-06-04 19:53:51', '2024-06-04 20:16:34', 7, 'Emel Dihantar', '2024-06-04 20:16:23', NULL, '2024-06-04 20:16:29', 'jeng gini', NULL),
(12, '2024-06-05', '2024-06-06', 1, '2024-06-07', 95, 'saje nk cuti', 'Lot 6391, Taman Permint Permata, 21700 Kuala Berang, Hulu Terengganu, Terengganu.', '-', NULL, 4, '2024-06-04 20:20:21', '2024-06-04 20:27:43', 7, 'Permohonan Ditolak', '2024-06-04 20:25:05', '2024-06-04 20:27:43', NULL, NULL, 't'),
(13, '2024-06-07', '2024-06-09', 2, '2024-06-10', 95, 'saje nk cuti', 'LOT 6391, TAMAN PERMINT PERMATA, 21700 KUALA BERANG', ', TERENGGANU', NULL, 1, '2024-06-05 15:41:31', '2024-06-05 15:48:35', 7, 'Pelulus Terima', '2024-06-05 15:48:23', '2024-06-05 15:48:35', NULL, NULL, NULL),
(15, '2024-06-07', '2024-06-08', 1, '2024-06-09', 95, 'saje nk cuti', 'Lot 6391, Taman Permint Permata, 21700 Kuala Berang, Hulu Terengganu, Terengganu.', NULL, NULL, 4, '2024-06-05 22:23:38', '2024-06-09 12:17:06', 7, 'Permohonan Ditolak', '2024-06-09 12:05:29', '2024-06-09 12:17:06', NULL, NULL, 'Tolong masukkan tujuan yang betul'),
(16, '2024-06-08', '2024-06-09', 1, '2024-06-10', 1, 'saje nk cuti', 'asdad', NULL, NULL, 1, '2024-06-07 16:01:47', '2024-06-10 23:48:51', 18, 'Pelulus Terima', '2024-06-10 22:05:53', '2024-06-10 23:48:51', NULL, NULL, NULL),
(17, '2024-06-10', '2024-06-11', 1, '2024-06-12', 95, 'saje nk cuti', 'LOT 6391, TAMAN PERMINT PERMATA, 21700 KUALA BERANG', ', TERENGGANU', NULL, 4, '2024-06-08 17:46:38', '2024-06-10 23:49:09', 18, 'Permohonan Ditolak', '2024-06-10 23:49:09', NULL, NULL, 'aduhhh', NULL),
(21, '2024-06-13', '2024-06-15', 2, '2024-06-16', 23, '-', '-', NULL, NULL, 3, '2024-06-10 23:50:05', '2024-06-10 23:50:16', 14, 'Urusetia Terima', '2024-06-10 23:50:16', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint DEFAULT NULL,
  `yb_categories_id` bigint UNSIGNED DEFAULT NULL,
  `portfolio_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panggilan_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawatan_hakiki` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelaran_di_jawatan` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_1` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_2` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_3` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_attach_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `yb_categories_id`, `portfolio_name`, `panggilan_id`, `name`, `no_kp`, `jawatan_hakiki`, `gelaran_di_jawatan`, `address_1`, `address_2`, `address_3`, `no_hp`, `email`, `gambar_attach_1`, `created_at`, `updated_at`) VALUES
(7, 1, 6, 'Hakimi', 2, 'MUHAMMAD ARIF HAKIMI BIN MOHD HASNADI BIN MOHD HASNADI', '030503110443', 'Tinggi', 'Orang Tinggi', 'Lot 6391, Taman Permint Permata, 21700 Kuala Berang, Hulu Terengganu, Terengganu.', 'Lot 6391, Taman Permint Permata, 21700 Kuala Berang, Hulu Terengganu, Terengganu.', 'Lot 6391, Taman Permint Permata, 21700 Kuala Berang, Hulu Terengganu, Terengganu.', '0139936898', 'hakimiarif132@gmail.com', '24-05-12IMG_20210909_054620.jpg', '2024-05-11 23:26:47', '2024-05-14 18:37:27'),
(12, 1, 5, 'rusa', 1, 'Kauras', '111111111111', 'Tinggi', 'tingi gok', '-', '-', '-', '0128876445', 'OKkG_@gmail.com', NULL, '2024-05-14 00:25:14', '2024-05-14 18:40:38'),
(14, 1, 6, 'hak', 47, 'Hakimi bin', '030303110449', 'berhormat', 'tingi gok', '-', '-', '-', '01111111115', 'hak123@gmail.com', NULL, '2024-05-14 18:56:20', '2024-05-14 18:58:03'),
(17, 1, 1, 'adil', 6, 'aidil', '111111111222', 'berhormat', 'orang tinggi lagi', 'Lot 6391, Taman Permint Permata, 21700 Kuala Berang, Hulu Terengganu, Terengganu.', 'Lot 6391, Taman Permint Permata, 21700 Kuala Berang, Hulu Terengganu, Terengganu.', NULL, '0139936898', 'as11@gmail.com', '24-05-20WallpaperDog-169180.jpg', '2024-05-14 20:50:07', '2024-05-19 17:22:22'),
(18, 16, 6, 'Akiea', 7, 'Akiea', '030503110447', 'Tinggi', 'tingi gok', 'LOT 6391, TAMAN PERMINT PERMATA, 21700 KUALA BERANG', '-', '-', '011111234', 'Akiea@gmail.com', NULL, '2024-05-29 19:13:10', '2024-05-29 19:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-05-26 17:05:43', '2024-05-26 17:05:43'),
(2, 'user', 'web', '2024-05-26 17:06:55', '2024-05-26 17:06:55'),
(3, 'urusetia', 'web', '2024-05-26 17:06:55', '2024-05-26 17:06:55'),
(4, 'pelulus', 'web', '2024-05-26 17:06:55', '2024-05-26 17:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(9, 4),
(10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `status_permohonan`
--

CREATE TABLE `status_permohonan` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_permohonan`
--

INSERT INTO `status_permohonan` (`id`, `name`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'PERMOHONAN DILULUSKAN', 'active', NULL, NULL),
(2, 'PERMOHONAN DIHANTAR', 'active', NULL, NULL),
(3, 'PERMOHONAN SEDANG DIPROSES', 'active', NULL, NULL),
(4, 'PERMOHONAN BATAL', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','pelulus','urusetia','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Arif Hakimi', 'hakimiarif132@gmail.com', '2024-05-04 12:27:47', '$2y$12$9HFG2PJw3L9KkNUP65mo0.zydLGHBSgprBeTn9qjmOCmsnaWeQsX.', NULL, 'admin', 'active', 'viCok1R5KbfjI4S0rDZ4O0smSzR9PYLDO3zYlS9HsIG87ySVFBQPtZqG3D13', '2024-03-30 16:42:52', '2024-03-30 16:42:52'),
(16, 'kimi', 'hakimiarifmuhammad11@gmail.com', '2024-05-21 12:28:40', '$2y$12$2Y3BYvWtCgxc0HKj5Ajuy.BfMyeqwpMp.uWHGpJGcaLyAj.UxE/OC', NULL, 'user', 'active', NULL, '2024-04-13 16:42:56', '2024-06-11 18:49:11'),
(17, 'c11', 'c11@gmail.com', '2024-05-22 12:28:40', '$2y$12$0D3a3amx7DHEqaWq64nXzudYBKRJN1Cyx0zARD29N0HXlK0a2rlXW', NULL, 'urusetia', 'active', NULL, '2024-05-18 20:37:43', '2024-05-18 20:37:43'),
(18, 'x11', 'x11@gmail.com', '2024-06-23 12:28:40', '$2y$12$9hI4t/xAwGohS5O6FfzZxuLzz3MVK8Ep/W60R.x1e4ae7tuXufg7K', NULL, 'pelulus', 'active', NULL, '2024-05-18 20:38:15', '2024-05-18 20:38:15'),
(36, 'kimika', 'kimika@gmail.com', '2024-06-03 18:12:02', '$2y$12$CtAMCLiGv6v8G.iB8WdZB.qNtLPNFbDCjM3/9wgK4UEnqBDpC7Aim', NULL, 'user', 'active', NULL, '2024-06-03 18:10:44', '2024-06-03 18:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `yb_categories`
--

CREATE TABLE `yb_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yb_categories`
--

INSERT INTO `yb_categories` (`id`, `name`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'AHLI DEWAN NEGARA NEGERI TERENGGANU', 'active', NULL, NULL),
(2, 'AHLI DEWAN RAKYAT NEGERI TERENGGANU', 'active', NULL, NULL),
(3, 'AHLI DEWAN UNDANGAN NEGERI TERENGGANU', 'active', NULL, NULL),
(4, 'AHLI-AHLI MAJLIS MESYUARAT KERAJAAN NEGERI TERENGGANU', 'active', NULL, NULL),
(5, 'AHLI-AHLI DEWAN PANGKUAN DIRAJA TERENGGANU', 'active', NULL, NULL),
(6, 'PEGAWAI PENYELARAS DUN', 'active', NULL, NULL);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panggilan`
--
ALTER TABLE `panggilan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permohonan_negara_id_foreign` (`negara_id`),
  ADD KEY `permohonan_status_permohonan_id_foreign` (`status_permohonan_id`),
  ADD KEY `permohonan_profiles_id_foreign` (`profiles_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_email_unique` (`email`),
  ADD UNIQUE KEY `no_kp` (`no_kp`),
  ADD KEY `profiles_yb_categories_id_foreign` (`yb_categories_id`),
  ADD KEY `profiles_panggilan_id_foreign` (`panggilan_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `status_permohonan`
--
ALTER TABLE `status_permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `yb_categories`
--
ALTER TABLE `yb_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `negara`
--
ALTER TABLE `negara`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `panggilan`
--
ALTER TABLE `panggilan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_permohonan`
--
ALTER TABLE `status_permohonan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `yb_categories`
--
ALTER TABLE `yb_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD CONSTRAINT `permohonan_negara_id_foreign` FOREIGN KEY (`negara_id`) REFERENCES `negara` (`id`),
  ADD CONSTRAINT `permohonan_profiles_id_foreign` FOREIGN KEY (`profiles_id`) REFERENCES `profiles` (`id`),
  ADD CONSTRAINT `permohonan_status_permohonan_id_foreign` FOREIGN KEY (`status_permohonan_id`) REFERENCES `status_permohonan` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_panggilan_id_foreign` FOREIGN KEY (`panggilan_id`) REFERENCES `panggilan` (`id`),
  ADD CONSTRAINT `profiles_yb_categories_id_foreign` FOREIGN KEY (`yb_categories_id`) REFERENCES `yb_categories` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
