-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2022 at 02:42 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblAdmin`
--

CREATE TABLE `tblAdmin` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblAdmin`
--

INSERT INTO `tblAdmin` (`ID`, `Name`, `Contact`, `Email`, `Password`) VALUES
(1, 'Admin', '9861780482', 'admin@gmail.com', '41ed44e3038dbeee7d2ffaa7f51d8a4b');

-- --------------------------------------------------------

--
-- Table structure for table `tblStudent`
--

CREATE TABLE `tblStudent` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Contact` varchar(10) DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Attendance` varchar(7) DEFAULT 'Absent',
  `Absent` int(11) DEFAULT 0,
  `Present` int(11) DEFAULT 0,
  `Ldate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblStudent`
--

INSERT INTO `tblStudent` (`ID`, `Name`, `Contact`, `Email`, `Password`, `Attendance`, `Absent`, `Present`, `Ldate`) VALUES
(191301, 'Aashan Bhattarai', '9819449662', 'aashan.191301@ncit.edu.np', '32e095bb9ea9002f7a0d218651a506af', 'Absent', 4, 0, '2022-11-04 02:50:18'),
(191303, 'Abhilekh Gautam', '9867399695', 'abhilekh.191303@ncit.edu.np', 'f732189f32e3ebed11e34757b6ed7cda', 'Absent', 4, 0, '2022-11-04 02:50:18'),
(191310, 'Anuj Rijal', '9841402520', 'anuj.191310@ncit.edu.np', 'c482e3014f9b268c6d953a0fb0df6cc6', 'Absent', 4, 0, '2022-11-04 02:50:18'),
(191311, 'Arbin Gurung', '9825172683', 'arbin.191311@ncit.edu.np', 'f2b738460ea01ea986fa46d4ee010d9e', 'Absent', 4, 0, '2022-11-04 02:50:18'),
(191315, 'Bibhu Gautam', '9843162739', 'bibhu.191315@ncit.edu.np', 'a78aa2a72d6339bd8ab0a1c57e041457', 'Absent', 7, 3, '2022-11-04 02:50:18'),
(191317, 'Bishal Lamichhane', '9849079794', 'bishal.191317@ncit.edu.np', '1adb27fabdfee91e29a94e3fb02e08bc', 'Absent', 4, 0, '2022-11-04 02:50:18'),
(191320, 'Bishesh Thapa', '9813168104', 'bishesh.191320@ncit.edu.np', '1cd4f9fb73ff75ed23a569eb92ab058b', 'Present', 7, 2, '2022-11-04 13:23:40'),
(191325, 'Ishaan Sapkota', '9860479562', 'ishaan.191325@ncit.edu.np', '26871602cbbb0cffdb4ed5cdecf38b80', 'Absent', 4, 0, '2022-11-04 02:50:18'),
(191336, 'Sagar Sapkota', '9861780482', 'sagar.191336@ncit.edu.np', '41ed44e3038dbeee7d2ffaa7f51d8a4b', 'Absent', 1, 9, '2022-11-04 03:00:22'),
(191339, 'Saurav Ghimire', '9865383226', 'saurav.191339@ncit.edu.np', '8cf674180ea201eb14b12486eaef9f28', 'Absent', 7, 4, '2022-11-04 02:50:18'),
(191342, 'Sudip Poudel', '9868207566', 'sudip.191342@ncit.edu.np', '550bbf0991fd493d1afaa2bdd246af6a', 'Absent', 4, 0, '2022-11-04 02:50:18'),
(191345, 'Suyog Parajuli', '9849849322', 'suyog.191345@ncit.edu.np', '5c9e01573cef0ba08498875b98b02029', 'Absent', 8, 2, '2022-11-04 02:50:18'),
(191346, 'Unique Pradhan', '9808991820', 'unique.191346@ncit.edu.np', '673eb027e9c056f57140322807351dd5', 'Absent', 4, 0, '2022-11-04 02:50:18'),
(191351, 'Pawan Neupane', '9861639772', 'pawan.191351@ncit.edu.np', '40eb95572d967a62183292ef5f78bf9a', 'Absent', 8, 2, '2022-11-04 02:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `tblTeacher`
--

CREATE TABLE `tblTeacher` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblTeacher`
--

INSERT INTO `tblTeacher` (`ID`, `Name`, `Contact`, `Email`, `Password`) VALUES
(213, 'Teacher', '1111111111', 'teacher@gmail.com', '8d788385431273d11e8b43bb78f3aa41'),
(219, 'TeacherB', '2222222222', 'teacher2@gmail.com', 'ccffb0bb993eeb79059b31e1611ec353');

-- --------------------------------------------------------

--
-- Table structure for table `_Date`
--

CREATE TABLE `_Date` (
  `_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_Date`
--

INSERT INTO `_Date` (`_date`) VALUES
('2022-11-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblAdmin`
--
ALTER TABLE `tblAdmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblStudent`
--
ALTER TABLE `tblStudent`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblTeacher`
--
ALTER TABLE `tblTeacher`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
