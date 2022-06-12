-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2022 at 01:51 PM
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
-- Database: `1examen_dae`
--

-- --------------------------------------------------------

--
-- Table structure for table `accueil`
--

CREATE TABLE `accueil` (
  `lieu` varchar(255) CHARACTER SET latin1 NOT NULL,
  `modele` varchar(255) CHARACTER SET latin1 NOT NULL,
  `support` varchar(255) CHARACTER SET latin1 NOT NULL,
  `type` varchar(255) CHARACTER SET latin1 NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accueil`
--

INSERT INTO `accueil` (`lieu`, `modele`, `support`, `type`, `date`, `id`) VALUES
('ECOLE MATERNELLE JEAN JAURES', 'CARDIAC SCIENCE PowerHeart AED G3', 'ELECTRODE ADULTE', 'Expiration le', '2020-09-28', 1),
('ECOLE MATERNELLE JEAN JAURES', 'CARDIAC SCIENCE PowerHeart AED G3', 'BATTERIE', 'changement le', '2020-06-30', 2),
('ECOLE PRIMAIRE JEAN MOULIN', 'CARDIAC SCIENCE PowerHeart AED G3', 'ELECTRODE ADULTE', 'Expiration le', '2022-10-12', 3),
('MEDIATHEQUE', 'LIFEPACK cr plus', 'BATTERIE', 'Expiration le ', '2020-06-24', 4),
('SALLE YOURI GARGARINE', 'CARDIAC SCIENCE PowerHeart AED G3', 'ELECTRODE ENFANT', 'Expiration le ', '2022-02-20', 5),
('SALLE YOURI GARGARINE', 'CARDIAC SCIENCE PowerHeart AED G3', 'ELECTRODE ADULTE', 'Expiration le', '2020-07-13', 6),
('SALLE YOURI GARGARINE', 'CARDIAC SCIENCE PowerHeart AED G3', 'BATTERIE', 'Changement le ', '2019-01-10', 7),
('SALLE PIERRE RICHARD', 'CARDIAC SCIENCE PowerHeart AED G3', 'ELECTRODE ADULTE', 'Expiration le', '2021-02-03', 8);

-- --------------------------------------------------------

--
-- Table structure for table `batiment`
--

CREATE TABLE `batiment` (
  `batiment` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `batiment`
--

INSERT INTO `batiment` (`batiment`, `adresse`, `id`) VALUES
('ECOLE MATERNELLE JEAN JAURES', '32 rue guillaume tell 59160 Lomme', 1),
('ECOLE PRIMAIRE JEAN MOULIN', '34 rue de valenciennes 59160 Lomme', 2),
('MEDIATHQUE', 'Rue de l\'abreuvoir 59130 Lambersart', 3),
('SALLE YOURI GARGARINE', '123 avenue de l\'hippodrome 59130 Lambersart', 4),
('SALLE PIERRE RICHARD', '45 rue de molinel 59160 Lomme', 5);

-- --------------------------------------------------------

--
-- Table structure for table `materiels`
--

CREATE TABLE `materiels` (
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `fournisseur` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materiels`
--

INSERT INTO `materiels` (`marque`, `modele`, `fournisseur`, `adresse`, `mail`, `id`) VALUES
('CARDIAC SCIENCE', 'PowerHeart AED G3', 'DAE', 'Zl pliaterie 13000 Marseille', 'contact@dae.fr', 1),
('CARDIAC SCIENCE', 'PowerHeart AED G5', 'DAE', 'Zl pliaterie 13000', 'contact@dae.fr', 2),
('LIFEPACK', 'cr plus', 'defibrill', '12 rue de Paris 31000 Toulouse', 'info@defibrill.fr', 3),
('felix', 'felix', 'felix', 'felix', 'felix', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accueil`
--
ALTER TABLE `accueil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batiment`
--
ALTER TABLE `batiment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materiels`
--
ALTER TABLE `materiels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accueil`
--
ALTER TABLE `accueil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `batiment`
--
ALTER TABLE `batiment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `materiels`
--
ALTER TABLE `materiels`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
