-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2020 at 10:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `keterangan` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `statusta` varchar(64) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `id_peminjam`, `id_ruangan`, `date`, `date_declined`, `time`, `keterangan`, `status`, `statusta`, `date_created`) VALUES
('5f1a463028b0b', '44', '5f15e3276fe2b', '0000-00-00', '2020-07-24', '07.30 - 08.30', 'Kelas Pengganti', 'Ditolak', NULL, '2020-07-25 18:37:26'),
('5f1a467fec338', '44', '5f15e3276fe2b', '0000-00-00', '2020-07-24', '08.30 - 09.30, 09.30 - 10.30', 'Testing', 'Ditolak', NULL, '2020-07-25 18:37:26'),
('5f1a5673a36e5', '44', '5f15e3276fe2b', '0000-00-00', '2020-07-24', '14.30 - 15.30, 15.30 - 16.30, 16.30 - 17.30', 'Testing', 'Ditolak', NULL, '2020-07-25 18:37:26'),
('5f1a5d8261d27', '44', '5f15e3276fe2b', '0000-00-00', '2020-07-24', '12.30 - 13.30, 13.30 - 14.30', 'kelas', 'Ditolak', NULL, '2020-07-25 18:37:26'),
('5f1a5dfe86920', '44', '5f15e3276fe2b', '2020-07-23', '0000-00-00', '06.30 - 07.30, 07.30 - 08.30', 'kelas', 'Diterima', NULL, '2020-07-25 18:37:26'),
('5f1d2a87278ce', '44', '1', '0000-00-00', '2020-07-26', '13.30 - 14.30, 14.30 - 15.30, 15.30 - 16.30', 'Testing for schedule', 'Ditolak', NULL, '2020-07-26 14:02:31'),
('5f3a1b68280f7', '5f2930fa9e732', '5f15e3276fe2b', '2020-08-18', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30, 10.30 - 11.30', 'Test', 'Menunggu Acc', NULL, '2020-08-17 12:53:44'),
('5f3a214417bb0', '44', '10', '2020-08-23', '0000-00-00', '09.30 - 10.30', 'For testing', 'Menunggu Acc', NULL, '2020-08-17 13:18:44'),
('5f3b8c86794c1', '5f1e7dc5ca07e', '4', '2020-08-20', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30', 'Kelas pengganti', 'Menunggu Acc', NULL, '2020-08-18 15:08:38'),
('5f3fa05b29587', '5f28dbe13ddf9', '6', '2020-08-22', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30', 'Kelas', 'Diterima', NULL, '2020-08-21 17:22:19'),
('5f3fa0b3621e9', '5f3e31113e0d3', '17', '2020-08-22', '0000-00-00', '07.30 - 08.30, 08.30 - 09.30', 'Kelas pengganti', 'Diterima', NULL, '2020-08-21 17:23:47'),
('5f3fa6492b7a4', '5f1e7dc5ca07e', '5f3e34922ed65', '0000-00-00', '2020-08-22', '08.30 - 09.30, 09.30 - 10.30, 11.30 - 12.30, 12.30 - 13.30', 'Test', 'Ditolak', NULL, '2020-08-21 17:47:37'),
('5f3fd793b26b1', '5f1e7dc5ca07e', '17', '2020-08-22', '0000-00-00', '10.30 - 11.30, 11.30 - 12.30', 'Kelas pengganti', 'Diterima', NULL, '2020-08-21 21:17:55');

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
