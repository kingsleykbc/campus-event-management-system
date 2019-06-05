-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2018 at 04:54 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admins`
--

CREATE TABLE IF NOT EXISTS `t_admins` (
  `a_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `a_Firstname` varchar(30) NOT NULL,
  `a_Lastname` varchar(30) NOT NULL,
  `a_Password` varchar(30) NOT NULL,
  `a_Username` varchar(30) NOT NULL,
  `d_ID` int(11) NOT NULL,
  PRIMARY KEY (`a_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t_admins`
--

INSERT INTO `t_admins` (`a_ID`, `a_Firstname`, `a_Lastname`, `a_Password`, `a_Username`, `d_ID`) VALUES
(1, 'John', 'James', 'password', 'thechief', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_departments`
--

CREATE TABLE IF NOT EXISTS `t_departments` (
  `d_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `d_Name` varchar(30) NOT NULL,
  PRIMARY KEY (`d_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `t_departments`
--

INSERT INTO `t_departments` (`d_ID`, `d_Name`) VALUES
(1, 'Computer Science'),
(2, 'Economics'),
(3, 'Accounting'),
(4, 'Biochemistry'),
(5, 'Mass Communication'),
(6, 'Microbiology');

-- --------------------------------------------------------

--
-- Table structure for table `t_events`
--

CREATE TABLE IF NOT EXISTS `t_events` (
  `e_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `e_Title` varchar(30) NOT NULL,
  `e_Description` text NOT NULL,
  `e_Date` date NOT NULL,
  `e_Venue` varchar(50) NOT NULL,
  `e_HodApproved` int(1) NOT NULL,
  `e_AdminApproved` int(1) NOT NULL,
  `s_ID` int(10) NOT NULL,
  `d_ID` int(10) NOT NULL,
  PRIMARY KEY (`e_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `t_events`
--

INSERT INTO `t_events` (`e_ID`, `e_Title`, `e_Description`, `e_Date`, `e_Venue`, `e_HodApproved`, `e_AdminApproved`, `s_ID`, `d_ID`) VALUES
(1, 'BUCC exhibition', 'This is a description of the event', '2018-03-12', 'Bethel Activity Hall', 3, 3, 1, 1),
(32, 'The King ', 'This is a new ', '2018-03-29', 'Welch Activity Hall', 2, 2, 15, 5),
(33, 'James Covak', 'dffdfdffdffd', '2018-03-08', 'Bethel Activity Hall', 2, 2, 15, 5),
(34, 'EVENT STUFF', 'KJ HJ NKUH HU  H HUNUUUNUH UY ', '2018-04-16', 'Royal Activity Hall', 3, 1, 1, 1),
(35, 'dfdffdff', 'dfdffddf', '2018-04-02', 'Royal Activity Hall', 2, 2, 16, 3),
(36, 'dffdfdfdf', 'ffdfdfd', '2018-04-02', 'Bethel Activity Hall', 2, 2, 17, 2),
(37, 'Bethel Game Night', 'This is a Fun eVENT....', '2018-03-13', 'Bethel Activity Hall', 1, 1, 1, 1),
(38, 'FDJKFDFJDDF', 'DUBFDBFDIUFD', '2018-04-13', 'Stadium', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_hods`
--

CREATE TABLE IF NOT EXISTS `t_hods` (
  `h_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `h_Firstname` varchar(30) NOT NULL,
  `h_Lastname` varchar(30) NOT NULL,
  `h_Username` varchar(30) NOT NULL,
  `h_Password` varchar(30) NOT NULL,
  `d_ID` int(10) NOT NULL,
  PRIMARY KEY (`h_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_hods`
--

INSERT INTO `t_hods` (`h_ID`, `h_Firstname`, `h_Lastname`, `h_Username`, `h_Password`, `d_ID`) VALUES
(1, 'James', 'Gosling', 'bat@man.com', 'batman', 1),
(2, 'Awodire', 'Tosin', 'awodire@tosin.com', 'awodiretosin', 5);

-- --------------------------------------------------------

--
-- Table structure for table `t_students`
--

CREATE TABLE IF NOT EXISTS `t_students` (
  `s_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `s_Firstname` varchar(30) NOT NULL,
  `s_Lastname` varchar(30) NOT NULL,
  `s_Matric` varchar(7) NOT NULL,
  `d_ID` int(10) NOT NULL,
  PRIMARY KEY (`s_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `t_students`
--

INSERT INTO `t_students` (`s_ID`, `s_Firstname`, `s_Lastname`, `s_Matric`, `d_ID`) VALUES
(1, 'Kingsley', 'Anyabuike', '15/2067', 1),
(15, 'Don', 'Lemmon', '45/5345', 5),
(16, 'fdffdfd', 'dfdf', '', 3),
(17, 'dfffd', '', '', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
