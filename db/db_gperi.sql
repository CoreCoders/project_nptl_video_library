-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2014 at 01:53 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_gperi`
--

-- --------------------------------------------------------

--
-- Table structure for table `rutvik3107031`
--

CREATE TABLE IF NOT EXISTS `rutvik3107031` (
  `vid` bigint(12) DEFAULT NULL,
  `fav` tinyint(1) DEFAULT NULL,
  `lvdate` datetime DEFAULT NULL,
  `wlater` tinyint(1) NOT NULL,
  `lflag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rutvik3107031`
--

INSERT INTO `rutvik3107031` (`vid`, `fav`, `lvdate`, `wlater`, `lflag`) VALUES
(1, 1, '2014-03-23 11:47:04', 0, 1),
(2, 0, '2014-03-23 11:36:14', 1, 1),
(3, 0, '2014-03-23 11:44:36', 0, 1),
(5, 0, '2014-03-23 11:27:21', 0, 0),
(6, 0, '2014-03-23 11:49:00', 0, 1),
(4, 0, '2014-03-23 11:26:50', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) NOT NULL,
  `pass` varchar(200) CHARACTER SET utf8 NOT NULL,
  `email` varchar(80) NOT NULL,
  `activation` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `pass`, `email`, `activation`, `status`) VALUES
(2, 'rutvik3107031', '017d9516a0a8b44db462c39ba8a4184a', 'rutvik3107031@gperi.ac.in', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` bigint(12) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `branch` varchar(20) DEFAULT NULL,
  `subject` varchar(20) DEFAULT NULL,
  `path` varchar(120) DEFAULT NULL,
  `thumbnail` varchar(120) DEFAULT NULL,
  `desc` varchar(250) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `topic` varchar(80) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `likes` bigint(12) NOT NULL,
  `vcounts` bigint(12) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `branch`, `subject`, `path`, `thumbnail`, `desc`, `date`, `topic`, `name`, `likes`, `vcounts`) VALUES
(1, 'cvxtzyu', 'computer', 'AP', 'video\\Advanced Text Shatter.mp4', 'video_gallery_videolb\\thumbnails\\Color-Pencils.jpg', 'sdlkhgldhgkldshflkdshfdslfhjdshfjdskhfkdsjhfkdsjfhkjdsfhkdshd', '2014-03-23 11:47:04', 'sdf,dshfjdsh', 'Advanced Text Shatter.mp4', 1, 56),
(2, 'sadsf', 'computer', 'AP', 'video\\clouds_fast_1.mp4', 'video_gallery_videolb\\thumbnails\\Colored-Pencils15.jpg', 'lsdhglksdhlksdhflkdshflkdshflkdshfkldshfdslkfhdslkfhdslkfhdslkhfksdlfhdslkfhldsf', '2014-03-23 11:36:14', 'sdfdsf', 'clouds_fast_1.mp4', 1, 37),
(3, 'sad', 'computer', 'AP', 'video\\Facebook Album Sync.mp4', 'video_gallery_videolb\\thumbnails\\colored pencils.jpg', 'sdlghsdlkhfdslkhf', '2014-03-23 11:44:36', 'sdf,dsfh', 'Facebook Album Sync.mp4', 1, 23),
(4, 'asd', 'computer', 'AP', 'video\\MVI_4156.MOV', 'video_gallery_videolb\\thumbnails\\eg.PNG', 'sd..fkdsfkhdslkfsdhflkdshfljhdsfjhdsjfhdsfhkjsdhfjkdshfkjdshfjkdshfkdsjf', '2014-03-23 11:26:50', 'sdsad', 'MVI_4156.MOV', 0, 10),
(5, 'djfh', 'computer', 'AP', 'video\\VID_00000009.mp4', 'video_gallery_videolb\\thumbnails\\color_pencils_in_soda_water_by_clicksnapshot-d5dxc2r.jpg', 'sddkjhgdslhjkdshfdsljhfdsjfhdsjbjdsbksdjhfklhfjeyhiuewhfjkehiworeutihgdslkbgkjdsb', '2014-03-23 11:27:21', 'sdmfbds', 'VID_00000009.mp4', 0, 79),
(6, 'xyz', 'computer', 'AP', 'video\\Wildlife.wmv', 'video_gallery_videolb\\thumbnails\\8482-cassette-retro-cassette-tape.png', 'sdlghsdlkghlksdghdslkhfdkslfkdslfdlksfjdsklfjdslkfjsdlkjfdslkfjkdslfjkdslfjsdlkfjdslkfjsdlkjfkdsljfkldsjfkdsljfkdslghjfslhgsdjhsdjvsdbvm,bxv,mbvm,xbvhdlksfdslkfdslkflkdsfkdsjfkldsf', '2014-03-23 11:49:00', 'adsafsfa', 'Wildlife.wmv', 1, 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
