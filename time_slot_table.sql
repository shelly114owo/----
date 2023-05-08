-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-08 14:18:12
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
-- 資料庫： `new`
--

-- --------------------------------------------------------

--
-- 資料表結構 `time_slot_table`
--

CREATE TABLE `time_slot_table` (
  `time_slot_id` varchar(3) DEFAULT NULL,
  `day` varchar(3) DEFAULT NULL,
  `start_time` varchar(10) DEFAULT NULL,
  `end_time` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `time_slot_table`
--

INSERT INTO `time_slot_table` (`time_slot_id`, `day`, `start_time`, `end_time`) VALUES
('1', '(一)', '01', '03'),
('2', '(一)', '03', '04'),
('3', '(一)', '06', '06'),
('4', '(一)', '07', '07'),
('5', '(一)', '08', '10'),
('6', '(一)', '09', '10'),
('7', '(二)', '03', '04'),
('8', '(二)', '06', '06'),
('9', '(二)', '06', '07'),
('10', '(二)', '07', '07'),
('11', '(二)', '08', '09'),
('12', '(二)', '10', '11'),
('13', '(二)', '11', '12'),
('14', '(二)', '11', '13'),
('15', '(三)', '3', '04'),
('16', '(三)', '06', '07'),
('17', '(三)', '08', '09'),
('18', '(三)', '09', '10'),
('19', '(三)', '11', '13'),
('20', '(五)', '01', '04'),
('21', '(五)', '02', '04'),
('22', '(六)', '03', '04'),
('23', '(四)', '01', '01'),
('24', '(四)', '02', '02'),
('25', '(四)', '03', '03'),
('26', '(四)', '03', '04'),
('27', '(四)', '04', '04'),
('28', '(四)', '06', '06'),
('29', '(四)', '09', '10'),
('30', '(四)', '07', '08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
