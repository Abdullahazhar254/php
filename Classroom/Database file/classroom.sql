-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2022 at 10:41 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_fname` varchar(50) NOT NULL,
  `ad_email` varchar(100) NOT NULL,
  `ad_lname` varchar(50) NOT NULL,
  `ad_password` varchar(50) NOT NULL,
  `ad_phoneno` varchar(50) DEFAULT NULL,
  `ad_city` varchar(50) DEFAULT NULL,
  `ad_country` varchar(50) DEFAULT NULL,
  `ad_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_fname`, `ad_email`, `ad_lname`, `ad_password`, `ad_phoneno`, `ad_city`, `ad_country`, `ad_image`) VALUES
(1, 'Abdullah ', 'abdullah@gmail.com', 'Abdullah', '12345', NULL, NULL, NULL, 'b63caea1-8c77-4b59-bfaa-426fa6db64ec (1).jfif');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_description` varchar(1000) NOT NULL,
  `a_startDate` date NOT NULL,
  `a_endDate` date NOT NULL,
  `a_file` varchar(500) DEFAULT NULL,
  `a_mark` int(11) NOT NULL,
  `a_BCFid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`a_id`, `a_name`, `a_description`, `a_startDate`, `a_endDate`, `a_file`, `a_mark`, `a_BCFid`) VALUES
(1, 'Assignment 1', 'xyz', '2022-09-03', '2022-09-05', '', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `assignmentsub`
--

CREATE TABLE `assignmentsub` (
  `as_id` int(11) NOT NULL,
  `as_file` varchar(500) NOT NULL,
  `as_date` date NOT NULL,
  `as_marks` int(11) DEFAULT NULL,
  `as_assignId` int(11) NOT NULL,
  `as_studentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignmentsub`
--

INSERT INTO `assignmentsub` (`as_id`, `as_file`, `as_date`, `as_marks`, `as_assignId`, `as_studentId`) VALUES
(1, '3366d4af-834d-4b24-b45e-6c39dfaafa4d.jfif', '2022-09-03', 7, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`b_id`, `b_name`) VALUES
(1, 'CS19'),
(2, 'BBA19');

-- --------------------------------------------------------

--
-- Table structure for table `batchcf`
--

CREATE TABLE `batchcf` (
  `bcf_id` int(11) NOT NULL,
  `bcf_batchId` int(11) NOT NULL,
  `bcf_courseId` int(11) NOT NULL,
  `bcf_facultyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batchcf`
--

INSERT INTO `batchcf` (`bcf_id`, `bcf_batchId`, `bcf_courseId`, `bcf_facultyId`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 4),
(3, 2, 3, 5),
(4, 2, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`) VALUES
(1, 'Introduction To Computer'),
(2, 'Fundamental of Programming'),
(3, 'Introduction to Accounting '),
(4, 'Business Management ');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_id` int(11) NOT NULL,
  `f_fname` varchar(50) NOT NULL,
  `f_lname` varchar(50) NOT NULL,
  `f_email` varchar(100) NOT NULL,
  `f_password` varchar(50) NOT NULL,
  `f_ phoneNo` varchar(50) DEFAULT NULL,
  `f_qualification` varchar(50) DEFAULT NULL,
  `f_city` varchar(50) DEFAULT NULL,
  `f_country` varchar(50) DEFAULT NULL,
  `f_image` varchar(255) DEFAULT 'default.jpg',
  `f_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `f_fname`, `f_lname`, `f_email`, `f_password`, `f_ phoneNo`, `f_qualification`, `f_city`, `f_country`, `f_image`, `f_status`) VALUES
(2, 'Ali', 'Ali', 'ali@gmail.com', '12345', NULL, NULL, NULL, NULL, 'default.jpg', 1),
(3, 'Asad', 'Asad', 'asad@gmail.com', '12345', NULL, NULL, NULL, NULL, 'default.jpg', 1),
(4, 'Wahab', 'Wahab', 'wahab@gmai.com', '12345', NULL, NULL, NULL, NULL, 'default.jpg', 1),
(5, 'Ahsan', 'Ahsan ', 'ahsan@gmail.com', '12345', NULL, NULL, NULL, NULL, 'default.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `l_file` varchar(500) NOT NULL,
  `l_bcfid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`l_id`, `l_name`, `l_file`, `l_bcfid`) VALUES
(1, '', 'b63caea1-8c77-4b59-bfaa-426fa6db64ec (1).jfif', 2);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `q_id` int(11) NOT NULL,
  `q_name` varchar(100) NOT NULL,
  `q_startdate` date NOT NULL,
  `q_enddate` date NOT NULL,
  `q_question` int(11) NOT NULL,
  `q_BCFid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`q_id`, `q_name`, `q_startdate`, `q_enddate`, `q_question`, `q_BCFid`) VALUES
