-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2019 at 12:48 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sib`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Billboard'),
(2, 'Neon Sign'),
(3, 'Megatron');

-- --------------------------------------------------------

--
-- Table structure for table `foto_reklame`
--

CREATE TABLE `foto_reklame` (
  `id_foto` int(10) NOT NULL,
  `id_reklame` int(10) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `keterangan` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_reklame`
--

INSERT INTO `foto_reklame` (`id_foto`, `id_reklame`, `foto`, `keterangan`) VALUES
(1, 2, '1556481593.png', 'Coba 1'),
(2, 2, '1556481604.png', 'Coba 2'),
(3, 2, '1556481613.png', 'Coba 3'),
(4, 1, '1556566538.png', 'Foto 1'),
(5, 1, '1556566724.png', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `reklame`
--

CREATE TABLE `reklame` (
  `ID` int(11) NOT NULL,
  `name` varchar(75) DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `address` text,
  `photo` varchar(250) DEFAULT NULL,
  `amenities` text,
  `description` text,
  `jenis_media` varchar(50) NOT NULL,
  `orientasi` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `lighting` varchar(50) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reklame`
--

INSERT INTO `reklame` (`ID`, `name`, `price`, `latitude`, `longitude`, `address`, `photo`, `amenities`, `description`, `jenis_media`, `orientasi`, `ukuran`, `position`, `lighting`, `link`, `status`) VALUES
(1, 'INI BILLBOARD', 75000000, '-6.8811060540771285', '107.54166982158199', 'Cek Alamat', 'billboard1.png', 'Full Service, Pantau CCTV', 'Cek Deskripsi', 'Billboard', 'Horizontal', '5 x 10 Meter', 'Stand Alone', 'Frontlight', 'http://facebook.com/dmons02', 'Tersedia'),
(2, 'DB-042', 35000000, '-6.893111', '107.558262', 'Billboard di Jl. Raya Jenderal H. Amir Machmud No.273, Cigugur Tengah, Cimahi Tengah, Kota Cimahi, Jawa Barat 40522, Indonesia', 'Cimindi.png', 'Full Service, Pantau CCTV', 'Ukuran : 4 X 8  Meter, Posisition : Stand Alone , Lighting : Frontlight  , Orientasi Horizontal', 'Billboard', 'Vertical', '16 x 8 Meter', 'Stand Alone', 'Frontlight', 'http://google.com', 'Tidak Tersedia'),
(3, 'Coba Ketiga', 100000000, '-6.87599328004541', '107.54269978984371', 'Alamatnya berada di jati pokoknyamah', 'billboard2.png', 'Full Service, Pantau CCTV', 'Ini deskripsinya pokoknya terserah mau isi apa juga', 'Megatron', 'Vertial', '4 x 10 Meter', 'Stand Alone', 'Frontlight', 'http://facebook.com/dmons02', 'Tersedia'),
(4, 'Cimahi Utara', 50000, '-6.8647449835708985', '107.5310268162109', 'uyuy', 'b143_4-512.png', 'Pantau CCTV', 'ygug', '', '', '', '', '', 'iojijio', 'Tersedia'),
(5, 'CEK KE LIMA 5', 75000000, '-6.877697544171006', '107.54149816020504', 'ALAMAT BLA BLA BLA', 'bikin-ngiler-ini-gaji-magang-di-perusahaan-teknologi-raksasa.png', 'Full Service, Pantau CCTV, Lokasi Ramai', 'DESKRIPSI BLA BLA', 'Billboard', 'Vertical', '4 x 10 Meter', 'Frontlight', 'Stand Alone', 'http://facebook.com/dmons02', 'Tidak Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `reklamecategories`
--

CREATE TABLE `reklamecategories` (
  `reklamecategories_id` int(11) NOT NULL,
  `reklame_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reklamecategories`
--

INSERT INTO `reklamecategories` (`reklamecategories_id`, `reklame_id`, `category_id`) VALUES
(1, 1, 1),
(8, 2, 3),
(9, 2, 3),
(10, 2, 1),
(11, 2, 2),
(12, 2, 3),
(13, 4, 1),
(14, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_users`
--

CREATE TABLE `tbl_detail_users` (
  `id_detail_users` int(50) NOT NULL,
  `id_users` int(50) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_pos` varchar(50) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `nm_perusahaan` varchar(50) NOT NULL,
  `jabatan_perusahaan` varchar(50) NOT NULL,
  `direktur_perusahaan` varchar(50) NOT NULL,
  `kontak_perusahaan` varchar(50) NOT NULL,
  `mobile_perusahaan` varchar(20) NOT NULL,
  `fax_perusahaan` varchar(50) NOT NULL,
  `alamat_perusahaan` varchar(250) NOT NULL,
  `npwp` varchar(250) NOT NULL,
  `sppkp` varchar(250) NOT NULL,
  `siup` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `no_invoice` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_reklame` int(11) NOT NULL,
  `description` text NOT NULL,
  `photo_order` varchar(250) NOT NULL,
  `status_order` varchar(2) NOT NULL,
  `tgl_acc` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`no_invoice`, `id_user`, `id_reklame`, `description`, `photo_order`, `status_order`, `tgl_acc`, `tanggal`) VALUES
('1406190001', 2, 5, 'Mantuls pokokkna', 'visi_dan_misi.jpg', '1', '', '2019-06-21 20:51:10'),
('2406190001', 2, 1, 'saya akan iklan tentang jarum black', 'Screenshot_15.png', '0', '', '2019-06-28 04:20:06'),
('3105190002', 2, 1, 'Bangkong', 'Virtual-internship-1024x682.png', '0', '', '2019-06-21 03:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE `tbl_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updateBy` bigint(20) DEFAULT NULL,
  `updateDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(50) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` char(128) NOT NULL COMMENT 'hashed login password',
  `status_aktif` int(1) DEFAULT '1',
  `role` varchar(50) NOT NULL,
  `photo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `fullname`, `mobile`, `username`, `email`, `password`, `status_aktif`, `role`, `photo`) VALUES
(1, 'Mochamad Nurjaman', '6289672255644', 'nurjaman', 'nurzaman02@gmail.com', '$2y$10$SAvFim22ptA9gHVORtIaru1dn9rhgerJlJCPxRNA02MjQaJnkxawq', 0, 'Admin', NULL),
(2, 'Nurjaman', '089672255644', 'Admin1', 'admin@admin.com', '$2y$10$JUaLtr5STNqnwXRg7wd3O.Xx6sWf.J2HiGFTFx/923VpT1s9atK8y', 0, 'Admin', NULL),
(3, 'Coba Tester', '0852159185', 'tester', 'testes@gmail.com', '$2y$10$JUaLtr5STNqnwXRg7wd3O.Xx6sWf.J2HiGFTFx/923VpT1s9atK8y', 1, 'Penyewa', NULL),
(4, NULL, 'bisadong', 'bismillah', 'admin1@admin.com', 'nurjaman', 1, 'Penyewa', NULL),
(5, NULL, '0893123213', 'Nurjaman', 'nurjaman@admin.com', '$2y$10$6/iaK7PS7X9xG.Jf1LB//est0/cu5frKcRafcqHymvot7R9yxexOC', 1, 'Pemilik Media', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `foto_reklame`
--
ALTER TABLE `foto_reklame`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `reklame`
--
ALTER TABLE `reklame`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reklamecategories`
--
ALTER TABLE `reklamecategories`
  ADD PRIMARY KEY (`reklamecategories_id`);

--
-- Indexes for table `tbl_detail_users`
--
ALTER TABLE `tbl_detail_users`
  ADD PRIMARY KEY (`id_detail_users`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`no_invoice`,`id_user`,`id_reklame`);

--
-- Indexes for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `foto_reklame`
--
ALTER TABLE `foto_reklame`
  MODIFY `id_foto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reklame`
--
ALTER TABLE `reklame`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reklamecategories`
--
ALTER TABLE `reklamecategories`
  MODIFY `reklamecategories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_detail_users`
--
ALTER TABLE `tbl_detail_users`
  MODIFY `id_detail_users` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
