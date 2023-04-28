-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 05:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `tag`) VALUES
(1, 'OS'),
(2, 'DBMS'),
(3, 'Computer Network'),
(4, 'Data Structure');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `text` varchar(200) NOT NULL,
  `commentor_id_ref` int(11) NOT NULL,
  `post_id_ref` int(11) NOT NULL,
  `likes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_liked`
--

CREATE TABLE `comment_liked` (
  `comment_id_ref` int(11) NOT NULL,
  `user_id_ref` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_relation`
--

CREATE TABLE `comment_relation` (
  `origin_id_ref` int(11) NOT NULL,
  `reply_id_ref` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `main_img` varchar(100) NOT NULL,
  `likes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `content`, `main_img`, `likes`) VALUES
(1, 'hello workd', 'hello content', '', 0),
(2, 'hello title1', 'hello content2', '', 0),
(3, 'asdfas', 'asdf', '', 0),
(4, 'asdfas', 'asdf', '', 0),
(5, 'asdf', 'asdf', '', 0),
(6, 'titl', 'head', '', 0),
(7, 'titieo', 'content', '', 0),
(8, 'tite', 'conetne', '', 0),
(9, 'title1', 'content2', '', 0),
(10, 'title', 'conten', '', 0),
(11, 'title', 'adsf', '', 0),
(12, 'tilt', 'ghe', '', 0),
(13, 'post', 'zsdf', '', 0),
(14, 'asdf', 'asdf', '', 0),
(15, 'title1', 'content1', '', 0),
(16, 'thitle1', 'contentq', '', 0),
(17, 'titile1', 'content1', '', 0),
(18, 'about c++', 'c++ is very difficult language', '', 0),
(19, 'asdfasdf', 'asdf', '', 0),
(20, 'title1', 'content1', '', 0),
(21, 'about OS', 'OS means operating system ,\r\nexample of os includes ubuntu, kali_lniux, windows, etc..', '', 0),
(22, 'data structure', 'stack: will stack\r\nheap: like a heap of files where you can pick up any in any order\r\nlinked list : human centipede\r\ndouble linked list: more gross human centipede\r\n', '', 0),
(23, 'about diagram', 'this is my diagram atached hope you enjoy', '', 0),
(24, 'asdf', 'asdf', '', 0),
(25, 'this is my img', 'does it look good?', 'img1.png', 0),
(26, 'Java Is good', 'Java is OOPS LANGUAGE', 'img1.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_category_relation`
--

CREATE TABLE `post_category_relation` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_category_relation`
--

INSERT INTO `post_category_relation` (`post_id`, `category_id`) VALUES
(20, 3),
(21, 1),
(21, 3),
(22, 2),
(22, 4),
(23, 2),
(23, 4),
(25, 1),
(26, 1),
(26, 3);

-- --------------------------------------------------------

--
-- Table structure for table `post_liked`
--

CREATE TABLE `post_liked` (
  `post_id_ref` int(11) NOT NULL,
  `user_id_ref` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
