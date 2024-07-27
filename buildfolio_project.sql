-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 06:22 PM
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
-- Database: `buildfolio project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`) VALUES
(1, 'Backend'),
(2, 'Frontend'),
(3, 'mern stack '),
(4, 'full stack');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_language`
--

CREATE TABLE `tbl_language` (
  `lang_id` int(11) NOT NULL,
  `lang_name` varchar(200) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_language`
--

INSERT INTO `tbl_language` (`lang_id`, `lang_name`, `course_id`) VALUES
(1, 'reactjs', 3),
(2, 'nextjs', 3),
(3, 'php', 1),
(4, 'asp.net core', 1),
(5, 'nodejs', 3),
(6, 'mongodb', 3),
(7, 'laravel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lectures`
--

CREATE TABLE `tbl_lectures` (
  `id` int(11) NOT NULL,
  `videoPath` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `course_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lectures`
--

INSERT INTO `tbl_lectures` (`id`, `videoPath`, `title`, `description`, `course_id`, `lang_id`) VALUES
(1, '../assets/course video/Janum Ali Ali _ Nadeem Sarwar _ 2023 - 1445 (240p).mp4', 'laravel', 'laravel full course for beginers', 1, 7),
(2, '../assets/course video/Mera Imam Hussain _ Nadeem Sarwar _ 45th Album - 2024 - 1446 (360p).mp4', 'react js ', 'reacts js full tutorial for begineers', 3, 1),
(3, '../assets/course video/Janum Ali Ali _ Nadeem Sarwar _ 2023 - 1445 (240p).mp4', 'next js ', 'next js full tutorial for begineers', 3, 2),
(4, '../assets/course video/Mera Imam Hussain _ Nadeem Sarwar _ 45th Album - 2024 - 1446 (360p) (1).mp4', 'mongo db ', 'mongo db full tutorial for begineers', 3, 6),
(5, '../assets/course video/Mera Imam Hussain _ Nadeem Sarwar _ 45th Album - 2024 - 1446 (360p) (1).mp4', 'laravel in hindi', 'laravel full tutorial for begineers', 1, 7),
(6, '../assets/course video/Mera Imam Hussain _ Nadeem Sarwar _ 45th Album - 2024 - 1446 (360p) (1).mp4', 'asp.net core in hindi', 'asp.net core full tutorial for begineers', 1, 4),
(7, '../assets/course video/Mera Imam Hussain _ Nadeem Sarwar _ 45th Album - 2024 - 1446 (360p) (1).mp4', 'reactjs in hindi', 'advanced reactjs', 3, 1),
(8, '../assets/course video/Mera Imam Hussain _ Nadeem Sarwar _ 45th Album - 2024 - 1446 (360p) (1).mp4', 'nextjs in hindi', 'advanced nextjs', 3, 2),
(9, '../assets/course video/Mera Imam Hussain _ Nadeem Sarwar _ 45th Album - 2024 - 1446 (360p) (1).mp4', 'asp.net core in hindi', 'advanced asp.net core', 1, 4),
(10, '../assets/course video/Mera Imam Hussain _ Nadeem Sarwar _ 45th Album - 2024 - 1446 (360p) (1).mp4', 'php in hindi', 'advanced php tutorials', 1, 3),
(11, '../assets/course video/Janum Ali Ali _ Nadeem Sarwar _ 2023 - 1445 (240p).mp4', 'ahsahshasha', 'sdasdasd', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_image` varchar(200) NOT NULL,
  `user_status` enum('Activate','Deactivate','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_status`) VALUES
(1, 'hassan', 'hassan@gmail.com', 'hassan121', 'hassan.jpg', 'Activate'),
(2, 'raza', 'raza@gmail.com', 'raza121', 'raza.jpg', 'Deactivate'),
(3, 'Muhammad Ali', 'ali@gmail.com', '$2y$10$twM7GsG2fgzUAFOM9gRs.es27SZptSq9LyWRREQHB/n8FWyrGzaAm', '', 'Activate'),
(4, '', '', '$2y$10$nPqpMhKFMpONJZ8cIyu6rOSO529jMrgUslE6mSIy2JUYFb6o6LCEK', '', 'Activate'),
(5, 'shuja', 'shuja@gmail.com', '$2y$10$VsA0bZdn/v6FK2y7HxVVsOR1nPYEyL8nEfhgfTsfKdozzQKxWMhta', '', 'Activate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_language`
--
ALTER TABLE `tbl_language`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `tbl_lectures`
--
ALTER TABLE `tbl_lectures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_language`
--
ALTER TABLE `tbl_language`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_lectures`
--
ALTER TABLE `tbl_lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
