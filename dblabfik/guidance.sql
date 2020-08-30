-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2020 at 03:49 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblabfik`
--

-- --------------------------------------------------------

--
-- Table structure for table `guidance`
--

CREATE TABLE `guidance` (
  `id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `id_mhs` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `judul_1` varchar(255) NOT NULL,
  `judul_2` varchar(255) NOT NULL,
  `judul_3` varchar(255) NOT NULL,
  `keterangan` varchar(64) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `peminatan` varchar(255) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `status_file` varchar(255) NOT NULL,
  `date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guidance`
--

INSERT INTO `guidance` (`id`, `id_mhs`, `judul_1`, `judul_2`, `judul_3`, `keterangan`, `komentar`, `peminatan`, `tahun`, `status_file`, `date`) VALUES
('5f3e32ceeb674', '5f3e31113e0d3', 'Judul Tugas Akhir', '', '', '', '', 'Desain Visual', '2020', 'Disetujui Dosen Wali', '10/02/2020'),
('5f48af1704a46', '44', 'Judul 1', 'Judul 2', 'Judul 3', '', '', 'Advertising', '2020', 'Disetujui wali', '28/08/2020'),
('5f4a4c07f3949', '5f4a4b0ee4b42', 'Judul Satu ', 'Judul Dua', 'Judul Tiga', '', '', 'Advertising', '2020', 'Disetujui wali', '29/08/2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guidance`
--
ALTER TABLE `guidance`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
