-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2022 at 04:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rg_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE IF NOT EXISTS `api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) DEFAULT NULL,
  `short_name` tinytext NOT NULL,
  `api_name` tinytext NOT NULL,
  `request_url` text NOT NULL,
  `data_selector` tinytext DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `api_category_id_fk` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='Table pour enregistrer les requêtes api qu''on utiliserai\n';

--
-- Dumping data for table `api`
--

INSERT INTO `api` (`id`, `category`, `short_name`, `api_name`, `request_url`, `data_selector`) VALUES
(1, 1, 'rdcat', 'Random.cat', 'aws.random.cat/meow', 'file'),
(2, 2, 'rdog', 'Random.dog', 'random.dog/woof.json', 'url'),
(3, 3, 'rduck', 'Random-d.uck', 'random-d.uk/api/v2/quack', 'url'),
(4, 4, 'rfox', 'Randomfox.ca', 'randomfox.ca/floof/', 'image');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short_name` tinytext NOT NULL,
  `full_name` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `short_name`, `full_name`) VALUES
(1, 'cat', 'Chat'),
(2, 'dog', 'Chien'),
(3, 'duck', 'Canard'),
(4, 'fox', 'Renard');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) NOT NULL,
  `text` text NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `comment_image_id_fk` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `image_id`, `text`) VALUES
(2, 5, 'Meh'),
(3, 4, 'Pretty'),
(5, 3, 'Interesting'),
(9, 2, 'Il est mignon'),
(14, 6, ''),
(17, 3, 'Look at me'),
(18, 4, ''),
(29, 1, 'Comfy');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) DEFAULT NULL,
  `path_to_image` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `image_category_id_fk` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `category`, `path_to_image`) VALUES
(1, 1, 'https://purr.objects-us-east-1.dream.io/i/rrXar.png'),
(2, 1, 'https://purr.objects-us-east-1.dream.io/i/Iq0Pq.jpg'),
(3, 1, 'https://purr.objects-us-east-1.dream.io/i/V5ZSH.jpg'),
(4, 1, 'https://purr.objects-us-east-1.dream.io/i/17202788_1446865758698091_5564738866603964311_n.jpg'),
(5, 1, 'https://purr.objects-us-east-1.dream.io/i/hy5mXWM.jpg'),
(6, 1, 'https://purr.objects-us-east-1.dream.io/i/rrXar.png'),
(7, 1, 'https://purr.objects-us-east-1.dream.io/i/cFaGX.jpg'),
(8, 1, 'https://purr.objects-us-east-1.dream.io/i/dscn9547.jpg'),
(9, 1, 'https://purr.objects-us-east-1.dream.io/i/thyc9.gif'),
(10, 1, 'https://purr.objects-us-east-1.dream.io/i/3EGnA.gif'),
(12, 1, 'https://purr.objects-us-east-1.dream.io/i/4-day-old.jpeg'),
(13, 1, 'https://purr.objects-us-east-1.dream.io/i/h2faG.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(5, 'Tester', 'test@gmail.com', '$2y$10$DQHkX5o4Az9hgY6A/6B3xue6H0DPon3IKeJSwwCxKx9kQBSyKL61C'),
(6, 'Tester', 'test2@gmail.com', '$2y$10$FIwi4eXM7YYdEGxApn.LW.qRu6WmvWf4f2wYxPePLla8abLxLxkzC');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `api`
--
ALTER TABLE `api`
  ADD CONSTRAINT `api_category_id_fk` FOREIGN KEY (`category`) REFERENCES `category` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_image_id_fk` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_category_id_fk` FOREIGN KEY (`category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
