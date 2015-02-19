-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2014 at 08:36 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_title` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_status_date` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`) VALUES
(1, 'Hello world!'),
(2, 'Sample Page'),
(3, 'What is Ajax with jquery'),
(4, 'What is Ajax with jquery'),
(5, 'How to get checked selected radio button value in jquery'),
(6, 'How to search or find checkbox value with php mysql query'),
(7, 'Abstract class and Abstract Method  and Interface in PHP'),
(8, 'What is Object and Class in PHP'),
(9, 'How to get the checked selected checkbox value with multiple  checked in jquery'),
(10, 'what is controller in cakephp'),
(11, 'what is view in cakephp'),
(12, 'What is model in cakephp'),
(13, 'What is mvc model view controller in cake php'),
(14, 'what is cakephp framework'),
(15, 'Regular expressions in javascript and jquery with example'),
(16, 'How to get value of textbox in jquery example   '),
(17, 'State and City Two Drop Down with PHP Mysql AJax Code');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
