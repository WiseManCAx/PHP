-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Време на генериране: 
-- Версия на сървъра: 5.5.32
-- Версия на PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `php_kurs_homework`
--
CREATE DATABASE IF NOT EXISTS `php_kurs_homework` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `php_kurs_homework`;

-- --------------------------------------------------------

--
-- Структура на таблица `chat`
--
-- Дата на създаване: 
-- Последно обновление: 
--

CREATE TABLE IF NOT EXISTS `chat` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(64) NOT NULL,
  `user_login_id` int(11) NOT NULL COMMENT 'Връзка с user_login_id от таблица user_login',
  `text_head` varchar(50) NOT NULL COMMENT 'Заглавие  на съобщението.',
  `textchat` text NOT NULL,
  `time_add` int(11) NOT NULL,
  PRIMARY KEY (`chat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура на таблица `user_login`
--
-- Дата на създаване: 
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `user_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `password_basic` varchar(32) NOT NULL COMMENT 'Записваме паролата в чист вид - плачем за хакване на системата!',
  `active` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Активност - "0"=Админ',
  `date_register` int(11) NOT NULL COMMENT 'Дата на регистриране',
  PRIMARY KEY (`user_login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Потребителски данни за влизане в системата' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
