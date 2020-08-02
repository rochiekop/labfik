-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Aug 02, 2020 at 05:11 PM
=======
-- Generation Time: Aug 02, 2020 at 04:58 AM
>>>>>>> parent of 4e34e95... Revert "Merge branch 'master' of https://github.com/rochiekop/labfik"
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
-- Table structure for table `dosbing`
--

CREATE TABLE `dosbing` (
  `id` varchar(64) NOT NULL,
  `id_dosen` varchar(64) NOT NULL,
  `id_mhs` varchar(64) NOT NULL,
<<<<<<< HEAD
  `date` datetime NOT NULL DEFAULT current_timestamp(),
=======
  `date` date NOT NULL DEFAULT current_timestamp(),
>>>>>>> parent of 4e34e95... Revert "Merge branch 'master' of https://github.com/rochiekop/labfik"
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosbing`
--

INSERT INTO `dosbing` (`id`, `id_dosen`, `id_mhs`, `date`, `status`) VALUES
<<<<<<< HEAD
('5f2631b631a8b', '5f258dc28c1a3', '44', '2020-08-02 00:00:00', 'Sudah Disetujui'),
('5f26a96184ef7', '38', '44', '2020-08-02 00:00:00', 'Menunggu Persetujuan');
=======
('5f259176e451d', '38', '44', '2020-08-01', 'Menunggu Persetujuan'),
('5f2593c78dec1', '5f258dc28c1a3', '44', '2020-08-01', 'Ditolak'),
('5f2615f8f0cec', '5f258dc28c1a3', '44', '2020-08-02', 'Menunggu Persetujuan');
>>>>>>> parent of 4e34e95... Revert "Merge branch 'master' of https://github.com/rochiekop/labfik"

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosbing`
--
ALTER TABLE `dosbing`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
