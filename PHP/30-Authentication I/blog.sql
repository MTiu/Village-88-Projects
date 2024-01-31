-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2024 at 11:59 AM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `reply_id` int NOT NULL AUTO_INCREMENT,
  `review_id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`reply_id`),
  KEY `review_id_idx` (`review_id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `review_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(49, 45, 1, 'Hello Fujiko! Yes this is yuri. This is one of the best yuri of 2023', '2024-01-30 03:07:14', '2024-01-30 03:07:14'),
(50, 46, 1, 'Good to know! Let\'s Build the Yuri Army!', '2024-01-30 03:09:09', '2024-01-30 03:09:09'),
(51, 47, 1, 'Haters gonna hate I guess?', '2024-01-30 03:11:37', '2024-01-30 03:11:37'),
(52, 48, 1, 'Not really?', '2024-01-30 03:12:25', '2024-01-30 03:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(45, 2, 'Nice Blog ! Is that yuri?', '2024-01-30 03:06:41', '2024-01-30 03:06:41'),
(46, 3, 'I\'m a simple person. I see yuri I click!', '2024-01-30 03:08:45', '2024-01-30 03:08:45'),
(47, 4, 'I didn\'t like the post. The post is trash', '2024-01-30 03:10:42', '2024-01-30 03:10:42'),
(48, 1, 'Great Blog? I guess?', '2024-01-30 03:12:15', '2024-01-30 03:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `contact_number` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `contact_number`, `email`, `password`, `salt`, `created_at`, `updated_at`) VALUES
(1, 'Matthew', 'Tiu', '09568277611', 'mattjtiu@gmail.com', 'e6464a0a5e2c989972e52a67c354531c', 'a55344b2a19b33c411797f2346a0925d3f632de01dff', '2024-01-29 09:14:11', '2024-01-29 09:14:11'),
(2, 'Fujiko', 'Amamiya', '00000000000', 'sample@gmail.com', 'b88d915eee4cd0814ff36080d72a9b85', '47aca958aac42e15192493ee647b3eee3edfbc51a50e', '2024-01-29 20:50:40', '2024-01-29 20:50:40'),
(3, 'Yuri', 'Lover', '00000000000', 'sampler@gmail.com', 'f7343675b57d39cc11ef6dba6b65db9a', '160caf386b3afce9cc7d155b24141bce3fd56c69b544', '2024-01-30 03:08:07', '2024-01-30 03:08:07'),
(4, 'Haters', 'GunnaHate', '00000000001', 'samplee@gmail.com', 'bd9fa824847bfe04e75c98c1e2cd7e2d', 'cf2450e90b6d818a7dd125dac1d0a571667c4cd6198c', '2024-01-30 03:10:21', '2024-01-30 03:10:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
