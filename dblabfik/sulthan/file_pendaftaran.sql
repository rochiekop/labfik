-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Okt 2020 pada 04.04
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
  `poin` int(64) NOT NULL,
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

INSERT INTO `file_pendaftaran` (`id`, `id_mhs`, `nama`, `file`, `poin`, `view_adminlaa`, `status_adminlaa`, `view_doswal`, `status_doswal`, `komentar`, `date`, `date_edit`, `jenis_pendaftaran`) VALUES
('5f71fbc8d3229', '44', 'KSM', 'Business_Meeting_Script_Sultan_Aldi_Fikhri_Annisa_Iklima1.pdf', 0, 'Dilihat', 'Disetujui', 'Dilihat', 'Disetujui wali', '', '28-09-2020', '', 'pendaftaran_bimbingan'),
('5f71fbc8dbc0c', '44', 'Surat Pernyataan TA', 'Business_Meeting_Script_Group3_Sultan,_Aldi,_Fikhri,_Annisa,_Iklima1.pdf', 0, 'Dilihat', 'Disetujui', 'Dilihat', 'Disetujui wali', '', '28-09-2020', '', 'pendaftaran_bimbingan'),
('5f71fbc8e7b7e', '44', 'Bukti Pendaftaran Test EPRT', 'Business_model_canvas1.pdf', 0, 'Dilihat', 'Disetujui', 'Dilihat', 'Disetujui wali', '', '28-09-2020', '', 'pendaftaran_bimbingan'),
('5f71fbc907c67', '44', 'Sertifikat TAK', 'CV_Muhammad_Sulthan_Angka_Kurniawan1.pdf', 0, 'Dilihat', 'Disetujui', 'Dilihat', 'Disetujui wali', '', '28-09-2020', '', 'pendaftaran_bimbingan'),
('5f71fbc91ba73', '44', 'Proposal TA', 'EPrt_Muhammad_Sulthan_Angka_Kurniawan1.PDF', 0, 'Dilihat', 'Disetujui', 'Dilihat', 'Disetujui wali', '', '28-09-2020', '', 'pendaftaran_bimbingan');

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
