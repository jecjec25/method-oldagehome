-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2024 at 10:12 AM
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
  `Time` text NOT NULL,
  `prefferdate` text NOT NULL,
  `equipment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `comments` varchar(255) NOT NULL,
  `status` varchar(159) NOT NULL,
  `usersignsId` int DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `amount_raised` decimal(10,2) NOT NULL,
  `outcomes` varchar(255) NOT NULL,
  `acknowledgement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `acceptbooking`
--

INSERT INTO `acceptbooking` (`id`, `lastname`, `firstname`, `middlename`, `contactnum`, `event`, `Time`, `prefferdate`, `equipment`, `comments`, `status`, `usersignsId`, `description`, `amount_raised`, `outcomes`, `acknowledgement`) VALUES
(163, 'Manalo', 'Beatriz', 'Bornales', '09876532345', 'sheshe events', '9:00:00 - 11:00:00', '2024-06-17', 'jshsjhfskjf', 'skksksfmnks', 'Accepted', 38, 'Panget na event', 20000.00, '20000', '20000'),
(164, 'sjhskfnk', 'KJSFSKJF', 'ksfnsklfmhnk,', '09085353978', 'charity events', '11:00:00 - 13:00:00', '2024-06-17', 'giugbhguyjhn', 'jhiujghiuj', 'Accepted', 38, '', 0.00, '', ''),
(165, 'sfnskfmnsfkm', 'sfnksfn', 'sjfksjfnkf', '09085353978', 'skkfnksmfnmf', '13:00:00 - 15:00:00', '2024-06-17', 'speaker', 'efodhgiodgj', 'Accepted', 38, '', 0.00, '', ''),
(166, 'adljkdajmakd', 'sfjsfn', 'skslmlsk', '09123456789', 'skjfsjfmlk,sk', 'HalfDay-morning', '2024-06-18', 'kghdighnkdjghn', 'ljfkjdlkgjdogv', 'Accepted', 38, '', 0.00, '', ''),
(167, 'sfjsfknfhsifhsf', 'kghorihgijkm', 'sjsksknv', '09085353978', 'kahit ano na event', 'HalfDay-afternoon', '2024-06-18', 'speaker', 'questions and comments', 'Accepted', 38, '', 0.00, '', ''),
(168, 'wkfjkcwjoc', 'skjckjckw', 'ksjcskcjmlk', '09085353978', 'event mo ano', 'WholeDay', '2024-06-19', 'skjcsjmoslm', 'skcjsocjiskj', 'Accepted', 38, '', 0.00, '', '');

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
  `adminId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`AnnounceID`, `Title`, `Content`, `Author`, `Date_created`, `Date_modified`, `Start_date`, `End_date`, `Category`, `Priority`, `Attachments`, `Status`, `Target_audience`, `adminId`) VALUES
(13, 'egkngkengkwn', 'kjgdldjmglm', 'ejgeljgmlemg', '2024-04-22 13:23:17', '2024-04-21 07:23:36', '2024-04-21', '2024-06-30', 'events', 'hgihojoljo', '1716252924_cbc3c4f25c76f499ffbb.jpg', 'Archive', 'residents', NULL),
(18, 'jkahsdkjhaskjdhaskjdhaskjd', 'khjsahdjhjdhasjkdhsakjdhs', 'jhsjkahdasjkdjkashd', '2024-05-21 00:28:22', '2024-05-21 00:28:22', '2024-12-24', '2024-12-24', 'facilityupd', 'jksahdjkasjkhdjkashdasd', '1716252850_629c400f9353c2a98a2e.jpg', 'Draft', 'family, caregivers', NULL),
(19, 'ashdkjhabsjdhjk', 'hsakdhjhkhasak', 'jakshdjashdajksdhakjh', '2024-05-21 00:30:34', '2024-05-21 00:30:34', '2024-12-22', '2024-12-23', 'activities, healthtips', 'aksjhdjkahsdjk', '1716251434_3f0bf7bf15eeb04bda47.jpg', 'Draft', 'family', 2),
(20, 'akshdjkhjh', 'jasahdkjhakjh', 'jsahdjkh', '2024-05-21 00:31:37', '2024-05-21 00:31:37', '2023-12-24', '2023-12-24', 'activities, healthtips', ' sjsijfkjhdsfhjksd', '1716253011_ee57fbccff7a00918e8e.jpg', 'Archive', 'residents, family', NULL),
(21, 'title for announcement', 'wjwosjkcsickh', 'ksjciscksik', '2024-05-21 01:01:18', '2024-05-21 01:01:18', '2024-05-21', '2024-05-21', 'activities, healthtips', 'snkscjkc', '1716253312_b354854bcd6e0ded6fed.jpg', 'Published', 'caregivers, volunteers', NULL),
(22, 'announce ko pi', 'slfklsjmslfjm', 'sjfmljmdkvjm', '2024-05-21 04:39:15', '2024-05-21 04:39:15', '2024-05-21', '2024-05-21', 'activities, healthtips', 's,jmsjdksj', '1716266385_04a7ddcdfc438255e3f9.jpg', 'Published', 'family, caregivers', NULL),
(23, 'jahnjscnjnxj', 'sjhcjscnjskvsk', 'shcnjschnsjc', '2024-05-30 07:17:13', '2024-05-30 07:17:13', '2024-05-30', '2024-06-08', 'activities, healthtips', 'schcksskskhn', '1717053473_1acb65fd61f1465c68f1.jpg', 'Published', 'residents, family', NULL),
(24, 'sjchkscnjm', 'kssjcsikcn', 'ksjcksjcnk', '2024-05-30 07:19:15', '2024-05-30 07:19:15', '2024-05-30', '2024-06-08', 'events, activities', 'shscihncjms', '1717053605_15f43fabe7fca0af0906.jpg', 'Archive', 'residents, family', 2),
(25, 'announcement for today', 'djdkhnvjdvhn', 'ksjcshhnck', '2024-06-12 04:26:25', '2024-06-12 04:26:25', '2024-06-12', '2024-06-13', 'events, healthtips', 'dkvjdlkv,jldkv', '1718166385_8c00ef4f7284829732ff.jpg', 'Published', 'family, caregivers', 2),
(26, 'title ng announcement admin', 'skfjsliksvihvkj', 'kwjdslikjsiv', '2024-06-16 08:02:45', '2024-06-16 08:02:45', '2024-06-16', '2024-06-14', 'events', 'sfkkjfknvlks', '1718524965_3d0d9e8d56465f99a56b.jpg', 'Published', 'residents', 2),
(27, 'sdjvhdkivhli', 'ksjc.lsikjcslik', 'kjcskcjslik', '2024-06-16 08:53:52', '2024-06-16 08:53:52', '2024-06-16', '2024-06-17', 'events', 'dvhnekmvhik', '1718528032_96d0268e2fc41a5a79a4.jpg', 'Published', 'residents', 2);

-- --------------------------------------------------------

--
-- Table structure for table `elderneed`
--

CREATE TABLE `elderneed` (
  `id` int NOT NULL,
  `need` text NOT NULL,
  `description` text NOT NULL,
  `date_started` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `elderneed`
--

INSERT INTO `elderneed` (`id`, `need`, `description`, `date_started`, `date_modified`) VALUES
(3, 'damit ng lola', 'need ko po ng mga damit', '2024-05-01 02:09:21', '2024-04-30 18:09:57'),
(6, 'Need ni Tia', 'Donations for aruga', '2024-05-06 02:58:37', '2024-05-06 02:58:37'),
(7, 'need ni elder', 'diaper', '2024-05-06 06:00:57', '2024-05-06 06:00:57'),
(8, 'Needs ng lolo at lola', 'mga needs', '2024-05-06 06:31:55', '2024-05-06 06:31:55'),
(9, 'Diaper', 'Large, small, and medium', '2024-05-09 06:07:53', '2024-05-09 06:07:53'),
(10, 'diaper', 'wlfklskjvmd', '2024-06-05 01:13:31', '2024-06-05 01:13:31'),
(11, 'dlmdlvm', 'dvjmdlvmdl,v', '2024-06-05 01:13:40', '2024-06-05 01:13:40');

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
  `type` varchar(50) NOT NULL,
  `usersignsid` int DEFAULT NULL,
  `adminId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `Title`, `Description`, `Organizer`, `Start_date`, `End_date`, `Category`, `Status`, `Atendees`, `Attachments`, `type`, `usersignsid`, `adminId`) VALUES
