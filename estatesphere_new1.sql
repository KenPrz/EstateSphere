-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 04:34 PM
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
-- Database: `estatesphere_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE `developers` (
  `dev_id` int NOT NULL,
  `dev_name` varchar(100) NOT NULL,
  `dev_role` varchar(50) NOT NULL,
  `dev_description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dev_avatar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`dev_id`, `dev_name`, `dev_role`, `dev_description`, `dev_avatar`) VALUES
(1, 'Jazel Besuenia', 'Database Developer', 'Responsible for designing, developing, and maintaining the database management system that supports the web app.', 'assets/img/admnAvatar/avatarF1.jpg'),
(2, 'Nissa Anjelie Binalla', 'Project Manager', 'Leads the team to complete the project on time, ensuring its success. ', 'assets/img/admnAvatar/avatarF1.jpg'),
(3, 'James Esparrago', 'Back-end Developer', 'Manages the data storage, application logic, and ensures the application runs smoothly.', 'assets/img/admnAvatar/avatarM1.png'),
(4, 'Ken Perez', 'Full-Stack Developer', 'Responsible for the entire development cycle of our web application, including the design, development, testing, and maintenance.', 'assets/img/admnAvatar/avatarM2.png');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiry_id` int NOT NULL,
  `inquiry_sender` int DEFAULT NULL,
  `contact_number` bigint DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `concern` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int NOT NULL,
  `property_seller` int DEFAULT NULL,
  `property_name` varchar(255) DEFAULT NULL,
  `property_owner_fname` varchar(255) DEFAULT NULL,
  `property_owner_lname` varchar(255) DEFAULT NULL,
  `property_owner_cont` bigint DEFAULT NULL,
  `property_owner_email` varchar(255) DEFAULT NULL,
  `property_status` enum('sold','for sale') DEFAULT NULL,
  `property_type` varchar(255) DEFAULT NULL,
  `property_price` bigint DEFAULT NULL,
  `property_municipality` varchar(255) DEFAULT NULL,
  `property_baranggay` varchar(255) DEFAULT NULL,
  `property_zone_purok` varchar(255) DEFAULT NULL,
  `property_map` varchar(255) DEFAULT NULL,
  `property_lot_area` varchar(255) DEFAULT NULL,
  `property_flr_area` varchar(255) DEFAULT NULL,
  `property_img_addrs` varchar(255) DEFAULT NULL,
  `num_of_beds` int DEFAULT NULL,
  `num_of_baths` int DEFAULT NULL,
  `num_of_carports` int DEFAULT NULL,
  `prop_others` varchar(500) DEFAULT NULL,
  `prop_features` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'test', 'test', 'esparragojames@gmail.com', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `write_review`
--

CREATE TABLE `write_review` (
  `review_id` int NOT NULL,
  `rev_accuracy` varchar(10) NOT NULL,
  `rev_location` varchar(10) NOT NULL,
  `rev_communication` varchar(10) NOT NULL,
  `rev_checkin` varchar(10) NOT NULL,
  `rev_cleanliness` varchar(10) NOT NULL,
  `rev_value` varchar(10) NOT NULL,
  `date_visit` varchar(100) NOT NULL,
  `rev_withwho` varchar(10) NOT NULL,
  `review_text` varchar(500) NOT NULL,
  `rev_image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`dev_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiry_id`),
  ADD KEY `inquiry_sender` (`inquiry_sender`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `property_seller` (`property_seller`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `write_review`
--
ALTER TABLE `write_review`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `dev_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiry_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `write_review`
--
ALTER TABLE `write_review`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `inquiry_ibfk_1` FOREIGN KEY (`inquiry_sender`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`property_seller`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
