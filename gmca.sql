-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 08:36 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gmca`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_project`
--

CREATE TABLE IF NOT EXISTS `academic_project` (
  `academic_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`academic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `academic_project`
--

INSERT INTO `academic_project` (`academic_id`, `reg_id`, `details`, `status`) VALUES
(1, 4, 'aaadd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE IF NOT EXISTS `award` (
  `award_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `year` int(4) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`award_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`award_id`, `reg_id`, `title`, `year`, `details`, `status`) VALUES
(1, 4, 'nvaclkuav.', 2018, '.knjmb', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`b_id`, `caption`, `description`, `image`, `status`) VALUES
(1, 'Excellence in Education Award', 'Principal Dr. Chetan Bhatt, is honored with Excellence in Education Award by International Society of Automation..', 'DSC_7146.jpg\r\n', NULL),
(2, 'Establishment of  Institution', 'Institution is established by Hon. Shri. Narendrabhai Modi, then Chief Minister of Gujarat.', 'image1.jpg', NULL),
(3, 'Education Needs Complete Solution', 'Nothing is impossible the word itself says I''m possible.', '3.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `details` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course_taught`
--

CREATE TABLE IF NOT EXISTS `course_taught` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `course_type` varchar(50) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `course_taught`
--

INSERT INTO `course_taught` (`course_id`, `reg_id`, `course_type`, `details`, `status`) VALUES
(1, 4, 'UG Details', 'php\r\n', 0),
(3, 4, 'PG Details', 'java', 0);

-- --------------------------------------------------------

--
-- Table structure for table `edu_qualification`
--

CREATE TABLE IF NOT EXISTS `edu_qualification` (
  `edu_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `university` varchar(255) NOT NULL,
  `cgpi` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`edu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `edu_qualification`
--

INSERT INTO `edu_qualification` (`edu_id`, `reg_id`, `degree`, `university`, `cgpi`, `year`, `status`) VALUES
(1, 4, 'mca', 'gtu', 8, 2021, 0),
(2, 4, 'bca', 'gu', 7, 2018, 0);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(150) NOT NULL,
  `details` varchar(200) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `name`, `date`, `image`, `details`, `status`) VALUES
(1, 'Yoga Day Celebration', '2019-09-21', '11.jpg', 'Institute celebrate International Yoga Day jointly with Vivekananda Kendra, and other institutes of campus.', 0),
(2, 'Faculty Development Program', '2020-09-23', 'classrooms-min.jpg', 'Course Design in Context of National Board of Accreditation (NBA) Criteria for the faculty members of the engineering colleges.', 0),
(3, 'Republic Day Celebration', '2021-01-20', 'DSC_8071.jpg', 'All the institutes in campus jointly celebrate republic day. All the institutes also celebrate many other activities jointly.', 0),
(10, 'demo', '0000-00-00', 'GMCA1612523840.jpg', 'demo', 0),
(11, 'test', '0000-00-00', 'GMCA1612524235.jpg', 'test\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `expert_lecture`
--

CREATE TABLE IF NOT EXISTS `expert_lecture` (
  `expert_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `details` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`expert_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `expert_lecture`
--

INSERT INTO `expert_lecture` (`expert_id`, `reg_id`, `title`, `details`, `date`, `location`, `status`) VALUES
(1, 4, 'aaa', 'bbb', '2021-01-08', 'ahm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE IF NOT EXISTS `facilities` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `details` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `event_name` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`g_id`, `event_id`, `event_name`, `image`, `status`) VALUES
(1, 1, 'Yoga Day 2017', '11.jpg', 0),
(2, 1, 'Yoga Day 2017', '22.jpg', 0),
(3, 2, 'Faculty Development Program', 'DSC_8181.jpg', 0),
(5, 3, 'Republic Day Celebration', 'WhatsApp_Image_2018-06-26_at_11_31_03.jpg', 0),
(11, 10, 'demo', 'GMCA0.97771900 1612525007601d2dcfeeb3c9.60654275.jpg', 0),
(12, 10, 'demo', 'GMCA0.07431800 1612525008601d2dd0122524.13308724.jpg', 0),
(13, 10, 'demo', 'GMCA0.15687200 1612525008601d2dd0264cc1.25283529.jpg', 0),
(14, 10, 'demo', 'GMCA0.29355200 1612525008601d2dd047ab45.95183839.jpg', 0),
(15, 10, 'demo', 'GMCA0.38323500 1612525008601d2dd05d9088.20690879.jpg', 0),
(16, 10, 'demo', 'GMCA0.46750900 1612525008601d2dd0722399.35303308.jpg', 0),
(17, 10, 'demo', 'GMCA0.55440700 1612525008601d2dd0875ab6.69047733.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`n_id`, `title`, `date`, `file`, `status`) VALUES
(1, 'About Exam', '2021-01-14', 'GMC LOGO.pdf', 0),
(2, 'New Addmission', '2020-12-23', 'images.jpg', 0),
(3, 'test', '2021-01-13', '', 0),
(4, 'test1', '2021-01-20', '', 0),
(10, 'demo', '2021-03-03', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `details` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`n_id`, `title`, `details`, `file`, `status`) VALUES
(1, 'Exam Update', 'External Exam Dates Are Uploades', '', 0),
(2, 'Farewell 2020', 'Farewell 2020', '', 0),
(3, 'Orientation 2020 On Dec.10', 'Orientation 2020 On Dec.10', '', 0),
(4, 'demo', 'demo', '', 0),
(5, 'demo2`', 'aaa', '', 0),
(6, 'demo', 'testdemo', 'signup-img.jpg', 0),
(7, 'demo', 'test2', '', NULL),
(8, 'demo', 'demo', '', NULL),
(9, 'demo', 'demo', 'GMCA1612026613.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patent_filed`
--

CREATE TABLE IF NOT EXISTS `patent_filed` (
  `patent_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`patent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `patent_filed`
--

INSERT INTO `patent_filed` (`patent_id`, `reg_id`, `details`, `status`) VALUES
(1, 4, 'bajdxvusaifcg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `personal_dtls`
--

CREATE TABLE IF NOT EXISTS `personal_dtls` (
  `personal_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `area_intrest` varchar(255) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  PRIMARY KEY (`personal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `personal_dtls`
--

INSERT INTO `personal_dtls` (`personal_id`, `reg_id`, `designation`, `area_intrest`, `qualification`, `experience`) VALUES
(1, 4, 'Faculty', 'Java,php\r\n', 'mca', '2yr'),
(2, 0, '', '', '', ''),
(3, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `portfolio_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`portfolio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `reg_id`, `details`, `status`) VALUES
(1, 4, 'aabbbxxxx\r\n\r\n', 0),
(2, 4, 'nnnnvvguoinkla\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `professional_institution_membership`
--

CREATE TABLE IF NOT EXISTS `professional_institution_membership` (
  `pim_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pim_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `professional_institution_membership`
--

INSERT INTO `professional_institution_membership` (`pim_id`, `reg_id`, `details`, `status`) VALUES
(1, 4, 'acbakjdlih\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE IF NOT EXISTS `publication` (
  `publication_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`publication_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`publication_id`, `reg_id`, `details`, `status`) VALUES
(1, 4, 'anakjvgksj', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female','','') NOT NULL,
  `no` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `name`, `phone`, `profile`, `email`, `password`, `gender`, `no`, `status`, `datetime`) VALUES
(1, 'Admin', '', '', 'admin@gmca.com', 'admin@123', '', 0, 0, '2021-01-02 12:25:00'),
(4, 'Ami', '7894561123', 'IMG-20180913-WA0011.jpg', 'ami@gmail.com', '1234', 'female', 1, 0, '2021-02-05 17:15:11'),
(6, 'Reenal', '123456789', '', 'reenalpatel99@gmail.com', '1234', 'female', 1, 0, '2021-01-30 22:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `research_project`
--

CREATE TABLE IF NOT EXISTS `research_project` (
  `research_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`research_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `research_project`
--

INSERT INTO `research_project` (`research_id`, `reg_id`, `details`, `status`) VALUES
(1, 4, 'annbckjbak', 0);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `sem` varchar(100) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `skills_knowledge`
--

CREATE TABLE IF NOT EXISTS `skills_knowledge` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `skill_dtls` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `skills_knowledge`
--

INSERT INTO `skills_knowledge` (`skill_id`, `reg_id`, `skill_dtls`, `status`) VALUES
(1, 4, 'java', 0);

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE IF NOT EXISTS `syllabus` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `sem` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `training_workshop`
--

CREATE TABLE IF NOT EXISTS `training_workshop` (
  `training_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `organizer` varchar(255) NOT NULL,
  `duration` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`training_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `training_workshop`
--

INSERT INTO `training_workshop` (`training_id`, `reg_id`, `title`, `organizer`, `duration`, `status`) VALUES
(1, 4, 'aaa', 'bbb', '3days', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `no` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_exp`
--

CREATE TABLE IF NOT EXISTS `work_exp` (
  `w_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `work` varchar(255) NOT NULL,
  `from` int(4) NOT NULL,
  `to` int(4) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`w_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `work_exp`
--

INSERT INTO `work_exp` (`w_id`, `reg_id`, `work`, `from`, `to`, `status`) VALUES
(1, 4, 'java', 2, 2, 0),
(2, 4, 'php', 2018, 2021, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
