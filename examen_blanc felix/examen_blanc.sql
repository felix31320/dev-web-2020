-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2022 at 03:28 PM
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
-- Database: `examen_blanc`
--

-- --------------------------------------------------------

--
-- Table structure for table `modele`
--

CREATE TABLE `modele` (
  `id` int(11) UNSIGNED NOT NULL,
  `modele` varchar(15) NOT NULL,
  `marque` varchar(15) NOT NULL,
  `puissance` varchar(15) NOT NULL,
  `carburant` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modele`
--

INSERT INTO `modele` (`id`, `modele`, `marque`, `puissance`, `carburant`) VALUES
(1, '108', 'peugeot', '4CV', 'Essence'),
(2, '508', 'peugeot', '7CV', 'Essence'),
(3, '308', 'peugeot', '4CV', 'Essence'),
(4, 'Megane Coupe', 'renault', '5CV', 'Diesel'),
(5, 'Laguna', 'renault', '6CV', 'Diesel'),
(6, 'Clio', 'renault', '4CV', 'Essence'),
(7, 'Rio', 'Kia', '5CV', 'Essence'),
(8, 'Sorento', 'Kia', '12CV', 'Diesel');

-- --------------------------------------------------------

--
-- Table structure for table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `ID` int(11) NOT NULL,
  `NOM` varchar(15) NOT NULL,
  `PRENOM` varchar(15) NOT NULL,
  `ADRESSE` varchar(50) NOT NULL,
  `CODE_POSTAL` int(5) NOT NULL,
  `VILLE` varchar(15) NOT NULL,
  `TEL` int(8) NOT NULL,
  `ID_VOITURE` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proprietaire`
--

INSERT INTO `proprietaire` (`ID`, `NOM`, `PRENOM`, `ADRESSE`, `CODE_POSTAL`, `VILLE`, `TEL`, `ID_VOITURE`) VALUES
(1, 'alexis', 'friscourt', '9 rue de la garance', 31320, 'pechablou', 679585081, 555),
(12, 'felix', 'friscourt', '9 rue de la garance', 31320, 'pechablou', 679585081, 999);

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

CREATE TABLE `voiture` (
  `id` int(11) UNSIGNED NOT NULL,
  `immatriculation` varchar(20) NOT NULL,
  `couleur` varchar(15) NOT NULL,
  `kilometrage` int(11) NOT NULL,
  `id_modele` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voiture`
--

INSERT INTO `voiture` (`id`, `immatriculation`, `couleur`, `kilometrage`, `id_modele`) VALUES
(1, '2525', 'noir', 1000, 1),
(11, '123123', 'noir', 25000, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `modele`
--
ALTER TABLE `modele`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modele`
--
ALTER TABLE `modele`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
