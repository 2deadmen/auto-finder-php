-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 06:39 AM
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
-- Database: `auto_booking`
--
CREATE DATABASE IF NOT EXISTS `auto_booking` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `auto_booking`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(5) NOT NULL,
  `customer_name` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `gender`, `phone_number`, `email_id`, `password`) VALUES
(1, 'rohan shetti', 'male', 5343466, 'rohanrshetti23632', '2589fd746996e1897b19f2c3f48ce143'),
(2, 'rohan shetti', 'male', 2147483647, 'rohanshetti@3632', '67095d6fb2b261bd601ff236352b1ba0'),
(3, 'rohan shetti', 'male', 366556835, 'rohanrshetti23632', '67095d6fb2b261bd601ff236352b1ba0'),
(4, 'rohan shetti', 'male', 366556835, 'rohanrshetti23632', '67095d6fb2b261bd601ff236352b1ba0'),
(5, 'rohan shetti', 'male', 2147483647, 'kartikhegde@123', '1bbd886460827015e5d605ed44252251'),
(6, 'rohan shetti', 'male', 1234567, 'rohanshetti@gmailcom', '5cb62a80482f33b68fa708b6e74ca5f4'),
(7, 'chintu ', 'male', 2147483647, 'test@gmail.com', '1bbd886460827015e5d605ed44252251'),
(8, 'prajwal', 'male', 2147483647, 'prajwalsuryavanshi@gmail.com', '490f991188a37907656ccc18743df6f0'),
(9, 'pranav', 'male', 2147483647, 'pranavpatil@gmail.com', '9430a4d71670cd472f31cbab836fe44c'),
(10, 'manoj', 'male', 2147483647, 'manoj@1234', '39624e83a65cabfb6368f56b2e2b5fc2'),
(11, 'prajwal s', 'male', 2147483647, 'prajwals@gmail.com', '4203a0ea48fd93a1da8b8032aad11daa'),
(12, 'rohan ', 'male', 2147483647, 'rohan@1234', 'e940817e2198e8f1b38de30d804f08be'),
(13, 'rohan rs', 'male', 1111111111, 'rohanrs@gmail.com', 'b38b9bfae33d904938ba053684dff997');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `destination_name` varchar(30) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `longitude` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`destination_name`, `latitude`, `longitude`) VALUES
('vidyagiri', '15.4425', '75.0182'),
('gandhinagar', '15.4344', '75.0177'),
('tollnaka', '15.4471', '75.0121'),
('NTTF', '12.9652', '79.0336'),
('hosayellapur', '15.4563', '75.0178'),
('court circle', '15.4549', '75.0072'),
('jubliee circle', '15.460252', '75.010284'),
('yalakki shettar colony', '15.4400', '75.0290'),
('maratha colony', '15.4629', '75.0100'),
('saptapur', '15.4486', '74.9881'),
('malamaddi', '15.451', '75.003');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(5) NOT NULL,
  `driver_name` varchar(25) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email_id` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `station_id` int(5) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'idle',
  `acnt` varchar(20) NOT NULL DEFAULT 'active',
  `reason` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_name`, `phone_number`, `email_id`, `password`, `station_id`, `status`, `acnt`, `reason`) VALUES
(31, 'exp', '2222222222', 'fghjk,.d', 'fgh.', 1, 'idle', 'active', ''),
(33, 'dfg', 'sdfg', 'eszrdhxgjhj', 'zvsdgs', 2, 'idle', 'active', ''),
(35, 'test', '2222222222', 'test@gmail.com', '1bbd886460827015e5d605ed44252251', 3, 'idle', 'dead', 'for voila');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(100) NOT NULL,
  `customer_id` int(25) NOT NULL,
  `review` varchar(200) NOT NULL,
  `ratings` int(5) NOT NULL,
  `driver_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `customer_id`, `review`, `ratings`, `driver_id`) VALUES
(1, 0, 'first comment\r\n', 4, 16),
(2, 7, 'efA', 3, 16),
(3, 7, 'done', 5, 15),
(4, 7, 'he is blind', 5, 14),
(5, 7, 'sdfs', 5, 26);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `station_id` varchar(5) NOT NULL,
  `station_name` varchar(25) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `longitude` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`station_id`, `station_name`, `latitude`, `longitude`) VALUES
('1', 'vidyagiri', '15.4425', '75.0182'),
('2', 'gandhinagar', '15.4344', ' 75.0177'),
('3', 'tollnaka', '15.4471', '75.0121'),
('4', 'NTTF', '12.9652', '79.0336'),
('5', 'hosayellapur', '15.4563', '75.0178'),
('6', 'court circle', '15.4549', '75.0072'),
('7', 'jubilee circle', '15.460252', '75.010284');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`station_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
