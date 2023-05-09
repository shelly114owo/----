-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-09 02:44:16
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
-- 資料庫： `testdb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `course_table`
--

CREATE TABLE `course_table` (
  `course_id` varchar(9) NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `grade` int(1) DEFAULT NULL,
  `dept_name` varchar(9) DEFAULT NULL,
  `credits` int(1) DEFAULT NULL,
  `category` varchar(8) DEFAULT NULL,
  `now_people` int(3) DEFAULT NULL,
  `max_people` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `course_table`
--

INSERT INTO `course_table` (`course_id`, `title`, `grade`, `dept_name`, `credits`, `category`, `now_people`, `max_people`) VALUES
('0750', '大數據分析入門', 2, '創能學院', 2, '選修', 49, 60),
('1211', '程式設計(III)', 2, '資訊系', 2, '必修', 80, 80),
('1212', '程式設計(IV)', 2, '資訊系', 2, '必修', 84, 84),
('1237', '邏輯設計', 2, '資訊系', 3, '必修', 88, 88),
('1259', '班級活動', 2, '資訊系', 0, '必修', 60, 60),
('1260', '系統程式', 2, '資訊系', 3, '必修', 69, 70),
('1261', '資料庫系統', 2, '資訊系', 3, '必修', 71, 71),
('1262', '機率與統計', 2, '資訊系', 3, '必修', 55, 70),
('1269', 'UNIX應用與實務', 2, '資訊系', 2, '選修', 73, 73),
('1290', '安全程式設計', 2, '資訊系', 3, '選修', 57, 60),
('1296', '程式設計與問題解決', 2, '資訊系', 2, '選修', 63, 72),
('1992', '邏輯設計實習', 2, '資電不分系', 1, '必修', 65, 65),
('2522', '微積分(二)實習', 2, '國際生不分系', 0, '必修', 19, 40),
('2523', '微積分(二)', 2, '國際生不分系', 3, '必修', 18, 40),
('2701', '日文(二)', 2, '應用外語選修', 2, '選修', 64, 68),
('2774', '詩詞欣賞', 2, '通識中心', 2, '選修', 63, 72),
('2861', '經濟與生活', 2, '通識中心', 2, '選修', 71, 79),
('2920', '藝術與科技', 2, '通識中心', 2, '選修', 69, 70),
('3219', '專業溝通英文(二)', 2, '大二英文綜合班', 1, '必修', 43, 60),
('3221', '專業溝通英文(二)', 2, '大二英文綜合班', 1, '必修', 47, 60),
('3228', '專業溝通英文(二)', 2, '大二英文綜合班', 1, '必修', 44, 60),
('3383', '公民參與', 2, '核心必修綜合班', 1, '必修', 60, 60),
('3418', '社會實踐', 2, '核心必修綜合班', 1, '必修', 57, 60),
('3537', '當教育大數據遇見AI', 2, '創能學院', 2, '選修', 67, 70),
('3543', 'Web程式設計', 2, '資訊系', 3, '選修', 60, 60),
('3545', '系統分析與設計', 2, '資訊系', 3, '選修', 36, 72),
('3546', 'UNIX應用與實務', 2, '資訊系', 2, '選修', 68, 72),
('3547', 'UNIX應用與實務', 2, '資訊系', 2, '選修', 69, 72),
('3552', '電子商務安全', 2, '資訊系', 3, '選修', 71, 72);

-- --------------------------------------------------------

--
-- 資料表結構 `focus_table`
--

CREATE TABLE `focus_table` (
  `foc_id` varchar(4) NOT NULL,
  `stud_id` varchar(8) NOT NULL,
  `course_id` varchar(9) NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `dept_name` varchar(9) DEFAULT NULL,
  `now_people` int(3) DEFAULT NULL,
  `max_people` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- 資料表結構 `section_table`
--

CREATE TABLE `section_table` (
  `course_id` varchar(4) NOT NULL,
  `sec_id` varchar(4) NOT NULL,
  `semester` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `building` varchar(2) DEFAULT NULL,
  `room_number` int(3) DEFAULT NULL,
  `time_slot_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `section_table`
--

