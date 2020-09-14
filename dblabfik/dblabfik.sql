-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Sep 2020 pada 20.54
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
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` varchar(64) NOT NULL,
  `id_peminjam` varchar(64) NOT NULL,
  `id_ruangan` varchar(64) NOT NULL,
  `date` date NOT NULL,
  `date_declined` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `id_peminjam`, `id_ruangan`, `date`, `date_declined`, `time`, `keterangan`, `status`, `date_created`) VALUES
('5f1a463028b0b', '44', '5f15e3276fe2b', '0000-00-00', '2020-07-24', '07.30 - 08.30', 'Kelas Pengganti', 'Ditolak', '2020-07-25 18:37:26'),
('5f1a467fec338', '44', '5f15e3276fe2b', '0000-00-00', '2020-07-24', '08.30 - 09.30, 09.30 - 10.30', 'Testing', 'Ditolak', '2020-07-25 18:37:26'),
('5f1a5673a36e5', '44', '5f15e3276fe2b', '0000-00-00', '2020-07-24', '14.30 - 15.30, 15.30 - 16.30, 16.30 - 17.30', 'Testing', 'Ditolak', '2020-07-25 18:37:26'),
('5f1a5d8261d27', '44', '5f15e3276fe2b', '0000-00-00', '2020-07-24', '12.30 - 13.30, 13.30 - 14.30', 'kelas', 'Ditolak', '2020-07-25 18:37:26'),
('5f1a5dfe86920', '44', '5f15e3276fe2b', '2020-07-23', '0000-00-00', '06.30 - 07.30, 07.30 - 08.30', 'kelas', 'Diterima', '2020-07-25 18:37:26'),
('5f1d2a87278ce', '44', '1', '0000-00-00', '2020-07-26', '13.30 - 14.30, 14.30 - 15.30, 15.30 - 16.30', 'Testing for schedule', 'Ditolak', '2020-07-26 14:02:31'),
('5f3a1b68280f7', '5f2930fa9e732', '5f15e3276fe2b', '2020-08-18', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30, 10.30 - 11.30', 'Test', 'Menunggu Acc', '2020-08-17 12:53:44'),
('5f3a214417bb0', '44', '10', '2020-08-23', '0000-00-00', '09.30 - 10.30', 'For testing', 'Menunggu Acc', '2020-08-17 13:18:44'),
('5f3b8c86794c1', '5f1e7dc5ca07e', '4', '2020-08-20', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30', 'Kelas pengganti', 'Menunggu Acc', '2020-08-18 15:08:38'),
('5f3fa05b29587', '5f28dbe13ddf9', '6', '2020-08-22', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30', 'Kelas', 'Diterima', '2020-08-21 17:22:19'),
('5f3fa0b3621e9', '5f3e31113e0d3', '17', '2020-08-22', '0000-00-00', '07.30 - 08.30, 08.30 - 09.30', 'Kelas pengganti', 'Diterima', '2020-08-21 17:23:47'),
('5f3fa6492b7a4', '5f1e7dc5ca07e', '5f3e34922ed65', '0000-00-00', '2020-08-22', '08.30 - 09.30, 09.30 - 10.30, 11.30 - 12.30, 12.30 - 13.30', 'Test', 'Ditolak', '2020-08-21 17:47:37'),
('5f3fd793b26b1', '5f1e7dc5ca07e', '17', '2020-08-22', '0000-00-00', '10.30 - 11.30, 11.30 - 12.30', 'Kelas pengganti', 'Diterima', '2020-08-21 21:17:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `borrowing`
--

CREATE TABLE `borrowing` (
  `id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `item_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `quantity` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `reason` text CHARACTER SET utf8mb4 NOT NULL,
  `status` enum('Menunggu_Izin','Diterima','Ditolak','Selesai') CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `borrowing`
--

INSERT INTO `borrowing` (`id`, `user_id`, `item_id`, `quantity`, `start`, `end`, `reason`, `status`) VALUES
('5f144770c3d1f', '38', '5f12ce7d3da21', 1, '2020-07-19 20:15:00', '2020-07-19 21:16:00', 'muhammad sulthan', 'Diterima'),
('5f144781517af', '38', '5f12cdf2debfe', 1, '2020-07-20 20:15:00', '2020-07-20 21:16:00', 'talisha eta', 'Diterima'),
('5f1448e35a109', '8', '5f12ccfe4afe8', 1, '2020-07-19 20:21:00', '2020-07-19 21:21:00', 'coba pinjam', 'Diterima'),
('5f1448f6a10c3', '8', '5f12cd6abdba2', 1, '2020-07-19 23:21:00', '2020-07-20 01:21:00', 'pinjam yang ini juga', 'Diterima'),
('5f147de8b1006', '8', '5f12ccfe4afe8', 1, '2020-07-20 00:07:00', '2020-07-21 00:07:00', 'untuk uji coba', 'Ditolak'),
('5f150944e9609', '8', '5f12ccfe4afe8', 1, '2020-07-20 12:02:00', '2020-07-20 13:02:00', 'testing', 'Diterima'),
('5f150c74adc88', '8', '5f12ce7d3da21', 1, '2020-07-20 10:15:00', '2020-07-20 11:16:00', 'untuk kelas', 'Diterima'),
('5f1513bc63bfb', '38', '5f12ce7d3da21', 1, '2020-07-20 10:46:00', '2020-07-20 11:47:00', 'untuk kelas', 'Diterima'),
('5f1be6c8ac198', '8', '5f12ccfe4afe8', 1, '2020-07-25 15:01:00', '2020-07-25 16:01:00', 'testing notifikasi', 'Diterima'),
('5f1be80d5cc11', '8', '5f12ccfe4afe8', 1, '2020-07-25 15:06:00', '2020-07-25 16:06:00', 'test notifikasi', 'Ditolak'),
('5f1be87feef78', '8', '5f12ccfe4afe8', 1, '2020-07-25 15:08:00', '2020-07-25 16:08:00', 'test notifikasi peminjaman barang', 'Ditolak'),
('5f1be918cc49f', '8', '5f12ccfe4afe8', 1, '2020-07-25 15:11:00', '2020-07-25 16:11:00', 'test peminjaman barang', 'Ditolak'),
('5f1e7dfa80b9d', '5f1e7dc5ca07e', '5f12ce7d3da21', 1, '2020-07-02 14:10:00', '2020-07-03 14:10:00', 'kelas', 'Diterima'),
('5f1e8016bf045', '5f1e7dc5ca07e', '5f12ccfe4afe8', 1, '2020-07-27 14:19:00', '2020-07-27 15:20:00', 'test notifikasi', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `sender_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `receiver_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `message` text CHARACTER SET utf8mb4 NOT NULL,
  `attachment_name` text CHARACTER SET utf8mb4 NOT NULL,
  `file_ext` text CHARACTER SET utf8mb4 NOT NULL,
  `mime_type` text CHARACTER SET utf8mb4 NOT NULL,
  `message_date_time` text CHARACTER SET utf8mb4 NOT NULL,
  `ip_address` text CHARACTER SET utf8mb4 NOT NULL,
  `status` enum('unread','read') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `receiver_id`, `message`, `attachment_name`, `file_ext`, `mime_type`, `message_date_time`, `ip_address`, `status`) VALUES
('5f219ceaa4e1e', '8', '5f2128a43c90b', 'test', '', '', '', '2020-07-29 22:59:38', '', 'read'),
('5f219ceec444d', '8', '5f2128a43c90b', 'assalamualaikum', '', '', '', '2020-07-29 22:59:42', '', 'read'),
('5f219cf5015e4', '8', '5f2128a43c90b', 'testing count unread messages', '', '', '', '2020-07-29 22:59:49', '', 'read'),
('5f21ad2d1abb3', '5f2128a43c90b', '8', 'yup', '', '', '', '2020-07-30 00:09:01', '', 'read'),
('5f21b1e39634d', '5f2128a43c90b', '8', 'test', '', '', '', '2020-07-30 00:29:07', '', 'read'),
('5f21babf33b7a', '8', '39', 'test', '', '', '', '2020-07-30 01:06:55', '', 'read'),
('5f2278b77b772', '5f1e7dc5ca07e', '8', 'NULL', 'images_(3).jpeg', '.jpeg', 'image/jpeg', '2020-07-30 14:37:27', '', 'read'),
('5f2540a49712c', '5f1e7dc5ca07e', '8', 'test', '', '', '', '2020-08-01 17:15:00', '', 'read'),
('5f26d9f1cc7e7', '8', '38', 'test', '', '', '', '2020-08-02 22:21:21', '', 'unread'),
('5f26d9f453397', '8', '38', 'hi chi', '', '', '', '2020-08-02 22:21:24', '', 'unread'),
('5f26d9fc7e4e9', '8', '38', 'masuk enggak?', '', '', '', '2020-08-02 22:21:32', '', 'unread'),
('5f26f09d1b55d', '8', '39', 'test', '', '', '', '2020-08-02 23:58:05', '', 'read'),
('5f27c5d99ee2b', '8', '39', 'test', '', '', '', '2020-08-03 15:07:53', '', 'read'),
('5f27c5da46b1a', '8', '39', '1', '', '', '', '2020-08-03 15:07:54', '', 'read'),
('5f27c5da88f87', '8', '39', '2', '', '', '', '2020-08-03 15:07:54', '', 'read'),
('5f27c5dad4aaa', '8', '39', '3', '', '', '', '2020-08-03 15:07:54', '', 'read'),
('5f27c5db244e3', '8', '39', '4', '', '', '', '2020-08-03 15:07:55', '', 'read'),
('5f27c5db6ba54', '8', '39', '5', '', '', '', '2020-08-03 15:07:55', '', 'read'),
('5f27c5dbaaf69', '8', '39', '6', '', '', '', '2020-08-03 15:07:55', '', 'read'),
('5f27c5dbd045b', '8', '39', '45', '', '', '', '2020-08-03 15:07:55', '', 'read'),
('5f27c5dc05aba', '8', '39', '4', '', '', '', '2020-08-03 15:07:56', '', 'read'),
('5f27c630e7f32', '39', '8', 'test', '', '', '', '2020-08-03 15:09:20', '', 'read'),
('5f27c9c7e948c', '8', '39', 'halo', '', '', '', '2020-08-03 15:24:39', '', 'unread'),
('5f27c9ca279f1', '8', '39', 'wow bisa', '', '', '', '2020-08-03 15:24:42', '', 'unread'),
('5f27cd4b5960b', '5f1e7dc5ca07e', '8', 'hi admin', '', '', '', '2020-08-03 15:39:39', '', 'read'),
('5f27cd5881d65', '5f1e7dc5ca07e', '8', 'ini chat dari mobile lhoo', '', '', '', '2020-08-03 15:39:52', '', 'read'),
('5f301cbc8a802', '5f2128a43c90b', '8', 'NULL', '3.jpg', '.jpg', 'image/jpeg', '2020-08-09 22:56:44', '', 'unread'),
('5f5f41dbdc2a8', '5f1e7dc5ca07e', '5f3b9a05d0280', 'test', '', '', '', '2020-09-14 17:11:39', '', 'unread'),
('5f5f41e1d5385', '5f1e7dc5ca07e', '5f3b9a05d0280', 'NULL', '31194.jpg', '.jpg', 'image/jpeg', '2020-09-14 17:11:45', '', 'unread');

-- --------------------------------------------------------

--
-- Struktur dari tabel `child_kategori`
--

CREATE TABLE `child_kategori` (
  `id_ck` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_child` varchar(128) NOT NULL,
  `post_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `child_kategori`
--

INSERT INTO `child_kategori` (`id_ck`, `id_kategori`, `nama_child`, `post_update`) VALUES
(1, 1, 'Fotografi Dasar dan Periklanan', '2020-07-09 11:46:58'),
(2, 1, 'tata busana', '2020-07-11 23:49:58'),
(4, 1, 'Semantika Produk', '2020-07-18 14:44:17');

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
  `kelayakan2` varchar(255) NOT NULL,
  `penilaian_pembimbing1` text CHARACTER SET utf8mb4 NOT NULL,
  `nilai_pembimbing1` varchar(255) NOT NULL DEFAULT ',,,,,,,',
  `penilaian_pembimbing2` text CHARACTER SET utf8mb4 NOT NULL,
  `nilai_pembimbing2` varchar(255) NOT NULL DEFAULT ',,,,,,,',
  `penilaian_penguji1` text CHARACTER SET utf8mb4 NOT NULL,
  `nilai_penguji1` varchar(255) NOT NULL DEFAULT ',,,,,,,',
  `penilaian_penguji2` text CHARACTER SET utf8mb4 NOT NULL,
  `nilai_penguji2` varchar(255) NOT NULL DEFAULT ',,,,,,,',
  `tanggal_presentasi` date NOT NULL,
  `waktu_presentasi` time NOT NULL,
  `link_presentasi` varchar(255) NOT NULL,
  `status_preview` enum('','preview1','preview2','preview3','sidang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guidance`
