-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2020 at 11:03 AM
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
create database tnp;

-- --------------------------------------------------------

--
-- Table structure for table `academicdetails`
--

CREATE TABLE `academicdetails` (
  `ScholarID` int(10) NOT NULL,
  `X` float NOT NULL,
  `XProof` blob NOT NULL,
  `XII` float NOT NULL,
  `XIIProof` blob NOT NULL,
  `Semester1` float NOT NULL,
  `Sem1Proof` blob NOT NULL,
  `Semester2` float NOT NULL,
  `Sem2Proof` blob NOT NULL,
  `Semester3` float NOT NULL,
  `Sem3Proof` blob NOT NULL,
  `Semester4` float NOT NULL,
  `Sem4Proof` blob NOT NULL,
  `Semester5` float NOT NULL,
  `Sem5Proof` blob NOT NULL,
  `Semester6` float NOT NULL,
  `Sem6Proof` blob NOT NULL,
  `Semester7` float NOT NULL,
  `Sem7Proof` blob NOT NULL,
  `Semester8` float NOT NULL,
  `Sem8Proof` blob NOT NULL,
  `CPI` float NOT NULL,
  `Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academicdetails`
--

INSERT INTO `academicdetails` (`ScholarID`, `X`, `XProof`, `XII`, `XIIProof`, `Semester1`, `Sem1Proof`, `Semester2`, `Sem2Proof`, `Semester3`, `Sem3Proof`, `Semester4`, `Sem4Proof`, `Semester5`, `Sem5Proof`, `Semester6`, `Sem6Proof`, `Semester7`, `Sem7Proof`, `Semester8`, `Sem8Proof`, `CPI`, `Status`) VALUES
(1815003, 95, 0x41636164656d696344657461696c732f436c617373585f313831353030332e706466, 92.4, 0x41636164656d696344657461696c732f436c6173735849495f313831353030332e706466, 8.26, 0x41636164656d696344657461696c732f53656d315f313831353030332e706466, 8.11, 0x41636164656d696344657461696c732f53656d325f313831353030332e706466, 8.15, 0x41636164656d696344657461696c732f53656d335f313831353030332e706466, 8.25, 0x41636164656d696344657461696c732f53656d345f313831353030332e706466, 8.7, 0x41636164656d696344657461696c732f53656d355f313831353030332e706466, 0, '', 0, 0x41636164656d696344657461696c732f53656d375f313831353030332e706466, 0, '', 8.17, 1),
(1615003, 95, 0x41636164656d696344657461696c732f436c61737358313631353030332e706466, 95, 0x41636164656d696344657461696c732f436c6173735849495f313631353030332e706466, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `brancheligibility`
--

CREATE TABLE `brancheligibility` (
  `ID` int(10) NOT NULL,
  `CSE` int(10) NOT NULL,
  `ECE` int(10) NOT NULL,
  `EE` int(10) NOT NULL,
  `ME` int(10) NOT NULL,
  `CE` int(10) NOT NULL,
  `EIE` int(11) NOT NULL,
  `Others` int(11) NOT NULL,
  `MarksCriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brancheligibility`
--

INSERT INTO `brancheligibility` (`ID`, `CSE`, `ECE`, `EE`, `ME`, `CE`, `EIE`, `Others`, `MarksCriteria`) VALUES
(1, 1, 1, 1, 0, 0, 0, 0, 1),
(1122, 1, 1, 0, 0, 0, 0, 1, 0),
(2, 1, 1, 1, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `driveresponses`
--

CREATE TABLE `driveresponses` (
  `DriveID` int(10) NOT NULL,
  `ScholarID` int(10) NOT NULL,
  `Name` text NOT NULL,
  `DriveDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driveresponses`
--

INSERT INTO `driveresponses` (`DriveID`, `ScholarID`, `Name`, `DriveDate`) VALUES
(1122, 1615003, 'Example', '2020-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `driveschedule`
--

CREATE TABLE `driveschedule` (
  `ID` int(10) NOT NULL,
  `CompanyName` varchar(30) NOT NULL,
  `DriveDate` date NOT NULL,
  `Package` varchar(10) NOT NULL,
  `Category` int(5) NOT NULL,
  `Description` text NOT NULL,
  `Type` int(5) NOT NULL,
  `BTechEligibility` int(5) NOT NULL,
  `MTechEligibility` int(5) NOT NULL,
  `MBAEligibility` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driveschedule`
--

INSERT INTO `driveschedule` (`ID`, `CompanyName`, `DriveDate`, `Package`, `Category`, `Description`, `Type`, `BTechEligibility`, `MTechEligibility`, `MBAEligibility`) VALUES
(1, '12345', '2020-01-30', '11111112', 0, '123a', 0, 1, 0, 1),
(1122, 'Swiggy', '2020-01-16', '2500000', 0, 'Web Developer', 0, 1, 1, 0),
(2, 'not specific', '2020-01-15', '12345', 0, 'sadasfd', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `internshipdetails`
--

CREATE TABLE `internshipdetails` (
  `ScholarID` int(20) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `Duration` int(5) NOT NULL,
  `Status` int(1) NOT NULL,
  `Certificate` tinyblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `internshipdetails`
--

INSERT INTO `internshipdetails` (`ScholarID`, `CompanyName`, `Duration`, `Status`, `Certificate`) VALUES
(1815003, 'Swiggy', 2, 1, 0x496e7465726e4365727469666963617465732f696e7465726e313831353030335f312e706466),
(1815003, 'SAAD', 1, 1, 0x496e7465726e4365727469666963617465732f696e7465726e313831353030335f322e706466);

-- --------------------------------------------------------

--
-- Table structure for table `minimummark`
--

CREATE TABLE `minimummark` (
  `ID` int(10) NOT NULL,
  `X` float NOT NULL,
  `XII` float NOT NULL,
  `CPI` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `minimummark`
--

INSERT INTO `minimummark` (`ID`, `X`, `XII`, `CPI`) VALUES
(1, 95, 92.4, 7.52),
(1122, 0, 0, 0),
(2, 60, 60, 7.5);

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `ScholarID` int(10) NOT NULL,
  `Resume1` blob NOT NULL,
  `Resume2` blob NOT NULL,
  `Resume3` blob NOT NULL,
  `Resume4` blob NOT NULL,
  `Resume5` blob NOT NULL,
  `DefaultResume` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`ScholarID`, `Resume1`, `Resume2`, `Resume3`, `Resume4`, `Resume5`, `DefaultResume`) VALUES
(1815004, 0x526573756d65732f726573756d65315f313831353030342e706466, '', '', '', '', 0x526573756d65732f726573756d65315f313831353030342e706466),
(1715003, 0x526573756d65732f726573756d65315f313731353030332e706466, '', '', '', '', 0x526573756d65732f726573756d65315f313731353030332e706466),
(1615003, 0x526573756d65732f726573756d65315f313631353030332e706466, 0x526573756d65732f726573756d65325f313631353030332e706466, '', '', '', 0x526573756d65732f726573756d65325f313631353030332e706466);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ScholarID` text NOT NULL,
  `Name` text NOT NULL,
  `Degree` varchar(30) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `EmailID` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `FatherName` text NOT NULL,
  `MotherName` text NOT NULL,
  `PermanentAddress` varchar(150) NOT NULL,
  `CurrentAddress` varchar(150) NOT NULL,
  `Department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ScholarID`, `Name`, `Degree`, `PhoneNumber`, `EmailID`, `DOB`, `FatherName`, `MotherName`, `PermanentAddress`, `CurrentAddress`, `Department`) VALUES
('1815003', 'Manash Pratim Das', 'B. Tech', '6000159932', 'manash90852@gmail.com', '2000-03-17', 'Manoranjan Das', 'Rekha Das', 'NARAKASUR KAHILIPARA', 'NIT Silchar, Hostel 9A ', 'Computer Science And Engineering '),
('1715003', 'sad', 'B. Tech', '1234213', 'aaa@gmail.com', '2020-01-23', 'asfdds', 'asd', 'asd', 'asd', 'Computer Science And Engineering '),
('1615003', 'Example', 'B. Tech', '1231231231', 'example@gmail.com', '1995-12-31', 'Example_dad', 'Example_mom', 'Example_address', 'Example_address', 'Computer Science And Engineering ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
