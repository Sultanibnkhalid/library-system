-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 08:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `liberary_sys_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Account_ID` int(11) NOT NULL,
  `UserName` varchar(40) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `Type_ID` int(11) DEFAULT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `accounttype`
--

CREATE TABLE `accounttype` (
  `Type_ID` int(11) NOT NULL,
  `Type_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounttype`
--

INSERT INTO `accounttype` (`Type_ID`, `Type_Name`) VALUES
(2, 'استاذ'),
(1, 'طالب'),
(3, 'موظف');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Book_ID` int(11) NOT NULL,
  `Book_Title` text NOT NULL,
  `Author` text NOT NULL,
  `Subject` text NOT NULL,
  `Category_ID` int(11) DEFAULT NULL,
  `Photo` varchar(200) DEFAULT NULL,
  `Publisher` varchar(50) NOT NULL,
  `Publishing_Date` date NOT NULL,
  `Pages` varchar(10) NOT NULL,
  `NumberOfCopies` int(11) NOT NULL,
  `Locker_No` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `FileName` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Book_ID`, `Book_Title`, `Author`, `Subject`, `Category_ID`, `Photo`, `Publisher`, `Publishing_Date`, `Pages`, `NumberOfCopies`, `Locker_No`, `status`, `FileName`) VALUES
