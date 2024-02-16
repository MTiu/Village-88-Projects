-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 16, 2024 at 11:24 AM
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
-- Database: `search_filter`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Cup', 10, 100, '2021-01-30 00:00:00', '2021-01-30 00:00:00'),
(2, 'Dress', 100, 200, '2021-02-14 00:00:00', '2021-02-14 00:00:00'),
(3, 'Shoes', 20, 300, '2021-12-30 00:00:00', '2021-12-30 00:00:00'),
(4, 'Shorts', 40, 400, '2021-12-21 00:00:00', '2021-12-21 00:00:00'),
(5, 'T-shirt', 50, 500, '2021-01-25 00:00:00', '2021-01-25 00:00:00'),
(6, 'Mug', 67, 600, '2021-01-23 00:00:00', '2021-01-23 00:00:00'),
(7, 'Pen', 43, 700, '2021-01-20 00:00:00', '2021-01-20 00:00:00'),
(8, 'Pencil', 23, 800, '2021-02-20 00:00:00', '2021-02-20 00:00:00'),
(9, 'Table', 65, 900, '2021-02-21 00:00:00', '2021-02-21 00:00:00'),
(10, 'Paper', 78, 1000, '2021-02-22 00:00:00', '2021-02-22 00:00:00'),
(11, 'Eraser', 56, 1100, '2021-02-24 00:00:00', '2021-02-24 00:00:00'),
(12, 'Keyboard', 45, 1200, '2021-02-26 00:00:00', '2021-02-26 00:00:00'),
(13, 'Mouse', 34, 1300, '2021-02-19 00:00:00', '2021-02-19 00:00:00'),
(14, 'Mouse trap', 23, 1400, '2021-02-12 00:00:00', '2021-02-12 00:00:00'),
(15, 'Controller', 98, 1500, '2021-02-10 00:00:00', '2021-02-10 00:00:00'),
(16, 'CPU', 22, 1600, '2021-02-23 00:00:00', '2021-02-23 00:00:00'),
(17, 'Charger', 13, 1700, '2021-02-22 00:00:00', '2021-02-22 00:00:00'),
(18, 'Switch', 42, 1800, '2021-02-21 00:00:00', '2021-02-21 00:00:00'),
(19, 'Headphones', 55, 1900, '2021-02-18 00:00:00', '2021-02-18 00:00:00'),
(20, 'Printer', 66, 2000, '2021-03-20 00:00:00', '2021-03-20 00:00:00'),
(21, 'Cellphone', 77, 2100, '2021-03-22 00:00:00', '2021-03-22 00:00:00'),
(22, 'Laptop', 88, 2200, '2021-03-24 00:00:00', '2021-03-24 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
