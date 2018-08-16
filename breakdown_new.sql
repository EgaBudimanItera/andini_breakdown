-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `breakdown` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `breakdown`;

DROP TABLE IF EXISTS `jenis`;
CREATE TABLE `jenis` (
  `kdjenis` varchar(5) NOT NULL DEFAULT '0',
  `namajenis` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kdjenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `jenis` (`kdjenis`, `namajenis`) VALUES
('1',	'EXCAVATOR'),
('10',	'GRADER'),
('11',	'JENIS LAMA'),
('15',	'jenis'),
('3',	'WATER PUMP 2'),
('4',	'WATER PUMP 3'),
('5',	'WATER PUMP'),
('6',	'ARTICULATE'),
('7',	'COMPACTOR'),
('8',	'BULLDOZER'),
('9',	'FUEL TRUCK');

DROP TABLE IF EXISTS `kerusakan`;
CREATE TABLE `kerusakan` (
  `kdkerusakan` varchar(5) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kdkerusakan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `kerusakan` (`kdkerusakan`, `keterangan`) VALUES
('NRF',	'Unit B/D akibat kerusakan yang wajar');

DROP TABLE IF EXISTS `komponen`;
CREATE TABLE `komponen` (
  `kdkomp` varchar(5) NOT NULL,
  `namakomp` varchar(20) DEFAULT NULL,
  `ketkomp` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`kdkomp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `komponen` (`kdkomp`, `namakomp`, `ketkomp`) VALUES
('001',	'E',	'Engine problem'),
('002',	'ES',	'Electric Sistem'),
('003',	'TR',	'Transmisi Problem'),
('004',	'DIFF',	'Gardan Problem'),
('005',	'FD',	'Final Drive'),
('006',	'BS',	'Brake Sistem (Rem)'),
('007',	'HS',	'Hydrolic System'),
('008',	'GET',	'Part yang habis terkena ke tanah langsung'),
('009',	'ST',	'Strukture Problem'),
('010',	'UC',	'Under Cariage (Track)'),
('011',	'T',	'Tire Problem'),
('012',	'PS',	'Air System (Angin)'),
('013',	'SE',	'Stering Sistem'),
('014',	'SU',	'Suspensi Problem'),
('015',	'GC',	'General Part (Service,GOH)'),
('016',	'OT',	'Pengelasan'),
('017',	'nam',	'nam'),
('018',	'Nama',	'Komponen');

DROP TABLE IF EXISTS `merk`;
CREATE TABLE `merk` (
  `kdmerk` varchar(5) NOT NULL DEFAULT '0',
  `namamerk` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kdmerk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `merk` (`kdmerk`, `namamerk`) VALUES
('1',	'KOMATSU'),
('2',	'CAT'),
('3',	'MITSUBISHI'),
('4',	'VOLVO'),
('5',	'HAMM'),
('6',	'BOMAG'),
('7',	'MERK UNIT BARU');

DROP TABLE IF EXISTS `orderaksi`;
CREATE TABLE `orderaksi` (
  `kd` int(11) NOT NULL AUTO_INCREMENT,
  `kdorder` varchar(20) DEFAULT NULL,
  `aksi` text,
  PRIMARY KEY (`kd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `orderbreakdown`;
CREATE TABLE `orderbreakdown` (
  `kdorder` varchar(20) NOT NULL,
  `orderbyname` varchar(20) DEFAULT NULL,
  `orderbydiv` varchar(20) DEFAULT NULL,
  `tglorder` date DEFAULT NULL,
  `jamorder` time DEFAULT NULL,
  `keluhan` text,
  `kdunit` varchar(15) DEFAULT NULL,
  `tglmulai` date DEFAULT NULL,
  `jammulai` time DEFAULT NULL,
  `tglselesai` date DEFAULT NULL,
  `jamselesai` time DEFAULT NULL,
  `kdkerusakan` varchar(5) DEFAULT NULL,
  `statusbd` enum('BUS','BS') DEFAULT 'BUS',
  `statusakhir` enum('RFU','BD','P2H') DEFAULT NULL,
  `pelapor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kdorder`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `orderbreakdown` (`kdorder`, `orderbyname`, `orderbydiv`, `tglorder`, `jamorder`, `keluhan`, `kdunit`, `tglmulai`, `jammulai`, `tglselesai`, `jamselesai`, `kdkerusakan`, `statusbd`, `statusakhir`, `pelapor`) VALUES
('BR010818-000001',	NULL,	NULL,	'2018-08-01',	'10:09:41',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'BUS',	NULL,	NULL),
('BR010818-000002',	'hshsh',	'sjs',	'2018-08-01',	'10:10:27',	NULL,	'AA-02',	'2018-08-10',	'10:00:30',	'2018-08-11',	'10:15:45',	'NRF',	'BS',	'RFU',	NULL);

DROP TABLE IF EXISTS `orderkomponen`;
CREATE TABLE `orderkomponen` (
  `kd` int(11) NOT NULL AUTO_INCREMENT,
  `kdorder` varchar(20) DEFAULT NULL,
  `kdkomponen` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `ordermekanik`;
CREATE TABLE `ordermekanik` (
  `kd` int(11) NOT NULL AUTO_INCREMENT,
  `kdorder` varchar(20) DEFAULT NULL,
  `namamekanik` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `orderperbaikan`;
CREATE TABLE `orderperbaikan` (
  `kd` int(11) NOT NULL AUTO_INCREMENT,
  `kdorder` varchar(20) DEFAULT NULL,
  `kdperbaikan` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`kd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `orderproblem`;
CREATE TABLE `orderproblem` (
  `kd` int(11) NOT NULL AUTO_INCREMENT,
  `kdorder` varchar(20) DEFAULT NULL,
  `problem` text,
  PRIMARY KEY (`kd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `perbaikan`;
CREATE TABLE `perbaikan` (
  `kdperbaikan` varchar(2) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kdperbaikan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `perbaikan` (`kdperbaikan`, `keterangan`) VALUES
('B0',	'Unit sedang dikerjakan'),
('B1',	'Unit B/D karena pekerjaan terkendala ketersediaan Part');

DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit` (
  `kdunit` varchar(15) NOT NULL,
  `kdjenis` varchar(5) DEFAULT NULL,
  `tipeunit` varchar(30) DEFAULT NULL,
  `kdmerk` varchar(5) DEFAULT NULL,
  `wilayahunit` varchar(40) DEFAULT NULL,
  `hmawal` int(10) DEFAULT NULL,
  `hmakhir` int(11) DEFAULT NULL,
  PRIMARY KEY (`kdunit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `unit` (`kdunit`, `kdjenis`, `tipeunit`, `kdmerk`, `wilayahunit`, `hmawal`, `hmakhir`) VALUES
('01A',	'6',	'tipe',	'6',	'wilayah',	123,	NULL),
('1',	'2',	'CF48H 10 - 8',	'2',	'Unit Barat*',	53805,	NULL),
('2',	'3',	'CF48H 10 - 8',	'2',	'Unit Barat*',	38842,	NULL),
('3',	'4',	'MF420E 12 - 10',	'2',	'Unit Timur*',	37864,	NULL),
('4',	'5',	'MUD PUMP 6',	'3',	'Unit Timur*',	55257,	NULL),
('5',	'5',	'\"MUD PUMP 6\"\"\"',	'3',	'Unit Barat*',	53810,	NULL),
('A-05',	'1',	'PC200-8',	'1',	'Unit Timur',	55063,	NULL),
('A-06',	'1',	'PC200-8',	'1',	'Unit Timur',	53920,	NULL),
('A-07',	'1',	'PC200-8',	'1',	'Unit Timur',	37599,	NULL),
('A-08',	'1',	'PC200-8',	'1',	'Unit Timur',	53924,	NULL),
('A-09',	'1',	'PC200-8',	'1',	'Unit Timur*',	53924,	NULL),
('AA-01',	'6',	'A35E',	'4',	'Unit Timur',	53915,	NULL),
('AA-02',	'6',	'A35E',	'4',	'Unit Timur',	53925,	NULL),
('AA-03',	'6',	'A35E',	'4',	'Unit Timur',	53926,	NULL),
('AA-04',	'6',	'A35E',	'4',	'Unit Timur',	53927,	NULL),
('AA-05',	'6',	'A35E',	'4',	'Unit Timur',	53928,	NULL),
('AA-06',	'6',	'A35E',	'4',	'Unit Timur',	18283,	NULL),
('AA-07',	'6',	'A35E',	'4',	'Unit Timur',	53929,	NULL),
('AA-08',	'6',	'A35E',	'4',	'Unit Timur',	53930,	NULL),
('AA-09',	'6',	'A35E',	'4',	'Unit Timur',	53931,	NULL),
('AA-10',	'6',	'A35E',	'4',	'Unit Timur',	53932,	NULL),
('AA-11',	'6',	'A35E',	'4',	'Unit Timur',	53619,	NULL),
('AA-12',	'6',	'A35E',	'4',	'Unit Timur',	53933,	NULL),
('AA-13',	'6',	'A40E',	'4',	'Unit Timur*',	55193,	NULL),
('AA-14',	'6',	'A40E',	'4',	'Unit Timur*',	53934,	NULL),
('AA-15',	'6',	'A40E',	'4',	'Unit Timur',	53935,	NULL),
('AA-16',	'6',	'A40E',	'4',	'Unit Timur',	53936,	NULL),
('AA-17',	'6',	'A40E',	'4',	'Unit Timur*',	53937,	NULL),
('AA-18',	'6',	'A40E',	'4',	'Unit Timur*',	53916,	NULL),
('AA-19',	'6',	'A40E',	'4',	'Unit Timur',	53755,	NULL),
('AA-20',	'6',	'A40E',	'4',	'Unit Timur',	53938,	NULL),
('AA-21',	'6',	'A40E',	'4',	'Unit Timur*',	53939,	NULL),
('AA-22',	'6',	'A40E',	'4',	'Unit Timur',	53940,	NULL),
('AA-23',	'6',	'A40E',	'4',	'Unit Timur',	53809,	NULL),
('AA-24',	'6',	'A40E',	'4',	'Unit Timur*',	53941,	NULL),
('AA-25',	'6',	'A40E',	'4',	'Unit Timur*',	53942,	NULL),
('AA-26',	'6',	'A40E',	'4',	'Unit Timur',	37631,	NULL),
('AA-27',	'6',	'A40E',	'4',	'Unit Timur',	53943,	NULL),
('AA-28',	'6',	'A40E',	'4',	'Unit Timur*',	53944,	NULL),
('AA-29',	'6',	'A40E',	'4',	'Unit Timur',	38807,	NULL),
('AA-30',	'6',	'A40E',	'4',	'Unit Timur',	55546,	NULL),
('AA-31',	'6',	'A40E',	'4',	'Unit Timur',	54984,	NULL),
('AA-32',	'6',	'A40E',	'4',	'Unit Timur',	53945,	NULL),
('AA-33',	'6',	'A40E',	'4',	'Unit Timur*',	53946,	NULL),
('AA-34',	'6',	'A40E',	'4',	'Unit Timur*',	53947,	NULL),
('AA-35',	'6',	'A40E',	'4',	'Unit Timur',	53948,	NULL),
('AA-36',	'6',	'A40E',	'4',	'Unit Timur',	53949,	NULL),
('AA-37',	'6',	'A40E',	'4',	'Unit Timur',	53950,	NULL),
('AA-38',	'6',	'A40E',	'4',	'Unit Timur',	55230,	NULL),
('AA-39',	'6',	'A40E',	'4',	'Unit Timur',	38253,	NULL),
('AA-40',	'6',	'A40E',	'4',	'Unit Timur',	34116,	NULL),
('AA-41',	'6',	'A40E',	'4',	'Unit Timur',	53917,	NULL),
('AA-42',	'6',	'A40E',	'4',	'Unit Timur',	55029,	NULL),
('AA-43',	'6',	'A40E',	'4',	'Unit Timur',	54876,	NULL),
('AA-44',	'6',	'A40E',	'4',	'Unit Timur',	55521,	NULL),
('AA-45',	'6',	'A40E',	'4',	'Unit Timur',	53918,	NULL),
('AA-46',	'6',	'A40E',	'4',	'Unit Timur',	55078,	NULL),
('AA-47',	'6',	'A40E',	'4',	'Unit Timur',	53823,	NULL),
('AA-48',	'6',	'A40E',	'4',	'Unit Timur',	55088,	NULL),
('AA-49',	'6',	'A40E',	'4',	'Unit Timur',	18259,	NULL),
('AA-50',	'6',	'A40E',	'4',	'Unit Timur',	37666,	NULL),
('AA-51',	'6',	'A40E',	'4',	'Unit Timur',	38787,	NULL),
('AA-52',	'6',	'A40E',	'4',	'Unit Timur',	54757,	NULL),
('AA-53',	'6',	'A40E',	'4',	'Unit Timur',	38583,	NULL),
('AA-54',	'6',	'A40E',	'4',	'Unit Timur',	20060,	NULL),
('AC-02',	'7',	'CS533',	'2',	'Unit Timur*',	55256,	NULL),
('AC-03',	'7',	'3520',	'5',	'Unit Timur',	53805,	NULL),
('AC-04',	'7',	'3520',	'5',	'Unit Timur',	38842,	NULL),
('AC-05',	'7',	'BW216D',	'6',	'Unit Timur*',	37864,	NULL),
('AC-06',	'7',	'BW211D',	'6',	'Unit Timur*',	55257,	NULL),
('AD-01',	'8',	'D85E-SS-2',	'1',	'Unit Timur',	53810,	NULL),
('AD-03',	'8',	'D85E-SS-2',	'1',	'Unit Timur',	55063,	NULL),
('AD-04',	'8',	'D85E-SS-2',	'1',	'Unit Timur*',	53920,	NULL),
('AD-08',	'8',	'D85E-SS-2',	'1',	'Unit Timur',	37599,	NULL),
('AD-09',	'8',	'D85E-SS-2',	'1',	'Unit Timur',	55523,	NULL),
('AD-10',	'8',	'D155A-6',	'1',	'Unit Timur',	55209,	NULL),
('AD-11',	'8',	'D155A-6',	'1',	'Unit Timur',	38265,	NULL),
('AD-12',	'8',	'D155A-2',	'1',	'Unit Timur*',	0,	NULL),
('AD-15',	'8',	'D85E-SS-2',	'1',	'Unit Timur',	38292,	NULL),
('AD-16',	'8',	'D85E-SS-2',	'1',	'Unit Timur',	38502,	NULL),
('AD-17',	'8',	'D85E-SS-2',	'1',	'Unit Timur',	53921,	NULL),
('AD-18',	'8',	'D155A-6',	'1',	'Unit Timur',	49426,	NULL),
('AD-19',	'8',	'D155A-6',	'1',	'Unit Timur',	48350,	NULL),
('AD-20',	'8',	'D375A-6R',	'1',	'Unit Timur',	40375,	NULL),
('AD-21',	'8',	'D8R',	'2',	'Unit Timur*',	0,	NULL),
('AD-22',	'8',	'D8R',	'2',	'Unit Timur*',	0,	NULL),
('AD-23',	'8',	'D85E-SS-2',	'1',	'Unit Timur',	54201,	NULL),
('AD-24',	'8',	'D85E-SS-2',	'1',	'Unit Timur*',	0,	NULL),
('AD-25',	'8',	'D85E-SS-2',	'1',	'Unit Timur',	55264,	NULL),
('AD-26',	'8',	'D85E-SS-2',	'1',	'Unit Timur',	55263,	NULL),
('AD-27',	'8',	'D85E-SS-2',	'1',	'Unit Timur*',	55276,	NULL),
('AD-28',	'8',	'D85E-SS-2',	'1',	'Unit Timur',	54250,	NULL),
('AD-29',	'8',	'D85E-SS-2',	'1',	'Unit Timur',	55395,	NULL),
('AD-30',	'8',	'D85E-SS-2',	'1',	'Unit Timur',	55396,	NULL),
('AD-31',	'8',	'D375A-6R',	'1',	'Unit Timur*',	0,	NULL),
('AD-32',	'8',	'D85E-SS-2',	'1',	'Unit Timur*',	0,	NULL),
('AFT-01',	'9',	'12 KL',	'3',	'Unit Barat*',	0,	NULL),
('AFT-02',	'9',	'16KL',	'3',	'Unit Timur*',	54198,	NULL),
('AFT-05',	'9',	'FUSO',	'3',	'Unit Timur',	40482,	NULL),
('AFT-06',	'9',	'FUSO',	'3',	'Unit Timur',	40483,	NULL),
('AFT-07',	'9',	'FUSO',	'3',	'Unit Timur',	40441,	NULL),
('AFT-08',	'9',	'FUSO',	'3',	'Unit Timur',	0,	NULL),
('AFT-09',	'9',	'FUSO',	'3',	'Unit Timur',	0,	NULL),
('AG-04',	'10',	'GD705A-4',	'1',	'Unit Timur*',	37710,	NULL),
('AG-05',	'10',	'GD705A-4',	'1',	'Unit Timur',	53987,	NULL),
('AG-07',	'10',	'GD705A-4',	'1',	'Unit Timur',	53988,	NULL),
('AG-08',	'10',	'GD705A-4',	'1',	'Unit Timur',	53989,	NULL),
('AG-16-01',	'10',	'GD 825A-2',	'1',	'Unit Timur',	0,	NULL),
('dh64',	'4',	'hsh djdjd',	'3',	'dhd',	543,	123),
('EX-020-12',	'1',	'PC200-8',	'1',	'Unit Timur*',	20060,	NULL),
('EX-020-13',	'1',	'PC200-8',	'1',	'Unit Timur*',	55256,	NULL);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` char(5) NOT NULL,
  `nama` varchar(10) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `hak_akses` varchar(20) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id_user`, `nama`, `username`, `hak_akses`, `password`) VALUES
('001',	'plant',	'admin',	'admin',	'admin'),
('002',	'pimpinan',	'pimpinan',	'pimpinan',	'pimpinan'),
('003',	'engineerin',	'engineerin',	'engineering',	'engineerin');

-- 2018-08-16 10:19:30
