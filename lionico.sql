-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 10:52 AM
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
  `date` datetime DEFAULT NULL,
  `services` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cbarber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `firstname`, `lastname`, `email`, `contact_number`, `address`, `date`, `services`, `created_at`, `updated_at`, `cbarber`) VALUES
(18, 'Hannah', 'sadasd', 'waromarvin06@lionico.ph', '2222222222', 'Toriven Drive', '2022-12-17 08:45:00', 'massage', '2022-12-10 09:42:38', '2022-12-10 09:42:38', 'Robin');

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
(3, 'Christian', 'Gagu', 'waromarvin06@lionico.ph', '92612337422', 'tetuan', '7', 'Active Employee', '2022-12-09 14:34:52', '2022-12-09 14:34:52'),
(4, 'Marvin', 'waro', 'marvin@lionico.php', '09362241046', 'Pasonanca', '5', 'Active Employee', '2022-12-10 02:35:54', '2022-12-10 02:35:54'),
(5, 'Robin', 'Gagu', 'robs@lionico.php', '09261337422', 'Toriven', '7', 'Active Employee', '2022-12-10 02:36:20', '2022-12-10 02:36:20');

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
(4, 'Christian', 'awit', 'customer', 'jp', 'jp', 'waromarvin06@lionico.ph');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mbarber`
--
ALTER TABLE `mbarber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
