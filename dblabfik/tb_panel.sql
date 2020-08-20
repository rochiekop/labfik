-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 06:47 AM
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
-- Table structure for table `tb_panel`
--

CREATE TABLE `tb_panel` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `video` varchar(500) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_panel`
--

INSERT INTO `tb_panel` (`id`, `title`, `slug`, `body`, `video`, `thumb`, `date_create`) VALUES
(99, 'Laboratorium, Studio & Bengkel Fakultas Industri Kreatif', 'laboratorium-studio-bengkel-fakultas-industri-kreatif', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid cum error quo eligendi doloremque molestias placeat animi a harum, optio fugit blanditiis! Incidunt sequi velit harum sapiente sed nemo ipsa.', 'Aimer_『ONE』Short_Ver.（_Aimer_5th_album『Sun_Dance』『Penny_Rain』2019_04_10（水）2枚同時発売）.mp4', 'thumbnail_panel.jpg', '2020-07-28 13:33:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_panel`
--
ALTER TABLE `tb_panel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_panel`
--
ALTER TABLE `tb_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
