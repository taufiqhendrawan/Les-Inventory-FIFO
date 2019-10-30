-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Okt 2019 pada 09.22
-- Versi Server: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fifo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
  `barang_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `barang_kode` varchar(50) NOT NULL,
  `barang_nama` varchar(50) NOT NULL,
  `barang_stok` int(11) NOT NULL,
  `barang_tgl` date NOT NULL,
  `barang_sat` varchar(50) NOT NULL,
  `barang_ket` varchar(100) NOT NULL,
  `barang_jual` int(11) NOT NULL,
  `barang_beli` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`barang_id`, `kategori_id`, `barang_kode`, `barang_nama`, `barang_stok`, `barang_tgl`, `barang_sat`, `barang_ket`, `barang_jual`, `barang_beli`) VALUES
(14, 4, 'BAN-001', 'FDR 30', 11, '2019-10-24', 'Pcs', 'Pas', 15000, 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_kel`
--

CREATE TABLE IF NOT EXISTS `tb_barang_kel` (
  `kel_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `kel_faktur` varchar(50) NOT NULL,
  `kel_tgl` date NOT NULL,
  `kel_total` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang_kel`
--

INSERT INTO `tb_barang_kel` (`kel_id`, `pelanggan_id`, `kel_faktur`, `kel_tgl`, `kel_total`) VALUES
(12, 5, '0', '2019-10-23', NULL),
(13, 6, 'FAK-1023-111819', '2019-10-24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_msk`
--

CREATE TABLE IF NOT EXISTS `tb_barang_msk` (
  `msk_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `msk_faktur` varchar(50) NOT NULL,
  `msk_jumlah` int(11) NOT NULL,
  `msk_tgl` date NOT NULL,
  `msk_ket` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang_msk`
--

INSERT INTO `tb_barang_msk` (`msk_id`, `supplier_id`, `barang_id`, `msk_faktur`, `msk_jumlah`, `msk_tgl`, `msk_ket`) VALUES
(1, 2, 14, 'NT-012345', 1, '2019-10-24', 'Pas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_kel`
--

CREATE TABLE IF NOT EXISTS `tb_detail_kel` (
  `detail_id` int(11) NOT NULL,
  `kel_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `detail_jumlah` int(11) NOT NULL,
  `detail_total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_kel`
--

INSERT INTO `tb_detail_kel` (`detail_id`, `kel_id`, `barang_id`, `detail_jumlah`, `detail_total`) VALUES
(3, 12, 11, 1, 150000),
(7, 13, 14, 2, 30000),
(8, 13, 14, 1, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Ban Import'),
(4, 'Ban Luar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE IF NOT EXISTS `tb_pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `pelanggan_nama` varchar(50) NOT NULL,
  `pelanggan_alamat` varchar(50) NOT NULL,
  `pelanggan_tlp` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`pelanggan_id`, `pelanggan_nama`, `pelanggan_alamat`, `pelanggan_tlp`) VALUES
(4, 'Benita', 'Reformasi', '08123123'),
(5, 'Reformasi', 'Padang', '1234'),
(6, 'Egova', 'Padang', '0819629431');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE IF NOT EXISTS `tb_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_user` varchar(50) NOT NULL,
  `pengguna_pass` varchar(50) NOT NULL,
  `pengguna_nama` varchar(50) NOT NULL,
  `pengguna_level` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`pengguna_id`, `pengguna_user`, `pengguna_pass`, `pengguna_nama`, `pengguna_level`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'Admin'),
(2, 'Benita', 'asdasd12', 'Benita', 'Pimpinan'),
(3, 'Reformasi', 'asdasd12', 'Reformasi', 'Front Office'),
(4, 'R', 'asdasd12', 'R', 'Staff Gudang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE IF NOT EXISTS `tb_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_nama` varchar(50) NOT NULL,
  `supplier_alamat` varchar(100) NOT NULL,
  `supplier_tlp` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`supplier_id`, `supplier_nama`, `supplier_alamat`, `supplier_tlp`) VALUES
(2, 'Benita1', 'Reformasi R1', '12341');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `tb_barang_kel`
--
ALTER TABLE `tb_barang_kel`
  ADD PRIMARY KEY (`kel_id`);

--
-- Indexes for table `tb_barang_msk`
--
ALTER TABLE `tb_barang_msk`
  ADD PRIMARY KEY (`msk_id`);

--
-- Indexes for table `tb_detail_kel`
--
ALTER TABLE `tb_detail_kel`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_barang_kel`
--
ALTER TABLE `tb_barang_kel`
  MODIFY `kel_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_barang_msk`
--
ALTER TABLE `tb_barang_msk`
  MODIFY `msk_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_detail_kel`
--
ALTER TABLE `tb_detail_kel`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
