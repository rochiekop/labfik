-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2020 pada 18.04
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
-- Struktur dari tabel `thesis`
--

CREATE TABLE `thesis` (
  `id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `id_guidance` varchar(64) NOT NULL,
  `send_to` varchar(64) NOT NULL,
  `pdf_file` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `link_project` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `keterangan` text NOT NULL,
  `date` date NOT NULL,
  `correction1` text CHARACTER SET utf8mb4 NOT NULL,
  `correction2` text CHARACTER SET utf8mb4 NOT NULL,
  `status` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `thesis`
--

INSERT INTO `thesis` (`id`, `id_guidance`, `send_to`, `pdf_file`, `link_project`, `keterangan`, `date`, `correction1`, `correction2`, `status`) VALUES
('5f4faf4dadfc8', '5f48af1704a46', 'Semua', 'KHS_Muhammad_Sulthan_Angka_Kurniawan.pdf, SL_Muhammad_Sulthan_Angka_Kurniawan.pdf', 'https://drive.google.com/drive/folders/1ENw4czEKpJsCaxr7_4UccZgBxAkiHLm6?usp=sharing', 'testing link sending', '2020-09-02', '', '', 'Dikirim');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `thesis`
--
ALTER TABLE `thesis`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
