-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Apr 2021 pada 09.21
-- Versi server: 5.7.24-log
-- Versi PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipbm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_koleksi`
--

CREATE TABLE `tbl_koleksi` (
  `id_koleksi` int(11) NOT NULL,
  `nama_koleksi` varchar(255) DEFAULT NULL,
  `panjang_koleksi` varchar(255) DEFAULT NULL,
  `lebar_koleksi` varchar(255) DEFAULT NULL,
  `berat_koleksi` varchar(255) DEFAULT NULL,
  `no_vitrin` varchar(100) DEFAULT NULL,
  `tahun_koleksi` varchar(255) DEFAULT NULL,
  `gambar_koleksi` varchar(255) DEFAULT NULL,
  `deskripsi_koleksi` varchar(255) DEFAULT NULL,
  `time_create_koleksi` datetime DEFAULT NULL,
  `time_update_koleksi` datetime DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_ruang_koleksi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_koleksi`
--

INSERT INTO `tbl_koleksi` (`id_koleksi`, `nama_koleksi`, `panjang_koleksi`, `lebar_koleksi`, `berat_koleksi`, `no_vitrin`, `tahun_koleksi`, `gambar_koleksi`, `deskripsi_koleksi`, `time_create_koleksi`, `time_update_koleksi`, `id_users`, `id_ruang_koleksi`) VALUES
(18, 'Miniatur Pesawat', '23', '20', '23 gram', '02', '2020', 'WhatsApp_Image_2020-07-24_at_18_34_551.jpeg', NULL, '2020-12-30 06:22:13', '2021-01-01 09:28:11', 1, 3),
(19, 'Miniatur Tank', '15', '15', '1 kg', '01', '2020', '0_DfTVbysVAAAJDD7.jpg', NULL, '2021-01-01 09:27:47', NULL, 1, 4),
(20, 'Foto-foto perjalanan hidup', '15 cm', '10 cm', '2 kg', '03', '2020', '0_p_20180722_1448311.jpg', NULL, '2021-01-01 09:33:01', NULL, 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_observasi`
--

CREATE TABLE `tbl_observasi` (
  `id_observasi` int(11) NOT NULL,
  `keadaan_observasi_koleksi` varchar(255) DEFAULT NULL,
  `time_observasi` datetime DEFAULT NULL,
  `time_create_observasi` datetime DEFAULT NULL,
  `time_update_observasi` datetime DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_koleksi` int(11) DEFAULT NULL,
  `rekomendasi_observasi_koleksi` enum('perawatan','belum_rekomendasi','perbaikan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_observasi`
--

INSERT INTO `tbl_observasi` (`id_observasi`, `keadaan_observasi_koleksi`, `time_observasi`, `time_create_observasi`, `time_update_observasi`, `id_users`, `id_koleksi`, `rekomendasi_observasi_koleksi`) VALUES
(23, 'asaq', '2021-01-31 18:59:00', '2021-01-31 18:59:13', NULL, NULL, 19, 'perawatan'),
(24, 'xsaa', '2021-01-31 19:04:00', '2021-01-31 19:04:31', NULL, NULL, 20, 'perawatan'),
(25, 'h', '2021-02-18 11:06:00', '2021-02-18 11:07:08', NULL, NULL, 19, 'perawatan'),
(26, 'rusak', '2021-04-11 19:26:00', '2021-04-11 19:26:41', NULL, NULL, 20, 'perawatan'),
(27, 'hemm', '2021-04-11 19:41:00', '2021-04-11 19:41:47', NULL, NULL, 19, 'perawatan'),
(28, 'wsq', '2021-04-11 19:41:00', '2021-04-11 19:42:02', NULL, NULL, 20, 'belum_rekomendasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemeriksaan`
--

CREATE TABLE `tbl_pemeriksaan` (
  `id_pemeriksaan` int(11) NOT NULL,
  `id_koleksi` int(11) DEFAULT NULL,
  `kondisi_kerusakan` text,
  `gambar_kerusakan` varchar(255) DEFAULT NULL,
  `status_pemeriksaan` enum('1','2') DEFAULT NULL,
  `time_pemeriksaan` datetime DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_pemeriksaan`
--

INSERT INTO `tbl_pemeriksaan` (`id_pemeriksaan`, `id_koleksi`, `kondisi_kerusakan`, `gambar_kerusakan`, `status_pemeriksaan`, `time_pemeriksaan`, `id_users`) VALUES
(3, 18, 'patah', 'images_028.jpg', '2', '2020-12-30 23:18:08', 16),
(5, 19, 'rusakkk', '0_DfTVbysVAAAJDD7.jpg', '2', '2021-01-01 10:50:04', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perawatan`
--

CREATE TABLE `tbl_perawatan` (
  `id_perawatan` int(11) NOT NULL,
  `time_perawatan` datetime DEFAULT NULL,
  `kegiatan_perawatan` varchar(255) DEFAULT NULL,
  `penanggung_perawatan` varchar(255) DEFAULT NULL,
  `desksripsi_hasil_perawatan` varchar(255) DEFAULT NULL,
  `validasi_perawatan` enum('sudah','belum','waiting') DEFAULT NULL,
  `time_create_perawatan` datetime DEFAULT NULL,
  `time_update_perawatan` datetime DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_koleksi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_perawatan`
--

INSERT INTO `tbl_perawatan` (`id_perawatan`, `time_perawatan`, `kegiatan_perawatan`, `penanggung_perawatan`, `desksripsi_hasil_perawatan`, `validasi_perawatan`, `time_create_perawatan`, `time_update_perawatan`, `id_users`, `id_koleksi`) VALUES
(23, '2020-12-31 09:26:00', 'membersihkan karat', 'Raihan Ramadhan', NULL, 'sudah', '2020-12-30 06:46:46', '2020-12-31 05:26:32', 13, 18),
(24, '2021-04-15 20:14:00', 'membersihkan yuhu', 'Titis Wulandari', NULL, 'waiting', '2020-12-31 05:25:56', '2021-04-15 08:14:13', 13, 18),
(26, '2021-04-11 20:09:00', 'huhuhi aww', 'Raihan Ramadhan', NULL, 'sudah', '2021-04-11 20:08:55', '2021-04-11 08:09:59', 13, 18),
(27, '2021-04-15 10:07:00', 'Bersih-bersih dari lumut', 'Titis Wulandari', NULL, 'belum', '2021-04-15 21:06:32', '2021-04-15 09:08:31', 13, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruang_koleksi`
--

CREATE TABLE `tbl_ruang_koleksi` (
  `id_ruang_koleksi` int(11) NOT NULL,
  `nama_ruang_koleksi` varchar(255) DEFAULT NULL,
  `time_create_ruang_koleksi` datetime DEFAULT NULL,
  `time_update_ruang_koleksi` datetime DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_ruang_koleksi`
--

INSERT INTO `tbl_ruang_koleksi` (`id_ruang_koleksi`, `nama_ruang_koleksi`, `time_create_ruang_koleksi`, `time_update_ruang_koleksi`, `id_users`) VALUES
(3, 'Mawar wangi', '2020-12-29 13:42:43', '2021-01-03 21:54:25', 1),
(4, 'Tri Daya Cakti', '2021-01-01 07:13:18', NULL, 1),
(5, 'Swa Bhuana Paksa', '2021-01-01 07:15:17', NULL, 1),
(6, 'Tri Brata', '2021-01-01 07:15:39', NULL, 1);

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
  `telepon_users` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `name`, `email`, `password`, `level`, `time_login_users`, `time_logout_users`, `alamat_users`, `gambar_users`, `time_create_users`, `time_update_users`, `telepon_users`) VALUES
(1, 'Titis Wulandari', 'wulan@gmail.com', '$2y$10$n44kS7TVTWKZM56CTkrr5u4qBlo1iDcT90.WW0rNA4vQyTFsikhDa', 'admin', '2021-04-15 20:12:14', '2021-04-11 20:20:54', 'Gentasari', 'fokokuuuuu.jpg', '2020-10-30 21:38:07', '2021-01-06 09:24:46', '07342839'),
(2, 'Asep Sukmana Hafid', 'asep.pusat@gmail.com', '$2y$10$q5/Li5eutxYyBjrENQRyzewggufk5/RcqjNS2gvkap2KKp7a9f6S.', 'pihak_pusat', '2021-04-11 20:23:13', '2021-04-11 20:25:01', 'Jakarta pusat', 'Soesilo_Soedarman_as_the_Coordinating_Minister_for_Political_and_Security_Affairs.jpg', '2020-10-31 07:52:37', '2020-12-28 18:38:42', '08522339794'),
(3, 'Darjito', 'jamil.pengelola@gmail.com', '$2y$10$C8JcwF8kJqy9xo98gp5iKet025uvdlbD5stbtMqFD/SsAOpmykuT.', 'pengelola', '2021-01-31 19:26:36', '2021-01-31 19:29:09', 'Tinggar jati lor, Gentasari, Kec. Kroya, Cilacap', 'mbah_jito.jpg', '2020-10-31 07:57:27', '2020-11-02 13:37:30', '085927767988'),
(13, 'Taruf Mubaroq1', 'petugas.taruf@gmail.com', '$2y$10$lC3u2f9fc5pUpNcfjnLnk.gWB0elpTyLJEW8Xe7hQMvPKcZAsQmn.', 'petugas_perawatan', '2021-04-11 20:22:41', '2021-04-11 20:23:05', 'JL. KH. TOHIR KP. BARU Jaksel', 'admin.png', '2020-11-02 13:27:59', '2020-12-06 22:08:28', '085927767988'),
(16, 'Billy Elang Herlambang', 'petugas.elang@gmail.com', '$2y$10$nCd6bz7wI/MDk.MvJ/2KHeza2eNtZdDL5Q84R2ieG4Uugbj3ac1ly', 'petugas_perawatan', '2021-04-11 20:21:13', '2021-04-11 20:22:27', 'Jalan Raya Maos Cilacap', 'IMG-20190927-WA0007.jpg', '2020-11-03 08:11:39', '2020-12-25 14:01:02', '08976537829');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_koleksi`
--
ALTER TABLE `tbl_koleksi`
  ADD PRIMARY KEY (`id_koleksi`),
  ADD KEY `id_ruang_koleksi` (`id_ruang_koleksi`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `tbl_observasi`
--
ALTER TABLE `tbl_observasi`
  ADD PRIMARY KEY (`id_observasi`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_koleksi` (`id_koleksi`);

--
-- Indeks untuk tabel `tbl_pemeriksaan`
--
ALTER TABLE `tbl_pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_koleksi` (`id_koleksi`);

--
-- Indeks untuk tabel `tbl_perawatan`
--
ALTER TABLE `tbl_perawatan`
  ADD PRIMARY KEY (`id_perawatan`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_koleksi` (`id_koleksi`);

--
-- Indeks untuk tabel `tbl_ruang_koleksi`
--
ALTER TABLE `tbl_ruang_koleksi`
  ADD PRIMARY KEY (`id_ruang_koleksi`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_koleksi`
--
ALTER TABLE `tbl_koleksi`
  MODIFY `id_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_observasi`
--
ALTER TABLE `tbl_observasi`
  MODIFY `id_observasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tbl_pemeriksaan`
--
ALTER TABLE `tbl_pemeriksaan`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_perawatan`
--
ALTER TABLE `tbl_perawatan`
  MODIFY `id_perawatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_ruang_koleksi`
--
ALTER TABLE `tbl_ruang_koleksi`
  MODIFY `id_ruang_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_koleksi`
--
ALTER TABLE `tbl_koleksi`
  ADD CONSTRAINT `tbl_koleksi_ibfk_1` FOREIGN KEY (`id_ruang_koleksi`) REFERENCES `tbl_ruang_koleksi` (`id_ruang_koleksi`),
  ADD CONSTRAINT `tbl_koleksi_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `tbl_users` (`id_users`);

--
-- Ketidakleluasaan untuk tabel `tbl_observasi`
--
ALTER TABLE `tbl_observasi`
  ADD CONSTRAINT `tbl_observasi_ibfk_2` FOREIGN KEY (`id_koleksi`) REFERENCES `tbl_koleksi` (`id_koleksi`),
  ADD CONSTRAINT `tbl_observasi_ibfk_3` FOREIGN KEY (`id_users`) REFERENCES `tbl_users` (`id_users`);

--
-- Ketidakleluasaan untuk tabel `tbl_pemeriksaan`
--
ALTER TABLE `tbl_pemeriksaan`
  ADD CONSTRAINT `tbl_pemeriksaan_ibfk_1` FOREIGN KEY (`id_koleksi`) REFERENCES `tbl_koleksi` (`id_koleksi`),
  ADD CONSTRAINT `tbl_pemeriksaan_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `tbl_users` (`id_users`);

--
-- Ketidakleluasaan untuk tabel `tbl_perawatan`
--
ALTER TABLE `tbl_perawatan`
  ADD CONSTRAINT `tbl_perawatan_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `tbl_users` (`id_users`),
  ADD CONSTRAINT `tbl_perawatan_ibfk_3` FOREIGN KEY (`id_koleksi`) REFERENCES `tbl_koleksi` (`id_koleksi`);

--
-- Ketidakleluasaan untuk tabel `tbl_ruang_koleksi`
--
ALTER TABLE `tbl_ruang_koleksi`
  ADD CONSTRAINT `tbl_ruang_koleksi_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `tbl_users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
