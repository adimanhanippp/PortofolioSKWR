-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2018 at 06:23 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larastarter`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `noanggota` varchar(255) DEFAULT NULL,
  `nip` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomorhp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `unitkerja` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`noanggota`, `nip`, `password`, `namalengkap`, `email`, `nomorhp`, `alamat`, `jabatan`, `unitkerja`, `created_at`, `updated_at`) VALUES
('SKWR003', '0852', '$2y$10$TRh93FJ3PHWoPlgSeInpLOQdWLkjdeTLWwpxoMtEbXB3EKOYPfBJG', 'adiman', 'ad@gmail.com', '0852', 'Jakarta', 'Staf sistem informasi', 'Biro Sistem Manajemen', '2018-08-09 01:46:27', '2018-08-09 01:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `fcomment`
--

CREATE TABLE `fcomment` (
  `id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_forum` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_acc_id` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `judul`, `isi`, `id_kategori`, `created_at`, `user_acc_id`, `updated_at`) VALUES
(1, 'Apakah Proyek  Langit Memberi Gaji?', 'benarkah jika proyek langit memberi gaji kepada karyawan mereka?', 1, '2018-07-13 09:06:21', 1, '2018-07-13 09:06:21'),
(3, 'berita 4', 'isi', 3, '2018-08-09 03:52:22', 1, '2018-08-09 03:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `forum_kategori`
--

CREATE TABLE `forum_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_kategori`
--

INSERT INTO `forum_kategori` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Proyek Langit', '2018-07-13 08:57:33', '2018-07-13 08:57:33'),
(3, 'CSGO Game', '2018-08-08 17:17:59', '2018-08-08 17:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `order_no` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `parent`, `icon`, `is_active`, `order_no`, `created_at`, `updated_at`) VALUES
(1, 'Beranda', '/', NULL, 'fa fa-home', 1, 1, '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(2, 'Pengaturan', 'settings', NULL, 'fa fa-cog', 1, 10, '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(3, 'Menu', 'menus', 'settings', 'fa fa-list-alt', 1, 1, '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(4, 'Roles', 'roles', 'settings', 'fa fa-users', 1, 2, '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(5, 'Users', 'users', 'settings', 'fa fa-user', 1, 3, '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(14, 'Contact Us', 'contacs', NULL, 'fa fa-phone', 1, 9, '2018-06-06 02:06:34', '2018-06-07 02:38:18'),
(19, 'News', 'news_ctrl', NULL, 'fa fa-newspaper-o', 1, 2, '2018-06-06 06:51:51', '2018-07-17 03:33:41'),
(20, 'Forum', 'forum', NULL, 'fa fa-commenting', 1, 5, '2018-06-06 06:53:24', '2018-06-06 06:53:24'),
(21, 'Polling', 'polling', NULL, 'glyphicon glyphicon-stats', 1, 6, '2018-06-06 06:53:59', '2018-06-06 06:53:59'),
(22, 'Sharing', 'sharing', NULL, 'fa fa-share-alt-square', 1, 7, '2018-06-06 06:54:19', '2018-06-06 06:55:45'),
(23, 'Anggota', 'anggota', NULL, 'fa fa-group', 1, 8, '2018-06-06 06:54:57', '2018-06-06 06:54:57'),
(27, 'Kepengurusan', 'PengurusAll', NULL, 'fa fa-gears', 1, 3, '2018-06-07 02:16:10', '2018-08-01 07:36:19'),
(28, 'Approve', 'approve', NULL, 'glyphicon glyphicon-check', 1, 9, '2018-07-16 03:49:52', '2018-07-16 03:49:52'),
(29, 'News', 'news', 'news_ctrl', 'fa fa-newspaper-o', 1, 1, '2018-07-17 03:32:43', '2018-07-17 03:32:43'),
(30, 'View News', 'news/view', 'news_ctrl', 'fa fa-newspaper-o', 1, 2, '2018-07-17 03:36:04', '2018-07-18 01:43:38'),
(32, 'Pengurus', 'Pengurus', 'PengurusAll', 'fa fa-user', 1, 1, '2018-07-25 07:52:47', '2018-08-01 07:36:34'),
(33, 'Struktur Organisasi', 'strukturOrg', 'PengurusAll', 'fa fa-users', 1, 2, '2018-07-25 07:53:25', '2018-07-25 07:53:25'),
(34, 'History Kepengurusan', 'history', 'PengurusAll', 'fa fa-history', 1, 3, '2018-07-26 02:30:31', '2018-07-26 02:30:31'),
(35, 'Profil', 'profil', NULL, 'fa fa-user', 1, 10, '2018-07-30 06:10:19', '2018-07-30 06:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `menu_permission`
--

CREATE TABLE `menu_permission` (
  `menu_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_permission`
--

INSERT INTO `menu_permission` (`menu_id`, `permission_id`) VALUES
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(14, 14),
(20, 23),
(20, 28),
(20, 29),
(20, 34),
(20, 35),
(20, 36),
(20, 37),
(21, 24),
(21, 45),
(21, 46),
(22, 25),
(22, 30),
(22, 31),
(22, 32),
(22, 33),
(23, 26),
(27, 51),
(28, 38),
(28, 39),
(28, 40),
(29, 41),
(30, 42),
(32, 47),
(32, 48),
(32, 49),
(33, 50),
(34, 52),
(35, 53);

-- --------------------------------------------------------

--
-- Table structure for table `menu_role`
--

CREATE TABLE `menu_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_role`
--

INSERT INTO `menu_role` (`role_id`, `menu_id`) VALUES
(1, 1),
(2, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 14),
(2, 14),
(1, 19),
(1, 20),
(2, 20),
(1, 21),
(2, 21),
(1, 22),
(2, 22),
(1, 23),
(2, 23),
(1, 27),
(2, 27),
(1, 28),
(1, 29),
(1, 30),
(2, 30),
(1, 32),
(2, 32),
(1, 33),
(2, 33),
(1, 34),
(2, 34),
(1, 35),
(2, 35);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_07_224428_entrust_setup_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`Id`, `Title`, `Author`, `Description`, `Isi`, `created_at`, `updated_at`, `Gambar`) VALUES
(11, 'titles', 'author', 'description', 'isian lagiiiiiiiii\r\nlagi\r\nlagi\r\ndan lagi', '2018-07-09 09:47:21', '2018-08-01 08:35:50', 'assets/image/news/5b6170e6a4894_1533112550_20180801.jpg'),
(14, 'a', 'a', 'a', 'a', '2018-07-09 04:31:08', '2018-07-09 04:31:08', 'assets/image/news/5b42e50c08f5c_1531110668_20180709.jpg'),
(16, 's', 's', 's', 's', '2018-07-09 08:14:26', '2018-07-09 08:14:26', 'assets/image/news/5b4319621948c_1531124066_20180709.PNG'),
(17, 'nope', 'nope', 'aku', 'saaass', '2018-07-09 08:18:28', '2018-07-11 02:39:02', 'assets/image/news/5b456dc5d4b85_1531276741_20180711.PNG'),
(22, 'n', 'n', 'n', 'n', '2018-07-18 10:01:26', '2018-07-18 10:01:26', 'assets/image/news/5b4f0ff5ed5f3_1531908085_20180718.jpg'),
(23, 'WIKA Realty Mendapatkan Property Indonesia Awards 2018', 'Admin', 'PT WIKA Realty Tbk dengan bangga mempersembahkan pencapaian terbaru atas penghargaan Property Indonesia Awards 2018. Acara penganugerahan ini diselenggarakan pada 3 Juli 2018 oleh Majalah Property Indonesia. WIKA Realty meraih penghargaan dalam kategori The Prospective State-Owned Enterprise Developer. ', 'PT WIKA Realty Tbk dengan bangga mempersembahkan pencapaian terbaru atas penghargaan Property Indonesia Awards 2018. Acara penganugerahan ini diselenggarakan pada 3 Juli 2018 oleh Majalah Property Indonesia. WIKA Realty meraih penghargaan dalam kategori The Prospective State-Owned Enterprise Developer. \r\n\r\nPerusahaan sangat bangga dengan dinobatkannya kami sebagai salah satu perusahaan Property BUMN terbaik. WIKA Realty selalu berkomitmen untuk menjadi pengembang terbaik dengan memberikan berbagai pilihan property investasi serta performa perusahaan yang gemilang. \r\n\r\nBerdasarkan laporan tahun 2017, Perusahaan telah berhasil membukukan sekitar Rp 1,5 Trilyun marketing sales. Sementara, untuk tahun ini Perusahaan menargetkan untuk meningkatkan angka tersebut sebesar 87%. Saat ini, WIKA Realty sendiri sedang mengembangkan beberapa proyek yaitu Tamansari Grand Samarinda, Tamansari Skylounge Balikpapan, Tamansari Puri Bali II, Depok, Tamansari SkyHive, Jakarta, Tamansari Kencana, Bandung, Tamansari Gangga, Bali, Tamansari Emerald, Surabaya, dan Tamansari Skylounge Makassar. Di tahun 2018 ini, Perusahaan juga berencana untuk melakukan Penawaran Saham Perdana (IPO) sebagai salah satu strategi untuk meningkatkan performa perusahaan. ', '2018-07-25 01:53:22', '2018-07-25 01:53:22', 'assets/image/news/5b57d811e6894_1532483601_20180725.jpg'),
(24, 'WIKA Realty Mendapatkan Property Indonesia Awards 2018', 'Admin', 'PT WIKA Realty Tbk dengan bangga mempersembahkan pencapaian terbaru atas penghargaan Property Indonesia Awards 2018. Acara penganugerahan ini diselenggarakan pada 3 Juli 2018 oleh Majalah Property Indonesia. WIKA Realty meraih penghargaan dalam kategori The Prospective State-Owned Enterprise Developer. ', 'PT WIKA Realty Tbk dengan bangga mempersembahkan pencapaian terbaru atas penghargaan Property Indonesia Awards 2018. Acara penganugerahan ini diselenggarakan pada 3 Juli 2018 oleh Majalah Property Indonesia. WIKA Realty meraih penghargaan dalam kategori The Prospective State-Owned Enterprise Developer. \r\n\r\nPerusahaan sangat bangga dengan dinobatkannya kami sebagai salah satu perusahaan Property BUMN terbaik. WIKA Realty selalu berkomitmen untuk menjadi pengembang terbaik dengan memberikan berbagai pilihan property investasi serta performa perusahaan yang gemilang. \r\n\r\nBerdasarkan laporan tahun 2017, Perusahaan telah berhasil membukukan sekitar Rp 1,5 Trilyun marketing sales. Sementara, untuk tahun ini Perusahaan menargetkan untuk meningkatkan angka tersebut sebesar 87%. Saat ini, WIKA Realty sendiri sedang mengembangkan beberapa proyek yaitu Tamansari Grand Samarinda, Tamansari Skylounge Balikpapan, Tamansari Puri Bali II, Depok, Tamansari SkyHive, Jakarta, Tamansari Kencana, Bandung, Tamansari Gangga, Bali, Tamansari Emerald, Surabaya, dan Tamansari Skylounge Makassar. Di tahun 2018 ini, Perusahaan juga berencana untuk melakukan Penawaran Saham Perdana (IPO) sebagai salah satu strategi untuk meningkatkan performa perusahaan. ', '2018-07-25 01:53:44', '2018-07-25 01:53:44', 'assets/image/news/5b57d8280226f_1532483624_20180725.jpg'),
(25, 'Groundbreaking Tamansari Emerald Surabaya', 'Admin', 'PT WIKA Realty Tbk dengan bangga mempersembahkan pelaksanaan acara peletakan batu pertama proyek terbaru kami, Tamansari Emerald di Surabaya pada tanggal 5 Mei 2018. Acara ini diadakan di lokasi Property, yaitu di Jalan Emerald Mansion Citraland, Kota Surabaya.', 'PT WIKA Realty Tbk dengan bangga mempersembahkan pelaksanaan acara peletakan batu pertama proyek terbaru kami, Tamansari Emerald di Surabaya pada tanggal 5 Mei 2018. Acara ini diadakan di lokasi Property, yaitu di Jalan Emerald Mansion Citraland, Kota SurabayaPT WIKA Realty Tbk dengan bangga mempersembahkan pelaksanaan acara peletakan batu pertama proyek terbaru kami, Tamansari Emerald di Surabaya pada tanggal 5 Mei 2018. Acara ini diadakan di lokasi Property, yaitu di Jalan Emerald Mansion Citraland, Kota Surabaya.\r\n\r\nTamansari Emerald Surabaya merupakan produk apartemen dan kondotel  ke dua yang kami kembangkan di Surabaya. Proyek ini mengusung tema ‘Redefine Stylish Living’ yang menyatukan konsep luxurydan naturedengan designarsitektur dari konsultan Urbane. Apartemen ini akan dilengkapi dengan fasilitas Smart Home Technologypada setiap unitnya untuk mendukung konsep luxury living. Selain itu, Tamansari Emerald Surabaya juga akan dilengkapi dengan ready to drink water installationdan beberapa fasilitas eksklusif lainnya, seperti: private cinema room, skybar, skygarden, BBQ area, infinity swimming pool, luxury spa, gym, jogging track, putting green area,hingga virtual golf.\r\n\r\nWIKA Realty selaku pengembang Tamansari Emerald Surabaya, merencanakan apartemen ini untuk dapat menjadi gerbang aktivitas bisnis yang didukung dari lokasi proyek yang berada di area yang ditaksir akan menjadi the next CBD kota Surabaya Barat. Selain itu, Tamansari Emerald Surabaya juga memiliki akses ke Jalan Lingkar Luar Barat dan akses ke fasilitas public lainnya, seperti sarana Pendidikan, sarana kesehatan, dan shopping centre. Apartemen ini dirancang untuk memiliki 567 unit dan dengan fasilitas-fasilitas yang ditawarkan menjadikan apartemen ini menjadi hunian yang bernilai investasi tinggi.', '2018-07-25 01:58:48', '2018-07-25 01:58:48', 'assets/image/news/5b57d95858d6e_1532483928_20180725.jpg'),
(34, 'judul', 'admin', 'desc', 'isi', '2018-08-01 08:36:31', '2018-08-01 08:36:31', 'assets/image/news/5b61710f63bc9_1533112591_20180801.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `profil` text NOT NULL,
  `tgldiangkat` date NOT NULL,
  `periode` varchar(9) DEFAULT NULL,
  `flag` tinyint(1) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id`, `jabatan`, `nama`, `profil`, `tgldiangkat`, `periode`, `flag`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Ketua', 'ketua', 'profil', '2018-08-05', '2016/2018', 0, 'assets/image/pengurus/5b613a1f21e09_1533098527_20180801.jpg', '2018-08-01 07:33:05', '2018-08-01 06:42:01'),
(2, 'Wakil Ketua', 'Nama Wakil Ketua', 'profil', '2018-07-29', '2016/2018', 1, 'assets/image/pengurus/5b613aa01cfaa_1533098656_20180801.jpg', '2018-08-01 06:22:54', '2018-08-01 04:44:16'),
(3, 'Bendahara', 'nama Bendahara', 'Profil Bendahara', '2018-08-05', '2012/2014', 1, 'assets/image/pengurus/5b613b7554350_1533098869_20180801.jpg', '2018-08-01 06:22:58', '2018-08-01 04:47:49'),
(5, 'Bendahara II', 'Nama Bendahara II', 'Profil', '2018-08-05', '2014/2016', 0, 'assets/image/pengurus/5b613d50147d7_1533099344_20180801.jpg', '2018-08-01 04:55:44', '2018-08-01 04:55:44'),
(6, 'Sekretaris II', 'Nama Sekretaris II', 'Profil sekretaris II', '2018-08-05', '2014/2016', 0, 'assets/image/pengurus/5b613dc1f306e_1533099457_20180801.jpg', '2018-08-01 04:57:38', '2018-08-01 04:57:38'),
(13, 'Sekretaris', 'Nama Sekretaris', 'Profil Sekretaris', '2016-12-05', '2016/2018', 0, 'assets/image/pengurus/5b6a8c2424fed_1533709348_20180808.jpg', '2018-08-08 06:23:51', '2018-08-08 06:23:51'),
(14, 'Sekretaris', 'Nama Sekretaris Baru', 'Profil Sekretaris baru', '2018-08-14', '2018/2022', 1, 'assets/image/pengurus/5b6a8c77cc124_1533709431_20180808.jpg', '2018-08-08 06:23:51', '2018-08-08 06:23:51'),
(15, 'Wakil Ketua 2', 'nama', 'Profil', '2018-08-05', '2012/2016', 0, 'assets/image/pengurus/5b6a8ed27fd6e_1533710034_20180808.jpg', '2018-08-08 06:33:54', '2018-08-08 06:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `periode` varchar(10) NOT NULL,
  `periodeawal` varchar(10) NOT NULL,
  `periodeakhir` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`periode`, `periodeawal`, `periodeakhir`, `created_at`, `updated_at`) VALUES
('2012/2016', '2012', '2016', '2018-08-08 06:33:14', '2018-08-08 06:33:14'),
('2016/2018', '2016', '2018', '2018-08-08 06:15:55', '2018-08-08 06:15:55'),
('2018/2019', '2018', '2019', '2018-08-08 06:06:48', '2018-08-08 06:06:48'),
('2018/2022', '2018', '2022', '2018-08-08 06:23:17', '2018-08-08 06:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'menu_index', 'Index Menu', '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(2, 'menu_create', 'Create Menu', '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(3, 'menu_update', 'Update Menu', '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(4, 'menu_delete', 'Delete Menu', '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(5, 'role_index', 'Index Role', '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(6, 'role_create', 'Create Role', '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(7, 'role_update', 'Update Role', '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(8, 'role_delete', 'Delete Role', '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(9, 'user_index', 'Index User', '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(10, 'user_create', 'Create User', '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(11, 'user_update', 'Update User', '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(12, 'user_delete', 'Delete User', '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(13, 'idk_save', 'Idk Save', '2018-06-06 01:26:20', '2018-06-06 01:26:20'),
(14, 'contacs_index', 'Contacs Index', '2018-06-06 04:29:05', '2018-06-06 04:29:05'),
(23, 'forum_index', 'Forum Index', '2018-06-07 01:09:55', '2018-06-07 01:09:55'),
(24, 'polling_index', 'Polling Index', '2018-06-07 01:16:50', '2018-06-07 01:16:50'),
(25, 'sharing_index', 'Sharing Index', '2018-06-07 01:38:37', '2018-06-07 01:38:37'),
(26, 'anggota_index', 'Anggota Index', '2018-06-07 01:45:32', '2018-06-07 01:45:32'),
(28, 'forum_create', 'Forum Create', '2018-06-07 07:04:37', '2018-06-07 07:04:37'),
(29, 'forum_update', 'Forum Update', '2018-06-07 07:04:37', '2018-06-07 07:04:37'),
(30, 'sharing_create', 'Sharing Create', '2018-07-05 09:22:48', '2018-07-05 09:22:48'),
(31, 'sharing_download', 'Sharing Download', '2018-07-05 09:22:48', '2018-07-05 09:22:48'),
(32, 'sharing_update', 'Sharing Update', '2018-07-05 09:22:48', '2018-07-05 09:22:48'),
(33, 'sharing_delete', 'Sharing Delete', '2018-07-05 09:24:08', '2018-07-05 09:24:08'),
(34, 'forum_delete', 'Forum Delete', '2018-07-13 08:17:20', '2018-07-13 08:17:20'),
(35, 'forumthread_update', 'Forumthread Update', '2018-07-13 09:10:13', '2018-07-13 09:10:13'),
(36, 'forumthread_delete', 'Forumthread Delete', '2018-07-13 09:10:13', '2018-07-13 09:10:13'),
(37, 'forumthread_create', 'Forumthread Create', '2018-07-13 09:10:13', '2018-07-13 09:10:13'),
(38, 'approve_index', 'Approve Index', '2018-07-16 03:49:52', '2018-07-16 03:49:52'),
(39, 'approve_delete', 'Approve Delete', '2018-07-16 03:49:52', '2018-07-16 03:49:52'),
(40, 'approved', 'Approved', '2018-07-16 03:49:52', '2018-07-16 03:49:52'),
(41, 'news_index', 'News Index', '2018-07-17 03:32:43', '2018-07-17 03:32:43'),
(42, 'viewnews_index', 'Viewnews Index', '2018-07-17 03:36:04', '2018-07-17 03:36:04'),
(45, 'polling_create', 'Polling Create', '2018-07-18 02:35:06', '2018-07-18 02:35:06'),
(46, 'polling_delete', 'Polling Delete', '2018-07-18 02:35:06', '2018-07-18 02:35:06'),
(47, 'pengurus_index', 'Pengurus Index', '2018-07-25 07:52:47', '2018-07-25 07:52:47'),
(48, 'pengurus_create', 'Pengurus Create', '2018-07-25 07:52:47', '2018-07-25 07:52:47'),
(49, 'pengurus_update', 'Pengurus Update', '2018-07-25 07:52:47', '2018-07-25 07:52:47'),
(50, 'struktur_index', 'Struktur Index', '2018-07-25 07:53:25', '2018-07-25 07:53:25'),
(51, 'pengurusAll_index', 'Pengurusall Index', '2018-07-25 07:54:39', '2018-07-25 07:54:39'),
(52, 'history_index', 'History Index', '2018-07-26 02:30:31', '2018-07-26 02:30:31'),
(53, 'profil_index', 'Profil Index', '2018-07-30 06:10:19', '2018-07-30 06:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(14, 1),
(14, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(28, 1),
(28, 2),
(29, 1),
(30, 1),
(31, 1),
(31, 2),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(37, 2),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(42, 2),
(45, 1),
(46, 1),
(47, 1),
(47, 2),
(48, 1),
(49, 1),
(50, 1),
(50, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2);

-- --------------------------------------------------------

--
-- Table structure for table `polling_ans`
--

CREATE TABLE `polling_ans` (
  `id` int(11) NOT NULL,
  `ans` varchar(100) NOT NULL,
  `idquestion` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polling_ans`
--

INSERT INTO `polling_ans` (`id`, `ans`, `idquestion`, `created_at`, `updated_at`) VALUES
(1, 'a', 1, '2018-07-18 07:11:55', '2018-07-18 07:11:55'),
(2, 'b', 1, '2018-07-18 07:11:55', '2018-07-18 07:11:55'),
(3, 'a', 2, '2018-07-19 01:31:52', '2018-07-19 01:31:52'),
(4, 'b', 2, '2018-07-19 01:31:52', '2018-07-19 01:31:52'),
(5, 'das', 3, '2018-07-19 04:19:00', '2018-07-19 04:19:00'),
(6, 'ssa', 3, '2018-07-19 04:19:00', '2018-07-19 04:19:00'),
(7, 'dda', 3, '2018-07-19 04:19:00', '2018-07-19 04:19:00'),
(8, 'la', 4, '2018-07-19 04:38:10', '2018-07-19 04:38:10'),
(9, 'ka', 4, '2018-07-19 04:38:10', '2018-07-19 04:38:10'),
(10, 'Didik', 5, '2018-07-20 03:19:04', '2018-07-20 03:19:04'),
(11, 'Puji', 5, '2018-07-20 03:19:04', '2018-07-20 03:19:04'),
(12, 'Purnomo', 5, '2018-07-20 03:19:04', '2018-07-20 03:19:04'),
(13, 'Adiman', 5, '2018-07-20 03:19:04', '2018-07-20 03:19:04'),
(14, 'Naufal', 5, '2018-07-20 03:19:04', '2018-07-20 03:19:04'),
(19, 'Aqua', 7, '2018-07-20 06:11:52', '2018-07-20 06:11:52'),
(20, 'Le Minerale', 7, '2018-07-20 06:11:52', '2018-07-20 06:11:52'),
(21, 'Ades', 7, '2018-07-20 06:11:52', '2018-07-20 06:11:52'),
(22, 'Lainnya', 7, '2018-07-20 06:11:52', '2018-07-20 06:11:52'),
(23, '12', 8, '2018-07-23 04:51:40', '2018-07-23 04:51:40'),
(24, '332', 8, '2018-07-23 04:51:40', '2018-07-23 04:51:40'),
(25, '1', 9, '2018-07-23 04:52:49', '2018-07-23 04:52:49'),
(26, '2', 9, '2018-07-23 04:52:49', '2018-07-23 04:52:49'),
(27, 'w', 10, '2018-07-23 04:55:14', '2018-07-23 04:55:14'),
(28, 'w', 10, '2018-07-23 04:55:14', '2018-07-23 04:55:14'),
(29, 'Tidak Tahu', 11, '2018-07-24 07:55:58', '2018-07-24 07:55:58'),
(30, 'Gak Tahu', 11, '2018-07-24 07:55:58', '2018-07-24 07:55:58'),
(31, '', 11, '2018-07-24 07:55:58', '2018-07-24 07:55:58'),
(32, 'Didik', 12, '2018-07-25 03:02:59', '2018-07-25 03:02:59'),
(33, 'Fatrin', 12, '2018-07-25 03:02:59', '2018-07-25 03:02:59'),
(34, 'wasil', 12, '2018-07-25 03:02:59', '2018-07-25 03:02:59'),
(35, 'Galih', 12, '2018-07-25 03:02:59', '2018-07-25 03:02:59'),
(36, 'Evan', 13, '2018-07-31 08:00:52', '2018-07-31 08:00:52'),
(37, 'Dimas', 13, '2018-07-31 08:00:52', '2018-07-31 08:00:52'),
(38, 'Egy', 13, '2018-07-31 08:00:52', '2018-07-31 08:00:52'),
(39, 'Maulana', 13, '2018-07-31 08:00:52', '2018-07-31 08:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `polling_question`
--

CREATE TABLE `polling_question` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `total_ans` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `done` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polling_question`
--

INSERT INTO `polling_question` (`id`, `question`, `total_ans`, `active`, `done`, `created_at`, `updated_at`) VALUES
(1, 'apakah apakah?', 2, 0, 1, '2018-07-19 03:36:39', '2018-07-19 03:36:39'),
(2, 'apakah bukan apakah?', 2, 0, 1, '2018-07-19 04:18:14', '2018-07-19 04:18:14'),
(3, 'asdasd', 3, 0, 1, '2018-07-20 03:19:40', '2018-07-20 03:19:40'),
(4, 'coba', 2, 0, 1, '2018-07-20 02:17:53', '2018-07-20 02:17:53'),
(5, 'Kandidat pengurus berikutnya', 5, 0, 1, '2018-07-20 06:32:18', '2018-07-20 06:32:18'),
(7, 'Air mineral paling sering diminum', 4, 0, 1, '2018-07-23 04:51:58', '2018-07-23 04:51:58'),
(8, 'astaga', 2, 0, 1, '2018-07-23 04:52:54', '2018-07-23 04:52:54'),
(9, 'coba', 2, 0, 1, '2018-07-23 06:55:43', '2018-07-23 06:55:43'),
(10, 'qwe', 2, 0, 1, '2018-07-24 07:56:03', '2018-07-24 07:56:03'),
(11, 'Kenapa Email Gak Bisa', 3, 0, 1, '2018-07-25 03:03:16', '2018-07-25 03:03:16'),
(12, 'Guru favorit di SMP SMA ?', 4, 0, 1, '2018-07-31 08:01:00', '2018-07-31 08:01:00'),
(13, 'Guru favorit di smp ?', 4, 1, 0, '2018-07-31 08:01:00', '2018-07-31 08:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `polling_saved`
--

CREATE TABLE `polling_saved` (
  `id` int(11) NOT NULL,
  `id_polling` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ans` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polling_saved`
--

INSERT INTO `polling_saved` (`id`, `id_polling`, `id_user`, `id_ans`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 9, '2018-07-20 01:42:16', '2018-07-19 06:04:30'),
(2, 4, 3, 8, '2018-07-19 06:44:40', '2018-07-19 06:44:40'),
(3, 4, 12, 9, '2018-07-20 01:42:26', '2018-07-20 01:42:26'),
(4, 4, 13, 8, '2018-07-20 01:53:51', '2018-07-20 01:53:51'),
(5, 3, 13, 5, '2018-07-20 02:18:00', '2018-07-20 02:18:00'),
(6, 5, 1, 10, '2018-07-20 03:20:38', '2018-07-20 03:20:38'),
(7, 5, 3, 13, '2018-07-20 03:21:36', '2018-07-20 03:21:36'),
(8, 7, 1, 19, '2018-07-20 06:12:03', '2018-07-20 06:12:03'),
(9, 7, 3, 20, '2018-07-20 06:12:28', '2018-07-20 06:12:28'),
(10, 11, 1, 29, '2018-07-24 08:51:25', '2018-07-24 08:51:25'),
(11, 13, 1, 38, '2018-07-31 08:02:14', '2018-07-31 08:02:14'),
(12, 13, 19, 36, '2018-07-31 08:10:29', '2018-07-31 08:10:29'),
(13, 13, 18, 38, '2018-07-31 08:11:38', '2018-07-31 08:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` int(11) NOT NULL,
  `nip` varchar(200) NOT NULL,
  `noanggota` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomorhp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `unitkerja` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `nip`, `noanggota`, `password`, `namalengkap`, `email`, `nomorhp`, `alamat`, `jabatan`, `unitkerja`, `created_at`, `updated_at`) VALUES
(3, '54349', 'SKWR005', '$2y$10$qCEvNwX8cxm3qN9mCpI72O4lO5bfkmO1qOB/rWrezMxFZ08novd2S', 'adiman', 'adimanhanip@gmail.com', '0852', 'Jakarta', 'Staf sistem informasi', 'Biro Sistem Manajemen', '2018-08-09 02:14:04', '2018-08-09 02:14:04'),
(5, '54363', 'Nomor2', '$2y$10$hEPP/zj8cOmtulKeHM58PObNViTAvukTUhkEtl9qhXli1CTXbyktC', 'adiman', 'ad@gmail.com', '0852', 'Jakarta', 'Staf sistem informasi', 'Biro Sistem Manajemen', '2018-08-09 03:00:41', '2018-08-09 03:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Role as Administrator', '2018-06-05 07:47:25', '2018-06-05 07:47:25'),
(2, 'User', 'Roles as user', '2018-06-28 08:36:10', '2018-06-28 08:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(18, 2),
(33, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sharing`
--

CREATE TABLE `sharing` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(200) NOT NULL,
  `id_upload` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sharing`
--

INSERT INTO `sharing` (`id`, `judul`, `deskripsi`, `file`, `id_upload`, `created_at`, `updated_at`) VALUES
(1, 'dd', '', 'assets/image/sharing/5b43054402947_1531118916_20180709.pdf', '1', '2018-07-09 06:48:36', '2018-07-09 06:48:36'),
(2, 'gambar', 'gambar', 'assets/image/sharing/5b56ede804bf3_1532423656_20180724.png', '1', '2018-07-24 09:14:16', '2018-07-24 09:14:16'),
(3, 'Logo Skwr', 'Logo Skwr', 'assets/image/sharing/5b57e5c0828d3_1532487104_20180725.png', '1', '2018-07-25 02:51:44', '2018-07-25 02:51:44'),
(4, 'Liverpool', 'Liverpool', 'assets/image/sharing/5b61814819ef8_1533116744_20180801.jpg', '1', '2018-08-01 09:45:44', '2018-08-01 09:45:44'),
(5, 'user', 'user', 'assets/image/news/5b62666a26ccf_1533175402_20180802.jpg', '1', '2018-08-02 02:03:22', '2018-08-02 02:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `tblmail`
--

CREATE TABLE `tblmail` (
  `id` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmail`
--

INSERT INTO `tblmail` (`id`, `subject`, `email`, `isi`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut Gabriel Agar', 1, '2018-07-26 20:27:14', '2018-07-26 20:27:14'),
(2, 'Pemberitahuan Penerimaan User Baru', 'arief13121@mail.com', 'Gabriel Agar, Selamat bergabung dalam keluarga Serikat Karyawan Wika Realty', 1, '2018-07-26 20:28:47', '2018-07-26 20:28:47'),
(3, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut Gabriel Agar', 1, '2018-07-26 20:35:18', '2018-07-26 20:35:18'),
(4, 'Pemberitahuan Pendaftaran User Baru', 'arief21@mail.com', 'Gabriel Agar, Kami tidak dapat memproses perintaan anda, Terima Kasih!', 1, '2018-07-26 20:40:41', '2018-07-26 20:40:41'),
(5, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut Gabriel Agar', 1, '2018-07-26 20:42:32', '2018-07-26 20:42:32'),
(6, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut Arief Budhiman', 1, '2018-07-26 20:59:48', '2018-07-26 20:59:48'),
(7, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut Gabriel Agar', 1, '2018-07-27 00:26:34', '2018-07-27 00:26:34'),
(8, 'Pemberitahuan Pendaftaran User Baru', 'arief3312@mail.com', 'Gabriel Agar, Kami tidak dapat memproses perintaan anda, Terima Kasih!', 1, '2018-07-27 00:39:23', '2018-07-27 00:39:23'),
(9, 'Pemberitahuan Pendaftaran User Baru', 'arief112122@mail.com', 'Gabriel Agar, Kami tidak dapat memproses perintaan anda, Terima Kasih!', 1, '2018-07-27 00:40:20', '2018-07-27 00:40:20'),
(10, 'Pemberitahuan Pendaftaran User Baru', 'arief13412@mail.com', 'Arief Budhiman, Kami tidak dapat memproses perintaan anda, Terima Kasih!', 1, '2018-07-30 03:09:37', '2018-07-30 03:09:37'),
(11, 'Pemberitahuan Reset Password', 'adian123@gmail.com', 'adiman, Password anda telah direset oleh Admin. Password defaul anda yaitu: app123...', 1, '2018-07-30 03:56:20', '2018-07-30 03:56:20'),
(12, 'Pemberitahuan Reset Password', 'Fatrina@gmail.com', 'Fatrina, Password anda telah direset oleh Admin. Password default anda yaitu: app123...', 1, '2018-07-30 05:52:41', '2018-07-30 05:52:41'),
(13, 'Perubahan Akun', 'adian123@gmail.com', 'Perubahan pada email anda telah berhasil dilakukan', 1, '2018-08-02 04:38:35', '2018-08-02 04:38:35'),
(14, 'Perubahan Akun', 'adian123@gmail.com', 'Perubahan pada email anda telah berhasil dilakukan', 1, '2018-08-02 04:38:39', '2018-08-02 04:38:39'),
(15, 'Perubahan Akun', 'adian123@gmail.com', 'Perubahan pada email anda telah berhasil dilakukan', 1, '2018-08-02 04:38:44', '2018-08-02 04:38:44'),
(16, 'Perubahan Akun', 'adian123@gmail.com', 'Perubahan pada email anda telah berhasil dilakukan', 1, '2018-08-02 04:38:48', '2018-08-02 04:38:48'),
(17, 'Perubahan Akun', 'adian123@gmail.com', 'Perubahan pada email anda telah berhasil dilakukan', 1, '2018-08-02 04:38:52', '2018-08-02 04:38:52'),
(18, 'Perubahan Akun', 'adian123@gmail.com', 'Perubahan pada email anda telah berhasil dilakukan', 1, '2018-08-02 04:38:57', '2018-08-02 04:38:57'),
(19, 'Perubahan Akun', 'adian123@gmail.com', 'Perubahan pada email anda telah berhasil dilakukan', 1, '2018-08-02 04:39:01', '2018-08-02 04:39:01'),
(20, 'Perubahan Akun', 'adian123@gmail.com', 'Perubahan pada email anda telah berhasil dilakukan', 1, '2018-08-02 04:39:05', '2018-08-02 04:39:05'),
(21, 'Perubahan Akun', 'adian1234@gmail.com', 'Perubahan pada email anda telah berhasil dilakukan', 1, '2018-08-02 04:39:12', '2018-08-02 04:39:12'),
(22, 'Perubahan Akun', 'adian1234@gmail.com', 'Perubahan pada email anda telah berhasil dilakukan', 1, '2018-08-02 04:39:16', '2018-08-02 04:39:16'),
(23, 'Perubahan Akun', 'adian1234@gmail.com', 'Perubahan pada email anda telah berhasil dilakukan', 1, '2018-08-02 04:39:23', '2018-08-02 04:39:23'),
(24, 'Pemberitahuan Reset Password', 'a@gm', 'ini nama, Password anda telah direset oleh Admin. Password default anda yaitu: app123...', 1, '2018-08-02 04:39:27', '2018-08-02 04:39:27'),
(25, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut Justin', 1, '2018-08-02 04:39:31', '2018-08-02 04:39:31'),
(26, 'Pemberitahuan Penerimaan User Baru', 'justin@email.com', 'Justin, Selamat bergabung dalam keluarga Serikat Karyawan Wika Realty', 1, '2018-08-02 04:39:35', '2018-08-02 04:39:35'),
(27, 'Pemberitahuan Reset Password', 'aasd@gm', 'adhim, Password anda telah direset oleh Admin. Password default anda yaitu: app123...', 1, '2018-08-02 04:39:40', '2018-08-02 04:39:40'),
(28, 'Pemberitahuan Pendaftaran User Baru', 'xiaomi@gmail.com', 'Adiman Hanif Septiawan, Kami tidak dapat memproses perintaan pendaftaran akun anda, Terima Kasih!', 1, '2018-08-02 04:39:44', '2018-08-02 04:39:44'),
(29, 'Pemberitahuan Reset Password', 'ariefbudhiman199@gmail.com', 'arief, Password anda telah direset oleh Admin. Password default anda yaitu: userwika123', 1, '2018-08-02 04:39:48', '2018-08-02 04:39:48'),
(30, 'Pemberitahuan Reset Password', 'agung@mail.com', 'agung, Password anda telah direset oleh Admin. Password default anda yaitu: userwika123', 1, '2018-08-02 04:39:52', '2018-08-02 04:39:52'),
(31, 'Pemberitahuan Reset Password', 'agung@mail.com', 'agung, Password anda telah direset oleh Admin. Password default anda yaitu: userwika123', 1, '2018-08-02 04:39:56', '2018-08-02 04:39:56'),
(32, 'Pemberitahuan Reset Password', 'agung@mail.com', 'agung, Password anda telah direset oleh Admin. Password default anda yaitu: userwika123', 1, '2018-08-02 04:40:00', '2018-08-02 04:40:00'),
(33, 'Pemberitahuan Reset Password', 'agung@mail.com', 'agung, Password anda telah direset oleh Admin. Password default anda yaitu: userwika123', 1, '2018-08-02 04:40:04', '2018-08-02 04:40:04'),
(34, 'Pemberitahuan Reset Password', 'agung@mail.com', 'agung, Password anda telah direset oleh Admin. Password default anda yaitu: userwika123', 1, '2018-08-02 04:40:08', '2018-08-02 04:40:08'),
(35, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut Naaufal', 0, '2018-08-07 01:46:21', '2018-08-07 01:46:21'),
(36, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut jkj', 0, '2018-08-07 04:19:46', '2018-08-07 04:19:46'),
(37, 'Pemberitahuan Penerimaan User Baru', 'ads@jasd', 'jkj, Selamat bergabung dalam keluarga Serikat Karyawan Wika Realty', 0, '2018-08-07 04:27:24', '2018-08-07 04:27:24'),
(38, 'Pemberitahuan Penerimaan User Baru', 'naufal@gmail.com', 'Naaufal, Selamat bergabung dalam keluarga Serikat Karyawan Wika Realty', 0, '2018-08-07 08:34:54', '2018-08-07 08:34:54'),
(39, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut adiman', 0, '2018-08-07 08:36:11', '2018-08-07 08:36:11'),
(40, 'Pemberitahuan Reset Password', 'Kevin@gmail.com', 'Kevin, Password anda telah direset oleh Admin. Password default anda yaitu: userwika123', 0, '2018-08-07 09:26:26', '2018-08-07 09:26:26'),
(41, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut Adiman', 0, '2018-08-07 09:34:10', '2018-08-07 09:34:10'),
(42, 'Pemberitahuan Penerimaan User Baru', 'Add@yahoo', 'Adiman, Selamat bergabung dalam keluarga Serikat Karyawan Wika Realty', 0, '2018-08-08 03:27:51', '2018-08-08 03:27:51'),
(43, 'Pemberitahuan Reset Password', 'Fatrina@gmail.com', 'Fatrina, Password anda telah direset oleh Admin. Password default anda yaitu: userwika123', 0, '2018-08-08 07:14:21', '2018-08-08 07:14:21'),
(44, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut Agung', 0, '2018-08-08 14:41:01', '2018-08-08 14:41:01'),
(45, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut Kevin', 0, '2018-08-08 14:45:48', '2018-08-08 14:45:48'),
(46, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut asd', 0, '2018-08-08 15:08:00', '2018-08-08 15:08:00'),
(47, 'Pemberitahuan Pendaftaran User Baru', 'kev@gmail', 'Kevin, Kami tidak dapat memproses perintaan pendaftaran akun anda, Terima Kasih!', 0, '2018-08-08 15:27:34', '2018-08-08 15:27:34'),
(48, 'Pemberitahuan Pendaftaran User Baru', 'agung@mail', 'Agung, Kami tidak dapat memproses perintaan pendaftaran akun anda, Terima Kasih!', 0, '2018-08-08 15:27:39', '2018-08-08 15:27:39'),
(49, 'Pemberitahuan Pendaftaran User Baru', 'adimanhanip@gmail.com', 'asd, Kami tidak dapat memproses perintaan pendaftaran akun anda, Terima Kasih!', 0, '2018-08-08 15:27:43', '2018-08-08 15:27:43'),
(50, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut adiman', 0, '2018-08-08 17:26:56', '2018-08-08 17:26:56'),
(51, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut adiman', 0, '2018-08-08 17:42:12', '2018-08-08 17:42:12'),
(52, 'Pemberitahuan Pendaftaran User Baru', 'ad@gmail.com', 'adiman, Kami tidak dapat memproses perintaan pendaftaran akun anda, Terima Kasih!', 0, '2018-08-08 17:56:23', '2018-08-08 17:56:23'),
(53, 'Pemberitahuan Reset Password', 'adimanhanip@gmail.com', 'adiman, Password anda telah direset oleh Admin. Password default anda yaitu: userwika123', 0, '2018-08-08 17:57:28', '2018-08-08 17:57:28'),
(54, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut adiman', 0, '2018-08-09 01:45:53', '2018-08-09 01:45:53'),
(55, 'Pemberitahuan Penerimaan User Baru', 'ad@gmail.com', 'adiman, Selamat bergabung dalam keluarga Serikat Karyawan Wika Realty', 0, '2018-08-09 01:46:27', '2018-08-09 01:46:27'),
(56, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut adiman', 0, '2018-08-09 01:51:32', '2018-08-09 01:51:32'),
(57, 'Pemberitahuan Pendaftaran User Baru', 'Adiman@gm', 'adiman, Kami tidak dapat memproses perintaan pendaftaran akun anda, Terima Kasih!', 0, '2018-08-09 02:10:54', '2018-08-09 02:10:54'),
(58, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut adiman', 0, '2018-08-09 02:11:32', '2018-08-09 02:11:32'),
(59, 'Pemberitahuan Pendaftaran User Baru', 'ad@gmail.com', 'adiman, Kami tidak dapat memproses perintaan pendaftaran akun anda, Terima Kasih!', 0, '2018-08-09 02:51:27', '2018-08-09 02:51:27'),
(60, 'Pemberitahuan Pendaftaran User Baru', 'admin@email.com', 'Administrator, terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut adiman', 0, '2018-08-09 02:51:54', '2018-08-09 02:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'admin@email.com', '$2y$10$05GcAhrRG884g9yj9j4dB.bBzxL.d26ERLXJk0umYw9Teci6Ni0Ga', 'qfa7P1GLXWEWAm8eRs0pMARXf9rj2OOMwxkUULsPZ6eB3obVgZE3KX4XsKlV', '2018-06-05 07:47:25', '2018-08-09 03:52:41'),
(18, '180503', 'Fatrina', 'Fatrina@gmail.com', '$2y$10$3wEa/TSe2Zr9R8QA/CzprOMtJ1uj99gGt1WuRw6llMeWrg.jJolGa', 'COwoMUOFGDzDcse1tSaVHgBs8FKXymZSdWuN0GrJfX1vTHIj2cipo3AQ9qIc', '2018-07-25 02:39:47', '2018-08-08 07:14:21'),
(33, 'SKWR003', 'adiman', 'ad@gmail.com', '$2y$10$TRh93FJ3PHWoPlgSeInpLOQdWLkjdeTLWwpxoMtEbXB3EKOYPfBJG', NULL, '2018-08-09 01:46:27', '2018-08-09 01:46:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `noanggota` (`noanggota`);

--
-- Indexes for table `fcomment`
--
ALTER TABLE `fcomment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_acc_id` (`user_acc_id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `forum_kategori`
--
ALTER TABLE `forum_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_slug_unique` (`slug`),
  ADD KEY `menus_slug_parent_index` (`slug`,`parent`);

--
-- Indexes for table `menu_permission`
--
ALTER TABLE `menu_permission`
  ADD PRIMARY KEY (`menu_id`,`permission_id`),
  ADD KEY `menu_permission_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `menu_role`
--
ALTER TABLE `menu_role`
  ADD PRIMARY KEY (`menu_id`,`role_id`),
  ADD KEY `menu_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`periode`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `polling_ans`
--
ALTER TABLE `polling_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polling_question`
--
ALTER TABLE `polling_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polling_saved`
--
ALTER TABLE `polling_saved`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sharing`
--
ALTER TABLE `sharing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmail`
--
ALTER TABLE `tblmail`
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
-- AUTO_INCREMENT for table `fcomment`
--
ALTER TABLE `fcomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forum_kategori`
--
ALTER TABLE `forum_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `polling_ans`
--
ALTER TABLE `polling_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `polling_question`
--
ALTER TABLE `polling_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `polling_saved`
--
ALTER TABLE `polling_saved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sharing`
--
ALTER TABLE `sharing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblmail`
--
ALTER TABLE `tblmail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forums_ibfk_1` FOREIGN KEY (`user_acc_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `forums_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `forum_kategori` (`id`);

--
-- Constraints for table `menu_permission`
--
ALTER TABLE `menu_permission`
  ADD CONSTRAINT `menu_permission_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_role`
--
ALTER TABLE `menu_role`
  ADD CONSTRAINT `menu_role_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
