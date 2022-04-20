-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 02:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ormawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang_divisi`
--

CREATE TABLE `bidang_divisi` (
  `id_bidang` int(11) NOT NULL,
  `jabatan` varchar(256) DEFAULT NULL,
  `id_divisi` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang_divisi`
--

INSERT INTO `bidang_divisi` (`id_bidang`, `jabatan`, `id_divisi`) VALUES
(1, 'ketua', 1),
(2, 'wakil ketua', 1),
(3, 'HRD', 2),
(4, 'bendahara', 2),
(5, 'operator', 3),
(6, 'seketaris', 3);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Teknologi'),
(2, 'Humas'),
(3, 'Kerohanian');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `nim` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `semester` int(255) DEFAULT NULL,
  `id_bidang` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`nim`, `nama`, `semester`, `id_bidang`) VALUES
(1903210, 'Reza Firmansyah', 6, 1),
(2003400, 'Ardi Syahputra', 4, 2),
(1903560, 'Riza Pengestu', 6, 3),
(2015400, 'Lavina Rissa', 4, 4),
(1974310, 'Andi Herlambang', 6, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_divisi`
--
ALTER TABLE `bidang_divisi`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang_divisi`
--
ALTER TABLE `bidang_divisi`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
