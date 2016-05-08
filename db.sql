-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- 主機: localhost:3306
-- 產生時間： 2016 年 05 月 08 日 03:29
-- 伺服器版本: 5.5.42
-- PHP 版本： 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

--
-- 資料庫： `problemset`
--
CREATE DATABASE IF NOT EXISTS `problemset` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `problemset`;

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `userid` tinytext,
  `passwd` tinytext,
  `nickname` tinytext,
  `email` tinytext,
  `pri` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `problem`
--

CREATE TABLE `problem` (
  `id` int(11) NOT NULL,
  `owner` tinytext,
  `title` tinytext,
  `prob_desc` text,
  `choice` tinyint(1) NOT NULL DEFAULT '0',
  `options` text,
  `ans` tinytext,
  `det_ans` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `prob_set`
--

CREATE TABLE `prob_set` (
  `id` int(11) NOT NULL,
  `title` tinytext,
  `owner` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `prob_set_pid`
--

CREATE TABLE `prob_set_pid` (
  `set_id` int(11) NOT NULL,
  `prob_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `sol_prob`
--

CREATE TABLE `sol_prob` (
  `aid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `prob_set`
--
ALTER TABLE `prob_set`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `prob_set_pid`
--
ALTER TABLE `prob_set_pid`
  ADD KEY `set_id` (`set_id`),
  ADD KEY `prob_id` (`prob_id`);

--
-- 資料表索引 `sol_prob`
--
ALTER TABLE `sol_prob`
  ADD KEY `aid` (`aid`),
  ADD KEY `pid` (`pid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `problem`
--
ALTER TABLE `problem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `prob_set`
--
ALTER TABLE `prob_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `prob_set_pid`
--
ALTER TABLE `prob_set_pid`
  ADD CONSTRAINT `prob_set_pid_ibfk_1` FOREIGN KEY (`prob_id`) REFERENCES `problem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prob_set_pid_ibfk_2` FOREIGN KEY (`set_id`) REFERENCES `prob_set` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `sol_prob`
--
ALTER TABLE `sol_prob`
  ADD CONSTRAINT `sol_prob_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `problem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sol_prob_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
