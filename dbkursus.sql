-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 09:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkursus`
--

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` int(5) NOT NULL,
  `judul` char(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `durasi` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `judul`, `deskripsi`, `durasi`) VALUES
(1, 'Data Analayst', 'Belajar Mengenai Big Data, Struktur Data dan Masih Banyak lagi.', '2 jam'),
(2, 'Bahasa Inggris', 'Belajar bahasa inggris yang baik dan benar dalam pengucapannya', '3 jam'),
(3, 'UI/UX Designer', 'Belajar menjadi ui/ux designer ', '4 jam'),
(4, 'Bahasa Banjar', 'Mengenal bahasa banjar yang unik ', '1 jam');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(50) NOT NULL,
  `judul_materi` char(50) NOT NULL,
  `deskripsi_materi` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `judul_materi`, `deskripsi_materi`, `link`) VALUES
(1, 'Data Analayst', 'Belajar Mengenai Big Data, Struktur Data dan Masih Banyak lagi.', 'https://kursusku.com/kursus-belajar/dataAnalayst/video/a'),
(2, 'Bahasa Inggris', 'Belajar bahasa inggris yang baik dan benar dalam pengucapannya.', 'https://kursusku.com/kursus-belajar/bingg/video/a1'),
(3, 'UI/UX Designer', 'Belajar mendesain antar muka aplikasi menggunakan figma', 'https://kursusku.com/kursus/uiux/video/a');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` char(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` tinyint(1) UNSIGNED DEFAULT NULL,
  `id_ref` char(4) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `id_level`, `id_ref`, `ket`) VALUES
('admin', '7dd66913004434da295aefa937f55c8e', 99, '1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id_kursus` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
