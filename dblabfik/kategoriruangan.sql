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
-- Struktur dari tabel `kategoriruangan`
--

CREATE TABLE `kategoriruangan` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategoriruangan`
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

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategoriruangan`
--
ALTER TABLE `kategoriruangan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategoriruangan`
--
ALTER TABLE `kategoriruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
