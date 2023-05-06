-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-06 07:48:13
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
-- 資料表結構 `instructor_table`
--

CREATE TABLE `instructor_table` (
  `inst_id` varchar(7) DEFAULT NULL,
  `inst_name` varchar(9) DEFAULT NULL,
  `dept_name` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `instructor_table`
--

INSERT INTO `instructor_table` (`inst_id`, `inst_name`, `dept_name`) VALUES
('1', '莊家雋', '創能學院'),
('2', '蔡國裕', '資訊系'),
('3', '李俊宏', '資訊系'),
('4', '林哲維', '資訊系'),
('5', '劉宗杰', '資訊系'),
('6', '許懷中', '資訊系'),
('7', '劉怡芬', '資訊系'),
('8', '竇其仁', '資訊系'),
('9', '周智禾', '資訊系'),
('10', '王益文', '資訊系'),
('11', '楊豐瑞', '通訊系'),
('12', '唐永立', '國際生不分系'),
('13', '林盈萱', '應用外語選修'),
('14', '彭妙卿', '通識中心'),
('15', '劉宗欣', '通識中心'),
('16', '張瓊月', '通識中心'),
('17', '洪增宏', '大二英文綜合班'),
('18', '李心馨', '大二英文綜合班'),
('19', '陳秋華', '大二英文綜合班'),
('20', '蕭育和', '核心必修綜合班'),
('21', '劉明機', '資訊系'),
('22', '薛念林', '資訊系'),
('23', '洪振偉', '資訊系'),
('24', '周澤捷', '資訊系'),
('', '', ''),
('', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
