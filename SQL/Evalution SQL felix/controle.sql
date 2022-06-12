-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 16 déc. 2019 à 00:05
-- Version du serveur :  5.6.34-log
-- Version de PHP :  7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `evaluation_prenom`
--

-- --------------------------------------------------------

--
-- Structure de la table `controle`
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
-- Déchargement des données de la table `controle`
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

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `controle`
--
ALTER TABLE `controle`
  ADD PRIMARY KEY (`controle_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `controle`
--
ALTER TABLE `controle`
  MODIFY `controle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
