/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - otobizz
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`otobizz` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `otobizz`;

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `idkaryawan` char(30) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `nohp` char(30) DEFAULT NULL,
  PRIMARY KEY (`idkaryawan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `karyawan` */

insert  into `karyawan`(`idkaryawan`,`nama`,`alamat`,`nohp`) values 
('KW0001','cias','adasdsad','08123123');

/*Table structure for table `kendaraan_selesai` */

DROP TABLE IF EXISTS `kendaraan_selesai`;

CREATE TABLE `kendaraan_selesai` (
  `idselesai` char(30) DEFAULT NULL,
  `idpencucian` char(30) DEFAULT NULL,
  `jamjemput` time DEFAULT NULL,
  `totalbayar` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `kendaraan_selesai` */

/*Table structure for table `otp_codes` */

DROP TABLE IF EXISTS `otp_codes`;

CREATE TABLE `otp_codes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `otp_code` varchar(6) NOT NULL,
  `type` enum('register','forgot_password') NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT '0',
  `expires_at` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_email` (`email`),
  KEY `idx_otp_code` (`otp_code`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `otp_codes` */

insert  into `otp_codes`(`id`,`email`,`otp_code`,`type`,`is_used`,`expires_at`,`created_at`,`updated_at`) values 
(15,'chika26@gmail.com','722994','register',0,'2025-07-29 17:55:57','2025-07-29 17:45:57','2025-07-29 17:45:57'),
(16,'chikafebria26@gmail.com','596520','register',1,'2025-07-29 17:56:24','2025-07-29 17:46:24','2025-07-29 17:47:35'),
(17,'prasda@gmail.com','217990','register',0,'2025-07-29 22:55:56','2025-07-29 22:45:56','2025-07-29 22:45:56');

/*Table structure for table `paket_cucian` */

DROP TABLE IF EXISTS `paket_cucian`;

CREATE TABLE `paket_cucian` (
  `idpaket` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `namapaket` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenis` double DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idpaket`),
  KEY `idx_kamar_status` (`harga`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `paket_cucian` */

insert  into `paket_cucian`(`idpaket`,`namapaket`,`jenis`,`harga`,`keterangan`,`created_at`,`updated_at`,`deleted_at`) values 
('PKT0001','Paket Salju',NULL,15000,'asdsdsd',NULL,NULL,NULL);

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `idpelanggan` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `nohp` char(30) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `platnomor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idpelanggan`),
  KEY `fk_tamu_user` (`platnomor`),
  KEY `idx_tamu_jk` (`jk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`idpelanggan`,`nama`,`alamat`,`nohp`,`jk`,`platnomor`,`created_at`,`updated_at`,`deleted_at`) values 
('PL0001','cia','cia','123','L','cia',NULL,NULL,NULL);

/*Table structure for table `pencucian` */

DROP TABLE IF EXISTS `pencucian`;

CREATE TABLE `pencucian` (
  `idpencucian` char(30) NOT NULL,
  `idkaryawan` char(30) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jamdatang` time DEFAULT NULL,
  `idpelanggan` char(1) DEFAULT NULL,
  `idpaket` char(30) DEFAULT NULL,
  `status` enum('diproses','dijemput','selesai') DEFAULT NULL,
  PRIMARY KEY (`idpencucian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pencucian` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL COMMENT 'admin, user, dll',
  `status` varchar(20) NOT NULL DEFAULT 'active' COMMENT 'active, inactive',
  `last_login` datetime DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `idx_users_role` (`role`),
  KEY `idx_users_status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`password`,`role`,`status`,`last_login`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'admin','admin@example.com','$2y$10$hI1mC1S1wh2sz1NqPDgDl.I.ZM9sjbmqm4aiFI6lzzB7XgOvZgnhe','admin','active','2025-08-02 14:00:27',NULL,'2025-06-14 21:50:56','2025-06-14 21:50:56',NULL),
(2,'Rindiani','rindianir573@gmail.com','$2y$10$hI1mC1S1wh2sz1NqPDgDl.I.ZM9sjbmqm4aiFI6lzzB7XgOvZgnhe','user','active','2025-07-28 00:00:11',NULL,'2025-06-28 10:30:11','2025-06-28 10:30:11',NULL),
(26,'Pimpinan','pimpinan@gmail.com','$2y$10$hI1mC1S1wh2sz1NqPDgDl.I.ZM9sjbmqm4aiFI6lzzB7XgOvZgnhe','pimpinan','active','2025-07-27 12:58:39',NULL,NULL,NULL,NULL),
(27,'chika','chikafebria26@gmail.com','$2y$10$rNc.eNEHFMWbsziKX6poSetuvzRRWozxgGE7Bq7VmJTA4pJJNl50K','user','active','2025-07-29 17:47:57',NULL,'2025-07-29 17:47:35','2025-07-29 17:47:35',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
