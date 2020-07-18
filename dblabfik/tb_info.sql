-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2020 pada 15.32
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

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
-- Struktur dari tabel `tb_info`
--

CREATE TABLE `tb_info` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL,
  `body` varchar(600) NOT NULL,
  `uploadby` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_info`
--

INSERT INTO `tb_info` (`id`, `title`, `images`, `body`, `uploadby`, `date`) VALUES
(11, 'Fakultas Industri Kreatif', 'fik.png', '	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium magnam nihil reprehenderit sed omnis ipsam perspiciatis impedit, quasi voluptas nobis eligendi corporis deserunt aliquid.', '', '2020-07-08 00:00:00'),
(14, 'Fakultas Industri Kreatif', '50027080802_bbb3236058_c.jpg', 'adsad', '', '2020-07-08 00:00:00'),
(16, 'Fakultas Industri Kreatif', 'Classroom-without-windows-Pixabay.jpg', 'dad', '', '2020-07-08 00:00:00'),
(17, 'Fakultas Industri Kreatif', 'Classroom-without-windows-Pixabay1.jpg', 'fsdf', '', '2020-07-08 00:00:00'),
(19, 'Fakultas Industri Kreatif', 'Classroom-without-windows-Pixabay3.jpg', 'fsdd', 'Kaurlab', '2020-07-08 00:00:00'),
(20, 'Fakultas Industri Kreatif', 'Classroom-without-windows-Pixabay4.jpg', 'fsd', 'Kaurlab', '2020-07-08 00:00:00'),
(27, 'Informasi 12', 'Classroom-without-windows-Pixabay2.jpg', 'Test', 'Admin', '2020-07-08 00:00:00'),
(28, 'Informasi 13', 'Classroom-without-windows-Pixabay5.jpg', 'Test', 'Admin', '2020-07-08 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
