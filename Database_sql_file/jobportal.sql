-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 11:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `Skills` text NOT NULL,
  `Category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addjob`
--

INSERT INTO `addjob` (`id`, `jobtitle`, `companyname`, `jobdescription`, `date`, `location`, `vacancy`, `job_nature`, `salary`, `application_date`, `Skills`, `Category`) VALUES
(15, 'Penetration test', 'cybertech', 'Definition. A penetration test (pen test) is an authorized simulated attack performed on a computer system to evaluate its security. Penetration testers use the same tools, techniques, and processes as attackers to find and demonstrate the business impacts of weaknesses in a system.Definition. A penetration test (pen test) is an authorized simulated attack performed on a computer system to evaluate its security. Penetration testers use the same tools, techniques, and processes as attackers to find and demonstrate the business impacts of weaknesses in a system.Definition. A penetration test (pen test) is an authorized simulated attack performed on a computer system to evaluate its security. Penetration testers use the same tools, techniques, and processes as attackers to find and demonstrate the business impacts of weaknesses in a system.Definition. A penetration test (pen test) is an authorized simulated attack performed on a computer system to evaluate its security. Penetration testers use the same tools, techniques, and processes as attackers to find and demonstrate the business impacts of weaknesses in a system.Definition. A penetration test (pen test) is an authorized simulated attack performed on a computer system to evaluate its security. Penetration testers use the same tools, techniques, and processes as attackers to find and demonstrate the business impacts of weaknesses in a system.', '2023-04-17', 'USA', '12', 'fullTime', '2000000', '2023-04-17', 'CEH,OSCP', '16'),
(16, 'System Administrator', 'cybertech', 'A system administrator, or sysadmin, or admin is a person who is responsible for the upkeep, configuration, and reliable operation of computer systems, especially multi-user computers, such as servers.\r\nA system administrator, or sysadmin, or admin is a person who is responsible for the upkeep, configuration, and reliable operation of computer systems, especially multi-user computers, such as servers.\r\nA system administrator, or sysadmin, or admin is a person who is responsible for the upkeep, configuration, and reliable operation of computer systems, especially multi-user computers, such as servers.\r\n', '2023-04-17', 'USA', '15', 'fullTime', '100000', '2023-04-17', 'CCNA', '16'),
(17, 'Php Developer', 'clovion', 'Web development is the work involved in developing a website for the Internet (World Wide Web) or an intranet (a private network). Web development can range from developing a simple single static page of plain text to complex web applications, electronic businesses, and social network services.Web development is the work involved in developing a website for the Internet (World Wide Web) or an intranet (a private network). Web development can range from developing a simple single static page of plain text to complex web applications, electronic businesses, and social network services.Web development is the work involved in developing a website for the Internet (World Wide Web) or an intranet (a private network). Web development can range from developing a simple single static page of plain text to complex web applications, electronic businesses, and social network services.Web development is the work involved in developing a website for the Internet (World Wide Web) or an intranet (a private network). Web development can range from developing a simple single static page of plain text to complex web applications, electronic businesses, and social network services.Web development is the work involved in developing a website for the Internet (World Wide Web) or an intranet (a private network). Web development can range from developing a simple single static page of plain text to complex web applications, electronic businesses, and social network services.Web development is the work involved in developing a website for the Internet (World Wide Web) or an intranet (a private network). Web development can range from developing a simple single static page of plain text to complex web applications, electronic businesses, and social network services.', '2023-04-17', 'India', '30', 'full Time', '10000', '2023-04-17', 'html,Css, .Net ,php etc', '15'),
(18, 'Django Developer', 'clovion', 'What is a Django developer?\r\nWhat Does a Django Developer Do? As a Django developer, your job is to program applications for clients using the Django framework for the Python programming language. In this role, you may help select the resources for each project, oversee development, troubleshoot problems, and test existing code.What is a Django developer?\r\nWhat Does a Django Developer Do? As a Django developer, your job is to program applications for clients using the Django framework for the Python programming language. In this role, you may help select the resources for each project, oversee development, troubleshoot problems, and test existing code.What is a Django developer?\r\nWhat Does a Django Developer Do? As a Django developer, your job is to program applications for clients using the Django framework for the Python programming language. In this role, you may help select the resources for each project, oversee development, troubleshoot problems, and test existing code.What is a Django developer?\r\nWhat Does a Django Developer Do? As a Django developer, your job is to program applications for clients using the Django framework for the Python programming language. In this role, you may help select the resources for each project, oversee development, troubleshoot problems, and test existing code.', '2023-04-17', 'India', '30', 'fullTime', '30000', '2023-04-17', 'html,Css, .Net ,Pythonetc', '15');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`id`, `company`, `tittle`, `job_id`, `email`, `name`) VALUES
(20, 'cybertech', 'Penetration test', '15', 'austin@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `password`, `mail`) VALUES
(8, 'cybertech', '123', 'cyber@gmail.com'),
(9, 'clovion', '123', 'clovion@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `cou_id` int(11) NOT NULL,
  `cou_name` varchar(1000) NOT NULL,
  `cou_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`cou_id`, `cou_name`, `cou_created`) VALUES
(15, 'WEB DEVELOPMENT', '2023-04-17 15:57:24'),
(16, 'CYBER SECURITY', '2023-04-17 16:05:31');

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
  `exmne_status` varchar(100) NOT NULL DEFAULT 'active',
  `resume` varchar(100) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examinee_tbl`
--

INSERT INTO `examinee_tbl` (`exmne_id`, `exmne_fullname`, `exmne_course`, `exmne_email`, `exmne_password`, `exmne_status`, `resume`, `number`) VALUES
(13, 'austin', '16', 'austin@gmail.com', '123', 'active', 'b ANS.pdf', 2147483647),
(14, 'angel', '15', 'angel@gmail.com', '123', 'active', 'b ANS.pdf', 1234567895),
(15, 'test1', '16', 'test@gmail.com', '123', 'active', 'b ANS.pdf', 1569875469),
(16, 'anish', '16', 'aninsh@gmail.com', '123', 'active', '0_FP2x9QYC0wmcaIAH.jpg', 1589745698);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_answers`
--

INSERT INTO `exam_answers` (`exans_id`, `axmne_id`, `exam_id`, `quest_id`, `exans_answer`, `exans_status`, `exans_created`) VALUES
(12, 13, 6, 21, 'Penetration test', 'new', '2023-04-17 16:16:20'),
(13, 13, 6, 18, 'Certified Ethical Hacker', 'new', '2023-04-17 16:16:20'),
(14, 13, 6, 20, 'Exam Center', 'new', '2023-04-17 16:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attempt`
--

CREATE TABLE `exam_attempt` (
  `examat_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `examat_status` varchar(1000) NOT NULL DEFAULT 'used'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_attempt`
--

INSERT INTO `exam_attempt` (`examat_id`, `exmne_id`, `exam_id`, `examat_status`) VALUES
(5, 13, 6, 'used');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_question_tbl`
--

INSERT INTO `exam_question_tbl` (`eqt_id`, `exam_id`, `exam_question`, `exam_ch1`, `exam_ch2`, `exam_ch3`, `exam_ch4`, `exam_answer`, `exam_status`) VALUES
(12, 5, 'What is PHP ?', 'Hypertext Preprocessor', ' scripts are executed ', 'PHP', 'none', 'Hypertext Preprocessor', 'active'),
(13, 5, 'what is css ?', 'Cascading Style Sheets ', 'PHP', 'other', 'none', 'Cascading Style Sheets ', 'active'),
(14, 5, 'HTML', 'HTML', 'none', ' HyperText Markup Language', 'other', ' HyperText Markup Language', 'active'),
(15, 5, 'JavaScript', 'other', 'JavaScript is easy to learn.', 'none', 'blank', 'JavaScript is easy to learn.', 'active'),
(16, 5, 'Visual Studio Code', 'Vs code', 'other', 'none', 'notpad', 'Visual Studio Code', 'active'),
(17, 5, 'MYSQL', 'none', 'other', 'Database', 'code', 'Database', 'active'),
(18, 6, 'CEH ? ', 'Certified Ethical Hacker', 'none', 'other ', 'web', 'Certified Ethical Hacker', 'active'),
(19, 6, 'OSCP ', 'none', 'othe', 'Offensive Security Certified Professional certification', 'Certified Ethical Hacker', 'Offensive Security Certified Professional certification', 'active'),
(20, 6, 'EC-Council', 'Exam Center', 'none', 'other', 'etc', 'Exam Center', 'active'),
(21, 6, 'penetration ?', 'some', 'Penetration test', 'other', 'none', 'Penetration test', 'active');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_tbl`
--

INSERT INTO `exam_tbl` (`ex_id`, `cou_id`, `ex_title`, `ex_time_limit`, `ex_questlimit_display`, `ex_description`, `ex_created`) VALUES
(5, 15, 'web development', '10', 5, 'web development', '2023-04-17 15:58:06'),
(6, 16, 'Cyber Security', '10', 3, 'Cyber Security', '2023-04-17 16:06:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addjob`
--
ALTER TABLE `addjob`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addjob`
--
ALTER TABLE `addjob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `examinee_tbl`
--
ALTER TABLE `examinee_tbl`
  MODIFY `exmne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `exans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  MODIFY `examat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  MODIFY `eqt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
