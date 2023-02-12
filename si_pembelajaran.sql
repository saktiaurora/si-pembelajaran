-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 10:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_pembelajaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen_siswa`
--

CREATE TABLE `absen_siswa` (
  `nis_siswa` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `jam` time NOT NULL,
  `ket` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen_siswa`
--

INSERT INTO `absen_siswa` (`nis_siswa`, `tgl`, `id_jadwal`, `jam`, `ket`) VALUES
('0055436395', '2023-02-09', 6, '09:41:26', 'H'),
('0055436396', '2023-02-09', 6, '09:38:44', 'H'),
('0065304758', '2022-08-01', 3, '22:57:57', 'H'),
('0078928938', '2022-07-29', 3, '16:46:00', 'H'),
('0987', '2022-07-02', 1, '00:54:11', 'H');

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin`
-- (See below for the actual view)
--
CREATE TABLE `admin` (
`id_admin` varchar(20)
,`nm_admin` varchar(35)
,`jk` varchar(10)
,`telepon` varchar(15)
,`alamat` varchar(200)
,`username` varchar(20)
,`password` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `anggota_kelompok`
--

CREATE TABLE `anggota_kelompok` (
  `id_angg` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `nis_siswa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_kelompok`
--

INSERT INTO `anggota_kelompok` (`id_angg`, `id_kelompok`, `nis_siswa`) VALUES
(7, 2, '0085227048'),
(8, 2, '0081654431'),
(9, 2, '0065304758'),
(10, 2, '0071457715'),
(11, 2, '0087323227'),
(12, 3, '	0085707008'),
(13, 3, '0079714427'),
(14, 3, '0083236687'),
(15, 3, '0075542884'),
(16, 3, '0082270022'),
(17, 4, '0078928938');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `nis_siswa` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `isi_pesan` text NOT NULL,
  `id_pertemuan` int(11) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `id_kelompok`, `nis_siswa`, `tgl`, `isi_pesan`, `id_pertemuan`, `type`) VALUES
(24, 2, 71457715, '2023-02-07 13:54:38', '', 2, 'text'),
(25, 2, 71457715, '2023-02-07 13:54:56', '', 2, 'text'),
(26, 2, 71457715, '2023-02-07 13:55:07', '', 2, 'text'),
(27, 2, 71457715, '2023-02-07 13:55:27', '308340919_avatar.png', 2, 'file');

-- --------------------------------------------------------

--
-- Stand-in structure for view `guru`
-- (See below for the actual view)
--
CREATE TABLE `guru` (
`nip_guru` varchar(20)
,`nm_guru` varchar(35)
,`jk` varchar(10)
,`kelas` varchar(10)
,`telepon` varchar(15)
,`alamat` varchar(200)
,`username` varchar(20)
,`password` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `index_prestasi`
--

CREATE TABLE `index_prestasi` (
  `nis_siswa` varchar(20) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `index_prestasi`
--

INSERT INTO `index_prestasi` (`nis_siswa`, `nilai`) VALUES
('0065304758', 80.7),
('0071457715', 89),
('0073073204', 80),
('0075513659', 70),
('0078928938', 60),
('0087323227', 76);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_absen`
--

CREATE TABLE `jadwal_absen` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_absen`
--

INSERT INTO `jadwal_absen` (`id_jadwal`, `id_kelas`, `hari`, `jam_masuk`, `jam_pulang`) VALUES
(1, 1, 'Senin', '08:00:00', '10:00:00'),
(3, 6, 'Jumat', '19:30:00', '22:00:00'),
(4, 7, 'Selasa', '10:00:00', '12:00:00'),
(5, 7, 'Selasa', '01:50:00', '04:50:00'),
(6, 20, 'Kamis', '07:30:00', '14:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_tugas`
--

CREATE TABLE `jawaban_tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `file_jawaban` varchar(200) NOT NULL,
  `tgl_upload` datetime NOT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_tugas`
