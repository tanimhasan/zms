-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 08:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Rakib', 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cageNumber` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `image`, `cageNumber`, `description`) VALUES
(1, 'Tiger', 'upload/4ea1d059fc.jpg', '12301', 'The Bengal tiger is a tiger from a specific population of the Panthera tigris tigris subspecies that is native to the Indian subcontinent. It is threatened by poaching, loss, and fragmentation of habitat, and was estimated at comprising fewer than 2,500 individuals by 2011.'),
(2, 'Giraffe', 'upload/2b50d57d8b.jpg', '12302', 'The reticulated giraffe (Giraffa camelopardalis reticulata), also known as the Somali giraffe, is a subspecies of giraffe native to the Horn of Africa. It lives in Somalia, southern Ethiopia, and northern Kenya. There are approximately 8,500 individuals living in the wild.');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `app_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_phone` varchar(100) NOT NULL,
  `owner_email` varchar(100) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `pet_age` varchar(100) NOT NULL,
  `pet_problem` text NOT NULL,
  `choose_date` date NOT NULL,
  `choose_time` varchar(100) NOT NULL,
  `choose_doctor` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`app_id`, `user_id`, `owner_name`, `owner_phone`, `owner_email`, `pet_name`, `pet_age`, `pet_problem`, `choose_date`, `choose_time`, `choose_doctor`, `status`) VALUES
(1, 3, 'Rakib', '01881870080', 'rakib@gmail.com', 'Cat', '2', 'Nose problem', '2021-02-19', '7pm to 9pm', 'Dr. Deepshikha Singh', 0),
(2, 3, 'Hasan', '01636100375', 'hasan@gmail.com', 'Dog', '2', 'Leg problem', '2021-02-28', '10am to 12am', 'Dr. Deepshikha Singh', 1),
(4, 4, 'Karim', '01787890000', 'karim@gmail.com', 'Tiger', '3', 'Delivery problem', '2021-03-17', '7pm to 9pm', 'Dr. Deepshikha Singh', 1),
(5, 6, 'Rakib Hasan', '01787890000', 'rakib@gmail.com', 'Lion', '5', 'Leg problem', '2021-03-31', '10am to 12am', 'Dr. Sujay S Gowda', 1),
(7, 6, 'nafis', '01787890000', 'nafis@gmail.com', 'dog', '3', 'Leg Problem', '2021-03-10', '7pm to 9pm', 'Dr. Deepshikha Singh', 1),
(8, 6, 'Rahat', '01787890080', 'rahat@gmail.com', 'Lion', '5', 'Nose problem', '2021-03-18', '10am to 12am', 'Dr. Vikas Mahajan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Rakib Hasan', 'rakib@gmail.com', '01881870090', 'Test Message');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `phone`, `category`) VALUES
(1, 'Dr. Md. Luthfor Rahman', 'luthfor75@gmail.com', '01731492093', 'Veterinary Surgeon'),
(2, 'Dr. Kazi Mujibur Rahman', 'kazi@gmail.com', '01715016218 ', 'Vet Dentist');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `quantity`, `weight`, `category`, `cost`) VALUES
(1, 'Kiki BD Egg Food for Birds', '5', '150gm', 'bird', '1000tk'),
(2, 'Alpo Adult Beef', '3', '20kg', 'Dog', '4500'),
(3, 'Brit Care Puppy Milk', '4', '250g', 'Dog', '1250'),
(4, 'Adult Beef', '3', '200gm', 'tiger', '600tk');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `managerName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `managerName`, `email`, `phone`, `password`, `status`) VALUES
(13, 'Tanim', 'tanim@gmail.com', '01881873060', '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pay_number` varchar(255) NOT NULL,
  `sent_number` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `adult_num` int(11) NOT NULL,
  `child_num` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `name`, `phone`, `email`, `pay_number`, `sent_number`, `booking_date`, `adult_num`, `child_num`, `status`) VALUES
(1, 0, 'Rakib Hasan', '01881870090', 'taniimhasan@gmail.com', 'Bkash - 0170 0000000', '01881873060', '2021-02-18', 2, 0, 0),
(2, 0, 'Rafi Taohid', '01881870000', 'rafi@gmail.com', 'Nagad - 0170 0000000', '01881873090', '2021-02-12', 4, 0, 1),
(3, 0, 'Tanim', '01881870090', 'tanim@gmail.com', 'Rocket- 0167 0000000', '01681873090', '2021-02-15', 3, 2, 0),
(4, 6, 'Karim', '01881010060', 'karim@gmail.com', 'Bkash - 0170 0000000', '01787889090', '2021-02-15', 2, 2, 1),
(5, 6, 'ekram', '01881010060', 'ekram@gmail.com', 'Nagad - 0170 0000000', '01787889090', '2021-02-12', 2, 3, 1),
(6, 8, 'Naim', '01881873060', 'naim@gmail.com', 'Bkash - 0170 0000000', '01787889090', '2021-03-24', 5, 2, 1),
(7, 8, 'Fakrul', '01881873060', 'Fakrul@gmail.com', 'Nagad - 0170 0000000', '01787889090', '2021-03-24', 10, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `pass`) VALUES
(1, 'rakib ', 'rakibhasan@gmail.com', '0', '1234'),
(2, 'tanim', 'tanim@gmail.com', '0', '123'),
(3, 'rafi', 'rafi@gmail.com', '0', '123456'),
(4, 'rahim', 'rahim@gmail.com', '0', '123'),
(5, 'Mehedi', 'mehedi@gmail.com', '0', '123'),
(6, 'Md. Rakib Hasan', 'rakib@gmail.com', '01881873060', '123'),
(7, 'fajlul', 'fajlul@gmail.com', '01881873080', '123'),
(8, 'rafiiii', 'rafii@gmail.com', '01789999999', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
