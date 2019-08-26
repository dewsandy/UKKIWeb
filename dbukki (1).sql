-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2016 at 12:31 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbukki`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

DROP TABLE IF EXISTS `bulan`;
CREATE TABLE IF NOT EXISTS `bulan` (
  `id_bln` int(10) NOT NULL AUTO_INCREMENT,
  `nama_bln` varchar(25) NOT NULL,
  PRIMARY KEY (`id_bln`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

DROP TABLE IF EXISTS `hari`;
CREATE TABLE IF NOT EXISTS `hari` (
  `id_hri` int(10) NOT NULL AUTO_INCREMENT,
  `nama_hri` varchar(50) NOT NULL,
  PRIMARY KEY (`id_hri`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hri`, `nama_hri`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jum''at'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `tanggal`
--

DROP TABLE IF EXISTS `tanggal`;
CREATE TABLE IF NOT EXISTS `tanggal` (
  `id_tgl` int(10) NOT NULL AUTO_INCREMENT,
  `nama_tgl` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tgl`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggal`
--

INSERT INTO `tanggal` (`id_tgl`, `nama_tgl`) VALUES
(1, '01'),
(2, '02'),
(3, '03'),
(4, '04'),
(5, '05'),
(6, '06'),
(7, '07'),
(8, '08'),
(9, '09'),
(10, '10'),
(11, '11'),
(12, '12'),
(13, '13'),
(14, '14'),
(15, '15'),
(16, '16'),
(17, '17'),
(18, '18'),
(19, '19'),
(20, '20'),
(21, '21'),
(22, '22'),
(23, '23'),
(24, '24'),
(25, '25'),
(26, '26'),
(27, '27'),
(28, '28'),
(29, '29'),
(30, '30'),
(31, '31');

-- --------------------------------------------------------

--
-- Table structure for table `tblabsensi_mente`
--

DROP TABLE IF EXISTS `tblabsensi_mente`;
CREATE TABLE IF NOT EXISTS `tblabsensi_mente` (
  `idabsenmente` int(11) NOT NULL AUTO_INCREMENT,
  `mente` int(11) NOT NULL,
  `darimentor` int(11) NOT NULL,
  `keterangan` enum('Menunggu','Dikonfirmasi') NOT NULL,
  `id_bln` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_tgl` int(11) NOT NULL,
  `jam_msk` varchar(255) NOT NULL,
  PRIMARY KEY (`idabsenmente`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblabsensi_mente`
--

INSERT INTO `tblabsensi_mente` (`idabsenmente`, `mente`, `darimentor`, `keterangan`, `id_bln`, `id_hari`, `id_tgl`, `jam_msk`) VALUES
(1, 1, 1, 'Dikonfirmasi', 7, 4, 21, '20.20 WIB'),
(4, 1, 1, 'Dikonfirmasi', 7, 5, 22, '02.04 WIB'),
(6, 1, 1, 'Dikonfirmasi', 7, 1, 25, '15.08 WIB'),
(7, 1, 1, 'Menunggu', 7, 3, 27, '22.13 WIB');

-- --------------------------------------------------------

--
-- Table structure for table `tblabsensi_mentor`
--

DROP TABLE IF EXISTS `tblabsensi_mentor`;
CREATE TABLE IF NOT EXISTS `tblabsensi_mentor` (
  `idabsenmentor` int(11) NOT NULL AUTO_INCREMENT,
  `mentor` int(11) NOT NULL,
  `keterangan` int(11) NOT NULL,
  `idbln` int(11) NOT NULL,
  `idtgl` int(11) NOT NULL,
  `idhari` int(11) NOT NULL,
  `jam_msk` varchar(255) NOT NULL,
  PRIMARY KEY (`idabsenmentor`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblabsensi_mentor`
--

INSERT INTO `tblabsensi_mentor` (`idabsenmentor`, `mentor`, `keterangan`, `idbln`, `idtgl`, `idhari`, `jam_msk`) VALUES
(1, 1, 1, 7, 22, 5, '02.26 WIB'),
(3, 1, 1, 7, 25, 1, '14.56 WIB');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` int(15) NOT NULL,
  `hak_akses` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `login` datetime NOT NULL,
  `logout` datetime NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`idadmin`, `nama`, `user`, `password`, `alamat`, `notelp`, `hak_akses`, `status`, `login`, `logout`) VALUES
(1, 'admin', 'admin@gmail.com', '6959daebd9fd982765fb55f0c0f8516ab7019224', 'surabaya', 838549, 1, 1, '2016-07-27 10:14:14', '2016-07-27 17:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `tblberita`
--

DROP TABLE IF EXISTS `tblberita`;
CREATE TABLE IF NOT EXISTS `tblberita` (
  `idberita` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `isi` longtext NOT NULL,
  `iduser` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `in_tgl` text NOT NULL,
  `edit_tgl` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idberita`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcatatan`
--

DROP TABLE IF EXISTS `tblcatatan`;
CREATE TABLE IF NOT EXISTS `tblcatatan` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `id_mente` int(11) NOT NULL,
  `id_mentor` int(11) NOT NULL,
  `id_bln` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_tgl` int(11) NOT NULL,
  `isi` text NOT NULL,
  `status` enum('Menunggu','Dikonfirmasi','Dibatalkan') NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcatatan`
--

INSERT INTO `tblcatatan` (`id_cat`, `id_mente`, `id_mentor`, `id_bln`, `id_hari`, `id_tgl`, `isi`, `status`) VALUES
(1, 1, 1, 7, 4, 21, 'hallo', 'Dikonfirmasi'),
(5, 1, 1, 7, 5, 22, '&lt;h1&gt;a&lt;/h1&gt;', 'Dibatalkan');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartemen`
--

DROP TABLE IF EXISTS `tbldepartemen`;
CREATE TABLE IF NOT EXISTS `tbldepartemen` (
  `iddepartemen` int(11) NOT NULL AUTO_INCREMENT,
  `departemen` text NOT NULL,
  `deskripsi` text NOT NULL,
  `idkabinet` int(11) NOT NULL,
  PRIMARY KEY (`iddepartemen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblinfo`
--

DROP TABLE IF EXISTS `tblinfo`;
CREATE TABLE IF NOT EXISTS `tblinfo` (
  `idinfo` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `isi` longtext NOT NULL,
  `iduser` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `in_tgl` text NOT NULL,
  `edit_tgl` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idinfo`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinfo`
--

INSERT INTO `tblinfo` (`idinfo`, `judul`, `isi`, `iduser`, `gambar`, `kategori_id`, `in_tgl`, `edit_tgl`, `status`) VALUES
(6, 'juduuuul', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus deserunt, nobis quae eos provident quidem. Quaerat expedita dignissimos perferendis, nihil quo distinctio eius architecto reprehenderit maiores.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus deserunt, nobis quae eos provident quidem. Quaerat expedita dignissimos perferendis, nihil quo distinctio eius architecto reprehenderit maiores.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus deserunt, nobis quae eos provident quidem. Quaerat expedita dignissimos perferendis, nihil quo distinctio eius architecto reprehenderit maiores.', 1, '134807.jpg', 1, '30-07-16 15:03:58', '30-07-16 15:06:05', 1),
(7, 'judul nya ini', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus deserunt, nobis quae eos provident quidem. Quaerat expedita dignissimos perferendis, nihil quo distinctio eius architecto reprehenderit maiores.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus deserunt, nobis quae eos provident quidem. Quaerat expedita dignissimos perferendis, nihil quo distinctio eius architecto reprehenderit maiores.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus deserunt, nobis quae eos provident quidem. Quaerat expedita dignissimos perferendis, nihil quo distinctio eius architecto reprehenderit maiores.', 1, '992684.jpg', 1, '30-07-16 15:05:27', '30-07-16 15:05:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbljenjang`
--

DROP TABLE IF EXISTS `tbljenjang`;
CREATE TABLE IF NOT EXISTS `tbljenjang` (
  `idjenjang` int(11) NOT NULL AUTO_INCREMENT,
  `jenjang` varchar(10) NOT NULL,
  PRIMARY KEY (`idjenjang`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljenjang`
--

INSERT INTO `tbljenjang` (`idjenjang`, `jenjang`) VALUES
(1, 'D3'),
(2, 'D4');

-- --------------------------------------------------------

--
-- Table structure for table `tbljurusan`
--

DROP TABLE IF EXISTS `tbljurusan`;
CREATE TABLE IF NOT EXISTS `tbljurusan` (
  `idjurusan` int(11) NOT NULL AUTO_INCREMENT,
  `jurusan` text NOT NULL,
  PRIMARY KEY (`idjurusan`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljurusan`
--

INSERT INTO `tbljurusan` (`idjurusan`, `jurusan`) VALUES
(1, 'Teknik Komputer'),
(2, 'Teknik Mekatronika'),
(3, 'Teknik Telekomunikasi'),
(4, 'Teknik Telekomunikasi');

-- --------------------------------------------------------

--
-- Table structure for table `tblkabinet`
--

DROP TABLE IF EXISTS `tblkabinet`;
CREATE TABLE IF NOT EXISTS `tblkabinet` (
  `idkabinet` int(11) NOT NULL AUTO_INCREMENT,
  `kabinet` text NOT NULL,
  `ketua` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `sambutan` text NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`idkabinet`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkabinet`
--

INSERT INTO `tblkabinet` (`idkabinet`, `kabinet`, `ketua`, `visi`, `misi`, `sambutan`, `gambar`) VALUES
(1, 'Akselerasi', 'M.M', 'Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro.\r\nNesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro.\r\nNesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro.\r\nNesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro.\r\n', 'Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro.Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro.Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro.Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro.', 'Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro.Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro.Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro.Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro.', 'aa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblkategori`
--

DROP TABLE IF EXISTS `tblkategori`;
CREATE TABLE IF NOT EXISTS `tblkategori` (
  `idkategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` text NOT NULL,
  PRIMARY KEY (`idkategori`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkategori`
--

INSERT INTO `tblkategori` (`idkategori`, `kategori`) VALUES
(1, 'Info Internal'),
(2, 'Info Eksternal'),
(3, 'Berita');

-- --------------------------------------------------------

--
-- Table structure for table `tblmente`
--

DROP TABLE IF EXISTS `tblmente`;
CREATE TABLE IF NOT EXISTS `tblmente` (
  `idmente` int(11) NOT NULL AUTO_INCREMENT,
  `mentor` int(11) NOT NULL,
  `nama` text NOT NULL,
  `idjurusan` int(11) NOT NULL,
  `idjenjang` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idmente`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmente`
--

INSERT INTO `tblmente` (`idmente`, `mentor`, `nama`, `idjurusan`, `idjenjang`, `alamat`, `no_telp`, `username`, `pass`, `status`) VALUES
(1, 1, 'mente', 1, 2, 'No 106', 99999, 'mentedemo@ukki', 'df45503dcf6d6e32cf1d936a024dbd4146f39f20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmentor`
--

DROP TABLE IF EXISTS `tblmentor`;
CREATE TABLE IF NOT EXISTS `tblmentor` (
  `idmentor` int(11) NOT NULL AUTO_INCREMENT,
  `namamentor` text NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_jenjang` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` int(15) NOT NULL,
  `status` int(11) NOT NULL,
  `user` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`idmentor`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmentor`
--

INSERT INTO `tblmentor` (`idmentor`, `namamentor`, `id_jurusan`, `id_jenjang`, `alamat`, `notelp`, `status`, `user`, `password`) VALUES
(1, 'Mentor', 1, 2, 'Keling ,RT 16 RW 05 ', 8385499, 1, 'mentor@ukki', 'bfc2baaef2e7b868605f9738330aca20af6c3563');

-- --------------------------------------------------------

--
-- Table structure for table `tblslide`
--

DROP TABLE IF EXISTS `tblslide`;
CREATE TABLE IF NOT EXISTS `tblslide` (
  `idslide` int(11) NOT NULL AUTO_INCREMENT,
  `slide` text NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`idslide`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblslide`
--

INSERT INTO `tblslide` (`idslide`, `slide`, `deskripsi`) VALUES
(6, '179288.jpg', 'mas'),
(5, '12737.jpg', 's'),
(7, '233250.jpg', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `tbltag`
--

DROP TABLE IF EXISTS `tbltag`;
CREATE TABLE IF NOT EXISTS `tbltag` (
  `idtag` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(200) NOT NULL,
  PRIMARY KEY (`idtag`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblukki`
--

DROP TABLE IF EXISTS `tblukki`;
CREATE TABLE IF NOT EXISTS `tblukki` (
  `idukki` int(11) NOT NULL,
  `kabinet` text NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `sejarah` mediumtext NOT NULL,
  `gambar` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblupcomingevent`
--

DROP TABLE IF EXISTS `tblupcomingevent`;
CREATE TABLE IF NOT EXISTS `tblupcomingevent` (
  `idevent` int(11) NOT NULL AUTO_INCREMENT,
  `event` text NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tgl` text NOT NULL,
  PRIMARY KEY (`idevent`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblupcomingevent`
--

INSERT INTO `tblupcomingevent` (`idevent`, `event`, `deskripsi`, `id_kategori`, `tgl`) VALUES
(1, 'Lomba Visual Dakwah', 'asasasss', 2, '2016-08-28'),
(2, 'hallo', 'jadajkd', 2, '2016-09-02'),
(3, 'Lomba MTQ', 'alhamdulliha', 2, '2016-09-04'),
(4, 'Lomba Menulis', 'menulis adalah', 1, '2016-02-01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
