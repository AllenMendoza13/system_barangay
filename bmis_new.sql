-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2025 at 07:28 AM
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
-- Database: `bmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `id_approval` int(11) NOT NULL,
  `id_resident` int(11) NOT NULL,
  `apstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brgy_info`
--

CREATE TABLE `brgy_info` (
  `id_brgy_info` int(11) NOT NULL,
  `brgy` varchar(50) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `openhours` text NOT NULL,
  `background` text NOT NULL,
  `vision` text NOT NULL,
  `mission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brgy_info`
--

INSERT INTO `brgy_info` (`id_brgy_info`, `brgy`, `municipal`, `province`, `email`, `contact`, `openhours`, `background`, `vision`, `mission`) VALUES
(1, 'Calaocan', 'Santiago City', 'Isabela', 'brgycalaocan@gmail.com', '046-509-1664', 'Open Hours of Barangay: Monday to Friday (8:00 to 5:00)', 'Biclatan is a barangay in the city of General Trias, in the province of Cavite. Its population as determined by the 2020 census was 23,102. This represented 5.13% of the total population of General Trias.', 'To foster a united, sustainable, and inclusive community. Barangay Biclatan is committed to providing essential services, ensuring transparent governance, and preserving our cultural heritage and environment. We strive to empower residents through education, promote economic development, and enhance the overall well-being of our community while celebrating our unique identity and contributing to greater prosperity of Oriental Mindoro.', 'We aspire to be a model barangay that prioritizes the well-being of our people, foster unity, and embracing the progress while preserving our cultural heritage and natural resources. Through collective effort and participatory governance, we aim to create a safe, resilient and empowered community that values equity, environmental stewardship, and continuous learning. s');

-- --------------------------------------------------------

--
-- Stand-in structure for view `masked_users`
-- (See below for the actual view)
--
CREATE TABLE `masked_users` (
`id_user` int(1)
,`masked_email` int(1)
,`masked_password` int(1)
,`masked_lname` int(1)
,`masked_fname` int(1)
,`masked_address` int(1)
,`masked_position` int(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id_position` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `pos_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id_position`, `position`, `pos_order`) VALUES
(1, 'Barangay Chairman', 1),
(2, 'Sk Chairperson', 2),
(3, 'Barangay Secretary', 3),
(4, 'Barangay Treasurer', 4),
(5, 'Councilor 1', 5),
(6, 'Councilor 2', 6),
(7, 'Councilor 3', 7),
(8, 'Councilor 4', 8),
(9, 'Councilor 5', 9),
(10, 'Councilor 6', 10);

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id_system` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `acronym` varchar(50) NOT NULL,
  `poweredBy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id_system`, `name`, `acronym`, `poweredBy`) VALUES
(1, 'Barangay Calaocan Information System', 'BBIS', 'Ive Generalao');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activities`
--

