-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 20, 2021 at 03:47 AM
-- Server version: 5.7.31-log
-- PHP Version: 7.3.21
CREATE SCHEMA debug_express;
USE debug_express;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `password`, `created_at`, `updated_at`) VALUES
(1, 'jrosales@village88.com', 'Oliver', 'Rosales', 'password', '2021-02-05 22:17:14', '2021-02-05 22:17:14'),
(2, 'Preston86@example.org', 'Preston', 'Lesch', 'e807f1fcf82d132f9bb018ca6738a19f', '2021-02-05 22:32:11', '2021-02-05 22:32:11'),
(3, 'Roger74@example.org', 'Roger', 'Runte', 'e807f1fcf82d132f9bb018ca6738a19f', '2021-02-06 00:24:01', '2021-02-06 00:24:01'),
(4, 'Terrance_Lakin8@example.com', 'Terrance', 'Lakin', 'e807f1fcf82d132f9bb018ca6738a19f', '2021-02-06 00:28:27', '2021-02-06 00:28:27'),
(5, 'Drew_Thompson@example.com', 'Drew', 'Thompson', 'e807f1fcf82d132f9bb018ca6738a19f', '2021-02-06 00:31:55', '2021-02-06 00:31:55'),
(6, 'Ivan.Macejkovic4@example.com', 'Ivan', 'Macejkovic', 'e807f1fcf82d132f9bb018ca6738a19f', '2021-02-06 00:33:32', '2021-02-06 00:33:32'),
(7, 'Edmond.Sipes@example.net', 'Edmond', 'Sipes', 'e807f1fcf82d132f9bb018ca6738a19f', '2021-02-06 00:38:23', '2021-02-06 00:38:23'),
(8, 'Earl16@example.net', 'Earl', 'Kuvalis', 'e807f1fcf82d132f9bb018ca6738a19f', '2021-02-06 01:15:29', '2021-02-06 01:15:29'),
(9, 'Andy_Murazik78@example.org', 'Andy', 'Murazik', 'e807f1fcf82d132f9bb018ca6738a19f', '2021-02-06 10:21:15', '2021-02-06 10:21:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
