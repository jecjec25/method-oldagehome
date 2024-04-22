-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2024 at 05:20 PM
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
-- Database: `seniorcaredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceptbooking`
--

CREATE TABLE `acceptbooking` (
  `id` int NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `contactnum` varchar(13) NOT NULL,
  `event` varchar(255) NOT NULL,
  `prefferdate` date NOT NULL,
  `Time` text NOT NULL,
  `equipment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `comments` varchar(255) NOT NULL,
  `status` varchar(159) NOT NULL,
  `usersignsId` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount_raised` decimal(10,2) NOT NULL,
  `outcomes` varchar(255) NOT NULL,
  `acknowledgement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `acceptbooking`
--

INSERT INTO `acceptbooking` (`id`, `lastname`, `firstname`, `middlename`, `contactnum`, `event`, `prefferdate`, `Time`, `equipment`, `comments`, `status`, `usersignsId`, `description`, `amount_raised`, `outcomes`, `acknowledgement`) VALUES
(55, 'Dela Chica', 'Christia Angelica', 'Manalo', '09123456789', 'charity events', '2024-04-25', '', 'Sound system', 'how are you', 'Accepted', 10, '', 0.00, '', ''),
(56, 'Manalo', 'Vicky', 'Herilla', '09123456789', 'Mind Games', '2024-04-25', '', 'speaker', 'questions and comments', 'Accepted', 10, '', 0.00, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `AnnounceID` int NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Priority` varchar(255) NOT NULL,
  `Attachments` varchar(150) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `Target_audience` text NOT NULL,
  `Feedback` text NOT NULL,
  `adminId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`AnnounceID`, `Title`, `Content`, `Author`, `Date_created`, `Date_modified`, `Start_date`, `End_date`, `Category`, `Priority`, `Attachments`, `Status`, `Target_audience`, `Feedback`, `adminId`) VALUES
(5, 'Announcement ni mayor ', 'Announcement hehe', 'Christia Dela Chica', '2024-04-22 13:23:17', '2002-12-24 16:00:00', '2024-04-18', '2024-04-19', 'events, activities', 'Priority ko ngayon si mam', 'christia1.jpg', 'Published', 'residents, family', '', NULL),
(6, 'kfjsjfjsoifjosj', 'skjfksjvikj', 'ksjfosjviksjvikv', '2024-04-22 13:23:17', '2024-04-19 16:00:00', '2024-04-20', '2024-04-19', 'events, activities', 'fkjsojfosj fiufjisjfik', '16.jpg', 'Archive', 'residents, family', '', NULL),
(7, 'Announcement Title nananana', 'Announcement Content nananana', 'Christia Dela Chica nananana', '2024-04-22 13:23:17', '2024-04-19 16:00:00', '2024-04-20', '2024-04-20', 'events, activities', 'Priority is the people nananana', '16.jpg', 'Archive', 'residents, family', '', NULL),
(8, 'nanana nanana sjdjsn', 'mananansananansn dakmnadkand', 'manadnakd lakdk', '2024-04-22 13:23:17', '2024-04-19 16:00:00', '2024-04-20', '2024-04-21', 'events, activities', 'hwhshdsd shkshfnskfhns jekjek', 'christia1.jpg', 'Archive', 'residents, family', '', NULL),
(9, 'Announcement ni Jennifer Ramirez', 'sya lang sapat na', 'Jennifer Ramirez', '2024-04-22 13:23:17', '2024-04-20 07:04:56', '2024-04-20', '2024-04-21', 'events, activities', 'priority ko sya', '20240127_130508.jpg', 'Archive', 'residents, family', '', NULL),
(10, 'Isa pa with feelings', 'Announcement uli ni Jennifer Ramirez', 'Jennifer', '2024-04-22 13:23:17', '2024-04-20 14:41:46', '2024-04-21', '2024-04-22', 'activities, healthtips', 'Priority ko si mama mo', '20240127_130508.jpg', 'Archive', 'residents, family', '', NULL),
(11, 'Announcemeng ni Tia', 'Announcement to ni tia hehe', 'Christia Dela Chica', '2024-04-22 13:23:17', '2024-04-20 07:58:16', '2024-04-20', '2024-04-22', 'events, activities', 'Ang priority ko ngayon ay siya lang', '20240127_130508.jpg', 'Archive', 'residents, family', '', NULL),
(12, 'announcement ni dela chica', 'content ni mama mo', 'Christia Dela Chica', '2024-04-22 13:23:17', '2024-04-20 08:44:00', '2024-04-21', '2024-04-22', 'events, activities', 'Ang priority ko ngayon ay defense', '20240127_130508.jpg', 'Archive', 'volunteers', '', NULL),
(13, 'egkngkengkwn', 'kjgdldjmglm', 'ejgeljgmlemg', '2024-04-22 13:23:17', '2024-04-21 07:23:36', '2024-04-21', '2024-04-21', 'events, activities', 'hgihojoljo', 'uploads/1713684216_72927e204e7b52fc2b09.jpg', 'Draft', 'residents, family', '', NULL),
(14, 'Announcement for today', 'Announcement for today', 'Christia Dela Chica', '2024-04-22 13:23:17', '2024-04-21 07:00:43', '2024-04-21', '2024-04-22', 'events', 'Priority ko ngayon si mam', '20240127_130028.jpg', 'Published', 'residents, family', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Organizer` varchar(255) NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Atendees` text NOT NULL,
  `Attachments` varchar(255) NOT NULL,
  `Feedback` text NOT NULL,
  `usersignsid` int DEFAULT NULL,
  `adminId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `Title`, `Description`, `Organizer`, `Start_date`, `End_date`, `Category`, `Status`, `Atendees`, `Attachments`, `Feedback`, `usersignsid`, `adminId`) VALUES