--

INSERT INTO `jawaban_tugas` (`id_tugas`, `id_kelompok`, `file_jawaban`, `tgl_upload`, `nilai`) VALUES
(8, 2, '2106936742_avatar-1.png', '2023-02-07 13:24:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nm_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nm_kelas`) VALUES
(20, 'XI MIPA 1'),
(21, 'VIII A');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nm_kelompok` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id_kelompok`, `id_kelas`, `nm_kelompok`) VALUES
(2, 6, 'kelompol 1'),
(3, 6, 'kelompok 2'),
(4, 7, 'kelompok 1'),
(5, 7, 'kelompok 2'),
(6, 8, 'kelompok 1'),
(7, 8, 'kelompok 2'),
(8, 9, 'kelompok 1'),
(9, 9, 'kelompok 2'),
(10, 10, 'kelompok 1'),
(11, 10, 'kelompok 2');

-- --------------------------------------------------------

--
-- Stand-in structure for view `klpk`
-- (See below for the actual view)
--
CREATE TABLE `klpk` (
`id_angg` int(11)
,`id_kelompok` int(11)
,`nis_siswa` varchar(20)
,`nm_siswa` varchar(35)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `lap_absen`
-- (See below for the actual view)
--
CREATE TABLE `lap_absen` (
`id_jadwal` int(11)
,`nm_kelas` varchar(10)
,`nis_siswa` varchar(20)
,`nm_siswa` varchar(35)
,`bulan` int(2)
,`tgl` int(2)
,`tanggal` date
,`jam` time
,`ket` varchar(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `file` text NOT NULL,
  `link` text NOT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `pertemuan` varchar(100) NOT NULL,
  `tgl_materi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `judul`, `file`, `link`, `kelas`, `pertemuan`, `tgl_materi`) VALUES
(9, 'Materi 1', '1332821939_397741 1544419253.jpg', 'http://localhost:8080/phpmyadmin/index.php?route=/sql&db=si_pembelajaran&table=materi&pos=0', 'VIII A', 'Pertemuan Ke 1 ', '2022-08-12'),
(10, 'Materi 1', '1359861548_397741 1544419253.jpg', 'https://www.youtube.com/', 'VIII A', 'Pertemuan Ke ', '2022-08-12'),
(11, 'Materi 1', '885556784_397741 1544419253.jpg', 'http://localhost:8080/phpmyadmin/index.php?route=/sql&server=1&db=&table=kelas&pos=0', 'VIII A', 'Pertemuan Ke 3', '2022-08-12'),
(16, 'Offers and Suggestions', '1585660663_materi1.docx', 'file:///F:/SEMESTER/TA/doc%20sma/Buku-Bahasa-Inggris-Kelas-11-Siswa.pdf', 'XI MIPA 1', 'Pertemuan Ke 1', '2023-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nis_siswa` varchar(20) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `kkm` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `huruf` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nis_siswa`, `id_kelas`, `kkm`, `nilai`, `huruf`) VALUES
(1, '	0072545235	', 'VIII C', 75, 100, 'A'),
(3, '	0078565866	', 'VIII C', 75, 100, 'A'),
(6, '0055436395', 'XI MIPA 1', 75, 98, 'A'),
(7, '0055436396', 'XI MIPA 1', 75, 100, 'A');

-- --------------------------------------------------------

--
-- Stand-in structure for view `nilai_siswa`
-- (See below for the actual view)
--
CREATE TABLE `nilai_siswa` (
`id_nilai` int(11)
,`kelas` varchar(10)
,`jk` varchar(10)
,`nis_siswa` varchar(20)
,`nm_siswa` varchar(35)
,`kkm` int(11)
,`nilai` int(11)
,`huruf` varchar(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `pertemuan`
--

CREATE TABLE `pertemuan` (
  `id_pertemuan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertemuan`
--

INSERT INTO `pertemuan` (`id_pertemuan`, `id_kelas`, `tgl`) VALUES
(2, 6, '2022-08-08'),
(3, 6, '2022-08-09'),
(4, 7, '2022-08-08');

-- --------------------------------------------------------

--
-- Stand-in structure for view `siswa`
-- (See below for the actual view)
--
CREATE TABLE `siswa` (
`nis_siswa` varchar(20)
,`nm_siswa` varchar(35)
,`jk` varchar(10)
,`kelas` varchar(10)
,`telepon` varchar(15)
,`alamat` varchar(200)
,`username` varchar(20)
,`password` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `ket` text NOT NULL,
  `file_tugas` varchar(200) DEFAULT NULL,
  `deadline` datetime NOT NULL,
  `pertemuan` varchar(100) NOT NULL,
  `tgl_tugas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `id_kelas`, `judul`, `ket`, `file_tugas`, `deadline`, `pertemuan`, `tgl_tugas`) VALUES
(7, 'VIII A', 'Tugas ke 1', 'osn', '188224741_234455.jpg', '2022-08-13 17:49:00', 'Pertemuan Ke 1', '2022-08-12'),
(8, 'VIII A', 'Sistem', 'AB', '1697646119_avatar.png', '2023-02-08 19:18:00', '1', '2023-02-07'),
(9, 'XI MIPA 1', 'Offers and Suggestions', 'Membuat kalimat percakapan ', '1457336949_materi1.docx', '2023-02-10 09:13:00', 'Pertemuan Ke 1', '2023-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `nm_user` varchar(35) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `jk`, `kelas`, `telepon`, `alamat`, `username`, `password`, `level`) VALUES
('0055436395', 'Aldi', 'Laki-laki', 'XI MIPA 1', '082384657890', 'Jorong Taratak Galundi', '0055436395', '123', 'siswa'),
('0055436396', 'Inayah Putri', 'Perempuan', 'XI MIPA 1', '082384658875', 'Simpang Aie Dingin', '0055436396', '123', 'siswa'),
('0065304758', 'ANISA TAMIMI ILHAK', 'wanita', 'VIII A', '085669063236', 'limau manis', '0065304758', '123', 'siswa'),
('0071077983', 'MUSYA ARI ARRASYID	', 'laki-laki', 'VIII E', '081255435563', 'Koto Tinggi', '0071077983', '123', 'siswa'),
('0071457715', 'ARIEF RAHMAN', 'laki-laki', 'VIII A', '081255443377', 'bandar panjang', '0071457715', '123', 'siswa'),
('0071468618', 'LUSI WAHYUNI	', 'wanita', 'VIII C', '081255435587', 'Limau Manis', '0071468618	', '123', 'siswa'),
('0071683069', 'HIKMAH	', 'wanita', 'VIII C', '087755664422', 'Pinyongek', '0071683069	', '123', 'siswa'),
('0071726328', 'ISMA	', 'wanita', 'VIII E', '082377665536', 'pasar muarasipongi', '0071726328', '123', 'siswa'),
('0072545235', 'ISMI RAHMADANI	', 'wanita', 'VIII C', '087708654567', 'Koto Baringin', '0072545235	', '123', 'siswa'),
('0073073204', 'FITRI RAHMADANI	', 'wanita', 'VIII B', '082360100102', 'tanjung alai', '0073073204', '123', 'siswa'),
('0073662807', 'MIA RAMADANI	', 'wanita', 'VIII D', '082345667740', 'relokasi', '0073662807', '123', 'siswa'),
('0074477339', 'JEPRI ABDILLAH	', 'wanita', 'VIII C', '081255435560', 'relokasi', '0074477339', '123', 'siswa'),
('0074877577', 'NURHASANAH	', 'wanita', 'VIII E', '082322554438', 'pasar muarasipongi', '0074877577', '123', 'siswa'),
('0075455141', 'IKHWAL ROSADI	', 'laki-laki', 'VIII E', '087722676547', 'ranjo batu', '0075455141', '123', 'siswa'),
('0075513659', 'ROSTINA	', 'wanita', 'VIII B', '087766445533', 'dusun godang', '0075513659', '123', 'siswa'),
('0076607256', 'NOVAL RAMADHAN	', 'laki-laki', 'VIII D', '082322554430', 'pinyongek', '0076607256', '123', 'siswa'),
('0077375232', 'NILWAN SYAPUTRA	', 'laki-laki', 'VIII D', '087768547650', 'Relokasi', '0077375232	', '123', 'siswa'),
('0077446921', 'MUTIA	', 'wanita', 'VIII C', '082236957722', 'ranjo batu', '0077446921', '123', 'siswa'),
('0078527495', 'RONA EFENDI	', 'laki-laki', 'VIII E', '082236957711', 'Koto Baringin', '0078527495	', '123', 'siswa'),
('0078545717', 'JULIANA	', 'wanita', 'VIII C', '081255435569', 'Bandar Panjang', '0078545717	', '123', 'siswa'),
('0078565866', 'LISDA YANTI	', 'wanita', 'VIII C', '082345667748', 'Bandar Panjang', '0078565866	', '123', 'siswa'),
('0078928938', 'FITRI AINI LBS	', 'wanita', 'VIII B', '082345667744', 'pinyongek', '0078928938', '123', 'siswa'),
('0079265817', 'MUHAMMAD YAHYA	', 'laki-laki', 'VIII B', '082236957788', 'kampung padang', '0079265817', '123', 'siswa'),
('0079474082', 'RISWANDA	', 'laki-laki', 'VIII B', '087766338866', 'bandar panjang', '0079474082', '123', 'siswa'),
('0079534403', 'HASAN BASRI	', 'laki-laki', 'VIII E', '082322554431', 'Bandar Panjang', '0079534403	', '123', 'siswa'),
('0079714427', 'JULIANI	', 'wanita', 'VIII A', '082322554433', 'pintu angin', '0079714427', '123', 'siswa'),
('0081091320', 'FIRDAUS	', 'laki-laki', 'VIII D', '087766445534', 'Tanjung Alai', 'Tanjung Alai', '123', 'siswa'),
('0081118358', 'RASTI	', 'wanita', 'VIII B', '087766445533', 'limau manis', '0081118358', '123', 'siswa'),
('0081288156', 'MAYA SARI	', 'wanita', 'VIII D', '087766445530', 'Muarakumpulan', '0081288156	', '123', 'siswa'),
('0081654431', 'ANDYKA AULIA RAMADHAN', 'laki-laki', 'VIII A', '081255435566', 'Psr. muarasipongi', '0081654431', '123', 'siswa'),
('0081845447', 'ROHIMAH NUR	', 'wanita', 'VIII E', '082345667777', 'Koto Tinggi', '0081845447	', '123', 'siswa'),
('0082121947', 'MAIMUNAH LUBIS	', 'wanita', 'VIII C', '087766445531', 'Tobang', '0082121947	', '123', 'siswa'),
('0082271143', 'NIA HANDAYANI	', 'wanita', 'VIII D', '082322554439', 'koto boru', '0082271143', '123', 'siswa'),
('0082430392', 'MAIDANUR	', 'wanita', 'VIII D', '081255435565', 'Tanjung Larangan', '0082430392	', '123', 'siswa'),
('0082749558', 'NUR ALISA	', 'wanita', 'VIII E', '085669063237', 'Muarakumpulan', '0082749558	', '123', 'siswa'),
('0082943412', 'PUTRY ROHMA YANTI	', 'wanita', 'VIII B', '087866775543', 'koto baringin ', '0082943412', '123', 'siswa'),
('0083236687', 'JIHAN LUTFIAH ALVIN NST	', 'laki-laki', 'VIII A', '082298675418', 'koto baringin', '0083236687', '123', 'siswa'),
('0083607086', 'NUR MAWADDAH	', 'wanita', 'VIII B', '097822567865', 'polongan dua', '0083607086', '123', 'siswa'),
('0084311174', 'NUR MALINA	', 'wanita', 'VIII E', '087766445531', 'pasar muarasipongi', '0084311174	', '123', 'siswa'),
('0085227048', 'ALDO SAPUTRA', 'laki-laki', 'VIII A', '082236957788', 'Relokasi', '0085227048', '123', 'siswa'),
('0085227079', 'IMAM BAHI AWWAB', 'Laki-laki', 'XI MIPA ', '082384908790', 'Taratak Galundi', '0085227079', '123', 'siswa'),
('0085302471', 'LUSI WINDI ANI	', 'wanita', 'VIII D', '082345667745', '0085302471	', '0085302471	', '123', 'siswa'),
('0085707008', 'KHAIRIL ANWAR	', 'laki-laki', 'VIII A', '082344354322', 'relokasi', '0085707008', '123', 'siswa'),
('0086111893', 'MARHAMAH	', 'wanita', 'VIII C', '087766445511', 'Muarakumpulan', '0086111893	', '123', 'siswa'),
('0086569662', 'JIHAN SYAH	', 'wanita', 'VIII E', '087766445530', 'Muarakumpulan', '0086569662	', '123', 'siswa'),
('0086723372', 'FEBRI HANDAYANI	', 'wanita', 'VIII D', '081255435568', 'Bandar Panjang', '0086723372	', '123', 'siswa'),
('0087323227', 'CLISTYA RIANA	', 'wanita', 'VIII A', '081278698866', 'simpang mandepo', '0087323227', '123', 'siswa'),
('0088396427', 'NAZRI AL WALID	', 'laki-laki', 'VIII D', '082322554432', 'Koto Baringin', '0088396427	', '123', 'siswa'),
('0089217845', 'ROBIAH	', 'wanita', 'VIII B', '087726567788', 'koto tinggi', '0089217845', '123', 'siswa'),
('0089879650', 'MELDA ASRINA	', 'wanita', 'VIII B', '082355664434', 'tobang', '0089879650', '123', 'siswa'),
('09876545', 'M.RISWAN', 'laki-laki', NULL, '085669063235', 'Kampung Pinang', 'M.RISWAN', '123', 'guru'),
('09876546', 'Yusismi Murni', 'Perempuan', NULL, '0831755770393', 'Taratak', 'yusismi_murni', '123', 'guru'),
('1', 'David', 'Laki-laki', '', '082174967550', 'Solok', 'admin', '123', 'admin');

-- --------------------------------------------------------

--
-- Structure for view `admin`
--
DROP TABLE IF EXISTS `admin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin`  AS SELECT `user`.`id_user` AS `id_admin`, `user`.`nm_user` AS `nm_admin`, `user`.`jk` AS `jk`, `user`.`telepon` AS `telepon`, `user`.`alamat` AS `alamat`, `user`.`username` AS `username`, `user`.`password` AS `password` FROM `user` WHERE `user`.`level` = 'admin''admin'  ;

-- --------------------------------------------------------

--
-- Structure for view `guru`
--
DROP TABLE IF EXISTS `guru`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `guru`  AS SELECT `user`.`id_user` AS `nip_guru`, `user`.`nm_user` AS `nm_guru`, `user`.`jk` AS `jk`, `user`.`kelas` AS `kelas`, `user`.`telepon` AS `telepon`, `user`.`alamat` AS `alamat`, `user`.`username` AS `username`, `user`.`password` AS `password` FROM `user` WHERE `user`.`level` = 'guru''guru'  ;

-- --------------------------------------------------------

--
-- Structure for view `klpk`
--
DROP TABLE IF EXISTS `klpk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `klpk`  AS SELECT `anggota_kelompok`.`id_angg` AS `id_angg`, `kelompok`.`id_kelompok` AS `id_kelompok`, `siswa`.`nis_siswa` AS `nis_siswa`, `siswa`.`nm_siswa` AS `nm_siswa` FROM ((`kelompok` join `anggota_kelompok`) join `siswa` on(`kelompok`.`id_kelompok` = `anggota_kelompok`.`id_kelompok` and `siswa`.`nis_siswa` = `anggota_kelompok`.`nis_siswa`))  ;

-- --------------------------------------------------------

--
-- Structure for view `lap_absen`
--
DROP TABLE IF EXISTS `lap_absen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lap_absen`  AS SELECT `jadwal_absen`.`id_jadwal` AS `id_jadwal`, `kelas`.`nm_kelas` AS `nm_kelas`, `absen_siswa`.`nis_siswa` AS `nis_siswa`, `siswa`.`nm_siswa` AS `nm_siswa`, month(`absen_siswa`.`tgl`) AS `bulan`, dayofmonth(`absen_siswa`.`tgl`) AS `tgl`, `absen_siswa`.`tgl` AS `tanggal`, `absen_siswa`.`jam` AS `jam`, `absen_siswa`.`ket` AS `ket` FROM (((`absen_siswa` join `siswa`) join `kelas`) join `jadwal_absen` on(`absen_siswa`.`nis_siswa` = `siswa`.`nis_siswa` and `absen_siswa`.`id_jadwal` = `jadwal_absen`.`id_jadwal` and `jadwal_absen`.`id_kelas` = `kelas`.`id_kelas`))  ;

-- --------------------------------------------------------

--
-- Structure for view `nilai_siswa`
--
DROP TABLE IF EXISTS `nilai_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nilai_siswa`  AS SELECT `nilai`.`id_nilai` AS `id_nilai`, `siswa`.`kelas` AS `kelas`, `siswa`.`jk` AS `jk`, `siswa`.`nis_siswa` AS `nis_siswa`, `siswa`.`nm_siswa` AS `nm_siswa`, `nilai`.`kkm` AS `kkm`, `nilai`.`nilai` AS `nilai`, `nilai`.`huruf` AS `huruf` FROM (`nilai` join `siswa` on(`nilai`.`nis_siswa` = `siswa`.`nis_siswa`))  ;

-- --------------------------------------------------------

--
-- Structure for view `siswa`
--
DROP TABLE IF EXISTS `siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `siswa`  AS SELECT `user`.`id_user` AS `nis_siswa`, `user`.`nm_user` AS `nm_siswa`, `user`.`jk` AS `jk`, `user`.`kelas` AS `kelas`, `user`.`telepon` AS `telepon`, `user`.`alamat` AS `alamat`, `user`.`username` AS `username`, `user`.`password` AS `password` FROM `user` WHERE `user`.`level` = 'siswa''siswa'  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD PRIMARY KEY (`nis_siswa`,`tgl`);

--
-- Indexes for table `anggota_kelompok`
--
ALTER TABLE `anggota_kelompok`
  ADD PRIMARY KEY (`id_angg`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `index_prestasi`
--
ALTER TABLE `index_prestasi`
  ADD PRIMARY KEY (`nis_siswa`);

--
-- Indexes for table `jadwal_absen`
--
ALTER TABLE `jadwal_absen`
  ADD PRIMARY KEY (`id_jadwal`,`id_kelas`);

--
-- Indexes for table `jawaban_tugas`
--
ALTER TABLE `jawaban_tugas`
  ADD PRIMARY KEY (`id_tugas`,`id_kelompok`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD PRIMARY KEY (`id_pertemuan`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_kelompok`
--
ALTER TABLE `anggota_kelompok`
  MODIFY `id_angg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `jadwal_absen`
--
ALTER TABLE `jadwal_absen`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pertemuan`
--
ALTER TABLE `pertemuan`
  MODIFY `id_pertemuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
