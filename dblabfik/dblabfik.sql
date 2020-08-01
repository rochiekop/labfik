-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2020 pada 11.01
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
('5f17a08ae0d85', '38', '5f15e3276fe2b', '2020-07-23', '0000-00-00', '07.30 - 08.30, 08.30 - 09.30', 'Kelas', 'Diterima', '2020-07-25 18:37:26'),
('5f17c81e23361', '5f140497dd7ef', '17', '2020-07-22', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30, 10.30 - 11.30', 'Kelas Pengganti', 'Diterima', '2020-07-25 18:37:26'),
('5f17d4cd66afd', '38', '5f15e3276fe2b', '0000-00-00', '2020-07-22', '10.30 - 11.30, 11.30 - 12.30, 12.30 - 13.30', 'Kelas', 'Ditolak', '2020-07-25 18:37:26'),
('5f17d96f202c2', '38', '5f15e3276fe2b', '0000-00-00', '2020-07-22', '06.30 - 07.30, 07.30 - 08.30', 'tes', 'Ditolak', '2020-07-25 18:37:26'),
('5f18707b13a27', '38', '5f15e3276fe2b', '2020-07-22', '0000-00-00', '13.30 - 14.30', 'Kelas', 'Diterima', '2020-07-25 18:37:26'),
('5f190ddf205c0', '44', '17', '0000-00-00', '2020-07-23', '06.30 - 07.30, 07.30 - 08.30', 'Test', 'Ditolak', '2020-07-25 18:37:26'),
('5f1913f13985f', '44', '17', '2020-07-23', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30', 'Testing', 'Menunggu Acc', '2020-07-25 18:37:26'),
('5f1943bf71f4f', '44', '5f15e3276fe2b', '2020-07-23', '0000-00-00', '09.30 - 10.30, 10.30 - 11.30, 11.30 - 12.30', 'Testing', 'Menunggu Acc', '2020-07-25 18:37:26'),
('5f1a463028b0b', '44', '5f15e3276fe2b', '0000-00-00', '2020-07-24', '07.30 - 08.30', 'Kelas Pengganti', 'Ditolak', '2020-07-25 18:37:26'),
('5f1a467fec338', '44', '5f15e3276fe2b', '2020-07-24', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30', 'Testing', 'Menunggu Acc', '2020-07-25 18:37:26'),
('5f1a5673a36e5', '44', '5f15e3276fe2b', '2020-07-24', '0000-00-00', '14.30 - 15.30, 15.30 - 16.30, 16.30 - 17.30', 'Testing', 'Menunggu Acc', '2020-07-25 18:37:26'),
('5f1a5d8261d27', '44', '5f15e3276fe2b', '2020-07-24', '0000-00-00', '12.30 - 13.30, 13.30 - 14.30', 'kelas', 'Menunggu Acc', '2020-07-25 18:37:26'),
('5f1a5dfe86920', '44', '5f15e3276fe2b', '2020-07-24', '0000-00-00', '06.30 - 07.30, 07.30 - 08.30', 'kelas', 'Diterima', '2020-07-25 18:37:26'),
('5f1c1a532425f', '5f140497dd7ef', '17', '2020-07-25', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30, 10.30 - 11.30', 'Booking by Admin', 'Menunggu Acc', '2020-07-25 18:41:07'),
('5f1d2a87278ce', '44', '1', '0000-00-00', '2020-07-26', '13.30 - 14.30, 14.30 - 15.30, 15.30 - 16.30', 'Testing for schedule', 'Ditolak', '2020-07-26 14:02:31');

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
('5f21babf33b7a', '8', '39', 'test', '', '', '', '2020-07-30 01:06:55', '', 'unread'),
('5f2278b77b772', '5f1e7dc5ca07e', '8', 'NULL', 'images_(3).jpeg', '.jpeg', 'image/jpeg', '2020-07-30 14:37:27', '', 'unread');

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
(1, 7, 'Fotografi Dasar dan Periklanan', '2020-07-09 11:46:58'),
(2, 6, 'tata busana', '2020-07-11 23:49:58'),
(4, 2, 'Semantika Produk', '2020-07-18 14:44:17');

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
('5f12ccfe4afe8', '403 gambar', 10, 'Semua', '5f12ccfe4afe8.PNG', 'test'),
('5f12cd6abdba2', 'test', 4, 'Dosen', '5f12cd6abdba2.PNG', 'test'),
('5f12cdf2debfe', 'test', 4, 'Mahasiswa', '5f12cdf2debfe.PNG', 'test'),
('5f12ce7d3da21', 'coba', 6, 'Dosen', '5f12ce7d3da21.PNG', 'test');

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
(6, 'Desain Fashion', 'desain-fashion', 4, '2020-06-18 02:55:38'),
(7, 'Seni Rupa', 'seni-rupa', 5, '2020-06-18 02:55:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoriruangan`
--

CREATE TABLE `kategoriruangan` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategoriruangan`
--

INSERT INTO `kategoriruangan` (`id`, `kategori`, `date_created`) VALUES
(1, 'Lab Macintosh', '2020-07-16 12:47:58'),
(2, 'Lab Cintiq', '2020-07-16 12:47:58'),
(3, 'Lab Batik', '2020-07-16 12:47:58'),
(4, 'Lab Lukis', '2020-07-16 12:47:58'),
(5, 'Lab Sablon', '2020-07-16 12:47:58'),
(6, 'Lab Multimedia', '2020-07-16 12:47:58'),
(7, 'Lab Pola dan Jahit', '2020-07-16 12:47:58'),
(8, 'Studio Musik', '2020-07-16 12:47:58'),
(9, 'Studio Fotografi', '2020-07-16 12:47:58'),
(10, 'Studio Videografi', '2020-07-16 12:47:58');

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
  `news_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `thesis_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `subject` enum('','booking','borrowing','creation','chat','news','thesis') CHARACTER SET utf8mb4 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('unread','read') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `booking_id`, `borrowing_id`, `creation_id`, `chat_id`, `news_id`, `thesis_id`, `subject`, `description`, `date`, `status`) VALUES
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
-- Struktur dari tabel `ruangan`
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
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id`, `id_kategori`, `ruangan`, `akses`, `kapasitas`, `images`) VALUES
('1', '2', 'IK.01.02', 'Mahasiswa', 39, 'default1.jpg'),
('10', '11', 'IK.01.09', 'Dosen, Mahasiswa', 41, 'default.jpg'),
('17', '11', 'IK.02.02', 'Dosen, Mahasiswa', 34, 'default.jpg'),
('4', '9', 'IK.01.01', 'Dosen, Mahasiswa', 40, 'default.jpg'),
('5', '4', 'IK.01.05', 'Mahasiswa', 21, 'default2.jpg'),
('6', '3', 'IK.02.04', 'Dosen, Mahasiswa', 25, 'default3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` varchar(64) NOT NULL,
  `room_id` varchar(64) NOT NULL,
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tampilan`
--

CREATE TABLE `tampilan` (
  `id_tampilan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `slug_tampilan` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_ck` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL DEFAULT '0',
  `nim` int(20) NOT NULL,
  `kode_tampilan` varchar(255) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tampilan`
--

INSERT INTO `tampilan` (`id_tampilan`, `id`, `slug_tampilan`, `id_kategori`, `id_ck`, `gambar`, `tanggal_post`, `tanggal_update`, `views`, `nim`, `kode_tampilan`, `judul`, `deskripsi`, `keywords`, `likes`, `status`) VALUES
(3, 44, 'cyberpunk-001', 7, 1, '1238334.jpg', '2020-07-26 17:43:19', '2020-07-26 10:55:19', 1, 1301196969, '001', 'cyberpunk', 'calon game terbaik tahun 2020', 'punk', 1, 'Diterima'),
(4, 38, 'witcher-002', 7, 1, '2226191.jpg', '2020-07-26 17:45:48', '2020-07-26 10:47:42', 1, 1301121313, '002', 'witcher', 'game of the year 2017', 'witch', 0, 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_info`
--

CREATE TABLE `tb_info` (
  `id` varchar(64) NOT NULL,
  `title` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL,
  `body` varchar(600) NOT NULL,
  `uploadby` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_info`
--

INSERT INTO `tb_info` (`id`, `title`, `images`, `body`, `uploadby`, `date`) VALUES
('5', 'Informasi 1', 'Classroom-without-windows-Pixabay1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Administrator', '2020-07-25 19:17:55'),
('5f1c2350e4e4b', 'informasi 2', 'Cat1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Administrator', '2020-07-25 19:19:28'),
('5f1d2d6cc3194', 'Informasi Updated', 'IMG_9534_edit.jpg', 'lorem ipsum', 'Admin', '2020-07-26 14:14:52'),
('5f1d30f88809f', 'Information', 'default.jpg', 'Lorem ipsum dolor amet', 'Admin', '2020-07-26 14:30:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lab`
--

CREATE TABLE `tb_lab` (
  `id` varchar(64) NOT NULL,
  `images` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lab`
--

INSERT INTO `tb_lab` (`id`, `images`, `title`, `body`, `date`) VALUES
('5f1b8caf058b4', 'IMG_9534_edit1.jpg', 'Lab. Batik', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-07-25 01:36:47'),
('5f1b93c2bdb1f', 'IMG_92741.JPG', 'Lab. CGI', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-07-25 02:06:58'),
('5f1b95d912037', 'IMG_9189_edit1.jpg', 'Lab. Mac', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-07-25 02:15:53'),
('5f1b960077560', 'IMG_93141.JPG', 'Lab. Bengkel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-07-25 02:16:32'),
('5f1b9649ea263', 'IMG_9166_edit1.jpg', 'Lab. Multimedia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-07-25 02:17:45'),
('5f1b96dbac690', 'IMG_9675_edit1.jpg', 'Lab. Pola dan Jahit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-07-25 02:20:11'),
('5f1ce025887f9', 'IMG_9181_edit.jpg', 'Lab. Sintik', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-07-26 01:45:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_panel`
--

CREATE TABLE `tb_panel` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `video` varchar(500) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_panel`
--

INSERT INTO `tb_panel` (`id`, `title`, `body`, `video`, `thumb`, `date_create`) VALUES
(99, 'Laboratorium, Studio & Bengkel Fakultas Industri Kreatif', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid cum error quo eligendi doloremque molestias placeat animi a harum, optio fugit blanditiis! Incidunt sequi velit harum sapiente sed nemo ipsa.', 'Profil_Fakultas_Industri_Kreatif_-_TELKOM_UNIVERSITY.mp4', 'thumbnail_panel.jpg', '2020-07-28 13:33:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL,
  `body` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_slider`
--

INSERT INTO `tb_slider` (`id`, `title`, `images`, `body`, `date`) VALUES
(5, '', 'Classroom-without-windows-Pixabay.jpg', 'Lab. FIK Sekarang Sudah Aktif!', '2020-06-19 02:33:56'),
(10, 'Fakultas Industri Kreatif V2 Edit', 'IMG_9271_edit.jpg', 'LAB FIK TEL-U', '2020-07-12 10:33:55'),
(14, 'Laboratorium Fakultas Industri Kreatif', 'IMG_9274.JPG', 'Laboratorium Fakultas Industri Kreatif', '2020-07-12 11:09:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(64) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `email`, `images`, `password`, `salt`, `role_id`, `is_active`, `date_created`, `status`) VALUES
('38', 'rochieko', 'Rochi Eko Pambudi', 'snowm60401@gmail.com', 'default.jpg', 'a4dd82e95096136291c033406a6b25f598b0eb0e0444b554706b926690bbc16f', '$2y$10$zBadfaR3yj3UEYWGaFLafOUv5uP6UkMBy691b9a54fjBhKDFQ8G7q', 3, 1, 1594543149, 'offline'),
('39', 'kaurlab', 'Kaur Lab ', 'kaurlab@gmail.com', 'default.jpg', '920c3713e13b091e73d17d35bd608079fc41724eca41b415f200e338dc59c531', '$2y$10$hctmRhwo9qxeJTvtzbn/kObWapiE8JSPX6jO72QAbp1HJfe4QBwEi', 2, 1, 1594554238, 'offline'),
('44', 'jhondoe', 'Jhon Doe Version 2', 'snowm6040@gmail.com', 'default.jpg', 'e41e13ea4344a5dab62674d6e08a24b75bf0d5bd7921c04c2a13fc80a6eda0e3', '$2y$10$sGYdQGJYGX9nCIDzkWoH3uibGxPC292Bf9nhIgO/TSkLz3Q3Sp1jO', 4, 1, 1594832402, 'offline'),
('5f1e7dc5ca07e', 'sulthanangka', 'Muhammad Sulthan Angka Kurniawan', 'sulthan.kurniawan@gmail.com', 'default.jpg', '7e93fd68a7b5f0860784f35336a488910b3d6f2c088602a4a608e24ebeac3a36', '$2y$10$IXEl6J4l/ORTrf78B14hyewCsBz1Fyf4xM96cQPexqL.KqvJ4A2zC', 4, 1, 1595833797, 'online'),
('5f2128a43c90b', 'akathan', 'akathan', 'sulthan.angka@gmail.com', 'default.jpg', '95b77ac94e00b2039b79d78e01ee5f941da1d074fae0a3a41636797e429bd860', '$2y$10$UdpWt4Uo/v1rlkzJxZqrdu7mlLiJbI3aRrmToglyIduVaYAsL7diG', 4, 1, 1596008612, 'offline'),
('8', 'admin', 'John Doe', 'admin@gmail.com', 'default.jpg', 'ec54193c7b13f115a35da3282d74a295af9a72ca8f8a5ebd9655dbf8eadd8a02', '$2y$10$jb3uBvvS41mfsMHU4xaICul08WsrJzMyLpiIVT9bpx06CQQ/vmNle', 1, 1, 0, 'online');

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
(1, 'Administrator'),
(2, 'Kepala Urusan'),
(3, 'Dosen'),
(4, 'Mahasiswa');

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
-- Indeks untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indeks untuk tabel `tampilan`
--
ALTER TABLE `tampilan`
  ADD PRIMARY KEY (`id_tampilan`);

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
-- AUTO_INCREMENT untuk tabel `kategoriruangan`
--
ALTER TABLE `kategoriruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tampilan`
--
ALTER TABLE `tampilan`
  MODIFY `id_tampilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_panel`
--
ALTER TABLE `tb_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