(42, 'نجاحك في صباحك', 'بينجامين سبول', 'نجاحك في صباحك', 23, 'bbe156dd0441594641406.jpeg', 'غير معروف', '2020-01-01', '427', 5, 'ب-12', 1, ''),
(43, 'فاتتني صلاتي', 'اسلام جمال', 'فاتتني صلاتي', 19, '', 'مؤسسة زحمة كتاب للطباعة والنشر ', '2019-01-01', '231', 4, 'ف-14', 1, 'bbe2ae19dd0مكتبة الكتب - فاتتني صلاة .pdf'),
(44, 'وهج البنفسج', 'اسامة المسلم', 'وهج البنفسج', 17, 'bbe3aa963ff1581935339.jpg', 'دار الجوهرة', '2017-01-04', '304', 12, 'ف-201', 1, ''),
(45, 'علم الفضاء ', 'زهراء مسلم حسن', 'علم الفضاء ', 13, 'bbe451564091685460213.jpg', 'دار الجوهرة', '2021-02-22', '109', 10, '', 1, ''),
(46, 'رؤى مستقبلية-كيف سيفير العلم ح', 'ميتشو كاكو', 'رؤى مستقبلية-كيف سيفير العلم حياتنا', 13, 'bbe5506038ezahef1677696965.png', 'دار الجوهرة', '2018-01-22', '120', 24, 'ف203', 1, ''),
(47, 'المكتبات الجامعية ودورها في عص', 'دزاحمد نافع -أزحسن محمود', 'المكتبات الجامعية ودورها في عصر المعلومات', 13, 'bbe76aa4729Capture.JPG', 'مكتبة المجتمع العربي ', '2012-09-22', '3011', 12, 'ف-301', 1, ''),
(48, 'النشر الالكتروني وحماية المعلو', 'دزاحمد نافع الدادحة', 'النشر الالكتروني وحماية المعلومات', 24, 'bbe9799dbffCapturسe.JPG', 'دار  صفاء للنشر والتوزيع', '2014-03-06', '217', 12, 'ف-401', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `Transaction_ID` int(11) NOT NULL,
  `Account_ID` int(11) DEFAULT NULL,
  `Borrow_Date` date NOT NULL,
  `Due_Date` date NOT NULL,
  `Notice` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `borrowdetails`
--

CREATE TABLE `borrowdetails` (
  `Transaction_ID` int(11) DEFAULT NULL,
  `Book_ID` int(11) DEFAULT NULL,
  `Document_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`) VALUES
(12, 'علوم الحاسوب'),
(13, 'العلوم الحديثة'),
(14, 'علم النفس'),
(15, 'علوم الهندسة'),
(16, 'علوم الفلك'),
(17, 'الادب العربي'),
(18, 'الادب الاجنبي'),
(19, 'العلوم الاسلامية'),
(20, 'العلوم الجغرافية'),
(21, 'العلوم التاريية'),
(22, 'عام '),
(23, 'التنمية البشرية'),
(24, 'امن المعلومات');

-- --------------------------------------------------------

--
-- Table structure for table `colagedepartmentcategory`
--

CREATE TABLE `colagedepartmentcategory` (
  `ID` int(11) NOT NULL,
  `ColDep_ID` int(11) DEFAULT NULL,
  `Category_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colagedepartmentcategory`
--

INSERT INTO `colagedepartmentcategory` (`ID`, `ColDep_ID`, `Category_ID`) VALUES
(10, 12, 12),
(11, 11, 12),
(12, 12, 24),
(13, 11, 24);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `College_ID` int(11) NOT NULL,
  `College_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`College_ID`, `College_Name`) VALUES
(12, 'كلية الحاسبات والمعلوماتية'),
(13, 'كلية العلوم التطبيقية'),
(14, 'كلية الهندسة'),
(15, 'كلية العلوم الطبية'),
(16, 'كلية الطب البشري'),
(17, 'كلية طب الاسنان'),
(18, 'كلية العلوم الادارية');

-- --------------------------------------------------------

--
-- Table structure for table `collegedepartment`
--

CREATE TABLE `collegedepartment` (
  `ColDep_ID` int(11) NOT NULL,
  `College_ID` int(11) DEFAULT NULL,
  `Department_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collegedepartment`
--

INSERT INTO `collegedepartment` (`ColDep_ID`, `College_ID`, `Department_ID`) VALUES
(11, 12, 11),
(12, 12, 12),
(13, 13, 13),
(14, 13, 14),
(15, 14, 15),
(16, 14, 16),
(17, 14, 17),
(18, 15, 18),
(19, 15, 19),
(20, 15, 20),
(21, 15, 21),
(22, 16, 22),
(23, 17, 23),
(24, 18, 24),
(25, 18, 25),
(26, 18, 26);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Department_ID` int(11) NOT NULL,
  `Department_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_ID`, `Department_Name`) VALUES
(11, 'علوم حاسوب'),
(12, 'تكنولوجيا المعلومات'),
(13, 'رياضيات حاسوب'),
(14, 'ميكروبيلوجي'),
(15, 'هندسة مدني'),
(16, 'هندسة معمارية'),
(17, 'ميكاترونكس'),
(18, 'دكتور صيدلي'),
(19, 'مختبرات'),
(20, 'تمريض'),
(21, 'صيدلة عامة'),
(22, 'طب بشري'),
(23, 'طب اسنان'),
(24, 'محاسبة '),
(25, 'ادارة اعمال'),
(26, 'ادارة المصارف والبنوك ');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `Document_ID` int(11) NOT NULL,
  `Document_Title` text NOT NULL,
  `Subject` text DEFAULT NULL,
  `collage_ID` int(11) DEFAULT NULL,
  `Photo` varchar(200) DEFAULT NULL,
  `Pages` varchar(10) DEFAULT NULL,
  `NumberOfCopies` int(11) NOT NULL,
  `Locker_No` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `FileName` text DEFAULT NULL,
  `Author` text DEFAULT NULL,
  `PublishingYear` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `UserName` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `NameOfUser` varchar(40) NOT NULL,
  `Type_ID` int(11) DEFAULT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Photo` text NOT NULL,
  `Created_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`UserName`, `password`, `NameOfUser`, `Type_ID`, `ContactNo`, `Email`, `Photo`, `Created_on`) VALUES
