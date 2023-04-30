-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 04:43 AM
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
(4, 'Data Structure'),
(5, 'Java');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `text` varchar(200) NOT NULL,
  `commentor_id_ref` int(11) NOT NULL,
  `post_id_ref` int(11) NOT NULL,
  `likes` int(11) DEFAULT NULL,
  `comment_depth` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `text`, `commentor_id_ref`, `post_id_ref`, `likes`, `comment_depth`) VALUES
(1, 'good post I comment', 1, 39, NULL, 0),
(2, 'comment2', 1, 40, NULL, 0),
(3, '12', 1, 40, NULL, 0),
(4, 'why no', 1, 40, NULL, 0),
(5, 'asdf', 1, 40, NULL, 0),
(6, 'asdhel', 1, 40, NULL, 0),
(7, 'hell yeh', 1, 40, NULL, 0),
(8, 'you did it dude', 1, 39, NULL, 0),
(9, 'readlly', 1, 39, NULL, 0),
(10, 'Thx! this is so good information!', 1, 41, NULL, 0),
(11, 'so what you want', 1, 41, NULL, 0),
(12, 'this is useless information', 1, 41, NULL, 0),
(13, 'asdf', 1, 42, NULL, 0),
(14, 'asdfasdf', 1, 42, NULL, 0),
(15, 'Good job', 1, 42, NULL, 0),
(16, 'Os is very good program', 1, 21, NULL, 0);

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
(26, 'Java Is good', 'Java is OOPS LANGUAGE', 'img1.png', 0),
(27, 'imlibrary', 'library is good place', 'img1.png', 0),
(28, 'UPLOADING IMG IS GOOD', 'IM UPLOADING IMG CAN YOU /se?', 'img1.png', 0),
(29, 'DIARY ON 28 APR', 'TODAY I ATE SAMOSA AND PANEER TOOFANI THALI AND some cheese thing', '', 0),
(30, 'asdfasdf', 'adsf', '', 0),
(31, 'asdfasdf', 'asdfasd', '', 0),
(32, 'asdf', 'asdf', '', 0),
(33, 'asdf', 'asdf', '', 0),
(34, 'asdf', 'asdf', '', 0),
(35, '.', '.', '', 0),
(36, ',', ',', '', 0),
(37, '.', '\'', '', 0),
(38, '\'', '.', '', 0),
(39, 'i want to implement some functionality with comment', 'but i don\'t know where to start from', '', 0),
(40, 'here is my post', 'about good things', '', 0),
(41, 'HOW TO CREATE PHP WEBSITE', '1. INSTALL XAMPP\r\n2. start with <?php?>\r\n3. echo is print\r\n4. learn other functioins\r\n5. practice \r\n\r\ngood luck guys', '', 0),
(42, 'How to upload image easily', '1. Shfit + Windows + S\r\n2. goto pictures/screenshot \r\n\r\n3. upload Img!!!1', 'Screenshot 2023-04-29 205036.png', 0),
(43, 'computer network tag', 'this post will have computer network tag', '', 0);

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
(26, 3),
(27, 2),
(27, 3),
(28, 3),
(29, 3),
(33, 3),
(34, 3),
(43, 3),
(43, 4);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
