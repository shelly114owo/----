-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-08 07:23:56
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `t`
--

-- --------------------------------------------------------

--
-- 資料表結構 `time_slot_table_1`
--

CREATE TABLE `time_slot_table` (
  `time_slot_id` varchar(17) DEFAULT NULL,
  `day` varchar(3) DEFAULT NULL,
  `start_time` varchar(10) DEFAULT NULL,
  `end_time` varchar(8) DEFAULT NULL,
  `time` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `time_slot_table`
--

INSERT INTO `time_slot_table` (`time_slot_id`, `day`, `start_time`, `end_time`, `time`) VALUES
('(一)01-03', '(一)', '1', '3', '010815'),
('(一)03-04 (四)04', '(一)', '3', '4', '152225'),
('', '(四)', '4', '4', ''),
('(一)06 (二)03-04', '(一)', '6', '6', '361623'),
('', '(二)', '3', '4', ''),
('(一)07 (四)07-08', '(一)', '7', '7', '434653'),
('', '(四)', '7', '8', ''),
('(一)08-10', '', '8', '10', '505764'),
('(一)09-10 (四)03', '(一)', '9', '10', '576418'),
('', '(四)', '3', '3', ''),
('(二)06', '(二)', '6', '6', '37'),
('(二)06-07 (四)02', '(二)', '6', '7', '374411'),
('', '(四)', '2', '2', ''),
('(二)07', '(二)', '7', '7', '44'),
('(二)08-09', '(二)', '8', '9', '5158'),
('(二)10-11', '(二)', '10', '11', '6572'),
('(二)11-12', '(二)', '11', '12', '7279'),
('(二)11-13', '(二)', '11', '13', '727986'),
('(三)03-04', '(三)', '3', '4', '1724'),
('(三)06-07', '(三)', '6', '7', '3845'),
('(三)08-09 (四)01', '(三)', '8', '9', '525904'),
('', '(四)', '1', '1', ''),
('(三)09-10', '(三)', '9', '10', '5966'),
('(三)11-13', '(三)', '11', '13', '738087'),
('(五)02-04', '(五)', '2', '4', '121926'),
('(六)03-04', '(六)', '3', '4', '2027'),
('(四)02', '(四)', '2', '2', '11'),
('(四)03-04 (五)01-04', '(四)', '3', '4', '182505121926'),
('', '(五)', '1', '4', ''),
('(四)06', '(四)', '6', '6', '39'),
('(四)09-10', '(四)', '9', '10', '6067');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
