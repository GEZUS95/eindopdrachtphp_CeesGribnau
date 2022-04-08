-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 08, 2022 at 08:17 PM
-- Server version: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developmentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `companys`
--

CREATE TABLE `companys` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `description` text DEFAULT NULL,
  `logo` longtext NOT NULL,
  `photos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companys`
--

INSERT INTO `companys` (`id`, `name`, `role`, `email`, `password`, `phone`, `description`, `logo`, `photos`, `created_at`) VALUES
(1, 'TestCompany', 'company', 'test@company.com', '$2y$10$LGMJApLSmCVRiVROZA/d5uQHIjhLmLztcigCv2N79vyPTbpsxXdU2', '31628527787', 'test test test', '', 'test/location', '2022-01-22 17:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `companyId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `rating` int(10) NOT NULL,
  `reaction` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `companyId`, `userId`, `title`, `description`, `rating`, `reaction`) VALUES
(2, 1, 1, 'testing', 'dit is weer een test ', 5, 'treafvadsv errasdevaerv dsraevsd ervsdvaeva'),
(3, 1, 1, 'test 2', 'teadfa ', 5, ''),
(4, 1, 3, 'test', 'testestest', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `password`, `phone`, `created_at`) VALUES
(1, 'test cees', 'user', 'test@email.com', '$2y$10$JdPJfLGkZqiVbrdBWtDlEOlp2wlrv1/PpnBIyPfDQY77pk4aOx/Ce', '628527787', '2022-01-22 12:05:31'),
(2, 'username', 'user', 'test@user.com', '$2y$10$LV3IQ9XPw3NvjRHmYerFDOJ0Ngh5JMBfx4muPdL/gjllKHFDFANjW', '0000', '2022-04-08 13:57:45'),
(3, 'admin', 'admin', 'admin@example.com', '$2y$10$u4aRBroRjrSC0Is3691SA.9IATS9DWntXlqWCmymlFhlrjzb7dA0.', '0611', '2022-04-08 16:19:20'),
(4, 'Mark', 'user', 'mark@inholland.nl', '$2y$10$VQZNL9cXvszGdPAl2ogeE.LHRhkF95HA2E5WrtBbQe.lVNW/7QZGy', '00000', '2022-04-08 19:37:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companys`
--
ALTER TABLE `companys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companys`
--
ALTER TABLE `companys`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
