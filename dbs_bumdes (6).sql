-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 11:40 AM
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
(3, 'kode-52', 'Davin', 'Laki - Laki', 'Medan', '2023-09-14', 'Medan', '1205092102860001', '083138184143', '', '2023-09-14 06:53:52'),
(4, 'kode-8917', 'Aldisaja', 'Laki - Laki', 'Medan', '2023-09-18', '3434343434343', '1205092102860001', '083138184143', '', '2023-09-18 02:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(2) NOT NULL,
  `level` varchar(30) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id`, `kode`, `jabatan`, `level`, `date`) VALUES
(4, 'jbt-321', 'Kades', 'Supere Admin', '2023-09-19 07:44:04');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `title`, `url`, `icon`, `status`, `date`) VALUES
(16, 'Dashbord', 'index', 'nav-icon fas fa-tachometer-alt', 0, '2023-09-19 08:14:39'),
(17, 'Pendapatan', 'pendapatan', 'far fa-circle nav-icon', 0, '2023-09-19 08:16:05'),
(18, 'Pengeluaran', 'pengeluaran', 'far fa-circle nav-icon', 0, '2023-09-19 08:16:29'),
(19, 'Anggota Simpan Pinjam', 'anggota_simpanpinjam', 'far fa-circle nav-icon', 0, '2023-09-19 08:17:14'),
(20, 'Pengajuan Simpanan', 'pengajuan_simpanan2', 'far fa-circle nav-icon', 0, '2023-09-19 08:17:43'),
(21, 'Anggota Simpanan Aktif', 'pengajuan_simpanan', 'far fa-circle nav-icon', 0, '2023-09-19 08:18:31'),
(22, 'Data Simpanan', 'simpanan', 'far fa-circle nav-icon', 0, '2023-09-19 08:18:52'),
(23, 'Pengajuan Pinjaman', 'pengajuan_pinjaman', 'far fa-circle nav-icon', 0, '2023-09-19 08:19:34'),
(24, 'Pembayaran', 'pembayaran', 'far fa-circle nav-icon', 0, '2023-09-19 08:20:09'),
(25, 'Produk', 'produk', 'far fa-circle nav-icon', 0, '2023-09-19 08:21:13'),
(26, 'Orderan', 'pembayaran_produk', 'far fa-circle nav-icon', 0, '2023-09-19 08:21:50'),
(27, 'Unit', 'unit', 'far fa-circle nav-icon', 0, '2023-09-19 08:22:12'),
(28, 'Jabatan', 'jabatan', 'far fa-circle nav-icon', 0, '2023-09-19 08:22:29'),
(29, 'Pengguna', 'user', 'far fa-circle nav-icon', 0, '2023-09-19 08:22:50'),
(30, 'Menu', 'menu', 'far fa-circle nav-icon', 0, '2023-09-19 08:23:03'),
(31, 'Level', 'level', 'far fa-circle nav-icon', 0, '2023-09-19 08:23:15'),
(32, 'Hak Akss', 'hak_akses', 'far fa-circle nav-icon', 0, '2023-09-19 08:23:34');

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
(16, 'kode-8820', '2', '415000', '100000', '2023-09-18', '2023-09-18 08:24:20'),
(17, 'kode-8379', '2', '100000', '0', '2023-09-18', '2023-09-18 08:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran_produk`
--

CREATE TABLE `tbl_pembayaran_produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `produk` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `total_harga` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `noktp` varchar(16) NOT NULL,
  `norek` varchar(20) NOT NULL,
  `total_pembayaran` varchar(30) NOT NULL,
  `bukti` varchar(200) NOT NULL,
  `alamat_pengantaran` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembayaran_produk`
--

INSERT INTO `tbl_pembayaran_produk` (`id`, `kode`, `produk`, `qty`, `harga`, `total_harga`, `nama`, `noktp`, `norek`, `total_pembayaran`, `bukti`, `alamat_pengantaran`, `status`, `date`) VALUES
(2, 'kode-113', 'Keripik Pisang', 1, '10000', '10000', 'aldi', '3434343434343', '', '34000', '', '', 'setuju', '2023-09-19 04:17:31'),
(3, 'kode-113', 'Basreng Bakso', 2, '12000', '24000', 'aldi', '3434343434343', '', '34000', '', '', 'setuju', '2023-09-19 04:17:31'),
(4, 'kode-875', 'Keripik Pisang', 1, '10000', '10000', 'aldi', '3434343434343', '', '34000', '', '', 'menunggu', '2023-09-19 03:23:28'),
(5, 'kode-875', 'Basreng Bakso', 2, '12000', '24000', 'aldi', '3434343434343', '', '34000', '', '', 'menunggu', '2023-09-19 03:23:28'),
(6, 'kode-30', 'Keripik Pisang', 1, '10000', '10000', 'aldi', '3434343434343', '', '34000', '', '', 'menunggu', '2023-09-19 03:23:59'),
(7, 'kode-30', 'Basreng Bakso', 2, '12000', '24000', 'aldi', '3434343434343', '', '34000', '', '', 'menunggu', '2023-09-19 03:23:59'),
(8, 'kode-718', 'Keripik Pisang', 1, '10000', '10000', 'aldi', '3434343434343', '343434343434', '10000', '2e6e6b54e24b726d3adb66e6a23832e9.png', '34343434343', 'setuju', '2023-09-19 04:17:38');

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
(17, 'Lorem ipsum', 'Lorem ipsum', '30000', '2023-09-19', '2023-09-19 07:07:16');

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
  `sisa_pembayaran` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `status_hasil` int(11) NOT NULL,
  `status_pinjaman` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajuan_pinjaman`
--

INSERT INTO `tbl_pengajuan_pinjaman` (`id`, `id_anggota`, `jml_pinjaman`, `waktu_pinjaman`, `tgl_mulai`, `tgl_berakhir`, `bunga`, `total_pembayaran`, `sisa_pembayaran`, `status`, `status_hasil`, `status_pinjaman`, `date`) VALUES
(20, '2', '500000', '2', '2023-09-18', '2023-11-18', '3', '515000', '0', 1, 0, '', '2023-09-18 08:24:30');

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
(17, 'kode-3715', 2, 1, '2023-09-18 07:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengeluaran`
--

CREATE TABLE `tbl_pengeluaran` (
  `id` int(11) NOT NULL,
  `nama_pengeluaran` varbinary(100) NOT NULL,
  `keterangan` text NOT NULL,
  `jml` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengeluaran`
--

INSERT INTO `tbl_pengeluaran` (`id`, `nama_pengeluaran`, `keterangan`, `jml`, `tgl`, `date`) VALUES
(8, 0x42656c69206b75727369, 'Beli kursi', 8000, '2023-09-19', '2023-09-19 07:28:38');

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
(3, 'kode-5902', 'Keripik Pisang', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '10000', '10', '5e75f29d3e91ac81b41b84598cbf68a5.jpg', '2023-09-18 09:05:42'),
(4, 'kode-4913', 'Basreng Bakso', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '12000', '33', '1a28466c24c3ea22fd804709168bfeb4.jpg', '2023-09-18 09:06:02'),
(5, 'kode-9003', 'Ikan Teri Nasi', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '7000', '35', '02f33ad80b9fb1715313fac2f879c7c5.jpg', '2023-09-18 09:06:26');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_total_pendapatan`
--

CREATE TABLE `tbl_total_pendapatan` (
  `id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_total_pendapatan`
--

INSERT INTO `tbl_total_pendapatan` (`id`, `total`, `date`) VALUES
(2, 30000, '2023-09-19 07:28:38');

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
(3, 'unit-121', 'Toko Online', '2023-09-19 07:58:35');

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
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `kode`, `nama`, `jk`, `tgl_lahir`, `nohp`, `email`, `jabatan`, `username`, `password`, `date`) VALUES
(2, 'user-725', 'Aldi', 'Laki - laki', '2023-09-19', '083138184143', 'alldii1956@gmail.com', 'Kades', 'aldi', '$2y$10$PG3g6ujRDGnvETgvJps.nOP1QtyEo8c4mXTaDbAaOJEHrWa3k8TR2', '2023-09-19 07:48:43');

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
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
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
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembayaran_produk`
--
ALTER TABLE `tbl_pembayaran_produk`
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
-- Indexes for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
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
-- Indexes for table `tbl_total_pendapatan`
--
ALTER TABLE `tbl_total_pendapatan`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_pembayaran_produk`
--
ALTER TABLE `tbl_pembayaran_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_pendapatan`
--
ALTER TABLE `tbl_pendapatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_pinjaman`
--
ALTER TABLE `tbl_pengajuan_pinjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_simpanan`
--
ALTER TABLE `tbl_pengajuan_simpanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_simpanan`
--
ALTER TABLE `tbl_simpanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_total_pendapatan`
--
ALTER TABLE `tbl_total_pendapatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
