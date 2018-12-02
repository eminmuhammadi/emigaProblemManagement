-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2018 at 04:16 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emigaproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(6) UNSIGNED NOT NULL,
  `department_title` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `department_desc` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `problem_id` int(6) UNSIGNED NOT NULL,
  `department_detail` text COLLATE utf8_bin NOT NULL,
  `user_detail` text COLLATE utf8_bin NOT NULL,
  `problem_title` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `problem_description` text COLLATE utf8_bin NOT NULL,
  `problem_status` varchar(2) COLLATE utf8_bin NOT NULL DEFAULT 'P',
  `problem_status_description` text COLLATE utf8_bin NOT NULL,
  `range_date_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `range_date_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) UNSIGNED NOT NULL,
  `user_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `user_lastname` varchar(30) COLLATE utf8_bin NOT NULL,
  `user_password` varchar(32) COLLATE utf8_bin NOT NULL,
  `user_permission` varchar(3) COLLATE utf8_bin NOT NULL DEFAULT 'U',
  `user_email` text COLLATE utf8_bin NOT NULL,
  `user_department_detail` varchar(60) COLLATE utf8_bin DEFAULT '~',
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_logged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(15) COLLATE utf8_bin NOT NULL DEFAULT '0.0.0.0',
  `token` text COLLATE utf8_bin,
  `user_agent` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`problem_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `problem_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
