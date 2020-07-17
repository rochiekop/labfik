-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2020 at 01:21 AM
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
-- Table structure for table `tb_lab`
--

CREATE TABLE `tb_lab` (
  `id` int(11) NOT NULL,
  `images` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lab`
--

INSERT INTO `tb_lab` (`id`, `images`, `title`, `body`, `date`) VALUES
(3, 'IMG_9534_edit.jpg', 'Lab Batik', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium', '2020-07-17 08:20:46'),
(12, 'IMG_9314.JPG', 'Lab Bengkel', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium', '2020-07-17 08:20:46'),
(13, 'IMG_9274.JPG', 'Lab CGI', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium', '2020-07-17 08:20:46'),
(16, 'IMG_9189_edit.jpg', 'Lab Mac', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium', '2020-07-17 08:20:46'),
(17, 'IMG_9166_edit.jpg', 'Lab Multimedia', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium\r\n', '2020-07-17 08:20:46'),
(22, 'IMG_9675_edit.jpg', 'Lab Pola dan Jahit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium ', '2020-07-17 08:20:46'),
(44, 'IMG_9181_edit.jpg', 'Lab Sintik', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium', '2020-07-17 08:20:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_lab`
--
ALTER TABLE `tb_lab`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_lab`
--
ALTER TABLE `tb_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
