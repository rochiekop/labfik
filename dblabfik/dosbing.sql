-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2020 pada 09.07
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
-- Struktur dari tabel `dosbing`
--

CREATE TABLE `dosbing` (
  `id` varchar(64) NOT NULL,
  `id_dosen` varchar(64) NOT NULL,
  `id_guidance` varchar(64) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosbing`
--

INSERT INTO `dosbing` (`id`, `id_dosen`, `id_guidance`, `date`, `status`) VALUES
('5f31097c32abc', '5f1e7dc5ca07e', '5f310973f0bda', '2020-08-10 15:46:52', 'Sudah Disetujui'),
('5f310980bdbd7', '5f28dbe13ddf9', '5f310973f0bda', '2020-08-10 15:46:56', 'Sudah Disetujui'),
('5f3beda15ad96', '5f1e7dc5ca07e', '5f299fa2c3429', '2020-08-18 22:02:57', 'Sudah Disetujui'),
('5f3beda543dff', '5f28dbe13ddf9', '5f299fa2c3429', '2020-08-18 22:03:01', 'Sudah Disetujui');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosbing`
--
ALTER TABLE `dosbing`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
