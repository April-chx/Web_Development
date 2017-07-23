-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2014-05-23 15:22:59
-- 服务器版本： 5.1.56-community
-- PHP Version: 5.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blogshare_database`
--

-- --------------------------------------------------------

--
-- 表的结构 `comment_list`
--

CREATE TABLE IF NOT EXISTS `comment_list` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `photoID` int(11) DEFAULT NULL,
  `content` longtext,
  `username` varchar(100) DEFAULT NULL,
  `timestamp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `comment_list`
--

INSERT INTO `comment_list` (`commentID`, `photoID`, `content`, `username`, `timestamp`) VALUES
(1, 1, 'I think it is a flag.', 'April', '16:12:43  22-05-2014 '),
(2, 3, 'Oh my god!Look these boys!', 'April', '16:14:36  22-05-2014 '),
(3, 2, 'He is a kind man, people in China respect him.', 'Tony', '16:47:35  22-05-2014 '),
(4, 1, 'Interesting things!', 'Tony', '16:48:03  22-05-2014 '),
(5, 2, 'I always see him in TV.', 'Linda', '16:52:08  22-05-2014 '),
(6, 5, 'Let us go!', 'Jack', '16:58:02  22-05-2014 '),
(7, 4, 'The Big Bang Theory is my favorite!', 'Jack', '16:58:29  22-05-2014 '),
(8, 5, 'When will you go?', 'John', '16:59:33  22-05-2014 '),
(9, 5, 'I want to go with you.', 'John', '16:59:45  22-05-2014 '),
(10, 4, 'Me too!', 'John', '17:00:06  22-05-2014 '),
(11, 3, 'ha ha ha!', 'John', '17:00:29  22-05-2014 '),
(12, 1, 'Who can tell me what it really is?', 'John', '17:02:26  22-05-2014 '),
(13, 4, '......', 'April', '17:03:53  22-05-2014 '),
(14, 5, 'I live in Shanghai. I went to here.', 'Nancy', '18:02:59  22-05-2014 ');

-- --------------------------------------------------------

--
-- 表的结构 `photo_list`
--

CREATE TABLE IF NOT EXISTS `photo_list` (
  `photoID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `image_name` varchar(100) DEFAULT NULL,
  `description` longtext,
  `username` varchar(100) DEFAULT NULL,
  `timestamp` varchar(100) DEFAULT NULL,
  `permission` int(11) DEFAULT NULL,
  PRIMARY KEY (`photoID`),
  UNIQUE KEY `photoID` (`photoID`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `photo_list`
--

INSERT INTO `photo_list` (`photoID`, `title`, `image_name`, `description`, `username`, `timestamp`, `permission`) VALUES
(1, 'STREP', 'logo_UE.jpg', 'Picture was a European Commission-funded STREP (Specific Targeted Research Projects), co-financed by the 6th Framework Programme of the European Commission. The project developed an approach that helps decision makers in European Public Administrations (PAs) to better understand their processes and identify the most promising areas for ICT investments.', 'April', '16:02:11  21-05-2014 ', 1),
(2, 'President Xi Jinping', 'president_xi.jpg', 'A cartoon of Chinese President Xi Jinping is seen on display at the 10th China International Cartoon and Animation Festival in Hangzhou, April 29, 2014.', 'Tony', '16:12:55  21-05-2014 ', 1),
(3, 'Graduation photo', '7427ea21079d14c9553e08.jpg', 'Graduates try opposite-sex clothing in an offbeat graduation photo at Bozhou Vocational and Technical College, Anhui province.', 'Linda', '16:18:16  21-05-2014 ', 1),
(4, 'The Big Bang Theory', 'eca86bd77ab714c9733e36.jpg', 'Many popular American TV shows including the Big Bang Theory were removed from Chinese video websites due to policy reasons, sparking discussions among Internet users.Ifeng.com has taken a survey on this issue and as so far, there have been 65,043 net users who have participated. The results show that 67% of respondents considered removing American TV shows would influence their life, and among which 42.33% believes the influence would be significant.', 'Linda', '16:28:08  21-05-2014 ', 1),
(5, 'Disneyland', '0013729e3c9014c9b42801.jpg', 'The Disney characters at a company event in Shanghai in December, 2013. The Shanghai International Tourism and Resorts Zone, covering about 24.7 square kilometers, will have the Disneyland theme park as its core as well as other tourism, cultural and retail areas.', 'Jack', '16:33:41  21-05-2014 ', 1),
(6, 'US storm system', '001aa018f83f14c945150e.jpg', 'TUPELO, Miss - On a second day of ferocious storms that have claimed at least 19 lives in the southern United States, a tornado tore through the Mississippi town of Tupelo on Monday causing widespread destruction to homes and businesses, according to witnesses and local emergency officials.', 'John', '16:33:41  21-05-2014 ', 0),
(7, 'Kempinski''s dessert', '001ec979096314c9964c43.jpg', 'Kempinski offers Siam Passion for dessert \nTraders Upper East Hotel presents Korean Food Festival. Kempinski offers Siam Passion for dessert \nAppitising Spring at Sun Palace \nCustomers can now order Siam Passion, Kempinski''s "dessert of the year 2014", at every Kempinski hotel in the world.', 'April', '16:34:21  21-05-2014 ', 0),
(8, 'Ferris Wheel', '51b99d8973e3a38ba5c2729d.jpg', 'This picture is my photoshop works. I uploaded it for you. Because I need some suggests for how to make my picture better. Can you help me?', 'Nancy', '18:06:43  22-05-2014 ', 0),
(9, 'Mashimaro', '2017430_89375641.jpg', 'This is my favorite toy. His name is Mashimaro.', 'happybear', '23:20:32  22-05-2014 ', 0);

-- --------------------------------------------------------

--
-- 表的结构 `user_list`
--

CREATE TABLE IF NOT EXISTS `user_list` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `blood` varchar(20) DEFAULT NULL,
  `profession` varchar(20) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `interest` varchar(100) DEFAULT NULL,
  `administrator` int(11) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `user_list`
--

INSERT INTO `user_list` (`userID`, `username`, `password`, `email`, `gender`, `age`, `blood`, `profession`, `phone`, `interest`, `administrator`) VALUES
(1, 'April', 'hx1122', '39660844@qq.com', 'female', '22', 'B', 'student', '341341', 'music,travel,', 1),
(2, 'Tony', 'yew8858', '13332844@qq.com', 'male', '33', 'A', 'doctor', '453454', 'sports,read,', 1),
(3, 'Linda', '987654', '28478579@sina.com', 'female', '23', 'O', 'waiter', '324343', 'travel,read,', 0),
(4, 'Jack', '36778', '7846583@163.com', 'male', '45', 'AB', 'scientist', '2477952', 'sports,travel,', 0),
(5, 'John', 'cc12345', '857684@tt.com', 'male', '67', 'B', 'driver', '3457838', 'sports,read,', 1),
(6, 'Nancy', 'gotohome', '3874583@zjut.com', 'female', '21', 'Unknow', 'student', '5334466', 'music,travel,read,', 0),
(7, 'happybear', 'bear5566', 'coolbear1993@163.com', 'male', '34', 'O', 'teacher', '05773984875', 'music,travel,read,', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
