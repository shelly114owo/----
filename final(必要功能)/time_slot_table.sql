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
('1', '(一)', '1', '3'),
('2', '(一)', '3', '4'),
('3', '(一)', '6', '6'),
('4', '(一)', '7', '7'),
('5', '(一)', '8', '10'),
('6', '(一)', '9', '10'),
('7', '(二)', '3', '4'),
('8', '(二)', '6', '6'),
('9', '(二)', '6', '7'),
('10', '(二)', '7', '7'),
('11', '(二)', '8', '9'),
('12', '(二)', '10', '11'),
('13', '(二)', '11', '12'),
('14', '(二)', '11', '13'),
('15', '(三)', '3', '4'),
('16', '(三)', '6', '7'),
('17', '(三)', '8', '9'),
('18', '(三)', '9', '10'),
('19', '(三)', '11', '13'),
('20', '(五)', '1', '4'),
('21', '(五)', '2', '4'),
('22', '(六)', '3', '4'),
('23', '(四)', '1', '1'),
('24', '(四)', '2', '2'),
('25', '(四)', '3', '3'),
('26', '(四)', '3', '4'),
('27', '(四)', '4', '4'),
('28', '(四)', '6', '6'),
('29', '(四)', '9', '10'),
('30', '(四)', '7', '8');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
