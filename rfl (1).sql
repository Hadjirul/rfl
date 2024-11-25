-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 05:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rfl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `created_at`, `name`, `picture`) VALUES
(1, 'admin@example.com', '$2y$10$rJH0Px7eU1oFIGDUvPmDtuROQt2b03/Tn3IxXGbKrTbP.1Ox5cWZK', '2024-10-30 05:46:10', '', NULL),
(2, 'admin2@example.com', '$2y$10$Jezqy3z3/Ps1EQILdAaaA.PGWQrTKBD2Gn3tVwqbJiGJbocMB0tw2', '2024-10-30 13:51:56', 'Maria', 'uploads/module_table_bottom.png');

-- --------------------------------------------------------

--
-- Table structure for table `appointmentdate`
--

CREATE TABLE `appointmentdate` (
  `date_id` int(11) NOT NULL,
  `available_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointmentdate`
--

INSERT INTO `appointmentdate` (`date_id`, `available_date`) VALUES
(15, '2024-02-26'),
(16, '2024-02-27'),
(17, '2024-02-28'),
(18, '2024-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `email` varchar(255) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `street_address_line_2` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `ocular_history` text DEFAULT NULL,
  `family_health_history` text DEFAULT NULL,
  `appointment_reason` text DEFAULT NULL,
  `doctor` varchar(255) DEFAULT NULL,
  `service` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` enum('pending','approved','completed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `birthdate`, `phone`, `gender`, `email`, `street_address`, `street_address_line_2`, `city`, `province`, `zip_code`, `ocular_history`, `family_health_history`, `appointment_reason`, `doctor`, `service`, `date`, `time`, `status`, `created_at`, `updated_at`) VALUES
(108, 2, 'Jopel', '', 'Enriquez', '0000-00-00', '09380263077', 'male', 'jopel@gmail.com', 'Santol Drive', '', 'Zamboanga City', 'Zamboanga Del Sur', '7000', '', '', '', '', '', '0000-00-00', '00:00:00', 'completed', '2024-11-25 16:04:42', '2024-11-25 16:04:56'),
(109, 2, 'Jopel', '', 'Enriquez', '0000-00-00', '09380263077', 'male', 'jopel@gmail.com', 'Santol Drive', '', 'Zamboanga City', 'Zamboanga Del Sur', '7000', '', '', '', '', '', '0000-00-00', '00:00:00', 'completed', '2024-11-25 16:12:35', '2024-11-25 16:12:48'),
(110, 2, 'Jopel', '', 'Enriquez', '0000-00-00', '09380263077', 'male', 'jopel@gmail.com', 'Santol Drive', '', 'Zamboanga City', 'Zamboanga Del Sur', '7000', '', '', '', '', '', '0000-00-00', '00:00:00', 'approved', '2024-11-25 16:16:45', '2024-11-25 16:19:04'),
(111, 2, 'Jopel', '', 'Enriquez', '0000-00-00', '09380263077', 'male', 'jopel@gmail.com', 'Santol Drive', '', 'Zamboanga City', 'Zamboanga Del Sur', '7000', '', '', '', '', '', '0000-00-00', '00:00:00', 'pending', '2024-11-25 16:18:54', '2024-11-25 16:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttime`
--

CREATE TABLE `appointmenttime` (
  `time_id` int(11) NOT NULL,
  `time_from` time(6) NOT NULL,
  `time_to` time(6) NOT NULL,
  `available_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointmenttime`
--

INSERT INTO `appointmenttime` (`time_id`, `time_from`, `time_to`, `available_date`) VALUES
(10, '10:00:00.000000', '10:30:00.000000', '2024-02-26'),
(11, '15:30:00.000000', '18:00:00.000000', '2024-02-26'),
(16, '12:00:00.000000', '01:00:00.000000', '2024-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(299) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `gender` varchar(299) NOT NULL,
  `address` varchar(299) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `firstname`, `middlename`, `lastname`, `birthdate`, `email`, `contact_number`, `gender`, `address`, `picture`, `description`, `password`, `created_at`, `update_at`) VALUES
(11, 'carlo', 'resaba', 'hadjirul', '0123-03-21', 'carlohadjirul@gmail.com', '21312312', 'Female', 'talon - talon', 'uploads/profile.jpg', 'nwixniniwnxiw', '111', '2024-03-03 09:17:43', '2024-03-10 04:19:45'),
(12, 'carlo', 'wqeqwe', 'wqeqwe', '0013-02-12', 'wqeqweqwe@gmail.com', '1231232', 'Male', 'wqeqwewe', '', '', 'qweqee', '2024-03-03 09:18:10', '2024-11-25 08:48:29'),
(13, 'carlo', 'resaba', 'wqew', '2024-03-04', 'wqeqwwq@gmail.com', '12321321', 'Female', 'wqeqwe', 'uploads/profile.jpg', 'wqeqw', 'wqwqeqwqwe', '2024-03-03 19:58:00', '2024-03-03 19:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `license_number` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_walkin`
--

CREATE TABLE `doctor_walkin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` int(100) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstname`, `middlename`, `lastname`, `birthdate`, `email`, `contact_number`, `gender`, `address`, `role`, `picture`, `created_at`, `updated_at`) VALUES
(336, 'wqeqw', 'wqeqw', 'wqeqwe', '0213-03-12', 'qweqweqww@gmail.com', 123213, 'Male', 'wqeqwe', 'wqeqwwe', NULL, '2024-03-03 09:19:01', '2024-03-03 09:19:01'),
(337, 'carlo', 'qweqwe', 'wqeqwe', '0202-03-12', '213211212@gmail.com', 123213, 'Male', 'weqwqwe', 'qweqwew', NULL, '2024-03-03 09:20:11', '2024-03-03 09:20:11');

-- --------------------------------------------------------

--
-- Table structure for table `findings`
--

CREATE TABLE `findings` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `history` text DEFAULT NULL,
  `findings` text DEFAULT NULL,
  `diagnostics` text DEFAULT NULL,
  `prescription` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `findings`
--

INSERT INTO `findings` (`id`, `appointment_id`, `history`, `findings`, `diagnostics`, `prescription`, `created_at`) VALUES
(23, 108, '', '', '', '', '2024-11-25 16:04:56'),
(24, 109, '', '', '', '', '2024-11-25 16:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `street_address_line_2` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `zip_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `birthdate`, `phone`, `gender`, `street_address`, `street_address_line_2`, `city`, `province`, `created_at`, `updated_at`, `zip_code`) VALUES
(1, 'Carlo', 'Resaba', 'Hadjirul', 'carlo@gmail.com', '$2y$10$zfaUX1OMFCwqRcsCNKP5rOE6r87EhOBUSOhxQvQKOLOu46/ZcLHkS', '2014-11-05', '09977914457', 'male', 'Cristina home 1', 'Talon - Talon', 'Zamboanga City', 'Zamboaga Del Sur', '2024-10-30 05:28:34', '2024-11-21 15:26:18', '700'),
(2, 'Jopel', NULL, 'Enriquez', 'jopel@gmail.com', '$2y$10$IEpwKvc8Yf/ZOfSM93pMf.2WBh5elFXZt1.KGlrNQNteXZJLBGd3W', '0000-00-00', '09380263077', 'male', 'Santol Drive', '', 'Zamboanga City', 'Zamboanga Del Sur', '2024-11-24 12:33:37', '2024-11-24 12:33:37', '7000');

-- --------------------------------------------------------

--
-- Table structure for table `walkins`
--

CREATE TABLE `walkins` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `walkins`
--

INSERT INTO `walkins` (`id`, `firstname`, `middlename`, `lastname`, `birthdate`, `email`, `contact_number`, `gender`, `address`, `created_at`, `updated_at`) VALUES
(8, 'Carlo', 'resaba', 'Hadjirul', '2024-03-06', 'hadjirul@gmail.com', '0926621532', 'Male', 'Talon - Talon', '2024-03-05 10:33:09', '2024-03-13 10:29:31'),
(9, 'Aljamer', '', 'Tajala', '2024-03-06', 'tajala@gmail.com', '0926261403', 'Male', 'Mampang', '2024-03-05 21:48:28', '2024-03-11 20:57:59'),
(14, 'Jopel', '', 'Enriquez', '2024-03-11', 'Enriquez@gmail.com', '09266215032', 'Male', 'Tumaga', '2024-03-10 23:04:51', '2024-03-11 20:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `walkin_history`
--

CREATE TABLE `walkin_history` (
  `id` int(11) NOT NULL,
  `medical_history` varchar(200) NOT NULL,
  `eye_history` varchar(200) NOT NULL,
  `findings` varchar(200) NOT NULL,
  `diagnosis` varchar(200) NOT NULL,
  `prescription` varchar(200) NOT NULL,
  `date_held` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `service` varchar(50) DEFAULT NULL,
  `doctor_ID` int(11) DEFAULT NULL,
  `patient_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `walkin_history`
--

INSERT INTO `walkin_history` (`id`, `medical_history`, `eye_history`, `findings`, `diagnosis`, `prescription`, `date_held`, `created_at`, `updated_at`, `service`, `doctor_ID`, `patient_ID`) VALUES
(173, 'May sakit sa pwet', 'kakapanood ng porn', 'nasobrahan kakapanood', 'di ko knows', 'kelangan matulog ng 1 year', '2024-04-05', '2024-03-11 21:08:02', '2024-03-11 21:08:02', 'eye removal', NULL, 8),
(174, 'Wala, pogi lang meron', 'Kakapanood ng porn kaya lumabo', 'di ko alam', 'di ko alam', 'biogesic lang oks na sya', '2024-03-12', '2024-03-11 21:29:12', '2024-03-11 21:30:09', 'Eye exchange', NULL, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `appointmenttime`
--
ALTER TABLE `appointmenttime`
  ADD PRIMARY KEY (`time_id`),
  ADD KEY `fkdate` (`available_date`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `doctor_walkin`
--
ALTER TABLE `doctor_walkin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `findings`
--
ALTER TABLE `findings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `appointmenttime`
--
ALTER TABLE `appointmenttime`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_walkin`
--
ALTER TABLE `doctor_walkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT for table `findings`
--
ALTER TABLE `findings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `findings`
--
ALTER TABLE `findings`
  ADD CONSTRAINT `findings_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
