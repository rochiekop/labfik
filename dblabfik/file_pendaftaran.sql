-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2020 at 07:20 AM
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
-- Table structure for table `file_pendaftaran`
--

CREATE TABLE `file_pendaftaran` (
  `id` varchar(64) NOT NULL,
  `id_mhs` varchar(64) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(64) NOT NULL,
  `date_edit` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_pendaftaran`
--

INSERT INTO `file_pendaftaran` (`id`, `id_mhs`, `file`, `status`, `date`, `date_edit`) VALUES
('5f45f03fa66c5', '44', 'Form_Penilaian_Pembimbing_Lapangan_Rochi.pdf', 'Dikirim', '2020-08-26 00:00:00', '0000-00-00 00:00:00'),
('5f45f03fa85d0', '44', 'Form_Penilaian_Rochi.pdf', 'Dikirim', '2020-08-26 00:00:00', '0000-00-00 00:00:00'),
('5f45f03fab5d2', '44', '1920-2_IF_LembarPengesahanKP_1301170761_merge.pdf', 'Dikirim', '2020-08-26 00:00:00', '0000-00-00 00:00:00'),
('5f45f03fad65f', '44', 'Surat_Pernyataan_Rochi.pdf', 'Dikirim', '2020-08-26 00:00:00', '0000-00-00 00:00:00'),
('5f45f03faf720', '44', 'Form_penilaian_pembimbing_akademik-Rahma.pdf', 'Dikirim', '2020-08-26 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_pendaftaran`
--
ALTER TABLE `file_pendaftaran`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
