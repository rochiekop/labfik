-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2020 pada 06.30
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
  `keterangan` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `thesis`
--

INSERT INTO `thesis` (`id`, `id_guidance`, `send_to`, `pdf_file`, `keterangan`, `date`, `status`) VALUES
('123', '5f299fa2c3429', 'Semua', 'Tatul_IF1_Tugas3_Muhammad_Sulthan_Angka_Kurniawan_13011746601.pdf', 'upload terbaru', '2020-08-10', 'Dikirim'),
('5f29c93c10807', '5f299fa2c3429', '', 'Matplotlib_CheatSheet.pdf', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum autem debitis temporibus dolores blanditiis iste aliquid voluptas', '2020-08-05', 'Selesai'),
('5f2a6ad1f0ae7', '5f299fa2c3429', 'Semua', 'Algo_GP.pdf', 'Bab 2 Latar Belakang', '2020-08-05', 'Selesai'),
('5f2c12f45cc84', '5f2abc71e4f34', 'Semua', 'Algo_GP.pdf', 'BAB I ', '2020-08-06', 'Selesai'),
('test', '5f299fa2c3429', 'Semua', 'Tatul_IF1_Tugas3_Muhammad_Sulthan_Angka_Kurniawan_1301174660.pdf', 'tata tulis ilmiah', '2020-08-10', 'Selesai');

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
