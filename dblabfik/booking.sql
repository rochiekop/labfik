-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 07:48 PM
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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` varchar(64) NOT NULL,
  `id_peminjam` varchar(64) NOT NULL,
  `id_ruangan` varchar(64) NOT NULL,
  `date` date NOT NULL,
  `date_declined` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `id_peminjam`, `id_ruangan`, `date`, `date_declined`, `time`, `keterangan`, `status`) VALUES
('5f17a08ae0d85', '38', '5f15e3276fe2b', '2020-07-23', '0000-00-00', '07.30 - 08.30, 08.30 - 09.30', 'Kelas', 'Diterima'),
('5f17c81e23361', '5f140497dd7ef', '17', '2020-07-22', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30, 10.30 - 11.30', 'Kelas Pengganti', 'Diterima'),
('5f17d4cd66afd', '38', '5f15e3276fe2b', '2020-07-22', '0000-00-00', '10.30 - 11.30, 11.30 - 12.30, 12.30 - 13.30', 'fgfdgf', 'Menunggu Acc'),
('5f17d96f202c2', '38', '5f15e3276fe2b', '0000-00-00', '2020-07-22', '06.30 - 07.30, 07.30 - 08.30', 'tes', 'Ditolak'),
('5f18707b13a27', '38', '5f15e3276fe2b', '2020-07-22', '0000-00-00', '13.30 - 14.30', 'fdsdf', 'Menunggu Acc'),
('5f187a3ecb692', '38', '5f15e3276fe2b', '2020-07-22', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30', 'fdgf', 'Menunggu Acc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
