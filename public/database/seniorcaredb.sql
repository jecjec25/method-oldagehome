-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 09, 2024 at 05:26 AM
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
  `establishment` text COLLATE utf8mb4_swedish_ci,
  `lastname` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `contactnum` varchar(13) COLLATE utf8mb4_swedish_ci NOT NULL,
  `event` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Time` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `prefferdate` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `equipment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` varchar(159) COLLATE utf8mb4_swedish_ci NOT NULL,
  `usersignsId` int DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `amount_raised` decimal(10,2) NOT NULL,
  `outcomes` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `acknowledgement` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `acceptbooking`
--

INSERT INTO `acceptbooking` (`id`, `establishment`, `lastname`, `firstname`, `middlename`, `contactnum`, `event`, `Time`, `prefferdate`, `equipment`, `comments`, `status`, `usersignsId`, `description`, `amount_raised`, `outcomes`, `acknowledgement`) VALUES
(174, NULL, 'skjksjfksjf', 'sjkskjcckj', 'sjskjcscjk', '09876543212', 'kdjdkxvjdk', 'HalfDay-morning', '2024-09-01', 'ksjksj,cksc', 'skjcsckj,mc', 'Accepted', 59, '', 0.00, '', ''),
(175, NULL, 'fshnkfnk', 'skjskskv', 'snsivhsiKSJ', '09085353978', 'mxnkxmnck', 'HalfDay-afternoon', '2024-09-01', 'CXJMC;K,JXMC', 'SKJCS;KCJ', 'Accepted', 59, '', 0.00, '', ''),
(176, NULL, 'scjsocjcsikJC', 'sjcjscskjc', 'ajcjskjcsic', '09987655656', 'dkjnlksnc', 'WholeDay', '2024-09-02', 'ksmclscl', 'scsoxckso', 'Accepted', 60, '', 0.00, '', ''),
(177, NULL, 'cksjcksjc', 'skclkcl', 'lscscl', '09085353978', 'scjlskcjmlsk', 'WholeDay', '2024-09-03', 'chckj,sm', 'sjcmsc,jmsc', 'Accepted', 60, '', 0.00, '', ''),
(178, NULL, 'cksjcksjc', 'skclkcl', 'lscscl', '09085353978', 'scjlskcjmlsk', 'WholeDay', '2024-09-03', 'chckj,sm', 'sjcmsc,jmsc', 'Declined', 60, '', 0.00, '', ''),
(179, 'testing lang', '', '', '', '09876543212', 'Christia event', 'WholeDay', '2024-10-14', '', '', 'Accepted', 60, '', 0.00, '', ''),
(180, NULL, '', '', '', '09876543212', 'Charity Events', 'WholeDay', '2024-10-15', '', '', 'Accepted', 59, '', 0.00, '', ''),
(181, 'testing for establisment', 'sjsivjik', '', '', '09085353978', 'Hahaha', 'WholeDay', '2024-10-16', '', '', 'Accepted', 59, '', 0.00, '', ''),
(182, 'name of establis', '', '', '', '09085353978', 'charity events', 'WholeDay', '2024-10-20', '', '', 'Declined', 59, '', 0.00, '', ''),
(183, 'Name of establishments ni Tia', '', '', '', '09876543212', 'Mind Games', 'HalfDay-morning', '2024-10-18', '', '', 'Accepted', 60, '', 0.00, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `adminsionsliptbl`
--

CREATE TABLE `adminsionsliptbl` (
  `slipId` int NOT NULL,
  `scId` int DEFAULT NULL,
  `casenum` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `birthplace` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `nameCom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `addressCom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `contactCom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `RelationClient` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `nameRef` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `addressRef` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `contactRef` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num1A` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num1D` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num2A` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num2D` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num3A` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num3D` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num4A` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num4D` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num5A` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num5D` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num6A` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num6D` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num7A` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num7D` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num8A` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num8D` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num9A` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num9D` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num10A` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num10D` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num11A` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num11D` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num12A` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num12D` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num13A` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num13D` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num14A` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num14D` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num15A` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `Num15D` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `inventoriedby` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `turnoverto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `receivedby` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `referringparty` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `socialworker` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `adminsionsliptbl`
