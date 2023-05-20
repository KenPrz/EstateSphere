-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 08:42 PM
-- Server version: 8.0.32
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estatesphere`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admnID` int NOT NULL,
  `admnName` varchar(50) NOT NULL,
  `admnRole` varchar(20) NOT NULL,
  `admnDes` varchar(200) NOT NULL,
  `admnimg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admnID`, `admnName`, `admnRole`, `admnDes`, `admnimg`) VALUES
(1, 'Ken Perez', 'Full-Stack Developer', 'Responsible for the entire development cycle of our web application, including the design, development, testing, and maintenance.', 'assets/img/admnAvatar/avatarM2.png'),
(2, 'James Esparrago', 'Back-end Developer', 'Manages the data storage, application logic, and ensures the application runs smoothly.', 'assets/img/admnAvatar/avatarM1.png'),
(3, 'Nissa Binalla', 'Project Manager', 'Leads the team to complete the project on time, ensuring its success. ', 'assets/img/admnAvatar/avatarF1.jpg'),
(4, 'Jazel Besuenia', 'Database Developer', 'Responsible for designing, developing, and maintaining the database management system that supports the web app.', 'assets/img/admnAvatar/avatarF1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries_tbl`
--

CREATE TABLE `inquiries_tbl` (
  `inqID` int NOT NULL,
  `inqName` varchar(100) NOT NULL,
  `contnum` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `consern` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inquiries_tbl`
--

INSERT INTO `inquiries_tbl` (`inqID`, `inqName`, `contnum`, `email`, `consern`, `created_at`) VALUES
(1, 'James Esparrago', '09384756375', 'testtest@gmail.com', 'hello this is test input', '2023-05-18 18:24:55'),
(2, 'test', 'test', 'test', 'test', '2023-05-18 18:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `propertylisting_tbl`
--

CREATE TABLE `propertylisting_tbl` (
  `proplistID` int NOT NULL,
  `propOwnerLname` varchar(100) NOT NULL,
  `propOwnerFname` varchar(100) NOT NULL,
  `propOwnerCont` varchar(11) NOT NULL,
  `propOwnerEmail` varchar(30) NOT NULL,
  `propStatus` varchar(20) NOT NULL,
  `propType` varchar(20) NOT NULL,
  `propSellPrice` varchar(10) NOT NULL,
  `propMun` varchar(20) NOT NULL,
  `propBar` varchar(20) NOT NULL,
  `propZonPur` varchar(20) NOT NULL,
  `propMap` varchar(100) NOT NULL,
  `propLotArea` varchar(10) NOT NULL,
  `propFlrArea` varchar(10) NOT NULL,
  `noBed` varchar(50) NOT NULL,
  `propNoBat` varchar(10) NOT NULL,
  `propCarport` varchar(10) NOT NULL,
  `propOth` varchar(10) NOT NULL,
  `propFeatr` varchar(100) NOT NULL,
  `propIMGaddrs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `propertylisting_tbl`
--

INSERT INTO `propertylisting_tbl` (`proplistID`, `propOwnerLname`, `propOwnerFname`, `propOwnerCont`, `propOwnerEmail`, `propStatus`, `propType`, `propSellPrice`, `propMun`, `propBar`, `propZonPur`, `propMap`, `propLotArea`, `propFlrArea`, `noBed`, `propNoBat`, `propCarport`, `propOth`, `propFeatr`, `propIMGaddrs`) VALUES
(34, 'ttest', 'ttest', 'ttest', 'ttest', 'ttest', 'ttest', 'v', 'ttest', 'ttest', 'ttest', 'ttest', 'ttest', 'ttest', 'ttest', 'ttest', 'ttest', 'ttest', 'v', 'assets/img/properties/64647f672b4567.69713364.png'),
(35, 'test', 'test', 'test', 'test', '', '', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'assets/img/properties/6465cb55032ed5.40177925.png'),
(36, 'test', 'test', 'test', 'test', '', '', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'assets/img/properties/6465cbc738b565.82031380.png'),
(37, 'propStat', 'propStat', 'propStat', 'propStat', '2', '4', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'assets/img/properties/6465cc3425e4e8.54874397.png'),
(38, 'propStat', 'propStat', 'propStat', 'propStat', '2', '4', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'assets/img/properties/6465d2f2968043.68201976.png'),
(39, 'propStat', 'propStat', 'propStat', 'propStat', '2', '4', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'assets/img/properties/6465d307061aa1.39421632.png'),
(40, 'propStat', 'propStat', 'propStat', 'propStat', '2', '4', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'assets/img/properties/6465d30d37b016.28340918.png'),
(41, 'propStat', 'propStat', 'propStat', 'propStat', '2', '4', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'assets/img/properties/6465d324c51061.31267217.png'),
(42, 'propStat', 'propStat', 'propStat', 'propStat', '2', '4', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'assets/img/properties/6465d32db53a36.91638220.png'),
(43, 'propStat', 'propStat', 'propStat', 'propStat', '2', '4', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'assets/img/properties/6465d3369de695.31036411.png'),
(44, 'propStat', 'propStat', 'propStat', 'propStat', '2', '4', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'assets/img/properties/6465d361b05474.72999528.png'),
(45, 'propStat', 'propStat', 'propStat', 'propStat', '2', '4', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'assets/img/properties/6465d37131e545.31376010.png'),
(46, 'propStat', 'propStat', 'propStat', 'propStat', '2', '4', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'assets/img/properties/6465d38ce91f92.27932897.png'),
(47, 'propStat', 'propStat', 'propStat', 'propStat', '2', '4', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'assets/img/properties/6465d39f1a0184.01175765.png'),
(48, 'propStat', 'propStat', 'propStat', 'propStat', '2', '4', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'assets/img/properties/6465d3b92364f5.91410847.png'),
(49, 'propStat', 'propStat', 'propStat', 'propStat', '2', '4', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'propStat', 'assets/img/properties/6465d400deb977.73055754.png'),
(50, 'test', 'test', 'test', 'test', 'Available', '2', 'test', 'Polangui', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'assets/img/properties/6465d7ee2b22a7.36888091.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `firstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `usertype`) VALUES
(1, 'test', 'test', 'test', 'test', 'buyer'),
(2, 'test', 'test', 'esparragojames@gmail.com', 'test', 'buyer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admnID`);

--
-- Indexes for table `inquiries_tbl`
--
ALTER TABLE `inquiries_tbl`
  ADD PRIMARY KEY (`inqID`);

--
-- Indexes for table `propertylisting_tbl`
--
ALTER TABLE `propertylisting_tbl`
  ADD PRIMARY KEY (`proplistID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inquiries_tbl`
--
ALTER TABLE `inquiries_tbl`
  MODIFY `inqID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `propertylisting_tbl`
--
ALTER TABLE `propertylisting_tbl`
  MODIFY `proplistID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
