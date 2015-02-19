-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `compliments`
--
CREATE DATABASE IF NOT EXISTS `compliments` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `compliments`;

-- --------------------------------------------------------

--
-- Структура на таблица `compliments`
--
-- Създаване: 
-- Последно обновяване: 
--

DROP TABLE IF EXISTS `compliments`;
CREATE TABLE IF NOT EXISTS `compliments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `ot` varchar(64) NOT NULL DEFAULT '' COMMENT 'От кого е поздрава',
  `izp` varchar(64) NOT NULL COMMENT 'За кого е поздрава',
  `pesen` varchar(255) NOT NULL DEFAULT '' COMMENT 'ПЕСЕН/ПОЗДРАВ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Схема на данните от таблица `compliments`
--

INSERT INTO `compliments` (`id`, `ot`, `izp`, `pesen`) VALUES
(1, 'Dimityr', 'Elena', 'Jyltokliuno patence, q ela nasam'),
(2, 'Kosta', 'Mariq', 'Zai4enceto bqlo'),
(3, 'Emil Dimitrov', 'Za teb e!', 'Imala Mariana'),
(4, 'Milen', 'Dora', 'Syrni4ka moq'),
(5, 'Доротея', 'Валерия', 'ПЕСЕН ЗА ДОБРОТО'),
(6, 'Dobromir', 'Yani Dobrodzhaliev', 'I love PHP!');

-- --------------------------------------------------------

--
-- Структура на таблица `simpletask`
--
-- Създаване: 
-- Последно обновяване: 
--

DROP TABLE IF EXISTS `simpletask`;
CREATE TABLE IF NOT EXISTS `simpletask` (
  `simple_id` int(11) NOT NULL AUTO_INCREMENT,
  `number1` double NOT NULL DEFAULT '0',
  `number2` double NOT NULL DEFAULT '0',
  `sum` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`simple_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Схема на данните от таблица `simpletask`
--

INSERT INTO `simpletask` (`simple_id`, `number1`, `number2`, `sum`) VALUES
(1, 3.14, 2.86, 6),
(2, 5, 4, 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
