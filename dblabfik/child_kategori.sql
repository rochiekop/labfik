-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2020 at 05:03 PM
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
-- Table structure for table `child_kategori`
--

CREATE TABLE `child_kategori` (
  `id_ck` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_child` varchar(128) NOT NULL,
  `post_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `child_kategori`
--

INSERT INTO `child_kategori` (`id_ck`, `id_kategori`, `nama_child`, `post_update`) VALUES
(1, 7, 'Fotografi Dasar dan Periklanan', '2020-07-09 11:46:58'),
(2, 6, 'tata busana', '2020-07-11 23:49:58'),
(4, 2, 'Semantika Produk', '2020-07-18 14:44:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `child_kategori`
--
ALTER TABLE `child_kategori`
  ADD PRIMARY KEY (`id_ck`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `child_kategori`
--
ALTER TABLE `child_kategori`
  MODIFY `id_ck` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
