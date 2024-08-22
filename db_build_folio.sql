-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2024 at 07:34 AM
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
-- Database: `db_build_folio`
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
-- Table structure for table `tbl_chart`
--

CREATE TABLE `tbl_chart` (
  `id` int(11) NOT NULL,
  `course_count` varchar(100) NOT NULL,
  `lecture_count` varchar(100) NOT NULL,
  `technology_count` varchar(100) NOT NULL,
  `users_count` varchar(100) NOT NULL,
  `projects_count` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_chart`
--

INSERT INTO `tbl_chart` (`id`, `course_count`, `lecture_count`, `technology_count`, `users_count`, `projects_count`) VALUES
(1, '5', '4', '3', '3', '4'),
(2, '4', '3', '2', '2', '0'),
(3, '4', '3', '2', '2', '0'),
(4, '5', '4', '3', '3', '3'),
(5, '5', '4', '3', '3', '3'),
(6, '5', '4', '3', '3', '3'),
(7, '5', '4', '3', '3', '3'),
(8, '5', '4', '3', '3', '3'),
(9, '5', '4', '3', '3', '3'),
(10, '5', '4', '3', '3', '3'),
(11, '5', '4', '3', '3', '3'),
(12, '5', '4', '3', '3', '3'),
(13, '5', '4', '3', '3', '3'),
(14, '5', '4', '3', '3', '3'),
(15, '5', '4', '3', '3', '3'),
(16, '5', '4', '3', '3', '3'),
(17, '5', '4', '3', '3', '3'),
(18, '5', '4', '3', '3', '3'),
(19, '5', '4', '3', '3', '3'),
(20, '5', '4', '3', '3', '3'),
(21, '5', '4', '3', '3', '3'),
(22, '5', '4', '3', '3', '3'),
(23, '5', '4', '3', '3', '3'),
(24, '5', '4', '3', '3', '3'),
(25, '5', '4', '3', '3', '3'),
(26, '5', '4', '3', '3', '3'),
(27, '5', '4', '3', '3', '3'),
(28, '5', '4', '3', '3', '3'),
(29, '5', '4', '3', '3', '3'),
(30, '5', '4', '3', '3', '3'),
(31, '5', '4', '3', '3', '3'),
(32, '5', '4', '3', '3', '3'),
(33, '5', '4', '3', '3', '3'),
(34, '5', '4', '3', '3', '3'),
(35, '5', '4', '3', '3', '3'),
(36, '5', '4', '3', '3', '3'),
(37, '5', '4', '3', '3', '3'),
(38, '5', '4', '3', '3', '3'),
(39, '5', '4', '3', '3', '3'),
(40, '5', '4', '3', '3', '3'),
(41, '5', '4', '3', '3', '3'),
(42, '5', '4', '3', '3', '3'),
(43, '5', '4', '3', '3', '3'),
(44, '5', '4', '3', '3', '3'),
(45, '5', '4', '3', '3', '3'),
(46, '5', '4', '3', '3', '3'),
(47, '5', '4', '3', '3', '3'),
(48, '5', '4', '3', '3', '3'),
(49, '5', '4', '3', '3', '3'),
(50, '5', '4', '3', '3', '3'),
(51, '5', '4', '3', '3', '3'),
(52, '5', '4', '3', '3', '3'),
(53, '5', '4', '3', '3', '3'),
(54, '5', '4', '3', '3', '3'),
(55, '5', '4', '3', '3', '3'),
(56, '5', '4', '3', '3', '3'),
(57, '5', '4', '3', '3', '3'),
(58, '5', '4', '3', '3', '3'),
(59, '5', '4', '3', '3', '3'),
(60, '5', '4', '3', '3', '3'),
(61, '5', '4', '3', '3', '3'),
(62, '5', '4', '3', '3', '3'),
(63, '5', '4', '3', '3', '3'),
(64, '5', '4', '3', '3', '3'),
(65, '5', '4', '3', '3', '3'),
(66, '5', '4', '3', '3', '3'),
(67, '5', '4', '3', '3', '3'),
(68, '5', '4', '3', '3', '3'),
(69, '5', '4', '3', '3', '3'),
(70, '5', '4', '3', '3', '3'),
(71, '5', '4', '3', '3', '3'),
(72, '5', '4', '3', '3', '3'),
(73, '5', '4', '3', '3', '3'),
(74, '5', '4', '3', '3', '3'),
(75, '5', '4', '3', '3', '3'),
(76, '5', '4', '3', '3', '3'),
(77, '5', '4', '3', '3', '3'),
(78, '5', '4', '3', '3', '3'),
(79, '5', '4', '3', '3', '3'),
(80, '5', '4', '3', '3', '3'),
(81, '5', '4', '3', '3', '3'),
(82, '5', '4', '3', '3', '3'),
(83, '5', '4', '3', '3', '3'),
(84, '5', '4', '3', '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `technology_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'activate',
  `disabled_status` varchar(100) NOT NULL DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `technology_id`, `status`, `disabled_status`) VALUES
