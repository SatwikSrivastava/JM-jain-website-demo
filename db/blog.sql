-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 14, 2023 at 05:09 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

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
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `b_id` int NOT NULL AUTO_INCREMENT,
  `b_title` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `b_details` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `images` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'Unpublished',
  `date_reg` date NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`b_id`, `b_title`, `b_details`, `images`, `status`, `date_reg`) VALUES
(1, 'Banner1', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Test</p>\r\n</body>\r\n</html>', '-aa414.png', 'Active', '2023-04-13'),
(2, 'DASF', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>DSVEFR</p>\r\n</body>\r\n</html>', '-44c44.png', 'Active', '2023-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `short_details` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `details` text COLLATE utf8mb4_general_ci NOT NULL,
  `images` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'Unpublished',
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `author`, `short_details`, `details`, `images`, `status`, `date`) VALUES
(1, 'Shopping ', 'Admin', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&ldquo;Buy what you don&rsquo;t have yet, or what you really want, which can be mixed with what you already own. Buy only because something excites you, not just for the si', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&ldquo;Buy what you don&rsquo;t have yet, or what you really want, which can be mixed with what you already own. Buy only because something excites you, not just for the simple act of shopping.&rdquo;</p>\r\n<p>&nbsp;</p>\r\n<p>Shopping is no less than therapy. You might have heard people saying I have just had retail therapy. The kind of happiness, excitement, and satisfaction that comes with shopping is real and undeniable.</p>\r\n<p>&nbsp;</p>\r\n<p>Shopping enables you to try new brands and products and have many new experiences. Also, consumer demand increases the competition in the market, which contributes to the growth of economic activities.</p>\r\n</body>\r\n</html>', '-be1b7.png', 'Active', '2023-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `date_reg` date NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `date_reg`) VALUES
(1, 'Shirt', '2023-01-06'),
(2, 'Jeans', '2023-01-06'),
(3, 'Jacket', '2023-01-06'),
(4, 'Sport Shoes', '2023-01-06'),
(5, 'T-Shirt', '2023-01-06'),
(6, 'Casual Paint', '2023-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `id` int NOT NULL AUTO_INCREMENT,
  `color_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `hex_code` binary(7) NOT NULL,
  `date_reg` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color_name`, `hex_code`, `date_reg`) VALUES
(1, 'Green', 0x23313265323136, '2023-01-31'),
(2, 'Red', 0x23646531373137, '2023-01-31'),
(3, 'Black', 0x23303030303030, '2023-01-31'),
(4, 'White', 0x23663466306630, '2023-01-31'),
(5, 'Yellow', 0x23643964643065, '2023-01-31'),
(6, 'Gray', 0x23346431663166, '2023-01-31'),
(7, 'Pink', 0x23663434656536, '2023-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

DROP TABLE IF EXISTS `main_category`;
CREATE TABLE IF NOT EXISTS `main_category` (
  `main_cat_id` int NOT NULL AUTO_INCREMENT,
  `main_menu` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `menu_img` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `date_reg` date NOT NULL,
  PRIMARY KEY (`main_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`main_cat_id`, `main_menu`, `menu_img`, `date_reg`) VALUES
(1, 'Men', 'Men-63b18.jpg', '2023-01-06'),
(2, 'Women', 'Women-5643c.png', '2023-01-06'),
(3, 'Kid', 'Kid-a42da.jpg', '2023-01-06'),
(4, 'Body Care', 'Body-Care-bb5b0.jfif', '2023-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `pro_id` int NOT NULL AUTO_INCREMENT,
  `pro_menu` int NOT NULL,
  `pro_sub` int NOT NULL,
  `pro_cat` int NOT NULL,
  `pro_title` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `hsn_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pro_img` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pro_details` text COLLATE utf8mb4_general_ci NOT NULL,
  `descrip` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_menu`, `pro_sub`, `pro_cat`, `pro_title`, `hsn_code`, `pro_img`, `pro_details`, `descrip`, `date_reg`) VALUES
(2, 1, 1, 1, 'Shirt', 'KID-2245', '-7615b.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Test</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Testing File</p>\r\n</body>\r\n</html>', '2023-01-31 18:30:00'),
(3, 2, 1, 1, 'Jacket', 'LP-2287', '-6a5eb.png', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Woman Jacket</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Woman Jacket</p>\r\n</body>\r\n</html>', '2023-02-01 18:30:00'),
(4, 3, 1, 2, 'Jeans', 'LV-2354', '-f122a.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Kid\'s Jeans Selected</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Kid\'s Jeans&nbsp;</p>\r\n</body>\r\n</html>', '2023-02-02 11:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE IF NOT EXISTS `sub_category` (
  `sub_cat_id` int NOT NULL AUTO_INCREMENT,
  `main_menu_id` int NOT NULL,
  `sub_menu` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `sub_img` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `date_reg` date NOT NULL,
  PRIMARY KEY (`sub_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat_id`, `main_menu_id`, `sub_menu`, `sub_img`, `date_reg`) VALUES
(1, 1, 'Top Wear', '-b5fda.jpg', '2023-01-06'),
(2, 1, 'Bottom Wear', '-5af18.jfif', '2023-01-06'),
(3, 1, 'Footwear', '-3099b.jpg', '2023-01-06'),
(4, 1, 'Body Care', '-2173e.jfif', '2023-01-06'),
(5, 2, 'Top Wear', '-d8d67.jpg', '2023-02-02'),
(6, 2, 'Bottom Wear', '-7177f.jfif', '2023-02-02'),
(7, 2, 'Footwear', '-6da7b.jpg', '2023-02-02'),
(8, 2, 'Body Care', '-4ea3b.jfif', '2023-02-02'),
(10, 2, 'Men T-Shirt', '', '2023-04-06'),
(11, 2, 'Men T-Shirt', '', '2023-04-06'),
(12, 3, 'Footwear', '', '2023-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `date_reg` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`, `email`, `date_reg`) VALUES
(1, 'Santosh Singh', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '2022-12-31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
