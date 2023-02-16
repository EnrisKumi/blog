-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 10:26 PM
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
-- Database: `blog_fe`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(10, 'addadsadssdasad', 'sdasdasadsd'),
(12, 'SADDDDDDDDDDDDDDDDDD', 'DSDAAAAAAAAAAAAAAAAA'),
(14, 'categorie', 'sadddddddddddddddddddddddddddddddd');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `userId` int(11) UNSIGNED NOT NULL,
  `categoryId` int(25) NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `dateTime`, `userId`, `categoryId`, `thumbnail`) VALUES
(15, 'testf', 'TEST TEST', '2023-02-08 15:04:29', 1, 2, 'dshdashdsahjasd.jpg'),
(18, 'tesmyuktmutkmkymkyktf', 'TEST TEST', '2023-02-08 15:13:54', 9, 10, 'dshdashdsahjasd.jpg'),
(19, 'tesmyuktmutkmkymkyktf', 'TEST TEST', '2023-02-08 15:14:26', 9, 10, '15-o.jpg'),
(20, 'wewwewwewewew', 'weewqweweweewqewwe', '2023-02-15 18:36:37', 9, 7, 'aws-lex-feature-01.png'),
(27, 'budalluk kot', 'rtetsejjjbbb', '2023-02-15 19:16:47', 9, 10, 'torn-paper-1080x607.png'),
(29, 'dggdgdgazsgdsaghasdjggjasdgj', 'sdfjhsdfhgdsfajkafdsfdasdfsa', '2023-02-15 21:00:42', 16, 10, 'torn-paper-1080x607.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `isAdmin`) VALUES
(10, 'whatevertttttttyyyyyyy', 'dsjkdsajdsajkdjk', 'forErrors', 'kdkkdsadja@gmail.com', '$2y$10$rwmgfQR53pzdDt2E3zfdzO5RO0SyoRRaTP.Pg2HuNF7V6Tibk/dVG', '', 1),
(11, 'assddsasda', 'dsasdadsasd', 'testLogSign', 'dsadsdsa@gmail.com', '$2y$10$6VYtmhLUsD22SNaLMt7fmuij3QR1M8g2Sd78XXabQ02jekEk69j9G', '', 0),
(12, 'kumi', 'enris', 'kumi', 'kumi@gmail.com', '$2y$10$bVtyoE5JLVlbe/lTWznE7e/kD12MVQ.YSJcoM7fYHdOxUUmXT5zGq', '', 0),
(13, 'koopko', 'saasw', 'pokl', 'pokl@gmial.com', '$2y$10$R92VvNsRGbUSdPy.ySjZ5e9Y8zZU8jt/fWNvl/.HIexn7GT8dTj4a', '', 0),
(14, 'asjju', 'gfsdge', 'saddwde', 'adw@gmail.com', '$2y$10$9N2CMqOI4D7ARQ0Y/Ql5j.jGkFysVrFCYFwD5/Eb.qxm4vwisTqGy', '', 0),
(15, 'gfrds', 'jyhrtegrfwe', 'uytere', 'uytewr@gmail.com', '$2y$10$rE8sOi9yJid3MG7s1OHj..VVBs44YK1H7LeD3Si8sW3ljUqEAmh6G', '', 0),
(16, 'userN', 'normal', 'userN', 'faikkop@gmail.com', '$2y$10$DPlCw/V9FGzbVX/epXIdQOzAc3.5DELtgArrl6lzOk8a9zdcqsor6', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
