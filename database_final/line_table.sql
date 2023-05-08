-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-05 18:12:53
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
-- 資料表結構 `line_table`
--

CREATE TABLE `line_table` (
  `line_id` varchar(4) DEFAULT NULL,
  `ordernum` int(3) DEFAULT NULL,
  `stud_id` varchar(8) DEFAULT NULL,
  `course_id` varchar(9) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


--
-- 傾印資料表的資料 `line_table`
--
/*
INSERT INTO `line_table` (`line_id`,  `ordernum`, `stud_id`,`course_id`, `title`) VALUES
('1', 2, 'D0941280','1992','邏輯設計實習'),
('2', 1, 'D1059809', '1992', '邏輯設計實習'),
('3', 3, 'D1060225', '1992', '邏輯設計實習'),
('4', 1, 'D1060225','3546', 'UNIX應用與實務'),
('5', 4, 'D1176188', '1992','邏輯設計實習');
COMMIT;
*/

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
