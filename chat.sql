-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 20, 2020 at 07:30 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `canaux`
--

CREATE TABLE `canaux` (
  `id_channel` int(11) NOT NULL,
  `name_channel` varchar(50) NOT NULL,
  `status_channel` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `canaux`
--

INSERT INTO `canaux` (`id_channel`, `name_channel`, `status_channel`) VALUES
(1, 'love channel', 0),
(69, 'running channel', 0),
(76, 'serie channel', 0),
(94, 'running channel', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_messages` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_channel` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_in` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_messages`, `id_utilisateur`, `id_channel`, `content`, `created_in`) VALUES
(2, 1, 1, 'hello la team', '2020-10-14 15:23:54'),
(3, 1, 1, 'super ce chat trop cool', '2020-10-15 09:28:48'),
(4, 1, 1, 'super hi', '2020-10-15 09:32:59'),
(5, 1, 1, 'test message encore', '2020-10-15 09:34:54'),
(7, 1, 1, 'super', '2020-10-15 11:33:09'),
(8, 1, 1, 'yoooooo', '2020-10-15 11:46:12'),
(17, 1, 1, 'hey est ce que ça marche', '2020-10-15 15:01:20'),
(25, 1, 1, 'test', '2020-10-15 20:58:53'),
(28, 1, 1, 'yoooooo', '2020-10-15 22:17:29'),
(29, 1, 1, 'pitié faites que ça marche', '2020-10-15 22:54:48'),
(31, 1, 1, 'hello la love team', '2020-10-16 10:21:48'),
(32, 1, 1, 'testooo', '2020-10-16 11:21:48'),
(33, 1, 1, 'hello la team love love love', '2020-10-16 14:08:57'),
(54, 1, 1, 'marche ou pas ?', '2020-10-17 12:07:25'),
(55, 1, 1, 'padon ?', '2020-10-17 12:16:55'),
(56, 1, 1, 'oui ?', '2020-10-17 12:17:23'),
(57, 1, 1, 'est ce que ça marche todayt', '2020-10-18 15:48:49'),
(58, 1, 1, 'hhhh', '2020-10-18 16:17:32'),
(59, 1, 1, 'hehe', '2020-10-18 16:56:56'),
(60, 1, 1, 'j\'ai supprimé un truc', '2020-10-18 20:04:46'),
(61, 1, 1, 'buh', '2020-10-18 20:51:43'),
(62, 1, 1, 'test', '2020-10-18 20:52:01'),
(63, 1, 1, 'retes', '2020-10-18 20:52:24'),
(64, 1, 1, 'est ce que ça va fonctionner encore ?', '2020-10-18 20:54:08'),
(65, 1, 1, 'dernier essai de la soirée', '2020-10-18 20:55:19'),
(66, 1, 1, 'un dernier pour la route', '2020-10-18 21:08:15'),
(67, 1, 1, 'der des der', '2020-10-18 21:09:28'),
(68, 1, 1, 'der der der', '2020-10-18 21:10:09'),
(69, 1, 1, 'yeah', '2020-10-18 21:11:55'),
(70, 1, 1, 'hello', '2020-10-19 14:36:25'),
(71, 1, 1, 'est ce que ça fonctionne', '2020-10-19 14:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'img/default_profile.png',
  `droits` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `avatar`, `droits`) VALUES
(1, 'hello', 'password', 'hello@gmail.com', 'img/default_profile.png', 1),
(2, 'you', 'password', 'you@gmail.com', 'img/default_profile.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canaux`
--
ALTER TABLE `canaux`
  ADD PRIMARY KEY (`id_channel`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_messages`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_chanel` (`id_channel`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canaux`
--
ALTER TABLE `canaux`
  MODIFY `id_channel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_messages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`id_channel`) REFERENCES `canaux` (`id_channel`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
