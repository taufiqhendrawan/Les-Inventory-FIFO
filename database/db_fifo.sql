-- Adminer 4.7.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang` (
  `barang_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_id` int(11) NOT NULL,
  `barang_kode` varchar(50) NOT NULL,
  `barang_nama` varchar(50) NOT NULL,
  `barang_stok` int(11) NOT NULL,
  `barang_tgl` date NOT NULL,
  `barang_sat` varchar(50) NOT NULL,
  `barang_ket` varchar(100) NOT NULL,
  `barang_jual` int(11) NOT NULL,
  `barang_beli` int(11) NOT NULL,
  PRIMARY KEY (`barang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_barang` (`barang_id`, `kategori_id`, `barang_kode`, `barang_nama`, `barang_stok`, `barang_tgl`, `barang_sat`, `barang_ket`, `barang_jual`, `barang_beli`) VALUES
(14,	1,	'BAN-001',	'FDR 30',	98,	'2019-10-24',	'Pcs',	'Pas',	15000,	12000),
(16,	1,	'BAN-002',	'Ban Motor 30',	98,	'2019-11-18',	'Pcs',	'Pas',	14000,	13000);

DROP TABLE IF EXISTS `tb_barang_kel`;
CREATE TABLE `tb_barang_kel` (
  `kel_id` int(11) NOT NULL AUTO_INCREMENT,
  `pelanggan_id` int(11) NOT NULL,
  `kel_faktur` varchar(50) NOT NULL,
  `kel_tgl` date NOT NULL,
  `kel_total` int(11) DEFAULT NULL,
  PRIMARY KEY (`kel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_barang_kel` (`kel_id`, `pelanggan_id`, `kel_faktur`, `kel_tgl`, `kel_total`) VALUES
(12,	5,	'0',	'2019-10-23',	NULL),
(13,	6,	'FAK-1023-111819',	'2019-10-24',	NULL),
(14,	7,	'FAK-1025-023848',	'2019-10-25',	NULL),
(15,	4,	'FAK-1118-100923',	'2019-11-18',	NULL),
(16,	8,	'FAK-1118-103244',	'2019-11-18',	NULL),
(17,	6,	'FAK-1118-103824',	'2019-11-18',	NULL),
(18,	4,	'FAK-1118-104012',	'2019-11-18',	NULL);

DROP TABLE IF EXISTS `tb_barang_msk`;
CREATE TABLE `tb_barang_msk` (
  `msk_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `msk_faktur` varchar(50) NOT NULL,
  `msk_jumlah` int(11) NOT NULL,
  `msk_tgl` date NOT NULL,
  `msk_ket` varchar(50) NOT NULL,
  PRIMARY KEY (`msk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_barang_msk` (`msk_id`, `supplier_id`, `barang_id`, `msk_faktur`, `msk_jumlah`, `msk_tgl`, `msk_ket`) VALUES
(1,	2,	14,	'NT-012345',	1,	'2019-10-24',	'Pas'),
(2,	3,	15,	'NT-012345',	1,	'2019-11-18',	'Barang Cukup');

DROP TABLE IF EXISTS `tb_detail_kel`;
CREATE TABLE `tb_detail_kel` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `kel_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `detail_jumlah` int(11) NOT NULL,
  `detail_total` int(11) NOT NULL,
  PRIMARY KEY (`detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_detail_kel` (`detail_id`, `kel_id`, `barang_id`, `detail_jumlah`, `detail_total`) VALUES
(3,	12,	11,	1,	150000),
(7,	13,	14,	2,	30000),
(8,	13,	14,	1,	15000),
(9,	14,	14,	1,	15000),
(10,	16,	14,	1,	15000),
(12,	17,	14,	1,	15000),
(13,	17,	16,	2,	28000),
(14,	18,	14,	1,	15000);

DROP TABLE IF EXISTS `tb_kategori`;
CREATE TABLE `tb_kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(50) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1,	'Ban Import'),
(4,	'Ban Luar');

DROP TABLE IF EXISTS `tb_pelanggan`;
CREATE TABLE `tb_pelanggan` (
  `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pelanggan_nama` varchar(50) NOT NULL,
  `pelanggan_alamat` varchar(50) NOT NULL,
  `pelanggan_tlp` varchar(50) NOT NULL,
  PRIMARY KEY (`pelanggan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_pelanggan` (`pelanggan_id`, `pelanggan_nama`, `pelanggan_alamat`, `pelanggan_tlp`) VALUES
(4,	'Benita',	'Reformasi',	'08123123'),
(5,	'Reformasi',	'Padang',	'1234'),
(6,	'Egova',	'Padang',	'0819629431'),
(7,	'Ani',	'Padang',	'1234'),
(8,	'Abg',	'padang',	'1234');

DROP TABLE IF EXISTS `tb_pengguna`;
CREATE TABLE `tb_pengguna` (
  `pengguna_id` int(11) NOT NULL AUTO_INCREMENT,
  `pengguna_user` varchar(50) NOT NULL,
  `pengguna_pass` varchar(50) NOT NULL,
  `pengguna_nama` varchar(50) NOT NULL,
  `pengguna_level` varchar(30) NOT NULL,
  PRIMARY KEY (`pengguna_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_pengguna` (`pengguna_id`, `pengguna_user`, `pengguna_pass`, `pengguna_nama`, `pengguna_level`) VALUES
(1,	'Admin',	'Admin',	'Benita',	'Admin'),
(2,	'Pimpinan',	'Pimpinan',	'Pimpinan',	'Pimpinan'),
(3,	'Front Office',	'Front Office',	'Front Office',	'Front Office'),
(4,	'Staff Gudang',	'Staff Gudang',	'Staff Gudang',	'Staff Gudang');

DROP TABLE IF EXISTS `tb_supplier`;
CREATE TABLE `tb_supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_nama` varchar(50) NOT NULL,
  `supplier_alamat` varchar(100) NOT NULL,
  `supplier_tlp` varchar(50) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_supplier` (`supplier_id`, `supplier_nama`, `supplier_alamat`, `supplier_tlp`) VALUES
(2,	'Benita',	'Reformasi R',	'12341'),
(3,	'Reformasi',	'Padang',	'123'),
(4,	'R',	'Padang',	'1235');

-- 2019-11-18 10:46:00
