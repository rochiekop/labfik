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
-- Struktur dari tabel `tb_lab`
--

CREATE TABLE `tb_lab` (
  `id` int(11) NOT NULL,
  `images` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lab`
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
-- Indeks untuk tabel `tb_lab`
--
ALTER TABLE `tb_lab`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_lab`
--
ALTER TABLE `tb_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
