-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 188.121.40.54
-- Generation Time: Mar 19, 2012 at 01:57 PM
-- Server version: 5.0.92
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mscit`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(10) NOT NULL auto_increment,
  `student_id` int(10) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `ap_timeslot` datetime NOT NULL,
  `ap_status` varchar(7) NOT NULL COMMENT 'Pending/Accept/Reject',
  `ap_duration` int(2) NOT NULL,
  `ap_student_comments` mediumtext,
  `ap_tutor_comments` mediumtext,
  PRIMARY KEY  (`appointment_id`),
  KEY `student_id` (`student_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` VALUES(1, 3, 1, '2012-02-23 18:21:00', 'Accept', 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Appointments`
--

CREATE TABLE `Appointments` (
  `AppointmentId` int(11) NOT NULL,
  `Start` datetime NOT NULL,
  `End` datetime NOT NULL,
  `Status` varchar(1024) character set ascii NOT NULL,
  `StaffId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `Notes` varchar(1024) character set ascii default NULL,
  PRIMARY KEY  (`AppointmentId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Created by Uday';

--
-- Dumping data for table `Appointments`
--


-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE `award` (
  `award_id` int(10) NOT NULL auto_increment,
  `award_name` varchar(50) NOT NULL,
  `award_leader` int(10) NOT NULL,
  PRIMARY KEY  (`award_id`),
  KEY `award_leader` (`award_leader`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `award`
--

INSERT INTO `award` VALUES(1, 'Information Technology', 14);
INSERT INTO `award` VALUES(2, 'Game Technology', 20);

-- --------------------------------------------------------

--
-- Table structure for table `award_module`
--

CREATE TABLE `award_module` (
  `module_id` int(10) NOT NULL,
  `award_id` int(10) NOT NULL,
  PRIMARY KEY  (`module_id`,`award_id`),
  KEY `module_id` (`module_id`),
  KEY `award_id` (`award_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `award_module`
--

INSERT INTO `award_module` VALUES(1, 1);
INSERT INTO `award_module` VALUES(2, 1);
INSERT INTO `award_module` VALUES(3, 1);
INSERT INTO `award_module` VALUES(4, 1);
INSERT INTO `award_module` VALUES(5, 1);
INSERT INTO `award_module` VALUES(6, 1);
INSERT INTO `award_module` VALUES(7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `award_type`
--

CREATE TABLE `award_type` (
  `award_type_id` int(1) NOT NULL auto_increment,
  `type` enum('PG Certificate','PG Diploma','MSc') NOT NULL,
  `modules` int(1) NOT NULL,
  PRIMARY KEY  (`award_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `award_type`
--

INSERT INTO `award_type` VALUES(1, 'PG Certificate', 4);
INSERT INTO `award_type` VALUES(2, 'PG Diploma', 8);
INSERT INTO `award_type` VALUES(3, 'MSc', 8);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(10) NOT NULL auto_increment,
  `module_title` varchar(50) NOT NULL,
  `module_description` text,
  `module_leader` int(10) NOT NULL,
  PRIMARY KEY  (`module_id`),
  KEY `module_leader` (`module_leader`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `module`
--

INSERT INTO `module` VALUES(1, 'Independent Study in Information Technology', NULL, 4);
INSERT INTO `module` VALUES(2, 'Application Domains of Information Technology', NULL, 3);
INSERT INTO `module` VALUES(3, 'Research Methods', NULL, 2);
INSERT INTO `module` VALUES(4, 'Data Management', NULL, 8);
INSERT INTO `module` VALUES(5, 'Group Work In Large Scale Development', NULL, 1);
INSERT INTO `module` VALUES(6, 'Software Engineering Concepts', NULL, 7);
INSERT INTO `module` VALUES(7, 'IT Infrastructure', NULL, 6);
INSERT INTO `module` VALUES(8, 'Project Management', NULL, 10);
INSERT INTO `module` VALUES(9, 'Integrative Case Studies', NULL, 12);
INSERT INTO `module` VALUES(10, 'Information Systems Strategy And Management', NULL, 5);
INSERT INTO `module` VALUES(11, 'User Experience', NULL, 11);
INSERT INTO `module` VALUES(12, 'Web-based Information Systems', NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `module_coursework_exam`
--

CREATE TABLE `module_coursework_exam` (
  `cw_exam_id` int(10) NOT NULL auto_increment,
  `module_id` int(10) NOT NULL,
  `cw_type` enum('Coursework 1','Coursework 2','Examination') NOT NULL,
  `cw_title` varchar(50) NOT NULL,
  `cw_date` date NOT NULL COMMENT 'Due date for CW, Date for attending the Exam',
  PRIMARY KEY  (`cw_exam_id`,`module_id`),
  KEY `module_id` (`module_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `module_coursework_exam`
--

INSERT INTO `module_coursework_exam` VALUES(1, 1, 'Coursework 1', 'Presentation', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(2, 1, 'Coursework 2', 'Assignment', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(3, 1, 'Examination', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(4, 2, 'Coursework 1', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(5, 2, 'Coursework 2', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(6, 2, 'Examination', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(7, 3, 'Coursework 1', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(8, 3, 'Coursework 2', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(9, 3, 'Examination', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(10, 4, 'Coursework 1', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(11, 4, 'Coursework 2', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(12, 4, 'Examination', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(13, 5, 'Coursework 1', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(14, 5, 'Coursework 2', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(15, 5, 'Examination', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(16, 6, 'Coursework 1', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(17, 6, 'Coursework 2', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(18, 6, 'Examination', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(19, 7, 'Coursework 1', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(20, 7, 'Coursework 2', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(21, 7, 'Examination', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(22, 8, 'Coursework 1', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(23, 8, 'Coursework 2', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(24, 8, 'Examination', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(25, 9, 'Coursework 1', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(26, 9, 'Coursework 2', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(27, 9, 'Examination', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(28, 10, 'Coursework 1', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(29, 10, 'Coursework 2', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(30, 10, 'Examination', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(31, 11, 'Coursework 1', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(32, 11, 'Coursework 2', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(33, 11, 'Examination', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(34, 12, 'Coursework 1', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(35, 12, 'Coursework 2', '', '0000-00-00');
INSERT INTO `module_coursework_exam` VALUES(36, 12, 'Examination', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(10) NOT NULL auto_increment,
  `project_title` varchar(100) NOT NULL,
  `viva_mark` int(2) default NULL,
  `dissertation_mark` int(2) default NULL,
  `student_id` int(10) NOT NULL,
  `tutor_id` int(10) NOT NULL,
  PRIMARY KEY  (`project_id`),
  KEY `tutor_id` (`tutor_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `project`
--


-- --------------------------------------------------------

--
-- Table structure for table `Schedule`
--

CREATE TABLE `Schedule` (
  `ScheduleId` int(11) NOT NULL,
  `Start` datetime NOT NULL,
  `End` datetime NOT NULL,
  `StaffId` int(11) NOT NULL,
  PRIMARY KEY  (`ScheduleId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Created by Uday';

--
-- Dumping data for table `Schedule`
--

INSERT INTO `Schedule` VALUES(1, '2012-03-05 13:00:00', '2012-03-05 15:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(10) NOT NULL auto_increment,
  `user_id` int(10) NOT NULL,
  `sta_title` enum('Mr','Miss','Mrs','Ms') default NULL,
  `sta_firstname` varchar(30) default NULL,
  `sta_surname` varchar(30) default NULL,
  PRIMARY KEY  (`staff_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='All of the staff memers' AUTO_INCREMENT=13 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` VALUES(1, 1, 'Mr', 'Andy', 'Gillies');
INSERT INTO `staff` VALUES(2, 14, 'Mrs', 'Christine', 'Perry');
INSERT INTO `staff` VALUES(3, 15, 'Mr', 'Thomas', 'Barnes');
INSERT INTO `staff` VALUES(4, 16, 'Mrs', 'Sue', 'Scott');
INSERT INTO `staff` VALUES(5, 17, 'Mr', 'Morris', 'Williams');
INSERT INTO `staff` VALUES(6, 18, 'Mr', 'Brian', 'Carse');
INSERT INTO `staff` VALUES(7, 19, 'Mr', 'Jeff', 'Graham');
INSERT INTO `staff` VALUES(8, 20, 'Mr', 'Prakash', 'Chatterjee');
INSERT INTO `staff` VALUES(9, 24, 'Mr', 'Dan', 'Buzzo');
INSERT INTO `staff` VALUES(10, 21, 'Mr', 'Peter', 'Rawlings');
INSERT INTO `staff` VALUES(11, 22, 'Mrs', 'Praminda', 'Caleb Solly');
INSERT INTO `staff` VALUES(12, 23, 'Mr', 'Dan', 'Dixon');

-- --------------------------------------------------------

--
-- Table structure for table `staff_availability`
--

CREATE TABLE `staff_availability` (
  `availability_id` int(10) NOT NULL auto_increment,
  `staff_id` int(10) NOT NULL,
  `av_start` datetime NOT NULL,
  `av_end` datetime NOT NULL,
  PRIMARY KEY  (`availability_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `staff_availability`
--

INSERT INTO `staff_availability` VALUES(2, 1, '2012-03-08 13:00:00', '2012-03-08 14:00:00');
INSERT INTO `staff_availability` VALUES(3, 1, '2012-04-08 14:00:00', '2012-04-08 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff_module`
--

CREATE TABLE `staff_module` (
  `staff_id` int(10) NOT NULL,
  `module_id` int(10) NOT NULL,
  PRIMARY KEY  (`staff_id`,`module_id`),
  KEY `module_id` (`module_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_module`
--

INSERT INTO `staff_module` VALUES(2, 1);
INSERT INTO `staff_module` VALUES(4, 1);
INSERT INTO `staff_module` VALUES(2, 2);
INSERT INTO `staff_module` VALUES(3, 2);
INSERT INTO `staff_module` VALUES(5, 2);
INSERT INTO `staff_module` VALUES(2, 3);
INSERT INTO `staff_module` VALUES(4, 3);
INSERT INTO `staff_module` VALUES(8, 4);
INSERT INTO `staff_module` VALUES(1, 5);
INSERT INTO `staff_module` VALUES(7, 5);
INSERT INTO `staff_module` VALUES(1, 6);
INSERT INTO `staff_module` VALUES(7, 6);
INSERT INTO `staff_module` VALUES(6, 7);
INSERT INTO `staff_module` VALUES(7, 7);
INSERT INTO `staff_module` VALUES(8, 7);
INSERT INTO `staff_module` VALUES(12, 7);
INSERT INTO `staff_module` VALUES(10, 8);
INSERT INTO `staff_module` VALUES(12, 9);
INSERT INTO `staff_module` VALUES(5, 10);
INSERT INTO `staff_module` VALUES(8, 10);
INSERT INTO `staff_module` VALUES(10, 10);
INSERT INTO `staff_module` VALUES(11, 11);
INSERT INTO `staff_module` VALUES(6, 12);
INSERT INTO `staff_module` VALUES(9, 12);
INSERT INTO `staff_module` VALUES(11, 12);
INSERT INTO `staff_module` VALUES(12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(10) NOT NULL auto_increment,
  `user_id` int(10) NOT NULL,
  `award_id` int(10) NOT NULL,
  `award_type_id` int(1) default NULL,
  `stu_title` enum('Mr','Miss','Mrs','Ms') default NULL,
  `stu_firstname` varchar(30) default NULL,
  `stu_surname` varchar(30) default NULL,
  `stu_gender` enum('Male','Female') default NULL,
  `stu_dob` date default NULL,
  `stu_address1` varchar(50) default NULL,
  `stu_address2` varchar(50) default NULL,
  `stu_address3` varchar(50) default NULL,
  `stu_city` varchar(50) default NULL,
  `stu_postcode` varchar(8) default NULL,
  `stu_home_phone` varchar(14) default NULL,
  `stu_mobile_phone` varchar(14) default NULL,
  `stu_image` blob,
  `stu_term_status` enum('Fulltime','Parttime') default NULL COMMENT 'Fulltime/Parttime',
  `stu_registration_status` enum('Yes','No') default NULL COMMENT 'Yes/No',
  `stu_start_date` date default NULL,
  `stu_end_date` date default NULL,
  `stu_sponsor` text,
  `stu_previous_qualifications` text,
  `stu_previous_experiences` text,
  `stu_comments` mediumtext,
  PRIMARY KEY  (`student_id`),
  KEY `user_id` (`user_id`),
  KEY `award_id` (`award_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` VALUES(1, 2, 1, 3, 'Mr', 'Alex', 'Canham', 'Male', '0000-00-00', '', '', '', '', '', '', '', NULL, 'Fulltime', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `student` VALUES(2, 3, 1, 3, 'Mr', 'Asim', 'Mehmood', 'Male', '0000-00-00', '', '', '', '', '', '', '', NULL, 'Fulltime', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `student` VALUES(3, 4, 1, 3, 'Miss', 'Cecilia', 'Beck', 'Female', '0000-00-00', '', '', '', '', '', '', '', NULL, 'Fulltime', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `student` VALUES(4, 5, 1, 3, 'Mr', 'Dave', 'Buckland', 'Male', '0000-00-00', '', '', '', '', '', '', '', NULL, 'Fulltime', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `student` VALUES(5, 6, 1, 3, 'Mr', 'Louai', 'Maghrabi', 'Male', '0000-00-00', '', '', '', '', '', '', '', NULL, 'Fulltime', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `student` VALUES(6, 7, 1, 3, 'Mrs', 'Natalie', 'Mcbraida', 'Female', '0000-00-00', '', '', '', '', '', '', '', NULL, 'Fulltime', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `student` VALUES(7, 8, 1, 3, 'Miss', 'Shamly', 'Nessa', 'Female', '0000-00-00', '', '', '', '', '', '', '', NULL, 'Fulltime', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `student` VALUES(8, 9, 1, 3, 'Mr', 'Shiyazooooo', 'Rasheed', 'Male', '0000-00-00', '', '', '', '', '', '', '', NULL, 'Fulltime', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `student` VALUES(9, 10, 1, 3, 'Mr', 'Simon', 'Nicholls', 'Male', '0000-00-00', '', '', '', '', '', '', '', NULL, 'Fulltime', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `student` VALUES(10, 11, 1, 3, 'Mr', 'Son', 'Nguyen', 'Male', '0000-00-00', '', '', '', '', '', '', '', NULL, 'Fulltime', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `student` VALUES(11, 12, 1, 3, 'Mr', 'Tim', 'Smardon', 'Male', '0000-00-00', '', '', '', '', '', '', '', NULL, 'Fulltime', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `student` VALUES(12, 13, 1, 3, 'Mr', 'Uday', 'Thakur', 'Male', '1997-01-16', 'Ruper St.', 'Marine Drive', 'Lochness', 'Bristol', 'BS2 3GH', '998877665544', '', NULL, 'Fulltime', 'Yes', NULL, NULL, 'Self Funded Student.', 'High Diploma in History', NULL, NULL);
INSERT INTO `student` VALUES(13, 25, 1, 3, 'Mr', 'Rick', 'Donohoe', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Fulltime', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_module`
--

CREATE TABLE `student_module` (
  `student_id` int(10) NOT NULL,
  `cw_exam_id` int(10) NOT NULL,
  `cw_submitted_date` date NOT NULL,
  `cw_extended_date` date NOT NULL,
  `cw_mark` int(2) NOT NULL,
  PRIMARY KEY  (`student_id`,`cw_exam_id`),
  KEY `cw_exam_id` (`cw_exam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_module`
--

INSERT INTO `student_module` VALUES(1, 1, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 3, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 4, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 5, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 6, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 7, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 8, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 9, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 13, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 14, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 15, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 16, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 17, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 18, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 19, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 20, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 21, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 22, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 23, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(1, 24, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 1, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 3, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 4, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 5, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 6, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 7, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 8, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 9, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 13, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 14, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 15, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 16, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 17, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 18, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 19, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 20, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 21, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 22, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 23, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(2, 24, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 1, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 3, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 4, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 5, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 6, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 7, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 8, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 9, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 10, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 11, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 12, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 13, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 14, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 15, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 16, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 17, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 18, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 19, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 20, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(3, 21, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 1, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 3, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 4, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 5, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 6, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 7, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 8, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 9, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 13, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 14, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 15, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 16, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 17, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 18, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 19, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 20, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 21, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 22, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 23, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(4, 24, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 1, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 3, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 4, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 5, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 6, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 7, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 8, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 9, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 10, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 11, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 12, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 13, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 14, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 15, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 16, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 17, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 18, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 19, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 20, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(5, 21, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 1, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 3, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 4, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 5, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 6, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 7, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 8, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 9, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 10, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 11, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 12, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 13, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 14, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 15, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 16, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 17, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 18, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 19, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 20, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(6, 21, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 1, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 3, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 4, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 5, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 6, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 7, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 8, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 9, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 13, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 14, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 15, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 16, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 17, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 18, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 19, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 20, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 21, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 22, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 23, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(7, 24, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 1, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 3, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 4, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 5, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 6, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 7, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 8, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 9, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 13, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 14, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 15, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 16, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 17, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 18, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 19, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 20, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 21, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 22, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 23, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(8, 24, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 1, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 3, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 4, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 5, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 6, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 7, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 8, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 9, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 13, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 14, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 15, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 16, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 17, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 18, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 19, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 20, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 21, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 22, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 23, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(9, 24, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 1, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 3, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 4, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 5, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 6, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 7, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 8, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 9, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 10, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 11, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 12, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 13, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 14, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 15, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 16, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 17, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 18, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 19, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 20, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(10, 21, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 1, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 3, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 4, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 5, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 6, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 7, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 8, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 9, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 13, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 14, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 15, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 16, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 17, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 18, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 19, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 20, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 21, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 22, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 23, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(11, 24, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 1, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 3, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 4, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 5, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 6, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 7, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 8, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 9, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 13, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 14, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 15, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 16, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 17, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 18, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 19, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 20, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 21, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 22, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 23, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(12, 24, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 1, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 3, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 4, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 5, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 6, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 7, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 8, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 9, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 10, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 11, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 12, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 13, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 14, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 15, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 16, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 17, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 18, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 19, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 20, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 21, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 22, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 23, '0000-00-00', '0000-00-00', 0);
INSERT INTO `student_module` VALUES(13, 24, '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_staff`
--

CREATE TABLE `student_staff` (
  `student_id` int(10) NOT NULL,
  `staff_id` int(10) NOT NULL,
  PRIMARY KEY  (`student_id`,`staff_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Student and staff members';

--
-- Dumping data for table `student_staff`
--

INSERT INTO `student_staff` VALUES(1, 1);
INSERT INTO `student_staff` VALUES(2, 1);
INSERT INTO `student_staff` VALUES(3, 1);
INSERT INTO `student_staff` VALUES(4, 1);
INSERT INTO `student_staff` VALUES(5, 1);
INSERT INTO `student_staff` VALUES(6, 1);
INSERT INTO `student_staff` VALUES(7, 1);
INSERT INTO `student_staff` VALUES(8, 1);
INSERT INTO `student_staff` VALUES(9, 1);
INSERT INTO `student_staff` VALUES(10, 1);
INSERT INTO `student_staff` VALUES(11, 1);
INSERT INTO `student_staff` VALUES(12, 1);
INSERT INTO `student_staff` VALUES(13, 1);
INSERT INTO `student_staff` VALUES(1, 2);
INSERT INTO `student_staff` VALUES(2, 2);
INSERT INTO `student_staff` VALUES(3, 2);
INSERT INTO `student_staff` VALUES(4, 2);
INSERT INTO `student_staff` VALUES(5, 2);
INSERT INTO `student_staff` VALUES(6, 2);
INSERT INTO `student_staff` VALUES(7, 2);
INSERT INTO `student_staff` VALUES(8, 2);
INSERT INTO `student_staff` VALUES(9, 2);
INSERT INTO `student_staff` VALUES(10, 2);
INSERT INTO `student_staff` VALUES(11, 2);
INSERT INTO `student_staff` VALUES(12, 2);
INSERT INTO `student_staff` VALUES(13, 2);
INSERT INTO `student_staff` VALUES(1, 3);
INSERT INTO `student_staff` VALUES(2, 3);
INSERT INTO `student_staff` VALUES(3, 3);
INSERT INTO `student_staff` VALUES(4, 3);
INSERT INTO `student_staff` VALUES(5, 3);
INSERT INTO `student_staff` VALUES(6, 3);
INSERT INTO `student_staff` VALUES(7, 3);
INSERT INTO `student_staff` VALUES(8, 3);
INSERT INTO `student_staff` VALUES(9, 3);
INSERT INTO `student_staff` VALUES(10, 3);
INSERT INTO `student_staff` VALUES(11, 3);
INSERT INTO `student_staff` VALUES(12, 3);
INSERT INTO `student_staff` VALUES(13, 3);
INSERT INTO `student_staff` VALUES(1, 4);
INSERT INTO `student_staff` VALUES(2, 4);
INSERT INTO `student_staff` VALUES(3, 4);
INSERT INTO `student_staff` VALUES(4, 4);
INSERT INTO `student_staff` VALUES(5, 4);
INSERT INTO `student_staff` VALUES(6, 4);
INSERT INTO `student_staff` VALUES(7, 4);
INSERT INTO `student_staff` VALUES(8, 4);
INSERT INTO `student_staff` VALUES(9, 4);
INSERT INTO `student_staff` VALUES(10, 4);
INSERT INTO `student_staff` VALUES(11, 4);
INSERT INTO `student_staff` VALUES(12, 4);
INSERT INTO `student_staff` VALUES(13, 4);
INSERT INTO `student_staff` VALUES(1, 5);
INSERT INTO `student_staff` VALUES(2, 5);
INSERT INTO `student_staff` VALUES(3, 5);
INSERT INTO `student_staff` VALUES(4, 5);
INSERT INTO `student_staff` VALUES(5, 5);
INSERT INTO `student_staff` VALUES(6, 5);
INSERT INTO `student_staff` VALUES(7, 5);
INSERT INTO `student_staff` VALUES(8, 5);
INSERT INTO `student_staff` VALUES(9, 5);
INSERT INTO `student_staff` VALUES(10, 5);
INSERT INTO `student_staff` VALUES(11, 5);
INSERT INTO `student_staff` VALUES(12, 5);
INSERT INTO `student_staff` VALUES(13, 5);
INSERT INTO `student_staff` VALUES(1, 6);
INSERT INTO `student_staff` VALUES(2, 6);
INSERT INTO `student_staff` VALUES(3, 6);
INSERT INTO `student_staff` VALUES(4, 6);
INSERT INTO `student_staff` VALUES(5, 6);
INSERT INTO `student_staff` VALUES(6, 6);
INSERT INTO `student_staff` VALUES(7, 6);
INSERT INTO `student_staff` VALUES(8, 6);
INSERT INTO `student_staff` VALUES(9, 6);
INSERT INTO `student_staff` VALUES(10, 6);
INSERT INTO `student_staff` VALUES(11, 6);
INSERT INTO `student_staff` VALUES(12, 6);
INSERT INTO `student_staff` VALUES(13, 6);
INSERT INTO `student_staff` VALUES(1, 7);
INSERT INTO `student_staff` VALUES(2, 7);
INSERT INTO `student_staff` VALUES(3, 7);
INSERT INTO `student_staff` VALUES(4, 7);
INSERT INTO `student_staff` VALUES(5, 7);
INSERT INTO `student_staff` VALUES(6, 7);
INSERT INTO `student_staff` VALUES(7, 7);
INSERT INTO `student_staff` VALUES(8, 7);
INSERT INTO `student_staff` VALUES(9, 7);
INSERT INTO `student_staff` VALUES(10, 7);
INSERT INTO `student_staff` VALUES(11, 7);
INSERT INTO `student_staff` VALUES(12, 7);
INSERT INTO `student_staff` VALUES(13, 7);
INSERT INTO `student_staff` VALUES(1, 8);
INSERT INTO `student_staff` VALUES(2, 8);
INSERT INTO `student_staff` VALUES(3, 8);
INSERT INTO `student_staff` VALUES(4, 8);
INSERT INTO `student_staff` VALUES(5, 8);
INSERT INTO `student_staff` VALUES(6, 8);
INSERT INTO `student_staff` VALUES(7, 8);
INSERT INTO `student_staff` VALUES(8, 8);
INSERT INTO `student_staff` VALUES(9, 8);
INSERT INTO `student_staff` VALUES(10, 8);
INSERT INTO `student_staff` VALUES(11, 8);
INSERT INTO `student_staff` VALUES(12, 8);
INSERT INTO `student_staff` VALUES(13, 8);
INSERT INTO `student_staff` VALUES(1, 9);
INSERT INTO `student_staff` VALUES(2, 9);
INSERT INTO `student_staff` VALUES(4, 9);
INSERT INTO `student_staff` VALUES(7, 9);
INSERT INTO `student_staff` VALUES(8, 9);
INSERT INTO `student_staff` VALUES(9, 9);
INSERT INTO `student_staff` VALUES(11, 9);
INSERT INTO `student_staff` VALUES(12, 9);
INSERT INTO `student_staff` VALUES(13, 9);
INSERT INTO `student_staff` VALUES(1, 10);
INSERT INTO `student_staff` VALUES(2, 10);
INSERT INTO `student_staff` VALUES(4, 10);
INSERT INTO `student_staff` VALUES(7, 10);
INSERT INTO `student_staff` VALUES(8, 10);
INSERT INTO `student_staff` VALUES(9, 10);
INSERT INTO `student_staff` VALUES(11, 10);
INSERT INTO `student_staff` VALUES(12, 10);
INSERT INTO `student_staff` VALUES(13, 10);
INSERT INTO `student_staff` VALUES(1, 11);
INSERT INTO `student_staff` VALUES(2, 11);
INSERT INTO `student_staff` VALUES(4, 11);
INSERT INTO `student_staff` VALUES(7, 11);
INSERT INTO `student_staff` VALUES(8, 11);
INSERT INTO `student_staff` VALUES(9, 11);
INSERT INTO `student_staff` VALUES(11, 11);
INSERT INTO `student_staff` VALUES(12, 11);
INSERT INTO `student_staff` VALUES(13, 11);
INSERT INTO `student_staff` VALUES(1, 12);
INSERT INTO `student_staff` VALUES(2, 12);
INSERT INTO `student_staff` VALUES(3, 12);
INSERT INTO `student_staff` VALUES(4, 12);
INSERT INTO `student_staff` VALUES(5, 12);
INSERT INTO `student_staff` VALUES(6, 12);
INSERT INTO `student_staff` VALUES(7, 12);
INSERT INTO `student_staff` VALUES(8, 12);
INSERT INTO `student_staff` VALUES(9, 12);
INSERT INTO `student_staff` VALUES(10, 12);
INSERT INTO `student_staff` VALUES(11, 12);
INSERT INTO `student_staff` VALUES(12, 12);
INSERT INTO `student_staff` VALUES(13, 12);

-- --------------------------------------------------------

--
-- Table structure for table `suspension`
--

CREATE TABLE `suspension` (
  `suspension_id` int(10) NOT NULL auto_increment,
  `student_id` int(10) NOT NULL,
  `sus_category` varchar(50) default NULL,
  `sus_start_date` date NOT NULL,
  `sus_end_date` date default NULL,
  PRIMARY KEY  (`suspension_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `suspension`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL auto_increment,
  `user_name` varchar(50) default NULL,
  `user_password` char(32) default NULL,
  `user_is_a_student` tinyint(1) default NULL,
  `user_is_disabled` tinyint(1) default '0',
  `user_last_logon_date` date default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='User name and password for all users to log in the system' AUTO_INCREMENT=26 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES(1, 'andy.gillies@uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 0, NULL);
INSERT INTO `user` VALUES(2, 'alexadamcanham@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, NULL);
INSERT INTO `user` VALUES(3, 'asim3.mehmood@live.uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, NULL);
INSERT INTO `user` VALUES(4, 'cebe60@yahoo.co.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, NULL);
INSERT INTO `user` VALUES(5, 'drbuckland@hotmail.co.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, NULL);
INSERT INTO `user` VALUES(6, 'louai2.maghrabi@live.uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, NULL);
INSERT INTO `user` VALUES(7, 'natalie2.mcbraida@live.uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, NULL);
INSERT INTO `user` VALUES(8, 'shamilynessa123@hotmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, NULL);
INSERT INTO `user` VALUES(9, 'shiyaz@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, NULL);
INSERT INTO `user` VALUES(10, 'simonnicholls89@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, NULL);
INSERT INTO `user` VALUES(11, 'hoang.nguyen@live.uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, NULL);
INSERT INTO `user` VALUES(12, 'oobersmardon@yahoo.co.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, NULL);
INSERT INTO `user` VALUES(13, 'uday2.thakur@live.uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, NULL);
INSERT INTO `user` VALUES(14, 'christine.perry@uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 0, NULL);
INSERT INTO `user` VALUES(15, 'thomas3.barnes@uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 0, NULL);
INSERT INTO `user` VALUES(16, 'sue.scott@uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 0, NULL);
INSERT INTO `user` VALUES(17, 'morris.williams@uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 0, NULL);
INSERT INTO `user` VALUES(18, 'brian.carse@uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 0, NULL);
INSERT INTO `user` VALUES(19, 'jeff.graham@uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 0, NULL);
INSERT INTO `user` VALUES(20, 'prakash.chatterjee@uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 0, NULL);
INSERT INTO `user` VALUES(21, 'peter.rawlings@uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 0, NULL);
INSERT INTO `user` VALUES(22, 'praminda.caleb-solly@uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 0, NULL);
INSERT INTO `user` VALUES(23, 'dan.dixon@uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 0, NULL);
INSERT INTO `user` VALUES(24, 'dan.buzzo@uwe.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 0, NULL);
INSERT INTO `user` VALUES(25, 'rickdonohoe@aol.co.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `award_module`
--
ALTER TABLE `award_module`
  ADD CONSTRAINT `award_module_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`),
  ADD CONSTRAINT `award_module_ibfk_2` FOREIGN KEY (`award_id`) REFERENCES `award` (`award_id`);

--
-- Constraints for table `module_coursework_exam`
--
ALTER TABLE `module_coursework_exam`
  ADD CONSTRAINT `module_coursework_exam_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `staff_availability`
--
ALTER TABLE `staff_availability`
  ADD CONSTRAINT `staff_availability_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `staff_module`
--
ALTER TABLE `staff_module`
  ADD CONSTRAINT `staff_module_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `staff_module_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `student_module`
--
ALTER TABLE `student_module`
  ADD CONSTRAINT `student_module_ibfk_5` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `student_module_ibfk_6` FOREIGN KEY (`cw_exam_id`) REFERENCES `module_coursework_exam` (`cw_exam_id`);

--
-- Constraints for table `student_staff`
--
ALTER TABLE `student_staff`
  ADD CONSTRAINT `student_staff_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `student_staff_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `suspension`
--
ALTER TABLE `suspension`
  ADD CONSTRAINT `suspension_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