('admin1', '713737377', 'admin1', 3, '713737377', 'mail.d@gmailcom', '651daf087fbf8202e9dbavatar.jpg', '2024-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `returnbook`
--

CREATE TABLE `returnbook` (
  `Return_ID` int(11) NOT NULL,
  `Transaction_ID` int(11) DEFAULT NULL,
  `Return_Date` date NOT NULL,
  `Fine` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_ID` int(11) NOT NULL,
  `University_Number` varchar(20) DEFAULT NULL,
  `Student_Name` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `ColDep_ID` int(11) DEFAULT NULL,
  `PhoneNamber` varchar(10) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Created_on` date NOT NULL,
  `Photo` varchar(200) NOT NULL,
  `Account_ID` int(11) DEFAULT NULL,
  `Email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Teacher_ID` int(11) NOT NULL,
  `Teacher_Name` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Photo` varchar(200) NOT NULL,
  `PhoneNamber` varchar(10) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Created_on` date NOT NULL,
  `Account_ID` int(11) DEFAULT NULL,
  `Email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Account_ID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD KEY `Type_ID` (`Type_ID`);

--
-- Indexes for table `accounttype`
--
ALTER TABLE `accounttype`
  ADD PRIMARY KEY (`Type_ID`),
  ADD UNIQUE KEY `Type_Name` (`Type_Name`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Book_ID`),
  ADD KEY `Category_ID` (`Category_ID`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`Transaction_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Indexes for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD KEY `Transaction_ID` (`Transaction_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `colagedepartmentcategory`
--
ALTER TABLE `colagedepartmentcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Category_ID` (`Category_ID`),
  ADD KEY `ColDep_ID` (`ColDep_ID`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`College_ID`);

--
-- Indexes for table `collegedepartment`
--
ALTER TABLE `collegedepartment`
  ADD PRIMARY KEY (`ColDep_ID`),
  ADD KEY `College_ID` (`College_ID`),
  ADD KEY `Department_ID` (`Department_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Department_ID`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`Document_ID`),
  ADD KEY `Category_ID` (`collage_ID`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD KEY `Type_ID` (`Type_ID`);

--
-- Indexes for table `returnbook`
--
ALTER TABLE `returnbook`
  ADD PRIMARY KEY (`Return_ID`),
  ADD KEY `Transaction_ID` (`Transaction_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_ID`),
  ADD KEY `fc` (`ColDep_ID`),
  ADD KEY `fac` (`Account_ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Teacher_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `Account_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `accounttype`
--
ALTER TABLE `accounttype`
  MODIFY `Type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `Book_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `Transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `colagedepartmentcategory`
--
ALTER TABLE `colagedepartmentcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `College_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `collegedepartment`
--
ALTER TABLE `collegedepartment`
  MODIFY `ColDep_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Department_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `Document_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `returnbook`
--
ALTER TABLE `returnbook`
  MODIFY `Return_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Student_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Teacher_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`Type_ID`) REFERENCES `accounttype` (`Type_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`Category_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `account` (`Account_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD CONSTRAINT `borrowdetails_ibfk_1` FOREIGN KEY (`Transaction_ID`) REFERENCES `borrow` (`Transaction_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `colagedepartmentcategory`
--
ALTER TABLE `colagedepartmentcategory`
  ADD CONSTRAINT `colagedepartmentcategory_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`Category_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `colagedepartmentcategory_ibfk_2` FOREIGN KEY (`ColDep_ID`) REFERENCES `collegedepartment` (`ColDep_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `collegedepartment`
--
ALTER TABLE `collegedepartment`
  ADD CONSTRAINT `collegedepartment_ibfk_1` FOREIGN KEY (`College_ID`) REFERENCES `college` (`College_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `collegedepartment_ibfk_2` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `col_doc` FOREIGN KEY (`collage_ID`) REFERENCES `college` (`College_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `librarian`
--
ALTER TABLE `librarian`
  ADD CONSTRAINT `librarian_ibfk_1` FOREIGN KEY (`Type_ID`) REFERENCES `accounttype` (`Type_ID`);

--
-- Constraints for table `returnbook`
--
ALTER TABLE `returnbook`
  ADD CONSTRAINT `returnbook_ibfk_1` FOREIGN KEY (`Transaction_ID`) REFERENCES `borrow` (`Transaction_ID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fac` FOREIGN KEY (`Account_ID`) REFERENCES `account` (`Account_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fc` FOREIGN KEY (`ColDep_ID`) REFERENCES `collegedepartment` (`ColDep_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `account` (`Account_ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
