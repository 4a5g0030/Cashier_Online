-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 12 月 24 日 01:09
-- 伺服器版本: 10.1.35-MariaDB
-- PHP 版本： 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `cashier_online`
--

-- --------------------------------------------------------

--
-- 資料表結構 `list`
--

CREATE TABLE `list` (
  `number` int(11) NOT NULL,
  `book_name` varchar(10) NOT NULL,
  `owner` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `list`
--

INSERT INTO `list` (`number`, `book_name`, `owner`) VALUES
(1, 'new_year', '4a5g0030');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `name` varchar(10) DEFAULT NULL,
  `account` varchar(10) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`name`, `account`, `password`, `email`, `phone`) VALUES
('李晊葟', '4a5g0030', 'aa861022', '4a5g0030@stust.edu.tw', '0968657822'),
('何俊毅', '4a5g0036', 'aa861022', '4a5g0036@stust.edu.tw', '123456789');

-- --------------------------------------------------------

--
-- 資料表結構 `new_year`
--

CREATE TABLE `new_year` (
  `number` int(6) NOT NULL,
  `why` varchar(30) NOT NULL,
  `money` int(6) NOT NULL,
  `people` varchar(10) NOT NULL,
  `ck` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `new_year`
--

INSERT INTO `new_year` (`number`, `why`, `money`, `people`, `ck`) VALUES
(1, '本金', 20000, '4a5g0030', 1),
(2, '贊助', 15000, '4a5g0030', 1),
(3, '宣傳', -3000, '4a5g0036', 1),
(4, '美術', -4000, '4a5g0036', 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`number`),
  ADD UNIQUE KEY `number` (`number`),
  ADD UNIQUE KEY `book_name` (`book_name`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`account`),
  ADD UNIQUE KEY `account` (`account`);

--
-- 資料表索引 `new_year`
--
ALTER TABLE `new_year`
  ADD PRIMARY KEY (`number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
