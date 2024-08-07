-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 08:54 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracerstudy`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `aktivasi_akun` (IN `id_u` INT(10))  BEGIN
UPDATE user
SET status = 'aktif'
WHERE id = id_u;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cek_last` (IN `idsurvei` INT(11))  NO SQL
BEGIN

SELECT MAX(s.id) FROM survei_jawaban as s GROUP BY s.id_pertanyaan;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_bidang` (IN `id_bdg` INT(10), IN `nama_bdg` VARCHAR(100))  BEGIN
UPDATE bidang_pekerjaan
SET nama = nama_bdg
WHERE id = id_bdg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_loker` (IN `id_l` INT(11), IN `jdl` VARCHAR(50), IN `kota_l` VARCHAR(50), IN `inst_l` VARCHAR(100), IN `email_l` VARCHAR(30), IN `syarat_l` TEXT, IN `desc_l` TEXT, IN `exp` VARCHAR(255))  BEGIN
UPDATE loker
SET judul = jdl, kota = kota_l, instansi = inst_l, email = email_l, syarat = syarat_l, deskripsi = desc_l, tgl_akhir = exp
WHERE id = id_l;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_bidang` (IN `id_bdg` INT(10))  BEGIN
DELETE FROM bidang_pekerjaan WHERE id = id_bdg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_loker` (IN `id_l` INT(11))  BEGIN
DELETE FROM loker WHERE id = id_l;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `publish_loker` (IN `id_l` INT(11))  BEGIN
UPDATE loker
SET status = 'publish'
WHERE id = id_l;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `publish_testi` (IN `id_t` INT(10))  BEGIN
UPDATE testimoni
SET status = 'publish'
WHERE id_testi = id_t;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_bidang` (IN `nama_bdg` VARCHAR(100))  BEGIN
INSERT INTO bidang_pekerjaan(nama) VALUES (nama_bdg);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_loker` (IN `id_u` INT(3), IN `jdl` VARCHAR(50), IN `kota_l` VARCHAR(50), IN `inst_l` VARCHAR(100), IN `email_l` VARCHAR(30), IN `syarat_l` TEXT, IN `desc_l` TEXT, IN `exp` VARCHAR(255))  BEGIN
INSERT INTO loker (id_user, judul, kota, instansi, email, syarat, deskripsi, tgl_akhir, status)
VALUES (id_u, jdl, kota_l, inst_l, email_l, syarat_l, desc_l, exp, 'unpublish');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `unpublish_loker` (IN `id_l` INT(11))  BEGIN
UPDATE loker
SET status = 'unpublish'
WHERE id = id_l;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `unpublish_testi` (IN `id_t` INT(10))  BEGIN
UPDATE testimoni
SET status = 'unpublish'
WHERE id_testi = id_t;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `upd_profil` (IN `nama_d` VARCHAR(10), IN `nama_b` VARCHAR(15), IN `email_u` VARCHAR(30), IN `pass` VARCHAR(15), IN `id_u` INT(10))  BEGIN
IF pass = '' THEN
UPDATE user
SET nama_depan = nama_d, nama_belakang = nama_b, email = email_u
WHERE id = id_u;
ELSE
UPDATE user
SET nama_depan = nama_d, nama_belakang = nama_b, email = email_u, password = pass
WHERE id = id_u;
END IF;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `responden` (`idsurvei` INT(11)) RETURNS INT(11) NO SQL
BEGIN
DECLARE respon INT;
SELECT
        COUNT(responden)
    INTO respon
FROM
    (
    SELECT
        COUNT(j.id_user) AS responden
    FROM
        (
            `jawaban_pertanyaan` `j`
        LEFT JOIN `survei_pertanyaan` `p` ON
            (`p`.`id` = `j`.`id_pertanyaan`)
        LEFT JOIN survei s ON
            (`s`.`id` = `p`.`id_survei`)
        LEFT JOIN `user` `u` ON
            (`j`.`id_user` = `u`.`id`)
        )
    WHERE
        s.id = idsurvei
    GROUP BY
        `s`.`id`,
        `j`.`id_user`
) jawaban_pertanyaan;

