-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 06:40 AM
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
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoriruangan`
--

INSERT INTO `kategoriruangan` (`id`, `kategori`, `date_created`) VALUES
(1, 'Lab Macintosh', '2020-07-16 12:47:58'),
(2, 'Lab Cintiq', '2020-07-16 12:47:58'),
(3, 'Lab Batik', '2020-07-16 12:47:58'),
(4, 'Lab Lukis', '2020-07-16 12:47:58'),
(5, 'Lab Sablon', '2020-07-16 12:47:58'),
(6, 'Lab Multimedia', '2020-07-16 12:47:58'),
(7, 'Lab Pola dan Jahit', '2020-07-16 12:47:58'),
(8, 'Studio Musik', '2020-07-16 12:47:58'),
(9, 'Studio Fotografi', '2020-07-16 12:47:58'),
(10, 'Studio Videografi', '2020-07-16 12:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `ruangan` varchar(255) NOT NULL,
  `akses` varchar(100) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `id_kategori`, `ruangan`, `akses`, `images`) VALUES
(1, 2, 'IK.01.02', 'Mahasiswa', '8.jpg'),
(4, 9, 'IK.01.01', 'Dosen,Mahasiswa', 'default.jpg'),
(5, 4, 'IK.01.05', 'Mahasiswa', '81.jpg'),
(6, 3, 'IK.02.04', 'Dosen,Mahasiswa', '12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_info`
--

CREATE TABLE `tb_info` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `uploadby` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_info`
--

INSERT INTO `tb_info` (`id`, `title`, `images`, `body`, `uploadby`, `date`) VALUES
(11, 'Fakultas Industri Kreatif', 'fik.png', '	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium magnam nihil reprehenderit sed omnis ipsam perspiciatis impedit, quasi voluptas nobis eligendi corporis deserunt aliquid.', '', '2020-07-08'),
(14, 'Fakultas Industri Kreatif', '50027080802_bbb3236058_c.jpg', 'adsad', '', '2020-07-08'),
(16, 'Fakultas Industri Kreatif', 'Classroom-without-windows-Pixabay.jpg', 'dad', '', '2020-07-08'),
(17, 'Fakultas Industri Kreatif', 'Classroom-without-windows-Pixabay1.jpg', 'fsdf', '', '2020-07-08'),
(19, 'Fakultas Industri Kreatif', 'Classroom-without-windows-Pixabay3.jpg', 'fsdd', 'Kaurlab', '2020-07-08'),
(20, 'Fakultas Industri Kreatif', 'Classroom-without-windows-Pixabay4.jpg', 'fsd', 'Kaurlab', '2020-07-08'),
(27, 'Informasi 12', 'Classroom-without-windows-Pixabay2.jpg', 'Test', 'Admin', '2020-07-08'),
(28, 'Informasi 13', 'Classroom-without-windows-Pixabay5.jpg', 'Test', 'Admin', '2020-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL,
  `body` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`id`, `title`, `images`, `body`, `date`) VALUES
(5, '', 'Classroom-without-windows-Pixabay.jpg', 'Lab. FIK Sekarang Sudah Aktif!', '2020-06-19 02:33:56'),
(10, 'Fakultas Industri Kreatif V2 Edit', 'IMG_9271_edit.jpg', 'LAB FIK TEL-U', '2020-07-12 10:33:55'),
(14, 'Laboratorium Fakultas Industri Kreatif', 'IMG_9274.JPG', 'Laboratorium Fakultas Industri Kreatif', '2020-07-12 11:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `images` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `email`, `images`, `password`, `salt`, `role_id`, `is_active`, `date_created`) VALUES
(8, 'admin', 'John Doe', 'admin@gmail.com', 'default.jpg', 'ec54193c7b13f115a35da3282d74a295af9a72ca8f8a5ebd9655dbf8eadd8a02', '$2y$10$jb3uBvvS41mfsMHU4xaICul08WsrJzMyLpiIVT9bpx06CQQ/vmNle', 1, 1, 0),
(38, 'rochieko', 'Rochi Eko Pambudi', 'snowm60401@gmail.com', 'default.jpg', 'a4dd82e95096136291c033406a6b25f598b0eb0e0444b554706b926690bbc16f', '$2y$10$zBadfaR3yj3UEYWGaFLafOUv5uP6UkMBy691b9a54fjBhKDFQ8G7q', 3, 1, 1594543149),
(39, 'kaurlab', 'Kaur Lab ', 'kaurlab@gmail.com', 'default.jpg', '920c3713e13b091e73d17d35bd608079fc41724eca41b415f200e338dc59c531', '$2y$10$hctmRhwo9qxeJTvtzbn/kObWapiE8JSPX6jO72QAbp1HJfe4QBwEi', 2, 1, 1594554238),
(44, 'jhondoe', 'Jhon Doe Version 2', 'snowm6040@gmail.com', 'default.jpg', 'e41e13ea4344a5dab62674d6e08a24b75bf0d5bd7921c04c2a13fc80a6eda0e3', '$2y$10$sGYdQGJYGX9nCIDzkWoH3uibGxPC292Bf9nhIgO/TSkLz3Q3Sp1jO', 4, 1, 1594832402);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Kepala Urusan'),
(3, 'Dosen'),
(4, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategoriruangan`
--
ALTER TABLE `kategoriruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategoriruangan`
--
ALTER TABLE `kategoriruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
