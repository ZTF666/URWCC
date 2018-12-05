-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 12:07 AM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `urcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `myshops`
--

CREATE TABLE IF NOT EXISTS `myshops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_place` varchar(80) NOT NULL,
  `name_place` varchar(255) NOT NULL,
  `status_place` tinyint(1) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  `date_of_like_place` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `id_place` varchar(80) NOT NULL,
  `name_place` varchar(255) NOT NULL,
  `lt_place` float(10,6) NOT NULL,
  `lg_place` float(10,6) NOT NULL,
  `distance` float(10,6) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_place`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `email`) VALUES
(3, 'Marceline', 'Marceline<3', 'Marceline@adventuretime.epic'),
(1, 'ztf', 'xcfv', 'z@tf.jp'),
(4, 'spock', 'kirksuck', 'Vulcans@forlife.ussentreprise');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
