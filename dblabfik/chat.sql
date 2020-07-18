-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2020 pada 15.31
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

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
