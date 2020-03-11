-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 07 Nov 2019 pada 18.21
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `alamat`, `telepon`, `email`, `username`, `password`) VALUES
(1, 'admin', 'Jambi', '741', 'admin@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70'),
(5, 'kristi', 'payo selincah', '08984851985', 'krstdayanti@gmail.com', 'admin_kristi', '1d430d0a0757ca4b16a57dbc5c436353'),
(6, 'Lala', 'Thehok', '082241999933', 'lala@gmail.com', 'Lala', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_spk`
--

CREATE TABLE `hasil_spk` (
  `id_spk` int(11) NOT NULL,
  `id_calon_kr` int(11) DEFAULT NULL,
  `hasil_spk` float(10,2) DEFAULT NULL,
  `minggu` varchar(2) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_spk`
--

INSERT INTO `hasil_spk` (`id_spk`, `id_calon_kr`, `hasil_spk`, `minggu`, `bulan`, `tahun`) VALUES
(45, 5, 98.00, '2', '11', '2019'),
(46, 6, 92.00, '2', '11', '2019'),
(47, 7, 89.00, '2', '11', '2019'),
(48, 8, 98.00, '2', '11', '2019'),
(49, 9, 100.00, '2', '11', '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_tpa`
--

CREATE TABLE `hasil_tpa` (
  `id_test` int(11) NOT NULL,
  `id_calon_kr` int(11) DEFAULT NULL,
  `ABSENSI` float(10,2) DEFAULT NULL,
  `Atribut_Pakaian_Kerja_Lengkap` float(10,2) NOT NULL,
  `SOP_Packing` float(10,2) DEFAULT NULL,
  `Kerja_Sama` float(10,2) DEFAULT NULL,
  `Tanggung_jawab` float(10,2) DEFAULT NULL,
  `Inisiatif` float(10,2) DEFAULT NULL,
  `Kerapian` float(10,2) DEFAULT NULL,
  `Ketelitian` float(10,2) DEFAULT NULL,
  `Kecepatan` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_tpa`
--

INSERT INTO `hasil_tpa` (`id_test`, `id_calon_kr`, `ABSENSI`, `Atribut_Pakaian_Kerja_Lengkap`, `SOP_Packing`, `Kerja_Sama`, `Tanggung_jawab`, `Inisiatif`, `Kerapian`, `Ketelitian`, `Kecepatan`) VALUES
(55, 5, 11.00, 22.00, 27.00, 32.00, 37.00, 42.00, 47.00, 52.00, 57.00),
(56, 6, 11.00, 23.00, 27.00, 32.00, 37.00, 42.00, 47.00, 54.00, 57.00),
(57, 7, 11.00, 22.00, 28.00, 32.00, 38.00, 43.00, 48.00, 52.00, 58.00),
(58, 8, 11.00, 22.00, 27.00, 32.00, 37.00, 42.00, 47.00, 52.00, 57.00),
(59, 9, 12.00, 22.00, 27.00, 32.00, 37.00, 42.00, 47.00, 52.00, 57.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_calon_kr` int(11) NOT NULL,
  `NIK` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `ttl` date NOT NULL,
  `TempatLahir` varchar(200) NOT NULL,
  `PendidikanTerakhir` varchar(100) NOT NULL,
  `Jabatan` varchar(100) NOT NULL,
  `TglBergabung` date NOT NULL,
  `skill` varchar(200) DEFAULT NULL,
  `pengalaman` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_calon_kr`, `NIK`, `nama`, `jeniskelamin`, `alamat`, `telepon`, `foto`, `ttl`, `TempatLahir`, `PendidikanTerakhir`, `Jabatan`, `TglBergabung`, `skill`, `pengalaman`) VALUES
(5, '3B.02.15.SB', 'Zubaidah', 'Wanita', 'Jl. Gunung Semeru  RT.002 Payo Selincah Kec. Jambi Timur', '081245245354', 'images.jpeg', '1994-10-26', 'jambi', 'SMA', 'Administrasi Produksi', '2015-02-15', '', ''),
(6, '3B.02.16.SB', 'Sumiati', 'Wanita', 'Jl. Berdikari RT. 023 Payo selincah Kec. Jambi Timur', '082345345421', 'girl.png', '1995-09-10', 'jambi', 'SMA', 'Administrasi Produksi', '2016-02-04', '', ''),
(7, 'PRO', 'Hartati ', 'Wanita', 'Jl.Berdikari RT.23 Payo selincah Kec. Jambi Timur ', '081232434567', 'girl.png', '1965-12-20', 'jambi', 'SD', 'Karyawan Produksi', '2005-06-27', '', ''),
(8, 'PRO', 'Wiwin Karwiti ', 'Wanita', 'Jl.Berdikari Rt 23.Selincah ', '085312897687', 'girl.png', '1980-04-27', 'jambi', 'SMA', 'Wakil Ka Packing Produksi', '2012-10-06', '', ''),
(9, 'PRO', 'Supriati ', 'Wanita', 'Lrg Kakak Tua RT 01 Selincah   ', '08987645676', 'girl.png', '1975-10-23', 'jambi', 'SMA', 'Kepala Packing Produksi', '2008-11-10', '', ''),
(10, '1233', 'test', 'Wanita', '11', '11', '', '1991-11-11', 'jambi', 'SD', '11', '1991-08-11', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(32) DEFAULT NULL,
  `bobot` float(5,2) DEFAULT NULL,
  `type` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `bobot`, `type`) VALUES
(13, 'ABSENSI', 20.00, 'Cost'),
(14, 'Atribut_Pakaian_Kerja_Lengkap', 20.00, 'Benefit'),
(15, 'SOP_Packing', 15.00, 'Benefit'),
(16, 'Kerja_Sama', 10.00, 'Benefit'),
(28, 'Tanggung_jawab', 10.00, 'Benefit'),
(29, 'Inisiatif', 10.00, 'Benefit'),
(30, 'Kerapian', 5.00, 'Benefit'),
(31, 'Ketelitian', 5.00, 'Benefit'),
(32, 'Kecepatan', 5.00, 'Benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `subkriteria` varchar(255) NOT NULL,
  `nilai` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_subkriteria`, `id_kriteria`, `subkriteria`, `nilai`) VALUES
(11, 13, 'terlambat 0 kali', 10.00),
(12, 13, 'terlambat 1 kali', 9.00),
(13, 13, 'terlambat 2 kali', 8.00),
(14, 13, 'terlambat 3 kali', 7.00),
(15, 13, 'terlambat 4 kali', 6.00),
(16, 13, 'terlambat 5 kali', 5.00),
(17, 13, 'terlambat 6 kali', 4.00),
(18, 13, 'terlambat 7 kali', 3.00),
(19, 13, 'terlambat 8 kali', 2.00),
(20, 13, 'terlambat 9 kali', 1.00),
(21, 13, 'terlambat >10 kali', 0.00),
(22, 14, 'Baik Sekali', 5.00),
(23, 14, 'baik', 4.00),
(24, 14, 'cukup', 3.00),
(25, 14, 'kurang', 2.00),
(26, 14, 'kurang sekali', 1.00),
(27, 15, 'Baik Sekali', 5.00),
(28, 15, 'baik', 4.00),
(29, 15, 'cukup', 3.00),
(30, 15, 'kurang', 2.00),
(31, 15, 'kurang sekali', 1.00),
(32, 16, 'Baik Sekali', 5.00),
(33, 16, 'baik', 4.00),
(34, 16, 'cukup', 3.00),
(35, 16, 'kurang', 2.00),
(36, 16, 'kurang sekali', 1.00),
(37, 28, 'Baik Sekali', 5.00),
(38, 28, 'baik', 4.00),
(39, 28, 'cukup', 3.00),
(40, 28, 'kurang', 2.00),
(41, 28, 'kurang sekali', 1.00),
(42, 29, 'Baik Sekali', 5.00),
(43, 29, 'baik', 4.00),
(44, 29, 'cukup', 3.00),
(45, 29, 'kurang', 2.00),
(46, 29, 'kurang sekali', 1.00),
(47, 30, 'Baik Sekali', 5.00),
(48, 30, 'baik', 4.00),
(49, 30, 'cukup', 3.00),
(50, 30, 'kurang', 2.00),
(51, 30, 'kurang sekali', 1.00),
(52, 31, 'Baik Sekali', 5.00),
(53, 31, 'baik', 4.00),
(54, 31, 'cukup', 3.00),
(55, 31, 'kurang', 2.00),
(56, 31, 'kurang sekali', 1.00),
(57, 32, 'Baik Sekali', 5.00),
(58, 32, 'baik', 4.00),
(59, 32, 'cukup', 3.00),
(60, 32, 'kurang', 2.00),
(61, 32, 'kurang sekali', 1.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_spk`
--
ALTER TABLE `hasil_spk`
  ADD PRIMARY KEY (`id_spk`),
  ADD KEY `id_calon_kr` (`id_calon_kr`);

--
-- Indexes for table `hasil_tpa`
--
ALTER TABLE `hasil_tpa`
  ADD PRIMARY KEY (`id_test`),
  ADD KEY `id_calon_kr` (`id_calon_kr`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_calon_kr`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hasil_spk`
--
ALTER TABLE `hasil_spk`
  MODIFY `id_spk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `hasil_tpa`
--
ALTER TABLE `hasil_tpa`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_calon_kr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
