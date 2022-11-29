-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 02:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forecast`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` int(15) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `firstname`, `lastname`, `email`, `contact_number`, `address`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'gago', 'gaga', 'gaga@lionico.ph', 926133742, 'qwqw', '2022-11-30', 'Active', '2022-11-29 13:40:00', '2022-11-29 13:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `years` int(11) NOT NULL,
  `level` varchar(100) NOT NULL,
  `cet` double NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `code`, `description`, `years`, `level`, `cet`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BSCS', 'BS Computer Science', 4, 'Doctorate', 70, 'Offering', '2022-11-03 15:10:55', '2022-11-13 14:19:15'),
(2, 'BSCS-ST', 'BS Computer Science major in Software Technology', 4, 'Bachelor', 90, 'Phase-Out', '2022-11-03 15:17:36', '2022-11-13 23:07:49'),
(13, 'BSIT', 'BS Information Technology', 4, 'Bachelor', 70, 'Offering', '2022-11-03 15:24:14', '2022-11-13 23:07:16'),
(14, 'ACT', 'Associate in Computer Technology', 2, 'Associate', 55, 'Offering', '2022-11-13 13:26:06', '2022-11-13 23:06:10'),
(15, 'ACS', 'Associate in Computer Science', 2, 'Associate', 55, 'Phase-Out', '2022-11-13 14:20:18', '2022-11-13 23:06:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `program_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
