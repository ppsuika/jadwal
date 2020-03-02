-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 02, 2020 at 06:49 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_jadwal`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_agenda`
--

CREATE TABLE `ci_agenda` (
  `id_agenda` int(11) NOT NULL,
  `judul_kegiatan` varchar(255) NOT NULL,
  `jenis_kegiatan` varchar(128) NOT NULL,
  `kegiatan` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_berakhir` varchar(255) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_agenda`
--

INSERT INTO `ci_agenda` (`id_agenda`, `judul_kegiatan`, `jenis_kegiatan`, `kegiatan`, `tanggal`, `jam_mulai`, `jam_berakhir`, `prodi_id`, `group_id`) VALUES
(3, 'SIDANG TESIS', 'SIDANG', 'SIDANG TESIS \r\n8 MAHASISWA', '2019-11-27', '08:00:00', 'Selesai', 6, 0),
(4, 'SIDANG TESIS ', 'SIDANG', 'SIDANG TESIS', '2019-11-27', '14:00:00', 'Selesai', 4, 2),
(5, 'Seminar Proposal', 'Ujian', 'Seminar Proposal Program Magister Pendidikan Agama Islam', '2019-11-28', '08:00:00', 'Selesai', 2, 0),
(6, 'Ujian Komprehensif', 'Ujian', 'Ujian Komprehensif mahasiswa Singapura sebanyak 11 peserta', '2019-11-29', '08:00:00', 'Selesai', 2, 0),
(7, 'Studi Banding Mahasiswa Singapura', 'Studi Banding', 'Studi Banding mahasiswa Singapura ke pondok pesantren Darul Muttaqien dan Darunnajah 2 Ciping', '2019-12-18', '07:00:00', 'Selesai', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_dosen`
--

CREATE TABLE `ci_dosen` (
  `id` int(11) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_dosen`
--

INSERT INTO `ci_dosen` (`id`, `nama_dosen`, `nidn`, `kontak`, `email`, `avatar`) VALUES
(1, 'Prof. Dr. KH. Didin Hafidhuddin, MS', '111111', '+6285775890072', 'didinhafidhuddin@pps.uika-bogor.ac.id', ''),
(2, 'H. Hendri Tanjung, Ph.D', '222222', '+6285885347446', 'hendritanjung@pps.uika-bogor.ac.id', ''),
(4, 'Dr. H. Hasbi Indra, M.A.', '444444', '+628123123', 'local@local.com', ''),
(6, 'Dr. H. Nadzratuzzaman Hosein, MA', '666666', '+62821421342423', 'qweqweq@gmail.com', ''),
(7, 'Dr. Muhyani, M.Si', '777777', '+62809089787876', 'muhyani@gmail.com', ''),
(8, 'Prof. Dr. H. Abuddin Nata, M.A.', '888888', '+62898876764', 'Abudinnata@gmail.com', ''),
(9, 'Dr. H. Anung Al Hamat, Lc., M.Pd.I', '999999', '+6280000000000', 'Anung@pps.uika-bogor.ac.id', ''),
(10, 'Dr. H. E. Mujahidin, M.Si', '12121212', '+62800000000000', 'Mujahidin@pps.uika-bogor.ac.id', ''),
(11, 'H. Adian Husaini, M.Si., Ph.D', '131313', '+6280000000000', 'adian@pps.uika-bogor.ac.id', ''),
(12, 'Prof. Dr. H. Ahmad Tafsir', '141414', '+62800000000000', 'ahmadtafsir@pps.uika-bogor.ac.id', ''),
(13, 'Dr. H. E. Bahruddin, M.Ag', '151515', '+6280000000', 'bahruddin@pps.uika-bogor.ac.id', ''),
(14, 'Dr. Hj. Maemunah Sa\'diyah, M.A.', '161616', '+62800000000000', 'maemunah@pps.uika-bogor.ac.id', ''),
(15, 'Dr. Ir. H. Budi Handrianto, M.Pd.I.', '171717', '+62800000000000', 'budihandrianto@pps.uika-bogor.ac.id', ''),
(16, '-', '181818', '', 'gdfhfd@gmail.com', ''),
(17, 'Dr. Santi Lisnawati, M.Pd', '191919', '+628000000000', 'Santi@pps.uika-bogor.ac.id', ''),
(18, 'Dr. Wido Supraha, M.Si', '212121', '+62800000000000', 'Wido@pps.uika-bogor.ac.id', ''),
(19, 'Dr. H. Abas Mansur Tamam, Lc., M.A.', '232323', '+62800000000000', 'abas@pps.uika-bogor.ac.id', ''),
(20, 'Dr. H. Ulil Amri Syafri, Lc., M.A.', '242424', '+62800000000000', 'ulilamri@pps.uika-bogor.ac.id', ''),
(21, 'Prof. Dr. H. Bunasor Sanim, M.Sc', '252525', '+62800000000000', 'bunasorsanim@pps.uika-bogor.ac.id', ''),
(22, 'Dr. H. Ibdalsyah, M.A.', '262626', '', 'ibdalsyah@gmail.com', '20170803035113-atomix_user31.png'),
(23, 'Dr.  Abdul Hayyie Al Kattani, MA', '272727', '', 'hayyie@gmail.com', '20170802231801-atomix_user31.png'),
(67, 'Dr. Hj. Indupurnahayu, M.M., Ak', '1234634654', '085855855485', 'indupurnahayu@ppsuika.ac.id', '20170803070344-atomix_user31.png'),
(68, 'Dr. Zainal Abidin Arief, MSc', '1454634564634', '085855464654', 'zainal.abidinarief@yahoo.com', '20170803064649-atomix_user31.png'),
(70, 'H. Nirwan Syafrin, M.A., Ph. D.', '78635765763785', '8978787645', 'nirwan@ppsuika.ac.id', '20170818161528-'),
(71, 'Dr. H. Abdul Madjid, MS', '76873656', '73785687326', 'madjid@ppsuika.ac.id', '20170818161838-'),
(72, 'Dr. Mohamad Taufik Qullazhar, MA', '7676887687483979', '98988776786767', 'Taufik@ppsuika.ac.id', '20171005143844-'),
(73, 'Dr. H. Taufan Maulamin,SE. Ak,.MM', '67863756273658', '7865764563526', 'Taufan@gmail.com', '20171005144647-'),
(74, 'Prof. Dr. Didin Saefuddin, M.A', '7676756785697', '86765767632573', 'Didin.sefuddin@gmail.com', '20171006143021-'),
(75, 'Dr. Hj. Herawati, MS', '657567565623', '736756656546', 'Hera@gmail.com', '20171006152109-'),
(76, 'Retno Wulandari, M.Pd', '767466736543', '7489738756736576', 'retno@gmail.com', '20171012135430-'),
(77, 'Dr. Ahmad, S.Sos.,MM', '873756376578', '573875767325', 'ahmad@gmail.com', '20171020104608-'),
(78, 'Dr. Sutisna', '6763576375', '875862576475285', 'sutisna@gmail.com', '20171027135216-'),
(79, 'Dr. Ahmad Juwaini', '87876677767', '97863765735', 'juwaini@gmail.com', '20171103105348-'),
(80, 'Dr. Sigit Wibowo', '877867656567', '67565656666567', 'sigit@gmail.com', '20171115092101-'),
(81, 'Prof. Dr. Musa Hubeis, MSc., Dipl.Ing.,DEA', '7867637673', '877676767', 'musa@gmail.com', '20171115094845-'),
(82, 'Dr. Hari Susanto, MA', '76756378568632', '767956327523', 'hari@gmail.com', '20171116140246-'),
(83, 'Dr. Ir. Trisiladi, M.Si', '83784635763', '7365786348', 'trs@gmail.com', '20171116140337-'),
(84, 'Dr. H. Budi Handrianto, M.Pd.I', '12451254', '628545485543', 'a@a.com', '20171117133721-'),
(85, 'Dr. H. Ruhenda, M.Pd', '867654598', '988664534', 'ruhenda@gmail.com', '20171123103839-'),
(86, 'Dr. Anwar Rahim, SE., MM.', '78564545', '897654', 'anwar@gmail.com', '20171130141608-'),
(87, 'H. Irfan Syauqie Beik, M.Sc., Ph.D', '9859738957', '859758748578', 'irfan@gmail.com', '20171215143500-'),
(88, 'Dr. Ating Sukma, M.Si', '756756536', '7676376823', 'ating@uika-bogor.ac.id', '20180112102215-'),
(89, 'Dr. H. Anwar Abbas, M.M, M.Ag.', 'xxxxxxxxlb', '087808331188', 'ridwansr4@gmail.com', '20180201155955-'),
(90, 'Dr. H. A. Rahmat Rosyadi, SH., MH', '878946586457', '758975893758', 'rahmatrosyadi@uika-bogor.ac.id', '20180322110345-'),
(91, 'Prof. Dr. H. Saeful Anwar, M.A.', '64736756735', '865762576753', 'Saefulanwar@gmail.com', '20180323092202-'),
(92, 'Dr. Masitowati Gatot, M.Pd', '12345678', '097808331188', 'neriagustin804@gmail.com', '20180409162805-'),
(93, 'Dr. Muktiono Waspodo, M.Pd', '123456789', '087808331188', 'isah.kamal@gmail.com', '20180409163028-'),
(94, 'Dr. Ahmad Sastra, M.M', '1234567890', '087808331188', 'raziv@ppsuika.ac.id', '20180629104916-'),
(96, 'Prof. Dr. H. Masyhudzulhak Djamil, MM', '12345678910', '088809006921', 'ppsuika.bogor@gmail.com', '20180712140927-'),
(97, 'dr. Suherman, M.Km.', '543665645654', '43434324', 'suherman@ppsuika.ac.id', '20191030013923-'),
(98, 'Dr. Ir. Amir Tengku Ramly, M.Si.', '4352435', '35545', 'amir@gmail.com', '20181008145546-'),
(99, 'Dr.Ir.H.Akhmad Bakhtiar Amin., MSc., Msi', '243543454', '353523532', 'A.Bakhtiar@gmail.com', '20181009090133-'),
(100, 'Dr. Dewi Basmalah, MARS.', '3564634', '6436644', 'Dewi@gmail.com', '20181009090353-'),
(101, 'Prof. Dr. Musa Hubeis., MSc. Dipl. Ing. DEA', '2354235435', '5332523', 'musahubeis@gmail.com', '20181010090304-'),
(102, 'Dr. Ir. Trisiladi Supriyanto, M.Si.', '435432', '325235', 'trisiladi@gmail.com', '20181010090724-'),
(104, 'Septy Achyanadia, M.Pd.', '33525', '2434', 'septi@gmail.com', '20181017142106-'),
(105, 'Dr. H. Dedi Walujadi, MA.', 'LB001', '0817740245', 'fatur@ppsuika.ac.id', '20181029130823-'),
(106, 'Dr. Hj Immas Nurhayati, S.E., MSM.', '85695867', '64936896', 'immasNurhayati@gmail.com', '20181031083155-'),
(107, 'Dr. Yanuardi, M.Pd', '123456', '123456', '123456@gmail.com', '20181105062254-'),
(109, 'Dr. Kendra Hartanya, M.Si', '1234567', '1234567', '1234567@gmail.com', '20181105062424-'),
(110, 'Dr. Maesaroh Lubis, M.Pd', '1234', '1234', '1234@gmail.com', '20181106142354-'),
(111, 'Dr. Abdul Karim Halim, M.Si', '12345', '123456789', '12345@gamil.com', '20181121073716-'),
(112, 'Dr. Kirbandoko', '67673675423', '2417248781726476', 'kirbandoko@ppsuika.ac.id', '20190211101731-'),
(115, 'Dr. Fauzi Syamsuar, M.Hum', '12345667890', '085912341234', 'fauzi@gmail.com', '20190319111006-'),
(116, 'Dr. Renea Shinta Aminda, SE., MM', '', '846494578', 'renea@uika-bogor.ac.id', '20191008012606-'),
(118, 'Dr. Shinta Dewi', '00', '081314529129', 'shintadewi1979@gmail.com', '20191009023649-'),
(120, 'Dr. Ahmad Afandi', '0407046704', '', '', '20191011032932-'),
(121, 'Prof. Dr. Nandan', '61948464', '84548404', 'raziv@ppsuika.ac.id', '20191116004811-'),
(123, 'Dr. Hj. Imas Kania Rahman, M.Pd.I', '012345678', '08522222222', 'imas@gmail.com', '20191120032427-'),
(124, 'Dr. Ahmad Waqi, M.Pd.I', '10000', '0821000000', '', '20191127025307-');

-- --------------------------------------------------------

--
-- Table structure for table `ci_jadwal`
--

CREATE TABLE `ci_jadwal` (
  `id` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `dosen_pengganti` varchar(50) NOT NULL,
  `kode_ruangan` varchar(50) NOT NULL,
  `jml_mahasiswa` varchar(100) NOT NULL,
  `jam_mulai` varchar(50) NOT NULL,
  `jam_berakhir` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `sesi_kuliah` int(11) NOT NULL,
  `group_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_jadwal`
--

INSERT INTO `ci_jadwal` (`id`, `nama_prodi`, `semester`, `nama_matkul`, `nama_dosen`, `dosen_pengganti`, `kode_ruangan`, `jml_mahasiswa`, `jam_mulai`, `jam_berakhir`, `tanggal`, `sesi_kuliah`, `group_id`) VALUES
(22, '2', '3', '1', '1', '', '6', '', '00:50', '20:03', '2019-09-28', 0, '6'),
(23, '7', '1', '77', '116', '', '8', '23', '18:30', '22:00', '2019-10-08', 0, '4'),
(24, '7', '3', '108', '98', '', '6', '12', '18:30', '22:00', '2019-10-08', 0, '4'),
(25, '2', '1 A', '9', '19', '', '3', '15', '16:00', '20:00', '2019-10-09', 0, '1'),
(26, '2', '1 A', '19', '118', '', '4', '14', '16:00', '20:00', '2019-10-10', 0, '1'),
(27, '2', '1 B', '9', '18', '', '4', '15', '16:00', '20:00', '2019-10-09', 0, '1'),
(28, '2', '1 B', '19', '2', '', '5', '14', '16:00', '20:00', '2019-10-10', 0, '1'),
(29, '2', '2', '42', '17', '', '4', '14', '16:00', '20:00', '2019-10-09', 0, '1'),
(30, '2', '2', '5', '8', '', '1', '20', '16:00', '20:00', '2019-10-10', 0, '1'),
(32, '2', '3 A', '81', '67', '', '6', '', '16:00', '20:00', '2019-10-09', 0, '1'),
(33, '2', '3 A', '20', '80', '80', '6', '17', '16:00', '20:00', '2019-10-10', 0, '1'),
(34, '2', '3 B', '20', '20', '', '1', '', '16:00', '20:00', '2019-10-09', 0, '1'),
(35, '2', '3 B', '81', '67', '', '8', '17', '16:00', '20:00', '2019-10-10', 0, '1'),
(36, '4', 'Semester 3', '36', '72', '82', '3', '9', '16:00', '20:00', '2019-10-10', 0, '2'),
(37, '1', 'I & II', '6', '13', '', '5', '26', '13:00', '17:00', '2019-11-15', 0, '5'),
(38, '1', 'I & II ', '9', '11', '', '5', '25', '17:00', '21:00', '2019-11-15', 0, '5'),
(39, '1', 'III', '55', '15', '', '9', '10', '17:00', '21:00', '2019-11-15', 0, '5'),
(40, '4', 'I', '37', '2', '', '5', '9', '16:00', '20:00', '2019-10-11', 0, '2'),
(41, '4', 'III', '41', '120', '2', '3', '9', '17:00', '21:00', '2019-10-11', 0, '2'),
(42, '1', 'III', '11', '4', '', '5', '10', '08:00', '12:00', '2019-11-16', 0, '5'),
(43, '1', 'I & II', '45', '12', '', '1', '26', '08:00', '12:00', '2019-11-16', 0, '5'),
(44, '1', 'I & II', '44', '91', '', '1', '26', '13:00', '17:00', '2019-11-16', 0, '5'),
(45, '7', '1', '85', '67', '', '8', '21', '18:30', '22:00', '2019-10-14', 0, '4'),
(46, '7', '3', '53', '81', '', '6', '12', '18:30', '22:00', '2019-10-14', 0, '4'),
(47, '2', '1 A', '9', '19', '', '3', '14', '16:00', '20:00', '2019-10-16', 0, '1'),
(48, '2', '1 B', '9', '18', '', '4', '13', '16:00', '20:00', '2019-10-16', 0, '1'),
(49, '2', '2', '42', '17', '', '5', '19', '16:00', '20:00', '2019-10-16', 0, '1'),
(51, '2', '3 A', '81', '67', '', '8', '14', '16:00', '20:00', '2019-10-16', 0, '1'),
(52, '2', '3 B', '20', '20', '', '1', '12', '16:00', '20:00', '2019-10-16', 0, '1'),
(53, '2', '1 A & 1 B', '19', '118', '', '5', '27', '16:00', '20:00', '2019-10-17', 0, '1'),
(54, '2', '1 A', '9', '19', '', '3', '14', '16:00', '20:00', '2019-10-23', 0, '1'),
(56, '2', '1 A', '9', '18', '', '4', '14', '16:00', '20:00', '2019-10-30', 0, '1'),
(57, '2', '1 A', '19', '2', '', '4', '14', '16:00', '20:00', '2019-10-31', 0, '1'),
(59, '2', '1 B', '9', '18', '', '1', '13', '16:00', '20:00', '2019-10-23', 0, '1'),
(61, '2', '1 B', '9', '19', '', '3', '13', '16:00', '20:00', '2019-10-30', 0, '1'),
(62, '2', '1 B', '19', '118', '', '5', '13', '16:00', '20:00', '2019-10-31', 0, '1'),
(63, '2', '2', '62', '8', '', '3', '19', '16:00', '20:00', '2019-10-17', 0, '1'),
(64, '2', '2', '42', '17', '', '5', '19', '16:00', '20:00', '2019-10-23', 0, '1'),
(66, '2', '2', '19', '17', '', '5', '19', '16:00', '20:00', '2019-10-30', 0, '1'),
(67, '2', '2', '62', '8', '', '1', '19', '16:00', '20:00', '2019-10-31', 0, '1'),
(69, '2', '3 A', '81', '10', '', '6', '17', '16:00', '20:00', '2019-10-23', 0, '1'),
(71, '2', '3 A', '81', '10', '', '6', '17', '16:00', '20:00', '2019-10-30', 0, '1'),
(72, '2', '3 A', '20', '20', '', '3', '17', '16:00', '20:00', '2019-10-31', 0, '1'),
(73, '2', '3 - AL MA\'THUQ', '22', '18', '', '18', '', '10:30', '16:00', '2019-10-17', 0, '1'),
(75, '2', '3 - AL MA\'THUQ', '22', '18', '', '18', '15', '10:30', '16:00', '2019-10-31', 0, '1'),
(76, '2', '3 B', '81', '67', '', '8', '17', '16:00', '20:00', '2019-10-17', 0, '1'),
(77, '4', 'I', '40', '22', '', '3', '9', '16:00', '20:00', '2019-10-17', 0, '2'),
(78, '4', 'III', '36', '72', '', '9', '9', '17:00', '21:00', '2019-10-17', 0, '2'),
(79, '4', 'I', '40', '22', '', '3', '9', '16:00', '20:00', '2019-10-18', 0, '2'),
(80, '4', 'III', '41', '120', '', '5', '9', '17:00', '21:00', '2019-10-18', 0, '2'),
(81, '7', '3', '109', '81', '', '8', '', '18:30', '22:00', '2019-10-21', 0, '4'),
(82, '2', '3 B', '20', '20', '', '4', '17', '16:00', '20:00', '2019-10-23', 0, '1'),
(86, '2', '3 Kelas Al Ma\'thuq', '22', '19', '', '18', '', '10:30', '16:00', '2019-10-24', 0, '1'),
(89, '1', 'III', '13', '1', '', '9', '10', '13:30', '17:00', '2019-11-15', 0, '5'),
(90, '2', '3 B', '81', '10', '', '6', '', '16:30', '20:30', '2019-10-24', 0, '1'),
(95, '2', '3 A', '20', '80', '', '8', '', '16:30', '20:30', '2019-10-24', 0, '1'),
(96, '4', 'I', '40', '22', '', '3', '12', '16:00', '20:00', '2019-10-24', 0, '2'),
(97, '4', 'III', '36', '82', '', '9', '9', '17:00', '21:00', '2019-10-24', 0, '2'),
(98, '4', 'I', '40', '22', '', '3', '12', '16:00', '20:00', '2019-10-25', 0, '2'),
(99, '4', 'III', '41', '120', '', '5', '9', '17:00', '21:00', '2019-10-25', 0, '2'),
(100, '1', 'III', '35', '8', '', '5', '10', '13:00', '17:00', '2019-11-16', 0, '5'),
(101, '6', '1&2', '9', '19', '', '3', '13', '16:00', '20:00', '2019-10-28', 0, '3'),
(103, '4', 'I', '51', '83', '', '3', '12', '16:00', '20:00', '2019-11-01', 0, '2'),
(104, '4', 'III', '36', '82', '', '9', '9', '17:00', '21:00', '2019-10-31', 0, '2'),
(105, '4', 'III', '41', '2', '', '9', '9', '17:00', '21:00', '2019-11-01', 0, '2'),
(106, '7', '1', '99', '112', '', '6', '12', '18:30', '22:00', '2019-10-28', 0, '4'),
(107, '7', '3', '53', '81', '', '8', '12', '18:30', '22:00', '2019-10-28', 0, '4'),
(108, '7', '3', '73', '97', '', '19', '2', '18:30', '22:00', '2019-10-29', 0, '4'),
(109, '7', '3', '108', '15', '', '8', '8', '18:30', '22:00', '2019-10-29', 0, '4'),
(110, '6', '1&2', '80', '68', '104', '6', '13', '16:00', '20:00', '2019-10-29', 0, '3'),
(112, '7', '3', '73', '97', '', '19', '2', '18:30', '22:00', '2019-10-30', 0, '4'),
(113, '2', '3 B', '81', '10', '', '6', '17', '16:00', '20:00', '2019-10-31', 0, '1'),
(114, '7', '1', '82', '22', '', '8', '12', '18:30', '22:00', '2019-11-01', 0, '6'),
(116, '2', '3 B', '20', '80', '', '5', '17', '16:00', '20:00', '2019-11-01', 0, '1'),
(117, '7', '1', '99', '112', '', '8', '11', '18:30', '22:00', '2019-11-04', 0, '4'),
(118, '7', '3', '53', '79', '', '6', '12', '18:30', '22:00', '2019-11-04', 0, '4'),
(119, '7', '3', '73', '97', '', '19', '2', '18:30', '22:00', '2019-11-04', 0, '4'),
(120, '7', '3 MSDM', '108', '15', '', '8', '8', '18:30', '22:00', '2019-11-05', 0, '4'),
(121, '7', '3 MMRS', '76', '97', '', '6', '2', '18:30', '22:00', '2019-11-05', 0, '4'),
(122, '2', '1 A', '9', '18', '', '4', '14', '16:00', '20:00', '2019-11-06', 0, '1'),
(123, '2', '1 B', '9', '19', '', '3', '13', '16:00', '20:00', '2019-11-06', 0, '1'),
(124, '2', '2', '42', '15', '', '5', '19', '16:00', '20:00', '2019-11-06', 0, '1'),
(125, '2', '3 A', '81', '10', '', '6', '17', '16:00', '20:00', '2019-11-06', 0, '1'),
(126, '2', '3 B', '20', '80', '', '8', '17', '16:00', '20:00', '2019-11-06', 0, '1'),
(127, '4', 'I', '44', '2', '', '1', '12', '16:00', '20:00', '2019-11-07', 0, '2'),
(128, '4', 'III', '36', '72', '', '9', '9', '17:00', '21:00', '2019-11-07', 0, '2'),
(130, '2', '1 A & B', '19', '118', '', '5', '27', '16:00', '20:00', '2019-11-07', 0, '1'),
(132, '2', '2', '5', '4', '', '4', '19', '16:00', '20:00', '2019-11-07', 0, '1'),
(134, '2', '3B', '81', '10', '', '8', '17', '16:00', '20:00', '2019-11-07', 0, '1'),
(137, '2', '3A', '20', '20', '', '3', '17', '16:00', '20:00', '2019-11-07', 0, '1'),
(138, '4', 'III', '41', '2', '', '9', '9', '17:00', '21:00', '2019-11-08', 0, '2'),
(139, '4', 'I', '51', '83', '', '1', '12', '16:00', '20:00', '2019-11-08', 0, '2'),
(140, '6', '1&2', '86', '13', '', '14', '13', '16:00', '20:00', '2019-11-11', 0, '3'),
(141, '6', '3', '87', '68', '', '6', '18', '16:00', '20:00', '2019-11-11', 0, '3'),
(142, '2', '1 A', '9', '18', '', '4', '14', '16:00', '20:00', '2019-11-13', 0, '1'),
(143, '2', '1 B', '9', '19', '', '3', '13', '16:00', '20:00', '2019-11-13', 0, '1'),
(144, '2', '2', '42', '15', '', '5', '19', '16:00', '20:00', '2019-11-13', 0, '1'),
(145, '2', '3 A', '81', '10', '', '6', '17', '16:00', '20:00', '2019-11-13', 0, '1'),
(146, '2', '3 B', '20', '80', '', '8', '17', '16:00', '20:00', '2019-11-13', 0, '1'),
(147, '4', 'I', '51', '102', '', '3', '12', '16:00', '20:00', '2019-11-21', 0, '2'),
(148, '4', 'III', '36', '72', '', '9', '9', '17:00', '21:00', '2019-11-14', 0, '2'),
(150, '2', '1 A & B', '19', '118', '', '5', '27', '16:00', '20:00', '2019-11-14', 0, '1'),
(151, '2', '2', '5', '4', '', '4', '19', '16:00', '20:00', '2019-11-14', 0, '1'),
(152, '2', '3 A', '20', '20', '', '8', '17', '16:00', '20:00', '2019-11-14', 0, '1'),
(153, '2', '3 B', '81', '10', '', '6', '17', '16:00', '20:00', '2019-11-14', 0, '1'),
(154, '2', '3 - AL MA\'THUQ', '2', '13', '', '1', '', '08:00', '16:00', '2019-11-14', 0, '1'),
(155, '7', '1', '99', '121', '', '5', '11', '07:00', '16:00', '2019-11-16', 0, '4'),
(156, '6', 'I & II', '91', '80', '', '6', '13', '14:00', '18:00', '2019-11-16', 0, '3'),
(157, '6', '3 - TP', '70', '111', '', '5', '13', '16:00', '20:00', '2019-11-18', 0, '3'),
(158, '6', '3 - PAUD', '83', '92', '', '3', '7', '16:00', '20:00', '2019-11-18', 0, '3'),
(159, '6', '1 & 2', '89', '107', '', '6', '11', '16:00', '20:00', '2019-11-18', 0, '3'),
(160, '7', '3 MSDM', '109', '79', '', '8', '8', '18:30', '22:00', '2019-11-18', 0, '4'),
(161, '7', '3 MSDM', '108', '98', '', '8', '8', '18:30', '22:00', '2019-11-19', 0, '4'),
(162, '7', '3 MMRS', '76', '97', '', '19', '2', '18:30', '22:00', '2019-11-19', 0, '4'),
(163, '4', 'SEMESTER I', '59', '2', '102', '3', '12', '17:00', '21:00', '2019-11-14', 0, '2'),
(164, '4', 'SEMESTER I', '59', '2', '102', '3', '12', '17:00', '21:00', '2019-11-28', 0, '2'),
(167, '6', '1&2', '44', '68', '', '6', '13', '16:00', '20:00', '2019-11-19', 0, '3'),
(168, '6', '3', '66', '93', '', '1', '18', '16:00', '20:00', '2019-11-19', 0, '3'),
(169, '7', '3 MMRS', '73', '', '', '8', '2', '18:30', '22:00', '2019-11-20', 0, '4'),
(170, '2', '1 A', '9', '18', '', '4', '14', '16:00', '20:00', '2019-11-20', 0, '1'),
(171, '2', '1 B', '9', '19', '', '3', '13', '16:00', '20:00', '2019-11-20', 0, '1'),
(172, '2', '2', '42', '15', '', '1', '19', '16:00', '20:00', '2019-11-20', 0, '1'),
(173, '2', '3 A', '81', '10', '', '6', '17', '16:00', '20:00', '2019-11-20', 0, '1'),
(174, '2', '3 B', '20', '80', '', '5', '17', '16:00', '20:00', '2019-11-20', 0, '1'),
(175, '6', '1-PAUD', '88', '123', '', '20', '2', '16:00', '20:00', '2019-11-20', 0, '3'),
(176, '4', '3', '54', '86', '102', '9', '9', '17:00', '21:00', '2019-11-21', 0, '2'),
(178, '2', '1A & 1B', '19', '118', '', '1', '25', '16:00', '20:00', '2019-11-21', 0, '1'),
(179, '2', '2', '5', '4', '', '5', '19', '16:00', '20:00', '2019-11-21', 0, '1'),
(180, '2', '3 A', '20', '20', '', '8', '17', '16:00', '20:00', '2019-11-21', 0, '1'),
(181, '2', '3 B', '81', '10', '', '6', '17', '16:00', '20:00', '2019-11-21', 0, '1'),
(182, '6', '3-PAUD', '83', '75', '', '6', '7', '16:00', '20:00', '2019-11-22', 0, '3'),
(183, '2', '3 A', '20', '80', '', '5', '17', '16:00', '20:00', '2019-11-22', 0, '1'),
(184, '4', 'I', '59', '2', '', '3', '12', '16:00', '20:00', '2019-11-22', 0, '2'),
(186, '4', 'III', '36', '72', '82', '4', '9', '17:00', '21:00', '2019-11-22', 0, '2'),
(187, '4', 'I', '59', '2', '', '3', '12', '17:00', '21:00', '2019-12-05', 0, '2'),
(188, '4', 'I', '59', '2', '', '3', '12', '17:00', '21:00', '2019-12-12', 0, '2'),
(189, '7', '1', '82', '2', '', '8', '11', '18:30', '22:00', '2019-11-22', 0, '4'),
(190, '6', '1 & 2', '86', '13', '', '14', '13', '16:00', '20:00', '2019-11-28', 0, '3'),
(191, '6', '3', '87', '68', '', '6', '18', '16:00', '20:00', '2019-11-28', 0, '3'),
(192, '6', '1 & 2', '21', '93', '', '6', '13', '16:00', '20:00', '2019-11-28', 0, '3'),
(194, '2', '3 - AL MA\'THUQ', '81', '67', '', '8', '15', '13:30', '20:00', '2019-11-26', 0, '1'),
(195, '2', '1 A', '5', '8', '', '1', '14', '16:00', '20:00', '2019-11-27', 0, '1'),
(196, '2', '1 B', '5', '4', '', '3', '13', '16:00', '20:00', '2019-11-27', 0, '1'),
(197, '2', '2', '1', '20', '', '6', '19', '16:00', '20:00', '2019-11-27', 0, '1'),
(198, '2', '3 - BKPI', '23', '124', '', '4', '', '16:00', '20:00', '2019-11-27', 0, '1'),
(199, '2', '3 - MPI', '22', '18', '', '5', '', '16:00', '20:00', '2019-12-04', 0, '6'),
(200, '2', '3 - PPI', '26', '23', '', '9', '', '16:00', '20:00', '2019-12-25', 0, '6'),
(201, '6', '3', '5', '1', '', '2', '12', '15:04', '15:04', '2019-12-24', 2, '6'),
(203, '6', '2', '1', '1', '7', '1', '3', '15:12', '15:12', '2019-12-12', 0, '6'),
(204, '2', '2', '4', '7', '', '5', '23', '15:20', '15:20', '2019-12-12', 0, '6'),
(205, '1', '3', '1', '7', '', '1', '12', '12:18', '12:18', '2019-12-15', 0, '6'),
(206, '4', '3', '3', '11', '', '6', '12', '', '', '2019-12-15', 0, '6'),
(207, '4', '3', '3', '11', '', '6', '12', '', '', '2019-12-21', 0, '6'),
(209, '6', '2', '1', '2', '2', '2', '34', '13:51', '13:51', '2020-02-27', 3, '3');

-- --------------------------------------------------------

--
-- Table structure for table `ci_kehadiran_dosen`
--

CREATE TABLE `ci_kehadiran_dosen` (
  `id` int(11) NOT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `sesi_kuliah` int(11) NOT NULL,
  `jumlah_sesi` int(11) NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_kehadiran_dosen`
--

INSERT INTO `ci_kehadiran_dosen` (`id`, `id_jadwal`, `id_dosen`, `tanggal`, `sesi_kuliah`, `jumlah_sesi`, `id_group`) VALUES
(7, 209, 2, '2020-02-27', 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ci_matkul`
--

CREATE TABLE `ci_matkul` (
  `id` int(11) NOT NULL,
  `kode_matkul` varchar(5) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `sks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_matkul`
--

INSERT INTO `ci_matkul` (`id`, `kode_matkul`, `nama_matkul`, `sks`) VALUES
(1, '', 'Peradaban Pendidikan Islam', '3'),
(2, '', 'Manajemen Pendidikan Islam', '3'),
(3, '', 'Pengembangan dan Evaluasi Pendidikan Konseling Isl', '3'),
(4, '', 'Bank dan Lembaga Keuangan Syariah', '3'),
(5, '', 'Kebijakan Pendidikan Nasional', '3'),
(6, '', 'Metodelogi Penelitian Kualitatif 2', '3'),
(7, '', 'Tafsir Hadist Pendidikan Islam', '3'),
(8, '', 'Education Planning/ Perencanaan Pnddkn Islam', '3'),
(9, '', 'Islamic Worldview', '3'),
(10, '', 'Metodologi Penelitian Pendidikan Kuantitatif 2', '3'),
(11, '', 'Model Kepemimpinan Pendidikan Islam', '3'),
(13, '', 'Pendidikan Karakter', '3'),
(14, '', 'Tafsir Hadist Pendidikan Islam 2', '3'),
(15, '', 'Manajemen Mutu Terpadu Pendidikan Islam', '3'),
(16, '', 'Metodologi Penelitian Pendidikan Kualitatif 2', '3'),
(17, '', 'Pengembangan Metodologi Pembelajaran Islam', '3'),
(18, '', 'Evaluasi dan Pengembangan Psikologi Pendidikan', '3'),
(19, '', 'Metodologi Penelitian Kuantitatif', '3'),
(20, '', 'Analisis Kurikulum Pendidikan Islam', '3'),
(21, '', 'Landasan Teknologi Pendidikan', '3'),
(22, '', 'Supervisi Pendidikan Islam', '3'),
(23, '', 'Pengembangan dan Evaluasi Program dan Media BK', '3'),
(24, '', 'Pemikiran Pendidikan Islam Kontemporer', '3'),
(25, '', 'Pengembangan dan Evaluasi Pendekatan Konseling Isl', '3'),
(26, '', 'Perbandingan Pemikiran Pendidikan Islam dan Barat', '3'),
(27, '', 'Metodologi Penelitian Pendidikan Kuantitatif II', '3'),
(28, '', 'Seminar Proposal Disertasi', '3'),
(29, '', 'Pendidikan Bimbingan Konseling', '3'),
(30, '', 'Fiqih Muamalah', '3'),
(31, '', 'Filsafat Pendidikan Islam', '3'),
(32, '', 'Psikologi Pendidikan Islam', '3'),
(34, '', 'Ekonomi Makro', '3'),
(35, '', 'Evaluasi dan Pengembangan Kebijakan Pendidikan', '3'),
(36, '', 'Kaidah-Kaidah Lembaga Keuangan Syariah', '3'),
(37, '', 'Matrikulasi (Statistika Ekonomi Terapan)', '3'),
(38, '', 'Fiqh Zakat', '3'),
(39, '', 'Akuntansi Dan Keuangan Zakat', '3'),
(40, '', 'Dasar-Dasar Ekonomi Syariah', '3'),
(41, '', 'Metodologi Penelitian', '3'),
(42, '', 'Metodologi Penelitian Kualitatif I', '3'),
(43, '', 'Tafsir Hadist Pendidikan Islam II', '3'),
(44, '', 'Filsafat Ilmu', '3'),
(45, '', 'Evaluasi & Pengembangan Kurikulum Pendidikan Islam', '3'),
(46, '', 'Panduan Penulisan Karya Ilmiah (Kuliah Matrikulasi', '3'),
(47, '', 'Kapita Selekta', '3'),
(48, '', 'Teknik Penulisan Jurnal', '3'),
(49, '', 'Matrikulasi', '3'),
(50, '', 'Ekonomi Mikro', '3'),
(51, '', 'Keuangan Publik', '3'),
(52, '', 'Pengembangan Kurikulum dalam Pembelajaran', '3'),
(53, '', 'Evaluasi Kinerja SDM', '3'),
(54, '', 'Manajemen Resiko dan Likuiditas', '3'),
(55, '', 'Seminar Proposal Penelitian', '3'),
(56, '', 'Akutansi Lembaga Keuangn Syariah', '3'),
(57, '', 'Manajemen Zakat', '3'),
(58, '', 'Manajemen Sumber Daya Manusia', '3'),
(59, '', 'Filsafat Ekonomi Syariah', '3'),
(60, '', 'Etika Bisnis Syariah', '3'),
(61, '', '-', '3'),
(62, '', 'Kebijakan Pendidikan', '3'),
(63, '', 'Evaluasi dan Pengembangan Pendidikan Islam', '3'),
(64, '', 'Tafsir Hadist Maudhui Ekonomi Syariah', '3'),
(65, '', 'Pendidikan Sains dan Matematika Anak Usia Dini', '3'),
(66, '', 'Desain Pembelajaran', '3'),
(67, '', 'Martikulasi', '0'),
(68, '', 'Etika Teknologi Pendidikan', '2'),
(69, '', 'Manajemen Resiko Keuangan', '3'),
(70, '', 'Difusi inovasi pendidikan', '3'),
(71, '', 'Seminar Bisnis', '3'),
(73, '', 'Epidemiologi Dasar dan Terapan', '3'),
(74, '', 'MANAJEMEN INVESTASI DAN PORTOFOLIO', '3'),
(75, '', 'Perencanaan SDM', '3'),
(76, '', 'Manajemen Pelayanan & SIMRS', '3'),
(77, '', 'PENGANTAR EKONOMI MANAJEMEN', '3'),
(78, '', 'Institusi Keuangan dan Manajemen Pasar Modal', '3'),
(79, '', 'Regulasi, Kebijakan & Isu-Isu RS', '3'),
(80, '', 'Metodologi Penulisan Karya Ilmiah dan Jurnal (Matr', '0'),
(81, '', 'Perencanaan Pend. Islam dan Pengelolaan Keuangan', '3'),
(82, '', 'Etika Bisnis Dan Entrepreneurship Syariah', '3'),
(83, '', 'Analisis Kebijakan, Hukum, dan Perlindungan Anak', '3'),
(85, '', 'Pengantar Akuntansi dan Keuangan', '3'),
(86, '', 'Orientasi Baru Dalam Pendidikan Islam', '2'),
(87, '', 'Seminar Usulan dan Rencana Tesis', '2'),
(88, '', 'Asesmen kebutuhan dan psikologi perkembangan anak ', '3'),
(89, '', 'Evaluasi Proses dan Hasil Belajar', '3'),
(90, '', 'Manajemen Akuntansi dan Keuangan', '3'),
(91, '', 'Teknologi Komunikasi dan informasi dalam Pendidika', '3'),
(92, '', 'SIDANG KOMISI PEMBIMBING DISERTASI', '16'),
(93, '', 'SIDANG TERTUTUP DISERTASI', '16'),
(94, '', 'SIDANG TERBUKA PROMOSI DOKTOR', '16'),
(95, '', 'RAPAT AKREDITASI S2 PENDIDIKAN AGAMA ISLAM', '16'),
(96, '', 'PELATIHAN DARING ONLINE', '16'),
(97, '', 'Komprehensif', '3'),
(98, '', 'PERTEMUAN: EVALUASI PROGRES PENYELESAIAN DISERTASI', '0'),
(99, '', 'Manajemen Pemasaran', '3'),
(100, '', 'Perilaku Organisasi dan Kepemimpinan', '3'),
(101, '', 'Ekonomi Manajerial dan Strategi Bisnis', '3'),
(102, '', 'Manajemen Operasi dan Produksi', '3'),
(103, '', 'Pengembangan Sumber Belajar dan Media belajar', '3'),
(104, '', 'Statistika', '3'),
(105, '', 'Teknologi kinerja', '3'),
(107, '', 'Pendidikan Bahasa, Studi Sosial, dan Seni Anak Usi', '3'),
(108, '', 'Human capital', '3'),
(109, '31518', 'Evaluasi Manajemen', '3');

-- --------------------------------------------------------

--
-- Table structure for table `ci_prodi`
--

CREATE TABLE `ci_prodi` (
  `id` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `ketua` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_prodi`
--

INSERT INTO `ci_prodi` (`id`, `nama_prodi`, `ketua`, `tahun`) VALUES
(1, 'S3-Pendidikan Agama Islam', '11', 2017),
(2, 'S2-Pendidikan Agama Islam', '5', 2017),
(4, 'S2 - Ekonomi Syariah', '22', 2017),
(6, 'S2-Teknologi Pendidikan', '68', 2017),
(7, 'S2 - Magister Manajemen', '67', 2017),
(8, '-', '18', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `ci_ruangan`
--

CREATE TABLE `ci_ruangan` (
  `id` int(11) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `kode_ruangan` varchar(50) NOT NULL,
  `gedung` varchar(50) NOT NULL,
  `alpa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_ruangan`
--

INSERT INTO `ci_ruangan` (`id`, `nama_ruangan`, `kode_ruangan`, `gedung`, `alpa`) VALUES
(1, 'Gd. Pasca Belakang - Lt.1 R.Sidang', 'Lt.1 R.Sidang', 'KH. Sholeh Iskandar', 0),
(2, 'Gd. Pasca Belakang - Lt.2 R.1', 'Lt.2 R.1', 'KH. Sholeh Iskandar', 0),
(3, 'Gd. Pasca Belakang - Lt.2 R.2', 'Lt.2 R.2', 'KH. Sholeh Iskandar', 0),
(4, 'Gd. Pasca Belakang - Lt.2 R.3', 'Lt.2 R.3', 'KH. Sholeh Iskandar', 0),
(5, 'Gd. Pasca Belakang - Lt.2 R.4', 'Lt.2 R.4', 'KH. Sholeh Iskandar', 0),
(6, 'Gd. Pasca Lama R. 75', 'Gd. Pasca Lama R. 75', 'Prof Dr Ir H Abdullah Shiddik', 0),
(7, '31 FAI Baru', '31 FAI Baru', '2017', 0),
(8, 'Gd. Pasca Lama R. 76', 'Gd. Pasca Lama R. 76', 'Prof Dr Ir H Abdullah Shiddik', 0),
(9, 'Lt.1 R.5 (R. Rapat)', 'Lt.1 R.5 (R. Rapat)', 'KH. Sholeh Iskandar', 0),
(10, 'FAI Gedung Baru', 'FAI Gedung Baru', 'jjjvhd', 1),
(11, 'FAI Gedung Baru (R.31)', 'FAI Gedung Baru (R.31)', 'Gedung FAI Baru', 3),
(12, 'FAI Gedung Baru (R.32)', 'FAI Gedung Baru (R.32)', 'Gedung FAI Baru', 0),
(13, 'FAI Gedung Baru (R.33)', 'FAI Gedung Baru (R.33)', 'Gedung FAI Baru', 0),
(14, 'Gd. Rektorat (Lt.1)', 'Rektorat', 'Gedung Rektorat', 0),
(16, 'Ruang Rapat MM', 'Ruang Rapat MM', 'Pascasarjana Lama', 0),
(17, 'Ruang FH', 'Ruang FH', 'Gedung pasca depan', 1),
(18, '-', '-', '-', 0),
(19, 'LAB MULTIMEDIA', 'LAB TP', 'PASCA DEPAN', 0),
(20, 'Gd. Pasca Belakang - Lt.1 R.Rapat', 'R.Prof ', 'Pascasarjana Belakang', 11);

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `primary_key` varchar(200) NOT NULL,
  `page_read` varchar(20) DEFAULT NULL,
  `page_create` varchar(20) DEFAULT NULL,
  `page_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `title`, `subject`, `table_name`, `primary_key`, `page_read`, `page_create`, `page_update`) VALUES
(1, 'Blog Category', 'Blog Category', 'blog_category', 'category_id', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `crud_custom_option`
--

CREATE TABLE `crud_custom_option` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `option_value` text NOT NULL,
  `option_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `crud_field`
--

CREATE TABLE `crud_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_id` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `input_type` varchar(200) NOT NULL,
  `show_column` varchar(10) DEFAULT NULL,
  `show_add_form` varchar(10) DEFAULT NULL,
  `show_update_form` varchar(10) DEFAULT NULL,
  `show_detail_page` varchar(10) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crud_field`
--

INSERT INTO `crud_field` (`id`, `crud_id`, `field_name`, `field_label`, `input_type`, `show_column`, `show_add_form`, `show_update_form`, `show_detail_page`, `sort`, `relation_table`, `relation_value`, `relation_label`) VALUES
(1, 1, 'category_id', 'category_id', 'number', '', '', '', 'yes', 1, '', '', ''),
(2, 1, 'category_name', 'category_name', 'input', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(3, 1, 'category_desc', 'category_desc', 'editor_wysiwyg', 'yes', 'yes', 'yes', 'yes', 3, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `crud_field_validation`
--

CREATE TABLE `crud_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crud_field_validation`
--

INSERT INTO `crud_field_validation` (`id`, `crud_field_id`, `crud_id`, `validation_name`, `validation_value`) VALUES
(1, 2, 1, 'required', ''),
(2, 2, 1, 'max_length', '200'),
(3, 3, 1, 'required', '');

-- --------------------------------------------------------

--
-- Table structure for table `crud_input_type`
--

CREATE TABLE `crud_input_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `custom_value` int(11) NOT NULL,
  `validation_group` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crud_input_type`
--

INSERT INTO `crud_input_type` (`id`, `type`, `relation`, `custom_value`, `validation_group`) VALUES
(1, 'input', '0', 0, 'input'),
(2, 'textarea', '0', 0, 'text'),
(3, 'select', '1', 0, 'select'),
(4, 'editor_wysiwyg', '0', 0, 'editor'),
(5, 'password', '0', 0, 'password'),
(6, 'email', '0', 0, 'email'),
(7, 'address_map', '0', 0, 'address_map'),
(8, 'file', '0', 0, 'file'),
(9, 'file_multiple', '0', 0, 'file_multiple'),
(10, 'datetime', '0', 0, 'datetime'),
(11, 'date', '0', 0, 'date'),
(12, 'timestamp', '0', 0, 'timestamp'),
(13, 'number', '0', 0, 'number'),
(14, 'yes_no', '0', 0, 'yes_no'),
(15, 'time', '0', 0, 'time'),
(16, 'year', '0', 0, 'year'),
(17, 'select_multiple', '1', 0, 'select_multiple'),
(18, 'checkboxes', '1', 0, 'checkboxes'),
(19, 'options', '1', 0, 'options'),
(20, 'true_false', '0', 0, 'true_false'),
(21, 'current_user_username', '0', 0, 'user_username'),
(22, 'current_user_id', '0', 0, 'current_user_id'),
(23, 'custom_option', '0', 1, 'custom_option'),
(24, 'custom_checkbox', '0', 1, 'custom_checkbox'),
(25, 'custom_select_multiple', '0', 1, 'custom_select_multiple'),
(26, 'custom_select', '0', 1, 'custom_select');

-- --------------------------------------------------------

--
-- Table structure for table `crud_input_validation`
--

CREATE TABLE `crud_input_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `validation` varchar(200) NOT NULL,
  `input_able` varchar(20) NOT NULL,
  `group_input` text NOT NULL,
  `input_placeholder` text NOT NULL,
  `call_back` varchar(10) NOT NULL,
  `input_validation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crud_input_validation`
--

INSERT INTO `crud_input_validation` (`id`, `validation`, `input_able`, `group_input`, `input_placeholder`, `call_back`, `input_validation`) VALUES
(1, 'required', 'no', 'input, file, number, text, datetime, select, password, email, editor, date, yes_no, time, year, select_multiple, options, checkboxes, true_false, address_map, custom_option, custom_checkbox, custom_select_multiple, custom_select, file_multiple', '', '', ''),
(2, 'max_length', 'yes', 'input, number, text, select, password, email, editor, yes_no, time, year, select_multiple, options, checkboxes, address_map', '', '', 'numeric'),
(3, 'min_length', 'yes', 'input, number, text, select, password, email, editor, time, year, select_multiple, address_map', '', '', 'numeric'),
(4, 'valid_email', 'no', 'input, email', '', '', ''),
(5, 'valid_emails', 'no', 'input, email', '', '', ''),
(6, 'regex', 'yes', 'input, number, text, datetime, select, password, email, editor, date, yes_no, time, year, select_multiple, options, checkboxes', '', 'yes', 'callback_valid_regex'),
(7, 'decimal', 'no', 'input, number, text, select', '', '', ''),
(8, 'allowed_extension', 'yes', 'file, file_multiple', 'ex : jpg,png,..', '', 'callback_valid_extension_list'),
(9, 'max_width', 'yes', 'file, file_multiple', '', '', 'numeric'),
(10, 'max_height', 'yes', 'file, file_multiple', '', '', 'numeric'),
(11, 'max_size', 'yes', 'file, file_multiple', '... kb', '', 'numeric'),
(12, 'max_item', 'yes', 'file_multiple', '', '', 'numeric'),
(13, 'valid_url', 'no', 'input, text', '', '', ''),
(14, 'alpha', 'no', 'input, text, select, password, editor, yes_no', '', '', ''),
(15, 'alpha_numeric', 'no', 'input, number, text, select, password, editor', '', '', ''),
(16, 'alpha_numeric_spaces', 'no', 'input, number, text,select, password, editor', '', '', ''),
(17, 'valid_number', 'no', 'input, number, text, password, editor, true_false', '', 'yes', ''),
(18, 'valid_datetime', 'no', 'input, datetime, text', '', 'yes', ''),
(19, 'valid_date', 'no', 'input, datetime, date, text', '', 'yes', ''),
(20, 'valid_max_selected_option', 'yes', 'select_multiple, custom_select_multiple, custom_checkbox, checkboxes', '', 'yes', 'numeric'),
(21, 'valid_min_selected_option', 'yes', 'select_multiple, custom_select_multiple, custom_checkbox, checkboxes', '', 'yes', 'numeric'),
(22, 'valid_alpha_numeric_spaces_underscores', 'no', 'input, text,select, password, editor', '', 'yes', ''),
(23, 'matches', 'yes', 'input, number, text, password, email', 'any field', 'no', 'callback_valid_alpha_numeric_spaces_underscores'),
(24, 'valid_json', 'no', 'input, text, editor', '', 'yes', ' '),
(25, 'valid_url', 'no', 'input, text, editor', '', 'no', ' '),
(26, 'exact_length', 'yes', 'input, text, number', '0 - 99999*', 'no', 'numeric'),
(27, 'alpha_dash', 'no', 'input, text', '', 'no', ''),
(28, 'integer', 'no', 'input, text, number', '', 'no', ''),
(29, 'differs', 'yes', 'input, text, number, email, password, editor, options, select', 'any field', 'no', 'callback_valid_alpha_numeric_spaces_underscores'),
(30, 'is_natural', 'no', 'input, text, number', '', 'no', ''),
(31, 'is_natural_no_zero', 'no', 'input, text, number', '', 'no', ''),
(32, 'less_than', 'yes', 'input, text, number', '', 'no', 'numeric'),
(33, 'less_than_equal_to', 'yes', 'input, text, number', '', 'no', 'numeric'),
(34, 'greater_than', 'yes', 'input, text, number', '', 'no', 'numeric'),
(35, 'greater_than_equal_to', 'yes', 'input, text, number', '', 'no', 'numeric'),
(36, 'in_list', 'yes', 'input, text, number, select, options', '', 'no', 'callback_valid_multiple_value'),
(37, 'valid_ip', 'no', 'input, text', '', 'no', '');

-- --------------------------------------------------------

--
-- Table structure for table `info_settings`
--

CREATE TABLE `info_settings` (
  `id` int(11) NOT NULL,
  `nama_aplikasi` varchar(255) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `alamat_instansi` text NOT NULL,
  `logo_instansi` varchar(255) NOT NULL,
  `icon` varchar(125) NOT NULL,
  `setting_tandatangan` text NOT NULL,
  `versi_aplikasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_settings`
--

INSERT INTO `info_settings` (`id`, `nama_aplikasi`, `nama_instansi`, `alamat_instansi`, `logo_instansi`, `icon`, `setting_tandatangan`, `versi_aplikasi`) VALUES
(1, 'Jadwal PPSUIKA', 'Sekolah Pascasarjana', 'Jl. KH. Sholeh Iskandar Km 2', '20190803151902-aba6e5db58381a67a1bf7b20790c34d4.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `si_group`
--

CREATE TABLE `si_group` (
  `group_id` int(11) NOT NULL,
  `group_code` varchar(4) NOT NULL,
  `group` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `si_group`
--

INSERT INTO `si_group` (`group_id`, `group_code`, `group`) VALUES
(1, 'MPD', 'Magister Pendidikan Islam'),
(2, 'MEI', 'Magister Ekonomi Islam'),
(3, 'MTP', 'Magister Teknologi Pendidikan'),
(4, 'MMN', 'Magister Manajemen'),
(5, 'DPI', 'Doktor Pendidikan Islam'),
(6, 'ADM', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `si_menu`
--

CREATE TABLE `si_menu` (
  `id_menu` int(11) NOT NULL,
  `label` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `link` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `status` enum('Y','N') NOT NULL,
  `sort` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `si_menu`
--

INSERT INTO `si_menu` (`id_menu`, `label`, `slug`, `link`, `icon`, `parent`, `status`, `sort`, `category_id`) VALUES
(1, 'Dashboard', 'dashboard', 'dashboard', 'fa fa-dashboard', 0, 'Y', 1, 1),
(2, 'Buat Jadwal', 'jadwal', 'jadwal', 'fa fa-calendar-plus-o', 0, 'Y', 2, 1),
(3, 'data master', 'data_master', '#', 'fa fa-database', 0, 'Y', 4, 1),
(4, 'Data Dosen', 'dosen', 'dosen', 'fa fa-circle-o ', 3, 'Y', 1, 1),
(6, 'Settings', 'settings', '', 'fa fa-cog', 0, 'Y', 6, 1),
(7, 'Menu Manajemen', 'menu_manajemen', 'menu_manajemen', 'fa fa-circle-o ', 6, 'Y', 1, 1),
(8, 'Data Matakuliah', 'matakuliah', 'matakuliah', 'fa fa-circle-o', 3, 'Y', 0, 1),
(35, 'General', 'general', 'general', 'fa fa-circle-o', 6, 'Y', 0, 1),
(36, 'Users', 'users', 'users', 'fa fa-users', 0, 'Y', 7, 1),
(65, 'Data Ruangan', 'ruangan', 'ruangan', 'fa fa-circle-o', 3, 'Y', 0, 1),
(71, 'General', 'general', 'general', 'fa fa-circle-o', 6, 'Y', 0, 1),
(72, 'Buat Agenda', 'agenda', 'agenda', 'fa fa-bookmark-o', 0, 'Y', 3, 1),
(73, 'Template', 'template', 'template', 'fa fa-television', 6, 'Y', 0, 1),
(74, 'FrontEnd', '/', '../', 'fa fa-globe', 0, 'Y', 99, 1),
(75, 'Rekapan', 'rekap', 'rekap', 'fa fa-archive', 0, 'Y', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `si_menu_category`
--

CREATE TABLE `si_menu_category` (
  `menu_category_id` int(11) NOT NULL,
  `category` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `si_menu_category`
--

INSERT INTO `si_menu_category` (`menu_category_id`, `category`) VALUES
(1, 'admin_menu'),
(2, 'landing_menu');

-- --------------------------------------------------------

--
-- Table structure for table `si_menu_to_role`
--

CREATE TABLE `si_menu_to_role` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `si_menu_to_role`
--

INSERT INTO `si_menu_to_role` (`id`, `menu_id`, `role_id`) VALUES
(1, 1, 1),
(3, 2, 1),
(4, 3, 1),
(5, 4, 1),
(7, 6, 1),
(8, 7, 1),
(9, 1, 2),
(10, 2, 2),
(11, 3, 2),
(12, 4, 2),
(14, 8, 1),
(15, 36, 1),
(25, 65, 1),
(26, 65, 2),
(31, 71, 1),
(33, 8, 2),
(34, 72, 1),
(35, 72, 2),
(36, 36, 2),
(37, 73, 1),
(38, 73, 2),
(39, 74, 1),
(40, 74, 2),
(41, 75, 1),
(42, 75, 2);

-- --------------------------------------------------------

--
-- Table structure for table `si_options`
--

CREATE TABLE `si_options` (
  `option_id` bigint(20) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_value` longtext NOT NULL,
  `autoload` varchar(128) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `si_options`
--

INSERT INTO `si_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'template_setting', 'a:3:{s:18:\"template_directory\";s:7:\"default\";s:13:\"template_name\";s:22:\"Default Jadwal PPSUIKA\";s:18:\"template_attribute\";s:723:\"a:10:{s:9:\"posted_by\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:9:\"Posted by\";}s:2:\"on\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:2:\"on\";}s:8:\"category\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:8:\"Category\";}s:15:\"daftar_komentar\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:15:\"Daftar Komentar\";}s:8:\"komentar\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:8:\"Komentar\";}s:13:\"form_komentar\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:13:\"Form Komentar\";}s:4:\"nama\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:4:\"Nama\";}s:5:\"email\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:5:\"Email\";}s:7:\"website\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:7:\"Website\";}s:14:\"kirim_komentar\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:14:\"Kirim Komentar\";}}\";}', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `si_role`
--

CREATE TABLE `si_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `description` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `si_role`
--

INSERT INTO `si_role` (`role_id`, `role`, `description`) VALUES
(1, 'administrator', 'Administrator'),
(2, 'member', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `si_role_to_group`
--

CREATE TABLE `si_role_to_group` (
  `id` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `si_role_to_group`
--

INSERT INTO `si_role_to_group` (`id`, `id_group`, `id_role`) VALUES
(1, 5, 2),
(2, 2, 2),
(3, 4, 2),
(4, 1, 2),
(5, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `si_template`
--

CREATE TABLE `si_template` (
  `template_id` int(11) NOT NULL,
  `template_name` varchar(128) NOT NULL,
  `template_directory` varchar(255) NOT NULL,
  `template_author` varchar(128) NOT NULL,
  `template_version` varchar(128) NOT NULL,
  `template_description` text NOT NULL,
  `template_attribute` text NOT NULL,
  `upload_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `upload_by` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `si_template`
--

INSERT INTO `si_template` (`template_id`, `template_name`, `template_directory`, `template_author`, `template_version`, `template_description`, `template_attribute`, `upload_at`, `upload_by`) VALUES
(1, 'Default Jadwal PPSUIKA', 'default', 'Asrul Maa', '1.0', '<p>Template blog sederhana ini dipersembahkan untuk testing sahaja, namun selain cocok untuk testing. template ini pun bisa digunakan untuk pembuatan blog, karena didalamnya sudah mendukung pengkategorian artikel, dan fasilitas komentar. Anda bisa langsung mencobannya</p>', 'a:10:{s:9:\"posted_by\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:9:\"Posted by\";}s:2:\"on\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:2:\"on\";}s:8:\"category\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:8:\"Category\";}s:15:\"daftar_komentar\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:15:\"Daftar Komentar\";}s:8:\"komentar\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:8:\"Komentar\";}s:13:\"form_komentar\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:13:\"Form Komentar\";}s:4:\"nama\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:4:\"Nama\";}s:5:\"email\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:5:\"Email\";}s:7:\"website\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:7:\"Website\";}s:14:\"kirim_komentar\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:14:\"Kirim Komentar\";}}', '2019-08-02 07:38:28', ''),
(2, 'PPSUIKA', 'ppsuika_v.1.0', 'Asrul Maa', '1.0', '<p>Template blog sederhana ini dipersembahkan untuk testing sahaja, namun selain cocok untuk testing. template ini pun bisa digunakan untuk pembuatan blog, karena didalamnya sudah mendukung pengkategorian artikel, dan fasilitas komentar. Anda bisa langsung mencobannya</p>', 'a:10:{s:9:\"posted_by\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:9:\"Posted by\";}s:2:\"on\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:2:\"on\";}s:8:\"category\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:8:\"Category\";}s:15:\"daftar_komentar\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:15:\"Daftar Komentar\";}s:8:\"komentar\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:8:\"Komentar\";}s:13:\"form_komentar\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:13:\"Form Komentar\";}s:4:\"nama\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:4:\"Nama\";}s:5:\"email\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:5:\"Email\";}s:7:\"website\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:7:\"Website\";}s:14:\"kirim_komentar\";a:2:{s:4:\"type\";s:4:\"text\";s:5:\"value\";s:14:\"Kirim Komentar\";}}', '2019-08-02 09:44:54', '');

-- --------------------------------------------------------

--
-- Table structure for table `si_users`
--

CREATE TABLE `si_users` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `avatar` varchar(128) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `login_status` varchar(128) NOT NULL,
  `ip_address` varchar(128) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `si_users`
--

INSERT INTO `si_users` (`ID`, `username`, `password`, `email`, `fullname`, `role_id`, `group_id`, `avatar`, `status`, `created_at`, `update_at`, `last_login`, `login_status`, `ip_address`, `token`) VALUES
(54, 'asrul', '$2y$10$4zt4RK75h6FDcYhx1kIriuhHeYA86AXw/TD6DLw75jvjfPt0Uxnfq', 'asrulanwar99@gmail.com', 'Muhammad asrul anwar', 1, 6, 'Koala.jpg', 'Y', '2017-07-25 09:51:01', '2017-08-07 17:38:06', '2019-07-19 09:48:30', '1', '103.76.14.204', 'qwuCjSIh6MiPJ1Up'),
(69, 'raziv', '$2y$10$zhkol7CBMRNI8PStXvFV8OmeEOPyK7RDWcKmCIf3Ie.rLO2TNksP6', 'raziv@ppsuika.ac.id', 'raziv akbar', 2, 4, '20190816062655-', 'Y', '2017-07-27 13:25:49', '2017-10-03 12:07:00', '2019-08-12 08:52:47', '1', '103.76.14.204', 'Upga68nL0GqVtBDX'),
(78, 'omanx', '$2y$10$vrUIaAcIXMLTAbM5sG/kEuHPsDvzU4RSIUg2v97jAMAtmdnhSEi7y', 'rohman@ppsuika.ac.id', 'Abdul Rohman', 2, 3, '20200227045453-', 'Y', '2017-07-27 18:20:50', '2019-06-19 11:33:31', '2017-08-31 11:06:28', '1', '150.107.142.35', '7m2Yu5VvfOp1zNQb'),
(79, 'Izhar', '$2y$10$wqBJYoFv/dj4/TE3/6OFme.HQVvFX4tiBKOeoYPPTKDvgMHvHLse.', 'izhar@ppsuika.ac.id', 'Izhar', 2, 1, '20190816062445-', 'Y', '2017-07-28 09:18:48', '2018-12-17 19:30:21', '2018-03-23 02:37:54', '1', '150.107.142.35', 'tMBODJro1Qhk4HXE'),
(81, 'bamz', '$2y$10$kue3/nbU4.AGcCy7wwboKOSxsSGaDx7jJQ2ksTgg.Dix2fUqxCmKK', 'bambang.karyadi@gmail.com', 'bambang Karyadi', 1, 6, '20180913173016-', 'Y', '2018-09-13 03:30:16', '2018-09-12 15:32:46', '2018-09-13 07:05:24', '1', '103.206.246.234', 'H6Zx3OhGljuFtPvm'),
(82, 'Ridwan', '$2y$10$QOB2J4NyBwO3jA2Z.T0pyOYU.M5Vqt/KmOJ8mlmwbZoJK/bAXY5gq', 'ridwan@ppsuika.ac.id', 'Ridwan Susanto', 2, 2, '20191113011449-', 'Y', '2018-10-08 20:15:20', '2018-11-13 13:42:58', '0000-00-00 00:00:00', '1', '150.107.142.34', 'iYUqpWOsjhF0leS4'),
(85, 'Muhsin', '$2y$10$k1iMdXeeyXKs9XRRw4mfWuHXoYOThkHEG3RQ9zaAVaCxjnLisMF5u', 'muhsin@ppsuika.ac.id', 'Ahmad Muhsin', 2, 5, '20190816062418-', 'Y', '2018-11-08 21:17:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '103.206.246.235', 'Ha5uQLnKrgR4YNGd'),
(86, 'NERI', '$2y$10$IQRl/gIpDPJleOK3m5GiE.KwOqqwW6FhEz2mYiYMX7BUmhbjPB1W6', 'neryagustin804@gmail.com', 'Neri', 2, 6, '20190816062501-', 'Y', '2018-11-30 00:46:47', '0000-00-00 00:00:00', '2018-12-15 08:16:52', '1', '168.235.206.216', 'MaS5s7QxDrKcz4up'),
(87, 'Arbi', '$2y$10$8/8AofpUfLyF/DCNrxtzJ.Nwqw5rWAT.4VnojMG5lQ.y61vHEdieO', 'arbi@ppsuika.ac.id', 'arbi', 2, 5, '20190816062408-', 'Y', '2018-12-14 00:18:28', '0000-00-00 00:00:00', '2018-12-17 08:59:37', '1', '150.107.142.35', 'G291yRxQITXnzEFc'),
(88, 'yuli', '$2y$10$SaGJH0GTqen6YEfWk4.q8uZ0ZASNLfR6E7v9aCQQfUpc9sZ.oDhJG', 'siyula01@gmail.com', 'Yulia Latifah', 2, 1, '20190816062402-', 'Y', '2019-06-18 21:52:47', '0000-00-00 00:00:00', '2019-07-26 02:05:56', '1', '150.107.142.35', 'uIizRyqvhB8VjD2p'),
(89, 'whisnu', '$2y$10$YSi3eBlNUxs6vEioe0kkb.pyBG4BEEFMuf.g8ICqmsF6QzFL2fTQS', 'whisnu@ppsuika.ac.id', 'whisnu', 1, 6, '20190816062929-aba6e5db58381a67a1bf7b20790c34d4.jpg', 'Y', '2019-06-24 23:51:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '150.107.142.35', 'AwYHWpqFo2aZG7dM');

-- --------------------------------------------------------

--
-- Table structure for table `users_post_admin`
--

CREATE TABLE `users_post_admin` (
  `id` int(11) NOT NULL,
  `ID_users` int(11) NOT NULL,
  `content` text NOT NULL,
  `comment` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_post_admin`
--

INSERT INTO `users_post_admin` (`id`, `ID_users`, `content`, `comment`, `date`) VALUES
(22, 32, '<h1 class=\"fr-text-uppercase\" style=\"text-align: center;\">Pendahuluan</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1, '2019-05-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_agenda`
--
ALTER TABLE `ci_agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `ci_dosen`
--
ALTER TABLE `ci_dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nidn` (`nidn`);

--
-- Indexes for table `ci_jadwal`
--
ALTER TABLE `ci_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_kehadiran_dosen`
--
ALTER TABLE `ci_kehadiran_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_matkul`
--
ALTER TABLE `ci_matkul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_prodi`
--
ALTER TABLE `ci_prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_ruangan`
--
ALTER TABLE `ci_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_custom_option`
--
ALTER TABLE `crud_custom_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_field`
--
ALTER TABLE `crud_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_field_validation`
--
ALTER TABLE `crud_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_input_type`
--
ALTER TABLE `crud_input_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_input_validation`
--
ALTER TABLE `crud_input_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_settings`
--
ALTER TABLE `info_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `si_group`
--
ALTER TABLE `si_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `si_menu`
--
ALTER TABLE `si_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `si_menu_category`
--
ALTER TABLE `si_menu_category`
  ADD PRIMARY KEY (`menu_category_id`);

--
-- Indexes for table `si_menu_to_role`
--
ALTER TABLE `si_menu_to_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `si_options`
--
ALTER TABLE `si_options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `si_role`
--
ALTER TABLE `si_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `si_role_to_group`
--
ALTER TABLE `si_role_to_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `si_template`
--
ALTER TABLE `si_template`
  ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `si_users`
--
ALTER TABLE `si_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users_post_admin`
--
ALTER TABLE `users_post_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_agenda`
--
ALTER TABLE `ci_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ci_dosen`
--
ALTER TABLE `ci_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `ci_jadwal`
--
ALTER TABLE `ci_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `ci_kehadiran_dosen`
--
ALTER TABLE `ci_kehadiran_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ci_matkul`
--
ALTER TABLE `ci_matkul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `ci_prodi`
--
ALTER TABLE `ci_prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ci_ruangan`
--
ALTER TABLE `ci_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crud_custom_option`
--
ALTER TABLE `crud_custom_option`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crud_field`
--
ALTER TABLE `crud_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crud_field_validation`
--
ALTER TABLE `crud_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crud_input_type`
--
ALTER TABLE `crud_input_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `crud_input_validation`
--
ALTER TABLE `crud_input_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `info_settings`
--
ALTER TABLE `info_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `si_group`
--
ALTER TABLE `si_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `si_menu`
--
ALTER TABLE `si_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `si_menu_category`
--
ALTER TABLE `si_menu_category`
  MODIFY `menu_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `si_menu_to_role`
--
ALTER TABLE `si_menu_to_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `si_options`
--
ALTER TABLE `si_options`
  MODIFY `option_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `si_role`
--
ALTER TABLE `si_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `si_role_to_group`
--
ALTER TABLE `si_role_to_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `si_template`
--
ALTER TABLE `si_template`
  MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `si_users`
--
ALTER TABLE `si_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `users_post_admin`
--
ALTER TABLE `users_post_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
