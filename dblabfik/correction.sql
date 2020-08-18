-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2020 pada 06.31
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
-- Struktur dari tabel `correction`
--

CREATE TABLE `correction` (
  `id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `thesis_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `page` int(11) NOT NULL,
  `correction` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `correction`
--

INSERT INTO `correction` (`id`, `thesis_id`, `page`, `correction`) VALUES
('5f37a398cbf2e', 'test', 1, 'testing correction'),
('5f37b41e9616b', 'test', 2, 'correction 2'),
('5f38f6c5cbd94', 'test', 3, 'correction 3'),
('5f38f6d2ae0ea', 'test', 4, 'correction 4'),
('5f38f6d2d325c', 'test', 5, 'correction 5'),
('5f38f6d304091', 'test', 6, 'correction 6'),
('5f38f6d3246e8', 'test', 7, 'correction 7'),
('5f38f6d34c409', 'test', 8, 'correction 8');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `correction`
--
ALTER TABLE `correction`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
