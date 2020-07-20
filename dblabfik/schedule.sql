-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2020 at 10:28 AM
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
-- Database: `simplelogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` varchar(64) NOT NULL,
  `id_peminjam` varchar(64) NOT NULL,
  `id_ruangan` varchar(64) NOT NULL,
  `06:30-07:30` varchar(255) NOT NULL,
  `07:30-08:30` varchar(255) NOT NULL,
  `08:30-09:30` varchar(255) NOT NULL,
  `09:30-10-30` varchar(255) NOT NULL,
  `10:30-11:30` varchar(255) NOT NULL,
  `11:30-12.30` varchar(255) NOT NULL,
  `12:30-13:30` varchar(255) NOT NULL,
  `13:30-14:30` varchar(255) NOT NULL,
  `14:30-15:30` varchar(255) NOT NULL,
  `15:30-16:30` varchar(255) NOT NULL,
  `16:30-17:30` varchar(255) NOT NULL,
  `17:30-18:30` varchar(255) NOT NULL,
  `18:30-19:30` varchar(255) NOT NULL,
  `19:30-20:30` varchar(255) NOT NULL,
  `20:30-21:30` varchar(255) NOT NULL,
  `21:30-22:30` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
