-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 11:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apartment sales system`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `aprtID` int(11) NOT NULL,
  `adType` varchar(5) NOT NULL,
  `beds` int(11) NOT NULL,
  `baths` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `addrs` varchar(250) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(350) NOT NULL,
  `price` int(11) NOT NULL,
  `negotiable` tinyint(1) NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL,
  `approved` varchar(5) NOT NULL DEFAULT 'NULL',
  `sellerMail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`aprtID`, `adType`, `beds`, `baths`, `size`, `country`, `city`, `town`, `addrs`, `title`, `description`, `price`, `negotiable`, `img1`, `img2`, `img3`, `approved`, `sellerMail`) VALUES
(1, 'sale', 4, 1, 1200, 'Sri Lanka', 'Attidiya', '', 'manthreemulla road , attidiya', '8 perch single story house sale in attidiya', '8 perch single story house sale in attidiya manthreemulla road \r\n\r\n500 meters to attidiya bekariya junction \r\n\r\n4 bedroom \r\n\r\n1 bathroom \r\n\r\n1 servant toilet \r\n\r\nLarge living area ', 19000000, 1, 'images/Apartments/1_houseFront.jpg', 'images/Apartments/1_inside.jpg', 'images/Apartments/1_outside.jpg', 'NULL', 'hulk54@gmail.com'),
(2, 'sale', 3, 2, 860, 'Sri Lanka', 'Colombo', 'Borella', 'Ovel View Residencies,Lesli Ranagala Road, Borella', 'Luxury Apartment for Sale Borella', 'Three bed room apartment for immediate sale', 27500000, 0, 'images/Apartments/2_aprtoverview.jpg', 'images/Apartments/2_bathroom.jpg', 'images/Apartments/2_inside.jpg', '1', 'hulk54@gmail.com'),
(3, 'sale', 4, 2, 1400, 'Sri Lanka', 'Colombo', 'Borella', '12th Floor, Treasure Trove, Cotta Road, Boralla.', 'Luxury 4 Bed Room Apartment for Sale in Borella', 'One attached bathroom, one common bathroom\r\n\r\nSeparate servant room &amp; bathroom\r\n\r\nFully air conditioned\r\n\r\nFurnished pantry area with gas line &amp; cooker hob.\r\n\r\nWith hot water, Electricity &amp; water supply \r\n\r\n2 parking slots with elevator parking.\r\n\r\nSwimming pool &amp; gym facilities\r\n\r\nPrivate security gards for elevator access', 68000000, 1, 'images/Apartments/3_fitted (1).jpg', 'images/Apartments/3_fitted (2).jpg', 'images/Apartments/3_fitted.jpg', 'NULL', 'johndoe@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `email` varchar(250) NOT NULL,
  `firstName` varchar(150) NOT NULL,
  `lastName` varchar(150) NOT NULL,
  `message` varchar(500) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payID` int(11) NOT NULL,
  `paymentType` varchar(20) NOT NULL,
  `package` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userfavs`
--

CREATE TABLE `userfavs` (
  `email` varchar(250) NOT NULL,
  `accType` varchar(10) NOT NULL,
  `aprtID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(250) NOT NULL,
  `fName` varchar(200) NOT NULL,
  `lName` varchar(200) NOT NULL,
  `addrs` varchar(500) DEFAULT NULL,
  `accType` varchar(10) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile` varchar(100) NOT NULL DEFAULT 'images/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `fName`, `lName`, `addrs`, `accType`, `phoneNo`, `password`, `profile`) VALUES
('hulk54@gmail.com', 'Bruce', 'Banner', '123 Smith Avenue', 'seller', 764909875, 'Bruce49', 'images/Profiles/hulk54@gmail.com_seller_ruffalo_a.png'),
('johndoe@gmail.com', 'John', 'Doe', 'No15 , old street, jaffna', 'seller', 764958395, 'John342', 'images/user.png'),
('peter@gmail.com', 'Peter', 'Parker', 'No28 , Suhada Road, Anuradhapura', 'seller', 761253495, 'Peter06', 'images/user.png'),
('sachinthakaa86@gmail.com', 'Sachinthaka', 'Ayeshmantha', '138/k Ihalayagoda Gampaha', 'buyer', 715886675, 'qwerty1234', 'images/user.png'),
('sachinthakaa86@gmail.com', 'Sachinthaka', 'Ayeshmantha', '138/k Ihalayagoda Gampaha', 'seller', 715886675, 'qwerty1234', 'images/user.png'),
('sachinthakaa86@gmail.com', 'Sachinthaka', 'Ayeshmantha', '138/k Ihalayagoda Gampaha', 'staff', 715886675, 'admin123', 'images/user.png'),
('tonyrulez@gmail.com', 'Tony', 'Stark', '10880 Malibu Point, 90265', 'seller', 716394556, 'Tony3000', 'images/user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`aprtID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payID`);

--
-- Indexes for table `userfavs`
--
ALTER TABLE `userfavs`
  ADD PRIMARY KEY (`email`,`accType`,`aprtID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`,`accType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `aprtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