RETURN respon;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `aktifuser_v`
-- (See below for the actual view)
--
CREATE TABLE `aktifuser_v` (
`id` int(10)
,`id_user_grup` int(10)
,`nim` char(9)
,`nama_depan` varchar(10)
,`nama_belakang` varchar(15)
,`jenis_kelamin` varchar(2)
,`tempat_lahir` varchar(100)
,`tgl_lahir` varchar(30)
,`telp` varchar(20)
,`email` varchar(30)
,`alamat` text
,`password` varchar(15)
,`tahun_lulus` varchar(30)
,`angkatan` varchar(50)
,`foto` varchar(255)
,`status` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `bidang_pekerjaan`
--

CREATE TABLE `bidang_pekerjaan` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang_pekerjaan`
--

INSERT INTO `bidang_pekerjaan` (`id`, `nama`) VALUES
(2, 'Administrator'),
(4, 'Engineer'),
(6, 'Analyst'),
(8, 'Perkantoran'),
(12, 'Pelayanan Masyarakat'),
(13, 'Pekerja Lapangan');

-- --------------------------------------------------------

--
-- Stand-in structure for view `bidang_pekerjaan_v`
-- (See below for the actual view)
--
CREATE TABLE `bidang_pekerjaan_v` (
`id` int(10)
,`nama` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `custom`
--

CREATE TABLE `custom` (
  `id` int(11) NOT NULL,
  `universitas` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `warna2` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `logo` varchar(20) NOT NULL,
  `web` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom`
--

INSERT INTO `custom` (`id`, `universitas`, `prodi`, `warna`, `warna2`, `email`, `telp`, `logo`, `web`) VALUES
(1, 'Universitas Sumatera Utar', 'Teknologi Informas', '#1c7382', '#44e4bc', 'itsu@gmail.com', '086789090006', '1622949590.png', 'Tracer Study Alumni Teknologi Informai USU');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `aksi` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `id_user`, `aksi`, `waktu`) VALUES
(1, 24, 'loker_delete', '2021-06-01 20:14:37'),
(2, 1, 'loker_new', '2021-06-01 20:46:44'),
(3, 48, 'loker_new', '2021-06-01 20:50:32'),
(4, 48, 'testi_new', '2021-06-01 20:52:34'),
(6, 48, 'testi_update', '2021-06-01 20:54:14'),
(7, 78, 'registrasi', '2021-06-01 22:15:00'),
(8, 48, 'testi_new', '2021-06-01 23:15:15'),
(9, 76, 'testi_update', '2021-06-01 23:15:43'),
(10, 48, 'testi_update', '2021-06-01 23:15:44'),
(11, 48, 'testi_update', '2021-06-01 23:44:58'),
(12, 48, 'testi_update', '2021-06-01 23:45:05'),
(13, 79, 'registrasi', '2021-06-02 20:49:53'),
(14, 80, 'registrasi', '2021-06-02 20:51:24'),
(15, 79, 'user_delete', '2021-06-02 20:55:56'),
(16, 80, 'user_delete', '2021-06-02 20:55:56'),
(17, 24, 'loker_new', '2021-06-02 21:26:15'),
(18, 24, 'loker_delete', '2021-06-02 21:42:27'),
(19, 24, 'loker_new', '2021-06-02 21:47:29'),
(20, 24, 'loker_delete', '2021-06-02 21:48:18'),
(21, 24, 'loker_new', '2021-06-02 21:49:31'),
(22, 24, 'loker_delete', '2021-06-02 21:50:13'),
(23, 24, 'loker_new', '2021-06-02 21:57:04'),
(24, 24, 'loker_delete', '2021-06-02 21:57:10'),
(25, 24, 'loker_new', '2021-06-02 21:59:02'),
(26, 24, 'loker_delete', '2021-06-02 21:59:21'),
(27, 48, 'loker_delete', '2021-06-02 22:02:59'),
(28, 24, 'loker_new', '2021-06-02 22:08:39'),
(29, 24, 'loker_delete', '2021-06-02 22:08:43'),
(30, 24, 'loker_new', '2021-06-02 22:10:35'),
(31, 24, 'loker_delete', '2021-06-02 22:10:55'),
(32, 24, 'loker_new', '2021-06-02 22:13:33'),
(33, 24, 'loker_delete', '2021-06-02 22:13:37'),
(34, 24, 'loker_new', '2021-06-02 22:16:36'),
(35, 24, 'loker_delete', '2021-06-02 22:16:41'),
(36, 24, 'loker_new', '2021-06-02 22:16:57'),
(37, 24, 'loker_delete', '2021-06-02 22:17:15'),
(38, 76, 'testi_update', '2021-06-02 22:23:56'),
(39, 76, 'testi_update', '2021-06-02 22:24:00'),
(40, 76, 'testi_update', '2021-06-02 22:24:04'),
(41, 76, 'testi_update', '2021-06-02 22:24:07'),
(42, 81, 'registrasi', '2021-06-02 22:56:41'),
(43, 82, 'registrasi', '2021-06-02 22:56:46'),
(44, 83, 'registrasi', '2021-06-02 22:56:52'),
(45, 84, 'registrasi', '2021-06-02 22:56:56'),
(46, 85, 'registrasi', '2021-06-02 22:57:00'),
(47, 86, 'registrasi', '2021-06-02 22:57:05'),
(48, 87, 'registrasi', '2021-06-02 22:57:09'),
(49, 88, 'registrasi', '2021-06-02 22:57:13'),
(50, 89, 'registrasi', '2021-06-02 22:57:17'),
(51, 90, 'registrasi', '2021-06-02 22:57:21'),
(52, 91, 'registrasi', '2021-06-02 22:57:26'),
(53, 92, 'registrasi', '2021-06-02 22:57:30'),
(54, 81, 'user_delete', '2021-06-02 23:02:35'),
(55, 82, 'user_delete', '2021-06-02 23:02:35'),
(56, 83, 'user_delete', '2021-06-02 23:02:35'),
(57, 84, 'user_delete', '2021-06-02 23:02:35'),
(58, 85, 'user_delete', '2021-06-02 23:02:35'),
(59, 86, 'user_delete', '2021-06-02 23:02:35'),
(60, 87, 'user_delete', '2021-06-02 23:02:35'),
(61, 88, 'user_delete', '2021-06-02 23:02:35'),
(62, 89, 'user_delete', '2021-06-02 23:02:35'),
(63, 90, 'user_delete', '2021-06-02 23:02:35'),
(64, 91, 'user_delete', '2021-06-02 23:02:35'),
(65, 92, 'user_delete', '2021-06-02 23:02:35'),
(66, 76, 'do_survei', '2021-06-03 15:44:36'),
(67, 76, 'testi_update', '2021-06-04 15:48:16'),
(68, 48, 'testi_update', '2021-06-04 16:05:30'),
(69, 48, 'testi_update', '2021-06-04 16:05:31'),
(70, 76, 'testi_update', '2021-06-04 16:05:32'),
(71, 76, 'do_survei', '2021-06-10 12:11:42'),
(72, 76, 'do_survei', '2021-06-10 12:12:59'),
(73, 76, 'do_survei', '2021-06-10 12:37:00'),
(74, 48, 'do_survei', '2021-06-10 12:37:50'),
(75, 76, 'do_survei', '2021-06-10 13:19:28'),
(76, 76, 'do_survei', '2021-06-10 13:24:02'),
(77, 48, 'do_survei', '2021-06-10 13:25:00'),
(78, 76, 'do_survei', '2021-06-10 13:38:42'),
(79, 48, 'do_survei', '2021-06-10 13:39:28');

