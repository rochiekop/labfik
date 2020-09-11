-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2020 at 08:44 PM
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
-- Table structure for table `thesis_lecturers`
--

CREATE TABLE `thesis_lecturers` (
  `id` varchar(64) NOT NULL,
  `id_guidance` varchar(64) NOT NULL,
  `dosen_pembimbing1` varchar(128) NOT NULL,
  `kelompok_keahlian` varchar(64) NOT NULL,
  `dosen_pembimbing2` varchar(128) NOT NULL,
  `dosen_penguji1` varchar(128) NOT NULL,
  `dosen_penguji2` varchar(128) NOT NULL,
  `date` varchar(64) NOT NULL,
  `date_edit` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thesis_lecturers`
--

INSERT INTO `thesis_lecturers` (`id`, `id_guidance`, `dosen_pembimbing1`, `kelompok_keahlian`, `dosen_pembimbing2`, `dosen_penguji1`, `dosen_penguji2`, `date`, `date_edit`) VALUES
('5f5a2c96d2702', '5f5a0f9fc0142', '5f2128a43c90b', 'Deconstra', '5f1e7dc5ca07e', '', '', '09-10-2020 20:39:34', ''),
('5f5a40894fc26', '5f5a309e3d7b1', '5f2128a43c90b', 'Deconstra', '5f28dbe13ddf9', '', '', '09-10-2020 22:04:41', ''),
('5f5bc549e5c45', '5f5b7d1bf1df4', '5f1e7dc5ca07e', 'Inlive', '5f2128a43c90b', '', '', '09-12-2020 01:43:21', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thesis_lecturers`
--
ALTER TABLE `thesis_lecturers`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