INSERT INTO `section_table` (`course_id`, `sec_id`, `semester`, `year`, `building`, `room_number`, `time_slot_id`) VALUES
('0750', '0750', 2, 2023, '圖', 213, '13'),
('1211', '1211', 2, 2023, '資電', 234, '20'),
('1211', '1211', 2, 2023, '科航', 204, '26'),
('1212', '1212', 2, 2023, '資電', 234, '20'),
('1212', '1212', 2, 2023, '科航', 204, '26'),
('1237', '1237', 2, 2023, '忠', 307, '17'),
('1237', '1237', 2, 2023, '資電', 504, '23'),
('1259', '1259', 2, 2023, '資電', 306, '28'),
('1260', '1260', 2, 2023, '資電', 306, '02'),
('1260', '1260', 2, 2023, '資電', 103, '27'),
('1261', '1261', 2, 2023, '資電', 402, '03'),
('1261', '1261', 2, 2023, '資電', 504, '07'),
('1262', '1262', 2, 2023, '資電', 404, '04'),
('1262', '1262', 2, 2023, '資電', 404, '30'),
('1269', '1269', 2, 2023, '資電', 234, '18'),
('1290', '1290', 2, 2023, '資電', 234, '14'),
('1296', '1296', 2, 2023, '資電', 234, '22'),
('1992', '1992', 2, 2023, '資電', 502, '01'),
('2522', '2522', 2, 2023, '忠', 302, '24'),
('2523', '2523', 2, 2023, '忠', 208, '05'),
('2701', '2701', 2, 2023, '資電', 102, '12'),
('2774', '2774', 2, 2023, '人', 407, '16'),
('2861', '2861', 2, 2023, '語', 105, '11'),
('2920', '2920', 2, 2023, '忠', 309, '15'),
('3219', '3219', 2, 2023, '人', 407, '21'),
('3221', '3221', 2, 2023, '人', 507, '21'),
('3228', '3228', 2, 2023, '人', 607, '21'),
('3383', '3383', 2, 2023, '人', 504, '08'),
('3418', '3418', 2, 2023, '人', 504, '10'),
('3537', '3537', 2, 2023, '圖', 213, '18'),
('3543', '3543', 2, 2023, '資電', 125, '09'),
('3543', '3543', 2, 2023, '資電', 102, '24'),
('3545', '3545', 2, 2023, '資電', 404, '06'),
('3545', '3545', 2, 2023, '資電', 104, '25'),
('3546', '3546', 2, 2023, '資電', 234, '15'),
('3547', '3547', 2, 2023, '資電', 234, '29'),
('3552', '3552', 2, 2023, '資電', 404, '19');

-- --------------------------------------------------------

--
-- 資料表結構 `student_table`
--

