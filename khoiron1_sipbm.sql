-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Nov 2020 pada 23.49
-- Versi server: 10.3.24-MariaDB-log-cll-lve
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khoiron1_sipbm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_about_museum`
--

CREATE TABLE `tbl_about_museum` (
  `id_about_museum` int(11) NOT NULL,
  `nama_museum` varchar(255) DEFAULT NULL,
  `deskripsi_museum` varchar(255) DEFAULT NULL,
  `gambar_museum` varchar(255) DEFAULT NULL,
  `time_create_about_museum` datetime DEFAULT NULL,
  `time_update_about_museum` datetime DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_about_museum`
--

INSERT INTO `tbl_about_museum` (`id_about_museum`, `nama_museum`, `deskripsi_museum`, `gambar_museum`, `time_create_about_museum`, `time_update_about_museum`, `id_users`) VALUES
(1, 'Museum Soesilo Soedarman', 'Museum Soesilo Soedarman merupakan museum transportasi dan tempat wisata modern yang terletak di Kota Batu, Jawa Timur, sekitar 20 km dari Kota Malang. Museum ini terletak di kawasan seluas 3,8 hektar di lereng Gunung Panderman dan memiliki lebih dari 300', 'Logo.png', '2020-11-02 21:59:00', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_koleksi`
--

CREATE TABLE `tbl_jenis_koleksi` (
  `id_jenis_koleksi` int(11) NOT NULL,
  `nama_jenis_koleksi` varchar(255) DEFAULT NULL,
  `time_create_jenis_koleksi` datetime DEFAULT NULL,
  `time_update_jenis_koleksi` datetime DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_jenis_koleksi`
--

INSERT INTO `tbl_jenis_koleksi` (`id_jenis_koleksi`, `nama_jenis_koleksi`, `time_create_jenis_koleksi`, `time_update_jenis_koleksi`, `id_users`) VALUES
(1, 'foto', '2020-10-31 12:46:20', '2020-11-02 08:47:41', 1),
(2, 'miniatur', '2020-10-31 12:46:20', NULL, 1),
(3, 'Artefak Batu', '2020-11-02 07:04:06', NULL, 1),
(4, 'Patung', '2020-11-02 07:04:06', NULL, 1),
(5, 'helm', '2020-11-02 07:07:19', NULL, 1),
(6, 'Alat Dapur', '2020-11-02 08:29:57', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_koleksi`
--

CREATE TABLE `tbl_koleksi` (
  `id_koleksi` int(11) NOT NULL,
  `nama_koleksi` varchar(255) DEFAULT NULL,
  `id_jenis_koleksi` int(11) DEFAULT NULL,
  `panjang_koleksi` varchar(255) DEFAULT NULL,
  `lebar_koleksi` varchar(255) DEFAULT NULL,
  `berat_koleksi` varchar(255) DEFAULT NULL,
  `tahun_koleksi` varchar(255) DEFAULT NULL,
  `gambar_koleksi` varchar(255) DEFAULT NULL,
  `deskripsi_koleksi` varchar(255) DEFAULT NULL,
  `time_create_koleksi` datetime DEFAULT NULL,
  `time_update_koleksi` datetime DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_koleksi`
--

INSERT INTO `tbl_koleksi` (`id_koleksi`, `nama_koleksi`, `id_jenis_koleksi`, `panjang_koleksi`, `lebar_koleksi`, `berat_koleksi`, `tahun_koleksi`, `gambar_koleksi`, `deskripsi_koleksi`, `time_create_koleksi`, `time_update_koleksi`, `id_users`) VALUES
(6, 'FOTO BUNGKARNO', 1, '15 cm', '15 cm', '1 kg', '1947', '344661352.jpg', NULL, '2020-11-02 06:59:24', NULL, 1),
(7, 'ARTEFAK BATU', 3, '1 m', '1/2 m', '20 kg', '1872', 'artefak_batu.jpg', NULL, '2020-11-02 07:05:21', '2020-11-02 07:05:42', 1),
(8, 'FOTO BUNG HATTA', 1, '15 cm', '15 cm', '1 kg', '1946', 'abdulrosyid.jpg', NULL, '2020-11-02 07:06:24', '2020-11-03 23:42:24', 1),
(9, 'HELM MILITER ANGKATAN LAUT', 5, '10 cm', '15 cm', '1 kg', '1959', 'helem_militer_angkatan_laut.jpg', NULL, '2020-11-02 07:08:31', NULL, 1),
(10, 'KAPAL LAYAR', 2, '30 cm', '15 cm', '3 kg', '2003', 'kapal_layar.jpg', NULL, '2020-11-02 07:09:39', NULL, 1),
(12, 'MERIAM BESI', 4, '2 m', '1/2 m', '5 ton', '1994', 'meriam_besi.jpg', NULL, '2020-11-02 07:11:46', NULL, 1),
(13, 'MIMBAR KAYU', 2, '3 m', '2 m', '90 kg', '1991', '355261653.png', NULL, '2020-11-02 07:12:55', '2020-11-03 08:28:19', 1),
(14, 'MINIATUR PESAWAT', 2, '70 cm', '30 cm', '3 kg', '1923', 'WhatsApp_Image_2020-07-24_at_18_34_55.jpeg', NULL, '2020-11-02 07:13:52', '2020-11-03 07:43:59', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_observasi`
--

CREATE TABLE `tbl_observasi` (
  `id_observasi` int(11) NOT NULL,
  `bahan_observasi_koleksi` varchar(255) DEFAULT NULL,
  `keadaan_observasi_koleksi` varchar(255) DEFAULT NULL,
  `no_vitrin_observasi_koleksi` varchar(255) DEFAULT NULL,
  `jumlah_koleksi` varchar(255) DEFAULT NULL,
  `time_observasi` datetime DEFAULT NULL,
  `time_create_observasi` datetime DEFAULT NULL,
  `time_update_observasi` datetime DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_jenis_koleksi` int(11) DEFAULT NULL,
  `id_koleksi` int(11) DEFAULT NULL,
  `id_ruang_koleksi` int(11) DEFAULT NULL,
  `rekomendasi_observasi_koleksi` enum('perawatan','belum_rekomendasi','perbaikan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_observasi`
--

INSERT INTO `tbl_observasi` (`id_observasi`, `bahan_observasi_koleksi`, `keadaan_observasi_koleksi`, `no_vitrin_observasi_koleksi`, `jumlah_koleksi`, `time_observasi`, `time_create_observasi`, `time_update_observasi`, `id_users`, `id_jenis_koleksi`, `id_koleksi`, `id_ruang_koleksi`, `rekomendasi_observasi_koleksi`) VALUES
(5, 'Eum laboris laborum ', 'Sunt fugit laborum', '3', 't', '2020-11-03 15:03:00', '2020-11-03 08:05:34', '2020-11-03 15:03:16', 1, NULL, 14, 1, 'perawatan'),
(12, 'kayu', 'kusam', '23', '1', '2020-11-03 15:03:00', '2020-11-03 14:10:20', '2020-11-03 15:03:27', 1, NULL, 3, 1, 'perawatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perawatan`
--

CREATE TABLE `tbl_perawatan` (
  `id_perawatan` int(11) NOT NULL,
  `keadaan_koleksi_perawatan` varchar(255) DEFAULT NULL,
  `no_vitrin_koleksi_perawatan` varchar(255) DEFAULT NULL,
  `time_perawatan` datetime DEFAULT NULL,
  `kegiatan_perawatan` varchar(255) DEFAULT NULL,
  `bahan_perawatan` varchar(255) DEFAULT NULL,
  `tambahan_perawatan` varchar(255) DEFAULT NULL,
  `desksripsi_hasil_perawatan` varchar(255) DEFAULT NULL,
  `validasi_perawatan` enum('sudah','belum','waiting') DEFAULT NULL,
  `time_create_perawatan` datetime DEFAULT NULL,
  `time_update_perawatan` datetime DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_jenis_koleksi` int(11) DEFAULT NULL,
  `id_koleksi` int(11) DEFAULT NULL,
  `id_ruang_koleksi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_perawatan`
--

INSERT INTO `tbl_perawatan` (`id_perawatan`, `keadaan_koleksi_perawatan`, `no_vitrin_koleksi_perawatan`, `time_perawatan`, `kegiatan_perawatan`, `bahan_perawatan`, `tambahan_perawatan`, `desksripsi_hasil_perawatan`, `validasi_perawatan`, `time_create_perawatan`, `time_update_perawatan`, `id_users`, `id_jenis_koleksi`, `id_koleksi`, `id_ruang_koleksi`) VALUES
(2, 'kotor berdebu', '31', '2020-11-03 14:21:00', 'bersih-bersih', 'lap, air dengan pewangi', 'belum ada', NULL, 'sudah', '2020-11-03 08:26:29', '2020-11-03 02:21:56', 13, NULL, 3, NULL),
(5, 'rusak', '1', '2020-11-03 15:24:00', 'bersih - bersih', 'lap, air dengan pewangi', 'belum', NULL, 'sudah', '2020-11-03 15:00:12', '2020-11-03 03:25:02', 13, NULL, 3, NULL),
(6, 'Kusam tidak glowing', '1', '2020-11-03 20:30:00', 'Bersih bersih\r\n', 'Lap Kain dan Spray', 'Tidak ada', NULL, 'belum', '2020-11-03 15:41:45', '2020-11-03 08:30:17', 13, NULL, 3, NULL),
(7, 'rusak', '2', '2020-11-03 23:43:00', 'Lap Kaca', 'lap dan sabun', '-', NULL, 'waiting', '2020-11-03 16:44:07', '2020-11-03 11:39:32', 13, NULL, 3, NULL),
(8, 'Kusam', '12', '2020-11-03 20:20:00', 'Bersihkan', 'Lap kain', 'Belum', NULL, 'sudah', '2020-11-03 20:20:07', '2020-11-03 20:20:07', 16, NULL, 10, NULL),
(9, 'Consequatur Odit si', '1', '2020-11-05 02:40:00', 'Coba kegiatan', 'Coba Bahan yang digunakan', 'nanti', NULL, 'sudah', '2020-11-03 23:38:12', '2020-11-03 23:38:12', 13, NULL, 6, NULL),
(10, 'Excepteur repellendu', 'Aperiam eum aut numq', '1993-10-07 01:13:00', 'Rerum autem quas non', 'Quia culpa aut inven', 'Adipisci velit cill', NULL, 'waiting', '2020-11-03 23:39:06', '2020-11-03 23:39:06', 16, NULL, 8, NULL),
(11, 'kucel kusam', '17', '2020-11-04 05:47:00', 'bersih2', 'lap kain', 'belum ada', NULL, 'waiting', '2020-11-04 05:48:17', '2020-11-04 05:48:17', 13, NULL, 6, NULL),
(12, 'berkarat', '09', '2020-11-04 05:52:00', 'membersihkan', 'lap dan alkohol', 'belum ada', NULL, 'belum', '2020-11-04 05:53:02', '2020-11-04 05:53:02', 13, NULL, 6, NULL),
(13, 'yayay', '222', '2020-11-04 06:10:00', 'yaa', 'yoo', 'nooo', NULL, 'belum', '2020-11-04 06:10:59', '2020-11-04 06:10:59', 13, NULL, 6, NULL),
(14, 'tes', '21', '2020-11-04 06:44:00', 'tes', 'tes', 'tes', NULL, 'sudah', '2020-11-04 06:44:54', '2020-11-04 06:44:54', 16, NULL, 7, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_permintaan_perbaikan`
--

CREATE TABLE `tbl_permintaan_perbaikan` (
  `id_permintaan_perbaikan` int(11) NOT NULL,
  `nama_permintaan_perbaikan` varchar(255) DEFAULT NULL,
  `bahan_permintaan_perbaikan` varchar(255) DEFAULT NULL,
  `keadaan_koleksi_permintaan_perbaikan` varchar(255) DEFAULT NULL,
  `no_vitrin_permintaan_perbaikan` varchar(255) DEFAULT NULL,
  `time_permintaan_perbaikan` datetime DEFAULT NULL,
  `gambar_kerusakan_permintaan_perbaikan` varchar(255) DEFAULT NULL,
  `validasi_permintaan_perbaikan` enum('sudah','belum') DEFAULT NULL,
  `status_permintaan_perbaikan` enum('closed','waiting','finish') DEFAULT NULL,
  `time_create_permintaan_perbaikan` datetime DEFAULT NULL,
  `time_update_permintaan_perbaikan` datetime DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_jenis_koleksi` int(11) DEFAULT NULL,
  `id_koleksi` int(11) DEFAULT NULL,
  `id_ruang_koleksi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_permintaan_perbaikan`
--

INSERT INTO `tbl_permintaan_perbaikan` (`id_permintaan_perbaikan`, `nama_permintaan_perbaikan`, `bahan_permintaan_perbaikan`, `keadaan_koleksi_permintaan_perbaikan`, `no_vitrin_permintaan_perbaikan`, `time_permintaan_perbaikan`, `gambar_kerusakan_permintaan_perbaikan`, `validasi_permintaan_perbaikan`, `status_permintaan_perbaikan`, `time_create_permintaan_perbaikan`, `time_update_permintaan_perbaikan`, `id_users`, `id_jenis_koleksi`, `id_koleksi`, `id_ruang_koleksi`) VALUES
(1, NULL, 'Besi Baja', 'Terawat yuhu', '23', '2020-11-03 12:36:00', 'Capture.JPG', 'belum', 'finish', '2020-11-01 04:37:24', '2020-11-03 12:36:14', 1, NULL, 3, 1),
(4, NULL, 'kayu', 'rusak', '11', '2020-11-03 12:36:00', 'IMG_20200416_150901.jpg', 'belum', 'closed', '2020-11-03 10:53:40', '2020-11-03 12:36:37', 1, NULL, 3, 1),
(5, NULL, '1', '1', '1', '2020-11-03 14:19:00', 'Capture1.JPG', 'belum', 'closed', '2020-11-03 14:19:56', '2020-11-03 14:19:56', 1, NULL, 3, 1),
(6, NULL, 'besiiii', 'rusak berlubang', '21', '2020-11-13 05:44:00', 'fotoQ.jpg', 'belum', 'closed', '2020-11-04 05:43:31', '2020-11-04 05:44:41', 1, NULL, 6, 1),
(7, NULL, 'plastik', 'kucel kusam', '01', '2020-11-04 07:45:00', 'Soesilo_Soedarman_as_the_Coordinating_Minister_for_Political_and_Security_Affairs.jpg', 'belum', 'closed', '2020-11-04 05:45:38', '2020-11-04 05:45:38', 1, NULL, 9, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruang_koleksi`
--

CREATE TABLE `tbl_ruang_koleksi` (
  `id_ruang_koleksi` int(11) NOT NULL,
  `nama_ruang_koleksi` varchar(255) DEFAULT NULL,
  `time_create_ruang_koleksi` datetime DEFAULT NULL,
  `time_update_ruang_koleksi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_ruang_koleksi`
--

INSERT INTO `tbl_ruang_koleksi` (`id_ruang_koleksi`, `nama_ruang_koleksi`, `time_create_ruang_koleksi`, `time_update_ruang_koleksi`) VALUES
(1, 'Bagian dalam', '2020-10-31 18:29:43', NULL),
(2, 'Bagian pojok lemari', '2020-10-31 18:29:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('admin','pihak_pusat','pengelola','petugas_perawatan') DEFAULT NULL,
  `time_login_users` datetime DEFAULT NULL,
  `time_logout_users` datetime DEFAULT NULL,
  `alamat_users` varchar(255) DEFAULT NULL,
  `gambar_users` varchar(255) DEFAULT NULL,
  `time_create_users` datetime DEFAULT NULL,
  `time_update_users` datetime DEFAULT NULL,
  `facebook_users` varchar(255) DEFAULT NULL,
  `youtube_users` varchar(255) DEFAULT NULL,
  `twitter_users` varchar(255) DEFAULT NULL,
  `instagram_users` varchar(255) DEFAULT NULL,
  `telepon_users` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `name`, `email`, `password`, `level`, `time_login_users`, `time_logout_users`, `alamat_users`, `gambar_users`, `time_create_users`, `time_update_users`, `facebook_users`, `youtube_users`, `twitter_users`, `instagram_users`, `telepon_users`) VALUES
(1, 'Wulandari Client', 'wulan@gmail.com', '$2y$10$n44kS7TVTWKZM56CTkrr5u4qBlo1iDcT90.WW0rNA4vQyTFsikhDa', 'admin', '2020-11-04 17:48:30', '2020-11-04 07:10:31', 'Jakarta barat', '355261651.png', '2020-10-30 21:38:07', '2020-11-02 06:57:53', NULL, NULL, NULL, NULL, '07342839'),
(2, 'Asep Sukmana Hafid', 'asep.pusat@gmail.com', '$2y$10$q5/Li5eutxYyBjrENQRyzewggufk5/RcqjNS2gvkap2KKp7a9f6S.', 'pihak_pusat', '2020-11-04 07:11:17', '2020-11-04 06:39:37', 'tes', 'admin1.png', '2020-10-31 07:52:37', '2020-11-02 13:37:18', NULL, NULL, NULL, NULL, '08522339794'),
(3, 'Jamil Hanafi Rouf', 'jamil.pengelola@gmail.com', '$2y$10$C8JcwF8kJqy9xo98gp5iKet025uvdlbD5stbtMqFD/SsAOpmykuT.', 'pengelola', '2020-11-04 06:56:00', '2020-11-04 07:07:19', 'Jl. Mancasan Kidul Depok Sleman Yogyakarta', 'admin2.png', '2020-10-31 07:57:27', '2020-11-02 13:37:30', NULL, NULL, NULL, NULL, '085927767988'),
(13, 'Taruf Mubaroq1', 'petugas.taruf@gmail.com', '$2y$10$lC3u2f9fc5pUpNcfjnLnk.gWB0elpTyLJEW8Xe7hQMvPKcZAsQmn.', 'petugas_perawatan', '2020-11-04 07:07:06', '2020-11-04 07:11:10', 'JL. KH. TOHIR KP. BARU RT.03/07 NO. 43, Sukabumi Selatan, Kec. Kebon Jeruk Kota Jakarta Barat', 'admin.png', '2020-11-02 13:27:59', '2020-11-04 05:39:05', NULL, NULL, NULL, NULL, '085927767988'),
(14, 'Titis Wulandari', 'wtitis98@gmail.com', '$2y$10$Hre3lILJATN/xV53D96bWen7tfnXAuM0B4RgqAMJMkw2Qyy.JIAIe', 'pengelola', NULL, NULL, NULL, NULL, '2020-11-03 07:25:49', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Elang dan Macan', 'petugas.elang@gmail.com', '$2y$10$nCd6bz7wI/MDk.MvJ/2KHeza2eNtZdDL5Q84R2ieG4Uugbj3ac1ly', 'petugas_perawatan', '2020-11-04 17:47:53', '2020-11-04 17:48:20', 'Jalan Raya Maos', 'admin3.png', '2020-11-03 08:11:39', '2020-11-03 19:55:52', NULL, NULL, NULL, NULL, '08976537829'),
(19, 'sda', 'q@gmail.com', '$2y$10$ufjcxukJ/eWjGZThV373he4/MjmpMDaU5hW3OM7g4HdXJ4wXuCTC2', 'admin', NULL, NULL, NULL, NULL, '2020-11-03 12:06:01', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_about_museum`
--
ALTER TABLE `tbl_about_museum`
  ADD PRIMARY KEY (`id_about_museum`);

--
-- Indeks untuk tabel `tbl_jenis_koleksi`
--
ALTER TABLE `tbl_jenis_koleksi`
  ADD PRIMARY KEY (`id_jenis_koleksi`);

--
-- Indeks untuk tabel `tbl_koleksi`
--
ALTER TABLE `tbl_koleksi`
  ADD PRIMARY KEY (`id_koleksi`);

--
-- Indeks untuk tabel `tbl_observasi`
--
ALTER TABLE `tbl_observasi`
  ADD PRIMARY KEY (`id_observasi`);

--
-- Indeks untuk tabel `tbl_perawatan`
--
ALTER TABLE `tbl_perawatan`
  ADD PRIMARY KEY (`id_perawatan`);

--
-- Indeks untuk tabel `tbl_permintaan_perbaikan`
--
ALTER TABLE `tbl_permintaan_perbaikan`
  ADD PRIMARY KEY (`id_permintaan_perbaikan`);

--
-- Indeks untuk tabel `tbl_ruang_koleksi`
--
ALTER TABLE `tbl_ruang_koleksi`
  ADD PRIMARY KEY (`id_ruang_koleksi`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_about_museum`
--
ALTER TABLE `tbl_about_museum`
  MODIFY `id_about_museum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_koleksi`
--
ALTER TABLE `tbl_jenis_koleksi`
  MODIFY `id_jenis_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_koleksi`
--
ALTER TABLE `tbl_koleksi`
  MODIFY `id_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_observasi`
--
ALTER TABLE `tbl_observasi`
  MODIFY `id_observasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_perawatan`
--
ALTER TABLE `tbl_perawatan`
  MODIFY `id_perawatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_permintaan_perbaikan`
--
ALTER TABLE `tbl_permintaan_perbaikan`
  MODIFY `id_permintaan_perbaikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_ruang_koleksi`
--
ALTER TABLE `tbl_ruang_koleksi`
  MODIFY `id_ruang_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
