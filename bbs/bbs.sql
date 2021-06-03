-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014 年 05 月 12 日 08:43
-- 服务器版本: 5.5.32
-- PHP 版本: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bbs`
--
CREATE DATABASE IF NOT EXISTS `bbs` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bbs`;

-- --------------------------------------------------------

--
-- 表的结构 `t_board`
--

CREATE TABLE IF NOT EXISTS `t_board` (
  `board_name` varchar(100) NOT NULL,
  `description` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`board_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_board`
--

INSERT INTO `t_board` (`board_name`, `description`) VALUES
('体育', '精彩体育赛事讨论'),
('教育', '教育资源共享讨论(电子书，视频资料等)'),
('音乐', '流行音乐资源共享');

-- --------------------------------------------------------

--
-- 表的结构 `t_post`
--

CREATE TABLE IF NOT EXISTS `t_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `board_name` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` text NOT NULL,
  `write_time` varchar(30) NOT NULL,
  `see_count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_contain` (`board_name`),
  KEY `FK_father_child` (`pid`),
  KEY `FK_write_post` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `t_post`
--

INSERT INTO `t_post` (`id`, `pid`, `board_name`, `uid`, `title`, `content`, `write_time`, `see_count`) VALUES
(1, NULL, '体育', 1, '帕森斯0.9秒幸运球利拉德反绝杀 火箭2-4遗憾出局', '新浪体育讯　北京时间5月3日，火箭遭到压哨三分绝杀，客场以98-99败给开拓者，总比分2-4出局。', '2014-05-03 17:26', 2),
(2, NULL, '体育', 1, '穆里尼奥:切尔西核心不懂牺牲 四大皆空？我骄傲', '新浪体育讯　随着周中欧冠半决赛落下帷幕，主场落败的切尔西失去了与皇家马德里决战里斯本的机会。对于这样的结果，见惯了大风大浪的穆里尼奥选择平静接受，然而其麾下大将阿扎尔则显得有些激动。赛后他甚至批评了切尔西的战术体系，抱怨在进攻中缺少支援。', '2014-05-03 18:12', 14),
(3, NULL, '体育', 5, '阿斯蒂芬', '啊死短发撒旦法撒旦法撒旦撒旦', '2014-05-03 14:46', 1),
(4, NULL, '体育', 5, '周星驰v字形陈v型注册', '4234发电公司飞得更高发送到', '2014-05-03 14:51', 0),
(5, NULL, '体育', 2, '123123123', '21爱色日死短发撒旦法日23人', '2014-05-03 20:53', 7),
(6, NULL, '教育', 2, 'java程序设计', 'thinking in java pdf电子版', '2014-05-03 21:00', 23),
(7, 5, '体育', 2, NULL, 'assadf21321321312321', '2014-05-11 12:09', 0),
(8, 5, '体育', 2, NULL, 'asdfsadfsadf', '2014-05-11 12:10', 0),
(9, 2, '体育', 2, NULL, 'haha', '2014-05-11 12:16', 0),
(10, 6, '教育', 3, NULL, '好资源', '2014-05-11 12:51', 0),
(11, NULL, '体育', 3, 'asdfsadfasd', 'f123123asdf123214354235saefrw34r234', '2014-05-11 14:19', 2),
(12, 11, '体育', 3, NULL, 'asdfsadfsadfsadfsadf', '2014-05-11 14:19', 0),
(13, NULL, '音乐', 3, '音乐排行榜', '哈哈', '2014-05-11 14:22', 2);

-- --------------------------------------------------------

--
-- 表的结构 `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `permission` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `t_user`
--

INSERT INTO `t_user` (`uid`, `username`, `password`, `permission`) VALUES
(1, 'admin', '123', 'admin'),
(2, 'aaa', '123', 'normal'),
(3, 'bbb', '123', 'normal'),
(4, 'ccc', '123', 'normal'),
(5, 'ddd', '123', 'normal');

--
-- 限制导出的表
--

--
-- 限制表 `t_post`
--
ALTER TABLE `t_post`
  ADD CONSTRAINT `FK_contain` FOREIGN KEY (`board_name`) REFERENCES `t_board` (`board_name`),
  ADD CONSTRAINT `FK_father_child` FOREIGN KEY (`pid`) REFERENCES `t_post` (`id`),
  ADD CONSTRAINT `FK_write_post` FOREIGN KEY (`uid`) REFERENCES `t_user` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
