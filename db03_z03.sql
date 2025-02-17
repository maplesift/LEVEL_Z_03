-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-02-17 01:38:39
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db03_z03`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `level` int(1) UNSIGNED NOT NULL,
  `length` int(3) UNSIGNED NOT NULL,
  `ondate` date NOT NULL,
  `publish` text NOT NULL,
  `director` text NOT NULL,
  `trailer` text NOT NULL,
  `poster` text NOT NULL,
  `intro` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movies`
--

INSERT INTO `movies` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `sh`, `rank`) VALUES
(2, '咚咚', 3, 441, '2025-01-11', '咚咚發', '片1導', '03B01v.mp4', '03B01.png', '咚咚咚咚咚咚 110', 1, 2),
(3, '咚咚2', 2, 411, '2025-01-12', '咚咚2發', '咚咚2導', '03B02v.mp4', '03B02.png', '咚咚2咚咚2', 1, 1),
(4, '咚咚限制', 4, 11, '2025-01-13', '片4發', '片4島', '03B04v.mp4', '03B04.png', '限制級咚咚限制級咚咚限制級咚咚', 1, 4),
(5, '預告片5', 2, 123, '2025-01-13', '預告片5發', '預告片5島', '03B05v.mp4', '03B05.png', '預告片5島預告片5發', 1, 5),
(6, '123', 1, 321, '2025-01-13', '片6發', '片6島', '03B06v.mp4', '03B06.png', '片6島片6發123', 1, 6),
(7, '07', 1, 777, '2025-01-10', '777', '7777', '03B07v.mp4', '03B07.png', '7777777777777', 1, 7);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` text NOT NULL,
  `movie` text NOT NULL,
  `date` date NOT NULL,
  `session` text NOT NULL,
  `qt` int(10) UNSIGNED NOT NULL,
  `seats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `no`, `movie`, `date`, `session`, `qt`, `seats`) VALUES
(8, '202501140007', '咚咚限制', '2025-01-14', '14:00~16:00', 4, 'a:4:{i:0;s:1:\"6\";i:1;s:1:\"7\";i:2;s:2:\"11\";i:3;s:2:\"12\";}'),
(9, '202501140009', '咚咚限制', '2025-01-14', '16:00~18:00', 3, 'a:3:{i:0;s:1:\"7\";i:1;s:2:\"12\";i:2;s:2:\"17\";}'),
(10, '202501140010', '咚咚限制', '2025-01-14', '16:00~18:00', 3, 'a:3:{i:0;s:1:\"6\";i:1;s:2:\"10\";i:2;s:2:\"11\";}');

-- --------------------------------------------------------

--
-- 資料表結構 `posters`
--

CREATE TABLE `posters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `ani` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posters`
--

INSERT INTO `posters` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES
(1, '預告片1', '03A01.jpg', 1, 2, 2),
(2, '預告片', '03A02.jpg', 1, 1, 3),
(3, '預告片3', '03A03.jpg', 1, 3, 3),
(4, '預告片4', '03A04.jpg', 1, 4, 2),
(5, '預告片5', '03A05.jpg', 1, 5, 3),
(6, '預告片6', '03A06.jpg', 1, 6, 1),
(7, '預告片7', '03A07.jpg', 1, 7, 2),
(8, '預告片8', '03A08.jpg', 1, 8, 2),
(9, '預告片9', '03A09.jpg', 1, 9, 3);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
