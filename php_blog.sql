-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 06:55 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `admin_email`, `admin_name`, `admin_pass`) VALUES
(1, 'admin@gmail.com', 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_des`) VALUES
(1, 'Fruits', 'Fruits is very essential for our health.'),
(3, 'Electronics', 'Electronics is our daily neccessity products'),
(4, 'Laptop', 'Laptop is very essential for our life.'),
(5, 'Mobile', 'Mobile phone is a product which is needed our daily life as regular basis.'),
(6, 'Food', 'Food is the most important thing in our human body.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(255) NOT NULL,
  `post_title` varchar(150) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_img` varchar(255) NOT NULL,
  `post_ctg` int(255) NOT NULL,
  `post_author` varchar(60) NOT NULL,
  `post_date` date NOT NULL,
  `post_comment_count` int(255) NOT NULL,
  `post_summery` varchar(200) NOT NULL,
  `post_tag` varchar(255) NOT NULL,
  `post_status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_img`, `post_ctg`, `post_author`, `post_date`, `post_comment_count`, `post_summery`, `post_tag`, `post_status`) VALUES
(1, 'First Post2', 'This is first post.2		    ', 'download.png', 6, 'Admin', '2023-05-30', 3, 'This is first post', 'First', 1),
(2, 'Orange', 'Orange is Nutrition based fruits.', 'download (1).jpg', 1, 'Admin', '2023-06-10', 3, 'Orange is important for our health.', 'Orange', 1),
(3, 'MacBook Laptop', 'MacBook Air M1 with 16 rams and 256 GB SSD stands between 1,25,000-1,35,00 BDT. Another variant that got 16 GB ram with 512 GB SSD is priced at 1,47,000-1,54,000 BDT. ', 'images.jpg', 3, 'Admin', '2023-06-10', 3, 'MacBook Air M1 with 16 rams and 256 GB SSD stands between 1,25,000-1,35,00 BDT. Another variant that got 16 GB ram with 512 GB SSD is priced at 1,47,000-1,54,000 BDT. ', 'MacBook ', 1),
(4, 'Litchi ', 'Litchi is a good fruits.', 'images (1).jpg', 1, 'Admin', '2023-06-10', 3, 'Litchi is a good fruits.', 'Litchi ', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `post_with_ctg`
-- (See below for the actual view)
--
CREATE TABLE `post_with_ctg` (
`post_id` int(255)
,`post_title` varchar(150)
,`post_content` longtext
,`post_img` varchar(255)
,`post_author` varchar(60)
,`post_date` date
,`post_comment_count` int(255)
,`post_summery` varchar(200)
,`post_tag` varchar(255)
,`post_status` tinyint(3)
,`cat_id` int(11)
,`cat_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `post_with_ctg`
--
DROP TABLE IF EXISTS `post_with_ctg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_with_ctg`  AS SELECT `posts`.`post_id` AS `post_id`, `posts`.`post_title` AS `post_title`, `posts`.`post_content` AS `post_content`, `posts`.`post_img` AS `post_img`, `posts`.`post_author` AS `post_author`, `posts`.`post_date` AS `post_date`, `posts`.`post_comment_count` AS `post_comment_count`, `posts`.`post_summery` AS `post_summery`, `posts`.`post_tag` AS `post_tag`, `posts`.`post_status` AS `post_status`, `categories`.`cat_id` AS `cat_id`, `categories`.`cat_name` AS `cat_name` FROM (`posts` join `categories` on(`posts`.`post_ctg` = `categories`.`cat_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
