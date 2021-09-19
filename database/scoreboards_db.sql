-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2021 at 06:31 PM
-- Server version: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scoreboards_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(4, 'KATEGORI SOLIS ANAK (SOLNAK) USIA 7 - 9 TAHUN'),
(5, 'KATEGORI SOLIS ANAK (SOLNAK) USIA 10 - 13 TAHUN '),
(6, 'KATEGORI SOLIS REMAJA PUTRA (SOLREMPRA) USIA 16 - 24 TAHUN'),
(7, 'KATEGORI SOLIS REMAJA PUTRI (SOLREMPRI) USIA  16 - 24 TAHUN'),
(8, 'KATEGORI VOCAL GROUP (VG R/P) USIA 16 - 24 TAHUN'),
(9, 'KATEGORI MUSIK POP GEREJAWI (MPG) USIA 12 TAHUN ke atas'),
(11, 'KATEGORI PADUAN SUARA ANAK USIA 9 - 15 TAHUN'),
(12, 'KATEGORI PADUAN SUARA REMAJA/PEMUDA USIA 16 - 24 TAHUN'),
(13, 'KATEGORI PADUAN SUARA PRIA (PSP) USIA 25 TAHUN KE ATAS'),
(14, 'KATEGORI PADUAN SUARA WANITA (PSW) USIA 25 TAHUN KE ATAS'),
(15, 'KATEGORI PADUAN SUARA DEWASA CAMPURAN (PSDC) USIA 25 TAHUN KE ATAS'),
(16, 'KATEGORI PADUAN SUARA ETNIK INKULTURATIF USIA REMAJA/PEMUDA 16 - 24 TAHUN ATAU USIA DEWASA CAMPURAN ');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `order_number` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `total_score` float(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `category_id`, `name`, `gender`, `order_number`, `status`, `total_score`, `created_at`) VALUES
(1, NULL, 'Zaskia Ghotic', 'Perempuan', 1, 'tampil', 87.67, '2021-06-18 15:06:34'),
(2, NULL, 'Solo Dewasa', 'Laki-laki', 1, 'tampil', 10.00, '2021-06-18 23:40:29'),
(3, 4, 'MIMIKA', 'Laki-laki', 1, 'tampil', 28.00, '2021-06-18 23:53:00'),
(4, 4, 'JAYAPURA', 'Laki-laki', 2, 'Menunggu', NULL, '2021-06-18 23:53:15'),
(5, 5, 'MIMIKA', 'Laki-laki', 1, 'Menunggu', NULL, '2021-06-18 23:53:27'),
(6, 5, 'JAYAPURA', 'Laki-laki', 2, 'Menunggu', NULL, '2021-06-18 23:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `login`, `password`, `level`, `created_at`) VALUES
(1, 'Administrator', 'admin@admin.com', 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', '2021-05-31 16:43:01'),
(15, 'Joe Tarling', 'joe@gmail.com', 'joe@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'juri', '2021-06-18 15:15:41'),
(17, 'izzy', 'izzy@gmail.com', 'izzy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'juri', '2021-06-18 23:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `valuations`
--

CREATE TABLE `valuations` (
  `id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `score` float(10,2) NOT NULL,
  `score_serialize` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `valuations`
--

INSERT INTO `valuations` (`id`, `participant_id`, `user_id`, `score`, `score_serialize`, `created_at`) VALUES
(1, 1, 15, 87.67, 'a:3:{i:0;s:2:"98";i:1;s:2:"80";i:2;s:2:"85";}', '2021-06-18 15:31:29'),
(2, 2, 17, 10.00, 'a:3:{i:0;s:2:"10";i:1;s:2:"10";i:2;s:2:"10";}', '2021-06-18 23:41:49'),
(3, 3, 17, 28.00, 'a:5:{i:0;s:2:"20";i:1;s:2:"30";i:2;s:2:"30";i:3;s:2:"40";i:4;s:2:"20";}', '2021-06-18 23:55:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `valuations`
--
ALTER TABLE `valuations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participant_id` (`participant_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `valuations`
--
ALTER TABLE `valuations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `valuations`
--
ALTER TABLE `valuations`
  ADD CONSTRAINT `valuations_ibfk_1` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `valuations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