--

INSERT INTO `guidance` (`id`, `id_mhs`, `judul_1`, `judul_2`, `judul_3`, `keterangan`, `komentar`, `peminatan`, `tahun`, `status_file`, `date`, `kelayakan`, `kelayakan2`, `penilaian_pembimbing1`, `nilai_pembimbing1`, `penilaian_pembimbing2`, `nilai_pembimbing2`, `penilaian_penguji1`, `nilai_penguji1`, `penilaian_penguji2`, `nilai_penguji2`, `tanggal_presentasi`, `waktu_presentasi`, `link_presentasi`, `status_preview`) VALUES
('5f520e560ea97', '5f50f84ac76e6', 'Recommender sistem menggunakan PHP', '', '', '', '', 'Fotografi Dasar dan Periklanan', '2020', 'Dikirim', '04-09-2020', '', '', '', ',,,,,,,', '', ',,,,,,,', '', ',,,,,,,', '', ',,,,,,,', '0000-00-00', '21:59:18', '', ''),
('5f5233fe39202', '44', 'Judul Satu ', 'Judul Dua', '', '', '', 'Fotografi Dasar dan Periklanan', '2020', 'Disetujui Adminlaa', '04-09-2020', 'kesesuaian,ketepatan,kaidah', '', '<p>uji coba ketiga testing 123</p>', '10,10,10,10,10,20,20,10', '<p>uji coba ketiga testing 123</p>', '10,10,10,10,10,20,20,10', '', '10,10,10,10,10,20,20,10', '', '10,10,10,10,10,20,20,10', '2020-09-15', '01:23:00', 'https://meet.google.com/cap-oewq-gnk?pli=1&authuser=3', 'preview3'),
('5f53020b9177f', '5f3e31113e0d3', 'Judul Satu ', '', '', '', '', '', '2020', 'Disetujui Adminlaa', '05-09-2020', '', '', '', ',,,,,,,', '', ',,,,,,,', '', ',,,,,,,', '', ',,,,,,,', '0000-00-00', '21:59:18', '', '');

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
('5f12ccfe4afe8', '403 gambar', 9, 'Semua', '5f12ccfe4afe8.PNG', 'test'),
('5f12cd6abdba2', 'test', 4, 'Dosen', '5f12cd6abdba2.PNG', 'test'),
('5f12cdf2debfe', 'test', 4, 'Mahasiswa', '5f12cdf2debfe.PNG', 'test'),
('5f12ce7d3da21', 'coba', 6, 'Dosen', '1.PNG', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) CHARACTER SET latin1 NOT NULL,
  `slug_kategori` varchar(255) CHARACTER SET latin1 NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug_kategori`, `urutan`, `tanggal_update`) VALUES
(1, 'Desain Komunikasi Visual', 'desain-komunikasi-visual', 1, '2020-06-18 00:47:47'),
(2, 'Desain Produk', 'desain-produk', 2, '2020-06-18 00:47:53'),
(5, 'Desain Interior', 'desain-interior', 3, '2020-06-18 02:55:18'),
(6, 'Kriya Tekstil dan Mode', 'desain-fashion', 4, '2020-06-18 02:55:38'),
(7, 'Seni Rupa', 'seni-rupa', 5, '2020-06-18 02:55:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoriruangan`
--

