-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2019 at 10:00 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpsdmdjateng_eproper`
--

-- --------------------------------------------------------

--
-- Table structure for table `rtl`
--

CREATE TABLE `rtl` (
  `id_rtl` int(11) NOT NULL,
  `nip` varchar(64) NOT NULL,
  `namadiklat` varchar(255) NOT NULL,
  `jenisdiklat` varchar(64) NOT NULL,
  `tahun` year(4) NOT NULL,
  `ruanglingkup` varchar(64) NOT NULL,
  `cluster` varchar(64) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `latarbelakang` longtext NOT NULL,
  `manfaat` longtext NOT NULL,
  `milestone` longtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tglsubmit` datetime NOT NULL,
  `tglveri` datetime NOT NULL,
  `asalpeserta` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rtl`
--

INSERT INTO `rtl` (`id_rtl`, `nip`, `namadiklat`, `jenisdiklat`, `tahun`, `ruanglingkup`, `cluster`, `judul`, `latarbelakang`, `manfaat`, `milestone`, `status`, `tglsubmit`, `tglveri`, `asalpeserta`) VALUES
(1, '3374073108940003', 'Diklat Fungsional Penyuluh Pertanian', 'Diklat Fungsional', 2019, 'Provinsi', 'Hukum & Pengawasan', 'HAI kamu', '<p>Hai lagi</p>\r\n', '<p>Hai juga</p>\r\n', '<p>Oh yeaaah</p>\r\n', 1, '2019-09-05 00:00:00', '2019-09-05 00:00:00', 'internal'),
(2, '3374073108940003', 'Diklat Fungsional Pertanian', 'Diklat Fungsional', 2019, 'Kecamatan', 'Hukum & Pengawasan', 'Apa Ini', '<p>dwedewfdcdscscsd</p>\r\n', '<p>dewdwedszddddescs</p>\r\n', '<p>dwedecsedf</p>\r\n', 0, '2019-09-06 11:06:01', '0000-00-00 00:00:00', 'internal'),
(3, '3374073108940003', 'Diklat Fungsional Puskesmas', 'Diklat Fungsional', 2019, 'Provinsi', 'Kesehatan', 'PUSKESMAS  MAS MAS', '<p>eweqwewqewqe</p>\r\n', '<p>rewrewrewrwewqeq</p>\r\n', '<p>ewqewewqerfweerewr</p>\r\n', 1, '2019-09-06 11:08:09', '2019-09-06 14:52:40', 'internal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rtl`
--
ALTER TABLE `rtl`
  ADD PRIMARY KEY (`id_rtl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rtl`
--
ALTER TABLE `rtl`
  MODIFY `id_rtl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
