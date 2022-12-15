-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 03:38 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE `tb_history` (
  `id_history` int(11) NOT NULL,
  `id_reservation` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `price` float NOT NULL,
  `payment` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`id_history`, `id_reservation`, `id_customer`, `date`, `status`, `price`, `payment`) VALUES
(1, 0, 1, '2022-12-12 21:10:18', 1, 0, 0),
(8, 43, 2, '2022-12-14 01:09:04', 0, 165, 0),
(9, 44, 2, '2022-12-14 03:29:21', 1, 165, 0),
(10, 45, 20, '2022-12-14 04:18:08', 1, 2330, 0),
(11, 46, 21, '2022-12-14 09:52:16', 0, 132, 0),
(12, 47, 22, '2022-12-14 11:49:43', 0, 187, 0),
(13, 48, 22, '2022-12-14 11:59:44', 0, 275, 0),
(14, 45, 22, '2022-12-14 12:10:49', 0, 87, 0),
(15, 46, 22, '2022-12-14 12:11:07', 0, 87, 0),
(16, 47, 23, '2022-12-15 09:00:47', 0, 143, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`id_history`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
