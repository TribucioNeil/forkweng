-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2024 at 01:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citypeso`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `activity` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `activityImage` varchar(500) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Hidden'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `date`, `activity`, `description`, `activityImage`, `status`) VALUES
(8, '2024-02-01', 'ytfsa', 'sdfds', '1707466414_a4cbe3ce104ac991976a.jpg', 'Hidden');

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES
(1, 'pesocalapan', 'pesocalapan1234');

-- --------------------------------------------------------

--
-- Table structure for table `barangays`
--

CREATE TABLE `barangays` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employercompanyprofile`
--

CREATE TABLE `employercompanyprofile` (
  `id` int NOT NULL,
  `employerName` varchar(255) NOT NULL,
  `employerId` int NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `workForce` varchar(150) NOT NULL,
  `industry` varchar(150) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `renewalLicense` varchar(255) NOT NULL,
  `jobOrder` varchar(255) NOT NULL,
  `certificationRegistration` varchar(255) NOT NULL,
  `exchangeCommission` varchar(255) NOT NULL,
  `letterIntent` varchar(255) NOT NULL,
  `accreditation` varchar(255) NOT NULL,
  `poea` varchar(255) NOT NULL,
  `profileStatus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Nothing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employercompanyprofile`
--

INSERT INTO `employercompanyprofile` (`id`, `employerName`, `employerId`, `companyName`, `workForce`, `industry`, `address`, `barangay`, `lat`, `lng`, `city`, `province`, `renewalLicense`, `jobOrder`, `certificationRegistration`, `exchangeCommission`, `letterIntent`, `accreditation`, `poea`, `profileStatus`) VALUES
(20, 'John Jefferson Manalo', 19, 'I-TECH', '100-199(MEDIUM)', 'TRANSPORT, STORAGE AND COMMUNICATION', 'Central', 'San Vicente East', '13.409733796320534', '121.18036590980373', 'Calapan City', 'Oriental Mindoro', '1713228738_24eaa145dac8acc866fc.jpg', '1713228738_7c9a75e90583029a187f.png', '1713228738_ecd01a5862129b6ddafd.jpg', '1713228738_7b1fe3f3b9d7b59417af.jpg', '1713228738_99b6376ca2d24ecb886b.png', '1713228738_eba65d619a488807be6d.jpg', '1713228738_27e11c463b059981ba78.jpg', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `employerjobpost`
--

CREATE TABLE `employerjobpost` (
  `id` int NOT NULL,
  `employerId` int NOT NULL,
  `jobTitle` varchar(500) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `workLocation` varchar(255) NOT NULL,
  `educBackground` varchar(100) NOT NULL,
  `jobOption` varchar(100) NOT NULL,
  `salary` double NOT NULL,
  `jobDescription` varchar(2000) NOT NULL,
  `jobQualification` varchar(2000) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `vaccination` varchar(255) NOT NULL,
  `sss` varchar(255) NOT NULL,
  `pagibig` varchar(255) NOT NULL,
  `philhealth` varchar(255) NOT NULL,
  `tin` varchar(255) NOT NULL,
  `otherrequirement` varchar(255) NOT NULL,
  `otherrequirements` varchar(500) NOT NULL,
  `postedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `job_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'posted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employerjobpost`
--

INSERT INTO `employerjobpost` (`id`, `employerId`, `jobTitle`, `barangay`, `city`, `province`, `lat`, `lng`, `workLocation`, `educBackground`, `jobOption`, `salary`, `jobDescription`, `jobQualification`, `remarks`, `vaccination`, `sss`, `pagibig`, `philhealth`, `tin`, `otherrequirement`, `otherrequirements`, `postedDate`, `job_status`) VALUES
(50, 19, 'It Manager', 'San Vicente East', 'Calapan City', 'Oriental Mindoro', '13.409733796320534', '121.18036590980373', '', 'College Graduate', 'Fulltime', 100000, 'Responsible for maintaining all systems on-site and remotely. They work closely with and train Systems & Database Administrators', 'A minimum of 3 years of experience in IT management.', 'NA', 'no', 'no', 'no', 'no', 'no', 'yes', 'Birth Certificate, TOR', '2024-04-16 08:56:09', 'posted'),
(51, 19, 'Web Developer', 'San Vicente East', 'Calapan City', 'Oriental Mindoro', '13.409733796320534', '121.18036590980373', '', 'Bachelors Degree Holder', 'Fulltime', 150000, 'Responsible for creating a website', 'A minimum of 3 years of experience in creating a website', 'Can start asap', 'no', 'no', 'no', 'yes', 'yes', 'no', '', '2024-04-16 09:00:15', 'posted');

-- --------------------------------------------------------

--
-- Table structure for table `employerlogin`
--

CREATE TABLE `employerlogin` (
  `id` int NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `activationStatus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Pending',
  `activationKey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employerlogin`
--

INSERT INTO `employerlogin` (`id`, `fullName`, `emailAddress`, `password`, `activationStatus`, `activationKey`) VALUES
(19, 'John Jefferson Manalo', 'jitromanalo@gmail.com', '$2y$10$EeezcYYnwsOh6citWRbh.OFUkj030vUY7Jo1kvPKfMjg8v2k18JTO', 'Approved', 'b57dcb399c54ae23378d9b5beef0ad173f9fd97163101409406daa5a23429b0ef5ab918f7dcfcb5b07d91be446f2d2b39449');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Posted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `type`, `status`) VALUES
(1, 'jkdsjkd', 'ndsjdks', 'jobseeker', 'Posted'),
(2, 'ghgh', 'hghgh', 'employer', 'Posted'),
(3, 'jkkj', 'lll', 'jobseeker', 'Posted'),
(4, 'jkjkjk', 'hello', 'employer', 'Posted'),
(5, 'sds', 'dsdsds', 'jobseeker', 'Posted');

-- --------------------------------------------------------

--
-- Table structure for table `jobfair`
--

CREATE TABLE `jobfair` (
  `id` int NOT NULL,
  `schedule` date NOT NULL,
  `site` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Hidden'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobfair`
--

INSERT INTO `jobfair` (`id`, `schedule`, `site`, `description`, `status`) VALUES
(2, '2024-02-15', 'das', 'hjhj', 'Hidden'),
(3, '2024-02-18', 'jkjk', 'jkjkjk', 'Hidden'),
(4, '2024-02-14', 'rerere', 'rerere', 'Hidden');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekerapplydata`
--

CREATE TABLE `jobseekerapplydata` (
  `id` int NOT NULL,
  `jobseekerId` int NOT NULL,
  `jobPostId` int NOT NULL,
  `employerId` int NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `vaccination` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'empty',
  `sss` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'empty',
  `pagibig` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'empty',
  `philhealth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'empty',
  `tin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'empty',
  `otherrequirements` varchar(1000) NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Pending',
  `typeEmployment` varchar(255) NOT NULL,
  `dateApplied` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateUpdated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `location` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobseekerapplydata`
--

INSERT INTO `jobseekerapplydata` (`id`, `jobseekerId`, `jobPostId`, `employerId`, `fullname`, `jobTitle`, `resume`, `vaccination`, `sss`, `pagibig`, `philhealth`, `tin`, `otherrequirements`, `status`, `typeEmployment`, `dateApplied`, `dateUpdated`, `location`, `salary`) VALUES
(21, 36, 50, 19, 'Lemuel Cueto', 'It Manager', '1713228236_0212dbcaf85fcbefafe7.pdf', '', '', '', '', '', '1713229500_274edd653c644de66e2a.jpg,1713229500_821f26965adad27f9c99.jpg', 'Pending', 'Fulltime', '2024-04-16 01:05:00', '2024-04-16 01:05:00', '', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekereducback`
--

CREATE TABLE `jobseekereducback` (
  `id` int NOT NULL,
  `jobseekerId` int NOT NULL,
  `ElementarySchool` varchar(150) NOT NULL,
  `ElementaryYearGrad` varchar(50) NOT NULL,
  `ElementaryLevel` varchar(50) NOT NULL,
  `ElementaryLastAttend` varchar(50) NOT NULL,
  `ElementaryAwards` varchar(500) NOT NULL,
  `SecondarySchool` varchar(150) NOT NULL,
  `SecondaryCourse` varchar(150) NOT NULL,
  `SecondaryYearGrad` varchar(50) NOT NULL,
  `SecondaryLevel` varchar(50) NOT NULL,
  `SecondaryLastAttend` varchar(50) NOT NULL,
  `SecondaryAwards` varchar(500) NOT NULL,
  `TertiarySchool` varchar(150) NOT NULL,
  `TertiaryCourse` varchar(150) NOT NULL,
  `TertiaryYearGrad` varchar(50) NOT NULL,
  `TertiaryLevel` varchar(50) NOT NULL,
  `TertiaryLastAttend` varchar(50) NOT NULL,
  `TertiaryAwards` varchar(500) NOT NULL,
  `GradStudiesSchool` varchar(150) NOT NULL,
  `GradStudiesCourse` varchar(150) NOT NULL,
  `GradStudiesYearGrad` varchar(50) NOT NULL,
  `GradStudiesAward` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobseekereducback`
--

INSERT INTO `jobseekereducback` (`id`, `jobseekerId`, `ElementarySchool`, `ElementaryYearGrad`, `ElementaryLevel`, `ElementaryLastAttend`, `ElementaryAwards`, `SecondarySchool`, `SecondaryCourse`, `SecondaryYearGrad`, `SecondaryLevel`, `SecondaryLastAttend`, `SecondaryAwards`, `TertiarySchool`, `TertiaryCourse`, `TertiaryYearGrad`, `TertiaryLevel`, `TertiaryLastAttend`, `TertiaryAwards`, `GradStudiesSchool`, `GradStudiesCourse`, `GradStudiesYearGrad`, `GradStudiesAward`) VALUES
(14, 36, 'inarawan elementary school', '2012', 'na', 'na', 'na', 'inarawan national high school', 'na', '2019', 'na', 'na', 'na', 'mindoro state university', 'bsit', 'na', '3rd year', 'na', 'na', 'na', 'na', 'na', 'na');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekereligibility`
--

CREATE TABLE `jobseekereligibility` (
  `id` int NOT NULL,
  `jobseekerId` int NOT NULL,
  `EligibilityTitle1` varchar(100) NOT NULL,
  `EligibilityRating1` varchar(50) NOT NULL,
  `EligibilityDate1` varchar(100) NOT NULL,
  `EligibilityTitle2` varchar(100) NOT NULL,
  `EligibilityRating2` varchar(50) NOT NULL,
  `EligibilityDate2` varchar(100) NOT NULL,
  `LicenseTitle1` varchar(100) NOT NULL,
  `LicenseUntil1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `LicenseTitle2` varchar(100) NOT NULL,
  `LicenseUntil2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobseekereligibility`
--

INSERT INTO `jobseekereligibility` (`id`, `jobseekerId`, `EligibilityTitle1`, `EligibilityRating1`, `EligibilityDate1`, `EligibilityTitle2`, `EligibilityRating2`, `EligibilityDate2`, `LicenseTitle1`, `LicenseUntil1`, `LicenseTitle2`, `LicenseUntil2`) VALUES
(14, 36, 'na', 'na', 'na', 'na', 'na', 'na', 'na', '2024-04-16', 'na', '2024-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekerjobpre`
--

CREATE TABLE `jobseekerjobpre` (
  `id` int NOT NULL,
  `jobseekerId` int NOT NULL,
  `PreferredOccu1` varchar(150) NOT NULL,
  `PreferredOccu2` varchar(150) NOT NULL,
  `PreferredOccu3` varchar(150) NOT NULL,
  `PreferredOccu4` varchar(150) NOT NULL,
  `PreferredLocation` varchar(255) NOT NULL,
  `PreferredLocCity1` varchar(150) NOT NULL,
  `PreferredLocCity2` varchar(150) NOT NULL,
  `PreferredLocCity3` varchar(150) NOT NULL,
  `PreferredLocOverseas1` varchar(150) NOT NULL,
  `PreferredLocOverseas2` varchar(150) NOT NULL,
  `PreferredLocOverseas3` varchar(150) NOT NULL,
  `ExpectedSalaryRange` varchar(100) NOT NULL,
  `PassportNo` varchar(100) NOT NULL,
  `ExpiryDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobseekerjobpre`
--

INSERT INTO `jobseekerjobpre` (`id`, `jobseekerId`, `PreferredOccu1`, `PreferredOccu2`, `PreferredOccu3`, `PreferredOccu4`, `PreferredLocation`, `PreferredLocCity1`, `PreferredLocCity2`, `PreferredLocCity3`, `PreferredLocOverseas1`, `PreferredLocOverseas2`, `PreferredLocOverseas3`, `ExpectedSalaryRange`, `PassportNo`, `ExpiryDate`) VALUES
(17, 36, 'it manager', 'it officer', 'data analyst', 'web developer', '', 'manila', 'makati', 'mandaluyong', 'singapore', 'canada', 'japan', '100000-200000', '1234', '2024-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekerlanguage`
--

CREATE TABLE `jobseekerlanguage` (
  `id` int NOT NULL,
  `jobseekerId` int NOT NULL,
  `EnglishRead` varchar(10) NOT NULL,
  `EnglishWrite` varchar(10) NOT NULL,
  `EnglishSpeak` varchar(10) NOT NULL,
  `EnglishUnderstand` varchar(10) NOT NULL,
  `FilipinoRead` varchar(10) NOT NULL,
  `FilipinoWrite` varchar(10) NOT NULL,
  `FilipinoSpeak` varchar(10) NOT NULL,
  `FilipinoUnderstand` varchar(10) NOT NULL,
  `OthersLanguage` varchar(20) NOT NULL,
  `OthersRead` varchar(10) NOT NULL,
  `OthersWrite` varchar(10) NOT NULL,
  `OthersSpeak` varchar(10) NOT NULL,
  `OthersUnderstand` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobseekerlanguage`
--

INSERT INTO `jobseekerlanguage` (`id`, `jobseekerId`, `EnglishRead`, `EnglishWrite`, `EnglishSpeak`, `EnglishUnderstand`, `FilipinoRead`, `FilipinoWrite`, `FilipinoSpeak`, `FilipinoUnderstand`, `OthersLanguage`, `OthersRead`, `OthersWrite`, `OthersSpeak`, `OthersUnderstand`) VALUES
(14, 36, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekerlogin`
--

CREATE TABLE `jobseekerlogin` (
  `id` int NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `emailAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `activationKey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `activationStatus` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobseekerlogin`
--

INSERT INTO `jobseekerlogin` (`id`, `fullname`, `emailAddress`, `password`, `activationKey`, `activationStatus`) VALUES
(36, 'Lemuel Cueto', 'lemuelcueto21@gmail.com', '$2y$10$9F7erhHNDPdXAMO0z3PKeuQYXqb.yKRibqXkBbusrp69IdvwfMkri', '845c4e9cf76a5e21a101d2e29a502ad5c68df3ad9c519736a26200d4f75000a28f4f98f798419cd929e3a1e3b807b348a5a1', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekerperinfo`
--

CREATE TABLE `jobseekerperinfo` (
  `id` int NOT NULL,
  `jobseekerId` int NOT NULL,
  `SurName` varchar(100) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `Suffix` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `PlaceOfBirth` varchar(255) NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `Religion` varchar(150) NOT NULL,
  `HouseNoOrStreet` varchar(150) NOT NULL,
  `CivilStatus` varchar(20) NOT NULL,
  `Barangay` varchar(200) NOT NULL,
  `MunicipalityOrCity` varchar(100) NOT NULL,
  `Province` varchar(150) NOT NULL,
  `TinNo` varchar(150) NOT NULL,
  `GsisOrSssNo` varchar(150) NOT NULL,
  `PagibigNo` varchar(150) NOT NULL,
  `PhilhealthNo` varchar(150) NOT NULL,
  `Height` varchar(50) NOT NULL,
  `EmailAddress` varchar(200) NOT NULL,
  `LandlineNo` varchar(50) NOT NULL,
  `CellphoneNo` varchar(50) NOT NULL,
  `Disability` varchar(255) NOT NULL,
  `EmploymentStatus` varchar(50) NOT NULL,
  `Type` varchar(150) NOT NULL,
  `TerminatedAbroadSpecify` varchar(255) NOT NULL,
  `ActivelyLooking` varchar(20) NOT NULL,
  `LookingWork` varchar(10) NOT NULL,
  `WillingWork` varchar(10) NOT NULL,
  `IfNo` varchar(100) NOT NULL,
  `Beneficiary` varchar(10) NOT NULL,
  `IfYesHousehold` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobseekerperinfo`
--

INSERT INTO `jobseekerperinfo` (`id`, `jobseekerId`, `SurName`, `FirstName`, `MiddleName`, `Suffix`, `DateOfBirth`, `PlaceOfBirth`, `Sex`, `Religion`, `HouseNoOrStreet`, `CivilStatus`, `Barangay`, `MunicipalityOrCity`, `Province`, `TinNo`, `GsisOrSssNo`, `PagibigNo`, `PhilhealthNo`, `Height`, `EmailAddress`, `LandlineNo`, `CellphoneNo`, `Disability`, `EmploymentStatus`, `Type`, `TerminatedAbroadSpecify`, `ActivelyLooking`, `LookingWork`, `WillingWork`, `IfNo`, `Beneficiary`, `IfYesHousehold`) VALUES
(21, 36, 'cueto', 'john lemuel', 'javier', '', '2001-10-21', 'parang, calapan city', 'male', 'catholic', 'proper', 'Single', 'parang', 'calapan city', 'oriental mindoro', 'none', 'none', 'none', 'none', '5\'9', 'lemuelcueto21@gmail.com', 'none', '09051990305', 'none', 'Unemployed', 'students', '', 'Yes', '10 months', 'Yes', 'none', 'No', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekerresume`
--

CREATE TABLE `jobseekerresume` (
  `id` int NOT NULL,
  `jobseekerId` int NOT NULL,
  `resume` varchar(255) NOT NULL,
  `portfolio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobseekerresume`
--

INSERT INTO `jobseekerresume` (`id`, `jobseekerId`, `resume`, `portfolio`) VALUES
(10, 36, '1713228236_0212dbcaf85fcbefafe7.pdf', '1713228236_d505ece79765ecb00d95.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekerskills`
--

CREATE TABLE `jobseekerskills` (
  `id` int NOT NULL,
  `jobseekerId` int NOT NULL,
  `AutoMechanic` varchar(25) NOT NULL,
  `Beautician` varchar(25) NOT NULL,
  `CarpentryWork` varchar(25) NOT NULL,
  `ComputerLiterate` varchar(25) NOT NULL,
  `DomesticChores` varchar(25) NOT NULL,
  `Driver` varchar(25) NOT NULL,
  `Electrician` varchar(25) NOT NULL,
  `Embroidery` varchar(25) NOT NULL,
  `Gardening` varchar(25) NOT NULL,
  `Masonry` varchar(25) NOT NULL,
  `PainterArtist` varchar(25) NOT NULL,
  `PaintingJobs` varchar(25) NOT NULL,
  `Photography` varchar(25) NOT NULL,
  `Plumbing` varchar(25) NOT NULL,
  `SewingDresses` varchar(25) NOT NULL,
  `Stenography` varchar(25) NOT NULL,
  `Tailoring` varchar(25) NOT NULL,
  `OthersSkill` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobseekerskills`
--

INSERT INTO `jobseekerskills` (`id`, `jobseekerId`, `AutoMechanic`, `Beautician`, `CarpentryWork`, `ComputerLiterate`, `DomesticChores`, `Driver`, `Electrician`, `Embroidery`, `Gardening`, `Masonry`, `PainterArtist`, `PaintingJobs`, `Photography`, `Plumbing`, `SewingDresses`, `Stenography`, `Tailoring`, `OthersSkill`) VALUES
(14, 36, 'Auto Mechanic', '', '', 'Computer Literate', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekertraining`
--

CREATE TABLE `jobseekertraining` (
  `id` int NOT NULL,
  `jobseekerId` int NOT NULL,
  `TrainingTitle1` varchar(150) NOT NULL,
  `TrainingDuration1` varchar(50) NOT NULL,
  `TrainingInstitution1` varchar(150) NOT NULL,
  `TrainingCertificate1` varchar(50) NOT NULL,
  `TrainingTitle2` varchar(150) NOT NULL,
  `TrainingDuration2` varchar(50) NOT NULL,
  `TrainingInstitution2` varchar(150) NOT NULL,
  `TrainingCertificate2` varchar(50) NOT NULL,
  `TrainingTitle3` varchar(150) NOT NULL,
  `TrainingDuration3` varchar(50) NOT NULL,
  `TrainingInstitution3` varchar(150) NOT NULL,
  `TrainingCertificate3` varchar(50) NOT NULL,
  `TrainingDuration1A` varchar(255) NOT NULL,
  `TrainingDuration2A` varchar(255) NOT NULL,
  `TrainingDuration3A` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobseekertraining`
--

INSERT INTO `jobseekertraining` (`id`, `jobseekerId`, `TrainingTitle1`, `TrainingDuration1`, `TrainingInstitution1`, `TrainingCertificate1`, `TrainingTitle2`, `TrainingDuration2`, `TrainingInstitution2`, `TrainingCertificate2`, `TrainingTitle3`, `TrainingDuration3`, `TrainingInstitution3`, `TrainingCertificate3`, `TrainingDuration1A`, `TrainingDuration2A`, `TrainingDuration3A`) VALUES
(14, 36, 'css', '2024-04-01', 'aclc', 'ncii', 'csih', '2024-04-01', 'bcrv', 'certificate', 'java', '2024-04-09', 'bcrv', 'ncii', '2024-04-17', '2024-04-25', '2024-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekerworkexp`
--

CREATE TABLE `jobseekerworkexp` (
  `id` int NOT NULL,
  `jobseekerId` int NOT NULL,
  `CompanyName1` varchar(150) NOT NULL,
  `CompanyAddress1` varchar(100) NOT NULL,
  `CompanyPosition1` varchar(100) NOT NULL,
  `CompanyDates1` varchar(100) NOT NULL,
  `CompanyStatus1` varchar(50) NOT NULL,
  `CompanyName2` varchar(150) NOT NULL,
  `CompanyAddress2` varchar(100) NOT NULL,
  `CompanyPosition2` varchar(100) NOT NULL,
  `CompanyDates2` varchar(100) NOT NULL,
  `CompanyStatus2` varchar(50) NOT NULL,
  `CompanyName3` varchar(150) NOT NULL,
  `CompanyAddress3` varchar(100) NOT NULL,
  `CompanyPosition3` varchar(100) NOT NULL,
  `CompanyDates3` varchar(100) NOT NULL,
  `CompanyStatus3` varchar(50) NOT NULL,
  `CompanyName4` varchar(150) NOT NULL,
  `CompanyAddress4` varchar(100) NOT NULL,
  `CompanyPosition4` varchar(100) NOT NULL,
  `CompanyDates4` varchar(100) NOT NULL,
  `CompanyStatus4` varchar(50) NOT NULL,
  `CompanyName5` varchar(150) NOT NULL,
  `CompanyAddress5` varchar(100) NOT NULL,
  `CompanyPosition5` varchar(100) NOT NULL,
  `CompanyDates5` varchar(100) NOT NULL,
  `CompanyStatus5` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobseekerworkexp`
--

INSERT INTO `jobseekerworkexp` (`id`, `jobseekerId`, `CompanyName1`, `CompanyAddress1`, `CompanyPosition1`, `CompanyDates1`, `CompanyStatus1`, `CompanyName2`, `CompanyAddress2`, `CompanyPosition2`, `CompanyDates2`, `CompanyStatus2`, `CompanyName3`, `CompanyAddress3`, `CompanyPosition3`, `CompanyDates3`, `CompanyStatus3`, `CompanyName4`, `CompanyAddress4`, `CompanyPosition4`, `CompanyDates4`, `CompanyStatus4`, `CompanyName5`, `CompanyAddress5`, `CompanyPosition5`, `CompanyDates5`, `CompanyStatus5`) VALUES
(14, 36, 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'n', 'na', 'na', 'na', 'na', 'na');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `text` text NOT NULL,
  `response` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `text`, `response`) VALUES
(1, 'hi', 'hello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangays`
--
ALTER TABLE `barangays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employercompanyprofile`
--
ALTER TABLE `employercompanyprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employerjobpost`
--
ALTER TABLE `employerjobpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employerlogin`
--
ALTER TABLE `employerlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobfair`
--
ALTER TABLE `jobfair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseekerapplydata`
--
ALTER TABLE `jobseekerapplydata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseekereducback`
--
ALTER TABLE `jobseekereducback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseekereligibility`
--
ALTER TABLE `jobseekereligibility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseekerjobpre`
--
ALTER TABLE `jobseekerjobpre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseekerlanguage`
--
ALTER TABLE `jobseekerlanguage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseekerlogin`
--
ALTER TABLE `jobseekerlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseekerperinfo`
--
ALTER TABLE `jobseekerperinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseekerresume`
--
ALTER TABLE `jobseekerresume`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseekerskills`
--
ALTER TABLE `jobseekerskills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseekertraining`
--
ALTER TABLE `jobseekertraining`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseekerworkexp`
--
ALTER TABLE `jobseekerworkexp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barangays`
--
ALTER TABLE `barangays`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employercompanyprofile`
--
ALTER TABLE `employercompanyprofile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employerjobpost`
--
ALTER TABLE `employerjobpost`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `employerlogin`
--
ALTER TABLE `employerlogin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobfair`
--
ALTER TABLE `jobfair`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobseekerapplydata`
--
ALTER TABLE `jobseekerapplydata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jobseekereducback`
--
ALTER TABLE `jobseekereducback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobseekereligibility`
--
ALTER TABLE `jobseekereligibility`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobseekerjobpre`
--
ALTER TABLE `jobseekerjobpre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jobseekerlanguage`
--
ALTER TABLE `jobseekerlanguage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobseekerlogin`
--
ALTER TABLE `jobseekerlogin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `jobseekerperinfo`
--
ALTER TABLE `jobseekerperinfo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jobseekerresume`
--
ALTER TABLE `jobseekerresume`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobseekerskills`
--
ALTER TABLE `jobseekerskills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobseekertraining`
--
ALTER TABLE `jobseekertraining`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobseekerworkexp`
--
ALTER TABLE `jobseekerworkexp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
