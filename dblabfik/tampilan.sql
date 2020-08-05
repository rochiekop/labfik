-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 12:59 PM
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
  `id` varchar(64) NOT NULL,
  `slug_tampilan` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_ck` int(11) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `nim` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `No_wa` int(15) NOT NULL,
  `No_hp` int(15) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `views` int(11) NOT NULL DEFAULT 0,
  `judul` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tampilan`
--

INSERT INTO `tampilan` (`id_tampilan`, `id`, `slug_tampilan`, `id_kategori`, `id_ck`, `type`, `nim`, `gambar`, `No_wa`, `No_hp`, `tanggal_post`, `tanggal_update`, `views`, `judul`, `deskripsi`, `likes`, `status`) VALUES
(9, '5f1e7dc5ca07e', 'fashion', 1, 8, 'Foto', 1301174655, 'download_(1)2.jpg', 2147483647, 2147483647, '2020-08-05 07:33:01', '2020-08-05 05:47:42', 2, 'fashion', 'fahion terkini', 0, 'Diterima'),
(10, '44', 'apa-aja', 7, NULL, 'Video', 1301174633, 'Profil_Fakultas_Industri_Kreatif_-_TELKOM_UNIVERSITY.mp4', 2147483647, 2147483647, '2020-08-05 07:45:14', '2020-08-05 05:32:43', 1, 'apa aja', 'yuk bisa yuk', 1, 'Diterima'),
(11, '38', 'desain-ruang-keluarga', 5, NULL, 'Foto', 1301112311, 'images_(3).jpg', 2147483647, 2147483647, '2020-08-05 07:53:57', '2020-08-05 05:30:47', 7, 'desain ruang keluarga', 'desain interior rumah', 0, 'Diterima');

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
  MODIFY `id_tampilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
