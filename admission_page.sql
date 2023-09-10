-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2023 at 06:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission_page`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(10) NOT NULL,
  `std_pay_id` int(10) DEFAULT NULL,
  `card_name` varchar(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `card_number` varchar(25) NOT NULL,
  `is_processed` varchar(10) NOT NULL DEFAULT 'False'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `std_pay_id`, `card_name`, `payment_type`, `card_number`, `is_processed`) VALUES
(8, 13, 'test', 'test2', '1234567890', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `std_id` int(10) NOT NULL,
  `std_name` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `pronouns` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `std_address` varchar(200) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `last_edu` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `center` varchar(100) NOT NULL,
  `centerid` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `is_admin` varchar(10) NOT NULL DEFAULT 'False',
  `is_accepted` varchar(10) NOT NULL DEFAULT 'False'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`std_id`, `std_name`, `age`, `gender`, `pronouns`, `dob`, `std_address`, `father_name`, `mother_name`, `last_edu`, `course`, `center`, `centerid`, `email`, `pwd`, `is_admin`, `is_accepted`) VALUES
(11, 'admin', 0, 'admin', '', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 1, 'admin@admin.com', 'admin', 'True', 'False'),
(13, 'test', 10, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 1, 'test@test.com', 'test', 'True', 'True');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `std_pay_id` (`std_pay_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `std_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`std_pay_id`) REFERENCES `student_info` (`std_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
