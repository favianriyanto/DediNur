-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2019 at 08:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(14) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `jumlah_bayar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_transaksi`, `id_obat`, `total`, `jumlah_bayar`) VALUES
(46, 'OM103151191219', 9, 600, 900000),
(47, 'OK103208191219', 9, 50, 75000),
(48, 'OM114513191219', 10, 50, 1000000),
(49, 'OK114739191219', 10, 3, 60000),
(50, 'OM115221191219', 9, 10, 15000),
(51, 'OM115221191219', 10, 2, 40000),
(52, 'OM115406191219', 9, 500, 750000),
(53, 'OK122225191219', 11, 5, 50000),
(54, 'OM122438191219', 11, 10, 100000),
(55, 'OK123331191219', 11, 20, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id_merek` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id_merek`, `nama`, `deskripsi`) VALUES
(8, 'sanbe', ''),
(9, 'favian', 'ini merek mahal'),
(10, 'firma', 'abcde');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `stok` int(11) NOT NULL,
  `merek` int(5) NOT NULL,
  `kategori` int(11) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama`, `deskripsi`, `stok`, `merek`, `kategori`, `harga`) VALUES
(9, 'favian', '', 1060, 8, 1, 1500),
(10, 'promaag', 'obat maag', 49, 9, 1, 20000),
(11, 'abc', '-', 100, 10, 1, 10000),
(12, 'favian', '', 0, 8, 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama`, `alamat`, `no_tlp`, `status`, `jk`, `tgl_lahir`) VALUES
(0000000003, 'ezu', 'jln bingung', '0808', 0, 'l', '1999-05-04'),
(0000000004, 'favian', '', '090', 0, 'l', '1999-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) UNSIGNED ZEROFILL NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `user_login_id` int(11) NOT NULL,
  `jk` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `alamat`, `no_hp`, `jabatan`, `user_login_id`, `jk`) VALUES
(00000000001, 'dokter', 'jl.bebek', '', 1, 1, 'l'),
(00000000002, 'pegawai', '', '', 2, 2, 'l'),
(00000000006, 'favian', '', '082358711106', 2, 6, 'l'),
(00000000009, 'dina', '', '082358711106', 2, 9, 'p');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_obat`
--

CREATE TABLE `transaksi_obat` (
  `id` varchar(14) NOT NULL,
  `id_pengguna` int(11) UNSIGNED ZEROFILL NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `tipe` int(11) NOT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `pengirim` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_obat`
--

INSERT INTO `transaksi_obat` (`id`, `id_pengguna`, `tgl_transaksi`, `tipe`, `id_pasien`, `jumlah`, `pengirim`) VALUES
('OK103208191219', 00000000002, '2019-12-19', 1, 0, 75000, NULL),
('OK114739191219', 00000000002, '2019-12-19', 1, 3, 60000, NULL),
('OK122225191219', 00000000009, '2019-12-19', 1, 3, 50000, NULL),
('OK123331191219', 00000000009, '2019-12-19', 1, 0, 200000, NULL),
('OM103151191219', 00000000002, '2019-12-19', 2, NULL, 900000, ''),
('OM114513191219', 00000000002, '2019-12-05', 2, NULL, 1000000, ''),
('OM115221191219', 00000000002, '2019-12-10', 2, NULL, 55000, 'gojek'),
('OM115406191219', 00000000009, '2019-12-19', 2, NULL, 750000, ''),
('OM122438191219', 00000000009, '2019-12-19', 2, NULL, 100000, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(1) NOT NULL,
  `jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `password`, `role`, `jabatan`) VALUES
(1, 'dokter', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(2, 'pegawai', 'e10adc3949ba59abbe56e057f20f883e', 1, 2),
(6, 'favian', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(9, 'dina', 'e10adc3949ba59abbe56e057f20f883e', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegawai` (`id_pengguna`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `id_merek` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_detail_trans_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transkaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi_obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD CONSTRAINT `fk_pegawai_transaksi` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
