-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 06:47 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
