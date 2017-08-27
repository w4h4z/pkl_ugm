-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 Agu 2017 pada 09.43
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
(1111357, 4840, 'arfank', 'afanii', 'arfankause09@gmail.com', 'Siswa', 'verified'),
(1111361, 4844, 'maulana', 'maul', 'maulida@gmail.com', 'Siswa', 'verified'),
(1111363, 4846, 'wahaz', 'wahaz', 'rizaldi.wahaz@gmail.com', 'Siswa', 'verified'),
(1111364, 4847, 'msultanfahat', 'sultany', 'msultan@gmail.com', 'Siswa', 'unverified'),
(1111375, 4856, 'Bryan', 'bryan123', 'bryan@gmail.com', 'Siswa', 'verified'),
(1111376, 4857, 'cikak', 'cikak123', 'cika@gmail.com', 'Siswa', 'verified'),
(1111378, 4859, 'abel', 'aebl2000', 'abel@gmail.com', 'Siswa', 'verified');

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
(3, 4, 'ifanrif', 'ifan', 'ifan@gmail.com', 'Admin'),
(6, 7, 'yanti', 'yanto', 'yanto@gmail.com', 'Admin'),
(10, 11, 'abelbw20', 'abelbw20', 'abel@gmail.com', 'Operator'),
(11, 12, 'abel', 'abel', 'abel@gmail.com', 'Admin'),
(12, 13, 'dono', 'segojagung', 'dono@gmail.com', 'Operator'),
(13, 14, 'dini', 'dini6', 'dini@gmail.com', 'Admin');

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
(1, 4846, 1),
(2, 4844, 10),
(3, 4856, 11);

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
(16, 4846, '2017-08-02', 'Hari ini saya menulis ini lagi'),
(19, 4856, '2017-08-14', 'hari ini mengcoding login'),
(20, 4840, '2017-08-26', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce varius sodales ipsum auctor congue. Sed velit mauris, feugiat non est vitae, pellentesque rhoncus nisi. In sollicitudin efficitur ante a aliquet. Suspendisse ipsum eros, rhoncus id pharetra vel, elementum ut lectus. Curabitur ut arcu blandit, tincidunt justo eu, consequat ipsum. Curabitur quis augue rutrum, finibus elit et, tempor erat. Sed ac risus eget felis dictum mattis ut ac eros. In dapibus congue lacinia. Suspendisse ullamcorper vel magna et accumsan. Mauris vitae risus id felis sagittis commodo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed vel porta risus, cursus tristique leo. Integer in tempus mi. Sed suscipit, enim at molestie pharetra, neque mi blandit leo, convallis sagittis purus massa a odio. Etiam ac diam ac lectus condimentum lobortis. Aenean vel consequat ex, non aliquam leo. Integer ut libero quam. Pellentesque gravida tortor sodales luctus feugiat. Donec interdum risus a nisi consectetur, nec pulvinar purus vulputate. Mauris porttitor porttitor augue sed mattis. Quisque nec libero vel metus faucibus euismod. Integer vel justo quis nisi accumsan aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam nec euismod nulla. Quisque magna lectus, euismod hendrerit maximus eget, rhoncus ac ex. Aliquam erat volutpat. Donec tristique ex dictum lectus elementum, sit amet sollicitudin neque blandit. Nullam vulputate, nulla a eleifend pellentesque, massa dolor placerat leo, vel venenatis purus enim vel tellus. Sed porta ipsum quis lacinia gravida. Aliquam commodo interdum dui id porttitor. Sed nisl tellus, ullamcorper non enim nec, tempor malesuada lectus. Fusce fringilla lorem sapien, non dapibus eros condimentum a. Donec quis dolor viverra, ornare neque sit amet, consequat nulla. Duis semper vestibulum eros, a placerat leo lobortis ut. Aenean sed mi turpis. Curabitur quis enim at orci euismod convallis vitae id elit. Nulla vitae purus quis risus malesuada efficitur. Quisque ultricies cursus purus in condimentum. Cras sit amet mattis risus. Sed egestas sapien non libero ornare, non sagittis mi fringilla. Proin varius nunc pulvinar nibh ornare, ut tincidunt magna porta. Donec quis eros a ipsum laoreet venenatis quis sit amet ex. Pellentesque tempor mauris nulla, id volutpat nibh lobortis sit amet.'),
(21, 4840, '2017-08-26', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce varius sodales ipsum auctor congue. Sed velit mauris, feugiat non est vitae, pellentesque rhoncus nisi. In sollicitudin efficitur ante a aliquet. Suspendisse ipsum eros, rhoncus id pharetra vel, elementum ut lectus. Curabitur ut arcu blandit, tincidunt justo eu, consequat ipsum. Curabitur quis augue rutrum, finibus elit et, tempor erat. Sed ac risus eget felis dictum mattis ut ac eros. In dapibus congue lacinia. Suspendisse ullamcorper vel magna et accumsan. Mauris vitae risus id felis sagittis commodo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed vel porta risus, cursus tristique leo. Integer in tempus mi. Sed suscipit, enim at molestie pharetra, neque mi blandit leo, convallis sagittis purus massa a odio. Etiam ac diam ac lectus condimentum lobortis. Aenean vel consequat ex, non aliquam leo. Integer ut libero quam. Pellentesque gravida tortor sodales luctus feugiat. Donec interdum risus a nisi consectetur, nec pulvinar purus vulputate. Mauris porttitor porttitor augue sed mattis. Quisque nec libero vel metus faucibus euismod. Integer vel justo quis nisi accumsan aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam nec euismod nulla. Quisque magna lectus, euismod hendrerit maximus eget, rhoncus ac ex. Aliquam erat volutpat. Donec tristique ex dictum lectus elementum, sit amet sollicitudin neque blandit. Nullam vulputate, nulla a eleifend pellentesque, massa dolor placerat leo, vel venenatis purus enim vel tellus. Sed porta ipsum quis lacinia gravida. Aliquam commodo interdum dui id porttitor. Sed nisl tellus, ullamcorper non enim nec, tempor malesuada lectus. Fusce fringilla lorem sapien, non dapibus eros condimentum a. Donec quis dolor viverra, ornare neque sit amet, consequat nulla. Duis semper vestibulum eros, a placerat leo lobortis ut. Aenean sed mi turpis. Curabitur quis enim at orci euismod convallis vitae id elit. Nulla vitae purus quis risus malesuada efficitur. Quisque ultricies cursus purus in condimentum. Cras sit amet mattis risus. Sed egestas sapien non libero ornare, non sagittis mi fringilla. Proin varius nunc pulvinar nibh ornare, ut tincidunt magna porta. Donec quis eros a ipsum laoreet venenatis quis sit amet ex. Pellentesque tempor mauris nulla, id volutpat nibh lobortis sit amet.');

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
(1, 1111354, 1234, 'Ariyanto', 'Laki-laki', 8976839, 'yogyakarta', 'blank.png', NULL),
(4, 3, 83163856271, 'Ifan Rifaii', 'Laki-Laki', 85771472937, 'Tulungagung', 'Tabel_Petugas1.png', 'dssdi_logo3.png'),
(7, 6, 875675473, 'yanti', 'Perempuan', 834753, 'Jl. Pizzalicious 4321', '14.jpg', '12.jpg'),
(10, 9, 971638211, 'cika', 'Perempuan', 853236670089, 'Griya Permata ', 'blank.png', 'IMG_20170303_1942502.jpg'),
(11, 10, 76767, 'abel', 'Laki-Laki', 9343274, 'kediri', 'blank.png', '3.PNG'),
(12, 11, 1234, 'Abel Bima', 'Laki-Laki', 234, 'jogjaa', '13414247_251037521937501_2013183821_n6.jpg', '31.PNG'),
(13, 12, 766357, 'Dono', 'Laki-Laki', 123984, 'Blitar', NULL, 'form_petugas1.png'),
(14, 13, 7647753, 'dini', 'Perempuan', 93824975, 'jombang', NULL, 'form_petugas2.png');

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
(4840, 1111357, 0, 17829131, 'Arfan Kause', 'Laki-Laki', 'Bogor', '1999-11-08', 'Islam', 'Jalan Bulak No 90, Bogor', 89231837127, 'SMKN 3 Bulak', 'Teknik Komputer Jaringan', 528930, 'jalan bunga cengkeh no 41, bogor', '2017-03-12', '2017-12-12', 'error17.PNG', 'arfan-depan-jadi6.jpg'),
(4844, 1111361, 2, 901214, 'Maulida Amini', 'Perempuan', 'Labuhanbatu', '2001-04-07', 'Islam', 'Jalan ratauprapat no 91, Labuhanbatu', 83782172901, 'SMKN 1 Labuhanbatu', 'Teknik Komputer Jaringan', 978123, 'jalan paus no 37, Labuan batu', '2017-10-13', '2017-12-13', 'blank.png', 'HD-Galaxy-Wallpapers-Free-Download-1101.jpg'),
(4846, 1111363, 1, 56790099991, 'Rizaldi Wahaz', 'Laki-Laki', 'Kediri', '1999-11-20', 'Islam', 'Jalan danau tambingan, Malang', 81216679012, 'SMK TELKOM MALANG', 'Rekayasa Perangkat Lunak', 728123, 'jalan danau ranau, malanggg', '2017-07-10', '2017-10-10', '1.jpg', 'IMG-20170717-WA00051.jpg'),
(4847, 1111364, NULL, 512312, 'M Sultan Fahat', 'Laki-Laki', 'Surabaya', '2000-02-15', 'Islam', 'Jl. Siwalankerto Timur 5, Surabaya', 81329873109, 'SMK 1 Waru', 'Multimedia', 821391, 'jalan perak timur no 63, surabaya', '2017-05-01', '2017-09-02', 'blank.png', 'kartu_pelajar.jpg'),
(4854, 1111373, 0, 11, 'aa', 'Laki-Laki', 'aa', '2017-08-24', 'aa', 'aa', 111, 'SMK 9 Lampung', 'Rekayasa Perangkat Lunak', 9781236777, 'aa', '2017-08-18', '2017-08-31', 'blank.png', '16818-7-buku-puisi-indonesia-yang-wajib-kita-baca-14.jpg'),
(4855, 1111374, 0, 9876543, 'Ayun', 'Laki-Laki', 'Malang', '2017-08-31', 'aaaaaaaaaaaa', 'aa', 9876543, 'jhgncx fhydthgb hyt', 'Multimedia', 9781236777, 'vvfg', '2017-08-31', '2017-09-14', 'blank.png', '1710806_ee720081-8829-44db-9794-ac95385509673.jpg'),
(4856, 1111375, 3, 14064648070, 'Bryan Bihza Marsono', 'Laki-Laki', 'Mojokerto', '2010-02-16', 'Konghucu', 'Perumahan Permata Jingga 123', 85331727668, 'SMKN 2 Badung', 'Rekayasa Perangkat Lunak', 341383473, 'Jl. Danau Ranau Sawojajar Mlg', '2017-09-01', '2017-11-01', 'blank.png', 'dssdi_logo4.png'),
(4857, 1111376, 0, 873223, 'Cika Andhini', 'Laki-Laki', 'Mojokerto', '1999-12-03', 'Islam', 'Jalan Jalan', 81283910221, 'SMK TELKOM MALANG', 'Rekayasa Perangkat Lunak', 81298230182, 'Jalan isin', '2017-08-15', '2017-08-18', 'error15.PNG', 'al-amanah-siswa2.jpg'),
(4859, 1111378, 0, 64723646, 'Abel Bima W', 'Laki-Laki', 'Kediri', '2017-12-31', 'Islam', 'Kediri', 9823493, 'SMK Telkom Malang', 'Rekayasa Perangkat Lunak', 345347654, 'Sawojajar Malang', '2017-01-01', '2017-12-31', NULL, 'form_petugas.png');

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
  MODIFY `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1111379;
--
-- AUTO_INCREMENT for table `tb_akun_admin`
--
ALTER TABLE `tb_akun_admin`
  MODIFY `ACCOUNT_ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `DETAIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_kegiatansiswa`
--
ALTER TABLE `tb_kegiatansiswa`
  MODIFY `ID_KEGSIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  MODIFY `PEMBIMBING_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `SISWA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4860;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