(1, 'Quiz 1', '2022-09-03', '2022-09-04', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quizquestion`
--

CREATE TABLE `quizquestion` (
  `qq_id` int(11) NOT NULL,
  `qq_question` varchar(255) NOT NULL,
  `qq_option1` varchar(100) NOT NULL,
  `qq_option2` varchar(100) NOT NULL,
  `qq_option3` varchar(100) NOT NULL,
  `qq_option4` varchar(100) NOT NULL,
  `qq_marks` int(11) NOT NULL,
  `qq_correctans` varchar(100) NOT NULL,
  `qq_quizid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizquestion`
--

INSERT INTO `quizquestion` (`qq_id`, `qq_question`, `qq_option1`, `qq_option2`, `qq_option3`, `qq_option4`, `qq_marks`, `qq_correctans`, `qq_quizid`) VALUES
(1, 'The library function used to find the last occurrence of a character in a string is\r\n', 'strnstr()', 'laststr()', 'strrchr()', 'strstr()', 5, 'strrchr()', 1),
(2, 'Which of the following function is more appropriate for reading in a multi-word string?\r\n', 'printf();', 'scanf();', 'gets();', 'puts();', 5, 'gets();', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizsubmit`
--

CREATE TABLE `quizsubmit` (
  `qs_id` int(11) NOT NULL,
  `qs_quizid` int(11) NOT NULL,
  `qs_questionid` int(11) NOT NULL,
  `qs_studentid` int(11) NOT NULL,
  `qs_answer` varchar(100) NOT NULL,
  `qs_obtmark` int(11) NOT NULL,
  `qs_tmark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizsubmit`
--

INSERT INTO `quizsubmit` (`qs_id`, `qs_quizid`, `qs_questionid`, `qs_studentid`, `qs_answer`, `qs_obtmark`, `qs_tmark`) VALUES
(1, 1, 1, 2, 'laststr()', 0, 5),
(2, 1, 2, 2, 'gets();', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `s_id` int(11) NOT NULL,
  `s_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`s_id`, `s_status`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `s_fname` varchar(50) NOT NULL,
  `s_lname` varchar(50) NOT NULL,
  `s_email` varchar(100) NOT NULL,
  `s_password` varchar(50) NOT NULL,
  `s_registrationNo` varchar(50) NOT NULL,
  `s_ phoneNo` varchar(50) DEFAULT NULL,
  `s_parentContact` varchar(50) DEFAULT NULL,
  `s_city` varchar(50) DEFAULT NULL,
  `s_country` varchar(50) DEFAULT NULL,
  `s_image` varchar(255) DEFAULT 'default.jpg',
  `s_batchId` int(11) NOT NULL,
  `st_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_fname`, `s_lname`, `s_email`, `s_password`, `s_registrationNo`, `s_ phoneNo`, `s_parentContact`, `s_city`, `s_country`, `s_image`, `s_batchId`, `st_status`) VALUES
(1, 'Hassan', 'Hassan', 'hassan@gmail.com', '12345', '1912134', NULL, NULL, NULL, NULL, 'default.jpg', 1, 1),
(2, 'Anas', 'Anas', 'anas@gmail.com', '12345', '1912122', NULL, NULL, NULL, NULL, 'default.jpg', 1, 1),
(3, 'Ahmed', 'Ahmed', 'ahmed@gmail.com', '12345', '1912015', NULL, NULL, NULL, NULL, 'default.jpg', 2, 2),
(4, 'Bilal', 'Bilal', 'bilal@gmail.com', '12345', '1912017', NULL, NULL, NULL, NULL, 'default.jpg', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `fk_aBCF` (`a_BCFid`);

--
-- Indexes for table `assignmentsub`
--
ALTER TABLE `assignmentsub`
  ADD PRIMARY KEY (`as_id`),
  ADD KEY `fk_asStudent` (`as_studentId`),
  ADD KEY `fk_asAssignment` (`as_assignId`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `batchcf`
--
ALTER TABLE `batchcf`
  ADD PRIMARY KEY (`bcf_id`),
  ADD KEY `fk_bFaculty` (`bcf_facultyId`),
  ADD KEY `fk_bCourse` (`bcf_courseId`),
  ADD KEY `fk_bBatch` (`bcf_batchId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `fk_fStatus` (`f_status`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `fk_lBCF` (`l_bcfid`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `fk_qBCF` (`q_BCFid`);

--
-- Indexes for table `quizquestion`
--
ALTER TABLE `quizquestion`
  ADD PRIMARY KEY (`qq_id`),
  ADD KEY `fk_quiz` (`qq_quizid`);

--
-- Indexes for table `quizsubmit`
--
ALTER TABLE `quizsubmit`
  ADD PRIMARY KEY (`qs_id`),
  ADD KEY `fk_qsquiz` (`qs_quizid`),
  ADD KEY `fk_qsQuestion` (`qs_questionid`),
  ADD KEY `fk_qsStudent` (`qs_studentid`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `fk_sBatch` (`s_batchId`),
  ADD KEY `fk_sStatus` (`st_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignmentsub`
--
ALTER TABLE `assignmentsub`
  MODIFY `as_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `batchcf`
--
ALTER TABLE `batchcf`
  MODIFY `bcf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quizquestion`
--
ALTER TABLE `quizquestion`
  MODIFY `qq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quizsubmit`
--
ALTER TABLE `quizsubmit`
  MODIFY `qs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `fk_aBCF` FOREIGN KEY (`a_BCFid`) REFERENCES `batchcf` (`bcf_id`);

--
-- Constraints for table `assignmentsub`
--
ALTER TABLE `assignmentsub`
  ADD CONSTRAINT `fk_asAssignment` FOREIGN KEY (`as_assignId`) REFERENCES `assignment` (`a_id`),
  ADD CONSTRAINT `fk_asStudent` FOREIGN KEY (`as_studentId`) REFERENCES `student` (`s_id`);

--
-- Constraints for table `batchcf`
--
ALTER TABLE `batchcf`
  ADD CONSTRAINT `fk_bBatch` FOREIGN KEY (`bcf_batchId`) REFERENCES `batch` (`b_id`),
  ADD CONSTRAINT `fk_bCourse` FOREIGN KEY (`bcf_courseId`) REFERENCES `course` (`c_id`),
  ADD CONSTRAINT `fk_bFaculty` FOREIGN KEY (`bcf_facultyId`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `fk_fStatus` FOREIGN KEY (`f_status`) REFERENCES `status` (`s_id`);

--
-- Constraints for table `lecture`
--
ALTER TABLE `lecture`
  ADD CONSTRAINT `fk_lBCF` FOREIGN KEY (`l_bcfid`) REFERENCES `batchcf` (`bcf_id`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `fk_qBCF` FOREIGN KEY (`q_BCFid`) REFERENCES `batchcf` (`bcf_id`);

--
-- Constraints for table `quizquestion`
--
ALTER TABLE `quizquestion`
  ADD CONSTRAINT `fk_quiz` FOREIGN KEY (`qq_quizid`) REFERENCES `quiz` (`q_id`);

--
-- Constraints for table `quizsubmit`
--
ALTER TABLE `quizsubmit`
  ADD CONSTRAINT `fk_qsQuestion` FOREIGN KEY (`qs_questionid`) REFERENCES `quizquestion` (`qq_id`),
  ADD CONSTRAINT `fk_qsStudent` FOREIGN KEY (`qs_studentid`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `fk_qsquiz` FOREIGN KEY (`qs_quizid`) REFERENCES `quiz` (`q_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_sBatch` FOREIGN KEY (`s_batchId`) REFERENCES `batch` (`b_id`),
  ADD CONSTRAINT `fk_sStatus` FOREIGN KEY (`st_status`) REFERENCES `status` (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
