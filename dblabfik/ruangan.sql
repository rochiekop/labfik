-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 12:32 PM
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
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` varchar(64) NOT NULL,
  `id_kategori` varchar(64) NOT NULL,
  `ruangan` varchar(255) NOT NULL,
  `akses` varchar(100) NOT NULL,
  `kapasitas` int(5) NOT NULL,
  `images` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `id_kategori`, `ruangan`, `akses`, `kapasitas`, `images`, `date`) VALUES
('1', '2', 'IK.01.02', 'Dosen, Mahasiswa', 39, 'default1.jpg', '2020-08-23 17:02:26'),
('10', '11', 'IK.01.09', 'Dosen, Mahasiswa', 41, 'default.jpg', '2020-08-23 17:02:26'),
('17', '11', 'IK.02.02', 'Dosen, Mahasiswa', 34, 'default.jpg', '2020-08-23 17:02:26'),
('4', '9', 'IK.01.01', 'Dosen, Mahasiswa', 40, 'default.jpg', '2020-08-23 17:02:26'),
('5', '4', 'IK.01.05', 'Mahasiswa', 21, 'default2.jpg', '2020-08-23 17:02:26'),
('5f15e3276fe2b', '10', 'IK.02.10', 'Mahasiswa', 34, 'default.jpg', '2020-08-23 17:02:26'),
('5f3e34922ed65', '11', 'IK.02.05', 'Dosen, Mahasiswa', 25, 'default.jpg', '2020-08-23 17:02:26'),
('6', '3', 'IK.02.04', 'Dosen, Mahasiswa', 25, 'default3.jpg', '2020-08-23 17:02:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
