-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 01:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `addjob`
--

CREATE TABLE `addjob` (
  `id` int(11) NOT NULL,
  `jobtitle` text NOT NULL,
  `companyname` text NOT NULL,
  `jobdescription` text NOT NULL,
  `date` varchar(32) NOT NULL,
  `location` varchar(30) NOT NULL,
  `vacancy` text NOT NULL,
  `job_nature` varchar(50) NOT NULL,
  `salary` varchar(25) NOT NULL,
  `application_date` varchar(40) NOT NULL,
  `Skills` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addjob`
--

INSERT INTO `addjob` (`id`, `jobtitle`, `companyname`, `jobdescription`, `date`, `location`, `vacancy`, `job_nature`, `salary`, `application_date`, `Skills`) VALUES
(7, 'Php Developer', 'test', 'http://localhost/jobportal/http://localhost/jobportal/http://localhost/jobportal/', '2023-02-12', 'USA', '12', 'full Time ', '50000', '2023-02-12', 'html,Css'),
(9, 'Java', 'Google', '\r\nDELOPT, part of JK Organization, a USD 4 B.N conglomerate which includes reputed companies like JK Tyres, JK Paper, JK Lakshmi Cement, JK Fener etc. DELOPT is an AS9100D, ISO9001 & CEMILAC certified world-class company in the area of Defense Electronics, Avionics and Electro-Optics Products & Solutions.\r\n\r\nWith a robust 21 year legacy in Military Avionics, Thermal Sights for Surveillance & Weapons, Stabilized Electro-Optic Sight Payloads for Situational Awareness, Object Detection & Classification, On-Board Computers, Homing & Instrumentation for underwater systems, Target Acquisition & Tracker for Land & Air, Communication Modems for Naval Net-Centric Warfare, DELOPT as Vision 2025 is evolving to become a leading player in Electronics, Electro-Optics & Digital Solutions targeted domain: Industrial Automation & Robotics, Mobility & Transportation, Public Safety/ Security/ Surveillance, Smart Cities, Healthcare and Space..', '2023-02-12', 'USA', '12', 'Full time', '500000', '2023-02-12', 'Java'),
(10, '.Net Developer', 'test', 'Roles and Responsibilities Full Stack Developer with experience on A SP.NET/C#.NET/Blazor or Razor/Middle Tier/API/Micro Services/SQL server 2014 is must 5 Years of experience in implementing Design Patterns like Repository pattern, Factory Pattern is a must. Knowledge and implementation experience of SOLID Principles is must. Hands on 6+relevant experience in Asp.Net C#, MVC, MVVM, Web API and Rest API knowledge preferred. Experience on Blazor is a big plus Experience on Dapper, Entity framework(6 years of experience) is must, CRUD Operations. Hands on experience on SQL Server Database Design (OLTP Model) and Middle Tier Development Stored Procedures, SQL knowledge(8 years) Interpret business requirements and effectively implement into a software solution Good Communication skill and Client interaction experience. Should have experience in Azure DevOps, GIT/TFS, Agile Methodologies Desired Candidate Profile Should have implementation experience in Design Patterns like Repository...', '2023-02-19', 'India', '12', 'fullTime', '200000', '2023-02-19', 'html,Css, .Net ,php etc'),
(11, 'python developer', 'vivo', 'Python Developer\r\n\r\nAbout the role\r\n\r\nBuilding on the success of our recently expanded technical teams based in our Pune office and with ambitious growth plans to add to our number of employees in India in the next 18 to 24 months, we are looking to recruit developers for our geospatial solutions for our land & property customers in the UK. We are looking for team players with technical experience to join our team.\r\n\r\nThis is a fantastic time to join Idox as part of our planned expansion in Pune and of overall innovation across the group. In particular, we are looking for confident, self-starting software developers with an eye for high quality solution output. In return, we provide an excellent foundation for the further development of your career.', '2023-02-22', 'India', '15', 'fullTime', '5000000', '2023-02-22', 'python');

-- --------------------------------------------------------

--
-- Table structure for table `adduser`
--

CREATE TABLE `adduser` (
  `id` int(11) NOT NULL,
  `yourname` text NOT NULL,
  `youremail` text NOT NULL,
  `yournumber` text NOT NULL,
  `yourpassword` text NOT NULL,
  `language` text NOT NULL,
  `mark` int(11) NOT NULL,
  `newtest` int(11) NOT NULL,
  `companymark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adduser`
--

INSERT INTO `adduser` (`id`, `yourname`, `youremail`, `yournumber`, `yourpassword`, `language`, `mark`, `newtest`, `companymark`) VALUES
(1, 'angel', 'angel@gmail.com', '9012345687', 'angel@123', 'PHP', 0, 0, 0),
(2, 'austin', 'austin@123', '4122698448', '123', 'PHP', 0, 0, 0),
(5, 'hacker', 'hacker@gmail.com', '4122698448', '123', 'PHP', 0, 0, 0),
(6, 'arun', 'arun@123', '4122696448', '123', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'sunnygkp10@gmail.com', '123456'),
(2, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `id` int(32) NOT NULL,
  `company` varchar(32) NOT NULL,
  `tittle` varchar(32) NOT NULL,
  `job_id` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `name` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`id`, `company`, `tittle`, `job_id`, `email`, `name`) VALUES
(12, 'Clover', 'Python Developer', '8', 'austin@123', NULL),
(13, 'vivo', 'python developer', '11', 'arun@123', NULL),
(15, 'test', '.Net Developer', '10', 'austin@123', NULL),
(16, 'vivo', 'python developer', '11', 'austin@123', NULL),
(18, 'Google', 'Java', '9', 'user@gmail.com', NULL),
(19, 'vivo', 'python developer', '11', 'rathai@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `password`, `mail`) VALUES
(1, 'test', 'test@123', 'test@gmail.com'),
(3, 'vivo', 'vivo@123', 'vivo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `cou_id` int(11) NOT NULL,
  `cou_name` varchar(1000) NOT NULL,
  `cou_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`cou_id`, `cou_name`, `cou_created`) VALUES
