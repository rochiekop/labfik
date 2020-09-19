-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Sep 2020 pada 16.15
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
-- Struktur dari tabel `thesis_lecturers`
--

CREATE TABLE `thesis_lecturers` (
  `id` varchar(64) NOT NULL,
  `id_guidance` varchar(64) NOT NULL,
  `dosen_pembimbing1` varchar(128) NOT NULL,
  `dosen_pembimbing2` varchar(128) NOT NULL,
  `dosen_penguji1` varchar(128) NOT NULL,
  `dosen_penguji2` varchar(128) NOT NULL,
  `date` varchar(64) NOT NULL,
  `date_edit` varchar(64) NOT NULL,
  `kelompok_keahlian` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `thesis_lecturers`
--

INSERT INTO `thesis_lecturers` (`id`, `id_guidance`, `dosen_pembimbing1`, `dosen_pembimbing2`, `dosen_penguji1`, `dosen_penguji2`, `date`, `date_edit`, `kelompok_keahlian`) VALUES
('5f4cc58d499f5', '5f48af1704a46', '5f1e7dc5ca07e', '5f2128a43c90b', '5f28dbe13ddf9', '5f3b9697e3aa5', '08-31-2020 16:40:29', '', ''),
('5f525822a2861', '5f5233fe39202', '5f1e7dc5ca07e', '5f3b9697e3aa5', '5f2128a43c90b', '5f28dbe13ddf9', '09-04-2020 22:07:14', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `thesis_lecturers`
--
ALTER TABLE `thesis_lecturers`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
