-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 24, 2021 at 07:49 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estore`
--

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

DROP TABLE IF EXISTS `parcel`;
CREATE TABLE IF NOT EXISTS `parcel` (
  `parcelId` int(11) NOT NULL AUTO_INCREMENT,
  `buyerId` int(11) NOT NULL,
  `sellerId` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `orderID` text NOT NULL,
  `chooseColor` varchar(255) DEFAULT NULL,
  `chooseSize` varchar(255) DEFAULT NULL,
  `is_wantQty` int(11) NOT NULL,
  `parcelStatus` int(11) NOT NULL,
  PRIMARY KEY (`parcelId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`parcelId`, `buyerId`, `sellerId`, `prodId`, `orderID`, `chooseColor`, `chooseSize`, `is_wantQty`, `parcelStatus`) VALUES
(13, 12, 11, 9, 'ES-21230232', 'Brown', '23', 1, 2),
(12, 12, 11, 10, 'ES-21230232', 'Black', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

DROP TABLE IF EXISTS `productcategories`;
CREATE TABLE IF NOT EXISTS `productcategories` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryImage` text,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategories`
--

INSERT INTO `productcategories` (`cid`, `categoryName`, `categoryImage`) VALUES
(1, 'GADGET', 'assets/productimage/gadget.jpg\r\n'),
(2, 'Men Apparel', 'assets/productimage/mens_apparel.jpg\r\n\r\n'),
(3, 'Women Apparel', 'assets/productimage/women_aparel.jpg\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `prodImage` text NOT NULL,
  `productDescription` text NOT NULL,
  `catID` int(11) NOT NULL,
  `prodPrice` int(11) NOT NULL,
  `shippingFee` int(11) NOT NULL,
  `prodCondiion` int(11) NOT NULL,
  `prodColor` text NOT NULL,
  `prodSize` text NOT NULL,
  `prodStockQty` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `userId`, `productName`, `prodImage`, `productDescription`, `catID`, `prodPrice`, `shippingFee`, `prodCondiion`, `prodColor`, `prodSize`, `prodStockQty`) VALUES
(9, 11, 'shoesboi', 'assets/productimage/jbjhb.jpg', 'sadasdada', 2, 2313, 23, 1, 'a:1:{i:0;s:5:\"brown\";}', 'a:2:{i:0;s:2:\"34\";i:1;s:2:\"23\";}', 23),
(10, 11, 'baggyboy', 'assets/productimage/th.jpg', 'asdrwwe', 2, 34234, 233, 1, 'a:2:{i:0;s:5:\"black\";i:1;s:5:\"brown\";}', '', 34),
(8, 11, 'baggurl', 'assets/productimage/bh.jpg', 'asdasdsasd', 3, 323, 213, 2, 'a:1:{i:0;s:4:\"pink\";}', '', 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `mid_name` varchar(255) NOT NULL,
  `userAddress` text,
  `email` varchar(255) NOT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `terms_and_condition` int(11) DEFAULT NULL,
  `password` text NOT NULL,
  `user_type` int(11) DEFAULT NULL,
  `contactNo` varchar(12) DEFAULT NULL,
  `current_location` int(11) DEFAULT NULL,
  `product_focus` int(11) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `last_name`, `first_name`, `mid_name`, `userAddress`, `email`, `is_active`, `created_at`, `terms_and_condition`, `password`, `user_type`, `contactNo`, `current_location`, `product_focus`) VALUES
(12, 'Basta ', 'Cliff', 'Basta', 'konoha village', 'Cliff@gmail.com', 1, NULL, NULL, '8cb2237d0679ca88db6464eac60da96345513964', 3, '09359452475', NULL, 0),
(11, 'nawara', 'natagpuan', 'gone', NULL, 'okkaayo@gmail.com', 1, NULL, NULL, '8cb2237d0679ca88db6464eac60da96345513964', 2, '09999999999', 3, 2),
(13, 'uy', 'prince', 'pating', NULL, 'prince@gmail.com', 1, NULL, NULL, '8cb2237d0679ca88db6464eac60da96345513964', 3, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(11) NOT NULL,
  `usertypeName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `usertypeName`) VALUES
(1, 'ADMIN'),
(2, 'SELLER'),
(3, 'BUYER');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