CREATE TABLE `tbl_activities` (
  `id_activity` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_activities`
--

INSERT INTO `tbl_activities` (`id_activity`, `name`, `date`, `image`) VALUES
(8, 'Start of Election Campaign', '2025-03-28', 'uploads/Picture 2x2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `user_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `email`, `password`, `lname`, `fname`, `mi`, `role`, `user_status`) VALUES
(1, 'juancalaocan@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Tosper', 'Rafael Jr.', 'M', 'administrator', ''),
(2, 'admin2@gmail.com', '6964f527f011df8756f87c3e8a76884f', 'Simon', 'Marian', '', 'administrator', ''),
(3, 'admin3@gmail.com', '6964f527f011df8756f87c3e8a76884f', 'Obena', 'Katrina', 'T', 'administrator', ''),
(4, 'admin4@gmail.com', '6964f527f011df8756f87c3e8a76884f', 'Villano', 'Kristine Joy', 'G', 'administrator', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `id_announcement` int(11) NOT NULL,
  `event` varchar(1000) NOT NULL,
  `target` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `addedby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blotter`
--

CREATE TABLE `tbl_blotter` (
  `id_blotter` int(11) NOT NULL,
  `case_no` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `blot_photo` mediumblob DEFAULT NULL,
  `contact` varchar(20) NOT NULL,
  `narrative` mediumtext NOT NULL,
  `case_name` varchar(128) NOT NULL,
  `case_respondent` varchar(128) NOT NULL,
  `timeapplied` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_blotter`
--

INSERT INTO `tbl_blotter` (`id_blotter`, `case_no`, `lname`, `fname`, `mi`, `houseno`, `street`, `brgy`, `municipal`, `blot_photo`, `contact`, `narrative`, `case_name`, `case_respondent`, `timeapplied`) VALUES
(6, 20250001, 'mendoza', 'allen', 'g', '266', 'zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', 'car napping', 'car napping', 'Juan b', '2025-03-26 22:48:50'),
(7, 20250002, 'Dela Cruz', 'Juan', 'C', '266', 'Zone 4', 'Calaocan', 'Santiago City', NULL, '09566795361', 'Thief', 'Thief', 'Peter Calungsod', '2025-03-26 23:02:08'),
(8, 20250003, 'Mendoza', 'Jonh Allen', 'Gutierrez', 'qw', 'Zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', 'Rape', 'Rape', 'John Doe', '2025-03-26 23:08:19'),
(9, 20250004, 'Mendoza', 'Jonh Allen', 'Gutierrez', 'qw', 'Zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', 'Harassment', 'harassment', 'Jonh Doe', '2025-03-26 23:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brgyid`
--

CREATE TABLE `tbl_brgyid` (
  `id_brgyid` int(11) DEFAULT NULL,
  `id_resident` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `bplace` varchar(255) NOT NULL,
  `bdate` varchar(255) NOT NULL,
  `res_photo` varchar(255) DEFAULT NULL,
  `inc_lname` varchar(255) NOT NULL,
  `inc_fname` varchar(255) NOT NULL,
  `inc_mi` varchar(255) NOT NULL,
  `inc_contact` varchar(255) NOT NULL,
  `inc_houseno` varchar(255) NOT NULL,
  `inc_street` varchar(255) NOT NULL,
  `inc_brgy` varchar(255) NOT NULL,
  `inc_municipal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_brgyid`
--

INSERT INTO `tbl_brgyid` (`id_brgyid`, `id_resident`, `lname`, `fname`, `mi`, `houseno`, `street`, `brgy`, `municipal`, `bplace`, `bdate`, `res_photo`, `inc_lname`, `inc_fname`, `inc_mi`, `inc_contact`, `inc_houseno`, `inc_street`, `inc_brgy`, `inc_municipal`) VALUES
(NULL, 23, 'Vilfamat', 'Vincent', 'Briongos', 'Blk. 2 Lot 5', 'Kamatisan', 'Dalig', 'Antipolo City', '2011-06-15', '1999-07-30', NULL, 'Vilfamat', 'Teresita', 'Briongos', '09515496436', 'Antipolo City', '2011-06-15', '1999-07-30', NULL),
(NULL, 23, 'Vilfamat', 'Vincent', 'Briongos', 'Blk. 2 Lot 5', 'Kamatisan', 'Dalig', 'Antipolo City', '2011-06-15', '1999-11-29', NULL, 'Vilfamat', 'Teresita', 'Briongos', '09654165465', 'Antipolo City', '2011-06-15', '1999-11-29', 'Array'),
(NULL, 23, 'Vilfamat', 'Vincent', 'Briongos', 'Blk. 2 Lot 5', 'Kamatisan', 'Dalig', 'Antipolo City', 'Antipolo, Rizal', '1999-11-30', NULL, 'Vilfamat', 'Teresita', 'Briongos', '09564815496', 'Antipolo City', 'Antipolo, Rizal', '1999-11-30', 'Array');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bspermit`
--

CREATE TABLE `tbl_bspermit` (
  `id_bspermit` int(11) NOT NULL,
  `cert_no` varchar(255) NOT NULL,
  `id_resident` int(11) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mi` varchar(255) DEFAULT NULL,
  `age` tinyint(4) NOT NULL,
  `bsname` varchar(255) DEFAULT NULL,
  `houseno` varchar(255) DEFAULT NULL,
  `street` varchar(252) DEFAULT NULL,
  `brgy` varchar(255) DEFAULT NULL,
  `municipal` varchar(255) DEFAULT NULL,
  `bsindustry` varchar(255) DEFAULT NULL,
  `aoe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clearance`
--

CREATE TABLE `tbl_clearance` (
  `id_clearance` int(11) NOT NULL,
  `cert_no` varchar(255) NOT NULL,
  `id_resident` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_family_member`
--

CREATE TABLE `tbl_family_member` (
  `id` int(11) NOT NULL,
  `resident_id` int(11) DEFAULT 0,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_family_member`
--

INSERT INTO `tbl_family_member` (`id`, `resident_id`, `family_lastname`, `family_firstname`, `family_middleinitial`, `relationshipid`, `family_age`, `familycivilid`, `occupation`, `income`) VALUES
(1, 98, 'wqqwqwq', 'wqwqqw', 'q', 'Brother', '0', 'Single', 'qwqwq', 'wqwqwqwq'),
(2, 99, 'wqwqw', 'wqqwq', 'wqwq', 'Mother', '12', 'Single', 'wqqw', 'wqqwq'),
(3, 100, 'wqwq', 'wqqw', 'q', 'Mother', '12', 'Single', 'wqwqwqqw', 'wqwq'),
(4, 101, 'wqwq', 'qwqwq', 'wqwq', 'Mother', '12', 'Married', 'wwqwqw', 'wqwqwq'),
(5, 102, 'mendoza', 'wqwqq', 'w', 'Mother', '12', 'Married', 'sasaas', '21221'),
(6, 103, 'Mendoza', 'wqqw', 'w', 'Father', '22', 'Married', 'wqqw', '123'),
(7, 104, 'mendoza', 'sasa', 'f', 'Mother', '33', 'Married', 'N/A', '12000'),
(8, 105, 'wqwqqw', 'wqwq', 'wqwqwq', 'Mother', '12', 'Single', 'qwwqw', '1212212');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_indigency`
--

CREATE TABLE `tbl_indigency` (
  `id_indigency` int(11) NOT NULL,
  `cert_no` varchar(255) NOT NULL,
  `id_resident` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_officials`
--

CREATE TABLE `tbl_officials` (
  `id_official` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `termstart` date NOT NULL,
  `termend` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `avatar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_officials`
--

INSERT INTO `tbl_officials` (`id_official`, `name`, `position`, `termstart`, `termend`, `status`, `avatar`) VALUES
(1, '              Hon. Dionido U. Quitain', 'Presiding Officer', '2018-06-08', '2026-06-28', 'Active', ''),
(2, '  Hon. Criswin P. Roxas', 'Sk Chairperson', '2021-05-01', '2025-05-15', 'Not Active', ''),
(3, 'Josue G. Ortega', 'Barangay Secretary', '2017-06-06', '2027-09-30', 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rescert`
--

CREATE TABLE `tbl_rescert` (
  `id_rescert` int(11) NOT NULL,
  `cert_no` varchar(255) NOT NULL,
  `id_resident` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `purpose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rescert`
--

INSERT INTO `tbl_rescert` (`id_rescert`, `cert_no`, `id_resident`, `lname`, `fname`, `mi`, `age`, `nationality`, `houseno`, `street`, `brgy`, `municipal`, `date`, `purpose`) VALUES
(111132, '49165014101', 45, 'Coloma', 'Charmaine', 'Baldo', '26', 'Filipino', '123', 'Purok 2', 'Biclatan', 'Nueva Ecija', '2024-11-06', 'Job/Employment'),
(111135, '39550084257', 78, 'Medina', 'Jan Clifford', 'Calad', '32', 'Filipino', '24', 'Purok 2 Laurel', 'Calaocan', 'Santiago City', '2024-11-07', 'Job/Employment'),
(111136, '95182355823', 79, 'DelaCruz', 'Manilyn', 'Bernardo', '37', 'Filipino', '24', 'Purok 2 Laurel', 'Calaocan', 'Santiago City', '2024-11-12', 'Job/Employment'),
(111137, '10553778915', 45, 'Coloma', 'Charmaine', 'Baldo', '26', 'Filipino', '123', 'Purok 2', 'Biclatan', 'Nueva Ecija', '2025-03-26', 'Job/Employment');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resident`
--

CREATE TABLE `tbl_resident` (
  `id_resident` int(11) NOT NULL,
  `request_status` varchar(50) NOT NULL DEFAULT 'Pending',
  `res_photo` mediumblob DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `houseno` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `brgy` varchar(255) DEFAULT NULL,
  `municipal` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `bdate` date NOT NULL,
  `bplace` varchar(255) NOT NULL,
  `s_of_income` varchar(128) DEFAULT NULL,
  `occupation` varchar(128) DEFAULT NULL,
  `nationality` varchar(255) NOT NULL,
  `family_role` varchar(255) DEFAULT NULL,
  `psa_holder` varchar(5) NOT NULL DEFAULT 'No',
  `psa_correction` varchar(128) NOT NULL DEFAULT 'No',
  `ntnlId` varchar(19) NOT NULL DEFAULT 'No',
  `voter` varchar(255) DEFAULT NULL,
  `pwd` varchar(10) NOT NULL,
  `indigent` varchar(255) NOT NULL,
  `single_parent` varchar(255) NOT NULL,
  `malnourished` varchar(255) NOT NULL,
  `four_ps` varchar(255) NOT NULL,
  `vaccinated` varchar(255) DEFAULT NULL,
  `pregnancy` varchar(255) NOT NULL,
  `domesticated_animals` varchar(128) DEFAULT NULL,
  `trees` varchar(128) DEFAULT NULL,
  `farmer` varchar(128) DEFAULT NULL,
  `vegetables` varchar(128) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `ip_community` varchar(255) DEFAULT NULL,
  `out_of_school_youth` enum('Yes','No') DEFAULT NULL,
  `lgbtq` enum('Yes','No') DEFAULT NULL,
  `senior_citizen` varchar(11) DEFAULT NULL,
  `addedby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_resident`
--

INSERT INTO `tbl_resident` (`id_resident`, `request_status`, `res_photo`, `email`, `password`, `lname`, `fname`, `mi`, `age`, `sex`, `status`, `houseno`, `street`, `brgy`, `municipal`, `address`, `contact`, `bdate`, `bplace`, `s_of_income`, `occupation`, `nationality`, `family_role`, `psa_holder`, `psa_correction`, `ntnlId`, `voter`, `pwd`, `indigent`, `single_parent`, `malnourished`, `four_ps`, `vaccinated`, `pregnancy`, `domesticated_animals`, `trees`, `farmer`, `vegetables`, `role`, `ip_community`, `out_of_school_youth`, `lgbtq`, `senior_citizen`, `addedby`) VALUES
(45, 'approved', NULL, 'coloma@gmail.com', '', 'Coloma', 'Charmaine', 'Baldo', 26, 'Female', 'Single', '123', 'Purok 2', 'Biclatan', 'Nueva Ecija', NULL, '09952650331', '1999-11-20', 'Veronica', NULL, NULL, 'Filipino', '', 'No', 'No', 'No', 'Yes', 'Yes', 'Yes', 'Yes', '', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, NULL, 'resident', NULL, NULL, NULL, NULL, NULL),
(56, 'approved', NULL, 'balmores@gmail.com', '6964f527f011df8756f87c3e8a76884f', 'Balmores', 'Santy', 'Palma', 20, 'Male', 'pending', '1234', 'Santiago', 'Biclatan', 'General Trias', NULL, '09672518471', '2003-08-29', 'Veronica', NULL, NULL, 'Filipino', 'Yes', 'No', 'No', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', NULL, NULL, NULL, NULL, 'resident', NULL, NULL, NULL, NULL, ''),
(59, 'approved', NULL, 'almira@gmail.com', '6964f527f011df8756f87c3e8a76884f', 'Coloma', 'Almira Jane', 'Baldo', 21, 'Female', 'Single', '2342', 'Macamias', 'Biclatan', 'General Trias', NULL, '09789876564', '2003-03-06', 'Maturanoc', NULL, NULL, 'Filipino', 'No', 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'No', 'No', 'No', 'Yes', 'No', NULL, NULL, NULL, NULL, 'resident', NULL, NULL, NULL, NULL, NULL),
(60, 'pending', NULL, 'johannah@gmail.com', '6964f527f011df8756f87c3e8a76884f', 'Reyes', 'Johannah', 'Dizon', 23, 'Female', 'Single', '6547', 'Macamias', 'Biclatan', 'General Trias', NULL, '09786543578', '2000-11-20', 'Veronica', NULL, NULL, 'Filipino', 'Yes', 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'No', NULL, NULL, NULL, NULL, 'resident', NULL, NULL, NULL, NULL, NULL),
(69, 'approved', NULL, 'norlyn@gmail.com', '6964f527f011df8756f87c3e8a76884f', 'Reyes', 'Norlyn', '', 31, 'Female', 'Married', '12', 'Macamias', 'Biclatan', 'General Trias', NULL, '09553194514', '1992-11-15', 'Maturanoc', NULL, NULL, 'Filipino', 'Yes', 'No', 'No', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', '', '', NULL, NULL, NULL, NULL, 'resident', NULL, NULL, NULL, NULL, NULL),
(71, 'approved', NULL, 'buyer@gmail.com', 'cce5101d28fc68509470d27b56b19dcb', 'Reyess', 'James', 'Casna', 15, 'Male', 'Single', '211', 'davao', 'Biclatan', 'General Trias', NULL, '09213891221', '2008-10-30', 'davao', NULL, NULL, 'Filipino', '', 'No', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', '', '', NULL, NULL, NULL, NULL, 'resident', NULL, NULL, NULL, NULL, NULL),
(72, 'approved', NULL, 'ronald@gmail.com', 'cce5101d28fc68509470d27b56b19dcb', 'Reyess', 'Ronald', 'cassaa', 22, 'Male', 'Single', '111', 'davao', 'Biclatan', 'General Trias', NULL, '09213891221', '2001-11-30', 'davao', NULL, NULL, 'Filipino', '', 'No', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', '', '', NULL, NULL, NULL, NULL, 'resident', NULL, NULL, NULL, NULL, NULL),
(73, 'approved', NULL, 'lance@gmail.com', 'cce5101d28fc68509470d27b56b19dcb', 'Reyess', 'lance', 'asda', 31, 'Male', 'Single', '321', 'davao', 'Biclatan', 'General Trias', NULL, '09213891221', '1993-01-31', 'davao', NULL, NULL, 'Filipino', '', 'No', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', '', '', NULL, NULL, NULL, NULL, 'resident', NULL, NULL, NULL, NULL, NULL),
(74, 'approved', NULL, 'harryden@gmail.com', 'cce5101d28fc68509470d27b56b19dcb', 'DelaCruz', 'James', 'Natoy', 24, 'Male', 'Single', '1123', 'davao', 'Biclatan', 'General Trias', NULL, '09213891221', '2000-02-28', 'davao', NULL, NULL, 'Filipino', 'Yes', 'No', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', '', '', NULL, NULL, NULL, NULL, 'resident', NULL, NULL, NULL, NULL, NULL),
(75, 'pending', NULL, 'admin@admin.com', 'cce5101d28fc68509470d27b56b19dcb', 'Reyess', 'garet', 'cassaa', 9, 'Male', 'Single', '1112', 'davao', 'Biclatan', 'General Trias', NULL, '09213891221', '2014-10-28', 'davao', NULL, NULL, 'Filipino', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '', NULL, NULL, NULL, NULL, 'resident', NULL, NULL, NULL, NULL, NULL),
(76, 'pending', NULL, 'buyer12@gmail.com', 'cce5101d28fc68509470d27b56b19dcb', 'Reyess', 'james bond', 'cassaa', 16, 'Male', 'Married', '221', 'davao', 'Biclatan', 'General Trias', NULL, '09289713213', '2007-10-29', 'davao', NULL, NULL, 'Filipino', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '', NULL, NULL, NULL, NULL, 'resident', NULL, NULL, NULL, NULL, NULL),
(77, 'pending', NULL, 'buyer@gmail.com', 'cce5101d28fc68509470d27b56b19dcb', 'reyes', 'althea', 'canoy', 12, 'Male', 'Single', '1123', 'davao', 'Biclatan', 'General Trias', NULL, '09913737050', '2011-10-11', 'davao', NULL, NULL, 'Filipino', '', 'No', 'No', 'No', 'Yes', 'No', 'Yes', 'No', 'No', 'No', '', '', NULL, NULL, NULL, NULL, 'resident', NULL, NULL, NULL, NULL, NULL),
(78, 'approved', NULL, 'mdnclifford@gmail.com', '714ef4ed3a07cf327f38642f82d975a4', 'Medina', 'Jan Clifford', 'Calad', 32, 'Male', 'Single', '24', 'Purok 2 Laurel', 'Calaocan', 'Santiago City', NULL, '09196658131', '1992-02-14', 'Santiago City', NULL, NULL, 'Filipino', '', 'No', 'No', 'No', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'No', '', 'No', NULL, NULL, NULL, NULL, 'resident', NULL, NULL, NULL, NULL, NULL),
(79, 'approved', NULL, 'manilyn@gmail.com', '95eec177371233139084c2c237aee55e', 'DelaCruz', 'Manilyn', 'Bernardo', 37, 'Female', 'Married', '24', 'Purok 2 Laurel', 'Calaocan', 'Santiago City', NULL, '09196658131', '1987-08-23', 'Santiago City', NULL, NULL, 'Filipino', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', 'Yes', NULL, NULL, NULL, NULL, 'resident', NULL, NULL, NULL, NULL, NULL),
(80, 'pending', NULL, 'cevyqeliv@mailinator.com', 'b173700de6cd24b4504b3454deeebcd5', 'aaa', 'aaa', 'aaa', 32, 'Male', 'Single', 'z0', 'Possimus in pariatu', 'Calaocan', 'Santiago City', NULL, '93233323333', '1992-10-22', 'Exercitationem volup', NULL, NULL, 'Filipino', NULL, 'No', 'No', 'No', 'Yes', 'No', 'Yes', 'No', 'No', 'No', NULL, 'Yes', NULL, NULL, NULL, NULL, 'resident', 'IBANAG', NULL, NULL, NULL, NULL),
(81, 'pending', NULL, 'zuzam@mailinator.com', 'b173700de6cd24b4504b3454deeebcd5', 'aa', 'aa', 'aa', 17, 'Female', 'Married', 'z0', 'Qui mollit numquam d', 'Calaocan', 'Santiago City', NULL, '93233323333', '2007-03-03', 'Saepe rerum dolorum ', NULL, NULL, 'French', NULL, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, NULL, NULL, NULL, 'resident', 'YOGAD', 'No', NULL, NULL, NULL),
(82, 'pending', NULL, 'cacohecu@mailinator.com', 'b173700de6cd24b4504b3454deeebcd5', 'aaaa', 'aaaa', 'aaaa', 21, 'Male', 'Widowed', 'z0', 'Omnis aliquid quisqu', 'Calaocan', 'Santiago City', NULL, '93233323333', '2003-05-07', 'Libero et aut fuga ', NULL, NULL, 'British', NULL, 'No', 'No', 'No', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', NULL, 'No', NULL, NULL, NULL, NULL, 'resident', 'ITAWIS', 'No', 'No', NULL, NULL),
(83, 'pending', NULL, 'darn@gmail.com', '03a006d5f872e1cab834afbe2783a6ed', 'Acuna', 'Darren', '', 23, 'Male', 'Single', '23', 'skldjflj', 'Calaocan', 'Santiago City', NULL, '09611917651', '2001-09-19', 'sdfaf', NULL, NULL, 'Filipino', NULL, 'No', 'No', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes', NULL, 'No', NULL, NULL, NULL, NULL, 'resident', 'YOGAD', 'Yes', 'No', NULL, NULL),
(84, 'pending', NULL, 'dar@gmail.com', '03a006d5f872e1cab834afbe2783a6ed', 'Auasdfasf', 'asfasdf', 'asdfasfa', 23, 'Male', 'Single', '12', 'asfasdf', 'Calaocan', 'Santiago City', NULL, '09711918761', '2001-12-09', 'asdfasfas', NULL, NULL, 'Filipino', NULL, 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'No', 'No', 'No', NULL, 'No', NULL, NULL, NULL, NULL, 'resident', 'N/A', 'No', 'No', NULL, NULL),
(85, 'pending', NULL, 'darren@gmail.com', 'c626181119eed6ca7e1b7d499a0353e9', 'adfas', 'fadfs', 'adfsasdf', 23, 'Male', 'Single', '12', 'asdfasf', 'Calaocan', 'Santiago City', NULL, '09611917651', '2001-11-06', 'asfasdf', NULL, NULL, 'Filipino', NULL, 'No', 'No', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, 'Yes', NULL, NULL, NULL, NULL, 'resident', 'N/A', 'Yes', 'Yes', NULL, NULL),
(86, 'pending', NULL, 'darren@gmail.com', '2d594a6caec93845aeff0cc0a6133475', 'adfas', 'fadfs', 'adfsasdf', 0, 'Male', 'Single', '12', 'asdfasf', 'Calaocan', 'Santiago City', NULL, '09611917651', '2001-11-06', 'asfasdf', NULL, NULL, 'Filipino', NULL, 'No', 'No', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, 'Yes', NULL, NULL, NULL, NULL, 'resident', 'N/A', 'Yes', 'Yes', NULL, NULL),
(87, 'pending', NULL, 'dar@gmail.com', 'de0c9eca97d7685621fd59d856458415', 'asfkahf', 'kjhkjasdhf', 'kjhaskjfhkj', 23, 'Male', 'Married', '21', 'xs', 'Calaocan', 'Santiago City', NULL, '09611976151', '2001-12-09', 'sdf', NULL, NULL, 'Filipino', NULL, 'No', 'No', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, 'Yes', NULL, NULL, NULL, NULL, 'resident', 'YOGAD', 'Yes', 'Yes', NULL, NULL),
(88, 'approved', NULL, 'allen@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Mendoza', 'Jonh Allen', 'Gutierrez', 22, 'Male', 'Single', 'qw', 'Zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', '2002-10-13', 'Calumpang, SMB', NULL, NULL, 'Filipino', NULL, 'No', 'No', 'No', 'Yes', 'No', 'Yes', 'No', 'No', 'No', NULL, 'No', NULL, NULL, NULL, NULL, 'resident', 'N/A', 'No', 'No', NULL, NULL),
(89, 'pending', NULL, 'allen123@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'mendoza', 'allen', 'gutierrez', 22, 'Male', 'Single', 'Qw', 'Zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', '2002-10-13', 'Calumpang, SMB', NULL, NULL, 'Filipino', NULL, 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, NULL, NULL, NULL, 'resident', 'N/A', 'No', 'No', NULL, NULL),
(90, 'pending', NULL, 'allen1@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'mendoza', 'allen', 'gu', 1, 'Male', 'Single', 'qw', 'zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', '2023-11-30', 'calumpang, smb', NULL, NULL, 'Filipino', NULL, 'Yes', 'middlename', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, NULL, NULL, NULL, 'resident', 'N/A', 'No', 'No', NULL, NULL),
(91, 'pending', NULL, 'allen321@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'mendoza', 'allen', 'gut', 3, 'Male', 'Single', 'as', 'Zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', '2021-11-26', 'calumpang, smb', NULL, NULL, 'Filipino', NULL, 'Yes', 'Middlename', 'No', 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, NULL, NULL, NULL, 'resident', 'N/A', 'No', 'No', NULL, NULL),
(92, 'pending', NULL, 'akken@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'mendoza', 'allen', 'gut', 0, 'Male', 'Single', 'AZ', 'zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', '2025-03-26', 'calumpang, smb', NULL, NULL, 'Filipino', NULL, 'Yes', 'firstname', 'No', 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, NULL, NULL, NULL, 'resident', 'GADDANG', 'No', 'No', NULL, NULL),
(93, 'pending', NULL, 'allennn@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'mendoza', 'allen', 'gut', 3, 'Male', 'Single', 'az', 'zone 3', 'Calaocan', 'Santiago City', NULL, '09677895361', '2021-11-26', 'calumpang city', NULL, NULL, 'Filipino', NULL, 'Yes', 'middlename', '2222-2222-2222-2222', 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, NULL, NULL, NULL, 'resident', 'IBANAG', 'No', 'No', NULL, NULL),
(94, 'pending', NULL, 'aaa@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Villegas', 'asaasa', 'sasasa', 4, 'Male', 'Single', 'qw', 'zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', '2021-01-28', 'sitio madlum', 'wqqwq', 'wqwqwqw', 'Filipino', NULL, 'No', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', NULL, 'No', 'hippo', 'hemp', 'transfarmers', NULL, 'resident', 'N/A', 'No', 'No', NULL, NULL),
(95, 'pending', NULL, 'asasa@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'wqqwqwq', 'wqqwqwq', 'wqwqwq', 0, 'Male', 'Single', 'qw', 'zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', '2025-03-28', 'sitio madlum', 'wwqwqwq', 'wqwwqww', 'Filipino', NULL, 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', 'No', 'No', 'No', NULL, 'resident', 'N/A', 'No', 'No', NULL, NULL),
(96, 'pending', NULL, 'sasasa@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'wqwwqwq', 'qwwqqw', 'wqwqqw', 0, 'Male', 'Single', 'qw', 'zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', '2025-03-28', 'wqwqwqwq', 'qwqwqwq', 'qqwqwq', 'Filipino', NULL, 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', 'hippopotamus', 'hemp', 'transfarmers', NULL, 'resident', 'N/A', 'No', 'No', NULL, NULL),
(97, 'pending', NULL, 'alle12345@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Mendoza', 'allen', 'gut', 22, 'Male', 'Single', 'qw', 'qwqwqq', 'Calaocan', 'Santiago City', NULL, '09566795361', '2002-10-13', 'sitio madlum', 'qwqwqwq', 'wqwqwq', 'Filipino', NULL, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', 'No', 'No', 'No', NULL, 'resident', 'N/A', 'No', 'No', NULL, NULL),
(98, 'pending', NULL, 'alle12345@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Mendoza', 'allen', 'gut', 22, 'Male', 'Single', 'qw', 'qwqwqq', 'Calaocan', 'Santiago City', NULL, '09566795361', '2002-10-13', 'sitio madlum', 'qwqwqwq', 'wqwqwq', 'Filipino', NULL, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', 'No', 'No', 'No', NULL, 'resident', 'N/A', 'No', 'No', NULL, NULL),
(99, 'pending', NULL, 'allenwqqwq@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'qqwqwq', 'wqwqq', 'wqqw', 0, 'Male', 'Single', 'qw', 'zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', '2025-03-28', 'sitio durumugan', 'qqwqq', 'wqqwq', 'Filipino', NULL, 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', 'No', 'No', 'No', NULL, 'resident', 'N/A', 'No', 'No', NULL, NULL),
(100, 'approved', NULL, 'allen1234@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'mendoza', 'allen', 'guttierez', 22, 'Male', 'Single', 'qq', 'zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', '2002-10-13', 'assas', 'qqwqwqw', 'qwwqwq', 'Filipino', NULL, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', 'No', 'No', 'No', NULL, 'resident', 'N/A', 'No', 'No', NULL, '1'),
(101, 'approved', NULL, 'allenwqww@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'mendoza', 'qwqw', 'qwwq', 22, 'Male', 'Single', 'qw', 'zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', '2002-11-24', 'sitio madlum', 'qwqwqw', 'qwwqwqwq', 'Filipino', NULL, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', 'No', 'No', 'No', NULL, 'resident', 'N/A', 'No', 'No', 'No', NULL),
(102, 'approved', NULL, 'allenmendoza@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Mendoza', 'Jonh Allen', 'Gutierrez', 22, 'Male', 'Single', 'as', 'Zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', '2002-10-13', 'calumpang city', 'N/A', 'Student', 'Filipino', NULL, 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', NULL, 'No', 'No', 'No', 'Yes', NULL, 'resident', 'GADDANG', 'No', 'No', 'Yes', '1'),
(103, 'approved', NULL, 'allen123456@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'mendoza', 'allen', 'gutierrez', 22, 'Male', 'Single', 'qw', 'zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', '2002-10-13', 'calumpang city', 'N/A', 'Student', 'Filipino', NULL, 'Yes', 'middlename', '2222-1111-2222-1111', 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', 'Dog', 'Mango', 'Yes', NULL, 'resident', 'ITAWIS', 'No', 'No', 'No', NULL),
(104, 'approved', NULL, 'jonhallenmendoza567@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'mendoza', 'allen', 'gutierrez', 0, 'Male', 'Single', 'qw', 'zone 3', 'Calaocan', 'Santiago City', NULL, '09566795361', '2025-03-29', 'calumpang city', 'N/A', 'Student', 'Filipino', NULL, 'Yes', 'middlename', '2222-4444-5555-2222', 'Yes', 'No', 'No', 'No', 'No', 'No', NULL, 'No', 'hippopotamus', 'Mango', 'Horticulture', 'Tomato', 'resident', 'IFUGAO', 'No', 'No', 'No', '1'),
(105, 'pending', NULL, 'mendoza@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'mendoza', 'wqq', 'wqqw', 0, 'Male', 'Single', 'ww', 'zone 1', 'Calaocan', 'Santiago City', NULL, '09566795361', '2025-03-29', 'calumpang city', 'N/A', 'Student', 'Filipino', NULL, 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', 'No', 'No', 'No', 'No', 'resident', 'IFUGAO', 'No', 'No', 'No', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id_services` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `fees` decimal(10,2) NOT NULL,
  `requires` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `image_service` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id_services`, `title`, `description`, `fees`, `requires`, `status`, `image_service`) VALUES
(1, 'BARANGAY CLEARANCE', '', 35.00, 'CEDULA', 'Active', 'uploads/clearance.png'),
(4, 'CERTIFICATE OF RESIDENCY', '', 35.00, 'CEDULA & BRGY CLEARANCE', 'Active', 'uploads/residency.png'),
(5, 'CERTIFICATE OF INDIGENCY', '', 35.00, 'CEDULA', 'Active', 'uploads/indigency.png'),
(6, 'BUSINESS CLEARANCE', '', 35.00, 'CEDULA', 'Active', 'uploads/busper.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_travelpermit`
--

CREATE TABLE `tbl_travelpermit` (
  `id_travel` int(11) NOT NULL,
  `id_resident` int(11) NOT NULL,
  `prev_owner` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `brgy` varchar(50) NOT NULL,
  `municipal` varchar(50) NOT NULL,
  `buyers_name` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_travelpermit`
--

INSERT INTO `tbl_travelpermit` (`id_travel`, `id_resident`, `prev_owner`, `breed`, `gender`, `color`, `destination`, `date`, `brgy`, `municipal`, `buyers_name`, `purpose`) VALUES
(2, 44, 'Reyes Hannah Joy', 'Sheep', 'Female', 'Spotted', 'Farm', '2024-03-25', 'Yuson', 'Guimba', 'Charmaine Joyce Coloma', 'Breeding');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `addedby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `email`, `password`, `lname`, `fname`, `mi`, `age`, `sex`, `address`, `contact`, `position`, `role`, `addedby`) VALUES
(11, 'obena@gmail.com', 'melinda12345', 'Obena', 'Katrina', 'T', 24, 'Female', 'San Miguel, Guimba', '09564123321', 'Barangay Secretary', 'user', 'Rafael Tosper'),
(12, 'mangalino@gmail.com', 'earl12345', 'Mangalino', 'Jayvee', 'Tayong', 28, 'Male', 'Pasong Inchik, Guimba', '09785631125', 'Barangay Treasurer', 'user', 'Rafael Tosper'),
(13, 'marian@gmail.com', 'adminMarian@', 'Simon', 'Marian', 'Cabiso', 24, 'Female', '1234, Purok 5, Cavite, Guimba', '09876543211', 'Kagawad', 'user', 'Tosper, Rafael Jr.');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_family5C5C0`
--

CREATE TABLE `tmp_add_family5C5C0` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_family8D92E`
--

CREATE TABLE `tmp_add_family8D92E` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_add_family8D92E`
--

INSERT INTO `tmp_add_family8D92E` (`id`, `family_lastname`, `family_firstname`, `family_middleinitial`, `relationshipid`, `family_age`, `familycivilid`, `occupation`, `income`) VALUES
(1, 'mendoza', 'wqwqq', 'w', 'Mother', '12', 'Married', 'sasaas', '21221');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_family9C7A2`
--

CREATE TABLE `tmp_add_family9C7A2` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_add_family9C7A2`
--

INSERT INTO `tmp_add_family9C7A2` (`id`, `family_lastname`, `family_firstname`, `family_middleinitial`, `relationshipid`, `family_age`, `familycivilid`, `occupation`, `income`) VALUES
(1, 'mendoza', 'qwqw', 'q', 'Father', '22', 'Single', 'sassa', '21212'),
(2, 'qwqqwq', 'wqwwqw', 'wq', 'Brother', '22', 'Married', 'wqqwq', '');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_family9E351`
--

CREATE TABLE `tmp_add_family9E351` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_add_family9E351`
--

INSERT INTO `tmp_add_family9E351` (`id`, `family_lastname`, `family_firstname`, `family_middleinitial`, `relationshipid`, `family_age`, `familycivilid`, `occupation`, `income`) VALUES
(1, 'mendoza', 'sasa', 'f', 'Mother', '33', 'Married', 'N/A', '12000');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_family9EEE9`
--

CREATE TABLE `tmp_add_family9EEE9` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_family16C98`
--

CREATE TABLE `tmp_add_family16C98` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_family22CC4`
--

CREATE TABLE `tmp_add_family22CC4` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_family34AA2`
--

CREATE TABLE `tmp_add_family34AA2` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_family49ED9`
--

CREATE TABLE `tmp_add_family49ED9` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_family872AE`
--

CREATE TABLE `tmp_add_family872AE` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_family915BE`
--

CREATE TABLE `tmp_add_family915BE` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_family34472`
--

CREATE TABLE `tmp_add_family34472` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_family53463`
--

CREATE TABLE `tmp_add_family53463` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_family64534`
--

CREATE TABLE `tmp_add_family64534` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_add_family64534`
--

INSERT INTO `tmp_add_family64534` (`id`, `family_lastname`, `family_firstname`, `family_middleinitial`, `relationshipid`, `family_age`, `familycivilid`, `occupation`, `income`) VALUES
(1, 'wqwqqw', 'wqwq', 'wqwqwq', 'Mother', '12', 'Single', 'qwwqw', '1212212');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_family95405`
--

CREATE TABLE `tmp_add_family95405` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_familyA0C52`
--

CREATE TABLE `tmp_add_familyA0C52` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_familyA3121`
--

CREATE TABLE `tmp_add_familyA3121` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_familyB2B71`
--

CREATE TABLE `tmp_add_familyB2B71` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_add_familyB2B71`
--

INSERT INTO `tmp_add_familyB2B71` (`id`, `family_lastname`, `family_firstname`, `family_middleinitial`, `relationshipid`, `family_age`, `familycivilid`, `occupation`, `income`) VALUES
(1, 'Mendoza', 'wqqw', 'w', 'Father', '22', 'Married', 'wqqw', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_familyB613B`
--

CREATE TABLE `tmp_add_familyB613B` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_familyBAB1D`
--

CREATE TABLE `tmp_add_familyBAB1D` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_familyC305D`
--

CREATE TABLE `tmp_add_familyC305D` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_familyD0395`
--

CREATE TABLE `tmp_add_familyD0395` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_familyD15B2`
--

CREATE TABLE `tmp_add_familyD15B2` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_familyDC646`
--

CREATE TABLE `tmp_add_familyDC646` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_familyE47A2`
--

CREATE TABLE `tmp_add_familyE47A2` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_add_familyE5305`
--

CREATE TABLE `tmp_add_familyE5305` (
  `id` int(11) NOT NULL,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure for view `masked_users`
--
DROP TABLE IF EXISTS `masked_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u680385054_bmis`@`127.0.0.1` SQL SECURITY DEFINER VIEW `masked_users`  AS SELECT 1 AS `id_user`, 1 AS `masked_email`, 1 AS `masked_password`, 1 AS `masked_lname`, 1 AS `masked_fname`, 1 AS `masked_address`, 1 AS `masked_position` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id_approval`);

--
-- Indexes for table `brgy_info`
--
ALTER TABLE `brgy_info`
  ADD PRIMARY KEY (`id_brgy_info`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id_position`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id_system`);

--
-- Indexes for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  ADD PRIMARY KEY (`id_activity`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`id_announcement`);

--
-- Indexes for table `tbl_blotter`
--
ALTER TABLE `tbl_blotter`
  ADD PRIMARY KEY (`id_blotter`);

--
-- Indexes for table `tbl_bspermit`
--
ALTER TABLE `tbl_bspermit`
  ADD PRIMARY KEY (`id_bspermit`);

--
-- Indexes for table `tbl_clearance`
--
ALTER TABLE `tbl_clearance`
  ADD PRIMARY KEY (`id_clearance`);

--
-- Indexes for table `tbl_family_member`
--
ALTER TABLE `tbl_family_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_indigency`
--
ALTER TABLE `tbl_indigency`
  ADD PRIMARY KEY (`id_indigency`);

--
-- Indexes for table `tbl_officials`
--
ALTER TABLE `tbl_officials`
  ADD PRIMARY KEY (`id_official`);

--
-- Indexes for table `tbl_rescert`
--
ALTER TABLE `tbl_rescert`
  ADD PRIMARY KEY (`id_rescert`);

--
-- Indexes for table `tbl_resident`
--
ALTER TABLE `tbl_resident`
  ADD PRIMARY KEY (`id_resident`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id_services`);

--
-- Indexes for table `tbl_travelpermit`
--
ALTER TABLE `tbl_travelpermit`
  ADD PRIMARY KEY (`id_travel`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tmp_add_family5C5C0`
--
ALTER TABLE `tmp_add_family5C5C0`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_family8D92E`
--
ALTER TABLE `tmp_add_family8D92E`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_family9C7A2`
--
ALTER TABLE `tmp_add_family9C7A2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_family9E351`
--
ALTER TABLE `tmp_add_family9E351`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_family9EEE9`
--
ALTER TABLE `tmp_add_family9EEE9`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_family16C98`
--
ALTER TABLE `tmp_add_family16C98`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_family22CC4`
--
ALTER TABLE `tmp_add_family22CC4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_family34AA2`
--
ALTER TABLE `tmp_add_family34AA2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_family49ED9`
--
ALTER TABLE `tmp_add_family49ED9`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_family872AE`
--
ALTER TABLE `tmp_add_family872AE`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_family915BE`
--
ALTER TABLE `tmp_add_family915BE`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_family34472`
--
ALTER TABLE `tmp_add_family34472`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_family53463`
--
ALTER TABLE `tmp_add_family53463`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_family64534`
--
ALTER TABLE `tmp_add_family64534`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_family95405`
--
ALTER TABLE `tmp_add_family95405`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_familyA0C52`
--
ALTER TABLE `tmp_add_familyA0C52`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_familyA3121`
--
ALTER TABLE `tmp_add_familyA3121`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_familyB2B71`
--
ALTER TABLE `tmp_add_familyB2B71`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_familyB613B`
--
ALTER TABLE `tmp_add_familyB613B`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_familyBAB1D`
--
ALTER TABLE `tmp_add_familyBAB1D`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_familyC305D`
--
ALTER TABLE `tmp_add_familyC305D`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_familyD0395`
--
ALTER TABLE `tmp_add_familyD0395`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_familyD15B2`
--
ALTER TABLE `tmp_add_familyD15B2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_familyDC646`
--
ALTER TABLE `tmp_add_familyDC646`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_familyE47A2`
--
ALTER TABLE `tmp_add_familyE47A2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_add_familyE5305`
--
ALTER TABLE `tmp_add_familyE5305`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `id_approval` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brgy_info`
--
ALTER TABLE `brgy_info`
  MODIFY `id_brgy_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id_position` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id_system` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `id_announcement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_blotter`
--
ALTER TABLE `tbl_blotter`
  MODIFY `id_blotter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_bspermit`
--
ALTER TABLE `tbl_bspermit`
  MODIFY `id_bspermit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_clearance`
--
ALTER TABLE `tbl_clearance`
  MODIFY `id_clearance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_family_member`
--
ALTER TABLE `tbl_family_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_indigency`
--
ALTER TABLE `tbl_indigency`
  MODIFY `id_indigency` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_officials`
--
ALTER TABLE `tbl_officials`
  MODIFY `id_official` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_rescert`
--
ALTER TABLE `tbl_rescert`
  MODIFY `id_rescert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111138;

--
-- AUTO_INCREMENT for table `tbl_resident`
--
ALTER TABLE `tbl_resident`
  MODIFY `id_resident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id_services` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_travelpermit`
--
ALTER TABLE `tbl_travelpermit`
  MODIFY `id_travel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tmp_add_family5C5C0`
--
ALTER TABLE `tmp_add_family5C5C0`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_family8D92E`
--
ALTER TABLE `tmp_add_family8D92E`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tmp_add_family9C7A2`
--
ALTER TABLE `tmp_add_family9C7A2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tmp_add_family9E351`
--
ALTER TABLE `tmp_add_family9E351`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tmp_add_family9EEE9`
--
ALTER TABLE `tmp_add_family9EEE9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_family16C98`
--
ALTER TABLE `tmp_add_family16C98`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_family22CC4`
--
ALTER TABLE `tmp_add_family22CC4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_family34AA2`
--
ALTER TABLE `tmp_add_family34AA2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tmp_add_family49ED9`
--
ALTER TABLE `tmp_add_family49ED9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_family872AE`
--
ALTER TABLE `tmp_add_family872AE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_family915BE`
--
ALTER TABLE `tmp_add_family915BE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_family34472`
--
ALTER TABLE `tmp_add_family34472`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_family53463`
--
ALTER TABLE `tmp_add_family53463`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_family64534`
--
ALTER TABLE `tmp_add_family64534`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tmp_add_family95405`
--
ALTER TABLE `tmp_add_family95405`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_familyA0C52`
--
ALTER TABLE `tmp_add_familyA0C52`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_familyA3121`
--
ALTER TABLE `tmp_add_familyA3121`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_familyB2B71`
--
ALTER TABLE `tmp_add_familyB2B71`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tmp_add_familyB613B`
--
ALTER TABLE `tmp_add_familyB613B`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_familyBAB1D`
--
ALTER TABLE `tmp_add_familyBAB1D`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_familyC305D`
--
ALTER TABLE `tmp_add_familyC305D`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_familyD0395`
--
ALTER TABLE `tmp_add_familyD0395`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_familyD15B2`
--
ALTER TABLE `tmp_add_familyD15B2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_familyDC646`
--
ALTER TABLE `tmp_add_familyDC646`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_familyE47A2`
--
ALTER TABLE `tmp_add_familyE47A2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_add_familyE5305`
--
ALTER TABLE `tmp_add_familyE5305`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