(72, 'ksnsknsvknvsk', 'kjskjvisknvsk', 'ksjkjsksks', '2024-06-16', '2024-06-15', 'Social', 'Published', 'hdgihgkhdnkd', '1718523408_74c17c78ea8d3df7d35a.jpg', 'admin', NULL, 2),
(73, 'jfnkjshfnks,jh', 'ksjfskfjski', 'kshfnskjfhwkjs', '2024-06-16', '2024-06-17', 'Social', 'Published', 'sjhfskhfnsikf', '1718523446_82a4d5192918e8059bc3.jpg', 'admin', NULL, 2),
(75, 'Post ni use para sa event', 'Users', 'asdbjhasdjhasd', '2024-06-16', '2024-06-15', 'Social, Recreational', 'Published', 'mga pusher', '1718524097_56bc744bdd26b9728191.jpg', 'user', 38, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktbl`
--

CREATE TABLE `feedbacktbl` (
  `id` int NOT NULL,
  `status` text NOT NULL,
  `usersignsId` int DEFAULT NULL,
  `eventid` int DEFAULT NULL,
  `announceid` int DEFAULT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedbacktbl`
--

INSERT INTO `feedbacktbl` (`id`, `status`, `usersignsId`, `eventid`, `announceid`, `feedback`) VALUES
(89, 'Accepted', 38, NULL, NULL, 'Hello'),
(90, 'Accepted', 39, NULL, NULL, 'Feedback sa post ni admin'),
(91, 'Accepted', NULL, NULL, 22, 'feedback ni announce'),
(92, '', NULL, NULL, 13, 'feedback ko sa announcement'),
(93, '', NULL, NULL, 23, 'hjhahahahha'),
(94, 'Pending', 38, NULL, NULL, 'qwertyuiop'),
(95, '', NULL, NULL, 22, 'announcement sa feedback'),
(96, 'Pending', NULL, NULL, 23, 'feedback announcement'),
(97, 'Accepted', NULL, NULL, 23, 'announcing si jen'),
(98, 'Pending', NULL, NULL, 22, 'hjdfdshfjksd\r\n'),
(99, 'Accepted', NULL, NULL, 22, 'asdbsadbas'),
(100, 'Accepted', NULL, NULL, 13, 'ansldksalkd'),
(101, 'Accepted', 38, NULL, NULL, 'feedback ko to sa naka yellow na damit'),
(102, 'Accepted', 38, NULL, NULL, 'feedback ko sa lola nakangiti'),
(103, 'Accepted', 16, NULL, NULL, 'feedback ni jen sa angelica aaaa'),
(104, 'Accepted', 16, NULL, NULL, 'feedback ni jen sa yellow na damit'),
(105, 'Accepted', NULL, NULL, 25, 'boriinggggg'),
(106, 'Accepted', 38, 73, NULL, 'lalalalala');

-- --------------------------------------------------------

--
-- Table structure for table `inkinddonation_tbl`
--

CREATE TABLE `inkinddonation_tbl` (
  `id` int NOT NULL,
  `usersignsId` int NOT NULL,
  `Establishment` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `middlename` varchar(150) NOT NULL,
  `contactnum` bigint NOT NULL,
  `inKindDonationItem` varchar(150) NOT NULL,
  `picture` varchar(150) NOT NULL,
  `donationdate` date NOT NULL,
  `status` varchar(150) NOT NULL,
  `message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inkinddonation_tbl`
--

INSERT INTO `inkinddonation_tbl` (`id`, `usersignsId`, `Establishment`, `lastname`, `firstname`, `middlename`, `contactnum`, `inKindDonationItem`, `picture`, `donationdate`, `status`, `message`) VALUES
(14, 16, 'kjkdjvkvniks', 'sjksjsjv', 'sjfclsjslk', 'sjfsjfsij', 9123456789, 'skjfsifsoj', '1716225980_33a915e2f15289667b21.jpg', '2024-05-22', 'Received', 'sjfmlsj,fmsl.f,msf'),
(17, 16, 'wellow', 'iskjciskjck', 'kjscks,cjik', 'ksjcsikjcsk', 9987655656, 'damit pagkain na masarap', '1716228224_f5adc71d2c28ddc1ad79.jpg', '2024-05-23', 'Postponed', 'hehehhe'),
(18, 16, 'shehshe', 'skfhsjclk', 'dvnkdjnvxk', 'shnckd,jck,', 9633895646, 'scskcjks', '1716261988_48dd0e6df2c2578df4c3.jpg', '2024-05-22', 'pending', 'ljfemdfkemd'),
(19, 16, 'vnfkjvfkfkv', 'dknckdnck', 'ksjshjh', 'kkcksjckm', 9987655656, 'djchndjcndjmc', '1717054315_739da18647c358841a17.jpg', '2024-05-30', 'pending', 'cjhdjcndjmc'),
(20, 16, 'hnhehnek', 'vjevkjek', 'skjkdjvk', 'dvkjdkjmv', 9085353978, 'fhdvhnvjm', '1717054351_453c8a149e63136b3061.jpg', '2024-05-30', 'pending', 'jhfkvnfvjhn');

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
  `adminId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `newsevents`
--

INSERT INTO `newsevents` (`id`, `title`, `Content`, `author`, `date_published`, `Category`, `picture`, `status`, `adminId`) VALUES
(37, 'dmvnkdnvdkm', 'dmndkvndkm', 'mvndk,vjkem', '2024-05-30 07:03:47', 'Health, Community', '1717052627_b9b57fee39c47dbb6040.jpg', 'Published', 2),
(38, 'jvksnvknvsxkjm', 'ksjvksmvnjvm', 'ksjcskchnskmcn', '2024-05-30 07:12:46', 'Community, Staff', '1717053193_42d587a3778238bab1da.jpg', 'Published', NULL),
(39, 'kchskcnksjmc', 'smhckschnjm', 'mchnksmchn', '2024-05-30 07:14:47', 'Community, Staff', '1717053313_659a74b65311facc553b.jpg', 'Archive', 2),
(41, 'agjhd', 'jhgajhdsg', 'hjasdjhag', '2024-05-30 09:01:38', 'Health, Community', '1717059698_124da0dff5bdcaf7e45a.jpg', 'Draft', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text,
  `price` float(12,2) NOT NULL DEFAULT '0.00',
  `quantity` int NOT NULL,
  `prodpic` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `description`, `price`, `quantity`, `prodpic`, `created_at`, `updated_at`) VALUES
(1, '112233', 'Sabon Panlaba', 'Product ni tia', 50.00, 14, '', '2024-06-12 01:35:57', '2024-06-15 12:12:21'),
(18, '1112', 'Bracelet', 'Bracelet for yous', 20.00, 49, '', '2024-05-08 23:09:13', '2024-06-16 18:05:19'),
(19, '1121', 'Thick Bracelet', 'Bracelet na makapal', 20.00, 9, '', '2024-05-08 23:31:37', '2024-06-12 00:42:03'),
(20, '1211', 'Thin Bracelet', 'A colorful bracelet that is thin', 10.00, 8, '', '2024-05-09 00:10:25', '2024-06-12 00:42:03'),
(21, '1212', 'Bracelet with Name', 'A bracelet with a name on it', 20.00, 9, '', '2024-05-09 00:11:17', '2024-06-12 00:40:57'),
(22, '1221', 'Mama Mary', 'A statue of Mama Mary', 100.00, 10, '', '2024-05-09 00:11:56', '2024-06-11 23:52:24'),
(23, '1222', 'Pot Holder (3pcs.)', 'A round pot holder for the kitchen', 100.00, 10, '', '2024-05-09 00:13:06', '2024-06-11 23:52:27'),
(24, '1113', 'Doormat', 'A rectangular shape of doormat', 50.00, 10, '', '2024-05-09 00:14:17', '2024-06-11 23:52:31'),
(25, '1131', 'Round Doormat', 'A round shape of doormat that is for you', 50.00, 10, '', '2024-05-09 00:15:28', '2024-06-11 23:52:34'),
(26, '1311', 'Damcloth', 'A damcloth for the kitchen', 100.00, 10, '', '2024-05-09 00:16:31', '2024-06-11 23:52:37'),
(27, '1313', 'Angel', 'Angel statue for the your altar', 100.00, 10, '', '2024-05-09 00:17:23', '2024-06-11 23:52:41'),
(28, '1331', 'Rosary', 'A simple rosary for you', 20.00, 10, '', '2024-05-09 00:18:17', '2024-06-11 23:52:45'),
(29, '1333', 'Black Nazaren', 'Black Nazaren statue for your altar', 100.00, 8, '', '2024-05-09 00:19:02', '2024-06-12 00:57:08');

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
(9, '2024-04-04', 'Curba, Kyle', 'Monetary', '200000', 'Doormat ni lola');

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
(3, 'Shellow Manalo', '09085353978', 'shellomanalo@gmail.com', '2024-03-07 07:41:46', 'kumain ka na ng catfood', 'Read'),
(4, 'Dan Keneth Rontale', '09568319369', 'rontale@gmail.com', '2024-03-07 07:42:19', 'Ang pogi mo kuya\r\n\r\n ', 'Read'),
(5, 'Christiia Angelica Dela Chica', '09261454009', 'changeldc11@gmail.com', '2024-04-08 05:11:38', ' parang isang panaginip', 'Read'),
(6, 'hay nako', '09158524165', 'jekjek@gmail.com', '2024-04-08 05:13:14', ' iyong iyo', 'Read'),
(7, 'dan keneth', '09876543212', 'dalandan@gmail.com', '2024-04-08 05:14:51', ' di ko na ililihim pa\r\n', 'Read'),
(8, 'Jennifer Ramirez', '09876543212', 'jenramirez@gmail.com', '2024-04-08 05:16:04', ' akoy iyong iyo', 'Read'),
(9, 'Rosela Manalo', '09085353978', 'asjhdhh', '2024-04-08 05:17:02', 'sadguhsadg\r\n\r\n\r\n ', 'Read'),
(10, 'Cynthia Herilla Manalo', '09986532451', 'hello@gmail.com', '2024-04-08 05:21:21', 'shdfuhjs ', 'Unread'),
(11, 'Christia', '09876543212', 'christia25@gmail.com', '2024-04-09 03:26:21', ' haaksks', 'Unread'),
(12, 'amdnkadkad', '09764345678', 'christia25@gmail.com', '2024-04-21 09:08:34', ' hyfujhiihitujojo', 'Read');

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
(18, 'Bracelet with Name', 10, '20', 'Bracelet with name on it', 'bracelet name.jpg'),
(19, 'Mama Mary', 12, '100', 'Mama Mary', 'mamamary.jpg'),
(20, 'Pot holder', 10, '100', '3 pcs.  for 100', 'patholder.jpg'),
(21, 'Doormat', 12, '50', 'Rectangle doormat', 'rectangle doormat.jpg'),
(22, 'Round Doormat', 20, '50', 'Round doormat', 'round doormat.jpg'),
(23, 'Damcloth', 10, '100', 'Damcloth for you', 'thick patholder.jpg'),
(24, 'Angel', 12, '100', 'Angel statue for you', 'angel.jpg'),
(25, 'Rosary', 24, '20', 'Rosary for you', '20240127_130349.jpg'),
(26, 'Black Nazaren', 13, '100', 'Black Nazaren for you', 'blacknazaren.jpg'),
(27, 'Ballpen ni Christia', 23, '30', 'Ballpen ni Tia sa Visualization', '20240127_130239.jpg'),
(28, 'hsikjskcs', 50, '200', 'sjkhksnksm', '1716720286_596d6ce6195b267191f7.jpg'),
(29, 's,kjslkmsk', 21, '30', 'akjdlakjdmlka', '1716720190_f320f97c500d1ac182ae.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblscdetails`
--

CREATE TABLE `tblscdetails` (
  `Id` int NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `nickname` varchar(250) NOT NULL,
  `DateBirth` date DEFAULT NULL,
  `gender` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `marital_stat` varchar(100) NOT NULL,
  `ContNum` varchar(20) DEFAULT NULL,
  `ComAdd` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `ProfPic` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `EmergencyAdd` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `EmergencyContNum` varchar(20) DEFAULT NULL,
  `RegDate` date NOT NULL,
  `scstatus` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `InputedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `departuredate` text NOT NULL,
  `reasonleft` text NOT NULL,
  `datedeath` text NOT NULL,
  `causedeath` text NOT NULL,
  `adminId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblscdetails`
--

INSERT INTO `tblscdetails` (`Id`, `lastname`, `firstname`, `middlename`, `nickname`, `DateBirth`, `gender`, `marital_stat`, `ContNum`, `ComAdd`, `ProfPic`, `EmergencyAdd`, `EmergencyContNum`, `RegDate`, `scstatus`, `InputedDate`, `departuredate`, `reasonleft`, `datedeath`, `causedeath`, `adminId`) VALUES
(78, 'Manalo', 'Cynthia', 'Herilla', 'Set', '1960-06-05', 'Female', 'Single', '09123456789', 'Camansihan, Calapan City', 'areno.jpg', 'Camansihan, Calapan City', '09123456789', '2024-05-01', 'Unarchive', '2024-05-01 15:54:56', '', '', '2024-05-21', 'tuberculosis', 2),
(79, 'Atienzas', 'Helens', 'Ramirez', 'Helen', '1950-12-25', 'Female', 'Married', '09123456789', 'Bayanan 2, Calapan City, Oriental Mindoro', 'adan.jpg', 'Bayanan 2, Calapan City, Oriental Mindoro', '09123456789', '2024-01-01', 'Unarchive', '2024-05-01 15:56:24', '', '', '', '', 2),
(80, 'Rontale', 'Dan Keneth', 'Madrigal', 'Kenchin', '1950-07-06', 'Male', 'Single', '09123456789', 'Tawiran, Calapan City', 'boongaling.jpg', 'Tawiran, Calapan City<br>', '09123456789', '2024-05-01', 'Unarchive', '2024-05-01 15:57:59', '', '', '2024-05-21', 'tb', 2),
(81, 'Ramirez', 'Jennifer', 'Melendez', 'Jen', '1967-01-25', 'Female', 'Single', '09123456789', 'Canubing, Calapan City', 'boongaling.jpg', 'Canubing, Calapan City<br>', '09123456789', '2024-05-03', 'Unarchive', '2024-05-03 22:29:16', '', '', '', '', 2),
(83, 'Manalo', 'Santiago', 'Herilla', 'Manoy', '1959-02-14', 'Male', 'Married', '09123456789', 'Camansihan, Calapan City', 'adan.jpg', 'Camansihan, Calapan City<br>', '09123456789', '2024-05-06', 'Unarchive', '2024-05-06 11:09:50', '', '', '', '', 2),
(85, 'Manalo', 'Bianca', 'Gonzales', 'ninay', '1960-12-25', 'female', 'Widowed', '09876543212', 'Lapaz', 'axel.jpg', 'Calapan', '09158524161', '2023-05-07', 'Unarchive', '2024-05-07 00:57:46', '2024-05-21', 'family member came to take', '', '', 2),
(86, 'Dela Chica', 'Shellow', 'Marasa', 'Shell', '1960-12-25', 'Male', 'Divorced', '09876543212', 'saoidj', 'gusto.jpg', 'asndkjn', '09085353978', '2024-07-05', 'Unarchive', '2024-05-07 01:00:05', '2024-05-21', 'today i left', '', '', 2),
(87, 'Marino', 'Michael', 'Manalo', 'Mikmik', '1951-01-03', 'Male', 'Single', '09123456789', 'Tagbungan, Baco, Oriental Mindoro', 'adan.jpg', 'Tagbungan, Baco, Oriental Mindoro<br>', '09123456789', '2024-05-09', 'Unarchive', '2024-05-09 12:48:56', '', '', '', '', 2),
(93, 'pikachu', 'jjcknckk', 'kncknnc', 'kak,cjmkjcm', '1954-12-25', 'Female', 'Married', '09123456789', 'sfjsfniksjnk', '1716718667_c5ba22f280f49f5ab25a.jpg', 'sjnksnkvmn', '09123456789', '2024-05-19', 'Unarchive', '2024-05-19 09:20:39', '', '', '', '', 2),
(94, 'adkadjdka', 'ksjcksj', 'kjcoskjc', 'akdjaodj', '1945-12-25', 'Female', 'Single', '09876543212', 'sjncsikjcsik', '1716362108_61c66708e0768c8b5108.jpg', 'sckscnskm', '09123456789', '2024-05-22', 'Deceased', '2024-05-22 15:15:08', '', '', '2024-05-26', 'tuberculosis', 2),
(96, 'hncflskjvl', 'kjscskj', 'kjcsckjl', 'skjcsickj', '1942-12-25', 'Female', 'Married', '09876543212', 'shjcnjc', '1716445660_3a6024beca0943995377.jpg', 'mcnldkjcmdik', '09123456789', '2024-05-23', 'Left', '2024-05-23 14:27:40', '2024-05-23', 'hehehe', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `Id` int NOT NULL,
  `Time` time NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`Id`, `Time`, `Status`) VALUES
(1, '09:00:00', 'Available'),
(2, '11:00:00', 'Avaible'),
(3, '13:00:00', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(100) NOT NULL,
  `customer` varchar(250) NOT NULL,
  `total_amount` float(12,2) NOT NULL DEFAULT '0.00',
  `tendered` float(12,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `code`, `customer`, `total_amount`, `tendered`, `created_at`, `updated_at`) VALUES
(5, '2024050800002', 'Jennifer Ramirez', 40.00, 50.00, '2024-05-08 23:13:08', '2024-05-08 23:13:08'),
(6, '2024050800001', 'Kyle Curba', 220.00, 250.00, '2024-05-09 00:21:00', '2024-05-09 00:21:00'),
(7, '2024050900001', 'Nicolle Gutierrez', 20.00, 50.00, '2024-05-09 10:26:14', '2024-05-09 10:26:14'),
(8, '2024051000001', 'nics', 60.00, 100.00, '2024-05-10 11:52:59', '2024-05-10 11:52:59'),
(9, '2024051300001', 'Dan', 40.00, 50.00, '2024-05-13 21:54:49', '2024-05-13 21:54:49'),
(14, '2024051300002', 'jekjek', 30.00, 100.00, '2024-05-13 22:02:28', '2024-05-13 22:02:28'),
(15, '2024051300003', 'Shellow', 10.00, 20.00, '2024-05-13 23:56:46', '2024-05-13 23:56:46'),
(16, '2024052100001', 'jenny ruby', 40.00, 200.00, '2024-05-21 12:30:01', '2024-05-21 12:30:01'),
(17, '2024052100002', 'cpp', 60.00, 500.00, '2024-05-21 12:57:04', '2024-05-21 12:57:04'),
(18, '2024061100001', '', 20.00, 0.00, '2024-06-12 00:25:47', '2024-06-12 00:25:47'),
(19, '2024061100002', '', 20.00, 0.00, '2024-06-12 00:26:18', '2024-06-12 00:26:18'),
(20, '2024061100003', '', 20.00, 0.00, '2024-06-12 00:27:28', '2024-06-12 00:27:28'),
(21, '2024061100004', '', 20.00, 0.00, '2024-06-12 00:27:59', '2024-06-12 00:27:59'),
(22, '2024061100005', '', 20.00, 0.00, '2024-06-12 00:28:48', '2024-06-12 00:28:48'),
(23, '2024061100006', '', 20.00, 0.00, '2024-06-12 00:29:13', '2024-06-12 00:29:13'),
(24, '2024061100007', '', 20.00, 0.00, '2024-06-12 00:29:33', '2024-06-12 00:29:33'),
(25, '2024061100008', '', 20.00, 0.00, '2024-06-12 00:30:37', '2024-06-12 00:30:37'),
(26, '2024061100009', '', 20.00, 0.00, '2024-06-12 00:30:55', '2024-06-12 00:30:55'),
(27, '2024061100010', '', 20.00, 0.00, '2024-06-12 00:31:13', '2024-06-12 00:31:13'),
(28, '2024061100011', '', 20.00, 0.00, '2024-06-12 00:31:24', '2024-06-12 00:31:24'),
(29, '2024061100012', '', 20.00, 0.00, '2024-06-12 00:31:29', '2024-06-12 00:31:29'),
(30, '2024061100013', '', 20.00, 0.00, '2024-06-12 00:32:55', '2024-06-12 00:32:55'),
(31, '2024061100014', '', 20.00, 0.00, '2024-06-12 00:34:03', '2024-06-12 00:34:03'),
(32, '2024061100015', '', 20.00, 0.00, '2024-06-12 00:34:15', '2024-06-12 00:34:15'),
(33, '2024061100016', '', 20.00, 0.00, '2024-06-12 00:34:19', '2024-06-12 00:34:19'),
(34, '2024061100017', '', 20.00, 0.00, '2024-06-12 00:35:11', '2024-06-12 00:35:11'),
(35, '2024061100018', '', 20.00, 0.00, '2024-06-12 00:35:22', '2024-06-12 00:35:22'),
(36, '2024061100019', '', 20.00, 0.00, '2024-06-12 00:35:30', '2024-06-12 00:35:30'),
(37, '2024061100020', '', 20.00, 0.00, '2024-06-12 00:36:25', '2024-06-12 00:36:25'),
(38, '2024061100021', '', 20.00, 0.00, '2024-06-12 00:38:08', '2024-06-12 00:38:08'),
(39, '2024061100022', '', 20.00, 0.00, '2024-06-12 00:38:18', '2024-06-12 00:38:18'),
(40, '2024061100023', '', 20.00, 0.00, '2024-06-12 00:38:38', '2024-06-12 00:38:38'),
(41, '2024061100024', '', 20.00, 0.00, '2024-06-12 00:40:20', '2024-06-12 00:40:20'),
(42, '2024061100025', '', 20.00, 0.00, '2024-06-12 00:40:57', '2024-06-12 00:40:57'),
(43, '2024061100026', 'Christia', 40.00, 50.00, '2024-06-12 00:42:03', '2024-06-12 00:42:03'),
(44, '2024061100027', 'sheshe', 200.00, 500.00, '2024-06-12 00:57:08', '2024-06-12 00:57:08'),
(45, '2024061200001', 'Shellow', 150.00, 200.00, '2024-06-12 13:22:43', '2024-06-12 13:22:43'),
(46, '2024061500001', 'jenny jane', 150.00, 200.00, '2024-06-15 12:12:20', '2024-06-15 12:12:20'),
(47, '2024061500002', 'jekjek', 160.00, 200.00, '2024-06-15 12:13:33', '2024-06-15 12:13:33'),
(48, '2024061600001', 'shantal', 200.00, 200.00, '2024-06-16 18:05:19', '2024-06-16 18:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE `transaction_items` (
  `transaction_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `price` float(12,2) NOT NULL DEFAULT '0.00',
  `quantity` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`transaction_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(5, 18, 20.00, 2, '2024-05-08 23:13:08', '2024-05-08 23:13:08'),
(6, 21, 20.00, 1, '2024-05-09 00:21:00', '2024-05-09 00:21:00'),
(6, 22, 100.00, 1, '2024-05-09 00:21:00', '2024-05-09 00:21:00'),
(6, 24, 50.00, 2, '2024-05-09 00:21:00', '2024-05-09 00:21:00'),
(7, 20, 10.00, 2, '2024-05-09 10:26:14', '2024-05-09 10:26:14'),
(8, 21, 20.00, 3, '2024-05-10 11:52:59', '2024-05-10 11:52:59'),
(0, 19, 20.00, 2, '2024-05-13 21:54:49', '2024-05-13 21:54:49'),
(14, 20, 10.00, 3, '2024-05-13 22:02:28', '2024-05-13 22:02:28'),
(15, 20, 10.00, 1, '2024-05-13 23:56:46', '2024-05-13 23:56:46'),
(16, 21, 20.00, 2, '2024-05-21 12:30:01', '2024-05-21 12:30:01'),
(17, 19, 20.00, 3, '2024-05-21 12:57:04', '2024-05-21 12:57:04'),
(18, 19, 20.00, 1, '2024-06-12 00:25:47', '2024-06-12 00:25:47'),
(19, 19, 20.00, 1, '2024-06-12 00:26:18', '2024-06-12 00:26:18'),
(20, 19, 20.00, 1, '2024-06-12 00:27:28', '2024-06-12 00:27:28'),
(21, 19, 20.00, 1, '2024-06-12 00:27:59', '2024-06-12 00:27:59'),
(22, 19, 20.00, 1, '2024-06-12 00:28:48', '2024-06-12 00:28:48'),
(23, 19, 20.00, 1, '2024-06-12 00:29:13', '2024-06-12 00:29:13'),
(24, 19, 20.00, 1, '2024-06-12 00:29:33', '2024-06-12 00:29:33'),
(25, 19, 20.00, 1, '2024-06-12 00:30:37', '2024-06-12 00:30:37'),
(26, 19, 20.00, 1, '2024-06-12 00:30:55', '2024-06-12 00:30:55'),
(27, 19, 20.00, 1, '2024-06-12 00:31:13', '2024-06-12 00:31:13'),
(28, 19, 20.00, 1, '2024-06-12 00:31:24', '2024-06-12 00:31:24'),
(29, 19, 20.00, 1, '2024-06-12 00:31:29', '2024-06-12 00:31:29'),
(30, 19, 20.00, 1, '2024-06-12 00:32:55', '2024-06-12 00:32:55'),
(31, 19, 20.00, 1, '2024-06-12 00:34:03', '2024-06-12 00:34:03'),
(32, 19, 20.00, 1, '2024-06-12 00:34:15', '2024-06-12 00:34:15'),
(33, 19, 20.00, 1, '2024-06-12 00:34:20', '2024-06-12 00:34:20'),
(34, 19, 20.00, 1, '2024-06-12 00:35:11', '2024-06-12 00:35:11'),
(35, 19, 20.00, 1, '2024-06-12 00:35:22', '2024-06-12 00:35:22'),
(36, 19, 20.00, 1, '2024-06-12 00:35:30', '2024-06-12 00:35:30'),
(37, 19, 20.00, 1, '2024-06-12 00:36:25', '2024-06-12 00:36:25'),
(38, 19, 20.00, 1, '2024-06-12 00:38:08', '2024-06-12 00:38:08'),
(39, 19, 20.00, 1, '2024-06-12 00:38:18', '2024-06-12 00:38:18'),
(40, 19, 20.00, 1, '2024-06-12 00:38:38', '2024-06-12 00:38:38'),
(41, 19, 20.00, 1, '2024-06-12 00:40:20', '2024-06-12 00:40:20'),
(42, 21, 20.00, 1, '2024-06-12 00:40:57', '2024-06-12 00:40:57'),
(43, 19, 20.00, 1, '2024-06-12 00:42:03', '2024-06-12 00:42:03'),
(43, 20, 10.00, 2, '2024-06-12 00:42:03', '2024-06-12 00:42:03'),
(44, 29, 100.00, 2, '2024-06-12 00:57:08', '2024-06-12 00:57:08'),
(45, 1, 50.00, 3, '2024-06-12 13:22:43', '2024-06-12 13:22:43'),
(46, 1, 50.00, 3, '2024-06-15 12:12:21', '2024-06-15 12:12:21'),
(47, 18, 20.00, 8, '2024-06-15 12:13:34', '2024-06-15 12:13:34'),
(48, 18, 20.00, 10, '2024-06-16 18:05:19', '2024-06-16 18:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int NOT NULL,
  `verification_token` text NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `user_img` varchar(150) NOT NULL,
  `Username` varchar(150) NOT NULL,
  `ContactNo` varchar(50) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `role` text NOT NULL,
  `birthday` date NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `verification_token`, `is_verified`, `LastName`, `FirstName`, `user_img`, `Username`, `ContactNo`, `Email`, `role`, `birthday`, `Password`, `Created_At`, `Update_At`) VALUES
(2, '', 1, 'Dela Chica', 'Christia', '1716714625_23ec69030b0b83ea20fc.jpg', 'christia25', '09633895626', 'christia25@gmail.com', 'MainAdmin', '2002-12-25', '$2y$10$mCyCYd2b6efQiKMj.z30mONbP2yrTGubK3s.tKJrlVq9OxUud4TfC', '2024-02-18 06:40:43', '2024-02-18 06:40:43'),
(14, '', 0, 'Yuya', 'Sakaki', '', 'Yuya21', '09876542212', 'Yuya@gmail.com', 'Booker', '2003-05-21', '$2y$10$jtKylCBYV6mayI0V8Jtmyem.rNeMdMm1nOPq49RsR06YuEmLKyEL.', '2024-05-07 05:42:12', '2024-05-07 05:42:12'),
(15, '', 0, 'pogi', 'si ako', '', 'pogi123', '09876543212', 'pogi@gmail.com', 'Admin', '2003-12-25', '$2y$10$fhIvqYZrA2k9N89Bem5k3ODfl8ohCImXaJWJEmzDCsE4pa5Docyj2', '2024-05-07 06:15:40', '2024-05-07 06:15:40'),
(16, '', 1, 'Ramirezs', 'Jenny ', '', 'Jenny', '09876543212', 'jenny@gmail.com', 'Booker', '0000-00-00', '$2y$10$WAyNwAbWdz/wSwJ8THuZ2ebt5mAha6FZTaV2MeC1NeFy0Bv./BZMy', '2024-05-07 06:28:03', '2024-05-07 06:28:03'),
(19, '', 0, 'Herilla', 'Jovelle', '', 'jovelle123', '09876543212', 'jovelleherilla123@gmail.com', 'Booker', '1999-12-24', '$2y$10$Kz9ydona34ob1Fu/0Ph56eG3ExUPKrfMI2LJOJ3LxZoZWoMbXNile', '2024-05-25 08:38:58', '2024-05-25 08:38:58'),
(20, '', 0, 'Rontale', 'Danna', '', 'danna123', '09876543212', 'dannarontale@gmail.com', 'Booker', '1998-07-06', '$2y$10$dT4cz1VLbzeV2PPS8D8i.uLJ2ruP5HaKiWOmqhGRxZs1KFcbkBgDi', '2024-05-25 08:58:12', '2024-05-25 08:58:12'),
(21, '', 0, 'Manalo', 'Christia', '', 'christia123', '09876542212', 'christia123@gmail.com', 'Admin', '2022-12-25', '$2y$10$BqC79JdMnb/HBPTGFciN4OC8lbdd3LUA1ppM0Hte9UiG4BrduQb76', '2024-05-25 09:05:29', '2024-05-25 09:05:29'),
(22, '', 0, 'Manalo', 'Jekjek', '', 'jekjek05', '09876542212', 'jekjek05@gmail.com', 'Booker', '2002-12-25', '$2y$10$nM4k3fCeUfJfrx25617FJed5dTKdskajx9zHjaPagJgT7qtFn/8dy', '2024-05-26 09:18:50', '2024-05-26 09:18:50'),
(23, '', 0, 'Manalo', 'Angelica', '1716727402_fd0b29ec69fc609e17cb.jpg', 'angelica25', '09876543212', 'angelicamanalo@gmail.com', 'Admin', '2002-12-25', '$2y$10$5l1nEs1SLCuXfGy.uS6liehjG5IL1UT7/sYofAxQS2EoCGKg7EOM6', '2024-05-26 12:42:22', '2024-05-26 12:42:22'),
(24, '', 0, 'Rontale', 'Dan Keneth', '1716729215_a6257e83d696237889db.jpg', 'Rontale12', '09876435732', 'rontale@gmail.com', 'Admin', '2003-12-03', '$2y$10$1igxmCnq.VrP0SgSOT.sreCgPwK4/p5HoSRB3AprN6wRIr4FHVo8e', '2024-05-26 13:13:35', '2024-05-26 13:13:35'),
(25, '', 0, 'Mendoza', 'Francheska', '1716731563_94df9161481a20c20322.jpg', 'cheska06', '09876543212', 'cheskamendoza@gmail.com', 'Admin', '2000-12-06', '$2y$10$3jPQ/3WO7JCS4DcPVhO1uOZfGqlDPgmRvqrm.SfDN6/ajRJW2NhWO', '2024-05-26 13:30:15', '2024-05-26 13:30:15'),
(27, '', 0, 'Manalo', 'Dan Keneth', '', 'dankeneth06', '09876543212', 'dankenethrontale@gmail.com', 'Booker', '2003-07-06', '$2y$10$y9jCN8XcIADaN56XlARquuGh4.ldUgKFiZGsS51oUfFD5H8rYKvlG', '2024-05-30 04:24:51', '2024-05-30 04:24:51'),
(28, '', 0, 'Manalo', 'Arman', '1717043468_629cd3af76ecae7aa4c5.jpg', 'arman123', '09876543212', 'armanmanalo@gmail.com', 'Admin', '2002-05-22', '$2y$10$UzZ.NzPDAfm2GMhJ20d3G.upFbzhoQUECiB5ncfbkcrnylYDtI8ZK', '2024-05-30 04:31:08', '2024-05-30 04:31:08'),
(37, '', 1, 'Rontale', 'Dan Keneth', '', 'DanDan', '09876543212', 'rontaledankeneth@gmail.com', 'Booker', '2024-06-05', '$2y$10$d7VEBDX.yQ5f2baJWz8bweotllgEseAQ5EHhpc2AFYoSqk46t88Me', '2024-06-05 12:49:40', '2024-06-05 12:49:40'),
(38, '', 1, 'Dela Chica', 'Christia Angelica', '', 'chaje', '09261454009', 'changeldc11@gmail.com', 'Booker', '0000-00-00', '$2y$10$zsROHudedXg3LJH7riJrhuhYwL9qeMKfioPXE9wgP7kmRGi124lCC', '2024-06-06 06:42:27', '2024-06-06 06:42:27'),
(39, '', 1, 'Ramirez', 'Jennifer', '', 'jenjen', '09876543212', 'jenniferramirez0201@gmail.com', 'Booker', '0000-00-00', '$2y$10$NtFHxJ/kv57J1wFeT5wELewsVJZC5tvEHM0yjyzeXKO/wBXGtsgeC', '2024-06-06 08:29:08', '2024-06-06 08:29:08');

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
  `prefferdate` varchar(150) NOT NULL,
  `Time` text NOT NULL,
  `equipment` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `bookingId` int NOT NULL,
  `status` varchar(159) NOT NULL,
  `usersignsId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userbooking`
--

INSERT INTO `userbooking` (`lastname`, `firstname`, `middlename`, `contactnum`, `event`, `prefferdate`, `Time`, `equipment`, `comments`, `bookingId`, `status`, `usersignsId`) VALUES
('Ramirez', 'Christia', 'Curba', '09085353978', 'walang magawa event', '06/20/2024', '09:00:00', 'Mga sound effects', 'HEllo World', 205, 'pending', 38),
('sadasd', 'sfas', 'sdfsfd', '09987655656', 'dsfdsf', '06/29/2024', '09:00:00', 'sdfsdf', 'dsfsd', 206, 'pending', 38),
('asdaws', 'edsfsaf', 'dsfasf', '09987655656', 'sadasd', '06/26/2024', '09:00:00', 'dsfsdf', 'dsfdsf', 207, 'pending', 38),
('ashdjkh', 'jkshdfjksh', 'sdhfjkh', '09123456789', 'sjdfhjksdh', '06/11/2024', '09:00:00', 'hdskjfhsjdkf', 'hdsjfkhj', 209, 'pending', 38);

-- --------------------------------------------------------

--
-- Table structure for table `userdonation`
--

CREATE TABLE `userdonation` (
  `id` int NOT NULL,
  `usersignsId` int DEFAULT NULL,
  `establishment` varchar(150) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `contactnum` bigint NOT NULL,
  `donationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cashDonation` float DEFAULT NULL,
  `cashCheck` float DEFAULT NULL,
  `picture` varchar(250) NOT NULL,
  `referencenum` varchar(50) NOT NULL,
  `status` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `mumosahapag` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userdonation`
--

INSERT INTO `userdonation` (`id`, `usersignsId`, `establishment`, `lastname`, `firstname`, `middlename`, `contactnum`, `donationdate`, `cashDonation`, `cashCheck`, `picture`, `referencenum`, `status`, `message`, `mumosahapag`) VALUES
(36, 16, 'Hello', 'Manalo', 'Christia Angelica', 'Manalo', 9123456789, '2024-05-20 17:38:45', 0, 38000, '1716226725_e99edecb5b3ed8a0010c.jpg', '2213142A', 'Postponed', 'hello', 0),
(38, 22, 'ihoiekjfeoifk', 'sjcjcjc', 'idkjikvdjik', 'jscjsoco', 9085353978, '2024-05-26 09:19:47', 20000, 0, '', '12341A', 'Received', 'ldkldc.kmclkd;dl', 0),
(40, 16, 'shashasjmckjc', 'kskjcslcj', 'oscjcmlsck', 'olscjksklc', 9085353978, '2024-06-04 18:10:42', 0, 0, '', '2213142A', 'pending', 'iujdikjdikv', 0);

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
(15, 'Santiago', 'Manalo', 'santiago15', 'santiagomanalo@gmail.com', '09876543212', '$2y$10$jRYWnrYcOCPjPxKdhO1ftugVN4oHHxmPWz4h3vCWMBqDTMSXrr9ce'),
(16, 'Ramirez jr', 'Jenny jr', 'Jenny023', 'jenny@gmail.com', '09876543212', '$2y$10$8WRUiEuiEDwT9J/qu0i5MugpAZK/lV469v9SgOzLZ6AJZITfi9qr6');

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
-- Indexes for table `elderneed`
--
ALTER TABLE `elderneed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `usersignsid` (`usersignsid`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `feedbacktbl`
--
ALTER TABLE `feedbacktbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usersignsId` (`usersignsId`,`eventid`,`announceid`),
  ADD KEY `announceid` (`announceid`),
  ADD KEY `eventid` (`eventid`);

--
-- Indexes for table `inkinddonation_tbl`
--
ALTER TABLE `inkinddonation_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usersignsid` (`usersignsId`);

--
-- Indexes for table `newsevents`
--
ALTER TABLE `newsevents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `userdonation`
--
ALTER TABLE `userdonation`
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `AnnounceID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `elderneed`
--
ALTER TABLE `elderneed`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `feedbacktbl`
--
ALTER TABLE `feedbacktbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `inkinddonation_tbl`
--
ALTER TABLE `inkinddonation_tbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `newsevents`
--
ALTER TABLE `newsevents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reportdonation`
--
ALTER TABLE `reportdonation`
  MODIFY `donation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tblscdetails`
--
ALTER TABLE `tblscdetails`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `userbooking`
--
ALTER TABLE `userbooking`
  MODIFY `bookingId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `userdonation`
--
ALTER TABLE `userdonation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `usersigns`
--
ALTER TABLE `usersigns`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acceptbooking`
--
ALTER TABLE `acceptbooking`
  ADD CONSTRAINT `acceptbooking_ibfk_1` FOREIGN KEY (`usersignsId`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`adminId`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `events_ibfk_3` FOREIGN KEY (`usersignsid`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `feedbacktbl`
--
ALTER TABLE `feedbacktbl`
  ADD CONSTRAINT `feedbacktbl_ibfk_1` FOREIGN KEY (`announceid`) REFERENCES `announcement` (`AnnounceID`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `feedbacktbl_ibfk_2` FOREIGN KEY (`eventid`) REFERENCES `events` (`EventID`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `feedbacktbl_ibfk_3` FOREIGN KEY (`usersignsId`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE RESTRICT;

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
  ADD CONSTRAINT `userbooking_ibfk_1` FOREIGN KEY (`usersignsId`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `userdonation`
--
ALTER TABLE `userdonation`
  ADD CONSTRAINT `userdonation_ibfk_1` FOREIGN KEY (`usersignsId`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
