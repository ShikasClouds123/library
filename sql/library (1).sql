-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2018 at 09:53 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

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
  `Location` varchar(255) NOT NULL,
  `Material` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarybooks`
--

INSERT INTO `librarybooks` (`id`, `ISBN`, `Barcode`, `Callnumber`, `Title`, `Subtitle`, `Author`, `Edition`, `Publisher`, `Copyright`, `Physicaldesc`, `Series`, `Subject_1`, `Location`, `Material`, `Status`) VALUES
(1, 'ISBN Number1', 'Barcode1', 'Callnumber1', 'Title1', 'Subtitle1', 'Author1', 'Edition1', 'Publisher1', 'Copyright1', 'Desc1 \r\n', 'Series1', 'Subject1', 'Location1', 'Books', 'I'),
(2, 'ISBN Number2', 'Barcode2', 'Callnumber2', 'Title2', 'Subtitle2', 'Author2', 'Edition2', 'Publisher2', 'Copyright2', 'Desc2 \r\n', 'Series2', 'Subject2', 'Location2', 'Books', 'I'),
(3, '90009', '1112', '09275261847', 'TITLE', 'sda', 'asd', 'asd', 'asd', 'asd', ' asd\r\n', 'asd', '1', 'a1', 'Books', 'O'),
(4, '9780062278982', '1001', '1001 A', 'A Thousand Pieces of You', 'A Thousand Pieces of You Subtitle', 'Claudia Gray', 'Gold Edition', 'Sample Publisher', 'Copyright 2018', 'Sample Description \r\n', 'Sample Series', 'Subject1', 'A1', 'Books', 'O'),
(5, '9780062473035', '1002', '1002 A', 'Unfiltered', 'Unfiltered Subtitle', 'Lily Collins', 'Silver Edition', 'Sample Publsiher', 'Copyright 2018', 'Physical Description \r\n', 'Sample Series', 'Subject1', 'A2', 'Books', 'I'),
(6, '123', '123', '123214', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample \r\n', 'sample', 'sample', 'A1', 'magazine', 'I'),
(7, '123132', '12312', '21313', '21313132', '321313213', '2132131231', '131232', '1312312', '31313', ' 2133\n', '231233', ' 2133\n', '23123', '21321', '\nmp4'),
(8, '123123', '112321', '123', '1232', '123', '1231', '123123', '123123', '1232', ' 12312\n', '1231', ' 12312\n', '321321', '21313', '\nBooks'),
(9, '', '', '', '', '', '', '', '', '', ' \n', '', ' \n', '', '', 'Select Type'),
(10, '', '', '', '', '', '', '', '', '', ' \n', '', ' \n', '', '', 'Select Type'),
(11, 'asdasd', 'adasd', 'adadadas', 'dasdada', 'dadadasd', '', 'asdadd', 'asdadad', 'asdas', ' asdasd\n', 'asdad', ' asdasd\n', 'das', 'asdada', '\nBooks'),
(12, '122312', '213123', '21321', '31231221312', '21321', '', '21312312', '31231232', '1312312', ' 12312321\n', '123213', ' 12312321\n', '213123', '12232313', '\nBooks'),
(13, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'asdasd', 'asdasdad', 'asdada', 'adadsada', 'sadasd', '', 'saddd', 'asddasdasd', 'assadd', ' dsadasd\n', 'asdada', ' dsadasd\n', 'adada', 'asdasd', '\nmp3'),
(15, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, '131', '1231233', '1331231', '23123', '1231', '', '123123', '21312321', '3213', ' 1231231\n', '23123123', ' 1231231\n', '312313', '123123', '\nBooks'),
(17, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, '123123', '31312321', '312312', '3123123', '12321312', '', '21312321', '3231313', '21', ' \n2131231', '21312321', ' \n2131231', '3312312', '213123', '\nBooks'),
(22, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, '12313', '32132132', '213123', '13123131', '31232', '', '', '', '', ' \n', '', ' \n', '', '', 'Select Type'),
(24, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, '2312312312', '312312', '313113131', '213123', '13123', '', '213123', '131312312', '313131', ' 131231\n', '31231231', ' 131231\n', '31231', '12313', '\nBooks'),
(26, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, '21313', '1233123', '13123123', '1232131', '123123', '', '2131231', '123231231', '212312', ' 1231231\n', '12312312', ' 1231231\n', '12312312', '213123', '\nmp4'),
(28, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, '123123qweas', 'dasdasdas', 'dadadad', 'asdada', 'dadadas', 'asdasd,\ndasdasd,\nasdasda,\ndasda,\ndasda', 'dadasdasddadada', 'asdasdasdasda', 'asdasdadadasdas', ' dasdas\r\n', 'dasdasdadas', 'asdasdsa,\ndasdasda,\ndasdad', 'asdasd', 'Books', 'I'),
(35, '313123', '213123', '1231231', '1231232', '3123123', '2131231,\n231231231,\n3123', '123123', '213123', '23123123', ' 123123\r\n', '21312313', '312321,\n12312', '21312312', 'Books', 'I'),
(36, '313123', '213123', '1231231', '1231232', '3123123', '2131231,\n231231231,\n3123', '123123', '213123', '23123123', ' 123123\r\n', '21312313', '312321,\n12312', '21312312', 'Books', 'I'),
(37, '313123', '213123', '1231231', '1231232', '3123123', '2131231,\n231231231,\n3123', '123123', '213123', '23123123', ' 123123\r\n', '21312313', '312321,\n12312', '21312312', 'Books', 'I'),
(38, '213123', '13131', '31231231312321', '31313123', '123123123', '213123,\n12312312312,\n312312312', '123123', '123123', '12312312', ' 123123\r\n', '213123', '213123,\n12312312', '21312', 'Books', 'I'),
(39, 'abv', 'abc', 'abc', 'acb', 'cbas', 'adasd,\nasdas', 'sadasd', 'asdasdas', 'dasda', 'asdasdad \r\n', 'asdasda', 'dadadadas,\nasdas,\ndasdad', 'asdasd', 'Books', 'I'),
(40, 'abv', 'abc', 'abc', 'acb', 'cbas', 'adasd,\nasdas', 'sadasd', 'asdasdas', 'dasda', 'asdasdad \r\n', 'asdasda', 'dadadadas,\nasdas,\ndasdad', 'asdasd', 'Books', 'I');

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
(1, 'Books'),
(2, 'mp3'),
(3, 'mp4'),
(4, 'magazine');

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
  `BookId` varchar(255) DEFAULT NULL,
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
(15, '9780062278982', '2015300391', '2018-11-05 07:09:34', '2018-11-14', NULL, 0, NULL);

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
(18, '2015300391', 'UserImage/17241-200.png', 'User', 'user@gmail.com', 'College (4th Year)', 'Bachelor of Science in Information Technology', '09275261847', 'ee11cbb19052e40b07aac0ca060c23ee', 1, '2018-10-22 07:06:04', '2018-11-05 07:11:57'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `library_books`
--
ALTER TABLE `library_books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
