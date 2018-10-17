-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2018 at 01:47 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_final`
--
CREATE DATABASE IF NOT EXISTS `db_final` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_final`;

-- --------------------------------------------------------

--
-- Table structure for table `guitar_builder`
--

CREATE TABLE IF NOT EXISTS `guitar_builder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guitar_name` varchar(100) NOT NULL,
  `head_id` int(11) NOT NULL,
  `neck_id` int(11) NOT NULL,
  `body_id` int(11) NOT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `guitar_builder`
--

INSERT INTO `guitar_builder` (`id`, `guitar_name`, `head_id`, `neck_id`, `body_id`, `amount`, `client_id`) VALUES
(1, 'Guitar 1', 2, 4, 3, '568', 3);

-- --------------------------------------------------------

--
-- Table structure for table `guitar_orders`
--

CREATE TABLE IF NOT EXISTS `guitar_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guitar_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `payment_type` char(1) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `date_ordered` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `guitar_payments`
--

CREATE TABLE IF NOT EXISTS `guitar_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `date_paid` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accs`
--

CREATE TABLE IF NOT EXISTS `tbl_accs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(1) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `address` text,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile_pic` text,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_accs`
--

INSERT INTO `tbl_accs` (`id`, `type`, `fname`, `lname`, `gender`, `email`, `contact`, `address`, `username`, `password`, `profile_pic`, `status`) VALUES
(1, '1', 'Mark', 'gonzales', '', '', '', '\r\n            ', '', 'd41d8cd98f00b204e9800998ecf8427e', '5bc4e1c0478cf3.37431630.png', '1'),
(2, '2', 'mark', 'gonzales', 'm', 'email@email.com', '123123', 'asdasdasdasdasdasd\r\n            ', 'username', '5f4dcc3b5aa765d61d8327deb882cf99', '5bc4e1e3465303.11687254.png', '2'),
(3, '1', 'kym', 'carabeo', 'm', 'carabeokym@gmail.com', '091231231', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'kym123', '5f4dcc3b5aa765d61d8327deb882cf99', '5bc5229480fd75.47208202.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parts`
--

CREATE TABLE IF NOT EXISTS `tbl_parts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `part_type` char(1) DEFAULT NULL COMMENT '1 = head 2  = neck 3 = body',
  `part_name` varchar(100) DEFAULT NULL,
  `thickness` varchar(100) DEFAULT NULL,
  `description` text,
  `image` text,
  `price` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_parts`
--

INSERT INTO `tbl_parts` (`id`, `part_type`, `part_name`, `thickness`, `description`, `image`, `price`) VALUES
(1, '1', 'Mahogany', '1', '                                                                                                                                Description                                                                                                ', '5bc4ce51118ab1.91776439.png', '5001'),
(2, '1', 'Coa', '9', ' It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '5bc4c2e5c86660.29100170.png', '12'),
(3, '3', 'body', '1', 'lormasddsadsa  a dsa dsadsa  ddsa', '5bc4ca3cdb8812.58251953.png', '500'),
(4, '2', 'neck wood', '10', 'sadasdasdasd lopweoiajsdoma12asd asd', '5bc520aee28370.32204447.png', '56');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE IF NOT EXISTS `verification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_id` int(11) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `token` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
