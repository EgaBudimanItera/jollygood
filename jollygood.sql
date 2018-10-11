/*
SQLyog Enterprise - MySQL GUI v7.14 
MySQL - 5.6.25 : Database - jollygood
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`jollygood` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `jollygood`;

/*Table structure for table `01_siswa` */

DROP TABLE IF EXISTS `01_siswa`;

CREATE TABLE `01_siswa` (
  `kodesiswa` varchar(10) NOT NULL,
  `namasiswa` varchar(30) DEFAULT NULL,
  `jk` enum('0','1') DEFAULT NULL COMMENT '0=Laki-laki,1=perempuan',
  `tmplahir` varchar(20) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `alamat` text,
  `nohp` varchar(12) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `statusdaftar` enum('0','1') DEFAULT '0' COMMENT '0=daftar 1=siswa',
  `statusaktif` enum('0','1') DEFAULT '0' COMMENT '0=tidakaktf 1=aktif',
  PRIMARY KEY (`kodesiswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `01_siswa` */

/*Table structure for table `02_kelas` */

DROP TABLE IF EXISTS `02_kelas`;

CREATE TABLE `02_kelas` (
  `kodekelas` varchar(10) NOT NULL,
  `namakelas` varchar(30) DEFAULT NULL,
  `tglbuka` date DEFAULT NULL,
  `tgltutup` date DEFAULT NULL,
  `biayadaftar` double DEFAULT NULL,
  `biayabulanan` double DEFAULT NULL,
  `jumlahsiswa` int(11) DEFAULT NULL,
  PRIMARY KEY (`kodekelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `02_kelas` */

/*Table structure for table `03_pendaftaran` */

DROP TABLE IF EXISTS `03_pendaftaran`;

CREATE TABLE `03_pendaftaran` (
  `kodependaftaran` varchar(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kodesiswa` varchar(10) DEFAULT NULL,
  `kodekelas` varchar(10) DEFAULT NULL,
  `keterangan` text,
  `uangdaftar` double DEFAULT NULL,
  PRIMARY KEY (`kodependaftaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `03_pendaftaran` */

/*Table structure for table `04_pembayaran` */

DROP TABLE IF EXISTS `04_pembayaran`;

CREATE TABLE `04_pembayaran` (
  `kodebayar` varchar(20) NOT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `kodependaftaran` varchar(20) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `file` text,
  `status` enum('0','1') DEFAULT '0' COMMENT '0=open 1=close',
  PRIMARY KEY (`kodebayar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `04_pembayaran` */

/*Table structure for table `05_pendapatan` */

DROP TABLE IF EXISTS `05_pendapatan`;

CREATE TABLE `05_pendapatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `keterangan` enum('0','1') DEFAULT NULL COMMENT '0=pendaftaran 1=spp',
  `noref` varchar(20) DEFAULT NULL,
  `kodesiswa` varchar(12) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `05_pendapatan` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
