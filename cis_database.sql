-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2015 at 02:09 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cis_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `cis_forum`
--

CREATE TABLE IF NOT EXISTS `cis_forum` (
  `FORUM_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FORUM_NAME` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `DESCRIPTION` varchar(100) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`FORUM_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `cis_forum_message`
--

CREATE TABLE IF NOT EXISTS `cis_forum_message` (
  `MESSAGE_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PARENT_MESSAGE_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `FORUM_ID` int(10) unsigned NOT NULL,
  `USER_ID` int(10) unsigned NOT NULL,
  `SUBJECT` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `MESSAGE_TEXT` text COLLATE latin1_general_cs NOT NULL,
  `MESSAGE_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MESSAGE_ID`),
  KEY `PARENT_MESSAGE_ID` (`PARENT_MESSAGE_ID`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `cis_maillist`
--

CREATE TABLE IF NOT EXISTS `cis_maillist` (
  `EMAIL_ADDR` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `IS_DIGEST` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`EMAIL_ADDR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `cis_pending`
--

CREATE TABLE IF NOT EXISTS `cis_pending` (
  `USER_ID` int(10) unsigned NOT NULL,
  `TOKEN` char(10) COLLATE latin1_general_cs NOT NULL,
  `CREATED_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `USER_ID` (`USER_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `cis_pending`
--

INSERT INTO `cis_pending` (`USER_ID`, `TOKEN`, `CREATED_DATE`) VALUES
(2, 'TDHJP', '2015-07-22 22:40:39'),
(14, 'PNMBE', '2015-08-27 02:02:15'),
(15, 'RTT1H', '2015-08-27 02:03:36'),
(16, '2ZS0P', '2015-08-27 02:06:40'),
(17, '8AWZT', '2015-08-27 02:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `cis_user`
--

CREATE TABLE IF NOT EXISTS `cis_user` (
  `USER_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(20) CHARACTER SET utf8 NOT NULL,
  `PASSWORD` char(40) CHARACTER SET utf8 NOT NULL,
  `EMAIL_ADDR` varchar(100) CHARACTER SET utf8 NOT NULL,
  `IS_ACTIVE` tinyint(1) DEFAULT '0',
  `PERMISSION` tinyint(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`USER_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=18 ;

--
-- Dumping data for table `cis_user`
--

INSERT INTO `cis_user` (`USER_ID`, `USERNAME`, `PASSWORD`, `EMAIL_ADDR`, `IS_ACTIVE`, `PERMISSION`) VALUES
(1, 'hi', '81110df80ca4086e306c4c52ab485a35cf761acc', 'Darkrainzodd6@hotmail.com', 0, 0),
(11, 'Dark', '81110df80ca4086e306c4c52ab485a35cf761acc', 'Darkrainzodd6@hotmail.com', 1, 0),
(13, 'asdf', '81110df80ca4086e306c4c52ab485a35cf761acc', 'Dasd@dfd.com', 0, 0),
(14, 'Draken', 'f87552a1314ed4b87572c1985514971f6027f6d4', 'Darkrainzodd6@hotmail.com', 0, 0),
(15, 'asdfdd', 'f87552a1314ed4b87572c1985514971f6027f6d4', 'Darkrainzodd6@hotmail.com', 0, 0),
(16, 'asdfddd', '81110df80ca4086e306c4c52ab485a35cf761acc', 'Darkrainzodd6@hotmail.com', 0, 0),
(17, 'asdfssss', '81110df80ca4086e306c4c52ab485a35cf761acc', 'Darkrainzodd6@hotmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `forum_answer`
--

CREATE TABLE IF NOT EXISTS `forum_answer` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `a_id` int(4) NOT NULL DEFAULT '0',
  `a_name` varchar(65) NOT NULL DEFAULT '',
  `a_email` varchar(65) NOT NULL DEFAULT '',
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL DEFAULT '',
  KEY `a_id` (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forum_answer`
--

INSERT INTO `forum_answer` (`question_id`, `a_id`, `a_name`, `a_email`, `a_answer`, `a_datetime`) VALUES
(0, 1, 'aa', 'aa', 'aa', '26/08/15 21:54:47'),
(0, 2, 'Hello', 'ASD', 'Hey myself', '26/08/15 21:57:49'),
(0, 3, 'Hello', 'ASD', 'Hey myself', '26/08/15 21:59:50'),
(0, 4, '', '', '', '26/08/15 21:59:59'),
(0, 5, 'Steven', 'Fake@Email.com', 'Test Reply', '26/08/15 22:09:48'),
(0, 6, 'asdfdf', 'dsfdsa', 'fa', '26/08/15 22:22:42'),
(0, 7, '', '', '', '26/08/15 22:22:45'),
(0, 8, '', '', '', '26/08/15 22:24:44'),
(0, 9, '', '', '', '26/08/15 22:28:38'),
(0, 10, 'cvbxb', 'vcbcxvb', 'xcvbxc', '26/08/15 22:28:56'),
(0, 11, 'a', 'a', 'a', '29/08/15 22:45:09'),
(11, 1, 'aa', 'aa', 'aa', '29/08/15 22:47:00'),
(11, 2, 'aa', 'aa', 'aa', '29/08/15 22:47:10'),
(6, 1, 'aa', 'aa', '22', '29/08/15 22:47:21'),
(6, 2, 'aaa', '', 'aaa', '29/08/15 22:47:29'),
(12, 1, 'Steven Pump', '', 'This is just a test reply', '31/08/15 16:20:02'),
(0, 12, 'aa', '', 'aa', '31/08/15 16:26:02'),
(13, 1, '', '', '', '31/08/15 16:27:24'),
(12, 2, '', '', '', '31/08/15 17:17:14'),
(19, 1, 'aa', 'aa', 'aa', '31/08/15 18:08:40'),
(19, 2, '', 'asd', ' asd', '31/08/15 18:14:54'),
(19, 3, 'Darkmor', 'asd', ' asd', '31/08/15 18:16:05'),
(19, 4, 'Darkmor', '', ' ', '31/08/15 18:19:08'),
(19, 5, 'Darkmor', '', ' ', '31/08/15 18:19:11'),
(19, 6, 'Darkmor', '', ' ', '31/08/15 18:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `forum_question`
--

CREATE TABLE IF NOT EXISTS `forum_question` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `name` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL DEFAULT '',
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`) VALUES
(1, 'john', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
