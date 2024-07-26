-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 06:38 PM
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
-- Database: `unima`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Sirname` varchar(30) NOT NULL,
  `Mtitle` varchar(30) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Institution` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `Firstname`, `Sirname`, `Mtitle`, `Phone`, `Institution`, `Password`, `Email`) VALUES
(1, 'Patrick', 'Mvuma', 'Mr', '0999107724', '', '1234554321', 'mvumapatrick@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `alevel`
--

CREATE TABLE `alevel` (
  `id` int(11) NOT NULL,
  `Serial` varchar(300) NOT NULL,
  `Pin` varchar(300) NOT NULL,
  `Course` varchar(300) NOT NULL,
  `Froms` varchar(30) NOT NULL,
  `Tos` varchar(300) NOT NULL,
  `Degree` varchar(300) NOT NULL,
  `Institution` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `Serial` varchar(300) NOT NULL,
  `Pin` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `Serial`, `Pin`) VALUES
(1, '12345678', '12345678'),
(2, '12345', '1234'),
(3, '0000', '0000'),
(4, '1499745711', '376727'),
(5, '33333', '33333'),
(6, '6666', '6666');

-- --------------------------------------------------------

--
-- Table structure for table `applicants2`
--

CREATE TABLE `applicants2` (
  `id` int(11) NOT NULL,
  `Othername` varchar(300) NOT NULL,
  `Surname` varchar(300) NOT NULL,
  `DOB` varchar(300) NOT NULL,
  `Gender` varchar(300) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `PlaceOfbirth` varchar(300) NOT NULL,
  `Hometown` varchar(300) NOT NULL,
  `Country` varchar(300) NOT NULL,
  `State` varchar(300) NOT NULL,
  `Localgvt` varchar(300) NOT NULL,
  `Appresaddress` varchar(300) NOT NULL,
  `Appcoraddress` varchar(300) NOT NULL,
  `Gname` varchar(300) NOT NULL,
  `Gplace` varchar(300) NOT NULL,
  `Ghometown` varchar(300) NOT NULL,
  `Gcountry` varchar(300) NOT NULL,
  `Gstate` varchar(300) NOT NULL,
  `Glocalgvt` varchar(300) NOT NULL,
  `Gaddress` varchar(300) NOT NULL,
  `Gmobile` varchar(300) NOT NULL,
  `Applicantphone` varchar(300) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Serial` varchar(300) NOT NULL,
  `Pin` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicants2`
--

INSERT INTO `applicants2` (`id`, `Othername`, `Surname`, `DOB`, `Gender`, `religion`, `PlaceOfbirth`, `Hometown`, `Country`, `State`, `Localgvt`, `Appresaddress`, `Appcoraddress`, `Gname`, `Gplace`, `Ghometown`, `Gcountry`, `Gstate`, `Glocalgvt`, `Gaddress`, `Gmobile`, `Applicantphone`, `Email`, `Serial`, `Pin`) VALUES
(6, 'efwefewf', 'Balogun', '2024-07-05', 'Male', 'Islam', 'dob', 'hometown', 'Nicaragua', 'none', 'none', 'Digital house no', 'House no', 'name gu', 'dob gu', 'hometown gu', 'Falkland Islands (Malvinas)', 'none', 'none', 'fwefwefwe', '08117084647', 'fwefwefew', 'abdulsamadrrbalogun26@gmail.com', '12345', '1234'),
(7, 'efwefewf', 'Balogun', '2024-07-30', 'Male', 'African Tradition', 'qwdwefdwe', 'wfwefwe', 'Select Country', 'none', 'none', 'fwefew', 'werfwefew', 'wefwefe', 'fwefew', 'wefwe', 'Select Country', 'none', 'none', 'ewfwef', 'ewffew', 'ewfewf', 'ewfewfew', '12345678', '12345678'),
(8, 'efwefewf', 'Balogun', '2024-07-30', 'Male', 'Christianity', 'fwrefwef', 'Abuja', 'Nigeria', 'none', 'none', ', Bida, Niger State.', 'eferfrefer', 'Dev Abdulsamadfre', 'werfwef', 'Abuja', 'Niger', 'none', 'none', ', Bida, Niger State.', '08117084647', '08117084647', 'abdulsamadbalogun26@gmail.com', '0000', '0000'),
(9, 'ABDULMUIZZ', 'JATTOABDULHAM', '2024-07-27', 'Select Option', 'Islam', 'edqdf', 'wefewf', 'Azerbaijan', 'none', 'none', 'wefwef', 'ewfwef', 'wefwef', 'ewfwe', 'efwwefwe', 'Bahrain', 'none', 'none', 'wefwef', 'wefwefew', 'ewfewfwefwe', 'abdulsamadbalogun25@gmail.com', '33333', '33333');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'United States'),
(2, 'United Kingdom'),
(3, 'Afghanistan'),
(4, 'Albania'),
(5, 'Algeria'),
(6, 'American Samoa'),
(7, 'Andorra'),
(8, 'Angola'),
(9, 'Anguilla'),
(10, 'Antarctica'),
(11, 'Antigua and Barbuda'),
(12, 'Argentina'),
(13, 'Armenia'),
(14, 'Aruba'),
(15, 'Australia'),
(16, 'Austria'),
(17, 'Azerbaijan'),
(18, 'Bahamas'),
(19, 'Bahrain'),
(20, 'Bangladesh'),
(21, 'Barbados'),
(22, 'Belarus'),
(23, 'Belgium'),
(24, 'Belize'),
(25, 'Benin'),
(26, 'Bermuda'),
(27, 'Bhutan'),
(28, 'Bolivia'),
(29, 'Bosnia and Herzegovina'),
(30, 'Botswana'),
(31, 'Bouvet Island'),
(32, 'Brazil'),
(33, 'British Indian Ocean Territory'),
(34, 'Brunei Darussalam'),
(35, 'Bulgaria'),
(36, 'Burkina Faso'),
(37, 'Burundi'),
(38, 'Cambodia'),
(39, 'Cameroon'),
(40, 'Canada'),
(41, 'Cape Verde'),
(42, 'Cayman Islands'),
(43, 'Central African Republic'),
(44, 'Chad'),
(45, 'Chile'),
(46, 'China'),
(47, 'Christmas Island'),
(48, 'Cocos (Keeling) Islands'),
(49, 'Colombia'),
(50, 'Comoros'),
(51, 'Congo'),
(52, 'Congo, The Democratic Republic of The'),
(53, 'Cook Islands'),
(54, 'Costa Rica'),
(55, 'Cote D\'ivoire'),
(56, 'Croatia'),
(57, 'Cuba'),
(58, 'Cyprus'),
(59, 'Czech Republic'),
(60, 'Denmark'),
(61, 'Djibouti'),
(62, 'Dominica'),
(63, 'Dominican Republic'),
(64, 'Ecuador'),
(65, 'Egypt'),
(66, 'El Salvador'),
(67, 'Equatorial Guinea'),
(68, 'Eritrea'),
(69, 'Estonia'),
(70, 'Ethiopia'),
(71, 'Falkland Islands (Malvinas)'),
(72, 'Faroe Islands'),
(73, 'Fiji'),
(74, 'Finland'),
(75, 'France'),
(76, 'French Guiana'),
(77, 'French Polynesia'),
(78, 'French Southern Territories'),
(79, 'Gabon'),
(80, 'Gambia'),
(81, 'Georgia'),
(82, 'Germany'),
(83, 'Ghana'),
(84, 'Gibraltar'),
(85, 'Greece'),
(86, 'Greenland'),
(87, 'Grenada'),
(88, 'Guadeloupe'),
(89, 'Guam'),
(90, 'Guatemala'),
(91, 'Guinea'),
(92, 'Guinea-bissau'),
(93, 'Guyana'),
(94, 'Haiti'),
(95, 'Heard Island and Mcdonald Islands'),
(96, 'Holy See (Vatican City State)'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran, Islamic Republic of'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Israel'),
(107, 'Italy'),
(108, 'Jamaica'),
(109, 'Japan'),
(110, 'Jordan'),
(111, 'Kazakhstan'),
(112, 'Kenya'),
(113, 'Kiribati'),
(114, 'Korea, Democratic People\'s Republic of'),
(115, 'Korea, Republic of'),
(116, 'Kuwait'),
(117, 'Kyrgyzstan'),
(118, 'Lao People\'s Democratic Republic'),
(119, 'Latvia'),
(120, 'Lebanon'),
(121, 'Lesotho'),
(122, 'Liberia'),
(123, 'Libyan Arab Jamahiriya'),
(124, 'Liechtenstein'),
(125, 'Lithuania'),
(126, 'Luxembourg'),
(127, 'Macao'),
(128, 'Macedonia, The Former Yugoslav Republic of'),
(129, 'Madagascar'),
(130, 'Malawi'),
(131, 'Malaysia'),
(132, 'Maldives'),
(133, 'Mali'),
(134, 'Malta'),
(135, 'Marshall Islands'),
(136, 'Martinique'),
(137, 'Mauritania'),
(138, 'Mauritius'),
(139, 'Mayotte'),
(140, 'Mexico'),
(141, 'Micronesia, Federated States of'),
(142, 'Moldova, Republic of'),
(143, 'Monaco'),
(144, 'Mongolia'),
(145, 'Montserrat'),
(146, 'Morocco'),
(147, 'Mozambique'),
(148, 'Myanmar'),
(149, 'Namibia'),
(150, 'Nauru'),
(151, 'Nepal'),
(152, 'Netherlands'),
(153, 'Netherlands Antilles'),
(154, 'New Caledonia'),
(155, 'New Zealand'),
(156, 'Nicaragua'),
(157, 'Niger'),
(158, 'Nigeria'),
(159, 'Niue'),
(160, 'Norfolk Island'),
(161, 'Northern Mariana Islands'),
(162, 'Norway'),
(163, 'Oman'),
(164, 'Pakistan'),
(165, 'Palau'),
(166, 'Palestinian Territory, Occupied'),
(167, 'Panama'),
(168, 'Papua New Guinea'),
(169, 'Paraguay'),
(170, 'Peru'),
(171, 'Philippines'),
(172, 'Pitcairn'),
(173, 'Poland'),
(174, 'Portugal'),
(175, 'Puerto Rico'),
(176, 'Qatar'),
(177, 'Reunion'),
(178, 'Romania'),
(179, 'Russian Federation'),
(180, 'Rwanda'),
(181, 'Saint Helena'),
(182, 'Saint Kitts and Nevis'),
(183, 'Saint Lucia'),
(184, 'Saint Pierre and Miquelon'),
(185, 'Saint Vincent and The Grenadines'),
(186, 'Samoa'),
(187, 'San Marino'),
(188, 'Sao Tome and Principe'),
(189, 'Saudi Arabia'),
(190, 'Senegal'),
(191, 'Serbia and Montenegro'),
(192, 'Seychelles'),
(193, 'Sierra Leone'),
(194, 'Singapore'),
(195, 'Slovakia'),
(196, 'Slovenia'),
(197, 'Solomon Islands'),
(198, 'Somalia'),
(199, 'South Africa'),
(200, 'South Georgia and The South Sandwich Islands'),
(201, 'Spain'),
(202, 'Sri Lanka'),
(203, 'Sudan'),
(204, 'Suriname'),
(205, 'Svalbard and Jan Mayen'),
(206, 'Swaziland'),
(207, 'Sweden'),
(208, 'Switzerland'),
(209, 'Syrian Arab Republic'),
(210, 'Taiwan, Province of China'),
(211, 'Tajikistan'),
(212, 'Tanzania, United Republic of'),
(213, 'Thailand'),
(214, 'Timor-leste'),
(215, 'Togo'),
(216, 'Tokelau'),
(217, 'Tonga'),
(218, 'Trinidad and Tobago'),
(219, 'Tunisia'),
(220, 'Turkey'),
(221, 'Turkmenistan'),
(222, 'Turks and Caicos Islands'),
(223, 'Tuvalu'),
(224, 'Uganda'),
(225, 'Ukraine'),
(226, 'United Arab Emirates'),
(227, 'United Kingdom'),
(228, 'United States'),
(229, 'United States Minor Outlying Islands'),
(230, 'Uruguay'),
(231, 'Uzbekistan'),
(232, 'Vanuatu'),
(233, 'Venezuela'),
(234, 'Viet Nam'),
(235, 'Virgin Islands, British'),
(236, 'Virgin Islands, U.S.'),
(237, 'Wallis and Futuna'),
(238, 'Western Sahara'),
(239, 'Yemen'),
(240, 'Zambia'),
(241, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `courseapplied`
--

CREATE TABLE `courseapplied` (
  `id` int(11) NOT NULL,
  `Serial` varchar(300) NOT NULL,
  `Pin` varchar(300) NOT NULL,
  `Choice1` varchar(1000) NOT NULL,
  `Choice2` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courseapplied`
--

INSERT INTO `courseapplied` (`id`, `Serial`, `Pin`, `Choice1`, `Choice2`) VALUES
(3, '12345678', '12345678', 'Midwifery', 'Midwifery'),
(4, '0000', '0000', 'Midwifery', 'Nursing'),
(5, '33333', '33333', 'Midwifery', 'Midwifery');

-- --------------------------------------------------------

--
-- Table structure for table `declared`
--

CREATE TABLE `declared` (
  `id` int(11) NOT NULL,
  `Serial` varchar(300) NOT NULL,
  `Pin` varchar(300) NOT NULL,
  `Status` varchar(300) NOT NULL,
  `Applno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `declared`
--

INSERT INTO `declared` (`id`, `Serial`, `Pin`, `Status`, `Applno`) VALUES
(6, '0000', '0000', 'Yes', 'NRS/24/0155'),
(17, '33333', '33333', 'Yes', 'NRS/24/1156');

-- --------------------------------------------------------

--
-- Table structure for table `email_verification`
--

CREATE TABLE `email_verification` (
  `id` int(11) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(32) NOT NULL,
  `token_expiry` datetime NOT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email_verification`
--

INSERT INTO `email_verification` (`id`, `serial`, `pin`, `email`, `token`, `token_expiry`, `is_verified`, `created_at`) VALUES
(9, '0000', '0000', 'abdulsamadbalogun2d5@gmail.com', '0323d59c9f2ca83d34ec300416a58972', '2024-07-21 04:51:39', 1, '2024-07-21 02:21:39'),
(10, '0000', '0000', 'abdulsamadbaldogun25@gmail.com', '81553a49dfba626545d73259cbe23dd6', '2024-07-21 05:05:40', 0, '2024-07-21 02:35:40'),
(12, '33333', '33333', 'abdulsamadbalogun25@gmail.com', '8d45823b3e34b5c9895936fc5ddcfb09', '2024-07-26 10:28:53', 1, '2024-07-24 07:58:53'),
(13, '33333', '33333', 'abdulsamadbalogun25@gmail.com', 'a35655856960925c5635a5c77772ed1c', '2024-07-24 11:27:57', 0, '2024-07-24 08:57:57'),
(14, '33333', '33333', 'abdulsamadbalogun26@gmail.com', 'd343ef58521f40d205ce331bfd447b05', '2024-07-24 11:32:25', 0, '2024-07-24 09:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

CREATE TABLE `employment` (
  `id` int(11) NOT NULL,
  `Serial` varchar(300) NOT NULL,
  `Pin` varchar(300) NOT NULL,
  `Employer` varchar(300) NOT NULL,
  `Froms` varchar(30) NOT NULL,
  `Tos` varchar(300) NOT NULL,
  `Position` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examtype`
--

CREATE TABLE `examtype` (
  `id` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examtype`
--

INSERT INTO `examtype` (`id`, `Name`) VALUES
(1, 'WAEC'),
(2, 'NECO');

-- --------------------------------------------------------

--
-- Table structure for table `excelfiles`
--

CREATE TABLE `excelfiles` (
  `id` int(11) NOT NULL,
  `ids` varchar(30) NOT NULL,
  `PaymentP` varchar(30) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `type` varchar(30) NOT NULL,
  `Size` decimal(10,0) NOT NULL,
  `content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Name` varchar(1000) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Size` decimal(10,0) DEFAULT NULL,
  `content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `Title`, `Name`, `Type`, `Size`, `content`) VALUES
(1, 'guides', 'guides.docx', 'application/vnd.ms-docx', 88, ''),
(2, 'Serial_Pin_Bulk', 'Serial_Pin_Bulk.csv', 'application/vnd.ms-excel', 76, '');

-- --------------------------------------------------------

--
-- Table structure for table `localgovernment`
--

CREATE TABLE `localgovernment` (
  `id` int(11) NOT NULL,
  `Statesid` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `olevel`
--

CREATE TABLE `olevel` (
  `id` int(11) NOT NULL,
  `Serial` varchar(300) NOT NULL,
  `Pin` varchar(300) NOT NULL,
  `Subjects` varchar(300) NOT NULL,
  `Grade` varchar(300) NOT NULL,
  `Examdate` varchar(300) NOT NULL,
  `Exam` varchar(300) NOT NULL,
  `Sitting` varchar(300) NOT NULL,
  `Examtype` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `olevel`
--

INSERT INTO `olevel` (`id`, `Serial`, `Pin`, `Subjects`, `Grade`, `Examdate`, `Exam`, `Sitting`, `Examtype`) VALUES
(1306, '1499745711', '376727', 'Core Mathematics', 'A1', '2024-07-11', 'ewfwefwe', '1st Sitting', 'NECO'),
(1307, '1499745711', '376727', 'Core Mathematics', 'A1', '2024-07-11', 'ewfwefwe', '1st Sitting', 'NECO'),
(1308, '1499745711', '376727', 'Core Mathematics', 'A1', '2024-07-11', 'ewfwefwe', '1st Sitting', 'NECO'),
(1309, '1499745711', '376727', 'Core Mathematics', 'A1', '2024-07-11', 'ewfwefwe', '1st Sitting', 'NECO'),
(1310, '1499745711', '376727', 'Core Mathematics', 'A1', '2024-07-11', 'ewfwefwe', '1st Sitting', 'NECO'),
(1311, '1499745711', '376727', 'Core Mathematics', 'A1', '2024-07-11', 'ewfwefwe', '1st Sitting', 'NECO'),
(1312, '1499745711', '376727', 'Core Mathematics', 'A1', '2024-07-11', 'ewfwefwe', '1st Sitting', 'NECO'),
(1313, '1499745711', '376727', 'Core Mathematics', 'A1', '2024-07-11', 'ewfwefwe', '1st Sitting', 'NECO'),
(1314, '1499745711', '376727', 'Core Mathematics', 'A1', '2024-07-11', 'ewfwefwe', '1st Sitting', 'NECO'),
(1315, '1499745711', '376727', 'Core Mathematics', 'A1', '2024-07-11', 'ewfwefwe', '1st Sitting', 'NECO'),
(1316, '1499745711', '376727', 'Core Mathematics', 'A1', '2024-07-11', 'ewfwefwe', '1st Sitting', 'NECO'),
(1317, '1499745711', '376727', 'Core Mathematics', 'A1', '2024-07-11', 'ewfwefwe', '1st Sitting', 'NECO'),
(1318, '1499745711', '376727', 'Core Mathematics', 'A1', '2024-07-11', 'ewfwefwe', '1st Sitting', 'NECO'),
(1319, '1499745711', '376727', 'Core Mathematics', 'A1', '2024-07-11', 'ewfwefwe', '1st Sitting', 'NECO'),
(1320, '1499745711', '376727', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1321, '1499745711', '376727', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1322, '1499745711', '376727', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1323, '1499745711', '376727', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1324, '1499745711', '376727', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1325, '1499745711', '376727', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1326, '1499745711', '376727', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1327, '1499745711', '376727', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1328, '1499745711', '376727', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1329, '1499745711', '376727', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1330, '1499745711', '376727', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1331, '1499745711', '376727', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1332, '1499745711', '376727', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1333, '1499745711', '376727', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1418, '0000', '0000', 'Core Mathematics', 'A1', '2024-07-10', '444444', '1st Sitting', 'WAEC'),
(1419, '0000', '0000', 'Core Mathematics', 'A1', '2024-07-10', '444444', '1st Sitting', 'WAEC'),
(1420, '0000', '0000', 'Core Mathematics', 'A1', '2024-07-10', '444444', '1st Sitting', 'WAEC'),
(1421, '0000', '0000', 'Core Mathematics', 'A1', '2024-07-10', '444444', '1st Sitting', 'WAEC'),
(1422, '0000', '0000', 'Core Mathematics', 'A1', '2024-07-10', '444444', '1st Sitting', 'WAEC'),
(1423, '0000', '0000', 'Core Mathematics', 'A1', '2024-07-10', '444444', '1st Sitting', 'WAEC'),
(1424, '0000', '0000', 'Core Mathematics', 'A1', '2024-07-10', '444444', '1st Sitting', 'WAEC'),
(1425, '0000', '0000', 'Core Mathematics', 'A1', '2024-07-10', '444444', '1st Sitting', 'WAEC'),
(1426, '0000', '0000', 'Core Mathematics', 'A1', '2024-07-10', '444444', '1st Sitting', 'WAEC'),
(1427, '0000', '0000', 'Core Mathematics', 'A1', '2024-07-10', '444444', '1st Sitting', 'WAEC'),
(1428, '0000', '0000', 'Core Mathematics', 'A1', '2024-07-10', '444444', '1st Sitting', 'WAEC'),
(1429, '0000', '0000', 'Core Mathematics', 'A1', '2024-07-10', '444444', '1st Sitting', 'WAEC'),
(1430, '0000', '0000', 'Core Mathematics', 'A1', '2024-07-10', '444444', '1st Sitting', 'WAEC'),
(1431, '0000', '0000', 'Core Mathematics', 'A1', '2024-07-10', '444444', '1st Sitting', 'WAEC'),
(1432, '0000', '0000', 'Core Mathematics', 'B2', '2024-07-04', 'Zjhjdhd', '2nd Sitting', 'WAEC'),
(1433, '0000', '0000', '', '', '2024-07-04', 'Zjhjdhd', '2nd Sitting', 'WAEC'),
(1434, '0000', '0000', '', '', '2024-07-04', 'Zjhjdhd', '2nd Sitting', 'WAEC'),
(1435, '0000', '0000', '', '', '2024-07-04', 'Zjhjdhd', '2nd Sitting', 'WAEC'),
(1436, '0000', '0000', '', '', '2024-07-04', 'Zjhjdhd', '2nd Sitting', 'WAEC'),
(1437, '0000', '0000', '', '', '2024-07-04', 'Zjhjdhd', '2nd Sitting', 'WAEC'),
(1438, '0000', '0000', '', '', '2024-07-04', 'Zjhjdhd', '2nd Sitting', 'WAEC'),
(1439, '0000', '0000', '', '', '2024-07-04', 'Zjhjdhd', '2nd Sitting', 'WAEC'),
(1440, '0000', '0000', '', '', '2024-07-04', 'Zjhjdhd', '2nd Sitting', 'WAEC'),
(1441, '0000', '0000', '', '', '2024-07-04', 'Zjhjdhd', '2nd Sitting', 'WAEC'),
(1442, '0000', '0000', '', '', '2024-07-04', 'Zjhjdhd', '2nd Sitting', 'WAEC'),
(1443, '0000', '0000', '', '', '2024-07-04', 'Zjhjdhd', '2nd Sitting', 'WAEC'),
(1444, '0000', '0000', '', '', '2024-07-04', 'Zjhjdhd', '2nd Sitting', 'WAEC'),
(1445, '0000', '0000', '', '', '2024-07-04', 'Zjhjdhd', '2nd Sitting', 'WAEC'),
(1490, '33333', '33333', 'Inte. Science', 'B2', '2024-07-06', 'fwefwefwefwe', '1st Sitting', 'WAEC'),
(1491, '33333', '33333', 'Core Mathematics', 'A1', '2024-07-06', 'fwefwefwefwe', '1st Sitting', 'WAEC'),
(1492, '33333', '33333', 'Core Mathematics', 'A1', '2024-07-06', 'fwefwefwefwe', '1st Sitting', 'WAEC'),
(1493, '33333', '33333', 'Core Mathematics', 'A1', '2024-07-06', 'fwefwefwefwe', '1st Sitting', 'WAEC'),
(1494, '33333', '33333', 'Core Mathematics', 'A1', '2024-07-06', 'fwefwefwefwe', '1st Sitting', 'WAEC'),
(1495, '33333', '33333', 'Core Mathematics', 'A1', '2024-07-06', 'fwefwefwefwe', '1st Sitting', 'WAEC'),
(1496, '33333', '33333', 'Core Mathematics', 'A1', '2024-07-06', 'fwefwefwefwe', '1st Sitting', 'WAEC'),
(1497, '33333', '33333', 'Core Mathematics', 'A1', '2024-07-06', 'fwefwefwefwe', '1st Sitting', 'WAEC'),
(1498, '33333', '33333', 'English Language', 'B3', 'NA', 'NA', '2nd Sitting', 'NA'),
(1499, '33333', '33333', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1500, '33333', '33333', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1501, '33333', '33333', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1502, '33333', '33333', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1503, '33333', '33333', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1504, '33333', '33333', '', '', 'NA', 'NA', '2nd Sitting', 'NA'),
(1505, '33333', '33333', '', '', 'NA', 'NA', '2nd Sitting', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `previousxul`
--

CREATE TABLE `previousxul` (
  `id` int(11) NOT NULL,
  `Serial` varchar(300) NOT NULL,
  `Pin` varchar(300) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Froms` varchar(30) NOT NULL,
  `Tos` varchar(300) NOT NULL,
  `Qualification` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profilepictures`
--

CREATE TABLE `profilepictures` (
  `id` int(11) NOT NULL,
  `Serial` varchar(300) NOT NULL,
  `Pin` varchar(300) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `type` varchar(30) NOT NULL,
  `Size` decimal(10,0) NOT NULL,
  `content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profilepictures`
--

INSERT INTO `profilepictures` (`id`, `Serial`, `Pin`, `name`, `type`, `Size`, `content`) VALUES
(45, '', '', '_passport.png', 'image/png', 303475, 0x5f70617373706f72742e706e67),
(46, '', '', '_certificate.png', 'image/png', 303475, 0x5f63657274696669636174652e706e67),
(47, '', '', '_testimonial.png', 'image/png', 303475, 0x5f74657374696d6f6e69616c2e706e67),
(48, '', '', '_birth-certificate.png', 'image/png', 192433, 0x5f62697274682d63657274696669636174652e706e67),
(73, '12345', '1234', '12345_passport.png', 'image/png', 1090878, 0x31323334355f70617373706f72742e706e67),
(74, '12345', '1234', '12345_certificate.png', 'image/png', 254286, 0x31323334355f63657274696669636174652e706e67),
(75, '12345', '1234', '12345_testimonial.png', 'image/png', 192433, 0x31323334355f74657374696d6f6e69616c2e706e67),
(76, '12345', '1234', '12345_birth-certificate.png', 'image/png', 230891, 0x31323334355f62697274682d63657274696669636174652e706e67),
(77, '12345678', '12345678', '12345678_passport.png', 'image/png', 192433, 0x31323334353637385f70617373706f72742e706e67),
(78, '12345678', '12345678', '12345678_certificate.png', 'image/png', 202907, 0x31323334353637385f63657274696669636174652e706e67),
(79, '12345678', '12345678', '12345678_testimonial.png', 'image/png', 202907, 0x31323334353637385f74657374696d6f6e69616c2e706e67),
(80, '12345678', '12345678', '12345678_birth-certificate.png', 'image/png', 202907, 0x31323334353637385f62697274682d63657274696669636174652e706e67),
(93, '0000', '0000', '0000_passport.png', 'image/png', 2024972, 0x303030305f70617373706f72742e706e67),
(94, '0000', '0000', '0000_certificate.png', 'image/png', 2024972, 0x303030305f63657274696669636174652e706e67),
(95, '0000', '0000', '0000_testimonial.png', 'image/png', 2024972, 0x303030305f74657374696d6f6e69616c2e706e67),
(96, '0000', '0000', '0000_birth-certificate.png', 'image/png', 254286, 0x303030305f62697274682d63657274696669636174652e706e67),
(97, '33333', '33333', '33333_passport.png', 'image/png', 2024972, 0x33333333335f70617373706f72742e706e67),
(98, '33333', '33333', '33333_certificate.png', 'image/png', 2024972, 0x33333333335f63657274696669636174652e706e67),
(99, '33333', '33333', '33333_testimonial.png', 'image/png', 2024972, 0x33333333335f74657374696d6f6e69616c2e706e67),
(100, '33333', '33333', '33333_birth-certificate.png', 'image/png', 2024972, 0x33333333335f62697274682d63657274696669636174652e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `referees`
--

CREATE TABLE `referees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `address` text NOT NULL,
  `ref` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referees`
--

INSERT INTO `referees` (`id`, `name`, `contact`, `date`, `address`, `ref`, `signature`, `pin`, `serial`, `created_at`) VALUES
(3, 'Dev Abdulsama9d', 'efwefwefw', '2024-07-09', 'MM Castle street, Bida, Niger State.', '23r32r2r2ee', '12345678_signature.png', '1234', '12345', '2024-07-01 21:15:14'),
(4, 'Mrs. Motunrayo Balogun', '08117093456', '2024-08-02', 'MM Castle street, Bida, Niger State.', 'refwrfwer', '12345678_signature.png', '12345678', '12345678', '2024-07-10 13:03:05'),
(5, 'Balogun Abdulsamad', '08117093456', '2024-07-06', 'MM Castle street, Bida, Niger State.', '23r32r2r2', '0000_signature.png', '0000', '0000', '2024-07-10 16:59:27'),
(6, 'wefwef', 'wefwef', '2024-07-04', 'wefewfewf', 'fwfwefwefwefw', '33333_signature.png', '33333', '33333', '2024-07-24 07:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `schoolgrades`
--

CREATE TABLE `schoolgrades` (
  `id` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schoolgrades`
--

INSERT INTO `schoolgrades` (`id`, `Name`) VALUES
(1, 'A1'),
(2, 'B2'),
(3, 'B3'),
(4, 'C4'),
(5, 'C5'),
(6, 'C6'),
(7, 'D7'),
(8, 'E8'),
(9, 'F9');

-- --------------------------------------------------------

--
-- Table structure for table `schoolsubjects`
--

CREATE TABLE `schoolsubjects` (
  `id` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schoolsubjects`
--

INSERT INTO `schoolsubjects` (`id`, `Name`) VALUES
(1, 'Core Mathematics'),
(2, 'English Language'),
(3, 'Social Studies'),
(4, 'Inte. Science'),
(5, 'Physics'),
(6, 'Biology'),
(7, 'Elective Mathematics'),
(8, 'Chemistry'),
(9, 'History'),
(10, 'Food and Nutrition'),
(11, 'Clothing and Textiles'),
(12, 'Literature'),
(13, 'Religious Studies'),
(14, 'Geography');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alevel`
--
ALTER TABLE `alevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants2`
--
ALTER TABLE `applicants2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseapplied`
--
ALTER TABLE `courseapplied`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `declared`
--
ALTER TABLE `declared`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_verification`
--
ALTER TABLE `email_verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examtype`
--
ALTER TABLE `examtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excelfiles`
--
ALTER TABLE `excelfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `localgovernment`
--
ALTER TABLE `localgovernment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olevel`
--
ALTER TABLE `olevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `previousxul`
--
ALTER TABLE `previousxul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilepictures`
--
ALTER TABLE `profilepictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referees`
--
ALTER TABLE `referees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolgrades`
--
ALTER TABLE `schoolgrades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolsubjects`
--
ALTER TABLE `schoolsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alevel`
--
ALTER TABLE `alevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `applicants2`
--
ALTER TABLE `applicants2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `courseapplied`
--
ALTER TABLE `courseapplied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `declared`
--
ALTER TABLE `declared`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `email_verification`
--
ALTER TABLE `email_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examtype`
--
ALTER TABLE `examtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `excelfiles`
--
ALTER TABLE `excelfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `localgovernment`
--
ALTER TABLE `localgovernment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olevel`
--
ALTER TABLE `olevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1506;

--
-- AUTO_INCREMENT for table `previousxul`
--
ALTER TABLE `previousxul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profilepictures`
--
ALTER TABLE `profilepictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `referees`
--
ALTER TABLE `referees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schoolgrades`
--
ALTER TABLE `schoolgrades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `schoolsubjects`
--
ALTER TABLE `schoolsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
