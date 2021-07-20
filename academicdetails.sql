-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 05:01 PM
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
-- Database: `tnp`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicdetails`
--

CREATE TABLE `academicdetails` (
  `ScholarID` int(10) NOT NULL,
  `X` varchar(10) NOT NULL,
  `XProof` blob NOT NULL,
  `XII` varchar(30) NOT NULL,
  `XIIProof` blob NOT NULL,
  `Semester1` varchar(30) NOT NULL,
  `Sem1Proof` blob NOT NULL,
  `Semester2` varchar(10) NOT NULL,
  `Sem2Proof` blob NOT NULL,
  `Semester3` varchar(30) NOT NULL,
  `Sem3Proof` blob NOT NULL,
  `Semester4` varchar(30) NOT NULL,
  `Sem4Proof` blob NOT NULL,
  `Semester5` varchar(10) NOT NULL,
  `Sem5Proof` blob NOT NULL,
  `Semester6` varchar(10) NOT NULL,
  `Sem6Proof` blob NOT NULL,
  `Semester7` varchar(10) NOT NULL,
  `Sem7Proof` blob NOT NULL,
  `Semester8` varchar(10) NOT NULL,
  `Sem8Proof` blob NOT NULL,
  `Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academicdetails`
--

INSERT INTO `academicdetails` (`ScholarID`, `X`, `XProof`, `XII`, `XIIProof`, `Semester1`, `Sem1Proof`, `Semester2`, `Sem2Proof`, `Semester3`, `Sem3Proof`, `Semester4`, `Sem4Proof`, `Semester5`, `Sem5Proof`, `Semester6`, `Sem6Proof`, `Semester7`, `Sem7Proof`, `Semester8`, `Sem8Proof`, `Status`) VALUES
(1815003, '95', 0x706172692e6a7067, '92.4', 0x706172692e6a7067, '8.26', 0x706172692e6a7067, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
