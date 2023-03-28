-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2023 at 12:05 AM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_10967677`
--

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORY`
--

CREATE TABLE IF NOT EXISTS `CATEGORY` (
  `category_id` int(5) NOT NULL COMMENT 'primary key',
  `title` varchar(255) NOT NULL COMMENT 'human readable id'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CATEGORY`
--

INSERT INTO `CATEGORY` (`category_id`, `title`) VALUES
(3, 'Boards'),
(2, 'Comps'),
(5, 'General'),
(4, 'Gromits (Learn2Surf)'),
(1, 'Surf Spots');

-- --------------------------------------------------------

--
-- Table structure for table `COMMENT`
--

CREATE TABLE IF NOT EXISTS `COMMENT` (
  `user_id` int(11) DEFAULT NULL,
  `comment_id` int(11) NOT NULL,
  `discussion_id` int(11) DEFAULT NULL,
  `body` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `COMMENT`
--

INSERT INTO `COMMENT` (`user_id`, `comment_id`, `discussion_id`, `body`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'I don''t like Manly beach', '2023-03-27 00:00:00', '2023-03-26 17:13:42'),
(1, 2, 1, 'Don''t care', '2023-03-27 02:08:20', '2023-03-26 19:08:20'),
(1, 3, 2, 'something amazing', '2023-03-27 04:16:24', '2023-03-26 21:16:24'),
(4, 4, NULL, NULL, '2023-03-27 04:26:13', '2023-03-26 21:26:13'),
(4, 6, 1, 'Good 1', '2023-03-27 04:30:32', '2023-03-26 21:30:32'),
(4, 7, 7, 'nothing', '2023-03-27 04:38:01', '2023-03-26 21:38:01'),
(4, 8, 10, 'Idk if I am a chump or what', '2023-03-27 17:43:21', '2023-03-27 10:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `POST`
--

CREATE TABLE IF NOT EXISTS `POST` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `POST`
--

INSERT INTO `POST` (`post_id`, `user_id`, `title`, `body`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 1, 'Manly beach', 'North Steyne and Queenscliff sections are pretty good, the southern end of the beach not so much.\r\n\r\nI felt pretty good when it wasn''t so busy, but there are some absolute drop kicks from the surf schools that drop in sometimes. The instructors are cool guys and try to help but some fo the other tourists are unbearable.\r\n\r\nQuiet days are good tho', '2023-03-26 00:00:00', '2023-03-27 00:10:35', 1),
(2, 2, 'Curl curl', 'curl is a small beach, that is great during stormy days! The small placid waves turn larger and more powerful.', '2023-03-26 14:00:00', '2023-03-27 00:30:12', 1),
(3, 2, 'Shelly beach', 'Shelly beach has no waves until you paddle around the head; it can be hard getting through the swell as it tries to wash you onto the rocks.\r\n\r\nYou gotta be a strong paddler to make it past the break and also catch a wave, YOU WILL GET DUMPED ONTO THE ROCKS IF YOU ARE UNPREPARED.\r\n\r\nSwell is pretty sweet though.', '2023-03-26 00:00:00', '2023-03-27 00:32:30', 1),
(4, 1, 'post title', 'post body', '2023-03-26 20:06:57', '2023-03-27 03:06:57', 1),
(5, 1, 'Miami beach', 'Cool place', '2023-03-26 20:33:34', '2023-03-27 03:33:34', 1),
(6, 1, 'Where to learn in Europe?', 'Read the title', '2023-03-26 20:37:38', '2023-03-27 03:37:38', 4),
(7, 1, 'World open?', 'Think its in Manly this year?', '2023-03-26 20:38:51', '2023-03-27 03:38:51', 2),
(10, 4, 'I don''t like big wave surfing', 'In a big wave wipeout, a breaking wave can push surfers down 20 to 50 feet (6.2 m to 15.5 m) below the surface. Once they stop spinning around, they have to quickly regain their equilibrium and figure out which way is up. Surfers may have less than 20 seconds to get to the surface before the next wave hits them. Additionally, the water pressure at a depth of 20 to 50 feet can be strong enough to rupture one''s eardrums. Strong currents and water action at those depths can also slam a surfer into a reef or the ocean floor, which can result in severe injuries or even death.', '2023-03-27 10:33:20', '2023-03-27 17:33:20', 5);

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE IF NOT EXISTS `USER` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `username` varchar(255) DEFAULT NULL COMMENT 'human readable id',
  `password_hash` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`id`, `username`, `password_hash`, `email`, `image_url`, `is_admin`, `is_enabled`) VALUES
(1, 'amurph', '123_Password', 'aidanpmurphy@hotmail.com', NULL, 0, 1),
(2, 'buddy1', '123_Password', 'aidan@gmail.com', NULL, 0, 1),
(3, 'zach', '$2y$10$PQuc6LjNirUJGfEBhtA41O2ikijzCYCB3X8HXDf/YLkIewAV5rsGq', 'test@test.ca', NULL, 1, 1),
(4, 'am', '$2y$10$Nrr6DBe4G5bVhO5uTk3R.e9DDGBo1iUtLP6syx5q8UmiA7cTpwsWu', 'murphy@gmail.com', NULL, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_title` (`title`);

--
-- Indexes for table `COMMENT`
--
ALTER TABLE `COMMENT`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `discussion_id` (`discussion_id`);

--
-- Indexes for table `POST`
--
ALTER TABLE `POST`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `POST_ibfk_1` (`user_id`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'primary key',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `COMMENT`
--
ALTER TABLE `COMMENT`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `POST`
--
ALTER TABLE `POST`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `COMMENT`
--
ALTER TABLE `COMMENT`
  ADD CONSTRAINT `COMMENT_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `USER` (`id`),
  ADD CONSTRAINT `COMMENT_ibfk_2` FOREIGN KEY (`discussion_id`) REFERENCES `POST` (`post_id`);

--
-- Constraints for table `POST`
--
ALTER TABLE `POST`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `CATEGORY` (`category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `POST_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `USER` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
