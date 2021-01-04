-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 02:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invnt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `cell_number` int(10) DEFAULT NULL,
  `id_number` int(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invnt_tbl`
--

CREATE TABLE `invnt_tbl` (
  `id` int(10) NOT NULL,
  `campaign_name` varchar(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `cell_number` varchar(10) DEFAULT NULL,
  `id_number` varchar(13) DEFAULT NULL,
  `salary` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invnt_tbl`
--

INSERT INTO `invnt_tbl` (`id`, `campaign_name`, `name`, `surname`, `cell_number`, `id_number`, `salary`) VALUES
(47, 'stdlife', 'Agent', 'Nodume', '0717247607', '5664543456777', 'R 1000 - R4 000'),
(53, 'stdlife', 'Agent', 'Nodum', '0717247607', '5664543456777', 'R 1000 - R4 000'),
(58, 'cartrack', 'Agent', 'Nodum', '0747564734', '5664543456777', 'R 1000 - R4 000'),
(59, 'omsti', 'Lwando', 'Nodum', '0747564734', '5664543456777', 'R 8000 - R16 000'),
(64, 'kingprice', 'Agent', 'Nodum', '0747564734', '3343342332132', 'R 1000 - R4 000'),
(65, 'cartrack', 'John', 'Doe', '0495859487', '8475839487532', 'R 4000 - R8 000'),
(66, 'kingprice', 'Lwando', 'Nodume', '0717247607', '9877075435675', 'R 4000 - R8 000'),
(67, 'omsti', 'Lwando', 'Nodum', '0717247607', '9877075435675', 'R 4000 - R8 000'),
(68, 'omlife', 'Lwando', 'Doe', '0495859487', '9878676655675', 'R 8000 - R16 000'),
(69, 'omlife', 'Agent', 'Nodume', '0717247607', '9877075435675', 'R 1000 - R4 000'),
(70, 'cartrack', 'Lwand', 'Nodum', '0975554434', '9877075435675', 'R 4000 - R8 000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `role` varchar(5) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `cell_number` varchar(10) DEFAULT NULL,
  `id_number` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `surname`, `cell_number`, `id_number`, `email`, `password`) VALUES
(75, 'agent', 'Lwando', 'Nodume', '0717247607', '5664543456777', 'lwandonodume@gmail.com', '12'),
(84, 'agent', 'Lwado', 'Nodume', '0717247607', '9877075435675', 'agent@gmail.com', '1234567'),
(85, 'agent', 'Lwando', 'Nodume', '0717247607', '9877075435675', 'agents@gmail.com', '123456'),
(86, 'admin', 'Lwando', 'Nodume', '0717247607', '9877075435675', 'lwando@gmail.com', '123456'),
(87, 'admin', 'Lando', 'Nodme', '0975554434', '3343342332132', 'admin@gmail.com', '123456'),
(88, 'agent', 'Lwando', 'Nodume', '0717247607', '9877075435675', 'test@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invnt_tbl`
--
ALTER TABLE `invnt_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`id_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invnt_tbl`
--
ALTER TABLE `invnt_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