CREATE TABLE `student_table` (
  `stud_id` varchar(8) NOT NULL,
  `stud_name` varchar(3) DEFAULT NULL,
  `dept_name` varchar(4) DEFAULT NULL,
  `tot_cred` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `student_table`
--

INSERT INTO `student_table` (`stud_id`, `stud_name`, `dept_name`, `tot_cred`) VALUES
('D0941280', '吳宜庭', '資訊二丁', 24),
('D1059809', '徐筱婷', '資訊二丁', 25),
('D1060225', '林育萱', '資訊二丁', 25),
('D1176188', '黃品慈', '資訊二丁', 15);

-- --------------------------------------------------------

--
-- 資料表結構 `takes_table`
--

CREATE TABLE `takes_table` (
  `stud_id` varchar(8) NOT NULL,
  `course_id` varchar(4) NOT NULL,
  `sec_id` varchar(4) NOT NULL,
  `semester` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `grade` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `takes_table`
--

INSERT INTO `takes_table` (`stud_id`, `course_id`, `sec_id`, `semester`, `year`, `grade`) VALUES
('D0941280', '1211', '1211', 2, 2023, 2),
('D0941280', '1212', '1212', 2, 2023, 2),
('D0941280', '1237', '1237', 2, 2023, 2),
('D0941280', '1259', '1259', 2, 2023, 2),
('D0941280', '1261', '1261', 2, 2023, 2),
('D0941280', '1262', '1262', 2, 2023, 2),
('D0941280', '1290', '1290', 2, 2023, 2),
('D0941280', '1296', '1296', 2, 2023, 2),
('D0941280', '1992', '1992', 2, 2023, 2),
('D0941280', '2522', '2522', 2, 2023, 2),
('D0941280', '2523', '2523', 2, 2023, 2),
('D0941280', '3546', '3546', 2, 2023, 2),
('D1059809', '1259', '1259', 2, 2023, 2),
('D1059809', '1260', '1260', 2, 2023, 2),
('D1059809', '1261', '1261', 2, 2023, 2),
('D1059809', '1262', '1262', 2, 2023, 2),
('D1059809', '2920', '2920', 2, 2023, 2),
('D1059809', '3228', '3228', 2, 2023, 2),
('D1059809', '3537', '3537', 2, 2023, 2),
('D1059809', '3543', '3543', 2, 2023, 2),
('D1059809', '3545', '3545', 2, 2023, 2),
('D1059809', '3547', '3547', 2, 2023, 2),
('D1059809', '3552', '3552', 2, 2023, 2),
('D1060225', '1259', '1259', 2, 2023, 2),
('D1060225', '1260', '1260', 2, 2023, 2),
('D1060225', '1261', '1261', 2, 2023, 2),
('D1060225', '1262', '1262', 2, 2023, 2),
('D1060225', '1269', '1269', 2, 2023, 2),
('D1060225', '2701', '2701', 2, 2023, 2),
('D1060225', '2861', '2861', 2, 2023, 2),
('D1060225', '3221', '3221', 2, 2023, 2),
('D1060225', '3543', '3543', 2, 2023, 2),
('D1060225', '3545', '3545', 2, 2023, 2),
('D1060225', '3552', '3552', 2, 2023, 2),
('D1176188', '0750', '0750', 2, 2023, 2),
('D1176188', '1259', '1259', 2, 2023, 2),
('D1176188', '2522', '2522', 2, 2023, 2),
('D1176188', '2523', '2523', 2, 2023, 2),
('D1176188', '2774', '2774', 2, 2023, 2),
('D1176188', '3219', '3219', 2, 2023, 2),
('D1176188', '3383', '3383', 2, 2023, 2),
('D1176188', '3418', '3418', 2, 2023, 2),
('D1176188', '3547', '3547', 2, 2023, 2),
('D1176188', '3552', '3552', 2, 2023, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `time_slot_table`
--

CREATE TABLE `time_slot_table` (
  `time_slot_id` varchar(3) NOT NULL,
  `day` varchar(3) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `time_slot_table`
--

INSERT INTO `time_slot_table` (`time_slot_id`, `day`, `start_time`, `end_time`) VALUES
('01', '(一)', '01', '03'),
('02', '(一)', '03', '04'),
('03', '(一)', '06', '06'),
('04', '(一)', '07', '07'),
('05', '(一)', '08', '10'),
('06', '(一)', '09', '10'),
('07', '(二)', '03', '04'),
('08', '(二)', '06', '06'),
('09', '(二)', '06', '07'),
('10', '(二)', '07', '07'),
('11', '(二)', '08', '09'),
('12', '(二)', '10', '11'),
('13', '(二)', '11', '12'),
('14', '(二)', '11', '13'),
('15', '(三)', '03', '04'),
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

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `course_table`
--
ALTER TABLE `course_table`
  ADD PRIMARY KEY (`course_id`);

--
-- 資料表索引 `focus_table`
--
ALTER TABLE `focus_table`
  ADD PRIMARY KEY (`foc_id`,`stud_id`,`course_id`);

--
-- 資料表索引 `section_table`
--
ALTER TABLE `section_table`
  ADD PRIMARY KEY (`course_id`,`sec_id`,`semester`,`year`,`time_slot_id`);

--
-- 資料表索引 `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`stud_id`);

--
-- 資料表索引 `takes_table`
--
ALTER TABLE `takes_table`
  ADD PRIMARY KEY (`stud_id`,`course_id`,`sec_id`,`semester`,`year`);

--
-- 資料表索引 `time_slot_table`
--
ALTER TABLE `time_slot_table`
  ADD PRIMARY KEY (`time_slot_id`,`day`,`start_time`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
