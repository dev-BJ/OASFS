-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2022 at 11:53 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fpi-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

DROP TABLE IF EXISTS `assessment`;
CREATE TABLE IF NOT EXISTS `assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` text DEFAULT NULL,
  `sch_id` text DEFAULT NULL,
  `lt_id` text DEFAULT NULL,
  `path` text DEFAULT NULL,
  `grade` text DEFAULT NULL,
  `comment` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`id`, `course`, `sch_id`, `lt_id`, `path`, `grade`, `comment`) VALUES
(4, 'mec104', 'H/CS/20/2345', 'LT/20/0005', 'files/affiodavit.docx', '98', 'great'),
(6, 'mec104', 'H/CS/20/2345', 'LT/20/0005', 'files/affiodavit.docx', NULL, NULL),
(7, 'mec104', 'H/CS/20/2345', 'LT/20/0005', 'files/affiodavit.docx', NULL, NULL),
(8, 'mec104', 'H/CS/20/2345', 'LT/20/0005', 'files/affiodavit.docx', NULL, NULL),
(9, 'gns101', 'H/CS/20/2345', 'LT/20/0006', 'files/CHAPTER FOUR (2) A.docx', NULL, NULL),
(10, 'gns101', 'H/CS/20/2345', 'LT/20/0006', 'files/CHAPTER FOUR (2) A.docx', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `sch_id` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `pwd`, `role`, `sch_id`) VALUES
(3, 'Mr Godsent', 'pass', 'lecturer', 'LT/20/0005'),
(8, 'BOLU JOSHUA', '2125', 'student', 'N/MCE/20/0027');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
