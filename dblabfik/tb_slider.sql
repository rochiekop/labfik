-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2020 pada 15.33
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
-- Struktur dari tabel `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL,
  `body` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_slider`
--

INSERT INTO `tb_slider` (`id`, `title`, `images`, `body`, `date`) VALUES
(5, '', 'Classroom-without-windows-Pixabay.jpg', 'Lab. FIK Sekarang Sudah Aktif!', '2020-06-19 02:33:56'),
(10, 'Fakultas Industri Kreatif V2 Edit', 'IMG_9271_edit.jpg', 'LAB FIK TEL-U', '2020-07-12 10:33:55'),
(14, 'Laboratorium Fakultas Industri Kreatif', 'IMG_9274.JPG', 'Laboratorium Fakultas Industri Kreatif', '2020-07-12 11:09:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
