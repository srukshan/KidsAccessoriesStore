-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 22, 2017 at 08:32 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_data`
--
CREATE DATABASE IF NOT EXISTS `store_data` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `store_data`;

-- --------------------------------------------------------

--
-- Table structure for table `auth_level`
--

DROP TABLE IF EXISTS `auth_level`;
CREATE TABLE IF NOT EXISTS `auth_level` (
  `auth_level` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`auth_level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_level`
--

INSERT INTO `auth_level` (`auth_level`, `name`) VALUES
(140421, 'guest'),
(144631, 'reg_customer'),
(160421, 'emp_level_1'),
(161042, 'emp_level_2');

-- --------------------------------------------------------

--
-- Table structure for table `card_details`
--

DROP TABLE IF EXISTS `card_details`;
CREATE TABLE IF NOT EXISTS `card_details` (
  `card_no` char(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000000000000000',
  `exp_date` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `cse_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`card_no`),
  KEY `customer_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `card_details`
--

INSERT INTO `card_details` (`card_no`, `exp_date`, `cse_no`, `user_id`) VALUES
('6542987532654297', '11/18', 943, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `name`, `parent_id`) VALUES
(1, 'Clothes', 0),
(2, 'Toys', 0),
(3, 'Accessories', 0),
(4, 'Bags', 3),
(5, 'Pencil Case', 3),
(6, 'Shoes', 3),
(7, 'Caps, Booties & Mittens', 3),
(8, 'Blankets', 3),
(9, 'Hair Accessories', 3),
(10, 'Boys', 1),
(11, 'Girls', 1),
(12, 'Toddle Boy', 1),
(13, 'Toddle Girl', 1),
(14, 'New Born', 1),
(15, 'War', 2),
(16, 'Barbie', 2),
(17, 'Car', 2),
(18, 'Doll', 2),
(19, 'Toddle Unisex', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `tel_no` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `gender` (`gender`),
  KEY `gender_2` (`gender`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `user_id`, `name`, `tel`, `email`) VALUES
(1, 1, 'K.A.D. Sachith Rukshan D.', '0766239360', 'sachithrukshanmail@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `gender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`gender`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender`) VALUES
('f'),
('m'),
('u');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `image_url`) VALUES
(1, 'img/items/animal-tiger-baby-boy-hoodie-size-6.png'),
(2, 'img/items/animal-wear-baby-orange-outfit-size-3.png'),
(3, 'img/items/baby-boy-hoodie-size-4.png'),
(4, 'img/items/baby-boy-size-5-zebra-costume.png'),
(5, 'img/items/baby-girl-hoodie-size-4.png'),
(6, 'img/items/bear wear baby blue outfit size 2.png'),
(7, 'img/items/bear wear baby brown outfit size 1.png'),
(8, 'img/items/bear wear baby outfit size 2.png'),
(9, 'img/items/bear wear baby white black outfit size 1.png'),
(10, 'img/items/Boucle Dress Coat Girl size 7.png'),
(11, 'img/items/croco wear baby outfit size 2.png'),
(12, 'img/items/fock with hat black girl size 7.png'),
(13, 'img/items/girl black party fock size 8.png'),
(14, 'img/items/girl black white party fock size 8.png'),
(15, 'img/items/girl fock grey size 6.png'),
(16, 'img/items/monster hoodie boy size 6.png'),
(17, 'img/items/new born baby pijamas.png'),
(18, 'img/items/rabit wear baby pink outfit size 2.png'),
(19, 'img/items/size 4 sweeter baby cloth.png'),
(20, 'img/items/sleeping sweeter baby boy size 2.png'),
(21, 'img/items/unisex baby batman shirt shoes size 2.png'),
(22, 'img/items/unisex baby outfit size 3.png'),
(23, 'img/promo/baby-boy-hat-covered.png'),
(24, 'img/promo/Cool-Outfits-50-OFF.png'),
(25, 'img/promo/Little-Baby-Basics.png');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `gender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `img_id` (`img_id`,`gender`),
  KEY `img_id_2` (`img_id`),
  KEY `gender` (`gender`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `title`, `keywords`, `price`, `img_id`, `quantity`, `gender`, `size`, `cat_id`, `description`) VALUES
