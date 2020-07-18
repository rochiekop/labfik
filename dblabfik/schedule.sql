-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2020 pada 16.55
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
-- Database: `chat_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` varchar(64) NOT NULL,
  `06:30-07:30` varchar(255) NOT NULL,
  `07:30-08:30` varchar(255) NOT NULL,
  `08:30-09:30` varchar(255) NOT NULL,
  `09:30-10-30` varchar(255) NOT NULL,
  `10:30-11:30` varchar(255) NOT NULL,
  `11:30-12.30` varchar(255) NOT NULL,
  `12:30-13:30` varchar(255) NOT NULL,
  `13:30-14:30` varchar(255) NOT NULL,
  `14:30-15:30` varchar(255) NOT NULL,
  `15:30-16:30` varchar(255) NOT NULL,
  `16:30-17:30` varchar(255) NOT NULL,
  `17:30-18:30` varchar(255) NOT NULL,
  `18:30-19:30` varchar(255) NOT NULL,
  `19:30-20:30` varchar(255) NOT NULL,
  `20:30-21:30` varchar(255) NOT NULL,
  `21:30-22:30` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
