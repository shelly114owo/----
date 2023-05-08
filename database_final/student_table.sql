-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-05 18:12:35
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `testdb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `student_table`
--

CREATE TABLE `student_table` (
  `stud_id` varchar(8) primary key,
  `stud_name` varchar(3),
  `dept_name` varchar(4),
  `tot_cred` int(2)
);
/*
CREATE TABLE department(
`dept_name` varchar(4) NOT NULL PRIMARY KEY,
`building` varchar(2)
) ;
*/
--
-- 傾印資料表的資料 `student_table`
--

INSERT INTO `student_table` (`stud_id`, `stud_name`, `dept_name`, `tot_cred`) VALUES
('D0941280', '吳宜庭', '資訊二丁', 24),
('D1059809', '徐筱婷', '資訊二丁', 25),
('D1060225', '林育萱', '資訊二丁', 25),
('D1176188', '黃品慈', '資訊二丁', 24);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*
CREATE TABLE `student_table` (
  `stud_id` varchar(8) primary key auto_increment,
  `stud_name` varchar(3),
  `dept_name` varchar(4) NOT NULL FOREIGN KEY REFERENCES department(dept_name),
  `tot_cred` int(2)
);

CREATE TABLE department(
`dept_name` varchar(4) NOT NULL PRIMARY KEY,
`building` varchar(2)
) ;*/