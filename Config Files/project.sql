-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 16, 2023 at 06:38 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Competition'),
(4, 'Announcement');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_status`) VALUES
(1, 4, 'Announcement: Training on Monday', 'Sensei Chang', '2023-03-15', 'image1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tincidunt condimentum felis in interdum. Cras a rutrum felis. Vestibulum porttitor pellentesque nunc nec faucibus. Integer lobortis ultrices orci, ut facilisis dui sagittis et. In hac habitasse platea dictumst. Phasellus mauris quam, gravida et lacus a, elementum ullamcorper enim. Mauris at arcu a enim congue maximus. Praesent elementum varius convallis. Curabitur viverra facilisis ipsum. Praesent quis eros quis nisl posuere gravida. Maecenas tempus tellus sit amet justo venenatis posuere. \r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tincidunt condimentum felis in interdum. Cras a rutrum felis. Vestibulum porttitor pellentesque nunc nec faucibus. Integer lobortis ultrices orci, ut facilisis dui sagittis et. In hac habitasse platea dictumst. Phasellus mauris quam, gravida et lacus a, elementum ullamcorper enim. Mauris at arcu a enim congue maximus. Praesent elementum varius convallis. Curabitur viverra facilisis ipsum. Praesent quis eros quis nisl posuere gravida. Maecenas tempus tellus sit amet justo venenatis posuere. \r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tincidunt condimentum felis in interdum. Cras a rutrum felis. Vestibulum porttitor pellentesque nunc nec faucibus. Integer lobortis ultrices orci, ut facilisis dui sagittis et. In hac habitasse platea dictumst. Phasellus mauris quam, gravida et lacus a, elementum ullamcorper enim. Mauris at arcu a enim congue maximus. Praesent elementum varius convallis. Curabitur viverra facilisis ipsum. Praesent quis eros quis nisl posuere gravida. Maecenas tempus tellus sit amet justo venenatis posuere. \r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tincidunt condimentum felis in interdum. Cras a rutrum felis. Vestibulum porttitor pellentesque nunc nec faucibus. Integer lobortis ultrices orci, ut facilisis dui sagittis et. In hac habitasse platea dictumst. Phasellus mauris quam, gravida et lacus a, elementum ullamcorper enim. Mauris at arcu a enim congue maximus. Praesent elementum varius convallis. Curabitur viverra facilisis ipsum. Praesent quis eros quis nisl posuere gravida. Maecenas tempus tellus sit amet justo venenatis posuere. ', 'announcement, training', 'published'),
(3, 2, 'test', 'test', '2023-03-07', 'pexels-haste-leart-v-690597.jpg', 'test', 'test, test', 'published'),
(10, 2, 'TEST', 'JIN', '2023-03-07', 'pexels-haste-leart-v-690597.jpg', 'ASDFASDFASD', 'ASDFASDF', 'published');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
