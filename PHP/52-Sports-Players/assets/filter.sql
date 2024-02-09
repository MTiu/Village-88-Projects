-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2024 at 06:56 AM
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
-- Database: `filter`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

DROP TABLE IF EXISTS `characters`;
CREATE TABLE IF NOT EXISTS `characters` (
  `character_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`character_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`character_id`, `first_name`, `last_name`, `gender`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Byleth', 'Eisner(F)', 'F', 'https://mail.creativeuncut.com/gallery-37/art/feth-byleth-female-portrait.jpg', '2024-02-09 07:22:33', '2024-02-09 07:22:33'),
(2, 'Edelgard', 'Hresevelg', 'F', 'https://th.bing.com/th/id/OIP.5e3rhpKTYGBdG77h7BmQMAAAAA?rs=1&pid=ImgDetMain', '2024-02-09 07:24:47', '2024-02-09 07:24:47'),
(3, ' Dimitri Alexandre', 'Blaiddyd', 'M', 'https://cdn.staticneo.com/ew/4/45/Fire_emblem_portrait_dimitri.png', '2024-02-09 07:25:43', '2024-02-09 07:25:43'),
(4, ' Claude ', 'Riegan', 'M', 'https://th.bing.com/th/id/OIP.eDmyxsOyzCIZMGMQBKiQywHaHa?rs=1&pid=ImgDetMain', '2024-02-09 07:26:23', '2024-02-09 07:26:23'),
(5, ' Byleth', 'Eisner(M) ', 'M', 'https://fireemblemwiki.org/w/images/thumb/7/7a/FETH_Byleth_m.png/1200px-FETH_Byleth_m.png', '2024-02-09 07:26:40', '2024-02-09 07:26:40'),
(6, ' Lyndis ', '', 'F', 'https://th.bing.com/th/id/OIP.2IiNq33-kXdRv-P5Yv3d-QHaHw?rs=1&pid=ImgDetMain', '2024-02-09 07:28:18', '2024-02-09 07:28:18'),
(7, ' Roy ', '', 'M', 'https://th.bing.com/th/id/OIP.1qDYNX3sxHEKV3BsK8ve-wHaEh?rs=1&pid=ImgDetMain', '2024-02-09 07:28:44', '2024-02-09 07:28:44'),
(8, ' Hector ', '', 'M', 'https://cdna.artstation.com/p/assets/images/images/033/295/098/large/fabio-sato-hector-fe3-72dpi-x2000.jpg?1609101761', '2024-02-09 07:28:58', '2024-02-09 07:28:58'),
(9, ' Eliwood ', '', 'M', 'https://i.redd.it/ag8538l4hrc11.png', '2024-02-09 07:29:05', '2024-02-09 07:29:05'),
(10, 'Lumera', '', 'F', 'https://fs-prod-cdn.nintendo-europe.com/media/images/08_content_images/games_6/nintendo_switch_7/nswitch_fireemblemengage/CI_NSwitch_FireEmblemEngage_chr_02.png', '2024-02-09 07:29:37', '2024-02-09 07:29:37'),
(11, ' Alear(F) ', '', 'F', 'https://i.pinimg.com/originals/22/d4/b1/22d4b10d94ef0033cb528551cc0dd403.jpg', '2024-02-09 07:30:22', '2024-02-09 07:30:22'),
(12, ' Alear(M) ', '', 'M', 'https://ami.animecharactersdatabase.com/uploads/chars/36226-1980361056.png', '2024-02-09 07:30:28', '2024-02-09 07:30:28'),
(13, ' Veyle ', '', 'F', 'https://cdn.fireemblemwiki.org/thumb/2/2f/FEE_Veyle_portrait.png/800px-FEE_Veyle_portrait.png', '2024-02-09 07:30:51', '2024-02-09 07:30:51'),
(14, ' Ivy ', '', 'F', 'https://th.bing.com/th/id/OIP.YsX9b8Asm71Z3Ow4X-6x2gHaGS?pid=ImgDet&w=474&h=402&rs=1', '2024-02-09 07:31:27', '2024-02-09 07:31:27'),
(15, ' Hortensia ', '', 'F', 'https://th.bing.com/th/id/OIP.lucB7rK0Xo7fWgahEGLMRAHaGp?rs=1&pid=ImgDetMain', '2024-02-09 07:31:34', '2024-02-09 07:31:34'),
(16, ' Diamant ', '', 'M', 'https://th.bing.com/th/id/OIP.80ssvPlNzOWmWboWx5Xf3gHaHx?rs=1&pid=ImgDetMain', '2024-02-09 07:31:52', '2024-02-09 07:31:52'),
(17, ' Diamant ', '', 'M', NULL, '2024-02-09 14:21:33', '2024-02-09 14:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

DROP TABLE IF EXISTS `relation`;
CREATE TABLE IF NOT EXISTS `relation` (
  `relation_id` int NOT NULL AUTO_INCREMENT,
  `character_id` int DEFAULT NULL,
  `weapon_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`relation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `relation`
--

INSERT INTO `relation` (`relation_id`, `character_id`, `weapon_id`, `created_at`, `updated_at`) VALUES
(8, 12, 1, '2024-02-09 07:42:19', '2024-02-09 07:42:19'),
(2, 11, 1, '2024-02-09 07:41:33', '2024-02-09 07:41:33'),
(3, 11, 2, '2024-02-09 07:41:43', '2024-02-09 07:41:43'),
(4, 11, 3, '2024-02-09 07:41:47', '2024-02-09 07:41:47'),
(5, 11, 4, '2024-02-09 07:41:49', '2024-02-09 07:41:49'),
(6, 11, 5, '2024-02-09 07:41:50', '2024-02-09 07:41:50'),
(7, 11, 6, '2024-02-09 07:41:51', '2024-02-09 07:41:51'),
(9, 12, 2, '2024-02-09 07:42:20', '2024-02-09 07:42:20'),
(10, 12, 3, '2024-02-09 07:42:21', '2024-02-09 07:42:21'),
(11, 12, 4, '2024-02-09 07:42:22', '2024-02-09 07:42:22'),
(12, 12, 5, '2024-02-09 07:42:23', '2024-02-09 07:42:23'),
(13, 12, 6, '2024-02-09 07:42:24', '2024-02-09 07:42:24'),
(14, 1, 1, '2024-02-09 07:42:42', '2024-02-09 07:42:42'),
(15, 1, 2, '2024-02-09 07:42:43', '2024-02-09 07:42:43'),
(16, 1, 3, '2024-02-09 07:42:44', '2024-02-09 07:42:44'),
(17, 1, 4, '2024-02-09 07:42:47', '2024-02-09 07:42:47'),
(18, 1, 5, '2024-02-09 07:42:48', '2024-02-09 07:42:48'),
(19, 5, 1, '2024-02-09 07:42:55', '2024-02-09 07:42:55'),
(20, 5, 2, '2024-02-09 07:42:56', '2024-02-09 07:42:56'),
(21, 5, 3, '2024-02-09 07:42:57', '2024-02-09 07:42:57'),
(22, 5, 4, '2024-02-09 07:42:58', '2024-02-09 07:42:58'),
(23, 5, 5, '2024-02-09 07:42:59', '2024-02-09 07:42:59'),
(24, 10, 6, '2024-02-09 07:44:54', '2024-02-09 07:44:54'),
(25, 2, 2, '2024-02-09 07:45:24', '2024-02-09 07:45:24'),
(26, 3, 5, '2024-02-09 07:45:40', '2024-02-09 07:45:40'),
(27, 4, 4, '2024-02-09 07:45:52', '2024-02-09 07:45:52'),
(28, 6, 4, '2024-02-09 07:46:03', '2024-02-09 07:46:03'),
(29, 6, 1, '2024-02-09 07:46:04', '2024-02-09 07:46:04'),
(30, 7, 1, '2024-02-09 07:46:09', '2024-02-09 07:46:09'),
(31, 8, 2, '2024-02-09 07:46:11', '2024-02-09 07:46:11'),
(32, 9, 1, '2024-02-09 07:46:22', '2024-02-09 07:46:22'),
(33, 13, 6, '2024-02-09 07:47:38', '2024-02-09 07:47:38'),
(34, 14, 3, '2024-02-09 07:47:55', '2024-02-09 07:47:55'),
(35, 15, 3, '2024-02-09 07:48:06', '2024-02-09 07:48:06'),
(36, 16, 1, '2024-02-09 07:48:10', '2024-02-09 07:48:10'),
(37, 16, 1, '2024-02-09 14:21:33', '2024-02-09 14:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `weapons`
--

DROP TABLE IF EXISTS `weapons`;
CREATE TABLE IF NOT EXISTS `weapons` (
  `weapon_id` int NOT NULL AUTO_INCREMENT,
  `weapon_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`weapon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `weapons`
--

INSERT INTO `weapons` (`weapon_id`, `weapon_name`, `created_at`, `updated_at`) VALUES
(1, 'Sword', '2024-02-09 07:18:52', '2024-02-09 07:18:52'),
(2, 'Axe', '2024-02-09 07:18:52', '2024-02-09 07:18:52'),
(3, 'Magic', '2024-02-09 07:18:52', '2024-02-09 07:18:52'),
(4, 'Bow', '2024-02-09 07:18:52', '2024-02-09 07:18:52'),
(5, 'Lance', '2024-02-09 07:18:52', '2024-02-09 07:18:52'),
(6, 'Special', '2024-02-09 07:18:52', '2024-02-09 07:18:52');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
