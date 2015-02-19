-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2014 at 07:40 PM
-- Server version: 5.5.37-cll
-- PHP Version: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `compare_product_price`
--

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE IF NOT EXISTS `compare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(20) NOT NULL,
  `image` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `shape` varchar(100) NOT NULL,
  `weight` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `compare`
--

INSERT INTO `compare` (`id`, `company`, `image`, `size`, `price`, `color`, `shape`, `weight`) VALUES
(1, 'Adidas', '1.jpg', '7', 600, 'Blue', 'Normal', '50 gram'),
(2, 'Adidas', '2.jpg', '7', 700, 'Red Blue', 'Sports', '60 gram'),
(3, 'Nike', '3.jpg', '8', 800, 'Red Blue', 'Sports', '60 gram'),
(4, 'Puma', '4.jpg', '8', 1800, 'Red Black', 'Normal Sports', '70 gram'),
(5, 'Reebok', '5.jpg', '9', 2000, 'White Black', 'Normal Sports', 'N/A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
