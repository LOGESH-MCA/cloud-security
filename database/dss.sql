-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2013 at 03:13 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dss`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `username` varchar(20) NOT NULL,
  `userpass` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`username`, `userpass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auditor`
--

CREATE TABLE IF NOT EXISTS `tbl_auditor` (
  `username` varchar(20) NOT NULL,
  `userpass` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_auditor`
--

INSERT INTO `tbl_auditor` (`username`, `userpass`) VALUES
('auditor', 'auditor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE IF NOT EXISTS `tbl_files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `secret_code` varchar(100) NOT NULL,
  `auditor_request` varchar(20) NOT NULL,
  `audior_status` enum('yes','no','rejected') NOT NULL DEFAULT 'no',
  `admin_request` varchar(20) NOT NULL,
  `admin_status` enum('yes','no','rejected') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`file_id`, `user_id`, `file_name`, `secret_code`, `auditor_request`, `audior_status`, `admin_request`, `admin_status`) VALUES
(2, 1, 'upload/56722Doc1.doc', 'ccljHO6gJFTgGeO', 'closed', 'yes', 'closed', 'yes'),
(3, 1, 'upload/42615cash expenses.xlsx', 'mutL8UWdPrPANzd', 'closed', 'rejected', '', 'no'),
(4, 1, 'upload/93197enquiry.accdb', 'SgHrpYnSgGQ7KSb', '', 'no', '', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `emailid` varchar(250) NOT NULL,
  `phoneno` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `userpass` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `fullname`, `emailid`, `phoneno`, `username`, `userpass`) VALUES
(1, 'navaneethan', 'nav@gmail.com', 923439, 'nava', 'nava'),
(2, 'rajaram', 'raja@gmail.com', 329423942, 'raja', 'raja');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
