-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 05:09 PM
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
-- Database: `clinic`
--

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
(16, 'Carlo', 'Resaba', 'Hadjirul', '2024-03-20', 'hadjirulcarlo@gmail.com', '09266215032', 'Male', 'Talon - Talon, Z. C', 'uploads/profile.jpg', 'Eye specialist', 'admin123', '2024-03-13 16:03:07', '2024-03-13 16:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule`
--

CREATE TABLE `doctor_schedule` (
  `id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_schedule`
--

INSERT INTO `doctor_schedule` (`id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, '2024-03-22 14:29:00', '2024-03-27 14:29:00', '2024-03-13 06:30:02', '2024-03-13 06:30:02'),
(2, '2024-03-12 14:54:00', '2024-03-14 14:54:00', '2024-03-13 06:54:41', '2024-03-13 06:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_walkin`
--

CREATE TABLE `doctor_walkin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(300) NOT NULL,
  `middlename` varchar(300) NOT NULL,
  `lastname` varchar(300) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(300) NOT NULL,
  `contact_number` varchar(300) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `doctor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_walkin`
--

INSERT INTO `doctor_walkin` (`id`, `firstname`, `middlename`, `lastname`, `birthdate`, `email`, `contact_number`, `gender`, `address`, `created_at`, `updated_at`, `doctor`) VALUES
(1, 'Ben', '', 'Aragoncillo', '2024-03-22', 'aragoncillo@gmail.com', '09266215032', 'Male', 'canelar', '2024-03-13 16:04:58', '2024-03-13 16:04:58', NULL),
(2, 'carlo', '', 'hadjirul', '2024-02-29', 'hadjirulcarlo@gmail.com', '09266215032', 'Male', 'talon2x', '2024-03-13 15:17:41', '2024-03-13 15:17:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_walkin_history`
--

CREATE TABLE `doctor_walkin_history` (
  `id` int(11) NOT NULL,
  `medical_history` varchar(300) NOT NULL,
  `eye_history` varchar(300) NOT NULL,
  `findings` varchar(300) NOT NULL,
  `diagnosis` varchar(300) NOT NULL,
  `prescription` varchar(300) NOT NULL,
  `service` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_held` date NOT NULL,
  `patient_ID` int(11) DEFAULT NULL,
  `doctor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_walkin_history`
--

INSERT INTO `doctor_walkin_history` (`id`, `medical_history`, `eye_history`, `findings`, `diagnosis`, `prescription`, `service`, `created_at`, `updated_at`, `date_held`, `patient_ID`, `doctor`) VALUES
(7, 'Heart Disease', 'eye itching', 'eye itching because of food consumption', 'eye test examination', 'liquid eye drop twice a day', 'eye exammination', '2024-03-13 16:07:57', '2024-03-13 16:07:57', '2024-03-21', 1, 'Dr. Rosalinda Lim');

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
(342, 'Jopel', '', 'Enriquez', '2024-03-14', 'enriquezjople@gmail.com', 926612321, 'Male', 'Tumaga', 'Bouncer', 'uploads/profile.jpg', '2024-03-12 14:22:21', '2024-03-12 14:22:21'),
(343, 'Maira', '', 'Rodrigo', '2007-02-14', 'rodrigo@gmail.com', 2147483647, 'Female', 'Tumaga, Z. C', 'Janitress', NULL, '2024-03-13 16:04:19', '2024-03-13 16:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(3, '2024-03-05 22:52:00', '2024-03-06 22:52:00', '2024-03-05 14:52:33', '2024-03-05 14:52:33');

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
(8, 'Carlo', '', 'Hadjirul', '2024-03-06', 'hadjirul@gmail.com', '0926621532', 'Female', 'Talon - Talon', '2024-03-06 02:33:09', '2024-03-13 15:17:32'),
(9, 'Aljamer', '', 'Tajala', '2024-03-06', 'tajala@gmail.com', '0926261403', 'Male', 'Mampang', '2024-03-06 13:48:28', '2024-03-12 12:57:59');

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
  `patient_ID` int(11) DEFAULT NULL,
  `doctor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `walkin_history`
--

INSERT INTO `walkin_history` (`id`, `medical_history`, `eye_history`, `findings`, `diagnosis`, `prescription`, `date_held`, `created_at`, `updated_at`, `service`, `doctor_ID`, `patient_ID`, `doctor`) VALUES
(178, 'Diabetes', 'blurry eyes', 'blurry eyes due to excessive use of gudgets', 'to wear eye glasses', 'eye drop every twice a week', '2024-03-27', '2024-03-13 16:00:55', '2024-03-13 16:00:55', 'eye examination', NULL, 8, 'Dr. ferlinda lim');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_walkin_history`
--
ALTER TABLE `doctor_walkin_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_patient` (`patient_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `walkins`
--
ALTER TABLE `walkins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `walkin_history`
--
ALTER TABLE `walkin_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_ID` (`patient_ID`),
  ADD KEY `doctor_ID` (`doctor_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_walkin`
--
ALTER TABLE `doctor_walkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor_walkin_history`
--
ALTER TABLE `doctor_walkin_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `walkins`
--
ALTER TABLE `walkins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `walkin_history`
--
ALTER TABLE `walkin_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_walkin_history`
--
ALTER TABLE `doctor_walkin_history`
  ADD CONSTRAINT `fk_patient` FOREIGN KEY (`patient_ID`) REFERENCES `doctor_walkin` (`id`);

--
-- Constraints for table `walkin_history`
--
ALTER TABLE `walkin_history`
  ADD CONSTRAINT `walkin_history_ibfk_1` FOREIGN KEY (`patient_ID`) REFERENCES `walkins` (`id`),
  ADD CONSTRAINT `walkin_history_ibfk_2` FOREIGN KEY (`doctor_ID`) REFERENCES `doctor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
