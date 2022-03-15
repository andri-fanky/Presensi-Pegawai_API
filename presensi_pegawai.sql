-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for presensi_pegawai
CREATE DATABASE IF NOT EXISTS `presensi_pegawai` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `presensi_pegawai`;

-- Dumping structure for table presensi_pegawai.presensi
CREATE TABLE IF NOT EXISTS `presensi` (
  `id_presensi` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `datetime_in` datetime NOT NULL,
  `datetime_out` datetime DEFAULT NULL,
  `location_in` varchar(200) NOT NULL,
  `location_out` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_presensi`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_presensi_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table presensi_pegawai.presensi: ~2 rows (approximately)
/*!40000 ALTER TABLE `presensi` DISABLE KEYS */;
REPLACE INTO `presensi` (`id_presensi`, `id_user`, `datetime_in`, `datetime_out`, `location_in`, `location_out`) VALUES
	(1, 3, '2022-03-03 10:28:48', '2022-03-03 10:31:17', '-7.860333333333333,110.306945', '-7.860333333333333,110.306945'),
	(2, 3, '2022-03-03 10:34:16', '2022-03-03 10:38:45', '-7.860333333333333,110.306945', '-7.860333333333333,110.306945');
/*!40000 ALTER TABLE `presensi` ENABLE KEYS */;

-- Dumping structure for table presensi_pegawai.unit_kerja
CREATE TABLE IF NOT EXISTS `unit_kerja` (
  `id_unit_kerja` int(11) NOT NULL,
  `nama_unit_kerja` varchar(100) NOT NULL,
  PRIMARY KEY (`id_unit_kerja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table presensi_pegawai.unit_kerja: ~2 rows (approximately)
/*!40000 ALTER TABLE `unit_kerja` DISABLE KEYS */;
REPLACE INTO `unit_kerja` (`id_unit_kerja`, `nama_unit_kerja`) VALUES
	(1, 'Lembaga Sistem Informasi'),
	(2, 'Biro Akademik');
/*!40000 ALTER TABLE `unit_kerja` ENABLE KEYS */;

-- Dumping structure for table presensi_pegawai.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_unit_kerja` int(11) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_user`),
  KEY `id_unit_kerja` (`id_unit_kerja`),
  CONSTRAINT `FK_users_unit_kerja` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table presensi_pegawai.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id_user`, `nama`, `email`, `password`, `id_unit_kerja`, `created_date`, `modified_date`) VALUES
	(3, 'Andri Fanky', 'andri@mail.com', 'andri123', 1, '2022-03-03 09:53:47', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
