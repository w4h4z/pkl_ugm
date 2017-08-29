-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 Agu 2017 pada 15.58
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipkldssdi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun`
--

CREATE TABLE `tb_akun` (
  `ACCOUNT_ID` int(11) NOT NULL,
  `SISWA_ID` int(11) DEFAULT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(32) DEFAULT NULL,
  `ACCOUNT_EMAIL` varchar(50) DEFAULT NULL,
  `ROLE` varchar(10) DEFAULT NULL,
  `STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_akun`
--

INSERT INTO `tb_akun` (`ACCOUNT_ID`, `SISWA_ID`, `USERNAME`, `PASSWORD`, `ACCOUNT_EMAIL`, `ROLE`, `STATUS`) VALUES
(1, 1, 'siswa', 'siswa', 'siswa@example.com', 'Siswa', 'verified');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun_admin`
--

CREATE TABLE `tb_akun_admin` (
  `ACCOUNT_ADMIN_ID` int(11) NOT NULL,
  `PEMBIMBING_ID` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `ACCOUNT_EMAIL` varchar(50) NOT NULL,
  `ROLE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_akun_admin`
--

INSERT INTO `tb_akun_admin` (`ACCOUNT_ADMIN_ID`, `PEMBIMBING_ID`, `USERNAME`, `PASSWORD`, `ACCOUNT_EMAIL`, `ROLE`) VALUES
(1, 1, 'admin', 'admin', 'admin@example.com', 'Admin'),
(2, 2, 'operator', 'operator', 'operator@example.com', 'Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail`
--

CREATE TABLE `tb_detail` (
  `DETAIL_ID` int(11) NOT NULL,
  `SISWA_ID` int(11) NOT NULL,
  `PEMBIMBING_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail`
--

INSERT INTO `tb_detail` (`DETAIL_ID`, `SISWA_ID`, `PEMBIMBING_ID`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatansiswa`
--

CREATE TABLE `tb_kegiatansiswa` (
  `ID_KEGSIS` int(11) NOT NULL,
  `SISWA_ID` int(11) DEFAULT NULL,
  `TGL_KEGSIS` date DEFAULT NULL,
  `ISI_KEGSIS` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kegiatansiswa`
--

INSERT INTO `tb_kegiatansiswa` (`ID_KEGSIS`, `SISWA_ID`, `TGL_KEGSIS`, `ISI_KEGSIS`) VALUES
(1, 1, '2017-08-29', 'Aktivitas 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembimbing`
--

CREATE TABLE `tb_pembimbing` (
  `PEMBIMBING_ID` int(11) NOT NULL,
  `ACCOUNT_ID` int(11) DEFAULT NULL,
  `NIP` bigint(20) DEFAULT NULL,
  `NAMA_PEMBIMBING` varchar(50) DEFAULT NULL,
  `JENKEL_PEMBIMBING` varchar(20) DEFAULT NULL,
  `NOHP_PEMBIMBING` bigint(20) DEFAULT NULL,
  `ALAMAT_PEMBIMBING` text,
  `FOTODIRI_PEMBIMBING` text,
  `FOTOIDENTITAS_PEMBIMBING` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembimbing`
--

INSERT INTO `tb_pembimbing` (`PEMBIMBING_ID`, `ACCOUNT_ID`, `NIP`, `NAMA_PEMBIMBING`, `JENKEL_PEMBIMBING`, `NOHP_PEMBIMBING`, `ALAMAT_PEMBIMBING`, `FOTODIRI_PEMBIMBING`, `FOTOIDENTITAS_PEMBIMBING`) VALUES
(1, 1, 123, 'Admin', 'Laki-Laki', 123, 'test', 'blank.png', 'contoh.jpg'),
(2, 2, 123, 'Operator', 'Perempuan', 123, 'test', 'blank.png', 'contoh.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `SISWA_ID` int(11) NOT NULL,
  `ACCOUNT_ID` int(11) DEFAULT NULL,
  `DETAIL_ID` int(11) DEFAULT '0',
  `NIS` bigint(20) DEFAULT NULL,
  `NAMA_SISWA` varchar(50) DEFAULT NULL,
  `JENKEL_SISWA` varchar(20) DEFAULT NULL,
  `TEMPATLAHIR_SISWA` varchar(20) DEFAULT NULL,
  `TANGGALLAHIR_SISWA` date DEFAULT NULL,
  `AGAMA_SISWA` varchar(20) DEFAULT NULL,
  `ALAMAT_SISWA` text,
  `NOHP_SISWA` bigint(20) DEFAULT NULL,
  `ASAL_SMK` varchar(32) DEFAULT NULL,
  `JURUSAN` varchar(50) DEFAULT NULL,
  `NOTELP_SMK` bigint(20) DEFAULT NULL,
  `ALAMAT_SMK` text,
  `TGL_MULAI` date DEFAULT NULL,
  `TGL_SELESAI` date DEFAULT NULL,
  `FOTODIRI_SISWA` text,
  `FOTOIDENTITAS_SISWA` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`SISWA_ID`, `ACCOUNT_ID`, `DETAIL_ID`, `NIS`, `NAMA_SISWA`, `JENKEL_SISWA`, `TEMPATLAHIR_SISWA`, `TANGGALLAHIR_SISWA`, `AGAMA_SISWA`, `ALAMAT_SISWA`, `NOHP_SISWA`, `ASAL_SMK`, `JURUSAN`, `NOTELP_SMK`, `ALAMAT_SMK`, `TGL_MULAI`, `TGL_SELESAI`, `FOTODIRI_SISWA`, `FOTOIDENTITAS_SISWA`) VALUES
(1, 1, 1, 123, 'Siswa', 'Laki-Laki', 'test', '2017-08-01', 'test', 'test', 123, 'test', 'test', 123, 'test', '2017-08-01', '2017-08-03', 'blank.png', 'contoh.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`ACCOUNT_ID`),
  ADD KEY `FK_RELATIONSHIP_2` (`SISWA_ID`);

--
-- Indexes for table `tb_akun_admin`
--
ALTER TABLE `tb_akun_admin`
  ADD PRIMARY KEY (`ACCOUNT_ADMIN_ID`);

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`DETAIL_ID`);

--
-- Indexes for table `tb_kegiatansiswa`
--
ALTER TABLE `tb_kegiatansiswa`
  ADD PRIMARY KEY (`ID_KEGSIS`),
  ADD KEY `FK_RELATIONSHIP_7` (`SISWA_ID`);

--
-- Indexes for table `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  ADD PRIMARY KEY (`PEMBIMBING_ID`),
  ADD KEY `FK_RELATIONSHIP_3` (`ACCOUNT_ID`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`SISWA_ID`),
  ADD KEY `FK_RELATIONSHIP_1` (`ACCOUNT_ID`),
  ADD KEY `FK_RELATIONSHIP_5` (`DETAIL_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1111381;
--
-- AUTO_INCREMENT for table `tb_akun_admin`
--
ALTER TABLE `tb_akun_admin`
  MODIFY `ACCOUNT_ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `DETAIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_kegiatansiswa`
--
ALTER TABLE `tb_kegiatansiswa`
  MODIFY `ID_KEGSIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  MODIFY `PEMBIMBING_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `SISWA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4862;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
