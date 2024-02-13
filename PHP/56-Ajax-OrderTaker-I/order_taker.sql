-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 13, 2024 at 04:13 PM
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
-- Database: `order_taker`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `description`, `created_at`) VALUES
(1, '1 tea, 1 boba', '2024-02-13 01:00:59'),
(2, '2 pizzas, 3 french fries', '2024-02-13 01:01:42'),
(3, '2 pizzas, 3 french fries, 5 spaghetti', '2024-02-13 15:32:58'),
(4, '5 cheeseburgers', '2024-02-13 15:35:12'),
(5, '6 cheeseburgers', '2024-02-13 15:36:30'),
(6, '6 cheeseburgers', '2024-02-13 15:37:20'),
(7, '6 cheeseburgers', '2024-02-13 15:37:21'),
(8, '11 bucket fries', '2024-02-13 15:41:40'),
(9, '12 bucket fries', '2024-02-13 15:42:16'),
(10, '13 bucket fries!', '2024-02-13 15:45:39'),
(11, '2 pizzas, 3 french fries', '2024-02-13 16:00:30'),
(12, '2 pizzas, 3 french fries, 5 spaghetti', '2024-02-13 16:11:42'),
(13, '2 pizzas, 3 french fries, 5 spaghetti', '2024-02-13 16:11:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
