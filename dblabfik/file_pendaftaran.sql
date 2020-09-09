-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Sep 2020 pada 15.32
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
  `status_adminlaa` varchar(64) NOT NULL,
  `status_doswal` varchar(64) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `date` varchar(64) NOT NULL,
  `date_edit` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `file_pendaftaran`
--

INSERT INTO `file_pendaftaran` (`id`, `id_mhs`, `nama`, `file`, `status_adminlaa`, `status_doswal`, `komentar`, `date`, `date_edit`) VALUES
('5f520e562c9d1', '5f50f84ac76e6', 'KSM', 'PENGUMUMAN_YUDISIUM_29_JULI_20202.pdf', 'Dikirim', 'Disetujui wali', '', '04-09-2020', ''),
('5f520e5649b7b', '5f50f84ac76e6', 'Surat Pernyataan TA', '3_FORM_NILAI_PEMBIMBING_LAPANGAN.pdf', 'Dikirim', 'Dikirim', '', '04-09-2020', ''),
('5f520e56560a8', '5f50f84ac76e6', 'Sertifikat EPRT', 'PENGUMUMAN_YUDISIUM_29_JULI_20203.pdf', 'Dikirim', 'Disetujui wali', '', '04-09-2020', ''),
('5f520e567cda3', '5f50f84ac76e6', 'Sertifikat TAK', 'PENGUMUMAN_YUDISIUM_29_JULI_20204.pdf', 'Dikirim', 'Disetujui wali', '', '04-09-2020', ''),
('5f520e568e1b9', '5f50f84ac76e6', 'Persetujuan Daftar TA', 'PENGUMUMAN_YUDISIUM_29_JULI_20205.pdf', 'Dikirim', 'Disetujui wali', '', '04-09-2020', ''),
('5f5233fe3afe0', '44', 'KSM', 'Usecase.pdf', 'Disetujui', 'Disetujui wali', '', '04-09-2020', ''),
('5f5233fe3e6cc', '44', 'Surat Pernyataan TA', 'Usecase2.pdf', 'Disetujui', 'Disetujui wali', '', '04-09-2020', '04-09-2020'),
('5f5233fe401f3', '44', 'Sertifikat EPRT', 'as_pdf.pdf', 'Disetujui', 'Disetujui wali', '', '04-09-2020', ''),
('5f5233fe41c06', '44', 'Sertifikat TAK', 'Algo_GP.pdf', 'Disetujui', 'Disetujui wali', '', '04-09-2020', ''),
('5f5233fe43538', '44', 'Persetujuan Daftar TA', 'Usecase1.pdf', 'Disetujui', 'Disetujui wali', '', '04-09-2020', ''),
('5f53020b93b1f', '5f3e31113e0d3', 'KSM', 'PrecipitFX1.pdf', 'Disetujui', 'Disetujui wali', '', '05-09-2020', '05-09-2020'),
('5f53020b95764', '5f3e31113e0d3', 'Surat Pernyataan TA', '737Immersion.pdf', 'Disetujui', 'Disetujui wali', '', '05-09-2020', '05-09-2020'),
('5f53020b975cf', '5f3e31113e0d3', 'Sertifikat EPRT', 'Form_Penilaian_Rochi4.pdf', 'Disetujui', 'Disetujui wali', '', '05-09-2020', ''),
('5f53020b9945d', '5f3e31113e0d3', 'Sertifikat TAK', 'Form_Penilaian_Rochi5.pdf', 'Disetujui', 'Disetujui wali', '', '05-09-2020', ''),
('5f53020b9b67c', '5f3e31113e0d3', 'Persetujuan Daftar TA', 'Form_Penilaian_Rochi6.pdf', 'Disetujui', 'Disetujui wali', '', '05-09-2020', '');

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
