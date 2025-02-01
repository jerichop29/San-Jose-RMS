-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 02:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `cottage/hall`
--

CREATE TABLE `cottage/hall` (
  `id` int(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `actual_no` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `max_person` int(250) NOT NULL,
  `price` int(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cottage/hall`
--

INSERT INTO `cottage/hall` (`id`, `img`, `actual_no`, `name`, `type`, `category`, `max_person`, `price`) VALUES
(5, 'uploads/Cottage with videoke.jpg', '0101', 'Cottage with Videoke', 'Cottage', '3rd Class', 20, 1500),
(6, 'uploads/Table1.jpg', '0001', 'Cottage Table One', 'Cottage', '1st Class', 5, 500),
(7, 'uploads/Table2.jpg', '0011', 'Cottage Table Two', 'Cottage', '1st Class', 10, 700),
(8, 'uploads/Table3.jpg', '0111', 'Cottage Table Three', 'Cottage', '1st Class', 15, 900),
(9, 'uploads/intro2.jpg', '1111', 'Function Hall', 'Hall', '1st Class', 100, 10000),
(11, 'uploads/Couple Room.jpg', '1234', 'Couple Room', 'Room', '2nd Class', 2, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `id` int(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `desc` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`id`, `img`, `name`, `desc`) VALUES
(26, 'uploads/intro2.jpg', 'Function Hall', 'P 10000, Good for 50 - 100 Pax.'),
(21, 'uploads/Table1.jpg', 'Cottage Table One', 'P 500, Good for 2 - 5 Pax.\r\n'),
(22, 'uploads/Table2.jpg', 'Cottage Table Two', 'P 700, Good for 5 - 10 Pax.'),
(23, 'uploads/Table3.jpg', 'Cottage Table Three', 'P 900, Good for 10 - 15 Pax.'),
(24, 'uploads/Cottage with videoke.jpg', 'Cottage with Videoke', 'P 1500, Good for 15 - 20 Pax.'),
(25, 'uploads/Couple Room.jpg', 'Couple Room', 'P 1200, Good for 1 - 2 Pax.');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(250) NOT NULL,
  `cust_id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `cust_id`, `name`, `description`) VALUES
(9, 0, 'Anonymous', 'vfsdfdsfsdfsdffsd'),
(2, 0, 'batman', 'napaka angas sana'),
(5, 0, 'Anonymous', 'hello myprend'),
(6, 0, 'Anonymous', 'grabe ngayon');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(250) NOT NULL,
  `transaction_id` int(250) NOT NULL,
  `ammount_payment` int(250) NOT NULL,
  `payment_status` varchar(250) NOT NULL,
  `ref_no` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `transaction_id`, `ammount_payment`, `payment_status`, `ref_no`) VALUES
(13, 1930563728, 1575, 'Paid', 'ygyuiuytu898979'),
(12, 1329612585, 600, 'Fullypaid', 'dsfsdfsfds'),
(11, 936267790, 1338, 'Paid', 'fsdfsdfsdf'),
(10, 938987762, 288, 'Paid', 'tdgdgdg'),
(9, 1075774994, 5500, 'Paid', 'fdfsfsfds'),
(8, 320532694, 1575, 'Paid', 'dasdasd24323'),
(7, 1233001670, 1576, 'Fullypaid', 'zxfdzfzfzd'),
(14, 1426719005, 600, 'Fullypaid', 'fdfsdfsd'),
(15, 1930367222, 813, 'Paid', 'fgdfgdf'),
(16, 1625187494, 975, 'Paid', '342334223'),
(17, 616119588, 975, 'Paid', 'dfsdfsdfsd'),
(18, 1029260376, 1200, 'Fullypaid', 'dsfsdfsd'),
(19, 181612039, 788, 'Paid', 'dasdasdasd'),
(20, 491588968, 488, 'Paid', 'dfdsf'),
(21, 1574619412, 776, 'Fullypaid', 'fsdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `id` int(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `des` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `img`, `name`, `des`) VALUES
(10, 'uploads/Table2.jpg', 'Table', 'Table'),
(9, 'uploads/Table1.jpg', 'Table', 'Table'),
(11, 'uploads/Table3.jpg', 'Table', 'Table'),
(12, 'uploads/Cottage with videoke.jpg', 'Cottage', 'Cottage'),
(13, 'uploads/Couple Room.jpg', 'Room', 'Room'),
(14, 'uploads/intro2.jpg', 'Hall', 'Hall');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id_res` int(250) NOT NULL,
  `trans_no` varchar(250) NOT NULL,
  `date_reserve` date NOT NULL,
  `child` int(250) NOT NULL,
  `adult` int(250) NOT NULL,
  `time_slot` varchar(250) NOT NULL,
  `additional` int(250) NOT NULL,
  `check_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `check_out` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(250) NOT NULL,
  `cottage/hall_id` int(250) NOT NULL,
  `customer_id` int(250) NOT NULL,
  `date_created` date NOT NULL,
  `downpayment` int(250) NOT NULL,
  `balance` int(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id_res`, `trans_no`, `date_reserve`, `child`, `adult`, `time_slot`, `additional`, `check_in`, `check_out`, `status`, `cottage/hall_id`, `customer_id`, `date_created`, `downpayment`, `balance`) VALUES
(163, '616119588', '2023-08-04', 0, 5, 'Day (7am to 6pm)', 0, '2023-08-03 10:12:32', '0000-00-00 00:00:00', 'Cancelled', 7, 26, '2023-08-03', 0, 0),
(161, '1625187494', '2023-08-03', 0, 5, 'Day (7am to 6pm)', 0, '2023-08-03 10:11:01', '0000-00-00 00:00:00', 'Cancelled', 7, 26, '2023-08-03', 0, 0),
(162, '1625187494', '2023-08-03', 0, 5, 'Night (7pm to 6am)', 50, '2023-08-03 10:11:10', '0000-00-00 00:00:00', 'Cancelled', 7, 26, '2023-08-03', 0, 0),
(164, '616119588', '2023-08-04', 0, 5, 'Night (7pm to 6am)', 50, '2023-08-03 10:11:53', '0000-00-00 00:00:00', 'Cancelled', 7, 26, '2023-08-03', 0, 0),
(170, '181612039', '2023-09-01', 1, 1, 'Day (7am to 6pm)', 0, '2023-08-03 10:00:21', '0000-00-00 00:00:00', 'Cancelled', 5, 26, '2023-08-03', 0, 0),
(168, '1029260376', '2023-08-03', 1, 1, 'Day (7am to 6pm)', 0, '2023-08-03 10:34:33', '0000-00-00 00:00:00', 'Cancelled', 6, 26, '2023-08-03', 0, 0),
(169, '1029260376', '2023-08-03', 1, 1, 'Night (7pm to 6am)', 50, '2023-08-03 10:34:33', '0000-00-00 00:00:00', 'Cancelled', 6, 26, '2023-08-03', 0, 0),
(171, '491588968', '2023-08-29', 1, 1, 'Day (7am to 6pm)', 0, '2023-08-03 10:47:09', '0000-00-00 00:00:00', 'Reserved', 8, 26, '2023-08-03', 0, 0),
(172, '1574619412', '2023-08-15', 1, 1, 'Day (7am to 6pm)', 0, '2023-08-03 10:47:50', '0000-00-00 00:00:00', 'Fullypaid', 7, 26, '2023-08-03', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `contact_no` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `uname` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `user_type_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `contact_no`, `address`, `uname`, `pass`, `user_type_id`) VALUES
(1, 'admin', 'admin', '0', 'poblacion', 'admin', 'admin', 1),
(18, 'Cardo', 'Dalisay', '09783648265', 'this is sample address', 'cardo', 'cardo1234', 3),
(19, 'roy', 'paring', '5345345345', 'dada fsffd dfsdf sdf ', 'staff', 'staff', 4),
(26, 'Roy', 'Paring', '09353372791', 'Street', 'roy', 'roy123', 3),
(30, 'vincent', 'paring', '243234234', 'streeetttttt', 'vin', 'Vincent123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(250) NOT NULL,
  `user_type_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type_name`) VALUES
(1, 'admin'),
(2, 'superadmin'),
(3, 'customer'),
(4, 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cottage/hall`
--
ALTER TABLE `cottage/hall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_res`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cottage/hall`
--
ALTER TABLE `cottage/hall`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_res` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
