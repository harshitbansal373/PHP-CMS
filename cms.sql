-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2019 at 01:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_creator` varchar(20) NOT NULL,
  `cat_user` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_creator`, `cat_user`) VALUES
(1, 'home', 'harshitbansal', 'harshit,raghuveer23,raghuveer,vikas,daau,'),
(3, 'service', 'harshitbansal', ''),
(5, 'contact', 'harshitbansal', ''),
(7, 'about', 'harshitbansal', 'raghuveer,'),
(55, 'hello', 'harshitbansal', '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(25, 1, 'daau', 'example@gmail.com', 'vfadvcv', 'show', '2019-01-16'),
(26, 1, 'dinesh', 'example@gmail.com', 'vfvfdvfsv', 'show', '2019-01-16'),
(27, 2, 'daau', 'example@gmail.com', 'fvfvfev', 'show', '2019-01-16'),
(28, 2, 'dinesh', 'example@gmail.com', 'vfbgrbrt', 'show', '2019-01-16'),
(37, 2, 'fdgd', 'example@gmail.com', 'cxvfv', 'show', '2019-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(1, 1, 'Website', 'harshitbansal', '2018-10-16', 'Boeremark.jpg', 'you are doing well...\r\n', 'harshit,website', 2, 'draft', 1),
(2, 1, 'How to work?', 'raghuveer', '2018-10-21', '544106281_1280x720.jpg', 'you should move on without afraid of what will the curcumstances...         ', 'life,Rajesh,How to work', 0, 'draft', 2),
(3, 1, 'Android', 'priyanka', '2018-10-24', 'work-life-balance.jpg', 'Android is a mobile operating system developed by Google, based on a modified version of the Linux kernel and other open source software and designed primarily for touchscreen mobile devices such as smartphones and tablets            ', 'Android, namandeep, mobile, smartphone', 1, 'published', 1),
(8, 1, 'life', 'harshitbansal', '2019-01-10', 'life-008.jpg', 'life has no ctrl+z \r\nhahahaha', 'life , ctrl', 0, 'published', 0),
(10, 1, 'Time', 'raghuveer', '2018-10-21', 'time.jpeg', 'time is money.', 'time, money', 1, 'published', 0),
(11, 1, 'Goes on', 'raghuveer', '2018-10-21', 'life-expectancy-decline.jpg', 'this is the content for this post.    ', 'goes on, suresh, life', 0, 'published', 0),
(12, 3, 'fdnbkfd', 'vijay', '2018-10-30', '', 'bdssvkbdsk   ', 'dvjdjsv', 0, 'd,jvsd', 0),
(13, 1, 'diwali', 'vijay', '2018-11-08', '', '<p>hello frnds happy diwali!!</p>', 'vinod, diwali', 0, 'published', 0),
(14, 3, 'accounts', 'priyanka', '2019-01-10', '', '<p>accounting is an identifying process</p>', 'accounts, tanya, bela', 0, 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22',
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`, `token`) VALUES
(17, 'harshitbansal', '$2y$10$iusesomecrazystrings2uvgnjnDOGIE6JPA9zzq36EdPnYMUav/S', 'harshit', 'bansal', 'example@gmail.com', '', 'admin', '$2y$10$iusesomecrazystrings22', '77020c98efbc545715012c76bec5aaec6e8a2cfced12d25f1c2f2626a1ef4af2271b1e458848d80a745e6b578b954cf34427'),
(20, 'priyanka', '$2y$12$JWAZjgfODGxhEpsJShk4TO5MHGZ/hUnliFfkwPEvsLkfCJOdJ6ugy', 'priyanka', 'sharma', 'example@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22', '77020c98efbc545715012c76bec5aaec6e8a2cfced12d25f1c2f2626a1ef4af2271b1e458848d80a745e6b578b954cf34427'),
(22, 'raghuveer', '$2y$12$kTq/GUEkryih.nT9O77KfeyMp9165ZIqlvu1dEOQLKW8RWv0te46W', 'raghuveer', 'singh', 'example123@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22', '77020c98efbc545715012c76bec5aaec6e8a2cfced12d25f1c2f2626a1ef4af2271b1e458848d80a745e6b578b954cf34427'),
(26, 'raghuveer23', '$2y$12$23Bqzby0qrz3VfojjbZjT.e4nwL7a68nJk7A4E9bgolDlWmG0lL7m', 'raghuveer', 'sharma', 'example@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(28, 'acqtk6uivrc3mancr6jubo36g8', 1541324861),
(40, 'ipke8cras4eauiu50upkm1mocd', 1548511410),
(41, 'l4qj6m6jv3ges0us7cqvrqovhq', 1548401977),
(42, 'fd7b414bec20e569f9bd17c4e7ef4c13', 1562584762);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`,`post_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
