-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 31, 2018 at 12:53 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hotel-booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2018-08-24 01:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `RoomId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `userEmail`, `RoomId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`) VALUES
(1, 'email@email.com', 1, '20/05/2018', '25/05/2018', 'want it', 1, '2018-08-23 11:00:19'),
(2, 'email@email.com', 2, '20/05/2018', '25/05/2018', 'dssdds', 0, '2018-08-23 11:01:54'),
(3, 'email@email.com', 1, '20/05/2018', '25/05/2018', 'fffffff', 1, '2018-08-23 11:20:17'),
(4, 'email@email.com', 1, '20/05/2018', '25/05/2018', 'jjjjjjj', 0, '2018-08-24 01:16:52'),
(5, 'email2@email.com', 8, '27/08/2018', '30/08/2018', 'u with a blend of thoughtful extras and high-tech conveniences, our Superior Rooms are the perfect place to kick back and relax or prepare for the next exciting day. Featuring a warm grey palette and crisp white tones, the interiors convey a mood of relax', 0, '2018-08-25 08:36:52'),
(6, 'test@email.com', 2, '05/09/2018', '07/09/2018', 'Hello! ', 0, '2018-08-25 09:25:34'),
(7, 'email@email.com', 2, '30/09/2018', '10/10/2018', 'OH its working!!!!!', 1, '2018-08-30 03:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `contactquery`
--

CREATE TABLE `contactquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactquery`
--

INSERT INTO `contactquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(2, 'Sunhwa Kim', 'test01@email.com', '021021', 'ssssss', '2018-08-24 04:31:32', 1),
(3, 'Sunhwa Kim', 'test01@email.com', '021021', 'ssssss', '2018-08-24 04:34:52', 1),
(4, 'Sunhwa Kim', 'email@email.com', '021021', 'dadadsasd', '2018-08-24 04:35:10', NULL),
(5, 'Sunhwa Kim', 'email@email.com', '021021', 'dadadsasd', '2018-08-24 04:35:57', NULL),
(6, 'sunhwa kim', 'test01@email.com', '02102347761', 'SDI 2 project - Test for  Project Contact us page ', '2018-08-24 11:27:22', NULL),
(7, 'sunhwa kim', 'test01@email.com', '02102347761', 'SDI 2 project - Test for  Project Contact us page ', '2018-08-24 11:27:57', NULL),
(8, 'Alex', 'test01@email.com', '0210222033', 'say hello', '2018-08-25 06:39:40', NULL),
(9, 'Sunny', 'test@email.com', '0123456789', 'I\'m wondering that blah', '2018-08-25 09:26:23', NULL),
(10, 'Test', 'vvvv@email.com', '00000202', 'Message Message Message ', '2018-08-26 08:33:49', NULL),
(11, 'RAMAN', 'email111@email.cpm', '00000202', 'hahahahahahah', '2018-08-30 03:21:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `id` int(11) NOT NULL,
  `RoomFloor` varchar(10) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`id`, `RoomFloor`, `CreationDate`, `UpdationDate`) VALUES
