-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2020 at 05:45 AM
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
('5f1a5673a36e5', '44', '5f15e3276fe2b', '2020-07-24', '0000-00-00', '14.30 - 15.30, 15.30 - 16.30, 16.30 - 17.30', 'Testing', 'Menunggu Acc', '2020-07-25 18:37:26'),
('5f1a5d8261d27', '44', '5f15e3276fe2b', '2020-07-24', '0000-00-00', '12.30 - 13.30, 13.30 - 14.30', 'kelas', 'Menunggu Acc', '2020-07-25 18:37:26'),
('5f1a5dfe86920', '44', '5f15e3276fe2b', '2020-07-24', '0000-00-00', '06.30 - 07.30, 07.30 - 08.30', 'kelas', 'Diterima', '2020-07-25 18:37:26'),
('5f1d2a87278ce', '44', '1', '0000-00-00', '2020-07-26', '13.30 - 14.30, 14.30 - 15.30, 15.30 - 16.30', 'Testing for schedule', 'Ditolak', '2020-07-26 14:02:31'),
('5f3a1b68280f7', '5f2930fa9e732', '5f15e3276fe2b', '2020-08-18', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30, 10.30 - 11.30', 'Test', 'Menunggu Acc', '2020-08-17 12:53:44'),
('5f3a214417bb0', '44', '10', '2020-08-19', '0000-00-00', '09.30 - 10.30', 'For testing', 'Menunggu Acc', '2020-08-17 13:18:44');

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
('5f27c630e7f32', '39', '8', 'test', '', '', '', '2020-08-03 15:09:20', '', 'unread'),
('5f27c9c7e948c', '8', '39', 'halo', '', '', '', '2020-08-03 15:24:39', '', 'unread'),
('5f27c9ca279f1', '8', '39', 'wow bisa', '', '', '', '2020-08-03 15:24:42', '', 'unread'),
('5f27cd4b5960b', '5f1e7dc5ca07e', '8', 'hi admin', '', '', '', '2020-08-03 15:39:39', '', 'unread'),
('5f27cd5881d65', '5f1e7dc5ca07e', '8', 'ini chat dari mobile lhoo', '', '', '', '2020-08-03 15:39:52', '', 'unread'),
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
('5f31097c32abc', '5f1e7dc5ca07e', '5f310973f0bda', '2020-08-10 15:46:52', 'Sudah Disetujui'),
('5f310980bdbd7', '5f28dbe13ddf9', '5f310973f0bda', '2020-08-10 15:46:56', 'Sudah Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `guidance`
--

CREATE TABLE `guidance` (
  `id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `id_mhs` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `judul` varchar(255) NOT NULL,
  `peminatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guidance`
--

INSERT INTO `guidance` (`id`, `id_mhs`, `judul`, `peminatan`) VALUES
('5f310973f0bda', '44', 'Lorem Ipsum', 'Advertising');

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
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `id_kategori`, `ruangan`, `akses`, `kapasitas`, `images`) VALUES
('1', '2', 'IK.01.02', 'Mahasiswa', 39, 'default1.jpg'),
('10', '11', 'IK.01.09', 'Dosen, Mahasiswa', 41, 'default.jpg'),
('17', '11', 'IK.02.02', 'Dosen, Mahasiswa', 34, 'default.jpg'),
('4', '9', 'IK.01.01', 'Dosen, Mahasiswa', 40, 'default.jpg'),
('5', '4', 'IK.01.05', 'Mahasiswa', 21, 'default2.jpg'),
('5f15e3276fe2b', '10', 'IK.02.10', 'Mahasiswa', 34, 'default.jpg'),
('6', '3', 'IK.02.04', 'Dosen, Mahasiswa', 25, 'default3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tampilan`
--

CREATE TABLE `tampilan` (
  `id_tampilan` int(11) NOT NULL,
  `id` varchar(64) NOT NULL,
  `slug_tampilan` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_ck` int(11) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `nim` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `No_wa` int(15) NOT NULL,
  `No_hp` int(15) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `views` int(11) NOT NULL DEFAULT 0,
  `judul` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tampilan`
--

INSERT INTO `tampilan` (`id_tampilan`, `id`, `slug_tampilan`, `id_kategori`, `id_ck`, `type`, `nim`, `gambar`, `No_wa`, `No_hp`, `tanggal_post`, `tanggal_update`, `views`, `judul`, `deskripsi`, `likes`, `status`) VALUES
(9, '5f1e7dc5ca07e', 'fashion', 1, 8, 'Foto', 1301174655, '50027080802_bbb3236058_c.jpg', 2147483647, 2147483647, '2020-08-05 07:33:01', '2020-08-09 05:05:32', 2, 'fashion', 'fahion terkini', 0, 'Diterima'),
(10, '44', 'apa-aja', 7, NULL, 'Video', 1301174633, 'Profil_Fakultas_Industri_Kreatif_-_TELKOM_UNIVERSITY.mp4', 2147483647, 2147483647, '2020-08-05 07:45:14', '2020-08-09 05:08:20', 1, 'apa aja', 'yuk bisa yuk', 1, 'Diterima'),
(11, '38', 'desain-ruang-keluarga', 5, NULL, 'Foto', 1301112311, '11.jpg', 2147483647, 2147483647, '2020-08-05 07:53:57', '2020-08-09 05:05:02', 7, 'desain ruang keluarga', 'desain interior rumah', 0, 'Diterima'),
(12, '44', 'wall-creativity', 7, NULL, 'Foto', 1301170100, '1238334.jpg', 2147483647, 2147483647, '2020-08-09 12:01:55', '2020-08-09 05:06:57', 0, 'Wall Creativity', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 'Diterima');

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
  `title` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL,
  `body` varchar(600) NOT NULL,
  `uploadby` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_info`
--

INSERT INTO `tb_info` (`id`, `title`, `images`, `body`, `uploadby`, `date`) VALUES
('5', 'Informasi 1', 'Classroom-without-windows-Pixabay1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Administrator', '2020-07-25 19:17:55'),
('5f1c2350e4e4b', 'informasi 2', 'Cat1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Administrator', '2020-07-25 19:19:28'),
('5f1d2d6cc3194', 'Informasi Updated', 'IMG_9534_edit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Admin', '2020-07-26 14:14:52'),
('5f1d30f88809f', 'Information', 'default.jpg', 'Lorem ipsum dolor amet', 'Admin', '2020-07-26 14:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lab`
--

CREATE TABLE `tb_lab` (
  `id` varchar(64) NOT NULL,
  `images` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lab`
--

INSERT INTO `tb_lab` (`id`, `images`, `title`, `body`, `date`) VALUES
('5f1b8caf058b4', 'IMG_9534_edit1.jpg', 'Lab. Batik', 'Lab Batik merupakan sarana maupun tempat yang memfasilitasi pembuatan sebuah batik. Proses pembuatan dari awal hingga akhir hingga terciptanya sebuah kain batik yang cantik. Selain pembuatan batik, Lab batik juga berfungsi sebagai tempat penelitian maupun kegiatan-kegiatan abdimas.', '2020-07-25 01:36:47'),
('5f1b93c2bdb1f', 'IMG_92741.JPG', 'Lab. CGI', 'Lab Computer Generated Imagery (CGI) merupakan salah satu sarana fasilitas yang memiliki software-software standar industri terkini untuk mendukung mahasiswanya mengerjakan proyek-proyek berkaitan dengan CGI dengan lancar.', '2020-07-25 02:06:58'),
('5f1b95d912037', 'IMG_9189_edit1.jpg', 'Lab. Mac', 'Lab Mac merupakan satu dari beberapa lab komputer berbasis sistem operating Macintosh dengan kapasitas yang bisa mendukung sampai dengan 25 mahasiswa dalam proses belajar mengajar. Lab ini juga dilengkapi dengan software-software pendukung terkini yang dapat diakses secara mudah oleh mahasiswanya.', '2020-07-25 02:15:53'),
('5f1b960077560', 'IMG_93141.JPG', 'Lab. Bengkel', 'Lab Bengkel adalah salah satu lab yang berada di FIK yang dilengkapi dengan beberapa peralatan seperti: Mesin table saw, mesin gerinda, mesin bubut kayu, mesin amplas, bench drilling dan lain-lain untuk mendukung mahasiswa dalam mengerjakan pekerjaan pendekatan experimental pada Kuliah Kerja \r\nStudio, Proyek Akhir maupun tesis.', '2020-07-25 02:16:32'),
('5f1b9649ea263', 'IMG_9166_edit1.jpg', 'Lab. Multimedia', 'Lab Multimedia dirancang untuk memfasilitasi mahasiswanya dalam mengerjakan pekerjaan multimedia dengan lancar. Fasilitas yang mendukung seperti software terkini memudahkan mahasiswanya untuk menjangkau software-software yang digunakan pada industri kreatif yang ada.', '2020-07-25 02:17:45'),
('5f1b96dbac690', 'IMG_9675_edit1.jpg', 'Lab. Pola dan Jahit', 'Lab Pola dan Jahit dirancang dengan space yang cukup besar agar mahasiswa dapat dengan leluasa menggunakan sarana untuk tempat menjahit dan membuat pola.', '2020-07-25 02:20:11'),
('5f1ce025887f9', 'IMG_9181_edit.jpg', 'Lab. Cintiq', 'Lab Komputer Multimedia Cintiq merupakan salah satu dari beberapa lab yang memiliki alat canggih untuk mendukung menggambar secara digital maupun membuat animasi. Dilengkapi dengan Wacom Cintiq disetiap mejanya, Lab ini bisa menampung kurang lebih 25 mahasiswa. ', '2020-07-26 01:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_panel`
--

CREATE TABLE `tb_panel` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `video` varchar(500) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_panel`
--

INSERT INTO `tb_panel` (`id`, `title`, `body`, `video`, `thumb`, `date_create`) VALUES
(99, 'Laboratorium, Studio & Bengkel Fakultas Industri Kreatif', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid cum error quo eligendi doloremque molestias placeat animi a harum, optio fugit blanditiis! Incidunt sequi velit harum sapiente sed nemo ipsa.', 'Profil_Fakultas_Industri_Kreatif_-_TELKOM_UNIVERSITY.mp4', 'thumbnail_panel.jpg', '2020-07-28 13:33:06');

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
  `pdf_file` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `keterangan` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`id`, `id_guidance`, `send_to`, `pdf_file`, `keterangan`, `date`, `status`) VALUES
('5f3109f12b3a5', '5f310973f0bda', 'Semua', 'Algo_GP.pdf', 'Bab  1 Latar Belakang', '2020-08-10', 'Selesai'),
('5f3a46ba1fed7', '5f310973f0bda', 'Semua', '201810_-_Jurnal_Informatika_Komputer_V12_N2_-_Perancangan_Sistem', 'Bab 2', '2020-08-17', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(64) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `prodi` varchar(64) NOT NULL,
  `kode_dosen` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
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

INSERT INTO `user` (`id`, `username`, `name`, `nim`, `nip`, `prodi`, `kode_dosen`, `email`, `images`, `password`, `salt`, `role_id`, `is_active`, `date_created`, `status`) VALUES
('	\r\n5f140497dd7ef', 'rochieko', 'Rochi Eko Pambudi', '1301170000', 0, 'Desain Komunikasi Visual', '', 'snowm6040@gmail.com', 'default.jpg', '30d1e0e1e87348b55d99de515ee4f532f3cf1c47b2704a9771835ab0243a1df5', '$2y$10$5JTbxPPulWFi1ReneZIlW.07WuVhXD9GP5czPxPoNh8ckh7dXQI2.', 4, 1, 1596535034, 'offline'),
('39', 'kaurlab', 'Kaur Lab ', '', 0, '', '', 'kaurlab@gmail.com', 'default.jpg', '920c3713e13b091e73d17d35bd608079fc41724eca41b415f200e338dc59c531', '$2y$10$hctmRhwo9qxeJTvtzbn/kObWapiE8JSPX6jO72QAbp1HJfe4QBwEi', 2, 1, 1594554238, 'offline'),
('44', 'ihdar', 'Rafif ihdhar', '1301174633', 0, 'Desain Komunikasi Visual', '', 'snowm60401@gmail.com', '1.jpg', 'e41e13ea4344a5dab62674d6e08a24b75bf0d5bd7921c04c2a13fc80a6eda0e3', '$2y$10$sGYdQGJYGX9nCIDzkWoH3uibGxPC292Bf9nhIgO/TSkLz3Q3Sp1jO', 4, 1, 1594832402, 'online'),
('5f1e7dc5ca07e', 'sulthanangka', 'Muhammad Sulthan Angka Kurniawan', '', 0, 'Desain Komunikasi Visual', '', 'sulthan.kurniawan@gmail.com', 'default.jpg', '7e93fd68a7b5f0860784f35336a488910b3d6f2c088602a4a608e24ebeac3a36', '$2y$10$IXEl6J4l/ORTrf78B14hyewCsBz1Fyf4xM96cQPexqL.KqvJ4A2zC', 3, 1, 1595833797, 'offline'),
('5f2128a43c90b', 'akathan', 'akathan', '', 0, 'Test', '', 'sulthan.angka@gmail.com', 'default.jpg', '95b77ac94e00b2039b79d78e01ee5f941da1d074fae0a3a41636797e429bd860', '$2y$10$UdpWt4Uo/v1rlkzJxZqrdu7mlLiJbI3aRrmToglyIduVaYAsL7diG', 3, 1, 1596008612, 'offline'),
('5f28dbe13ddf9', 'manhattan', 'Manhattan', '', 0, 'Desain Komunikasi Visual', '', 'manhattan@gmail.com', 'default.jpg', '6b1d591c1e0149ac6db6b72993af5699878d3ff96b9a3db1802393bcc8e88608', '$2y$10$oVda9dQDlDUZxn0B4Ll.hOVZc1KrkDulpOpSXWS6qMpFaXUVB5826', 3, 1, 1596513249, 'offline'),
('8', 'admin', 'John Doe', '', 0, '', '', 'admin@gmail.com', 'default.jpg', 'ec54193c7b13f115a35da3282d74a295af9a72ca8f8a5ebd9655dbf8eadd8a02', '$2y$10$jb3uBvvS41mfsMHU4xaICul08WsrJzMyLpiIVT9bpx06CQQ/vmNle', 1, 1, 0, 'offline');

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
(4, 'Mahasiswa');

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
-- Indexes for table `dosbing`
--
ALTER TABLE `dosbing`
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
  MODIFY `id_tampilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
