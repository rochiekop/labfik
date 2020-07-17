-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2020 pada 12.17
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
(46, 196, 185, 'hi vendor2', '', '', '', '2020-06-16 11:28:16', '::1'),
(80, 196, 196, 'hi there, how may i help you?', '', '', '', '2020-06-17 19:58:00', '::1'),
(81, 184, 196, 'hi there, how may i help you?', '', '', '', '2020-06-17 19:59:53', '::1'),
(82, 196, 184, 'hi, I would like to ask about my reservation to a room', '', '', '', '2020-06-17 20:00:14', '::1'),
(83, 196, 184, 'it seems that the room has been taken by someone else, but when i look at it, turns out i am the one who booked it.', '', '', '', '2020-06-17 20:01:00', '::1'),
(84, 196, 184, 'but it doesn\'t show up on my transaction log', '', '', '', '2020-06-17 20:01:13', '::1'),
(85, 184, 196, 'i see.. we\'ll have it done for you', '', '', '', '2020-06-17 20:01:28', '::1'),
(86, 196, 184, 'thanks man', '', '', '', '2020-06-17 20:01:32', '::1'),
(87, 184, 196, 'hello client1', '', '', '', '2020-06-18 13:07:24', '::1'),
(88, 196, 184, 'hi Vendor1', '', '', '', '2020-06-18 13:07:34', '::1'),
(89, 184, 196, 'testing', '', '', '', '2020-06-18 13:21:07', '::1'),
(90, 184, 196, 'does it still work?', '', '', '', '2020-06-18 13:21:13', '::1'),
(91, 196, 184, 'yup', '', '', '', '2020-06-18 13:21:25', '::1'),
(92, 196, 184, 'it still works', '', '', '', '2020-06-18 13:21:28', '::1'),
(93, 184, 196, 'awesome', '', '', '', '2020-06-18 13:21:31', '::1'),
(94, 184, 196, 'testing chatting system', '', '', '', '2020-06-18 13:33:20', '::1'),
(95, 184, 196, 'well.. it seems so', '', '', '', '2020-06-18 14:00:26', '::1'),
(96, 184, 196, 'hello]', '', '', '', '2020-06-19 13:23:43', '::1'),
(97, 196, 184, 'hi', '', '', '', '2020-06-19 13:23:47', '::1'),
(98, 184, 196, 'ada yang bisa saya bantu?', '', '', '', '2020-06-19 13:23:56', '::1'),
(99, 184, 197, 'testing', '', '', '', '2020-06-19 13:24:05', '::1'),
(100, 184, 197, 'hi', '', '', '', '2020-06-19 13:24:07', '::1'),
(101, 184, 197, 'NULL', 'Use_case_diagram.png', '.png', 'image/png', '2020-06-19 13:24:36', '::1'),
(102, 197, 185, 'assalamualaikum', '', '', '', '2020-06-19 13:26:08', '::1'),
(103, 184, 196, 'test cuk', '', '', '', '2020-06-21 21:42:54', '::1'),
(104, 1, 196, 'hi client 1, ada yang bisa saya bantu?', '', '', '', '2020-06-21 22:41:26', '::1'),
(105, 1, 197, 'hi client2, ada yang bisa saya bantu?', '', '', '', '2020-06-21 22:42:26', '::1'),
(106, 197, 200, 'hi muhammad!', '', '', '', '2020-06-21 23:05:14', '::1'),
(107, 200, 196, 'hi client1', '', '', '', '2020-06-22 13:53:33', '::1'),
(108, 199, 184, 'hi sulthan angka!', '', '', '', '2020-06-22 15:48:39', '::1'),
(109, 200, 196, 'test', '', '', '', '2020-06-22 16:51:31', '::1'),
(110, 184, 196, 'test', '', '', '', '2020-06-28 00:01:19', '::1'),
(111, 184, 197, 'testing', '', '', '', '2020-06-28 19:52:47', '::1'),
(112, 184, 197, 'hi client 2', '', '', '', '2020-06-28 19:52:50', '::1'),
(113, 184, 197, 'how are you doing?', '', '', '', '2020-06-28 19:52:56', '::1'),
(114, 184, 196, 'hi client 1', '', '', '', '2020-06-28 22:04:31', '::1'),
(115, 184, 196, 'testing chatting system', '', '', '', '2020-06-28 22:04:40', '::1'),
(116, 184, 196, 'testing chat system again', '', '', '', '2020-06-28 22:04:48', '::1'),
(117, 196, 200, 'halo sulthan', '', '', '', '2020-06-29 16:37:20', '::1'),
(118, 196, 200, 'testing chat system', '', '', '', '2020-06-29 16:37:24', '::1'),
(119, 184, 196, 'test', '', '', '', '2020-07-02 00:06:50', '::1'),
(120, 184, 197, 'hi', '', '', '', '2020-07-02 00:06:54', '::1'),
(121, 184, 199, 'hello', '', '', '', '2020-07-02 00:07:03', '::1'),
(122, 184, 197, 'hello', '', '', '', '2020-07-02 12:33:16', '::1'),
(123, 184, 197, 'just letting you know its working', '', '', '', '2020-07-02 12:33:24', '::1'),
(124, 184, 196, 'hi', '', '', '', '2020-07-10 21:38:40', '::1'),
(125, 184, 196, 'string', '', '', '', '2020-07-10 21:38:48', '::1'),
(126, 184, 196, 'hi bro', '', '', '', '2020-07-10 22:40:48', '::1');

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
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `ruangan` varchar(255) NOT NULL,
  `akses` varchar(100) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id`, `id_kategori`, `ruangan`, `akses`, `images`) VALUES
(1, 2, 'IK.01.02', 'Mahasiswa', '8.jpg'),
(4, 9, 'IK.01.01', 'Dosen,Mahasiswa', 'default.jpg'),
(5, 4, 'IK.01.05', 'Mahasiswa', '81.jpg'),
(6, 3, 'IK.02.04', 'Dosen,Mahasiswa', '12.jpg');

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
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `images` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
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
(8, 'admin', 'John Doe', 'admin@gmail.com', 'default.jpg', 'ec54193c7b13f115a35da3282d74a295af9a72ca8f8a5ebd9655dbf8eadd8a02', '$2y$10$jb3uBvvS41mfsMHU4xaICul08WsrJzMyLpiIVT9bpx06CQQ/vmNle', 1, 1, 0, '0'),
(38, 'rochieko', 'Rochi Eko Pambudi', 'snowm60401@gmail.com', 'default.jpg', 'a4dd82e95096136291c033406a6b25f598b0eb0e0444b554706b926690bbc16f', '$2y$10$zBadfaR3yj3UEYWGaFLafOUv5uP6UkMBy691b9a54fjBhKDFQ8G7q', 3, 1, 1594543149, '0'),
(39, 'kaurlab', 'Kaur Lab ', 'kaurlab@gmail.com', 'default.jpg', '920c3713e13b091e73d17d35bd608079fc41724eca41b415f200e338dc59c531', '$2y$10$hctmRhwo9qxeJTvtzbn/kObWapiE8JSPX6jO72QAbp1HJfe4QBwEi', 2, 1, 1594554238, '0'),
(44, 'jhondoe', 'Jhon Doe Version 2', 'snowm6040@gmail.com', 'default.jpg', 'e41e13ea4344a5dab62674d6e08a24b75bf0d5bd7921c04c2a13fc80a6eda0e3', '$2y$10$sGYdQGJYGX9nCIDzkWoH3uibGxPC292Bf9nhIgO/TSkLz3Q3Sp1jO', 4, 1, 1594832402, '0');

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
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoriruangan`
--
ALTER TABLE `kategoriruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_info`
--
ALTER TABLE `tb_info`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `kategoriruangan`
--
ALTER TABLE `kategoriruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
