-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 04:40 PM
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
-- Table structure for table `kategoriruangan`
--

CREATE TABLE `kategoriruangan` (
  `id` varchar(64) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoriruangan`
--

INSERT INTO `kategoriruangan` (`id`, `kategori`, `date_created`) VALUES
('10', 'Studio Videografi', '2020-07-16 12:47:58'),
('11', 'Kelas Biasa', '2020-07-17 23:42:28'),
('2', 'Lab Cintiq', '2020-07-16 12:47:58'),
('3', 'Lab Batik', '2020-07-16 12:47:58'),
('4', 'Lab Lukis', '2020-07-16 12:47:58'),
('5', 'Lab Sablon', '2020-07-16 12:47:58'),
('6', 'Lab Multimedia', '2020-07-16 12:47:58'),
('7', 'Lab Pola dan Jahit', '2020-07-16 12:47:58'),
('8', 'Studio Musik', '2020-07-16 12:47:58'),
('9', 'Studio Fotografi', '2020-07-16 12:47:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategoriruangan`
--
ALTER TABLE `kategoriruangan`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
