-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.26 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for mini_classroom
CREATE DATABASE IF NOT EXISTS `mini_classroom` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mini_classroom`;

-- Dumping structure for table mini_classroom.class
CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table mini_classroom.class: 1 rows
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT IGNORE INTO `class` (`class_id`, `teacher_id`, `name`, `description`, `date_added`) VALUES
	(1, 1, 'UI/UX Designer', 'Design Pattern', '2019-09-29 01:43:25');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;

-- Dumping structure for table mini_classroom.items
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `file` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table mini_classroom.items: 0 rows
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
/*!40000 ALTER TABLE `items` ENABLE KEYS */;

-- Dumping structure for table mini_classroom.student
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table mini_classroom.student: 1 rows
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT IGNORE INTO `student` (`id`, `class_id`, `fullname`, `email`, `password`, `date_added`) VALUES
	(1, 2, 'Ufonabasi Umo', 'umo@gmail.com', '4f504e6ae7efeb1790fd0bc6756159f8', '2019-09-25 23:33:58');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

-- Dumping structure for table mini_classroom.teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table mini_classroom.teachers: 1 rows
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT IGNORE INTO `teachers` (`id`, `fullname`, `email`, `password`, `date_added`) VALUES
	(1, 'Amah Gift', 'coded@gmail.com', 'e94d87bc7a0aa2655c572af7bf67792e', '2019-09-25 20:33:34');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
