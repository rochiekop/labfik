-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2020 at 04:58 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

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
-- Table structure for table `booking`
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
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
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
-- Table structure for table `borrowing`
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
-- Dumping data for table `borrowing`
--

INSERT INTO `borrowing` (`id`, `user_id`, `item_id`, `quantity`, `start`, `end`, `reason`, `status`) VALUES
('5f144770c3d1f', '38', '5f12ce7d3da21', 1, '2020-07-19 20:15:00', '2020-07-19 21:16:00', 'muhammad sulthan', 'Diterima'),
('5f144781517af', '38', '5f12cdf2debfe', 1, '2020-07-20 20:15:00', '2020-07-20 21:16:00', 'talisha eta', 'Diterima'),
('5f1448e35a109', '8', '5f12ccfe4afe8', 1, '2020-07-19 20:21:00', '2020-07-19 21:21:00', 'coba pinjam', 'Ditolak'),
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
-- Table structure for table `chat`
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
-- Dumping data for table `chat`
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
('5f301cbc8a802', '5f2128a43c90b', '8', 'NULL', '3.jpg', '.jpg', 'image/jpeg', '2020-08-09 22:56:44', '', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `child_kategori`
--

CREATE TABLE `child_kategori` (
  `id_ck` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_child` varchar(128) NOT NULL,
  `post_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `child_kategori`
--

INSERT INTO `child_kategori` (`id_ck`, `id_kategori`, `nama_child`, `post_update`) VALUES
(1, 1, 'Fotografi Dasar dan Periklanan', '2020-07-09 11:46:58'),
(2, 1, 'tata busana', '2020-07-11 23:49:58'),
(4, 1, 'Semantika Produk', '2020-07-18 14:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `correction`
--

CREATE TABLE `correction` (
  `id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `thesis_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `page` int(11) NOT NULL,
  `correction` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `correction`
--

INSERT INTO `correction` (`id`, `thesis_id`, `page`, `correction`) VALUES
('5f37a398cbf2e', 'test', 1, 'testing correction'),
('5f37b41e9616b', 'test', 2, 'correction 2'),
('5f38f6c5cbd94', 'test', 3, 'correction 3'),
('5f38f6d2ae0ea', 'test', 4, 'correction 4'),
('5f38f6d2d325c', 'test', 5, 'correction 5'),
('5f38f6d304091', 'test', 6, 'correction 6'),
('5f38f6d3246e8', 'test', 7, 'correction 7'),
('5f38f6d34c409', 'test', 8, 'correction 8'),
('5f3e367fb4936', '5f3e362c739ae', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `dosbing`
--

CREATE TABLE `dosbing` (
  `id` varchar(64) NOT NULL,
  `id_dosen` varchar(64) NOT NULL,
  `id_guidance` varchar(64) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosbing`
--

INSERT INTO `dosbing` (`id`, `id_dosen`, `id_guidance`, `date`, `status`) VALUES
('5f3e33933a3e0', '5f1e7dc5ca07e', '5f3e32ceeb674', '2020-08-20 15:25:55', 'Disetujui'),
('5f42757be1fa3', '5f28dbe13ddf9', '5f3e32ceeb674', '2020-08-23 20:56:11', 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `file_pendaftaran`
--

CREATE TABLE `file_pendaftaran` (
  `id` varchar(64) NOT NULL,
  `id_mhs` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `date` varchar(64) NOT NULL,
  `date_edit` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_pendaftaran`
--

INSERT INTO `file_pendaftaran` (`id`, `id_mhs`, `nama`, `file`, `status`, `komentar`, `date`, `date_edit`) VALUES
('5f46a907326fc', '44', 'KSM', 'Surat_Tugas_Asdos_Semester_Genap_TA_2019-2020.pdf', 'Disetujui wali', '', '2020-08-27', ''),
('5f46a90734305', '44', 'Surat Pernyataan TA', 'Algo_GP.pdf', 'Acc Admin LAA', 'Tulisan Kurang Jelas', '2020-08-27', '27-08-2020'),
('5f46a90735dda', '44', 'Sertifikat EPRT', 'Form_Penilaian_Rochi.pdf', 'Disetujui wali', '', '2020-08-27', ''),
('5f46a90737e94', '44', 'Sertifikat TAK', 'mockup_KP.pdf', 'Update File', '', '2020-08-27', '27-08-2020'),
('5f46a9073a790', '44', 'Persetujuan Daftar TA', 'Surat_Pernyataan_Rochi.pdf', 'Acc Admin LAA', '', '2020-08-27', '');

-- --------------------------------------------------------

--
-- Table structure for table `guidance`
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
  `date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guidance`
--

INSERT INTO `guidance` (`id`, `id_mhs`, `judul_1`, `judul_2`, `judul_3`, `keterangan`, `komentar`, `peminatan`, `tahun`, `status_file`, `date`) VALUES
('5f3e32ceeb674', '5f3e31113e0d3', 'Judul Tugas Akhir', '', '', '', '', 'Desain Visual', '2020', 'Disetujui Dosen Wali', '10/02/2020'),
('5f46a9072febf', '44', 'asdds', 'asdasd', 'sdadas', '', '', 'Advertising', '2020', 'Acc Dosen Wali', '27/08/2020');

-- --------------------------------------------------------

--
-- Table structure for table `item`
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
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `quantity`, `access`, `image`, `description`) VALUES
('5f12ccfe4afe8', '403 gambar', 10, 'Semua', '5f12ccfe4afe8.PNG', 'test'),
('5f12cd6abdba2', 'test', 4, 'Dosen', '5f12cd6abdba2.PNG', 'test'),
('5f12cdf2debfe', 'test', 4, 'Mahasiswa', '5f12cdf2debfe.PNG', 'test'),
('5f12ce7d3da21', 'coba', 6, 'Dosen', '1.PNG', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) CHARACTER SET latin1 NOT NULL,
  `slug_kategori` varchar(255) CHARACTER SET latin1 NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug_kategori`, `urutan`, `tanggal_update`) VALUES
(1, 'Desain Komunikasi Visual', 'desain-komunikasi-visual', 1, '2020-06-18 00:47:47'),
(2, 'Desain Produk', 'desain-produk', 2, '2020-06-18 00:47:53'),
(5, 'Desain Interior', 'desain-interior', 3, '2020-06-18 02:55:18'),
(6, 'Desain Fashion', 'desain-fashion', 4, '2020-06-18 02:55:38'),
(7, 'Seni Rupa', 'seni-rupa', 5, '2020-06-18 02:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriruangan`
--

CREATE TABLE `kategoriruangan` (
  `id` varchar(64) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoriruangan`
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
-- Table structure for table `notification`
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
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('unread','read') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
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
('5f1e804056b12', '8', '', '5f150c74adc88', '', '', '', '', '', 'Peminjaman diizinkan', '2020-07-27 14:20:32', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` varchar(64) NOT NULL,
  `id_kategori` varchar(64) NOT NULL,
  `ruangan` varchar(255) NOT NULL,
  `akses` varchar(100) NOT NULL,
  `kapasitas` int(5) NOT NULL,
  `images` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
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
-- Table structure for table `tampilan`
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
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `views` int(11) NOT NULL DEFAULT 0,
  `judul` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tampilan_like`
--

CREATE TABLE `tampilan_like` (
  `id` int(11) NOT NULL,
  `id_tampilan` int(11) NOT NULL,
  `ip` varchar(200) CHARACTER SET latin1 NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tampilan_like`
--

INSERT INTO `tampilan_like` (`id`, `id_tampilan`, `ip`, `date`) VALUES
(3, 31, '::1', '2020-07-18 03:03:18'),
(4, 34, '::1', '2020-07-18 06:01:12'),
(5, 39, '::1', '2020-07-18 15:29:56'),
(6, 41, '::1', '2020-07-19 12:04:03'),
(7, 12, '::1', '2020-08-09 05:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_info`
--

CREATE TABLE `tb_info` (
  `id` varchar(64) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `images` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `uploadby` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_info`
--

INSERT INTO `tb_info` (`id`, `title`, `slug`, `images`, `body`, `uploadby`, `date`) VALUES
('5f3dec5be3218', 'Telkom University (Kembali) Menjadi PTS Terbaik No.1 di Indonesia Tahun 2020', 'telkom-university-kembali-menjadi-pts-terbaik-no1-di-indonesia-tahun-2020', 'TELKOM-UNIVERSITY-PTS-NO-1.jpg', 'JAKARTA, Telkom University – Kementerian Pendidikan dan Kebudayaan (Kemendikbud) mengumumkan klasterisasi perguruan tinggi Indonesia tahun 2020 melalui portal website Kemendikbud (http://klasterisasi-pt.kemendikbud.go.id).\r\n\r\nBerdasarkan siaran pers Kemendikbud bahwa terdapat 2 (dua) rumusan tujuan dari klasterisasi ini adalah untuk merumuskan penciri kualitas perguruan tinggi yang telah terdokumentasi di Pangkalan Data Pendidikan Tinggi dan melakukan telaah klasterisasi berdasarkan penciri tertentu untuk kepentingan pembinaan perguruan tinggi, kedua hal ini untuk membangun landasan bagi Kemendikbud dan Perguruan Tinggi untuk melakukan perbaikan terus-menerus dalam rangka meningkatkan performa dan kesehatan organisasi.\r\n\r\nPemeringkatan Perguruan Tinggi 2020 berfokus pada indikator atau penilaian yang berbasis Output – Outcome Base, yaitu dengan melihat Kinerja Masukan dengan bobot 45% yang meliputi kinerja Input (20%) dan Proses (25%), serta Kinerja Luaran dengan bobot 55% yang meliputi Kinerja Output (25%), dan Outcome (30%).\r\n\r\nPenilaian pada aspek input meliputi prosentase dosen berpendidikan S3, persentase dosen dalam jabatan lektor kepala dan guru besar, rasio jumlah dosen terhadap jumlah mahasiswa, jumlah mahasiswa asing, dan jumlah dosen bekerja sebagai praktisi di industri minimum 6 bulan.\r\n\r\nPada aspek proses terdapat 9 indikator yang digunakan antara lain Akreditasi Institusi, Akreditasi Program Studi, Pembelajaran Daring, Kerjasama perguruan tinggi, Kelengkapan Laporan PDDIKTI, Jumlah Program Studi bekerja sama dengan DUDI, NGO atau QS Top 100 WCU by subject, Jumlah Program Studi melaksanakan program merdeka belajar, Jumlah mahasiswa yang mengikuti Program Merdeka Belajar.\r\n\r\nPada aspek output, terdapat empat indikator yang digunakan antara lain jumlah artikel ilmiah terindeks per dosen, kinerja penelitian, kinerja kemahasiswaan, jumlah program studi yang telah memperoleh Akreditasi atau Sertifikasi International. Sementara pada aspek outcome, terdapat lima indikator yang digunakan antara lain kinerja inovasi, jumlah sitasi per dosen, jumlah patent per dosen, kinerja pengabdian masyarakat, dan persentase lulusan perguruan tinggi yang memperoleh pekerjaan dalam waktu 6 bulan.\r\n\r\nRektor Telkom University (Tel-U) Prof. Adiwijaya menyampaikan ucapan terima kasih yang sebesar-besarnya untuk Sivitas Akademika Telkom University dan Stakeholders atas pencapaian ini serta menekankan bahwa fokus Telkom University bukan pada hasil melainkan pada parameter penilaiannya.\r\n\r\n“Kami bersyukur atas capaian ini, terima kasih kepada seluruh Sivitas Akademika dan Stakeholders Telkom University atas segala kerja keras dan dukungannya. Lebih jauh, bukan hasil rankingnya yang menjadi fokus kami, namun penilaian terhadap parameter input, proses, output dan outcome menjadi ajang evaluasi diri bagi kami untuk terus melakukan continuous quality improvement. Semoga capaian ini menjadi penyemangat bagi seluruh Sivitas Akademika untuk selalu memberikan yang terbaik dalam berkontribusi untuk Bangsa Indonesia” Ucapnya.\r\n\r\nBerdasarkan indikator penilaian dari Kemendikbud, Adiwijaya menambahkan bawa Tel-U unggul dari sisi outcome yaitu pada kinerja inovasi dan pengabdian masyarakat, jumlah sitasi dan paten per dosen serta persentase penyerapan lulusan oleh industri dalam waktu 6 bulan.\r\n\r\n“Alhamdulillah dari kinerja outcome Tel-U memiliki nilai yang unggul dan masuk ke dalam 10 Besar Nasional. Hal ini karena Tel-U fokus pada pengembangan produk riset inovasi terbaik terbukti dengan diraihnya Anugerah IPTEK Widyapadhi sebagai PTS dengan manajemen inovasi terbaik di Indonesia. Selain itu juga Tel-U aktif dalam berbagai program kegiatan pengabdian masyarakat serta penyerapan lulusan di Industri dengan rata-rata masa tunggu 2,92 bulan dari hasil tracer studi” Jelasnya.\r\n\r\nDirektur Jenderal Pendidikan Tinggi, Prof. Nizam mengatakan klasterisasi perguruan tinggi yang dilakukan setiap tahun yang disusun Kemendikbud ini terdiri atas klaster 1 sampai 5. Klasterisasi ini bukan untuk memberikan pemeringkatan terhadap perguruan tinggi. Esensi dari klasterisasi ini adalah untuk mengelompokkan perguruan tinggi sesuai dengan level perkembangannya.\r\n\r\n“Klasterisasi perguruan tinggi ini kami melihat aspek manajemen secara keseluruhan. Jadi dari input, proses, output dan outcome,” Ucapnya saat konferensi pers daring, Senin (17/8/2020)\r\n\r\nBerdasarkan siaran pers Kemenristekdikti berikut 19 Perguruan Tinggi terbaik dari 2.136 Perguruan Tinggi di Indonesia pada tahun 2020:\r\n\r\nInstitut Pertanian Bogor (klaster 1)\r\nUniversitas Indonesia (klaster 1)\r\nUniversitas Gadjah Mada (klaster 1)\r\nUniversitas Airlangga (klaster 1)\r\nInstitut Teknologi Bandung (klaster 1)\r\nInstitut Teknologi Sepuluh November (klaster 1)\r\nUniversitas Hasanuddin (klaster 1)\r\nUniversitas Brawijaya (klaster 1)\r\nUniversitas Diponegoro (klaster 1)\r\nUniversitas Padjadjaran (klaster 1)\r\nUniversitas Sebelas Maret (klaster 1)\r\nUniversitas Negeri Yogyakarta (klaster 1)\r\nUniversitas Andalas (klaster 1)\r\nUniversitas Sumatera Utara (klaster 1)\r\nUniversitas Negeri Malang (klaster 1)\r\nUniversitas Pendidikan Indonesia (klaster 2)\r\nTelkom University (klaster 2)\r\nUniversitas Negeri Semarang (klaster 2)\r\nUniversitas Negeri Surabaya (klaster 2', 'Admin', '2020-08-20 10:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lab`
--

CREATE TABLE `tb_lab` (
  `id` varchar(64) NOT NULL,
  `images` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lab`
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
-- Table structure for table `tb_panel`
--

CREATE TABLE `tb_panel` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `video` varchar(500) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_panel`
--

INSERT INTO `tb_panel` (`id`, `title`, `slug`, `body`, `video`, `thumb`, `date_create`) VALUES
(99, 'Laboratorium, Studio & Bengkel Fakultas Industri Kreatif', 'laboratorium-studio-bengkel-fakultas-industri-kreatif', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid cum error quo eligendi doloremque molestias placeat animi a harum, optio fugit blanditiis! Incidunt sequi velit harum sapiente sed nemo ipsa.', 'Aimer_『ONE』Short_Ver.（_Aimer_5th_album『Sun_Dance』『Penny_Rain』2019_04_10（水）2枚同時発売）.mp4', 'thumbnail_panel.jpg', '2020-07-28 13:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id` varchar(64) NOT NULL,
  `title` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL,
  `body` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`id`, `title`, `images`, `body`, `date`) VALUES
('10', 'Lab. FIK Sekarang Sudah Aktif!', 'IMG_9473_edit.jpg', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam ab, architecto, impedit incidunt eaque odit vero, temporibus exercitationem recusandae deserunt beatae hic nihil! Aspernatur quod dolorum error laudantium corrupti in!', '2020-07-12 10:33:55'),
('14', 'Laboratorium Fakultas Industri Kreatif', 'IMG_9274.JPG', 'Laboratorium Fakultas Industri Kreatif', '2020-07-12 11:09:12'),
('5', 'Lab. FIK Sekarang Sudah Aktif!', '15.jpg', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam ab, architecto, impedit incidunt eaque odit vero, temporibus exercitationem recusandae deserunt beatae hic nihil! Aspernatur quod dolorum error laudantium corrupti in!', '2020-06-19 02:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
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
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`id`, `id_guidance`, `send_to`, `pdf_file`, `keterangan`, `date`, `status`) VALUES
('5f3e362c739ae', '5f3e32ceeb674', 'Semua', 'Algo_GP.pdf', 'Bab 1 Pendahuluan', '2020-08-20', 'Preview 1'),
('5f4297077880d', '5f3e32ceeb674', 'Semua', '43967_A_Drunkard’s_Walk.pdf, TELKOM-UNIVERSITY-PTS-NO-1.jpg', 'Second Files', '2020-08-23', 'Preview 2'),
('5f429a1400bff', '5f3e32ceeb674', 'Semua', 'favicon.png', 'Icon', '2020-08-23', 'Preview 3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(64) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `koordinator` varchar(1) NOT NULL,
  `dosen_wali` varchar(64) NOT NULL,
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `no_telp`, `nim`, `nip`, `koordinator`, `dosen_wali`, `prodi`, `kode_dosen`, `email`, `alamat`, `images`, `password`, `salt`, `role_id`, `is_active`, `date_created`, `status`) VALUES
('39', 'kaurlab', 'Kaur Lab ', '', '', 0, '', '', '', '', 'kaurlab@gmail.com', '0', 'default.jpg', '920c3713e13b091e73d17d35bd608079fc41724eca41b415f200e338dc59c531', '$2y$10$hctmRhwo9qxeJTvtzbn/kObWapiE8JSPX6jO72QAbp1HJfe4QBwEi', 2, 1, 1594554238, 'offline'),
('44', 'ihdar', 'Rafif ihdhar', '0851221132434', '1301130763', 0, '', '5f1e7dc5ca07e', 'Desain Komunikasi Visual', '', 'snowm60401@gmail.com', 'Bengkulu', '1.jpg', 'e41e13ea4344a5dab62674d6e08a24b75bf0d5bd7921c04c2a13fc80a6eda0e3', '$2y$10$sGYdQGJYGX9nCIDzkWoH3uibGxPC292Bf9nhIgO/TSkLz3Q3Sp1jO', 4, 1, 1594832402, 'online'),
('5f1e7dc5ca07e', 'sulthanangka', 'Muhammad Sulthan Angka Kurniawan', '0812234545', '', 2147483647, '', '1', 'Desain Komunikasi Visual', 'CSH10', 'sulthan.kurniawan@gmail.com', 'Bandung', 'default.jpg', '7e93fd68a7b5f0860784f35336a488910b3d6f2c088602a4a608e24ebeac3a36', '$2y$10$IXEl6J4l/ORTrf78B14hyewCsBz1Fyf4xM96cQPexqL.KqvJ4A2zC', 3, 1, 1595833797, 'offline'),
('5f2128a43c90b', 'akathan', 'akathan', '', '', 0, '1', '', 'Test', '', 'sulthan.angka@gmail.com', '0', 'default.jpg', '95b77ac94e00b2039b79d78e01ee5f941da1d074fae0a3a41636797e429bd860', '$2y$10$UdpWt4Uo/v1rlkzJxZqrdu7mlLiJbI3aRrmToglyIduVaYAsL7diG', 3, 1, 1596008612, 'offline'),
('5f28dbe13ddf9', 'manhattan', 'AX', '', '', 0, '', '', 'Desain Komunikasi Visual', '', 'manhattan@gmail.com', '0', 'default.jpg', '6b1d591c1e0149ac6db6b72993af5699878d3ff96b9a3db1802393bcc8e88608', '$2y$10$oVda9dQDlDUZxn0B4Ll.hOVZc1KrkDulpOpSXWS6qMpFaXUVB5826', 3, 1, 1596513249, 'offline'),
('5f3e31113e0d3', 'rochieko', 'Rochi Eko Pambudi', '08329634743', '1301170761', 0, '', '', 'Desain Komunikasi Visual', '', 'snowm6040@gmail.com', '0', 'default.jpg', '0409506e0855738c3297d9d520fa0ed68dae954baaec58100c64fff5b1c44879', '$2y$10$Pmz.lOPOCiydvg.mqJmyi.Zlt8eBHc41KBjRXtJtH0XFCo5RDZBVS', 4, 1, 1597911313, 'offline'),
('5f43c46f3b0df', 'adminlaa', 'Admin LAA', '', '', 0, '', '', '', '', 'adminlaafik@gmail.com', '0', 'default.jpg', '86f9d10cd1d13ff0ec318766b3ba445f0913f482d39581851a18bcd239dbd2cf', '$2y$10$NcoX.mxiqsXOR1DH2YJ9JeCVKPcxM5Quwnlk1hk28/Yh4cAAld9QS', 5, 1, 1598276719, 'offline'),
('8', 'admin', 'John Doe', '', '', 0, '', '', '', '', 'admin@gmail.com', '0', 'default.jpg', 'ec54193c7b13f115a35da3282d74a295af9a72ca8f8a5ebd9655dbf8eadd8a02', '$2y$10$jb3uBvvS41mfsMHU4xaICul08WsrJzMyLpiIVT9bpx06CQQ/vmNle', 1, 1, 0, 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Kepala Urusan'),
(3, 'Dosen'),
(4, 'Mahasiswa'),
(5, 'Admin LAA');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
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
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_kategori`
--
ALTER TABLE `child_kategori`
  ADD PRIMARY KEY (`id_ck`);

--
-- Indexes for table `correction`
--
ALTER TABLE `correction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosbing`
--
ALTER TABLE `dosbing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_pendaftaran`
--
ALTER TABLE `file_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guidance`
--
ALTER TABLE `guidance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategoriruangan`
--
ALTER TABLE `kategoriruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tampilan`
--
ALTER TABLE `tampilan`
  ADD PRIMARY KEY (`id_tampilan`);

--
-- Indexes for table `tampilan_like`
--
ALTER TABLE `tampilan_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lab`
--
ALTER TABLE `tb_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_panel`
--
ALTER TABLE `tb_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thesis`
--
ALTER TABLE `thesis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `child_kategori`
--
ALTER TABLE `child_kategori`
  MODIFY `id_ck` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tampilan`
--
ALTER TABLE `tampilan`
  MODIFY `id_tampilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tampilan_like`
--
ALTER TABLE `tampilan_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_panel`
--
ALTER TABLE `tb_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
