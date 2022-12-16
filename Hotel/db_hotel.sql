-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 04:45 PM
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
-- Table structure for table `tb_customers`
--

CREATE TABLE `tb_customers` (
  `id_customer` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `member` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customers`
--

INSERT INTO `tb_customers` (`id_customer`, `name`, `email`, `phone`, `password`, `member`) VALUES
(1, 'Admin', 'admin', '0123456789', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'Ngô Trọng Nghĩa', 'nghia.nt2704@gmail.com', '0123456789', '4297f44b13955235245b2497399d7a93', 1),
(3, 'Tin Ngoc Lien', 'lientin@gmail.com', '0123456789', '4297f44b13955235245b2497399d7a93', 1),
(4, 'Lo Mo To Kien', 'lmtk@gmail.com', '0190878877', '4297f44b13955235245b2497399d7a93', 1),
(5, 'Tin Ngoc Lay', 'abc@gmail.com', '0999928232', '', 1),
(6, 'Nguyen Van A', 'aaa@gmail.com', '0999928232', '', 0),
(7, 'Nguyen Van B', 'bbb@gmail.com', '0999928232', '', 1),
(8, 'Nguyen Van C', 'ccc@gmail.com', '0999928232', '', 0),
(19, 'Ngo Trong Nghia', 'nghia@gmail.com', '1234567890', '', 0),
(20, 'Lien ', 'lien@gmail.com', '0992282322', '4297f44b13955235245b2497399d7a93', 1),
(21, 'Lam Minh Tuan Kien', 'kien@gmail.com', '0123456789', '', 0),
(22, 'Lam Minh Tuan Kien', 'kien123@gmail.com', '0121734357', '9a889b2a71bd47d105698d8d3d9fa678', 1),
(23, 'Tran Dai Nhan', 'bnb@gmail.com', '0912838172', 'e10adc3949ba59abbe56e057f20f883e', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_locations`
--

CREATE TABLE `tb_locations` (
  `id_location` int(11) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_locations`
--

INSERT INTO `tb_locations` (`id_location`, `location`) VALUES
(1, 'Da Nang'),
(2, 'Ha Noi Capital'),
(3, 'Hoi An'),
(4, 'Hue'),
(5, 'Ho Chi Minh City'),
(6, 'Nha Trang'),
(7, 'Phu Quoc'),
(8, 'Quang Binh'),
(9, 'Son La'),
(10, 'Vung Tau');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rooms`
--

CREATE TABLE `tb_rooms` (
  `id_room` int(11) NOT NULL,
  `nameRoom` varchar(200) NOT NULL,
  `kind` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `bedroom` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rooms`
--

INSERT INTO `tb_rooms` (`id_room`, `nameRoom`, `kind`, `rating`, `id_location`, `adult`, `children`, `bedroom`, `bathroom`, `price`, `image`, `description`, `status`) VALUES
(1, 'Normal Room Single Bed HoiAn Town', 'Normal', 3, 3, 2, 0, 1, 1, 80, '/imageRooms/Normal/N001/N001.jpg', 'Basic room 5 minutes by car from Hoi An ancient town, fully equipped ready to serve for up to 2 guests. View of the old town is located in the center of the busy service area.', 0),
(2, 'Normal Room Basic SonLa Lounge', 'Normal', 5, 9, 2, 0, 1, 1, 100, '/imageRooms/Normal/N002/N002.jpg', 'Normal room with Lounge Studio design inspired by classical and modern music.', 0),
(3, 'Normal Room at Melvin Home', 'Normal', 5, 1, 2, 0, 1, 1, 70, '/imageRooms/Normal/N003/N003.jpg', 'Admire the luxurious marble walls at an upscale hotel.', 0),
(4, 'Normal Room for FAMILY', 'Normal', 3, 1, 4, 0, 2, 2, 120, '/imageRooms/Normal/N004/N004.jpg', 'Fully furnished bedroom with swimming pool and next to the beach.', 0),
(5, 'Normal Room Extends Bed', 'Normal', 4, 8, 2, 1, 2, 1, 90, '/imageRooms/Normal/N005/N005.jpg', 'Cool space with comfortable furniture can serve 3-4 guests. This will be a great vacation for you.', 0),
(6, 'Standard Karon Analog', 'Standard', 5, 8, 4, 2, 2, 2, 160, '/imageRooms/Standard/STD001/STD001.jpg', 'Luxury sea view apartment, affordable luxury option. Can serve up to 4-5 guests.', 0),
(7, 'Standard Marvelous Beach', 'Standard', 5, 6, 4, 0, 2, 2, 180, '/imageRooms/Standard/STD003/STD003.jpg', 'The quality of the interior fully meets the needs of visitors. Located right in front of Dai Lanh beach, which is famous for its activities on the sea and beautiful sparkling beach at night.', 0),
(8, 'Standard Harry\'s Residence', 'Standard', 5, 2, 3, 2, 3, 2, 120, '/imageRooms/Standard/STD004/STD004.jpg', 'Panoramic windows and large balconies help to see the whole city and the majestic old town.', 0),
(9, 'Standard BHK Bollywood', 'Standard', 4, 2, 3, 1, 3, 2, 140, '/imageRooms/Standard/STD005/STD005.jpg', 'The refreshing Bollywood-themed aparthotel is ready to meet all your vacation needs.', 0),
(10, 'Deluxe Room With 2 Single Beds', 'Deluxe', 3, 5, 2, 1, 1, 1, 150, '/imageRooms/Deluxe/DLX001/DLX001.jpg', 'Deluxe Room aims to serve families. A luxurious room with full 2 beds (1 Extends Bed for husband and wife and 1 bed for children). Located in the city. Busy Ho Chi Minh.', 0),
(11, 'Deluxe Jacuzzi', 'Deluxe', 3, 10, 2, 1, 1, 1, 200, '/imageRooms/Deluxe/DLX004/DLX004.jpg', 'Jacuzzi Room is a luxury resort room aimed at the mid-range customer segment, convenient and fully equipped, ready to serve 4-5 guests. The price is reasonable and affordable compared to what Jacuzzi brings.', 0),
(12, 'Suite The Pepper DAKAO', 'Suite', 5, 5, 2, 0, 1, 1, 350, '/imageRooms/Suite/SUT001/SUT001.jpg', 'Luxury Suite with Studio bedroom design, modern riverside likes to stay to work.', 0),
(13, 'Suite Thera Kalliopi', 'Suite', 5, 6, 2, 1, 1, 1, 180, '/imageRooms/Suite/SUT002/SUT002.jpg', 'The luxury suite is aimed at the mid-range and above customer segment. Is one of the most modern rooms with full amenities and ready to serve 24/7 in Nha Trang.', 0),
(14, 'Suite Naxos Town', 'Suite', 4, 4, 2, 2, 2, 3, 260, '/imageRooms/Suite/SUT003/SUT003.jpg', 'Inspired by neoclassical targeting middle and upper class customers. This is a special Suite in Hue with full facilities and more to be ready to bring you a wonderful stay.', 0),
(15, 'Suite Haol', 'Suite', 4, 10, 3, 0, 1, 2, 220, '/imageRooms/Suite/SUT004/SUT004.jpg', 'The special design style is located near the center of Vung Tau city with an outdoor hot spring bath and a unique island style.', 0),
(16, 'Suite Jacuzzi', 'Suite', 4, 7, 3, 1, 1, 2, 300, '/imageRooms/Suite/SUT005/SUT005.jpg', 'The special Suite room with the main sky design can watch the endless starry sky when the night falls, not only that, in front of it is also the endless blue sea. There is also an outdoor Jacuzzi. This will be an extremely splendid resort experience for you.', 0),
(17, 'President Grand Excelsior HoChiMinh', 'President Suite', 4, 5, 2, 0, 1, 1, 270, '/imageRooms/PresidentSuite/PS001/PS001.jpg', 'High-class Presidential Room in Ho Chi Minh City. Ho Chi Minh City, dedicated to serving leaders in the downtown area. With perfect criteria and ensure confidential information.', 0),
(18, 'President Grand Excelsior HaNoi', 'President Suite', 5, 2, 2, 0, 1, 1, 250, '/imageRooms/PresidentSuite/PS002/PS002.jpg', 'The high-class Presidential Room in Hanoi, dedicated to serving leaders in the central area of the capital. With perfect criteria and ensure confidential information.', 0),
(19, 'President Salerno Downtown', 'President Suite', 3, 4, 2, 1, 1, 1, 330, '/imageRooms/PresidentSuite/PS003/PS003.jpg', 'One of the five unique President rooms of SERENA. Salerno Downtown is located in the chain\'s upscale resort, separate from the city. There are special architecture and state-of-the-art security system for senior leaders.', 0),
(20, 'President Argiano', 'President Suite', 5, 1, 2, 2, 2, 2, 450, '/imageRooms/PresidentSuite/PS004/PS004.jpg', 'Argiano President Danang belongs to the high-class President line with the most advanced facilities and security in the five President rooms at SERENA.', 0),
(21, 'President Manipura LUXURY Estate', 'President Suite', 4, 7, 4, 0, 2, 2, 300, '/imageRooms/PresidentSuite/PS005/PS005.jpg', 'Manipura President is inspired by the design combined with the resort type of SPA, so it can be considered as a dedicated President room for the highest level of relaxation at SERENA.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_room_reservations`
--

CREATE TABLE `tb_room_reservations` (
  `id_reservation` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_room_reservations`
--

INSERT INTO `tb_room_reservations` (`id_reservation`, `id_room`, `id_location`, `id_customer`, `date_from`, `date_to`, `price`) VALUES
(1, 1, 3, 1, '2022-12-14', '2022-12-18', 0),
(2, 7, 6, 1, '2022-12-24', '2022-12-25', 0),
(3, 5, 8, 1, '2022-12-14', '2022-12-17', 0),
(4, 7, 6, 1, '2022-12-23', '2022-12-27', 0),
(6, 14, 4, 1, '2022-12-28', '2023-01-01', 0),
(7, 1, 3, 1, '2022-12-14', '2022-12-16', 0),
(8, 19, 4, 1, '2022-12-21', '2022-12-23', 0),
(10, 13, 6, 1, '2022-12-21', '2022-12-24', 0),
(11, 14, 4, 1, '2022-12-11', '2022-12-13', 0),
(12, 19, 4, 1, '2022-12-10', '2022-12-15', 0),
(13, 16, 7, 1, '2022-12-27', '2022-12-31', 0),
(14, 1, 3, 3, '2022-12-25', '2022-12-28', 0),
(15, 16, 7, 1, '2022-12-17', '2022-12-25', 0),
(16, 14, 4, 1, '2022-12-15', '2022-12-18', 0),
(18, 11, 10, 1, '2022-12-15', '2022-12-18', 0),
(19, 2, 9, 1, '2022-12-28', '2022-12-29', 0),
(20, 14, 4, 1, '2022-12-18', '2022-12-20', 0),
(21, 12, 5, 1, '2022-12-22', '2022-12-23', 0),
(22, 12, 5, 1, '2022-12-17', '2022-12-18', 0),
(23, 8, 2, 1, '2022-12-20', '2022-12-22', 0),
(24, 17, 5, 1, '2022-12-12', '2022-12-15', 0),
(25, 17, 5, 1, '2022-12-13', '2022-12-15', 0),
(26, 8, 2, 1, '2022-12-18', '2022-12-20', 0),
(27, 2, 9, 1, '2022-12-17', '2022-12-19', 0),
(29, 6, 8, 1, '2022-12-26', '2022-12-29', 0),
(30, 6, 8, 1, '2022-12-25', '2022-12-26', 0),
(31, 2, 9, 1, '2022-12-13', '2022-12-14', 0),
(32, 1, 3, 2, '2022-12-12', '2022-12-14', 208),
(33, 3, 1, 2, '2022-12-28', '2022-12-29', 87),
(34, 2, 9, 2, '2022-12-15', '2022-12-16', 165),
(35, 2, 9, 2, '2022-12-15', '2022-12-16', 165),
(36, 2, 9, 2, '2022-12-15', '2022-12-16', 165),
(37, 2, 9, 2, '2022-12-15', '2022-12-16', 165),
(38, 2, 9, 2, '2022-12-15', '2022-12-16', 165),
(39, 2, 9, 2, '2022-12-15', '2022-12-16', 165),
(40, 2, 9, 2, '2022-12-15', '2022-12-16', 165),
(41, 2, 9, 2, '2022-12-15', '2022-12-16', 165),
(42, 2, 9, 2, '2022-12-15', '2022-12-16', 165),
(43, 2, 9, 2, '2022-12-15', '2022-12-16', 165),
(44, 2, 9, 2, '2022-12-15', '2022-12-16', 165),
(45, 18, 2, 20, '2022-12-16', '2022-12-25', 2330),
(46, 3, 1, 21, '2022-12-15', '2022-12-16', 132),
(47, 4, 1, 22, '2022-12-14', '2022-12-15', 187),
(48, 11, 10, 22, '2022-12-30', '2022-12-31', 275),
(49, 3, 1, 22, '2022-12-17', '2022-12-18', 87),
(50, 3, 1, 22, '2022-12-17', '2022-12-18', 87),
(51, 1, 3, 23, '2023-01-18', '2023-01-19', 143);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_customers`
--
ALTER TABLE `tb_customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `tb_locations`
--
ALTER TABLE `tb_locations`
  ADD PRIMARY KEY (`id_location`);

--
-- Indexes for table `tb_rooms`
--
ALTER TABLE `tb_rooms`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `id_location` (`id_location`);

--
-- Indexes for table `tb_room_reservations`
--
ALTER TABLE `tb_room_reservations`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_location` (`id_location`),
  ADD KEY `id_room` (`id_room`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_customers`
--
ALTER TABLE `tb_customers`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_locations`
--
ALTER TABLE `tb_locations`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_rooms`
--
ALTER TABLE `tb_rooms`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_room_reservations`
--
ALTER TABLE `tb_room_reservations`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_rooms`
--
ALTER TABLE `tb_rooms`
  ADD CONSTRAINT `tb_rooms_ibfk_1` FOREIGN KEY (`id_location`) REFERENCES `tb_locations` (`id_location`);

--
-- Constraints for table `tb_room_reservations`
--
ALTER TABLE `tb_room_reservations`
  ADD CONSTRAINT `tb_room_reservations_ibfk_1` FOREIGN KEY (`id_location`) REFERENCES `tb_locations` (`id_location`),
  ADD CONSTRAINT `tb_room_reservations_ibfk_2` FOREIGN KEY (`id_room`) REFERENCES `tb_rooms` (`id_room`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
