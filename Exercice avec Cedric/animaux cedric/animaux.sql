-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2022 at 02:34 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animaux`
--

-- --------------------------------------------------------

--
-- Table structure for table `animaux`
--

CREATE TABLE `animaux` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `espece` varchar(50) COLLATE utf8_bin NOT NULL,
  `genre` char(1) COLLATE utf8_bin DEFAULT NULL,
  `anNaissance` int(4) DEFAULT NULL,
  `date_arrive` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `photo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `commentaires` text COLLATE utf8_bin,
  `proprietaire` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `anMort` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `animaux`
--

INSERT INTO `animaux` (`id`, `espece`, `genre`, `anNaissance`, `date_arrive`, `nom`, `photo`, `commentaires`, `proprietaire`, `anMort`) VALUES
(10, 'chien', 'F', 2009, '2020-02-13 09:34:52', 'Diva', 'dh loic bruni.jpg', 'belle chienne', 'david', NULL),
(11, 'chien', 'F', 2015, '2020-02-13 10:49:52', 'ibiza', 'Félix FRISCOURT (4).jpg', 'migonne', 'valerie', NULL),
(12, 'chat', 'M', 2020, '2020-02-13 13:19:31', 'felix', 'destiny.jpg.jpg', 'bebe chat', 'felix', NULL),
(13, 'chat', 'M', 2020, '2020-02-14 08:33:12', 'devweb', 'Félix FRISCOURT (2).JPG', 'bebe chat', 'signes et formations', NULL),
(14, 'chie,', 'F', 2010, '2020-02-14 09:19:51', 'kara', 'dh loic bruni.jpg', 'fr', 'france', NULL),
(15, 'hhh', 'M', 2010, '2020-02-14 09:23:26', 'kara', 'Félix FRISCOURT.jpg', 'rr', 'rr', NULL),
(16, 'hhh', 'M', 2010, '2020-02-14 09:24:23', 'kara', 'Félix FRISCOURT (4).jpg', 'rr', 'rr', NULL),
(17, 'chien', 'F', 2010, '2020-02-14 09:24:59', 'kara', 'dh loic bruni.jpg', 'fr', 'france', NULL),
(18, 'chien', 'F', 2010, '2020-02-14 09:25:13', 'kara', 'destiny.jpg.jpg', 'fr', 'france', NULL),
(19, 'girafe', 'M', 2000, '2020-04-17 13:28:35', 'felix', 'halo3steam.jfif', 'il est grand', 'felix', NULL),
(20, 'spider', 'M', 2005, '2022-06-12 14:17:31', 'spider', '1496928029-3096-jaquette-avant.jpg', 'spider', 'spider', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'LeFi', 'felix31320@gmail.com', '$2y$10$opj1dO96Zl8g4mr8yAEc3OEHoeym2lrVyDMV3nVqBfHoBCUqbvBH.'),
(2, 'devweb', 'devweb@gmail.com', '$2y$10$OLjUlB7/FgASsskR/UfouOBtZdIDzQsWHXDG7G.PI4b3YRHV6Rhyu'),
(3, 'lefilefi', 'lefilefi@lefi.com', '$2y$10$8TcIvRvSsG.vOmHa/L/5PeY1Kjl2KsG8ugE0nMFXfCGzHPvnTkpgC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animaux`
--
ALTER TABLE `animaux`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `animaux` ADD FULLTEXT KEY `ind_full_recherche_espece` (`espece`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animaux`
--
ALTER TABLE `animaux`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
