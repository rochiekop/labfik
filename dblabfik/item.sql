-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2020 pada 16.35
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
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `quantity` int(255) NOT NULL,
  `access` enum('Semua','Dosen','Mahasiswa') CHARACTER SET utf8mb4 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id`, `name`, `quantity`, `access`, `image`, `description`) VALUES
('5f12ccfe4afe8', '403 gambar', 10, 'Semua', '5f12ccfe4afe8.PNG', 'test'),
('5f12cd6abdba2', 'test', 4, 'Dosen', '5f12cd6abdba2.PNG', 'test'),
('5f12cdf2debfe', 'test', 4, 'Mahasiswa', '5f12cdf2debfe.PNG', 'test'),
('5f12ce7d3da21', 'coba', 6, 'Dosen', '5f12ce7d3da21.PNG', 'test');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
