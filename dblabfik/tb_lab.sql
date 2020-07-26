-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 01:40 AM
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
-- Table structure for table `tb_lab`
--

CREATE TABLE `tb_lab` (
  `id` varchar(64) NOT NULL,
  `images` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lab`
--

INSERT INTO `tb_lab` (`id`, `images`, `title`, `body`, `date`) VALUES
('5f1b8caf058b4', 'IMG_9534_edit.jpg', 'Lab Batik', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-07-25 01:36:47'),
('5f1b93c2bdb1f', 'IMG_9274.JPG', 'Lab CGI', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-07-25 02:06:58'),
('5f1b95d912037', 'IMG_9189_edit.jpg', 'Lab Mac', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-07-25 02:15:53'),
('5f1b960077560', 'IMG_9314.JPG', 'Lab Bengkel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-07-25 02:16:32'),
('5f1b9649ea263', 'IMG_9166_edit.jpg', 'Lab Multimedia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-07-25 02:17:45'),
('5f1b96dbac690', 'IMG_9675_edit.jpg', 'Lab Pola dan Jahit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-07-25 02:20:11'),
('5f1b96f22e582', 'IMG_9181_edit.jpg', 'Lab Sintik', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-07-25 02:20:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_lab`
--
ALTER TABLE `tb_lab`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