--

INSERT INTO `adminsionsliptbl` (`slipId`, `scId`, `casenum`, `birthplace`, `nameCom`, `addressCom`, `contactCom`, `RelationClient`, `nameRef`, `addressRef`, `contactRef`, `Num1A`, `Num1D`, `Num2A`, `Num2D`, `Num3A`, `Num3D`, `Num4A`, `Num4D`, `Num5A`, `Num5D`, `Num6A`, `Num6D`, `Num7A`, `Num7D`, `Num8A`, `Num8D`, `Num9A`, `Num9D`, `Num10A`, `Num10D`, `Num11A`, `Num11D`, `Num12A`, `Num12D`, `Num13A`, `Num13D`, `Num14A`, `Num14D`, `Num15A`, `Num15D`, `inventoriedby`, `turnoverto`, `receivedby`, `referringparty`, `socialworker`) VALUES
(1, 103, 'sksksk21', 'dsdksdkdk', 'dslkslkd', 'ladkladk,', 'llkadladk', 'asdasda', 'alldkldm', 'sdlsdkl', 'skjslksl.', 'ladkaldk,', 'ldkszdlks,d', 's,mls,cmsl,', 'ksjsk,jcms', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', ''),
(6, NULL, 'asdjh', 'Hakdog City', 'hjhjksadhkh', 'hkjhsdkjahjk', '09085353978', 'hjkhsakdhk', 'hjkhsdajk', 'hjkhdajshdjk', 'hjkdhsajkdhjk', 'hhhjkshdk', 'hhjkadhkh', 'hjkashdjkhhj', 'hhdsjkd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', ''),
(7, 105, 'asda', 'sdsdfsasd', 'sds', 'sad', '09085353978', 'dsa', 'sdd', 'dsfdsfsd', 'sdgdsgds', 'dsfsafq', 'sdf', 'sdfsdf', 'sdf', 'sdf', 'dsfsdf', 'asdasdas', 'sadasd', 'sdfs', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', ''),
(8, 106, '1234testing', 'Bayanan 2, Calapan City', 'Bjfsijsoijoi test', 'skjxkdjv', 'chsjhjshci', 'ksjkdnvkn', 'dkjkvkdjv', 'ksjskvj', 'ksjskv,j', 'ksjcskc,j', 'kcs,jskjcm', 'skfmhsilkj', 'ksf,jmskv,j', 'kkfjdjodvj', 'olsikfvd;ovl', 'olsikf;os.jfm', 'olw,fskvmd.vjm', 'osl,jfmvd;o.vlk', 'osfl,jmsvj', 'osfjso;vj', 'skjvdivkj', 'kjesmfvdvj', 'kjsfmoksjf', 'kwjfmosfj', 'skfjsfkjm', 'kwjfmosfj', 'fsjmosfjm', 'osffjmslfikj', 'skfjmslfijk', 'skjfmspf.j', 'slkjs;kms;olks', 'sfjmspof;l', 'skjfsojfm', 'sjfmspfj', 'fkjmskjfm', 'fkjmsfkj,m', 'jfmiskjfmsif', NULL, 'osfl,jmsvj', 'Jennifer Ramirez', 'Christia Dela Chica', 'Kyle Curba', 'Christia Dela Chica', 'Juana Manalo'),
(9, 107, '102342415', 'Camansihan, Calapan City', 'Christia', 'testing', '09876654322', 'testing', 'test', 'for test', 'fortesting', 'hjkhdaksjhdkjh', 'jkhdjksahdjh', 'jkhdjkashsjdhjk', 'hjkahsjdkhajksh', 'jkhdjkhasjkdhjk', 'hjkdhajkshdjksahdj', 'hdjkhajkshdh', 'jkdhjkshdjahdjkhjk', 'hjwhdajhdhadjk', 'hjkashdjksahdkajhdjk', 'hdjkashdjkahdjkashdjk', 'hdjkhasjdhsajkdh', 'jkhdajsdhsajkdhj', 'hdjkhasjkdhakj', 'hkashsajdh', 'jkhdkjashdkjashdjk', 'hkashsajdh', 'jhkahkjahdk', 'jhajkdhasjdkhsfjkasjkvbxznvbzb', 'nbbmbvxcbvmnx', 'hsdhfdshfjJJH', 'jkddsfhdsjfkh', 'jkhkjhdfjksdhfkskfjsnvnsjh', 'hjsjdkfhsdjkh', 'jddsfjkhsdjkjhj', 'jdsjfhsjkfhj', 'hsdjfhsdjkh', 'hsdfdsfjkdshfjk', NULL, 'hjkashdjksahdkajhdjk', 'jkhjkhfjkdshfjkh', 'jhkjhdjkfhjk', 'hjkhjkfhsdjkfhkj', 'hjkshdfjkhsdkjfhsjkh', 'hjkshdfjkshdfjkh');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `AnnounceID` int NOT NULL,
  `Title` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Content` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `Author` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Category` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Priority` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Attachments` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Status` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Target_audience` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `adminId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donationdets`
--

CREATE TABLE `donationdets` (
  `id` int NOT NULL,
  `img` text COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `donationdets`
--

INSERT INTO `donationdets` (`id`, `img`) VALUES
(1, 'sirpoygcashnum.jpg'),
(2, 'g21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `elderneed`
--

CREATE TABLE `elderneed` (
  `id` int NOT NULL,
  `need` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `description` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `date_started` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int NOT NULL,
  `Title` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Description` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `Organizer` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Category` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Atendees` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `Attachments` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `usersignsid` int DEFAULT NULL,
  `adminId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `Title`, `Description`, `Organizer`, `Start_date`, `End_date`, `Category`, `Status`, `Atendees`, `Attachments`, `type`, `usersignsid`, `adminId`) VALUES
(77, 'sjksjskn', 'asjsjcm', 'admalkdmal', '2024-12-25', '2024-12-26', 'Recreational', 'Published', 'iufjoeujfeoiuj', '1728369496_901726ad53ee09280184.png', 'user', 60, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktbl`
--

CREATE TABLE `feedbacktbl` (
  `id` int NOT NULL,
  `status` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `usersignsId` int DEFAULT NULL,
  `eventid` int DEFAULT NULL,
  `announceid` int DEFAULT NULL,
  `feedback` text COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inkinddonation_tbl`
--

CREATE TABLE `inkinddonation_tbl` (
  `id` int NOT NULL,
  `usersignsId` int NOT NULL,
  `Establishment` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `lastname` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `firstname` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `middlename` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `contactnum` bigint NOT NULL,
  `inKindDonationItem` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `picture` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `donationdate` date NOT NULL,
  `status` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `message` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `inkinddonation_tbl`
--

INSERT INTO `inkinddonation_tbl` (`id`, `usersignsId`, `Establishment`, `lastname`, `firstname`, `middlename`, `contactnum`, `inKindDonationItem`, `picture`, `donationdate`, `status`, `message`) VALUES
(21, 60, 'skjskjcsj', 'llskcllsm', 'loslcmslckm', 'scslkcsljcm', 9085353978, 'jdsljls,kcmls,m', '1728365221_ee98307626a22afb2859.png', '2024-12-25', 'pending', 'skfjsjfksl');

-- --------------------------------------------------------

--
-- Table structure for table `newsevents`
--

CREATE TABLE `newsevents` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Content` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `date_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Category` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `picture` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_swedish_ci NOT NULL,
  `adminId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organizationtable`
--

CREATE TABLE `organizationtable` (
  `id` int NOT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `name` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `position` text COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `organizationtable`
--

INSERT INTO `organizationtable` (`id`, `img`, `name`, `position`) VALUES
(1, 'frandy.jpg', 'Rev. Fr. ANDY PETER M. LUBI', 'Apostolic Administrator'),
(2, 'popoy.jpg', 'LITO C. VERGARA', 'Administrator'),
(3, 'louie.jpg', 'HENRY N. DACANAY III', 'Admin Staff'),
(4, 'analyn.jpg', 'ANALYN C. ZAPATA', 'Caregiver'),
(5, 'axel.jpg', 'AXEL MICO CAPOL', 'Caregiver'),
(6, 'epitacia.jpg', 'EPITACIA A. EVANGELISTA', 'Caregiver/Cook'),
(7, 'zamora.jpg', 'EDUARDO D. ZAMORA', 'Driver/Maintenance'),
(8, 'arnold.jpg', 'ARNOLD S. SAMSOM', 'Kitchen Staff/Helper');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_swedish_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_swedish_ci,
  `price` float(12,2) NOT NULL DEFAULT '0.00',
  `quantity` int NOT NULL,
  `prodpic` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `description`, `price`, `quantity`, `prodpic`, `created_at`, `updated_at`) VALUES
(18, '1112', 'Bracelet', 'Bracelet for yous', 20.00, 19, '', '2024-05-08 23:09:13', '2024-06-19 11:00:37'),
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
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int NOT NULL,
  `image` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `price` decimal(10,2) DEFAULT NULL,
  `other` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `type` text COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `image`, `description`, `price`, `other`, `type`) VALUES
(1, 'bracelet2.jpg', 'Bracelet', 20.00, '              <p style=\"color:black;\">Walk-in Transaction</p>\r\n              <p style=\"color:black;\">For Pick-up only</p>\r\n              <p style=\"color:black;\">Available at Aruga Kapatid</p>', 'prod'),
(3, 'bracelet.jpg', 'Bracelet', 10.00, '              <p style=\"color:black;\">Walk-in Transaction</p>\r\n              <p style=\"color:black;\">For Pick-up only</p>\r\n              <p style=\"color:black;\">Available at Aruga Kapatid</p>', 'prod'),
(5, 'bracelet name.jpg', 'Bracelet with name', 20.00, '              <p style=\"color:black;\">Walk-in Transaction</p>\r\n              <p style=\"color:black;\">For Pick-up only</p>\r\n              <p style=\"color:black;\">Available at Aruga Kapatid</p>', 'prod'),
(6, 'mamamary.jpg', 'Mama mary', 100.00, '              <p style=\"color:black;\">Walk-in Transaction</p>\r\n              <p style=\"color:black;\">For Pick-up only</p>\r\n              <p style=\"color:black;\">Available at Aruga Kapatid</p>', 'prod'),
(7, 'patholder.jpg', 'Patholder', 100.00, '              <p style=\"color:black;\">Walk-in Transaction</p>\r\n              <p style=\"color:black;\">For Pick-up only</p>\r\n              <p style=\"color:black;\">Available at Aruga Kapatid</p>', 'prod'),
(8, 'rectangle doormat.jpg', 'Doormat', 50.00, '              <p style=\"color:black;\">Walk-in Transaction</p>\r\n              <p style=\"color:black;\">For Pick-up only</p>\r\n              <p style=\"color:black;\">Available at Aruga Kapatid</p>', 'prod'),
(9, 'round doormat.jpg', 'Round Doormat', 50.00, '              <p style=\"color:black;\">Walk-in Transaction</p>\r\n              <p style=\"color:black;\">For Pick-up only</p>\r\n              <p style=\"color:black;\">Available at Aruga Kapatid</p>', 'prod'),
(10, 'thick patholder.jpg', 'Damcloth', 100.00, '              <p style=\"color:black;\">Walk-in Transaction</p>\r\n              <p style=\"color:black;\">For Pick-up only</p>\r\n              <p style=\"color:black;\">Available at Aruga Kapatid</p>', 'prod'),
(11, 'angel.jpg', 'Angel', 100.00, ' <p style=\"color:black;\">Walk-in Transaction</p>\r\n              <p style=\"color:black;\">For Pick-up only</p>\r\n              <p style=\"color:black;\">Available at Aruga Kapatid</p>\r\n             ', 'prod'),
(12, 'braceletrosary.jpg', 'Rosary', 20.00, ' <p style=\"color:black;\">Walk-in Transaction</p>\r\n              <p style=\"color:black;\">For Pick-up only</p>\r\n              <p style=\"color:black;\">Available at Aruga Kapatid</p>\r\n             ', 'prod'),
(13, 'blacknazaren.jpg', 'Black Nazaren', 100.00, ' <p style=\"color:black;\">Walk-in Transaction</p>\r\n              <p style=\"color:black;\">For Pick-up only</p>\r\n              <p style=\"color:black;\">Available at Aruga Kapatid</p>\r\n             ', 'prod'),
(14, 'h2.png', 'ARUGA-KAPATID FOUNDATION INCORPORATED', 0.00, 'homepage', ''),
(15, 'h1.jpg', 'You\'re never too old to begin again, and to create yourself a happy ending', NULL, 'homepage', ''),
(16, 'h3.jpg', '\"Your heart holds the wisdom of ages, and your spirit remains forever young. Keep spreading your warmth and love.\"', NULL, 'homepage', ''),
(17, 'g1.jfif', NULL, NULL, 'gallery', ''),
(18, 'g2.jfif', NULL, NULL, 'gallery', ''),
(19, 'g3.jfif', NULL, NULL, 'gallery', ''),
(20, 'g4.jfif', NULL, NULL, 'gallery', ''),
(21, 'g5.jfif', NULL, NULL, 'gallery', ''),
(22, 'g6.jfif', NULL, NULL, 'gallery', ''),
(23, 'g7.jfif', NULL, NULL, 'gallery', ''),
(24, 'g8.jfif', NULL, NULL, 'gallery', ''),
(25, 'g9.jfif', NULL, NULL, 'gallery', ''),
(26, 'g10.jfif', NULL, NULL, 'gallry', ''),
(27, 'g11.jfif', NULL, NULL, 'gallery', ''),
(28, 'g12.jfif', NULL, NULL, 'gallery', ''),
(29, 'g13.jfif', NULL, NULL, 'gallery', ''),
(30, 'g14.jfif', NULL, NULL, 'gallery', ''),
(31, 'g15.jfif', NULL, NULL, 'gallery', ''),
(32, 'g16.jfif', NULL, NULL, 'gallery', ''),
(33, 'g17.jfif', NULL, NULL, 'gallery', ''),
(34, 'g18.jfif', NULL, NULL, 'gallery', ''),
(35, 't2.jpg', NULL, NULL, 'gallery', ''),
(36, 't7.jpg', NULL, NULL, 'gallery', ''),
(37, 't8.jpg', NULL, NULL, 'gallery', ''),
(38, 't9.jpg', NULL, NULL, 'gallery', ''),
(39, 't10.jpg', NULL, NULL, 'gallery', ''),
(40, 't1.jpg', NULL, NULL, 'gallery', ''),
(41, 't11.jpg', NULL, NULL, 'gallery\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `reportdonation`
--

CREATE TABLE `reportdonation` (
  `donation_id` int NOT NULL,
  `date` date NOT NULL,
  `donor_name` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `donation_type` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `project_supported` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `reportdonation`
--

INSERT INTO `reportdonation` (`donation_id`, `date`, `donor_name`, `donation_type`, `amount`, `project_supported`) VALUES
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
  `Name` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Phone` varchar(13) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Email` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Enquiry_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Message` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `contact_status` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`Id`, `Name`, `Phone`, `Email`, `Enquiry_Date`, `Message`, `contact_status`) VALUES
(14, 'jshclsvujlosjvo', '09085353978', 'shantal@gmail.com', '2024-07-03 02:09:21', ' jhfkkisvliusjvlslvkjslkv', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `Id` int NOT NULL,
  `ProdName` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `Quantity` int NOT NULL,
  `ProdPrice` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `ProdDescription` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `ProdPic` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

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
  `lastname` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `middlename` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nickname` varchar(250) COLLATE utf8mb4_swedish_ci NOT NULL,
  `DateBirth` date DEFAULT NULL,
  `gender` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `marital_stat` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `ContNum` varchar(20) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `ComAdd` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `ProfPic` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `EmergencyAdd` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `EmergencyContNum` varchar(20) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `RegDate` date NOT NULL,
  `scstatus` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `InputedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `departuredate` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `reasonleft` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `datedeath` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `causedeath` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `adminId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `tblscdetails`
--

INSERT INTO `tblscdetails` (`Id`, `lastname`, `firstname`, `middlename`, `nickname`, `DateBirth`, `gender`, `marital_stat`, `ContNum`, `ComAdd`, `ProfPic`, `EmergencyAdd`, `EmergencyContNum`, `RegDate`, `scstatus`, `InputedDate`, `departuredate`, `reasonleft`, `datedeath`, `causedeath`, `adminId`) VALUES
(101, 'jvkjvdkvk', 'kndkjdk n', 'dkjvdljelk', 'ksjvdkvjdvj', '1945-12-25', 'Female', 'Married', '09876543212', 'nkjidkjvrkdv', '1719971596_6e8de9bd7eae7a9f216f.jpg', 'dvjodvjmdovj', '09876543212', '2024-07-03', 'Deceased', '2024-07-03 09:53:16', '', '', '', '', 58),
(102, 'fhjfhsjhfsjhf ', 'skfshfnsif', 'hfshfskufhjn', 'jhfnjfhskfjh', '1950-12-25', 'Female', 'Married', '09878744466', 'skfmnslkfnslkfn&nbsp;', '1726816133_76b69e3dc9d19f48139e.png', 'akdjakdjadkjc', '09876543212', '2024-09-20', 'Left', '2024-09-20 15:08:53', '', '', '', '', 58),
(103, 'Manalo', 'Christia Angelica', 'Herilla', 'Jekjek', '1945-12-25', 'Female', 'Single', '09939469530', 'Camansihan, Calapan City, Oriental Mindoro', '1727589439_be7e52894cb7aa187e11.jpg', 'Camansihan, Calapan City, Oriental Mindoro', '09939469530', '2024-09-29', 'Left', '2024-09-29 13:57:19', '', '', '', '', 58),
(104, 'sad', 'sadasd', 'sda', 'sdsf', '2024-09-30', 'sdfdsf', 'dsfsf', '09085353878', 'sdfsdfsdf', 'sadsf', NULL, '0908636387', '2024-09-30', 'asdasd', '2024-09-30 19:34:00', '', '', 'sdfsdf', 'sdfsdfsdf', NULL),
(105, 'sdjhfjk', 'hhjksfhjkdshfjkh', 'jkhjkhdsfjkhsdkhf', 'jkhjkdhsjkfhsjkh', '1969-07-08', 'Male', 'Single', '09123456789', 'sadadas', '1727696109_0e28ad89b7a84a31e838.jpg', 'sadad', '09085353978', '1999-12-12', 'Left', '2024-09-30 19:35:09', '', '', '', '', 58),
(106, 'Dela Cruz', 'Juan', 'Manalo', 'Juancho', '1935-12-25', 'Male', 'Married', '09633895647', 'Bayanan, Calapan City', '1727748661_a7c0090787a4dbb3151c.jpg', 'Bayanan, Calapan City', '09633895647', '2024-10-01', 'Left', '2024-10-01 10:11:01', '', '', '', '', 58),
(107, 'asd', 'asdjhgjh', 'gjhsadjhg', 'jhgjhgasjhdghj', '1969-12-09', 'Female', 'Single', '09876543212', 'asdasd', '1727769605_57504814f6edf766a4ff.jpg', 'asdasd', '09633895647', '2024-12-12', 'Unarchive', '2024-10-01 16:00:05', '', '', '', '', 58);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `customer` varchar(250) COLLATE utf8mb4_swedish_ci NOT NULL,
  `total_amount` float(12,2) NOT NULL DEFAULT '0.00',
  `tendered` float(12,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `code`, `customer`, `total_amount`, `tendered`, `created_at`, `updated_at`) VALUES
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
(48, '2024061600001', 'shantal', 200.00, 200.00, '2024-06-16 18:05:19', '2024-06-16 18:05:19'),
(49, '2024061900001', 'shantal', 600.00, 1000.00, '2024-06-19 11:00:36', '2024-06-19 11:00:36');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

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
(48, 18, 20.00, 10, '2024-06-16 18:05:19', '2024-06-16 18:05:19'),
(49, 18, 20.00, 30, '2024-06-19 11:00:37', '2024-06-19 11:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int NOT NULL,
  `verification_token` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `LastName` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `FirstName` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `user_img` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Username` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `ContactNo` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Email` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `role` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `birthday` date NOT NULL,
  `Password` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `verification_token`, `is_verified`, `LastName`, `FirstName`, `user_img`, `Username`, `ContactNo`, `Email`, `role`, `birthday`, `Password`, `Created_At`, `Update_At`) VALUES
(2, '', 1, 'Dela Chica', 'Christia', '1716714625_23ec69030b0b83ea20fc.jpg', 'christia25', '09633895626', 'christia25@gmail.com', 'MainAdmin', '2002-12-25', '$2y$10$mCyCYd2b6efQiKMj.z30mONbP2yrTGubK3s.tKJrlVq9OxUud4TfC', '2024-02-18 06:40:43', '2024-02-18 06:40:43'),
(58, '', 1, 'Foundation Incorporated', 'Aruga-Kapatid', 'default.jpg', 'Home4dAged', '09985774919', 'aruga.kapatid@gmail.com', 'MainAdmin', '2000-01-01', '$2y$10$DWTzweTrivkAQH84Dw6Owu6SL46rdRdMUBStGEeX6H/d7emFMa9U6', '2024-07-02 05:44:39', '2024-07-02 05:44:39'),
(59, '', 1, 'Ramirez', 'Jennirfer', '', 'jennifer', '09876543212', 'jenniferramirez25@gmail.com', 'Booker', '2002-01-25', '$2y$10$x9jqA6X6CKxJQGC6gRbuSukg0dEV7rS58VcBgPi..LPmzE8otC8SK', '2024-08-13 04:09:58', '2024-08-13 04:09:58'),
(60, '', 1, 'Dela Chica', 'Christia Angel', '', 'Chris25', '09876542212', 'changeldc11@gmail.com', 'Booker', '2002-12-24', '$2y$10$wIf4aIc9wTqkqr5.sx.G8eFgh3f6gBc1F0lN8WxcWUlqVzZd8g1Ne', '2024-08-31 11:56:07', '2024-08-31 11:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `userbooking`
--

CREATE TABLE `userbooking` (
  `establishment` text COLLATE utf8mb4_swedish_ci,
  `lastname` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `contactnum` varchar(13) COLLATE utf8mb4_swedish_ci NOT NULL,
  `event` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `prefferdate` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Time` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `equipment` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `bookingId` int NOT NULL,
  `status` varchar(159) COLLATE utf8mb4_swedish_ci NOT NULL,
  `usersignsId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `userbooking`
--

INSERT INTO `userbooking` (`establishment`, `lastname`, `firstname`, `middlename`, `contactnum`, `event`, `prefferdate`, `Time`, `equipment`, `comments`, `bookingId`, `status`, `usersignsId`) VALUES
(NULL, 'sjsksjfsjk', '', '', '09085353978', 'siskjfsikjfm', '2024-10-09', 'WholeDay', '', '', 238, 'pending', 60),
(NULL, '', '', '', '09123456789', 'Mind Games', '2024-10-11', 'WholeDay', '', '', 239, 'pending', 60),
(NULL, 'skjkj', 'skjmsljfm', 'kadjmlsljm', '09085353978', 'charity events', '2024-10-17', 'HalfDay-morning', '', '', 240, 'pending', 60),
(NULL, '', '', '', '09085353978', 'snfhskfhnk', '2024-10-09', 'WholeDay', '', '', 241, 'pending', 60);

-- --------------------------------------------------------

--
-- Table structure for table `userdonation`
--

CREATE TABLE `userdonation` (
  `id` int NOT NULL,
  `usersignsId` int DEFAULT NULL,
  `establishment` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `lastname` varchar(250) COLLATE utf8mb4_swedish_ci NOT NULL,
  `firstname` varchar(250) COLLATE utf8mb4_swedish_ci NOT NULL,
  `middlename` varchar(250) COLLATE utf8mb4_swedish_ci NOT NULL,
  `contactnum` bigint NOT NULL,
  `donationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cashDonation` float DEFAULT NULL,
  `cashCheck` float DEFAULT NULL,
  `picture` varchar(250) COLLATE utf8mb4_swedish_ci NOT NULL,
  `referencenum` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `message` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `mumosahapag` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `userdonation`
--

INSERT INTO `userdonation` (`id`, `usersignsId`, `establishment`, `lastname`, `firstname`, `middlename`, `contactnum`, `donationdate`, `cashDonation`, `cashCheck`, `picture`, `referencenum`, `status`, `message`, `mumosahapag`) VALUES
(41, 60, 'skjfsfmosjfm', '', '', '', 9085353978, '2024-10-08 05:02:54', 12234000, 0, '', 'sjksdj123322', 'pending', '', 0),
(42, 60, 'skjskvnikn', 'ksj,msvjn', 'sjlsoljvo', 'osjlfsofj', 9123456789, '2024-10-08 05:27:53', 122233000, 0, '', '21234342A', 'pending', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usersigns`
--

CREATE TABLE `usersigns` (
  `id` int NOT NULL,
  `LastName` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `FirstName` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `Username` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `Email` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `ContactNo` varchar(13) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Password` text COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vm`
--

CREATE TABLE `vm` (
  `id` int NOT NULL,
  `Vision` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `CoreValues` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `Mision` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `img` text COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `vm`
--

INSERT INTO `vm` (`id`, `Vision`, `CoreValues`, `Mision`, `img`) VALUES
(1, 'We envision that the poor , abandoned, neglected and/or any other elders in disadvantaged situation will be able to restore their dignity in life, living with the fullness of life in Christ.', 'We Fully adopt the core values of Hapag ng Pamilyang Mindoreño.\n<p>• Kapatiran</p>\n<p>• Damayan</p>\n<p>• Tapungan</p>\n<p>• Saknungan</p>', 'Our Home for the aged is elderly care program which provide the poor, neglected, sick and abandoned elders the ambience of a real home. We offer them the best care while they are with us, secured life as they approach their twilight  years. The institution witll basically provide residential care to elders whereinthey will be provide their their basic needs. (food, shelter, clothing, medicine, hospitalization, provision of free coffin and burial services).', 'g21.jpg');

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
-- Indexes for table `adminsionsliptbl`
--
ALTER TABLE `adminsionsliptbl`
  ADD PRIMARY KEY (`slipId`),
  ADD KEY `Id` (`scId`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`AnnounceID`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `donationdets`
--
ALTER TABLE `donationdets`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `organizationtable`
--
ALTER TABLE `organizationtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
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
-- Indexes for table `vm`
--
ALTER TABLE `vm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acceptbooking`
--
ALTER TABLE `acceptbooking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `adminsionsliptbl`
--
ALTER TABLE `adminsionsliptbl`
  MODIFY `slipId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `AnnounceID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `donationdets`
--
ALTER TABLE `donationdets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `elderneed`
--
ALTER TABLE `elderneed`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `feedbacktbl`
--
ALTER TABLE `feedbacktbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `inkinddonation_tbl`
--
ALTER TABLE `inkinddonation_tbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `newsevents`
--
ALTER TABLE `newsevents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `organizationtable`
--
ALTER TABLE `organizationtable`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `reportdonation`
--
ALTER TABLE `reportdonation`
  MODIFY `donation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tblscdetails`
--
ALTER TABLE `tblscdetails`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `userbooking`
--
ALTER TABLE `userbooking`
  MODIFY `bookingId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `userdonation`
--
ALTER TABLE `userdonation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `usersigns`
--
ALTER TABLE `usersigns`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vm`
--
ALTER TABLE `vm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acceptbooking`
--
ALTER TABLE `acceptbooking`
  ADD CONSTRAINT `acceptbooking_ibfk_1` FOREIGN KEY (`usersignsId`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `adminsionsliptbl`
--
ALTER TABLE `adminsionsliptbl`
  ADD CONSTRAINT `adminsionsliptbl_ibfk_1` FOREIGN KEY (`scId`) REFERENCES `tblscdetails` (`Id`) ON DELETE SET NULL ON UPDATE RESTRICT;

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
