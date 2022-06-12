-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2022 at 07:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asdos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_asdos`
--

CREATE TABLE `tb_asdos` (
  `id` int(10) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `nilai_publik` int(50) NOT NULL,
  `ipk` varchar(50) NOT NULL,
  `nilai_tes_pemweb` int(50) NOT NULL,
  `nilai_kerjasama` int(50) NOT NULL,
  `nilai_agama` int(50) NOT NULL,
  `preferensi` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_asdos`
--

INSERT INTO `tb_asdos` (`id`, `nama_mhs`, `nilai_publik`, `ipk`, `nilai_tes_pemweb`, `nilai_kerjasama`, `nilai_agama`, `preferensi`) VALUES
(1, 'Fani Khoerunnisa', 70, '4', 80, 76, 85, 0.46862383360161),
(2, 'Fadil Wonosobo', 80, '3', 70, 80, 75, 0.25391674507339),
(3, 'Syifaul Hidayah', 80, '3', 80, 90, 80, 0.39321370809658),
(4, 'Rifki Budi Santoso', 90, '3', 85, 85, 75, 0.47356263238855),
(5, 'adhen Kurdi', 90, '3', 80, 87, 90, 0.54815814258326),
(6, 'Muhammad Reziq Darusman', 85, '4', 90, 76, 95, 0.72125225628163);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_asdos`
--
ALTER TABLE `tb_asdos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_asdos`
--
ALTER TABLE `tb_asdos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
