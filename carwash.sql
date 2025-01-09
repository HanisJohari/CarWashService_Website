-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 09, 2025 at 10:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carwash`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_sales` ()   BEGIN
    DECLARE i INT DEFAULT 1;
    DECLARE admin_id INT DEFAULT 1;

    WHILE i <= 72 DO
        INSERT INTO sale (ADMIN_ID, other_columns)
        VALUES (admin_id, 'other_values');

        -- Cycle through 1, 2, 3
        SET admin_id = admin_id + 1;
        IF admin_id > 3 THEN
            SET admin_id = 1;
        END IF;

        SET i = i + 1;
    END WHILE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` int(10) NOT NULL,
  `ADMIN_NAME` varchar(30) NOT NULL,
  `ADMIN_CONTACT` int(10) NOT NULL,
  `ADMIN_EMAIL` varchar(30) NOT NULL,
  `ADMIN_USERNAME` varchar(20) NOT NULL,
  `ADMIN_PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `ADMIN_NAME`, `ADMIN_CONTACT`, `ADMIN_EMAIL`, `ADMIN_USERNAME`, `ADMIN_PASSWORD`) VALUES
(1, 'Hanis', 123456789, 'hanis@gmail.com', 'hanis123', '123'),
(2, 'Sha', 198765431, 'sha@gmail.com', 'sha456', '456'),
(3, 'Lela', 112233445, 'lela@gmail.com', 'lela789', '789');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BOOKING_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `BOOKING_DATE` date NOT NULL,
  `TIME_SLOT` varchar(50) NOT NULL,
  `BOOKING_STATUS` varchar(20) NOT NULL,
  `PACKAGE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BOOKING_ID`, `USER_ID`, `BOOKING_DATE`, `TIME_SLOT`, `BOOKING_STATUS`, `PACKAGE_ID`) VALUES
(1, 21, '2024-10-15', '12pm-2pm', 'Confirm', 3),
(2, 22, '2024-11-24', '12pm-2pm', 'Confirm', 4),
(3, 23, '2024-11-27', '12pm-2pm', 'Confirm', 3),
(4, 24, '2024-12-17', '12pm-2pm', 'Cancelled', 4),
(5, 25, '2024-10-04', '3pm-6pm', 'Confirm', 5),
(6, 95, '2024-02-03', '12pm-2pm', 'Confirm', 3),
(7, 27, '2024-07-13', '3pm-6pm', 'Confirm', 4),
(8, 28, '2024-05-20', '9am-11am', 'Confirm', 5),
(9, 29, '2024-01-18', '3pm-6pm', 'Confirm', 5),
(10, 30, '2024-09-18', '3pm-6pm', 'Confirm', 5),
(11, 31, '2024-07-07', '9am-11am', 'Confirm', 4),
(12, 32, '2024-07-04', '7pm-9pm', 'Pending', 4),
(13, 33, '2024-12-18', '7pm-9pm', 'Confirm', 4),
(14, 34, '2024-03-18', '7pm-9pm', 'Pending', 3),
(15, 35, '2024-09-26', '3pm-6pm', 'Confirm', 4),
(16, 36, '2024-05-09', '7pm-9pm', 'Cancelled', 5),
(17, 37, '2024-01-14', '7pm-9pm', 'Cancelled', 5),
(18, 38, '2024-06-08', '7pm-9pm', 'Confirm', 4),
(19, 39, '2024-08-02', '9am-11am', 'Confirm', 5),
(20, 40, '2024-05-09', '3pm-6pm', 'Pending', 4),
(21, 41, '2024-04-25', '3pm-6pm', 'Pending', 4),
(22, 42, '2024-12-05', '9am-11am', 'Confirm', 4),
(23, 43, '2024-04-26', '12pm-2pm', 'Pending', 5),
(24, 44, '2024-09-20', '9am-11am', 'Cancelled', 3),
(25, 45, '2024-02-06', '3pm-6pm', 'Cancelled', 3),
(26, 46, '2024-11-21', '9am-11am', 'Confirm', 4),
(27, 47, '2024-04-19', '3pm-6pm', 'Confirm', 5),
(28, 48, '2024-01-20', '12pm-2pm', 'Cancelled', 5),
(29, 49, '2024-12-15', '3pm-6pm', 'Cancelled', 3),
(30, 50, '2024-11-25', '9am-11am', 'Cancelled', 5),
(31, 51, '2024-05-06', '12pm-2pm', 'Cancelled', 3),
(32, 52, '2024-12-18', '3pm-6pm', 'Confirm', 4),
(33, 53, '2024-08-03', '7pm-9pm', 'Pending', 4),
(34, 54, '2024-04-01', '3pm-6pm', 'Confirm', 3),
(35, 55, '2024-09-20', '3pm-6pm', 'Pending', 3),
(36, 56, '2024-09-08', '7pm-9pm', 'Pending', 4),
(37, 57, '2024-03-03', '9am-11am', 'Confirm', 4),
(38, 58, '2024-06-26', '3pm-6pm', 'Pending', 5),
(39, 59, '2024-01-23', '9am-11am', 'Confirm', 4),
(40, 60, '2024-06-25', '7pm-9pm', 'Cancelled', 5),
(41, 61, '2024-10-08', '3pm-6pm', 'Confirm', 4),
(42, 62, '2024-05-14', '7pm-9pm', 'Confirm', 4),
(43, 63, '2024-01-20', '12pm-2pm', 'Cancelled', 4),
(44, 64, '2024-04-02', '3pm-6pm', 'Pending', 5),
(45, 65, '2024-07-16', '9am-11am', 'Confirm', 5),
(46, 66, '2024-06-13', '3pm-6pm', 'Confirm', 3),
(47, 67, '2024-12-08', '3pm-6pm', 'Cancelled', 4),
(48, 68, '2024-01-10', '12pm-2pm', 'Cancelled', 3),
(49, 69, '2024-02-11', '7pm-9pm', 'Confirm', 3),
(50, 70, '2024-03-01', '9am-11am', 'Confirm', 4),
(51, 71, '2024-05-25', '9am-11am', 'Confirm', 5),
(52, 72, '2024-09-07', '3pm-6pm', 'Confirm', 3),
(53, 73, '2024-07-12', '7pm-9pm', 'Cancelled', 3),
(54, 74, '2024-01-09', '3pm-6pm', 'Confirm', 5),
(55, 75, '2024-08-07', '7pm-9pm', 'Cancelled', 5),
(56, 76, '2024-03-07', '12pm-2pm', 'Confirm', 5),
(57, 77, '2024-09-17', '12pm-2pm', 'Confirm', 4),
(58, 78, '2024-06-10', '12pm-2pm', 'Pending', 3),
(59, 79, '2024-05-03', '12pm-2pm', 'Confirm', 5),
(60, 80, '2024-06-12', '9am-11am', 'Confirm', 5),
(61, 81, '2024-03-27', '7pm-9pm', 'Pending', 5),
(62, 82, '2024-04-04', '7pm-9pm', 'Pending', 5),
(63, 83, '2024-09-21', '7pm-9pm', 'Cancelled', 4),
(64, 84, '2024-11-11', '3pm-6pm', 'Cancelled', 3),
(65, 85, '2024-12-05', '3pm-6pm', 'Confirm', 5),
(66, 86, '2024-03-04', '7pm-9pm', 'Confirm', 3),
(67, 87, '2024-09-07', '7pm-9pm', 'Pending', 5),
(68, 88, '2024-04-13', '12pm-2pm', 'Confirm', 5),
(69, 89, '2024-07-25', '7pm-9pm', 'Pending', 4),
(70, 90, '2024-06-23', '3pm-6pm', 'Confirm', 3),
(71, 91, '2024-08-05', '3pm-6pm', 'Cancelled', 4),
(72, 92, '2024-11-19', '3pm-6pm', 'Confirm', 3),
(73, 93, '2024-07-03', '3pm-6pm', 'Confirm', 4),
(74, 94, '2024-11-10', '9am-11am', 'Confirm', 4),
(75, 95, '2024-02-03', '12pm-2pm', 'Confirm', 3),
(76, 96, '2024-03-27', '9am-11am', 'Cancelled', 4),
(77, 97, '2024-09-09', '3pm-6pm', 'Cancelled', 5),
(78, 98, '2024-11-21', '9am-11am', 'Confirm', 4),
(79, 99, '2024-11-11', '7pm-9pm', 'Confirm', 3),
(80, 100, '2024-04-21', '7pm-9pm', 'Cancelled', 5),
(81, 101, '2024-10-24', '7pm-9pm', 'Confirm', 3),
(82, 102, '2024-10-01', '12pm-2pm', 'Confirm', 4),
(83, 103, '2024-12-08', '12pm-2pm', 'Cancelled', 4),
(84, 104, '2024-09-22', '3pm-6pm', 'Pending', 4),
(85, 105, '2024-08-27', '7pm-9pm', 'Confirm', 3),
(86, 106, '2024-02-02', '3pm-6pm', 'Cancelled', 3),
(87, 107, '2024-09-27', '3pm-6pm', 'Confirm', 5),
(88, 108, '2024-02-24', '3pm-6pm', 'Pending', 4),
(89, 109, '2024-10-21', '12pm-2pm', 'Cancelled', 3),
(90, 110, '2024-10-03', '3pm-6pm', 'Confirm', 4),
(91, 111, '2024-02-08', '3pm-6pm', 'Confirm', 3),
(92, 112, '2024-12-19', '12pm-2pm', 'Confirm', 4),
(93, 113, '2024-05-07', '3pm-6pm', 'Pending', 3),
(94, 114, '2024-12-14', '9am-11am', 'Cancelled', 3),
(95, 115, '2024-02-09', '3pm-6pm', 'Confirm', 4),
(96, 116, '2024-11-04', '12pm-2pm', 'Confirm', 4),
(97, 117, '2024-12-18', '3pm-6pm', 'Cancelled', 3),
(98, 118, '2024-07-25', '3pm-6pm', 'Confirm', 3),
(99, 119, '2024-06-21', '9am-11am', 'Cancelled', 4),
(100, 120, '2024-10-13', '12pm-2pm', 'Cancelled', 4),
(101, 121, '2024-02-20', '9am-11am', 'Confirm', 3),
(102, 122, '2024-09-26', '12pm-2pm', 'Cancelled', 3),
(103, 123, '2024-07-16', '3pm-6pm', 'Confirm', 4),
(104, 124, '2024-03-06', '9am-11am', 'Pending', 3),
(105, 125, '2024-04-05', '7pm-9pm', 'Confirm', 4),
(106, 126, '2024-06-11', '9am-11am', 'Confirm', 5),
(107, 127, '2024-05-12', '9am-11am', 'Confirm', 3),
(108, 128, '2024-05-18', '7pm-9pm', 'Cancelled', 5),
(109, 129, '2024-07-16', '7pm-9pm', 'Confirm', 3),
(110, 130, '2024-03-24', '7pm-9pm', 'Cancelled', 5),
(111, 131, '2024-05-18', '9am-11am', 'Pending', 5),
(112, 132, '2024-02-03', '3pm-6pm', 'Cancelled', 4),
(113, 133, '2024-09-21', '9am-11am', 'Cancelled', 5),
(114, 134, '2024-01-08', '9am-11am', 'Confirm', 5),
(115, 135, '2024-02-05', '12pm-2pm', 'Confirm', 4),
(116, 136, '2024-07-01', '7pm-9pm', 'Confirm', 3),
(117, 137, '2024-03-23', '12pm-2pm', 'Cancelled', 4),
(118, 138, '2024-11-13', '3pm-6pm', 'Confirm', 5),
(119, 139, '2024-02-13', '9am-11am', 'Pending', 4),
(120, 140, '2024-05-07', '9am-11am', 'Pending', 4),
(121, 141, '2024-06-09', '12pm-2pm', 'Pending', 4),
(122, 142, '2024-07-21', '12pm-2pm', 'Confirm', 5),
(123, 143, '2024-11-07', '9am-11am', 'Confirm', 3),
(124, 144, '2024-10-06', '3pm-6pm', 'Confirm', 3),
(125, 145, '2024-10-05', '12pm-2pm', 'Confirm', 5),
(126, 146, '2024-10-04', '7pm-9pm', 'Confirm', 4),
(127, 147, '2024-02-13', '12pm-2pm', 'Cancelled', 4),
(128, 148, '2024-03-12', '12pm-2pm', 'Pending', 4),
(129, 149, '2024-08-19', '12pm-2pm', 'Pending', 4),
(130, 150, '2024-09-26', '3pm-6pm', 'Pending', 4),
(131, 151, '2024-10-17', '7pm-9pm', 'Cancelled', 4),
(132, 152, '2024-04-28', '7pm-9pm', 'Cancelled', 4),
(133, 153, '2024-07-13', '9am-11am', 'Cancelled', 5),
(139, 156, '2024-12-24', '7pm-9pm', 'Confirm', 3),
(140, 156, '2024-12-24', '7pm-9pm', 'Confirm', 3),
(147, 22, '2025-01-09', '9am-11am', 'Pending', 3),
(148, 22, '2025-01-10', '9am-11am', 'Confirm', 5),
(149, 161, '2025-01-08', '12pm-2pm', 'Pending', 5),
(150, 161, '2025-01-10', '7pm-9pm', 'Confirm', 3),
(151, 161, '2025-01-12', '9am-11am', 'Pending', 3),
(152, 161, '2025-01-13', '9am-11am', 'Confirm', 3),
(153, 161, '2025-01-14', '9am-11am', 'Confirm', 4),
(154, 161, '2025-01-14', '12pm-2pm', 'Confirm', 3),
(155, 161, '2025-01-12', '12pm-2pm', 'Pending', 3),
(157, 24, '2025-01-12', '7pm-9pm', 'Pending', 5),
(158, 24, '2025-01-13', '12pm-2pm', 'Confirm', 5),
(159, 31, '2025-01-16', '9am-11am', 'Pending', 3);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `CAR_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PLATE_NUM` varchar(20) NOT NULL,
  `TYPE` varchar(50) NOT NULL,
  `CAR_COLOR` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`CAR_ID`, `USER_ID`, `PLATE_NUM`, `TYPE`, `CAR_COLOR`) VALUES
