-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2013 at 06:23 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `timesheetapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `project_pk` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`project_pk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_pk`, `name`) VALUES
(16, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `project_user_mapping`
--

CREATE TABLE IF NOT EXISTS `project_user_mapping` (
  `mapping_pk` int(11) NOT NULL AUTO_INCREMENT,
  `user_fk` int(11) NOT NULL,
  `project_fk` int(11) NOT NULL,
  PRIMARY KEY (`mapping_pk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `project_user_mapping`
--

INSERT INTO `project_user_mapping` (`mapping_pk`, `user_fk`, `project_fk`) VALUES
(15, 6, 16);

-- --------------------------------------------------------

--
-- Table structure for table `time_sheet`
--

CREATE TABLE IF NOT EXISTS `time_sheet` (
  `entry_pk` int(11) NOT NULL AUTO_INCREMENT,
  `user_fk` int(11) NOT NULL,
  `project_fk` varchar(50) NOT NULL,
  `body` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  `day` varchar(10) NOT NULL,
  `hours` int(11) NOT NULL,
  PRIMARY KEY (`entry_pk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `time_sheet`
--

INSERT INTO `time_sheet` (`entry_pk`, `user_fk`, `project_fk`, `body`, `date`, `day`, `hours`) VALUES
(65, 6, '16', 'sadf', '2013-12-01 00:00:00', 'Sunday', 8),
(66, 6, '16', 'asdfsdf', '2013-12-02 00:00:00', 'Monday', 8),
(67, 6, '16', 'asfdsadf', '2013-12-03 00:00:00', 'Tuesday', 8),
(68, 6, '16', 'safdds', '2013-12-04 00:00:00', 'Wednesday', 8),
(69, 6, '16', 'asfasdf', '2013-12-05 00:00:00', 'Thursday', 8),
(70, 6, '16', 'asfddsf', '2013-12-06 00:00:00', 'Friday', 8),
(71, 6, '16', 'safdsdf', '2013-12-07 00:00:00', 'Saturday', 8),
(72, 6, '16', 'asdfgf', '2013-12-13 00:00:00', 'Friday', 8),
(73, 6, '16', 'retert', '2013-12-14 00:00:00', 'Saturday', 8),
(74, 6, '16', 'fgfgh', '2013-12-15 00:00:00', 'Sunday', 8),
(76, 6, '16', 'sdf', '2013-12-16 00:00:00', 'Monday', 8),
(77, 6, '16', 'ewr', '2013-12-19 00:00:00', 'Thursday', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_pk` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mac_id` varchar(100) NOT NULL,
  PRIMARY KEY (`user_pk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_pk`, `first_name`, `last_name`, `mac_id`) VALUES
(1, 'Akbar', 'Ali', 'testmac'),
(2, 'testingsecond', 'testingmac', 'testingfirst'),
(3, 'testingfirst', 'testingsecond', 'testingmac'),
(6, 'test', 'dfg', '72B7C3B2BB19');
