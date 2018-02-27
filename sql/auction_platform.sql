-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 03:22 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator_accounts`
--

CREATE TABLE `administrator_accounts` (
  `administrator_id` int(11) NOT NULL,
  `admin_name` varchar(45) NOT NULL,
  `admin_surname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `bid_id` int(11) NOT NULL,
  `Listed_Items_item_id` int(11) NOT NULL,
  `Buyer_Accounts_buyer_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `bid_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`bid_id`, `Listed_Items_item_id`, `Buyer_Accounts_buyer_id`, `feedback`, `bid_price`) VALUES
(1, 1, 1, 'Wow so nice', 1000),
(7, 1, 3, 'Not so good', 10000),
(9, 3, 1, 'nothing', 1200),
(12, 4, 1, 'So so', 100),
(13, 4, 1, 'so so so so so', 120),
(16, 2, 3, 'venice ', 550),
(17, 5, 3, 'ok done', 600000),
(18, 3, 3, 'sdfsd', 0),
(20, 1, 2, 'something', 300);

-- --------------------------------------------------------

--
-- Table structure for table `buyer_accounts`
--

CREATE TABLE `buyer_accounts` (
  `buyer_id` int(11) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer_accounts`
--

INSERT INTO `buyer_accounts` (`buyer_id`, `Fullname`, `Email`, `Password`) VALUES
(1, 'John', 'john@gmail.com', 'john'),
(2, 'Henry', 'henry@gmai.com', 'henry'),
(3, 'Simon', 'simon@gamil.com', 'simon');

-- --------------------------------------------------------

--
-- Table structure for table `listed_items`
--

CREATE TABLE `listed_items` (
  `item_id` int(11) NOT NULL,
  `item_description` varchar(45) NOT NULL,
  `item_category` varchar(45) NOT NULL,
  `item_start_price` varchar(45) NOT NULL,
  `item_reserve_price` varchar(45) NOT NULL,
  `item_end_date` varchar(45) NOT NULL,
  `Seller_Accounts_seller_id` int(11) NOT NULL,
  `img_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listed_items`
--

INSERT INTO `listed_items` (`item_id`, `item_description`, `item_category`, `item_start_price`, `item_reserve_price`, `item_end_date`, `Seller_Accounts_seller_id`, `img_url`) VALUES
(1, 'Ornate Mirror', 'Loose Furniture', '100', '200', '19/06/2018', 1, 'Mirror.jpg'),
(2, 'A Noble Lady of Venice', 'Paintings', '500', '600', '19/02/2018', 1, 'Nobel.jpeg'),
(3, 'The Thinker', 'Sculpture', '900', '1000', '19/06/2018', 1, 'the_thiker.jpg'),
(4, 'Table Fan', 'Loose Furniture', '50', '90', '29/06/2018', 1, 'table_image.jpg'),
(5, 'Mona Lisa', 'Paintings', '10000', '50000', '10/06/2018', 1, 'Monalisa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seller_accounts`
--

CREATE TABLE `seller_accounts` (
  `seller_id` int(11) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller_accounts`
--

INSERT INTO `seller_accounts` (`seller_id`, `Fullname`, `Email`, `Password`) VALUES
(1, 'test', 'sdfsd@sdf', 'sdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator_accounts`
--
ALTER TABLE `administrator_accounts`
  ADD PRIMARY KEY (`administrator_id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`bid_id`),
  ADD KEY `Buyer_Accounts_buyer_id` (`Buyer_Accounts_buyer_id`),
  ADD KEY `Listed_Items_item_id` (`Listed_Items_item_id`);

--
-- Indexes for table `buyer_accounts`
--
ALTER TABLE `buyer_accounts`
  ADD PRIMARY KEY (`buyer_id`);

--
-- Indexes for table `listed_items`
--
ALTER TABLE `listed_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `Seller_Accounts_seller_id` (`Seller_Accounts_seller_id`);

--
-- Indexes for table `seller_accounts`
--
ALTER TABLE `seller_accounts`
  ADD PRIMARY KEY (`seller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator_accounts`
--
ALTER TABLE `administrator_accounts`
  MODIFY `administrator_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `buyer_accounts`
--
ALTER TABLE `buyer_accounts`
  MODIFY `buyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `listed_items`
--
ALTER TABLE `listed_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seller_accounts`
--
ALTER TABLE `seller_accounts`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_3` FOREIGN KEY (`Buyer_Accounts_buyer_id`) REFERENCES `buyer_accounts` (`buyer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bids_ibfk_4` FOREIGN KEY (`Listed_Items_item_id`) REFERENCES `listed_items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `listed_items`
--
ALTER TABLE `listed_items`
  ADD CONSTRAINT `listed_items_ibfk_1` FOREIGN KEY (`Seller_Accounts_seller_id`) REFERENCES `seller_accounts` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
