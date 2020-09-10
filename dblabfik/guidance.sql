-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Sep 2020 pada 18.33
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
  `date` varchar(64) NOT NULL,
  `kelayakan` varchar(255) NOT NULL,
  `penilaian_pembimbing1` text CHARACTER SET utf8mb4 NOT NULL,
  `nilai_pembimbing1` varchar(255) NOT NULL DEFAULT ',,,,,,,',
  `penilaian_pembimbing2` text CHARACTER SET utf8mb4 NOT NULL,
  `nilai_pembimbing2` varchar(255) NOT NULL DEFAULT ',,,,,,,',
  `penilaian_penguji1` text CHARACTER SET utf8mb4 NOT NULL,
  `nilai_penguji1` varchar(255) NOT NULL,
  `penilaian_penguji2` text CHARACTER SET utf8mb4 NOT NULL,
  `nilai_penguji2` varchar(255) NOT NULL,
  `status_preview` enum('','preview1','preview2','preview3','sidang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guidance`
--

INSERT INTO `guidance` (`id`, `id_mhs`, `judul_1`, `judul_2`, `judul_3`, `keterangan`, `komentar`, `peminatan`, `tahun`, `status_file`, `date`, `kelayakan`, `penilaian_pembimbing1`, `nilai_pembimbing1`, `penilaian_pembimbing2`, `nilai_pembimbing2`, `penilaian_penguji1`, `nilai_penguji1`, `penilaian_penguji2`, `nilai_penguji2`, `status_preview`) VALUES
('5f520e560ea97', '5f50f84ac76e6', 'Recommender sistem menggunakan PHP', '', '', '', '', 'Fotografi Dasar dan Periklanan', '2020', 'Dikirim', '04-09-2020', '', '', '0', '', '0', '', '0', '', '0', ''),
('5f5233fe39202', '44', 'Judul Satu ', 'Judul Dua', '', '', '', 'Fotografi Dasar dan Periklanan', '2020', 'Disetujui Adminlaa', '04-09-2020', 'kesesuaian,ketepatan,kaidah', '<p>uji coba ketiga testing 123</p>', '20,,10,,,5,,7', '<p>uji coba ketiga testing 123</p>', '20,,10,,,5,,7', '', '0', '', '0', 'preview2'),
('5f53020b9177f', '5f3e31113e0d3', 'Judul Satu ', '', '', '', '', '', '2020', 'Disetujui Adminlaa', '05-09-2020', '', '', '0', '', '0', '', '0', '', '0', '');

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
