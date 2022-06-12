-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2022 at 03:21 PM
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
-- Database: `evalsql_felix`
--

-- --------------------------------------------------------

--
-- Table structure for table `controle`
--

CREATE TABLE `controle` (
  `controle_id` int(11) NOT NULL,
  `controle_exam` int(11) NOT NULL,
  `controle_matiere` varchar(50) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `controle_note` int(11) NOT NULL,
  `controle_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `controle`
--

INSERT INTO `controle` (`controle_id`, `controle_exam`, `controle_matiere`, `etudiant_id`, `controle_note`, `controle_date`) VALUES
(1, 1, 'Mathématique', 1, 10, '2019-12-15 14:38:57'),
(2, 1, 'Mathématique', 2, 15, '2019-12-15 14:38:57'),
(3, 1, 'Mathématique', 3, 5, '2019-12-15 14:38:57'),
(11, 2, 'Science', 1, 15, '2019-12-15 16:09:48'),
(13, 2, 'Science', 3, 6, '2019-12-15 16:09:48'),
(14, 2, 'Science', 4, 11, '2019-12-15 16:09:48'),
(15, 2, 'Science', 5, 12, '2019-12-15 16:09:48'),
(16, 3, 'Géographie', 1, 11, '2019-12-15 16:12:56'),
(19, 3, 'Géographie', 4, 12, '2019-12-15 16:12:56'),
(21, 4, 'Français', 1, 8, '2019-12-15 16:15:19'),
(22, 4, 'Français', 2, 12, '2019-12-15 16:15:19'),
(23, 4, 'Français', 3, 12, '2019-12-15 16:15:19'),
(24, 4, 'Français', 4, 2, '2019-12-15 16:15:19'),
(26, 5, 'Français', 1, 3, '2019-12-15 16:16:35'),
(27, 5, 'Français', 2, 18, '2019-12-15 16:16:35'),
(28, 5, 'Français', 3, 4, '2019-12-15 16:16:35'),
(29, 5, 'Français', 4, 11, '2019-12-15 16:16:35'),
(30, 5, 'Français', 5, 10, '2019-12-15 16:16:35'),
(31, 6, 'Français', 1, 8, '2019-12-15 16:18:18'),
(32, 6, 'Français', 2, 10, '2019-12-15 16:18:18'),
(33, 6, 'Français', 3, 14, '2019-12-15 16:18:18'),
(34, 6, 'Français', 4, 12, '2019-12-15 16:18:18'),
(35, 6, 'Français', 5, 8, '2019-12-15 16:18:18'),
(36, 7, 'Français', 1, 11, '2019-12-15 16:21:14'),
(37, 7, 'Français', 2, 19, '2019-12-15 16:21:14'),
(38, 7, 'Français', 3, 11, '2019-12-15 16:21:14'),
(39, 7, 'Français', 4, 8, '2019-12-15 16:21:14'),
(40, 7, 'Français', 5, 15, '2019-12-15 16:21:14'),
(41, 8, 'Géographie', 1, 11, '2019-12-15 18:04:41'),
(42, 8, 'Géographie', 2, 12, '2019-12-15 18:04:41'),
(43, 8, 'Géographie', 3, 15, '2019-12-15 18:04:41'),
(44, 8, 'Géographie', 4, 8, '2019-12-15 18:04:41'),
(45, 8, 'Géographie', 5, 9, '2019-12-15 18:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `etudiant_id` int(11) NOT NULL,
  `etudiant_nom` varchar(50) NOT NULL,
  `etudiant_prenom` varchar(50) NOT NULL,
  `etudiant_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etudiant_classe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`etudiant_id`, `etudiant_nom`, `etudiant_prenom`, `etudiant_date`, `etudiant_classe`) VALUES
(1, 'DUPONT', 'David', '2019-12-15 14:34:17', '5EME'),
(2, 'DUPLIN', 'Pierre', '2019-12-15 14:34:17', '3EME'),
(3, 'BLANC', 'stéphane', '2019-12-15 14:34:17', '6EME'),
(4, 'NOIR', 'Roger', '2019-12-15 14:34:17', '6EME'),
(5, 'SCHMIDTH', 'Pascal', '2019-12-15 14:34:17', '3EME');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `controle`
--
ALTER TABLE `controle`
  ADD PRIMARY KEY (`controle_id`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`etudiant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `controle`
--
ALTER TABLE `controle`
  MODIFY `controle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `etudiant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
