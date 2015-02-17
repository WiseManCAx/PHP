-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2014 at 03:53 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `activate-and-deactivate-the-users-of-the-system-2015-02-10`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_emp`
--

CREATE TABLE IF NOT EXISTS `tb_emp` (
  `empid` int(11) NOT NULL AUTO_INCREMENT,
  `empno` varchar(25) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `account_type` varchar(25) NOT NULL,
  `rate` double(20,2) NOT NULL,
  `work_days` int(11) NOT NULL,
  `salary` decimal(20,2) NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tb_emp`
--

INSERT INTO `tb_emp` (`empid`, `empno`, `firstname`, `lastname`, `username`, `password`, `account_type`, `rate`, `work_days`, `salary`) VALUES
(9, 'ec19	', 'Juan', 'Cruz', 'staff', 'staff', 'staff', 297.00, 13, '0.00'),
(10, 'ec20	', 'Juan', 'Dela Cruz', 'supervisor', 'supervisor', 'supervisor', 310.00, 15, '0.00'),
(11, 'ec21	', 'Ronard', 'Cauba', 'admin', 'admin', 'admin', 345.00, 13, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_feedback`
--

CREATE TABLE IF NOT EXISTS `tb_feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `empid` int(11) NOT NULL,
  `empno` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `feedback` text NOT NULL,
  `date` date NOT NULL,
  `monthly` varchar(25) NOT NULL,
  `yearly` varchar(25) NOT NULL,
  `time` time NOT NULL,
  `feedback_by` varchar(25) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tb_feedback`
--

INSERT INTO `tb_feedback` (`feedback_id`, `empid`, `empno`, `firstname`, `lastname`, `feedback`, `date`, `monthly`, `yearly`, `time`, `feedback_by`) VALUES
(13, 11, 'ec21	', 'Ronard', 'Cauba', 'This is my feedback to you.', '2014-07-17', '07', '2014', '00:00:00', 'ec21	'),
(14, 10, 'ec20	', 'Juan', 'Dela Cruz', 'Testing...', '2014-06-16', '', '', '00:00:00', 'ec21	'),
(15, 9, 'ec19	', 'Juan', 'Cruz', 'sdfasdf', '2014-06-16', '06', '2014', '00:00:00', 'ec21	'),
(16, 11, 'ec21	', 'Ronard', 'Cauba', 'dsfsadf', '2014-07-16', '07', '2014', '00:00:00', 'ec21	'),
(17, 11, 'ec21	', 'Ronard', 'Cauba', 'sdfsadf', '2014-06-16', '06', '2014', '00:00:00', 'ec21	'),
(18, 11, 'ec21	', 'Ronard', 'Cauba', 'test with you..', '2014-06-16', '06', '2014', '00:00:00', 'ec21	');

-- --------------------------------------------------------

--
-- Table structure for table `tb_upload`
--

CREATE TABLE IF NOT EXISTS `tb_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tb_upload`
--

INSERT INTO `tb_upload` (`id`, `filename`) VALUES
(7, 'fileUploaded-17f377ee7bf69416137f3ee5b023af92ff39260e.jpg'),
(6, 'fileUploaded-7d5cd1ef0539af9a6cf7ea3186b54af30013a30a.jpg'),
(8, 'fileUploaded-6e9224d976a560fd597cff26d9b89af22263939a.jpg'),
(9, 'fileUploaded-a5c530409bd8dc637a276a1f30a5dc4dc6679548.docx'),
(10, 'fileUploaded-e228e2b61c5fa78c1878adec82f004c8c1eded7d.docx'),
(11, 'fileUploaded-6cb8cc5d482e2ade3fc46bc7fda70a9d3112e2c1.docx');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `datetime` datetime NOT NULL,
  `user_status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `datetime`, `user_status`) VALUES
(1, 'admin', 'admin', '2014-04-19 23:59:00', 'active'),
(2, 'ronard', 'cauba', '2014-04-19 13:58:11', 'deactive');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
