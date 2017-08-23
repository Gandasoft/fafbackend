-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 23, 2017 at 05:25 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fafdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

CREATE TABLE `accommodation` (
  `id` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accommodation`
--

INSERT INTO `accommodation` (`id`, `Type`) VALUES
(1, 'half room'),
(2, 'standard room'),
(3, 'bachelor flat'),
(4, 'space');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `Street_Name` varchar(255) NOT NULL,
  `Street_Address` varchar(255) NOT NULL,
  `Lat` varchar(255) NOT NULL,
  `Longtd` varchar(255) NOT NULL,
  `Surburb` varchar(255) NOT NULL,
  `flat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adverts`
--

CREATE TABLE `adverts` (
  `Advert_id` int(11) NOT NULL,
  `Advert_owner` int(11) NOT NULL,
  `Accomodation_type` int(11) NOT NULL,
  `price` float NOT NULL,
  `Flat` int(11) NOT NULL,
  `Date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adverts`
--

INSERT INTO `adverts` (`Advert_id`, `Advert_owner`, `Accomodation_type`, `price`, `Flat`, `Date_posted`, `status`) VALUES
(3, 4, 1, 2000, 61, '2017-08-17 16:55:13', 2);

-- --------------------------------------------------------

--
-- Table structure for table `flat`
--

CREATE TABLE `flat` (
  `id` int(11) NOT NULL,
  `flat_name` varchar(255) NOT NULL,
  `room_number` int(11) NOT NULL,
  `Date_posted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`id`, `flat_name`, `room_number`, `Date_posted`) VALUES
(61, 'Anet Paterson', 100, 20161026),
(62, 'Winslow Edgson', 53, 20170511),
(63, 'Tedman Lenchenko', 60, 20170209),
(64, 'Cathee Rubertelli', 55, 20160904),
(65, 'Sebastiano Comino', 96, 20160827),
(66, 'Constancy Labroue', 80, 20161202),
(67, 'Harri Nation', 4, 20160916),
(68, 'Donnajean Greenham', 96, 20170403),
(69, 'Daune Caughte', 45, 20161221),
(70, 'Jilli Slide', 68, 20170723),
(71, 'Brianne Keme', 42, 20170603),
(72, 'Sean Clemett', 66, 20170329),
(73, 'Mariska Lilleycrop', 32, 20170129),
(74, 'Janessa Aseef', 83, 20161108),
(75, 'Petronille Yuryshev', 45, 20170116),
(76, 'Averill Farrent', 53, 20170124),
(77, 'Loralyn Tabord', 20, 20170329),
(78, 'Essa Hawkeswood', 56, 20170414),
(79, 'Emalia de Clercq', 89, 20170129),
(80, 'Earle Lytell', 28, 20161010),
(81, 'Ewen Joyce', 66, 20161004),
(82, 'Scarlet Forde', 33, 20161205),
(83, 'Brena Fantini', 60, 20160929),
(84, 'Alicea Andrzejewski', 82, 20161211),
(85, 'Tabb Vignal', 39, 20170510),
(86, 'Paton Hrishchenko', 96, 20170217),
(87, 'Liv Rupke', 74, 20161231),
(88, 'Noelani Chugg', 79, 20170716),
(89, 'Charlena Mazey', 59, 20170128),
(90, 'Bobby Franies', 48, 20170412);

-- --------------------------------------------------------

--
-- Table structure for table `gcmdevices`
--

CREATE TABLE `gcmdevices` (
  `gcmDevicesID` int(11) DEFAULT NULL,
  `registrationID` varchar(40) DEFAULT NULL,
  `product` varchar(50) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `serialNumber` varchar(50) DEFAULT NULL,
  `androidVersion` varchar(18) DEFAULT NULL,
  `manufacturer` varchar(7) DEFAULT NULL,
  `dateregistered` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `type`) VALUES
(1, 'Taken'),
(2, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` char(1) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `UserTypes` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Password`, `Age`, `Gender`, `phone_number`, `UserTypes`, `status`) VALUES
(4, 'mic', 'sdfsdfsdfsfd', 23, 'm', '0616276276', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `id` int(11) NOT NULL,
  `Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `Type`) VALUES
(1, 'flat Owner '),
(2, 'flat Seeker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`,`flat_id`),
  ADD KEY `fk_address_flat1_idx` (`flat_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `adverts`
--
ALTER TABLE `adverts`
  ADD PRIMARY KEY (`Advert_id`),
  ADD KEY `status_id` (`status`),
  ADD KEY `Advert_owner` (`Advert_owner`),
  ADD KEY `Accomodation_type` (`Accomodation_type`),
  ADD KEY `Flat` (`Flat`);

--
-- Indexes for table `flat`
--
ALTER TABLE `flat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserTypes` (`UserTypes`),
  ADD KEY `status_fk_idx` (`status`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodation`
--
ALTER TABLE `accommodation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `adverts`
--
ALTER TABLE `adverts`
  MODIFY `Advert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `flat`
--
ALTER TABLE `flat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_address_flat1` FOREIGN KEY (`flat_id`) REFERENCES `flat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `adverts`
--
ALTER TABLE `adverts`
  ADD CONSTRAINT `Adverts_ibfk_1` FOREIGN KEY (`Advert_owner`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `Adverts_ibfk_2` FOREIGN KEY (`Accomodation_type`) REFERENCES `accommodation` (`id`),
  ADD CONSTRAINT `Adverts_ibfk_3` FOREIGN KEY (`Flat`) REFERENCES `flat` (`id`),
  ADD CONSTRAINT `Adverts_ibfk_4` FOREIGN KEY (`status`) REFERENCES `status` (`status_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`UserTypes`) REFERENCES `usertypes` (`id`),
  ADD CONSTRAINT `status_fk` FOREIGN KEY (`status`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
