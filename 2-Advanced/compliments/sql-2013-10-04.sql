-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Време на генериране:  4 окт 2013 в 21:18
-- Версия на сървъра: 5.5.28-29.1-log
-- Версия на PHP: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `bgdomou_complim`
--
CREATE DATABASE IF NOT EXISTS `compliments` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `compliments`;

-- --------------------------------------------------------

--
-- Структура на таблица `compliments`
--
-- Дата на създаване:  4 окт 2013 в 17:45
-- Последно обновление:  4 окт 2013 в 17:56
--

CREATE TABLE IF NOT EXISTS `compliments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `ot` varchar(64) NOT NULL DEFAULT '' COMMENT 'От кого е поздрава',
  `izp` varchar(64) NOT NULL COMMENT 'За кого е поздрава',
  `pesen` varchar(255) NOT NULL DEFAULT '' COMMENT 'ПЕСЕН/ПОЗДРАВ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Схема на данните от таблица `compliments`
--

INSERT INTO `compliments` (`id`, `ot`, `izp`, `pesen`) VALUES
(1, 'Димитър', 'Елена', 'Жълтоклюно патенце, я ела насам'),
(2, 'Коста', 'Мария', 'Зайченцето бяло'),
(3, 'Емил Димитров', 'За теб!', 'Имала Марияна');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;