(1, 21, 'KL1234A', 'MPV', 'White'),
(3, 23, 'KL9012C', 'Sedan', 'Green'),
(4, 24, 'SG3456D', 'MPV', 'Yellow'),
(5, 25, 'KL7890E', 'Sedan', 'Black'),
(6, 26, 'SG1234F', 'MPV', 'White'),
(7, 27, 'KL5678G', 'Sedan', 'Grey'),
(8, 28, 'SG9012H', 'MPV', 'Silver'),
(9, 29, 'KL3456I', 'Sedan', 'Purple'),
(10, 30, 'SG7890J', 'MPV', 'Brown'),
(11, 31, 'KL1234K', 'Sedan', 'Red'),
(12, 32, 'SG5678L', 'MPV', 'Blue'),
(13, 33, 'KL9012M', 'Sedan', 'Green'),
(14, 34, 'SG3456N', 'MPV', 'Yellow'),
(15, 35, 'KL7890O', 'Sedan', 'Black'),
(16, 36, 'SG1234P', 'MPV', 'White'),
(17, 37, 'KL5678Q', 'Sedan', 'Grey'),
(18, 38, 'SG9012R', 'MPV', 'Silver'),
(19, 39, 'KL3456S', 'Sedan', 'Purple'),
(20, 40, 'SG7890T', 'MPV', 'Brown'),
(21, 41, 'KL1234U', 'Sedan', 'Red'),
(22, 42, 'SG5678V', 'MPV', 'Blue'),
(23, 43, 'KL9012W', 'Sedan', 'Green'),
(24, 44, 'SG3456X', 'MPV', 'Yellow'),
(25, 45, 'KL7890Y', 'Sedan', 'Black'),
(26, 46, 'SG1234Z', 'MPV', 'White'),
(27, 47, 'KL5678A', 'Sedan', 'Grey'),
(28, 48, 'SG9012B', 'MPV', 'Silver'),
(29, 49, 'KL3456C', 'Sedan', 'Purple'),
(30, 50, 'SG7890D', 'MPV', 'Brown'),
(31, 51, 'KL1234E', 'Sedan', 'Red'),
(32, 52, 'SG5678F', 'MPV', 'Blue'),
(33, 53, 'KL9012G', 'Sedan', 'Green'),
(34, 54, 'SG3456H', 'MPV', 'Yellow'),
(35, 55, 'KL7890I', 'Sedan', 'Black'),
(36, 56, 'SG1234J', 'MPV', 'White'),
(37, 57, 'KL5678K', 'Sedan', 'Grey'),
(38, 58, 'SG9012L', 'MPV', 'Silver'),
(39, 59, 'KL3456M', 'Sedan', 'Purple'),
(40, 60, 'SG7890N', 'MPV', 'Brown'),
(41, 61, 'KL1234O', 'Sedan', 'Red'),
(42, 62, 'SG5678P', 'MPV', 'Blue'),
(43, 63, 'KL9012Q', 'Sedan', 'Green'),
(44, 64, 'SG3456R', 'MPV', 'Yellow'),
(45, 65, 'KL7890S', 'Sedan', 'Black'),
(46, 66, 'SG1234T', 'MPV', 'White'),
(47, 67, 'KL5678U', 'Sedan', 'Grey'),
(48, 68, 'SG9012V', 'MPV', 'Silver'),
(49, 69, 'KL3456W', 'Sedan', 'Purple'),
(50, 70, 'SG7890X', 'MPV', 'Brown'),
(51, 71, 'KL1234Y', 'Sedan', 'Red'),
(52, 72, 'SG5678Z', 'MPV', 'Blue'),
(53, 73, 'KL9012A', 'Sedan', 'Green'),
(54, 74, 'SG3456B', 'MPV', 'Yellow'),
(55, 75, 'KL7890C', 'Sedan', 'Black'),
(56, 76, 'SG1234D', 'MPV', 'White'),
(57, 77, 'KL5678E', 'Sedan', 'Grey'),
(58, 78, 'SG9012F', 'MPV', 'Silver'),
(59, 79, 'KL3456G', 'Sedan', 'Purple'),
(60, 80, 'SG7890H', 'MPV', 'Brown'),
(61, 81, 'KL1234I', 'Sedan', 'Red'),
(62, 82, 'SG5678J', 'MPV', 'Blue'),
(63, 83, 'KL9012K', 'Sedan', 'Green'),
(64, 84, 'SG3456L', 'MPV', 'Yellow'),
(65, 85, 'KL7890M', 'Sedan', 'Black'),
(66, 86, 'SG1234N', 'MPV', 'White'),
(67, 87, 'KL5678O', 'Sedan', 'Grey'),
(68, 88, 'SG9012P', 'MPV', 'Silver'),
(69, 89, 'KL3456Q', 'Sedan', 'Purple'),
(70, 90, 'SG7890R', 'MPV', 'Brown'),
(71, 91, 'KL1234S', 'Sedan', 'Red'),
(72, 92, 'SG5678T', 'MPV', 'Blue'),
(73, 93, 'KL9012U', 'Sedan', 'Green'),
(74, 94, 'SG3456V', 'MPV', 'Yellow'),
(75, 95, 'KL7890W', 'Sedan', 'Black'),
(76, 96, 'SG1234X', 'MPV', 'White'),
(77, 97, 'KL5678Y', 'Sedan', 'Grey'),
(78, 98, 'SG9012Z', 'MPV', 'Silver'),
(79, 99, 'KL3456A', 'Sedan', 'Purple'),
(80, 100, 'SG7890B', 'MPV', 'Brown'),
(81, 101, 'KL1234C', 'Sedan', 'Red'),
(82, 102, 'SG5678D', 'MPV', 'Blue'),
(83, 103, 'KL9012E', 'Sedan', 'Green'),
(84, 104, 'SG3456F', 'MPV', 'Yellow'),
(85, 105, 'KL7890G', 'Sedan', 'Black'),
(86, 106, 'SG1234H', 'MPV', 'White'),
(87, 107, 'KL5678I', 'Sedan', 'Grey'),
(88, 108, 'SG9012J', 'MPV', 'Silver'),
(89, 109, 'KL3456K', 'Sedan', 'Purple'),
(90, 110, 'SG7890L', 'MPV', 'Brown'),
(91, 111, 'KL1234M', 'Sedan', 'Red'),
(92, 112, 'SG5678N', 'MPV', 'Blue'),
(93, 113, 'KL9012O', 'Sedan', 'Green'),
(94, 114, 'SG3456P', 'MPV', 'Yellow'),
(95, 115, 'KL7890Q', 'Sedan', 'Black'),
(96, 116, 'SG1234R', 'MPV', 'White'),
(97, 117, 'KL5678S', 'Sedan', 'Grey'),
(98, 118, 'SG9012T', 'MPV', 'Silver'),
(99, 119, 'KL3456U', 'Sedan', 'Purple'),
(100, 120, 'SG7890V', 'MPV', 'Brown'),
(101, 121, 'KL1234W', 'Sedan', 'Red'),
(102, 122, 'SG5678X', 'MPV', 'Blue'),
(103, 123, 'KL9012Y', 'Sedan', 'Green'),
(104, 124, 'SG3456Z', 'MPV', 'Yellow'),
(105, 125, 'KL7890A', 'Sedan', 'Black'),
(106, 126, 'SG1234B', 'MPV', 'White'),
(107, 127, 'KL5678C', 'Sedan', 'Grey'),
(108, 128, 'SG9012D', 'MPV', 'Silver'),
(109, 129, 'KL3456E', 'Sedan', 'Purple'),
(110, 130, 'SG7890F', 'MPV', 'Brown'),
(111, 131, 'KL1234G', 'Sedan', 'Red'),
(112, 132, 'SG5678H', 'MPV', 'Blue'),
(113, 133, 'KL9012I', 'Sedan', 'Green'),
(114, 134, 'SG3456J', 'MPV', 'Yellow'),
(115, 135, 'KL7890K', 'Sedan', 'Black'),
(116, 136, 'SG1234L', 'MPV', 'White'),
(117, 137, 'KL5678M', 'Sedan', 'Grey'),
(118, 138, 'SG9012N', 'MPV', 'Silver'),
(119, 139, 'KL3456O', 'Sedan', 'Purple'),
(120, 140, 'SG7890P', 'MPV', 'Brown'),
(121, 141, 'KL1234Q', 'Sedan', 'Red'),
(122, 142, 'SG5678R', 'MPV', 'Blue'),
(123, 143, 'KL9012S', 'Sedan', 'Green'),
(124, 144, 'SG3456T', 'MPV', 'Yellow'),
(125, 145, 'KL7890U', 'Sedan', 'Black'),
(126, 146, 'SG1234V', 'MPV', 'White'),
(127, 147, 'KL5678W', 'Sedan', 'Grey'),
(128, 148, 'SG9012X', 'MPV', 'Silver'),
(129, 149, 'KL3456Y', 'Sedan', 'Purple'),
(130, 150, 'SG7890Z', 'MPV', 'Brown'),
(131, 151, 'KL1234A', 'Sedan', 'Red'),
(132, 152, 'SG5678B', 'MPV', 'Blue'),
(133, 153, 'KL9012C', 'Sedan', 'Green'),
(134, 156, 'VNN4754', 'MPV', 'Blue'),
(135, 156, 'WXY 1234', 'MPV', 'Blue'),
(136, 156, 'WXY 1234', 'MPV', 'Blue'),
(137, 156, 'WXY 1234', 'MPV', 'Blue'),
(138, 156, 'WXY 1234', 'MPV', 'Blue'),
(141, 161, 'KWS123', 'Hatchback', 'Blue'),
(142, 161, 'KWS123', 'MPV', 'Blue'),
(143, 161, 'KWS123', 'MPV', 'Blue'),
(144, 161, 'KWS123', 'Sedan', 'Blue'),
(145, 161, 'KWS123', 'MPV', 'Blue'),
(146, 161, 'WAS890', 'MPV', 'Red'),
(147, 161, 'WAS890', 'MPV', 'Red'),
(149, 24, 'SG3456D', 'MPV', 'Yellow'),
(150, 24, 'SG3456D', 'Hatchback', 'Yellow'),
(151, 31, 'KL1234K', 'Sedan', 'Red');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `PACKAGE_ID` int(11) NOT NULL,
  `PACKAGE_TYPE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`PACKAGE_ID`, `PACKAGE_TYPE`) VALUES
(3, 'Standard'),
(4, 'Premium'),
(5, 'Deluxe');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PAYMENT_ID` int(11) NOT NULL,
  `SALES_ID` int(11) DEFAULT NULL,
  `BOOKING_ID` int(11) DEFAULT NULL,
  `PAYMENT_TYPE` varchar(50) DEFAULT NULL,
  `PAYMENT_TOTAL_PRICE` decimal(10,2) DEFAULT NULL,
  `PAYMENT_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PAYMENT_ID`, `SALES_ID`, `BOOKING_ID`, `PAYMENT_TYPE`, `PAYMENT_TOTAL_PRICE`, `PAYMENT_DATE`) VALUES
