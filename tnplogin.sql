-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2020 at 11:02 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tnplogin`
--
CREATE DATABASE tnplogin;

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE `logindetails` (
  `Email` varchar(150) NOT NULL,
  `Username` varchar(150) NOT NULL,
  `Password` text NOT NULL,
  `Type` int(20) NOT NULL,
  `ID` int(20) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`Email`, `Username`, `Password`, `Type`, `ID`, `Name`) VALUES
('manash90852@gmail.com', 'manash007', 'manashmanash', 0, 1815003, 'Manash Pratim Das'),
('123manash007@gmail.com', 'manash123', 'manashmanash', 1, 0, 'Manash Das'),
('abcd123@gmail.com', 'manash12', 'manash', 2, 12345, 'Manash'),
('abcde123@gmail.com', 'manash1212', 'manash', 3, 12345, 'Manash'),
('aaa@gmail.com', 'abc123', 'abc123', 0, 1815004, 'Nabanita Bania'),
('asa@asf', 'aaa', 'aaa', 0, 0, ''),
('aaa', 'aaaa', 'aaa', 0, 1715003, 'sad'),
('example@gmail.com', 'example', 'example', 0, 1615003, 'Example');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
