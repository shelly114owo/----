-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-05 18:08:27
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
-- 資料表結構 `classroom_table`
--

CREATE TABLE `classroom_table` (
  `building` varchar(2) DEFAULT NULL,
  `room_number` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `classroom_table`
--

INSERT INTO `classroom_table` (`building`, `room_number`) VALUES
('資電', 502),
('資電', 402),
('資電', 504),
('資電', 404),
('忠', 208),
('資電', 234),
('資電', 234),
('忠', 307),
('資電', 504),
('忠', 302),
('科航', 204),
('資電', 234),
('資電', 306),
('資電', 234),
('資電', 306),
('資電', 404),
('資電', 104),
('資電', 125),
('資電', 102),
('忠', 309),
('圖', 213),
('資電', 404),
('資電', 234),
('人', 607),
('語', 105),
('資電', 102),
('資電', 234),
('人', 507),
('人', 504),
('人', 504),
('圖', 213),
('人', 407),
('人', 407);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
