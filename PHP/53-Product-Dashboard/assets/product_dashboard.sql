-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2024 at 03:16 AM
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
-- Database: `product_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `product_description` text,
  `price` int DEFAULT NULL,
  `product_quantity` int DEFAULT NULL,
  `quantity_sold` int DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `product_description`, `price`, `product_quantity`, `quantity_sold`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Chasing Spica', 'Serina Nekozuka is a serious third-year high school student who\'s studying hard to qualify for a scholarship. Her cute and stylish looks, however, don\'t exactly meet the school dress code—which Reiko Tachibana, a member of the disciplinary committee, is always on her case about. Plus, no matter how much Serina tries, Reiko always bests her in grades and athletics. One day, however, Serina spots Reiko meeting with an unknown woman after school...and going to a love hotel! What will happen between Serina and Reiko now that they share a secret?', 500, 50, 70, 'https://th.bing.com/th/id/OIP.7c98h9BrXDiO7wH3CNlvswHaKh?rs=1&pid=ImgDetMain', '2024-02-12 02:27:50', '2024-02-11 23:15:44'),
(2, 'WataYuri', 'Hime Shiraki, seemingly perfect with her angelic voice and innocent demeanor, conceals her true motive of marrying a wealthy suitor behind her facade. Forced to work at Café Liebe after an accident involving the cafe manager, Mai Koshiba, Hime\'s act is challenged as she grapples with her ineptitude as a waitress. Mitsuki Yano, a coworker, expresses her disdain for Hime, leading to conflicts and the revelation of Hime\'s genuine character. The story unfolds as Hime navigates the challenges of her part-time job, revealing the complexities beneath her seemingly perfect exterior.', 600, 99, 99, 'https://th.bing.com/th/id/OIP.Pgm-B4Ydb9Jz33_80fnT6QHaKh?rs=1&pid=ImgDetMain', '2024-02-12 02:41:15', '2024-02-12 02:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `reply_id` int NOT NULL AUTO_INCREMENT,
  `reply_description` varchar(45) DEFAULT NULL,
  `review_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `reply_description`, `review_id`, `user_id`, `created_at`) VALUES
(1, 'Yeah Chasing Spica is really great right?', 1, 2, '2024-02-12 07:28:02'),
(2, 'SAME!!', 2, 1, '2024-02-12 08:46:05'),
(5, 'Me too trying to reply here!', 1, 1, '2024-02-12 11:12:50'),
(3, 'Trying to comment here!', 1, 2, '2024-02-12 11:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int NOT NULL AUTO_INCREMENT,
  `review_description` text,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `review_description`, `user_id`, `product_id`, `created_at`) VALUES
(1, 'Chasing Spica is great!', 1, 1, '2024-02-12 07:21:48'),
(2, 'I can\'t wait for the next volume!', 2, 1, '2024-02-12 08:29:20'),
(3, 'Chasing spica is top tier!', 1, 1, '2024-02-12 01:53:30'),
(4, 'WataYuri! Thank you for giving me a free sample!', 2, 2, '2024-02-12 01:56:10'),
(5, 'Trying out my new comment!', 1, 1, '2024-02-12 11:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `salt`, `created_at`, `updated_at`) VALUES
(1, 'Matthew', 'Tiu', 'mattjtiu@gmail.com', 'f1593daac7936a56bd5b3b7a2b3cdec3', 'e1407400ba6c51bd09b79d8cb6be1d2058a14a2c8a82', '2024-02-11 01:09:29', '2024-02-11 21:47:54'),
(2, 'Fujiko', 'Amamiya', 'sample@gmail.com', 'd0153e48c421dcfe714a14e15b40b77f', 'fc6a1ee21e901fe05ff87c50033cd65cd13288676ff8', '2024-02-11 01:14:16', '2024-02-11 01:14:16'),
(3, 'ace', 'leroy', 'example234@gmail.com', 'fe5038c945af3810676c2e8f0596bf3d', '058e0f70a0bae01a9e06f7f5f89ba83c0a1b1032f0e9', '2024-02-11 01:28:13', '2024-02-11 01:28:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
