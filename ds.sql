-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2017 at 09:43 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ds`
--
CREATE DATABASE IF NOT EXISTS `ds` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `ds`;

-- --------------------------------------------------------

--
-- Table structure for table `category-item`
--

CREATE TABLE IF NOT EXISTS `category-item` (
  `categoryID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;

--
-- Dumping data for table `category-item`
--

INSERT INTO `category-item` (`categoryID`, `itemID`, `id`) VALUES
(15, 257, 11),
(15, 258, 12),
(16, 259, 13),
(16, 260, 14),
(34, 261, 15),
(34, 262, 16),
(44, 278, 17),
(44, 279, 18),
(46, 280, 19),
(46, 281, 20),
(49, 282, 21),
(49, 283, 22);

-- --------------------------------------------------------

--
-- Table structure for table `categorymodel`
--

CREATE TABLE IF NOT EXISTS `categorymodel` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryType` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=50 ;

--
-- Dumping data for table `categorymodel`
--

INSERT INTO `categorymodel` (`categoryID`, `categoryType`) VALUES
(15, 'Digital'),
(16, 'Digital'),
(17, 'Digital'),
(18, 'Digital'),
(19, 'Digital'),
(20, 'Digital'),
(21, 'Food'),
(22, 'Food'),
(23, 'Food'),
(24, 'Digital'),
(25, 'Food'),
(26, 'Digital'),
(27, 'Food'),
(28, 'Digital'),
(29, 'Food'),
(30, 'Digital'),
(31, 'Food'),
(32, 'Digital'),
(33, 'Food'),
(34, 'Digital'),
(35, 'Digital'),
(36, 'Digital'),
(37, 'Digital'),
(38, 'Digital'),
(39, 'Digital'),
(40, 'Food'),
(41, 'Digital'),
(42, 'Food'),
(43, 'Digital'),
(44, 'Food'),
(45, 'Digital'),
(46, 'Food'),
(47, 'Digital'),
(48, 'Food'),
(49, 'Digital');

-- --------------------------------------------------------

--
-- Table structure for table `itemmodel`
--

CREATE TABLE IF NOT EXISTS `itemmodel` (
  `itemid` int(11) NOT NULL AUTO_INCREMENT,
  `price` int(11) NOT NULL,
  `properties` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=284 ;

--
-- Dumping data for table `itemmodel`
--

INSERT INTO `itemmodel` (`itemid`, `price`, `properties`) VALUES
(257, 12, '{"type":"cellPhone","builder":"SAMSUNG"}'),
(258, 35, '{"type":"adaptor","builder":"SAMSUNG"}'),
(259, 12, '{"type":"cellPhone","builder":"SAMSUNG"}'),
(260, 35, '{"type":"adaptor","builder":"SAMSUNG"}'),
(261, 12, '{"type":"cellPhone","builder":"SAMSUNG"}'),
(262, 35, '{"type":"adaptor","builder":"SAMSUNG"}'),
(263, 12, '{"type":"cellPhone","builder":"SAMSUNG"}'),
(264, 35, '{"type":"adaptor","builder":"SAMSUNG"}'),
(265, 50, '{"type":"adaptor","builder":"SAMSUNG"}'),
(266, 12, '{"type":"cellPhone","builder":"SAMSUNG"}'),
(267, 35, '{"type":"adaptor","builder":"SAMSUNG"}'),
(268, 50, '{"type":"adaptor","builder":"SAMSUNG"}'),
(269, 12, '{"type":"cellPhone","builder":"SAMSUNG"}'),
(270, 35, '{"type":"adaptor","builder":"SAMSUNG"}'),
(271, 50, '{"type":"adaptor","builder":"SAMSUNG"}'),
(272, 12, '{"type":"cellPhone","builder":"SAMSUNG"}'),
(273, 35, '{"type":"adaptor","builder":"SAMSUNG"}'),
(274, 50, '{"type":"adaptor","builder":"SAMSUNG"}'),
(275, 12, '{"type":"cellPhone","builder":"SAMSUNG"}'),
(276, 35, '{"type":"adaptor","builder":"SAMSUNG"}'),
(277, 50, '{"type":"adaptor","builder":"SAMSUNG"}'),
(278, 12, '{"type":"cellPhone","builder":"SAMSUNG"}'),
(279, 35, '{"type":"tv","builder":"SAMSUNG"}'),
(280, 12, '{"type":"cellPhone","builder":"SAMSUNG"}'),
(281, 35, '{"type":"tv","builder":"SAMSUNG"}'),
(282, 12, '{"type":"cellPhone","builder":"SAMSUNG"}'),
(283, 35, '{"type":"tv","builder":"SAMSUNG"}');

-- --------------------------------------------------------

--
-- Table structure for table `shop-category`
--

CREATE TABLE IF NOT EXISTS `shop-category` (
  `shopid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=27 ;

--
-- Dumping data for table `shop-category`
--

INSERT INTO `shop-category` (`shopid`, `categoryid`, `id`) VALUES
(17, 3, 1),
(18, 4, 2),
(19, 5, 3),
(6, 20, 4),
(7, 21, 5),
(8, 22, 6),
(9, 23, 7),
(9, 24, 8),
(10, 25, 9),
(10, 26, 10),
(11, 27, 11),
(11, 28, 12),
(12, 29, 13),
(12, 30, 14),
(13, 31, 15),
(13, 32, 16),
(18, 40, 17),
(18, 41, 18),
(19, 42, 19),
(19, 43, 20),
(20, 44, 21),
(20, 45, 22),
(21, 46, 23),
(21, 47, 24),
(22, 48, 25),
(22, 49, 26);

-- --------------------------------------------------------

--
-- Table structure for table `shopmodel`
--

CREATE TABLE IF NOT EXISTS `shopmodel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;

--
-- Dumping data for table `shopmodel`
--

INSERT INTO `shopmodel` (`id`, `name`) VALUES
(1, 'digikala'),
(2, 'digikala'),
(3, 'digikala'),
(4, 'digikala'),
(5, 'digikala'),
(6, 'digikala'),
(7, 'digikala'),
(8, 'digikala'),
(9, 'digikala'),
(10, 'digikala'),
(11, 'digikala'),
(12, 'digikala'),
(13, 'digikala'),
(14, 'digikala'),
(15, 'digikala'),
(16, 'digikala'),
(17, 'bamilio'),
(18, 'digikala'),
(19, 'digikala'),
(20, 'digikala'),
(21, 'digikala'),
(22, 'digikala');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
