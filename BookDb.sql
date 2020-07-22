-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2020 年 07 月 21 日 11:17
-- 伺服器版本: 10.1.19-MariaDB
-- PHP 版本： 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `BookDb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `BookList`
--

CREATE TABLE `BookList` (
  `id` int(3) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `Comp` varchar(20) NOT NULL,
  `Book` varchar(50) NOT NULL,
  `Author` varchar(20) NOT NULL,
  `Price` int(20) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `BookList`
--

INSERT INTO `BookList` (`id`, `ISBN`, `Comp`, `Book`, `Author`, `Price`, `Date`) VALUES
(16, '684-887-621-1', '測試', '我是測試', '施強頻', 605, '2005-10-21'),
(19, '957-442-217-8', '標期', '測試', '施強頻', 404, '2001-07-04'),
(21, '957-442-217-8', '測試測試', '防火強頻寬管理連線管制3', '王大', 595, '2002-11-27'),
(22, '684-887-621-1', '先鋒2', '防火強頻寬管理''連線''管制1', '''王大砲''1', 598, '2004-07-08'),
(25, '684-887-621-1', '測試', '我是測試', '作者"作"者', 599, '2005-11-17'),
(27, '517-985-631-9', 'abc"出版社出"', '我是''一本書''', '作者', 998, '1994-09-15'),
(30, '957-442-217-8', '測試測試', '我是測試', '作者作"者', 560, '1998-07-08'),
(32, '684-887-621-1', '測試測試', '防火強頻寬管理連線管制3', '王大砲11', 596, '1999-07-02'),
(35, '684-887-621-1', '測試測試', '防火強頻寬管理連線管制2', '王大砲''', 400, '1993-04-28'),
(38, '123-456-789-0', '測試測試', '我是測試', '作者作者', 400, '2003-07-02'),
(39, '987-654-321-0', '先鋒2"', '防火強頻寬管理連線管制3', '施強頻', 590, '2006-10-01');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `BookList`
--
ALTER TABLE `BookList`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `BookList`
--
ALTER TABLE `BookList`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
