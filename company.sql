-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 03:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'toma', '123');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`) VALUES
(1, 'HR ', '2023-02-27 19:42:45'),
(2, 'Information technology', '2023-02-27 19:43:01'),
(3, 'Sales', '2023-02-27 19:43:04'),
(4, 'amira', '2023-02-27 19:43:10'),
(6, 'Mobile', '2023-02-27 20:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `salary` float NOT NULL,
  `image` text NOT NULL,
  `departmentID` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `salary`, `image`, `departmentID`, `create_at`) VALUES
(21, 'mohamed elhossiny abelkader', 80000, '716280263346499.jpg', 2, '2023-03-02 19:02:40'),
(23, 'Tooma', 80000, '5164581463346499.jpg', 1, '2023-03-02 19:22:10'),
(24, 'mohab', 2000, '43987389Screenshot_5.png', 3, '2023-03-02 19:22:18'),
(25, '<h1> data </h1>', 80000, '60959213Screenshot_2.png', 2, '2023-03-02 21:00:39'),
(26, ' hello ', 200, '58796913Screenshot_2.png', 4, '2023-03-02 21:01:30'),
(27, 'mohamed saber', 80000, '2418656063346499.jpg', 2, '2023-03-03 16:16:09');

-- --------------------------------------------------------

--
-- Stand-in structure for view `employeeswithdepartments`
-- (See below for the actual view)
--
CREATE TABLE `employeeswithdepartments` (
`id` int(11)
,`empName` varchar(50)
,`salary` float
,`image` text
,`depName` varchar(50)
,`depID` int(11)
,`create_at` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `employeeswithdepartments`
--
DROP TABLE IF EXISTS `employeeswithdepartments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeeswithdepartments`  AS SELECT `employees`.`id` AS `id`, `employees`.`name` AS `empName`, `employees`.`salary` AS `salary`, `employees`.`image` AS `image`, `departments`.`name` AS `depName`, `departments`.`id` AS `depID`, `employees`.`create_at` AS `create_at` FROM (`employees` join `departments` on(`employees`.`departmentID` = `departments`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departmentID` (`departmentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`departmentID`) REFERENCES `departments` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
