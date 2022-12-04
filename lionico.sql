-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 05:29 PM
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
-- Database: `lionico`
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
  `contact_number` varchar(100) DEFAULT NULL,
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
(3, 'Marvin', 'Waro', 'waromarvin06@lionico.ph', '0999999999', 'Pasonanca', '2022-12-28', 'Active Employee', '2022-12-04 02:25:42', '2022-12-04 02:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `mbarber`
--

CREATE TABLE `mbarber` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `chair_assigned` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mbarber`
--

INSERT INTO `mbarber` (`id`, `firstname`, `lastname`, `email`, `contact_number`, `address`, `chair_assigned`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Robin', 'Almorfi', 'robin@lionico.ph', '2222222222', 'tetuan', '', 'Active Employee', '2022-11-30 18:17:25', '2022-12-04 02:26:45');

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

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`user_id`, `firstname`, `lastname`, `type`, `username`, `password`, `email`) VALUES
(1, 'Admin', '1', 'admin', 'admin', 'admin', 'admin@lionico.ph'),
(2, 'Marvin', 'Waro', 'customer', 'marvin', 'marvin', 'marvin@lionico.ph'),
(3, 'Robin', 'Almorfi', 'customer', 'robin', 'robin', 'robin@lionico.ph'),
(4, 'Christian', 'awit', 'customer', 'jp', 'jp', 'waromarvin06@lionico.ph'),
(5, 'hannah', 'waro', 'customer', 'erza', 'erza', 'hana@lionico.ph'),
(8, 'jes', 'amarante', 'Customer', 'je', 'je', 'jes@lionico.ph'),
(9, 'pudge', 'invoker', 'customer', 'pudge', 'pudge', 'pudge@lionico.ph'),
(10, 'riki', 'maru', 'customer', 'riki', 'riki', 'waromarvin06@lionico.ph'),
(11, 'hannah', 'amarante', 'customer', 'root', 'root', 'waromarvin06@lionico.ph');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mbarber`
--
ALTER TABLE `mbarber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `program_code` (`code`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mbarber`
--
ALTER TABLE `mbarber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
