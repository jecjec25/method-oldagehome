-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2024 at 02:16 AM
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
  `reason` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `usersignsId` int DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `amount_raised` decimal(10,2) NOT NULL,
  `outcomes` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `acknowledgement` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `acceptbooking`
--

INSERT INTO `acceptbooking` (`id`, `establishment`, `lastname`, `firstname`, `middlename`, `contactnum`, `event`, `Time`, `prefferdate`, `equipment`, `comments`, `status`, `reason`, `usersignsId`, `description`, `amount_raised`, `outcomes`, `acknowledgement`) VALUES
(174, NULL, 'skjksjfksjf', 'sjkskjcckj', 'sjskjcscjk', '09876543212', 'kdjdkxvjdk', 'HalfDay-morning', '2024-09-01', 'ksjksj,cksc', 'skjcsckj,mc', 'Accepted', '', 59, 'ako si christia dela chica hehehe', 0.00, 'habadu', ''),
(175, NULL, 'fshnkfnk', 'skjskskv', 'snsivhsiKSJ', '09085353978', 'mxnkxmnck', 'HalfDay-afternoon', '2024-09-01', 'CXJMC;K,JXMC', 'SKJCS;KCJ', 'Accepted', '', 59, '', 0.00, '', ''),
(176, NULL, 'scjsocjcsikJC', 'sjcjscskjc', 'ajcjskjcsic', '09987655656', 'dkjnlksnc', 'WholeDay', '2024-09-02', 'ksmclscl', 'scsoxckso', 'Accepted', '', 60, '', 0.00, '', ''),
(177, NULL, 'cksjcksjc', 'skclkcl', 'lscscl', '09085353978', 'scjlskcjmlsk', 'WholeDay', '2024-09-03', 'chckj,sm', 'sjcmsc,jmsc', 'Accepted', '', 60, '', 0.00, '', ''),
(178, NULL, 'cksjcksjc', 'skclkcl', 'lscscl', '09085353978', 'scjlskcjmlsk', 'WholeDay', '2024-09-03', 'chckj,sm', 'sjcmsc,jmsc', 'Declined', '', 60, '', 0.00, '', ''),
(179, 'testing lang', '', '', '', '09876543212', 'Christia event', 'WholeDay', '2024-10-14', '', '', 'Accepted', '', 60, 'ako si christia dela chica hehehe', 3400.00, '123DSF', 'thank you'),
(180, NULL, '', '', '', '09876543212', 'Charity Events', 'WholeDay', '2024-10-15', '', '', 'Accepted', '', 59, 'needed mic eh', 67000.00, 'hahahaha', 'haha'),
(181, 'testing for establisment', 'sjsivjik', '', '', '09085353978', 'Hahaha', 'WholeDay', '2024-10-16', '', '', 'Accepted', '', 59, '', 0.00, '', ''),
(182, 'name of establis', '', '', '', '09085353978', 'charity events', 'WholeDay', '2024-10-20', '', '', 'Declined', '', 59, '', 0.00, '', ''),
(183, 'Name of establishments ni Tia', '', '', '', '09876543212', 'Mind Games', 'HalfDay-morning', '2024-10-18', '', '', 'Accepted', '', 60, '', 0.00, '', ''),
(184, NULL, '', '', '', '09123456789', 'Mind Games', 'WholeDay', '2024-10-11', '', '', 'Accepted', '', 60, '', 0.00, '', ''),
(185, NULL, 'sjsksjfsjk', '', '', '09085353978', 'siskjfsikjfm', 'WholeDay', '2024-10-09', '', '', 'Declined', '', 60, '', 0.00, '', ''),
(186, NULL, '', '', '', '09085353978', 'snfhskfhnk', 'WholeDay', '2024-10-09', '', '', 'Declined', '', 60, '', 0.00, '', ''),
(187, NULL, 'skjkj', 'skjmsljfm', 'kadjmlsljm', '09085353978', 'charity events', 'HalfDay-morning', '2024-10-17', '', '', 'Declined', 'HElloWorld\r\n', 60, '', 0.00, '', ''),
(188, NULL, 'skjkj', 'skjmsljfm', 'kadjmlsljm', '09085353978', 'charity events', 'HalfDay-morning', '2024-10-17', '', '', 'Declined', 'HElloWorld\r\n', 60, '', 0.00, '', ''),
(190, 'dhvhdhvjhd', 'sjcsikjcsi', 'sciscskjhcnsj', 'jcdicjdijck', '09085353978', 'dcdijcdijc', 'WholeDay', '2024-11-25', 'djcdjkcdkk', 'kjscksjcms', 'Declined', 'HelloBaks', 60, '', 0.00, '', '');

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
(1, NULL, 'sksksk21', 'dsdksdkdk', 'dslkslkd', 'ladkladk,', 'llkadladk', 'asdasda', 'alldkldm', 'sdlsdkl', 'skjslksl.', 'ladkaldk,', 'ldkszdlks,d', 's,mls,cmsl,', 'ksjsk,jcms', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', ''),
(6, NULL, 'asdjh', 'Hakdog City', 'hjhjksadhkh', 'hkjhsdkjahjk', '09085353978', 'hjkhsakdhk', 'hjkhsdajk', 'hjkhdajshdjk', 'hjkdhsajkdhjk', 'hhhjkshdk', 'hhjkadhkh', 'hjkashdjkhhj', 'hhdsjkd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', ''),
(7, NULL, 'asda', 'sdsdfsasd', 'sds', 'sad', '09085353978', 'dsa', 'sdd', 'dsfdsfsd', 'sdgdsgds', 'dsfsafq', 'sdf', 'sdfsdf', 'sdf', 'sdf', 'dsfsdf', 'asdasdas', 'sadasd', 'sdfs', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', ''),
(8, NULL, '1234testing', 'Bayanan 2, Calapan City', 'Bjfsijsoijoi test', 'skjxkdjv', 'chsjhjshci', 'ksjkdnvkn', 'dkjkvkdjv', 'ksjskvj', 'ksjskv,j', 'ksjcskc,j', 'kcs,jskjcm', 'skfmhsilkj', 'ksf,jmskv,j', 'kkfjdjodvj', 'olsikfvd;ovl', 'olsikf;os.jfm', 'olw,fskvmd.vjm', 'osl,jfmvd;o.vlk', 'osfl,jmsvj', 'osfjso;vj', 'skjvdivkj', 'kjesmfvdvj', 'kjsfmoksjf', 'kwjfmosfj', 'skfjsfkjm', 'kwjfmosfj', 'fsjmosfjm', 'osffjmslfikj', 'skfjmslfijk', 'skjfmspf.j', 'slkjs;kms;olks', 'sfjmspof;l', 'skjfsojfm', 'sjfmspfj', 'fkjmskjfm', 'fkjmsfkj,m', 'jfmiskjfmsif', NULL, 'osfl,jmsvj', 'Jennifer Ramirez', 'Christia Dela Chica', 'Kyle Curba', 'Christia Dela Chica', 'Juana Manalo'),
(9, NULL, '102342415', 'Camansihan, Calapan City', 'Christia', 'testing', '09876654322', 'testing', 'test', 'for test', 'fortesting', 'hjkhdaksjhdkjh', 'jkhdjksahdjh', 'jkhdjkashsjdhjk', 'hjkahsjdkhajksh', 'jkhdjkhasjkdhjk', 'hjkdhajkshdjksahdj', 'hdjkhajkshdh', 'jkdhjkshdjahdjkhjk', 'hjwhdajhdhadjk', 'hjkashdjksahdkajhdjk', 'hdjkashdjkahdjkashdjk', 'hdjkhasjdhsajkdh', 'jkhdajsdhsajkdhj', 'hdjkhasjkdhakj', 'hkashsajdh', 'jkhdkjashdkjashdjk', 'hkashsajdh', 'jhkahkjahdk', 'jhajkdhasjdkhsfjkasjkvbxznvbzb', 'nbbmbvxcbvmnx', 'hsdhfdshfjJJH', 'jkddsfhdsjfkh', 'jkhkjhdfjksdhfkskfjsnvnsjh', 'hjsjdkfhsdjkh', 'jddsfjkhsdjkjhj', 'jdsjfhsjkfhj', 'hsdjfhsdjkh', 'hsdfdsfjkdshfjk', NULL, 'hjkashdjksahdkajhdjk', 'jkhjkhfjkdshfjkh', 'jhkjhdjkfhjk', 'hjkhjkfhsdjkfhkj', 'hjkshdfjkhsdkjfhsjkh', 'hjkshdfjkshdfjkh'),
(12, NULL, 'hq2whe', 'qwje', 'awsd', 'asd', '123567', '213', 'nmsabd', 'jshadj', '21413', 'sjdhf', 'hsjkdfh', 'jshadjh', 'jhajdh', 'gfdfgfd', 'dgfd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', ''),
(13, 136, '9876543', 'Camansihan, Calapan City', 'Christia', 'Camansihan, Calapan City', '09085353978', 'Mothership', 'Herilla', 'Richard', '09876543212', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', ''),
(14, 135, '252525', 'Camansihan, Calapan City', 'Christia', 'Camansihan, Calapan City', '09085353978', 'Qwertyuiop', 'socjspcjo', 'jdjvmskjvm', '09876543212', 'dvmdlvdl', 'skv,l.kv,s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', 'skkvjkdjv', 'jvkjvlsjvm', 'svksljvmsl', 'sjvsojvok', 'dkjvdojv'),
(15, 133, '1371387183', 'jdskjksfnskc', 'ksjskcjmskc', 'ssjkskjcksjcm', '0999999999', 'skjcmksc,jmc,', 'jsmcsk,cjms', 'smcscmsozc', '09876543212', 'ladkaldk,', 'Dan', 'sjskjcm', 'kjsckjsc', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', 'skjmscmks,m', 'smccsm', 'qadjmcskc,', 'skjcmscjm', 'scmsk,cjmsk,');

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

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`AnnounceID`, `Title`, `Content`, `Author`, `Date_created`, `Date_modified`, `Start_date`, `End_date`, `Category`, `Priority`, `Attachments`, `Status`, `Target_audience`, `adminId`) VALUES
(28, 'announcement for nobody', 'maicontent lang', 'Christia jennifer kyle', '2024-11-03 14:05:43', '2024-11-03 14:05:43', '2024-11-03', '2024-11-04', 'events, activities, healthtips', 'mememe', '1730642743_b5a5e1db6c7bf84b7d4b.jpg', 'Published', 'family', 58);

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
(2, 'g11.jpg');

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

--
-- Dumping data for table `elderneed`
--

INSERT INTO `elderneed` (`id`, `need`, `description`, `date_started`, `date_modified`) VALUES
(12, 'sjahxhsh', 'skjiskjcik', '2024-11-04 03:02:15', '2024-11-04 03:02:15'),
(13, 'dsdj;sjlssl', 'jsosjcosjcoslc', '2024-11-11 07:46:08', '2024-11-11 07:46:08');

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
  `Attachments` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `usersignsid` int DEFAULT NULL,
  `adminId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `Title`, `Description`, `Organizer`, `Start_date`, `End_date`, `Category`, `Status`, `Atendees`, `Attachments`, `type`, `usersignsid`, `adminId`) VALUES
(77, 'sjksjskn', 'asjsjcm', 'admalkdmal', '2024-12-25', '2024-12-26', 'Recreational', 'Published', 'iufjoeujfeoiuj', '', 'user', 60, NULL),
(78, 'events for all', 'description for events', 'christia', '2024-11-03', '2024-11-04', 'Social, Recreational, Educational', 'Published', 'everyone', '', 'admin', NULL, 58),
(79, 'TITLE NI MAM', 'DESCRIPTION', 'MAM ALE', '2024-11-13', '2024-11-14', 'Social, Recreational', 'Published', 'AKO AT SI MAM', '', 'user', 60, NULL),
(80, 'hehe123', '24324', 'asdasdasdf', '2024-11-18', '2024-11-18', 'Social, Recreational, Educational', 'Draft', 'asdasd', '', 'user', 60, NULL),
(81, 'asdjh', 'jsajdhjkh', 'asjdhjk', '2024-11-18', '2024-11-18', 'Recreational, Educational', 'Draft', 'asjdklj', '', 'user', 60, NULL),
(82, 'asjdklasjdklj', 'kjaklsdjlkajlk', 'jkljsakldjalkdj', '2024-11-18', '2024-11-18', 'Educational, Health, Outreach', 'Draft', 'askldjalk', '', 'user', 60, NULL),
(83, 'askjdkl', 'jkjaslkdjlk', 'kjaskldj', '0000-00-00', '2024-12-12', 'Recreational, Educational, Health, Outreach', 'Draft', 'sadajsd', '', 'user', 60, NULL),
(84, 'l;fsfkpsfk', 'lksksfks', 'fkspkfpsf', '2024-11-18', '2024-11-19', 'Recreational, Outreach, Cultural', 'Published', 's;f;slf;sf', '', 'user', 60, NULL),
(85, 'asdajksdk', 'kjashdkjh', 'khksahdaasd', '2024-11-18', '2024-11-18', 'Educational, Health, Outreach', 'Draft', 'aksdjkdj', '', 'user', 60, NULL),
(86, 'asdasd', 'asshdahskd', 'hksahdkh', '2024-11-18', '2024-11-18', 'Social', 'Published', 'asdasd', '1731898576_ee781c836837a0528f17.jpg,1731898576_1b92569f617b3ec51a48.jpg,1731898577_6c1a66c09c24f541aaae.jpg,1731898577_3f7ec40424946488258d.jpg,1731898577_73295883360175251e9f.jpg,1731898577_d9eb34cb880c2b44c043.jpg,1731898577_e5dc4e9131e5fa68915a.jpg,1731898577_55da9feb6fe6b7e5a813.jpg,1731898577_dc495cb49a466c377bfa.jpg,1731898577_4c77672146c6a8179ebf.jpg,1731898577_6f28b749cada46fe897f.jpg,1731898577_84307ec183087fff4510.jpg,1731898577_f381a8f08c389ee8ead8.jpg,1731898577_abb64e9999439b3adc90.jpg,1731898577_defdf18182b89533487e.jpg,1731898577_1a9dcadb299015e82fef.jpg,1731898577_7588c7171dd9376bbb76.jpg', 'user', 60, NULL),
(87, 'sfkjhfhfus', 'hfhfudjhfuid', 'hdhdhvuid', '2024-11-18', '2024-11-18', 'Educational', 'Published', 'djkhidjhvduj', '1731899173_d76b671f4bdd8457de8d.jpg,1731899173_0d4bdba9c0753455eddf.jpg,1731899173_a21299072428e1d6799c.jpg,1731899173_99e01cd386fa0e81775b.jpg,1731899173_3bf6e31aa748b2d48054.jpg,1731899173_bd4e66a2a66581fdf5a5.jpg,1731899173_0350347dc91d93b11aa5.jpg,1731899173_85ab1f846f062ac782c0.jpg', 'user', 60, NULL),
(88, 'title event', 'cschsicis', 'scoiskjciks', '2024-11-18', '2024-11-18', 'Educational', 'Published', 'dhvidhvidhv', '1731899335_5ce486457503dc0be854.jpg,1731899335_4dfd10eea89a92b57ce1.jpg,1731899335_f4d75c478303a174771e.jpg,1731899335_8b32d22c38305f18ef3b.jpg,1731899335_de905318b82a45b3487f.jpg,1731899335_c39eb3f3d1fb6961477b.jpg,1731899335_1cc449978d656584e2da.jpg,1731899335_ae35000d008fec409c63.jpg', 'user', 60, NULL),
(89, 'parang event', 'hchcousjhc', 'wchhcjch', '2024-11-18', '2024-11-19', 'Recreational', 'Published', 'scshcishcius', '1731899434_2f5eca2662621d08e2fb.jpg,1731899434_b17086cc6f2edd6e1bfa.jpg,1731899434_ed2c79042d037aa51558.jpg,1731899434_a93ed779c27a68efe204.jpg,1731899434_ddaf0d102fc8aabe7f8e.jpg,1731899434_5f56ab7dc0fcda6e127c.jpg,1731899434_6b237e7f0d8cfd7d6ebe.jpg,1731899434_8fadd16530c0bee1e684.jpg,1731899434_0c664bbad23f9ed1758c.jpg', 'user', 60, NULL),
(90, 'alkdkandkad', 'iskjcskjc', 'osjsmcskjcsz', '2024-11-18', '2024-11-19', 'Social', 'Published', 'slkdnlskhcnls', '1731901850_567d1458c9f8be326a75.jpg,1731901850_6063129e14a1cada8dcc.jpg,1731901850_288bf4fa1b284531ee78.jpg,1731901850_d70ff953be4bf9d0de34.jpg', 'user', 60, NULL),
(91, 'skcskcksjc', 'sjcscjmskz,', 'csslckslc', '2024-11-18', '2024-11-20', 'Recreational', 'Published', 'slclscm', '1731903775_6da73510b37462b2780b.jpg,1731903775_2f4f41ba0838976b3f5d.jpg,1731903775_0fd8780c75a010dcf8da.jpg', 'user', 60, NULL);

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

--
-- Dumping data for table `feedbacktbl`
--

INSERT INTO `feedbacktbl` (`id`, `status`, `usersignsId`, `eventid`, `announceid`, `feedback`) VALUES
(107, 'Accepted', 60, 78, NULL, 'mama ko ay may feedback sa main event'),
(108, 'Accepted', 60, 77, NULL, 'papa ko ay may feedback sa user event'),
(109, 'Accepted', NULL, NULL, 28, 'mama mo announcement'),
(110, 'Pending', 60, 77, NULL, 'sskjsjsjfjs'),
(111, 'Pending', 60, 79, NULL, 'Comments ni mam'),
(112, 'Accepted', 60, 91, NULL, 'qwerty hahaha\r\n'),
(114, 'Pending', 60, 91, NULL, 'jhgjhkkjkjhh'),
(115, 'Accepted', 60, 91, NULL, 'hghgjhjmhn'),
(116, 'Pending', 60, 91, NULL, 'ano pa bayan'),
(117, 'Pending', 60, 91, NULL, 'ahjahajhcnaj'),
(118, 'Pending', 60, 91, NULL, 'snkscnkscks'),
(119, 'Pending', 60, 91, NULL, 'sjsjsjscjsc');

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
(21, 60, 'skjskjcsj', 'llskcllsm', 'loslcmslckm', 'scslkcsljcm', 9085353978, 'jdsljls,kcmls,m', '1728365221_ee98307626a22afb2859.png', '2024-12-25', 'Received', 'skfjsjfksl'),
(22, 60, 'Donato', 'AWla', 'asd', 'dasd', 9085353978, 'dsfdasdsa', '1728632261_65271c4ce3a47e02fce2.jpg', '2024-10-11', 'Received', 'jhsajdgadadj'),
(23, 60, 'kjdsjksok', 'sjvo;sjvm', '', '', 9085353978, 'Damit ng lahat', '1728632380_f21b81e05faadceabdc8.jpg', '2024-10-11', 'Received', ''),
(24, 60, 'ksjskjsvjm', '', '', '', 9085353978, 'ajdskjfoskjf', '1728633535_34c718cb04c3ce0293c5.jpg', '2024-12-25', 'Received', ''),
(25, 60, 'ksfjsjfsjm', '', '', '', 9085353978, 'djchndjcndjmc', '1728633571_2a20ad7ce8e554c3181b.png', '2024-10-11', 'Postponed', ''),
(26, 60, 'olidovlidov', 'oljdovj', 'ikdvdovdov', 'kcdovi', 9085353978, 'sjisjkcisjkcmoslc', '1731858410_65ba25f99aa1d5480d0c.jpg', '2024-11-17', 'pending', 'ddpodpoc\\'),
(27, 60, 'kjcducjdicuj', 'dusjcoscj', 'iwcjicsjk', 'uwjesujcei', 9085353978, 'wcojcoijkwc', '1731858726_d0e5ae6687dc6ee39677.jpg', '2024-11-17', 'pending', 'dcjdcdikjcdok'),
(28, 60, 'dokdockdoc', 'slckspoclk', 'osckspoclk', 'sciksock', 9123456789, 'wcmoscskcm', '1731858773_dae78ccf06db7b5e1d88.jpg', '2024-11-17', 'pending', 'cjscijkwsick');

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

--
-- Dumping data for table `newsevents`
--

INSERT INTO `newsevents` (`id`, `title`, `Content`, `author`, `date_published`, `Category`, `picture`, `status`, `adminId`) VALUES
(42, 'news for you and me', 'wala maicontent', 'Christia', '2024-11-03 14:02:06', 'Health, Community', '1730642526_48616310a9c8736ab20b.jpg', 'Published', 58);

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
(1, '1731868476_3d2d6c74b3e2036e0332.jpg', 'Rev. Fr. ANDY PETER M. LUBI', 'Apostolic Administrator'),
(2, '1732428483_7994dc41afea2940d098.jpg', 'pepeti manaloto', 'Administrator'),
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
(16, '1111', 'Round Doormat', 'Doormat', 50.00, 7, '1729579947_ddda0f67d0a10f73e5e9.jpg', '2024-10-22 14:52:27', '2024-10-22 21:06:19'),
(17, '1112', 'Rectangle Doormat', 'Doormat', 50.00, 10, '1729580021_bf54cec63a209ee3b0ae.jpg', '2024-10-22 14:53:41', '2024-10-22 14:53:41'),
(18, '1113', 'Bracelet', 'Bracelet Big', 20.00, 10, '1729580215_98645666eb4da35b6989.jpg', '2024-10-22 14:56:55', '2024-10-22 14:56:55'),
(19, '1114', 'Bracelet', 'Bracelet Small', 10.00, 10, '1729580283_2d0de34d8c00573e5254.jpg', '2024-10-22 14:58:03', '2024-10-22 14:58:03'),
(20, '1115', 'Bracelet', 'Bracelet with Name', 20.00, 10, '1729580354_8fa0bf3d498262973c6b.jpg', '2024-10-22 14:59:14', '2024-10-22 14:59:14'),
(21, '1116', 'Virgin Mary ', 'Virgin Mary Small', 100.00, 10, '1729580416_bc417871936fea8c5388.jpg', '2024-10-22 15:00:16', '2024-10-22 15:16:59'),
(22, '1117', 'Patholder', 'Patholder Thin', 30.00, 10, '1729580607_7b436bd927fdc3e822e5.jpg', '2024-10-22 15:03:27', '2024-10-22 15:03:27'),
(23, '1118', 'Patholder', 'Patholder Square', 40.00, 10, '1729580758_c2847084bf0adff7633b.jpg', '2024-10-22 15:05:58', '2024-10-22 15:05:58'),
(24, '1119', 'Patholder', 'Patholder Thin', 30.00, 9, '1729580876_dfe60ecca39862af87af.jpg', '2024-10-22 15:07:56', '2024-11-12 14:12:37'),
(25, '1120', 'Rosary', 'Rosary White and Blue', 100.00, 20, '1729580974_d8134e3076896e216224.jpg', '2024-10-22 15:09:34', '2024-11-12 14:13:27'),
(26, '1121', 'Black Sto. Nino', 'Small', 100.00, 10, '1729581361_284f67186bb2cec11a70.jpg', '2024-10-22 15:16:01', '2024-10-22 15:16:01'),
(27, '1122', 'Virgin Mary', 'Virgin Mary Small Red', 100.00, 10, '1729581603_3d5f1670305b1475e9ad.jpg', '2024-10-22 15:20:03', '2024-10-22 15:20:03');

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
(14, 'h2.png', 'ARUGA-KAPATID FOUNDATION INCORPORATED', 0.00, 'homepage', ''),
(15, 'h1.jpg', 'You\'re never too old to begin again, and to create yourself a happy ending', NULL, 'homepage', ''),
(16, 'h3.jpg', '\"Your heart holds the wisdom of ages, and your spirit remains forever young. Keep spreading your warmth and love.\"', NULL, 'homepage', ''),
(17, 'g2.jpg', NULL, NULL, 'gallery', ''),
(19, 'g3.jpg', NULL, NULL, 'gallery', ''),
(20, 'g4.jpg', NULL, NULL, 'gallery', ''),
(21, 'g5.jpg', NULL, NULL, 'gallery', ''),
(22, 'g6.jpg', NULL, NULL, 'gallery', ''),
(25, 'g9.jpg', NULL, NULL, 'gallery', ''),
(26, 'g10.jpg', NULL, NULL, 'gallery', ''),
(27, 'g11.jpg', NULL, NULL, 'gallery', ''),
(28, 'g12.jpg', NULL, NULL, 'gallery', ''),
(30, 'g14.jpg', NULL, NULL, 'gallery', ''),
(31, 'g15.jpg', NULL, NULL, 'gallery', ''),
(32, 'g16.jpg', NULL, NULL, 'gallery', '');

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
(14, 'jshclsvujlosjvo', '09085353978', 'shantal@gmail.com', '2024-07-03 02:09:21', ' jhfkkisvliusjvlslvkjslkv', 'Unread'),
(15, 'Dan Keneth Rontale', '09085353978', 'dalandan@gmail.com', '2024-11-04 06:03:30', ' jahajajajjaja', 'Unread');

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
(29, 's,kjslkmsk', 21, '30', 'akjdlakjdmlka', '1716720190_f320f97c500d1ac182ae.jpg'),
(30, 'scjscjos', 0, '1000', 'zkjcjkzcm', '1729567161_efabaaf3fe7be2f990a5.jpg');

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
(112, 'ADAN', 'ENRICO', 'MALINAO', 'RICO', '1962-02-19', 'Male', 'Single', '09123456789', 'BUHANGIN, NAUJAN, OR. MDO.', '1730764320_fff1b5241530ff6a7fe4.jpg', 'BUHANGIN, NAUJAN, OR. MDO.', '09123456789', '2024-11-05', 'Left', '2024-11-05 07:52:00', '2024-11-08', 'ksjkjskjscc', '', '', 58),
(113, 'ALCARAZ', 'LORENDA', 'AXALAN', 'LOREN', '1967-08-19', 'Female', 'Single', '09123456789', 'POBLACION, PUERTO GALERA, OR. MDO.', '1730764495_4d3998a0ee127ae9c10f.jpg', 'POBLACION, PUERTO GALERA, OR. MDO.', '09123456789', '2024-11-05', 'Deceased', '2024-11-05 07:54:55', '', '', '2024-11-08', 'jckdlkdkvd', 58),
(114, 'ARENO', 'LETECIA', 'BELLONES', 'LETY', '1941-02-28', 'Female', 'Single', '09123456789', 'BAGUMBAYAN 2, BONGABONG, OR. MDO.', '1730764750_98da1d0a2652b22c35c8.jpg', 'BAGUMBAYAN 2, BONGABONG, OR. MDO.', '09123456789', '2024-11-02', 'Left', '2024-11-05 07:59:10', '2024-11-08', 'jksncoikck', '', '', 58),
(115, 'ATIENZA', 'HELEN', 'RAMIREZ', 'HELEN', '1945-12-25', 'Female', 'Widowed', '09123456789', 'BAYANAN 2, CALAPAN CITY, OR, MDO.', '1730766201_4a502d7c9e512d31cfdc.jpg', 'BAYANAN 2, CALAPAN CITY, OR, MDO.', '09123456789', '2024-11-05', 'Left', '2024-11-05 08:23:21', '2024-11-08', 'hcikjiksjcdkc', '', '', 58),
(116, 'BOONGALING', 'HERMEO', 'MENDOZA', 'HERME', '1957-04-13', 'Male', 'Divorced', '09123456789', 'BAGUMBAYAN, ROXAS, OR. MDO.', '1730767887_a6161cc4fe5a54664796.jpg', 'BAGUMBAYAN, ROXAS, OR. MDO.', '09123456789', '2024-11-05', 'Deceased', '2024-11-05 08:51:27', '', '', '2024-11-08', 'd cdmvnk;djvo;dl', 58),
(117, 'DE CASTRO', 'MELECIO', 'MAGRO', 'MELE', '1931-07-29', 'Male', 'Single', '09123456789', 'SAN ANTONIO, PUERTO GALERA, OR. MDO.', '1730768042_763ab2f75b3a1969e408.jpg', 'SAN ANTONIO, PUERTO GALERA, OR. MDO.', '09123456789', '2024-11-05', 'Deceased', '2024-11-05 08:54:02', '', '', '2024-11-08', 'sncihscicsjics', 58),
(118, 'GUSTO', 'BENEDICTA', 'MACALALAD', 'BENENG', '1933-05-06', 'Female', 'Widowed', '09123456789', 'POLA, OR. MDO.', '1730768156_04b295d614b09015ed71.jpg', 'POLA, OR. MDO.', '09123456789', '2024-11-05', 'Deceased', '2024-11-05 08:55:56', '', '', '2024-11-08', 'scmnskckscksjc', 58),
(119, 'sjhshcnsjhcnsj', 'kjcscncsjj', 'sjkscschshsch', 'dacnscjsncjsc', '1940-12-25', 'Male', 'Single', '09123456789', 'sjhshcishciskjcis', '1731053402_ba7f8113d24e6696140d.jpg', 'sjhcnksnckjsc', '09876543212', '2024-11-08', 'Deceased', '2024-11-08 16:10:02', '', '', '2024-11-08', 'jsksksksjsjcjc', 58),
(120, 'my name', 'Testing', 'Jekjek', 'Mary', '1950-12-05', 'Male', 'Married', '09939469530', 'Somewhere', '1731303830_a2f266431ea0153a3240.jpg', 'Camansihan', '09939469530', '2024-11-11', 'Left', '2024-11-08 16:10:57', '2024-11-13', 'reason', '', '', 58),
(121, 'skjkskjfoisjo', 'ksjckscks', 'iksjsoickj', 'cdcksjsjkcisjci', '1968-02-13', 'Female', 'Married', '09123456789', 'mcnksjcnksnc', '1731303939_f0fc18f2988bc87e9fcd.jpg', 'smcnkscnkscn', '09123456789', '2024-11-08', 'Left', '2024-11-08 16:11:59', '2024-11-13', 'hdoshfois', '', '', 58),
(122, 'jshcisjciscjn', 'ksjcmiskjcmiok', 'skc,jmsolickjm', 'skjcmsickj', '1960-06-05', 'Male', 'Single', '09876543212', 'sbcjdhcudjhnc', '1731053581_cb32742c248f9ecc1144.jpg', 'msncjscjknckms', '09876543212', '2024-11-08', 'Left', '2024-11-08 16:13:01', '2024-11-13', 'lksfjpdoj', '', '', 58),
(123, 'sjkckjshcjshc', 'shckscisc', 'cscjschsj', 'shcsjhcjsh', '1956-07-07', 'Female', 'Divorced', '09876543212', 'sknckscioskc', '1731053630_201a252cfbc5167be0ca.jpg', 'scksnckskck', '09633895647', '2024-11-08', 'Left', '2024-11-08 16:13:50', '2024-11-13', 'slmlscmslcs', '', '', 58),
(124, 'snbcnscjbscj', 'snksjcksck', 'skcjkscksocn', 'ksncksjcmhnsk', '1945-08-09', 'Female', 'Divorced', '09261454009', 'sjcjschusjchj', '1731053680_b71b8438b05ddca29a39.jpg', 'jsncjishciusjhcusj', '09123456789', '2024-11-08', 'Left', '2024-11-08 16:14:40', '2024-11-13', 'skjs;lcslck,s', '', '', 58),
(125, 'smncksjncsjn', 'nskcnskncsik', 'kjscskcnksc', 'ksjcmskjcmsk', '1945-09-05', 'Male', 'Divorced', '09876543212', 'wjkhdiwjdikjwd', '1731053732_d2e378b85f41041f23aa.jpg', 'sncokscnksjcmk', '09261454009', '2024-11-08', 'Left', '2024-11-08 16:15:32', '2024-11-13', 'dkjdjvmdjkvm', '', '', 58),
(126, 'jkdhvkjdvk', 'ksjmckosjc', 'ksjcmksj', 'ksjcskjc', '1965-08-09', 'Female', 'Married', '09876543212', 'dkjkdjvkdjvkjmed', '1731053781_da94eebc95c43037137b.jpg', 'smussjkscjsnjs', '09123456789', '2024-11-08', 'Unarchive', '2024-11-08 16:16:21', '', '', '', '', 58),
(127, 'kvckdjvmkjdvk', 'ks,mksjmsk', 'ksjmckjmscj', 'adskdksjds', '1968-03-14', 'Female', 'Married', '09123456789', 'udghejhdfedj', '1731053846_08b04a67185a8d8faf1b.jpg', 'dmnkdjhnvidj', '09123456789', '2024-11-08', 'Unarchive', '2024-11-08 16:17:26', '', '', '', '', 58),
(128, 'smnksnckjsck', 'ksjmcksncnjs', 'ksjcdkjcidk', 'ks,jcmksj,cmk', '1956-05-07', 'Male', 'Divorced', '09876543212', 'ehcedvnkdhncik', '1731053899_1368522084a2c61fc800.jpg', 'dmnidnvkdvkd', '09085353978', '2024-11-08', 'Unarchive', '2024-11-08 16:18:19', '', '', '', '', 58),
(129, 'smcnoidhviudj', 'ksjmclksck', 'ksjcmksjcks', 'ksjckdsjckd', '1967-06-15', 'Female', 'Single', '09876543212', 'jsdckcliksjciks', '1731053950_acb3de7b5c41b28db082.jpg', 'cjkjkjdckdcjkmd', '09261454009', '2024-11-08', 'Unarchive', '2024-11-08 16:19:10', '', '', '', '', 58),
(130, 'xjkcnodscnxdsnc', 'kjdckjdckj', 'ksjcskjcik', 'skjcidjkcmsik', '1943-06-07', 'Male', 'Divorced', '09876543212', 'jsnlcjkslcjmwliskcsik', '1731054021_ca3cbcd866da8faa5490.jpg', 'smncmsncsm', '09876543212', '2024-11-08', 'Unarchive', '2024-11-08 16:20:21', '', '', '', '', 58),
(131, 'slkjsknclksncj', 'lk,sjmcklsjcmk,', 'lks,jcmsk,jcm', 'kjcsmkjcmskc', '1954-05-06', 'Male', 'Divorced', '09633895647', 'ejhckjenckecsi', '1731054070_a33bb5646960a685af4c.jpg', 'njkjwdshnoiskjci', '09876543212', '2024-11-08', 'Unarchive', '2024-11-08 16:21:10', '', '', '', '', 58),
(132, 'slkcdjclkdjckdj', 'ksjcskjcksc', 'ksjcsickjscjk', 'ksjcmskjcskjcm', '1957-08-05', 'Female', 'Married', '09876543212', 'skjhchcnjknsckjsc', '1731054188_df4d573c57c3b873264e.jpg', 'skcskcoscscsjsl', '09123456789', '2024-11-08', 'Deceased', '2024-11-08 16:23:08', '', '', '2024-11-24', 'tuberculosis', 58),
(133, 'ekjckejcmkejcm', 'kjcmskcsk,', 'ksjmksjcskc', 'ksjcskjcskjcm', '1958-07-05', 'Male', 'Married', '09876543212', 'jkscnkmsckjsmc sikjcskjcmskc, socjosclsikc', '1731054234_3b54938c6a95f8ab06c4.jpg', 'skcms.,cmscm,', '09633895647', '2024-11-08', 'Unarchive', '2024-11-08 16:23:54', '', '', '', '', 58),
(134, 'lsmc,skmc,slcm,sl,c', 'ls,mclsmcslcm', 'skkjcksjcksj', 'kcjsmksjcmksc', '1949-09-04', 'Male', 'Divorced', '09876543212', 'sls,cjmskcmsk,cm', '1731054289_c488bf0561745009b3dc.jpg', 'smc ksl,clsk,c iskjcksjciksc wiksjcisjc', '09085353978', '2024-11-08', 'Unarchive', '2024-11-08 16:24:49', '', '', '', '', 58),
(135, 'Manalo', 'Rosela', 'Herilla', 'Rose', '1963-03-18', 'Female', 'Married', '09939469530', 'Camansihan, Calapan City, Or. Mdo', '1731303728_3bbad232670f83a61f72.jpg', 'Camansihan, Calapan City, Or. Mdo', '09939469530', '2024-11-11', 'Unarchive', '2024-11-11 13:42:08', '', '', '', '', 58),
(136, 'Manalo', 'Christia', 'Dela Chica', 'Jekjek', '1969-12-25', 'Female', 'Single', '09633895647', 'Camansihan, Calapan City, Or. Mdo.', '1731313984_dfd2f5f6dda11529fd9c.jpg', 'Camansihan, Calapan City, Or. Mdo.', '09123456789', '2024-11-11', 'Unarchive', '2024-11-11 16:33:04', '', '', '', '', 58);

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
(49, '2024061900001', 'shantal', 600.00, 1000.00, '2024-06-19 11:00:36', '2024-06-19 11:00:36'),
(50, '2024102200001', 'christia', 150.00, 200.00, '2024-10-22 21:06:18', '2024-10-22 21:06:18'),
(51, '2024111200001', 'Li', 30.00, 100.00, '2024-11-12 14:12:37', '2024-11-12 14:12:37');

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
(49, 18, 20.00, 30, '2024-06-19 11:00:37', '2024-06-19 11:00:37'),
(50, 16, 50.00, 3, '2024-10-22 21:06:19', '2024-10-22 21:06:19'),
(51, 24, 30.00, 1, '2024-11-12 14:12:37', '2024-11-12 14:12:37');

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
(58, '', 1, 'Aruga', 'HApag', 'default.jpg', 'Aruga', '09985774919', 'aruga.kapatid@gmail.com', 'MainAdmin', '2002-12-25', '$2y$10$DWTzweTrivkAQH84Dw6Owu6SL46rdRdMUBStGEeX6H/d7emFMa9U6', '2024-07-02 05:44:39', '2024-07-02 05:44:39'),
(59, '', 1, 'Ramirez', 'Jennirfer', '', 'jennifer', '09876543212', 'jenniferramirez25@gmail.com', 'Booker', '2002-01-25', '$2y$10$x9jqA6X6CKxJQGC6gRbuSukg0dEV7rS58VcBgPi..LPmzE8otC8SK', '2024-08-13 04:09:58', '2024-08-13 04:09:58'),
(60, '', 1, 'Dela Chica', 'Christia Angel', '', 'Chris25', '09876542212', 'changeldc11@gmail.com', 'Booker', '2002-12-24', '$2y$10$Fv0Y.Oej4UeffV3pW/boae5//tVj9jOtQO3K.TjaV613b2Gy7Jm8K', '2024-08-31 11:56:07', '2024-08-31 11:56:07'),
(69, '', 1, 'Manalo', 'Christia Angelica', 'default.jpg', 'christia255', '09939469530', 'delachicachristiaangelicam@gmail.com', 'Admin', '2002-12-25', '$2y$10$Vt966p0Gcgy5bBMYU8N3EeNFQRmtsLKX/LiKJH.ky1Pgy/IPgJ6Lq', '2024-11-12 04:24:12', '2024-11-12 04:24:12');

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
(41, 60, 'skjfsfmosjfm', '', '', '', 9085353978, '2024-10-08 05:02:54', 12234000, 0, '', 'sjksdj123322', 'Received', '', 0),
(42, 60, 'skjskvnikn', 'ksj,msvjn', 'sjlsoljvo', 'osjlfsofj', 9123456789, '2024-10-08 05:27:53', 122233000, 0, '', '21234342A', 'Received', '', 0),
(43, 60, '', '', '', '', 9085353978, '2024-10-11 05:34:23', 0, 0, '6708b8df7018a.jpg', '21234342A', 'Received', '', 0),
(44, 60, 'Christia Angelica Establishment', '', '', '', 9085353978, '2024-10-11 06:01:04', 20000, 0, '', 'qwert1234', 'Postponed', 'May be This Time', 0),
(45, 60, 'Donato lang', '', '', '', 9876543212, '2024-10-11 06:26:09', 10000, 0, '', '221133', 'Postponed', '', 0),
(46, 60, 'Dela Chica establishment', '', '', '', 9085353978, '2024-10-11 06:32:44', 10000, 0, '', '231415124A', 'Received', '', 0),
(47, 60, 'Chacha Establishment', '', '', '', 9085353978, '2024-10-11 06:34:17', 0, 0, '', '231415124A', 'Received', '', 0),
(48, 60, 'sklslkfslkf', 'slikslkv', 'jlxvlxkvxkv', 'sklkclkcskc', 9085353978, '2024-11-17 13:42:47', 10000, 0, '', '231415124A', 'Received', 'sdkldk.sd', 0),
(49, 60, 'askdj', 'sdjskjk', 'sjdkfj', 'ksdjfk', 9123456789, '2024-11-17 14:52:38', 21231, 0, '', 'sdopfpok23kqq', 'Received', '', 0),
(50, 60, 'sad', 'sad', 'asd', 'sad', 9876543212, '2024-11-17 15:27:15', 123123, 0, '', '2112e4', 'Received', '', 0),
(51, 60, 'asdasd', 'sadas', 'sadas', 'asdasd', 9987655656, '2024-11-17 15:27:37', 21312, 12312, '', '213', 'Received', '', 0),
(52, 60, 'sadsd', 'asd', 'sada', 'asdasd', 9876543212, '2024-11-17 15:40:11', 243234, 0, '', 'kjrjklj34k', 'Postponed', '', 0),
(53, 60, 'jcdjcjdcndjcn', 'sjcnsjcs', 'skjcskjcsk', 'kjsckjsci', 9085353978, '2024-11-24 05:14:50', 900000, 0, '', 'dkcdkjcdiojkc', 'Received', '', 0),
(54, 60, 'Immaculate Conception Parish', 'Dela Chica', 'Christia Angelica', '', 9987655656, '2024-11-24 10:48:52', 10000, 500, '1732445332_50c7e15d327da87da1e8.jpg', '231415124A', 'Received', 'hello', 0),
(58, 58, 'Establishment ni Admin', '', '', '', 9876543212, '2024-11-25 02:09:45', 25000, NULL, '6743dc693ad96.jpg', '113781738137', 'Received', 'May be This Time', 0),
(59, 58, 'Immaculate Conception Parish', 'Right', 'Dello', 'BLKD', 9261454009, '2024-11-25 02:11:03', 30000, NULL, '1732500663_7b7def596758affc21a9.jpg', '8283728', 'Received', 'Hello', 0),
(60, 58, 'sl;dksldk', 'lsksl;ck', 'lksc;lskc', 'lwkdw;ldk,', 9939469530, '2024-11-25 02:12:29', 9889000, NULL, '6743dd0d9dbcb.jpg', '82837281j', 'Received', 'dkwkdpsld', 0),
(61, NULL, 'asdasd', 'sadsad', 'sadsad', 'sadasd', 0, '2024-11-25 02:21:19', NULL, NULL, '', '', '', 'asdsa', 0),
(62, 58, 'asdasd', 'sadsad', 'sadsad', 'sadasd', 9876543212, '2024-11-25 02:23:48', 123132, NULL, '', 'sad2e3', 'Received', 'asdsa', 0),
(63, 58, 'sadasd', 'sadasd', 'sadsad', 'sadasd', 9876543212, '2024-11-25 02:27:00', 122314, NULL, '1732501620_0ea960e4076d550ba84b.jpg', 'sadasd', 'Received', 'asda', 0),
(64, 58, 'Establishment ni Tia sa admin', 'kdjclkdjck', 'ksjcsikjc', 'ksjcsikjc', 9876543212, '2024-11-25 02:28:37', 12500, NULL, '1732501717_45473d15ae0f4b01eef4.jpg', '82837281j', 'Received', 'May be This Time', 0);

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
(1, 'We envision that the poor , abandoned, neglected and/or any other elders in disadvantaged situation will be able to restore their dignity in life, living with the fullness of life in Christ.', 'We Fully adopt the core values of Hapag ng Pamilyang Mindoreño.\n<p>• Kapatiran</p>\n<p>• Damayan</p>\n<p>• Tapungan</p>\n<p>• Saknungan</p>', 'Our Home for the aged is elderly care program which provide the poor, neglected, sick and abandoned elders the ambience of a real home. We offer them the best care while they are with us, secured life as they approach their twilight  years. The institution witll basically provide residential care to elders whereinthey will be provide their their basic needs. (food, shelter, clothing, medicine, hospitalization, provision of free coffin and burial services).', 'g11.jpg');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `adminsionsliptbl`
--
ALTER TABLE `adminsionsliptbl`
  MODIFY `slipId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `AnnounceID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `donationdets`
--
ALTER TABLE `donationdets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `elderneed`
--
ALTER TABLE `elderneed`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `feedbacktbl`
--
ALTER TABLE `feedbacktbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `inkinddonation_tbl`
--
ALTER TABLE `inkinddonation_tbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `newsevents`
--
ALTER TABLE `newsevents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `organizationtable`
--
ALTER TABLE `organizationtable`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblscdetails`
--
ALTER TABLE `tblscdetails`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `userbooking`
--
ALTER TABLE `userbooking`
  MODIFY `bookingId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `userdonation`
--
ALTER TABLE `userdonation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
