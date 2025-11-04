-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 05:56 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_flowingquran`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `no_ponsel` varchar(13) NOT NULL,
  `timecreated_admin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `no_ponsel`, `timecreated_admin`) VALUES
(1, 'admin', '32c012243b0c0819734672baaf788dc8', 'Administrator', '089663112386', '2021-06-13 17:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(11) NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `surat_akte_lahir` tinytext,
  `surat_kk` tinytext,
  `foto_siswa` tinytext,
  `foto_rapor_terakhir` tinytext,
  `nisn_siswa` varchar(10) DEFAULT NULL,
  `timecreated_berkas` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `id_pendaftar`, `id_siswa`, `surat_akte_lahir`, `surat_kk`, `foto_siswa`, `foto_rapor_terakhir`, `nisn_siswa`, `timecreated_berkas`) VALUES
(1, 1, 1, 'IMG-20161222-WA0011.jpg', '30856273_571677729883533_7825921216404783104_n.jpg', 'IMG_1706.jpg', 'IMG-20161222-WA0010.jpg', '-', '2021-07-11 09:20:28'),
(2, 2, 2, 'IMG-20170918-WA0001.jpg', 'sakit.jpg', 'Untitled-96.jpg', 'pernikahan.jpg', '-', '2021-07-11 09:45:45'),
(3, 3, 3, 'IMG-20161222-WA0014.jpg', 'IMG-20161223-WA0024.jpg', 'IMG-20161222-WA0029.jpg', 'IMG_20181213_142728.jpg', '-', '2021-07-11 09:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `kegiatan` tinytext NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `timecreated_informasi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `kegiatan`, `tanggal_mulai`, `tanggal_akhir`, `timecreated_informasi`) VALUES
(1, 'Pengumuman Kelulusan PPDB MI Flowing Quran Tahun 2021/2022', '2021-07-07', '2021-07-08', '2021-07-06 22:41:46'),
(3, 'Pembukaan Sekolah MI Flowing Quran Tahun Ajaran 2021/2022', '2021-07-20', '2021-07-21', '2021-07-06 22:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `slider_1` tinytext NOT NULL,
  `slider_2` tinytext NOT NULL,
  `slider_3` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `slider_1`, `slider_2`, `slider_3`) VALUES
(1, 'slider1.jpg', 'slider2.jpg', 'slider3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `skor_iq` float NOT NULL,
  `status_nilai_siswa` varchar(20) NOT NULL,
  `timecreated_nilai` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `skor_iq`, `status_nilai_siswa`, `timecreated_nilai`) VALUES
(1, 1, 70, 'lulus', '2021-07-11 11:35:44'),
(2, 2, 50, 'tidak_lulus', '2021-07-13 15:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id_orangtua` int(11) NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `pendidikan_ayah` varchar(10) NOT NULL,
  `pendidikan_ibu` varchar(10) NOT NULL,
  `pekerjaan_ayah` varchar(20) NOT NULL,
  `pekerjaan_ibu` varchar(20) NOT NULL,
  `tempat_kerja_ayah` tinytext NOT NULL,
  `tempat_kerja_ibu` tinytext NOT NULL,
  `no_ponsel_ayah` varchar(13) NOT NULL,
  `no_ponsel_ibu` varchar(13) NOT NULL,
  `penghasilan_ayah_bulan` tinytext NOT NULL,
  `penghasilan_ibu_bulan` tinytext NOT NULL,
  `timecreated_orangtua` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orang_tua`
--

INSERT INTO `orang_tua` (`id_orangtua`, `id_pendaftar`, `id_siswa`, `nama_ayah`, `nama_ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `tempat_kerja_ayah`, `tempat_kerja_ibu`, `no_ponsel_ayah`, `no_ponsel_ibu`, `penghasilan_ayah_bulan`, `penghasilan_ibu_bulan`, `timecreated_orangtua`) VALUES
(1, 1, 1, 'Jos Verstappen', 'Mirna', 'SMK', 'SMK', 'Pembalap formula 1', 'Teller bank', 'Formula 1', 'Bank BCA', '081233334444', '081237479595', '10000000', '10000000', '2021-07-11 09:20:20'),
(2, 2, 2, 'Jack Latifi', 'Sofina', 'S3', 'S1', 'CEO', 'Ibu rumah tangga', 'Sofina Drink', 'Rumah', '081290904343', '083847476464', '100000000', '10000000', '2021-07-11 09:45:39'),
(3, 3, 3, 'Michael Schumacher', 'Choline Schumacher', 'SMK', 'S1', 'Dokter', 'Ibu rumah tangga', 'kemenkes', 'rumah', '08124646463', '084958834343', '10000000', '1500000', '2021-07-11 09:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `no_rekening` varchar(15) NOT NULL,
  `atas_nama` varchar(30) NOT NULL,
  `nama_bank` varchar(10) NOT NULL,
  `jumlah_bayar` tinytext NOT NULL,
  `bukti` tinytext NOT NULL,
  `keterangan` tinytext NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `timecreated_pembayaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pendaftar`, `id_siswa`, `no_rekening`, `atas_nama`, `nama_bank`, `jumlah_bayar`, `bukti`, `keterangan`, `status_bayar`, `timecreated_pembayaran`) VALUES
(1, 1, 1, '12345678', 'IKHWAN ROLANDO', 'BCA', '400000', 'bukti.jpg', 'Pembayaran formulir pendaftaran', 'pending', '2021-07-11 09:39:20'),
(2, 2, 2, '123213213', 'JACK LATIFI', 'MANDIRI', '400000', 'IMG-20171005-WA0007.jpg', 'Pembayaran formulir pendaftaran', 'diterima', '2021-07-11 09:49:19'),
(3, 3, 3, '31232324', 'MICHAEL SCHUMACHER', 'BNI', '400000', 'IMG-20170123-WA0003.jpg', 'Pembayaran formulir pendaftaran', 'diterima', '2021-07-11 09:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id_pendaftar` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `no_ponsel` varchar(13) NOT NULL,
  `alamat` tinytext NOT NULL,
  `status_pendaftar` varchar(20) NOT NULL,
  `timecreated_pendaftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id_pendaftar`, `username`, `password`, `nama_lengkap`, `no_ponsel`, `alamat`, `status_pendaftar`, `timecreated_pendaftar`) VALUES
(1, 'hamilton44', '32c012243b0c0819734672baaf788dc8', 'Lewis Hamilton', '089663112376', 'Jalan Britania Raya, Inggris RT005/RW002', 'aktif', '2021-07-11 09:18:12'),
(2, 'bottas77', 'f02daf4ee944a5e13f0117960174d396', 'Valtteri Bottas', '081236477777', 'Jalan finlandia baru', 'aktif', '2021-07-11 09:43:42'),
(3, 'schumacher47', 'f61c50abb1fa28aabdbd43b95ccfed52', 'Michael Schumacher', '081274650090', 'Jalan nurburgring ', 'aktif', '2021-07-11 09:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_lengkap` tinytext NOT NULL,
  `anak_ke` varchar(10) NOT NULL,
  `dari_bersaudara` varchar(10) NOT NULL,
  `nik_siswa` varchar(16) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `tk_asal` tinytext NOT NULL,
  `status` varchar(20) NOT NULL,
  `timecreated_siswa` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_pendaftar`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat_lengkap`, `anak_ke`, `dari_bersaudara`, `nik_siswa`, `no_telepon`, `tk_asal`, `status`, `timecreated_siswa`) VALUES
(1, 1, 'George Russell', 'L', 'Inggris', '2021-07-11', 'Jalan Britania Raya, Anfield 13540', '1', '1', '31752401980003', '-', '-', 'lulus', '2021-07-11 09:18:56'),
(2, 2, 'Nicholas Latifi', 'L', 'Canada', '2021-07-12', 'Jalan canada no 57', '1', '1', '31751205980002', '089600998877', '-', 'tidak_lulus', '2021-07-11 09:44:32'),
(3, 3, 'Mick Schumacher', 'L', 'Germany', '2021-07-29', 'Jalan Nurburgring', '5', '6', '31752703980005', '-', '-', 'pending', '2021-07-11 09:51:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id_orangtua`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id_pendaftar`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `id_orangtua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
