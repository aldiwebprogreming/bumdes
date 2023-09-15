-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 11:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_bumdes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota_bumdes`
--

CREATE TABLE `tbl_anggota_bumdes` (
  `id` int(11) NOT NULL,
  `kode_anggota` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota_simpanpinjam`
--

CREATE TABLE `tbl_anggota_simpanpinjam` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `no_hp` varchar(200) NOT NULL,
  `status_anggota` varchar(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_anggota_simpanpinjam`
--

INSERT INTO `tbl_anggota_simpanpinjam` (`id`, `kode`, `nama`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_ktp`, `no_hp`, `status_anggota`, `date`) VALUES
(2, 'kode-128', 'Aldi', 'Laki - Laki', 'Medan', '2023-09-15', 'Medan', '234567890984', '5690344242344', '', '2023-09-13 14:29:08'),
(3, 'kode-52', 'Davin', 'Laki - Laki', 'Medan', '2023-09-14', 'Medan', '1205092102860001', '083138184143', '', '2023-09-14 06:53:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id`, `kode`, `jabatan`, `date`) VALUES
(2, 'jbt-914', 'Kades', '2023-09-11 07:51:48'),
(3, 'jbt-1000', 'Sekretaris', '2023-09-13 13:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `level` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`id`, `kode`, `level`, `date`) VALUES
(1, 'user-96', 'Admin', '2023-09-11 08:52:44'),
(5, 'user-695', 'Supere Admin', '2023-09-11 08:53:47'),
(6, 'user-136', 'Pengguna', '2023-09-11 08:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `id_anggota` varchar(11) NOT NULL,
  `jml_pembayaran` varchar(20) NOT NULL,
  `sisa_pembayaran` varchar(20) NOT NULL,
  `tgl` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id`, `kode`, `id_anggota`, `jml_pembayaran`, `sisa_pembayaran`, `tgl`, `date`) VALUES
(5, 'kode-6930', '2', '30000', '480000', '2023-09-15', '2023-09-15 07:15:37'),
(6, 'kode-2378', '2', '80000', '400000', '2023-09-15', '2023-09-15 07:16:03'),
(7, 'kode-3959', '2', '300000', '100000', '2023-09-15', '2023-09-15 07:31:02'),
(8, 'kode-9083', '2', '100000', '0', '2023-09-15', '2023-09-15 07:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendapatan`
--

CREATE TABLE `tbl_pendapatan` (
  `id` int(11) NOT NULL,
  `nama_pendapatan` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `jml` varchar(20) NOT NULL,
  `tgl` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pendapatan`
--

INSERT INTO `tbl_pendapatan` (`id`, `nama_pendapatan`, `keterangan`, `jml`, `tgl`, `date`) VALUES
(1, 'penarikan simpanan', 'penarikan simpanan', '5100', '2023-09-14', '2023-09-14 08:08:07'),
(2, 'penarikan simpanan', 'penarikan simpanan', '5100', '2023-09-14', '2023-09-14 08:13:42'),
(3, 'penarikan simpanan', 'penarikan simpanan', '27000', '2023-09-14', '2023-09-14 08:35:33'),
(4, 'pendapatan bunga simpan pinjam', 'pendapatan bunga simpan pinjam', '0', '', '2023-09-15 07:59:26'),
(5, 'pendapatan bunga simpan pinjam', 'pendapatan bunga simpan pinjam', '0', '2023-09-15', '2023-09-15 08:01:07'),
(6, 'pendapatan bunga simpan pinjam', 'pendapatan bunga simpan pinjam', '10000', '2023-09-15', '2023-09-15 08:02:55'),
(7, 'pendapatan bunga simpan pinjam', 'pendapatan bunga simpan pinjam', '10000', '2023-09-15', '2023-09-15 08:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_pinjaman`
--

CREATE TABLE `tbl_pengajuan_pinjaman` (
  `id` int(11) NOT NULL,
  `id_anggota` varchar(11) NOT NULL,
  `jml_pinjaman` varchar(15) NOT NULL,
  `waktu_pinjaman` varchar(11) NOT NULL,
  `tgl_mulai` varchar(15) NOT NULL,
  `tgl_berakhir` varchar(15) NOT NULL,
  `bunga` varchar(11) NOT NULL,
  `total_pembayaran` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `status_hasil` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajuan_pinjaman`
--

INSERT INTO `tbl_pengajuan_pinjaman` (`id`, `id_anggota`, `jml_pinjaman`, `waktu_pinjaman`, `tgl_mulai`, `tgl_berakhir`, `bunga`, `total_pembayaran`, `status`, `status_hasil`, `date`) VALUES
(14, '2', '500000', '1', '2023-09-15', '2023-10-15', '2', '0', 1, 1, '2023-09-15 08:03:51'),
(15, '3', '500000', '2', '2023-09-15', '2023-11-15', '3', '515000', 1, 0, '2023-09-15 02:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_simpanan`
--

CREATE TABLE `tbl_pengajuan_simpanan` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajuan_simpanan`
--

INSERT INTO `tbl_pengajuan_simpanan` (`id`, `kode`, `id_anggota`, `status`, `date`) VALUES
(2, 'kode-8031', 2, 1, '2023-09-14 08:53:56'),
(8, 'kode-5005', 3, 1, '2023-09-14 09:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` varchar(15) NOT NULL,
  `stok` varchar(15) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id`, `kode`, `nama_produk`, `keterangan`, `harga`, `stok`, `gambar`, `date`) VALUES
(2, 'kode-2763', 'Lainya 3', 'ewew', '2242', '22', '567e6263a6fbb712a07333b47c9e320a.png', '2023-09-15 09:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_simpanan`
--

CREATE TABLE `tbl_simpanan` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgl` varchar(30) NOT NULL,
  `simpanan` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_simpanan`
--

INSERT INTO `tbl_simpanan` (`id`, `kode`, `id_anggota`, `nama`, `tgl`, `simpanan`, `status`, `date`) VALUES
(2, 'kode-6405', 2, 'Aldi', '2023-09-14', '20000', 0, '2023-09-14 06:48:59'),
(4, 'kode-5449', 2, 'Aldi', '2023-09-14', '50000', 0, '2023-09-14 07:27:20'),
(5, 'kode-8773', 2, 'Aldi', '2023-09-14', '100000', 0, '2023-09-14 07:37:11'),
(6, 'kode-8752', 3, 'Davin', '2023-09-14', '500000', 0, '2023-09-14 08:18:34'),
(7, 'kode-2558', 3, 'Davin', '2023-09-14', '300000', 0, '2023-09-14 08:33:16'),
(8, 'kode-7250', 3, 'Davin', '2023-09-15', '100000', 0, '2023-09-14 08:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`id`, `kode`, `unit`, `date`) VALUES
(2, 'unit-30', 'Unit Simpan Pinjam', '2023-09-11 08:12:44'),
(3, 'unit-121', 'Unit Dagang  Gorengan', '2023-09-11 08:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota_bumdes`
--
ALTER TABLE `tbl_anggota_bumdes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_anggota_simpanpinjam`
--
ALTER TABLE `tbl_anggota_simpanpinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pendapatan`
--
ALTER TABLE `tbl_pendapatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengajuan_pinjaman`
--
ALTER TABLE `tbl_pengajuan_pinjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengajuan_simpanan`
--
ALTER TABLE `tbl_pengajuan_simpanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_simpanan`
--
ALTER TABLE `tbl_simpanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_anggota_bumdes`
--
ALTER TABLE `tbl_anggota_bumdes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_anggota_simpanpinjam`
--
ALTER TABLE `tbl_anggota_simpanpinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_pendapatan`
--
ALTER TABLE `tbl_pendapatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_pinjaman`
--
ALTER TABLE `tbl_pengajuan_pinjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_simpanan`
--
ALTER TABLE `tbl_pengajuan_simpanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_simpanan`
--
ALTER TABLE `tbl_simpanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
