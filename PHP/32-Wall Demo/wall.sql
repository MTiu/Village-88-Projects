-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2024 at 12:03 PM
-- Server version: 8.2.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wall`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `message_id` int DEFAULT NULL,
  `message` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `message_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Hello 1st reply 2nd user', '2024-01-30 04:21:12', '2024-01-30 04:21:12'),
(2, 3, 1, 'Hello 2nd reply from 3rd user', '2024-01-30 04:21:40', '2024-01-30 04:21:40'),
(3, 1, 1, 'Hello 3rd reply from 1st user', '2024-01-30 04:22:37', '2024-01-30 04:22:37'),
(17, 1, 2, 'It is working?\r\n', '2024-01-30 05:13:50', '2024-01-30 05:13:50'),
(16, 1, 2, 'Working?', '2024-01-30 05:13:40', '2024-01-30 05:13:40'),
(15, 1, 1, 'TRying to comment here', '2024-01-30 05:13:13', '2024-01-30 05:13:13'),
(14, 1, 0, '', '2024-01-30 05:06:29', '2024-01-30 05:06:29'),
(13, 1, 0, 'Trying to comment', '2024-01-30 04:55:20', '2024-01-30 04:55:20'),
(18, 1, 3, 'Hello User 3', '2024-01-30 05:14:03', '2024-01-30 05:14:03'),
(19, 1, 4, 'Helo User 3 from 4th Message', '2024-01-30 05:14:15', '2024-01-30 05:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `message` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hello this is my 1st message from user 1', '2024-01-30 04:23:35', '2024-01-30 04:23:35'),
(2, 2, 'Hello this is the 2nd message from user 2', '2024-01-30 04:23:50', '2024-01-30 04:23:50'),
(3, 3, 'Hello this is the 3nd message from user 3', '2024-01-30 04:23:59', '2024-01-30 04:23:59'),
(4, 3, 'Hello this is the 4th message from user 3', '2024-01-30 04:24:06', '2024-01-30 04:24:06'),
(21, 1, '', '2024-01-30 05:14:15', '2024-01-30 05:14:15'),
(20, 1, '', '2024-01-30 05:14:03', '2024-01-30 05:14:03'),
(19, 1, '', '2024-01-30 05:13:50', '2024-01-30 05:13:50'),
(18, 1, '', '2024-01-30 05:13:40', '2024-01-30 05:13:40'),
(17, 1, '', '2024-01-30 05:13:26', '2024-01-30 05:13:26'),
(16, 1, '', '2024-01-30 05:13:13', '2024-01-30 05:13:13'),
(13, 1, 'Trying to post', '2024-01-30 04:55:00', '2024-01-30 04:55:00'),
(15, 1, 'Try again', '2024-01-30 05:06:29', '2024-01-30 05:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Yoland', 'Rex', 'some_encrypted_text', 'example.gmail.com', '2024-01-30 04:25:19', '2024-01-30 04:25:19'),
(2, 'Pom', 'Ray', 'some_encrypted_text', 'sample.gmail.com', '2024-01-30 04:26:05', '2024-01-30 04:26:05'),
(3, 'Pamela', 'Ray', 'some_encrypted_text', 'trip.gmail.com', '2024-01-30 04:26:14', '2024-01-30 04:26:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
