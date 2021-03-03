-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2020 at 12:42 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emiko`
--

-- --------------------------------------------------------

--
-- Table structure for table `mas_ekstra`
--

CREATE TABLE `mas_ekstra` (
  `id_ekstra` int(3) NOT NULL,
  `nm_ekstra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_ekstra`
--

INSERT INTO `mas_ekstra` (`id_ekstra`, `nm_ekstra`) VALUES
(9, 'Dengan busa susu tipis'),
(12, 'Dengan busa susu tipis, Es batu'),
(14, 'Es batu'),
(15, 'Tanpa busa susu'),
(16, 'Tanpa busa susu, Es batu');

-- --------------------------------------------------------

--
-- Table structure for table `mas_ekstra_kopi`
--

CREATE TABLE `mas_ekstra_kopi` (
  `id_ekstra_kopi` int(3) NOT NULL,
  `id_tempat_kopi` int(3) NOT NULL,
  `id_ekstra` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mas_hrg_kopi`
--

CREATE TABLE `mas_hrg_kopi` (
  `id_hrg_kopi` int(3) NOT NULL,
  `id_ekstra_kopi` int(3) NOT NULL,
  `hrg_kopi` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mas_jns_kopi`
--

CREATE TABLE `mas_jns_kopi` (
  `id_jns_kopi` int(3) NOT NULL,
  `nm_jns_kopi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_jns_kopi`
--

INSERT INTO `mas_jns_kopi` (`id_jns_kopi`, `nm_jns_kopi`) VALUES
(6, 'Kopi Hitam'),
(7, 'Kopi Tubruk'),
(8, 'Kopi Hitam Jahe'),
(9, 'Kopi Hitam Americano'),
(10, 'Kopi Latte');

-- --------------------------------------------------------

--
-- Table structure for table `mas_pemanis`
--

CREATE TABLE `mas_pemanis` (
  `id_pemanis` int(3) NOT NULL,
  `nm_pemanis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_pemanis`
--

INSERT INTO `mas_pemanis` (`id_pemanis`, `nm_pemanis`) VALUES
(4, 'tanpa Pemanis'),
(5, 'dengan Pemanis');

-- --------------------------------------------------------

--
-- Table structure for table `mas_pemanis_kopi`
--

CREATE TABLE `mas_pemanis_kopi` (
  `id_pemanis_kopi` int(3) NOT NULL,
  `id_jns_kopi` int(3) NOT NULL,
  `id_pemanis` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_pemanis_kopi`
--

INSERT INTO `mas_pemanis_kopi` (`id_pemanis_kopi`, `id_jns_kopi`, `id_pemanis`) VALUES
(2, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `mas_tempat`
--

CREATE TABLE `mas_tempat` (
  `id_tempat` int(3) NOT NULL,
  `nm_tempat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_tempat`
--

INSERT INTO `mas_tempat` (`id_tempat`, `nm_tempat`) VALUES
(2, 'Botol'),
(3, 'Cup');

-- --------------------------------------------------------

--
-- Table structure for table `mas_tempat_kopi`
--

CREATE TABLE `mas_tempat_kopi` (
  `id_tempat_kopi` int(3) NOT NULL,
  `id_ukuran_kopi` int(3) NOT NULL,
  `id_tempat` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mas_ukuran`
--

CREATE TABLE `mas_ukuran` (
  `id_ukuran` int(3) NOT NULL,
  `nm_ukuran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_ukuran`
--

INSERT INTO `mas_ukuran` (`id_ukuran`, `nm_ukuran`) VALUES
(3, '250 ml'),
(4, '350 ml'),
(5, '1000 ml');

-- --------------------------------------------------------

--
-- Table structure for table `mas_ukuran_kopi`
--

CREATE TABLE `mas_ukuran_kopi` (
  `id_ukuran_kopi` int(3) NOT NULL,
  `id_pemanis_kopi` int(3) NOT NULL,
  `id_ukuran` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mas_user`
--

CREATE TABLE `mas_user` (
  `id_user` int(2) NOT NULL,
  `id_user_akses` int(2) NOT NULL,
  `nm_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mas_user_akses`
--

CREATE TABLE `mas_user_akses` (
  `id_user_akses` int(2) NOT NULL,
  `nm_user_akses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mas_ekstra`
--
ALTER TABLE `mas_ekstra`
  ADD PRIMARY KEY (`id_ekstra`);

--
-- Indexes for table `mas_ekstra_kopi`
--
ALTER TABLE `mas_ekstra_kopi`
  ADD PRIMARY KEY (`id_ekstra_kopi`);

--
-- Indexes for table `mas_hrg_kopi`
--
ALTER TABLE `mas_hrg_kopi`
  ADD PRIMARY KEY (`id_hrg_kopi`);

--
-- Indexes for table `mas_jns_kopi`
--
ALTER TABLE `mas_jns_kopi`
  ADD PRIMARY KEY (`id_jns_kopi`);

--
-- Indexes for table `mas_pemanis`
--
ALTER TABLE `mas_pemanis`
  ADD PRIMARY KEY (`id_pemanis`);

--
-- Indexes for table `mas_pemanis_kopi`
--
ALTER TABLE `mas_pemanis_kopi`
  ADD PRIMARY KEY (`id_pemanis_kopi`);

--
-- Indexes for table `mas_tempat`
--
ALTER TABLE `mas_tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indexes for table `mas_tempat_kopi`
--
ALTER TABLE `mas_tempat_kopi`
  ADD PRIMARY KEY (`id_tempat_kopi`);

--
-- Indexes for table `mas_ukuran`
--
ALTER TABLE `mas_ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `mas_ukuran_kopi`
--
ALTER TABLE `mas_ukuran_kopi`
  ADD PRIMARY KEY (`id_ukuran_kopi`);

--
-- Indexes for table `mas_user`
--
ALTER TABLE `mas_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `mas_user_akses`
--
ALTER TABLE `mas_user_akses`
  ADD PRIMARY KEY (`id_user_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mas_ekstra`
--
ALTER TABLE `mas_ekstra`
  MODIFY `id_ekstra` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mas_ekstra_kopi`
--
ALTER TABLE `mas_ekstra_kopi`
  MODIFY `id_ekstra_kopi` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mas_hrg_kopi`
--
ALTER TABLE `mas_hrg_kopi`
  MODIFY `id_hrg_kopi` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mas_jns_kopi`
--
ALTER TABLE `mas_jns_kopi`
  MODIFY `id_jns_kopi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mas_pemanis`
--
ALTER TABLE `mas_pemanis`
  MODIFY `id_pemanis` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mas_pemanis_kopi`
--
ALTER TABLE `mas_pemanis_kopi`
  MODIFY `id_pemanis_kopi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mas_tempat`
--
ALTER TABLE `mas_tempat`
  MODIFY `id_tempat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mas_tempat_kopi`
--
ALTER TABLE `mas_tempat_kopi`
  MODIFY `id_tempat_kopi` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mas_ukuran`
--
ALTER TABLE `mas_ukuran`
  MODIFY `id_ukuran` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mas_ukuran_kopi`
--
ALTER TABLE `mas_ukuran_kopi`
  MODIFY `id_ukuran_kopi` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mas_user`
--
ALTER TABLE `mas_user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mas_user_akses`
--
ALTER TABLE `mas_user_akses`
  MODIFY `id_user_akses` int(2) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
