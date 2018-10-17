-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2018 at 06:20 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `guitar_builder`
--

CREATE TABLE `guitar_builder` (
  `id` int(11) NOT NULL,
  `guitar_name` varchar(100) NOT NULL,
  `head_id` int(11) NOT NULL,
  `neck_id` int(11) NOT NULL,
  `body_id` int(11) NOT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guitar_builder`
--

INSERT INTO `guitar_builder` (`id`, `guitar_name`, `head_id`, `neck_id`, `body_id`, `amount`, `client_id`) VALUES
(1, 'Guitar 1', 2, 4, 3, '568', 3);

-- --------------------------------------------------------

--
-- Table structure for table `guitar_orders`
--

CREATE TABLE `guitar_orders` (
  `id` int(11) NOT NULL,
  `guitar_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `payment_type` char(1) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `date_ordered` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guitar_payments`
--

CREATE TABLE `guitar_payments` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `date_paid` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accs`
--

CREATE TABLE `tbl_accs` (
  `id` int(11) NOT NULL,
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
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_accs`
--

INSERT INTO `tbl_accs` (`id`, `type`, `fname`, `lname`, `gender`, `email`, `contact`, `address`, `username`, `password`, `profile_pic`, `status`) VALUES
(1, '1', 'Mark', 'gonzales', '', '', '', '\r\n            ', '', 'd41d8cd98f00b204e9800998ecf8427e', '5bc4e1c0478cf3.37431630.png', '1'),
(2, '2', 'mark', 'gonzales', 'm', 'email@email.com', '123123', 'asdasdasdasdasdasd\r\n            ', 'username', '5f4dcc3b5aa765d61d8327deb882cf99', '5bc4e1e3465303.11687254.png', '2'),
(3, '1', 'kym', 'carabeo', 'm', 'carabeokym@gmail.com', '091231231', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'kym123', '5f4dcc3b5aa765d61d8327deb882cf99', '5bc5229480fd75.47208202.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `datecreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `title`, `content`, `datecreated`) VALUES
(1, 'News Title', '', '2018-10-17 21:51:13'),
(2, 'News Title', 'News Content', '2018-10-17 21:51:52'),
(3, 'News Title', 'News Content', '2018-10-17 21:54:28'),
(4, 'News Title', 'News Content', '2018-10-17 21:58:11'),
(5, 'News Title', 'News Content', '2018-10-17 22:04:53'),
(6, 'News Title', 'News Content', '2018-10-17 22:05:14'),
(7, 'News Title', 'content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content ', '2018-10-17 22:07:08'),
(8, '', '', '2018-10-17 22:38:37'),
(9, '', '', '2018-10-17 22:50:23'),
(10, '', '', '2018-10-17 22:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parts`
--

CREATE TABLE `tbl_parts` (
  `id` int(11) NOT NULL,
  `part_type` char(1) DEFAULT NULL COMMENT '1 = head 2  = neck 3 = body',
  `part_name` varchar(100) DEFAULT NULL,
  `thickness` varchar(100) DEFAULT NULL,
  `description` text,
  `image` text,
  `price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `name`, `description`, `price`) VALUES
(1, 'Guitar Repair', 'Guitar Repair Description', '1100');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `token` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guitar_builder`
--
ALTER TABLE `guitar_builder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guitar_orders`
--
ALTER TABLE `guitar_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guitar_payments`
--
ALTER TABLE `guitar_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_accs`
--
ALTER TABLE `tbl_accs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_parts`
--
ALTER TABLE `tbl_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guitar_builder`
--
ALTER TABLE `guitar_builder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guitar_orders`
--
ALTER TABLE `guitar_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guitar_payments`
--
ALTER TABLE `guitar_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_accs`
--
ALTER TABLE `tbl_accs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_parts`
--
ALTER TABLE `tbl_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
