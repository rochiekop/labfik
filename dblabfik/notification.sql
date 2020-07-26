-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2020 pada 07.34
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
-- Struktur dari tabel `notification`
--

CREATE TABLE `notification` (
  `id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `booking_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `borrowing_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `gallery_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `chat_id` varchar(64) NOT NULL,
  `news_id` varchar(64) NOT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('unread','read') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `booking_id`, `borrowing_id`, `gallery_id`, `chat_id`, `news_id`, `description`, `date`, `status`) VALUES
('5f1bf8e4eb5f7', '8', '', '5f1bf8d8bab13', '', '', '', 'Barang ini ingin dipinjam', '2020-07-25 16:18:28', 'unread'),
('5f1bfdaf84112', '8', '', '5f1bfd6a62938', '', '', '', 'Barang ini ingin dipinjam', '2020-07-25 16:38:55', 'unread'),
('5f1bfdbb64865', '8', '', '5f1bfdb21fa56', '', '', '', 'Barang ini ingin dipinjam', '2020-07-25 16:39:07', 'unread'),
('5f1bfdc7889f1', '8', '', '5f1bfdbdd618c', '', '', '', 'Barang ini ingin dipinjam', '2020-07-25 16:39:19', 'unread');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
