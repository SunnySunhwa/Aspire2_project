-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 25, 2018 at 10:08 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `carRental`
--

-- --------------------------------------------------------

--
-- Table structure for table `BOOKING`
--

CREATE TABLE `BOOKING` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BOOKING`
--

INSERT INTO `BOOKING` (`id`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`) VALUES
(2, 'via1229@gmail.com', 2, '30/09/2018', '10/10/2018', 'Booking now', 0, '2018-09-09 09:00:55'),
(3, 'email@email.com', 2, '05/09/2018', '10/09/2018', 'Booking', 1, '2018-09-09 09:07:53'),
(4, 'email@email.com', 3, '03/10/2018', '07/10/2018', 'Booking messages', 2, '2018-09-09 10:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `BRANDS`
--

CREATE TABLE `BRANDS` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BRANDS`
--

INSERT INTO `BRANDS` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'AUDI', '2018-08-18 16:24:34', '2018-09-02 03:16:23'),
(2, 'BMW', '2018-08-18 16:24:50', '2018-09-11 12:21:09'),
(3, 'FORD', '2018-09-02 03:16:10', '2018-09-23 03:46:56'),
(4, 'TOYOTA', '2018-09-01 15:16:10', '2018-09-12 09:54:17'),
(5, 'BENZ', '2018-09-04 15:16:10', '2018-09-12 09:54:22'),
(6, 'JEEP', '2018-09-12 08:32:53', '2018-09-12 09:51:52'),
(7, 'KIA', '2018-09-12 09:52:02', NULL),
(8, 'BENTLEY', '2018-09-12 09:52:41', NULL),
(9, 'FERRARI', '2018-09-12 09:53:02', NULL),
(11, 'HONDA', '2018-09-12 09:53:26', NULL),
(12, 'LINCOLN', '2018-09-12 09:53:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `CONTACTUS_QUERY`
--

CREATE TABLE `CONTACTUS_QUERY` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CONTACTUS_QUERY`
--

INSERT INTO `CONTACTUS_QUERY` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(1, 'Sunhwa', 'sunhwaemail@gmail.com', '2147483647', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2018-08-18 13:03:07', 1),
(2, 'Sunhwa', 'suemail@gmail.com', '2147483647', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2018-08-18 13:03:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(15) DEFAULT NULL,
  `Level` int(10) NOT NULL,
  `RegisterDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `Level`, `RegisterDate`, `UpdationDate`, `Status`) VALUES
(1, 'admin', 'admin@email.com', '21232f297a57a5a743894a0e4a801fc3', '00000000', 2, '2018-09-09 09:47:58', '2018-09-11 01:39:31', 0),
(2, 'sunhwa kim', 'via1229@gmail.com', '1253208465b1efa876f982d8a9e73eef', '02102347761', 1, '2018-09-03 10:47:59', '2018-09-11 10:40:57', 0),
(3, 'Sunny Kim', 'email@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', '022223333', 0, '2018-09-09 03:00:24', '2018-09-25 10:02:28', 0),
(4, 'Alex', 'alex@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', '32342323', 0, '2018-09-09 03:03:00', '2018-09-25 19:52:12', 1),
(5, 'Ankit', 'ankit@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', '0333333336', 0, '2018-09-10 11:12:23', '2018-09-25 19:42:30', 1),
(6, 'Raman', 'Raman@email.com', '88e2d8cd1e92fd5544c8621508cd706b', '000322322', 0, '2018-09-10 11:27:53', '2018-09-24 11:31:41', 0),
(7, 'Lankesh', 'Lankesh@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', '333392221', 0, '2018-09-10 11:27:53', '2018-09-24 11:31:49', 0),
(8, 'Param', 'Param@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 0, '2018-09-10 11:29:11', '2018-09-24 11:31:55', 0),
(9, 'George', 'George@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 0, '2018-09-10 11:29:11', '2018-09-24 11:32:01', 0),
(10, 'Yashwan', 'yashwan@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', '00000000', 0, '2018-09-10 11:30:57', '2018-09-25 18:38:38', 0),
(11, 'Staff', 'staff@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 1, '2018-09-10 11:30:57', '2018-09-24 11:36:05', 1),
(12, 'Test full name', 'test4@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', '0123456789', 0, '2018-09-25 21:46:02', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `VEHICLES`
--

CREATE TABLE `VEHICLES` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `RegisterDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `VEHICLES`
--

INSERT INTO `VEHICLES` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `RegisterDate`, `UpdationDate`) VALUES
(1, 'Mustang GT Convertible', 3, 'Does it get any sweeter than a Mustang convertible rental? Style, muscle, and the wind in your hair - especially if you\' re headed to some place warm. When you think Mustang convertible car rental, think Budget. Similar make and models include the following: Mustang GT Convertible and Chevrolet Camaro Convertible SS. Does it get any sweeter than a Mustang convertible rental? Style, muscle, and the wind in your hair - especially if you\' re headed to some place warm. When you think Mustang convertible car rental, think Budget. Similar make and models include the following: Mustang GT Convertible and Chevrolet Camaro Convertible SS. \r\n\r\n', 400, 'Petrol', 2016, 7, 'mustang/image1.jpg', 'mustang/image2.jpg', 'mustang/image3.jpg', 'mustang/image4.jpg', '', 1, 1, 1, 1, 1, 1, 1, '2018-08-19 11:46:23', '2018-09-12 09:51:04'),
(2, 'Audi A-8', 1, 'Does it get any sweeter than a Audi A-8 rental? Style, and luxury. When you think Audi A-8 car rental, think Budget.', 450, 'Diesel', 2016, 4, 'Audi/image1.jpg', 'Audi/image2.jpg', 'Audi/image3.jpg', 'Audi/image4.jpg', '', 0, 1, 1, 1, 1, 1, 0, '2018-08-21 23:46:23', '2018-09-05 22:27:14'),
(3, 'BMW M850i', 2, 'Does it get any sweeter than a BMW M850i series rental? Style, and luxury.The BMW M850i xDrive fully unleashes the race car genes of the BMW 8 Series Coupé. The TwinPower Turbo 8-cylinder petrol engine with a 4.4 litre displacement and 390 kW (530 hp) makes this fact very clear with every meter travelled. True racecar features make the motorsports genes come to life, such as two Twinscroll turbochargers, specially coated cylinder linings and separately controlled cooling circuits. When you think Audi A-8 car rental, think Budget.', 800, 'Diesel', 2018, 4, 'BMW/image1.jpg', 'BMW/image2.jpg', 'BMW/image3.jpg', 'BMW/image4.jpg', '', NULL, 1, 1, 1, 1, 1, 1, '2018-08-22 23:46:23', '2018-09-12 10:02:49'),
(4, 'Toyota corolla GX', 4, 'Bursting with impressive features the Corolla Sedan is a fantastic proposition for businesses and families alike.', 300, 'Petrol', 2017, 5, 'Toyota/image1.jpg', 'Toyota/image2.jpg', 'image4.jpg', 'image3.jpg', '', 2, 1, 1, 1, 1, 1, 4, '2018-08-22 23:46:23', '2018-09-12 08:28:43'),
(5, 'BMW 3 series', 2, 'Best in class and low in price with great comfort, speed and luxury. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 180, 'Petrol', 2010, 5, 'BMW3SERIES/image1.jpg', 'image2.jpg', 'image3.jpg', 'BMW3SERIES/image4.jpg', '', 1, NULL, NULL, 1, 1, 1, 1, '2018-09-09 23:46:23', '2018-09-11 10:53:59'),
(6, 'Mercedez benz s class', 5, 'Best in class and low in price with great comfort, speed and luxury.', 700, 'Diesel', 2010, 5, 'benz/image1.jpg', 'benz/image2.jpg', 'benz/image3.jpg', 'benz/image4.jpg', 'benz/image5.jpg', 0, 0, 1, 1, 1, 1, 1, '2018-09-10 22:46:23', '2018-09-11 09:36:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BOOKING`
--
ALTER TABLE `BOOKING`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `BRANDS`
--
ALTER TABLE `BRANDS`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CONTACTUS_QUERY`
--
ALTER TABLE `CONTACTUS_QUERY`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `VEHICLES`
--
ALTER TABLE `VEHICLES`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BOOKING`
--
ALTER TABLE `BOOKING`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `BRANDS`
--
ALTER TABLE `BRANDS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `CONTACTUS_QUERY`
--
ALTER TABLE `CONTACTUS_QUERY`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `VEHICLES`
--
ALTER TABLE `VEHICLES`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
