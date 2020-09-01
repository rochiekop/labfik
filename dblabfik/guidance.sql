-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2020 pada 15.55
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
-- Struktur dari tabel `guidance`
--

CREATE TABLE `guidance` (
  `id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `id_mhs` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `judul_1` varchar(255) NOT NULL,
  `judul_2` varchar(255) NOT NULL,
  `judul_3` varchar(255) NOT NULL,
  `keterangan` varchar(64) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `peminatan` varchar(255) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `status_file` varchar(255) NOT NULL,
  `correction_penguji1` text CHARACTER SET utf8mb4 NOT NULL,
  `correction_penguji2` text CHARACTER SET utf8mb4 NOT NULL,
  `date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guidance`
--

INSERT INTO `guidance` (`id`, `id_mhs`, `judul_1`, `judul_2`, `judul_3`, `keterangan`, `komentar`, `peminatan`, `tahun`, `status_file`, `correction_penguji1`, `correction_penguji2`, `date`) VALUES
('5f3e32ceeb674', '5f3e31113e0d3', 'Judul Tugas Akhir', '', '', '', '', 'Desain Visual', '2020', 'Disetujui Dosen Wali', '', '', '10/02/2020'),
('5f48af1704a46', '44', 'Judul 1', 'Judul 2', 'Judul 3', '', '', 'Advertising', '2020', 'Disetujui Adminlaa', '', '', '28/08/2020'),
('5f4bc1aec1e0f', '5f4a4b0ee4b42', 'Judul Satu ', 'Judul 2', 'Judul 3', '', '', 'advertising', '2020', 'Disetujui Adminlaa', '', '', '30-08-2020');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guidance`
--
ALTER TABLE `guidance`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
