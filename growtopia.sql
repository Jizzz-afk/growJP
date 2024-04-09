-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2024 at 01:19 PM
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
-- Database: `growtopia`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`id`, `id_pembayaran`, `nama_barang`) VALUES
(1, 1, 'Ubi Crate'),
(4, 3, 'Ubi Crate'),
(6, 4, 'Ubi Crate'),
(8, 5, 'Ubi Crate'),
(9, 5, 'Super Golden Booty Chest'),
(10, 5, 'Super Fireworks'),
(11, 6, 'Prince Of Persia Crate'),
(12, 7, 'Party In A Box');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `nama_item` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `harga` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `nama_item`, `image`, `harga`) VALUES
(1, 'Party In A Box', 'anv1.png', 2.000),
(2, 'Golden Party In A Box', 'anv2.png', 2.000),
(3, 'Ubi Crate', 'ubw1.png', 2.000),
(4, 'Prince Of Persia Crate', 'ubw2.png', 2.000),
(5, 'Lunar Chest', 'lnr1.png', 2.000),
(6, 'Fortune Cookie', 'lnr2.png', 2.000),
(7, 'Lucky Fortune Cookie', 'lnr3.png', 2.000),
(9, 'Golden Booty Chest', 'vlt2.png', 2.000),
(10, 'Super Golden Booty Chest', 'vlt3.png', 2.000),
(11, 'Equinox Box', 'enx1.png', 2.000),
(12, 'Easter Crate', 'esr1.png', 2.000),
(13, 'Grow4Good Gift Hamper', 'g4g1.png', 2.000),
(14, 'Grow4Good Special Gift Hamper', 'g4g2.png', 2.000),
(15, 'Ultra Pinata', 'cdm1.png', 2.000),
(16, 'Block De Mayo Block', 'cdm2.png', 2.000),
(17, 'Lava Pinata', 'cdm3.png', 2.000),
(18, 'Pineapple Gift Box', 'spp1.png', 2.000),
(19, 'Super Pineapple Crate', 'spp2.png', 2.000),
(20, 'Pegasus Chest', 'pgs1.png', 2.000),
(21, 'Summer Surprise', 'smf1.png', 2.000),
(22, 'Super Summer Surprise', 'smf2.png', 2.000),
(23, 'Summer Artifact Chest', 'smf3.png', 2.000),
(24, 'Super Fireworks', 'smf4.png', 2.000),
(25, 'Ghost Hunter\'s Crate', 'ags1.png', 2.000),
(26, 'Mooncake Bundle', 'hvf1.png', 2.000),
(27, 'Gift Of Growganoth', 'hlw1.png', 2.000),
(28, 'Halloween Gift Box', 'hlw2.png', 2.000),
(29, 'Halloween Special Gift Box', 'hlw3.png', 2.000),
(30, 'Alien Landing Pod', 'aln1.png', 2.000),
(31, 'Organic Turkey', 'tkw1.png', 2.000),
(32, 'Roasted Turkey', 'tkw2.png', 2.000),
(33, 'Winter Gift', 'wtf1.png', 2.000),
(34, 'Winterfest Cracker', 'wtf2.png', 2.000),
(35, 'Duluxe Winterfest Cracker', 'wtf3.png', 2.000),
(36, 'Special Winter Wish', 'wtf4.png', 2.000),
(37, 'Winter Wish', 'wtf5.png', 2.000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `id_pelanggan`, `email`, `username`, `password`, `last_login`) VALUES
(1, NULL, 'cihuy@gmail.com', 'cihuy', 'cihuy', NULL),
(2, NULL, 'cihuy@gmail.com', 'cihuy', 'cihuy', NULL),
(3, NULL, 'aziz@gmail.com', 'Ajiz', 'Aziz', NULL),
(4, NULL, 'aziz@gmail.com', 'Ajiz', 'Aziz', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `full_name`, `email`, `message`, `created_at`) VALUES
(1, 'cihuy', 'cihuy@gmail.com', 'haha', '2024-04-07 16:02:08'),
(2, 'cihuy', 'Jizzz-afk', 'haha', '2024-04-07 16:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama_world` varchar(100) DEFAULT NULL,
  `grow_id` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_world`, `grow_id`, `nomor_telepon`) VALUES
(1, 'BQRVV', 'NVSTZY', '083148154650'),
(2, 'BQRVV', 'NVSTZY', '083148154650'),
(3, 'BQRVV', 'NVSTZY', '083148154650'),
(4, 'BQRVV', 'NVSTZY', '083148154650'),
(5, 'BQRVV', 'NVSTZY', '083148154650'),
(6, 'BQRVV', 'veryGIGI', '083148154650'),
(7, 'BQRVV', 'veryGIGI', '083148154650');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(100) DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `jumlah_pembayaran` varchar(100) DEFAULT NULL,
  `waktu_pembayaran` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_transaksi`, `metode_pembayaran`, `jumlah_pembayaran`, `waktu_pembayaran`) VALUES
(1, '660d5c75a8ed3', 'BCA', '24000', NULL),
(2, '660d5c9a131cb', 'BCA', '24000', NULL),
(3, '660d5caf003fe', 'BCA', '24000', NULL),
(4, '660d5ccf8b94a', 'BCA', '24000', NULL),
(5, '660d5cfea24c5', 'BCA', '24000', NULL),
(6, '660e8c5d0ec68', 'GOPAY', '2000', NULL),
(7, '6612bc50385bd', 'SHOPEE', '2000', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD CONSTRAINT `detail_pembayaran_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