(2, 'Frontend Development', 0, 'activate', 'enabled'),
(3, 'Backend Full Course', 0, 'activate', 'enabled'),
(4, 'CSS In One Video', 2, 'activate', 'enabled'),
(5, 'Html In One Video', 1, 'activate', 'enabled'),
(6, 'React Full Course', 3, 'activate', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lectures`
--

CREATE TABLE `tbl_lectures` (
  `id` int(11) NOT NULL,
  `video` varchar(500) NOT NULL,
  `video_thumbnail` text NOT NULL,
  `lecture_title` varchar(200) NOT NULL,
  `lecture_description` varchar(500) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'activate',
  `disabled_status` varchar(30) NOT NULL DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lectures`
--

INSERT INTO `tbl_lectures` (`id`, `video`, `video_thumbnail`, `lecture_title`, `lecture_description`, `course_id`, `status`, `disabled_status`) VALUES
(1, './uploads/CSS_In_One_Video/videos/Admin - Panel Management - Google Chrome 2024-07-14 02-24-35.mp4', './uploads/CSS_In_One_Video/thumbnails/Screenshot 2024-02-16 144011.png', 'Introduction To CSS | Backend CSS.', 'In This Course You Learn CSS.', 4, 'activate', 'enabled'),
(2, './uploads/Backend_Full_Course/videos/file-uploading-2 - Microsoft Visual Studio 2024-08-07 14-57-29.mp4', './uploads/Backend_Full_Course/thumbnails/clark-tibbs-oqStl2L5oxI-unsplash.jpg', 'Introductio To Backend | Backend Course.', 'In This Course You Learn Backend Technologies & Making Different Websites Backend.', 3, 'activate', 'enabled'),
(3, './uploads/Html_In_One_Video/videos/Admin - Panel Management - Google Chrome 2024-07-14 02-24-35.mp4', './uploads/Html_In_One_Video/thumbnails/felicia-buitenwerf-_z1fydm6azE-unsplash.jpg', 'Introduction To Html | Html Course Lecture 1', 'In This Course You Learn Html.', 5, 'activate', 'enabled'),
(4, './uploads/lectures/React_Full_Course/videos/file-uploading-2 - Microsoft Visual Studio 2024-08-07 14-57-29.mp4', './uploads/lectures/React_Full_Course/thumbnails/prateek-katyal-6jYnKXVxOjc-unsplash.jpg', 'Introduction To React | React Full Course.', 'In This Lecture You Understand What is React.', 6, 'activate', 'enabled'),
(5, './uploads/lectures/CSS_In_One_Video/videos/32767-394004551_small.mp4', './uploads/lectures/CSS_In_One_Video/thumbnails/pankaj-patel-Fi-GJaLRGKc-unsplash.jpg', 'Selectors In CSS | CSS Full Course | Lecture 2 .', 'In This Lecture You Learn How To Access Elements With Selectors in CSS.', 4, 'activate', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_projects`
--

CREATE TABLE `tbl_projects` (
  `project_id` int(11) NOT NULL,
  `project_title` varchar(500) NOT NULL,
  `project_desc` text NOT NULL,
  `project_thumbnail` varchar(500) NOT NULL,
  `project_video` varchar(500) NOT NULL,
  `project_status` varchar(50) NOT NULL DEFAULT 'activate',
  `disabled_status` varchar(50) NOT NULL DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_projects`
--

INSERT INTO `tbl_projects` (`project_id`, `project_title`, `project_desc`, `project_thumbnail`, `project_video`, `project_status`, `disabled_status`) VALUES
(1, 'Netflix Web Application.', 'in this video', './uploads/projects/thumbnails/netflix_image.jpg', './uploads/projects/videos/27706-365890968_tiny.mp4', 'activate', 'enabled'),
(2, 'Frontend Development Project.', 'In This Project You Learn How To Build Powerfull Web Applications.', './uploads/projects/thumbnails/frontent_image.jpeg', './uploads/projects/videos/172655-847860558_tiny.mp4', 'activate', 'enabled'),
(3, 'Backend Development Project', 'In This Project You Learn How To Buil Backend.', './uploads/projects/thumbnails/backend_image.jpg', './uploads/projects/videos/41263-429379223_small.mp4', 'activate', 'enabled'),
(4, 'Amazon Website Design ', '<b>Project Overview: Amazon Web Design</b><br>\r\nIn this project, you will learn how to design and develop a user-friendly and responsive e-commerce website similar to Amazon. You will explore key aspects of web design, including:\r\n<br>\r\n<b>User Interface (UI) Design:</b><br>Creating intuitive and visually appealing layouts that enhance the user experience.\r\n<br><br>\r\n<b>Responsive Design:</b><br>Ensuring that the website is accessible and looks great on all devices, from desktops to mobile phones.\r\n<br><br>\r\n<b>Product Listing and Search Functionality: </b><br>\r\nImplementing dynamic product catalogs with advanced search and filtering options.\r\n<br><br>\r\n<b>Shopping Cart and Checkout Process: </b> <br>\r\nDeveloping a seamless and secure shopping cart system, complete with payment integration.\r\n<br><br>\r\n<b>User Authentication and Account Management:</b><br>\r\nSetting up user login, registration, and account management features.\r\n<br><br>', './uploads/projects/thumbnails/Amazon launches_1.jpg', './uploads/projects/videos/32767-394004551_small.mp4', 'activate', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_technology`
--

CREATE TABLE `tbl_technology` (
  `id` int(11) NOT NULL,
  `technology` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'activate',
  `disabled_status` varchar(100) NOT NULL DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_technology`
--

INSERT INTO `tbl_technology` (`id`, `technology`, `status`, `disabled_status`) VALUES
(1, 'Html', 'activate', 'enabled'),
(2, 'CSS', 'activate', 'enabled'),
(3, 'React', 'activate', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_image` varchar(200) NOT NULL,
  `user_status` varchar(50) NOT NULL DEFAULT 'activate',
  `disabled_status` varchar(50) NOT NULL DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_status`, `disabled_status`) VALUES
(1, 'Ahmed Raza Jutt', 'ahmedjutt@gmail.com', 'ahmed123', '../Admin/uploads/users/ahmedjutt@gmail.com/my pic 2.jpg', 'activate', 'enabled'),
(2, 'Muhmmad Minhal Khan', 'minhalkhan@gmail.com', 'minhalkhan123', '../Admin/uploads/users/minhal@gmail.com/my pic on eid.png', 'activate', 'enabled'),
(3, 'Fahad Khan', 'fahadkhan@gmail.com', 'fahad123', '../Admin/uploads/users/fahadkhan@gmail.com/133811726.jpeg', 'deactivate', 'enabled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_chart`
--
ALTER TABLE `tbl_chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_lectures`
--
ALTER TABLE `tbl_lectures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `tbl_technology`
--
ALTER TABLE `tbl_technology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
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
-- AUTO_INCREMENT for table `tbl_chart`
--
ALTER TABLE `tbl_chart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_lectures`
--
ALTER TABLE `tbl_lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_technology`
--
ALTER TABLE `tbl_technology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