(1, '1F', '2018-08-16 18:24:34', '2018-08-17 06:42:23'),
(2, '2F', '2018-08-16 18:24:50', NULL),
(3, '3F', '2018-08-16 16:25:03', NULL),
(4, '4F', '2018-08-16 16:25:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `RoomName` varchar(30) DEFAULT NULL,
  `RoomFloor` int(4) DEFAULT NULL,
  `RoomOverview` longtext,
  `PricePerDay` int(11) DEFAULT NULL,
  `RoomType` varchar(100) DEFAULT NULL,
  `BedType` varchar(100) DEFAULT NULL,
  `Suitable` varchar(50) DEFAULT NULL,
  `RoomImage1` varchar(120) DEFAULT NULL,
  `RoomImage2` varchar(120) DEFAULT NULL,
  `RoomImage3` varchar(120) DEFAULT NULL,
  `RoomImage4` varchar(120) DEFAULT NULL,
  `RoomImage5` varchar(120) DEFAULT NULL,
  `RoomImage6` varchar(120) DEFAULT NULL,
  `FreeBreakfast` int(11) DEFAULT NULL,
  `Kitchen` int(11) DEFAULT NULL,
  `PillowMenu` int(11) DEFAULT NULL,
  `ExtraBed` int(11) DEFAULT NULL,
  `Bathtub` int(11) DEFAULT NULL,
  `RegisterDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `RoomName`, `RoomFloor`, `RoomOverview`, `PricePerDay`, `RoomType`, `BedType`, `Suitable`, `RoomImage1`, `RoomImage2`, `RoomImage3`, `RoomImage4`, `RoomImage5`, `RoomImage6`, `FreeBreakfast`, `Kitchen`, `PillowMenu`, `ExtraBed`, `Bathtub`, `RegisterDate`, `UpdationDate`) VALUES
(1, 'Room A', 1, 'Welcome to our elegant rooms and suites, your home away from home in Auckland. Open and inviting, all 411 rooms and suites offer luxurious Dream Beds for a great night’s sleep, a plush armchair to relax in, work stations and large windows to let in the light. Ideal for business executives, families and leisure travellers, the thoughtful amenities, high-tech connectivity and handcrafted furnishings create the perfect haven of relaxation. \r\nFeaturing a warm grey palette and crisp white tones,\r\nthe interiors convey a mood of relaxed, contemporary cool.\r\nStay connected with friends and family\r\nwith our complimentary high-speed Internet,\r\nthen sink into our signature Dream Bed for a great night’s sleep.\r\nCOME FOR THE COMFORTS\r\nWelcoming you with a blend of thoughtful extras and high-tech conveniences, our Superior Rooms are the perfect place to kick back and relax or prepare for the next exciting day. Featuring a warm grey palette and crisp white tones, the interiors convey a mood of relaxed, contemporary cool. Stay connected with friends and family with our complimentary broadband Internet, then sink into our signature Dream Bed for a great night’s sleep. \r\n', 300, 'Standard', 'Twin or Double', 'Single', 'room1.jpg', 'room2.jpg', 'room3.jpg', 'room4.jpg', 'room5.jpg', 'room6.jpg', 0, 0, 0, 0, 0, '2018-08-20 10:46:23', '2018-08-25 07:51:02'),
(2, 'Room B', 1, 'Welcoming you with a blend of thoughtful extras and high-tech conveniences, our Superior Rooms are the perfect place to kick back and relax or prepare for the next exciting day. Featuring a warm grey palette and crisp white tones, the interiors convey a mood of relaxed, contemporary cool. Stay connected with friends and family with our complimentary high-speed Internet, then sink into our signature Dream Bed for a great night’s sleep.\r\nDesigned with tech-savvy executives and discerning travellers in mind, our Deluxe Room provides the perfect retreat, combining understated elegance with every high-tech convenience. While soft textures and modern furnishings convey a residential charm, the work desk and in-touch connectivity let you get down to business. At the end of a busy day, sink into our signature Dream Bed for a great night’s sleep.', 400, 'Superior', 'Twin or Double', 'Couple', 'room2.jpg', 'room3.jpg', 'room4.jpg', 'room5.jpg', 'room6.jpg', 'room7.jpg', 1, 0, 0, 0, 0, '2018-08-20 10:46:23', '2018-08-25 07:52:08'),
(3, 'Room C', 2, 'Stylish and modern with Club Privileges. 28 m². City views. Levels 9 & 10.\r\nNewly refurbished, these stylish rooms offer exclusive access to the Cordis Club Lounge on Level 10, with benefits including daily breakfast, afternoon tea treats and evening drinks and canapés.We are devoted to the happiness of all our guests – including the youngest ones. At Cordis, kids are encouraged to play, have fun, and go on adventures. With age appropriate amenities and entertainment, our Cordis Kids programme offers them an experience that they will always remember. \r\n\r\nTo reflect the wider Cordis brand values of well-being and environmental commitment, we’re pleased to introduce “Cody”, a character based on the endangered red panda, as our mascot to welcome our little VIPs. \r\n\r\n', 500, 'Delux', 'Queen Bed', 'Couple', 'room3.jpg', 'room4.jpg', 'room5.jpg', 'room6.jpg', 'room2.jpg', 'room7.jpg', 1, 1, 1, 1, 0, '2018-08-21 10:46:23', '2018-08-25 07:53:15'),
(4, 'Room D', 4, 'Capturing all the style and intimacy of private apartment, our elegant Presidential Suite provides the perfect sanctuary after a busy day. With 83m² at your disposal, including a spacious lounge and dining area, a separate bedroom and an oversize marble bathroom, there is plenty of space for you to relax in style. Treat your guests to a private dinner party, enjoy a rejuvenating rain shower, then sink into our signature Dream Bed for a blissful night’s sleep.\r\n\r\nAs a Presidential Suite guest, you also receive access to the exclusive Cordis Club Lounge on Level 10. Enjoy a host of privileges including complimentary daily breakfast, afternoon tea treats and evening drinks and canapés.  ', 600, 'Suite', 'Double * 2', 'Family', 'room4.jpg', 'room5.jpg', 'room6.jpg', 'room7.jpg', 'room1.jpg', 'room2.jpg', 1, 1, 1, 1, 1, '2018-08-21 10:46:23', '2018-08-25 07:47:48'),
(7, 'Room E', 5, 'Welcome to our elegant rooms and suites, your home away from home in Auckland. Open and inviting, all 411 rooms and suites offer luxurious Dream Beds for a great night’s sleep, a plush armchair to relax in, work stations and large windows to let in the light. Ideal for business executives, families and leisure travellers, the thoughtful amenities, high-tech connectivity and handcrafted furnishings create the perfect haven of relaxation. \r\nFeaturing a warm grey palette and crisp white tones,\r\nthe interiors convey a mood of relaxed, contemporary cool.\r\nStay connected with friends and family\r\nwith our complimentary high-speed Internet,\r\nthen sink into our signature Dream Bed for a great night’s sleep.\r\nCOME FOR THE COMFORTS\r\nWelcoming you with a blend of thoughtful extras and high-tech conveniences, our Superior Rooms are the perfect place to kick back and relax or prepare for the next exciting day. Featuring a warm grey palette and crisp white tones, the interiors convey a mood of relaxed, contemporary cool. Stay connected with friends and family with our complimentary broadband Internet, then sink into our signature Dream Bed for a great night’s sleep. \r\n', 350, 'Standard', 'Single', 'Single', 'room7.jpg', 'room2.jpg', 'room3.jpg', 'room4.jpg', 'room5.jpg', 'room6.jpg', 0, 0, 0, 0, 0, '2018-08-20 10:46:23', '2018-08-25 07:51:02'),
(8, 'Room F', 3, 'Welcoming you with a blend of thoughtful extras and high-tech conveniences, our Superior Rooms are the perfect place to kick back and relax or prepare for the next exciting day. Featuring a warm grey palette and crisp white tones, the interiors convey a mood of relaxed, contemporary cool. Stay connected with friends and family with our complimentary high-speed Internet, then sink into our signature Dream Bed for a great night’s sleep.\r\nDesigned with tech-savvy executives and discerning travellers in mind, our Deluxe Room provides the perfect retreat, combining understated elegance with every high-tech convenience. While soft textures and modern furnishings convey a residential charm, the work desk and in-touch connectivity let you get down to business. At the end of a busy day, sink into our signature Dream Bed for a great night’s sleep.', 400, 'Superior', 'Double', 'Couple', 'room5.jpg', 'room3.jpg', 'room4.jpg', 'room1.jpg', 'room6.jpg', 'room7.jpg', 1, 0, 0, 0, 1, '2018-08-20 10:46:23', '2018-08-25 07:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `RegisterDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `Address`, `RegisterDate`, `UpdationDate`) VALUES
(1, 'Sunhwa Kim', 'email@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', '02102347761', NULL, '2018-08-23 10:56:47', '2018-08-25 07:11:59'),
(2, 'Alex', 'email1@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', '021022202', NULL, '2018-08-25 08:35:03', NULL),
(3, 'Ramandepp', 'email2@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', '02739393', NULL, '2018-08-25 08:35:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactquery`
--
ALTER TABLE `contactquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contactquery`
--
ALTER TABLE `contactquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
