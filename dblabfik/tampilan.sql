-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 01:33 PM
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
-- Table structure for table `tampilan`
--

CREATE TABLE `tampilan` (
  `id_tampilan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `slug_tampilan` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_ck` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `views` int(11) NOT NULL DEFAULT 0,
  `nim` int(20) NOT NULL,
  `kode_tampilan` varchar(255) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tampilan`
--

INSERT INTO `tampilan` (`id_tampilan`, `id`, `slug_tampilan`, `id_kategori`, `id_ck`, `gambar`, `tanggal_post`, `tanggal_update`, `views`, `nim`, `kode_tampilan`, `judul`, `deskripsi`, `keywords`, `likes`, `status`) VALUES
(3, 44, 'cyberpunk-001', 7, 1, '1238334.jpg', '2020-07-26 17:43:19', '2020-07-26 10:55:19', 1, 1301196969, '001', 'cyberpunk', 'calon game terbaik tahun 2020', 'punk', 1, 'Diterima'),
(4, 38, 'witcher-002', 7, 1, '2226191.jpg', '2020-07-26 17:45:48', '2020-07-26 10:47:42', 1, 1301121313, '002', 'witcher', 'game of the year 2017', 'witch', 0, 'Diterima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tampilan`
--
ALTER TABLE `tampilan`
  ADD PRIMARY KEY (`id_tampilan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tampilan`
--
ALTER TABLE `tampilan`
  MODIFY `id_tampilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
