-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2020 pada 10.19
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
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `id_peminjam`, `id_ruangan`, `date`, `date_declined`, `time`, `keterangan`, `status`) VALUES
('5f17a08ae0d85', '38', '5f15e3276fe2b', '2020-07-23', '0000-00-00', '07.30 - 08.30, 08.30 - 09.30', 'Kelas', 'Diterima'),
('5f17c81e23361', '5f140497dd7ef', '17', '2020-07-22', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30, 10.30 - 11.30', 'Kelas Pengganti', 'Diterima'),
('5f17d4cd66afd', '38', '5f15e3276fe2b', '2020-07-22', '0000-00-00', '10.30 - 11.30, 11.30 - 12.30, 12.30 - 13.30', 'fgfdgf', 'Menunggu Acc'),
('5f17d96f202c2', '38', '5f15e3276fe2b', '0000-00-00', '2020-07-22', '06.30 - 07.30, 07.30 - 08.30', 'tes', 'Ditolak'),
('5f18707b13a27', '38', '5f15e3276fe2b', '2020-07-22', '0000-00-00', '13.30 - 14.30', 'fdsdf', 'Menunggu Acc'),
('5f187a3ecb692', '38', '5f15e3276fe2b', '2020-07-22', '0000-00-00', '08.30 - 09.30, 09.30 - 10.30', 'fdgf', 'Menunggu Acc');

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
('5f150944e9609', '8', '5f12ccfe4afe8', 1, '2020-07-20 12:02:00', '2020-07-20 13:02:00', 'testing', 'Menunggu_Izin'),
('5f150c74adc88', '8', '5f12ce7d3da21', 1, '2020-07-20 10:15:00', '2020-07-20 11:16:00', 'untuk kelas', 'Menunggu_Izin'),
('5f1513bc63bfb', '38', '5f12ce7d3da21', 1, '2020-07-20 10:46:00', '2020-07-20 11:47:00', 'untuk kelas', 'Menunggu_Izin'),
('5f1be6c8ac198', '8', '5f12ccfe4afe8', 1, '2020-07-25 15:01:00', '2020-07-25 16:01:00', 'testing notifikasi', 'Menunggu_Izin'),
('5f1be80d5cc11', '8', '5f12ccfe4afe8', 1, '2020-07-25 15:06:00', '2020-07-25 16:06:00', 'test notifikasi', 'Menunggu_Izin'),
('5f1be87feef78', '8', '5f12ccfe4afe8', 1, '2020-07-25 15:08:00', '2020-07-25 16:08:00', 'test notifikasi peminjaman barang', 'Menunggu_Izin'),
('5f1be918cc49f', '8', '5f12ccfe4afe8', 1, '2020-07-25 15:11:00', '2020-07-25 16:11:00', 'test peminjaman barang', 'Menunggu_Izin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `attachment_name` text NOT NULL,
  `file_ext` text NOT NULL,
  `mime_type` text NOT NULL,
  `message_date_time` text NOT NULL,
  `ip_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `receiver_id`, `message`, `attachment_name`, `file_ext`, `mime_type`, `message_date_time`, `ip_address`) VALUES
(304, 39, 8, 'ngubah gak ya?', '', '', '', '2020-07-23 10:37:38', ''),
(305, 39, 8, 'dan.. tidak berubah sama sekali', '', '', '', '2020-07-23 10:37:46', ''),
(306, 39, 8, 'padahal js nya udah ganti sejak lama', '', '', '', '2020-07-23 10:37:54', ''),
(307, 8, 39, 'its working here now', '', '', '', '2020-07-23 10:38:32', ''),
(308, 8, 39, 'for some reason', '', '', '', '2020-07-23 10:38:42', ''),
(309, 8, 39, 'oh this is just swell...', '', '', '', '2020-07-23 10:38:50', ''),
(310, 8, 39, 'im totally confused', '', '', '', '2020-07-23 10:38:55', ''),
(311, 8, 39, 'will this work?', '', '', '', '2020-07-23 10:39:39', ''),
(312, 8, 39, 'and it still works', '', '', '', '2020-07-23 10:39:47', ''),
(313, 8, 39, 'change?', '', '', '', '2020-07-23 11:11:58', ''),
(314, 8, 39, 'nope', '', '', '', '2020-07-23 11:12:01', ''),
(315, 38, 8, 'test', '', '', '', '2020-07-23 11:15:18', ''),
(316, 38, 8, 'assalamualaikum', '', '', '', '2020-07-23 11:15:23', ''),
(317, 38, 8, 'ini test menggunakan smartphone', '', '', '', '2020-07-23 11:16:04', ''),
(318, 38, 8, 'testing', '', '', '', '2020-07-23 11:16:32', ''),
(319, 38, 8, 'testing', '', '', '', '2020-07-23 11:16:56', ''),
(320, 38, 8, 'again', '', '', '', '2020-07-23 11:17:01', ''),
(321, 38, 8, 'halo', '', '', '', '2020-07-23 11:17:12', ''),
(322, 8, 38, 'nama saya john doe', '', '', '', '2020-07-23 11:19:00', ''),
(323, 8, 38, 'saya suka apel', '', '', '', '2020-07-23 11:20:34', ''),
(324, 38, 8, 'oh ya? saya juga suka', '', '', '', '2020-07-23 11:20:56', ''),
(325, 8, 38, 'masa sih? sama dong', '', '', '', '2020-07-23 11:21:05', ''),
(326, 38, 8, 'NULL', 'IMG_20200708_222111.jpg', '.jpg', 'image/jpeg', '2020-07-23 11:21:48', ''),
(327, 8, 38, 'NANI?!', '', '', '', '2020-07-23 11:22:35', ''),
(328, 8, 38, 'bisa enggak sekarang?', '', '', '', '2020-07-23 11:45:07', ''),
(329, 8, 38, 'tetep aja aneh ya', '', '', '', '2020-07-23 11:45:16', ''),
(330, 8, 38, 'hmm.... kayanya ada yg salah', '', '', '', '2020-07-23 11:45:25', ''),
(331, 39, 8, 'huft.. this is confusing', '', '', '', '2020-07-23 11:46:44', ''),
(332, 38, 8, 'padahal img harusnya gak ada tapi tetep aja ada', '', '', '', '2020-07-23 13:28:20', ''),
(333, 39, 8, 'Test', '', '', '', '2020-07-23 21:17:57', ''),
(334, 8, 39, 'hi mami', '', '', '', '2020-07-23 21:18:17', ''),
(335, 39, 8, 'Testing mas', '', '', '', '2020-07-23 21:18:36', ''),
(336, 8, 39, 'dapet chat nya mam?', '', '', '', '2020-07-23 21:18:36', ''),
(337, 39, 8, 'Dapet', '', '', '', '2020-07-23 21:18:45', ''),
(338, 39, 8, 'Alhamdulillah', '', '', '', '2020-07-23 21:18:50', ''),
(339, 39, 8, 'Semangat terus yaaaa', '', '', '', '2020-07-23 21:18:55', ''),
(340, 8, 39, 'few bugs', '', '', '', '2020-07-24 13:13:39', ''),
(341, 8, 39, 'but so far its working', '', '', '', '2020-07-24 13:13:44', '');

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
  `gallery_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('unread','read') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tampilan`
--

INSERT INTO `tampilan` (`id_tampilan`, `id`, `slug_tampilan`, `id_kategori`, `id_ck`, `gambar`, `tanggal_post`, `tanggal_update`, `views`, `nim`, `kode_tampilan`, `judul`, `deskripsi`, `keywords`, `likes`) VALUES
(39, 8, 'witcher', 7, 1, '222619.jpg', '2020-07-18 11:35:50', '2020-07-20 03:36:25', 7, 1301174665, '001', 'witcher', 'game terbaik tahun 2017', 'witch', 0),
(40, 38, 'cyberpunk', 7, 1, '1238334.jpg', '2020-07-18 12:36:29', '2020-07-20 04:50:52', 2, 1301174666, '002', 'cyberpunk', 'calon game terbaik 2020', 'punk', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_info`
--

CREATE TABLE `tb_info` (
  `id` int(11) NOT NULL,
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
(11, 'Fakultas Industri Kreatif', 'fik.png', '	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium magnam nihil reprehenderit sed omnis ipsam perspiciatis impedit, quasi voluptas nobis eligendi corporis deserunt aliquid.', '', '2020-07-08 00:00:00'),
(14, 'Fakultas Industri Kreatif', '50027080802_bbb3236058_c.jpg', 'adsad', '', '2020-07-08 00:00:00'),
(16, 'Fakultas Industri Kreatif', 'Classroom-without-windows-Pixabay.jpg', 'dad', '', '2020-07-08 00:00:00'),
(17, 'Fakultas Industri Kreatif', 'Classroom-without-windows-Pixabay1.jpg', 'fsdf', '', '2020-07-08 00:00:00'),
(19, 'Fakultas Industri Kreatif', 'Classroom-without-windows-Pixabay3.jpg', 'fsdd', 'Kaurlab', '2020-07-08 00:00:00'),
(20, 'Fakultas Industri Kreatif', 'Classroom-without-windows-Pixabay4.jpg', 'fsd', 'Kaurlab', '2020-07-08 00:00:00'),
(27, 'Informasi 12', 'Classroom-without-windows-Pixabay2.jpg', 'Test', 'Admin', '2020-07-08 00:00:00'),
(28, 'Informasi 13', 'Classroom-without-windows-Pixabay5.jpg', 'Test', 'Admin', '2020-07-08 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lab`
--

CREATE TABLE `tb_lab` (
  `id` int(11) NOT NULL,
  `images` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lab`
--

INSERT INTO `tb_lab` (`id`, `images`, `title`, `body`, `date`) VALUES
(3, 'IMG_9534_edit.jpg', 'Lab Batik', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium', '2020-07-17 08:20:46'),
(12, 'IMG_9314.JPG', 'Lab Bengkel', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium', '2020-07-17 08:20:46'),
(13, 'IMG_9274.JPG', 'Lab CGI', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium', '2020-07-17 08:20:46'),
(16, 'IMG_9189_edit.jpg', 'Lab Mac', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium', '2020-07-17 08:20:46'),
(17, 'IMG_9166_edit.jpg', 'Lab Multimedia', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium\r\n', '2020-07-17 08:20:46'),
(22, 'IMG_9675_edit.jpg', 'Lab Pola dan Jahit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium ', '2020-07-17 08:20:46'),
(44, 'IMG_9181_edit.jpg', 'Lab Sintik', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, fugit molestias modi repellendus illo accusantium', '2020-07-17 08:20:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_panel`
--

CREATE TABLE `tb_panel` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `video` varchar(500) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_panel`
--

INSERT INTO `tb_panel` (`id`, `title`, `body`, `video`, `date_create`) VALUES
(44, 'Laboratorium, Studio & Bengkel Fakultas Industri Kreatif', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid cum error quo eligendi doloremque molestias placeat animi a harum, optio fugit blanditiis! Incidunt sequi velit harum sapiente sed nemo ipsa.', 'Profil_Fakultas_Industri_Kreatif_-_TELKOM_UNIVERSITY.mp4', '2020-07-18 14:57:39');

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
('38', 'rochieko', 'Rochi Eko Pambudi', 'snowm60401@gmail.com', 'default.jpg', 'a4dd82e95096136291c033406a6b25f598b0eb0e0444b554706b926690bbc16f', '$2y$10$zBadfaR3yj3UEYWGaFLafOUv5uP6UkMBy691b9a54fjBhKDFQ8G7q', 3, 1, 1594543149, '0'),
('39', 'kaurlab', 'Kaur Lab ', 'kaurlab@gmail.com', 'default.jpg', '920c3713e13b091e73d17d35bd608079fc41724eca41b415f200e338dc59c531', '$2y$10$hctmRhwo9qxeJTvtzbn/kObWapiE8JSPX6jO72QAbp1HJfe4QBwEi', 2, 1, 1594554238, '0'),
('44', 'jhondoe', 'Jhon Doe Version 2', 'snowm6040@gmail.com', 'default.jpg', 'e41e13ea4344a5dab62674d6e08a24b75bf0d5bd7921c04c2a13fc80a6eda0e3', '$2y$10$sGYdQGJYGX9nCIDzkWoH3uibGxPC292Bf9nhIgO/TSkLz3Q3Sp1jO', 4, 1, 1594832402, '0'),
('8', 'admin', 'John Doe', 'admin@gmail.com', 'default.jpg', 'ec54193c7b13f115a35da3282d74a295af9a72ca8f8a5ebd9655dbf8eadd8a02', '$2y$10$jb3uBvvS41mfsMHU4xaICul08WsrJzMyLpiIVT9bpx06CQQ/vmNle', 1, 1, 0, '0');

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
  `id` int(11) NOT NULL,
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
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

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
  MODIFY `id_tampilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_lab`
--
ALTER TABLE `tb_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `tb_panel`
--
ALTER TABLE `tb_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `borrowing`
--
ALTER TABLE `borrowing`
  ADD CONSTRAINT `fk_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
