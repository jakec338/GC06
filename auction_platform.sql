-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2018 at 07:12 AM
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
  `secretkey` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator_accounts`
--

INSERT INTO `administrator_accounts` (`administrator_id`, `secretkey`) VALUES
(27, '2418'),
(29, '5783');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `bid_id` int(11) NOT NULL,
  `Listed_Items_item_id` int(11) NOT NULL,
  `Buyer_Accounts_buyer_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `bid_price` double NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_accounts`
--

CREATE TABLE `buyer_accounts` (
  `buyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer_accounts`
--

INSERT INTO `buyer_accounts` (`buyer_id`) VALUES
(28),
(29);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_name` varchar(100) NOT NULL,
  `category_img_url` varchar(500) NOT NULL,
  `category_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_name`, `category_img_url`, `category_description`) VALUES
('Loose Furniture', 'furniture.jpg', 'This category is to give you a glance of the common/uncommon furniture items that you need in your home.'),
('Paintings', 'paintings.jpg', 'This category is filled with all the mindblowing paintings done by the prominent people of their time'),
('Sculpture', 'sculpture.jpg', 'This category has all the beautiful sculptures from medieval time to current era.');

-- --------------------------------------------------------

--
-- Table structure for table `completed_items`
--

CREATE TABLE `completed_items` (
  `bid_id` int(11) NOT NULL,
  `listed_item_id` int(11) NOT NULL,
  `bid_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `img_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `completed_items`
--

INSERT INTO `completed_items` (`bid_id`, `listed_item_id`, `bid_price`, `user_id`, `item_description`, `img_url`) VALUES
(61, 51, 700000, 28, 'Mirror', 'Mirror.jpg');

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
  `img_url` varchar(500) NOT NULL,
  `item_added_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listed_items`
--

INSERT INTO `listed_items` (`item_id`, `item_description`, `item_category`, `item_start_price`, `item_reserve_price`, `item_end_date`, `Seller_Accounts_seller_id`, `img_url`, `item_added_date`) VALUES
(52, 'TV', 'Loose Furniture', '4000', '8000', '2018-03-24', 27, 'Screen Shot 2018-01-27 at 2.20.36 PM.png', '2018-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `seller_accounts`
--

CREATE TABLE `seller_accounts` (
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller_accounts`
--

INSERT INTO `seller_accounts` (`seller_id`) VALUES
(27);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `privilege` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `privilege`, `user_type`, `Fullname`, `Email`, `Password`) VALUES
(27, 0, 3, 'Harry', 'me.hira.kafle@gmail.com', 'harry'),
(28, 2, 2, 'Simon', 'dextervishnukumar@gmail.com', 'simon'),
(29, 0, 2, 'David', 'dpnrau@gmail.com', 'david');

-- --------------------------------------------------------

--
-- Table structure for table `watching_auctions`
--

CREATE TABLE `watching_auctions` (
  `user_id` int(11) NOT NULL,
  `listed_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_name`);

--
-- Indexes for table `completed_items`
--
ALTER TABLE `completed_items`
  ADD PRIMARY KEY (`listed_item_id`);

--
-- Indexes for table `listed_items`
--
ALTER TABLE `listed_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `Seller_Accounts_seller_id` (`Seller_Accounts_seller_id`),
  ADD KEY `category_foreign_key_idx` (`item_category`);

--
-- Indexes for table `seller_accounts`
--
ALTER TABLE `seller_accounts`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `watching_auctions`
--
ALTER TABLE `watching_auctions`
  ADD PRIMARY KEY (`user_id`,`listed_item_id`),
  ADD KEY `listed_item_id` (`listed_item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `buyer_accounts`
--
ALTER TABLE `buyer_accounts`
  MODIFY `buyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `listed_items`
--
ALTER TABLE `listed_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `seller_accounts`
--
ALTER TABLE `seller_accounts`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator_accounts`
--
ALTER TABLE `administrator_accounts`
  ADD CONSTRAINT `administrator_accounts_ibfk_1` FOREIGN KEY (`administrator_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_3` FOREIGN KEY (`Buyer_Accounts_buyer_id`) REFERENCES `buyer_accounts` (`buyer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bids_ibfk_4` FOREIGN KEY (`Listed_Items_item_id`) REFERENCES `listed_items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buyer_accounts`
--
ALTER TABLE `buyer_accounts`
  ADD CONSTRAINT `buyer_accounts_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `listed_items`
--
ALTER TABLE `listed_items`
  ADD CONSTRAINT `listed_items_ibfk_1` FOREIGN KEY (`Seller_Accounts_seller_id`) REFERENCES `seller_accounts` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listed_items_ibfk_2` FOREIGN KEY (`item_category`) REFERENCES `categories` (`category_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seller_accounts`
--
ALTER TABLE `seller_accounts`
  ADD CONSTRAINT `seller_accounts_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `watching_auctions`
--
ALTER TABLE `watching_auctions`
  ADD CONSTRAINT `watching_auctions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `watching_auctions_ibfk_2` FOREIGN KEY (`listed_item_id`) REFERENCES `listed_items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
