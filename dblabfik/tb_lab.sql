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
-- Table structure for table `tb_lab`
--

CREATE TABLE `tb_lab` (
  `id` varchar(64) NOT NULL,
  `images` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lab`
--

INSERT INTO `tb_lab` (`id`, `images`, `title`, `slug`, `body`, `date`) VALUES
('5f1b8caf058b4', 'IMG_9534_edit1.jpg', 'Lab. Batik', 'lab-batik', 'Lab Batik merupakan sarana maupun tempat yang memfasilitasi pembuatan sebuah batik. Proses pembuatan dari awal hingga akhir hingga terciptanya sebuah kain batik yang cantik. Selain pembuatan batik, Lab batik juga berfungsi sebagai tempat penelitian maupun kegiatan-kegiatan abdimas.', '2020-07-25 01:36:47'),
('5f1b93c2bdb1f', 'IMG_92741.JPG', 'Lab. CGI', 'lab-cgi', 'Lab Computer Generated Imagery (CGI) merupakan salah satu sarana fasilitas yang memiliki software-software standar industri terkini untuk mendukung mahasiswanya mengerjakan proyek-proyek berkaitan dengan CGI dengan lancar.', '2020-07-25 02:06:58'),
('5f1b95d912037', 'IMG_9189_edit1.jpg', 'Lab. Mac', 'lab-mac', 'Lab Mac merupakan satu dari beberapa lab komputer berbasis sistem operating Macintosh dengan kapasitas yang bisa mendukung sampai dengan 25 mahasiswa dalam proses belajar mengajar. Lab ini juga dilengkapi dengan software-software pendukung terkini yang dapat diakses secara mudah oleh mahasiswanya.', '2020-07-25 02:15:53'),
('5f1b960077560', 'IMG_93141.JPG', 'Lab. Bengkel', 'lab-bengkel', 'Lab Bengkel adalah salah satu lab yang berada di FIK yang dilengkapi dengan beberapa peralatan seperti: Mesin table saw, mesin gerinda, mesin bubut kayu, mesin amplas, bench drilling dan lain-lain untuk mendukung mahasiswa dalam mengerjakan pekerjaan pendekatan experimental pada Kuliah Kerja \r\nStudio, Proyek Akhir maupun tesis.', '2020-07-25 02:16:32'),
('5f1b9649ea263', 'IMG_9166_edit1.jpg', 'Lab. Multimedia', 'lab-multimedia', 'Lab Multimedia dirancang untuk memfasilitasi mahasiswanya dalam mengerjakan pekerjaan multimedia dengan lancar. Fasilitas yang mendukung seperti software terkini memudahkan mahasiswanya untuk menjangkau software-software yang digunakan pada industri kreatif yang ada.', '2020-07-25 02:17:45'),
('5f1b96dbac690', 'IMG_9675_edit1.jpg', 'Lab. Pola dan Jahit', 'lab-pola-dan-jahit', 'Lab Pola dan Jahit dirancang dengan space yang cukup besar agar mahasiswa dapat dengan leluasa menggunakan sarana untuk tempat menjahit dan membuat pola.', '2020-07-25 02:20:11'),
('5f1ce025887f9', 'IMG_9181_edit.jpg', 'Lab. Cintiq', 'lab-cintiq', 'Lab Komputer Multimedia Cintiq merupakan salah satu dari beberapa lab yang memiliki alat canggih untuk mendukung menggambar secara digital maupun membuat animasi. Dilengkapi dengan Wacom Cintiq disetiap mejanya, Lab ini bisa menampung kurang lebih 25 mahasiswa. ', '2020-07-26 01:45:09');

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
