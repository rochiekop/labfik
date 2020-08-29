-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2020 at 08:58 AM
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
  `nama` varchar(64) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status_adminlaa` varchar(64) NOT NULL,
  `status_doswal` varchar(64) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `date` varchar(64) NOT NULL,
  `date_edit` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_pendaftaran`
--

INSERT INTO `file_pendaftaran` (`id`, `id_mhs`, `nama`, `file`, `status_adminlaa`, `status_doswal`, `komentar`, `date`, `date_edit`) VALUES
('5f48af170781e', '44', 'KSM', 'mockup_KP.pdf', 'Disetujui', '', '', '28-08-2020', '28-08-2020'),
('5f48af170a405', '44', 'Surat Pernyataan TA', '43967_A_Drunkard’s_Walk.pdf', 'Disetujui', '', '', '28-08-2020', ''),
('5f48af170bc38', '44', 'Sertifikat EPRT', 'as_pdf1.pdf', 'Disetujui', '', '', '28-08-2020', '28-08-2020'),
('5f48af170d477', '44', 'Sertifikat TAK', 'as_pdf.pdf', 'Disetujui', '', '', '28-08-2020', ''),
('5f48af171022d', '44', 'Persetujuan Daftar TA', 'PrecipitFX.pdf', 'Disetujui', '', '', '28-08-2020', '');

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