(1, 1, 1, 'Credit Card', 180.00, '2024-01-08'),
(2, 2, 2, 'Online Banking', 180.00, '2024-01-09'),
(3, 3, 3, 'Credit Card', 180.00, '2024-01-18'),
(4, 4, 4, 'Online Banking', 120.00, '2024-01-23'),
(5, 5, 5, 'Credit Card', 60.00, '2024-01-31'),
(6, 6, 6, 'Online Banking', 60.00, '2024-02-03'),
(7, 7, 7, 'Credit Card', 120.00, '2024-02-05'),
(8, 8, 8, 'Online Banking', 60.00, '2024-02-08'),
(9, 9, 9, 'Credit Card', 120.00, '2024-02-09'),
(10, 10, 10, 'Online Banking', 60.00, '2024-02-11'),
(11, 11, 11, 'Credit Card', 120.00, '2024-02-13'),
(12, 12, 12, 'Online Banking', 60.00, '2024-02-20'),
(13, 13, 13, 'Credit Card', 120.00, '2024-02-24'),
(14, 14, 14, 'Online Banking', 120.00, '2024-03-01'),
(15, 15, 15, 'Credit Card', 120.00, '2024-03-03'),
(16, 16, 16, 'Online Banking', 60.00, '2024-03-04'),
(17, 17, 17, 'Credit Card', 60.00, '2024-03-06'),
(18, 18, 18, 'Online Banking', 180.00, '2024-03-07'),
(19, 19, 19, 'Credit Card', 120.00, '2024-03-12'),
(20, 20, 20, 'Online Banking', 60.00, '2024-03-18'),
(21, 21, 21, 'Credit Card', 180.00, '2024-03-27'),
(22, 22, 22, 'Online Banking', 120.00, '2024-04-01'),
(23, 23, 23, 'Credit Card', 180.00, '2024-04-02'),
(24, 24, 24, 'Online Banking', 180.00, '2024-04-04'),
(25, 25, 25, 'Credit Card', 120.00, '2024-04-05'),
(26, 26, 26, 'Online Banking', 180.00, '2024-04-13'),
(27, 27, 27, 'Credit Card', 180.00, '2024-04-19'),
(28, 28, 28, 'Online Banking', 120.00, '2024-04-25'),
(29, 29, 29, 'Credit Card', 180.00, '2024-04-26'),
(30, 30, 30, 'Online Banking', 180.00, '2024-05-03'),
(31, 31, 31, 'Credit Card', 180.00, '2024-05-07'),
(32, 32, 32, 'Online Banking', 120.00, '2024-05-07'),
(33, 33, 33, 'Credit Card', 60.00, '2024-05-09'),
(34, 34, 34, 'Online Banking', 120.00, '2024-05-12'),
(35, 35, 35, 'Credit Card', 60.00, '2024-05-14'),
(36, 36, 36, 'Online Banking', 120.00, '2024-05-18'),
(37, 37, 37, 'Credit Card', 180.00, '2024-05-20'),
(38, 38, 38, 'Online Banking', 180.00, '2024-05-25'),
(39, 39, 39, 'Credit Card', 180.00, '2024-06-08'),
(40, 40, 40, 'Online Banking', 120.00, '2024-06-09'),
(41, 41, 41, 'Credit Card', 120.00, '2024-06-10'),
(42, 42, 42, 'Online Banking', 60.00, '2024-06-11'),
(43, 43, 43, 'Credit Card', 180.00, '2024-06-12'),
(44, 44, 44, 'Online Banking', 180.00, '2024-06-13'),
(45, 45, 45, 'Credit Card', 120.00, '2024-06-23'),
(46, 46, 46, 'Online Banking', 60.00, '2024-06-26'),
(47, 47, 47, 'Credit Card', 180.00, '2024-07-01'),
(48, 48, 48, 'Online Banking', 60.00, '2024-07-03'),
(49, 49, 49, 'Credit Card', 120.00, '2024-07-04'),
(50, 50, 50, 'Online Banking', 120.00, '2024-07-07'),
(51, 51, 51, 'Credit Card', 120.00, '2024-07-13'),
(52, 52, 52, 'Online Banking', 180.00, '2024-07-16'),
(53, 53, 53, 'Credit Card', 120.00, '2024-07-16'),
(54, 54, 54, 'Online Banking', 60.00, '2024-07-16'),
(55, 55, 55, 'Credit Card', 180.00, '2024-07-21'),
(56, 56, 56, 'Online Banking', 120.00, '2024-07-25'),
(57, 57, 57, 'Credit Card', 120.00, '2024-07-25'),
(58, 58, 58, 'Online Banking', 240.00, '2024-08-02'),
(59, 59, 59, 'Credit Card', 120.00, '2024-08-03'),
(60, 60, 60, 'Online Banking', 120.00, '2024-08-19'),
(61, 61, 61, 'Credit Card', 180.00, '2024-08-27'),
(62, 62, 62, 'Online Banking', 60.00, '2024-09-07'),
(63, 63, 63, 'Credit Card', 120.00, '2024-09-07'),
(64, 64, 64, 'Online Banking', 120.00, '2024-09-08'),
(65, 65, 65, 'Credit Card', 120.00, '2024-09-17'),
(66, 66, 66, 'Online Banking', 180.00, '2024-09-18'),
(67, 67, 67, 'Credit Card', 120.00, '2024-09-20'),
(68, 68, 68, 'Online Banking', 120.00, '2024-09-22'),
(69, 69, 69, 'Credit Card', 300.00, '2024-09-26'),
(70, 70, 70, 'Online Banking', 180.00, '2024-09-26'),
(71, 71, 71, 'Credit Card', 60.00, '2024-09-27'),
(72, 72, 72, 'Online Banking', 120.00, '2024-10-01'),
(73, 73, 73, 'Credit Card', 60.00, '2024-10-03'),
(74, 74, 74, 'Online Banking', 120.00, '2024-10-04'),
(75, 75, 75, 'Credit Card', 180.00, '2024-10-04'),
(76, 76, 76, 'Online Banking', 180.00, '2024-10-05'),
(77, 77, 77, 'Credit Card', 60.00, '2024-10-06'),
(78, 78, 78, 'Online Banking', 120.00, '2024-10-08'),
(79, 79, 79, 'Credit Card', 60.00, '2024-10-15'),
(80, 80, 80, 'Online Banking', 120.00, '2024-10-24'),
(81, 81, 81, 'Credit Card', 240.00, '2024-11-04'),
(82, 82, 82, 'Online Banking', 120.00, '2024-11-07'),
(83, 83, 83, 'Credit Card', 60.00, '2024-11-10'),
(84, 84, 84, 'Online Banking', 300.00, '2024-11-11'),
(85, 85, 85, 'Credit Card', 240.00, '2024-11-13'),
(86, 86, 86, 'Online Banking', 120.00, '2024-11-19'),
(87, 87, 87, 'Credit Card', 120.00, '2024-11-21'),
(88, 88, 88, 'Online Banking', 120.00, '2024-11-21'),
(89, 89, 89, 'Credit Card', 60.00, '2024-11-24'),
(90, 90, 90, 'Online Banking', 120.00, '2024-11-27'),
(91, 91, 91, 'Credit Card', 60.00, '2024-12-05'),
(92, 92, 92, 'Online Banking', 180.00, '2024-12-05'),
(93, 93, 93, 'Credit Card', 120.00, '2024-12-18'),
(94, 94, 94, 'Online Banking', 120.00, '2024-12-18'),
(95, 95, 95, 'Credit Card', 120.00, '2024-12-19'),
(96, 96, 96, 'Online Banking', 120.00, '2024-11-04'),
(97, 97, 97, 'Credit Card', 60.00, '2024-12-18'),
(98, 98, 98, 'Online Banking', 60.00, '2024-07-25'),
(99, 99, 99, 'Credit Card', 120.00, '2024-06-21'),
(100, 100, 100, 'Online Banking', 120.00, '2024-10-13'),
(101, 101, 101, 'Credit Card', 60.00, '2024-02-20'),
(102, 102, 102, 'Online Banking', 60.00, '2024-09-26'),
(103, 103, 103, 'Credit Card', 120.00, '2024-07-16'),
(104, 104, 104, 'Online Banking', 60.00, '2024-03-06'),
(105, 105, 105, 'Credit Card', 120.00, '2024-04-05'),
(106, 106, 106, 'Online Banking', 180.00, '2024-06-11'),
(107, 107, 107, 'Credit Card', 60.00, '2024-05-12'),
(108, 108, 108, 'Online Banking', 180.00, '2024-05-18'),
(109, 109, 109, 'Credit Card', 60.00, '2024-07-16'),
(110, 110, 110, 'Online Banking', 180.00, '2024-03-24'),
(111, 111, 111, 'Credit Card', 120.00, '2024-05-18'),
(112, 112, 112, 'Online Banking', 120.00, '2024-02-03'),
(113, 113, 113, 'Credit Card', 180.00, '2024-09-21'),
(114, 114, 114, 'Online Banking', 180.00, '2024-01-08'),
(115, 115, 115, 'Credit Card', 120.00, '2024-02-05'),
(116, 116, 116, 'Online Banking', 60.00, '2024-07-01'),
(117, 117, 117, 'Credit Card', 120.00, '2024-03-23'),
(118, 118, 118, 'Online Banking', 180.00, '2024-11-13'),
(119, 119, 119, 'Credit Card', 120.00, '2024-02-13'),
(120, 120, 120, 'Online Banking', 120.00, '2024-05-07'),
(121, 121, 121, 'Credit Card', 120.00, '2024-06-09'),
(122, 122, 122, 'Online Banking', 180.00, '2024-07-21'),
(123, 123, 123, 'Credit Card', 60.00, '2024-11-07'),
(124, 124, 124, 'Online Banking', 60.00, '2024-10-06'),
(125, 125, 125, 'Credit Card', 180.00, '2024-10-05'),
(126, 126, 126, 'Online Banking', 120.00, '2024-10-04'),
(127, 127, 127, 'Credit Card', 120.00, '2024-02-13'),
(128, 128, 128, 'Online Banking', 120.00, '2024-03-12'),
(129, 129, 129, 'Credit Card', 120.00, '2024-08-19'),
(130, 130, 130, 'Online Banking', 120.00, '2024-09-26'),
(131, 131, 131, 'Credit Card', 120.00, '2024-10-17'),
(132, 132, 132, 'Online Banking', 120.00, '2024-04-28'),
(133, 133, 133, 'Credit Card', 180.00, '2024-07-13'),
(139, 138, 150, 'creditCard', 60.00, '2025-01-08'),
(140, 361, 151, 'creditCard', 60.00, '2025-01-08'),
(141, 362, 152, 'onlineBanking', 60.00, '2025-01-08'),
(142, 363, 153, 'onlineBanking', 120.00, '2025-01-08'),
(143, 364, 154, 'creditCard', 60.00, '2025-01-09'),
(144, 365, 155, 'creditCard', 60.00, '2025-01-09'),
(146, 367, 157, 'onlineBanking', 180.00, '2025-01-09'),
(147, 368, 158, 'creditCard', 180.00, '2025-01-09'),
(148, 369, 159, 'onlineBanking', 60.00, '2025-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `SALES_ID` int(11) NOT NULL,
  `TOTAL_SALES` decimal(10,2) DEFAULT NULL,
  `SALES_DATE` date DEFAULT NULL,
  `ADMIN_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`SALES_ID`, `TOTAL_SALES`, `SALES_DATE`, `ADMIN_ID`) VALUES
(1, 180.00, '2024-01-08', 1),
(2, 180.00, '2024-01-09', 2),
(3, 180.00, '2024-01-18', 3),
(4, 120.00, '2024-01-23', 1),
(5, 60.00, '2024-01-31', 2),
(6, 60.00, '2024-02-03', 3),
(7, 120.00, '2024-02-05', 1),
(8, 60.00, '2024-02-08', 2),
(9, 120.00, '2024-02-09', 3),
(10, 60.00, '2024-02-11', 1),
(11, 120.00, '2024-02-13', 2),
(12, 60.00, '2024-02-20', 3),
(13, 120.00, '2024-02-24', 1),
(14, 120.00, '2024-03-01', 2),
(15, 120.00, '2024-03-03', 3),
(16, 60.00, '2024-03-04', 1),
(17, 60.00, '2024-03-06', 2),
(18, 180.00, '2024-03-07', 3),
(19, 120.00, '2024-03-12', 1),
(20, 60.00, '2024-03-18', 2),
(21, 180.00, '2024-03-27', 3),
(22, 120.00, '2024-04-01', 1),
(23, 180.00, '2024-04-02', 2),
(24, 180.00, '2024-04-04', 3),
(25, 120.00, '2024-04-05', 1),
(26, 180.00, '2024-04-13', 2),
(27, 180.00, '2024-04-19', 3),
(28, 120.00, '2024-04-25', 1),
(29, 180.00, '2024-04-26', 2),
(30, 180.00, '2024-05-03', 3),
(31, 180.00, '2024-05-07', 1),
(32, 120.00, '2024-05-07', 2),
(33, 60.00, '2024-05-09', 3),
(34, 120.00, '2024-05-12', 1),
(35, 60.00, '2024-05-14', 2),
(36, 120.00, '2024-05-18', 3),
(37, 180.00, '2024-05-20', 1),
(38, 180.00, '2024-05-25', 2),
(39, 180.00, '2024-06-08', 3),
(40, 120.00, '2024-06-09', 1),
(41, 120.00, '2024-06-10', 2),
(42, 60.00, '2024-06-11', 3),
(43, 180.00, '2024-06-12', 1),
(44, 180.00, '2024-06-13', 2),
(45, 120.00, '2024-06-23', 3),
(46, 60.00, '2024-06-26', 1),
(47, 180.00, '2024-07-01', 2),
(48, 60.00, '2024-07-03', 3),
(49, 120.00, '2024-07-04', 1),
(50, 120.00, '2024-07-07', 2),
(51, 120.00, '2024-07-13', 3),
(52, 180.00, '2024-07-16', 1),
(53, 120.00, '2024-07-16', 2),
(54, 60.00, '2024-07-16', 3),
(55, 180.00, '2024-07-21', 1),
(56, 120.00, '2024-07-25', 2),
(57, 120.00, '2024-07-25', 3),
(58, 240.00, '2024-08-02', 1),
(59, 120.00, '2024-08-03', 2),
(60, 120.00, '2024-08-19', 3),
(61, 180.00, '2024-08-27', 1),
(62, 60.00, '2024-09-07', 2),
(63, 120.00, '2024-09-07', 3),
(64, 120.00, '2024-09-08', 1),
(65, 120.00, '2024-09-17', 2),
(66, 180.00, '2024-09-18', 3),
(67, 120.00, '2024-09-20', 1),
(68, 120.00, '2024-09-22', 2),
(69, 300.00, '2024-09-26', 3),
(70, 180.00, '2024-09-26', 1),
(71, 60.00, '2024-09-27', 2),
(72, 120.00, '2024-10-01', 3),
(73, 60.00, '2024-10-03', 1),
(74, 120.00, '2024-10-04', 2),
(75, 180.00, '2024-10-04', 3),
(76, 180.00, '2024-10-05', 1),
(77, 60.00, '2024-10-06', 2),
(78, 120.00, '2024-10-08', 3),
(79, 60.00, '2024-10-15', 1),
(80, 120.00, '2024-10-24', 2),
(81, 240.00, '2024-11-04', 3),
(82, 120.00, '2024-11-07', 1),
(83, 60.00, '2024-11-10', 2),
(84, 300.00, '2024-11-11', 3),
(85, 240.00, '2024-11-13', 1),
(86, 120.00, '2024-11-19', 2),
(87, 120.00, '2024-11-21', 3),
(88, 120.00, '2024-11-21', 1),
(89, 60.00, '2024-11-24', 2),
(90, 120.00, '2024-11-27', 3),
(91, 60.00, '2024-12-05', 1),
(92, 180.00, '2024-12-05', 2),
(93, 120.00, '2024-12-18', 3),
(94, 120.00, '2024-12-18', 1),
(95, 120.00, '2024-12-19', 2),
(96, 60.00, '2024-01-10', 3),
(97, 180.00, '2024-01-14', 1),
(98, 180.00, '2024-01-20', 2),
(99, 120.00, '2024-01-20', 3),
(100, 60.00, '2024-02-02', 1),
(101, 120.00, '2024-02-03', 2),
(102, 60.00, '2024-02-06', 3),
(103, 120.00, '2024-02-13', 1),
(104, 120.00, '2024-03-23', 2),
(105, 180.00, '2024-03-24', 3),
(106, 120.00, '2024-03-27', 1),
(107, 180.00, '2024-04-21', 2),
(108, 120.00, '2024-04-28', 3),
(109, 60.00, '2024-05-06', 1),
(110, 180.00, '2024-05-09', 2),
(111, 180.00, '2024-05-18', 3),
(112, 120.00, '2024-06-21', 1),
(113, 180.00, '2024-06-25', 2),
(114, 60.00, '2024-07-12', 3),
(115, 180.00, '2024-07-13', 1),
(116, 120.00, '2024-06-21', 2),
(117, 180.00, '2024-06-25', 3),
(118, 60.00, '2024-07-12', 1),
(119, 180.00, '2024-07-13', 2),
(120, 120.00, '2024-08-05', 3),
(121, 180.00, '2024-08-07', 1),
(122, 180.00, '2024-09-09', 2),
(123, 60.00, '2024-09-20', 3),
(124, 180.00, '2024-09-21', 1),
(125, 120.00, '2024-09-21', 2),
(126, 60.00, '2024-09-26', 3),
(127, 120.00, '2024-10-13', 1),
(128, 120.00, '2024-10-17', 2),
(129, 60.00, '2024-10-21', 3),
(130, 60.00, '2024-11-11', 1),
(131, 180.00, '2024-11-25', 2),
(132, 120.00, '2024-12-08', 3),
(133, 120.00, '2024-12-08', 1),
(138, 60.00, '2025-01-08', 1),
(361, 60.00, '2025-01-08', NULL),
(362, 60.00, '2025-01-08', NULL),
(363, 120.00, '2025-01-08', NULL),
(364, 60.00, '2025-01-09', NULL),
(365, 60.00, '2025-01-09', NULL),
(366, 180.00, '2025-01-09', NULL),
(367, 180.00, '2025-01-09', NULL),
(368, 180.00, '2025-01-09', NULL),
(369, 60.00, '2025-01-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `SERVICE_ID` int(11) NOT NULL,
  `PACKAGE_ID` int(11) DEFAULT NULL,
  `SERVICE_NAME` varchar(100) NOT NULL,
  `SERVICE_PRICE` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`SERVICE_ID`, `PACKAGE_ID`, `SERVICE_NAME`, `SERVICE_PRICE`) VALUES
(1, 3, 'Exterior Wash', 30.00),
(2, 4, 'Interior Cleaning', 30.00),
(3, 5, 'Rim Coating', 30.00),
(4, 3, 'Sanitization', 30.00),
(5, 5, 'Engine Cleaning', 30.00),
(6, 5, 'Wax And Polish', 30.00);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `STAFF_ID` int(10) NOT NULL,
  `ADMIN_ID` int(10) DEFAULT NULL,
  `TEAM_ID` int(10) DEFAULT NULL,
  `STAFF_FNAME` varchar(20) NOT NULL,
  `STAFF_LNAME` varchar(20) NOT NULL,
  `STAFF_GENDER` varchar(10) NOT NULL,
  `STAFF_CONTACT` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`STAFF_ID`, `ADMIN_ID`, `TEAM_ID`, `STAFF_FNAME`, `STAFF_LNAME`, `STAFF_GENDER`, `STAFF_CONTACT`) VALUES
(2, NULL, 5, 'Mohd', 'irsyad', 'Male', '0197362537'),
(3, NULL, 3, 'Mohd', 'Aizat', 'Male', '0145775423'),
(4, NULL, 2, 'Mohd', 'Luqman', 'Male', '0176252589'),
(5, NULL, 2, 'Tengku', 'Muiz', 'Male', '0197362537'),
(6, NULL, 1, 'Putra', 'Ahmad', 'Male', '0152775489'),
(7, NULL, 2, 'Mohd', 'Idris', 'Male', '0198745628'),
(8, NULL, 3, 'Che Wan Muhammad', 'Qusyairi', 'Male', '0182995414'),
(10, NULL, 1, 'Ahmad', 'Amsyar', 'Male', '01189762435'),
(11, NULL, 1, 'Ahmad', 'Yusof', 'Male', '0172335640'),
(12, NULL, 3, 'Ahmad', 'Idris', 'Male', '0187663746'),
(13, NULL, 5, 'Muhd', 'Badrul Hisham', 'Male', '0126745980'),
(14, NULL, 4, 'Muhd', 'Zack Haikal', 'Male', '0195978253'),
(15, NULL, 1, 'Muhd', 'Aiman ', 'Male', '0192647890'),
(16, NULL, 5, 'Mohd', 'Luqman Hakim', 'Male', '0179594251'),
(17, NULL, 3, 'Sheikh', 'Mustafa', 'Male', '0195648907'),
(18, NULL, 4, 'Mohd', 'Huzaimi', 'Male', '0145768944'),
(19, NULL, 4, 'Mohd', 'Hakimi', 'Male', '0139773540'),
(20, NULL, 4, 'Mohd', 'Luth Farhan', 'Male', '0137860994'),
(21, NULL, 5, 'Nik', 'Ahmad', 'Male', '010-9076685'),
(23, NULL, 4, 'Farhan', 'Hazrel', 'Male', '0109056554'),
(25, NULL, 1, 'Adam', 'Bakhil', 'Male', '0107239954'),
(26, NULL, 6, 'Chen', 'Zwen', 'Male', '010-8643321');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `TEAM_ID` int(11) NOT NULL,
  `TEAM_NAME` varchar(100) NOT NULL,
  `TEAM_STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`TEAM_ID`, `TEAM_NAME`, `TEAM_STATUS`) VALUES
