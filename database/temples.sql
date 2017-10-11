-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 11, 2017 at 10:37 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temples`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `role`) VALUES
(3, 'admin', '1234', 'admin1@hotmail.com', 'admin'),
(6, 'monk', '1234', 'sjnfuwefnuw@hotmail.com', 'monk');

-- --------------------------------------------------------

--
-- Table structure for table `temple`
--

CREATE TABLE `temple` (
  `temple_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `address` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temple`
--

INSERT INTO `temple` (`temple_id`, `name`, `tel`, `address`, `description`, `image`) VALUES
(44, 'วัดสวนดอก', '053-888-999', 'เชียงใหม่', 'โอเลี้ยงโบตั๋นบิล รีไทร์ยิมแทงโก้ โหลนสึนามิพริตตี้ รีพอร์ทพุทธภูมิเพนกวินสแตนเลส วาฟเฟิลศึกษาศาสตร์โรแมนติกแจ๊กเก็ต หน่อมแน้มเทรลเลอร์ดยุคซิ่ง สังโฆกษัตริยาธิราช มาร์กคอลัมน์วิทย์คอนแท็คไนน์ ซูเอี๋ยอิออนโปรเจ็ค โซนี่เก๊ะลาเต้ศิลปากรแทงกั๊ก ฟิวเจอร์ไชน่าสโตร์นางแบบ รอยัลตี้อุตสาหการสตรอเบอรี โปรโมชั', 'Temple1.jpg'),
(45, 'วัดเบญจมบพิตร', '02-444-9090', 'กรุงเทพมหานคร', 'กัมมันตะแทงโก้รีสอร์ตโหลยโท่ยเดบิต สติ๊กเกอร์เอ็นจีโอตุ๋ยเมาท์ เซลส์แมนแบนเนอร์ โรแมนติกโมจิโมเดิร์นเทรนด์ น็อคอึมครึมเทรลเลอร์ไหร่ โจ๋เดชานุภาพ ดิกชันนารี พฤหัสตัวตนอัตลักษณ์ สโรชาวาฟเฟิลแอ็คชั่นซื่อบื้อ แพลนบาบูน สปอร์ต โต๋เต๋สเตเดียมไฟลท์ ว่ะฮิตโบตั๋นลิมิตแครกเกอร์ คันยิ สคริปต์มลภาวะคอลเล็กชั่น ', 'wat.jpg'),
(46, 'วัดร่องขุ่น', '088-879-1342', 'เชียงราย', '  ปิโตรเคมี แผดเผาแบล็ค โรแมนติคกรอบรูป วินเพนตากอน ละตินโดนัทสหัชญาณ ราชานุญาตแอดมิสชันแคมเปญ กาญจน์ อัลไซเมอร์ สปอร์ตทับซ้อนแมมโบ้ ดิกชันนารี โฮปสไปเดอร์ครูเสดมอยส์เจอไรเซอร์ยังไง เฝอเอ็นจีโอ เปปเปอร์มินต์ ทัวร์ป่าไม้วโรกาสซันตาคลอส เทียมทาน ม้านั่งเก๊ะ', '9-007.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `temple_monk`
--

CREATE TABLE `temple_monk` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `temple_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temple_monk`
--

INSERT INTO `temple_monk` (`id`, `user_id`, `temple_id`) VALUES
(48, 3, 44),
(49, 3, 45),
(50, 6, 46);

-- --------------------------------------------------------

--
-- Table structure for table `temple_need`
--

CREATE TABLE `temple_need` (
  `id` int(11) NOT NULL,
  `temple_id` int(11) NOT NULL,
  `item_need` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temple_need`
--

INSERT INTO `temple_need` (`id`, `temple_id`, `item_need`) VALUES
(45, 44, 'น้ำ นม'),
(46, 45, 'ผ้าจีวร'),
(47, 46, 'หลอดไฟ');

-- --------------------------------------------------------

--
-- Table structure for table `temple_no_need`
--

CREATE TABLE `temple_no_need` (
  `id` int(11) NOT NULL,
  `temple_id` int(11) NOT NULL,
  `item_no_need` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temple_no_need`
--

INSERT INTO `temple_no_need` (`id`, `temple_id`, `item_no_need`) VALUES
(45, 44, 'เทียนพรรษา'),
(46, 45, 'กาแฟ'),
(47, 46, 'อาหารแห้ง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temple`
--
ALTER TABLE `temple`
  ADD PRIMARY KEY (`temple_id`);

--
-- Indexes for table `temple_monk`
--
ALTER TABLE `temple_monk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temple_need`
--
ALTER TABLE `temple_need`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temple_no_need`
--
ALTER TABLE `temple_no_need`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `temple`
--
ALTER TABLE `temple`
  MODIFY `temple_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `temple_monk`
--
ALTER TABLE `temple_monk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `temple_need`
--
ALTER TABLE `temple_need`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `temple_no_need`
--
ALTER TABLE `temple_no_need`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
