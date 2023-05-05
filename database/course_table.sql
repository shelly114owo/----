-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-05 16:54:52
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
-- 資料表結構 `course_table`
--

CREATE TABLE `course_table` (
  `course_id` varchar(9) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `dept_name` varchar(9) DEFAULT NULL,
  `credits` int(1) DEFAULT NULL,
  `category` varchar(8) DEFAULT NULL,
  `now_people` int(3) DEFAULT NULL,
  `max_people` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `course_table`
--

INSERT INTO `course_table` (`course_id`, `title`, `dept_name`, `credits`, `category`, `now_people`, `max_people`) VALUES
('0750', '大數據分析入門', '創能學院', 2, '選修', 49, 60),
('1211', '程式設計(III)', '資訊系', 2, '必修', 80, 80),
('1212', '程式設計(IV)', '資訊系', 2, '必修', 84, 84),
('1237', '邏輯設計', '資訊系', 3, '必修', 88, 88),
('1259', '班級活動', '資訊系', 0, '必修', 60, 60),
('1260', '系統程式', '資訊系', 3, '必修', 69, 70),
('1261', '資料庫系統', '資訊系', 3, '必修', 71, 71),
('1262', '機率與統計', '資訊系', 3, '必修', 55, 70),
('1269', 'UNIX應用與實務', '資訊系', 2, '選修', 73, 73),
('1290', '安全程式設計', '資訊系', 3, '選修', 57, 60),
('1296', '程式設計與問題解決', '資訊系', 2, '選修', 63, 72),
('1992', '邏輯設計實習', '資電不分系', 1, '必修', 65, 65),
('2522', '微積分(二)實習', '國際生不分系', 0, '必修', 19, 40),
('2523', '微積分(二)', '國際生不分系', 3, '必修', 18, 40),
('2701', '日文(二)', '應用外語選修', 2, '選修', 64, 68),
('2774', '詩詞欣賞', '通識中心', 2, '選修', 63, 72),
('2861', '經濟與生活', '通識中心', 2, '選修', 71, 79),
('2920', '藝術與科技', '通識中心', 2, '選修', 69, 70),
('3219', '專業溝通英文(二)', '大二英文綜合班', 1, '必修', 43, 60),
('3221', '專業溝通英文(二)', '大二英文綜合班', 1, '必修', 47, 60),
('3228', '專業溝通英文(二)', '大二英文綜合班', 1, '必修', 44, 60),
('3383', '公民參與', '核心必修綜合班', 1, '必修', 60, 60),
('3418', '社會實踐', '核心必修綜合班', 1, '必修', 57, 60),
('3537', '當教育大數據遇見AI', '創能學院', 2, '選修', 67, 70),
('3543', 'Web程式設計', '資訊系', 3, '選修', 60, 60),
('3545', '系統分析與設計', '資訊系', 3, '選修', 36, 72),
('3546', 'UNIX應用與實務', '資訊系', 2, '選修', 68, 72),
('3547', 'UNIX應用與實務', '資訊系', 2, '選修', 69, 72),
('3552', '電子商務安全', '資訊系', 3, '選修', 71, 72);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
