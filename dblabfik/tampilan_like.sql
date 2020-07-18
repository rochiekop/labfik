-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2020 at 05:04 PM
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
-- Table structure for table `tampilan_like`
--

CREATE TABLE `tampilan_like` (
  `id` int(11) NOT NULL,
  `id_tampilan` int(11) NOT NULL,
  `ip` varchar(200) CHARACTER SET latin1 NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tampilan_like`
--

INSERT INTO `tampilan_like` (`id`, `id_tampilan`, `ip`, `date`) VALUES
(3, 31, '::1', '2020-07-18 03:03:18'),
(4, 34, '::1', '2020-07-18 06:01:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tampilan_like`
--
ALTER TABLE `tampilan_like`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tampilan_like`
--
ALTER TABLE `tampilan_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