(1, 'Tiger Boy\'s Hoodie', 'animal tiger baby boy hoodie size 6 s6', '19.00', 1, 50, 'm', 6, 12, 'This is a Boy\'s Hoodie with a tiger like look of the size 6'),
(2, 'Orange Outfit', 'animal wear baby orange outfit size 3 s3', '14.00', 2, 30, 'u', 3, 19, 'This is an Unisex Outfit. A Orange Frog Wear of Size 3.'),
(3, 'Boy\'s Hoodie', 'baby boy hoodie size 4 s4', '10.00', 3, 30, 'm', 4, 12, 'This is a custom Boy\'s Hoodie of size 4'),
(4, 'Boy\'s Zebra Costume', 'baby boy size 5 s5 zebra costume', '15.00', 4, 30, 'm', 5, 12, 'This is a Boy\'s Zebra Costume of the size 5'),
(5, 'Girl\'s Hoodie', 'baby girl hoodie size 4 s4', '16.00', 5, 30, 'f', 4, 13, 'This is a custom Girl\'s Hoodie of size 4'),
(6, 'Blue Bear Outfit', 'bear wear baby blue outfit size 2 s2', '14.00', 6, 30, 'u', 2, 19, 'This is a color blue baby\'s Outfit. Is a bear costume of size 2'),
(7, 'Brown Bear Outfit', 'bear wear baby brown outfit size 1 s1', '15.00', 7, 30, 'u', 1, 19, ''),
(8, 'Bear Outfit', 'bear wear baby outfit size 2 s2', '13.00', 8, 30, 'u', 2, 19, ''),
(9, 'Black/White Bear Outfit', 'bear wear baby white black outfit size 1', '20.00', 9, 30, 'u', 1, 19, ''),
(10, 'Girl\'s Boucle Dress Coat', 'Boucle Dress Coat Girl size 7', '24.00', 10, 30, 'f', 7, 11, ''),
(11, 'Crocodile Outfit', 'croco wear baby outfit size 2', '16.00', 11, 30, 'u', 2, 19, ''),
(12, 'Girl\'s Black fock with hat', 'fock with hat black girl size 7 s7', '26.00', 12, 30, 'f', 7, 11, ''),
(13, 'Girl\'s Black Party fock', 'girl black party fock size 8 s8', '30.00', 13, 30, 'f', 8, 11, ''),
(14, 'Girl\'s B/W Party Fock', 'girl black white party fock size 8 s8', '32.00', 14, 30, 'f', 8, 11, ''),
(15, 'Girl\'s Grey Fock', 'girl fock grey size 6 s6', '24.00', 15, 30, 'f', 6, 11, ''),
(16, 'Boy\'s Monster Hoodie', 'monster hoodie boy size 6', '24.00', 16, 30, 'm', 6, 10, ''),
(17, 'New Born Baby Pijamas', 'new born baby pijamas size 1', '8.00', 17, 30, 'u', 1, 14, ''),
(18, 'Baby Pink Rabiy Outfit', 'rabit wear baby pink outfit size 2', '11.00', 18, 30, 'u', 2, 19, ''),
(19, 'Baby Sweeter', 'size 4 sweeter baby cloth', '17.00', 19, 30, 'u', 4, 19, ''),
(20, 'Boy\'s Sleeping Sweeter', 'sleeping sweeter baby boy size 2', '14.00', 20, 30, 'm', 2, 12, ''),
(21, 'Batman Shirt & Shoes', 'unisex baby batman shirt shoes size 2', '15.00', 21, 30, 'u', 2, 19, ''),
(22, 'Baby Outfit', 'unisex baby outfit size 3', '14.00', 22, 30, 'u', 3, 19, ''),
(23, 'Tiger Boy\'s Hoodie', 'animal tiger baby boy hoodie size 7 s7', '19.00', 1, 50, 'm', 7, 12, ''),
(24, 'Orange Outfit', 'animal wear baby orange outfit size 2 s2', '14.00', 2, 30, 'u', 2, 19, ''),
(25, 'Tiger Boy\'s Hoodie', 'animal tiger baby boy hoodie size 5 s5', '19.00', 1, 50, 'm', 5, 12, ''),
(26, 'Boy\'s Hoodie', 'baby boy hoodie size 3 s3', '10.00', 3, 30, 'm', 3, 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `item_id` (`item_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_detail`
--

DROP TABLE IF EXISTS `post_detail`;
CREATE TABLE IF NOT EXISTS `post_detail` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  KEY `fk_user_id_post` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_detail`
--

INSERT INTO `post_detail` (`user_id`, `full_name`, `street_address`, `City`, `state`, `zip_code`, `country`) VALUES
(1, 'Katugampala Appuhamilage Don Sachith Rukshan Darshanapriya', '466, Welivita Road, Kaduwela', 'Colombo', 'Western', 94, 'Sri Lanka');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `promo_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image_id` int(11) NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`promo_id`),
  UNIQUE KEY `image_id_3` (`image_id`),
  KEY `image_id` (`image_id`),
  KEY `image_id_2` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promo_id`, `name`, `image_id`, `desc`) VALUES
(4, 'baby with a hat', 23, 'Easy to get what\'s best for your child'),
(5, '50 percent OFF for Cool Outfits', 24, 'Spend more than $100 and get 50% Discount for Any of our products'),
(6, 'Little Baby Basics', 25, 'Get to know what\'s best for your kid. Ask from our experts. Communicate with other parents. Have fun while Shopping');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_key` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1111',
  `auth_level` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `auth_level` (`auth_level`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `user_key`, `auth_level`) VALUES
(1, 'rukshan', 'ruk', '1111', 161042);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card_details`
--
ALTER TABLE `card_details`
  ADD CONSTRAINT `fk_user_id_card` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_gender_cust` FOREIGN KEY (`gender`) REFERENCES `gender` (`gender`),
  ADD CONSTRAINT `fk_user_id_customer` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_user_id_emp` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_cat_id_item` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`),
  ADD CONSTRAINT `fk_gender_item` FOREIGN KEY (`gender`) REFERENCES `gender` (`gender`),
  ADD CONSTRAINT `fk_image_id_item` FOREIGN KEY (`img_id`) REFERENCES `image` (`image_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_item_id_order` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `fk_user_id_order` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION;

--
-- Constraints for table `post_detail`
--
ALTER TABLE `post_detail`
  ADD CONSTRAINT `fk_user_id_post` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `image_id_promo` FOREIGN KEY (`image_id`) REFERENCES `image` (`image_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_auth_level_user` FOREIGN KEY (`auth_level`) REFERENCES `auth_level` (`auth_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