CREATE TABLE `kategoriruangan` (
  `id` varchar(64) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategoriruangan`
--

INSERT INTO `kategoriruangan` (`id`, `kategori`, `date_created`) VALUES
('10', 'Studio Videografi', '2020-07-16 12:47:58'),
('11', 'Kelas Biasa', '2020-07-17 23:42:28'),
('2', 'Lab Cintiq', '2020-07-16 12:47:58'),
('3', 'Lab Batik', '2020-07-16 12:47:58'),
('4', 'Lab Lukis', '2020-07-16 12:47:58'),
('5', 'Lab Sablon', '2020-07-16 12:47:58'),
('6', 'Lab Multimedia', '2020-07-16 12:47:58'),
('7', 'Lab Pola dan Jahit', '2020-07-16 12:47:58'),
('8', 'Studio Musik', '2020-07-16 12:47:58'),
('9', 'Studio Fotografi', '2020-07-16 12:47:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification`
--

CREATE TABLE `notification` (
  `id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `booking_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `borrowing_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `creation_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `chat_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `info_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `thesis_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `subject` enum('','booking','borrowing','creation','chat','news','thesis') CHARACTER SET utf8mb4 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('unread','read') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `booking_id`, `borrowing_id`, `creation_id`, `chat_id`, `info_id`, `thesis_id`, `subject`, `description`, `date`, `status`) VALUES
('5f1e7e0404fe8', '5f1e7dc5ca07e', '', '5f1e7dfa80b9d', '', '', '', '', '', 'Barang ini ingin dipinjam', '2020-07-27 14:11:00', 'read'),
('5f1e7e24aab87', '38', '', '5f1513bc63bfb', '', '', '', '', '', 'Peminjaman diizinkan', '2020-07-27 14:11:32', 'unread'),
('5f1e7e7a57880', '5f1e7dc5ca07e', '', '5f1e7dfa80b9d', '', '', '', '', '', 'Peminjaman diizinkan', '2020-07-27 14:12:58', 'read'),
('5f1e7e7bb5380', '8', '', '5f150944e9609', '', '', '', '', '', 'Peminjaman diizinkan', '2020-07-27 14:12:59', 'read'),
('5f1e7e7d9a262', '8', '', '5f1be6c8ac198', '', '', '', '', '', 'Peminjaman diizinkan', '2020-07-27 14:13:01', 'unread'),
('5f1e7e7ea0652', '8', '', '5f1be80d5cc11', '', '', '', '', '', 'Peminjaman tidak diizinkan', '2020-07-27 14:13:02', 'read'),
('5f1e7e8074c4b', '8', '', '5f1be87feef78', '', '', '', '', '', 'Peminjaman tidak diizinkan', '2020-07-27 14:13:04', 'read'),
('5f1e7e840cb93', '8', '', '5f1be918cc49f', '', '', '', '', '', 'Peminjaman tidak diizinkan', '2020-07-27 14:13:08', 'unread'),
('5f1e8023404c9', '5f1e7dc5ca07e', '', '5f1e8016bf045', '', '', '', '', '', 'Barang ini ingin dipinjam', '2020-07-27 14:20:03', 'read'),
('5f1e803d57bb6', '5f1e7dc5ca07e', '', '5f1e8016bf045', '', '', '', '', '', 'Peminjaman diizinkan', '2020-07-27 14:20:29', 'read'),
('5f1e804056b12', '8', '', '5f150c74adc88', '', '', '', '', '', 'Peminjaman diizinkan', '2020-07-27 14:20:32', 'unread'),
('5f498784c2c22', '8', '', '5f1448e35a109', '', '', '', '', '', 'Peminjaman diizinkan', '2020-08-29 05:39:00', 'unread');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id` varchar(64) NOT NULL,
  `id_kategori` varchar(64) NOT NULL,
  `ruangan` varchar(255) NOT NULL,
  `akses` varchar(100) NOT NULL,
  `kapasitas` int(5) NOT NULL,
  `images` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id`, `id_kategori`, `ruangan`, `akses`, `kapasitas`, `images`, `date`) VALUES
('1', '2', 'IK.01.02', 'Dosen, Mahasiswa', 39, 'default1.jpg', '2020-08-23 17:02:26'),
('10', '11', 'IK.01.09', 'Dosen, Mahasiswa', 41, 'default.jpg', '2020-08-23 17:02:26'),
('17', '11', 'IK.02.02', 'Dosen, Mahasiswa', 34, 'default.jpg', '2020-08-23 17:02:26'),
('4', '9', 'IK.01.01', 'Dosen, Mahasiswa', 40, 'default.jpg', '2020-08-23 17:02:26'),
('5', '4', 'IK.01.05', 'Mahasiswa', 21, 'default2.jpg', '2020-08-23 17:02:26'),
('5f15e3276fe2b', '10', 'IK.02.10', 'Mahasiswa', 34, 'default.jpg', '2020-08-23 17:02:26'),
('5f3e34922ed65', '11', 'IK.02.05', 'Dosen, Mahasiswa', 25, 'default.jpg', '2020-08-23 17:02:26'),
('6', '3', 'IK.02.04', 'Dosen, Mahasiswa', 25, 'default3.jpg', '2020-08-23 17:02:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tampilan`
--

CREATE TABLE `tampilan` (
  `id_tampilan` int(11) NOT NULL,
  `id` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `slug_tampilan` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_ck` int(11) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `nim` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `No_wa` varchar(15) NOT NULL,
  `No_hp` varchar(15) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL DEFAULT '0',
  `judul` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tampilan_like`
--

CREATE TABLE `tampilan_like` (
  `id` int(11) NOT NULL,
  `id_tampilan` int(11) NOT NULL,
  `ip` varchar(200) CHARACTER SET latin1 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tampilan_like`
--

INSERT INTO `tampilan_like` (`id`, `id_tampilan`, `ip`, `date`) VALUES
(3, 31, '::1', '2020-07-18 03:03:18'),
(4, 34, '::1', '2020-07-18 06:01:12'),
(5, 39, '::1', '2020-07-18 15:29:56'),
(6, 41, '::1', '2020-07-19 12:04:03'),
(7, 12, '::1', '2020-08-09 05:02:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_info`
--

CREATE TABLE `tb_info` (
  `id` varchar(64) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `images` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `uploadby` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_info`
--

INSERT INTO `tb_info` (`id`, `title`, `slug`, `images`, `body`, `uploadby`, `date`) VALUES
('5f3dec5be3218', 'Telkom University (Kembali) Menjadi PTS Terbaik No.1 di Indonesia Tahun 2020', 'telkom-university-kembali-menjadi-pts-terbaik-no1-di-indonesia-tahun-2020', 'TELKOM-UNIVERSITY-PTS-NO-1.jpg', 'JAKARTA, Telkom University – Kementerian Pendidikan dan Kebudayaan (Kemendikbud) mengumumkan klasterisasi perguruan tinggi Indonesia tahun 2020 melalui portal website Kemendikbud (http://klasterisasi-pt.kemendikbud.go.id).\r\n\r\nBerdasarkan siaran pers Kemendikbud bahwa terdapat 2 (dua) rumusan tujuan dari klasterisasi ini adalah untuk merumuskan penciri kualitas perguruan tinggi yang telah terdokumentasi di Pangkalan Data Pendidikan Tinggi dan melakukan telaah klasterisasi berdasarkan penciri tertentu untuk kepentingan pembinaan perguruan tinggi, kedua hal ini untuk membangun landasan bagi Kemendikbud dan Perguruan Tinggi untuk melakukan perbaikan terus-menerus dalam rangka meningkatkan performa dan kesehatan organisasi.\r\n\r\nPemeringkatan Perguruan Tinggi 2020 berfokus pada indikator atau penilaian yang berbasis Output – Outcome Base, yaitu dengan melihat Kinerja Masukan dengan bobot 45% yang meliputi kinerja Input (20%) dan Proses (25%), serta Kinerja Luaran dengan bobot 55% yang meliputi Kinerja Output (25%), dan Outcome (30%).\r\n\r\nPenilaian pada aspek input meliputi prosentase dosen berpendidikan S3, persentase dosen dalam jabatan lektor kepala dan guru besar, rasio jumlah dosen terhadap jumlah mahasiswa, jumlah mahasiswa asing, dan jumlah dosen bekerja sebagai praktisi di industri minimum 6 bulan.\r\n\r\nPada aspek proses terdapat 9 indikator yang digunakan antara lain Akreditasi Institusi, Akreditasi Program Studi, Pembelajaran Daring, Kerjasama perguruan tinggi, Kelengkapan Laporan PDDIKTI, Jumlah Program Studi bekerja sama dengan DUDI, NGO atau QS Top 100 WCU by subject, Jumlah Program Studi melaksanakan program merdeka belajar, Jumlah mahasiswa yang mengikuti Program Merdeka Belajar.\r\n\r\nPada aspek output, terdapat empat indikator yang digunakan antara lain jumlah artikel ilmiah terindeks per dosen, kinerja penelitian, kinerja kemahasiswaan, jumlah program studi yang telah memperoleh Akreditasi atau Sertifikasi International. Sementara pada aspek outcome, terdapat lima indikator yang digunakan antara lain kinerja inovasi, jumlah sitasi per dosen, jumlah patent per dosen, kinerja pengabdian masyarakat, dan persentase lulusan perguruan tinggi yang memperoleh pekerjaan dalam waktu 6 bulan.\r\n\r\nRektor Telkom University (Tel-U) Prof. Adiwijaya menyampaikan ucapan terima kasih yang sebesar-besarnya untuk Sivitas Akademika Telkom University dan Stakeholders atas pencapaian ini serta menekankan bahwa fokus Telkom University bukan pada hasil melainkan pada parameter penilaiannya.\r\n\r\n“Kami bersyukur atas capaian ini, terima kasih kepada seluruh Sivitas Akademika dan Stakeholders Telkom University atas segala kerja keras dan dukungannya. Lebih jauh, bukan hasil rankingnya yang menjadi fokus kami, namun penilaian terhadap parameter input, proses, output dan outcome menjadi ajang evaluasi diri bagi kami untuk terus melakukan continuous quality improvement. Semoga capaian ini menjadi penyemangat bagi seluruh Sivitas Akademika untuk selalu memberikan yang terbaik dalam berkontribusi untuk Bangsa Indonesia” Ucapnya.\r\n\r\nBerdasarkan indikator penilaian dari Kemendikbud, Adiwijaya menambahkan bawa Tel-U unggul dari sisi outcome yaitu pada kinerja inovasi dan pengabdian masyarakat, jumlah sitasi dan paten per dosen serta persentase penyerapan lulusan oleh industri dalam waktu 6 bulan.\r\n\r\n“Alhamdulillah dari kinerja outcome Tel-U memiliki nilai yang unggul dan masuk ke dalam 10 Besar Nasional. Hal ini karena Tel-U fokus pada pengembangan produk riset inovasi terbaik terbukti dengan diraihnya Anugerah IPTEK Widyapadhi sebagai PTS dengan manajemen inovasi terbaik di Indonesia. Selain itu juga Tel-U aktif dalam berbagai program kegiatan pengabdian masyarakat serta penyerapan lulusan di Industri dengan rata-rata masa tunggu 2,92 bulan dari hasil tracer studi” Jelasnya.\r\n\r\nDirektur Jenderal Pendidikan Tinggi, Prof. Nizam mengatakan klasterisasi perguruan tinggi yang dilakukan setiap tahun yang disusun Kemendikbud ini terdiri atas klaster 1 sampai 5. Klasterisasi ini bukan untuk memberikan pemeringkatan terhadap perguruan tinggi. Esensi dari klasterisasi ini adalah untuk mengelompokkan perguruan tinggi sesuai dengan level perkembangannya.\r\n\r\n“Klasterisasi perguruan tinggi ini kami melihat aspek manajemen secara keseluruhan. Jadi dari input, proses, output dan outcome,” Ucapnya saat konferensi pers daring, Senin (17/8/2020)\r\n\r\nBerdasarkan siaran pers Kemenristekdikti berikut 19 Perguruan Tinggi terbaik dari 2.136 Perguruan Tinggi di Indonesia pada tahun 2020:\r\n\r\nInstitut Pertanian Bogor (klaster 1)\r\nUniversitas Indonesia (klaster 1)\r\nUniversitas Gadjah Mada (klaster 1)\r\nUniversitas Airlangga (klaster 1)\r\nInstitut Teknologi Bandung (klaster 1)\r\nInstitut Teknologi Sepuluh November (klaster 1)\r\nUniversitas Hasanuddin (klaster 1)\r\nUniversitas Brawijaya (klaster 1)\r\nUniversitas Diponegoro (klaster 1)\r\nUniversitas Padjadjaran (klaster 1)\r\nUniversitas Sebelas Maret (klaster 1)\r\nUniversitas Negeri Yogyakarta (klaster 1)\r\nUniversitas Andalas (klaster 1)\r\nUniversitas Sumatera Utara (klaster 1)\r\nUniversitas Negeri Malang (klaster 1)\r\nUniversitas Pendidikan Indonesia (klaster 2)\r\nTelkom University (klaster 2)\r\nUniversitas Negeri Semarang (klaster 2)\r\nUniversitas Negeri Surabaya (klaster 2', 'Admin', '2020-08-20 10:22:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lab`
--

CREATE TABLE `tb_lab` (
  `id` varchar(64) NOT NULL,
  `images` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lab`
--

INSERT INTO `tb_lab` (`id`, `images`, `title`, `slug`, `body`, `date`) VALUES
('5f1b8caf058b4', 'IMG_9534_edit1.jpg', 'Lab. Batik', 'lab-batik', 'Lab Batik merupakan sarana maupun tempat yang memfasilitasi pembuatan sebuah batik. Proses pembuatan dari awal hingga akhir hingga terciptanya sebuah kain batik yang cantik. Selain pembuatan batik, Lab batik juga berfungsi sebagai tempat penelitian maupun kegiatan-kegiatan abdimas.', '2020-07-25 01:36:47'),
('5f1b93c2bdb1f', 'IMG_92741.JPG', 'Lab. CGI', 'lab-cgi', 'Lab Computer Generated Imagery (CGI) merupakan salah satu sarana fasilitas yang memiliki software-software standar industri terkini untuk mendukung mahasiswanya mengerjakan proyek-proyek berkaitan dengan CGI dengan lancar.', '2020-07-25 02:06:58'),
('5f1b95d912037', 'IMG_9189_edit1.jpg', 'Lab. Mac', 'lab-mac', 'Lab Mac merupakan satu dari beberapa lab komputer berbasis sistem operating Macintosh dengan kapasitas yang bisa mendukung sampai dengan 25 mahasiswa dalam proses belajar mengajar. Lab ini juga dilengkapi dengan software-software pendukung terkini yang dapat diakses secara mudah oleh mahasiswanya.', '2020-07-25 02:15:53'),
('5f1b960077560', 'IMG_93141.JPG', 'Lab. Bengkel', 'lab-bengkel', 'Lab Bengkel adalah salah satu lab yang berada di FIK yang dilengkapi dengan beberapa peralatan seperti: Mesin table saw, mesin gerinda, mesin bubut kayu, mesin amplas, bench drilling dan lain-lain untuk mendukung mahasiswa dalam mengerjakan pekerjaan pendekatan experimental pada Kuliah Kerja \r\nStudio, Proyek Akhir maupun tesis.', '2020-07-25 02:16:32'),
('5f1b9649ea263', 'IMG_9166_edit1.jpg', 'Lab. Multimedia', 'lab-multimedia', 'Lab Multimedia dirancang untuk memfasilitasi mahasiswanya dalam mengerjakan pekerjaan multimedia dengan lancar. Fasilitas yang mendukung seperti software terkini memudahkan mahasiswanya untuk menjangkau software-software yang digunakan pada industri kreatif yang ada.', '2020-07-25 02:17:45'),
('5f1b96dbac690', 'IMG_9675_edit1.jpg', 'Lab. Pola dan Jahit', 'lab-pola-dan-jahit', 'Lab Pola dan Jahit dirancang dengan space yang cukup besar agar mahasiswa dapat dengan leluasa menggunakan sarana untuk tempat menjahit dan membuat pola.', '2020-07-25 02:20:11'),
('5f1ce025887f9', 'IMG_9181_edit.jpg', 'Lab. Cintiq', 'lab-cintiq', 'Lab Komputer Multimedia Cintiq merupakan salah satu dari beberapa lab yang memiliki alat canggih untuk mendukung menggambar secara digital maupun membuat animasi. Dilengkapi dengan Wacom Cintiq disetiap mejanya, Lab ini bisa menampung kurang lebih 25 mahasiswa. ', '2020-07-26 01:45:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_panel`
--

CREATE TABLE `tb_panel` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `video` varchar(500) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_panel`
--

INSERT INTO `tb_panel` (`id`, `title`, `slug`, `body`, `video`, `thumb`, `date_create`) VALUES
(99, 'Fakultas Industri Kreatif', 'visi-fakultas-industri-kreatif', 'Visi\r\nMenjadi Unit Laboratorium yang memiliki layanan prima dalam mendukung Tridarma Perguruan Tinggi dan menjadi pusat pengembangan Creativepreneur di Fakultas Industri Kreatif ”\r\n\r\nMisi:\r\n1.	Menyelenggarakan Pelayanan Prima Laboratorium dalam pelaksanaan Tridharma Perguruan Tinggi bagi mahasiswa dan dosen di Fakultas Industri Kreatif.\r\n\r\n2.	Mengembangkan laboratorium di Bidang Industri Kreatif yang dapat berkolaborasi dengan industri, akademisi, swasta dan pemerintah untuk menghasilkan karya yang berdampak pada pertumbuhan ekonomi kreatif.\r\n\r\n3.	Menguatkan sistem tata kelola laboratorium yang transparan dan akuntabel sehingga mampu memberikan dampak positif bagi kemajuan fakultas dan Universitas.', 'Profil_Fakultas_Industri_Kreatif_-_TELKOM_UNIVERSITY.mp4', 'thumbvideofik1.jpg', '2020-07-28 13:33:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id` varchar(64) NOT NULL,
  `title` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL,
  `body` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_slider`
--

INSERT INTO `tb_slider` (`id`, `title`, `images`, `body`, `date`) VALUES
('10', 'Pengumuman pemenang fotografi', 'WhatsApp_Image_2020-08-19_at_09_57_16.jpeg', 'Pada lomba fotografi kali ini dimenangkan oleh staff Laboratorium FIK sdr. Mamat Rohikmat. Selamat atas capaiannya', '2020-07-12 03:33:55'),
('14', 'Laboratorium CGI Fakultas Industri Kreatif', 'IMG_9274.JPG', 'Laboratorium CGI memfasilitasi kebutuhan mahasiswa / dosen untuk kegiatan perlombaan dan riset', '2020-07-12 04:09:12'),
('5', 'IFIK Sekarang Sudah Aktif!', 'GEDUNG_FIK.jpg', 'IFIK adalah web application yang memfasilitasi kebutuhan dosen, mahasiswa dan civitas akademika untuk mendapatkan informasi seputar Laboratorium Fakultas Industri Kreatif. Selain melihat informasi, IFIK menyediakan fasilitas untuk TA online, Peminjaman Online, Digital Storage, dan Kebutuhan surat yang berkaitan dengan mahasiswa secara online ', '2020-06-18 19:33:56');

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
  `status` varchar(124) NOT NULL,
  `tahapan_preview` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `thesis`
--

INSERT INTO `thesis` (`id`, `id_guidance`, `send_to`, `pdf_file`, `link_project`, `keterangan`, `date`, `correction1`, `correction2`, `status`, `tahapan_preview`) VALUES
('5f4faf4dadfc8', '5f48af1704a46', 'Semua', 'KHS_Muhammad_Sulthan_Angka_Kurniawan.pdf, SL_Muhammad_Sulthan_Angka_Kurniawan.pdf', 'https://drive.google.com/drive/folders/1ENw4czEKpJsCaxr7_4UccZgBxAkiHLm6?usp=sharing', 'testing link sending', '2020-09-02', '', '', 'Dikirim', 'preview1'),
('5f534d486d143', '5f5233fe39202', 'Semua', 'Form_Penilaian_Pembimbing_Lapangan_Rochi.pdf', 'https://drive.google.com/file/d/1RyojIItrMlGuRIc84Q3sa3YSyLG4NPfa/view', 'lorem', '2020-09-05', '<p>Test Komentar terbaru sekarang baru lagi dan test sekali lagi testing save apa aja</p>', '', 'Sesuai', 'preview1'),
('5f578ac0cfe35', '5f5233fe39202', 'Semua', 'Business_model_canvas.pdf', 'https://drive.google.com/drive/folders/1ENw4czEKpJsCaxr7_4UccZgBxAkiHLm6?usp=sharing, https://drive.google.com/drive/folders/1ENw4czEKpJsCaxr7_4UccZgBxAkiHLm6?usp=sharing', 'testing link', '2020-09-08', '<p>test project 2</p>', '', 'Revisi', 'preview1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `thesis_lecturers`
--

CREATE TABLE `thesis_lecturers` (
  `id` varchar(64) NOT NULL,
  `id_guidance` varchar(64) NOT NULL,
  `dosen_pembimbing1` varchar(128) NOT NULL,
  `dosen_pembimbing2` varchar(128) NOT NULL,
  `dosen_penguji1` varchar(128) NOT NULL,
  `dosen_penguji2` varchar(128) NOT NULL,
  `date` varchar(64) NOT NULL,
  `date_edit` varchar(64) NOT NULL,
  `kelompok_keahlian` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `thesis_lecturers`
--

INSERT INTO `thesis_lecturers` (`id`, `id_guidance`, `dosen_pembimbing1`, `dosen_pembimbing2`, `dosen_penguji1`, `dosen_penguji2`, `date`, `date_edit`, `kelompok_keahlian`) VALUES
('5f4cc58d499f5', '5f48af1704a46', '5f1e7dc5ca07e', '5f2128a43c90b', '', '5f3b9697e3aa5', '08-31-2020 16:40:29', '', ''),
('5f525822a2861', '5f5233fe39202', '5f1e7dc5ca07e', '5f2128a43c90b', '5f2128a43c90b', '', '09-04-2020 22:07:14', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(64) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nip` varchar(11) NOT NULL,
  `koordinator` varchar(1) NOT NULL,
  `dosen_wali` varchar(64) NOT NULL,
  `kuota_bimbingan` int(3) NOT NULL,
  `kuota_penguji` int(3) NOT NULL,
  `prodi` varchar(64) NOT NULL,
  `kode_dosen` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `status` varchar(7) NOT NULL DEFAULT 'offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `no_telp`, `nim`, `nip`, `koordinator`, `dosen_wali`, `kuota_bimbingan`, `kuota_penguji`, `prodi`, `kode_dosen`, `email`, `alamat`, `images`, `password`, `salt`, `role_id`, `is_active`, `date_created`, `status`) VALUES
('39', 'kaurlab', 'Kaur Lab ', '', '', '', '', '', 0, 0, '', '', 'kaurlab@gmail.com', '', 'default.jpg', '920c3713e13b091e73d17d35bd608079fc41724eca41b415f200e338dc59c531', '$2y$10$hctmRhwo9qxeJTvtzbn/kObWapiE8JSPX6jO72QAbp1HJfe4QBwEi', 2, 1, 1594554238, 'offline'),
('44', 'ihdar', 'Rafif ihdar', '0851221132434', '1301130763', '', '', '5f1e7dc5ca07e', 0, 0, 'Desain Komunikasi Visual', '', 'snowm60401@gmail.com', 'Bengkulu', '1.jpg', 'e41e13ea4344a5dab62674d6e08a24b75bf0d5bd7921c04c2a13fc80a6eda0e3', '$2y$10$sGYdQGJYGX9nCIDzkWoH3uibGxPC292Bf9nhIgO/TSkLz3Q3Sp1jO', 4, 1, 1594832402, 'offline'),
('5f1e7dc5ca07e', 'sulthanangka', 'Muhammad Sulthan Angka Kurniawan', '0812234545', '', '1234567890', '', '1', 5, 4, 'Desain Komunikasi Visual', 'MSAK', 'sulthan.kurniawan@gmail.com', 'Bandung', 'default.jpg', '7e93fd68a7b5f0860784f35336a488910b3d6f2c088602a4a608e24ebeac3a36', '$2y$10$IXEl6J4l/ORTrf78B14hyewCsBz1Fyf4xM96cQPexqL.KqvJ4A2zC', 3, 1, 1595833797, 'online'),
('5f2128a43c90b', 'akathan', 'akathan', '08100112121', '', '09876543211', '1', '1', 10, 6, 'Desain Komunikasi Visual', 'AKTH', 'sulthan.angka@gmail.com', 'Sukabirus', 'default.jpg', '95b77ac94e00b2039b79d78e01ee5f941da1d074fae0a3a41636797e429bd860', '$2y$10$UdpWt4Uo/v1rlkzJxZqrdu7mlLiJbI3aRrmToglyIduVaYAsL7diG', 3, 1, 1596008612, 'online'),
('5f28dbe13ddf9', 'manhattan', 'Manhattan', '08121002931', '', '12345678910', '', '1', 10, 3, 'Desain Interior', 'MHN10', 'manhattan@gmail.com', 'Buah Batu, Bandung', 'default.jpg', '6b1d591c1e0149ac6db6b72993af5699878d3ff96b9a3db1802393bcc8e88608', '$2y$10$oVda9dQDlDUZxn0B4Ll.hOVZc1KrkDulpOpSXWS6qMpFaXUVB5826', 3, 1, 1596513249, 'offline'),
('5f3b9697e3aa5', 'akaguh', 'teguh akbar', '', '', '0', '', '', 0, 0, '', '', 'akaguh@telkomuniversity.ac.id', '', 'default.jpg', '09e8d25c6a0ada86dd912381b5f99eb500aed5c18d1924d53ab67007407fae24', '$2y$10$GaTaVEnhPY0JCXFxblq2Per4KEMzG7a28NFbkwbyJJIL8a85P0Omi', 3, 1, 1597740695, 'offline'),
('5f3b9a05d0280', 'studiolab', 'studiolab', '', '', '0', '', '', 0, 0, '', '', 'studiolab@telkomuniversity.ac.id', '', 'default.jpg', 'c39117bf9f02c56cbdf71fbeb5b1e99caed803898f76473fc60f936d8abb9812', '$2y$10$7y54SBtYQvCJpp5fhnlAseBM.i382FzcyxT5RqZLvD5sbw06SVoMO', 1, 1, 1597741573, 'offline'),
('5f3b9ad4037a3', 'teguh', 'teguh akbar', '', '', '0', '', '', 0, 0, '', '', 'radithandri@gmail.com', '', 'default.jpg', '8f8f7accedd8d9b4f8d37143a2ec6e9d85a868cdf8d49bd4c08ee3f0ba82b7a5', '$2y$10$PapAltAzCXGQzwO14OaJqOe0j1Gw/CdckmZYqf0ASGnmZQxDCGoY6', 2, 1, 1597741780, 'offline'),
('5f3c653160043', 'anggarwarok', 'Anggar Erdhina Adi', '', '', '0', '', '', 7, 6, '', '', 'anggarwarok@telkomuniversity.ac.id', '', 'default.jpg', '40633ea69c369ff478802712a7c876e17d80094aacb9829a7a86868b0f7fa392', '$2y$10$/jqUpfajO.UQiPzhPYDRX.0GSOl/adaIKWLvWoWMy2/dXsYbCIA7e', 3, 1, 1597793585, 'offline'),
('5f3e31113e0d3', 'rochieko', 'Rochi Eko Pambudi', '08329634743', '1301170761', '', '', '5f2128a43c90b', 0, 0, 'Desain Produk', '', 'snowm6040@gmail.com', 'Pemalang', 'default.jpg', '0409506e0855738c3297d9d520fa0ed68dae954baaec58100c64fff5b1c44879', '$2y$10$Pmz.lOPOCiydvg.mqJmyi.Zlt8eBHc41KBjRXtJtH0XFCo5RDZBVS', 4, 1, 1597911313, 'offline'),
('5f43c46f3b0df', 'adminlaa', 'Admin LAA', '', '', '', '', '', 0, 0, '', '', 'adminlaafik@gmail.com', '', 'default.jpg', '86f9d10cd1d13ff0ec318766b3ba445f0913f482d39581851a18bcd239dbd2cf', '$2y$10$NcoX.mxiqsXOR1DH2YJ9JeCVKPcxM5Quwnlk1hk28/Yh4cAAld9QS', 5, 1, 1598276719, 'offline'),
('5f4a2f00c828f', 'koordinatorta', 'Koordinator Tugas Akhir', '', '', '', '', '', 0, 0, '', '', 'koordinatorta@gmail.com', '', 'default.jpg', 'f911697a55fa9d230ac8da335637ad58491d2aaee5f984a1cef8c4fd6312c2ad', '$2y$10$y6DAeeBN.kLq3CjdLuXuY.feFDUIdI51UUfGQB9yKo4ZMohnnuUGy', 6, 1, 1598697216, 'offline'),
('5f4a4b0ee4b42', 'testing', 'Testing', '08512312323', '1234567891', '', '', '5f28dbe13ddf9', 0, 0, 'Desain Produk', '', 'testing@gmail.com', 'Bogor', 'Cat.jpg', '701e1ef19005a5ff4815342180233ee1a3ece22187c1e8d028cdafea436a943d', '$2y$10$2aaRJKEVgnmJ1TQzl8wm9e.m1NIkRGaEjYfPX3S35/eUvq9J3DWSW', 4, 1, 1598704398, 'offline'),
('5f50f84ac76e6', 'aditiya', 'aditya novianto', '0812345433455', '2087001888', '', '', '5f28dbe13ddf9', 0, 0, 'Desain Komunikasi Visual', '', 'adityanovianto@gmail.com', 'bandung', 'default.jpg', '5f7df180329678b97fc44add4f223a409d5618186f57fb80d8c3844039867ceb', '$2y$10$Adifl.rSd9Q9Uhk8SsCOReqjrs4DdsI8cAIzeTg77DMFa3vOK72Q6', 4, 1, 1599141962, 'offline'),
('5f58fe59a79d6', '[removed] alert&#40;\'hello world\'&#41; [removed]', 'Muhammad Sulthan Angka Kurniawan', '', '', '', '', '', 0, 0, '', '', 'aushduahsduahdu@gmail.com', '', 'default.jpg', '7b3b64ac44ab6bcc54022da3c9cae1c95351f0bf47f65242ee924040c150b305', '$2y$10$d18dVOJx/ploJYfe6Uwue.6ONBkMIFZoWamhATqPKbNr7QwW2m.SG', 3, 0, 1599667801, 'offline'),
('5f58fed0019f6', '[removed] alert&#40;\'hello world\'&#41; [removed]', 'Muhammad Sulthan Angka Kurniawan', '', '', '', '', '', 0, 0, '', '', 'asidjasidaijd@gmail.com', '', 'default.jpg', '7e6b12a0d7a9a3ef1868efd247d712bfd55c8e61b0d185b1d10066ad3400ff8e', '$2y$10$7fUdH7s9XlEGm2WOxOovDeVAwtR3axLv85hpK5BKgEy8ym9hPNoK6', 3, 0, 1599667920, 'offline'),
('8', 'admin', 'Admin LAB', '', '', '', '', '', 0, 0, '', '', 'admin@gmail.com', '', 'default.jpg', 'ec54193c7b13f115a35da3282d74a295af9a72ca8f8a5ebd9655dbf8eadd8a02', '$2y$10$jb3uBvvS41mfsMHU4xaICul08WsrJzMyLpiIVT9bpx06CQQ/vmNle', 1, 1, 0, 'offline');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Kepala Urusan'),
(3, 'Dosen'),
(4, 'Mahasiswa'),
(5, 'Admin LAA'),
(6, 'Koordinator TA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `borrowing`
--
ALTER TABLE `borrowing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `child_kategori`
--
ALTER TABLE `child_kategori`
  ADD PRIMARY KEY (`id_ck`);

--
-- Indeks untuk tabel `file_pendaftaran`
--
ALTER TABLE `file_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guidance`
--
ALTER TABLE `guidance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kategoriruangan`
--
ALTER TABLE `kategoriruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tampilan`
--
ALTER TABLE `tampilan`
  ADD PRIMARY KEY (`id_tampilan`);

--
-- Indeks untuk tabel `tampilan_like`
--
ALTER TABLE `tampilan_like`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_lab`
--
ALTER TABLE `tb_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_panel`
--
ALTER TABLE `tb_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `thesis`
--
ALTER TABLE `thesis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `thesis_lecturers`
--
ALTER TABLE `thesis_lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `child_kategori`
--
ALTER TABLE `child_kategori`
  MODIFY `id_ck` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tampilan`
--
ALTER TABLE `tampilan`
  MODIFY `id_tampilan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tampilan_like`
--
ALTER TABLE `tampilan_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_panel`
--
ALTER TABLE `tb_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
