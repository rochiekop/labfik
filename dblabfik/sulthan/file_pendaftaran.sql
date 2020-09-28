-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2020 pada 14.14
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
-- Struktur dari tabel `file_pendaftaran`
--

CREATE TABLE `file_pendaftaran` (
  `id` varchar(64) NOT NULL,
  `id_mhs` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `file` varchar(255) NOT NULL,
  `view_adminlaa` varchar(64) NOT NULL,
  `status_adminlaa` varchar(64) NOT NULL,
  `view_doswal` varchar(64) NOT NULL,
  `status_doswal` varchar(64) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `date` varchar(64) NOT NULL,
  `date_edit` varchar(64) NOT NULL,
  `jenis_pendaftaran` enum('','pendaftaran_sidang','pendaftaran_bimbingan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `file_pendaftaran`
--

INSERT INTO `file_pendaftaran` (`id`, `id_mhs`, `nama`, `file`, `view_adminlaa`, `status_adminlaa`, `view_doswal`, `status_doswal`, `komentar`, `date`, `date_edit`, `jenis_pendaftaran`) VALUES
('5f5a4a6d5e4a1', '5f3e31113e0d3', 'KSM', 'Usecase.pdf', 'Dilihat', 'Disetujui', 'Dilihat', 'Disetujui wali', '', '10-09-2020', '', 'pendaftaran_bimbingan'),
('5f5a4a6d6257c', '5f3e31113e0d3', 'Surat Pernyataan TA', 'Usecase2.pdf', 'Dilihat', 'Disetujui', 'Dilihat', 'Disetujui wali', '', '10-09-2020', '11-09-2020', 'pendaftaran_bimbingan'),
('5f5a4a6d63df9', '5f3e31113e0d3', 'Bukti Pendaftaran Test EPRT', 'as_pdf.pdf', 'Dilihat', 'Disetujui', 'Dilihat', 'Disetujui wali', '', '10-09-2020', '', 'pendaftaran_bimbingan'),
('5f5a4a6d6566f', '5f3e31113e0d3', 'Sertifikat TAK', 'Algo_GP1.pdf', 'Dilihat', 'Disetujui', 'Dilihat', 'Disetujui wali', '', '10-09-2020', '11-09-2020', 'pendaftaran_bimbingan'),
('5f5a4a6d670fb', '5f3e31113e0d3', 'Proposal TA', 'Usecase1.pdf', 'Dilihat', 'Disetujui', 'Dilihat', 'Disetujui wali', '', '10-09-2020', '', 'pendaftaran_bimbingan'),
('5f5b7d1bf39f4', '44', 'KSM', 'Algo_GP.pdf', 'Dilihat', 'Disetujui', 'Dilihat', 'Disetujui wali', '', '11-09-2020', '11-09-2020', 'pendaftaran_bimbingan'),
('5f5b7d1c0125d', '44', 'Surat Pernyataan TA', 'Usecase6.pdf', 'Dilihat', 'Disetujui', 'Dilihat', 'Disetujui wali', '', '11-09-2020', '', 'pendaftaran_bimbingan'),
('5f5b7d1c04336', '44', 'Bukti Pendaftaran Test EPRT', 'PrecipitFX1.pdf', 'Dilihat', 'Disetujui', 'Dilihat', 'Disetujui wali', '', '11-09-2020', '', 'pendaftaran_bimbingan'),
('5f5b7d1c05a84', '44', 'Sertifikat TAK', 'as_pdf2.pdf', 'Dilihat', 'Disetujui', 'Dilihat', 'Disetujui wali', '', '11-09-2020', '11-09-2020', 'pendaftaran_bimbingan'),
('5f5b7d1c071c7', '44', 'Proposal TA', 'Usecase8.pdf', 'Dilihat', 'Disetujui', 'Dilihat', 'Disetujui wali', '', '11-09-2020', '11-09-2020', 'pendaftaran_bimbingan'),
('5f5b8feb74b7d', '5f59fbbcba3ff', 'KSM', 'Usecase.pdf', 'Belum Dilihat', 'Dikirim', 'Belum Dilihat', 'Dikirim', '', '11-09-2020', '', 'pendaftaran_bimbingan'),
('5f5b8feb76678', '5f59fbbcba3ff', 'Surat Pernyataan TA', 'as_pdf.pdf', 'Belum Dilihat', 'Dikirim', 'Dilihat', 'Dikirim', '', '11-09-2020', '', 'pendaftaran_bimbingan'),
('5f5b8feb78042', '5f59fbbcba3ff', 'Bukti Pendaftaran Test EPRT', 'Algo_GP.pdf', 'Belum Dilihat', 'Dikirim', 'Belum Dilihat', 'Dikirim', '', '11-09-2020', '', 'pendaftaran_bimbingan'),
('5f5b8feb7b465', '5f59fbbcba3ff', 'Sertifikat TAK', 'PrecipitFX.pdf', 'Belum Dilihat', 'Dikirim', 'Belum Dilihat', 'Dikirim', '', '11-09-2020', '', 'pendaftaran_bimbingan'),
('5f5b8feb7cca8', '5f59fbbcba3ff', 'Proposal TA', 'Algo_GP1.pdf', 'Belum Dilihat', 'Dikirim', 'Belum Dilihat', 'Dikirim', '', '11-09-2020', '', 'pendaftaran_bimbingan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `file_pendaftaran`
--
ALTER TABLE `file_pendaftaran`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
