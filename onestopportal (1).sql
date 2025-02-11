-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 02:05 PM
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
-- Database: `onestopportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `id` int(11) NOT NULL,
  `course_id` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`id`, `course_id`, `name`) VALUES
(1, '20MC031', 'Association of Electrical and Electronics\nEngineering'),
(2, '20MC032', 'Indian Association for energy management\r\nprofessionals -IAEMB'),
(3, '20MC011', 'Association of Computer Engineers '),
(4, '20MC013', 'Artificial Intelligence Club'),
(5, '20MC203', 'National Cadet Corps'),
(6, '20MC202', 'Empowerment through Yoga -\r\nYoga & Meditation club');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `course_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staff_id`, `name`, `password`, `course_id`) VALUES
(1, 'ID1', 'Jenita', 'password', '20MC031'),
(2, 'ID2', 'Jenita Mary', 'password', '20MC032'),
(3, 'ID3', 'Naveen', 'password', '20MC013'),
(4, 'ID4', 'Mohan', 'password', '20MC011'),
(5, 'ID5', 'Salini', 'password', '20MC203'),
(6, 'ID6', 'Dharshini', 'password', '20MC202');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `year`, `department`) VALUES
(1, 'Premkumar', '2022-2023', 'EEE'),
(2, 'Bala kamesh', '2022-2023', 'EEE'),
(3, 'Anitha', '2022-2023', 'CSE'),
(4, 'Pavan', '2022-2023', 'CSE'),
(5, 'Suresh', '2022-2023', 'ECE'),
(6, 'Kavitha', '2022-2023', 'ECE'),
(7, 'Ganesh', '2022-2023', 'EIE'),
(8, 'Divya', '2022-2023', 'EIE'),
(9, 'Priya', '2022-2023', 'BME'),
(10, 'Kumar', '2022-2023', 'BME'),
(11, 'Vijay', '2022-2023', 'CIVIL'),
(12, 'Siva', '2022-2023', 'CIVIL'),
(13, 'Raj', '2022-2023', 'AERO'),
(14, 'Ramesh', '2022-2023', 'AERO'),
(15, 'Krishna', '2022-2023', 'MECH'),
(16, 'Saravanan', '2022-2023', 'MECH'),
(17, 'Arjun', '2022-2023', 'IT'),
(18, 'Mani', '2022-2023', 'IT'),
(19, 'Anand', '2022-2023', 'MTECH'),
(20, 'Surya', '2022-2023', 'MTECH'),
(21, 'Karthik', '2022-2023', 'AIDS'),
(22, 'Karthikeyan', '2022-2023', 'AIDS'),
(23, 'Prem', '2023-2024', 'EEE'),
(24, 'Bala', '2023-2024', 'EEE'),
(25, 'Ananya', '2023-2024', 'CSE'),
(26, 'Praveen', '2023-2024', 'CSE'),
(27, 'Suriya', '2023-2024', 'ECE'),
(28, 'Kaviya', '2023-2024', 'ECE'),
(29, 'Gowtham', '2023-2024', 'EIE'),
(30, 'Divyanka', '2023-2024', 'EIE'),
(31, 'Priyanka', '2023-2024', 'BME'),
(32, 'Kumaravel', '2023-2024', 'BME'),
(33, 'Vishal', '2023-2024', 'CIVIL'),
(34, 'Sivakumar', '2023-2024', 'CIVIL'),
(35, 'Rajesh', '2023-2024', 'AERO'),
(36, 'Rahul', '2023-2024', 'AERO'),
(37, 'Kishore', '2023-2024', 'MECH'),
(38, 'Saranya', '2023-2024', 'MECH'),
(39, 'Arvind', '2023-2024', 'IT'),
(40, 'Manikandan', '2023-2024', 'IT'),
(41, 'Ananya', '2023-2024', 'MTECH'),
(42, 'Suraj', '2023-2024', 'MTECH'),
(43, 'Karthik', '2023-2024', 'AIDS'),
(44, 'Karthikeyan', '2023-2024', 'AIDS'),
(45, 'Vinith', '2021-2022', 'EEE'),
(46, 'Sandeep', '2021-2022', 'EEE'),
(47, 'Aarav', '2021-2022', 'CSE'),
(48, 'Priya', '2021-2022', 'CSE'),
(49, 'Surya', '2021-2022', 'ECE'),
(50, 'Kavya', '2021-2022', 'ECE'),
(51, 'Ganesh', '2021-2022', 'EIE'),
(52, 'Deepika', '2021-2022', 'EIE'),
(53, 'Rahul', '2021-2022', 'BME'),
(54, 'Kavitha', '2021-2022', 'BME'),
(55, 'Vijay', '2021-2022', 'CIVIL'),
(56, 'Saranya', '2021-2022', 'CIVIL'),
(57, 'Raj', '2021-2022', 'AERO'),
(58, 'Karthik', '2021-2022', 'AERO'),
(59, 'Krishna', '2021-2022', 'MECH'),
(60, 'Sneha', '2021-2022', 'MECH'),
(61, 'Arjun', '2021-2022', 'IT'),
(62, 'Mani', '2021-2022', 'IT'),
(63, 'Anand', '2021-2022', 'MTECH'),
(64, 'Surya', '2021-2022', 'MTECH'),
(65, 'Karthik', '2021-2022', 'AIDS'),
(66, 'Mani Kumar', '2021-2022', 'AIDS');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `student_courses_id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `mark` varchar(250) NOT NULL,
  `promptness` int(11) NOT NULL,
  `activeness` int(11) NOT NULL,
  `competence` int(11) NOT NULL,
  `achievements` int(11) NOT NULL,
  `leadershipskill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`student_courses_id`, `student_id`, `course_id`, `mark`, `promptness`, `activeness`, `competence`, `achievements`, `leadershipskill`) VALUES
(1, '1', '20MC031', '80', 0, 0, 0, 0, 0),
(2, '2', '20MC031', '', 0, 0, 0, 0, 0),
(3, '23', '20MC031', '', 0, 0, 0, 0, 0),
(4, '24', '20MC031', '', 0, 0, 0, 0, 0),
(5, '45', '20MC031', '59', 5, 7, 6, 16, 25),
(6, '46', '20MC031', '', 0, 0, 0, 0, 0),
(7, '1', '20MC032', '70', 0, 0, 0, 0, 0),
(8, '2', '20MC032', '', 0, 0, 0, 0, 0),
(9, '23', '20MC032', '', 0, 0, 0, 0, 0),
(10, '24', '20MC032', '', 0, 0, 0, 0, 0),
(11, '45', '20MC032', '59', 5, 7, 6, 16, 25),
(12, '46', '20MC032', '', 0, 0, 0, 0, 0),
(13, '3', '20MC011', '', 0, 0, 0, 0, 0),
(14, '4', '20MC011', '', 0, 0, 0, 0, 0),
(15, '25', '20MC011', '', 0, 0, 0, 0, 0),
(16, '26', '20MC011', '', 0, 0, 0, 0, 0),
(17, '47', '20MC011', '', 0, 0, 0, 0, 0),
(18, '48', '20MC011', '', 0, 0, 0, 0, 0),
(19, '3', '20MC013', '', 0, 0, 0, 0, 0),
(20, '4', '20MC013', '', 0, 0, 0, 0, 0),
(21, '25', '20MC013', '', 0, 0, 0, 0, 0),
(22, '26', '20MC013', '', 0, 0, 0, 0, 0),
(23, '47', '20MC013', '', 0, 0, 0, 0, 0),
(24, '48', '20MC013', '', 0, 0, 0, 0, 0),
(25, '1', '20MC203', '', 0, 0, 0, 0, 0),
(26, '2', '20MC203', '', 0, 0, 0, 0, 0),
(27, '3', '20MC203', '', 0, 0, 0, 0, 0),
(28, '4', '20MC203', '', 0, 0, 0, 0, 0),
(29, '5', '20MC203', '', 0, 0, 0, 0, 0),
(30, '6', '20MC203', '', 0, 0, 0, 0, 0),
(31, '7', '20MC203', '', 0, 0, 0, 0, 0),
(32, '8', '20MC203', '', 0, 0, 0, 0, 0),
(33, '9', '20MC203', '', 0, 0, 0, 0, 0),
(34, '10', '20MC203', '', 0, 0, 0, 0, 0),
(35, '11', '20MC203', '', 0, 0, 0, 0, 0),
(36, '12', '20MC203', '', 0, 0, 0, 0, 0),
(37, '13', '20MC203', '', 0, 0, 0, 0, 0),
(38, '14', '20MC203', '', 0, 0, 0, 0, 0),
(39, '15', '20MC203', '', 0, 0, 0, 0, 0),
(40, '16', '20MC203', '', 0, 0, 0, 0, 0),
(41, '17', '20MC203', '', 0, 0, 0, 0, 0),
(42, '18', '20MC203', '', 0, 0, 0, 0, 0),
(43, '19', '20MC203', '', 0, 0, 0, 0, 0),
(44, '20', '20MC203', '', 0, 0, 0, 0, 0),
(45, '21', '20MC203', '', 0, 0, 0, 0, 0),
(46, '22', '20MC203', '', 0, 0, 0, 0, 0),
(47, '23', '20MC203', '', 0, 0, 0, 0, 0),
(48, '24', '20MC203', '', 0, 0, 0, 0, 0),
(49, '25', '20MC203', '', 0, 0, 0, 0, 0),
(50, '26', '20MC203', '', 0, 0, 0, 0, 0),
(51, '27', '20MC203', '', 0, 0, 0, 0, 0),
(52, '28', '20MC203', '', 0, 0, 0, 0, 0),
(53, '29', '20MC203', '', 0, 0, 0, 0, 0),
(54, '30', '20MC203', '', 0, 0, 0, 0, 0),
(55, '31', '20MC203', '', 0, 0, 0, 0, 0),
(56, '32', '20MC203', '', 0, 0, 0, 0, 0),
(57, '33', '20MC203', '', 0, 0, 0, 0, 0),
(58, '34', '20MC203', '', 0, 0, 0, 0, 0),
(59, '35', '20MC203', '', 0, 0, 0, 0, 0),
(60, '36', '20MC203', '', 0, 0, 0, 0, 0),
(61, '37', '20MC203', '', 0, 0, 0, 0, 0),
(62, '38', '20MC203', '', 0, 0, 0, 0, 0),
(63, '39', '20MC203', '', 0, 0, 0, 0, 0),
(64, '40', '20MC203', '', 0, 0, 0, 0, 0),
(65, '41', '20MC203', '', 0, 0, 0, 0, 0),
(66, '42', '20MC203', '', 0, 0, 0, 0, 0),
(67, '43', '20MC203', '', 0, 0, 0, 0, 0),
(68, '44', '20MC203', '', 0, 0, 0, 0, 0),
(69, '45', '20MC203', '59', 5, 7, 6, 16, 25),
(70, '46', '20MC203', '', 0, 0, 0, 0, 0),
(71, '47', '20MC203', '', 0, 0, 0, 0, 0),
(72, '48', '20MC203', '', 0, 0, 0, 0, 0),
(73, '49', '20MC203', '', 0, 0, 0, 0, 0),
(74, '50', '20MC203', '', 0, 0, 0, 0, 0),
(75, '51', '20MC203', '', 0, 0, 0, 0, 0),
(76, '52', '20MC203', '', 0, 0, 0, 0, 0),
(77, '53', '20MC203', '', 0, 0, 0, 0, 0),
(78, '54', '20MC203', '', 0, 0, 0, 0, 0),
(79, '55', '20MC203', '', 0, 0, 0, 0, 0),
(80, '56', '20MC203', '', 0, 0, 0, 0, 0),
(81, '57', '20MC203', '', 0, 0, 0, 0, 0),
(82, '58', '20MC203', '', 0, 0, 0, 0, 0),
(83, '59', '20MC203', '', 0, 0, 0, 0, 0),
(84, '60', '20MC203', '', 0, 0, 0, 0, 0),
(85, '61', '20MC203', '', 0, 0, 0, 0, 0),
(86, '62', '20MC203', '', 0, 0, 0, 0, 0),
(87, '63', '20MC203', '', 0, 0, 0, 0, 0),
(88, '64', '20MC203', '', 0, 0, 0, 0, 0),
(89, '65', '20MC203', '', 0, 0, 0, 0, 0),
(90, '66', '20MC203', '', 0, 0, 0, 0, 0),
(91, '1', '20MC202', '', 0, 0, 0, 0, 0),
(92, '2', '20MC202', '', 0, 0, 0, 0, 0),
(93, '3', '20MC202', '', 0, 0, 0, 0, 0),
(94, '4', '20MC202', '', 0, 0, 0, 0, 0),
(95, '5', '20MC202', '', 0, 0, 0, 0, 0),
(96, '6', '20MC202', '', 0, 0, 0, 0, 0),
(97, '7', '20MC202', '', 0, 0, 0, 0, 0),
(98, '8', '20MC202', '', 0, 0, 0, 0, 0),
(99, '9', '20MC202', '', 0, 0, 0, 0, 0),
(100, '10', '20MC202', '', 0, 0, 0, 0, 0),
(101, '11', '20MC202', '', 0, 0, 0, 0, 0),
(102, '12', '20MC202', '', 0, 0, 0, 0, 0),
(103, '13', '20MC202', '', 0, 0, 0, 0, 0),
(104, '14', '20MC202', '', 0, 0, 0, 0, 0),
(105, '15', '20MC202', '', 0, 0, 0, 0, 0),
(106, '16', '20MC202', '', 0, 0, 0, 0, 0),
(107, '17', '20MC202', '', 0, 0, 0, 0, 0),
(108, '18', '20MC202', '', 0, 0, 0, 0, 0),
(109, '19', '20MC202', '', 0, 0, 0, 0, 0),
(110, '20', '20MC202', '', 0, 0, 0, 0, 0),
(111, '21', '20MC202', '', 0, 0, 0, 0, 0),
(112, '22', '20MC202', '', 0, 0, 0, 0, 0),
(113, '23', '20MC202', '', 0, 0, 0, 0, 0),
(114, '24', '20MC202', '', 0, 0, 0, 0, 0),
(115, '25', '20MC202', '', 0, 0, 0, 0, 0),
(116, '26', '20MC202', '', 0, 0, 0, 0, 0),
(117, '27', '20MC202', '', 0, 0, 0, 0, 0),
(118, '28', '20MC202', '', 0, 0, 0, 0, 0),
(119, '29', '20MC202', '', 0, 0, 0, 0, 0),
(120, '30', '20MC202', '', 0, 0, 0, 0, 0),
(121, '31', '20MC202', '', 0, 0, 0, 0, 0),
(122, '32', '20MC202', '', 0, 0, 0, 0, 0),
(123, '33', '20MC202', '', 0, 0, 0, 0, 0),
(124, '34', '20MC202', '', 0, 0, 0, 0, 0),
(125, '35', '20MC202', '', 0, 0, 0, 0, 0),
(126, '36', '20MC202', '', 0, 0, 0, 0, 0),
(127, '37', '20MC202', '', 0, 0, 0, 0, 0),
(128, '38', '20MC202', '', 0, 0, 0, 0, 0),
(129, '39', '20MC202', '', 0, 0, 0, 0, 0),
(130, '40', '20MC202', '', 0, 0, 0, 0, 0),
(131, '41', '20MC202', '', 0, 0, 0, 0, 0),
(132, '42', '20MC202', '', 0, 0, 0, 0, 0),
(133, '43', '20MC202', '', 0, 0, 0, 0, 0),
(134, '44', '20MC202', '', 0, 0, 0, 0, 0),
(135, '45', '20MC202', '59', 5, 7, 6, 16, 25),
(136, '46', '20MC202', '58', 13, 11, 11, 11, 12),
(137, '47', '20MC202', '', 0, 0, 0, 0, 0),
(138, '48', '20MC202', '', 0, 0, 0, 0, 0),
(139, '49', '20MC202', '', 0, 0, 0, 0, 0),
(140, '50', '20MC202', '', 0, 0, 0, 0, 0),
(141, '51', '20MC202', '', 0, 0, 0, 0, 0),
(142, '52', '20MC202', '', 0, 0, 0, 0, 0),
(143, '53', '20MC202', '', 0, 0, 0, 0, 0),
(144, '54', '20MC202', '', 0, 0, 0, 0, 0),
(145, '55', '20MC202', '', 0, 0, 0, 0, 0),
(146, '56', '20MC202', '', 0, 0, 0, 0, 0),
(147, '57', '20MC202', '', 0, 0, 0, 0, 0),
(148, '58', '20MC202', '', 0, 0, 0, 0, 0),
(149, '59', '20MC202', '', 0, 0, 0, 0, 0),
(150, '60', '20MC202', '', 0, 0, 0, 0, 0),
(151, '61', '20MC202', '', 0, 0, 0, 0, 0),
(152, '62', '20MC202', '', 0, 0, 0, 0, 0),
(153, '63', '20MC202', '', 0, 0, 0, 0, 0),
(154, '64', '20MC202', '', 0, 0, 0, 0, 0),
(155, '65', '20MC202', '', 0, 0, 0, 0, 0),
(156, '66', '20MC202', '', 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`student_courses_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `student_courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