(1, 'PHP', '2023-03-25 10:01:28'),
(2, 'CEH', '2023-03-25 10:01:48'),
(3, 'JAVA', '2023-03-25 10:01:58'),
(5, 'PYTHON', '2023-03-25 10:02:13'),
(8, 'NODE.JS', '2023-03-25 10:02:41'),
(14, 'PC', '2023-03-25 10:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `examinee_tbl`
--

CREATE TABLE `examinee_tbl` (
  `exmne_id` int(11) NOT NULL,
  `exmne_fullname` varchar(100) NOT NULL,
  `exmne_course` varchar(100) NOT NULL,
  `exmne_email` varchar(100) NOT NULL,
  `exmne_password` varchar(100) NOT NULL,
  `exmne_status` varchar(100) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examinee_tbl`
--

INSERT INTO `examinee_tbl` (`exmne_id`, `exmne_fullname`, `exmne_course`, `exmne_email`, `exmne_password`, `exmne_status`) VALUES
(4, 'user', '1', 'user@gmail.com', 'user', 'active'),
(5, 'rathai', '5', 'rathai@gmail.com', '123', 'active'),
(6, 'krishnakumar', '5', 'krishnakumar@gmail.com', '123', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `exans_id` int(11) NOT NULL,
  `axmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `exans_answer` varchar(1000) NOT NULL,
  `exans_status` varchar(1000) NOT NULL DEFAULT 'new',
  `exans_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_answers`
--

INSERT INTO `exam_answers` (`exans_id`, `axmne_id`, `exam_id`, `quest_id`, `exans_answer`, `exans_status`, `exans_created`) VALUES
(4, 4, 1, 9, 'loop some thing', 'new', '2023-03-25 11:32:48'),
(5, 4, 1, 8, '6g', 'new', '2023-03-25 11:32:48'),
(6, 5, 4, 11, 'hello', 'new', '2023-03-25 11:38:05'),
(7, 5, 4, 10, 'none', 'new', '2023-03-25 11:38:05'),
(8, 6, 4, 10, 'programing', 'new', '2023-03-25 11:44:29'),
(9, 6, 4, 11, 'hello', 'new', '2023-03-25 11:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attempt`
--

CREATE TABLE `exam_attempt` (
  `examat_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `examat_status` varchar(1000) NOT NULL DEFAULT 'used'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_attempt`
--

INSERT INTO `exam_attempt` (`examat_id`, `exmne_id`, `exam_id`, `examat_status`) VALUES
(1, 4, 1, 'used'),
(2, 5, 4, 'used'),
(3, 6, 4, 'used');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question_tbl`
--

CREATE TABLE `exam_question_tbl` (
  `eqt_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_question` varchar(1000) NOT NULL,
  `exam_ch1` varchar(1000) NOT NULL,
  `exam_ch2` varchar(1000) NOT NULL,
  `exam_ch3` varchar(1000) NOT NULL,
  `exam_ch4` varchar(1000) NOT NULL,
  `exam_answer` varchar(1000) NOT NULL,
  `exam_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_question_tbl`
--

INSERT INTO `exam_question_tbl` (`eqt_id`, `exam_id`, `exam_question`, `exam_ch1`, `exam_ch2`, `exam_ch3`, `exam_ch4`, `exam_answer`, `exam_status`) VALUES
(5, 2, 'who is hacker ?', 'bad guy', 'good guy', 'other', 'none', 'bad guy', 'active'),
(6, 2, 'who is pentester ?', 'bughunder', 'hacker', 'to test application', 'none', 'to test application', 'active'),
(7, 2, 'how to hack mobile', 'paylod', 'virus', 'malware', 'adware', 'malware', 'active'),
(8, 1, 'php variyable ?', '$a', 'a', '7', '6g', '$a', 'active'),
(9, 1, 'loop ?', 'loop some thing', 'other', 'none', 'do some thing', 'loop some thing', 'active'),
(10, 4, 'what is python ?', 'pro', 'otherr', 'programing', 'none', 'programing', 'active'),
(11, 4, 'python variyable ?', 'frhrh', '$hello', 'hello', '678', 'hello', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `exam_tbl`
--

CREATE TABLE `exam_tbl` (
  `ex_id` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  `ex_title` varchar(1000) NOT NULL,
  `ex_time_limit` varchar(1000) NOT NULL,
  `ex_questlimit_display` int(11) NOT NULL,
  `ex_description` varchar(1000) NOT NULL,
  `ex_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_tbl`
--

INSERT INTO `exam_tbl` (`ex_id`, `cou_id`, `ex_title`, `ex_time_limit`, `ex_questlimit_display`, `ex_description`, `ex_created`) VALUES
(1, 1, 'PHP', '10', 2, 'some', '2023-03-25 11:32:30'),
(2, 2, 'CEH', '10', 2, 'hacker', '2023-03-25 11:26:18'),
(3, 14, 'pc', '10', 3, 'pc', '2023-03-25 11:09:18'),
(4, 5, 'python ', '10', 2, 'python ', '2023-03-25 11:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `questionanswer`
--

CREATE TABLE `questionanswer` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `language` text NOT NULL,
  `ans1` text NOT NULL,
  `ans2` text NOT NULL,
  `ans3` text NOT NULL,
  `ans4` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questionanswer`
--

INSERT INTO `questionanswer` (`id`, `question`, `answer`, `language`, `ans1`, `ans2`, `ans3`, `ans4`, `role`) VALUES
(1, '<p>fgyhfghfgh</p>\r\n', '343', 'Bootstrap', 'fgh', 'op', 'er', '343', ''),
(2, '<p>What is a Computer?</p>\r\n', 'other', 'PHP', 'one', 'onesome', 'other', 'nothing', 'test'),
(3, '<p>what is a computer</p>\r\n', 'system1', 'PHP', 'system', 'system1', 'system2', 'system3', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addjob`
--
ALTER TABLE `addjob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adduser`
--
ALTER TABLE `adduser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indexes for table `examinee_tbl`
--
ALTER TABLE `examinee_tbl`
  ADD PRIMARY KEY (`exmne_id`);

--
-- Indexes for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`exans_id`);

--
-- Indexes for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  ADD PRIMARY KEY (`examat_id`),
  ADD UNIQUE KEY `exmne_id` (`exmne_id`);

--
-- Indexes for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  ADD PRIMARY KEY (`eqt_id`);

--
-- Indexes for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `questionanswer`
--
ALTER TABLE `questionanswer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addjob`
--
ALTER TABLE `addjob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `adduser`
--
ALTER TABLE `adduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `examinee_tbl`
--
ALTER TABLE `examinee_tbl`
  MODIFY `exmne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `exans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  MODIFY `examat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  MODIFY `eqt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questionanswer`
--
ALTER TABLE `questionanswer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
