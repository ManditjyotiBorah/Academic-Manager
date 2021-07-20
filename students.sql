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
CREATE DATABASE tnp;

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
('1815003', 'Manash Pratim Das', 'B. Tech', '6000159932', 'manash90852@gmail.com', '2000-03-17', 'Manoranjan Das', 'Rekha Das', 'NARAKASUR KAHILIPARA', 'NIT Silchar, Hostel 9A ', 'Computer Science And Engineering ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


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
(1815004, 'Swiggy', 2, 1, 0x3f504e470d0a1a0a0000000d494844520000013f0000013908020000003f3f083f0000000173524742003f3f1c3f0000000467414d4100003f3f0b3f610500000009704859730000127400001274013f661f7800000021744558744372656174696f6e20),
(1815005, 'Swiggy', 2, 0, 0x89504e470d0a1a0a0000000d49484452000001a1000001390802000000b6ff08bb000000017352474200aece1ce90000000467414d410000b18f0bfc61050000000970485973000012740000127401de661f7800000021744558744372656174696f6e2054696d6500323031393a30393a32372031343a33363a353581e8d6c40000ff7849444154785eecfd69932c4996a687f9be46c45d72a9aaee9e6e600633031224010e28030c07ab0841213f40f813c83f40110abe52841cfe450a49c1368daeaecae52eb1fa6a6ee6ee7c9e57cde3c6cdbc3732b3bb66d05188131ae66a6abaeb39af9ea3a666d63d1e8f9d67fa0c7d7ffd3f0c47a3415fea1c8fbd),
(1815003, 'Swiggy', 3, 0, 0x706172692e6a7067);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


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
