-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2017 at 06:45 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.20-2~ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap'),
(4, 'Java'),
(15, 'PHP'),
(17, 'OOP Javascript'),
(19, 'OOP Python');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
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
(10, 16, 'Renan Filip', 'renan@renan.com', 'Teste de comentÃ¡rio!', 'approved', '2017-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL DEFAULT '',
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(16, 1, 'teste 1', 'aiushiaush', '', '2017-07-05', '56257_rick_and_morty.jpg', '<p>aojsoiajsoiajsoiajsoiajsoiajsoijasoijasojaoijs!!!!!</p>', 'javascript, course, class, great', 0, 'published', 6),
(17, 1, 'Just Another Post', 'Renan Filip', '', '2017-07-05', 'attackontitan.jpg', 'auishauihsuiahsiaushiuahsiuahsiuahsiuahsiuahsiuahsiuahsiuahsiuhaius!      ', 'javascript, course, class, great', 0, 'published', 2),
(20, 1, 'Example Post', 'Renan Filip', '', '2017-07-05', '56257_rick_and_morty.jpg', '<p><strong>Hi man, this is COOOOL!</strong></p>', 'javascript, course, class, great', 0, 'published', 0),
(21, 1, 'Example Post', 'Renan Filip', '', '2017-07-05', '56257_rick_and_morty.jpg', '<p><strong>Hi man, this is COOOOL!</strong></p>', 'javascript, course, class, great', 0, 'published', 0),
(22, 19, 'Nice Post', 'Renan Filip', '', '2017-07-05', '56767450-ghost-in-the-shell-wallpapers.jpg', '<p><em>javascript, course, class, great</em></p>', 'javascript, course, class, great', 0, 'published', 0),
(23, 17, 'teste', 'Carlos Saldanha', '', '2017-07-06', 'shingeki-no-kyojin-hd-wallpaper.jpg', '<p>teste de upload</p>', 'javascript, course, class, great', 0, 'published', 0),
(24, 1, 'teste 1', 'aiushiaush', '', '2017-07-05', '56257_rick_and_morty.jpg', '<p>aojsoiajsoiajsoiajsoiajsoiajsoijasoijasojaoijs!!!!!</p>', 'javascript, course, class, great', 0, 'published', 0),
(25, 1, 'Just Another Post', 'Renan Filip', '', '2017-07-05', 'attackontitan.jpg', 'auishauihsuiahsiaushiuahsiuahsiuahsiuahsiuahsiuahsiuahsiuahsiuhaius!      ', 'javascript, course, class, great', 0, 'published', 0),
(26, 19, 'Nice Post', 'Renan Filip', '', '2017-07-05', '56767450-ghost-in-the-shell-wallpapers.jpg', '<p><em>javascript, course, class, great</em></p>', 'javascript, course, class, great', 0, 'published', 0),
(27, 1, 'teste 1', 'aiushiaush', '', '2017-07-05', '56257_rick_and_morty.jpg', '<p>aojsoiajsoiajsoiajsoiajsoiajsoijasoijasojaoijs!!!!!</p>', 'javascript, course, class, great', 0, 'published', 0),
(28, 1, 'teste 1', 'aiushiaush', 'rico', '2017-07-08', '56257_rick_and_morty.jpg', '<p>aojsoiajsoiajsoiajsoiajsoiajsoijasoijasojaoijs!!!!!</p>', 'javascript, course, class, great', 0, 'published', 6),
(33, 1, 'teste', '', 'rick', '2017-07-08', '56257_rick_and_morty.jpg', '<p>javascript, course, class, great</p>', 'javascript, course, class, great', 0, 'published', 0),
(34, 1, 'teste', '', 'rico', '2017-07-08', '56767450-ghost-in-the-shell-wallpapers.jpg', '<p>javascript, course, class, great</p>', 'javascript, course, class, great', 0, 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(2, 'rico', '$1$gvmN2xpZ$5yr4/pkX8ugLCmyMjTs.i1', 'Rico', 'rico', 'rico@rico.com', '56257_rick_and_morty.jpg', 'admin', '0'),
(3, 'rick', '123456', 'Rickys', 'Barao', 'rick123456@gmail.com', '56257_rick_and_morty.jpg', 'subscriber', '0'),
(4, 'robo', '123456', 'Ro', 'Bo', 'robo@gmail.com', '56767450-ghost-in-the-shell-wallpapers.jpg', 'subscriber', '0'),
(5, 'whatever', '123', 'Juan', 'whatever', 'whatever@gmail.com', '56767450-ghost-in-the-shell-wallpapers.jpg', 'admin', '$2y$10$iusesomecrazystring22'),
(31, 'teste2', '$2y$10$iusesomecrazystrings2unQxYVRSP3We0ObCxEO4zz2HeuOxlO0C', '', '', 'teste2@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(32, 'teste3', '$2y$10$iusesomecrazystrings2utpOoyamZdpJZD2GB1fnJXjXnZrbxMw.', '', '', 'teste3@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(33, 'teste4', '$2y$10$iusesomecrazystrings2u.qiVVYvt1qG13oI2AaCZWrvGwBTOlDC', '', '', 'teste4@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(34, 'teste', '$2y$10$iusesomecrazystrings2u.qiVVYvt1qG13oI2AaCZWrvGwBTOlDC', '', '', 'teste@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(35, 'demo', '$2y$10$iusesomecrazystrings2ucLnkDpWpgCrvrU7t.yv1LS3MhRCPMY6', '', '', 'demo@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(36, 'teste', '$2y$10$iusesomecrazystrings2uSfzr/tHVMajanoUPDevBBoYvPVPMpmu', '', '', 'teste@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(40, 'conan', '$1$H.2voMO/$xEqMpRv8qgmIk40t9omcQ0', '', '', 'conan@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(41, 'demo2000', '$1$2dcd4.l/$Az0Lgu06T4PKhcVFau05z0', '', '', 'demo2000@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(42, 'conan2000', '$1$tLj9uWmA$WvomlPbw3RJxbmolnWj5V0', '', '', 'conan2000@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(43, 'conan2001', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', '', '', 'conan2001@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(44, 'conan2011', '$1$c3ftwUS7$c7oJGkdqQu4CgD3PLVFV8/', '', '', 'conan2011@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(45, 'conan2002', '*0', '', '', 'conan2002@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(46, 'conan2013', '$1$Ybm/u7j8$zxGkI6jkAcwFqXeGEYRvF.', '', '', 'conan2013@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(47, 'demo100', '$1$beq7bCxz$PIDvMLgeNLJLw340nHQGg/', 'Carlos', 'Conan', 'demo100@gmail.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(48, 'renan', '$1$.OIjccJr$byOUb/xZ1i1QCyf6iBjOL0', '', '', 'renan@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(49, 'renanteste', '$1$MWLGg3dp$.bSdSlBm8lfQ7tLv/YON8.', '', '', 'renanteste@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(50, 'peter', '$2y$12$p2cHYXPo9TEKi0U7gX88P.rRPag02JQgv.YjbAawZMNmce6Q45AyC', '', '', 'peter@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(51, 'peter', '$2y$12$.aKIsYUwncucqO3ZN1lDc..uDWJxtHLUUKN9dNSOyj95i5HWhFl6O', '', '', 'perterperk@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(52, 'teste', '$2y$12$LU9UhBGLnM0ZQn1xUF7sUOmYg0tJEJDBl1v2F9CBZ0knhK6TwWrd6', '', '', 'teste@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(53, 'pete', '$2y$12$Q6tCI5z5HALTDljG8CJn7uP46lVd1/eKI.viAySqCQgdM0qbkvWGa', 'Peter', 'Willian', 'pete@gmail.com', '56767450-ghost-in-the-shell-wallpapers.jpg', 'admin', '$2y$10$iusesomecrazystrings22');

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
(5, 'qi63rjbsc93s6u1htl9vbem8m3', 1499475032),
(6, 'hf85rg5e07bk1gct3urr11n972', 1499474972),
(7, '73sggevlalnl9abjnvgfq3a8h6', 1499546844);

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
  ADD PRIMARY KEY (`post_id`);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
