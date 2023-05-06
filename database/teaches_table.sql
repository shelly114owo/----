-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-06 07:47:58
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
-- 資料表結構 `teaches_table`
--

CREATE TABLE `teaches_table` (
  `inst_id` varchar(7) DEFAULT NULL,
  `course_id` varchar(9) DEFAULT NULL,
  `sec_id` varchar(6) DEFAULT NULL,
  `semester` varchar(8) DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `teaches_table`
--

INSERT INTO `teaches_table` (`inst_id`, `course_id`, `sec_id`, `semester`, `year`) VALUES
('1', '0750', '0750', '2', '2023'),
('2', '1211', '1211', '2', '2023'),
('2', '1212', '1212', '2', '2023'),
('3', '1237', '1237', '2', '2023'),
('4', '1259', '1259', '2', '2023'),
('5', '1260', '1260', '2', '2023'),
('6', '1261', '1261', '2', '2023'),
('7', '1262', '1262', '2', '2023'),
('8', '1269', '1269', '2', '2023'),
('2', '1290', '1290', '2', '2023'),
('9', '1296', '1296', '2', '2023'),
('11', '1992', '1992', '2', '2023'),
('12', '2522', '2522', '2', '2023'),
('12', '2523', '2523', '2', '2023'),
('13', '2701', '2701', '2', '2023'),
('14', '2774', '2774', '2', '2023'),
('15', '2861', '2861', '2', '2023'),
('16', '2920', '2920', '2', '2023'),
('17', '3219', '3219', '2', '2023'),
('18', '3221', '3221', '2', '2023'),
('19', '3228', '3228', '2', '2023'),
('20', '3383', '3383', '2', '2023'),
('20', '3418', '3418', '2', '2023'),
('21', '3537', '3537', '2', '2023'),
('22', '3543', '3543', '2', '2023'),
('23', '3545', '3545', '2', '2023'),
('8', '3546', '3546', '2', '2023'),
('21', '3547', '3547', '2', '2023'),
('24', '3552', '3552', '2', '2023');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
