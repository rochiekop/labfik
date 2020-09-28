-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2020 pada 17.56
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
  `id_offline` varchar(64) NOT NULL,
  `id_online` varchar(64) NOT NULL,
  `dosen_pembimbing1` varchar(128) NOT NULL,
  `dosen_pembimbing2` varchar(128) NOT NULL,
  `dosen_penguji1` varchar(128) NOT NULL,
  `dosen_penguji2` varchar(128) NOT NULL,
  `dosen_penguji3` varchar(128) NOT NULL,
  `date` varchar(64) NOT NULL,
  `date_edit` varchar(64) NOT NULL,
  `kelompok_keahlian` varchar(64) NOT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `thesis_lecturers`
--

INSERT INTO `thesis_lecturers` (`id`, `id_guidance`, `id_offline`, `id_online`, `dosen_pembimbing1`, `dosen_pembimbing2`, `dosen_penguji1`, `dosen_penguji2`, `dosen_penguji3`, `date`, `date_edit`, `kelompok_keahlian`, `status`) VALUES
('5f71fc7bb49d3', '5f71fbc8bc8d9', '', '', '5f28dbe13ddf9', '5f50f84ac76e6', '5f2128a43c90b', '5f3b9697e3aa5', '', '09-28-2020 22:08:43', '', 'Inlive', 'preview 2');

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
