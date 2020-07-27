-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 12:17 PM
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
  `status` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `id_peminjam`, `id_ruangan`, `date`, `date_declined`, `time`, `keterangan`, `status`, `date_created`) VALUES
('5f17a08ae0d85', '38', '5f15e3276fe2b', '2020-07-23', '0000-00-00', '07.30 - 08.30, 08.30 - 09.30', 'Kelas', 'Diterima', '2020-07-25 18:37:26'),
('5f17c81e23361', '5f140497dd7ef', '17', '2020-07-22', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30, 10.30 - 11.30', 'Kelas Pengganti', 'Diterima', '2020-07-25 18:37:26'),
('5f17d4cd66afd', '38', '5f15e3276fe2b', '0000-00-00', '2020-07-22', '10.30 - 11.30, 11.30 - 12.30, 12.30 - 13.30', 'Kelas', 'Ditolak', '2020-07-25 18:37:26'),
('5f17d96f202c2', '38', '5f15e3276fe2b', '0000-00-00', '2020-07-22', '06.30 - 07.30, 07.30 - 08.30', 'tes', 'Ditolak', '2020-07-25 18:37:26'),
('5f18707b13a27', '38', '5f15e3276fe2b', '2020-07-22', '0000-00-00', '13.30 - 14.30', 'Kelas', 'Diterima', '2020-07-25 18:37:26'),
('5f190ddf205c0', '44', '17', '0000-00-00', '2020-07-23', '06.30 - 07.30, 07.30 - 08.30', 'Test', 'Ditolak', '2020-07-25 18:37:26'),
('5f1913f13985f', '44', '17', '2020-07-23', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30', 'Testing', 'Menunggu Acc', '2020-07-25 18:37:26'),
('5f1943bf71f4f', '44', '5f15e3276fe2b', '2020-07-23', '0000-00-00', '09.30 - 10.30, 10.30 - 11.30, 11.30 - 12.30', 'Testing', 'Menunggu Acc', '2020-07-25 18:37:26'),
('5f1a463028b0b', '44', '5f15e3276fe2b', '0000-00-00', '2020-07-24', '07.30 - 08.30', 'Kelas Pengganti', 'Ditolak', '2020-07-25 18:37:26'),
('5f1a467fec338', '44', '5f15e3276fe2b', '2020-07-24', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30', 'Testing', 'Menunggu Acc', '2020-07-25 18:37:26'),
('5f1a5673a36e5', '44', '5f15e3276fe2b', '2020-07-24', '0000-00-00', '14.30 - 15.30, 15.30 - 16.30, 16.30 - 17.30', 'Testing', 'Menunggu Acc', '2020-07-25 18:37:26'),
('5f1a5d8261d27', '44', '5f15e3276fe2b', '2020-07-24', '0000-00-00', '12.30 - 13.30, 13.30 - 14.30', 'kelas', 'Menunggu Acc', '2020-07-25 18:37:26'),
('5f1a5dfe86920', '44', '5f15e3276fe2b', '2020-07-24', '0000-00-00', '06.30 - 07.30, 07.30 - 08.30', 'kelas', 'Diterima', '2020-07-25 18:37:26'),
('5f1c1a532425f', '5f140497dd7ef', '17', '2020-07-25', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30, 10.30 - 11.30', 'Booking by Admin', 'Menunggu Acc', '2020-07-25 18:41:07'),
('5f1d2a87278ce', '44', '1', '0000-00-00', '2020-07-26', '13.30 - 14.30, 14.30 - 15.30, 15.30 - 16.30', 'Testing for schedule', 'Ditolak', '2020-07-26 14:02:31');

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