-- --------------------------------------------------------

--
-- Stand-in structure for view `history_v`
-- (See below for the actual view)
--
CREATE TABLE `history_v` (
`id_user` int(11)
,`nama_depan` varchar(10)
,`nama_belakang` varchar(15)
,`aksi` varchar(100)
,`waktu` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_pertanyaan`
--

CREATE TABLE `jawaban_pertanyaan` (
  `id` int(10) NOT NULL,
  `id_pertanyaan` int(10) NOT NULL,
  `jawaban` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_pertanyaan`
--

INSERT INTO `jawaban_pertanyaan` (`id`, `id_pertanyaan`, `jawaban`, `id_user`) VALUES
(217, 74, 193, 76),
(218, 15, 41, 76),
(219, 14, 37, 76),
(220, 12, 34, 76),
(221, 11, 188, 76),
(222, 10, 28, 76),
(223, 9, 25, 76),
(224, 8, 111, 76),
(225, 7, 22, 76),
(226, 6, 187, 76),
(227, 5, 183, 76),
(228, 4, 181, 76),
(229, 2, 10, 76),
(230, 1, 1, 76),
(231, 74, 193, 48),
(232, 15, 43, 48),
(233, 14, 38, 48),
(234, 12, 34, 48),
(235, 11, 189, 48),
(236, 10, 28, 48),
(237, 9, 24, 48),
(238, 8, 109, 48),
(239, 7, 22, 48),
(240, 6, 185, 48),
(241, 5, 184, 48),
(242, 4, 179, 48),
(243, 2, 5, 48),
(244, 1, 178, 48);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jawaban_v`
-- (See below for the actual view)
--
CREATE TABLE `jawaban_v` (
`id_survei` int(3)
,`pertanyaan` text
,`id_pertanyaan` int(3)
,`jawaban` text
,`id` int(3)
,`jlh` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `id` int(11) NOT NULL,
  `id_user` int(3) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `syarat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_buat` date NOT NULL DEFAULT current_timestamp(),
  `tgl_akhir` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`id`, `id_user`, `judul`, `kota`, `instansi`, `email`, `syarat`, `deskripsi`, `tgl_buat`, `tgl_akhir`, `status`) VALUES
(4, 47, 'Software Engineering', 'Medan', 'PT COBA COBA', 'apaaja@email.com', 'Mageran', 'Khusus untuk orang - orang insecure', '2021-05-04', '2021-06-16', 'publish'),
(5, 24, 'Pegawai', 'Medan', 'PT TES', 'email@email.com', 'Good Looking', 'Khusus untuk orang - orang yang ga insecure', '2021-05-31', '2021-04-30', 'unpublish'),
(6, 24, 'CEO', 'Bandung', 'PT COBA', 'jago@email.com', 'sehat walafiat', 'ayo daftar sekarang tunggu apallagi weh', '2021-05-31', '2021-05-29', 'unpublish'),
(9, 1, 'Expert Software Development ', 'Jakarta, Indonesia', 'Goto Company', 'goto@gmail.com', 'Tertera', 'Ayo daftarkan dirimu menjadi bagian dari keluarga Goto Company', '2021-06-01', '2021-07-09', 'unpublish');

--
-- Triggers `loker`
--
DELIMITER $$
CREATE TRIGGER `after_loker_delete` AFTER DELETE ON `loker` FOR EACH ROW BEGIN
DECLARE iduser int;
INSERT INTO history VALUES (NULL, old.id_user , 'loker_delete', now());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_loker_insert` AFTER INSERT ON `loker` FOR EACH ROW BEGIN
DECLARE iduser int;
SELECT l.id_user INTO iduser from loker l LEFT JOIN user u ON l.id_user=u.id WHERE l.id=new.id;
INSERT INTO history VALUES (NULL, iduser, 'loker_new', now());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `lokertersedia_v`
-- (See below for the actual view)
--
CREATE TABLE `lokertersedia_v` (
`id` int(11)
,`id_user` int(3)
,`judul` varchar(50)
,`kota` varchar(50)
,`instansi` varchar(100)
,`email` varchar(30)
,`syarat` text
,`deskripsi` text
,`tgl_buat` date
,`tgl_akhir` varchar(255)
,`status` varchar(255)
,`nama_depan` varchar(10)
,`nama_belakang` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `loker_v`
-- (See below for the actual view)
--
CREATE TABLE `loker_v` (
`id_user` int(10)
,`nama_depan` varchar(10)
,`nama_belakang` varchar(15)
,`id_loker` int(11)
,`judul` varchar(50)
,`kota` varchar(50)
,`instansi` varchar(100)
,`email` varchar(30)
,`syarat` text
,`deskripsi` text
,`tgl_buat` date
,`tgl_akhir` varchar(255)
,`status` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `nonaktifuser_v`
-- (See below for the actual view)
--
CREATE TABLE `nonaktifuser_v` (
`id` int(10)
,`id_user_grup` int(10)
,`nim` char(9)
,`nama_depan` varchar(10)
,`nama_belakang` varchar(15)
,`jenis_kelamin` varchar(2)
,`tempat_lahir` varchar(100)
,`tgl_lahir` varchar(30)
,`telp` varchar(20)
,`email` varchar(30)
,`alamat` text
,`password` varchar(15)
,`tahun_lulus` varchar(30)
,`angkatan` varchar(50)
,`foto` varchar(255)
,`status` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan_alumni`
--

CREATE TABLE `pekerjaan_alumni` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `instansi` varchar(150) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `id_bidang` int(11) NOT NULL,
  `mulai_bekerja` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pekerjaan_alumni`
--

INSERT INTO `pekerjaan_alumni` (`id`, `id_user`, `instansi`, `jabatan`, `id_bidang`, `mulai_bekerja`, `alamat`, `kota`) VALUES
(1, 48, 'Pt. Coba-Coba', 'Manager', 2, '2021-05-26', 'Jln. Belum diketahui No.799 C O ', 'Medan'),
(7, 76, 'Pertamina', 'Supervisor', 4, '2021-05-12', 'jermal', 'medan'),
(8, 77, NULL, NULL, 2, NULL, NULL, NULL),
(9, 47, 'PT TES', 'karyawan', 5, '2021-05-04', 'blom jelas', 'Bandung'),
(10, 78, NULL, NULL, 3, NULL, NULL, NULL),
(11, 81, NULL, NULL, 3, NULL, NULL, NULL),
(12, 82, NULL, NULL, 3, NULL, NULL, NULL),
(13, 83, NULL, NULL, 3, NULL, NULL, NULL),
(14, 84, NULL, NULL, 3, NULL, NULL, NULL),
(15, 85, NULL, NULL, 3, NULL, NULL, NULL),
(16, 86, NULL, NULL, 3, NULL, NULL, NULL),
(17, 87, NULL, NULL, 3, NULL, NULL, NULL),
(18, 88, NULL, NULL, 3, NULL, NULL, NULL),
(19, 89, NULL, NULL, 3, NULL, NULL, NULL),
(20, 90, NULL, NULL, 3, NULL, NULL, NULL),
(21, 91, NULL, NULL, 3, NULL, NULL, NULL),
(22, 92, NULL, NULL, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `report_v`
-- (See below for the actual view)
--
CREATE TABLE `report_v` (
`responden` int(11)
,`id` int(10)
,`nama_survei` varchar(100)
,`deskripsi` text
,`tgl_mulai` varchar(15)
,`tgl_berahkir` varchar(15)
,`tgl_update` varchar(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `survei`
--

CREATE TABLE `survei` (
  `id` int(10) NOT NULL,
  `nama_survei` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_mulai` varchar(15) NOT NULL,
  `tgl_berahkir` varchar(15) NOT NULL,
  `tgl_update` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survei`
--

INSERT INTO `survei` (`id`, `nama_survei`, `deskripsi`, `tgl_mulai`, `tgl_berahkir`, `tgl_update`) VALUES
(5, 'SURVEI TRACER STUDY', 'Survei ini dibuat berdasarkan borang tracer study dari dikti', '2021-06-10', '2021-06-30', '2021-06-10'),
(10, 'testt', 'test', '2021-06-11', '2021-06-19', '2021-06-10');

--
-- Triggers `survei`
--
DELIMITER $$
CREATE TRIGGER `after_survei_delete` AFTER DELETE ON `survei` FOR EACH ROW BEGIN

DELETE survei_pertanyaan FROM survei_pertanyaan WHERE id_survei = old.id;
DELETE survei_jawaban FROM survei_jawaban LEFT JOIN survei_pertanyaan  ON survei_jawaban.id_pertanyaan=survei_pertanyaan.id WHERE survei_pertanyaan.id_survei = old.id;
DELETE jawaban_pertanyaan FROM jawaban_pertanyaan LEFT JOIN survei_pertanyaan ON jawaban_pertanyaan.id_pertanyaan=survei_pertanyaan.id WHERE survei_pertanyaan.id_survei = old.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `surveitersedia_v`
-- (See below for the actual view)
--
CREATE TABLE `surveitersedia_v` (
`id` int(10)
,`nama_survei` varchar(100)
,`deskripsi` text
,`tgl_mulai` varchar(15)
,`tgl_berahkir` varchar(15)
,`tgl_update` varchar(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `survei_jawaban`
--

CREATE TABLE `survei_jawaban` (
  `id` int(3) NOT NULL,
  `id_pertanyaan` int(3) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survei_jawaban`
--

INSERT INTO `survei_jawaban` (`id`, `id_pertanyaan`, `jawaban`) VALUES
(1, 1, '[1] 1-3 Bulan'),
(2, 1, '[2] 3-6 bulan'),
(3, 1, '[3] 6-12 Bulan'),
(4, 2, 'Melalui iklan di koran/majalah, brosur '),
(5, 2, ' [1] Melamar ke perusahaan tanpa mengetahui lowongan yang ada '),
(6, 2, ' [1] Pergi ke bursa/pameran kerja'),
(7, 2, ' [1] Mencari lewat internet/iklan online/milis'),
(8, 2, '[1] Dihubungi oleh perusahaan'),
(9, 2, ' [1] Menghubungi Kemenakertrans '),
(10, 2, ' [1] Menghubungi agen tenaga kerja komersial/swasta'),
(11, 2, ' [1] Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas'),
(12, 2, ' [1] Menghubungi kantor kemahasiswaan/hubungan alumni '),
(13, 2, ' [1] Membangun jejaring (network) sejak masih kuliah  '),
(14, 2, ' [1] Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)'),
(15, 2, ' [1] Membangun bisnis sendiri '),
(16, 2, ' [1] Melalui penempatan kerja atau magang '),
(17, 2, ' [1] Bekerja di tempat yang sama dengan tempat kerja semasa kuliah  '),
(18, 2, ' [1] Lainnya:  '),
(21, 7, 'YA'),
(22, 7, 'TIDAK'),
(23, 9, ' [1] Tidak'),
(24, 9, '[2] Tidak, tapi saya sedang menunggu hasil lamaran kerja'),
(25, 9, ' [3] Ya, saya akan mulai bekerja dalam 2 minggu ke depan'),
(26, 9, ' [4] Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan'),
(27, 9, ' [5] Lainnya'),
(28, 10, ' [1] Instansi pemerintah (termasuk BUMN)'),
(29, 10, ' [2] Organisasi non-profit/Lembaga Swadaya Masyarakat'),
(30, 10, ' [3] Perusahaan swasta'),
(31, 10, '[4] Wiraswasta/perusahaan sendiri'),
(32, 10, ' [5] Lainnya, '),
(33, 12, ' [1] Sangat Erat'),
(34, 12, ' [2] Erat'),
(35, 12, ' [4] Kurang Erat'),
(36, 12, ' [5] Tidak Sama Sekali '),
(37, 14, ' [1] Setingkat Lebih Tinggi'),
(38, 14, '[2] Tingkat yang Sama'),
(39, 14, ' [3] Setingkat Lebih Rendah'),
(40, 14, ' [4] Tidak Perlu Pendidikan Tinggi'),
(41, 15, ' [1] Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya'),
(42, 15, ' [2] Saya belum mendapatkan pekerjaan yang lebih sesuai.'),
(43, 15, ' [3] Di pekerjaan ini saya memeroleh prospek karir yang baik. '),
(44, 15, ' [4] Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya'),
(45, 15, ' [5] Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya.'),
(46, 15, ' [6] Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini.'),
(47, 15, ' [7] Pekerjaan saya saat ini lebih aman/terjamin/secure'),
(48, 15, ' [8] Pekerjaan saya saat ini lebih menarik'),
(49, 15, ' [9] Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dl'),
(50, 15, ' [10] Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya'),
(51, 15, ' [11] Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya.'),
(52, 15, ' [12] Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya.'),
(53, 15, '[13] Lainnya: '),
(109, 8, ' [1] Saya masih belajar/melanjutkan kuliah profesi atau pascasarjana '),
(110, 8, ' [2] Saya menikah '),
(111, 8, ' [3] Saya sibuk dengan keluarga dan anak-anak'),
(112, 8, ' [4] Saya sekarang sedang mencari pekerjaan '),
(113, 8, ' [5] Lainnya'),
(178, 1, '[4] Lebih dari 12 bulan'),
(179, 4, '1-3 Perusahaan'),
(180, 4, '3-6 Perusahaan'),
(181, 4, 'lebih dari 6 perusahaan'),
(182, 5, '1-3 Perusahaan'),
(183, 5, '3-6 Perusahaan'),
(184, 5, 'lebih dari 6 perusahaan'),
(185, 6, '1-3 Perusahaan'),
(186, 6, '3-6 Perusahaan'),
(187, 6, 'lebih dari 6 perusahaan'),
(188, 11, 'kurang Rp 1.000.000'),
(189, 11, 'Rp 1.000.000 -  Rp 2.500.000'),
(190, 11, 'Rp 2.500.000 - Rp 5.000.000'),
(191, 11, 'Rp 5.000.000 - Rp 7.500.000'),
(192, 11, 'lebih  Rp 7.500.000'),
(193, 74, 'sdsds'),
(197, 78, 'aaaaa'),
(198, 78, 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `survei_pertanyaan`
--

CREATE TABLE `survei_pertanyaan` (
  `id` int(3) NOT NULL,
  `id_survei` int(3) NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survei_pertanyaan`
--

INSERT INTO `survei_pertanyaan` (`id`, `id_survei`, `pertanyaan`) VALUES
(1, 5, 'Kapan anda mulai mencari pekerjaan?'),
(2, 5, 'Bagaimana anda mencari pekerjaan tersebut?'),
(4, 5, 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?'),
(5, 5, 'Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?'),
(6, 5, 'Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?'),
(7, 5, 'Apakah anda bekerja saat ini (termasuk kerja sambilan dan wirausaha)?'),
(8, 5, 'Bagaimana anda menggambarkan situasi anda saat ini?'),
(9, 5, 'Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir?'),
(10, 5, 'Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?'),
(11, 5, 'Kira-kira berapa pendapatan anda setiap bulannya?'),
(12, 5, 'Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?'),
(14, 5, 'Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?'),
(15, 5, 'Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya?'),
(74, 5, 'axaxa'),
(78, 10, 'coba lagi');

--
-- Triggers `survei_pertanyaan`
--
DELIMITER $$
CREATE TRIGGER `after_pertanyaan_delete` AFTER DELETE ON `survei_pertanyaan` FOR EACH ROW BEGIN

DELETE FROM survei_jawaban WHERE survei_jawaban.id_pertanyaan = old.id;
DELETE FROM jawaban_pertanyaan WHERE jawaban_pertanyaan.id_pertanyaan = old.id;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testi` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `testimoni` text NOT NULL,
  `kritik_saran` text NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testi`, `id_user`, `testimoni`, `kritik_saran`, `status`) VALUES
(1, 76, 'Kuliahnya enak sering gamasuk :D', 'Semoga ga berubah', 'publish'),
(3, 48, 'Dosennya lucu - lucu saya ga suka', 'hapuskan IT DO', 'publish');

--
-- Triggers `testimoni`
--
DELIMITER $$
CREATE TRIGGER `after_testi_insert` AFTER INSERT ON `testimoni` FOR EACH ROW BEGIN
INSERT INTO history VALUES (NULL, new.id_user, 'testi_new', now());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_testi_update` AFTER UPDATE ON `testimoni` FOR EACH ROW BEGIN
INSERT INTO history VALUES (NULL, new.id_user, 'testi_update', now());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `testi_v`
-- (See below for the actual view)
--
CREATE TABLE `testi_v` (
`nama_depan` varchar(10)
,`nama_belakang` varchar(15)
,`id_testi` int(10)
,`testimoni` text
,`kritik_saran` text
,`status` varchar(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `id_user_grup` int(10) NOT NULL,
  `nim` char(9) NOT NULL,
  `nama_depan` varchar(10) NOT NULL,
  `nama_belakang` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(2) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` varchar(30) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  `tahun_lulus` varchar(30) DEFAULT NULL,
  `angkatan` varchar(50) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_user_grup`, `nim`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `telp`, `email`, `alamat`, `password`, `tahun_lulus`, `angkatan`, `foto`, `status`) VALUES
(1, 1, '0', 'Bagja sept', 'munawar', 'L', NULL, '2020-06-01', '083821354485', 'bagja672@gmail.com', '', '493fd8c3e109720', '2020-06-25', '', '', ''),
(24, 1, '0', 'admin', 'kerenn', 'L', NULL, '', '', 'admin@gmail.com', '', '21232f297a57a5a', '', '', '', 'aktif'),
(27, 2, '0', 'Dosen', 'Test', 'L', NULL, '', '0832827371', 'iwanabadi@gmail.com', 'jl karapitan no11', '827ccb0eea8a706', '', '', 'admin3.jpg', 'aktif'),
(29, 2, '0', 'BJ', 'SP', 'L', NULL, '', '123131313', 'traos.corp@gmail.com', 'bandung', 'a4165381b7249b5', '', '', '1267016_4cb469fb-1e44-414a-95dc-b3b6eb5e03b2_(1).png', 'aktif'),
(47, 0, '0', 'Budiman', 'rahayu', 'L', NULL, '03 August 2020', '0821435784932', 'fahmyal080397@gmail.com', 'jl karapitan no11', '456b39e6cf4fdc9', '2019', '2015', 'admin.jpg', 'nonaktif'),
(48, 0, '191402076', 'Sergi Apri', 'Djumantara', 'L', 'Medan', '26 November 1996', '087823728172', 'sergi@gmail.com', 'ciparay indah', '8b8d481c6dcdbd2', '2020', '2016', 'UZLTE5704-removebg-preview.png', 'aktif'),
(50, 0, '0', 'Topan ', 'nurdiansyah', 'L', NULL, '07 January 1991', '0827352435', 'topan@gmail.com', 'tegal lega ', '2b165d92e828c00', '2017', '2011', 'admin.jpg', 'nonaktif'),
(76, 0, '1223', 'Kenzie', 'Ammar Achmad Si', 'L', 'Medan', '28 July 2019', '0864454545454', 'wndkhlish@gmail.com', 'jermal', 'ed2b1f468c5f915', '2021', '2019', 'UZLTE5704-removebg-preview.png', 'aktif'),
(77, 0, '1223', 'wanda', 'khalishah', NULL, NULL, NULL, NULL, 'wndkhlish@gmail.com', NULL, 'ed2b1f468c5f915', NULL, NULL, 'adha.jpg', 'nonaktif'),
(78, 0, '191402013', 'Mhd', 'Syahrizal', NULL, NULL, NULL, NULL, 'rizal@gmail.com', NULL, '25d55ad283aa400', NULL, NULL, 'MhdSyahrizal_FotoBebas.jpg', 'aktif');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `after_user_delete` AFTER DELETE ON `user` FOR EACH ROW BEGIN
INSERT INTO history VALUES (NULL, old.id, 'user_delete', now());
DELETE FROM testimoni WHERE testimoni.id_user = old.id;
DELETE FROM pekerjaan_alumni WHERE pekerjaan_alumni.id_user = old.id;
DELETE FROM jawaban_pertanyaan WHERE jawaban_pertanyaan.id_user = old.id;
DELETE FROM loker WHERE loker.id_user = old.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_user_insert` AFTER INSERT ON `user` FOR EACH ROW BEGIN
INSERT INTO history VALUES (NULL, new.id, 'registrasi', now());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_v`
-- (See below for the actual view)
--
CREATE TABLE `user_v` (
`id` int(10)
,`id_user_grup` int(10)
,`nim` char(9)
,`nama_depan` varchar(10)
,`nama_belakang` varchar(15)
,`jenis_kelamin` varchar(2)
,`tempat_lahir` varchar(100)
,`tgl_lahir` varchar(30)
,`telp` varchar(20)
,`email` varchar(30)
,`alamat` text
,`password` varchar(15)
,`tahun_lulus` varchar(30)
,`angkatan` varchar(50)
,`foto` varchar(255)
,`status` varchar(30)
,`instansi` varchar(150)
,`jabatan` varchar(100)
,`mulai_bekerja` date
,`alamat_kerja` text
,`kota` varchar(50)
,`bidang_pekerjaan` varchar(100)
,`id_bidang` int(10)
,`id_testi` int(10)
,`testimoni` text
,`kritik_saran` text
);

-- --------------------------------------------------------

--
-- Structure for view `aktifuser_v`
--
DROP TABLE IF EXISTS `aktifuser_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aktifuser_v`  AS SELECT `user`.`id` AS `id`, `user`.`id_user_grup` AS `id_user_grup`, `user`.`nim` AS `nim`, `user`.`nama_depan` AS `nama_depan`, `user`.`nama_belakang` AS `nama_belakang`, `user`.`jenis_kelamin` AS `jenis_kelamin`, `user`.`tempat_lahir` AS `tempat_lahir`, `user`.`tgl_lahir` AS `tgl_lahir`, `user`.`telp` AS `telp`, `user`.`email` AS `email`, `user`.`alamat` AS `alamat`, `user`.`password` AS `password`, `user`.`tahun_lulus` AS `tahun_lulus`, `user`.`angkatan` AS `angkatan`, `user`.`foto` AS `foto`, `user`.`status` AS `status` FROM `user` WHERE `user`.`id_user_grup` = 0 AND `user`.`status` = 'aktif' ;

-- --------------------------------------------------------

--
-- Structure for view `bidang_pekerjaan_v`
--
DROP TABLE IF EXISTS `bidang_pekerjaan_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bidang_pekerjaan_v`  AS SELECT `bidang_pekerjaan`.`id` AS `id`, `bidang_pekerjaan`.`nama` AS `nama` FROM `bidang_pekerjaan` ;

-- --------------------------------------------------------

--
-- Structure for view `history_v`
--
DROP TABLE IF EXISTS `history_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `history_v`  AS SELECT `h`.`id_user` AS `id_user`, `u`.`nama_depan` AS `nama_depan`, `u`.`nama_belakang` AS `nama_belakang`, `h`.`aksi` AS `aksi`, `h`.`waktu` AS `waktu` FROM (`user` `u` join `history` `h`) WHERE `u`.`id` = `h`.`id_user` ;

-- --------------------------------------------------------

--
-- Structure for view `jawaban_v`
--
DROP TABLE IF EXISTS `jawaban_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jawaban_v`  AS SELECT `p`.`id_survei` AS `id_survei`, `p`.`pertanyaan` AS `pertanyaan`, `p`.`id` AS `id_pertanyaan`, `sj`.`jawaban` AS `jawaban`, `sj`.`id` AS `id`, count(`j`.`jawaban`) AS `jlh` FROM ((`survei_jawaban` `sj` left join `jawaban_pertanyaan` `j` on(`j`.`jawaban` = `sj`.`id`)) left join `survei_pertanyaan` `p` on(`sj`.`id_pertanyaan` = `p`.`id`)) GROUP BY `sj`.`id` ORDER BY `sj`.`id` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `lokertersedia_v`
--
DROP TABLE IF EXISTS `lokertersedia_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lokertersedia_v`  AS SELECT `l`.`id` AS `id`, `l`.`id_user` AS `id_user`, `l`.`judul` AS `judul`, `l`.`kota` AS `kota`, `l`.`instansi` AS `instansi`, `l`.`email` AS `email`, `l`.`syarat` AS `syarat`, `l`.`deskripsi` AS `deskripsi`, `l`.`tgl_buat` AS `tgl_buat`, `l`.`tgl_akhir` AS `tgl_akhir`, `l`.`status` AS `status`, `u`.`nama_depan` AS `nama_depan`, `u`.`nama_belakang` AS `nama_belakang` FROM (`loker` `l` left join `user` `u` on(`l`.`id_user` = `u`.`id`)) WHERE `l`.`status` = 'publish' AND `l`.`tgl_akhir` > curdate() ORDER BY `l`.`id` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `loker_v`
--
DROP TABLE IF EXISTS `loker_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `loker_v`  AS SELECT `u`.`id` AS `id_user`, `u`.`nama_depan` AS `nama_depan`, `u`.`nama_belakang` AS `nama_belakang`, `l`.`id` AS `id_loker`, `l`.`judul` AS `judul`, `l`.`kota` AS `kota`, `l`.`instansi` AS `instansi`, `l`.`email` AS `email`, `l`.`syarat` AS `syarat`, `l`.`deskripsi` AS `deskripsi`, `l`.`tgl_buat` AS `tgl_buat`, `l`.`tgl_akhir` AS `tgl_akhir`, `l`.`status` AS `status` FROM (`user` `u` join `loker` `l`) WHERE `u`.`id` = `l`.`id_user` ;

-- --------------------------------------------------------

--
-- Structure for view `nonaktifuser_v`
--
DROP TABLE IF EXISTS `nonaktifuser_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nonaktifuser_v`  AS SELECT `user`.`id` AS `id`, `user`.`id_user_grup` AS `id_user_grup`, `user`.`nim` AS `nim`, `user`.`nama_depan` AS `nama_depan`, `user`.`nama_belakang` AS `nama_belakang`, `user`.`jenis_kelamin` AS `jenis_kelamin`, `user`.`tempat_lahir` AS `tempat_lahir`, `user`.`tgl_lahir` AS `tgl_lahir`, `user`.`telp` AS `telp`, `user`.`email` AS `email`, `user`.`alamat` AS `alamat`, `user`.`password` AS `password`, `user`.`tahun_lulus` AS `tahun_lulus`, `user`.`angkatan` AS `angkatan`, `user`.`foto` AS `foto`, `user`.`status` AS `status` FROM `user` WHERE `user`.`id_user_grup` = 0 AND `user`.`status` = 'nonaktif' ;

-- --------------------------------------------------------

--
-- Structure for view `report_v`
--
DROP TABLE IF EXISTS `report_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_v`  AS SELECT `responden`(`s`.`id`) AS `responden`, `s`.`id` AS `id`, `s`.`nama_survei` AS `nama_survei`, `s`.`deskripsi` AS `deskripsi`, `s`.`tgl_mulai` AS `tgl_mulai`, `s`.`tgl_berahkir` AS `tgl_berahkir`, `s`.`tgl_update` AS `tgl_update` FROM `survei` AS `s` GROUP BY `s`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `surveitersedia_v`
--
DROP TABLE IF EXISTS `surveitersedia_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `surveitersedia_v`  AS SELECT `s`.`id` AS `id`, `s`.`nama_survei` AS `nama_survei`, `s`.`deskripsi` AS `deskripsi`, `s`.`tgl_mulai` AS `tgl_mulai`, `s`.`tgl_berahkir` AS `tgl_berahkir`, `s`.`tgl_update` AS `tgl_update` FROM `survei` AS `s` WHERE `s`.`tgl_mulai` <= curdate() AND `s`.`tgl_berahkir` >= curdate() ;

-- --------------------------------------------------------

--
-- Structure for view `testi_v`
--
DROP TABLE IF EXISTS `testi_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `testi_v`  AS SELECT `u`.`nama_depan` AS `nama_depan`, `u`.`nama_belakang` AS `nama_belakang`, `t`.`id_testi` AS `id_testi`, `t`.`testimoni` AS `testimoni`, `t`.`kritik_saran` AS `kritik_saran`, `t`.`status` AS `status` FROM (`user` `u` join `testimoni` `t`) WHERE `u`.`id` = `t`.`id_user` ;

-- --------------------------------------------------------

--
-- Structure for view `user_v`
--
DROP TABLE IF EXISTS `user_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_v`  AS  (select `u`.`id` AS `id`,`u`.`id_user_grup` AS `id_user_grup`,`u`.`nim` AS `nim`,`u`.`nama_depan` AS `nama_depan`,`u`.`nama_belakang` AS `nama_belakang`,`u`.`jenis_kelamin` AS `jenis_kelamin`,`u`.`tempat_lahir` AS `tempat_lahir`,`u`.`tgl_lahir` AS `tgl_lahir`,`u`.`telp` AS `telp`,`u`.`email` AS `email`,`u`.`alamat` AS `alamat`,`u`.`password` AS `password`,`u`.`tahun_lulus` AS `tahun_lulus`,`u`.`angkatan` AS `angkatan`,`u`.`foto` AS `foto`,`u`.`status` AS `status`,`p`.`instansi` AS `instansi`,`p`.`jabatan` AS `jabatan`,`p`.`mulai_bekerja` AS `mulai_bekerja`,`p`.`alamat` AS `alamat_kerja`,`p`.`kota` AS `kota`,`b`.`nama` AS `bidang_pekerjaan`,`b`.`id` AS `id_bidang`,`t`.`id_testi` AS `id_testi`,`t`.`testimoni` AS `testimoni`,`t`.`kritik_saran` AS `kritik_saran` from (((`user` `u` left join `pekerjaan_alumni` `p` on(`u`.`id` = `p`.`id_user`)) left join `bidang_pekerjaan` `b` on(`p`.`id_bidang` = `b`.`id`)) left join `testimoni` `t` on(`u`.`id` = `t`.`id_user`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_pekerjaan`
--
ALTER TABLE `bidang_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban_pertanyaan`
--
ALTER TABLE `jawaban_pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan_alumni`
--
ALTER TABLE `pekerjaan_alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survei`
--
ALTER TABLE `survei`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survei_jawaban`
--
ALTER TABLE `survei_jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`);

--
-- Indexes for table `survei_pertanyaan`
--
ALTER TABLE `survei_pertanyaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_survey` (`id_survei`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang_pekerjaan`
--
ALTER TABLE `bidang_pekerjaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `custom`
--
ALTER TABLE `custom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `jawaban_pertanyaan`
--
ALTER TABLE `jawaban_pertanyaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pekerjaan_alumni`
--
ALTER TABLE `pekerjaan_alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `survei`
--
ALTER TABLE `survei`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `survei_jawaban`
--
ALTER TABLE `survei_jawaban`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `survei_pertanyaan`
--
ALTER TABLE `survei_pertanyaan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