(1, 'Brigade', 'Inactive'),
(2, 'Synergy', 'Active'),
(3, 'Allies', 'Active'),
(4, 'Oscar', 'Active'),
(5, 'Quebec', 'Active'),
(6, 'Beta', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `TEAM_ID` int(11) NOT NULL,
  `FIRSTNAME` varchar(100) NOT NULL,
  `LASTNAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `CUST_ADDRESS` varchar(255) DEFAULT NULL,
  `USERNAME` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `TEAM_ID`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `PASSWORD`, `CUST_ADDRESS`, `USERNAME`) VALUES
(21, 1, 'AHMAD', 'FAIZ', 'faiz@gmail.com', 'faiz123', 'NO.23 JALAN DESA MELUR, TAMAN BANDAR CONNAUGHT, 56000 CHERAS, KUALA LUMPUR, MALAYSIA', 'ahmad027'),
(22, 2, 'LEE', 'CHONG', 'chong@gmail.com', 'chong123', 'No. 22 Psn Damansara Endah Bukit Damansara,\r\nKuala Lumpur', 'lee014'),
(23, 3, 'MUTHU', 'KUMAR', 'kumar@gmail.com', 'kumar123', 'NO.67 JALAN BUKIT BINTANG, 55100 KUALA LUMPUR, MALAYSIA', 'muthu012'),
(24, 4, 'NURUL', 'AIN', 'ain@gmail.com', 'ain123', 'NO.89 JALAN AMPANG, 50450 KUALA LUMPUR, MALAYSIA', 'nurul005'),
(25, 5, 'WONG', 'WEI', 'wei@gmail.com', 'wei123', 'NO.101 JALAN PANTAI BARU, 59200 KUALA LUMPUR, MALAYSIA', 'wong033'),
(26, 6, 'RAJESH', 'NAIR', 'nair@gmail.com', 'nair123', 'NO.123 JALAN SRI DAMANSARA, 52200 KUALA LUMPUR, MALAYSIA', 'nair999'),
(27, 1, 'FATIMAH', 'HUSSAIN', 'hussain@gmail.com', 'hussain123', 'NO.145 JALAN METRO PUDU, 55100 KUALA LUMPUR, MALAYSIA', 'fatimah063'),
(28, 2, 'CHONG', 'YEN', 'yen@gmail.com', 'yen123', 'NO.167 JALAN SRI HARTAMAS, 50480 KUALA LUMPUR, MALAYSIA', 'chong043'),
(29, 3, 'SIVA', 'RAO', 'rao@gmail.com', 'rao123', 'NO.189 JALAN TELAWI, 59100 BANGSAR, KUALA LUMPUR, MALAYSIA', 'siva129'),
(30, 4, 'WONG', 'KIT', 'wong.kit@gmail.com', 'Password30', 'NO.55 JALAN KERINCHI, UNIVERSITY TOWER, 59200 KUALA LUMPUR, MALAYSIA', 'wong033'),
(31, 5, 'HANIF', 'RAHMAN', 'hanif@gmail.com', 'Password31', 'NO.99 JALAN KOTA DAMANSARA, TAMAN SAUJANA, 47810 PETALING JAYA, MALAYSIA', 'hanif066'),
(32, 6, 'GRACE', 'NG', 'grace.ng@gmail.com', 'Password32', 'NO.33 JALAN BANDAR BARU, PUSAT BANDAR PUCHONG, 47160 SELANGOR, MALAYSIA', 'grace067'),
(33, 1, 'KARTHIK', 'PALANI', 'karthik.palani@gmail.com', 'Password33', 'NO.11 JALAN TAMAN SEA, SUBANG PERDANA, 47500 SELANGOR, MALAYSIA', 'karthik002'),
(34, 2, 'AMIRUL', 'HUSNI', 'amirul.husni@gmail.com', 'Password34', 'NO.78 JALAN BUKIT BINTANG, KL CITY CENTRE, 55100 KUALA LUMPUR, MALAYSIA', 'amirul106'),
(35, 3, 'YAP', 'SOON', 'yap.soon@gmail.com', 'Password35', 'NO.67 JALAN SULTAN ISMAIL, KUALA LUMPUR TOWER, 50250 KUALA LUMPUR, MALAYSIA', 'yap038'),
(36, 4, 'FATIN', 'ZULAIKHA', 'fatin.zulaikha@gmail.com', 'Password36', 'NO.12 JALAN ANGGERIK, TAMAN PINGGIRAN KOTA, 40460 SHAH ALAM, MALAYSIA', 'fatin087'),
(37, 5, 'JOHN', 'LEE', 'john.lee@gmail.com', 'Password37', 'NO.76 JALAN MELATI, RAWANG JAYA, 48000 SELANGOR, MALAYSIA', 'john130'),
(38, 6, 'SARAVANAN', 'KRISHNA', 'saravanan.krishna@gmail.com', 'Password38', 'NO.98 JALAN PUTRA MAHKOTA, USJ 16, 47630 SELANGOR, MALAYSIA', 'saravanan079'),
(39, 1, 'AIDA', 'MUSTAFA', 'aida.mustafa@gmail.com', 'Password39', 'NO.89 JALAN SEGAMBUT DALAM, TAMAN SRI SEGAMBUT, 51200 KUALA LUMPUR, MALAYSIA', 'aida056'),
(40, 2, 'TAN', 'WEI', 'tan.wei@gmail.com', 'Password40', 'NO.15 JALAN SEPUTEH, SOUTH CITY PLAZA, 58100 KUALA LUMPUR, MALAYSIA', 'tan053'),
(41, 3, 'SYAFIQ', 'AZHAR', 'syafiq.azhar@gmail.com', 'Password41', 'NO.2 JALAN KEBUN, TAMAN SUNGAI BULOH, 47000 SELANGOR, MALAYSIA', 'syafiq094'),
(42, 4, 'JESSICA', 'GOH', 'jessica.goh@gmail.com', 'Password42', 'NO.7 JALAN UTAMA BANDAR, TAMAN MELAWATI, 53100 KUALA LUMPUR, MALAYSIA', 'jessica010'),
(43, 5, 'PRAVEEN', 'MOORTHY', 'praveen.moorthy@gmail.com', 'Password43', 'NO.44 JALAN DAMANSARA PERDANA, TAMAN DESA, 47310 SELANGOR, MALAYSIA', 'praveen093'),
(44, 6, 'SALMA', 'BASHIR', 'salma.bashir@gmail.com', 'Password44', 'NO.10 JALAN SRI HARTAMAS, KL EAST, 50480 KUALA LUMPUR, MALAYSIA', 'salma044'),
(45, 1, 'CHAN', 'HONG', 'chan.hong@gmail.com', 'Password45', 'NO.60 JALAN TAMAN UJONG, DESA PETALING, 56000 KUALA LUMPUR, MALAYSIA', 'chan120'),
(46, 2, 'NAIM', 'HASSAN', 'naim.hassan@gmail.com', 'Password46', 'NO.71 JALAN KLANG LAMA, TAMAN OUG, 58200 KUALA LUMPUR, MALAYSIA', 'naim015'),
(47, 3, 'KEVIN', 'LIM', 'kevin.lim@gmail.com', 'Password47', 'NO.88 JALAN SS2, SEA PARK, 47400 PETALING JAYA, MALAYSIA', 'kevin096'),
(48, 4, 'SHIVA', 'KUMAR', 'shiva.kumar@gmail.com', 'Password48', 'NO.42 JALAN BANDAR SUNWAY, USJ 14, 47630 SELANGOR, MALAYSIA', 'shiva127'),
(49, 5, 'AINA', 'ZAINAL', 'aina.zainal@gmail.com', 'Password49', 'NO.90 JALAN DESA PETALING, TAMAN MIDAH, 57000 KUALA LUMPUR, MALAYSIA', 'aina006'),
(50, 6, 'LIM', 'YONG', 'lim.yong@gmail.com', 'Password50', 'NO.31 JALAN BUKIT ANGKASA, BANGSAR SOUTH, 59200 KUALA LUMPUR, MALAYSIA', 'lim013'),
(51, 1, 'SYAZWAN', 'RAHIM', 'syazwan.rahim@gmail.com', 'Password51', 'NO.11 JALAN KAJANG UTAMA, TAMAN PRIMA, 43000 KAJANG, SELANGOR, MALAYSIA', 'syazwan090'),
(52, 2, 'FIONA', 'TAN', 'fiona.tan@gmail.com', 'Password52', 'NO.19 JALAN BANDAR KINRARA, PUCHONG JAYA, 47180 SELANGOR, MALAYSIA', 'fiona004'),
(53, 3, 'RAJAN', 'NARAYAN', 'rajan.narayan@gmail.com', 'Password53', 'NO.25 JALAN TEMERLOH, TAMAN PUTRA SULAIMAN, 68000 SELANGOR, MALAYSIA', 'rajan055'),
(54, 4, 'NUR', 'LIYANA', 'nur.liyana@gmail.com', 'Password54', 'NO.17 JALAN SEGAMBUT, TAMAN SRI SEGAMBUT, 51200 KUALA LUMPUR, MALAYSIA', 'nur101'),
(55, 5, 'CHONG', 'YUEN', 'chong.yuen@gmail.com', 'Password55', 'NO.29 JALAN HARTAMAS HEIGHTS, SRI HARTAMAS, 50480 KUALA LUMPUR, MALAYSIA', 'chong043'),
(56, 6, 'ZULFAHMI', 'FAUZAN', 'zulfahmi.fauzan@gmail.com', 'Password56', 'NO.34 JALAN SS15, SUBANG JAYA, 47500 SELANGOR, MALAYSIA', 'zulfahmi048'),
(57, 1, 'AMANDA', 'CHONG', 'amanda.chong@gmail.com', 'Password57', 'NO.21 JALAN KENANGA, TAMAN SERI PUTRA, 43000 KAJANG, SELANGOR, MALAYSIA', 'amanda111'),
(58, 2, 'VIJAY', 'KRISHNAN', 'vijay.krishnan@gmail.com', 'Password58', 'NO.45 JALAN SEPUTEH, TAMAN SEPUTEH, 58100 KUALA LUMPUR, MALAYSIA', 'vijay070'),
(59, 3, 'NADIAH', 'ARIF', 'nadiah.arif@gmail.com', 'Password59', 'NO.12 JALAN PUTRA, TAMAN BUKIT AMPANG, 68000 SELANGOR, MALAYSIA', 'nadiah126'),
(60, 4, 'LOW', 'WEI', 'low.wei@gmail.com', 'Password60', 'NO.67 JALAN BANGSAR, KL SENTRAL, 50470 KUALA LUMPUR, MALAYSIA', 'low071'),
(61, 5, 'HAKIM', 'KAMAL', 'hakim.kamal@gmail.com', 'Password61', 'NO.15 JALAN ANGGERIK, TAMAN MAJU JAYA, 47100 PUCHONG, SELANGOR, MALAYSIA', 'hakim029'),
(62, 6, 'VIVIAN', 'LAI', 'vivian.lai@gmail.com', 'Password62', 'NO.33 JALAN TAMAN UTAMA, TAMAN DESA, 56000 KUALA LUMPUR, MALAYSIA', 'vivian084'),
(63, 1, 'NAVEEN', 'MENON', 'naveen.menon@gmail.com', 'Password63', 'NO.28 JALAN CHERAS, TAMAN MIDAH, 56100 KUALA LUMPUR, MALAYSIA', 'naveen128'),
(64, 2, 'SARA', 'HUSNA', 'sara.husna@gmail.com', 'Password64', 'NO.19 JALAN SRI PETALING, BANDAR SRI PETALING, 57000 KUALA LUMPUR, MALAYSIA', 'sara100'),
(65, 3, 'ONG', 'XIN', 'ong.xin@gmail.com', 'Password65', 'NO.54 JALAN DAMANSARA HEIGHTS, KL, 50490 KUALA LUMPUR, MALAYSIA', 'ong060'),
(66, 4, 'HARIS', 'ZAIN', 'haris.zain@gmail.com', 'Password66', 'NO.7 JALAN KEMUNING, TAMAN KINRARA, 47100 PUCHONG, SELANGOR, MALAYSIA', 'haris057'),
(67, 5, 'CHARLENE', 'CHAN', 'charlene.chan@gmail.com', 'Password67', 'NO.41 JALAN BUKIT JALIL, TAMAN ARA DAMANSARA, 47000 SELANGOR, MALAYSIA', 'charlene008'),
(68, 6, 'MANOJ', 'NAIR', 'manoj.nair@gmail.com', 'Password68', 'NO.22 JALAN PANDAN, TAMAN MELAWATI, 53100 KUALA LUMPUR, MALAYSIA', 'manoj131'),
(69, 1, 'NUR', 'AIN', 'nur.ain@gmail.com', 'Password69', 'NO.43 JALAN DESA PANDAN, KAMPUNG PANDAN, 55100 KUALA LUMPUR, MALAYSIA', 'nur101'),
(70, 2, 'YEOH', 'SOON', 'yeoh.soon@gmail.com', 'Password70', 'NO.31 JALAN DAMAI, TAMAN SRI HARTAMAS, 50480 KUALA LUMPUR, MALAYSIA', 'yeoh112'),
(71, 3, 'ZIKRI', 'ADAM', 'zikri.adam@gmail.com', 'Password71', 'NO.14 JALAN BANGI, BANDAR BARU BANGI, 43000 SELANGOR, MALAYSIA', 'zikri080'),
(72, 4, 'MABEL', 'LOW', 'mabel.low@gmail.com', 'Password72', 'NO.18 JALAN BUKIT UTAMA, TAMAN MELATI, 53100 KUALA LUMPUR, MALAYSIA', 'mabel050'),
(73, 5, 'ARUN', 'KRISHNA', 'arun.krishna@gmail.com', 'Password73', 'NO.29 JALAN RAWANG, TAMAN SRI GOMBAK, 68100 SELANGOR, MALAYSIA', 'arun065'),
(74, 6, 'FARAH', 'NAJWA', 'farah.najwa@gmail.com', 'Password74', 'NO.37 JALAN PUCHONG JAYA, TAMAN MAJU JAYA, 47100 SELANGOR, MALAYSIA', 'farah132'),
(75, 1, 'TAN', 'LI', 'tan.li@gmail.com', 'Password75', 'NO.23 JALAN BANDAR TASIK, TAMAN SRI RAMPAI, 53300 KUALA LUMPUR, MALAYSIA', 'tan053'),
(76, 2, 'MUHAMMAD', 'FAKHRY', 'muhammad.fakhry@gmail.com', 'Password76', 'NO.16 JALAN PUTRA PERMAI, TAMAN EQUINE PARK, 43300 SELANGOR, MALAYSIA', 'muhammad108'),
(77, 3, 'REBECCA', 'CHEW', 'rebecca.chew@gmail.com', 'Password77', 'NO.11 JALAN SUNGAI LONG, BANDAR SUNGAI LONG, 43200 SELANGOR, MALAYSIA', 'rebecca046'),
(78, 4, 'VIKRAM', 'SHETTY', 'vikram.shetty@gmail.com', 'Password78', 'NO.22 JALAN PUTRA HEIGHTS, TAMAN SUBANG, 47500 SELANGOR, MALAYSIA', 'vikram077'),
(79, 5, 'AMIRAH', 'HANIM', 'amirah.hanim@gmail.com', 'Password79', 'NO.19 JALAN MIDAH, TAMAN CHERAS, 56100 KUALA LUMPUR, MALAYSIA', 'amirah091'),
(80, 6, 'GOH', 'YEE', 'goh.yee@gmail.com', 'Password80', 'NO.12 JALAN TAMAN MEWAH, TAMAN PANDAN INDAH, 55100 KUALA LUMPUR, MALAYSIA', 'goh075'),
(81, 3, 'NURUL', 'IZZATI', 'nurul.izzati@gmail.com', 'Password81', 'NO.8 JALAN SRI DAMANSARA, TAMAN DESA DAMANSARA 52200 KUALA LUMPUR, MALAYSIA', 'nurul005'),
(82, 1, 'ALI', 'AHMAD', 'ali.ahmad@gmail.com', 'Password82', 'NO.1 JALAN BUKIT, TAMAN MIDAH, 56000 KUALA LUMPUR, MALAYSIA', 'ali099'),
(83, 2, 'BOON', 'LEE', 'boon.lee@gmail.com', 'Password83', 'NO.2 JALAN SS15, SUBANG JAYA, 47500 SELANGOR, MALAYSIA', 'boon042'),
(84, 3, 'CHARAN', 'SINGH', 'charan.singh@gmail.com', 'Password84', 'NO.3 JALAN SRI DAMANSARA, 52200 KUALA LUMPUR, MALAYSIA', 'charan019'),
(85, 4, 'DINI', 'RAHMAN', 'dini.rahman@gmail.com', 'Password85', 'NO.4 JALAN BUKIT BINTANG, 55100 KUALA LUMPUR, MALAYSIA', 'dini011'),
(86, 5, 'ENG', 'YONG', 'eng.yong@gmail.com', 'Password86', 'NO.5 JALAN TUN RAZAK, 50400 KUALA LUMPUR, MALAYSIA', 'eng110'),
(87, 6, 'FARID', 'ZAIN', 'farid.zain@gmail.com', 'Password87', 'NO.6 JALAN SETIA ALAM, 40170 SHAH ALAM, SELANGOR, MALAYSIA', 'farid049'),
(88, 1, 'GARY', 'TAN', 'gary.tan@gmail.com', 'Password88', 'NO.7 JALAN PANDAN MEWAH, 55100 KUALA LUMPUR, MALAYSIA', 'gary007'),
(89, 2, 'HARIS', 'RAO', 'haris.rao@gmail.com', 'Password89', 'NO.8 JALAN BUKIT INDAH, 68000 SELANGOR, MALAYSIA', 'haris057'),
(90, 3, 'IRIS', 'AMINAH', 'iris.aminah@gmail.com', 'Password90', 'NO.9 JALAN DAMAI UTAMA, 57000 KUALA LUMPUR, MALAYSIA', 'iris072'),
(91, 4, 'JASON', 'WONG', 'jason.wong@gmail.com', 'Password91', 'NO.10 JALAN KERINCHI, 59200 KUALA LUMPUR, MALAYSIA', 'jason054'),
(92, 5, 'KAMAL', 'RAHMAN', 'kamal.rahman@gmail.com', 'Password92', 'NO.11 JALAN KOTA DAMANSARA, 47810 PETALING JAYA, MALAYSIA', 'kamal017'),
(93, 6, 'LINA', 'NG', 'lina.ng@gmail.com', 'Password93', 'NO.12 JALAN BANDAR BARU, 47160 SELANGOR, MALAYSIA', 'lina068'),
(94, 1, 'MONG', 'PALANI', 'mong.palani@gmail.com', 'Password94', 'NO.13 JALAN TAMAN SEA, 47500 SELANGOR, MALAYSIA', 'mong021'),
(95, 2, 'NINA', 'HUSNI', 'nina.husni@gmail.com', 'Password95', 'NO.14 JALAN BUKIT BINTANG, 55100 KUALA LUMPUR, MALAYSIA', 'nina122'),
(96, 3, 'ONG', 'SOON', 'ong.soon@gmail.com', 'Password96', 'NO.15 JALAN SULTAN ISMAIL, 50250 KUALA LUMPUR, MALAYSIA', 'ong060'),
(97, 4, 'PETER', 'ZULAIKHA', 'peter.zulaikha@gmail.com', 'Password97', 'NO.16 JALAN ANGGERIK, 40460 SHAH ALAM, MALAYSIA', 'peter047'),
(98, 5, 'QUEENIE', 'LEE', 'queenie.lee@gmail.com', 'Password98', 'NO.17 JALAN MELATI, 48000 SELANGOR, MALAYSIA', 'queenie016'),
(99, 6, 'RAJU', 'KRISHNA', 'raju.krishna@gmail.com', 'Password99', 'NO.18 JALAN PUTRA MAHKOTA, 47630 SELANGOR, MALAYSIA', 'raju020'),
(100, 1, 'SITI', 'MUSTAFA', 'siti.mustafa@gmail.com', 'Password100', 'NO.19 JALAN SEGAMBUT DALAM, 51200 KUALA LUMPUR, MALAYSIA', 'siti095'),
(101, 2, 'TOM', 'WEI', 'tom.wei@gmail.com', 'Password101', 'NO.20 JALAN SEPUTEH, 58100 KUALA LUMPUR, MALAYSIA', 'tom024'),
(102, 3, 'UMAR', 'AZHAR', 'umar.azhar@gmail.com', 'Password102', 'NO.21 JALAN KEBUN, 47000 SELANGOR, MALAYSIA', 'umar035'),
(103, 4, 'VICTORIA', 'GOH', 'victoria.goh@gmail.com', 'Password103', 'NO.22 JALAN UTAMA BANDAR, 53100 KUALA LUMPUR, MALAYSIA', 'victoria009'),
(104, 5, 'WILL', 'MOORTHY', 'will.moorthy@gmail.com', 'Password104', 'NO.23 JALAN DAMANSARA PERDANA, 47310 SELANGOR, MALAYSIA', 'will040'),
(105, 6, 'XIN', 'BASHIR', 'xin.bashir@gmail.com', 'Password105', 'NO.24 JALAN SRI HARTAMAS, 50480 KUALA LUMPUR, MALAYSIA', 'xin051'),
(106, 1, 'YUSUF', 'HONG', 'yusuf.hong@gmail.com', 'Password106', 'NO.25 JALAN TAMAN UJONG, 56000 KUALA LUMPUR, MALAYSIA', 'yusuf125'),
(107, 2, 'ZARA', 'HASSAN', 'zara.hassan@gmail.com', 'Password107', 'NO.26 JALAN KLANG LAMA, 58200 KUALA LUMPUR, MALAYSIA', 'zara036'),
(108, 3, 'AMIR', 'LIM', 'amir.lim@gmail.com', 'Password108', 'NO.27 JALAN SS2, 47400 PETALING JAYA, MALAYSIA', 'amir113'),
(109, 4, 'BELLA', 'KUMAR', 'bella.kumar@gmail.com', 'Password109', 'NO.28 JALAN BANDAR SUNWAY, 47630 SELANGOR, MALAYSIA', 'bella025'),
(110, 5, 'CHRIS', 'ZAINAL', 'chris.zainal@gmail.com', 'Password110', 'NO.29 JALAN DESA PETALING, 57000 KUALA LUMPUR, MALAYSIA', 'chris034'),
(111, 6, 'DAN', 'YONG', 'dan.yong@gmail.com', 'Password111', 'NO.30 JALAN BUKIT ANGKASA, 59200 KUALA LUMPUR, MALAYSIA', 'dan119'),
(112, 1, 'EMMA', 'RAHIM', 'emma.rahim@gmail.com', 'Password112', 'NO.31 JALAN KAJANG UTAMA, 43000 KAJANG, SELANGOR, MALAYSIA', 'emma001'),
(113, 2, 'FIONA', 'TAN', 'fiona.tan@gmail.com', 'Password113', 'NO.32 JALAN BANDAR KINRARA, 47180 SELANGOR, MALAYSIA', 'fiona004'),
(114, 3, 'GARY', 'NARAYAN', 'gary.narayan@gmail.com', 'Password114', 'NO.33 JALAN TEMERLOH, 68000 SELANGOR, MALAYSIA', 'gary007'),
(115, 4, 'HANIS', 'LIYANA', 'hanis.liyana@gmail.com', 'Password115', 'NO.34 JALAN SEGAMBUT, 51200 KUALA LUMPUR, MALAYSIA', 'hanis118'),
(116, 5, 'ISMAIL', 'YUEN', 'ismail.yuen@gmail.com', 'Password116', 'NO.35 JALAN HARTAMAS HEIGHTS, 50480 KUALA LUMPUR, MALAYSIA', 'ismail023'),
(117, 6, 'JULIA', 'FAUZAN', 'julia.fauzan@gmail.com', 'Password117', 'NO.36 JALAN SS15, 47500 SELANGOR, MALAYSIA', 'julia003'),
(118, 1, 'KELLY', 'CHONG', 'kelly.chong@gmail.com', 'Password118', 'NO.37 JALAN KENANGA, 43000 KAJANG, SELANGOR, MALAYSIA', 'kelly058'),
(119, 2, 'LIM', 'KRISHNAN', 'lim.krishnan@gmail.com', 'Password119', 'NO.38 JALAN SEPUTEH, 58100 KUALA LUMPUR, MALAYSIA', 'lim013'),
(120, 3, 'MALIK', 'ARIF', 'malik.arif@gmail.com', 'Password120', 'NO.39 JALAN PUTRA, 68000 SELANGOR, MALAYSIA', 'malik028'),
(121, 4, 'NADIA', 'WEI', 'nadia.wei@gmail.com', 'Password121', 'NO.40 JALAN BANGSAR, 50470 KUALA LUMPUR, MALAYSIA', 'nadia114'),
(122, 5, 'OSMAN', 'KAMAL', 'osman.kamal@gmail.com', 'Password122', 'NO.41 JALAN ANGGERIK, 47100 PUCHONG, SELANGOR, MALAYSIA', 'osman039'),
(123, 6, 'PAUL', 'LAI', 'paul.lai@gmail.com', 'Password123', 'NO.42 JALAN TAMAN UTAMA, 56000 KUALA LUMPUR, MALAYSIA', 'paul062'),
(124, 1, 'QUEEN', 'MENON', 'queen.menon@gmail.com', 'Password124', 'NO.43 JALAN CHERAS, 56100 KUALA LUMPUR, MALAYSIA', 'queen052'),
(125, 2, 'RUTH', 'HUSNA', 'ruth.husna@gmail.com', 'Password125', 'NO.44 JALAN SRI PETALING, 57000 KUALA LUMPUR, MALAYSIA', 'ruth098'),
(126, 3, 'SAM', 'XIN', 'sam.xin@gmail.com', 'Password126', 'NO.45 JALAN DAMANSARA HEIGHTS, 50490 KUALA LUMPUR, MALAYSIA', 'sam026'),
(127, 4, 'TINA', 'ZAIN', 'tina.zain@gmail.com', 'Password127', 'NO.46 JALAN KEMUNING, 47100 PUCHONG, SELANGOR, MALAYSIA', 'tina085'),
(128, 5, 'UMAR', 'CHAN', 'umar.chan@gmail.com', 'Password128', 'NO.47 JALAN BUKIT JALIL, 47000 SELANGOR, MALAYSIA', 'umar035'),
(129, 6, 'VICKY', 'NAIR', 'vicky.nair@gmail.com', 'Password129', 'NO.48 JALAN PANDAN, 53100 KUALA LUMPUR, MALAYSIA', 'vicky061'),
(130, 1, 'WONG', 'AIN', 'wong.ain@gmail.com', 'Password130', 'NO.49 JALAN DESA PANDAN, 55100 KUALA LUMPUR, MALAYSIA', 'wong033'),
(131, 2, 'YAP', 'SOON', 'yap.soon@gmail.com', 'Password131', 'NO.50 JALAN DAMAI, 50480 KUALA LUMPUR, MALAYSIA', 'yap038'),
(132, 3, 'ZAKI', 'ADAM', 'zaki.adam@gmail.com', 'Password132', 'NO.51 JALAN BANGI, 43000 SELANGOR, MALAYSIA', 'zaki123'),
(133, 4, 'AISHA', 'LOW', 'aisha.low@gmail.com', 'Password133', 'NO.52 JALAN BUKIT UTAMA, 53100 KUALA LUMPUR, MALAYSIA', 'aisha041'),
(134, 5, 'BOB', 'KRISHNA', 'bob.krishna@gmail.com', 'Password134', 'NO.53 JALAN RAWANG, 68100 SELANGOR, MALAYSIA', NULL),
(135, 6, 'CHARLIE', 'NAJWA', 'charlie.najwa@gmail.com', 'Password135', 'NO.54 JALAN PUCHONG JAYA, 47100 SELANGOR, MALAYSIA', 'charlie121'),
(136, 1, 'DINA', 'LI', 'dina.li@gmail.com', 'Password136', 'NO.55 JALAN BANDAR TASIK, 53300 KUALA LUMPUR, MALAYSIA', 'dina069'),
(137, 2, 'ERIC', 'FAKHRY', 'eric.fakhry@gmail.com', 'Password137', 'NO.56 JALAN PUTRA PERMAI, 43300 SELANGOR, MALAYSIA', 'eric105'),
(138, 3, 'FELIX', 'CHEW', 'felix.chew@gmail.com', 'Password138', 'NO.57 JALAN SUNGAI LONG, 43200 SELANGOR, MALAYSIA', 'felix018'),
(139, 4, 'GLORIA', 'SHETTY', 'gloria.shetty@gmail.com', 'Password139', 'NO.58 JALAN PUTRA HEIGHTS, 47500 SELANGOR, MALAYSIA', 'gloria115'),
(140, 5, 'HADI', 'HANIM', 'hadi.hanim@gmail.com', 'Password140', 'NO.59 JALAN MIDAH, 56100 KUALA LUMPUR, MALAYSIA', 'hadi089'),
(141, 6, 'IVAN', 'YEE', 'ivan.yee@gmail.com', 'Password141', 'NO.60 JALAN TAMAN MEWAH, 55100 KUALA LUMPUR, MALAYSIA', 'ivan078'),
(142, 1, 'JAMES', 'RAHMAN', 'james.rahman@gmail.com', 'Password142', 'NO.61 JALAN DESA MELUR, 56000 KUALA LUMPUR, MALAYSIA', 'james059'),
(143, 2, 'KIM', 'LEE', 'kim.lee@gmail.com', 'Password143', 'NO.62 JALAN SS15, 47500 SELANGOR, MALAYSIA', 'kim022'),
(144, 3, 'LILA', 'KUMAR', 'lila.kumar@gmail.com', 'Password144', 'NO.63 JALAN JAYA UTAMA, 46000 SELANGOR, MALAYSIA', 'lila030'),
(145, 4, 'MIKE', 'AMINAH', 'mike.aminah@gmail.com', 'Password145', 'NO.64 JALAN IMPIAN, 50480 KUALA LUMPUR, MALAYSIA', 'mike031'),
(146, 5, 'NICK', 'WAI', 'nick.wai@gmail.com', 'Password146', 'NO.65 JALAN TUN RAZAK, 50400 KUALA LUMPUR, MALAYSIA', 'nick032'),
(147, 6, 'OSCAR', 'HANIS', 'oscar.hanis@gmail.com', 'Password147', 'NO.66 JALAN SETIA ALAM, 40170 SHAH ALAM, SELANGOR, MALAYSIA', 'oscar116'),
(148, 1, 'PETER', 'TAN', 'peter.tan@gmail.com', 'Password148', 'NO.67 JALAN PANDAN MEWAH, 55100 KUALA LUMPUR, MALAYSIA', 'peter047'),
(149, 2, 'QUEEN', 'RAO', 'queen.rao@gmail.com', 'Password149', 'NO.68 JALAN BUKIT INDAH, 68000 SELANGOR, MALAYSIA', 'queen052'),
(150, 3, 'RICK', 'AMINAH', 'rick.aminah@gmail.com', 'Password150', 'NO.69 JALAN DAMAI UTAMA, 57000 KUALA LUMPUR, MALAYSIA', 'rick037'),
(151, 4, 'SAM', 'WONG', 'sam.wong@gmail.com', 'Password151', 'NO.70 JALAN KERINCHI, 59200 KUALA LUMPUR, MALAYSIA', 'sam026'),
(152, 5, 'TOM', 'RAHMAN', 'tom.rahman@gmail.com', 'Password152', 'NO.71 JALAN KOTA DAMANSARA, 47810 PETALING JAYA, MALAYSIA', 'tom024'),
(153, 6, 'UMA', 'NG', 'uma.ng@gmail.com', 'Password153', 'NO.72 JALAN BANDAR BARU, 47160 SELANGOR, MALAYSIA', 'uma064'),
(156, 1, 'Hanis', 'Johari', 'hanis@gmail.com', 'hanis123', '123, Jalan Bukit Bintang, 55100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', 'hanis04'),
(160, 3, 'MIN', 'HANA', 'min@gmail.com', 'minmin', '83 JLN MEGA MENDUNG KOMPLEK BANDAR, 47300 KUALA LUMPUR', 'mina33'),
(161, 3, 'Ain', 'Laila', 'lela@gmail.com', 'lala', 'NO. 15, JALAN TUN RAZAK, 50400 KUALA LUMPUR, WILAYAH PERSEKUTUAN KUALA LUMPUR, MALAYSIA', 'ain99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BOOKING_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `PACKAGE_ID` (`PACKAGE_ID`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`CAR_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`PACKAGE_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAYMENT_ID`),
  ADD KEY `SALES_ID` (`SALES_ID`),
  ADD KEY `BOOKING_ID` (`BOOKING_ID`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`SALES_ID`),
  ADD KEY `ADMIN_ID` (`ADMIN_ID`) USING BTREE;

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`SERVICE_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`STAFF_ID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`TEAM_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `TEAM_ID` (`TEAM_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ADMIN_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BOOKING_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `CAR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PAYMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `SALES_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `SERVICE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `STAFF_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `TEAM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`PACKAGE_ID`) REFERENCES `package` (`PACKAGE_ID`);

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`SALES_ID`) REFERENCES `sale` (`SALES_ID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`BOOKING_ID`) REFERENCES `booking` (`BOOKING_ID`);

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`ADMIN_ID`) REFERENCES `admin` (`ADMIN_ID`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK_SERVICE_PACKAGE` FOREIGN KEY (`PACKAGE_ID`) REFERENCES `package` (`PACKAGE_ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`TEAM_ID`) REFERENCES `team` (`TEAM_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
