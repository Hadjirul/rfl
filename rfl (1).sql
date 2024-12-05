-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 06:52 PM
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
  `first_name` varchar(50) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `created_at`, `first_name`, `picture`) VALUES
(2, 'admin2@example.com', '$2y$10$Jezqy3z3/Ps1EQILdAaaA.PGWQrTKBD2Gn3tVwqbJiGJbocMB0tw2', '2024-10-30 13:51:56', 'Admin', 'uploads/module_table_bottom.png');

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
  `service` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` enum('pending','approved','completed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `doctor_id` int(11) DEFAULT NULL,
  `cancel_reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `birthdate`, `phone`, `gender`, `email`, `street_address`, `street_address_line_2`, `city`, `province`, `zip_code`, `ocular_history`, `family_health_history`, `appointment_reason`, `service`, `date`, `time`, `status`, `created_at`, `updated_at`, `doctor_id`, `cancel_reason`) VALUES
(211, 7, 'Jopel', '', 'Enriquez', '2000-12-16', '09977914457', 'male', 'jopel@gmail.com', 'Tumaga', 'Del Monte Street', 'Zamboanga City', 'Zamboanga Del Sur', '7000', '', '', '', 'Frame Selection', '0000-00-00', '08:30:00', 'cancelled', '2024-12-05 15:59:04', '2024-12-05 16:36:39', 11, 'wqewqewq'),
(212, 7, 'Jopel', '', 'Enriquez', '2000-12-16', '09977914457', 'male', 'jopel@gmail.com', 'Tumaga', 'Del Monte Street', 'Zamboanga City', 'Zamboanga Del Sur', '7000', '', '', '', '', '0000-00-00', '00:00:00', 'cancelled', '2024-12-05 16:39:38', '2024-12-05 16:39:50', 11, 'qwewqe'),
(213, 7, 'Jopel', '', 'Enriquez', '2000-12-16', '09977914457', 'male', 'jopel@gmail.com', 'Tumaga', 'Del Monte Street', 'Zamboanga City', 'Zamboanga Del Sur', '7000', 'Eye Redness', 'Highblood', 'Magpapagamot malamang', 'ense Type', '2024-12-18', '08:30:00', 'completed', '2024-12-05 16:59:12', '2024-12-05 17:13:20', 11, NULL);

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
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
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

INSERT INTO `doctor` (`id`, `first_name`, `middle_name`, `last_name`, `birthdate`, `email`, `contact_number`, `gender`, `address`, `picture`, `description`, `password`, `created_at`, `update_at`) VALUES
(11, 'Rosalinda', '', 'Lim', '1986-11-10', 'Rosalindalim@gmail.com', '09266215032', 'Female', 'Tumaga, Zamboanga City', 'uploads/profile.jpg', '', '$2y$10$k.TD4MfFo3yq8JhAZE.kwePQ.9m.e7XfExmK8KrFuMt.Z4FFJ.k5u', '2024-03-03 01:17:43', '2024-11-26 15:03:28'),
(14, 'Dr. Ong', '', 'Lim', '1990-02-11', 'LimOng@gmail.com', '09977914457', 'Male', 'Tumaga, Zamboanga Citty', '', 'Optomologist', '$2y$10$uY51uc0NgJ8XpcBHdbHajO.uQMA3MXaM121dvNEHivz4NJgC8fluK', '2024-11-26 16:34:40', '2024-11-26 16:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule`
--

CREATE TABLE `doctor_schedule` (
  `id` int(11) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_schedule`
--

INSERT INTO `doctor_schedule` (`id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, '2024-12-12T00:24', '2024-12-17T00:24', '2024-12-02 16:22:12', '2024-12-02 16:22:12');

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

--
-- Dumping data for table `doctor_walkin`
--

INSERT INTO `doctor_walkin` (`id`, `firstname`, `middlename`, `lastname`, `birthdate`, `email`, `contact_number`, `gender`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Amir', '', 'Hadjirul', '2009-02-12', 'hadjirulamir@gmail.com', '0997791447', 'Male', 'Talon-Talon, Zamboanga City', '2024-11-30 06:09:20', '2024-11-30 06:09:20');

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
(336, 'Tersita', 'Francisco ', 'Alonzo', '1990-03-12', 'alonzo@gmail.com', 2147483647, 'Female', 'Sta. Maria, Zamboanga City', 'Janitor', NULL, '2024-03-03 09:19:01', '2024-11-30 05:57:02'),
(337, 'Pedro', 'Batumbakal', 'Franciso', '1995-02-01', 'Batumbakal@gmail.com', 997714457, 'Male', 'Mampang, Zamboanga City', 'Secretary', NULL, '2024-03-03 09:20:11', '2024-11-30 05:58:28');

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
(108, 213, 'Eye Redness', 'Due to excessiveness used of gadgets', 'Please make an eye glasses to protect the eyes', 'Eye drop water and drink biogesic 3 times a year', '2024-12-05 17:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `creaed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `service_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_att` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `zip_code` varchar(10) DEFAULT NULL,
  `is_verified` tinyint(4) DEFAULT 0,
  `verification_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `birthdate`, `phone`, `gender`, `street_address`, `street_address_line_2`, `city`, `province`, `created_at`, `updated_at`, `zip_code`, `is_verified`, `verification_token`) VALUES
(7, 'Jopel', NULL, 'Enriquez', 'jopel@gmail.com', '$2y$10$SbOoiXHfud0.twD7dHnFu..J9Ab/4wflgC7Xq1.1XrtWDPcB97WtC', '2000-12-16', '09977914457', 'male', 'Tumaga', 'Del Monte Street', 'Zamboanga City', 'Zamboanga Del Sur', '2024-12-05 13:58:06', '2024-12-05 15:25:48', '7000', 0, NULL);

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
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_doctor_appointment` (`doctor_id`);

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
-- Indexes for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `fk_appointment` (`appointment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_category_id` (`service_category_id`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `appointmenttime`
--
ALTER TABLE `appointmenttime`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctor_walkin`
--
ALTER TABLE `doctor_walkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT for table `findings`
--
ALTER TABLE `findings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_doctor_appointment` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `findings`
--
ALTER TABLE `findings`
  ADD CONSTRAINT `findings_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_appointment` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`service_category_id`) REFERENCES `service_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
