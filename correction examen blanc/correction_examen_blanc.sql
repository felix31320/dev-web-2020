-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2022 at 02:47 PM
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
-- Database: `correction_examen_blanc`
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
(8, 'Sorento', 'Kia', '12CV', 'Diesel'),
(9, 'Micra', 'NISSAN', '4CV', 'Essence');

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
  `ID_VOITURE` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proprietaire`
--

INSERT INTO `proprietaire` (`ID`, `NOM`, `PRENOM`, `ADRESSE`, `CODE_POSTAL`, `VILLE`, `TEL`, `ID_VOITURE`) VALUES
(9, 'felix', 'friscourt', '9 rue de la garance', 31320, 'pechabou', 679585081, 6),
(10, 'felix', 'felix', 'fe', 8479841, 'fe', 41641, 6),
(11, 'fee', 'fee', 'fee', 18414, 'fee', 1845124, 7);

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

CREATE TABLE `voiture` (
  `id` int(11) UNSIGNED NOT NULL,
  `immatriculation` varchar(20) NOT NULL,
  `couleur` varchar(15) NOT NULL,
  `kilometrage` int(11) NOT NULL,
  `id_modele` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voiture`
--

INSERT INTO `voiture` (`id`, `immatriculation`, `couleur`, `kilometrage`, `id_modele`) VALUES
(6, 'KA 2568 KL', 'Rouge', 98500, 9),
(7, 'PO 568 mp', 'Bleue', 152000, 1);

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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_id_voiture` (`ID_VOITURE`);

--
-- Indexes for table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_modele` (`id_modele`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modele`
--
ALTER TABLE `modele`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD CONSTRAINT `fk_id_voiture` FOREIGN KEY (`ID_VOITURE`) REFERENCES `voiture` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
