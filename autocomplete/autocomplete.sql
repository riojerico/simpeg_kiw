-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2015 at 01:42 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_autocomplete`
--

-- --------------------------------------------------------

--
-- Table structure for table `autocomplete`
--

CREATE TABLE IF NOT EXISTS `autocomplete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `autocomplete`
--

INSERT INTO `autocomplete` (`id`, `judul`) VALUES
(1, 'Cara membuat autocomplete jquery'),
(2, 'Cara membuat multi level dropdown menu'),
(3, 'Cara Membuat mega menu css'),
(4, 'Cara membuat slider dengan css3'),
(5, 'Cara membuat popup dengan css3'),
(6, 'Cara membuat website dengan wordpress self hosted'),
(7, 'Cara membuat tabel html lebih menarik'),
(8, 'Cara membuat form berlangganan'),
(9, 'Cara membuat form validationd dengan HTML5'),
(10, 'Cara membuat Tab menu dengan css');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
