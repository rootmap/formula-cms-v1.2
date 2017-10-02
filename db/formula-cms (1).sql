-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2017 at 02:18 PM
-- Server version: 5.6.14
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `formula-cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorize_user`
--

CREATE TABLE IF NOT EXISTS `authorize_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `pc_name` text,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `authorize_user`
--

INSERT INTO `authorize_user` (`id`, `pc_name`, `date`, `status`) VALUES
(1, 'SUL-LABPC-11', '2015-09-15', 1),
(2, 'fahad-PC', NULL, NULL),
(4, 'Khairul-PC', NULL, NULL),
(5, 'SUL-Soft-PC', '2015-11-25', 1),
(7, 'USER-PC-Monira', '2015-12-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `custom_table_field`
--

CREATE TABLE IF NOT EXISTS `custom_table_field` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `table_id` int(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=201 ;

--
-- Dumping data for table `custom_table_field`
--

INSERT INTO `custom_table_field` (`id`, `table_id`, `name`, `date`, `status`) VALUES
(200, 55, 'site_name', '2017-09-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `blood_group` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `contactnumber` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `gender`, `blood_group`, `dob`, `contactnumber`, `address`, `username`, `password`, `date`, `status`) VALUES
(3, 'CMS Admin', '1', '1', '2015-12-09', '01927608261', 'asdS', 'cms', '7e8a32176a113a7ba3d2b1f85834e828', '2015-09-13', 1),
(4, 'Shanto', '1', '1', '1988-08-16', '13231312', 'wesaqweqw', 'shanto', '7e8a32176a113a7ba3d2b1f85834e828', '2015-11-25', 1),
(5, 'Sirajum Munira', '1', '1', '1986-08-29', '01923318408', 'adasdsad', 'munira', '7e8a32176a113a7ba3d2b1f85834e828', '2015-12-13', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `login`
--
CREATE TABLE IF NOT EXISTS `login` (
`id` int(20)
,`name` varchar(255)
,`username` varchar(255)
,`password` varchar(255)
,`status` int(2)
);
-- --------------------------------------------------------

--
-- Table structure for table `page_info`
--

CREATE TABLE IF NOT EXISTS `page_info` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `page_name_view` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `page_info`
--

INSERT INTO `page_info` (`id`, `name`, `page_name`, `page_name_view`, `menu_name`, `date`, `status`) VALUES
(55, 'site_settings', 'site_settings.php', '', 'Site Settings', '2017-09-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `site_settings_view`
--
CREATE TABLE IF NOT EXISTS `site_settings_view` (
`id` int(20)
,`site_name` varchar(255)
,`date` date
,`status` int(2)
);
-- --------------------------------------------------------

--
-- Structure for view `login`
--
DROP TABLE IF EXISTS `login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login` AS select `employee`.`id` AS `id`,`employee`.`name` AS `name`,`employee`.`username` AS `username`,`employee`.`password` AS `password`,`employee`.`status` AS `status` from `employee`;

-- --------------------------------------------------------

--
-- Structure for view `site_settings_view`
--
DROP TABLE IF EXISTS `site_settings_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `site_settings_view` AS select `site_settings`.`id` AS `id`,`site_settings`.`site_name` AS `site_name`,`site_settings`.`date` AS `date`,`site_settings`.`status` AS `status` from `site_settings`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
