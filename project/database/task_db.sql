-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2017 at 12:18 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `task_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
`id_auto` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_description` varchar(500) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `updated_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id_auto`, `user_id`, `task_name`, `task_description`, `created_date`, `updated_date`) VALUES
(3, 'kundu', 'Morning walk for today', 'We will go for a morning walk tomorrow', '27-Jun-2017', '27-Jun-2017'),
(5, 'kundu', 'Dinner', 'Lets go for dinner', '27-Jun-2017', ''),
(6, 'kundu', 'Play football', 'We will play football', '27-Jun-2017', '27-Jun-2017'),
(10, 'ali', 'Robo', 'Robo work', '27-Jun-2017', ''),
(11, 'ali', 'Metting', 'Robo Metting today', '27-Jun-2017', '27-Jun-2017'),
(12, 'ratul', 'Hangout', 'Lets go for a ride', '27-Jun-2017', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_auto` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_auto`, `name`, `id`, `password`, `description`) VALUES
(12, 'Sauvik', 'kundu', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'Lets see'),
(13, 'Ali', 'ali', '21d906a2e95ee518e5423f8536941272bdc81f48d0e0c33cd358a6c3c5bdd26b9beb87e72b99574b4b1e72e0993565c7205aeed3c7ddc0af553408ed035d47f2', 'USA boy'),
(14, 'Adib', 'adib', '21d906a2e95ee518e5423f8536941272bdc81f48d0e0c33cd358a6c3c5bdd26b9beb87e72b99574b4b1e72e0993565c7205aeed3c7ddc0af553408ed035d47f2', 'Worst'),
(15, 'Ratul', 'ratul', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'Tik asa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
 ADD PRIMARY KEY (`id_auto`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_auto`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