(16, 'Aruga Kapatid Events', 'Physical exercises for elders', 'Christia Dela Chica and Jennifer Ramirez', '2024-04-19', '2024-04-20', 'Social, Recreational', 'Published', 'elders and family', '20240310_113427.jpg', '', NULL, NULL),
(17, 'Events ito ni jen', 'events ito ni jennifer ramirez', 'jennifer ramirez', '2024-04-14', '2024-04-22', 'Social, Recreational', 'Archive', 'elders and family', '20240127_130508.jpg', '', NULL, NULL),
(18, 'Try lang for search of events', 'Try lang for search of events', 'Christia Dela Chica', '2024-04-21', '2024-04-21', 'Social, Recreational', 'Archive', 'Christia Dela Chica', 'uploads/1713683758_5424a93c97ff118e4e02.jpg', '', NULL, NULL),
(19, 'dlkvmdlmvsm', 'lssmgljsglj', 'lsjgosjoja', '2024-04-21', '2024-04-21', 'Social, Recreational', 'Archive', 'hodjgdpkgdp', 'uploads/1713683964_64951ff7967ee132503c.jpg', '', NULL, NULL),
(20, 'jek jjhujhuihi', 'fhhsnvihvu', 'shcishcih', '2024-04-21', '2024-04-21', 'Social, Outreach', 'Draft', 'ifjdijdijdoijkv', 'uploads/1713684068_60d21b2fd0aa961e0896.jpg', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsevents`
--

CREATE TABLE `newsevents` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Category` varchar(150) NOT NULL,
  `picture` varchar(150) NOT NULL,
  `status` varchar(10) NOT NULL,
  `Feedback` text NOT NULL,
  `adminId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `newsevents`
--

INSERT INTO `newsevents` (`id`, `title`, `Content`, `author`, `date_published`, `Category`, `picture`, `status`, `Feedback`, `adminId`) VALUES
(23, 'Liza Marcos admits snubbing Sara Duterte: ', 'First lady liza araneta marcos admitting snubbing vice president sarah duterte following her attendance', 'Manila, Philippines', '2024-04-19 06:12:45', 'Community', '20240310_113220.jpg', 'Published', '', NULL),
(24, 'News to ni jennifer', 'Ang news na nireport ni Jennifer Ramirez', 'Jennifer Ramirez', '2024-04-20 14:22:01', 'Health, Community', '20240127_130028.jpg', 'Archive', '', NULL),
(25, 'For News Search ito', 'For news search ito po', 'Christia Dela Chica', '2024-04-21 07:04:08', 'Health, Community', '20240127_130349.jpg', 'Published', '', NULL),
(26, 'For search news ito part two', 'For search news ito part two', 'Christia Dela Chica', '2024-04-21 07:13:17', 'Staff', 'uploads/1713683597_1f70841f6636248bd499.jpg', 'Draft', '', NULL),
(27, 'wala maiba lang', 'wala maiba lang', 'Christia Dela Chica', '2024-04-21 07:13:54', 'Health', 'uploads/1713683634_e2893dd0f5de0c19f00c.jpg', 'Archive', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reportdonation`
--

CREATE TABLE `reportdonation` (
  `donation_id` int NOT NULL,
  `date` date NOT NULL,
  `donor_name` varchar(255) NOT NULL,
  `donation_type` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `project_supported` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reportdonation`
--

INSERT INTO `reportdonation` (`donation_id`, `date`, `donor_name`, `donation_type`, `amount`, `project_supported`) VALUES
(1, '2024-03-06', 'shadgh', 'hasdghf', '12312', 'qhsadhvadh'),
(2, '2024-03-12', 'Dan', 'Senior', '150000', 'hello'),
(3, '2024-03-08', 'Shello Manalo', 'Monetary', '50000', 'Aruga Kapatid'),
(4, '2024-03-21', 'Christia Angelica Dela Chica', 'Monetary', '200000', 'Aruga'),
(5, '2024-03-20', 'Dan Keneth Rontale ', 'In-kind', 'pede ba word', 'Go fund me'),
(6, '2000-11-07', 'Shellow Manalo', 'In-Kind', 'shoes', 'Shoes of Elders'),
(7, '2023-03-08', 'Juwana', 'In-kind', 'bags', 'yayamanin'),
(8, '2024-04-02', 'Kyle Curba', 'Sell', '123456', 'selling'),
(9, '2024-04-04', 'Curba, Kyle', 'Monetary', '200000', 'Doormat ni lola'),
(10, '2024-04-04', 'kyle Curba', 'Monetary', '25,000', 'foods for senior citizen');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `Id` int NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Phone` varchar(13) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Enquiry_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Message` text NOT NULL,
  `contact_status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`Id`, `Name`, `Phone`, `Email`, `Enquiry_Date`, `Message`, `contact_status`) VALUES
(1, 'Christia Angelica Manalo Dela Chica', '09633895647', 'changeldc11@gmail.com', '2024-03-05 14:38:48', ' Hi. Can I inquire about the elders?', 'Read'),
(2, 'Jennifer Ramirez', '09876543212', 'jennifer@gmail.com', '2024-03-07 07:37:50', ' jennifer gawa na read and unread inquiry', 'Read'),
(3, 'Shellow Manalo', '09085353978', 'shellomanalo@gmail.com', '2024-03-07 07:41:46', 'kumain ka na ng catfood', 'Read'),
(4, 'Dan Keneth Rontale', '09568319369', 'rontale@gmail.com', '2024-03-07 07:42:19', 'Ang pogi mo kuya\r\n\r\n ', 'Read'),
(5, 'Christiia Angelica Dela Chica', '09261454009', 'changeldc11@gmail.com', '2024-04-08 05:11:38', ' parang isang panaginip', 'Read'),
(6, 'hay nako', '09158524165', 'jekjek@gmail.com', '2024-04-08 05:13:14', ' iyong iyo', 'Read'),
(7, 'dan keneth', '09876543212', 'dalandan@gmail.com', '2024-04-08 05:14:51', ' di ko na ililihim pa\r\n', 'Read'),
(8, 'Jennifer Ramirez', '09876543212', 'jenramirez@gmail.com', '2024-04-08 05:16:04', ' akoy iyong iyo', 'Unread'),
(9, 'Rosela Manalo', '09085353978', 'asjhdhh', '2024-04-08 05:17:02', 'sadguhsadg\r\n\r\n\r\n ', 'Unread'),
(10, 'Cynthia Herilla Manalo', '09986532451', 'hello@gmail.com', '2024-04-08 05:21:21', 'shdfuhjs ', 'Unread'),
(11, 'Christia', '09876543212', 'christia25@gmail.com', '2024-04-09 03:26:21', ' haaksks', 'Unread'),
(12, 'amdnkadkad', '09764345678', 'christia25@gmail.com', '2024-04-21 09:08:34', ' hyfujhiihitujojo', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `Id` int NOT NULL,
  `ProdName` text NOT NULL,
  `Quantity` int NOT NULL,
  `ProdPrice` varchar(150) NOT NULL,
  `ProdDescription` text NOT NULL,
  `ProdPic` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`Id`, `ProdName`, `Quantity`, `ProdPrice`, `ProdDescription`, `ProdPic`) VALUES
(9, 'round na basahan ni jennifer ramirez', 11, '200', 'jhihijuijkjij', '20240127_130508.jpg'),
(10, 'Basahan ni Chacha', 100, '200', 'basahan ito ni chacha', '20240127_130508.jpg'),
(11, 'Mama Mary', 11, '120', 'House of the glory', '20240127_130028.jpg'),
(12, 'Doormat ni Ate Kyle', 12, '100', 'ito ang basahan ni ate kyle na mahal na mahal ko', '20240127_130239.jpg'),
(13, 'Walis Tambo ni lola', 25, '150', 'Walis tambo ni lola at ni lolo', '20240310_113024.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblscdetails`
--

CREATE TABLE `tblscdetails` (
  `Id` int NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `DateBirth` date DEFAULT NULL,
  `ContNum` varchar(20) DEFAULT NULL,
  `ComAdd` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `ProfPic` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `EmergencyAdd` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `EmergencyContNum` varchar(20) DEFAULT NULL,
  `RegDate` date NOT NULL,
  `scstatus` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `InputedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adminId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblscdetails`
--

INSERT INTO `tblscdetails` (`Id`, `Name`, `DateBirth`, `ContNum`, `ComAdd`, `ProfPic`, `EmergencyAdd`, `EmergencyContNum`, `RegDate`, `scstatus`, `InputedDate`, `adminId`) VALUES
(50, 'Adan, Enrico Malinao (Rico)', '1962-02-19', '09123456789', 'Buhangin, Naujan, Or. Mdo.', 'adan.jpg', 'Buhangin, Naujan, Or. Mdo.<br>', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 21:38:09', NULL),
(51, 'Areno, Letecia Bellones (Lety)', '1941-02-28', '09123456789', 'Bagumbayan2, Bongabong, Or. Mdo.<br>', 'areno.jpg', 'Bagumbayan2, Bongabong, Or. Mdo.<br>', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:02:33', NULL),
(52, 'Atienza, Helen Ramirez (Helen)', '1945-12-25', '09123456789', 'Bayanan 2, Calapan City, Or. Mdo.', 'atienza_h.jpg', 'Bayanan 2, Calapan City, Or. Mdo.', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:04:20', NULL),
(53, 'Boongaling, Hermeo Mendoza (Herme)', '1957-04-13', '09123456789', 'Bagumbayan, Roxas Or. Mdo.', 'boongaling.jpg', 'Bagumbayan, Roxas Or. Mdo.', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:06:02', NULL),
(54, 'De Castro, Mecio Magro (Mele)', '1931-07-29', '09123456789', 'San Antonio, Or. Mdo.', 'decastrp.jpg', 'San Antonio, Or. Mdo.', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:08:07', NULL),
(55, ' Gusto, Benedicta Macalalad (Beneng)', '1933-05-06', '09123456789', 'Zone 3, Pola, Or. Mdo.<br>', 'gusto.jpg', 'Zone 3, Pola, Or. Mdo.<br>', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:19:29', NULL),
(56, 'Ical, Benildo Sanchez (Neil)', '1950-06-15', '09123456789', 'Sta. Rosa, Baco, Or. Mdo.<br>', 'ical.jpg', 'Sta. Rosa, Baco, Or. Mdo.<br>', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:25:08', NULL),
(57, 'Javier, Antonio Altamirano (Tony)', '1939-01-18', '09123456789', 'Balite, Calapan City, Or. Mdo.<br>', 'javier.jpg', 'Balite, Calapan City, Or. Mdo.<br>', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:32:38', NULL),
(58, 'Julao, Wemer Lachica (Wemer)', '1945-06-15', '09123456789', 'Calima, Pola, Or. Mdo.<br>', 'julao.jpg', 'Calima, Pola, Or. Mdo.<br>', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:34:56', NULL),
(59, 'Manalo, Necetas Ramirez (Nick)', '1951-03-15', '09123456789', 'Calocmoy, Socorro, Or. Mdo.<br>', 'manalo.jpg', 'Calocmoy, Socorro, Or. Mdo.<br>', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:36:16', NULL),
(60, 'Ocenar, Marcela Gaborne (Mercy)', '1944-01-31', '09123456789', 'Salong, Calapan City Or. Mdo.<br>', 'ocenar.jpg', 'Salong, Calapan City Or. Mdo.<br>', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:37:34', NULL),
(61, 'Okasla, Juanita Cabrigas (Juaning)', '1934-11-05', '09123456789', 'Estrella, Naujan, Or. Mdo.<br>', 'okasla.jpg', 'Estrella, Naujan, Or. Mdo.<br>', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:38:50', NULL),
(62, 'Palomera, Eduvigis Huerto (Baby)', '1947-10-17', '09123456789', 'Bancuro Naujan Or. Mdo.<br>', 'palomera.jpg', 'Bancuro Naujan Or. Mdo.<br>', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:41:27', NULL),
(63, 'Ramos, Nelia Lacandula (Nelia)', '1960-06-07', '09123456789', 'Poblacion 2, Naujan, Or. Mdo.<br>', 'ramos.jpg', 'Poblacion 2, Naujan, Or. Mdo.<br>', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:43:05', NULL),
(64, 'Reola Sabina Gandia (Sabing)', '1929-10-28', '09123456789', 'Poblacion 4, Victoria, Or. Mdo.<br>', 'reola.jpg', 'Poblacion 4, Victoria, Or. Mdo.<br>', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:44:52', NULL),
(65, 'Rey, Myrna Navarro (Myrna)', '1943-05-19', '09123456789', 'Poblacion, Bongabong, Or. Mdo.<br>', 'rey.jpg', 'Poblacion, Bongabong, Or. Mdo.<br>', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:46:35', NULL),
(66, 'Tingkalag, Basilio Banog-Banog (Basilio) ', '1949-05-01', '09123456789', 'Sta Clara, Pila, Laguna<br>', 'tingkalag.jpg', 'Sta Clara, Pila, Laguna<br>', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:47:47', NULL),
(67, 'Tipones, Mely Contante (Mely)', '1959-11-27', '09123456789', 'Parang, Calapan City Or. Mdo.<br>', 'tipones.jpg', 'Parang, Calapan City Or. Mdo.<br>', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:49:12', NULL),
(68, 'Vicente, Martha Apasan (Marta)', '1948-01-19', '09123456789', 'Ilaya, Calapan City, Or. Mdo.&nbsp;<br>', 'vecente.jpg', 'Ilaya, Calapan City, Or. Mdo.&nbsp;<br>', '09123456789', '2024-04-22', 'Unarchive', '2024-04-22 23:50:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `Username` varchar(150) NOT NULL,
  `ContactNo` varchar(50) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `birthday` date NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `LastName`, `FirstName`, `Username`, `ContactNo`, `Email`, `birthday`, `Password`, `Created_At`, `Update_At`) VALUES
(1, 'java', 'script', 'java', '', 'java@gmail.com', '0000-00-00', '$2y$10$gjsosmN/kw..9fopNt3DZOd.uVKfcw/g33tmkw5b1uV6LsBiuGX6S', '2024-02-18 06:18:08', '2024-02-18 06:18:08'),
(2, 'Dela Chica', 'Christia Angelica', 'christia25', '09633895626', 'christia25@gmail.com', '2002-12-25', '$2y$10$mCyCYd2b6efQiKMj.z30mONbP2yrTGubK3s.tKJrlVq9OxUud4TfC', '2024-02-18 06:40:43', '2024-02-18 06:40:43'),
(3, 'Dela Chica', 'Christia', 'christia25', '', 'christia25@gmail.com', '0000-00-00', '$2y$10$7Pna.S38gvjd4puVDa4jNOVuJQyK9x9fpaAMMvZFZlfTcx/n38nqW', '2024-02-21 03:55:03', '2024-02-21 03:55:03'),
(4, 'Rontale ', 'Dan', 'dan12', '', 'dan@gmail.com', '0000-00-00', '$2y$10$W3OdDJk.M6Vfk7H.5a4a8eWmDGpqdx7boj3fw1/.i2pbScNT6AULa', '2024-02-22 00:11:30', '2024-02-22 00:11:30'),
(5, 'Tubig', 'Langis', 'tubiglangis', '', 'tubiglangis@gmail.com', '0000-00-00', '$2y$10$Ic3./YdRhWow5tyNF9ZYy.l3jKPYSd6.tchX5DlgMCfoFigTO0PWS', '2024-02-23 12:19:48', '2024-02-23 12:19:48'),
(6, 'suklay', 'comb', 'suklaycomb', '', 'suklaycomb@gmail.com', '0000-00-00', '$2y$10$PCom4gOuxIndmjjw8PVc8Oz9RbMg.Yionpi1ROytPWFNvz0ilPz.a', '2024-02-23 12:22:01', '2024-02-23 12:22:01'),
(7, 'prada', 'bag', 'pradabag12', '', 'pradabag@gmail.com', '0000-00-00', '$2y$10$hnUq29odG3BMy8e6/CcTnOyQrZUgnVGEwayqSxqC0n8ey5hYXadS.', '2024-02-23 12:24:10', '2024-02-23 12:24:10'),
(8, 'paper', 'yellow', 'yellowpaper1234', '', 'yellowpaper@gmail.com', '0000-00-00', '$2y$10$Iev1OqTu.nfmgh.P/UO5QeHgtdPfs8ARdSstdGDLHP0H9SGeqCFr2', '2024-02-23 12:26:29', '2024-02-23 12:26:29'),
(9, 'Mentaness', 'Bogarto', 'Bogarto24', '09085353978', 'bogart@gmail.com', '2003-12-23', '$2y$10$byju6GDSQn9g.CL9uoh5h.DWp0CaM4KFMmLyJC3GdtTuO5J5iaRfm', '2024-03-04 03:44:05', '2024-03-04 03:44:05'),
(10, 'Mindanao', 'Bansa', 'bansa1234', '09878765562', 'bansa@gmail.com', '2013-03-28', '$2y$10$XsPjIx0jYlPqiW.diiv6quChdIRLD7wUusb0XrNncLRh8cYUgsIza', '2024-03-04 06:07:35', '2024-03-04 06:07:35'),
(11, 'Manalo', 'Rebecca', 'rebecca12', '09876543212', 'rebecca12@gmail.com', '2002-04-20', '$2y$10$oWsWf0xQGbyK8fob0caIDeJ0VbejLqqzLVI1VAiHE50xJRqZT8Vie', '2024-04-20 15:07:12', '2024-04-20 15:07:12'),
(12, 'Herilla', 'Jovelle', 'jovelle12', '09876543212', 'jovelle12@gmail.com', '1999-12-21', '$2y$10$d/UEmSwRgxjWJczfUhgQH.C9naK3M.HkNTm7Pih9jfpYyH6Wg6Z/y', '2024-04-21 09:40:47', '2024-04-21 09:40:47'),
(13, 'Dela Chica', 'Bayani', 'bayani07', '09876543212', 'bayani07@gmail.com', '1960-09-07', '$2y$10$2Pt8444TLzpgn/JaPpP76.NEI9pAVbaZcEeGxaSOvAMVk22GXpTAm', '2024-04-21 10:44:02', '2024-04-21 10:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `userbooking`
--

CREATE TABLE `userbooking` (
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `contactnum` varchar(13) NOT NULL,
  `event` varchar(255) NOT NULL,
  `prefferdate` date NOT NULL,
  `Time` text NOT NULL,
  `equipment` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `bookingId` int NOT NULL,
  `status` varchar(159) NOT NULL,
  `usersignsId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usersigns`
--

CREATE TABLE `usersigns` (
  `id` int NOT NULL,
  `LastName` text NOT NULL,
  `FirstName` text NOT NULL,
  `Username` text NOT NULL,
  `Email` text NOT NULL,
  `ContactNo` varchar(13) NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usersigns`
--

INSERT INTO `usersigns` (`id`, `LastName`, `FirstName`, `Username`, `Email`, `ContactNo`, `Password`) VALUES
(1, '', '', '', '', '', '$2y$10$A1Lw502ChckNfzMu7oIWcOUOid/dF.czfi521KwRexPfNsKl4TmIK'),
(2, 'Ramirez', 'jen', 'jenramirez', 'jenramirez@gmail.com', '09517409512', '$2y$10$JSVK87HgKFGJyz8BkrlT9erNzyzCLyOCmu4xoMTPlZARA6iK92CP.'),
(3, 'Manalo', 'Cynthia', 'cynthia0605', 'cynthiadelachica@gmail.com', '09876543212', '$2y$10$IBd.TkM2adgehpzXobT3ROz3M26LjpagWpA.lWR.FJyrNip.Q8UPG'),
(4, 'Dela Chica', 'Bayani', 'bayani07', 'bayanidelachica@gmail.com', '09876543212', '$2y$10$w86ZwfA7wqR7MVwy/Yb44.M6L1XwXOVRCc/DnT8XTphzKyQhBspn6'),
(5, 'papel', 'notebook', 'papelnotebook1234', 'papelnotebook@gmail.com', '09876543212', '$2y$10$b/7DNgtWexfqJM4hXkfq2.tLn82.kMZ/beztwXtQZdbZKiSlO9c.6'),
(6, 'Manalo', 'Jekjek', 'jekjekmanalo', 'jekjekmanalo@gmail.com', '09876543212', '$2y$10$oJerKMgxQ5Ov1qKvLSoH2.aNlM6zAbQW775jtyOznwubfzBuU3WkO'),
(7, 'Manalo', 'Shantal', 'shantal1231', 'shantal@gmail.com', '09876532246', '$2y$10$VaJ1YUEFeT2P1HdN6L2ZveFJd7LCf7jbxHpSYezL5ZgTN8/4TsvNy'),
(8, 'Manalo', 'Christia', 'jekjek', 'jekjek@gmail.com', '09876543212', '$2y$10$4JHPnPSFIr6afXLAQJ.uTuARVE.6k4CpGgSUyu1qtDmXjzlTjRxHW'),
(9, 'Visayase', 'Luzone', 'luzonvisayas', 'luzonvisayas@gmail.com', '09876543212', '$2y$10$r.uqqg1PRD1jbF/Zww96l.LjNSWvvwJ1EBt7i.ZGhMPV4WNUzIGDa'),
(10, 'Ramirez Melendez jr', 'Jennifer Hadid', 'jen22', 'jenramirez25@gmail.com', '09876543212', '$2y$10$KNz3Ywi53WRPcV/vl0Hls.S73mVgdnSWF2TtkKS6pXAWatIO0Xtp2'),
(11, 'Rivera', 'Marian', 'marian12', 'marian12@gmail.com', '09876543212', '$2y$10$Gywn6wkchV8occJFHwk1L.UiYy.6JZNZ9B.QKijqpX68TJc8euh6S'),
(12, 'Manalo', 'Shellow', 'Shellow25', 'shellow25@gmail.com', '09876543212', '$2y$10$bcENsz2Cm6ABqIP/iihllu93GDdHtrDfWwNObZWOhJJdBSzDjzKeO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acceptbooking`
--
ALTER TABLE `acceptbooking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usersignsId` (`usersignsId`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`AnnounceID`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `usersignsid` (`usersignsid`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `newsevents`
--
ALTER TABLE `newsevents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `reportdonation`
--
ALTER TABLE `reportdonation`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblscdetails`
--
ALTER TABLE `tblscdetails`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `userbooking`
--
ALTER TABLE `userbooking`
  ADD PRIMARY KEY (`bookingId`),
  ADD KEY `usersignsId` (`usersignsId`);

--
-- Indexes for table `usersigns`
--
ALTER TABLE `usersigns`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acceptbooking`
--
ALTER TABLE `acceptbooking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `AnnounceID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `newsevents`
--
ALTER TABLE `newsevents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reportdonation`
--
ALTER TABLE `reportdonation`
  MODIFY `donation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblscdetails`
--
ALTER TABLE `tblscdetails`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userbooking`
--
ALTER TABLE `userbooking`
  MODIFY `bookingId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `usersigns`
--
ALTER TABLE `usersigns`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acceptbooking`
--
ALTER TABLE `acceptbooking`
  ADD CONSTRAINT `acceptbooking_ibfk_1` FOREIGN KEY (`usersignsId`) REFERENCES `usersigns` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`usersignsid`) REFERENCES `usersigns` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`adminId`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `newsevents`
--
ALTER TABLE `newsevents`
  ADD CONSTRAINT `newsevents_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `tblscdetails`
--
ALTER TABLE `tblscdetails`
  ADD CONSTRAINT `tblscdetails_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `userbooking`
--
ALTER TABLE `userbooking`
  ADD CONSTRAINT `userbooking_ibfk_1` FOREIGN KEY (`usersignsId`) REFERENCES `usersigns` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
