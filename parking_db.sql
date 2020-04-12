-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2020 at 11:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `status`, `date_created`, `date_updated`) VALUES
(4, 'baptism', '1', '2020-03-18 10:38:25', '2020-03-18 10:38:25'),
(5, 'wedding', '1', '2020-03-18 10:38:25', '2020-03-18 10:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`, `date_created`, `date_updated`) VALUES
(1, 'Super Administrator', 'a:16:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createEvent\";i:9;s:11:\"updateEvent\";i:10;s:9:\"viewEvent\";i:11;s:11:\"deleteEvent\";i:12;s:13:\"createParking\";i:13;s:13:\"updateParking\";i:14;s:11:\"viewParking\";i:15;s:13:\"deleteParking\";}', '2020-03-18 10:45:26', '2020-03-18 10:45:26'),
(14, 'parking attendant', 'a:3:{i:0;s:13:\"createParking\";i:1;s:13:\"updateParking\";i:2;s:11:\"viewParking\";}', '2020-03-18 10:45:26', '2020-03-18 10:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `parking_details`
--

CREATE TABLE `parking_details` (
  `id` int(11) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `vehicle_id` int(11) UNSIGNED NOT NULL,
  `time_out` timestamp NULL DEFAULT NULL,
  `total_amount` double NOT NULL DEFAULT 0,
  `paid_status` int(11) NOT NULL DEFAULT 0,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking_details`
--

INSERT INTO `parking_details` (`id`, `event_id`, `vehicle_id`, `time_out`, `total_amount`, `paid_status`, `date_created`, `date_updated`) VALUES
(8, 4, 1, '2020-03-17 16:00:00', 0, 0, '2020-03-18 10:41:28', '2020-03-23 12:50:17'),
(9, 4, 2, '2020-03-17 16:00:00', 0, 1, '2020-03-18 10:41:28', '2020-03-23 12:50:21'),
(10, 5, 2, '2020-03-17 16:00:00', 0, 0, '2020-03-23 12:29:37', '2020-03-23 13:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `gender`, `date_created`, `date_updated`) VALUES
(1, 'admin', '$2y$10$yfi5nUQGXUZtMdl27dWAyOd/jMOmATBpiUvJDmUu9hJ5Ro6BE5wsK', 'admin@gmail.com', 'Jonard', 'Siena', '12345678', 1, '2020-03-18 10:40:04', '2020-03-18 10:40:04'),
(7, 'attendant', '$2y$10$2JJdEiGEES61/y7uBTjPgu/4iCZGcd1Qs0/l5PIGmNSR7AeZVADgC', 'parkingAnttendant@gmail.com', 'John', 'smith', '555-3333', 1, '2020-03-18 10:40:04', '2020-03-18 10:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`, `date_created`, `date_updated`) VALUES
(1, 1, 1, '2020-03-18 10:39:29', '2020-03-18 10:39:29'),
(8, 7, 14, '2020-03-18 10:39:29', '2020-03-18 10:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_category`
--

CREATE TABLE `vehicle_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_category`
--

INSERT INTO `vehicle_category` (`id`, `name`, `date_created`, `date_updated`) VALUES
(1, 'Pay Parking', '2020-03-23 20:48:21', '2020-03-23 20:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE `vehicle_details` (
  `id` int(11) UNSIGNED NOT NULL,
  `plate_number` varchar(50) NOT NULL,
  `category` int(11) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`id`, `plate_number`, `category`, `status`, `date_created`, `date_updated`) VALUES
(1, 'AYX 387', 1, 0, '2020-03-18 11:00:01', '2020-03-23 12:48:01'),
(2, 'AYR 234', 1, 0, '2020-03-18 11:00:16', '2020-03-23 12:48:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_details`
--
ALTER TABLE `parking_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `vehicle_category`
--
ALTER TABLE `vehicle_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `parking_details`
--
ALTER TABLE `parking_details`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parking_details`
--
ALTER TABLE `parking_details`
  ADD CONSTRAINT `FK1_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2_vehicle_id` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `FK1_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2_group_id` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
