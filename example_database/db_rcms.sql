-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2012 at 01:40 PM
-- Server version: 5.1.54
-- PHP Version: 5.3.5-1ubuntu7.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_rcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_cpu_temp`
--

CREATE TABLE IF NOT EXISTS `db_cpu_temp` (
  `UserID` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `IpDev` varchar(15) NOT NULL,
  `num` int(1) NOT NULL,
  `ut` int(3) NOT NULL,
  PRIMARY KEY (`UserID`,`IpDev`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `db_cpu_temp`
--

INSERT INTO `db_cpu_temp` (`UserID`, `IpDev`, `num`, `ut`) VALUES
(0001, '192.168.33.129', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `db_device`
--

CREATE TABLE IF NOT EXISTS `db_device` (
  `UserID` int(4) unsigned zerofill NOT NULL,
  `IpDev` varchar(15) NOT NULL,
  `ReadCom` varchar(20) NOT NULL,
  `WriteCom` varchar(20) NOT NULL,
  `SnmpVer` enum('1','2c','3') NOT NULL DEFAULT '2c',
  `Web` varchar(50) DEFAULT NULL,
  `TypeDev` varchar(50) DEFAULT NULL,
  `Userssh` varchar(20) NOT NULL,
  `Passssh` varchar(20) NOT NULL,
  `Status` varchar(1) NOT NULL,
  PRIMARY KEY (`UserID`,`IpDev`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_device`
--

INSERT INTO `db_device` (`UserID`, `IpDev`, `ReadCom`, `WriteCom`, `SnmpVer`, `Web`, `TypeDev`, `Userssh`, `Passssh`, `Status`) VALUES
(0002, 's', '', '', '1', '', 'Router', '', '', 'F'),
(0002, 'a', 'a', 'a', '1', 'a', 'Router', '', '', 'F'),
(0001, '192.168.33.129', 'public', 'private', '2c', 'http://www.1q2w3e4r.com', 'Router', 'admin', '1234', 'T'),
(0001, '192.168.33.130', 'F', 'a', '1', '192.168.33.130', 'Switch', 'a', 'a', 'F'),
(0001, '192.168.33.222', 'F', 'a', '1', '192.168.33.222', 'Switch', '', '', 'F'),
(0002, '192.168.33.129', 'public', 'private', '2c', '', 'Router', 'admin', '1234', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE IF NOT EXISTS `db_user` (
  `UserID` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Status` enum('ADMIN','USER') NOT NULL DEFAULT 'USER',
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`UserID`, `Username`, `Password`, `Status`) VALUES
(0001, 'admin', 'admin', 'ADMIN'),
(0002, 'user', 'user', 'USER'),
(0004, 'a', 'a', 'USER'),
(0003, 'test', 'test', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `db_userdata`
--

CREATE TABLE IF NOT EXISTS `db_userdata` (
  `UserID` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Department` varchar(200) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `db_userdata`
--

INSERT INTO `db_userdata` (`UserID`, `Name`, `Email`, `Phone`, `Mobile`, `Department`, `Description`) VALUES
(0001, 'ADMIN TEST', 'admin@test.com', '081-1111111', '034-444444', 'Department of Engineering', 'Admin user test'),
(0002, 'USER TEST', 'user@test.com', '082-2222222', '032-444444', 'Department of Engineering', 'User user test'),
(0003, 'test', '', '', '', '', ''),
(0004, 'a', 'a', 'a', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `db_userupdate`
--

CREATE TABLE IF NOT EXISTS `db_userupdate` (
  `UserID` int(4) unsigned zerofill NOT NULL,
  `IpDevice` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Data_update` varchar(300) NOT NULL,
  PRIMARY KEY (`UserID`,`IpDevice`,`Date`,`Time`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_userupdate`
--

INSERT INTO `db_userupdate` (`UserID`, `IpDevice`, `Date`, `Time`, `Data_update`) VALUES
(0001, '192.168.33.129', '2012-01-22', '01:42:06', 'contact : aaaa'),
(0001, '192.168.33.129', '2012-01-22', '02:15:55', 'hostname : C'),
(0001, '192.168.33.129', '2012-01-22', '01:48:48', 'ifstatus 1 : 2'),
(0001, '192.168.33.129', '2012-01-22', '01:50:24', 'hostname : A'),
(0001, '192.168.33.129', '2012-01-22', '21:33:08', 'hostname : AAA'),
(0001, '192.168.33.129', '2012-01-22', '21:33:10', 'hostname : AAA'),
(0001, '192.168.33.129', '2012-02-01', '17:50:46', 'contact : Thailand'),
(0001, '192.168.33.129', '2012-02-05', '11:00:59', 'ifstatus 1 : 2'),
(0001, '192.168.33.129', '2012-02-05', '11:00:51', 'ifstatus 1 : 1'),
(0001, '192.168.33.129', '2012-02-05', '12:05:44', 'ifstatus 1 : 1'),
(0001, '192.168.33.129', '2012-02-05', '12:05:49', 'ifstatus 1 : 2'),
(0001, '192.168.33.129', '2012-02-05', '13:21:01', 'contact : A'),
(0001, '192.168.33.129', '2012-02-06', '06:16:57', 'hostname : aaaa'),
(0001, '192.168.33.129', '2012-02-13', '00:19:01', 'hostname : AAAA'),
(0001, '192.168.33.129', '2012-03-11', '13:15:15', 'ifstatus 3 : 2'),
(0001, '192.168.33.129', '2012-03-11', '13:18:07', 'ifstatus 3 : 1');
