-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2018 at 11:13 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2018-06-01 06:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `librarybooks`
--

CREATE TABLE `librarybooks` (
  `id` int(11) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `Barcode` varchar(255) NOT NULL,
  `Callnumber` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Subtitle` varchar(255) DEFAULT NULL,
  `Author` varchar(255) NOT NULL,
  `Edition` varchar(255) NOT NULL,
  `Publisher` varchar(255) NOT NULL,
  `Copyright` varchar(255) NOT NULL,
  `Physicaldesc` varchar(255) NOT NULL,
  `Series` varchar(255) NOT NULL,
  `Subject_1` varchar(255) NOT NULL,
  `Subject_2` varchar(255) NOT NULL,
  `Subject_3` varchar(255) NOT NULL,
  `Subject_4` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Material` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarybooks`
--

INSERT INTO `librarybooks` (`id`, `ISBN`, `Barcode`, `Callnumber`, `Title`, `Subtitle`, `Author`, `Edition`, `Publisher`, `Copyright`, `Physicaldesc`, `Series`, `Subject_1`, `Subject_2`, `Subject_3`, `Subject_4`, `Location`, `Material`, `Status`) VALUES
(1, 'ISBN Number1', 'Barcode1', 'Callnumber1', 'Title1', 'Subtitle1', 'Author1', 'Edition1', 'Publisher1', 'Copyright1', 'Desc1 \r\n', 'Series1', 'Subject1', '', '', '', 'Location1', 'Books', 'I'),
(2, 'ISBN Number2', 'Barcode2', 'Callnumber2', 'Title2', 'Subtitle2', 'Author2', 'Edition2', 'Publisher2', 'Copyright2', 'Desc2 \r\n', 'Series2', 'Subject2', 'Pre Subject2', '2', '3', 'Location2', 'Books', 'O');

-- --------------------------------------------------------

--
-- Table structure for table `library_books`
--

CREATE TABLE `library_books` (
  `ID` int(11) NOT NULL,
  `Book_Image` varchar(255) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `Book_Title` varchar(255) NOT NULL,
  `Book_Author` varchar(255) NOT NULL,
  `Book_Category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library_books`
--

INSERT INTO `library_books` (`ID`, `Book_Image`, `ISBN`, `Book_Title`, `Book_Author`, `Book_Category`) VALUES
(1, 'books/AThousandPiecesofYou.jpg', '9780062278982', 'A Thousand Pieces of You', 'Claudia Gray', 'Fiction, Romance'),
(2, 'books/TenThousandSkiesAboveYou.jpg', '9780062427892', 'Ten Thousand Skies Above You', 'Claudia Gray', 'Fiction, Romance'),
(3, 'books/Unfiltered.jpg', '9780062473035', 'Unfiltered', 'Lily Collins', 'Young Adult, Nonfiction, Biography, Autobiography'),
(4, 'books/AnotherDay.jpg', '9780385756211', 'Another Day', 'David Levithan', 'Fiction, Fantasy, Novel'),
(5, 'books/EveryDay.jpg', '9780449015209', 'Every Day', 'David Levithan', 'Fiction, Fantasy, Novel'),
(6, 'books/AMillionWorldswithYou.jpg', '9781441722515', 'A Million Worlds with You', 'Claudia Gray', 'Fiction, Romance'),
(7, 'books/TheUniverseOfUs.jpg', '9781449480127', 'The Universe Of Us', 'Lang Leav', 'Romance, Novel'),
(8, 'books/Slammed.jpg', '9781468161663', 'Slammed', 'Colleen Hoover', 'Romance, Novel'),
(9, 'books/November9.jpg', '9781471154638', 'November 9', 'Colleen Hoover', 'Romance, Novel'),
(10, 'books/AlwaysAndForeverLaraJean.jpg', '9781481430500', 'Always and Forever, Lara Jean', 'Jenny Han', 'Novel, Fiction'),
(11, 'books/PSIStillLoveYou.jpg', '9781481444712', 'P.S. I Still Love You', 'Jenny Han', 'Novel, Fiction'),
(12, 'books/SixEarlierDays.jpg', '9781922148476', 'Six Earlier Days', 'David Levithan', 'Fiction, Fantasy, Novel'),
(13, 'books/ToAlltheBoysIveLovedBefore.jpg', '9783446254350', 'To All the Boys Ive Loved Before', 'Jenny Han', 'Novel, Fiction'),
(14, 'books/UglyLove.jpg', '9788375153569', 'Ugly Love', 'Colleen Hoover', 'Fiction, Novel'),
(15, 'books/Will GraysonWill Grayson.jpg', '9788416297191', 'Will Grayson, Will Grayson', 'John Green, David Levithan', 'Novel, Romance, Fiction'),
(16, 'books/Divergent.jpg', '97800622789599', 'Divergent', 'Veronica Roth', 'Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `Type`) VALUES
(1, 'Books');

-- --------------------------------------------------------

--
-- Table structure for table `table_copies`
--

CREATE TABLE `table_copies` (
  `ID` int(11) NOT NULL,
  `BarCode` varchar(255) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_copies`
--

INSERT INTO `table_copies` (`ID`, `BarCode`, `ISBN`, `Location`, `Status`) VALUES
(1, '1001', '9780062473035', 'A0', 'I'),
(2, '1002', '9780062473035', 'A0', 'I'),
(3, '1003', '9780062278982', 'A2', 'I'),
(4, '1004', '9780062278982', 'A2', 'I'),
(5, '1005', '9780062278982', 'A2', 'I'),
(6, '1006', '9780062278982', 'A2', 'I'),
(7, '1007', '9780062278982', 'A2', 'I'),
(8, '1008', '9780062427892', 'A2', 'I'),
(9, '1009', '9780062427892', 'A2', 'I'),
(10, '1010', '9780062427892', 'A2', 'I'),
(11, '1011', '9780062427892', 'A2', 'I'),
(12, '1012', '9780385756211', 'A1', 'I'),
(13, '1013', '9780385756211', 'A1', 'I'),
(14, '1014', '9780385756211', 'A1', 'I'),
(15, '1015', '9780449015209', 'A1', 'I'),
(16, '1016', '9780449015209', 'A1', 'I'),
(17, '1017', '9781441722515', 'A2', 'I'),
(18, '1018', '9781441722515', 'A2', 'I'),
(19, '1019', '9781441722515', 'A2', 'I'),
(20, '1020', '9781441722515', 'A2', 'I'),
(21, '1021', '9781441722515', 'A2', 'I'),
(22, '1022', '9781449480127', 'A6', 'I'),
(23, '1023', '9781449480127', 'A3', 'I'),
(24, '1024', '9781449480127', 'A3', 'I'),
(25, '1025', '9781468161663', 'A4', 'I'),
(26, '1026', '9781468161663', 'A2', 'I'),
(27, '1027', '9781471154638', 'A4', 'I'),
(28, '1028', '9781471154638', 'A4', 'I'),
(29, '1029', '9781481430500', 'A5', 'I'),
(30, '1030', '9781481430500', 'A5', 'I'),
(31, '1031', '9781481444712', 'A5', 'I'),
(32, '1032', '9781481444712', 'A5', 'I'),
(33, '1033', '9781922148476', 'A1', 'I'),
(34, '1034', '9781922148476', 'A1', 'I'),
(35, '1035', '9783446254350', 'A5', 'I'),
(36, '1036', '9783446254350', 'A5', 'I'),
(37, '1037', '9788375153569', 'A4', 'I'),
(38, '1038', '9788375153569', 'A4', 'I'),
(39, '1039', '9788416297191', 'A7', 'I'),
(40, '1040', '9788416297191', 'A6', 'I'),
(41, '2111', '2018678987', 'B1', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`) VALUES
(2, 'Fiction'),
(3, 'Romance'),
(4, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `id` int(11) NOT NULL,
  `Course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`id`, `Course`) VALUES
(1, 'Bachelor of Arts in International Studies (Major in Tourism)'),
(2, 'Bachelor of Arts in Psychology'),
(3, 'Bachelor of Arts in Communication and Media Studies'),
(4, 'Bachelor of Science in Psychology'),
(5, 'Bachelor of Science in Accountancy'),
(6, ' Bachelor of Science in Accounting Technology'),
(7, 'Bachelor of Science in Legal Management '),
(8, 'Bachelor of Science in Business Administration (Major in Marketing Management)'),
(9, 'Bachelor of Science in Business Administration (Major in Financial Management)'),
(10, 'Bachelor of Science in Information Technology'),
(11, 'Bachelor of Science in Entrepreneurship');

-- --------------------------------------------------------

--
-- Table structure for table `tblissuedbookdetails`
--

CREATE TABLE `tblissuedbookdetails` (
  `id` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `StudentID` varchar(150) DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `expirationDate` varchar(255) NOT NULL,
  `ReturnDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `RetrunStatus` int(1) NOT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblissuedbookdetails`
--

INSERT INTO `tblissuedbookdetails` (`id`, `BookId`, `StudentID`, `IssuesDate`, `expirationDate`, `ReturnDate`, `RetrunStatus`, `fine`) VALUES
(2, 1003, '2015300391', '2018-10-22 07:11:39', '', NULL, 0, NULL),
(3, 1009, '2015300456', '2018-10-22 07:12:00', '', '2018-10-22 07:12:43', 1, 50),
(4, 1017, '2015300789', '2018-10-22 07:12:26', '', '2018-10-22 07:12:37', 1, 0),
(5, 1018, '2015300391', '2018-10-22 08:09:26', '', NULL, 0, NULL),
(6, 1020, '2015300391', '2018-10-26 08:59:40', '2018-10-27', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(100) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `YearLevel` varchar(120) DEFAULT NULL,
  `Course` varchar(255) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `StudentId`, `user_image`, `FullName`, `EmailId`, `YearLevel`, `Course`, `MobileNumber`, `Password`, `Status`, `RegDate`, `UpdationDate`) VALUES
(18, '2015300391', 'UserImage/17241-200.png', 'User', 'user@gmail.com', 'College (4th Year)', 'Bachelor of Science in Information Technology', '09275261847', 'ee11cbb19052e40b07aac0ca060c23ee', 1, '2018-10-22 07:06:04', '2018-10-22 07:06:40'),
(19, '2015300456', 'UserImage/17241-200.png', 'User2', 'user2@gmail.com', 'College (4th Year)', 'Bachelor of Science in Business Administration (Major in Financial Management)', '09271237856', '7e58d63b60197ceb55a1c487989a3720', 1, '2018-10-22 07:10:21', NULL),
(20, '2015300789', 'UserImage/17241-200.png', 'User3', 'user3@gmail.com', 'College (4th Year)', ' Bachelor of Science in Accounting Technology', '09278946742', '92877af70a45fd6a2ed7fe81e1236b78', 1, '2018-10-22 07:11:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblyearlevel`
--

CREATE TABLE `tblyearlevel` (
  `id` int(11) NOT NULL,
  `YearLevel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblyearlevel`
--

INSERT INTO `tblyearlevel` (`id`, `YearLevel`) VALUES
(1, 'Grade 1'),
(2, 'Grade 2'),
(3, 'Grade 3'),
(4, 'Grade 4'),
(5, 'Grade 5'),
(6, 'Grade 6'),
(7, 'Junior High (Grade 7)'),
(8, 'Junior High (Grade 8)'),
(9, 'Junior High (Grade 9)'),
(10, 'Junior High (Grade 10)'),
(11, 'Senior High'),
(12, 'College (1st Year)'),
(13, 'College (2nd Year)'),
(14, 'College (3rd Year)'),
(15, 'College (4th Year)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarybooks`
--
ALTER TABLE `librarybooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_books`
--
ALTER TABLE `library_books`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_copies`
--
ALTER TABLE `table_copies`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- Indexes for table `tblyearlevel`
--
ALTER TABLE `tblyearlevel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `librarybooks`
--
ALTER TABLE `librarybooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `library_books`
--
ALTER TABLE `library_books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_copies`
--
ALTER TABLE `table_copies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblyearlevel`
--
ALTER TABLE `tblyearlevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
