-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 25, 2015 at 04:56 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `league`
--
CREATE DATABASE IF NOT EXISTS `league` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `league`;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `season_id` int(11) NOT NULL,
  `player_win` int(11) NOT NULL,
  `player_loss` int(11) NOT NULL,
  `headhunter` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `timestamp`, `season_id`, `player_win`, `player_loss`, `headhunter`) VALUES
(1, '2015-02-03 07:00:00', 0, 1, 2, 0),
(2, '2015-02-10 07:00:00', 0, 1, 10, 0),
(3, '2015-02-16 05:15:55', 0, 10, 2, 0),
(4, '2015-04-26 06:59:50', 0, 2, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `first_name`, `last_name`) VALUES
(1, 'Bobby', 'Bouche'),
(2, 'Leonard', 'Miller'),
(10, 'Betty', 'Ford'),
(11, 'Nelson', 'Mandela'),
(12, 'Vinnie', 'De Milo');

-- --------------------------------------------------------

--
-- Table structure for table `player_points`
--

DROP TABLE IF EXISTS `player_points`;
CREATE TABLE IF NOT EXISTS `player_points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_xref` int(11) NOT NULL,
  `game_xref` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

DROP TABLE IF EXISTS `seasons`;
CREATE TABLE IF NOT EXISTS `seasons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `start_date`, `end_date`) VALUES
(1, '2014-01-01', '2020-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `season_players`
--

DROP TABLE IF EXISTS `season_players`;
CREATE TABLE IF NOT EXISTS `season_players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `mulligan_1` tinyint(1) NOT NULL DEFAULT '0',
  `mulligan_2` tinyint(1) NOT NULL DEFAULT '0',
  `rebuy` tinyint(1) NOT NULL DEFAULT '0',
  `wk_1_packs` tinyint(1) NOT NULL DEFAULT '0',
  `wk_2_packs` tinyint(1) NOT NULL DEFAULT '0',
  `wk_3_packs` tinyint(1) NOT NULL DEFAULT '0',
  `wk_4_packs` tinyint(1) NOT NULL DEFAULT '0',
  `wk_5_packs` tinyint(1) NOT NULL DEFAULT '0',
  `wk_6_packs` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
