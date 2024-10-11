-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 05:53 PM
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
-- Database: `kelompok10`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telepon` varchar(25) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `no_telepon`, `message`, `created_at`) VALUES
(1, 'Jeremia', 'Jeremia@gmail.com', '', 'Terima kasih atas produk pisang kemul yang enak dan lezat bikin nagih :)', '2024-05-30 10:45:14'),
(2, 'Febito Tegar Tri Falentino', 'otnayyans@gmail.com', '', 'Terima kasih atas produk pisang kemul yang enak dan lezat bikin nagih :)', '2024-05-30 10:47:20'),
(7, 'Bambang', 'Bambang@gmail.com', '', 'Terima kasih karena pisangnya sangat enak dan lezat', '2024-06-06 10:17:33'),
(8, 'Bambang', 'Bambang@gmail.com', '', 'Terima kasih karena pisangnya sangat enak dan lezat', '2024-06-06 10:17:58'),
(9, 'Stiven', 'stiven@gmail.com', '', 'Masakan pisang kemul sangat luar biasa', '2024-06-06 10:18:31'),
(10, 'Stiven', 'stiven@gmail.com', '', 'Masakan pisang kemul sangat luar biasa', '2024-06-06 10:19:50'),
(11, 'Stiven', 'stiven@gmail.com', '', 'Masakan pisang kemul sangat luar biasa', '2024-06-06 10:19:58'),
(12, 'AnginhHitam', 'anginhitam@gmail.com', '', 'Terima kasih karena pisangnya sangat enak dan lezat', '2024-06-06 11:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `kuantitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_transaksi`, `nama_produk`, `harga`, `kuantitas`) VALUES
(84, 81, 'Spesial Strawbery Chocolate', 18000.00, 1),
(85, 81, 'Spesial Americano Chesse', 19000.00, 1),
(86, 82, 'Spesial Americano Chesse', 19000.00, 1),
(87, 83, 'Spesial Americano Chesse', 19000.00, 1),
(88, 83, 'Spesial Macha Chesse', 20000.00, 1),
(90, 85, 'Spesial Strawbery Chesse', 18000.00, 1),
(91, 86, 'Spesial Americano Chesse', 19000.00, 1),
(92, 86, 'Spesial Strawbery Chesse', 18000.00, 1),
(93, 87, 'Spesial Macha Chesse', 20000.00, 1),
(94, 88, 'Spesial Americano Chesse', 19000.00, 1),
(95, 89, 'Spesial Americano Chesse', 19000.00, 1),
(96, 90, 'Spesial Americano Chesse', 19000.00, 1),
(97, 91, 'Spesial Strawbery Chesse', 18000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `order_id` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `total_biaya` decimal(10,2) NOT NULL,
  `email` varchar(35) NOT NULL,
  `tanggal_checkout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `order_id`, `nama`, `no_hp`, `alamat`, `total_biaya`, `email`, `tanggal_checkout`) VALUES
(81, '1655578786', 'FEBITO TEGAR', '081802200120', 'Sleman', 37000.00, 'otnayyans@gmail.com', '2024-06-06 21:40:15'),
(82, '384802413', 'FEBITO TEGAR', '081802200120', 'werraaa', 19000.00, 'ggggggggg@gmail.com', '2024-06-06 21:44:32'),
(83, '1997204285', 'FEBITO TEGAR', '081802200120', 'Sleman', 39000.00, 'adwok@gmail.com', '2024-06-06 21:49:51'),
(85, '1229925545', 'Yaya', '0868518028', 'sleman', 18000.00, 'kenzoshoes9@gmail.com', '2024-06-06 22:02:11'),
(86, '1549003565', 'Stiven', '08225366112', 'Trini ', 37000.00, 'stiven@gmail.com', '2024-06-06 22:25:49'),
(87, '1348339966', 'Yaya', '08225366112', 'lllll', 20000.00, 'tegarvalentino9@gmail.com', '2024-06-06 22:29:23'),
(88, '125608763', 'Stiven', '0868518028', 'dwadwad', 19000.00, 'kenzoshoes9@gmail.com', '2024-06-06 22:43:29'),
(89, '1085028081', 'Stiven', '0868518028', 'dwadwad', 19000.00, 'kenzoshoes9@gmail.com', '2024-06-06 22:45:23'),
(90, '1509552833', 'Stiven', '0868518028', '122', 19000.00, 'tegarvalentino9@gmail.com', '2024-06-06 22:47:21'),
(91, '389098461', 'Stiven', '08225366112', '2132131', 18000.00, 'tegarvalentino9@gmail.com', '2024-06-06 22:47:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
