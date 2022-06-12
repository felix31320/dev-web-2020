-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 16 déc. 2019 à 00:07
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
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `etudiant_id` int(11) NOT NULL,
  `etudiant_nom` varchar(50) NOT NULL,
  `etudiant_prenom` varchar(50) NOT NULL,
  `etudiant_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etudiant_classe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`etudiant_id`, `etudiant_nom`, `etudiant_prenom`, `etudiant_date`, `etudiant_classe`) VALUES
(1, 'DUPONT', 'David', '2019-12-15 14:34:17', '5EME'),
(2, 'DUPLIN', 'Pierre', '2019-12-15 14:34:17', '3EME'),
(3, 'BLANC', 'stéphane', '2019-12-15 14:34:17', '6EME'),
(4, 'NOIR', 'Roger', '2019-12-15 14:34:17', '6EME'),
(5, 'SCHMIDTH', 'Pascal', '2019-12-15 14:34:17', '3EME');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`etudiant_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `etudiant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
